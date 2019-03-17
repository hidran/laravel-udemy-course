<?php

namespace LaraCourse\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use LaraCourse\Models\Album;
use LaraCourse\Models\AlbumCategory;

//gallery_users
class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role'
    ];
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
    protected $dateFormat = 'Y-m-d H:i:s';
  //  protected $table ='gallery_users';
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function albums(){
         return $this->hasMany(Album::class);
    }
    public function albumCategories()
    {
        return $this->hasMany(AlbumCategory::class);
    }
     public function  getFullNameAttribute(){
        return $this->name;
     }
      public function isAdmin(){
        return $this->role === 'admin';
      }
}
