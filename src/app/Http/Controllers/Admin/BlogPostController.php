<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\BlogTag;
use App\Models\Category;
use App\Models\Tag;
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
        $data['categories'] = Category::where('active', 1)->get();
        $data['tags'] = Tag::where('active', 1)->get();
        return view('admin.blog.create', $data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'required|string|max:500',
            'content' => 'required|string',
            'category_id' => 'required|max:100',
            'tag_id' => 'required|array',          // Validate tags as an array
            'tag_id.*' => 'exists:tags,id',        // Each tag must exist
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

        $blogPost = BlogPost::create($validated);

        foreach ($request->tag_id as $tagId) {
            BlogTag::create([
                'blog_post_id' => $blogPost->id,
                'tag_id' => $tagId,
            ]);
        }

        return redirect()->route('admin.blog.index')
            ->with('success', 'Blog post created successfully');
    }

    public function edit($id)
    {
        $data['categories'] = Category::where('active', 1)->get();
        $data['post']  = BlogPost::find($id);
        $data['tags'] = Tag::where('active', 1)->get();
        $data['selectedTagIds'] = BlogTag::where('blog_post_id', $id)->pluck('tag_id')->toArray();
        return view('admin.blog.edit', $data);
    }

    public function update(Request $request, $id)
    {

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'required|string|max:500',
            'content' => 'required|string',
            'category_id' => 'required|max:100',
            'tag_id' => 'required|array',
            'tag_id.*' => 'exists:tags,id',
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

        BlogTag::where('blog_post_id', $post->id)->delete();

        foreach ($request->tag_id as $tagId) {
            BlogTag::create([
                'blog_post_id' => $post->id,
                'tag_id' => $tagId,
            ]);
        }

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
