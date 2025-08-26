<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Admin Dashboard' }}</title>
    
    {{-- Tailwind CSS & Fonts --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@700&family=Inter:wght@400;500;600&family=Fira+Code:wght@500&display=swap" rel="stylesheet">
    
    {{-- Trix Editor --}}
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>

    {{-- Alpine.js for interactivity --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        body { background-color: #050510; color: #f0f0f8; font-family: 'Inter', sans-serif; }
        .font-orbitron { font-family: 'Orbitron', sans-serif; }
        .font-fira { font-family: 'Fira Code', monospace; }
        .sidebar { background-color: #0d0d1f; }
        .nav-link:hover, .nav-link.active { background-color: rgba(0, 240, 255, 0.1); color: #00f0ff; }
        .nav-link.active { border-right: 3px solid #00f0ff; }
        .content-card { background-color: #0d0d1f; border-color: #374151; }
        .trix-content { background-color: #050510; color: #f0f0f8; border: 1px solid #374151; border-radius: 0.375rem; min-height: 200px; }
        .trix-toolbar { background-color: #0d0d1f; border-color: #374151; border-width: 1px; border-bottom: none; border-top-left-radius: 0.375rem; border-top-right-radius: 0.375rem; }
        .trix-toolbar .trix-button-group { background-color: #0d0d1f; border-color: #374151; border-width: 1px; }
        .trix-toolbar .trix-button { background-color: #1f2937; }
        .trix-toolbar .trix-button:not(:disabled):hover { background-color: #374151; }
        .trix-toolbar .trix-button.trix-active { background-color: #00f0ff; color: black; }
    </style>
</head>
<body class="antialiased" x-data="{ sidebarOpen: false }">
    <div class="flex h-screen">
        <aside 
            class="w-64 sidebar flex-shrink-0 fixed inset-y-0 left-0 transform transition-transform duration-300 z-30 md:relative md:translate-x-0"
            :class="{'translate-x-0': sidebarOpen, '-translate-x-full': !sidebarOpen}"
        >
            <div class="p-6 text-center">
                <a href="{{ route('admin.dashboard') }}" class="text-2xl text-white font-orbitron tracking-widest">PORTFOLIO</a>
            </div>
            <nav class="mt-8">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center px-6 py-3 text-gray-300 transition-colors duration-200 nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    <span class="mx-4 font-medium">Dashboard</span>
                </a>
                <a href="{{ route('admin.projects.index') }}" class="flex items-center px-6 py-3 text-gray-300 transition-colors duration-200 nav-link {{ request()->routeIs('admin.projects.*') ? 'active' : '' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0l7-5 7 5m-14 0v4"></path></svg>
                    <span class="mx-4 font-medium">Projects</span>
                </a>
                <a href="{{ route('admin.posts.index') }}" class="flex items-center px-6 py-3 text-gray-300 transition-colors duration-200 nav-link {{ request()->routeIs('admin.posts.*') ? 'active' : '' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                    <span class="mx-4 font-medium">Blog Posts</span>
                </a>
                <a href="{{ route('admin.certificates.index') }}" class="flex items-center px-6 py-3 text-gray-300 transition-colors duration-200 nav-link {{ request()->routeIs('admin.certificates.*') ? 'active' : '' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    <span class="mx-4 font-medium">Certificates</span>
                </a>
                <a href="{{ route('admin.contact-submissions.index') }}" class="flex items-center px-6 py-3 text-gray-300 transition-colors duration-200 nav-link {{ request()->routeIs('admin.contact-submissions.*') ? 'active' : '' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path></svg>
                    <span class="mx-4 font-medium">Contact Messages</span>
                </a>
                <div x-data="{ open: false }" class="relative">
                    <a @click="open = !open" href="#" class="flex items-center justify-between w-full px-6 py-3 text-gray-300 transition-colors duration-200 cursor-pointer nav-link">
                        <span class="flex items-center">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                            <span class="mx-4 font-medium">CV Data</span>
                        </span>
                        <svg class="w-4 h-4 transform" :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </a>
                    <div x-show="open" @click.away="open = false" class="pl-12 mt-2 space-y-2" x-cloak>
                        <a href="{{ route('admin.profile.edit') }}" class="block text-sm text-gray-400 hover:text-cyan-400">Personal Profile</a>
                        <a href="{{ route('admin.experiences.index') }}" class="block text-sm text-gray-400 hover:text-cyan-400">Work Experience</a>
                        <a href="{{ route('admin.educations.index') }}" class="block text-sm text-gray-400 hover:text-cyan-400">Education</a>
                        <a href="{{ route('admin.skills.index') }}" class="block text-sm text-gray-400 hover:text-cyan-400">Skills</a>
                    </div>
                </div>
            </nav>
        </aside>

        <div x-show="sidebarOpen" @click="sidebarOpen = false" class="fixed inset-0 bg-black opacity-50 z-20 md:hidden"></div>

        <div class="flex flex-col flex-1 overflow-y-auto">
            <header class="flex items-center justify-between h-16 px-6 sidebar">
                <button @click.stop="sidebarOpen = !sidebarOpen" class="text-gray-400 md:hidden">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </button>
                 
                 <div class="flex items-center ml-auto">
                    <span class="mr-3 font-medium text-white">{{ Auth::user()->name }}</span>
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <button type="submit" class="p-2 text-gray-400 rounded-full hover:bg-gray-700 hover:text-white focus:outline-none focus:ring">
                             <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                        </button>
                    </form>
                </div>
            </header>

            <main class="flex-1 p-4 sm:p-6">
                {{ $slot }}
            </main>
        </div>
    </div>
</body>
</html>