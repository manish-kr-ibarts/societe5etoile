@extends('admin.layout.main')
@section('title', 'Categories')
@section('page_title', 'Product Categories')
@section('content')

<div class="bg-white rounded-2xl p-6 border relative">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-semibold">Categories</h2>
        <button onclick="openCreateModal()" class="bg-amber-600 text-white px-4 py-2 rounded-xl">Add New Category</button>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded-lg mb-4">{{ session('success') }}</div>
    @endif
    @if($errors->any())
        <div class="bg-red-100 text-red-800 p-3 rounded-lg mb-4">
            <ul class="list-disc pl-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <table class="w-full text-left">
        <thead>
            <tr class="border-b">
                <th class="pb-3">ID</th>
                <th class="pb-3">Name</th>
                <th class="pb-3 text-right">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr class="border-b">
                <td class="py-3">{{ $category->id }}</td>
                <td class="py-3">{{ $category->name }}</td>
                <td class="py-3 text-right">
                    <button onclick="openEditModal({{ $category->id }}, '{{ addslashes($category->name) }}')" class="text-blue-600 hover:underline mr-3">Edit</button>
                    <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
            @if($categories->isEmpty())
            <tr>
                <td colspan="3" class="py-3 text-center text-slate-500">No categories found.</td>
            </tr>
            @endif
        </tbody>
    </table>
</div>

<!-- Create Modal -->
<div id="createModal" class="fixed inset-0 bg-black/50 hidden flex items-center justify-center z-50">
    <div class="bg-white rounded-2xl p-6 border w-full max-w-md">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold">Add New Category</h3>
            <button onclick="closeCreateModal()" class="text-slate-400 hover:text-slate-600">&times;</button>
        </div>
        <form action="{{ route('admin.categories.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block mb-2 font-medium">Category Name</label>
                <input type="text" name="name" class="w-full border rounded-xl p-3 outline-none focus:border-amber-600" required>
            </div>
            <div class="flex justify-end gap-2">
                <button type="button" onclick="closeCreateModal()" class="px-4 py-2 text-slate-600 bg-slate-100 rounded-xl">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-amber-600 text-white rounded-xl">Save</button>
            </div>
        </form>
    </div>
</div>

<!-- Edit Modal -->
<div id="editModal" class="fixed inset-0 bg-black/50 hidden flex items-center justify-center z-50">
    <div class="bg-white rounded-2xl p-6 border w-full max-w-md">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold">Edit Category</h3>
            <button onclick="closeEditModal()" class="text-slate-400 hover:text-slate-600">&times;</button>
        </div>
        <form id="editForm" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="block mb-2 font-medium">Category Name</label>
                <input type="text" name="name" id="editName" class="w-full border rounded-xl p-3 outline-none focus:border-amber-600" required>
            </div>
            <div class="flex justify-end gap-2">
                <button type="button" onclick="closeEditModal()" class="px-4 py-2 text-slate-600 bg-slate-100 rounded-xl">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-amber-600 text-white rounded-xl">Update</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openCreateModal() {
        document.getElementById('createModal').classList.remove('hidden');
    }
    function closeCreateModal() {
        document.getElementById('createModal').classList.add('hidden');
    }

    function openEditModal(id, name) {
        document.getElementById('editModal').classList.remove('hidden');
        document.getElementById('editName').value = name;
        // Construct the update route manually
        document.getElementById('editForm').action = "/admin/categories/" + id;
    }
    function closeEditModal() {
        document.getElementById('editModal').classList.add('hidden');
    }
</script>
@endsection
