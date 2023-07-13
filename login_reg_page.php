<!DOCTYPE html>
<html>
<head>
    <title>Login and Register</title>
    <link rel="stylesheet" href="assets/css/login-register.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="login-form">
                        <h5 class="card-title">Login</h5>
                        <form action="#" method="POST">
                            <div class="form-group">
                                <label for="email-login">Email</label>
                                <input type="email" class="form-control" id="email-login" required>
                            </div>
                            <div class="form-group">
                                <label for="password-login">Password</label>
                                <input type="password" class="form-control" id="password-login" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Login</button>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="register-form">
                        <h5 class="card-title">Register</h5>
                        <form action="#" method="POST">
                            <div class="form-group">
                                <label for="name-register">Name</label>
                                <input type="text" class="form-control" id="name-register" required>
                            </div>
                            <div class="form-group">
                                <label for="email-register">Email</label>
                                <input type="email" class="form-control" id="email-register" required>
                            </div>
                            <div class="form-group">
                                <label for="password-register">Password</label>
                                <input type="password" class="form-control" id="password-register" required>
                            </div>
                            <div class="form-group">
                                <label for="confirm-password-register">Confirm Password</label>
                                <input type="password" class="form-control" id="confirm-password-register" required>
                            </div>
                            <div class="form-group">
                                <label for="address-register">Address</label>
                                <input type="text" class="form-control" id="address-register" required>
                            </div>
                            <div class="form-group">
                                <label for="phone-register">Phone</label>
                                <input type="text" class="form-control" id="phone-register" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Register</button>
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
</body>
</html>
