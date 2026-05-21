@extends('frontend.layout.main')

@section('title', 'Home Care Products - Elite Society')

@section('content')

<section class="py-24 bg-[#faf7f2]">
    <div class="max-w-7xl mx-auto px-6 lg:px-10">
        <div class="text-center mb-16">
            <span class="text-amber-600 font-semibold uppercase tracking-widest text-sm">Our Products</span>
            <h1 class="text-5xl font-extrabold mt-5 text-slate-900">Home Care Essentials</h1>
            <p class="mt-6 text-slate-600 text-lg max-w-2xl mx-auto leading-relaxed">
                Keep your home sparkling clean and fresh with our top-tier home care solutions.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Product Item -->
            <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-shadow duration-300 border border-slate-100">
                <div class="h-64 bg-amber-50 flex items-center justify-center">
                    <span class="text-amber-200 text-6xl"><img src="{{asset('storage/products/dummy_image.jpg')}}" alt="" class="w-50 h-50 object-cover"></span>
                </div>
                <div class="p-8">
                    <h3 class="text-xl font-bold text-slate-900 mb-3">Multi-Surface Cleaner</h3>
                    <p class="text-slate-600 mb-6">Effectively removes dirt and grime from all hard surfaces, leaving a streak-free shine.</p>
                    <a href="#" class="inline-flex items-center text-amber-600 font-semibold hover:text-amber-700 transition">View Details <span class="ml-2">→</span></a>
                </div>
            </div>

            <!-- Product Item -->
            <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-shadow duration-300 border border-slate-100">
                <div class="h-64 bg-amber-50 flex items-center justify-center">
                    <span class="text-amber-200 text-6xl"><img src="{{asset('storage/products/dummy_image.jpg')}}" alt="" class="w-50 h-50 object-cover"></span>
                </div>
                <div class="p-8">
                    <h3 class="text-xl font-bold text-slate-900 mb-3">Premium Dish Wash</h3>
                    <p class="text-slate-600 mb-6">Cuts through tough grease easily while remaining gentle on your hands.</p>
                    <a href="#" class="inline-flex items-center text-amber-600 font-semibold hover:text-amber-700 transition">View Details <span class="ml-2">→</span></a>
                </div>
            </div>

            <!-- Product Item -->
            <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-shadow duration-300 border border-slate-100">
                <div class="h-64 bg-amber-50 flex items-center justify-center">
                    <span class="text-amber-200 text-6xl"><img src="{{asset('storage/products/dummy_image.jpg')}}" alt="" class="w-50 h-50 object-cover"></span>
                </div>
                <div class="p-8">
                    <h3 class="text-xl font-bold text-slate-900 mb-3">Hand Sanitizer</h3>
                    <p class="text-slate-600 mb-6">Kills 99.9% of germs while keeping your hands moisturized and soft.</p>
                    <a href="#" class="inline-flex items-center text-amber-600 font-semibold hover:text-amber-700 transition">View Details <span class="ml-2">→</span></a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection