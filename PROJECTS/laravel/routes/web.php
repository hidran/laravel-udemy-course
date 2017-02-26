<?php

use Illuminate\Foundation\Auth\User;
use LaraCourse\Models\Album;
use LaraCourse\Models\Photo;

Route::get('/','HomeController@index');

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

Route::get('/albums/{id}/edit','AlbumsController@edit');


Route::delete('/albums/{id}','AlbumsController@delete');

//Route::post('/albums/{id}','AlbumsController@store');
Route::patch('/albums/{id}','AlbumsController@store');
Route::post('/albums','AlbumsController@save')->name('album.save');
Route::get('photos' , function(){
    return Photo::all();
});


Route::get('users' , function(){
    return User::all();
});