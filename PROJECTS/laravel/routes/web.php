<?php

use LaraCourse\Models\Album;

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
Route::get('/albums',function(){
    DB::statement('SET FOREIGN_KEY_CHECKS=0;');
    // Album::truncate();
   // Album::all();
});