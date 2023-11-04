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
        $categories = [
            [
                'title' => 'Category 1',
                'description' => 'Description 1',
                'parent_id' => NULL,
            ],
            [
                'title' => 'Child Category 1',
                'description' => 'Child Category 1',
                'parent_id' => 1,
            ],
            [
                'title' => 'Child Category 2',
                'description' => 'Description 2',
                'parent_id' => 1,
            ],
            [
                'title' => 'Sub Child Category 1',
                'description' => 'Sub Child Category 1',
                'parent_id' => 2,
            ],
            [
                'title' => 'Sub Child Category 2',
                'description' => 'Sub Child Category 2',
                'parent_id' => 2,
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
