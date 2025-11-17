<!-- resources/views/blog/index.blade.php -->
@extends('layouts.app')

@section('title', 'Blog - Innovation Place BD Limited')

@section('content')
    <!-- Hero Header with Background Image -->
    <div class="relative overflow-hidden py-32">
        <!-- Background Image -->
        <div class="absolute inset-0">
            <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1499750310107-5fef28a66643?ixlib=rb-4.0.3&auto=format&fit=crop&w=2850&q=80');"></div>
            <!-- Dark Gradient Overlay -->
            <div class="absolute inset-0 bg-gradient-to-br from-blue-900/95 via-purple-900/90 to-indigo-900/95"></div>
            <!-- Pattern Overlay -->
            <div class="absolute inset-0 opacity-10">
                <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'0.4\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <h1 class="text-5xl md:text-6xl font-extrabold text-white mb-6 leading-tight">Our Blog</h1>
            <p class="text-xl md:text-2xl text-white/90 max-w-3xl mx-auto">Insights, updates, and tech stories from our team</p>

            <!-- Search Bar -->
            <div class="mt-10 max-w-2xl mx-auto">
                <div class="relative">
                    <input type="text" placeholder="Search articles..." class="w-full px-6 py-4 rounded-full text-gray-900 shadow-2xl focus:ring-4 focus:ring-white/50 transition">
                    <button class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-primary text-white px-6 py-2 rounded-full hover:bg-indigo-700 transition">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid lg:grid-cols-3 gap-10">
            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-12">
                @forelse($blogs as $blog)
                    <article class="group bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                        <div class="md:flex">
                            <!-- Image Section -->
                            <div class="md:w-2/5 relative overflow-hidden h-64 md:h-auto">
                                @if($blog->featured_image)
                                    <img src="{{ asset('storage/' . $blog->featured_image) }}" alt="{{ $blog->title }}" class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                @else
                                    <div class="absolute inset-0 bg-gradient-to-br from-blue-400 via-purple-500 to-pink-500"></div>
                                    <div class="absolute inset-0 flex items-center justify-center">
                                        <i class="fas fa-{{ $blog->category->name == 'Technology' ? 'microchip' : ($blog->category->name == 'Development' ? 'code' : 'paint-brush') }} text-8xl text-white opacity-30 group-hover:scale-110 transition-transform duration-500"></i>
                                    </div>
                                @endif
                                <!-- Category Badge on Image -->
                                <div class="absolute top-4 left-4 z-10">
                                    <a href="{{ route('blog.category', $blog->category_id) }}" class="bg-white/90 backdrop-blur-sm text-primary px-4 py-2 rounded-full text-sm font-bold hover:bg-white transition shadow-lg">
                                        {{ $blog->category->name }}
                                    </a>
                                </div>
                            </div>

                            <!-- Content Section -->
                            <div class="md:w-3/5 p-8 flex flex-col justify-between">
                                <div>
                                    <div class="flex items-center space-x-4 text-sm text-gray-500 mb-4">
                                <span class="flex items-center">
                                    <i class="far fa-calendar mr-2"></i>
                                    {{ $blog->published_at->format('M d, Y') }}
                                </span>
                                        <span class="flex items-center">
                                    <i class="far fa-clock mr-2"></i>
                                    5 min read
                                </span>
                                    </div>

                                    <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4 group-hover:text-primary transition">
                                        <a href="{{ route('blog.show', $blog->id) }}">{{ $blog->title }}</a>
                                    </h2>

                                    <p class="text-gray-600 leading-relaxed mb-6">{{ $blog->excerpt }}</p>
                                </div>

                                <div class="flex items-center justify-between">
                                    <a href="{{ route('blog.show', $blog) }}" class="inline-flex items-center text-primary font-semibold hover:gap-3 gap-2 transition-all group">
                                        Read Full Article
                                        <i class="fas fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
                                    </a>

                                    <!-- Social Share Icons -->
                                    <div class="flex space-x-2">
                                        <button class="w-8 h-8 rounded-full bg-gray-100 hover:bg-blue-100 text-gray-600 hover:text-blue-600 transition flex items-center justify-center">
                                            <i class="fab fa-twitter text-sm"></i>
                                        </button>
                                        <button class="w-8 h-8 rounded-full bg-gray-100 hover:bg-blue-100 text-gray-600 hover:text-blue-600 transition flex items-center justify-center">
                                            <i class="fab fa-linkedin text-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="text-center py-20">
                        <div class="w-32 h-32 mx-auto mb-6 bg-gray-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-inbox text-5xl text-gray-300"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-2">No blog posts found</h3>
                        <p class="text-gray-600">Check back soon for new content!</p>
                    </div>
                @endforelse

                <!-- Pagination -->
                <div class="flex justify-center mt-12">
                    {{ $blogs->links() }}
                </div>
            </div>

            <!-- Sidebar -->
            <div class="space-y-8">
                <!-- Categories Card -->
                <div class="bg-white rounded-2xl shadow-lg p-8 border border-gray-100">
                    <div class="flex items-center mb-6">
                        <div class="w-10 h-10 bg-primary/10 rounded-lg flex items-center justify-center mr-3">
                            <i class="fas fa-folder-open text-primary text-lg"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900">Categories</h3>
                    </div>
                    <div class="space-y-3">
                        @foreach($categories as $category)
                            <a href="{{ route('blog.category', $category->id) }}" class="flex items-center justify-between px-4 py-3 rounded-xl hover:bg-primary/5 text-gray-700 hover:text-primary transition group">
                        <span class="font-medium flex items-center">
                            <i class="fas fa-tag mr-3 text-primary/50 group-hover:text-primary transition"></i>
                            {{ $category->name }}
                        </span>
                                <i class="fas fa-arrow-right text-gray-400 group-hover:text-primary group-hover:translate-x-1 transition-all"></i>
                            </a>
                        @endforeach
                    </div>
                </div>

                <!-- Recent Posts Card -->
                <div class="bg-white rounded-2xl shadow-lg p-8 border border-gray-100">
                    <div class="flex items-center mb-6">
                        <div class="w-10 h-10 bg-secondary/10 rounded-lg flex items-center justify-center mr-3">
                            <i class="fas fa-clock text-secondary text-lg"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900">Recent Posts</h3>
                    </div>
                    <div class="space-y-5">
                        @foreach($blogs->take(5) as $recent)
                            <a href="{{ route('blog.show', $recent->id) }}" class="block group">
                                <div class="flex space-x-4">
                                    <div class="flex-shrink-0 w-16 h-16 rounded-lg overflow-hidden">
                                        @if($recent->featured_image)
                                            <img src="{{ asset('storage/' . $recent->featured_image) }}" alt="{{ $recent->title }}" class="w-full h-full object-cover">
                                        @else
                                            <div class="w-full h-full bg-gradient-to-br from-primary to-purple-600 flex items-center justify-center">
                                                <i class="fas fa-newspaper text-white text-xl"></i>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <h4 class="font-semibold text-gray-900 group-hover:text-primary mb-1 line-clamp-2 transition">
                                            {{ Str::limit($recent->title, 60) }}
                                        </h4>
                                        <p class="text-sm text-gray-500 flex items-center">
                                            <i class="far fa-calendar mr-1"></i>
                                            {{ $recent->published_at->format('M d, Y') }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>

                <!-- Newsletter Card -->
                <div class="relative overflow-hidden bg-gradient-to-br from-blue-600 via-purple-600 to-pink-600 rounded-2xl shadow-2xl p-8 text-white">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-full -mr-16 -mt-16"></div>
                    <div class="absolute bottom-0 left-0 w-24 h-24 bg-white/10 rounded-full -ml-12 -mb-12"></div>

                    <div class="relative z-10">
                        <div class="w-16 h-16 bg-white/20 rounded-2xl flex items-center justify-center mb-6">
                            <i class="fas fa-envelope text-3xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold mb-3">Stay Updated</h3>
                        <p class="text-white/90 mb-6">Subscribe to get our latest blog posts and tech insights delivered to your inbox.</p>
                        <form class="space-y-3">
                            <input type="email" placeholder="Enter your email" class="w-full px-5 py-3 rounded-xl text-gray-900 placeholder-gray-500 focus:ring-4 focus:ring-white/30 transition">
                            <button type="submit" class="w-full bg-white text-primary px-6 py-3 rounded-xl font-bold hover:shadow-xl transition transform hover:scale-105">
                                Subscribe Now
                            </button>
                        </form>
                        <p class="text-xs text-white/70 mt-4 text-center">
                            <i class="fas fa-lock mr-1"></i> We respect your privacy
                        </p>
                    </div>
                </div>

                <!-- Popular Tags -->
                <div class="bg-white rounded-2xl shadow-lg p-8 border border-gray-100">
                    <div class="flex items-center mb-6">
                        <div class="w-10 h-10 bg-green-500/10 rounded-lg flex items-center justify-center mr-3">
                            <i class="fas fa-hashtag text-green-500 text-lg"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900">Popular Tags</h3>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-4 py-2 bg-gray-100 hover:bg-primary hover:text-white rounded-full text-sm font-medium text-gray-700 cursor-pointer transition">Laravel</span>
                        <span class="px-4 py-2 bg-gray-100 hover:bg-primary hover:text-white rounded-full text-sm font-medium text-gray-700 cursor-pointer transition">PHP</span>
                        <span class="px-4 py-2 bg-gray-100 hover:bg-primary hover:text-white rounded-full text-sm font-medium text-gray-700 cursor-pointer transition">React</span>
                        <span class="px-4 py-2 bg-gray-100 hover:bg-primary hover:text-white rounded-full text-sm font-medium text-gray-700 cursor-pointer transition">Vue.js</span>
                        <span class="px-4 py-2 bg-gray-100 hover:bg-primary hover:text-white rounded-full text-sm font-medium text-gray-700 cursor-pointer transition">DevOps</span>
                        <span class="px-4 py-2 bg-gray-100 hover:bg-primary hover:text-white rounded-full text-sm font-medium text-gray-700 cursor-pointer transition">AI</span>
                        <span class="px-4 py-2 bg-gray-100 hover:bg-primary hover:text-white rounded-full text-sm font-medium text-gray-700 cursor-pointer transition">Mobile</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

