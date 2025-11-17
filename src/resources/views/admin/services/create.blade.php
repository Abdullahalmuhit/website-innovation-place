@extends('admin.layouts.app')

@section('title', 'Create Service')
@section('page-title', 'Create New Service')

@section('content')
    <div class="max-w-3xl">
        <form action="{{ route('admin.services.store') }}" method="POST" class="bg-white rounded-xl shadow-lg p-8">
            @csrf

            <div class="space-y-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Service Title *</label>
                    <input type="text" name="title" value="{{ old('title') }}" required
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
                    @error('title')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Description *</label>
                    <textarea name="description" rows="4" required
                              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">{{ old('description') }}</textarea>
                    @error('description')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">FontAwesome Icon * (e.g., code, mobile, database)</label>
                    <input type="text" name="icon" value="{{ old('icon') }}" required
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent"
                           placeholder="code">
                    <p class="text-xs text-gray-500 mt-1">Find icons at <a href="https://fontawesome.com/icons" target="_blank" class="text-primary hover:underline">fontawesome.com</a></p>
                    @error('icon')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Display Order *</label>
                    <input type="number" name="order" value="{{ old('order', 0) }}" min="0" required
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
                    @error('order')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div class="flex items-center">
                    <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}
                    class="w-5 h-5 text-primary border-gray-300 rounded focus:ring-primary">
                    <label for="is_active" class="ml-3 text-gray-700">Active (visible on website)</label>
                </div>
            </div>

            <div class="flex space-x-4 mt-8">
                <button type="submit" class="bg-primary text-white px-8 py-3 rounded-lg hover:bg-indigo-700 transition font-medium">
                    <i class="fas fa-save mr-2"></i> Create Service
                </button>
                <a href="{{ route('admin.services.index') }}" class="bg-gray-200 text-gray-700 px-8 py-3 rounded-lg hover:bg-gray-300 transition font-medium">
                    Cancel
                </a>
            </div>
        </form>
    </div>
@endsection
