<x-admin-layout>
    <h1 class="text-2xl font-bold text-white mb-6">Add New Certificate</h1>
    <div class="p-8 rounded-lg content-card">
        <form action="{{ route('admin.certificates.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('admin.certificates._form')
        </form>
    </div>
</x-admin-layout>