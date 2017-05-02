<?php

namespace LaraCourse\Http\Controllers;

use Illuminate\Http\Request;
use LaraCourse\Models\Album;
use LaraCourse\Models\Photo;
use function view;

class GalleryController extends Controller
{
    public function index()
    {
        return view('gallery.albums')->with('albums',
            Album::latest()->get()
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
