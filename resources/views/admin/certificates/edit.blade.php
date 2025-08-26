<x-admin-layout>
    <h1 class="text-2xl font-bold text-white mb-6">Edit Certificate</h1>
    <div class="p-8 rounded-lg content-card">
        <form action="{{ route('admin.certificates.update', $certificate) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('admin.certificates._form', ['certificate' => $certificate])
        </form>
    </div>
</x-admin-layout>