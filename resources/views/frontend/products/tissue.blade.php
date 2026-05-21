@extends('frontend.layout.main')

@section('title', 'Tissue Products - Elite Society')

@section('content')

<section class="py-24 bg-[#faf7f2]">
    <div class="max-w-7xl mx-auto px-6 lg:px-10">
        <div class="text-center mb-16">
            <span class="text-amber-600 font-semibold uppercase tracking-widest text-sm">Our Products</span>
            <h1 class="text-5xl font-extrabold mt-5 text-slate-900">Premium Tissue Collection</h1>
            <p class="mt-6 text-slate-600 text-lg max-w-2xl mx-auto leading-relaxed">
                Experience unparalleled softness and strength with our exclusive tissue products. Designed for your ultimate comfort and hygiene.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Product Item -->
            <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-shadow duration-300 border border-slate-100">
                <div class="h-64 bg-amber-50 flex items-center justify-center">
                    <span class="text-amber-200 text-6xl"><img src="{{asset('storage/products/dummy_image.jpg')}}" alt="" class="w-50 h-50 object-cover"></span>
                </div>
                <div class="p-8">
                    <h3 class="text-xl font-bold text-slate-900 mb-3">Ultra Soft Facial Tissue</h3>
                    <p class="text-slate-600 mb-6">Gentle on skin, tough on messes. Our 3-ply facial tissues provide exceptional softness.</p>
                    <a href="#" class="inline-flex items-center text-amber-600 font-semibold hover:text-amber-700 transition">View Details <span class="ml-2">→</span></a>
                </div>
            </div>

            <!-- Product Item -->
            <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-shadow duration-300 border border-slate-100">
                <div class="h-64 bg-amber-50 flex items-center justify-center">
                    <span class="text-amber-200 text-6xl"><img src="{{asset('storage/products/dummy_image.jpg')}}" alt="" class="w-50 h-50 object-cover"></span>
                </div>
                <div class="p-8">
                    <h3 class="text-xl font-bold text-slate-900 mb-3">Premium Bath Tissue</h3>
                    <p class="text-slate-600 mb-6">Luxurious comfort in every roll. Long-lasting and highly absorbent bath tissue.</p>
                    <a href="#" class="inline-flex items-center text-amber-600 font-semibold hover:text-amber-700 transition">View Details <span class="ml-2">→</span></a>
                </div>
            </div>

            <!-- Product Item -->
            <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-shadow duration-300 border border-slate-100">
                <div class="h-64 bg-amber-50 flex items-center justify-center">
                    <span class="text-amber-200 text-6xl"><img src="{{asset('storage/products/dummy_image.jpg')}}" alt="" class="w-50 h-50 object-cover"></span>
                </div>
                <div class="p-8">
                    <h3 class="text-xl font-bold text-slate-900 mb-3">Kitchen Paper Towels</h3>
                    <p class="text-slate-600 mb-6">Maximum absorbency for kitchen spills. Durable and reliable paper towels.</p>
                    <a href="#" class="inline-flex items-center text-amber-600 font-semibold hover:text-amber-700 transition">View Details <span class="ml-2">→</span></a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection