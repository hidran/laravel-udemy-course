<?php

namespace LaraCourse\Http\Controllers;

use Illuminate\Http\Request;
use LaraCourse\Models\Album;
use DB;

class AlbumsController extends Controller
{
    public function index(Request $request)
    {


        $queryBuilder = DB::table('albums')->orderBy('id', 'DESC');
        if ($request->has('id')) {
            $queryBuilder->where('id', '=', $request->input('id'));
        }
        if ($request->has('album_name')) {
            $queryBuilder->where('album_name', 'like', $request->input('album_name') . '%');
        }
        $albums = $queryBuilder->get();
        return view('albums.albums', ['albums' => $albums]);


    }

    public function delete($id)
    {
        $res = DB::table('albums')->where('id', $id)->delete();

        return $res;
    }

    public function edit($id)
    {
        $sql = 'select id, album_name, description from albums where id =:id';
        $album = DB::select($sql, ['id' => $id]);

        return view('albums.editalbum')->with('album', $album[0]);
    }

    public function store($id, Request $req)
    {

        $res = DB::table('albums')->where('id', $id)->update(
            ['album_name' => request()->input('name'),
                'description' => request()->input('description')
            ]
        );


        $messaggio = $res ? 'Album con id = ' . $id . ' Aggiornato' : 'Album ' . $id . ' Non aggiornato';
        session()->flash('message', $messaggio);
        return redirect()->route('albums');
    }

    public function create()
    {
        return view('albums.createalbum');
    }

    public function save()
    {
        $res = DB::table('albums')->insert(
          [  [
                'album_name' => request()->input('name'),
                'description' => request()->input('description'),
                'user_id' => 1
            ]
              ]
        );
        $name =  request()->input('name');
        $messaggio = $res ? 'Album   ' . $name . ' Created' : 'Album ' . $name. ' was not crerated';
        session()->flash('message', $messaggio);
        return redirect()->route('albums');
    }
}