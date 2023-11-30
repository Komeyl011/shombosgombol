<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Comics;
use App\Models\ComicsTitles;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
//        ComicsTitles::factory()->create([
//            'title' => 'Misa Adventures',
//            'cover' => 'MISA-P01.png',
//        ]);
        Comics::factory()->create([
            'title_id' => 1,
            'page' => 02,
            'image' => 'MISA-P02.png',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
