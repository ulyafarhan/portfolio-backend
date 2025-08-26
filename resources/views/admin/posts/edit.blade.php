<x-admin-layout>
    <h1 class="text-2xl font-bold text-white mb-6">Edit Post</h1>
    <div class="p-8 rounded-lg content-card">
        <form action="{{ route('admin.posts.update', $post) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('admin.posts._form', ['post' => $post])
        </form>
    </div>
</x-admin-layout>