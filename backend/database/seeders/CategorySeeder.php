<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Szemes kávé',
            'slug' => 'szemes-kave',
        ]);

        Category::create([
            'name' => 'Őrölt kávé',
            'slug' => 'orolt-kave',
        ]);

        Category::create([
            'name' => 'Tea',
            'slug' => 'tea',
        ]);

        Category::create([
            'name' => 'Kiegészítők',
            'slug' => 'kiegeszitok',
        ]);
    }
}
