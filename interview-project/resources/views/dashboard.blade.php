<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">

    <!-- Navbar -->
    <nav class="bg-white shadow-md px-6 py-4 flex justify-between items-center">
        <h1 class="text-2xl font-bold text-blue-600">MyDashboard</h1>

        <div class="flex items-center space-x-4">
            <span class="text-gray-700">Welcome, {{ Auth::user()->name }}</span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                    Logout
                </button>
            </form>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="p-6 grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Card 1 -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-semibold text-gray-800">Overview</h2>
            <p class="mt-2 text-gray-600">Quick summary of your account or stats.</p>
        </div>

        <!-- Card 2 -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-semibold text-gray-800">Tasks</h2>
            <p class="mt-2 text-gray-600">View or manage your pending tasks here.</p>
        </div>

        <!-- Card 3 -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-semibold text-gray-800">Notifications</h2>
            <p class="mt-2 text-gray-600">You have no new notifications.</p>
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-center py-4 text-sm text-gray-500">
        &copy; {{ date('Y') }} MyDashboard. All rights reserved.
    </footer>

</body>
</html>
