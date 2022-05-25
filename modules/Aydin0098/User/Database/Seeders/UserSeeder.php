<?php

namespace Aydin0098\User\Database\Seeders;

use Aydin0098\Category\Models\Category;
use Aydin0098\User\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            1 => [
                'name' => 'aydin0098',
                'email' => 'aydin.s.hagighy@gmail.com',
                'password' => '123456789',
                'email_verified_at' => now(),
                'status' => 'active'
            ]
        ];
        foreach ($users as $user) {
            $check = User::where('name', $user['name'])->first();
            if (!$check) {
                User::create([
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'password' => Hash::make($user['password']),
                    'email_verified_at' => now(),
                    'status' => $user['status'],
                ]);
            }
        }
    }
}
