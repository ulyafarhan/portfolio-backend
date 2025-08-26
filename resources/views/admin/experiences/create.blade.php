<x-admin-layout>
    <h1 class="text-2xl font-bold text-white mb-6">Add New Experience</h1>
    <div class="p-8 rounded-lg content-card">
        <form action="{{ route('admin.experiences.store') }}" method="POST">
            @csrf
            @include('admin.experiences._form')
        </form>
    </div>
</x-admin-layout>