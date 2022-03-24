<?php

namespace Database\Seeders;

use Aydin0098\Category\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use phpDocumentor\Reflection\Types\Nullable;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            1 => [
                'id' =>1,
                'title' => 'برنامه نویسی',
                'slug' => 'programing',
                'parent_id' => null

            ],
            2 => [
                'id' =>2,
                'title' => 'اندروید',
                'slug' => 'android',
                'parent_id' => 1
            ],
            3 => [
                'id' =>3,
                'title' => 'وب',
                'slug' => 'web',
                'parent_id' => 1
            ],
            4 => [
                'id' =>4,
                'title' => 'ویندوز',
                'slug' => 'windows',
                'parent_id' => 1
            ],
            5 => [
                'id' =>5,
                'title' => 'گرافیک',
                'slug' => 'graphic',
                'parent_id' => null
            ],
            6 => [
                'id' =>6,
                'title' => 'چند رسانه ای',
                'slug' => 'multimedia',
                'parent_id' => null
            ],
            7 => [
                'id' =>7,
                'title' => 'فیلم و صدا',
                'slug' => 'movie and sound',
                'parent_id' => 6
            ],
            8 => [
                'id' =>8,
                'title' => 'بازی سازی',
                'slug' => 'game',
                'parent_id' => 6
            ],

        ];

        foreach ($categories as $category){
            $check = Category::where('title',$category['title'])->first();
            if (!$check){
                Category::create([
                    'title' => $category['title'],
                    'slug' => $category['slug'],
                    'parent_id' => $category['parent_id'],
                ]);
            }
        }
    }
}
