<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in - Learn App</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', system-ui, sans-serif;
            background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 50%, #1e40af 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        /* Background Geometric Shapes */
        .background-shapes {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
            overflow: hidden;
        }

        .shape {
            position: absolute;
        }

        /* Large elliptical shapes */
        .shape-1 {
            top: -10%;
            left: -15%;
            width: 500px;
            height: 300px;
            background: rgba(255, 255, 255, 0.08);
            border-radius: 50%;
            transform: rotate(25deg);
        }

        .shape-2 {
            top: 50%;
            right: -20%;
            width: 600px;
            height: 400px;
            background: rgba(255, 255, 255, 0.06);
            border-radius: 50%;
            transform: rotate(-15deg);
        }

        .shape-3 {
            bottom: -15%;
            left: 10%;
            width: 400px;
            height: 250px;
            background: rgba(255, 255, 255, 0.07);
            border-radius: 50%;
            transform: rotate(35deg);
        }

        /* Medium elliptical shapes */
        .shape-4 {
            top: 15%;
            right: 25%;
            width: 250px;
            height: 180px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 50%;
            transform: rotate(-20deg);
        }

        .shape-5 {
            bottom: 25%;
            left: 5%;
            width: 200px;
            height: 140px;
            background: rgba(255, 255, 255, 0.06);
            border-radius: 50%;
            transform: rotate(45deg);
        }

        /* Small circular shapes */
        .shape-6 {
            top: 30%;
            left: 15%;
            width: 120px;
            height: 120px;
            background: rgba(255, 255, 255, 0.04);
            border-radius: 50%;
        }

        .shape-7 {
            top: 70%;
            right: 35%;
            width: 80px;
            height: 80px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 50%;
        }

        .shape-8 {
            top: 5%;
            right: 10%;
            width: 150px;
            height: 100px;
            background: rgba(255, 255, 255, 0.04);
            border-radius: 50%;
            transform: rotate(60deg);
        }

        /* Additional decorative ellipses */
        .shape-9 {
            bottom: 10%;
            right: 15%;
            width: 180px;
            height: 120px;
            background: rgba(255, 255, 255, 0.03);
            border-radius: 50%;
            transform: rotate(-25deg);
        }

        .shape-10 {
            top: 45%;
            left: -5%;
            width: 220px;
            height: 160px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 50%;
            transform: rotate(15deg);
        }

        /* Login Container */
        .login-container {
            position: relative;
            z-index: 10;
            width: 100%;
            max-width: 420px;
            padding: 20px;
        }

        /* Login Card */
        .login-card {
            background: white;
            border-radius: 24px;
            padding: 40px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
            position: relative;
            overflow: hidden;
        }

        .login-card::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 120px;
            height: 120px;
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            border-radius: 0 24px 0 100px;
            opacity: 0.1;
        }

        /* Header Section */
        .header-section {
            text-align: center;
            margin-bottom: 32px;
        }

        .header-title {
            font-size: 28px;
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 8px;
        }

        .header-subtitle {
            font-size: 14px;
            color: #6b7280;
            line-height: 1.5;
        }

        /* Form Styles */
        .login-form {
            margin-bottom: 24px;
        }

        .form-group {
            margin-bottom: 20px;
            position: relative;
        }

        .form-input {
            width: 100%;
            padding: 16px;
            background: #f9fafb;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            color: #1f2937;
            font-size: 14px;
            transition: all 0.3s ease;
            outline: none;
        }

        .form-input::placeholder {
            color: #9ca3af;
        }

        .form-input:focus {
            border-color: #2563eb;
            background: white;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        /* Password Input with Eye Icon */
        .password-group {
            position: relative;
        }

        .password-toggle {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #9ca3af;
            cursor: pointer;
            padding: 4px;
            border-radius: 4px;
            transition: color 0.3s ease;
        }

        .password-toggle:hover {
            color: #2563eb;
        }

        /* Remember Me Checkbox */
        .remember-group {
            display: flex;
            align-items: center;
            margin-bottom: 24px;
        }

        .checkbox-wrapper {
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        .checkbox-input {
            width: 16px;
            height: 16px;
            margin-right: 8px;
            accent-color: #2563eb;
        }

        .checkbox-label {
            font-size: 14px;
            color: #6b7280;
            user-select: none;
        }

        /* Sign In Button */
        .signin-button {
            width: 100%;
            padding: 16px;
            background: #2563eb;
            border: none;
            border-radius: 12px;
            color: white;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-bottom: 16px;
        }

        .signin-button:hover {
            background: #1d4ed8;
            transform: translateY(-1px);
            box-shadow: 0 10px 25px rgba(37, 99, 235, 0.3);
        }

        .signin-button:active {
            transform: translateY(0);
        }

        /* Sign in with other Button */
        .signin-other-button {
            width: 100%;
            padding: 16px;
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            color: #6b7280;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .signin-other-button:hover {
            background: #f9fafb;
            border-color: #d1d5db;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .signin-other-button:active {
            transform: translateY(0);
        }

        /* Error Messages */
        .error-message {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #dc2626;
            padding: 12px 16px;
            border-radius: 8px;
            font-size: 14px;
            margin-bottom: 16px;
            display: none;
        }

        .error-message.show {
            display: block;
        }

        /* Success Messages */
        .success-message {
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            color: #16a34a;
            padding: 12px 16px;
            border-radius: 8px;
            font-size: 14px;
            margin-bottom: 16px;
            display: none;
        }

        .success-message.show {
            display: block;
        }

        /* Loading State */
        .signin-button.loading {
            pointer-events: none;
            opacity: 0.7;
        }

        .signin-button.loading::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 20px;
            height: 20px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-top: 2px solid white;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: translate(-50%, -50%) rotate(0deg); }
            100% { transform: translate(-50%, -50%) rotate(360deg); }
        }

        /* Responsive Design */
        @media (max-width: 640px) {
            .login-container {
                padding: 16px;
            }

            .login-card {
                padding: 32px 24px;
            }

            .header-title {
                font-size: 24px;
            }
        }

        /* Animation */
        .login-card {
            animation: slideUp 0.6s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <!-- Background Shapes -->
    <div class="background-shapes">
        <div class="shape shape-1"></div>
        <div class="shape shape-2"></div>
        <div class="shape shape-3"></div>
        <div class="shape shape-4"></div>
        <div class="shape shape-5"></div>
        <div class="shape shape-6"></div>
        <div class="shape shape-7"></div>
        <div class="shape shape-8"></div>
        <div class="shape shape-9"></div>
        <div class="shape shape-10"></div>
    </div>

    <!-- Login Container -->
    <div class="login-container">
        <div class="login-card">
            <!-- Header Section -->
            <div class="header-section">
                <h1 class="header-title">Sign in</h1>
                <p class="header-subtitle">New user? <a href="#" class="signup-link">Sign up for a free trial</a></p>
            </div>

            <!-- Error/Success Messages -->
            <div id="error-message" class="error-message"></div>
            <div id="success-message" class="success-message"></div>

            <!-- Login Form -->
            <form class="login-form" id="loginForm">
                @csrf
                
                <!-- User Name Input -->
                <div class="form-group">
                    <input 
                        type="text" 
                        class="form-input" 
                        id="username" 
                        name="username" 
                        placeholder="User Name"
                        required
                        autocomplete="username"
                    >
                </div>

                <!-- Password Input -->
                <div class="form-group">
                    <div class="password-group">
                        <input 
                            type="password" 
                            class="form-input" 
                            id="password" 
                            name="password" 
                            placeholder="Password"
                            required
                            autocomplete="current-password"
                        >
                        <button type="button" class="password-toggle" id="passwordToggle">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>

                <!-- Remember Me Checkbox -->
                <div class="remember-group">
                    <label class="checkbox-wrapper">
                        <input type="checkbox" class="checkbox-input" name="remember" id="remember">
                        <span class="checkbox-label">Keep me signed in</span>
                    </label>
                </div>

                <!-- Sign In Button -->
                <button type="submit" class="signin-button" id="signinButton">
                    Sign In
                </button>

                <!-- Sign in with other Button -->
                <button type="button" class="signin-other-button" id="signinOtherButton">
                    Sign in with other
                </button>
            </form>
        </div>
    </div>

    <script>
        // DOM Elements
        const loginForm = document.getElementById('loginForm');
        const usernameInput = document.getElementById('username');
        const passwordInput = document.getElementById('password');
        const passwordToggle = document.getElementById('passwordToggle');
        const signinButton = document.getElementById('signinButton');
        const signinOtherButton = document.getElementById('signinOtherButton');
        const errorMessage = document.getElementById('error-message');
        const successMessage = document.getElementById('success-message');

        // Password visibility toggle
        passwordToggle.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            
            const icon = this.querySelector('i');
            icon.classList.toggle('fa-eye');
            icon.classList.toggle('fa-eye-slash');
        });

        // Form submission
        loginForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Clear previous messages
            hideMessages();
            
            // Basic validation
            if (!usernameInput.value.trim()) {
                showError('Please enter your username.');
                return;
            }
            
            if (!passwordInput.value) {
                showError('Please enter your password.');
                return;
            }
            
            // Show loading state
            signinButton.classList.add('loading');
            signinButton.textContent = '';
            
            // Simulate API call
            setTimeout(() => {
                // For demo purposes, simulate success
                signinButton.classList.remove('loading');
                signinButton.textContent = 'Sign In';
                showSuccess('Login successful! Redirecting...');
                
                // Redirect after success message
                setTimeout(() => {
                    window.location.href = '/dashboard';
                }, 1500);
            }, 2000);
        });

        // Sign in with other button
        signinOtherButton.addEventListener('click', function() {
            showError('Alternative sign-in methods are not configured yet.');
        });

        // Message functions
        function showError(message) {
            errorMessage.textContent = message;
            errorMessage.classList.add('show');
            setTimeout(() => {
                errorMessage.classList.remove('show');
            }, 5000);
        }

        function showSuccess(message) {
            successMessage.textContent = message;
            successMessage.classList.add('show');
            setTimeout(() => {
                successMessage.classList.remove('show');
            }, 5000);
        }

        function hideMessages() {
            errorMessage.classList.remove('show');
            successMessage.classList.remove('show');
        }

        // Focus on first input when page loads
        document.addEventListener('DOMContentLoaded', function() {
            usernameInput.focus();
        });

        // Enter key handling
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' && document.activeElement !== signinButton) {
                loginForm.dispatchEvent(new Event('submit'));
            }
        });
    </script>
</body>
</html>