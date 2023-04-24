<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        DB::table('users')->insert([
            'username' => 'ExRyze',
            'email' => 'ichianime4@gmail.com',
            'password' => bcrypt('123'),
            'role' => 'Admin'
        ]);

        // DB::table('animes')->insert([
        //     [
        //     'title' => Str::random(10),
        //     'slug' => Str::random(10),
        //     'episodes' => 0,
        //     'duration' => 0,
        //     'type' => 'TV',
        //     'status' => 'Not yet aired',
        //     'source' => 'Original',
        //     'date_aired' => date('Y-m-d'),
        //     'date_finished' => date('Y-m-d'),
        //     'description' => Str::random(10),
        //     ],
        //     [
        //     'title' => Str::random(10),
        //     'slug' => Str::random(10),
        //     'episodes' => 0,
        //     'duration' => 0,
        //     'type' => 'TV',
        //     'status' => 'Not yet aired',
        //     'source' => 'Original',
        //     'date_aired' => date('Y-m-d'),
        //     'date_finished' => date('Y-m-d'),
        //     'description' => Str::random(10),
        //     ],
        //     [
        //     'title' => Str::random(10),
        //     'slug' => Str::random(10),
        //     'episodes' => 0,
        //     'duration' => 0,
        //     'type' => 'TV',
        //     'status' => 'Not yet aired',
        //     'source' => 'Original',
        //     'date_aired' => date('Y-m-d'),
        //     'date_finished' => date('Y-m-d'),
        //     'description' => Str::random(10),
        //     ],
        //     [
        //     'title' => Str::random(10),
        //     'slug' => Str::random(10),
        //     'episodes' => 0,
        //     'duration' => 0,
        //     'type' => 'TV',
        //     'status' => 'Not yet aired',
        //     'source' => 'Original',
        //     'date_aired' => date('Y-m-d'),
        //     'date_finished' => date('Y-m-d'),
        //     'description' => Str::random(10),
        //     ],
        //     [
        //     'title' => Str::random(10),
        //     'slug' => Str::random(10),
        //     'episodes' => 0,
        //     'duration' => 0,
        //     'type' => 'TV',
        //     'status' => 'Not yet aired',
        //     'source' => 'Original',
        //     'date_aired' => date('Y-m-d'),
        //     'date_finished' => date('Y-m-d'),
        //     'description' => Str::random(10),
        //     ],
        //     [
        //     'title' => Str::random(10),
        //     'slug' => Str::random(10),
        //     'episodes' => 0,
        //     'duration' => 0,
        //     'type' => 'TV',
        //     'status' => 'Not yet aired',
        //     'source' => 'Original',
        //     'date_aired' => date('Y-m-d'),
        //     'date_finished' => date('Y-m-d'),
        //     'description' => Str::random(10),
        //     ],
        //     [
        //     'title' => Str::random(10),
        //     'slug' => Str::random(10),
        //     'episodes' => 0,
        //     'duration' => 0,
        //     'type' => 'TV',
        //     'status' => 'Not yet aired',
        //     'source' => 'Original',
        //     'date_aired' => date('Y-m-d'),
        //     'date_finished' => date('Y-m-d'),
        //     'description' => Str::random(10),
        //     ],
        //     [
        //     'title' => Str::random(10),
        //     'slug' => Str::random(10),
        //     'episodes' => 0,
        //     'duration' => 0,
        //     'type' => 'TV',
        //     'status' => 'Not yet aired',
        //     'source' => 'Original',
        //     'date_aired' => date('Y-m-d'),
        //     'date_finished' => date('Y-m-d'),
        //     'description' => Str::random(10),
        //     ],
        //     [
        //     'title' => Str::random(10),
        //     'slug' => Str::random(10),
        //     'episodes' => 0,
        //     'duration' => 0,
        //     'type' => 'TV',
        //     'status' => 'Not yet aired',
        //     'source' => 'Original',
        //     'date_aired' => date('Y-m-d'),
        //     'date_finished' => date('Y-m-d'),
        //     'description' => Str::random(10),
        //     ],
        //     [
        //     'title' => Str::random(10),
        //     'slug' => Str::random(10),
        //     'episodes' => 0,
        //     'duration' => 0,
        //     'type' => 'TV',
        //     'status' => 'Not yet aired',
        //     'source' => 'Original',
        //     'date_aired' => date('Y-m-d'),
        //     'date_finished' => date('Y-m-d'),
        //     'description' => Str::random(10),
        //     ],
        // ]);
    }
}
