<x-admin-layout>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-white">Manage Certificates</h1>
        <a href="{{ route('admin.certificates.create') }}" class="px-4 py-2 text-sm font-medium text-black rounded-md" style="background-color: #00f0ff;">Add Certificate</a>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg content-card">
        <table class="w-full text-sm text-left text-gray-400">
            <thead class="text-xs uppercase bg-gray-700 text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Title</th>
                    <th scope="col" class="px-6 py-3">Organization</th>
                    <th scope="col" class="px-6 py-3">Issue Date</th>
                    <th scope="col" class="px-6 py-3"><span class="sr-only">Actions</span></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($certificates as $certificate)
                <tr class="border-b bg-gray-800 border-gray-700 hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-white">{{ $certificate->title }}</th>
                    <td class="px-6 py-4">{{ $certificate->issuing_organization }}</td>
                    <td class="px-6 py-4">{{ \Carbon\Carbon::parse($certificate->issue_date)->format('d M Y') }}</td>
                    <td class="px-6 py-4 text-right">
                        <a href="{{ route('admin.certificates.edit', $certificate) }}" class="font-medium text-blue-500 hover:underline mr-4">Edit</a>
                        <form action="{{ route('admin.certificates.destroy', $certificate) }}" method="POST" onsubmit="return confirm('Are you sure?');" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="font-medium text-red-500 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="4" class="px-6 py-4 text-center">No certificates found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-admin-layout>