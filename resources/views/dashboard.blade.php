<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Overview') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Welcome Banner -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-medium text-gray-900">Welcome back, {{ Auth::user()->name }}!</h3>
                <p class="text-sm text-gray-600 mt-1">
                    You are logged in as an <span
                        class="font-semibold uppercase text-indigo-600">{{ Auth::user()->role }}</span>. Use the
                    navigation links above to manage requests and equipment bookings.
                </p>
            </div>

            <!-- Metrics Grid -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <!-- Total Support Requests -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-indigo-500">
                    <div class="text-sm font-medium text-gray-500">Total Support Requests</div>
                    <div class="text-2xl font-bold text-gray-900 mt-2">{{ $supportCount }}</div>
                </div>

                <!-- Pending Support Requests -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-yellow-500">
                    <div class="text-sm font-medium text-gray-500">Pending Requests</div>
                    <div class="text-2xl font-bold text-gray-900 mt-2">{{ $pendingRequestsCount }}</div>
                </div>

                <!-- Total Bookings -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-blue-500">
                    <div class="text-sm font-medium text-gray-500">Resource Bookings</div>
                    <div class="text-2xl font-bold text-gray-900 mt-2">{{ $bookingCount }}</div>
                </div>

                <!-- Pending Bookings -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-orange-500">
                    <div class="text-sm font-medium text-gray-500">Pending Bookings</div>
                    <div class="text-2xl font-bold text-gray-900 mt-2">{{ $pendingBookingsCount }}</div>
                </div>
            </div>

            <!-- Quick Actions Panel -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 flex justify-between items-center">
                <div>
                    <h4 class="text-md font-medium text-gray-900">Need immediate assistance or facilities?</h4>
                    <p class="text-sm text-gray-500">Submit a new support ticket or reserve a campus asset right away.
                    </p>
                </div>
                <div class="space-x-3">
                    <a href="{{ route('requests.index') }}"
                        class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700">
                        View Requests
                    </a>
                    <a href="{{ route('bookings.index') }}"
                        class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                        View Bookings
                    </a>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
