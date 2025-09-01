<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PLAGIARISM DETECTION IN TEXT-BASED ASSIGNMENTS USING NATURAL LANGUAGE PROCESSING TECHNIQUE | Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --accent-color: #f8f9fa;
            --text-color: #343a40;
            --border-radius: 8px;
            --box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .login-container {
            max-width: 420px;
            width: 100%;
        }
        
        .login-card {
            border: none;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            overflow: hidden;
        }
        
        .card-header {
            background: var(--primary-color);
            color: white;
            text-align: center;
            padding: 1.5rem;
            font-weight: 600;
            font-size: 1.4rem;
        }
        
        .card-body {
            padding: 2rem;
            background-color: white;
        }
        
        .form-control {
            padding: 0.75rem 1rem;
            border-radius: var(--border-radius);
            border: 1px solid #ddd;
            transition: all 0.3s;
        }
        
        .form-control:focus {
            border-color: var(--secondary-color);
            box-shadow: 0 0 0 0.25rem rgba(52, 152, 219, 0.25);
        }
        
        .input-group-text {
            background-color: white;
            border-radius: var(--border-radius) 0 0 var(--border-radius);
        }
        
        .password-toggle {
            cursor: pointer;
            background-color: white;
            border-left: none;
            border-radius: 0 var(--border-radius) var(--border-radius) 0;
        }
        
        .btn-login {
            background-color: var(--primary-color);
            border: none;
            padding: 0.75rem;
            font-weight: 600;
            border-radius: var(--border-radius);
            transition: all 0.3s;
        }
        
        .btn-login:hover {
            background-color: #1a252f;
            transform: translateY(-2px);
        }
        
        .divider {
            display: flex;
            align-items: center;
            margin: 1.5rem 0;
        }
        
        .divider::before, .divider::after {
            content: "";
            flex: 1;
            border-bottom: 1px solid #dee2e6;
        }
        
        .divider span {
            padding: 0 1rem;
            color: #6c757d;
            font-size: 0.875rem;
        }
        
        .login-footer {
            text-align: center;
            margin-top: 1.5rem;
            font-size: 0.875rem;
            color: #6c757d;
        }
        
        .login-footer a {
            color: var(--secondary-color);
            text-decoration: none;
        }
        
        .institution-logo {
            text-align: center;
            margin-bottom: 1.5rem;
        }
        
        .logo {
            font-size: 2.5rem;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }
        
        .institution-name {
            font-weight: 600;
            color: var(--primary-color);
            font-size: 1.2rem;
        }
    </style>
    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    @stack('styles')
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 login-container">
                <div class="institution-logo">
                    <div class="logo">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <div class="institution-name">PLAGIARISM DETECTION IN TEXT-BASED ASSIGNMENTS USING NATURAL LANGUAGE PROCESSING TECHNIQUE</div>
                </div>
                
                <div class="card login-card">
                    <div class="card-header">
                        <i class="fas fa-user-tie me-2"></i>Admin Login
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.login.submit') }}">
                            @csrf 
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    <input type="email" class="form-control" value="admin@gmail.com" id="email" name="email" placeholder="Enter your email address" required autofocus>
                                </div>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-4">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                    <input type="password" class="form-control" value="12345678" id="password" name="password" placeholder="Enter your password" required>
                                    <span class="input-group-text password-toggle" id="passwordToggle">
                                        <i class="fas fa-eye"></i>
                                    </span>
                                </div>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            
                            
                            <button type="submit" class="btn btn-login w-100 py-2 text-white">
                                <i class="fas fa-sign-in-alt me-2"></i>Login to Portal
                            </button>
                            
                            <div class="divider">
                                <span>Secure Access</span>
                            </div>
                            
                            <div class="alert alert-info text-center" role="alert">
                                <small>
                                    <a href="{{ route('login') }}" class="text-black text-center" id="switch-to-register">Home Page</a></p>

                                </small>
                            </div>
                        </form>
                    </div>
                </div>
                
                <div class="login-footer">
                    <p>© 2025 Ilaro Portal. All rights reserved. <br> </p>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Toggle password visibility
        document.getElementById('passwordToggle').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const icon = this.querySelector('i');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });
    </script>
    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    
    <script>
        // Toastr configuration
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };

        // Display flash messages as toastr notifications
        @if(Session::has('success'))
            toastr.success("{{ Session::get('success') }}");
        @endif
        
        @if(Session::has('error'))
            toastr.error("{{ Session::get('error') }}");
        @endif
        
        @if(Session::has('warning'))
            toastr.warning("{{ Session::get('warning') }}");
        @endif
        
        @if(Session::has('info'))
            toastr.info("{{ Session::get('info') }}");
        @endif
    </script>
</body>
</html>