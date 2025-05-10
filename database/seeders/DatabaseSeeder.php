<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@example.com',
            'password' => bcrypt('123456'),
            'role_id' => 1,
        ]);
        
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('123456'),
            'role_id' => 2,
        ]);
        
        User::create([
            'name' => 'Tourist',
            'email' => 'tourist@example.com',
            'password' => bcrypt('123456'),
            'role_id' => 3,
        ]);
        

    }
}
