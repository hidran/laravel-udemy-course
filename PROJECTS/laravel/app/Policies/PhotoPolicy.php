<?php

namespace LaraCourse\Policies;

use LaraCourse\User;
use LaraCourse\Models\Photo;
use Illuminate\Auth\Access\HandlesAuthorization;

class PhotoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the photo.
     *
     * @param  \LaraCourse\User  $user
     * @param  \LaraCourse\Photo  $photo
     * @return mixed
     */
    public function view(User $user, Photo $photo)
    {
       
        return $user->id === $photo->album->user_id;
    }

    /**
     * Determine whether the user can create photos.
     *
     * @param  \LaraCourse\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
      return true;
    }

    /**
     * Determine whether the user can update the photo.
     *
     * @param  \LaraCourse\User  $user
     * @param  \LaraCourse\Photo  $photo
     * @return mixed
     */
    public function update(User $user, Photo $photo)
    {
         return $user->id === $photo->album->user_id;
    }
  
    /**
     * Determine whether the user can delete the photo.
     *
     * @param  \LaraCourse\User  $user
     * @param  \LaraCourse\Photo  $photo
     * @return mixed
     */
    public function delete(User $user, Photo $photo)
    {
        return $user->id === $photo->album->user_id;
    }
}
