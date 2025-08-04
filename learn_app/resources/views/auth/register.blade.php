<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Laravel Admin</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <style>
        :root {
            --primary: #6366f1;
            --primary-dark: #4f46e5;
            --primary-light: #a5b4fc;
            --success: #10b981;
            --error: #ef4444;
            --warning: #f59e0b;
            --background: #0f172a;
            --card-bg: rgba(255, 255, 255, 0.1);
            --text-primary: #f8fafc;
            --text-secondary: #cbd5e1;
            --border: rgba(255, 255, 255, 0.2);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', system-ui, sans-serif;
            background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 50%, #312e81 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow-x: hidden;
            padding: 2rem 0;
        }

        /* Animated Background */
        .background-animation {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            overflow: hidden;
        }

        .floating-shape {
            position: absolute;
            opacity: 0.1;
            animation: float 20s infinite linear;
        }

        .floating-shape:nth-child(1) {
            top: 20%;
            left: 10%;
            width: 80px;
            height: 80px;
            background: var(--primary);
            border-radius: 50%;
            animation-delay: 0s;
        }

        .floating-shape:nth-child(2) {
            top: 60%;
            right: 10%;
            width: 120px;
            height: 120px;
            background: var(--primary-light);
            border-radius: 20px;
            animation-delay: -5s;
        }

        .floating-shape:nth-child(3) {
            bottom: 20%;
            left: 20%;
            width: 60px;
            height: 60px;
            background: var(--success);
            transform: rotate(45deg);
            animation-delay: -10s;
        }

        .floating-shape:nth-child(4) {
            top: 40%;
            right: 30%;
            width: 100px;
            height: 100px;
            background: linear-gradient(45deg, var(--primary), var(--primary-light));
            border-radius: 30px;
            animation-delay: -15s;
        }

        @keyframes float {
            0% { transform: translateY(0px) rotate(0deg); }
            33% { transform: translateY(-30px) rotate(120deg); }
            66% { transform: translateY(20px) rotate(240deg); }
            100% { transform: translateY(0px) rotate(360deg); }
        }

        /* Register Container */
        .register-container {
            width: 100%;
            max-width: 500px;
            padding: 20px;
            animation: slideInUp 0.8s ease-out;
        }

        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(50px) scale(0.9);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        /* Glass Morphism Card */
        .register-card {
            background: var(--card-bg);
            backdrop-filter: blur(20px);
            border: 1px solid var(--border);
            border-radius: 24px;
            padding: 2.5rem;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.25);
            position: relative;
            overflow: hidden;
        }

        .register-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--primary-light), transparent);
            opacity: 0.5;
        }

        /* Brand Section */
        .brand-section {
            text-align: center;
            margin-bottom: 2rem;
            animation: fadeInDown 1s ease-out 0.3s both;
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .brand-logo {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, var(--success), #059669);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            font-size: 1.5rem;
            color: white;
            box-shadow: 0 10px 25px rgba(16, 185, 129, 0.3);
        }

        .brand-title {
            font-size: 1.875rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
        }

        .brand-subtitle {
            color: var(--text-secondary);
            font-size: 0.875rem;
        }

        /* Form Styles */
        .register-form {
            animation: fadeInUp 1s ease-out 0.5s both;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form-group {
            margin-bottom: 1.5rem;
            position: relative;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        .form-input, .form-select, .form-textarea {
            width: 100%;
            padding: 1rem 1rem 1rem 3rem;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid var(--border);
            border-radius: 12px;
            color: var(--text-primary);
            font-size: 1rem;
            transition: all 0.3s ease;
            outline: none;
            font-family: 'Inter', system-ui, sans-serif;
        }

        .form-textarea {
            resize: vertical;
            min-height: 80px;
        }

        .form-input::placeholder, .form-select option {
            color: rgba(255, 255, 255, 0.6);
        }

        .form-select {
            cursor: pointer;
        }

        .form-select option {
            background: var(--background);
            color: var(--text-primary);
        }

        .form-input:focus, .form-select:focus, .form-textarea:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
            background: rgba(255, 255, 255, 0.15);
        }

        .form-input.error, .form-select.error, .form-textarea.error {
            border-color: var(--error);
            animation: shake 0.5s ease-in-out;
        }

        .form-input.success, .form-select.success, .form-textarea.success {
            border-color: var(--success);
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }

        .input-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-secondary);
            transition: color 0.3s ease;
            z-index: 1;
        }

        .form-input:focus + .input-icon,
        .form-select:focus + .input-icon,
        .form-textarea:focus + .input-icon {
            color: var(--primary);
        }

        /* File Input Styling */
        .file-input-wrapper {
            position: relative;
            overflow: hidden;
            display: inline-block;
            width: 100%;
        }

        .file-input {
            position: absolute;
            left: -9999px;
        }

        .file-input-label {
            display: flex;
            align-items: center;
            padding: 1rem 1rem 1rem 3rem;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid var(--border);
            border-radius: 12px;
            color: var(--text-secondary);
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
        }

        .file-input-label:hover {
            background: rgba(255, 255, 255, 0.15);
            border-color: var(--primary);
        }

        .file-input-text {
            flex: 1;
        }

        .file-input-icon {
            margin-left: auto;
            color: var(--primary);
        }

        /* Password Input Enhancements */
        .password-group {
            position: relative;
        }

        .password-toggle {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: var(--text-secondary);
            cursor: pointer;
            padding: 0.25rem;
            border-radius: 4px;
            transition: all 0.3s ease;
            z-index: 2;
        }

        .password-toggle:hover {
            color: var(--primary);
            background: rgba(255, 255, 255, 0.1);
        }

        .password-strength {
            margin-top: 0.5rem;
            height: 4px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 2px;
            overflow: hidden;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .password-strength.visible {
            opacity: 1;
        }

        .strength-bar {
            height: 100%;
            border-radius: 2px;
            transition: all 0.3s ease;
            width: 0%;
        }

        .strength-bar.weak { background: var(--error); width: 33%; }
        .strength-bar.medium { background: var(--warning); width: 66%; }
        .strength-bar.strong { background: var(--success); width: 100%; }

        /* Register Button */
        .register-button {
            width: 100%;
            padding: 1rem 2rem;
            background: linear-gradient(135deg, var(--success), #059669);
            border: none;
            border-radius: 12px;
            color: white;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(16, 185, 129, 0.3);
            margin-bottom: 1.5rem;
        }

        .register-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 35px rgba(16, 185, 129, 0.4);
        }

        .register-button:active {
            transform: translateY(0);
        }

        .register-button.loading {
            pointer-events: none;
        }

        .button-text {
            transition: opacity 0.3s ease;
        }

        .button-spinner {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .register-button.loading .button-text {
            opacity: 0;
        }

        .register-button.loading .button-spinner {
            opacity: 1;
        }

        .spinner {
            width: 20px;
            height: 20px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-top: 2px solid white;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Footer */
        .register-footer {
            text-align: center;
            animation: fadeInUp 1s ease-out 0.9s both;
        }

        .login-link {
            color: var(--text-secondary);
            font-size: 0.875rem;
        }

        .login-link a {
            color: var(--primary-light);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .login-link a:hover {
            color: var(--primary);
            text-decoration: underline;
        }

        /* Error Messages */
        .error-message {
            background: rgba(239, 68, 68, 0.1);
            border: 1px solid rgba(239, 68, 68, 0.3);
            color: #fca5a5;
            padding: 0.75rem 1rem;
            border-radius: 8px;
            font-size: 0.875rem;
            margin-bottom: 1rem;
            opacity: 0;
            transform: translateY(-10px);
            transition: all 0.3s ease;
        }

        .error-message.show {
            opacity: 1;
            transform: translateY(0);
        }

        /* Success Messages */
        .success-message {
            background: rgba(16, 185, 129, 0.1);
            border: 1px solid rgba(16, 185, 129, 0.3);
            color: #6ee7b7;
            padding: 0.75rem 1rem;
            border-radius: 8px;
            font-size: 0.875rem;
            margin-bottom: 1rem;
            opacity: 0;
            transform: translateY(-10px);
            transition: all 0.3s ease;
        }

        .success-message.show {
            opacity: 1;
            transform: translateY(0);
        }

        /* Helper Text */
        .helper-text {
            font-size: 0.75rem;
            color: var(--text-secondary);
            margin-top: 0.25rem;
            opacity: 0.8;
        }

        /* Responsive Design */
        @media (max-width: 640px) {
            .register-container {
                padding: 1rem;
            }

            .register-card {
                padding: 2rem 1.5rem;
            }

            .brand-title {
                font-size: 1.5rem;
            }

            .form-row {
                grid-template-columns: 1fr;
            }
        }

        /* Accessibility */
        @media (prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
            }
        }

        /* Focus styles for keyboard navigation */
        .register-button:focus,
        .form-input:focus,
        .form-select:focus,
        .form-textarea:focus,
        .file-input-label:focus,
        .login-link a:focus {
            outline: 2px solid var(--primary);
            outline-offset: 2px;
        }
    </style>
</head>
<body>
    <!-- Animated Background -->
    <div class="background-animation">
        <div class="floating-shape"></div>
        <div class="floating-shape"></div>
        <div class="floating-shape"></div>
        <div class="floating-shape"></div>
    </div>

    <!-- Register Container -->
    <div class="register-container">
        <div class="register-card">
            <!-- Brand Section -->
            <div class="brand-section">
                <div class="brand-logo">
                    <i class="fas fa-user-plus"></i>
                </div>
                <h1 class="brand-title">Create Account</h1>
                <p class="brand-subtitle">Join us and start your journey today</p>
            </div>

            <!-- Error/Success Messages -->
            <div id="error-message" class="error-message"></div>
            <div id="success-message" class="success-message"></div>

            <!-- Register Form -->
            <form class="register-form" id="register-form" enctype="multipart/form-data">
                @csrf
                
                <!-- Name Input -->
                <div class="form-group">
                    <input 
                        type="text" 
                        class="form-input" 
                        id="name" 
                        name="name" 
                        placeholder="Enter your full name"
                        required
                        autocomplete="name"
                        aria-label="Full name"
                    >
                    <i class="input-icon fas fa-user"></i>
                </div>

                <!-- Email Input -->
                <div class="form-group">
                    <input 
                        type="email" 
                        class="form-input" 
                        id="email" 
                        name="email" 
                        placeholder="Enter your email address"
                        required
                        autocomplete="email"
                        aria-label="Email address"
                    >
                    <i class="input-icon fas fa-envelope"></i>
                </div>

                <!-- Designation and Phone Row -->
                <div class="form-row">
                    <div class="form-group">
                        <input 
                            type="text" 
                            class="form-input" 
                            id="designation" 
                            name="designation" 
                            placeholder="Your designation"
                            required
                            aria-label="Designation"
                        >
                        <i class="input-icon fas fa-briefcase"></i>
                    </div>
                    <div class="form-group">
                        <input 
                            type="tel" 
                            class="form-input" 
                            id="phone_number" 
                            name="phone_number" 
                            placeholder="Phone number"
                            required
                            aria-label="Phone number"
                        >
                        <i class="input-icon fas fa-phone"></i>
                    </div>
                </div>

                <!-- Date of Birth and Role Row -->
                <div class="form-row">
                    <div class="form-group">
                        <input 
                            type="date" 
                            class="form-input" 
                            id="dob" 
                            name="dob" 
                            required
                            aria-label="Date of birth"
                        >
                        <i class="input-icon fas fa-calendar"></i>
                    </div>
                    <div class="form-group">
                        <select 
                            class="form-select" 
                            id="role_id" 
                            name="role_id" 
                            required
                            aria-label="Role"
                        >
                            <option value="">Select Role</option>
                            <option value="1">Admin</option>
                            <option value="2">Manager</option>
                            <option value="3">Employee</option>
                            <option value="4">HR</option>
                        </select>
                        <i class="input-icon fas fa-user-tag"></i>
                    </div>
                </div>

                <!-- Address Input -->
                <div class="form-group">
                    <textarea 
                        class="form-textarea" 
                        id="address" 
                        name="address" 
                        placeholder="Enter your address"
                        rows="3"
                        required
                        aria-label="Address"
                    ></textarea>
                    <i class="input-icon fas fa-map-marker-alt"></i>
                </div>

                <!-- Profile Picture Input -->
                <div class="form-group">
                    <div class="file-input-wrapper">
                        <input 
                            type="file" 
                            class="file-input" 
                            id="profile_pic" 
                            name="profile_pic" 
                            accept="image/*"
                            aria-label="Profile picture"
                        >
                        <label for="profile_pic" class="file-input-label">
                            <i class="input-icon fas fa-camera"></i>
                            <span class="file-input-text">Choose profile picture (optional)</span>
                            <i class="file-input-icon fas fa-upload"></i>
                        </label>
                    </div>
                    <div class="helper-text">Upload a profile picture (JPG, PNG, GIF)</div>
                </div>

                <!-- Password Inputs -->
                <div class="form-group">
                    <div class="password-group">
                        <input 
                            type="password" 
                            class="form-input" 
                            id="password" 
                            name="password" 
                            placeholder="Create a password"
                            required
                            autocomplete="new-password"
                            aria-label="Password"
                        >
                        <i class="input-icon fas fa-lock"></i>
                        <button type="button" class="password-toggle" id="passwordToggle" aria-label="Toggle password visibility">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                    <div class="password-strength" id="passwordStrength">
                        <div class="strength-bar" id="strengthBar"></div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="password-group">
                        <input 
                            type="password" 
                            class="form-input" 
                            id="password_confirmation" 
                            name="password_confirmation" 
                            placeholder="Confirm your password"
                            required
                            autocomplete="new-password"
                            aria-label="Confirm password"
                        >
                        <i class="input-icon fas fa-lock"></i>
                        <button type="button" class="password-toggle" id="confirmPasswordToggle" aria-label="Toggle confirm password visibility">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>

                <!-- Register Button -->
                <button type="submit" class="register-button" id="registerButton">
                    <span class="button-text">Create Account</span>
                    <div class="button-spinner">
                        <div class="spinner"></div>
                    </div>
                </button>
            </form>

            <!-- Footer -->
            <div class="register-footer">
                <p class="login-link">
                    Already have an account? <a href="{{ route('login') ?? '#' }}">Sign in</a>
                </p>
            </div>
        </div>
    </div>

    <script>
        // DOM Elements
        const registerForm = document.getElementById('register-form');
        const nameInput = document.getElementById('name');
        const emailInput = document.getElementById('email');
        const designationInput = document.getElementById('designation');
        const phoneInput = document.getElementById('phone_number');
        const dobInput = document.getElementById('dob');
        const roleSelect = document.getElementById('role_id');
        const addressInput = document.getElementById('address');
        const profilePicInput = document.getElementById('profile_pic');
        const passwordInput = document.getElementById('password');
        const confirmPasswordInput = document.getElementById('password_confirmation');
        const passwordToggle = document.getElementById('passwordToggle');
        const confirmPasswordToggle = document.getElementById('confirmPasswordToggle');
        const passwordStrength = document.getElementById('passwordStrength');
        const strengthBar = document.getElementById('strengthBar');
        const registerButton = document.getElementById('registerButton');
        const errorMessage = document.getElementById('error-message');
        const successMessage = document.getElementById('success-message');

        // Password visibility toggles
        passwordToggle.addEventListener('click', function() {
            togglePasswordVisibility(passwordInput, this);
        });

        confirmPasswordToggle.addEventListener('click', function() {
            togglePasswordVisibility(confirmPasswordInput, this);
        });

        function togglePasswordVisibility(input, button) {
            const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
            input.setAttribute('type', type);
            
            const icon = button.querySelector('i');
            icon.classList.toggle('fa-eye');
            icon.classList.toggle('fa-eye-slash');
        }

        // Password strength indicator
        passwordInput.addEventListener('input', function() {
            const password = this.value;
            const strength = calculatePasswordStrength(password);
            
            if (password.length > 0) {
                passwordStrength.classList.add('visible');
                updateStrengthBar(strength);
            } else {
                passwordStrength.classList.remove('visible');
            }
        });

        function calculatePasswordStrength(password) {
            let score = 0;
            
            if (password.length >= 8) score++;
            if (password.match(/[a-z]/)) score++;
            if (password.match(/[A-Z]/)) score++;
            if (password.match(/[0-9]/)) score++;
            if (password.match(/[^a-zA-Z0-9]/)) score++;
            
            return score;
        }

        function updateStrengthBar(strength) {
            strengthBar.className = 'strength-bar';
            
            if (strength <= 2) {
                strengthBar.classList.add('weak');
            } else if (strength <= 4) {
                strengthBar.classList.add('medium');
            } else {
                strengthBar.classList.add('strong');
            }
        }

        // File input enhancement
        profilePicInput.addEventListener('change', function() {
            const label = document.querySelector('.file-input-text');
            if (this.files && this.files[0]) {
                label.textContent = this.files[0].name;
            } else {
                label.textContent = 'Choose profile picture (optional)';
            }
        });

        // Real-time form validation
        function validateEmail(email) {
            const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(email);
        }

        function validatePhone(phone) {
            const re = /^[\+]?[1-9][\d]{0,15}$/;
            return re.test(phone.replace(/\s/g, ''));
        }

        // Input validation on blur
        emailInput.addEventListener('blur', function() {
            if (this.value && !validateEmail(this.value)) {
                this.classList.add('error');
                this.classList.remove('success');
            } else if (this.value) {
                this.classList.add('success');
                this.classList.remove('error');
            }
        });

        phoneInput.addEventListener('blur', function() {
            if (this.value && !validatePhone(this.value)) {
                this.classList.add('error');
                this.classList.remove('success');
            } else if (this.value) {
                this.classList.add('success');
                this.classList.remove('error');
            }
        });

        confirmPasswordInput.addEventListener('blur', function() {
            if (this.value && this.value !== passwordInput.value) {
                this.classList.add('error');
                this.classList.remove('success');
            } else if (this.value) {
                this.classList.add('success');
                this.classList.remove('error');
            }
        });

        // Clear validation states on input
        [nameInput, emailInput, designationInput, phoneInput, dobInput, roleSelect, addressInput, passwordInput, confirmPasswordInput].forEach(input => {
            input.addEventListener('input', function() {
                this.classList.remove('error', 'success');
            });
        });

        // Form submission with AJAX
        registerForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Clear previous messages
            hideMessages();
            
            // Validate form
            let isValid = true;
            const requiredFields = [nameInput, emailInput, designationInput, phoneInput, dobInput, roleSelect, addressInput, passwordInput, confirmPasswordInput];
            
            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    field.classList.add('error');
                    isValid = false;
                }
            });
            
            if (!validateEmail(emailInput.value)) {
                emailInput.classList.add('error');
                isValid = false;
            }
            
            if (!validatePhone(phoneInput.value)) {
                phoneInput.classList.add('error');
                isValid = false;
            }
            
            if (passwordInput.value !== confirmPasswordInput.value) {
                confirmPasswordInput.classList.add('error');
                isValid = false;
            }
            
            if (passwordInput.value.length < 8) {
                passwordInput.classList.add('error');
                isValid = false;
            }
            
            if (!isValid) {
                showError('Please fill in all fields correctly.');
                return;
            }
            
            // Show loading state
            registerButton.classList.add('loading');
            
            // Prepare form data
            var formData = new FormData(this);
            
            // AJAX request
            $.ajax({
                url: "{{ route('register') }}",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    registerButton.classList.remove('loading');
                    showSuccess('Registration successful! Redirecting to dashboard...');
                    
                    // Redirect after success message
                    setTimeout(() => {
                        window.location.href = "/dashboard";
                    }, 1500);
                },
                error: function(xhr) {
                    registerButton.classList.remove('loading');
                    let errors = xhr.responseJSON?.errors;
                    let message = xhr.responseJSON?.message || "Registration failed. Please try again.";
                    
                    if (errors) {
                        message = Object.values(errors).flat().join(' ');
                    }
                    
                    showError(message);
                }
            });
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

        // Keyboard navigation enhancement
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' && document.activeElement.tagName !== 'BUTTON' && document.activeElement.tagName !== 'TEXTAREA') {
                registerForm.dispatchEvent(new Event('submit'));
            }
        });

        // Add focus management for accessibility
        document.addEventListener('DOMContentLoaded', function() {
            nameInput.focus();
        });
    </script>
</body>
</html>
