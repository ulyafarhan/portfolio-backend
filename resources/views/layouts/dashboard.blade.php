<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Admin Dashboard' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@700&family=Inter:wght@400;500;600&family=Fira+Code:wght@500&display=swap" rel="stylesheet">
    <style>
        body { background-color: #050510; color: #f0f0f8; font-family: 'Inter', sans-serif; }
        .font-orbitron { font-family: 'Orbitron', sans-serif; }
        .font-fira { font-family: 'Fira Code', monospace; }
        .sidebar { background-color: #0d0d1f; }
        .nav-link:hover, .nav-link.active { background-color: rgba(0, 240, 255, 0.1); color: #00f0ff; }
        .nav-link.active { border-right: 3px solid #00f0ff; }
        .content-card { background-color: #0d0d1f; }
    </style>
</head>
<body class="antialiased">
    <div class="flex h-screen">
        <aside class="w-64 sidebar flex-shrink-0">
            <div class="p-6 text-center">
                <a href="{{ route('admin.dashboard') }}" class="text-2xl text-white font-orbitron tracking-widest">
                    PORTFOLIO
                </a>
            </div>
            <nav class="mt-8">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center px-6 py-3 text-gray-300 transition-colors duration-200 nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    <span class="mx-4 font-medium">Dashboard</span>
                </a>
                <a href="#" class="flex items-center px-6 py-3 text-gray-300 transition-colors duration-200 nav-link">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0l7-5 7 5m-14 0v4"></path></svg>
                    <span class="mx-4 font-medium">Projects</span>
                </a>
                <a href="#" class="flex items-center px-6 py-3 text-gray-300 transition-colors duration-200 nav-link">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                    <span class="mx-4 font-medium">Blog Posts</span>
                </a>
                <a href="#" class="flex items-center px-6 py-3 text-gray-300 transition-colors duration-200 nav-link">
                     <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path></svg>
                    <span class="mx-4 font-medium">Contact Messages</span>
                </a>
                 <a href="#" class="flex items-center px-6 py-3 text-gray-300 transition-colors duration-200 nav-link">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                    <span class="mx-4 font-medium">CV Data</span>
                </a>
            </nav>
        </aside>

        <div class="flex flex-col flex-1 overflow-y-auto">
            <header class="flex items-center justify-end h-16 px-6 sidebar">
                 <div class="flex items-center">
                    <span class="mr-3 font-medium text-white">{{ Auth::user()->name }}</span>
                     <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <button type="submit" class="p-2 text-gray-400 rounded-full hover:bg-gray-700 hover:text-white focus:outline-none focus:ring">
                             <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                        </button>
                    </form>
                </div>
            </header>

            <main class="flex-1 p-6">
                {{ $slot }}
            </main>
        </div>
    </div>
</body>
</html>