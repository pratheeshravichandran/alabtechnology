<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - Interview Project</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- Bootstrap CDN (Optional) --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f4f6f8;
        }
        .login-card {
            max-width: 400px;
            margin: 100px auto;
            padding: 30px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        .form-control:focus {
            box-shadow: none;
            border-color: #4f46e5;
        }
        .btn-primary {
            background-color: #4f46e5;
            border-color: #4f46e5;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <h4 class="mb-4 text-center">Login to Your Account</h4>

        {{-- Show session or validation errors --}}
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input 
                    type="email" 
                    name="email" 
                    class="form-control" 
                    id="email" 
                    placeholder="you@example.com" 
                    value="{{ old('email') }}" 
                    required autofocus
                >
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input 
                    type="password" 
                    name="password" 
                    class="form-control" 
                    id="password" 
                    placeholder="Enter your password" 
                    required
                >
            </div>

            <div class="d-grid mb-3">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>

            <div class="text-center">
                <a href="">Forgot your password?</a>
            </div>
        </form>
    </div>
</body>
</html>
