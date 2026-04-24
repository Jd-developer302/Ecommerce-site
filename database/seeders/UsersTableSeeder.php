<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => fake()->name(),
            'email' => 'winscart@email.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'remember_token' => 'fddddddddddddjbh87678756965',
        ]);
    }
}
