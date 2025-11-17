<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') - Innovation Place BD</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary': '#4f46e5',
                        'secondary': '#f97316',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-100">
<div class="flex h-screen overflow-hidden">
    <!-- Sidebar -->
    <aside class="w-64 bg-gradient-to-b from-indigo-900 to-indigo-800 text-white flex-shrink-0">
        <div class="p-6 border-b border-indigo-700">
            <h1 class="text-2xl font-bold">Admin Panel</h1>
            <p class="text-indigo-300 text-sm mt-1">Innovation Place BD</p>
        </div>

        <nav class="p-4 space-y-2">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-3 rounded-lg hover:bg-indigo-700 transition {{ request()->routeIs('admin.dashboard') ? 'bg-indigo-700' : '' }}">
                <i class="fas fa-chart-line w-5"></i>
                <span class="ml-3">Dashboard</span>
            </a>

            <a href="{{ route('admin.services.index') }}" class="flex items-center px-4 py-3 rounded-lg hover:bg-indigo-700 transition {{ request()->routeIs('admin.services.*') ? 'bg-indigo-700' : '' }}">
                <i class="fas fa-cogs w-5"></i>
                <span class="ml-3">Services</span>
            </a>

            <a href="{{ route('admin.team.index') }}" class="flex items-center px-4 py-3 rounded-lg hover:bg-indigo-700 transition {{ request()->routeIs('admin.team.*') ? 'bg-indigo-700' : '' }}">
                <i class="fas fa-users w-5"></i>
                <span class="ml-3">Team Members</span>
            </a>

            <a href="{{ route('admin.blog.index') }}" class="flex items-center px-4 py-3 rounded-lg hover:bg-indigo-700 transition {{ request()->routeIs('admin.blog.*') ? 'bg-indigo-700' : '' }}">
                <i class="fas fa-blog w-5"></i>
                <span class="ml-3">Blog Posts</span>
            </a>

            <a href="{{ route('admin.contacts.index') }}" class="flex items-center px-4 py-3 rounded-lg hover:bg-indigo-700 transition {{ request()->routeIs('admin.contacts.*') ? 'bg-indigo-700' : '' }}">
                <i class="fas fa-envelope w-5"></i>
                <span class="ml-3">Contacts</span>
                @if(\App\Models\Contact::where('is_read', false)->count() > 0)
                    <span class="ml-auto bg-red-500 text-white text-xs px-2 py-1 rounded-full">
                            {{ \App\Models\Contact::where('is_read', false)->count() }}
                        </span>
                @endif
            </a>

            <div class="pt-4 border-t border-indigo-700">
                <a href="{{ route('home') }}" target="_blank" class="flex items-center px-4 py-3 rounded-lg hover:bg-indigo-700 transition">
                    <i class="fas fa-external-link-alt w-5"></i>
                    <span class="ml-3">View Website</span>
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center px-4 py-3 rounded-lg hover:bg-red-600 transition text-left">
                        <i class="fas fa-sign-out-alt w-5"></i>
                        <span class="ml-3">Logout</span>
                    </button>
                </form>
            </div>
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col overflow-hidden">
        <!-- Header -->
        <header class="bg-white shadow-sm">
            <div class="px-6 py-4 flex items-center justify-between">
                <h2 class="text-2xl font-bold text-gray-900">@yield('page-title', 'Dashboard')</h2>
                <div class="flex items-center space-x-4">
                    <div class="text-right">
                        <p class="text-sm text-gray-600">Welcome back,</p>
                        <p class="font-semibold text-gray-900">{{ Auth::user()->name }}</p>
                    </div>
                    <div class="w-10 h-10 rounded-full bg-gradient-to-br from-primary to-purple-600 flex items-center justify-center text-white font-bold">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content Area -->
        <main class="flex-1 overflow-y-auto p-6">
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6">
                    <i class="fas fa-check-circle mr-2"></i>
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6">
                    <i class="fas fa-exclamation-circle mr-2"></i>
                    {{ session('error') }}
                </div>
            @endif

            @yield('content')
        </main>
    </div>
</div>

@stack('scripts')
</body>
</html>
