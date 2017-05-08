<?php

namespace LaraCourse\Models;

use Illuminate\Database\Eloquent\Model;

class AlbumCategory extends Model
{
    protected  $table ='album_categories';
    public function albums(){
        return $this->belongsToMany(Album::class,'album_category',  'category_id','album_id');     
    }

}
