<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            Tag::create(['name' => 'AI', 'slug' => 'ai']);
            Tag::create(['name' => 'Laravel', 'slug' => 'laravel']);
            Tag::create(['name' => 'Mobile', 'slug' => 'mobile']);
            Tag::create(['name' => 'UI/UX', 'slug' => 'ui-ux']);
    }
}
