@extends('frontend.layout.main')

@section('title', 'Home - Elite Society')

@section('content')

<!-- Hero Section -->
<section class="relative overflow-hidden bg-[#faf7f2]">
    <!-- Decorative Blurs -->
    <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-amber-200/40 rounded-full blur-3xl translate-x-1/3 -translate-y-1/3"></div>
    <div class="absolute bottom-0 left-0 w-[400px] h-[400px] bg-orange-200/30 rounded-full blur-3xl -translate-x-1/3 translate-y-1/3"></div>

    <div class="max-w-7xl mx-auto px-6 lg:px-10 py-24 lg:py-32 grid lg:grid-cols-2 gap-16 items-center relative z-10">
        <div>
            <span class="inline-flex items-center gap-2 bg-amber-100 text-amber-700 px-5 py-2 rounded-full text-sm font-semibold mb-6 shadow-sm border border-amber-200/50">
                ★ Premium Quality Products
            </span>

            <h1 class="text-5xl lg:text-7xl font-extrabold leading-tight text-slate-900 mb-8">
                Care For Every <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-amber-600 to-orange-500">Home</span>
            </h1>

            <p class="text-lg text-slate-600 mb-10 leading-relaxed max-w-lg">
                Experience the perfect blend of comfort and hygiene with our premium range of tissue and home care products designed for your everyday needs.
            </p>

            <div class="flex flex-col sm:flex-row gap-4">
                <a href="{{ route('products.tissue') }}" class="inline-flex justify-center items-center bg-amber-600 hover:bg-amber-700 text-white px-8 py-4 rounded-xl font-bold transition shadow-lg shadow-amber-600/30 text-lg">
                    Shop Products
                </a>
                <a href="{{ route('about') }}" class="inline-flex justify-center items-center bg-white hover:bg-slate-50 text-slate-700 border border-slate-200 px-8 py-4 rounded-xl font-bold transition text-lg">
                    Learn More
                </a>
            </div>
            
            <div class="mt-12 flex items-center gap-6">
                <div class="flex -space-x-4">
                    <img class="w-12 h-12 rounded-full border-2 border-white object-cover" src="{{ asset('storage/products/dummy_image.jpg') }}" alt="User">
                    <img class="w-12 h-12 rounded-full border-2 border-white object-cover" src="{{ asset('storage/products/dummy_image.jpg') }}" alt="User">
                    <img class="w-12 h-12 rounded-full border-2 border-white object-cover" src="{{ asset('storage/products/dummy_image.jpg') }}" alt="User">
                </div>
                <div class="text-sm font-medium text-slate-600">
                    <span class="text-amber-600 font-bold block text-lg">10,000+</span> 
                    Happy Customers
                </div>
            </div>
        </div>

        <div class="relative">
            <!-- Main Hero Image -->
            <div class="relative rounded-3xl overflow-hidden shadow-2xl border-8 border-white transform lg:-rotate-2 transition hover:rotate-0 duration-500">
                <img src="{{ asset('storage/products/dummy_image.jpg') }}" alt="Elite Society Products" class="w-full h-auto object-cover aspect-[4/5]">
                <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
            </div>
            
            <!-- Floating Badge -->
            <div class="absolute -bottom-6 -left-6 bg-white p-6 rounded-2xl shadow-xl border border-slate-100 flex items-center gap-4 animate-bounce" style="animation-duration: 3s;">
                <div class="w-12 h-12 bg-amber-100 rounded-full flex items-center justify-center text-amber-600 text-2xl">
                    ✨
                </div>
                <div>
                    <p class="text-sm text-slate-500 font-medium">Top Rated</p>
                    <p class="font-bold text-slate-900">100% Quality</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-6 lg:px-10">
        <div class="text-center max-w-2xl mx-auto mb-16">
            <span class="text-amber-600 font-semibold uppercase tracking-widest text-sm">Why Choose Us</span>
            <h2 class="text-4xl font-extrabold mt-4 text-slate-900">Excellence in Every Detail</h2>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-slate-50 p-8 rounded-3xl border border-slate-100 hover:shadow-lg transition duration-300 group">
                <div class="w-16 h-16 bg-white rounded-2xl shadow-sm flex items-center justify-center text-3xl mb-6 group-hover:scale-110 transition-transform">
                    🌟
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-3">Premium Materials</h3>
                <p class="text-slate-600 leading-relaxed">We source only the finest raw materials to ensure maximum softness, durability, and effectiveness.</p>
            </div>
            
            <div class="bg-slate-50 p-8 rounded-3xl border border-slate-100 hover:shadow-lg transition duration-300 group">
                <div class="w-16 h-16 bg-white rounded-2xl shadow-sm flex items-center justify-center text-3xl mb-6 group-hover:scale-110 transition-transform">
                    🍃
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-3">Eco-Friendly</h3>
                <p class="text-slate-600 leading-relaxed">Our manufacturing processes prioritize sustainability, keeping our environmental footprint minimal.</p>
            </div>
            
            <div class="bg-slate-50 p-8 rounded-3xl border border-slate-100 hover:shadow-lg transition duration-300 group">
                <div class="w-16 h-16 bg-white rounded-2xl shadow-sm flex items-center justify-center text-3xl mb-6 group-hover:scale-110 transition-transform">
                    🛡️
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-3">Hygienic & Safe</h3>
                <p class="text-slate-600 leading-relaxed">Rigorous quality control ensures all our products are completely safe and exceptionally hygienic.</p>
            </div>
        </div>
    </div>
