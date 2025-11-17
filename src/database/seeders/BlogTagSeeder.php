<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ai = Tag::where('slug', 'ai')->first();
        $laravel = Tag::where('slug', 'laravel')->first();
        $mobile = Tag::where('slug', 'mobile')->first();
        $uiux = Tag::where('slug', 'ui-ux')->first();

        $post1 = BlogPost::where('slug', 'future-of-ai-in-bangladesh')->first();
        $post2 = BlogPost::where('slug', 'laravel-best-practices-2025')->first();
        $post3 = BlogPost::where('slug', 'mobile-first-design-strategy')->first();

        // Attach tags correctly
        $post1->tags()->attach([$ai->id]);
        $post2->tags()->attach([$laravel->id]);
        $post3->tags()->attach([$mobile->id, $uiux->id]);
    }
}
