<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            Category::create(['name' => 'Technology', 'slug' => 'technology']);
            Category::create(['name' => 'Development', 'slug' => 'development']);
            Category::create(['name' => 'Design', 'slug' => 'design']);
    }
}
