<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\TeamMember;
use App\Models\BlogPost;
use App\Models\Contact;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'services' => Service::count(),
            'team_members' => TeamMember::count(),
            'blog_posts' => BlogPost::count(),
            'published_posts' => BlogPost::where('is_published', true)->count(),
            'contacts' => Contact::count(),
            'unread_contacts' => Contact::where('is_read', false)->count(),
        ];

        $recent_contacts = Contact::latest()->take(5)->get();
        $recent_posts = BlogPost::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recent_contacts', 'recent_posts'));
    }
}
