<?php
namespace LaraCourse\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\VideoFactory;
class Video extends Model
{
    use HasFactory;

    public static function newFactory(){
        return new VideoFactory();
    }

}
