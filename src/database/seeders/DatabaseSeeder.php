<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;
use App\Models\TeamMember;
use App\Models\BlogPost;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Services
        Service::create([
            'title' => 'Custom Software Development',
            'description' => 'Tailored solutions built with cutting-edge technologies to meet your unique business needs.',
            'icon' => 'code',
            'order' => 1
        ]);

        Service::create([
            'title' => 'Mobile App Development',
            'description' => 'Native and cross-platform mobile applications for iOS and Android platforms.',
            'icon' => 'smartphone',
            'order' => 2
        ]);

        Service::create([
            'title' => 'Web Development',
            'description' => 'Responsive, scalable web applications using modern frameworks like Laravel and React.',
            'icon' => 'globe',
            'order' => 3
        ]);

        Service::create([
            'title' => 'Database Solutions',
            'description' => 'Robust database architecture and optimization for maximum performance and security.',
            'icon' => 'database',
            'order' => 4
        ]);

        // Team Members
        TeamMember::create([
            'name' => 'Ahmed Hassan',
            'role' => 'CEO & Founder',
            'bio' => 'Visionary leader with 10+ years in software development.',
            'email' => 'ahmed@innovationplace.bd',
            'order' => 1
        ]);

        TeamMember::create([
            'name' => 'Fatima Rahman',
            'role' => 'CTO',
            'bio' => 'Technology expert specializing in scalable architectures.',
            'email' => 'fatima@innovationplace.bd',
            'order' => 2
        ]);

        TeamMember::create([
            'name' => 'Karim Ahmed',
            'role' => 'Lead Developer',
            'bio' => 'Full-stack developer with expertise in Laravel and Vue.js.',
            'email' => 'karim@innovationplace.bd',
            'order' => 3
        ]);

        TeamMember::create([
            'name' => 'Nadia Islam',
            'role' => 'UI/UX Designer',
            'bio' => 'Creative designer focused on user-centered design principles.',
            'email' => 'nadia@innovationplace.bd',
            'order' => 4
        ]);

        // Blog Posts
        BlogPost::create([
            'title' => 'The Future of AI in Bangladesh',
            'slug' => 'future-of-ai-in-bangladesh',
            'excerpt' => 'Exploring how artificial intelligence is transforming local businesses.',
            'content' => 'Full article content here...',
            'category' => 'Technology',
            'is_published' => true,
            'published_at' => now()
        ]);

        BlogPost::create([
            'title' => 'Laravel Best Practices 2025',
            'slug' => 'laravel-best-practices-2025',
            'excerpt' => 'Essential coding standards for building scalable Laravel applications.',
            'content' => 'Full article content here...',
            'category' => 'Development',
            'is_published' => true,
            'published_at' => now()->subDays(5)
        ]);

        BlogPost::create([
            'title' => 'Mobile-First Design Strategy',
            'slug' => 'mobile-first-design-strategy',
            'excerpt' => 'Why mobile-first approach is critical for success in Bangladesh.',
            'content' => 'Full article content here...',
            'category' => 'Design',
            'is_published' => true,
            'published_at' => now()->subDays(18)
        ]);
    }
}
