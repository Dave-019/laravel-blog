<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category; // Make sure to import the Category model

class CategorySeeder extends Seeder
{
    public function run()
    {
        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);
        
        // Add more if you like
        Category::create([
            'name' => 'Work',
            'slug' => 'work'
        ]);
    }
}