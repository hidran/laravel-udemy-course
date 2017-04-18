<?php

namespace LaraCourse\Models;

use Illuminate\Database\Eloquent\Model;
use function strtoupper;

class Photo extends Model
{
    protected $fillable =['name','img_path','description'];
    //img_path
    public function  getPathAttribute(){
        $url = $this->attributes['img_path'];
        if(stristr($url ,'http') === false){
            $url = 'storage/'.$url;
        }
        return $url;
    }
    public function  getImgPathAttribute($value){
         
        if(stristr($value ,'http') === false){
            $value = 'storage/'.$value;
        }
        return $value;
    }
    public function  setNameAttribute($value)
    {
        $this->attributes['name'] = strtoupper($value);
    }
}
