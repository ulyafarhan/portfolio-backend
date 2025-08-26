<x-admin-layout>
    <h1 class="text-2xl font-bold text-white mb-6">Edit Skill</h1>
    <div class="p-8 rounded-lg content-card">
        <form action="{{ route('admin.skills.update', $skill) }}" method="POST">
            @csrf
            @method('PUT')
            @include('admin.skills._form', ['skill' => $skill])
        </form>
    </div>
</x-admin-layout>