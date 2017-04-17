<?php
namespace LaraCourse\Models;
use Illuminate\Database\Eloquent\Model;
use LaraCourse\Models\Photo;
class Album extends Model 
{
   
    protected $table ='albums';
    protected $primaryKey = 'id';
    protected  $fillable = ['album_name','description','user_id'];
  
     public function  getPathAttribute(){
          $url = $this->album_thumb;
          if(stristr($this->album_thumb ,'http') === false){
              $url = 'storage/'.$this->album_thumb;
          }
          return $url;
    }
   
}