<!-- resources/views/auth/register.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Register</h2>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-2 mb-4 rounded">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-4">
                <label class="block mb-1 font-semibold">Name</label>
                <input type="text" name="name" value="{{ old('name') }}" required class="w-full px-4 py-2 border rounded" />
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-semibold">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required class="w-full px-4 py-2 border rounded" />
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-semibold">Password</label>
                <input type="password" name="password" required class="w-full px-4 py-2 border rounded" />
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-semibold">Confirm Password</label>
                <input type="password" name="password_confirmation" required class="w-full px-4 py-2 border rounded" />
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
                Register
            </button>

            <p class="mt-4 text-center text-sm text-gray-600">
                Already have an account?
                <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Login</a>
            </p>
        </form>
    </div>
</body>
</html>
