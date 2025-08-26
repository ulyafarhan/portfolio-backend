<x-admin-layout>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-white">Manage Projects</h1>
        <a href="{{ route('admin.projects.create') }}" class="px-4 py-2 text-sm font-medium text-black transition duration-300 transform rounded-md hover:scale-105" style="background-color: #00f0ff;">
            Add New Project
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
                    <th scope="col" class="px-6 py-3">Image</th>
                    <th scope="col" class="px-6 py-3">Technologies</th>
                    <th scope="col" class="px-6 py-3">Last Updated</th>
                    <th scope="col" class="px-6 py-3"><span class="sr-only">Actions</span></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($projects as $project)
                <tr class="border-b bg-gray-800 border-gray-700 hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-white">
                        {{ $project->title }}
                    </th>
                    <td class="px-6 py-4">
                        <img src="{{ asset('storage/' . $project->image_url) }}" alt="{{ $project->title }}" class="w-20 h-12 object-cover rounded">
                    </td>
                    <td class="px-6 py-4">
                        @foreach ($project->technologies as $tech)
                            <span class="px-2 py-1 text-xs font-medium rounded-full bg-gray-700 text-cyan-400">{{ $tech }}</span>
                        @endforeach
                    </td>
                    <td class="px-6 py-4">{{ $project->updated_at->format('d M Y') }}</td>
                    <td class="px-6 py-4 text-right">
                        <a href="{{ route('admin.projects.edit', $project) }}" class="font-medium text-blue-500 hover:underline mr-4">Edit</a>
                        <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this project?');" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="font-medium text-red-500 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-4 text-center">No projects found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $projects->links() }}
    </div>
</x-admin-layout>