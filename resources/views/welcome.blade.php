<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Campus Hub — Campus Request & Resource Booking Platform</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-950 text-slate-100 font-sans antialiased selection:bg-indigo-500 selection:text-white">

    <!-- Top Navigation Bar -->
    <header class="border-b border-slate-800 bg-slate-900/60 backdrop-blur sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <div
                    class="h-10 w-10 rounded-xl bg-indigo-600 flex items-center justify-center font-bold text-xl shadow-lg shadow-indigo-500/30">
                    CH
                </div>
                <span class="text-lg font-bold tracking-tight text-white">Campus Hub</span>
            </div>

            @if (Route::has('login'))
                <nav class="flex items-center space-x-4">
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-lg hover:bg-indigo-500 transition shadow-sm">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                            class="text-sm font-medium text-slate-300 hover:text-white transition">
                            Log in
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-lg hover:bg-indigo-500 transition shadow-sm">
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </div>
    </header>

    <!-- Hero Section -->
    <section class="relative overflow-hidden py-20 lg:py-28 border-b border-slate-800/80">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,rgba(99,102,241,0.15),transparent_50%)]">
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="max-w-3xl">
                <div
                    class="inline-flex items-center space-x-2 px-3 py-1 rounded-full bg-indigo-500/10 border border-indigo-500/20 text-indigo-400 text-xs font-semibold uppercase tracking-wider mb-6">
                    <span>Laravel Breeze Ecosystem</span>
                    <span class="w-1 h-1 rounded-full bg-indigo-400"></span>
                    <span>Enterprise Architecture</span>
                </div>
                <h1 class="text-4xl sm:text-6xl font-extrabold tracking-tight text-white leading-tight mb-6">
                    Campus Request & Resource Booking Hub
                </h1>
                <p class="text-lg sm:text-xl text-slate-300 mb-8 leading-relaxed">
                    A centralized platform engineered to streamline campus operational workflows, process support
                    requests with interactive threaded comments, and manage resource bookings seamlessly.
                </p>
                <div class="flex flex-wrap gap-4">
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="px-6 py-3 bg-indigo-600 hover:bg-indigo-500 text-white font-semibold rounded-xl shadow-lg shadow-indigo-600/30 transition">
                            Launch Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                            class="px-6 py-3 bg-indigo-600 hover:bg-indigo-500 text-white font-semibold rounded-xl shadow-lg shadow-indigo-600/30 transition">
                            Get Started (Login)
                        </a>
                        <a href="{{ route('register') }}"
                            class="px-6 py-3 bg-slate-800 hover:bg-slate-700 text-white font-semibold rounded-xl border border-slate-700 transition">
                            Create Account
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </section>

    <!-- Readme Style Content Section -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 space-y-16">

        <!-- Project Overview -->
        <section class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6 shadow-xl">
                <div
                    class="h-12 w-12 rounded-lg bg-blue-500/10 text-blue-400 flex items-center justify-center font-bold text-xl mb-4">
                    🎫</div>
                <h3 class="text-xl font-bold text-white mb-2">Support Requests</h3>
                <p class="text-slate-400 text-sm leading-relaxed">
                    Submit, track, and administer campus maintenance or administrative help tickets with state tracking
                    and threaded updates.
                </p>
            </div>
            <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6 shadow-xl">
                <div
                    class="h-12 w-12 rounded-lg bg-indigo-500/10 text-indigo-400 flex items-center justify-center font-bold text-xl mb-4">
                    💬</div>
                <h3 class="text-xl font-bold text-white mb-2">Threaded Comments</h3>
                <p class="text-slate-400 text-sm leading-relaxed">
                    Engage in targeted discussions, exchange clarifications, and log progress notes directly inside
                    individual ticket views.
                </p>
            </div>
            <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6 shadow-xl">
                <div
                    class="h-12 w-12 rounded-lg bg-emerald-500/10 text-emerald-400 flex items-center justify-center font-bold text-xl mb-4">
                    🏛️</div>
                <h3 class="text-xl font-bold text-white mb-2">Resource Bookings</h3>
                <p class="text-slate-400 text-sm leading-relaxed">
                    Reserve labs, equipment, conference rooms, and campus amenities with structured scheduling and
                    approval pipelines.
                </p>
            </div>
        </section>

        <!-- Architecture & Tech Stack -->
        <section class="bg-slate-900/80 border border-slate-800 rounded-2xl p-8 sm:p-10">
            <h2 class="text-2xl font-bold text-white mb-6 flex items-center">
                <span class="mr-3 text-indigo-500">#</span> Technical Specification & Architecture
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="space-y-2">
                    <span class="text-xs font-semibold text-indigo-400 uppercase tracking-wider">Framework</span>
                    <h4 class="text-base font-semibold text-white">Laravel 11</h4>
                    <p class="text-xs text-slate-400">Robust routing, eloquent ORM, and middleware protection.</p>
                </div>
                <div class="space-y-2">
                    <span class="text-xs font-semibold text-indigo-400 uppercase tracking-wider">Authentication</span>
                    <h4 class="text-base font-semibold text-white">Laravel Breeze</h4>
                    <p class="text-xs text-slate-400">Secure login, registration, password resets, and email
                        verification.</p>
                </div>
                <div class="space-y-2">
                    <span class="text-xs font-semibold text-indigo-400 uppercase tracking-wider">Frontend Engine</span>
                    <h4 class="text-base font-semibold text-white">Blade & Tailwind CSS</h4>
                    <p class="text-xs text-slate-400">Responsive layouts styled cleanly with utility-first classes.</p>
                </div>
                <div class="space-y-2">
                    <span class="text-xs font-semibold text-indigo-400 uppercase tracking-wider">Database &
                        Testing</span>
                    <h4 class="text-base font-semibold text-white">Migrations & PHPUnit</h4>
                    <p class="text-xs text-slate-400">Relational schema design with comprehensive feature testing
                        suites.</p>
                </div>
            </div>
        </section>

        <!-- Navigation Map & Steps -->
        <section class="space-y-6">
            <h2 class="text-2xl font-bold text-white flex items-center">
                <span class="mr-3 text-indigo-500">#</span> Platform Routes & Navigation Map
            </h2>
            <div class="border border-slate-800 rounded-2xl overflow-hidden bg-slate-900">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr
                            class="border-b border-slate-800 bg-slate-950/50 text-slate-400 text-xs uppercase tracking-wider">
                            <th class="p-4 font-semibold">Endpoint / Path</th>
                            <th class="p-4 font-semibold">Controller / Action</th>
                            <th class="p-4 font-semibold">Middleware Protection</th>
                            <th class="p-4 font-semibold">Description</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-800 text-sm text-slate-300">
                        <tr>
                            <td class="p-4 font-mono text-indigo-400">/</td>
                            <td class="p-4">Welcome View (Readme)</td>
                            <td class="p-4"><span
                                    class="px-2 py-0.5 rounded text-xs bg-emerald-500/10 text-emerald-400">Public</span>
                            </td>
                            <td class="p-4 text-slate-400">Project introduction, routes reference, and quick
                                authentication triggers.</td>
                        </tr>
                        <tr>
                            <td class="p-4 font-mono text-indigo-400">/dashboard</td>
                            <td class="p-4">DashboardController@index</td>
                            <td class="p-4"><span
                                    class="px-2 py-0.5 rounded text-xs bg-indigo-500/10 text-indigo-400">auth,
                                    verified</span></td>
                            <td class="p-4 text-slate-400">Real-time metrics, active bookings summary, and request
                                tracking overview.</td>
                        </tr>
                        <tr>
                            <td class="p-4 font-mono text-indigo-400">/requests</td>
                            <td class="p-4">SupportRequestController@index</td>
                            <td class="p-4"><span
                                    class="px-2 py-0.5 rounded text-xs bg-indigo-500/10 text-indigo-400">auth</span>
                            </td>
                            <td class="p-4 text-slate-400">Browse and filter campus support tickets and maintenance
                                requests.</td>
                        </tr>
                        <tr>
                            <td class="p-4 font-mono text-indigo-400">/requests/create</td>
                            <td class="p-4">SupportRequestController@create</td>
                            <td class="p-4"><span
                                    class="px-2 py-0.5 rounded text-xs bg-indigo-500/10 text-indigo-400">auth</span>
                            </td>
                            <td class="p-4 text-slate-400">Form interface to raise a new support issue or request help.
                            </td>
                        </tr>
                        <tr>
                            <td class="p-4 font-mono text-indigo-400">/requests/{id}</td>
                            <td class="p-4">SupportRequestController@show
                            </td>
                            <td class="p-4"><span
                                    class="px-2 py-0.5 rounded text-xs bg-indigo-500/10 text-indigo-400">auth</span>
                            </td>
                            <td class="p-4 text-slate-400">View detailed request description, status updates, and
                                threaded comments.</td>
                        </tr>
                        <tr>
                            <td class="p-4 font-mono text-indigo-400">/bookings</td>
                            <td class="p-4">ResourceBookingController@index</td>
                            <td class="p-4"><span
                                    class="px-2 py-0.5 rounded text-xs bg-indigo-500/10 text-indigo-400">auth</span>
                            </td>
                            <td class="p-4 text-slate-400">Overview of campus resource allocations, rooms, and
                                equipment schedules.</td>
                        </tr>
                        <tr>
                            <td class="p-4 font-mono text-indigo-400">/profile</td>
                            <td class="p-4">ProfileController@edit</td>
                            <td class="p-4"><span
                                    class="px-2 py-0.5 rounded text-xs bg-indigo-500/10 text-indigo-400">auth</span>
                            </td>
                            <td class="p-4 text-slate-400">Manage user credentials, security passwords, and account
                                termination.</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

        <!-- Quick Access / Breeze Action Box -->
        <section
            class="bg-gradient-to-r from-indigo-900/40 via-slate-900 to-slate-900 border border-indigo-500/30 rounded-2xl p-8 sm:p-12 text-center space-y-6">
            <h2 class="text-3xl font-extrabold text-white">Ready to explore the Hub?</h2>
            <p class="text-slate-300 max-w-xl mx-auto text-sm sm:text-base">
                Log in with your user credentials or register a fresh account to start filing requests, posting
                comments, and booking campus resources.
            </p>
            <div class="flex flex-wrap justify-center gap-4 pt-2">
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="px-8 py-3 bg-indigo-600 hover:bg-indigo-500 text-white font-semibold rounded-xl shadow-lg transition">
                        Go to Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                        class="px-8 py-3 bg-indigo-600 hover:bg-indigo-500 text-white font-semibold rounded-xl shadow-lg transition">
                        Log In
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="px-8 py-3 bg-slate-800 hover:bg-slate-700 text-white font-semibold rounded-xl border border-slate-700 transition">
                            Register Now
                        </a>
                    @endif
                @endauth
            </div>
        </section>

    </main>

    <!-- Footer -->
    <footer class="border-t border-slate-800 bg-slate-950 py-8 text-center text-xs text-slate-500">
        <p>Campus Hub &bull; Powered by Laravel Breeze &amp; Tailwind CSS</p>
    </footer>
</body>

</html>
