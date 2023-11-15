<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            'user_id'=>'001',
            'nama'=>'Rushel',
            'email'=>'Rushel@gmail.com',
            'password'=> Hash::make('123'),
        ]);
    }
}
