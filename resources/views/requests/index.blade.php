<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Campus Support Requests') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Action bar with New Request button guaranteed to show -->
            <div class="flex justify-between items-center mb-6">
                <span class="text-sm text-gray-600">Overview of submitted campus support tickets</span>
                <a href="{{ route('requests.create') }}"
                    class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 shadow-md">
                    + New Request
                </a>
            </div>

            @if (session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                    role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th
                                    class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    ID</th>
                                <th
                                    class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Title</th>
                                <th
                                    class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Category</th>
                                @if (Auth::user()->role === 'admin')
                                    <th
                                        class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Requester</th>
                                @endif
                                <th
                                    class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status</th>
                                <th
                                    class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Date</th>
                            </tr>
                        </thead>


                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($requests as $req)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $req->id }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        <a href="{{ route('requests.show', $req->id) }}"
                                            class="text-indigo-600 hover:text-indigo-900">
                                            {{ $req->title }}
                                        </a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $req->category->name ?? 'N/A' }}</td>
                                    @if (Auth::user()->role === 'admin')
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $req->user->name ?? 'N/A' }}</td>
                                    @endif
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        @if (Auth::user()->role === 'admin')
                                            <!-- Admin Status Update Form -->
                                            <form action="{{ route('requests.updateStatus', $req->id) }}" method="POST"
                                                class="inline-flex items-center space-x-2">
                                                @csrf
                                                @method('PATCH')
                                                <select name="status" onchange="this.form.submit()"
                                                    class="text-xs rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 
                            {{ $req->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : ($req->status === 'in-progress' ? 'bg-blue-100 text-blue-800' : 'bg-green-100 text-green-800') }}">
                                                    <option value="pending"
                                                        {{ $req->status === 'pending' ? 'selected' : '' }}>Pending
                                                    </option>
                                                    <option value="in-progress"
                                                        {{ $req->status === 'in-progress' ? 'selected' : '' }}>
                                                        In-Progress</option>
                                                    <option value="resolved"
                                                        {{ $req->status === 'resolved' ? 'selected' : '' }}>Resolved
                                                    </option>
                                                    <option value="closed"
                                                        {{ $req->status === 'closed' ? 'selected' : '' }}>Closed
                                                    </option>
                                                </select>
                                            </form>
                                        @else
                                            <!-- Regular User Badge View -->
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                        {{ $req->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : ($req->status === 'in-progress' ? 'bg-blue-100 text-blue-800' : 'bg-green-100 text-green-800') }}">
                                                {{ ucfirst($req->status) }}
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $req->created_at->format('Y-m-d H:i') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-4 text-center text-sm text-gray-500">No support
                                        requests found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
