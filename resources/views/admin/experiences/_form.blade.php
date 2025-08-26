<div class="space-y-6">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label for="job_title" class="block mb-2 text-sm font-medium text-gray-300">Job Title</label>
            <input type="text" name="job_title" id="job_title" value="{{ old('job_title', $experience->job_title ?? '') }}" class="w-full px-3 py-2 border-0 rounded-md" style="background-color: #050510;" required>
        </div>
        <div>
            <label for="company_name" class="block mb-2 text-sm font-medium text-gray-300">Company Name</label>
            <input type="text" name="company_name" id="company_name" value="{{ old('company_name', $experience->company_name ?? '') }}" class="w-full px-3 py-2 border-0 rounded-md" style="background-color: #050510;" required>
        </div>
        <div>
            <label for="start_date" class="block mb-2 text-sm font-medium text-gray-300">Start Date</label>
            <input type="date" name="start_date" id="start_date" value="{{ old('start_date', isset($experience) ? $experience->start_date->format('Y-m-d') : '') }}" class="w-full px-3 py-2 border-0 rounded-md" style="background-color: #050510;" required>
        </div>
        <div>
            <label for="end_date" class="block mb-2 text-sm font-medium text-gray-300">End Date (leave blank if current)</label>
            <input type="date" name="end_date" id="end_date" value="{{ old('end_date', isset($experience) && $experience->end_date ? $experience->end_date->format('Y-m-d') : '') }}" class="w-full px-3 py-2 border-0 rounded-md" style="background-color: #050510;">
        </div>
    </div>
    <div>
        <label for="description" class="block mb-2 text-sm font-medium text-gray-300">Description / Responsibilities</label>
        <textarea name="description" id="description" rows="5" class="w-full px-3 py-2 border-0 rounded-md" style="background-color: #050510;" required>{{ old('description', $experience->description ?? '') }}</textarea>
    </div>
</div>
<div class="mt-6 flex justify-end">
    <a href="{{ route('admin.experiences.index') }}" class="px-4 py-2 rounded-md mr-2 bg-gray-600">Cancel</a>
    <button type="submit" class="px-4 py-2 text-black rounded-md" style="background-color: #00f0ff;">Save Experience</button>
</div>