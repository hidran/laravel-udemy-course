<?php

namespace LaraCourse\Http\Controllers\Admin;

use Illuminate\Http\Request;
use LaraCourse\Http\Controllers\Auth\RegisterController;
use LaraCourse\Http\Controllers\Controller;
use LaraCourse\Http\Requests\UserFormRequest;
use LaraCourse\Models\User;
use DataTables;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       return view('admin/users');
    }
    private function getUserButtons(User $user)
{
   $id = $user->id;

 $buttonEdit= '<a href="'.route('users.edit', ['user'=> $id]).'" id="edit-'.$id.'" class="btn btn-sm btn-primary"><i class="fa fa-pencil-square-o"></i></a>&nbsp;';
    if($user->deleted_at){
        $deleteRoute =   route('users.restore', ['user'=> $id]);
        $iconDelete =   ' <i class="fa fa-repeat"></i> ';
        $btnClass = 'btn-default';
        $btnId = 'restore-'.$id;
    } else {
        $deleteRoute =  route('users.destroy', ['user'=> $id]);
        $iconDelete =   ' <i class="fa fa-trash-o"></i> ';
        $btnId = 'delete-'.$id;
        $btnClass = 'btn-danger';
    }

$buttonDelete = '<a  href="'.$deleteRoute.'" title="soft delete" id="'.$btnId.'" class="ajax btn btn-sm '.$btnClass.'">'.$iconDelete.' </a>&nbsp;';

$buttonForceDelete = '<a href="'.route('users.destroy', ['user'=> $id]).'?hard=1" title="hard delete" id="forcedelete-'.$id.'" class="ajax btn btn-sm btn-danger"><i class="fa fa-minus-square-o"></i> </a>';
    return $buttonEdit.$buttonDelete.$buttonForceDelete;
}
   public function getUsers()
   {
       $users =  User::select(['id','name','email','role','created_at','deleted_at'])->orderBy('name')->withTrashed()->get();
       $result = DataTables::of($users )
           ->addColumn('action', function ($user) {
               return  $this->getUserButtons($user);

           })->editColumn('created_at', function($user ){
               return $user->created_at? $user->created_at->format('d/m/y H:i') : '';
           })
           ->editColumn('updated_at', function($user ){
                return $user->updated_at? $user->updated_at->format('d/m/y  H:i') : '';
           })->editColumn('deleted_at', function($user ){
               return $user->deleted_at? $user->deleted_at->format('d/m/y  H:i') : '';
           })

           ->make(true);
       return $result;
   }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();
        return view('admin.edituser', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserFormRequest $request)
    {
        $user = new User();
        $user->password = bcrypt($request->input('email'));

        $user->fill($request->only(['email','role','name']));
        $res =  $user->save();
         $messaggio = $res ? 'User successfully created': 'Problem creating users';
        session()->flash('message', $messaggio);
        return redirect()->route('users.edit', ['user'=> $user->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

       return view('admin.edituser', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserFormRequest $request,User $user )
    {
      $user->fill($request->only(['email','role','name']));
     $res =  $user->save();
     $messaggio = $res ? 'User successfully updated': 'Prolbem saving users';
        session()->flash('message', $messaggio);
      return redirect()->route('users.edit', ['user'=> $user->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::withTrashed()->findOrFail($id);

         $hard = \request('hard', '');

        $res = $hard? $user->forceDelete() : $user->delete();
       return ''.$res;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $user = User::withTrashed()->findOrFail($id);


        $res = $user->restore() ;
        return ''.$res;
    }
}
