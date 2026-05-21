<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Elite Society</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Tailwind -->
    <script src="{{ asset('js/tailwind.js') }}"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        luxury: {
                            50: '#FCFAF7',
                            100: '#F5EFEB',
                            200: '#EADFD3',
                            300: '#DCBFA1',
                            400: '#C79F73',
                            500: '#B08453',
                            600: '#996C3E',
                            700: '#7E542C',
                            800: '#643F20',
                            900: '#4D2E15',
                        }
                    },
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                    },
                    boxShadow: {
                        'premium': '0 20px 50px -12px rgba(176, 132, 83, 0.12)',
                        'premium-hover': '0 30px 60px -10px rgba(176, 132, 83, 0.22)',
                    }
                }
            }
        }
    </script>

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .hover-lift {
            transition: all 0.3s ease;
        }

        .hover-lift:hover {
            transform: translateY(-2px);
        }
    </style>
</head>

<body class="bg-gradient-to-br from-[#FDFCFB] via-[#FAF6F0] to-[#F1ECE3] min-h-screen flex items-center justify-center p-4">

    <!-- Main Wrapper -->
    <div class="w-full max-w-5xl bg-white/70 backdrop-blur-xl rounded-[2rem] overflow-hidden shadow-premium flex flex-col lg:flex-row">

        <!-- Left Section -->
        <div class="hidden lg:flex lg:w-1/2 bg-gradient-to-tr from-luxury-100 via-luxury-50 to-white p-16 flex-col justify-between relative">

            <div class="absolute top-0 right-0 w-80 h-80 bg-luxury-200/30 rounded-full blur-3xl -mr-24 -mt-24"></div>
            <div class="absolute bottom-0 left-0 w-96 h-96 bg-[#EADFD3]/40 rounded-full blur-3xl -ml-28 -mb-28"></div>

            <!-- Logo -->
            <div class="z-10 flex items-center gap-2">
                <span class="text-luxury-500 font-extrabold text-xl">★</span>
                <span class="text-slate-800 font-extrabold tracking-widest text-sm uppercase">
                    ELITE SOCIETY
                </span>
            </div>

            <!-- Content -->
            <div class="z-10 my-auto py-10">

                <div class="w-24 h-24 rounded-3xl bg-white shadow-premium flex items-center justify-center mb-8 border border-luxury-100 hover-lift">

                    <svg class="w-12 h-12 text-luxury-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                        </path>
                    </svg>

                </div>

                <h1 class="text-5xl font-extrabold text-slate-800 leading-tight">
                    Excellence <br>
                    <span class="bg-gradient-to-r from-luxury-500 to-luxury-600 bg-clip-text text-transparent">
                        Every Day.
                    </span>
                </h1>

                <p class="text-slate-500 mt-6 text-base leading-relaxed max-w-sm">
                    Access the premium administrative portal. Manage your properties,
                    requests, and service standards with complete control.
                </p>

            </div>

            <!-- Footer -->
            <div class="z-10 flex items-center justify-between text-xs text-slate-400">

                <span>
                    © {{ date('Y') }} Elite Society. All rights reserved.
                </span>

                <span class="flex items-center gap-1.5">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                    Secure Session
                </span>

            </div>

        </div>

        <!-- Right Section -->
        <div class="w-full lg:w-1/2 p-8 sm:p-12 md:p-16 bg-white/40 flex flex-col justify-center">

            <!-- Mobile Logo -->
            <div class="flex lg:hidden items-center gap-2 mb-8">
                <span class="text-luxury-500 font-extrabold text-lg">★</span>

                <span class="text-slate-800 font-bold tracking-widest text-xs uppercase">
                    ELITE SOCIETY
                </span>
            </div>

            <!-- Heading -->
            <div class="mb-8">
                <h2 class="text-3xl font-extrabold text-slate-800">
                    Welcome Back
                </h2>

                <p class="text-slate-500 mt-2 text-sm">
                    Please log in to manage your dashboard.
                </p>
            </div>

            <!-- Errors -->
            @if ($errors->any())
            <div class="mb-6 p-4 bg-red-50 border border-red-100 rounded-2xl">

                <h4 class="text-sm font-semibold text-red-800 mb-2">
                    Verification Failed
                </h4>

                <ul class="text-xs text-red-700 list-disc list-inside">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>

            </div>
            @endif

            <!-- Form -->
            <form action="{{ Route::has('login') ? route('login') : '#' }}" method="POST" class="space-y-6">
                @csrf

                <!-- Email -->
                <div>
                    <label class="block text-sm font-medium text-slate-600 mb-2">
                        Email Address
                    </label>

                    <input
                        type="email"
                        name="email"
                        required
                        value="{{ old('email') }}"
                        placeholder="admin@elitesociety.com"
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50 focus:outline-none focus:ring-4 focus:ring-luxury-100 focus:border-luxury-400 transition-all duration-300">
                </div>

                <!-- Password -->
                <div>
                    <label class="block text-sm font-medium text-slate-600 mb-2">
                        Password
                    </label>

                    <div class="relative">

                        <input
                            type="password"
                            name="password"
                            id="password"
                            required
                            placeholder="••••••••"
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50 focus:outline-none focus:ring-4 focus:ring-luxury-100 focus:border-luxury-400 transition-all duration-300">

                        <button
                            type="button"
                            id="password-toggle"
                            class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 hover:text-luxury-500">

                            👁

                        </button>

                    </div>
                </div>

                <!-- Remember -->
                <div class="flex items-center justify-between text-sm">

                    <label class="flex items-center gap-2 cursor-pointer">
                        <input
                            type="checkbox"
                            name="remember"
                            class="accent-luxury-500">

                        <span class="text-slate-500">
                            Remember me
                        </span>
                    </label>

                    <a href="#" class="text-luxury-500 font-semibold hover:underline">
                        Forgot Password?
                    </a>

                </div>

                <!-- Button -->
                <button
                    type="submit"
                    class="w-full py-3.5 bg-gradient-to-r from-luxury-500 to-luxury-600 hover:from-luxury-600 hover:to-luxury-700 text-white rounded-xl font-semibold shadow-lg hover-lift">

                    Sign In to Dashboard

                </button>

            </form>

            <!-- Footer -->
            <div class="mt-8 text-center text-xs text-slate-400">

                <p>
                    Authorized access only.
                    Need assistance?

                    <a href="#" class="text-luxury-500 hover:underline font-semibold">
                        Contact Support
                    </a>
                </p>

            </div>

        </div>

    </div>

    <!-- Password Toggle -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const passwordInput = document.getElementById('password');
            const passwordToggle = document.getElementById('password-toggle');

            passwordToggle.addEventListener('click', function() {

                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                } else {
                    passwordInput.type = 'password';
                }

            });

        });
    </script>

</body>

</html>