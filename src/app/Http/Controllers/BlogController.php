<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\BlogPost;


class BlogController extends Controller
{
    public function index()
    {
        $blogs = BlogPost::published()->paginate(9);
        $categories = BlogPost::where('is_published', true)
            ->whereNotNull('published_at')
            ->with('category')->get();

        return view('blog.index', compact('blogs', 'categories'));
    }

    public function show($id)
    {
        $blog = BlogPost::find($id);
        if (!$blog->is_published) {
            abort(404);
        }

        $relatedPosts = BlogPost::published()
            ->where('category_id', $blog->category->id)
            ->where('id', '!=', $blog->id)
            ->take(3)
            ->get();

        return view('blog.show', compact('blog', 'relatedPosts'));
    }

    public function category($id)
    {
        $category = Category::where('id', $id)->firstOrFail();
        $blogs = BlogPost::published()
            ->where('category_id', $id)
            ->paginate(9);


        return view('blog.category', compact('blogs', 'category'));
    }
}
