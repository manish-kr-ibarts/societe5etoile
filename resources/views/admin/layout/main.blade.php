<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.layout.styles')
</head>

<body class="text-slate-800 bg-gradient-to-br from-[#FDFCFB] via-[#FAF6F0] to-[#F1ECE3] antialiased selection:bg-[#B08453] selection:text-white">

<div class="flex min-h-screen">

    {{-- Sidebar --}}
    @include('admin.layout.sidebar')

    <div class="ml-[260px] flex-1">

        {{-- Header --}}
        @include('admin.layout.header')

        <main class="p-8">

            @yield('content')

        </main>
    </div>

</div>

@stack('scripts')

</body>
</html>