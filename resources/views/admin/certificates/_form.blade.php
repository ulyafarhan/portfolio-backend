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
        <label for="title" class="block mb-2 text-sm font-medium text-gray-300">Judul Sertifikat</label>
        <input type="text" id="title" name="title" value="{{ old('title', $certificate->title ?? '') }}" class="w-full px-3 py-2 border-0 rounded-md focus:ring-2" style="background-color: #050510; color: #f0f0f8;" required>
    </div>
    
    <div class="md:col-span-2">
        <label for="issuer" class="block mb-2 text-sm font-medium text-gray-300">Diterbitkan oleh</label>
        <input type="text" id="issuer" name="issuer" value="{{ old('issuer', $certificate->issuer ?? '') }}" class="w-full px-3 py-2 border-0 rounded-md focus:ring-2" style="background-color: #050510; color: #f0f0f8;" required>
    </div>
    
    <div class="md:col-span-2">
        <label for="description" class="block mb-2 text-sm font-medium text-gray-300">Deskripsi</label>
        <textarea id="description" name="description" rows="4" class="w-full px-3 py-2 border-0 rounded-md focus:ring-2" style="background-color: #050510; color: #f0f0f8;" required>{{ old('description', $certificate->description ?? '') }}</textarea>
    </div>
    
    <div>
        <label for="issued_year" class="block mb-2 text-sm font-medium text-gray-300">Tahun Terbit</label>
        <input type="number" id="issued_year" name="issued_year" value="{{ old('issued_year', $certificate->issued_year ?? '') }}" class="w-full px-3 py-2 border-0 rounded-md focus:ring-2" style="background-color: #050510; color: #f0f0f8;" placeholder="Contoh: 2024" required>
    </div>
    
    <div>
        <label for="credential_url" class="block mb-2 text-sm font-medium text-gray-300">Link/Nomor Seri (Opsional)</label>
        <input type="url" id="credential_url" name="credential_url" value="{{ old('credential_url', $certificate->credential_url ?? '') }}" class="w-full px-3 py-2 border-0 rounded-md focus:ring-2" style="background-color: #050510; color: #f0f0f8;">
    </div>

    <div class="md:col-span-2">
        <label for="image" class="block mb-2 text-sm font-medium text-gray-300">Gambar Sertifikat</label>
        <input type="file" id="image" name="image" class="block w-full text-sm border rounded-lg cursor-pointer text-gray-400 focus:outline-none bg-gray-700 border-gray-600 placeholder-gray-400">
        @if (isset($certificate) && $certificate->image_url)
            <img src="{{ Storage::url($certificate->image_url) }}" alt="Current image" class="mt-4 w-40 h-auto rounded">
        @endif
    </div>
</div>

<div class="mt-6 flex justify-end">
    <a href="{{ route('admin.certificates.index') }}" class="px-4 py-2 text-sm font-medium rounded-md mr-2 bg-gray-600 text-gray-300 hover:bg-gray-500">Batal</a>
    <button type="submit" class="px-4 py-2 text-sm font-medium text-black transition duration-300 transform rounded-md hover:scale-105" style="background-color: #00f0ff;">
        {{ isset($certificate) ? 'Perbarui Sertifikat' : 'Simpan Sertifikat' }}
    </button>
</div>