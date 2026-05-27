@extends('admin.layout.main')

@section('title', 'QR Codes')

@section('page_title', 'Manage QR Codes')

@section('content')

@if(session('success'))
<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
    <span class="block sm:inline">{{ session('success') }}</span>
</div>
@endif

@if($errors->any())
<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
    <ul class="list-disc pl-5">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="bg-white rounded-2xl p-6 border shadow-sm relative">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
        <h2 class="text-lg font-semibold">Generated QR Codes</h2>
        
        <div class="flex items-center gap-4">
            <form action="{{ route('admin.qrcodes.index') }}" method="GET" class="flex items-center gap-2">
                <label for="filter_type" class="text-sm font-medium text-gray-700">Filter:</label>
                <select name="type" id="filter_type" class="text-sm rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 py-1.5" onchange="this.form.submit()">
                    <option value="all" {{ request('type') == 'all' ? 'selected' : '' }}>All Types</option>
                    <option value="better_luck" {{ request('type') == 'better_luck' ? 'selected' : '' }}>Better Luck</option>
                    <option value="one_time_winner" {{ request('type') == 'one_time_winner' ? 'selected' : '' }}>One Time</option>
                    <option value="multiple_winner" {{ request('type') == 'multiple_winner' ? 'selected' : '' }}>Multiple</option>
                </select>
                @if(request()->has('type') && request('type') !== 'all')
                    <a href="{{ route('admin.qrcodes.index') }}" class="text-sm text-indigo-600 hover:text-indigo-800">Clear</a>
                @endif
            </form>

            <button onclick="openCreateModal()" class="bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium py-2 px-4 rounded-lg transition duration-200 shadow-sm">
                + Generate QR Code
            </button>
        </div>
    </div>
    
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Code</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Winners</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created</th>
                    <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($qrcodes as $qr)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">#{{ $qr->id }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $qr->title }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $qr->code }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        @if($qr->type === 'better_luck')
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">Better Luck</span>
                        @elseif($qr->type === 'one_time_winner')
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">One Time</span>
                        @elseif($qr->type === 'multiple_winner')
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">Multiple</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $qr->winners_count }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $qr->created_at->format('M d, Y H:i') }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-3">
                        <button onclick="openEditModal({{ $qr->id }}, '{{ addslashes($qr->title) }}', '{{ $qr->type }}', '{{ route('admin.qrcodes.download', $qr->id) }}', '{{ $qr->code }}', {{ $qr->winners_count }})" class="text-indigo-600 hover:text-indigo-900">View / Edit</button>
                        <a href="{{ route('admin.qrcodes.download', $qr->id) }}" class="text-emerald-600 hover:text-emerald-900">Download SVG</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">No QR codes generated yet.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Create Modal -->
<div id="createModal" class="fixed inset-0 bg-black/50 hidden flex items-center justify-center z-50 p-4">
    <div class="bg-white rounded-2xl p-6 border w-full max-w-md">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold">Generate New QR Code</h3>
            <button onclick="closeCreateModal()" class="text-gray-400 hover:text-gray-600">&times;</button>
        </div>
        <form action="{{ route('admin.qrcodes.store') }}" method="POST">
            @csrf
            
            <div class="mb-4">
                <label for="title" class="block text-sm font-semibold text-gray-700 mb-2">Title</label>
                <input type="text" name="title" id="title" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 py-3" required placeholder="e.g. Summer Promo">
            </div>

            <div class="mb-6">
                <label for="type" class="block text-sm font-semibold text-gray-700 mb-2">Select Type</label>
                <select name="type" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 py-3" required>
                    <option value="" disabled selected>Select a type...</option>
                    <option value="better_luck">Better Luck Next Time</option>
                    <option value="one_time_winner">One Time Winner</option>
                    <option value="multiple_winner">Multiple Winner</option>
                </select>
            </div>
            
            <div class="flex justify-end gap-2 mt-6">
                <button type="button" onclick="closeCreateModal()" class="px-4 py-2 text-gray-600 bg-gray-100 rounded-xl">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl">Generate & Save</button>
            </div>
        </form>
    </div>
</div>

<!-- Edit/View Modal -->
<div id="editModal" class="fixed inset-0 bg-black/50 hidden flex items-center justify-center z-50 p-4">
    <div class="bg-white rounded-2xl p-6 border w-full max-w-2xl max-h-[90vh] overflow-y-auto">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold">View / Edit QR Code</h3>
            <button onclick="closeEditModal()" class="text-gray-400 hover:text-gray-600">&times;</button>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Edit Form -->
            <div>
                <form id="editForm" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-4">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Title</label>
                        <input type="text" name="title" id="editTitle" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 py-3" required>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">QR Code Type</label>
                        <select name="type" id="editType" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 py-3" required>
                            <option value="better_luck">Better Luck Next Time</option>
                            <option value="one_time_winner">One Time Winner</option>
                            <option value="multiple_winner">Multiple Winner</option>
                        </select>
                    </div>
                    
                    <div class="flex justify-start gap-2 mt-6">
                        <button type="button" onclick="closeEditModal()" class="px-4 py-2 text-gray-600 bg-gray-100 rounded-xl text-sm">Cancel</button>
                        <button type="submit" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl text-sm">Update Settings</button>
                    </div>
                </form>
            </div>
            
            <!-- QR Preview -->
            <div class="bg-gray-50 rounded-2xl p-4 border flex flex-col items-center text-center">
                <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-4">QR Code Preview</h3>
                <img src="" id="editQrPreview" alt="QR Code" class="w-full max-w-[150px] h-auto rounded-lg shadow-sm border bg-white p-2">
                <p class="mt-4 text-xs font-mono text-gray-600">Code: <span id="editQrCodeText" class="font-bold text-indigo-600"></span></p>
                <p class="mt-1 text-xs text-gray-500">Winners: <span id="editWinnersCount"></span></p>
            </div>
        </div>
    </div>
</div>

<script>
    function openCreateModal() {
        document.getElementById('createModal').classList.remove('hidden');
    }
    function closeCreateModal() {
        document.getElementById('createModal').classList.add('hidden');
    }

    function openEditModal(id, title, type, qrUrl, code, winnersCount) {
        document.getElementById('editModal').classList.remove('hidden');
        document.getElementById('editForm').action = "/admin/qrcodes/" + id;
        document.getElementById('editTitle').value = title;
        document.getElementById('editType').value = type;
        
        document.getElementById('editQrPreview').src = qrUrl;
        document.getElementById('editQrCodeText').innerText = code;
        document.getElementById('editWinnersCount').innerText = winnersCount;
    }
    function closeEditModal() {
        document.getElementById('editModal').classList.add('hidden');
    }
</script>

@endsection
