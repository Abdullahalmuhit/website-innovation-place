<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\TeamMember;
use App\Models\BlogPost;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::active()->get();
        $team = TeamMember::ordered()->get();
        $blogs = BlogPost::published()->take(3)->get();

        return view('home', compact('services', 'team', 'blogs'));
    }
}
