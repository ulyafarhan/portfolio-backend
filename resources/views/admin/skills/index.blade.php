<x-admin-layout>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-white">Skills</h1>
        <a href="{{ route('admin.skills.create') }}" class="px-4 py-2 text-sm font-medium text-black rounded-md" style="background-color: #00f0ff;">Add Skill</a>
    </div>
    <div class="content-card overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-400">
            <thead class="text-xs uppercase bg-gray-700 text-gray-400">
                <tr>
                    <th class="px-6 py-3">Skill Name</th>
                    <th class="px-6 py-3">Category</th>
                    <th class="px-6 py-3">Mastery</th>
                    <th class="px-6 py-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($skills as $skill)
                <tr class="border-b bg-gray-800 border-gray-700">
                    <th class="px-6 py-4 font-medium text-white">{{ $skill->name }}</th>
                    <td class="px-6 py-4">{{ $skill->category }}</td>
                    <td class="px-6 py-4">
                        <div class="w-full bg-gray-600 rounded-full h-2.5">
                            <div class="bg-cyan-400 h-2.5 rounded-full" style="width: {{ $skill->mastery }}%"></div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{ route('admin.skills.edit', $skill) }}" class="font-medium text-blue-500 hover:underline mr-4">Edit</a>
                        <form action="{{ route('admin.skills.destroy', $skill) }}" method="POST" onsubmit="return confirm('Are you sure?');" class="inline-block">
                            @csrf @method('DELETE')
                            <button type="submit" class="font-medium text-red-500 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="4" class="px-6 py-4 text-center">No skills found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-admin-layout>