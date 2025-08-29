<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PlagiarismGuard | NLP-Powered Plagiarism Detection</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #2c3e50;
            --secondary: #3498db;
            --accent: #e74c3c;
            --light: #ecf0f1;
            --dark: #2c3e50;
            --success: #27ae60;
            --warning: #f39c12;
            --gradient-start: #2c3e50;
            --gradient-end: #3498db;
            --card-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #e4eaf1 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 20px 0;
            color: var(--dark);
        }
        
        .auth-container {
            max-width: 1100px;
            margin: 0 auto;
            background: white;
            border-radius: 15px;
            box-shadow: var(--card-shadow);
            overflow: hidden;
        }
        
        .auth-side-panel {
            background: linear-gradient(135deg, var(--gradient-start), var(--gradient-end));
            color: white;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }
        
        .auth-side-panel::before {
            content: '';
            position: absolute;
            top: -70px;
            right: -70px;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
        }
        
        .auth-side-panel::after {
            content: '';
            position: absolute;
            bottom: -80px;
            left: -80px;
            width: 250px;
            height: 250px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
        }
        
        .auth-icon {
            font-size: 70px;
            margin-bottom: 25px;
            opacity: 0.9;
            color: white;
        }
        
        .auth-side-panel h3 {
            font-weight: 700;
            margin-bottom: 15px;
            position: relative;
            z-index: 1;
        }
        
        .auth-side-panel p {
            opacity: 0.9;
            font-size: 16px;
            position: relative;
            z-index: 1;
        }
        
        .feature-list {
            list-style: none;
            padding: 0;
            margin-top: 30px;
        }
        
        .feature-list li {
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            position: relative;
            z-index: 1;
        }
        
        .feature-list i {
            margin-right: 10px;
            font-size: 18px;
            background: rgba(255, 255, 255, 0.2);
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }
        
        .auth-form-container {
            padding: 40px;
        }
        
        .logo {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .logo h2 {
            color: var(--primary);
            font-weight: 800;
            letter-spacing: 1px;
        }
        
        .logo span {
            color: var(--secondary);
            font-weight: 700;
        }
        
        .logo .tagline {
            font-size: 14px;
            color: var(--dark);
            margin-top: 5px;
        }
        
        .form-header {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .form-header h4 {
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 10px;
        }
        
        .form-header p {
            color: var(--dark);
            opacity: 0.8;
        }
        
        .form-floating {
            margin-bottom: 20px;
        }
        
        .form-floating label {
            color: #6c757d;
        }
        
        .form-control {
            border-radius: 10px;
            padding: 16px 20px;
            border: 2px solid #e2e8f0;
            transition: var(--transition);
        }
        
        .form-control:focus {
            border-color: var(--secondary);
            box-shadow: 0 0 0 0.25rem rgba(52, 152, 219, 0.15);
        }
        
        .password-toggle {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #6c757d;
            z-index: 5;
        }
        
        .btn-primary {
            background: linear-gradient(to right, var(--gradient-start), var(--gradient-end));
            border: none;
            padding: 12px;
            border-radius: 10px;
            font-weight: 600;
            transition: var(--transition);
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(44, 62, 80, 0.3);
        }
        
        .auth-links {
            text-align: center;
            margin-top: 25px;
        }
        
        .auth-links a {
            color: var(--secondary);
            text-decoration: none;
            font-weight: 600;
            transition: var(--transition);
        }
        
        .auth-links a:hover {
            color: var(--primary);
            text-decoration: underline;
        }
        
        .role-selector {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }
        
        .role-btn {
            flex: 1;
            padding: 12px;
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            text-align: center;
            cursor: pointer;
            transition: var(--transition);
            background: white;
        }
        
        .role-btn.active {
            border-color: var(--secondary);
            background-color: rgba(52, 152, 219, 0.1);
        }
        
        .role-btn i {
            font-size: 20px;
            margin-bottom: 8px;
            color: var(--secondary);
        }
        
        .role-btn.active i {
            color: var(--primary);
        }
        
        /* Tabs for Login/Register */
        .auth-tabs {
            display: flex;
            margin-bottom: 25px;
            border-bottom: 2px solid #e2e8f0;
        }
        
        .auth-tab {
            flex: 1;
            text-align: center;
            padding: 12px;
            cursor: pointer;
            font-weight: 600;
            color: #6c757d;
            transition: var(--transition);
        }
        
        .auth-tab.active {
            color: var(--secondary);
            border-bottom: 3px solid var(--secondary);
        }
        
        .auth-form {
            display: none;
        }
        
        .auth-form.active {
            display: block;
        }
        
        /* Responsive adjustments */
        @media (max-width: 992px) {
            .auth-side-panel {
                display: none;
            }
            
            .auth-container {
                max-width: 500px;
            }
        }
        
        @media (max-width: 576px) {
            .auth-form-container {
                padding: 25px;
            }
            
            .role-selector {
                flex-direction: column;
            }
        }
    </style>
      <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!-- jQuery (required for Toastr) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Toastr JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
   
</head>
<body>
    <div class="container py-3">
        <div class="auth-container">
            
            <div class="row g-0">
                <!-- Left side panel with information -->
                <div class="col-lg-6 d-none d-lg-block">
                    <div class="auth-side-panel">
                        <div class="text-center">
                            <i class="fas fa-shield-alt auth-icon"></i>
                            <h3>Plagiarism Check</h3>
                            <p>Advanced NLP-powered plagiarism detection for academic integrity</p>
                        </div>
                        
                        <ul class="feature-list">
                            <li><i class="fas fa-search"></i> Multi-source plagiarism detection</li>
                            <li><i class="fas fa-brain"></i> AI-powered text analysis</li>
                            <li><i class="fas fa-file-alt"></i> Support for multiple document formats</li>
                            <li><i class="fas fa-chart-pie"></i> Detailed similarity reports</li>
                            <li><i class="fas fa-graduation-cap"></i> Designed for academic institutions</li>
                            <li><i class="fas fa-lock"></i> Secure and confidential</li>
                        </ul>
                        
                        <div class="mt-4">
                            <p class="text-center">Using advanced Natural Language Processing techniques to maintain academic integrity</p>
                        </div>
                    </div>
                </div>
                
                <!-- Right side with form -->
                <div class="col-lg-6">
                    
                    <div class="auth-form-container">
                        <div class="logo">
                            {{-- <p>CSRF Token: {{ csrf_token() }}</p> --}}

                            <h2>Plagiarism<span>Check</span></h2>
                            <div class="tagline">NLP-Powered Plagiarism Detection</div>
                        </div>
                        
                        <div class="auth-tabs">
                            <div class="auth-tab active" id="login-tab">Login</div>
                            <div class="auth-tab" id="register-tab">Register</div>
                        </div>
                        
                        <!-- Login Form -->
                        <div class="auth-form active" id="login-form">
                            <div class="form-header">
                                <h4>Welcome Back</h4>
                                <p>Sign in to your account to continue</p>
                            </div>
                            
                            <form method="POST" action="{{ route('login') }}">
                                @csrf 
                                
                                <!-- Email Field -->
                                <div class="form-floating">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                        id="login-email" name="email" placeholder="name@example.com" value="{{ old('email') }}" required autofocus>
                                    <label for="login-email"><i class="fas fa-envelope me-2" style="color: #3498db;"></i>Email address</label>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <!-- Password Field -->
                                <div class="form-floating position-relative">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" 
                                        id="login-password" name="password" placeholder="Password" required>
                                    <label for="login-password"><i class="fas fa-lock me-2" style="color: #3498db;"></i>Password</label>
                                    <span class="password-toggle" onclick="togglePassword('login-password', 'login-password-toggle')">
                                        <i class="fas fa-eye" id="login-password-toggle"></i>
                                    </span>
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <!-- Remember Me & Forgot Password -->
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">Remember me</label>
                                    </div>
                                    <a href="{{ route('password.request') }}" class="text-decoration-none">Forgot password?</a>
                                </div>
                                
                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-primary btn-lg w-100 mb-4">
                                    <i class="fas fa-sign-in-alt me-2"></i>Sign In
                                </button>
                            </form>
                        </div>
                        
                        <!-- Register Form -->
                        <div class="auth-form" id="register-form">
                            <div class="form-header">
                                <h4>Create Your Account</h4>
                                <p>Join educators and students in promoting academic integrity</p>
                            </div>
                            
                            
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <input type="hidden" name="role" id="roleInput" value="student">
                                
                                <!-- Name Field -->
                                <div class="form-floating">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                        id="register-name" name="name" placeholder="Full Name" value="{{ old('name') }}" required autofocus>
                                    <label for="register-name"><i class="fas fa-user me-2" style="color: #3498db;"></i>Full Name</label>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <!-- Email Field -->
                                <div class="form-floating">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                        id="register-email" name="email" placeholder="name@example.com" value="{{ old('email') }}" required>
                                    <label for="register-email"><i class="fas fa-envelope me-2" style="color: #3498db;"></i>Email address</label>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                               
                                
                                <!-- Password Field -->
                                <div class="form-floating position-relative">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" 
                                        id="register-password" name="password" placeholder="Password" required>
                                    <label for="register-password"><i class="fas fa-lock me-2" style="color: #3498db;"></i>Password</label>
                                    <span class="password-toggle" onclick="togglePassword('register-password', 'register-password-toggle')">
                                        <i class="fas fa-eye" id="register-password-toggle"></i>
                                    </span>
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <!-- Confirm Password Field -->
                                <div class="form-floating position-relative">
                                    <input type="password" class="form-control" 
                                        id="password-confirm" name="password_confirmation" placeholder="Confirm Password" required>
                                    <label for="password-confirm"><i class="fas fa-lock me-2" style="color: #3498db;"></i>Confirm Password</label>
                                    <span class="password-toggle" onclick="togglePassword('password-confirm', 'confirm-password-toggle')">
                                        <i class="fas fa-eye" id="confirm-password-toggle"></i>
                                    </span>
                                </div>
                                
                                <!-- Terms Agreement -->
                                <div class="form-check mb-4">
                                    <input class="form-check-input" type="checkbox" id="terms" required>
                                    <label class="form-check-label" for="terms">
                                        I agree to the <a href="#" class="text-decoration-none">Terms of Service</a> and <a href="#" class="text-decoration-none">Privacy Policy</a>
                                    </label>
                                </div>
                                
                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-primary btn-lg w-100 mb-4">
                                    <i class="fas fa-user-plus me-2"></i>Create Account
                                </button>
                            </form>
                        </div>
                        
                        <div class="auth-links">
                            <p id="login-link-text">Don't have an account? <a href="#" id="switch-to-register">Sign up now</a></p>
                            <p id="register-link-text" style="display: none;">Already have an account? <a href="#" id="switch-to-login">Sign in here</a></p>
                        </div>
                        <br/> 
                        <div class="d-flex justify-content-between mb-4">
                            <a href="{{ route('lecturer.login') }}" class="text-decoration-none" id="switch-to-register">Lecturer Login</a></p>
                            <a href="{{ route('admin.login') }}" class="text-decoration-none" id="switch-to-register">Admin Login</a></p>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Toggle password visibility
        function togglePassword(inputId, toggleIconId) {
            const passwordInput = document.getElementById(inputId);
            const icon = document.getElementById(toggleIconId);
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
        
        // Switch between login and register forms
        document.getElementById('switch-to-register').addEventListener('click', function(e) {
            e.preventDefault();
            document.getElementById('login-form').classList.remove('active');
            document.getElementById('register-form').classList.add('active');
            document.getElementById('login-tab').classList.remove('active');
            document.getElementById('register-tab').classList.add('active');
            document.getElementById('login-link-text').style.display = 'none';
            document.getElementById('register-link-text').style.display = 'block';
        });
        
        document.getElementById('switch-to-login').addEventListener('click', function(e) {
            e.preventDefault();
            document.getElementById('register-form').classList.remove('active');
            document.getElementById('login-form').classList.add('active');
            document.getElementById('register-tab').classList.remove('active');
            document.getElementById('login-tab').classList.add('active');
            document.getElementById('register-link-text').style.display = 'none';
            document.getElementById('login-link-text').style.display = 'block';
        });
        
        // Tab clicks
        document.getElementById('login-tab').addEventListener('click', function() {
            document.getElementById('switch-to-login').click();
        });
        
        document.getElementById('register-tab').addEventListener('click', function() {
            document.getElementById('switch-to-register').click();
        });
        
        // Role selection
        const roleButtons = document.querySelectorAll('.role-btn');
        const roleInput = document.getElementById('roleInput');
        
        roleButtons.forEach(button => {
            button.addEventListener('click', function() {
                roleButtons.forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');
                
                if (this.id === 'studentRole') {
                    roleInput.value = 'student';
                } else if (this.id === 'teacherRole') {
                    roleInput.value = 'teacher';
                } else if (this.id === 'adminRole') {
                    roleInput.value = 'admin';
                }
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize toastr with options
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "timeOut": 5000,
                "extendedTimeOut": 1000,
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            
            // Check if there are any toastr messages from PHP
            @if(Session::has('toastr'))
                @foreach(Session::get('toastr') as $toast)
                    toastr.{{ $toast['type'] }}('{{ $toast['message'] }}', '{{ $toast['title'] ?? '' }}');
                @endforeach
            @endif
        });
    </script>

    <script>
        @if(session('status'))
            $(document).ready(function() {
                toastr.success("{{ session('status') }}");
            });
        @endif
        @if(session('success'))
            $(document).ready(function() {
                toastr.success("{{ session('success') }}");
            });
        @endif
    
        @if($errors->any())
            $(document).ready(function() {
                @foreach ($errors->all() as $error)
                    toastr.error("{{ $error }}");
                @endforeach
            });
        @endif
    </script>
</body>
</html>