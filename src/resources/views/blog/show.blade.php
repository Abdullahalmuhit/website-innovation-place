@extends('layouts.app')

@section('title', $blog->title . ' - Innovation Place BD Limited')

@section('content')
    <!-- Hero Section with Parallax Effect -->
    <article class="relative">
        <!-- Featured Image Header -->
        <div class="relative h-96 bg-gradient-to-br from-blue-500 via-purple-600 to-pink-600 overflow-hidden">
            <div class="absolute inset-0 opacity-20">
                <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'0.4\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
            </div>

            <!-- Breadcrumb -->
            <div class="absolute top-24 left-0 right-0 z-10">
                <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                    <nav class="flex items-center space-x-2 text-white/80 text-sm mb-6">
                        <a href="{{ route('home') }}" class="hover:text-white transition">Home</a>
                        <i class="fas fa-chevron-right text-xs"></i>
                        <a href="{{ route('blog.index') }}" class="hover:text-white transition">Blog</a>
                        <i class="fas fa-chevron-right text-xs"></i>
                        <span class="text-white">{{ Str::limit($blog->title, 30) }}</span>
                    </nav>
                </div>
            </div>

            <!-- Category & Meta -->
            <div class="absolute inset-0 flex items-center justify-center">
                <div class="text-center text-white px-4">
                    <a href="{{ route('blog.category', $blog->category) }}" class="inline-block bg-white/20 backdrop-blur-sm border border-white/30 px-6 py-2 rounded-full text-sm font-bold mb-6 hover:bg-white/30 transition">
                        {{ $blog->category }}
                    </a>
                    <h1 class="text-4xl md:text-5xl font-extrabold mb-6 leading-tight">{{ $blog->title }}</h1>

                    <div class="flex items-center justify-center space-x-6 text-white/90">
                        <div class="flex items-center">
                            <i class="far fa-calendar mr-2"></i>
                            <span>{{ $blog->published_at->format('F d, Y') }}</span>
                        </div>
                        <div class="flex items-center">
                            <i class="far fa-clock mr-2"></i>
                            <span>8 min read</span>
                        </div>
                        <div class="flex items-center">
                            <i class="far fa-eye mr-2"></i>
                            <span>1.2k views</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Section -->
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-20 relative z-10 pb-20">
            <!-- Main Card -->
            <div class="bg-white rounded-3xl shadow-2xl p-8 md:p-12 mb-12">
                <!-- Author Info -->
                <div class="flex items-center justify-between pb-8 mb-8 border-b border-gray-200">
                    <div class="flex items-center space-x-4">
                        <div class="w-14 h-14 rounded-full bg-gradient-to-br from-primary to-purple-600 flex items-center justify-center text-white text-xl font-bold">
                            IP
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-900">Innovation Place Team</h3>
                            <p class="text-sm text-gray-600">Tech Enthusiasts & Developers</p>
                        </div>
                    </div>

                    <!-- Social Share Buttons -->
                    <div class="flex space-x-3">
                        <!-- Facebook Share -->
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('blog.show', $blog)) }}"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="w-10 h-10 rounded-full bg-blue-600 hover:bg-blue-700 text-white transition flex items-center justify-center"
                           title="Share on Facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>

                        <!-- LinkedIn Share -->
                        <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(route('blog.show', $blog)) }}"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="w-10 h-10 rounded-full bg-blue-700 hover:bg-blue-800 text-white transition flex items-center justify-center"
                           title="Share on LinkedIn">
                            <i class="fab fa-linkedin-in"></i>
                        </a>

                        <!-- WhatsApp Share -->
                        <a href="https://api.whatsapp.com/send?text={{ urlencode($blog->title . ' - ' . route('blog.show', $blog)) }}"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="w-10 h-10 rounded-full bg-green-600 hover:bg-green-700 text-white transition flex items-center justify-center"
                           title="Share on WhatsApp">
                            <i class="fab fa-whatsapp"></i>
                        </a>

                        <!-- Twitter Share -->
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('blog.show', $blog)) }}&text={{ urlencode($blog->title) }}"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="w-10 h-10 rounded-full bg-blue-400 hover:bg-blue-500 text-white transition flex items-center justify-center"
                           title="Share on Twitter">
                            <i class="fab fa-twitter"></i>
                        </a>

                        <!-- Copy Link -->
                        <button onclick="copyToClipboard('{{ route('blog.show', $blog) }}')"
                                class="w-10 h-10 rounded-full bg-gray-600 hover:bg-gray-700 text-white transition flex items-center justify-center"
                                title="Copy Link">
                            <i class="fas fa-link"></i>
                        </button>
                    </div>
                </div>

                <!-- Excerpt -->
                <div class="bg-blue-50 border-l-4 border-primary p-6 rounded-r-xl mb-10">
                    <p class="text-xl text-gray-700 leading-relaxed italic">{{ $blog->excerpt }}</p>
                </div>

                <img src="{{ asset('storage/' . $blog->featured_image) }}" alt="Featured Image">

                <!-- Content -->
                <div class="prose prose-lg max-w-none">
                    <div class="text-gray-700 leading-relaxed text-lg space-y-6">
                        {!! nl2br(e($blog->content)) !!}
                    </div>
                </div>

                <!-- Tags Section -->
                <div class="mt-12 pt-8 border-t border-gray-200">
                    <div class="flex flex-wrap items-center gap-3">
                    <span class="font-bold text-gray-900 flex items-center">
                        <i class="fas fa-tags mr-2 text-primary"></i>
                        Tags:
                    </span>
                        <span class="px-4 py-2 bg-gray-100 hover:bg-primary hover:text-white rounded-full text-sm font-medium text-gray-700 cursor-pointer transition">Laravel</span>
                        <span class="px-4 py-2 bg-gray-100 hover:bg-primary hover:text-white rounded-full text-sm font-medium text-gray-700 cursor-pointer transition">PHP</span>
                        <span class="px-4 py-2 bg-gray-100 hover:bg-primary hover:text-white rounded-full text-sm font-medium text-gray-700 cursor-pointer transition">{{ $blog->category }}</span>
                    </div>
                </div>

                <!-- Share CTA Box -->
                <div class="mt-8 p-6 bg-gradient-to-r from-blue-50 to-purple-50 rounded-2xl border border-blue-100">
                    <div class="text-center mb-6">
                        <h3 class="text-2xl font-bold text-gray-900 mb-2">Enjoyed this article?</h3>
                        <p class="text-gray-600">Share it with your network!</p>
                    </div>

                    <div class="flex flex-wrap justify-center gap-4">
                        <!-- Facebook -->
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('blog.show', $blog)) }}"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="flex items-center px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition font-medium shadow-lg hover:shadow-xl">
                            <i class="fab fa-facebook-f mr-2"></i> Share on Facebook
                        </a>

                        <!-- LinkedIn -->
                        <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(route('blog.show', $blog)) }}"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="flex items-center px-6 py-3 bg-blue-700 text-white rounded-lg hover:bg-blue-800 transition font-medium shadow-lg hover:shadow-xl">
                            <i class="fab fa-linkedin-in mr-2"></i> Share on LinkedIn
                        </a>

                        <!-- WhatsApp -->
                        <a href="https://api.whatsapp.com/send?text={{ urlencode($blog->title . ' - ' . route('blog.show', $blog)) }}"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="flex items-center px-6 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700 transition font-medium shadow-lg hover:shadow-xl">
                            <i class="fab fa-whatsapp mr-2"></i> Share on WhatsApp
                        </a>

                        <!-- Twitter -->
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('blog.show', $blog)) }}&text={{ urlencode($blog->title) }}"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="flex items-center px-6 py-3 bg-blue-400 text-white rounded-lg hover:bg-blue-500 transition font-medium shadow-lg hover:shadow-xl">
                            <i class="fab fa-twitter mr-2"></i> Share on Twitter
                        </a>
                    </div>
                </div>
            </div>

            <!-- Newsletter CTA -->
            <div class="bg-gradient-to-br from-primary via-purple-600 to-pink-600 rounded-3xl shadow-2xl p-10 text-white text-center mb-12 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-40 h-40 bg-white/10 rounded-full -mr-20 -mt-20"></div>
                <div class="absolute bottom-0 left-0 w-32 h-32 bg-white/10 rounded-full -ml-16 -mb-16"></div>

                <div class="relative z-10">
                    <div class="w-20 h-20 bg-white/20 rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-envelope text-4xl"></i>
                    </div>
                    <h3 class="text-3xl font-bold mb-4">Never Miss an Update</h3>
                    <p class="text-white/90 text-lg mb-8 max-w-2xl mx-auto">Subscribe to our newsletter and get the latest tech insights, tutorials, and industry trends delivered to your inbox.</p>

                    <form class="max-w-md mx-auto">
                        <div class="flex gap-3">
                            <input type="email" placeholder="Enter your email" class="flex-1 px-6 py-4 rounded-xl text-gray-900 placeholder-gray-500 focus:ring-4 focus:ring-white/30 transition">
                            <button type="submit" class="px-8 py-4 bg-white text-primary rounded-xl font-bold hover:shadow-2xl transition transform hover:scale-105 whitespace-nowrap">
                                Subscribe
                            </button>
                        </div>
                        <p class="text-sm text-white/70 mt-4">
                            <i class="fas fa-lock mr-1"></i> We respect your privacy. Unsubscribe anytime.
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </article>

    <!-- Related Posts -->
    @if($relatedPosts->count() > 0)
        <section class="bg-gray-50 py-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-900 mb-4">Related Articles</h2>
                    <p class="text-xl text-gray-600">Continue exploring more insights</p>
                </div>

                <div class="grid md:grid-cols-3 gap-8">
                    @foreach($relatedPosts as $related)
                        <article class="group bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all transform hover:-translate-y-2">
                            <div class="relative h-56 bg-gradient-to-br from-blue-400 via-purple-500 to-pink-500 overflow-hidden">
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <i class="fas fa-{{ $related->category == 'Technology' ? 'microchip' : ($related->category == 'Development' ? 'code' : 'paint-brush') }} text-7xl text-white opacity-30 group-hover:scale-125 transition-transform duration-500"></i>
                                </div>
                                <div class="absolute top-4 left-4">
                        <span class="bg-white/90 backdrop-blur-sm text-primary px-4 py-2 rounded-full text-xs font-bold">
                            {{ $related->category }}
                        </span>
                                </div>
                            </div>
                            <div class="p-6">
                                <div class="text-sm text-gray-500 mb-3">
                                    <i class="far fa-calendar mr-1"></i>
                                    {{ $related->published_at->format('M d, Y') }}
                                </div>
                                <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-primary transition">
                                    <a href="{{ route('blog.show', $related) }}">{{ $related->title }}</a>
                                </h3>
                                <p class="text-gray-600 mb-4 line-clamp-3">{{ Str::limit($related->excerpt, 120) }}</p>
                                <a href="{{ route('blog.show', $related) }}" class="inline-flex items-center text-primary font-semibold hover:gap-3 gap-2 transition-all group">
                                    Read Article
                                    <i class="fas fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>

                <div class="text-center mt-12">
                    <a href="{{ route('blog.index') }}" class="inline-flex items-center px-8 py-4 bg-primary text-white rounded-xl font-bold hover:bg-indigo-700 transition transform hover:scale-105">
                        <i class="fas fa-th-large mr-2"></i>
                        View All Articles
                    </a>
                </div>
            </div>
        </section>
    @endif

    <!-- Copy to Clipboard Toast -->
    <div id="copy-toast" class="hidden fixed bottom-8 right-8 bg-gray-900 text-white px-6 py-4 rounded-lg shadow-2xl z-50 animate-slide-up">
        <div class="flex items-center space-x-3">
            <i class="fas fa-check-circle text-green-400 text-xl"></i>
            <span class="font-medium">Link copied to clipboard!</span>
        </div>
    </div>

    <script>
        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(function() {
                // Show toast notification
                const toast = document.getElementById('copy-toast');
                toast.classList.remove('hidden');

                // Hide after 3 seconds
                setTimeout(function() {
                    toast.classList.add('hidden');
                }, 3000);
            }).catch(function(err) {
                console.error('Failed to copy: ', err);
                alert('Failed to copy link');
            });
        }
    </script>

    <style>
        @keyframes slideUp {
            from {
                transform: translateY(100px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .animate-slide-up {
            animation: slideUp 0.3s ease-out;
        }
    </style>
@endsection
