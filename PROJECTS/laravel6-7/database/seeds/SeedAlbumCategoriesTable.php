<?php

use Illuminate\Database\Seeder;
use LaraCourse\Models\AlbumCategory;
use LaraCourse\Models\User;

class SeedAlbumCategoriesTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cats =
            ['abstract',
                'animals',
                'business',
                'cats',
                'city',
                'food',
                'nightlife',
                'fashion',
                'people',
                'nature',
                'sports',
                'technics',
                'transport',
            ];
        foreach ($cats as $cat){
            AlbumCategory::create(
                [
                     'category_name'=> $cat,
                    'user_id' => User::inRandomOrder()->first()->id
                    
                    ]
                
            );
                
        }
    }
}
