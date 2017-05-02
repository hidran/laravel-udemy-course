<?php

use Illuminate\Foundation\Auth\User;
use LaraCourse\Models\Album;
use LaraCourse\Models\Photo;




    //ALBUMS

Route::group(
    [
        'middleware'=>'auth',
        'prefix' => 'dashboard'
    ]
        ,
    function () {
        Route::get('/','AlbumsController@index')->name('albums');
     //   Route::get('/home','AlbumsController@index')->name('albums');
        Route::get('/albums/create', 'AlbumsController@create')->name('album.create');
        Route::get('/albums','AlbumsController@index')->name('albums');
        
        Route::get('/albums/{album}','AlbumsController@show')->where('id', '[0-9]+')
        ->middleware('can:view,album');
        
       Route::get('/albums/{id}/edit','AlbumsController@edit')->where('id', '[0-9]+')
           ->name('album.edit');
       Route::delete('/albums/{album}','AlbumsController@delete')
           ->name('album.delete')
            ->where('album', '[0-9]+');

//Route::post('/albums/{id}','AlbumsController@store');
        Route::patch('/albums/{id}','AlbumsController@store');
        Route::post('/albums','AlbumsController@save')->name('album.save');

        Route::get('/albums/{album}/images', 'AlbumsController@getImages')
            ->name('album.getimages')
            ->where('album', '[0-9]+');

        Route::get('photos' , function(){
            return Photo::all();
        });


        Route::get('usersnoalbums' , function(){
            $usersnoalbum = DB::table('users  as u')
                ->leftJoin('albums as a', 'u.id','a.user_id')
                ->select('u.id','email','name','album_name')->
                whereRaw('album_name is null')
                ->get();
            $usersnoalbum = DB::table('users  as u')

                ->select('u.id','email','name')->
                whereRaw( 'NOT EXISTS (SELECT user_id from albums where user_id= u.id)')
                ->get();
            return $usersnoalbum;
        });
        Route::resource('photos', 'PhotosController');
    }
);

// Gallery routes

Route::group(
    [
      
        'prefix' => 'gallery'
    ]
    ,
    function () {
        Route::get('albums', 'GalleryController@index')->name('gallery.albums');
       Route::get('/', 'GalleryController@index')->name('gallery.albums');
        Route::get('album/{album}/images', 'GalleryController@showAlbumImages')->name('gallery.album.images');
    });
// images

Auth::routes();

Route::get('/', 'GalleryController@index');
Route::get('home', 'GalleryController@index');
