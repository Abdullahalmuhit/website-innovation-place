<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage; // make sure to import this


class BlogPostController extends Controller
{
    public function index()
    {
        $posts = BlogPost::latest()->paginate(15);
        return view('admin.blog.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.blog.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'required|string|max:500',
            'content' => 'required|string',
            'category' => 'required|string|max:100',
            'is_published' => 'boolean',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $validated['slug'] = Str::slug($validated['title']);

        if ($request->is_published) {
            $validated['published_at'] = now();
        }

        if ($request->hasFile('featured_image')) {
            $path = $request->file('featured_image')->store('blog_images', 'public');
            $validated['featured_image'] = $path;
        }



        BlogPost::create($validated);

        return redirect()->route('admin.blog.index')
            ->with('success', 'Blog post created successfully');
    }

    public function edit($id)
    {
        $post = BlogPost::find($id);
        return view('admin.blog.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'required|string|max:500',
            'content' => 'required|string',
            'category' => 'required|string|max:100',
            'is_published' => 'boolean',
        ]);

        $validated['slug'] = Str::slug($validated['title']);

        $post = BlogPost::find($id);

        if ($request->is_published && !$post->published_at) {
            $validated['published_at'] = now();
        } elseif (!$request->is_published) {
            $validated['published_at'] = null;
        }

        // Upload new image if provided
        if ($request->hasFile('featured_image')) {
            $path = $request->file('featured_image')->store('blog_images', 'public');
            $validated['featured_image'] = $path;
        }

        $post->update($validated);

        return redirect()->route('admin.blog.index')
            ->with('success', 'Blog post updated successfully');
    }

    public function destroy($id)
    {
        $post = BlogPost::find($id);
        $post->delete();
        return redirect()->route('admin.blog.index')
            ->with('success', 'Blog post deleted successfully');
    }
}
