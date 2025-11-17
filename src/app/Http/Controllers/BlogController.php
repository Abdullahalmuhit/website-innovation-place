<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogPost;


class BlogController extends Controller
{
    public function index()
    {
        $blogs = BlogPost::published()->paginate(9);
        $categories = BlogPost::where('is_published', true)
            ->whereNotNull('published_at')
            ->select('category')
            ->distinct()
            ->orderBy('category')
            ->pluck('category');

        return view('blog.index', compact('blogs', 'categories'));
    }

    public function show(BlogPost $blog)
    {
        if (!$blog->is_published) {
            abort(404);
        }

        $relatedPosts = BlogPost::published()
            ->where('category', $blog->category)
            ->where('id', '!=', $blog->id)
            ->take(3)
            ->get();

        return view('blog.show', compact('blog', 'relatedPosts'));
    }

    public function category($category)
    {
        $blogs = BlogPost::published()
            ->where('category', $category)
            ->paginate(9);

        return view('blog.category', compact('blogs', 'category'));
    }
}
