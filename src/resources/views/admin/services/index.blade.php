@extends('admin.layouts.app')

@section('title', 'Services')
@section('page-title', 'Manage Services')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <p class="text-gray-600">Manage your company services</p>
        <a href="{{ route('admin.services.create') }}" class="bg-primary text-white px-6 py-3 rounded-lg hover:bg-indigo-700 transition font-medium">
            <i class="fas fa-plus mr-2"></i> Add New Service
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-50 border-b">
            <tr>
                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-900">Title</th>
                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-900">Icon</th>
                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-900">Order</th>
                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-900">Status</th>
                <th class="px-6 py-4 text-right text-sm font-semibold text-gray-900">Actions</th>
            </tr>
            </thead>
            <tbody class="divide-y">
            @forelse($services as $service)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4">
                        <div class="font-semibold text-gray-900">{{ $service->title }}</div>
                        <div class="text-sm text-gray-600">{{ Str::limit($service->description, 60) }}</div>
                    </td>
                    <td class="px-6 py-4">
                        <i class="fas fa-{{ $service->icon }} text-2xl text-primary"></i>
                    </td>
                    <td class="px-6 py-4 text-gray-600">{{ $service->order }}</td>
                    <td class="px-6 py-4">
                        @if($service->is_active)
                            <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-sm">Active</span>
                        @else
                            <span class="bg-gray-100 text-gray-600 px-3 py-1 rounded-full text-sm">Inactive</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-right space-x-2">
                        <a href="{{ route('admin.services.edit', $service) }}" class="text-blue-600 hover:text-blue-800">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.services.destroy', $service) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="px-6 py-12 text-center text-gray-500">
                        No services found. <a href="{{ route('admin.services.create') }}" class="text-primary hover:underline">Add your first service</a>
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
