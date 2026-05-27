@extends('admin.layout.main')
@section('title', 'Products')
@section('page_title', 'Products')
@section('content')

<div class="bg-white rounded-2xl p-6 border relative">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-semibold">Products</h2>
        <button onclick="openCreateModal()" class="bg-amber-600 text-white px-4 py-2 rounded-xl">Add New Product</button>
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
                <th class="pb-3">Image</th>
                <th class="pb-3">Name</th>
                <th class="pb-3">Categories</th>
                <th class="pb-3 text-right">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr class="border-b">
                <td class="py-3">{{ $product->id }}</td>
                <td class="py-3">
                    @if($product->image_path)
                        <img src="{{ asset('storage/' . $product->image_path) }}" class="w-12 h-12 object-cover rounded-md">
                    @else
                        <span class="text-gray-400 text-sm">No image</span>
                    @endif
                </td>
                <td class="py-3">{{ $product->name }}</td>
                <td class="py-3">
                    @foreach($product->categories as $category)
                        <span class="inline-block bg-gray-100 rounded px-2 py-1 text-xs text-gray-700 mb-1 mr-1">{{ $category->name }}</span>
                    @endforeach
                    @if($product->categories->isEmpty())
                        <span class="text-gray-400 text-sm">N/A</span>
                    @endif
                </td>
                <td class="py-3 text-right">
                    @php
                        $catIds = $product->categories->pluck('id')->toArray();
                    @endphp
                    <button onclick="openEditModal({{ $product->id }}, '{{ addslashes($product->name) }}', '{{ addslashes($product->description) }}', {{ json_encode($catIds) }}, '{{ $product->image_path }}')" class="text-blue-600 hover:underline mr-3">Edit</button>
                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
            @if($products->isEmpty())
            <tr>
                <td colspan="5" class="py-3 text-center text-slate-500">No products found.</td>
            </tr>
            @endif
        </tbody>
    </table>
</div>

<!-- Create Modal -->
<div id="createModal" class="fixed inset-0 bg-black/50 hidden flex items-center justify-center z-50 p-4">
    <div class="bg-white rounded-2xl p-6 border w-full max-w-2xl max-h-[90vh] overflow-y-auto">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold">Add New Product</h3>
            <button onclick="closeCreateModal()" class="text-slate-400 hover:text-slate-600">&times;</button>
        </div>
        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-4">
                <label class="block mb-2 font-medium">Product Name</label>
                <input type="text" name="name" class="w-full border rounded-xl p-3 outline-none focus:border-amber-600" value="{{ old('name') }}" required>
            </div>
            
            <div class="mb-6">
                <label class="block mb-3 font-medium">Categories</label>
                <div class="flex flex-wrap gap-3">
                    @foreach($categories as $category)
                        <label class="flex items-center gap-2 px-4 py-2 border rounded-xl cursor-pointer hover:bg-slate-50 transition shadow-sm bg-white has-[:checked]:border-amber-600 has-[:checked]:bg-amber-50">
                            <input type="checkbox" name="categories[]" value="{{ $category->id }}" class="w-4 h-4 text-amber-600 focus:ring-amber-500 rounded accent-amber-600" {{ in_array($category->id, old('categories', [])) ? 'checked' : '' }}>
                            <span class="text-sm font-medium">{{ $category->name }}</span>
                        </label>
                    @endforeach
                </div>
                @if($categories->isEmpty())
                    <p class="text-sm text-gray-500 italic">No categories created yet. <a href="{{ route('admin.categories.index') }}" class="text-amber-600 hover:underline">Create one here</a>.</p>
                @endif
            </div>

            <div class="mb-4">
                <label class="block mb-2 font-medium">Information Details (Description)</label>
                <textarea name="description" rows="4" class="w-full border rounded-xl p-3 outline-none focus:border-amber-600">{{ old('description') }}</textarea>
            </div>
            
            <div class="mb-4">
                <label class="block mb-2 font-medium">Product Image (Optional)</label>
                <input type="file" name="image" class="w-full border rounded-xl p-3 outline-none focus:border-amber-600" accept="image/*">
            </div>

            <div class="flex justify-end gap-2 mt-6">
                <button type="button" onclick="closeCreateModal()" class="px-4 py-2 text-slate-600 bg-slate-100 rounded-xl">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-amber-600 text-white rounded-xl">Save Product</button>
            </div>
        </form>
    </div>
