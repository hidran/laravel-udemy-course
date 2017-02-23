<?php

namespace LaraCourse\Http\Controllers;

use Illuminate\Http\Request;
use LaraCourse\Models\Album;
use DB;
class AlbumsController extends Controller
{
    public function index( Request $request)
    {
        $sql ='select * from albums WHERE 1=1 ';
         $where =[];
        if($request->has('id')){
            $where['id'] = $request->get('id');
            $sql .= " AND ID=:id" ;
        }
        if($request->has('album_name')){
            $where['album_name'] = $request->get('album_name');
            $sql .= " AND album_name=:album_name" ;
        }
       
     $albums = DB::select($sql, $where);
      return view('albums', ['albums' => $albums]);
        
    }
    public function delete( $id)
    {
         $sql ='DELETE FROM albums where id= :id';
        return DB::delete($sql, ['id' => $id] );
       //return  redirect()->back();
    }
}
