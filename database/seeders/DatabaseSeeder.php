<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    public static $seeders = [];

    public function run()
    {
        foreach (self::$seeders as $seeder){
            $this->call($seeder);
        }
//        $this->call(UserSeeder::class);
//        $this->call(CategorySeeder::class);
        // \Aydin0098\User\Models\User::factory(10)->create();
    }
}
