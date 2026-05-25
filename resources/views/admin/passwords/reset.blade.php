<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - Elite Society</title>

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

            <!-- Logo -->
            <div class="h-20 flex items-center">
                <a href="{{ route('home') }}" class="flex items-center gap-5">
                    <div class="flex items-center justify-center gap-4">
                        <img src="/storage/logo/logo.jfif" alt="logo" class="w-20 h-20">
                        <img src="/storage/logo/Flag_Comoros.png" alt="logo" class="w-20 h-20">
                        <img src="/storage/logo/product_logo.png" alt="logo" class="w-20 h-20">
                    </div>
                </a>
            </div>

            <!-- Content -->
            <div class="z-10 my-auto py-10">

                <h1 class="text-5xl font-extrabold text-slate-800 leading-tight">
                    Secure <br>
                    <span class="bg-gradient-to-r from-luxury-500 to-luxury-600 bg-clip-text text-transparent">
                        Your Account.
                    </span>
                </h1>

                <p class="text-slate-500 mt-6 text-base leading-relaxed max-w-sm">
                    Enter your new password below. Make sure it is at least 8 characters long and secure.
                </p>

            </div>

            <!-- Footer -->
            <div class="z-10 flex items-center justify-between text-xs text-slate-400">

                <span>
                    © {{ date('Y') }} Elite Society. All rights reserved.
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
                    Reset Password
                </h2>

                <p class="text-slate-500 mt-2 text-sm">
                    Please set a new strong password for your account.
                </p>
            </div>

            <!-- Errors -->
            @if ($errors->any())
            <div class="mb-6 p-4 bg-red-50 border border-red-100 rounded-2xl">
                <h4 class="text-sm font-semibold text-red-800 mb-2">
                    Whoops! Something went wrong.
                </h4>
                <ul class="text-xs text-red-700 list-disc list-inside">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <!-- Form -->
            <form action="{{ route('password.update') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $token }}">

                <!-- Email -->
                <div>
                    <label class="block text-sm font-medium text-slate-600 mb-2">
                        Email Address
                    </label>

                    <input
                        type="email"
                        name="email"
                        required
                        value="{{ $email ?? old('email') }}"
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50 focus:outline-none focus:ring-4 focus:ring-luxury-100 focus:border-luxury-400 transition-all duration-300">
                </div>

                <!-- Password -->
                <div>
                    <label class="block text-sm font-medium text-slate-600 mb-2">
                        New Password
                    </label>

                    <div class="relative">
                        <input
                            type="password"
                            name="password"
                            id="password"
                            required
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50 focus:outline-none focus:ring-4 focus:ring-luxury-100 focus:border-luxury-400 transition-all duration-300">
                    </div>
                </div>

                <!-- Confirm Password -->
                <div>
                    <label class="block text-sm font-medium text-slate-600 mb-2">
                        Confirm Password
                    </label>

                    <div class="relative">
                        <input
                            type="password"
                            name="password_confirmation"
                            id="password_confirmation"
                            required
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50 focus:outline-none focus:ring-4 focus:ring-luxury-100 focus:border-luxury-400 transition-all duration-300">
                    </div>
                </div>

                <!-- Button -->
                <button
                    type="submit"
                    class="w-full py-3.5 bg-gradient-to-r from-luxury-500 to-luxury-600 hover:from-luxury-600 hover:to-luxury-700 text-white rounded-xl font-semibold shadow-lg hover-lift">

                    Reset Password

                </button>

            </form>
        </div>

    </div>

</body>

</html>
