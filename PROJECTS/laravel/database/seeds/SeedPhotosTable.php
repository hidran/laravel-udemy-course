<?php

use Illuminate\Database\Seeder;
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
       
        factory(LaraCourse\Models\Photo::class, 200)->create();
    }
}
