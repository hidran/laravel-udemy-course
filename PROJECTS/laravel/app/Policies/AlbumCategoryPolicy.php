<?php

namespace LaraCourse\Policies;

use function dd;
use LaraCourse\Models\AlbumCategory;
use LaraCourse\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AlbumCategoryPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function create(User $user)
    {
        return 1;
      
    }
    public function delete(User $user, AlbumCategory $category)
    {
        return 1;
        return $user->id == $category->user_id;
    }
    public function view(User $user, AlbumCategory $category)
    {
        return 1;
        return $user->id == $category->user_id;
    }
    public function update(User $user, AlbumCategory $category)
{
    return 1;
    return $user->id == $category->user_id;
}
    
   
}
