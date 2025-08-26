<x-admin-layout>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-white">Work Experience</h1>
        <a href="{{ route('admin.experiences.create') }}" class="px-4 py-2 text-sm font-medium text-black rounded-md" style="background-color: #00f0ff;">Add Experience</a>
    </div>
    <div class="content-card overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-400">
            <thead class="text-xs uppercase bg-gray-700 text-gray-400">
                <tr>
                    <th class="px-6 py-3">Job Title</th>
                    <th class="px-6 py-3">Company</th>
                    <th class="px-6 py-3">Period</th>
                    <th class="px-6 py-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($experiences as $experience)
                <tr class="border-b bg-gray-800 border-gray-700">
                    <th class="px-6 py-4 font-medium text-white">{{ $experience->job_title }}</th>
                    <td class="px-6 py-4">{{ $experience->company_name }}</td>
                    <td class="px-6 py-4">
                        {{ \Carbon\Carbon::parse($experience->start_date)->format('M Y') }} - 
                        {{ $experience->end_date ? \Carbon\Carbon::parse($experience->end_date)->format('M Y') : 'Present' }}
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{ route('admin.experiences.edit', $experience) }}" class="font-medium text-blue-500 hover:underline mr-4">Edit</a>
                        <form action="{{ route('admin.experiences.destroy', $experience) }}" method="POST" onsubmit="return confirm('Are you sure?');" class="inline-block">
                            @csrf @method('DELETE')
                            <button type="submit" class="font-medium text-red-500 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="4" class="px-6 py-4 text-center">No work experiences found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-admin-layout>