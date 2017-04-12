<?php
namespace LaraCourse\Models;
use Illuminate\Database\Eloquent\Model;
use LaraCourse\Models\Photo;
class Album extends Model 
{
   
    protected $table ='albums';
    protected $primaryKey = 'id';
    protected  $fillable = ['album_name','description','user_id'];
    public function photos()
    {
        return $this->hasMany(Photo::class);
        
    }
    
    public function gettotalPhotosAttribute($qb)
    {
       return 1;
        
    }
}