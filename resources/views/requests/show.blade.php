<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Request Details: ') }} #{{ $supportRequest->id }}
            </h2>
            <a href="{{ route('requests.index') }}" class="text-sm text-gray-600 hover:text-gray-900">&larr; Back to
                Requests</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Request Info Card -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="flex justify-between items-start">
                    <div>
                        <span
                            class="text-xs font-semibold px-2.5 py-0.5 rounded bg-gray-100 text-gray-800">{{ $supportRequest->category->name }}</span>
                        <h3 class="text-lg font-bold text-gray-900 mt-2">{{ $supportRequest->title }}</h3>
                    </div>
                    <span
                        class="px-3 py-1 text-xs font-semibold rounded-full 
                        {{ $supportRequest->status === 'pending' ? 'bg-yellow-100 text-yellow-850' : 'bg-green-100 text-green-800' }}">
                        {{ ucfirst($supportRequest->status) }}
                    </span>
                </div>
                <p class="text-gray-700 mt-4 whitespace-pre-line">{{ $supportRequest->description }}</p>
                <div class="text-xs text-gray-400 mt-4">
                    Submitted by {{ $supportRequest->user->name }} on
                    {{ $supportRequest->created_at->format('M d, Y H:i') }}
                </div>
            </div>

            <!-- Comments Section -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h4 class="text-md font-semibold text-gray-900 mb-4">Discussion & Updates</h4>

                <div class="space-y-4 mb-6">
                    @forelse($supportRequest->comments as $comment)
                        <div class="p-4 rounded-lg bg-gray-50 border border-gray-100">
                            <div class="flex justify-between items-center mb-1">
                                <span class="text-xs font-bold text-gray-700">{{ $comment->user->name }}</span>
                                <span class="text-xs text-gray-400">{{ $comment->created_at->diffForHumans() }}</span>
                            </div>
                            <p class="text-sm text-gray-800">{{ $comment->body }}</p>
                        </div>
                    @empty
                        <p class="text-sm text-gray-500 italic">No comments yet. Start the conversation below.</p>
                    @endforelse
                </div>

                <!-- Add Comment Form -->
                <form action="{{ route('comments.store', $supportRequest->id) }}" method="POST">
                    @csrf
                    <div>
                        <label for="body" class="block text-sm font-medium text-gray-700 mb-1">Add a Reply</label>
                        <textarea name="body" id="body" rows="3"
                            class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required></textarea>
                        @error('body')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex justify-end mt-3">
                        <button type="submit"
                            class="bg-indigo-600 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-indigo-700">
                            Post Reply
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
