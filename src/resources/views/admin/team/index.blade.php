@extends('admin.layouts.app')

@section('title', 'Team Members')
@section('page-title', 'Manage Team Members')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <p class="text-gray-600">Manage your team members</p>
        <a href="{{ route('admin.team.create') }}" class="bg-primary text-white px-6 py-3 rounded-lg hover:bg-indigo-700 transition font-medium">
            <i class="fas fa-plus mr-2"></i> Add Team Member
        </a>
    </div>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($members as $member)
            <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition">
                <div class="">
                    <img src="{{ asset('assets/img/logo/inno-logo_blue.png') }}" alt="Innovation Place BD" class="bg-gradient-to-r from-primary  h-32">
                </div>
                <div class="px-6 pb-6 -mt-16">
                    <div class="w-32 h-32 bg-white rounded-full mx-auto flex items-center justify-center text-5xl border-4 border-white shadow-lg overflow-hidden">
                        @if($member->image)
                            <img src="{{ asset('storage/' . $member->image) }}" alt="{{ $member->name }}" class="object-cover w-full h-full">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-primary to-purple-600 flex items-center justify-center text-white font-bold">
                                {{ substr($member->name, 0, 1) }}
                            </div>
                        @endif
                    </div>
                    <div class="text-center mt-4">
                        <h3 class="text-xl font-bold text-gray-900">{{ $member->name }}</h3>
                        <p class="text-primary font-medium">{{ $member->role }}</p>
                        @if($member->bio)
                            <p class="text-gray-600 text-sm mt-2">{{ Str::limit($member->bio, 80) }}</p>
                        @endif

                        <div class="mt-4 space-y-2">
                            @if($member->email)
                                <p class="text-sm text-gray-600">
                                    <i class="fas fa-envelope mr-2"></i>{{ $member->email }}
                                </p>
                            @endif
                            @if($member->linkedin)
                                <p class="text-sm text-gray-600">
                                    <i class="fab fa-linkedin mr-2"></i>
                                    <a href="{{ $member->linkedin }}" target="_blank" class="text-primary hover:underline">
                                        LinkedIn Profile
                                    </a>
                                </p>
                            @endif
                            <p class="text-sm text-gray-500">Order: {{ $member->order }}</p>
                        </div>

                        <div class="flex space-x-2 mt-6 justify-center">
                            <a href="{{ route('admin.team.edit', $member->id) }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                                <i class="fas fa-edit mr-1"></i> Edit
                            </a>
                            <form action="{{ route('admin.team.destroy', $member) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition">
                                    <i class="fas fa-trash mr-1"></i> Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-3 text-center py-12">
                <div class="w-32 h-32 mx-auto mb-6 bg-gray-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-users text-5xl text-gray-300"></i>
                </div>
                <p class="text-xl text-gray-600 mb-4">No team members yet</p>
                <a href="{{ route('admin.team.create') }}" class="text-primary hover:underline font-medium">
                    Add your first team member
                </a>
            </div>
        @endforelse
    </div>
@endsection
