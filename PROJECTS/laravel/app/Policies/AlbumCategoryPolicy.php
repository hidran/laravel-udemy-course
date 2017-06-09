<?php

namespace LaraCourse\Policies;

use LaraCourse\Models\AlbumCategory;
use LaraCourse\User;
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
    public function save(User $user, AlbumCategory $category)
    {

        return $user->id == $album->user_id;
    }
}
