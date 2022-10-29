<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(50)->hasArticles(1)->create();

        User::factory()->create([
            'id' => 101,
            'name' => 'Super Admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make(12341234),
        ]);
    }
}
