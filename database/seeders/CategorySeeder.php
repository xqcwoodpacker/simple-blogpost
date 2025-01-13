<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $categories = Collect([
            ['name' => 'Asstrology'],
            ['name' => 'Business'],
            ['name' => 'Entertainment'],
            ['name' => 'Technology'],
            ['name' => 'Computer'],
            ['name' => 'Programming'],
            ['name' => 'Web Development'],
            ['name' => 'Mobile Development'],
            ['name' => 'Game Development'],
            ['name' => 'Software Development'],
            ['name' => 'Data Science'],
            ['name' => 'Machine Learning'],
            ['name' => 'Artificial Intelligence'],
            ['name' => 'Cybersecurity'],
            ['name' => 'Blockchain'],
            ['name' => 'Cloud Computing'],
        ])->map(fn ($category) => Category::create($category));


        // Category::create([

        // ]);
    }
}
