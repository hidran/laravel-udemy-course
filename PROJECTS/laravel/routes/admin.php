<?php
Route::get('/',function (){
    return "Hello admin";
});

Route::get('/dashboard',function (){
    return "Admin Dashbaord";
});