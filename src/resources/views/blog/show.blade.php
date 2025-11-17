@extends('layouts.app')

@section('title', $blog->title . ' - Innovation Place BD Limited')

@section('content')
    <article class="py-16">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <header class="mb-8">
                <div class="flex items-center space-x-2 mb-4">
                    <a href="{{ route('blog.category', $blog->category) }}" class="bg-blue-100 text-blue-600 px-4 py-2 rounded-full text-sm font-medium hover:bg-blue-200">
                        {{ $blog->category }}
                    </a>
                    <span class="text-gray-500">
                    {{ $blog->published_at->format('F d, Y') }}
                </span>
                </div>
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">{{ $blog->title }}</h1>
                <p class="text-xl text-gray-600">{{ $blog->excerpt }}</p>
            </header>

            <!-- Featured Image -->
            <img src="{{ asset('storage/' . $blog->featured_image) }}" alt="Featured Image">


            <!-- Content -->
            <div class="prose prose-lg max-w-none">
                {!! nl2br(e($blog->content)) !!}
            </div>

            <!-- Share Buttons -->
            <div class="mt-12 pt-8 border-t border-gray-200">
                <h3 class="text-xl font-bold text-gray-900 mb-4">Share this article</h3>
                <div class="flex space-x-4">
                    <a href="#" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition">
                        <i class="fab fa-facebook-f mr-2"></i> Facebook
                    </a>
                    <a href="#" class="bg-blue-400 text-white px-6 py-3 rounded-lg hover:bg-blue-500 transition">
                        <i class="fab fa-twitter mr-2"></i> Twitter
                    </a>
                    <a href="#" class="bg-blue-700 text-white px-6 py-3 rounded-lg hover:bg-blue-800 transition">
                        <i class="fab fa-linkedin-in mr-2"></i> LinkedIn
                    </a>
                </div>
            </div>
        </div>
    </article>

    <!-- Related Posts -->
    @if($relatedPosts->count() > 0)
        <section class="bg-gray-50 py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-8">Related Articles</h2>
                <div class="grid md:grid-cols-3 gap-8">
                    @foreach($relatedPosts as $related)
                        <article class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition">
                            <div class="bg-gradient-to-r from-blue-500 to-purple-500 h-48"></div>
                            <div class="p-6">
                                <div class="flex items-center space-x-2 mb-3">
                        <span class="bg-blue-100 text-blue-600 px-3 py-1 rounded-full text-xs font-medium">
                            {{ $related->category }}
                        </span>
                                    <span class="text-gray-500 text-sm">
                            {{ $related->published_at->format('M d, Y') }}
                        </span>
                                </div>
                                <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $related->title }}</h3>
                                <p class="text-gray-600 mb-4">{{ Str::limit($related->excerpt, 100) }}</p>
                                <a href="{{ route('blog.show', $related) }}" class="text-blue-600 font-medium hover:underline inline-flex items-center">
                                    Read More <i class="fas fa-arrow-right ml-2"></i>
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection
