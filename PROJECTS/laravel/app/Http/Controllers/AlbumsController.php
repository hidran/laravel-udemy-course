<?php

namespace LaraCourse\Http\Controllers;

use Illuminate\Http\Request;
use LaraCourse\Models\Album;
use DB;

class AlbumsController extends Controller
{
    public function index(Request $request)
    {

       //DB::table('albums')->  Album::
        $queryBuilder = Album::orderBy('id', 'DESC')->withCount('photos');
      
        if ($request->has('id')) {
            $queryBuilder->where('id', '=', $request->input('id'));
        }
        if ($request->has('album_name')) {
            $queryBuilder->where('album_name', 'like', $request->input('album_name') . '%');
        }
       
        $albums = $queryBuilder->get();
        return $albums;
        return view('albums.albums', ['albums' => $albums]);


    }

    public function delete(Album $id)
    {
       
        $res = $id->delete();
        
        return ''.$res;
    }

    public function edit(Album $id)
    {
        return view('albums.editalbum')->with('album', $id);
    }

    public function store(Album $id, Request $req)
    {

   $album =  $id;
   $album->album_name = request()->input('name');
   $album->description = request()->input('description');
  $res =  $album->save();
        


        $messaggio = $res ? 'Album con id = ' . $id->id . ' Aggiornato' : 'Album ' . $id->id . ' Non aggiornato';
        session()->flash('message', $messaggio);
        return redirect()->route('albums');
    }

    public function create()
    {
        return view('albums.createalbum');
    }

    public function save()
    {
     
       $album = new Album();
       $album->album_name = request()->input('name');
       $album->description =  request()->input('description');
       $album->user_id = 1;
        $res= $album->save();
        $name =  request()->input('name');
        $messaggio = $res ? 'Album   ' . $name . ' Created' : 'Album ' . $name. ' was not crerated';
        session()->flash('message', $messaggio);
        return redirect()->route('albums');
    }
}