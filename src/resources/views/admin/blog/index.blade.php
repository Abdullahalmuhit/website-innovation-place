@extends('admin.layouts.app')

@section('title', 'Blog Posts')
@section('page-title', 'Manage Blog Posts')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <p class="text-gray-600">Create and manage blog posts</p>
        <a href="{{ route('admin.blog.create') }}" class="bg-primary text-white px-6 py-3 rounded-lg hover:bg-indigo-700 transition font-medium">
            <i class="fas fa-plus mr-2"></i> New Post
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-50 border-b">
            <tr>
                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-900">Title</th>
                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-900">Category</th>
                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-900">Status</th>
                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-900">Date</th>
                <th class="px-6 py-4 text-right text-sm font-semibold text-gray-900">Actions</th>
            </tr>
            </thead>
            <tbody class="divide-y">
            @forelse($posts as $post)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4">
                        <div class="font-semibold text-gray-900">{{ $post->title }}</div>
                        <div class="text-sm text-gray-600">{{ Str::limit($post->excerpt, 60) }}</div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="bg-purple-100 text-purple-600 px-3 py-1 rounded-full text-sm">{{ $post->category->name }}</span>
                    </td>
                    <td class="px-6 py-4">
                        @if($post->is_published)
                            <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-sm">Published</span>
                        @else
                            <span class="bg-gray-100 text-gray-600 px-3 py-1 rounded-full text-sm">Draft</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-gray-600 text-sm">
                        {{ $post->published_at ? $post->published_at->format('M d, Y') : $post->created_at->format('M d, Y') }}
                    </td>
                    <td class="px-6 py-4 text-right space-x-2">
                        @if($post->is_published)
                            <a href="{{ route('blog.show', $post->id) }}" target="_blank" class="text-green-600 hover:text-green-800">
                                <i class="fas fa-eye"></i>
                            </a>
                        @endif
                        <a href="{{ route('admin.blog.edit', $post->id) }}" class="text-blue-600 hover:text-blue-800">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.blog.destroy', $post->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="px-6 py-12 text-center text-gray-500">
                        No blog posts found. <a href="{{ route('admin.blog.create') }}" class="text-primary hover:underline">Create your first post</a>
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $posts->links() }}
    </div>
@endsection
