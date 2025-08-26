<x-admin-layout>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-white">Manage Blog Posts</h1>
        <a href="{{ route('admin.posts.create') }}" class="px-4 py-2 text-sm font-medium text-black transition duration-300 transform rounded-md hover:scale-105" style="background-color: #00f0ff;">
            Add New Post
        </a>
    </div>

    @if (session('success'))
        <div class="p-4 mb-4 text-sm text-green-300 bg-green-900 rounded-lg" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg content-card">
        <table class="w-full text-sm text-left text-gray-400">
            <thead class="text-xs uppercase bg-gray-700 text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Title</th>
                    <th scope="col" class="px-6 py-3">Author</th>
                    <th scope="col" class="px-6 py-3">Published At</th>
                    <th scope="col" class="px-6 py-3"><span class="sr-only">Actions</span></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($posts as $post)
                <tr class="border-b bg-gray-800 border-gray-700 hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-white">{{ $post->title }}</th>
                    <td class="px-6 py-4">{{ $post->user->name }}</td>
                    <td class="px-6 py-4">{{ $post->published_at->format('d M Y, H:i') }}</td>
                    <td class="px-6 py-4 text-right">
                        <a href="{{ route('admin.posts.edit', $post) }}" class="font-medium text-blue-500 hover:underline mr-4">Edit</a>
                        <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?');" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="font-medium text-red-500 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-6 py-4 text-center">No posts found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-admin-layout>