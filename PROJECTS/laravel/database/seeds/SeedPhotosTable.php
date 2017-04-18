<?php

use Illuminate\Database\Seeder;
use LaraCourse\Models\Album;
use LaraCourse\Models\Photo;
class SeedPhotosTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $albums = Album::get();
       foreach ($albums as $album) {
           factory(LaraCourse\Models\Photo::class, 200)->create(
               ['album_id' => $album->id]
           );
       }
    }
}
