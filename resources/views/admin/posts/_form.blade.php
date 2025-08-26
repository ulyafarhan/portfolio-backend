@if ($errors->any())
    <div class="p-4 mb-4 text-sm text-red-300 bg-red-900 rounded-lg" role="alert">
        <ul class="list-disc pl-5">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
    </div>
@endif

<div class="space-y-6">
    <div>
        <label for="title" class="block mb-2 text-sm font-medium text-gray-300">Title</label>
        <input type="text" id="title" name="title" value="{{ old('title', $post->title ?? '') }}" class="w-full px-3 py-2 border-0 rounded-md focus:ring-2" style="background-color: #050510; color: #f0f0f8;" required>
    </div>

    <div>
        <label for="excerpt" class="block mb-2 text-sm font-medium text-gray-300">Excerpt</label>
        <textarea id="excerpt" name="excerpt" rows="3" class="w-full px-3 py-2 border-0 rounded-md focus:ring-2" style="background-color: #050510; color: #f0f0f8;" required>{{ old('excerpt', $post->excerpt ?? '') }}</textarea>
    </div>
    
    <div>
        <label for="cover_image" class="block mb-2 text-sm font-medium text-gray-300">Cover Image</label>
        <input type="file" id="cover_image" name="cover_image" class="block w-full text-sm border rounded-lg cursor-pointer text-gray-400 focus:outline-none bg-gray-700 border-gray-600 placeholder-gray-400">
        @if (isset($post) && $post->cover_image_url)
            <img src="{{ asset('storage/' . $post->cover_image_url) }}" alt="Current image" class="mt-4 w-40 h-auto rounded">
        @endif
    </div>
    
    <div>
        <label for="body" class="block mb-2 text-sm font-medium text-gray-300">Body Content</label>
        <input id="body" type="hidden" name="body" value="{{ old('body', $post->body ?? '') }}">
        <trix-editor input="body" class="trix-content"></trix-editor>
    </div>
</div>

<div class="mt-6 flex justify-end">
    <a href="{{ route('admin.posts.index') }}" class="px-4 py-2 text-sm font-medium rounded-md mr-2 bg-gray-600 text-gray-300 hover:bg-gray-500">Cancel</a>
    <button type="submit" class="px-4 py-2 text-sm font-medium text-black transition duration-300 transform rounded-md hover:scale-105" style="background-color: #00f0ff;">
        {{ isset($post) ? 'Update Post' : 'Save Post' }}
    </button>
</div>