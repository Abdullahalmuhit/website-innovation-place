@extends('admin.layouts.app')

@section('title', 'Edit Team Member')
@section('page-title', 'Edit Team Member')

@section('content')
    <div class="max-w-3xl">
        <form action="{{ route('admin.team.update', $member) }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-xl shadow-lg p-8">
            @csrf
            @method('PUT')

            <div class="space-y-6">
                @if($member->image)
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Current Image</label>
                        <div class="w-32 h-32 rounded-full overflow-hidden border-4 border-gray-200">
                            <img src="{{ asset('storage/' . $member->image) }}" alt="{{ $member->name }}" class="object-cover w-full h-full">
                        </div>
                    </div>
                @endif

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Full Name *</label>
                    <input type="text" name="name" value="{{ old('name', $member->name) }}" required
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
                    @error('name')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Role/Position *</label>
                    <input type="text" name="role" value="{{ old('role', $member->role) }}" required
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
                    @error('role')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Bio (Optional)</label>
                    <textarea name="bio" rows="3"
                              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">{{ old('bio', $member->bio) }}</textarea>
                    @error('bio')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Email (Optional)</label>
                    <input type="email" name="email" value="{{ old('email', $member->email) }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
                    @error('email')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">LinkedIn URL (Optional)</label>
                    <input type="url" name="linkedin" value="{{ old('linkedin', $member->linkedin) }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
                    @error('linkedin')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Update Profile Image (Optional)</label>
                    <input type="file" name="image" accept="image/jpeg,image/png,image/jpg"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
                    <p class="text-xs text-gray-500 mt-1">Leave empty to keep current image</p>
                    @error('image')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Display Order *</label>
                    <input type="number" name="order" value="{{ old('order', $member->order) }}" min="0" required
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
                    @error('order')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                </div>
            </div>

            <div class="flex space-x-4 mt-8">
                <button type="submit" class="bg-primary text-white px-8 py-3 rounded-lg hover:bg-indigo-700 transition font-medium">
                    <i class="fas fa-save mr-2"></i> Update Team Member
                </button>
                <a href="{{ route('admin.team.index') }}" class="bg-gray-200 text-gray-700 px-8 py-3 rounded-lg hover:bg-gray-300 transition font-medium">
                    Cancel
                </a>
            </div>
        </form>
    </div>
@endsection
