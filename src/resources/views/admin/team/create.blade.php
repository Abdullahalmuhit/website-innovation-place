@extends('admin.layouts.app')

@section('title', 'Add Team Member')
@section('page-title', 'Add New Team Member')

@section('content')
    <div class="max-w-3xl">
        <form action="{{ route('admin.team.store') }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-xl shadow-lg p-8">
            @csrf

            <div class="space-y-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Full Name *</label>
                    <input type="text" name="name" value="{{ old('name') }}" required
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
                    @error('name')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Role/Position *</label>
                    <input type="text" name="role" value="{{ old('role') }}" required
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent"
                           placeholder="e.g., CEO, Lead Developer">
                    @error('role')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Bio (Optional)</label>
                    <textarea name="bio" rows="3"
                              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">{{ old('bio') }}</textarea>
                    @error('bio')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Email (Optional)</label>
                    <input type="email" name="email" value="{{ old('email') }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
                    @error('email')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">LinkedIn URL (Optional)</label>
                    <input type="url" name="linkedin" value="{{ old('linkedin') }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent"
                           placeholder="https://linkedin.com/in/username">
                    @error('linkedin')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Profile Image (Optional)</label>
                    <input type="file" name="image" accept="image/jpeg,image/png,image/jpg"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
                    <p class="text-xs text-gray-500 mt-1">JPG, PNG. Max 2MB</p>
                    @error('image')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Display Order *</label>
                    <input type="number" name="order" value="{{ old('order', 0) }}" min="0" required
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
                    <p class="text-xs text-gray-500 mt-1">Lower numbers appear first</p>
                    @error('order')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                </div>
            </div>

            <div class="flex space-x-4 mt-8">
                <button type="submit" class="bg-primary text-white px-8 py-3 rounded-lg hover:bg-indigo-700 transition font-medium">
                    <i class="fas fa-save mr-2"></i> Add Team Member
                </button>
                <a href="{{ route('admin.team.index') }}" class="bg-gray-200 text-gray-700 px-8 py-3 rounded-lg hover:bg-gray-300 transition font-medium">
                    Cancel
                </a>
            </div>
        </form>
    </div>
@endsection
