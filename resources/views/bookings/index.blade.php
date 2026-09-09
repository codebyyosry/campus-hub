<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Campus Resource Booking Hub') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            @if (session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                    role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <!-- Book Resource Form Card -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Book a Resource</h3>
                <form action="{{ route('bookings.store') }}" method="POST"
                    class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">
                    @csrf
                    <div>
                        <label for="resource_item_id" class="block text-sm font-medium text-gray-700 mb-1">Select
                            Resource</label>
                        <select name="resource_item_id" id="resource_item_id"
                            class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm"
                            required>
                            <option value="">-- Choose Resource --</option>
                            @foreach ($resources as $res)
                                <option value="{{ $res->id }}">{{ $res->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="start_time" class="block text-sm font-medium text-gray-700 mb-1">Start Time</label>
                        <input type="datetime-local" name="start_time" id="start_time"
                            class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm"
                            required>
                    </div>

                    <div>
                        <label for="end_time" class="block text-sm font-medium text-gray-700 mb-1">End Time</label>
                        <input type="datetime-local" name="end_time" id="end_time"
                            class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm"
                            required>
                    </div>

                    <div>
                        <button type="submit"
                            class="w-full bg-indigo-600 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-indigo-700 shadow">
                            Request Booking
                        </button>
                    </div>
                </form>
            </div>

            <!-- Bookings List Table -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Booking Requests</h3>
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th
                                    class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Resource</th>
                                @if (Auth::user()->role === 'admin')
                                    <th
                                        class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        User</th>
                                @endif
                                <th
                                    class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Start Time</th>
                                <th
                                    class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    End Time</th>
                                <th
                                    class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($bookings as $booking)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ $booking->resourceItem->name ?? 'N/A' }}</td>
                                    @if (Auth::user()->role === 'admin')
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $booking->user->name ?? 'N/A' }}</td>
                                    @endif
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $booking->start_time }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $booking->end_time }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        @if (Auth::user()->role === 'admin')
                                            <form action="{{ route('bookings.updateStatus', $booking->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <select name="status" onchange="this.form.submit()"
                                                    class="text-xs rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 
                                                    {{ $booking->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : ($booking->status === 'approved' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800') }}">
                                                    <option value="pending"
                                                        {{ $booking->status === 'pending' ? 'selected' : '' }}>Pending
                                                    </option>
                                                    <option value="approved"
                                                        {{ $booking->status === 'approved' ? 'selected' : '' }}>
                                                        Approved</option>
                                                    <option value="rejected"
                                                        {{ $booking->status === 'rejected' ? 'selected' : '' }}>
                                                        Rejected</option>
                                                </select>
                                            </form>
                                        @else
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                                {{ $booking->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : ($booking->status === 'approved' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800') }}">
                                                {{ ucfirst($booking->status) }}
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">No resource
                                        bookings found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
