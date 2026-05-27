<aside
    class="w-[260px] bg-white border-r border-[#f1ece5] fixed left-0 top-0 h-screen">

    <!-- {{-- LOGO --}}
    <div class="h-20 border-b border-[#f1ece5] flex items-center p-3 m-3">
        <a href="" class="flex items-center gap-2 h-[50%]">
            <div class="flex items-center justify-center p-3 m-3 h-[50%]">
                <img src="/storage/logo/logo.jfif" alt="logo" class="w-20 h-20">
                <img src="/storage/logo/Flag_Comoros.png" alt="logo" class="w-20 h-20">
                <img src="/storage/logo/product_logo.png" alt="logo" class="w-20 h-20">
            </div>
        </a>
    </div> -->
     {{-- LOGO --}}
    <div class="h-20 border-b border-[#f1ece5] flex items-center px-3 mx-3">
        <a href="" class="flex items-center gap-2 h-[50%]">
            <h2 class="text-2xl font-semibold text-amber-600">Societe 5 Etoile</h2>    
        </a>
    </div>

    {{-- MENU --}}
    <div class="p-5 sidebar-scroll overflow-y-auto h-[calc(100vh-80px)]">

        <ul class="space-y-2">

            {{-- Dashboard --}}
            <li>

                <a href="{{ url('admin/dashboard') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl font-medium transition {{ request()->is('admin/dashboard*') ? 'bg-amber-600 text-white' : 'text-slate-600 hover:bg-[#f8f5f0]' }}">

                    <i class="fa-solid fa-gauge text-sm"></i>

                    Dashboard

                </a>

            </li>

            {{-- Products --}}
            <li>

                <a href="{{ route('admin.products.index') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl font-medium transition {{ request()->is('admin/products*') ? 'bg-amber-600 text-white' : 'text-slate-600 hover:bg-[#f8f5f0]' }}">

                    <i class="fa-solid fa-box text-sm"></i>

                    Products

                </a>

            </li>

            {{-- Product Categories --}}
            <li>

                <a href="{{ route('admin.categories.index') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl font-medium transition {{ request()->is('admin/categories*') ? 'bg-amber-600 text-white' : 'text-slate-600 hover:bg-[#f8f5f0]' }}">

                    <i class="fa-solid fa-layer-group text-sm"></i>

                    Product Categories

                </a>

            </li>

            {{-- QR Codes --}}
            <li>
                <a href="{{ route('admin.qrcodes.index') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl font-medium transition {{ request()->is('admin/qrcodes*') ? 'bg-amber-600 text-white' : 'text-slate-600 hover:bg-[#f8f5f0]' }}">
                    <i class="fa-solid fa-qrcode text-sm"></i>
                    QR Codes
                </a>

            </li>
            {{-- Users --}}
            <li>
                <a href=""
                    class="flex items-center gap-3 px-4 py-3 rounded-xl font-medium transition {{ request()->is('admin/users*') ? 'bg-amber-600 text-white' : 'text-slate-600 hover:bg-[#f8f5f0]' }}">
                    <i class="fa-solid fa-users text-sm"></i>
                    User List
                </a>
            </li>
        </ul>

    </div>

</aside>