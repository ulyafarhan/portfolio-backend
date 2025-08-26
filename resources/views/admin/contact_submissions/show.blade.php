<x-admin-layout>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-white">Message Details</h1>
        <a href="{{ route('admin.contact-submissions.index') }}" class="px-4 py-2 text-sm font-medium rounded-md bg-gray-600 text-gray-300 hover:bg-gray-500">
            &larr; Back to all messages
        </a>
    </div>

    <div class="p-8 rounded-lg content-card">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6 pb-6 border-b border-gray-700">
            <div>
                <dt class="text-sm font-medium text-gray-400">From</dt>
                <dd class="mt-1 text-lg text-white">{{ $submission->name }}</dd>
            </div>
            <div>
                <dt class="text-sm font-medium text-gray-400">Email</dt>
                <dd class="mt-1 text-lg text-white">{{ $submission->email }}</dd>
            </div>
            <div>
                <dt class="text-sm font-medium text-gray-400">Received At</dt>
                <dd class="mt-1 text-lg text-white">{{ $submission->created_at->format('d M Y, H:i:s') }}</dd>
            </div>
        </div>

        <div>
            <dt class="text-sm font-medium text-gray-400 mb-2">Message</dt>
            <dd class="text-gray-300 whitespace-pre-wrap">{{ $submission->message }}</dd>
        </div>

        <div class="mt-8 flex justify-end">
            <form action="{{ route('admin.contact-submissions.destroy', $submission) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this message?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-4 py-2 text-sm font-medium text-white transition-colors duration-200 bg-red-600 rounded-md hover:bg-red-700">Delete Message</button>
            </form>
        </div>
    </div>
</x-admin-layout>