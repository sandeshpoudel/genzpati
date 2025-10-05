<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("categories")->insert([
            [
                'name' => 'Technology',
                'slug' => 'technology',
                'description' => 'All about the latest in tech.',
            ],
            [
                'name' => 'Health',
                'slug' => 'health',
                'description' => 'Health tips and news.',
            ],
            [
                'name' => 'Travel',
                'slug' => 'travel',
                'description' => 'Travel guides and experiences.',
            ],
            [
                'name' => 'Food',
                'slug' => 'food',
                'description' => 'Delicious recipes and food reviews.',
            ],
            [
                'name' => 'Lifestyle',
                'slug' => 'lifestyle',
                'description' => 'Tips for a better lifestyle.',
            ],
        ]);
    }
}
