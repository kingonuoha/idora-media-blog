<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\SubCategory;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       $user =  \App\Models\User::factory(8)->create();
    //    $category =  \App\Models\Category::factory(3)->has(SubCategory::factory()->has(
    //     Post::factory()->count(12)))
    //    ->create();
        // \App\Models\SubCategory::factory(10) ->count(3)->for($category);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@idora.com',
        //     'email_verified_at' => now(),
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        //     'two_factor_secret' => null,
        //     'two_factor_recovery_codes' => null,
        //     'remember_token' => Str::random(10),
        //     'role' => 1,
        //     'profile_photo_path' => null,
        //     'current_team_id' => null,
        // ]);
        // \App\Models\BlogSetting::factory()->create([
        //    'title' => "email",
        //    'content'=> "kingonuoha01@gmail.com"
        // ]);
    }
}
