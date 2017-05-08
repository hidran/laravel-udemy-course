<?php

use Illuminate\Database\Seeder;
use LaraCourse\Models\AlbumCategory;
use LaraCourse\Models\Album;
use LaraCourse\Models\AlbumsCategory;
use LaraCourse\Models\Photo;
use LaraCourse\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
     
        User::truncate();
        Album::truncate();
        Photo::truncate();
        AlbumCategory::truncate();
        AlbumsCategory::truncate();
        $this->call(SeedUserTable::class);
       
        $this->call(SeedAlbumCategoriesTable::class);

        $this->call(SeedAlbumTable::class);
        $this->call(SeedPhotosTable::class);
      
    }
}
