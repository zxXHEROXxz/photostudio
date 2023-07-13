<!DOCTYPE html>
<html>

<head>
    <title>Login and Register</title>
    <link rel="stylesheet" href="assets/css/login-register.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="login-form">
                        <h5 class="card-title">Login</h5>

                        <form action="send_otp.php" method="post">
                            <div class="form-group">
                                <label for="email-login">Email</label>
                                <input type="email" class="form-control" name="email-login" required>
                            </div>
                            <div class="form-group">
                                <label for="password-login">Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="password-login"
                                        name="password-login" required>
                                    <div class="input-group-append">
                                        <span class="password-icon" onclick="togglePassword('password-login')">
                                            <i class="fas fa-eye"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Login</button>
                        </form>

                    </div>
                    <div class="tab-pane fade" id="register-form">
                        <h5 class="card-title">Register</h5>


                        <form action="send_otp.php" method="post">

                            <div class="form-group">
                                <label for="name-register">Name</label>
                                <input type="text" class="form-control" name="name-register" required>
                            </div>
                            <div class="form-group">
                                <label for="email-register">Email</label>
                                <input type="email" class="form-control" name="email-register" required>
                            </div>
                            <div class="form-group">
                                <label for="password-register">Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="password-register"
                                        name="password-register" required>
                                    <div class="input-group-append">
                                        <span class="password-icon" onclick="togglePassword('password-register')">
                                            <i class="fas fa-eye"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="confirm-password-register">Confirm Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="confirm-password-register"
                                        name="confirm-password-register" required>
                                    <div class="input-group-append">
                                        <span class="password-icon"
                                            onclick="togglePassword('confirm-password-register')">
                                            <i class="fas fa-eye"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address-register">Address</label>
                                <input type="text" class="form-control" name="address-register" required>
                            </div>
                            <div class="form-group">
                                <label for="phone-register">Phone</label>
                                <input type="text" class="form-control" name="phone-register" required>
                            </div>

                            <button type="submit" name="register" class="btn btn-primary">Register</button>


                        </form>

                    </div>
                </div>
            </div>
            <div class="card-footer">
                <ul class="nav nav-tabs card-footer-tabs justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link active" id="login-tab" data-toggle="tab" href="#login-form">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="register-tab" data-toggle="tab" href="#register-form">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script>
        function togglePassword(inputId) {
            const passwordInput = document.getElementById(inputId);
            const passwordIcon = passwordInput.nextElementSibling.querySelector('i');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                passwordIcon.classList.remove('fa-eye');
                passwordIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                passwordIcon.classList.remove('fa-eye-slash');
                passwordIcon.classList.add('fa-eye');
            }
        }
    </script>
</body>

</html>