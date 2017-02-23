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
Route::get('/albums','AlbumsController@index');
Route::get('/albums/{id}/delete','AlbumsController@delete');

Route::get('photos' , function(){
    return Photo::all();
});


Route::get('users' , function(){
    return User::all();
});