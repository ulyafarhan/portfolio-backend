<x-admin-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between items-center">
                        <h1 class="text-2xl font-semibold">Projects</h1>
                        <a href="{{ route('admin.projects.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded-md">Add Project</a>
                    </div>

                    @if (session('success'))
                        <div class="mt-4 p-4 bg-green-100 text-green-700 rounded-md">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="mt-6">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($projects as $project)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $project->title }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $project->category }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="{{ route('admin.projects.edit', $project) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                            <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900 ml-4">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>