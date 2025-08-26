<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div class="md:col-span-2">
        <label for="title" class="block mb-2 text-sm font-medium text-gray-300">Certificate Title</label>
        <input type="text" name="title" id="title" value="{{ old('title', $certificate->title ?? '') }}" class="w-full px-3 py-2 border-0 rounded-md" style="background-color: #050510;" required>
    </div>
    <div>
        <label for="issuing_organization" class="block mb-2 text-sm font-medium text-gray-300">Issuing Organization</label>
        <input type="text" name="issuing_organization" id="issuing_organization" value="{{ old('issuing_organization', $certificate->issuing_organization ?? '') }}" class="w-full px-3 py-2 border-0 rounded-md" style="background-color: #050510;" required>
    </div>
    <div>
        <label for="issue_date" class="block mb-2 text-sm font-medium text-gray-300">Issue Date</label>
        <input type="date" name="issue_date" id="issue_date" value="{{ old('issue_date', $certificate->issue_date ?? '') }}" class="w-full px-3 py-2 border-0 rounded-md" style="background-color: #050510;" required>
    </div>
    <div class="md:col-span-2">
        <label for="credential_id" class="block mb-2 text-sm font-medium text-gray-300">Credential ID / URL (Optional)</label>
        <input type="text" name="credential_id" id="credential_id" value="{{ old('credential_id', $certificate->credential_id ?? '') }}" class="w-full px-3 py-2 border-0 rounded-md" style="background-color: #050510;">
    </div>
    <div class="md:col-span-2">
        <label for="image" class="block mb-2 text-sm font-medium text-gray-300">Certificate Image</label>
        <input type="file" name="image" id="image" class="block w-full text-sm border rounded-lg cursor-pointer text-gray-400 bg-gray-700 border-gray-600">
        @if (isset($certificate) && $certificate->image_url)
            <img src="{{ asset('storage/' . $certificate->image_url) }}" alt="Current image" class="mt-4 w-40 h-auto rounded">
        @endif
    </div>
</div>
<div class="mt-6 flex justify-end">
    <a href="{{ route('admin.certificates.index') }}" class="px-4 py-2 rounded-md mr-2 bg-gray-600">Cancel</a>
    <button type="submit" class="px-4 py-2 text-black rounded-md" style="background-color: #00f0ff;">Save Certificate</button>
</div>