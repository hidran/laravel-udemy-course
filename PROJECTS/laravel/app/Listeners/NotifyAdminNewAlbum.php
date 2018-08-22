<?php

namespace LaraCourse\Listeners;

use LaraCourse\Events\NewAlbumCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use LaraCourse\Mail\NotifyAdminAlbum;
use LaraCourse\Models\User;

class NotifyAdminNewAlbum
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NewAlbumCreated  $event
     * @return void
     */
    public function handle(NewAlbumCreated $event)
    {
       $admins = User::where('role','admin')->get();
        foreach ($admins as $admin) {

            \Mail::to($admin->email)->send( new NotifyAdminAlbum($event->album));
           // $admin->email
      }
       dd( $event->album->album_name);
    }
}