</section>

<!-- Categories Preview -->
<section class="py-24 bg-slate-50">
    <div class="max-w-7xl mx-auto px-6 lg:px-10">
        <div class="flex flex-col md:flex-row justify-between items-end mb-12 gap-6">
            <div>
                <span class="text-amber-600 font-semibold uppercase tracking-widest text-sm">Our Collections</span>
                <h2 class="text-4xl font-extrabold mt-4 text-slate-900">Explore Our Range</h2>
            </div>
            <a href="{{ route('products.tissue') }}" class="text-amber-600 font-semibold hover:text-amber-700 flex items-center gap-2">
                View All Products <span>→</span>
            </a>
        </div>

        <div class="grid md:grid-cols-2 gap-8">
            <!-- Tissue Category -->
            <a href="{{ route('products.tissue') }}" class="block group relative rounded-3xl overflow-hidden aspect-[16/9] lg:aspect-[2/1]">
                <img src="{{ asset('storage/products/dummy_image.jpg') }}" alt="Tissue Products" class="w-full h-full object-cover group-hover:scale-105 transition duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-slate-900/20 to-transparent"></div>
                <div class="absolute bottom-0 left-0 p-8 lg:p-10 w-full">
                    <span class="bg-white/20 backdrop-blur-md text-white px-4 py-1.5 rounded-full text-sm font-semibold mb-4 inline-block border border-white/30">Collection</span>
                    <h3 class="text-3xl font-bold text-white mb-2 group-hover:text-amber-300 transition">Tissue Products</h3>
                    <p class="text-slate-200">Ultra-soft facial tissues, premium bath tissues, and absorbent paper towels.</p>
                </div>
            </a>

            <!-- Home Care Category -->
            <a href="{{ route('products.home-care') }}" class="block group relative rounded-3xl overflow-hidden aspect-[16/9] lg:aspect-[2/1]">
                <img src="{{ asset('storage/products/dummy_image.jpg') }}" alt="Home Care Products" class="w-full h-full object-cover group-hover:scale-105 transition duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-slate-900/20 to-transparent"></div>
                <div class="absolute bottom-0 left-0 p-8 lg:p-10 w-full">
                    <span class="bg-white/20 backdrop-blur-md text-white px-4 py-1.5 rounded-full text-sm font-semibold mb-4 inline-block border border-white/30">Collection</span>
                    <h3 class="text-3xl font-bold text-white mb-2 group-hover:text-amber-300 transition">Home Care</h3>
                    <p class="text-slate-200">Effective surface cleaners, dish wash, and hand sanitizers for a spotless home.</p>
                </div>
            </a>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-24 bg-amber-600 relative overflow-hidden">
    <div class="absolute top-0 right-0 w-96 h-96 bg-white/10 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-black/10 rounded-full blur-3xl"></div>
    
    <div class="max-w-4xl mx-auto px-6 text-center relative z-10">
        <h2 class="text-4xl lg:text-5xl font-extrabold text-white mb-6">Ready to upgrade your home essentials?</h2>
        <p class="text-amber-100 text-lg mb-10">Join thousands of satisfied customers who trust Elite Society for their daily needs.</p>
        <a href="{{ route('contact') }}" class="inline-flex justify-center items-center bg-white text-amber-700 hover:bg-slate-50 px-10 py-4 rounded-xl font-bold transition shadow-xl text-lg">
            Contact Us Today
        </a>
    </div>
</section>

@endsection