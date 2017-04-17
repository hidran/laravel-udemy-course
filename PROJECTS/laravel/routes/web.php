<?php

use Illuminate\Foundation\Auth\User;
use LaraCourse\Models\Album;
use LaraCourse\Models\Photo;

Route::get('/','AlbumsController@index');

Route::get('welcome/{name?}/{lastname?}/{age?}', 'WelcomeController@welcome')
    /*
    ->where('name','[a-zA-Z]+')
    ->where('lastname','[a-zA-Z]+')
    */
    ->where([
        'name' => '[a-zA-Z]+',
        'lastname' => '[a-zA-Z]+',
        'age' => '[0-9]{1,3}'
    ])
    ;
    //ALBUMS
Route::get('/albums','AlbumsController@index')->name('albums');

Route::get('/albums/{id}','AlbumsController@show')->where('id', '[0-9]+');

Route::get('/albums/create','AlbumsController@create')->name('album.create');

Route::get('/albums/{id}/edit','AlbumsController@edit')->where('id', '[0-9]+');;


Route::delete('/albums/{id}','AlbumsController@delete');

//Route::post('/albums/{id}','AlbumsController@store');
Route::patch('/albums/{id}','AlbumsController@store');
Route::post('/albums','AlbumsController@save')->name('album.save');


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


