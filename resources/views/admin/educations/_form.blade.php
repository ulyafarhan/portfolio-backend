<div class="space-y-6">
    <div>
        <label for="institution" class="block mb-2 text-sm font-medium text-gray-300">Institution</label>
        <input type="text" name="institution" id="institution" value="{{ old('institution', $education->institution ?? '') }}" class="w-full px-3 py-2 border-0 rounded-md" style="background-color: #050510;" required>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label for="degree" class="block mb-2 text-sm font-medium text-gray-300">Degree</label>
            <input type="text" name="degree" id="degree" value="{{ old('degree', $education->degree ?? '') }}" class="w-full px-3 py-2 border-0 rounded-md" style="background-color: #050510;" required>
        </div>
        <div>
            <label for="field_of_study" class="block mb-2 text-sm font-medium text-gray-300">Field of Study</label>
            <input type="text" name="field_of_study" id="field_of_study" value="{{ old('field_of_study', $education->field_of_study ?? '') }}" class="w-full px-3 py-2 border-0 rounded-md" style="background-color: #050510;" required>
        </div>
        <div>
            <label for="start_year" class="block mb-2 text-sm font-medium text-gray-300">Start Year</label>
            <input type="number" name="start_year" id="start_year" value="{{ old('start_year', $education->start_year ?? '') }}" class="w-full px-3 py-2 border-0 rounded-md" style="background-color: #050510;" required placeholder="YYYY">
        </div>
        <div>
            <label for="end_year" class="block mb-2 text-sm font-medium text-gray-300">End Year (or expected)</label>
            <input type="number" name="end_year" id="end_year" value="{{ old('end_year', $education->end_year ?? '') }}" class="w-full px-3 py-2 border-0 rounded-md" style="background-color: #050510;" placeholder="YYYY">
        </div>
    </div>
</div>
<div class="mt-6 flex justify-end">
    <a href="{{ route('admin.educations.index') }}" class="px-4 py-2 rounded-md mr-2 bg-gray-600">Cancel</a>
    <button type="submit" class="px-4 py-2 text-black rounded-md" style="background-color: #00f0ff;">Save Education</button>
</div>