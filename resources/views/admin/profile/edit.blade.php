<x-admin-layout>
    <h1 class="text-2xl font-bold text-white mb-6">Edit Personal Profile</h1>

    @if (session('success'))
        <div class="p-4 mb-4 text-sm text-green-300 bg-green-900 rounded-lg" role="alert">
            {{ session('success') }}
        </div>
    @endif
    
    <div class="p-8 rounded-lg content-card">
        <form action="{{ route('admin.profile.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="full_name" class="block mb-2 text-sm font-medium text-gray-300">Full Name</label>
                    <input type="text" id="full_name" name="full_name" value="{{ old('full_name', $profile->full_name) }}" class="w-full px-3 py-2 border-0 rounded-md focus:ring-2" style="background-color: #050510; color: #f0f0f8;" required>
                </div>

                <div>
                    <label for="job_title" class="block mb-2 text-sm font-medium text-gray-300">Job Title</label>
                    <input type="text" id="job_title" name="job_title" value="{{ old('job_title', $profile->job_title) }}" class="w-full px-3 py-2 border-0 rounded-md focus:ring-2" style="background-color: #050510; color: #f0f0f8;" required>
                </div>
                
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-300">Email Address</label>
                    <input type="email" id="email" name="email" value="{{ old('email', $profile->email) }}" class="w-full px-3 py-2 border-0 rounded-md focus:ring-2" style="background-color: #050510; color: #f0f0f8;" required>
                </div>

                <div>
                    <label for="phone" class="block mb-2 text-sm font-medium text-gray-300">Phone Number</label>
                    <input type="text" id="phone" name="phone" value="{{ old('phone', $profile->phone) }}" class="w-full px-3 py-2 border-0 rounded-md focus:ring-2" style="background-color: #050510; color: #f0f0f8;">
                </div>

                <div>
                    <label for="website" class="block mb-2 text-sm font-medium text-gray-300">Website URL</label>
                    <input type="url" id="website" name="website" value="{{ old('website', $profile->website) }}" class="w-full px-3 py-2 border-0 rounded-md focus:ring-2" style="background-color: #050510; color: #f0f0f8;">
                </div>

                <div>
                    <label for="location" class="block mb-2 text-sm font-medium text-gray-300">Location</label>
                    <input type="text" id="location" name="location" value="{{ old('location', $profile->location) }}" class="w-full px-3 py-2 border-0 rounded-md focus:ring-2" style="background-color: #050510; color: #f0f0f8;">
                </div>
                
                <div class="md:col-span-2">
                    <label for="summary" class="block mb-2 text-sm font-medium text-gray-300">Summary</label>
                    <textarea id="summary" name="summary" rows="5" class="w-full px-3 py-2 border-0 rounded-md focus:ring-2" style="background-color: #050510; color: #f0f0f8;" required>{{ old('summary', $profile->summary) }}</textarea>
                </div>
            </div>

            <div class="mt-6 flex justify-end">
                <button type="submit" class="px-6 py-2 text-sm font-medium text-black transition duration-300 transform rounded-md hover:scale-105" style="background-color: #00f0ff;">
                    Update Profile
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>