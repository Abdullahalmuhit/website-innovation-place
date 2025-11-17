@extends('admin.layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Stats Cards -->
        <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl shadow-lg p-6 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-blue-100 text-sm">Total Services</p>
                    <h3 class="text-4xl font-bold mt-2">{{ $stats['services'] }}</h3>
                </div>
                <div class="w-16 h-16 bg-white/20 rounded-lg flex items-center justify-center">
                    <i class="fas fa-cogs text-3xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-xl shadow-lg p-6 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-green-100 text-sm">Team Members</p>
                    <h3 class="text-4xl font-bold mt-2">{{ $stats['team_members'] }}</h3>
                </div>
                <div class="w-16 h-16 bg-white/20 rounded-lg flex items-center justify-center">
                    <i class="fas fa-users text-3xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl shadow-lg p-6 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-purple-100 text-sm">Blog Posts</p>
                    <h3 class="text-4xl font-bold mt-2">{{ $stats['published_posts'] }}/{{ $stats['blog_posts'] }}</h3>
                </div>
                <div class="w-16 h-16 bg-white/20 rounded-lg flex items-center justify-center">
                    <i class="fas fa-blog text-3xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-orange-500 to-orange-600 rounded-xl shadow-lg p-6 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-orange-100 text-sm">Unread Messages</p>
                    <h3 class="text-4xl font-bold mt-2">{{ $stats['unread_contacts'] }}</h3>
                </div>
                <div class="w-16 h-16 bg-white/20 rounded-lg flex items-center justify-center">
                    <i class="fas fa-envelope text-3xl"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="grid lg:grid-cols-2 gap-6">
        <!-- Recent Contacts -->
        <div class="bg-white rounded-xl shadow-lg p-6">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-xl font-bold text-gray-900">Recent Contacts</h3>
                <a href="{{ route('admin.contacts.index') }}" class="text-primary hover:text-indigo-700 text-sm font-medium">
                    View All <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>
            <div class="space-y-4">
                @forelse($recent_contacts as $contact)
                    <div class="flex items-start space-x-4 p-4 hover:bg-gray-50 rounded-lg transition">
                        <div class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-user text-primary"></i>
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center justify-between">
                                <h4 class="font-semibold text-gray-900">{{ $contact->name }}</h4>
                                @if(!$contact->is_read)
                                    <span class="bg-red-100 text-red-600 text-xs px-2 py-1 rounded-full">New</span>
                                @endif
                            </div>
                            <p class="text-sm text-gray-600 truncate">{{ $contact->subject }}</p>
                            <p class="text-xs text-gray-500 mt-1">{{ $contact->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500 text-center py-8">No contacts yet</p>
                @endforelse
            </div>
        </div>

        <!-- Recent Blog Posts -->
        <div class="bg-white rounded-xl shadow-lg p-6">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-xl font-bold text-gray-900">Recent Blog Posts</h3>
                <a href="{{ route('admin.blog.index') }}" class="text-primary hover:text-indigo-700 text-sm font-medium">
                    View All <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>
            <div class="space-y-4">
                @forelse($recent_posts as $post)
                    <div class="flex items-start space-x-4 p-4 hover:bg-gray-50 rounded-lg transition">
                        <div class="w-10 h-10 rounded-full bg-purple-100 flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-newspaper text-purple-600"></i>
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center justify-between">
                                <h4 class="font-semibold text-gray-900 truncate">{{ $post->title }}</h4>
                                @if($post->is_published)
                                    <span class="bg-green-100 text-green-600 text-xs px-2 py-1 rounded-full">Published</span>
                                @else
                                    <span class="bg-gray-100 text-gray-600 text-xs px-2 py-1 rounded-full">Draft</span>
                                @endif
                            </div>
                            <p class="text-sm text-gray-600">{{ $post->category->name }}</p>
                            <p class="text-xs text-gray-500 mt-1">{{ $post->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500 text-center py-8">No blog posts yet</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection
