<x-admin-layout>
    <h1 class="text-2xl font-bold text-white mb-6">Edit Project: {{ $project->title }}</h1>
    <div class="p-8 rounded-lg content-card">
        <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('admin.projects._form', ['project' => $project])
        </form>
    </div>
</x-admin-layout>