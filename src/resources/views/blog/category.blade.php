@extends('layouts.app')

@section('title', $category . ' - Blog - Innovation Place BD Limited')

@section('content')
    <div class="bg-gradient-to-r from-blue-600 to-purple-600 py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
            <h1 class="text-5xl font-bold mb-4">{{ $category }}</h1>
            <p class="text-xl">Browse all articles in this category</p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="mb-8">
            <a href="{{ route('blog.index') }}" class="text-blue-600 hover:underline">
                <i class="fas fa-arrow-left mr-2"></i> Back to all posts
            </a>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($blogs as $blog)
                <article class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition">
                    <div >
                    <img src="{{ asset('storage/' . $blog->featured_image) }}" class="bg-gradient-to-r from-blue-500 to-purple-500 h-48" >
                    </div>
                    <div class="p-6">
                        <div class="flex items-center space-x-2 mb-3">
                    <span class="bg-blue-100 text-blue-600 px-3 py-1 rounded-full text-xs font-medium">
                        {{ $blog->category }}
                    </span>
                            <span class="text-gray-500 text-sm">
                        {{ $blog->published_at->format('M d, Y') }}
                    </span>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-900 mb-3 hover:text-blue-600">
                            <a href="{{ route('blog.show', $blog) }}">{{ $blog->title }}</a>
                        </h2>
                        <p class="text-gray-600 mb-4">{{ $blog->excerpt }}</p>
                        <a href="{{ route('blog.show', $blog) }}" class="text-blue-600 font-medium hover:underline inline-flex items-center">
                            Read More <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </article>
            @empty
                <div class="col-span-3 text-center py-12">
                    <i class="fas fa-inbox text-6xl text-gray-300 mb-4"></i>
                    <p class="text-xl text-gray-600">No posts found in this category</p>
                </div>
            @endforelse
        </div>

        <div class="mt-12">
            {{ $blogs->links() }}
        </div>
    </div>
@endsection
