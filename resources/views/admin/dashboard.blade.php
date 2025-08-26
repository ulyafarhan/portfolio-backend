<x-admin-layout>
    <h1 class="text-2xl font-bold text-white mb-6">Dashboard</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <div class="p-6 rounded-lg content-card">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-cyan-500 bg-opacity-20">
                    <svg class="w-6 h-6 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0l7-5 7 5m-14 0v4"></path></svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-400">Total Projects</p>
                    <p class="text-2xl font-semibold text-white">{{ $projectCount }}</p>
                </div>
            </div>
        </div>
        <div class="p-6 rounded-lg content-card">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-pink-500 bg-opacity-20">
                     <svg class="w-6 h-6 text-pink-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-400">Total Blog Posts</p>
                    <p class="text-2xl font-semibold text-white">{{ $postCount }}</p>
                </div>
            </div>
        </div>
        <div class="p-6 rounded-lg content-card">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-yellow-500 bg-opacity-20">
                    <svg class="w-6 h-6 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-400">Unread Messages</p>
                    <p class="text-2xl font-semibold text-white">{{ $unreadMessagesCount }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="content-card rounded-lg p-6">
        <h2 class="text-lg font-semibold text-white mb-4">Recent Contact Messages</h2>
        <div class="divide-y divide-gray-700">
            @forelse($recentMessages as $message)
                <div class="py-4 flex flex-col sm:flex-row justify-between items-start sm:items-center">
                    <div>
                        <p class="text-sm font-medium text-white">{{ $message->name }} <span class="text-xs text-gray-400">({{ $message->email }})</span></p>
                        <p class="text-sm text-gray-500 mt-1">{{ Str::limit($message->message, 80) }}</p>
                    </div>
                    <div class="text-left sm:text-right flex-shrink-0 ml-0 sm:ml-4 mt-2 sm:mt-0">
                         <a href="{{ route('admin.contact-submissions.show', $message) }}" class="text-sm text-cyan-400 hover:underline">View</a>
                         <p class="text-xs text-gray-500 mt-1">{{ $message->created_at->diffForHumans() }}</p>
                    </div>
                </div>
            @empty
                <div class="py-4 text-center text-gray-500">
                    No recent messages.
                </div>
            @endforelse
        </div>
    </div>

</x-admin-layout>