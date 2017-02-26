<?php

namespace LaraCourse\Http\Controllers;

use Illuminate\Http\Request;
use LaraCourse\Models\Album;
use DB;
class AlbumsController extends Controller
{
    public function index(Request $request)
    {
        $sql = 'select * from albums WHERE 1=1 ';
        $where = [];
        if ($request->has('id')) {
            $where['id'] = $request->get('id');
            $sql .= " AND ID=:id";
        }
        if ($request->has('album_name')) {
            $where['album_name'] = $request->get('album_name');
            $sql .= " AND album_name=:album_name";
        }
        $sql .= ' ORDER BY id desc';

        $albums = DB::select($sql, $where);
        return view('albums.albums', ['albums' => $albums]);

    }

    public function delete($id)
    {
        $sql = 'DELETE FROM albums where id= :id';
        return DB::delete($sql, ['id' => $id]);
        //return  redirect()->back();
    }
    public  function edit($id)
    {
        $sql ='select id, album_name, description from albums where id =:id';
        $album = DB::select($sql, ['id' =>$id]);
       
        return view('albums.editalbum')->with('album',$album[0]);
    }
    public  function store($id, Request $req){
          $data = request()->only(['name','description']);
          $data['id']= $id;
         $sql =' UPDATE albums SET album_name=:name, description=:description ';
         $sql .= ' WHERE id=:id';
         $res = DB::update($sql, $data);
         $messaggio = $res ? 'Album con id = '.$id. ' Aggiornato': 'Album '.$id. ' Non aggiornato';
         session()->flash('message', $messaggio);
        return  redirect()->route('albums');
    }
    public  function  create(){
         return  view('albums.createalbum');
    }
    public  function  save(){
        $data = request()->only(['name','description']);
        $data['user_id'] = 1;
        $sql = 'INSERT INTO  albums (album_name, description, user_id) ';
        $sql .=' VALUES(:name,:description, :user_id) ';
       $res =  DB::insert($sql, $data);
        $messaggio = $res ? 'Album   '.$data['name']. ' Created': 'Album '.$data['name']. ' was not crerated';
        session()->flash('message', $messaggio);
        return  redirect()->route('albums');
    }
}