<x-admin-layout>
    <h1 class="text-2xl font-bold text-white mb-6">Edit Experience</h1>
    <div class="p-8 rounded-lg content-card">
        <form action="{{ route('admin.experiences.update', $experience) }}" method="POST">
            @csrf
            @method('PUT')
            @include('admin.experiences._form', ['experience' => $experience])
        </form>
    </div>
</x-admin-layout>