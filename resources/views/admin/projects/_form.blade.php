@if ($errors->any())
    <div class="p-4 mb-4 text-sm text-red-300 bg-red-900 rounded-lg" role="alert">
        <ul class="list-disc pl-5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div class="md:col-span-2">
        <label for="title" class="block mb-2 text-sm font-medium text-gray-300">Title</label>
        <input type="text" id="title" name="title" value="{{ old('title', $project->title ?? '') }}" class="w-full px-3 py-2 border-0 rounded-md focus:ring-2" style="background-color: #050510; color: #f0f0f8;" required>
    </div>
    
    <div class="md:col-span-2">
        <label for="description" class="block mb-2 text-sm font-medium text-gray-300">Description</label>
        <textarea id="description" name="description" rows="6" class="w-full px-3 py-2 border-0 rounded-md focus:ring-2" style="background-color: #050510; color: #f0f0f8;" required>{{ old('description', $project->description ?? '') }}</textarea>
    </div>
    
    <div class="md:col-span-2">
        <label for="technologies" class="block mb-2 text-sm font-medium text-gray-300">Technologies (comma-separated)</label>
        <input type="text" id="technologies" name="technologies" value="{{ old('technologies', isset($project) ? implode(',', $project->technologies) : '') }}" class="w-full px-3 py-2 border-0 rounded-md focus:ring-2" style="background-color: #050510; color: #f0f0f8;" required>
        <p class="mt-1 text-xs text-gray-500">e.g., Laravel,React,MySQL,Tailwind CSS</p>
    </div>

    <div>
        <label for="image" class="block mb-2 text-sm font-medium text-gray-300">Project Image</label>
        <input type="file" id="image" name="image" class="block w-full text-sm border rounded-lg cursor-pointer text-gray-400 focus:outline-none bg-gray-700 border-gray-600 placeholder-gray-400">
        @if (isset($project) && $project->image_url)
            <img src="{{ asset('storage/' . $project->image_url) }}" alt="Current image" class="mt-4 w-40 h-auto rounded">
        @endif
    </div>
    
    <div>
        <label for="demo_url" class="block mb-2 text-sm font-medium text-gray-300">Demo URL</label>
        <input type="url" id="demo_url" name="demo_url" value="{{ old('demo_url', $project->demo_url ?? '') }}" class="w-full px-3 py-2 border-0 rounded-md focus:ring-2" style="background-color: #050510; color: #f0f0f8;">
    </div>
    
    <div>
        <label for="source_code_url" class="block mb-2 text-sm font-medium text-gray-300">Source Code URL</label>
        <input type="url" id="source_code_url" name="source_code_url" value="{{ old('source_code_url', $project->source_code_url ?? '') }}" class="w-full px-3 py-2 border-0 rounded-md focus:ring-2" style="background-color: #050510; color: #f0f0f8;">
    </div>
</div>

<div class="mt-6 flex justify-end">
    <a href="{{ route('admin.projects.index') }}" class="px-4 py-2 text-sm font-medium rounded-md mr-2 bg-gray-600 text-gray-300 hover:bg-gray-500">Cancel</a>
    <button type="submit" class="px-4 py-2 text-sm font-medium text-black transition duration-300 transform rounded-md hover:scale-105" style="background-color: #00f0ff;">
        {{ isset($project) ? 'Update Project' : 'Save Project' }}
    </button>
</div>