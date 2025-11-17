@extends('admin.layouts.app')

@section('title', 'Create Blog Post')
@section('page-title', 'Create New Blog Post')

@section('content')
    <div class="max-w-4xl">
        <form action="{{ route('admin.blog.store') }}" method="POST" class="bg-white rounded-xl shadow-lg p-8" enctype="multipart/form-data">
            @csrf

            <div class="space-y-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Post Title *</label>
                    <input type="text" name="title" value="{{ old('title') }}" required
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
                    @error('title')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Category *</label>
                    <select name="category_id" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                            <option value={{$category->id}} {{ old($category->id) == $category->id ? 'selected' : '' }}>{{$category->name}}</option>
                        @endforeach
                    </select>
                    @error('category')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                </div>


                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Image *</label>
                    <input
                        type="file"
                        name="featured_image"
                        id="featured_image"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent"
                        value="{{ old('featured_image') }}"
                        maxlength="500"
                        required
                    >
                    @error('excerpt')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Excerpt (Short Description) *</label>
                    <textarea name="excerpt" rows="3" required maxlength="500"
                              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">{{ old('excerpt') }}</textarea>
                    <p class="text-xs text-gray-500 mt-1">Maximum 500 characters</p>
                    @error('excerpt')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Content *</label>
                    <textarea name="content" rows="15" required
                              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent font-mono text-sm">{{ old('content') }}</textarea>
                    @error('content')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Tags *</label>
                    <select id="tags" name="tag_id[]" multiple
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent bg-white text-gray-700">
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}" {{ (collect(old('tag_id'))->contains($tag->id)) ? 'selected' : '' }}>{{ $tag->name }}</option>
                        @endforeach
                    </select>
                    @error('tag_id')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div class="flex items-center">
                    <input type="checkbox" name="is_published" id="is_published" value="1" {{ old('is_published') ? 'checked' : '' }}
                    class="w-5 h-5 text-primary border-gray-300 rounded focus:ring-primary">
                    <label for="is_published" class="ml-3 text-gray-700">Publish immediately</label>
                </div>
            </div>

            <div class="flex space-x-4 mt-8">
                <button type="submit" class="bg-primary text-white px-8 py-3 rounded-lg hover:bg-indigo-700 transition font-medium">
                    <i class="fas fa-save mr-2"></i> Create Post
                </button>
                <a href="{{ route('admin.blog.index') }}" class="bg-gray-200 text-gray-700 px-8 py-3 rounded-lg hover:bg-gray-300 transition font-medium">
                    Cancel
                </a>
            </div>
        </form>
    </div>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function () {
        new Choices('#tags', {
            removeItemButton: true,
            placeholderValue: 'Select tags...',
            searchPlaceholderValue: 'Search tags'
        });
    });
</script>
