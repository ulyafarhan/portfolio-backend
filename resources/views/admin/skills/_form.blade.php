<div class="space-y-6">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label for="name" class="block mb-2 text-sm font-medium text-gray-300">Skill Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $skill->name ?? '') }}" class="w-full px-3 py-2 border-0 rounded-md" style="background-color: #050510;" required>
        </div>
        <div>
            <label for="category" class="block mb-2 text-sm font-medium text-gray-300">Category</label>
            <select name="category" id="category" class="w-full px-3 py-2 border-0 rounded-md" style="background-color: #050510;" required>
                <option value="Frontend" @selected(old('category', $skill->category ?? '') == 'Frontend')>Frontend</option>
                <option value="Backend" @selected(old('category', $skill->category ?? '') == 'Backend')>Backend</option>
                <option value="Database" @selected(old('category', $skill->category ?? '') == 'Database')>Database</option>
                <option value="DevOps" @selected(old('category', $skill->category ?? '') == 'DevOps')>DevOps</option>
                <option value="Tools" @selected(old('category', $skill->category ?? '') == 'Tools')>Tools</option>
            </select>
        </div>
    </div>
    <div>
        <label for="mastery" class="block mb-2 text-sm font-medium text-gray-300">Mastery Level (0-100)</label>
        <input type="range" name="mastery" id="mastery" min="0" max="100" value="{{ old('mastery', $skill->mastery ?? '80') }}" class="w-full h-2 bg-gray-700 rounded-lg appearance-none cursor-pointer">
    </div>
</div>
<div class="mt-6 flex justify-end">
    <a href="{{ route('admin.skills.index') }}" class="px-4 py-2 rounded-md mr-2 bg-gray-600">Cancel</a>
    <button type="submit" class="px-4 py-2 text-black rounded-md" style="background-color: #00f0ff;">Save Skill</button>
</div>