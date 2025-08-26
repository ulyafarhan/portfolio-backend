<x-admin-layout>
    <h1 class="text-2xl font-bold text-white mb-6">Add New Education</h1>
    <div class="p-8 rounded-lg content-card">
        <form action="{{ route('admin.educations.store') }}" method="POST">
            @csrf
            @include('admin.educations._form')
        </form>
    </div>
</x-admin-layout>