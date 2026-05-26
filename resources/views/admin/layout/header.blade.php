<header
    class="h-20 bg-white border-b border-[#f1ece5] px-8 flex items-center justify-between">

    {{-- LEFT --}}
    <div>

        <h2 class="text-2xl font-bold">
            @yield('page_title', 'Dashboard')
        </h2>

    </div>

    {{-- RIGHT --}}
    <div class="flex items-center gap-4">
        {{-- PROFILE --}}
        <div class="flex items-center gap-3">
            <div class="text-right">
                <h4 class="text-sm font-semibold">
                    Admin
                </h4>
                <p class="text-xs text-slate-400">
                    Administrator
                </p>
            </div>
            <form method="POST" action="{{ route('admin.logout') }}" class="m-0">
                @csrf
                <button type="submit" class="bg-red-50 hover:bg-red-100 text-red-600 px-4 py-2 rounded-xl text-sm font-semibold transition-colors border border-red-200">
                    Logout
                </button>
            </form>
        </div>
    </div>

</header>