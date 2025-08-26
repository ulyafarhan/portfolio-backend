<x-admin-layout>
    <h1 class="text-2xl font-bold text-white mb-6">Contact Messages</h1>

    @if (session('success'))
        <div class="p-4 mb-4 text-sm text-green-300 bg-green-900 rounded-lg" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg content-card">
        <table class="w-full text-sm text-left text-gray-400">
            <thead class="text-xs uppercase bg-gray-700 text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">From</th>
                    <th scope="col" class="px-6 py-3">Email</th>
                    <th scope="col" class="px-6 py-3">Received At</th>
                    <th scope="col" class="px-6 py-3">Status</th>
                    <th scope="col" class="px-6 py-3"><span class="sr-only">View</span></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($submissions as $submission)
                <tr class="border-b bg-gray-800 border-gray-700 hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-white">{{ $submission->name }}</th>
                    <td class="px-6 py-4">{{ $submission->email }}</td>
                    <td class="px-6 py-4">{{ $submission->created_at->format('d M Y, H:i') }}</td>
                    <td class="px-6 py-4">
                        @if($submission->status == 'unread')
                            <span class="px-2 py-1 text-xs font-semibold rounded-full bg-cyan-500 text-cyan-900">New</span>
                        @else
                            <span class="px-2 py-1 text-xs font-medium rounded-full bg-gray-700 text-gray-300">Read</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-right">
                        <a href="{{ route('admin.contact-submissions.show', $submission) }}" class="font-medium text-blue-500 hover:underline">View Message</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-4 text-center">No messages found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-admin-layout>