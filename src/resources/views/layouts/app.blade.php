<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @yield('title', 'Innovation Place BD Limited - Software Solutions')
    </title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #4f46e5;
            --primary-dark: #3730a3;
        }
        html {
            scroll-behavior: smooth;
        }
        body {
            font-family: 'Inter', sans-serif;
            background-color: #ffffff;
            color: #374151;
        }
        .section-title {
            color: var(--primary-color);
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            display: inline-block;
        }
        .card-bg {
            background-color: #f9fafb;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .card-bg:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px rgba(79, 70, 229, 0.1);
        }
        .mobile-menu {
            display: none;
        }
        @media (max-width: 768px) {
            .mobile-menu.open {
                display: block;
            }
        }
        .nav-link {
            transition: color 0.2s;
        }
        .nav-link:hover {
            color: var(--primary-color);
        }
    </style>
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
<body class="antialiased">
<!-- Navigation -->
<header class="sticky top-0 z-50 bg-white/95 backdrop-blur-md shadow-md border-b border-gray-100">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
            <div class="flex-shrink-0">
                <a href="{{ route('home') }}" class="flex items-center space-x-3 text-3xl font-bold text-gray-900 tracking-wider">
                    <img src="{{ asset('assets/img/logo/inno-logo_blue.png') }}" alt="Innovation Place BD Logo" class="h-10 w-auto">
                    <span>
                            <span class="text-primary">Innovation</span> Place BD
                        </span>
                </a>
            </div>

            <nav class="hidden md:flex space-x-8">
                <a href="{{ route('home') }}#home" class="nav-link text-gray-700 hover:text-primary transition duration-300">Home</a>
                <a href="{{ route('home') }}#services" class="nav-link text-gray-700 hover:text-primary transition duration-300">Services</a>
                <a href="{{ route('home') }}#about" class="nav-link text-gray-700 hover:text-primary transition duration-300">About Us</a>
                <a href="{{ route('home') }}#team" class="nav-link text-gray-700 hover:text-primary transition duration-300">Team</a>
                <a href="{{ route('blog.index') }}" class="nav-link text-gray-700 hover:text-primary transition duration-300">Blog</a>
                <a href="{{ route('home') }}#contact" class="nav-link text-gray-700 hover:text-primary transition duration-300">Contact</a>
            </nav>

            <button id="mobile-menu-button" class="md:hidden text-gray-700 focus:outline-none" aria-label="Toggle menu">
                <i class="fas fa-bars text-2xl"></i>
            </button>
        </div>
    </div>

    <div id="mobile-menu" class="mobile-menu md:hidden bg-white border-t border-gray-200 absolute w-full pb-4 shadow-xl">
        <a href="{{ route('home') }}#home" class="block py-3 px-4 text-gray-700 hover:bg-gray-100 transition duration-150">Home</a>
        <a href="{{ route('home') }}#services" class="block py-3 px-4 text-gray-700 hover:bg-gray-100 transition duration-150">Services</a>
        <a href="{{ route('home') }}#about" class="block py-3 px-4 text-gray-700 hover:bg-gray-100 transition duration-150">About Us</a>
        <a href="{{ route('home') }}#team" class="block py-3 px-4 text-gray-700 hover:bg-gray-100 transition duration-150">Team</a>
        <a href="{{ route('blog.index') }}" class="block py-3 px-4 text-gray-700 hover:bg-gray-100 transition duration-150">Blog</a>
        <a href="{{ route('home') }}#contact" class="block py-3 px-4 text-gray-700 hover:bg-gray-100 transition duration-150">Contact</a>
    </div>
</header>

<main>
    @yield('content')
</main>

<!-- Footer -->
<footer class="bg-gray-200 border-t border-gray-300 py-10">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <p class="text-xl font-bold text-gray-900 tracking-wider mb-4">
            <span class="text-primary">Innovation</span> Place BD Limited
        </p>
        <div class="flex justify-center space-x-6 mb-6">
            <a href="#" class="text-gray-600 hover:text-primary transition duration-200" aria-label="Facebook">
                <i class="fab fa-facebook text-2xl"></i>
            </a>
            <a href="#" class="text-gray-600 hover:text-primary transition duration-200" aria-label="LinkedIn">
                <i class="fab fa-linkedin text-2xl"></i>
            </a>
            <a href="#" class="text-gray-600 hover:text-primary transition duration-200" aria-label="Twitter">
                <i class="fab fa-twitter text-2xl"></i>
            </a>
        </div>
        <p class="text-sm text-gray-500">
            &copy; {{ date('Y') }} Innovation Place BD Limited. All rights reserved.
        </p>
    </div>
</footer>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('open');
            const icon = mobileMenuButton.querySelector('i');
            if (mobileMenu.classList.contains('open')) {
                icon.classList.remove('fa-bars');
                icon.classList.add('fa-times');
            } else {
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');
            }
        });

        // Close mobile menu when clicking on links
        document.querySelectorAll('#mobile-menu a').forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.remove('open');
                const icon = mobileMenuButton.querySelector('i');
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');
            });
        });
    });
</script>
@stack('scripts')
</body>
</html>
