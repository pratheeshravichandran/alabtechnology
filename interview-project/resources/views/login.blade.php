<!-- resources/views/auth/login.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Login</h2>

        @if (session('error'))
            <div class="bg-red-100 text-red-700 p-2 mb-4 rounded">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4">
                <label class="block mb-1 font-semibold">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required class="w-full px-4 py-2 border rounded" />
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-semibold">Password</label>
                <input type="password" name="password" required class="w-full px-4 py-2 border rounded" />
            </div>

            <button type="submit" class="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700">
                Login
            </button>

            <p class="mt-4 text-center text-sm text-gray-600">
                Don't have an account?
                <a href="{{ route('register') }}" class="text-green-600 hover:underline">Register</a>
            </p>
        </form>
    </div>
</body>
</html>
