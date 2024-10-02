<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 100; $i++) {
            DB::table('posts')->insert([
                'category_id' => rand(1, 4),
                'title' => fake()->text(30),
                'image' => fake()->imageUrl(),
                'description' => fake()->paragraph(1),
                'content' => fake()->paragraph(),
            ]);
        }
    }
}
