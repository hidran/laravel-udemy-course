<?php

namespace LaraCourse\Http\Controllers\Admin;

use Illuminate\Http\Request;
use LaraCourse\Http\Controllers\Controller;
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
   public function getUsers()
   {
       $users =  User::select(['name','email','role','created_at','deleted_at'])->orderBy('name')->get();
       $result = DataTables::of($users )
           ->addColumn('action', function ($user) {
               return '<a href="#edit-'.$user->id.'" class="btn btn-sm btn-primary"><i class="fa fa-pencil-square-o"></i></a>&nbsp;'.
                   '<a title="soft delete" href="#edit-'.$user->id.'" class="btn btn-sm btn-danger"><i class="fa fa-trash-o"></i> </a>&nbsp;'.
                   '<a title="hard delete" href="#edit-'.$user->id.'" class="btn btn-sm btn-danger"><i class="fa fa-minus-square-o"></i> </a>';
                   
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
