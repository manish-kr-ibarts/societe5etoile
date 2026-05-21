<header class="w-full bg-white shadow-sm sticky top-0 z-50">

    <div class="max-w-7xl mx-auto px-6 lg:px-10">

        <div class="flex items-center justify-between h-20">

            <!-- Logo -->
            <a href="{{ route('home') }}"
                class="flex items-center gap-2">

                <span class="text-2xl text-amber-600">
                    ★
                </span>

                <h1 class="text-xl font-extrabold tracking-wide uppercase">
                    Elite Society
                </h1>

            </a>

            <!-- Navigation -->
            <nav class="hidden md:flex items-center gap-10">

                <!-- Home -->
                <a href="{{ route('home') }}"
                    class="font-medium text-slate-600 hover:text-amber-600 transition">

                    Home

                </a>

                <!-- About -->
                <a href="{{ route('about') }}"
                    class="font-medium text-slate-600 hover:text-amber-600 transition">

                    About Us

                </a>

                <!-- Product Dropdown -->
                <div class="relative group">

                    <!-- Dropdown Button -->
                    <button
                        class="flex items-center gap-1 font-medium text-slate-600 hover:text-amber-600 transition h-20">

                        Product

                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-4 w-4"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor">

                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M19 9l-7 7-7-7" />

                        </svg>

                    </button>

                    <!-- Dropdown Wrapper -->
                    <div
                        class="absolute hidden group-hover:block top-full left-0 pt-2 z-50">

                        <!-- Dropdown Menu -->
                        <div
                            class="bg-white shadow-xl rounded-xl py-3 w-56 border border-slate-100 overflow-hidden">

                            <a href="{{ route('products.tissue') }}"
                                class="block px-5 py-3 text-slate-600 hover:bg-amber-50 hover:text-amber-600 transition">

                                Tissue

                            </a>

                            <a href="{{ route('products.home-care') }}"
                                class="block px-5 py-3 text-slate-600 hover:bg-amber-50 hover:text-amber-600 transition">

                                Home Care

                            </a>

                        </div>

                    </div>

                </div>

                <!-- Contact -->
                <a href="{{ route('contact') }}"
                    class="font-medium text-slate-600 hover:text-amber-600 transition">

                    Contact Us

                </a>

            </nav>

            <!-- CTA Button -->
            <a href="{{ route('contact') }}"
                class="hidden md:inline-flex items-center justify-center bg-amber-600 hover:bg-amber-700 text-white px-6 py-3 rounded-xl font-semibold transition">

                Contact Now

            </a>

            <!-- Mobile Menu Button -->
            <button id="mobile-menu-btn" class="md:hidden flex items-center text-slate-600 hover:text-amber-600 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>

        </div>

    </div>

    <!-- Mobile Navigation -->
    <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-slate-100">
        <nav class="flex flex-col px-6 py-4 space-y-4">
            <a href="{{ route('home') }}" class="font-medium text-slate-600 hover:text-amber-600 transition">Home</a>
            <a href="{{ route('about') }}" class="font-medium text-slate-600 hover:text-amber-600 transition">About Us</a>
            
            <div class="flex flex-col space-y-2">
                <span class="font-medium text-slate-800">Products</span>
                <a href="{{ route('products.tissue') }}" class="pl-4 font-medium text-slate-600 hover:text-amber-600 transition">Tissue</a>
                <a href="{{ route('products.home-care') }}" class="pl-4 font-medium text-slate-600 hover:text-amber-600 transition">Home Care</a>
            </div>

            <a href="{{ route('contact') }}" class="font-medium text-slate-600 hover:text-amber-600 transition">Contact Us</a>
            
            <a href="{{ route('contact') }}" class="inline-flex items-center justify-center bg-amber-600 hover:bg-amber-700 text-white px-6 py-3 rounded-xl font-semibold transition mt-4 w-full">
                Contact Now
            </a>
        </nav>
    </div>

    <script>
        document.getElementById('mobile-menu-btn').addEventListener('click', function() {
            var menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });
    </script>
</header>