<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Lesson;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create([
            'name' => 'amir',
            'username' => 'amirhashimi',
            'family' => 'hashimi',
            'phone' => '09024510129',
            'email' => 'amyrhashimi@gmail.com',
            'email_verified_at' => now(),
            'isAdmin' => 1,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);

         \App\Models\User::factory(10)->create();
         Lesson::factory(20)->create();

    }
}
