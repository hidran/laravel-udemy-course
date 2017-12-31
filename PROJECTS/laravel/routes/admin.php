<?php
Route::resource('users', 'Admin\AdminUsersController',
    [
        'names' => 
        [
            'index' => 'user-list'
            
        ]
    ]
);

Route::view('/','templates/admin')->name('admin');

Route::get('/dashboard',function (){
    return "Admin Dashbaord";
});