<?php
namespace LaraCourse\Models;
use Illuminate\Database\Eloquent\Model;
use LaraCourse\Models\Photo;
class Album extends Model 
{
   
    protected $table ='albums';
    protected $primaryKey = 'id';
    protected  $fillable = ['album_name','description','user_id'];
  
   
}