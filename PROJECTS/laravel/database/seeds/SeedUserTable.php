<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use LaraCourse\User;

class SeedUserTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
      $users =factory(LaraCourse\User::class, 30)->create();
      
    }
     
}
