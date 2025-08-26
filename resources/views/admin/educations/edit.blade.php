<x-admin-layout>
    <h1 class="text-2xl font-bold text-white mb-6">Edit Education</h1>
    <div class="p-8 rounded-lg content-card">
        <form action="{{ route('admin.educations.update', $education) }}" method="POST">
            @csrf
            @method('PUT')
            @include('admin.educations._form', ['education' => $education])
        </form>
    </div>
</x-admin-layout>