</div>

<!-- Edit Modal -->
<div id="editModal" class="fixed inset-0 bg-black/50 hidden flex items-center justify-center z-50 p-4">
    <div class="bg-white rounded-2xl p-6 border w-full max-w-2xl max-h-[90vh] overflow-y-auto">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold">Edit Product</h3>
            <button onclick="closeEditModal()" class="text-slate-400 hover:text-slate-600">&times;</button>
        </div>
        <form id="editForm" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="mb-4">
                <label class="block mb-2 font-medium">Product Name</label>
                <input type="text" name="name" id="editName" class="w-full border rounded-xl p-3 outline-none focus:border-amber-600" required>
            </div>
            
            <div class="mb-6">
                <label class="block mb-3 font-medium">Categories</label>
                <div class="flex flex-wrap gap-3">
                    @foreach($categories as $category)
                        <label class="flex items-center gap-2 px-4 py-2 border rounded-xl cursor-pointer hover:bg-slate-50 transition shadow-sm bg-white has-[:checked]:border-amber-600 has-[:checked]:bg-amber-50">
                            <input type="checkbox" name="categories[]" value="{{ $category->id }}" id="editCategory_{{ $category->id }}" class="w-4 h-4 text-amber-600 focus:ring-amber-500 rounded accent-amber-600 edit-category-checkbox">
                            <span class="text-sm font-medium">{{ $category->name }}</span>
                        </label>
                    @endforeach
                </div>
            </div>

            <div class="mb-4">
                <label class="block mb-2 font-medium">Information Details (Description)</label>
                <textarea name="description" id="editDescription" rows="4" class="w-full border rounded-xl p-3 outline-none focus:border-amber-600"></textarea>
            </div>
            
            <div class="mb-4">
                <label class="block mb-2 font-medium">Product Image (Optional)</label>
                <div id="editImagePreview" class="mb-2 hidden">
                    <img src="" id="editImageTag" class="w-24 h-24 object-cover rounded-lg border">
                </div>
                <input type="file" name="image" class="w-full border rounded-xl p-3 outline-none focus:border-amber-600" accept="image/*">
                <small class="text-gray-500">Leave blank to keep current image</small>
            </div>

            <div class="flex justify-end gap-2 mt-6">
                <button type="button" onclick="closeEditModal()" class="px-4 py-2 text-slate-600 bg-slate-100 rounded-xl">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-amber-600 text-white rounded-xl">Update Product</button>
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

    function openEditModal(id, name, description, categoryIds, imagePath) {
        document.getElementById('editModal').classList.remove('hidden');
        document.getElementById('editForm').action = "/admin/products/" + id;
        
        document.getElementById('editName').value = name;
        document.getElementById('editDescription').value = description;
        
        // Reset checkboxes
        document.querySelectorAll('.edit-category-checkbox').forEach(cb => cb.checked = false);
        // Check applicable ones
        categoryIds.forEach(catId => {
            let cb = document.getElementById('editCategory_' + catId);
            if(cb) cb.checked = true;
        });
        
        // Handle image preview
        let imgPreview = document.getElementById('editImagePreview');
        let imgTag = document.getElementById('editImageTag');
        if(imagePath) {
            imgTag.src = "{{ asset('storage') }}/" + imagePath;
            imgPreview.classList.remove('hidden');
        } else {
            imgPreview.classList.add('hidden');
            imgTag.src = "";
        }
    }
    function closeEditModal() {
        document.getElementById('editModal').classList.add('hidden');
    }
</script>
@endsection
