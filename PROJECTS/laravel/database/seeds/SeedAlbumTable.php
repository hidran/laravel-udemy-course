<?php

use Illuminate\Database\Seeder;
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
     
           factory(LaraCourse\Models\Album::class,10)->create();
     }
}
