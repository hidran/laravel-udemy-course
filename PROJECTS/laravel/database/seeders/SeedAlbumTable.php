<?php

use Illuminate\Database\Seeder;
use LaraCourse\Models\AlbumCategory;
use LaraCourse\Models\AlbumsCategory;
use LaraCourse\Models\Album;
class SeedAlbumTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

           factory(LaraCourse\Models\Album::class,10)->create()
               ->each(function ($album){
                    $cats = AlbumCategory::inRandomOrder()->take(3)->pluck('id');
                    $cats->each(function ($cat_id) use($album){
                        AlbumsCategory::create([
                            'album_id' => $album->id,
                            'category_id' => $cat_id
                        ]);
                    });
               });
     }
}
