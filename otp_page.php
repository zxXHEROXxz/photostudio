<!DOCTYPE html>
<html>
<head>
    <title>OTP Verification</title>
    <link rel="stylesheet" href="assets/css/otp_page.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">OTP Verification</h5>
                <p class="card-text">Please enter the OTP sent to your email address.</p>
                <form action="#" method="POST">
                    <div class="form-group">
                        <input type="text" class="form-control" id="otp-input" placeholder="Enter OTP" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Verify</button>
                </form>
                <p class="resend-link">Didn't receive the OTP? <a href="#">Resend OTP</a></p>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
