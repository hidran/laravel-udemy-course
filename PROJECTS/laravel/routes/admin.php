<?php
Route::resource('users', 'Admin\AdminUsersController',
    [
        'names' => 
        [
            'index' => 'user-list'
            
        ]
    ]
);
Route::get('getUsers',  'Admin\AdminUsersController@getUsers')
    ->name('admin.getUsers');

Route::patch('restore/{id}',  'Admin\AdminUsersController@restore')
    ->name('users.restore');
Route::view('/','templates/admin')->name('admin');

Route::get('/dashboard',function (){
    return "Admin Dashbaord";
});