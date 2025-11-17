@extends('admin.layouts.app')

@section('title', 'Contact Messages')
@section('page-title', 'Contact Messages')

@section('content')
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-50 border-b">
            <tr>
                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-900">Name</th>
                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-900">Email</th>
                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-900">Subject</th>
                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-900">Date</th>
                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-900">Status</th>
                <th class="px-6 py-4 text-right text-sm font-semibold text-gray-900">Actions</th>
            </tr>
            </thead>
            <tbody class="divide-y">
            @forelse($contacts as $contact)
                <tr class="hover:bg-gray-50 {{ !$contact->is_read ? 'bg-blue-50' : '' }}">
                    <td class="px-6 py-4">
                        <div class="font-semibold text-gray-900">{{ $contact->name }}</div>
                        @if($contact->phone)
                            <div class="text-sm text-gray-600">{{ $contact->phone }}</div>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-gray-600">{{ $contact->email }}</td>
                    <td class="px-6 py-4">
                        <div class="font-medium text-gray-900">{{ $contact->subject }}</div>
                        <div class="text-sm text-gray-600">{{ Str::limit($contact->message, 50) }}</div>
                    </td>
                    <td class="px-6 py-4 text-gray-600 text-sm">{{ $contact->created_at->format('M d, Y H:i') }}</td>
                    <td class="px-6 py-4">
                        @if($contact->is_read)
                            <span class="bg-gray-100 text-gray-600 px-3 py-1 rounded-full text-sm">Read</span>
                        @else
                            <span class="bg-blue-100 text-blue-600 px-3 py-1 rounded-full text-sm font-medium">Unread</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-right space-x-2">
                        <a href="{{ route('admin.contacts.show', $contact) }}" class="text-blue-600 hover:text-blue-800">
                            <i class="fas fa-eye"></i>
                        </a>
                        <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?')">
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
                    <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                        No contact messages yet
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $contacts->links() }}
    </div>
@endsection
