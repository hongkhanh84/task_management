<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    const DEFAULT_PASSWORD = "Aa123456@";

    public function run(): void
    {
        User::create([
            'name' => 'ADMIN',
            'email' => 'admin@gmail.com',
            'password' => bcrypt(self::DEFAULT_PASSWORD),
            'remember_token' => Str::random(60),
            'role' => 'admin',
        ]);
        User::create([
            'name' => 'Manager 1',
            'email' => 'manager1@gmail.com',
            'password' => bcrypt(self::DEFAULT_PASSWORD),
            'remember_token' => Str::random(60),
            'role' => 'manager', 
        ]);
        User::create([
            'name' => 'Staff 1',
            'email' => 'staff1@gmail.com',
            'password' => bcrypt(self::DEFAULT_PASSWORD),
            'remember_token' => Str::random(60),
            'role' => 'staff', 
        ]);

        Status::create([
            'status_name' => 'Not Start',
        ]);
        Status::create([
            'status_name' => 'In Process',
        ]);
        Status::create([
            'status_name' => 'Pending',
        ]);
        Status::create([
            'status_name' => 'Done',
        ]);
    }
}
