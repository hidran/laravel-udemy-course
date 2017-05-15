<?php

namespace LaraCourse\Http\Controllers;

use function dd;
use Illuminate\Http\Request;
use LaraCourse\Models\Album;
use LaraCourse\Models\AlbumCategory;
use LaraCourse\Models\Photo;
use function view;

class GalleryController extends Controller
{
    public function index()
    {
        $albums =   Album::latest()->with('categories')->get();
       
        return view('gallery.albums')->with('albums',
            $albums
        );
    }
    public function showAlbumsByCategory(AlbumCategory $category)
    {
        return view('gallery.albums')->with('albums',
            $category->albums
        );  
    }
  
    public function showAlbumImages(Album $album)
    {
        return view(
            'gallery.images',
            [
                'images'=> Photo::whereAlbumId($album->id)->latest()->get(),
                'album' => $album
            ]);

    }
}
