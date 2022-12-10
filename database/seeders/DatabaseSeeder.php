<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Lesson;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
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
            'name' => 'admin',
            'username' => 'admin',
            'family' => 'admin',
            'phone' => '09024510129',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'isAdmin' => 1,
            'password' => Hash::make('Power@110#') , // password
            'remember_token' => Str::random(10),
        ]);

        \App\Models\User::factory()->create([
            'name' => 'student',
            'username' => 'student',
            'family' => 'student',
            'phone' => '09024510128',
            'email' => 'student@gmail.com',
            'email_verified_at' => now(),
            'isAdmin' => 0,
            'password' => Hash::make('Power@110#') , // password
            'remember_token' => Str::random(10),
        ]);

        \App\Models\Language::factory()->create([
            'title' => 'Persian',
            'language' => 'fa',
            'dir' => 'rtl'
        ]);

        \App\Models\Language::factory()->create([
            'title' => 'France',
            'language' => 'fr',
            'dir' => 'ltr'
        ]);

        \App\Models\Language::factory()->create([
            'title' => 'Arabic',
            'language' => 'ar',
            'dir' => 'rtl'
        ]);


         Lesson::factory(20)->create();

    }
}
