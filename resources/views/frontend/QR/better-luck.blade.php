@extends('frontend.layout.main')

@section('title', 'Scan Result')

@section('content')

<section class="bg-gray-50 py-16">
    <div class="max-w-md w-full mx-auto px-6">
        <div class="bg-white rounded-2xl shadow-2xl overflow-hidden border border-gray-100 transform transition-all hover:scale-105 duration-300">
            <!-- Header section of the card -->
            <div class="bg-gradient-to-r from-red-50 to-orange-50 py-8 text-center border-b border-red-100 relative">
                <!-- QR Code style decorative elements -->
                <div class="absolute top-2 left-2 w-4 h-4 border-t-2 border-l-2 border-red-200"></div>
                <div class="absolute top-2 right-2 w-4 h-4 border-t-2 border-r-2 border-red-200"></div>
                <div class="absolute bottom-2 left-2 w-4 h-4 border-b-2 border-l-2 border-red-200"></div>
                <div class="absolute bottom-2 right-2 w-4 h-4 border-b-2 border-r-2 border-red-200"></div>

                <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-white shadow-sm mb-4 text-red-500 border border-red-100">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-10 h-10">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </div>
                <h2 class="text-xs font-black uppercase tracking-widest text-red-600">Scan Complete</h2>
            </div>
            
            <!-- Body section -->
            <div class="p-8 text-center">
                <h1 class="text-3xl font-extrabold text-gray-900 mb-3">
                    Better Luck Next Time!
                </h1>
                <p class="text-gray-500 text-base leading-relaxed mb-2">
                    Thank you for participating. Keep scanning to win exciting rewards.
                </p>
            </div>
            
            <!-- Footer section -->
            <div class="bg-gray-50 py-4 px-6 text-center border-t border-gray-100 flex justify-between items-center">
                <span class="text-xs text-gray-400 font-mono">ID: {{ Str::random(8) }}</span>
                <span class="text-xs text-gray-400 font-mono">{{ now()->format('M d, Y H:i') }}</span>
            </div>
        </div>
    </div>
</section>

@endsection