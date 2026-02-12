@extends('layouts.admin')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="flex items-center gap-4 mb-6">
        <a href="{{ route('admin.categories.index') }}" class="w-10 h-10 bg-white border border-gray-200 rounded-lg flex items-center justify-center text-gray-500 hover:text-blue-600 hover:border-blue-200 transition shadow-sm">
            <i class="fa-solid fa-arrow-left"></i>
        </a>
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Add New Category</h1>
            <p class="text-gray-500 text-sm">Create a new product category for your store</p>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
        <form action="{{ route('admin.categories.store') }}" method="POST" class="p-8 space-y-8" enctype="multipart/form-data">
            @csrf

            <div class="space-y-2">
                <label for="name" class="block text-sm font-bold text-gray-700">Category Name <span class="text-red-500">*</span></label>
                <div class="relative">
                    <input type="text" id="name" name="name" placeholder="e.g. Smart Watches" value="{{old('name')}}"
                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition text-gray-900 placeholder-gray-400"
                        onkeyup="generateSlug()">
                </div>
                @error('name')
                <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
                <p class="text-xs text-gray-500">The name is how it appears on your site.</p>
            </div>

            <div class="space-y-2">
                <label for="name" class="block text-sm font-bold text-gray-700">Description <span class="text-red-500">*</span></label>
                <div class="relative">
                    <input type="text" name="description" placeholder="e.g. Smart Watches" value="{{old('description')}}"
                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition text-gray-900 placeholder-gray-400">
                </div>
                @error('description')
                <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
                <p class="text-xs text-gray-500">The description gonna show on your site.</p>
            </div>

            <div class="space-y-2">
                <label for="slug" class="block text-sm font-bold text-gray-700">Slug (URL) <span class="text-red-500">*</span></label>
                <div class="flex rounded-xl overflow-hidden border border-gray-200 bg-gray-50 focus-within:ring-2 focus-within:ring-blue-500 focus-within:border-blue-500 transition">
                    <span class="inline-flex items-center px-4 bg-gray-100 text-gray-500 text-sm border-r border-gray-200 font-mono">
                        store.com/
                    </span>
                    <input type="text" id="slug" name="slug" placeholder="smart-watches" readonly value="{{old('slug')}}"
                        class="flex-1 px-4 py-3 bg-transparent border-none focus:ring-0 text-gray-900 font-mono text-sm placeholder-gray-400">
                </div>
                @error('slug')
                <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
                <p class="text-xs text-gray-500">The "slug" is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.</p>
            </div>

            <div class="space-y-2">
                <label class="text-sm font-bold text-gray-700 uppercase">Image du produit</label>
                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-xl hover:border-indigo-400 transition">
                    <div class="space-y-1 text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <div class="flex text-sm text-gray-600">
                            <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-green-600 hover:text-green-500 focus-within:outline-none">
                                <span>Télécharger un fichier</span>
                                <input id="file-upload" name="image" type="file" class="sr-only">
                            </label>
                        </div>
                        <p class="text-xs text-gray-500">PNG, JPG up to 2MB</p>
                    </div>
                </div>
            </div>
            @error('image')
            <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror

            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl border border-gray-200">
                <div>
                    <span class="block text-sm font-bold text-gray-900">Visibility Status</span>
                    <span class="text-xs text-gray-500">Enable this to make the category visible to customers immediately.</span>
                </div>
                <input type="hidden" name="is_active" value="0">

                <label class="relative inline-flex items-center cursor-pointer">
                    <input
                        type="checkbox"
                        name="is_active"
                        value="1"
                        class="sr-only peer"
                        {{ old('is_active', 1) ? 'checked' : '' }}>
                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-green-100 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-green-600"></div>
                </label>

            </div>
            @error('is_active')
            <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror

            <div class="pt-6 border-t border-gray-100 flex items-center justify-end gap-3">
                <a href="{{ route('admin.categories.index') }}" class="px-6 py-2.5 bg-white border border-gray-200 text-gray-700 rounded-xl hover:bg-gray-50 transition font-medium text-sm">
                    Cancel
                </a>
                <button type="submit" class="px-6 py-2.5 bg-green-600 text-white rounded-xl hover:bg-green-700 transition font-bold text-sm shadow-md shadow-blue-200">
                    <i class="fa-solid fa-save mr-2"></i> Save Category
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function generateSlug() {
        const nameInput = document.getElementById('name');
        const slugInput = document.getElementById('slug');

        let slug = nameInput.value
            .toLowerCase()
            .trim()
            .replace(/[^\w\s-]/g, '')
            .replace(/[\s_-]+/g, '-')
            .replace(/^-+|-+$/g, '');

        slugInput.value = slug;
    }
</script>
@endsection