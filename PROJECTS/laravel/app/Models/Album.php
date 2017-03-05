<?php
namespace LaraCourse\Models;
use Illuminate\Database\Eloquent\Model;

class Album extends Model 
{
   
    protected $table ='albums';
    protected $primaryKey = 'id';
    protected  $fillable = ['album_name','description','user_id'];
}