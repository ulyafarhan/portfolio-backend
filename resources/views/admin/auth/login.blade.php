<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Portfolio</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@700&family=Inter:wght@400;500&display=swap" rel="stylesheet">
    <style>
        body { background-color: #050510; color: #f0f0f8; font-family: 'Inter', sans-serif; }
        .font-orbitron { font-family: 'Orbitron', sans-serif; }
        .glow-primary { box-shadow: 0 0 5px #00f0ff, 0 0 10px #00f0ff; }
        .glow-secondary { box-shadow: 0 0 5px #ff00ff, 0 0 10px #ff00ff; }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md p-8 space-y-8 rounded-lg" style="background-color: #0d0d1f;">
        <div class="text-center">
            <h1 class="text-3xl font-bold text-white font-orbitron">ADMIN PANEL</h1>
            <p class="mt-2 text-gray-400">Login to manage your portfolio</p>
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-400">
                {{ session('status') }}
            </div>
        @endif
        
        @if ($errors->any())
            <div class="mb-4">
                <div class="font-medium text-red-500">Whoops! Something went wrong.</div>
                <ul class="mt-3 list-disc list-inside text-sm text-red-500">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.login') }}" class="space-y-6">
            @csrf
            <div>
                <label for="email" class="block mb-2 text-sm font-medium text-gray-300">Email</label>
                <input type="email" name="email" id="email" class="w-full px-3 py-2 border-0 rounded-md focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-900" style="background-color: #050510; border-color: #00f0ff; color: #f0f0f8; outline-color: #00f0ff" required autofocus value="{{ old('email') }}">
            </div>
            <div>
                <label for="password" class="block mb-2 text-sm font-medium text-gray-300">Password</label>
                <input type="password" name="password" id="password" class="w-full px-3 py-2 border-0 rounded-md focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-900" style="background-color: #050510; border-color: #00f0ff; color: #f0f0f8; outline-color: #00f0ff" required>
            </div>
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input id="remember_me" name="remember" type="checkbox" class="w-4 h-4 rounded focus:ring-2" style="background-color: #050510; border-color: #00f0ff; color: #00f0ff;">
                    <label for="remember_me" class="ml-2 block text-sm text-gray-400">Remember me</label>
                </div>
            </div>
            <div>
                <button type="submit" class="w-full px-4 py-2 text-sm font-medium text-black transition duration-300 transform rounded-md hover:scale-105 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-900" style="background-color: #00f0ff;">
                    Sign In
                </button>
            </div>
        </form>
    </div>

</body>
</html>