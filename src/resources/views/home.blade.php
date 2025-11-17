<!-- resources/views/home.blade.php -->
@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section id="home" class="relative overflow-hidden min-h-screen flex items-center">
        <!-- Background Image with Overlay -->
        <div class="absolute inset-0">
            <!-- You can replace this with your actual image -->
            <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1522071820081-009f0129c71c?ixlib=rb-4.0.3&auto=format&fit=crop&w=2850&q=80');"></div>
            <!-- Dark Overlay -->
            <div class="absolute inset-0 bg-gradient-to-r from-blue-900/90 via-indigo-900/85 to-purple-900/90"></div>
            <!-- Pattern Overlay -->
            <div class="absolute inset-0 opacity-10">
                <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'0.4\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
            </div>
        </div>

        <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10 py-32">
            <div class="max-w-5xl mx-auto text-center">
                <!-- Main Heading -->
                <h1 class="text-5xl md:text-7xl font-extrabold text-white mb-8 leading-tight animate-fade-in-up">
                    Empowering Businesses Through
                    <span class="block bg-gradient-to-r from-yellow-400 via-orange-400 to-pink-400 bg-clip-text text-transparent mt-2">
                    Digital Innovation
                </span>
                </h1>

                <!-- Subtitle -->
                <p class="text-xl md:text-2xl text-gray-200 mb-12 max-w-3xl mx-auto leading-relaxed animate-fade-in-up animation-delay-200">
                    Innovation Place BD Limited is your trusted partner for cutting-edge software solutions, transforming ideas into powerful digital experiences.
                </p>

                <!-- CTA Button -->
                <div class="animate-fade-in-up animation-delay-400">
                    <a href="#services" class="inline-block px-10 py-5 bg-gradient-to-r from-yellow-400 to-orange-500 text-gray-900 rounded-xl font-bold text-lg hover:shadow-2xl hover:scale-105 transition-all duration-300 transform">
                        Explore Our Solutions
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>

                <!-- Trust Badges -->
                <div class="mt-16 flex flex-wrap justify-center items-center gap-8 text-white/80 animate-fade-in-up animation-delay-600">
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-check-circle text-green-400 text-xl"></i>
                        <span class="text-sm">Trusted by 30+ Clients</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-award text-yellow-400 text-xl"></i>
                        <span class="text-sm">Award Winning Team</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-shield-alt text-blue-400 text-xl"></i>
                        <span class="text-sm">Secure & Reliable</span>
                    </div>
                </div>
            </div>

            <!-- Scroll Indicator -->
            <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 animate-bounce">
                <a href="#services" class="flex flex-col items-center text-white/70 hover:text-white transition">
                    <span class="text-sm mb-2">Scroll Down</span>
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <style>
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in-up {
            animation: fadeInUp 1s ease-out forwards;
            opacity: 0;
        }

        .animation-delay-200 {
            animation-delay: 0.2s;
        }

        .animation-delay-400 {
            animation-delay: 0.4s;
        }

        .animation-delay-600 {
            animation-delay: 0.6s;
        }
    </style>

    <!-- Services Section -->
    <section id="services" class="py-20 md:py-28 bg-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="section-title">Our Services</span>
                <p class="text-xl text-gray-700 mt-4">Solutions designed to scale and transform your business.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                @foreach($services as $service)
                    <div class="card-bg p-8 rounded-2xl shadow-lg border border-gray-200">
                        <i class="fas fa-{{ $service->icon }} text-5xl text-primary mb-4"></i>
                        <h3 class="text-2xl font-semibold text-gray-900 mb-3">{{ $service->title }}</h3>
                        <p class="text-gray-600">{{ $service->description }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-20 md:py-28 bg-gray-100 border-t border-b border-gray-200">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:flex lg:items-center lg:space-x-12">
                <div class="lg:w-1/2 mb-10 lg:mb-0">
                    <span class="section-title">About Innovation Place</span>
                    <h2 class="text-4xl font-bold text-gray-900 mt-4 mb-6">Driven by Quality, Defined by Results.</h2>
                    <p class="text-gray-700 text-lg mb-6">
                        Innovation Place BD Limited was founded on the principle of delivering world-class software solutions tailored for the Bangladesh market and beyond. We believe in transparency, continuous learning, and building long-term partnerships with our clients.
                    </p>
                    <p class="text-gray-700 text-lg">
                        Our mission is to empower businesses with technology that not only meets their current needs but also positions them for future growth and market leadership. We specialize in building fast, secure, and user-friendly digital experiences.
                    </p>
                    <a href="#contact" class="inline-flex mt-8 px-6 py-2 border border-primary text-primary rounded-lg hover:bg-primary hover:text-white transition duration-300">
                        Learn More About Our Journey
                    </a>
                </div>
                <div class="lg:w-1/2">
                    <div class="grid grid-cols-2 gap-6">
                        <div class="bg-white p-6 rounded-xl shadow-lg border border-primary/20">
                            <i class="fas fa-rocket text-4xl text-primary mb-2"></i>
                            <p class="text-3xl font-bold text-gray-900">5+</p>
                            <p class="text-gray-600">Years in Business</p>
                        </div>
                        <div class="bg-white p-6 rounded-xl shadow-lg border border-primary/20">
                            <i class="fas fa-users text-4xl text-primary mb-2"></i>
                            <p class="text-3xl font-bold text-gray-900">50+</p>
                            <p class="text-gray-600">Successful Projects</p>
                        </div>
                        <div class="bg-white p-6 rounded-xl shadow-lg border border-primary/20">
                            <i class="fab fa-laravel text-4xl text-primary mb-2"></i>
                            <p class="text-3xl font-bold text-gray-900">Laravel</p>
                            <p class="text-gray-600">Primary Backend Stack</p>
                        </div>
                        <div class="bg-white p-6 rounded-xl shadow-lg border border-primary/20">
                            <i class="fas fa-globe text-4xl text-primary mb-2"></i>
                            <p class="text-3xl font-bold text-gray-900">Global</p>
                            <p class="text-gray-600">Client Reach</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section id="team" class="py-20 md:py-28 bg-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="section-title">Meet Our Team</span>
                <p class="text-xl text-gray-700 mt-4">The passionate minds behind Innovation Place BD Limited.</p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                @foreach($team as $member)
                    <div class="text-center p-6 card-bg rounded-xl shadow-lg border border-gray-200">
                        <div class="w-32 h-32 mx-auto rounded-full bg-gradient-to-br from-primary to-indigo-300 mb-4 overflow-hidden border-4 border-primary/50 flex items-center justify-center text-white text-4xl font-bold">
                            @if($member->image)
                                <img src="{{ asset('storage/' . $member->image) }}" alt="{{ $member->name }}" class="object-cover w-full h-full">
                            @else
                                {{ substr($member->name, 0, 1) }}
                            @endif
                        </div>
                        <h4 class="text-xl font-semibold text-gray-900">{{ $member->name }}</h4>
                        <p class="text-sm text-primary">{{ $member->role }}</p>
                        @if($member->bio)
                            <p class="text-xs text-gray-600 mt-2">{{ Str::limit($member->bio, 60) }}</p>
                        @endif
                        <div class="flex justify-center space-x-3 mt-3">
                            @if($member->linkedin)
                                <a href="{{ $member->linkedin }}" target="_blank" class="text-gray-500 hover:text-primary cursor-pointer">
                                    <i class="fab fa-linkedin text-xl"></i>
                                </a>
                            @endif
                            @if($member->email)
                                <a href="mailto:{{ $member->email }}" class="text-gray-500 hover:text-primary cursor-pointer">
                                    <i class="fas fa-envelope text-xl"></i>
                                </a>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Blog Section -->
    <section id="blog" class="py-20 md:py-28 bg-gray-50 border-t border-b border-gray-200">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="section-title">Latest Insights</span>
                <p class="text-xl text-gray-700 mt-4">Stay updated with the latest in tech, development, and BD market trends.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($blogs as $blog)
                    <a href="{{ route('blog.show', $blog->id) }}" class="block card-bg rounded-xl overflow-hidden shadow-lg border border-gray-200 group">
                        <div>
                            <img src="{{ asset('storage/' . $blog->featured_image) }}" class="h-48 bg-gradient-to-br from-primary to-indigo-300 flex items-center justify-center" >
                        </div>
                        <div class="p-6">
                            <span class="text-sm text-primary font-medium">{{ $blog->category->name }}</span>
                            <h3 class="text-xl font-semibold text-gray-900 mt-2 group-hover:text-primary transition duration-300">{{ $blog->title }}</h3>
                            <p class="text-gray-600 mt-3 text-sm">{{ Str::limit($blog->excerpt, 100) }}</p>
                            <div class="mt-4 text-sm text-gray-500">
                                <i class="far fa-calendar mr-1"></i> {{ $blog->published_at->format('M d, Y') }}
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            <div class="text-center mt-12">
                <a href="{{ route('blog.index') }}" class="px-6 py-3 text-lg font-semibold text-white bg-secondary rounded-full hover:bg-orange-600 transition duration-300 shadow-lg transform hover:scale-105">
                    View All Blog Posts
                </a>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-20 md:py-28 bg-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:flex lg:space-x-16">
                <div class="lg:w-1/3 mb-12 lg:mb-0">
                    <span class="section-title">Get in Touch</span>
                    <h2 class="text-4xl font-bold text-gray-900 mt-4 mb-6">Let's Build Something Great Together.</h2>
                    <p class="text-gray-700 mb-8">
                        We're ready to discuss your project and provide a tailored strategy. Contact us via the form or through the details below.
                    </p>

                    <div class="space-y-6">
                        <div class="flex items-start space-x-4">
                            <i class="fas fa-envelope text-2xl text-primary flex-shrink-0 mt-1"></i>
                            <div>
                                <p class="text-gray-900 font-semibold">Email Us</p>
                                <p class="text-gray-700">info@innovationplacebd.com</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            <i class="fas fa-phone text-2xl text-primary flex-shrink-0 mt-1"></i>
                            <div>
                                <p class="text-gray-900 font-semibold">Call Us</p>
                                <p class="text-gray-700">+88 01731146077</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            <i class="fas fa-map-marker-alt text-2xl text-primary flex-shrink-0 mt-1"></i>
                            <div>
                                <p class="text-gray-900 font-semibold">Our Office</p>
                                <p class="text-gray-700">House: B/ 151, Road No: 22
                                    Mohakhali DOHS, Dhaka- 1213, Bangladesh</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lg:w-2/3 p-8 card-bg rounded-xl shadow-2xl border border-gray-200">
                    <form id="contact-form" class="space-y-6">
                        @csrf
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                            <input type="text" id="name" name="name" required class="w-full px-4 py-3 bg-white border border-gray-300 rounded-lg text-gray-900 focus:ring-primary focus:border-primary transition duration-200">
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Work Email</label>
                                <input type="email" id="email" name="email" required class="w-full px-4 py-3 bg-white border border-gray-300 rounded-lg text-gray-900 focus:ring-primary focus:border-primary transition duration-200">
                            </div>
                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                                <input type="tel" id="phone" name="phone" class="w-full px-4 py-3 bg-white border border-gray-300 rounded-lg text-gray-900 focus:ring-primary focus:border-primary transition duration-200">
                            </div>
                        </div>
                        <div>
                            <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">Subject</label>
                            <input type="text" id="subject" name="subject" required class="w-full px-4 py-3 bg-white border border-gray-300 rounded-lg text-gray-900 focus:ring-primary focus:border-primary transition duration-200">
                        </div>
                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Project Details</label>
                            <textarea id="message" name="message" rows="4" required class="w-full px-4 py-3 bg-white border border-gray-300 rounded-lg text-gray-900 focus:ring-primary focus:border-primary transition duration-200"></textarea>
                        </div>
                        <div>
                            <button type="submit" class="w-full px-8 py-3 text-lg font-semibold text-white bg-primary rounded-lg hover:bg-indigo-700 transition duration-300 shadow-lg transform hover:scale-[1.01]">
                                Send Message
                            </button>
                        </div>
                        <div id="form-message" class="hidden"></div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        document.getElementById('contact-form').addEventListener('submit', async function(e) {
            e.preventDefault();

            const formData = new FormData(this);
            const messageDiv = document.getElementById('form-message');
            const submitBtn = this.querySelector('button[type="submit"]');

            submitBtn.disabled = true;
            submitBtn.textContent = 'Sending...';

            try {
                const response = await fetch('{{ route("contact.store") }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                        'Accept': 'application/json',
                    },
                    body: formData
                });

                const data = await response.json();

                if (data.success) {
                    messageDiv.className = 'bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded';
                    messageDiv.textContent = data.message;
                    this.reset();
                } else {
                    messageDiv.className = 'bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded';
                    messageDiv.textContent = 'Please check your form and try again.';
                }

                messageDiv.classList.remove('hidden');

                setTimeout(() => {
                    messageDiv.classList.add('hidden');
                }, 5000);

            } catch (error) {
                messageDiv.className = 'bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded';
                messageDiv.textContent = 'An error occurred. Please try again.';
                messageDiv.classList.remove('hidden');
            } finally {
                submitBtn.disabled = false;
                submitBtn.textContent = 'Send Message';
            }
        });
    </script>
@endpush
