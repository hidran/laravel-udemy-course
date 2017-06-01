<?php

namespace LaraCourse\Models;

use Doctrine\DBAL\Query\QueryBuilder;
use Illuminate\Database\Eloquent\Model;
use LaraCourse\User;

class AlbumCategory extends Model
{
    protected  $table ='album_categories';
    public function albums(){
        return $this->belongsToMany(Album::class,'album_category',  'category_id','album_id')->
            withTimestamps();     
    }
   public function user(){
        return $this->belongsTo(User::class);
   }
    /**
     * Scope a query to only include popular users.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
  public function scopeUserCategories( $builder,  $user_id)
  {
       return $builder->where('user_id', $user_id);
  }
}
