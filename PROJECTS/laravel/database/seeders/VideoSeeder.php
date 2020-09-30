<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use LaraCourse\Models\Video;
class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Video::factory(4)->create();
    }
}
