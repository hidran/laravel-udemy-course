<?php

namespace LaraCourse\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use LaraCourse\Models\Album;
use LaraCourse\Models\AlbumCategory;
use LaraCourse\Models\Photo;
use LaraCourse\Policies\AlbumCategoryPolicy;
use LaraCourse\Policies\AlbumPolicy;
use LaraCourse\Policies\PhotoPolicy;
use LaraCourse\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Album::class=> AlbumPolicy::class,
        Photo::class => PhotoPolicy::class,
        AlbumCategory::class => AlbumCategoryPolicy::class
       
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

       Gate::define('manage-album', function(User $user, Album $album){
           dd($user->id == $album->user_id);
           return $user->id == $album->user_id;
    });
  
    }
}
