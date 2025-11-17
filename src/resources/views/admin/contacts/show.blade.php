@extends('admin.layouts.app')

@section('title', 'View Contact Message')
@section('page-title', 'Contact Message Details')

@section('content')
    <div class="mb-6">
        <a href="{{ route('admin.contacts.index') }}" class="text-primary hover:text-indigo-700 font-medium">
            <i class="fas fa-arrow-left mr-2"></i> Back to all messages
        </a>
    </div>

    <div class="max-w-4xl">
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <!-- Header -->
            <div class="bg-gradient-to-r from-primary to-indigo-700 px-8 py-6 text-white">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-2xl font-bold mb-2">{{ $contact->subject }}</h2>
                        <p class="text-indigo-200">
                            <i class="far fa-clock mr-2"></i>
                            Received {{ $contact->created_at->format('F d, Y \a\t H:i') }}
                        </p>
                    </div>
                    @if(!$contact->is_read)
                        <span class="bg-white/20 backdrop-blur-sm px-4 py-2 rounded-full text-sm font-bold">
                        <i class="fas fa-circle text-yellow-300 mr-2"></i> New
                    </span>
                    @endif
                </div>
            </div>

            <!-- Contact Info -->
            <div class="p-8 border-b">
                <h3 class="text-lg font-bold text-gray-900 mb-4">Contact Information</h3>
                <div class="grid md:grid-cols-3 gap-6">
                    <div class="flex items-start space-x-3">
                        <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-user text-blue-600"></i>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Name</p>
                            <p class="font-semibold text-gray-900">{{ $contact->name }}</p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-3">
                        <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-envelope text-green-600"></i>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Email</p>
                            <a href="mailto:{{ $contact->email }}" class="font-semibold text-primary hover:underline">
                                {{ $contact->email }}
                            </a>
                        </div>
                    </div>

                    @if($contact->phone)
                        <div class="flex items-start space-x-3">
                            <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-phone text-purple-600"></i>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">Phone</p>
                                <a href="tel:{{ $contact->phone }}" class="font-semibold text-gray-900">
                                    {{ $contact->phone }}
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Message -->
            <div class="p-8">
                <h3 class="text-lg font-bold text-gray-900 mb-4">Message</h3>
                <div class="bg-gray-50 rounded-xl p-6 border border-gray-200">
                    <p class="text-gray-700 leading-relaxed whitespace-pre-wrap">{{ $contact->message }}</p>
                </div>
            </div>

            <!-- Actions -->
            <div class="px-8 py-6 bg-gray-50 border-t flex items-center justify-between">
                <div class="flex space-x-3">
                    <a href="mailto:{{ $contact->email }}?subject=Re: {{ $contact->subject }}"
                       class="bg-primary text-white px-6 py-3 rounded-lg hover:bg-indigo-700 transition font-medium">
                        <i class="fas fa-reply mr-2"></i> Reply via Email
                    </a>

                    @if(!$contact->is_read)
                        <form action="{{ route('admin.contacts.mark-read', $contact) }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition font-medium">
                                <i class="fas fa-check mr-2"></i> Mark as Read
                            </button>
                        </form>
                    @endif
                </div>

                <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this message?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 text-white px-6 py-3 rounded-lg hover:bg-red-700 transition font-medium">
                        <i class="fas fa-trash mr-2"></i> Delete
                    </button>
                </form>
            </div>
        </div>

        <!-- Activity Timeline (Optional Enhancement) -->
        <div class="bg-white rounded-xl shadow-lg p-8 mt-6">
            <h3 class="text-lg font-bold text-gray-900 mb-6">Activity Timeline</h3>
            <div class="space-y-6">
                <div class="flex items-start space-x-4">
                    <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-paper-plane text-blue-600"></i>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900">Message Received</p>
                        <p class="text-sm text-gray-600">{{ $contact->created_at->format('F d, Y \a\t H:i') }}</p>
                    </div>
                </div>

                @if($contact->is_read)
                    <div class="flex items-start space-x-4">
                        <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-check text-green-600"></i>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-900">Marked as Read</p>
                            <p class="text-sm text-gray-600">{{ $contact->updated_at->format('F d, Y \a\t H:i') }}</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
