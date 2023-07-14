<?php
session_start();
include 'connection.php';
include 'generate_otp.php';
include 'config.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
require 'vendor/autoload.php';

// Create an instance; passing 'true' enables exceptions
$mail = new PHPMailer(true);

// Use the SMTP Username and Password from config.php
$SMTP_user = SMTP_Username;
$SMTP_pass = SMTP_Password;

// Server settings
$mail->isSMTP(); // Send using SMTP
$mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
$mail->SMTPAuth = true; // Enable SMTP authentication
$mail->Username = $SMTP_user; // SMTP username
$mail->Password = $SMTP_pass; // SMTP password
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Enable implicit TLS encryption
$mail->Port = 465; // TCP port to connect to; use 587 if you have set 'SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS'
$mail->setFrom($SMTP_user); // Set the sender

// Send name, Email, and OTP to the database
if (isset($_POST['name-register']) && isset($_POST['email-register']) && isset($_POST['password-register']) && isset($_POST['confirm-password-register']) && isset($_POST['address-register']) && isset($_POST['phone-register'])) {
    $name = $_POST['name-register'];
    $email = $_POST['email-register'];
    $password = $_POST['password-register'];
    $confirm_password = $_POST['confirm-password-register'];
    $address = $_POST['address-register'];
    $phone = $_POST['phone-register'];
    $otp = $_SESSION['otp'];

    // Check if the email is valid
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email address'); window.location.href = 'login_reg_page.php';</script>";
        exit;
    }

    // Check if the email already exists in the database
    $emailExistsQuery = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($emailExistsQuery);
    $stmt->bindValue(1, $email, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (count($result) > 0) {
        echo "<script>alert('Email already exists'); window.location.href = 'login_reg_page.php';</script>";
        exit;
    }

    // Check if the password and confirm password match
    if ($password !== $confirm_password) {
        echo "<script>alert('Password and Confirm Password do not match'); window.location.href = 'login_reg_page.php';</script>";
        exit;
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Set session verified to false
    $_SESSION['verified'] = false;
    $_SESSION['email'] = $email; // Store the email in the session

    echo "<script>alert('Session set')</script>";
    $sql = "INSERT INTO users (name, email, password, address, phone, otp) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(1, $name, PDO::PARAM_STR);
    $stmt->bindValue(2, $email, PDO::PARAM_STR);
    $stmt->bindValue(3, $hashed_password, PDO::PARAM_STR);
    $stmt->bindValue(4, $address, PDO::PARAM_STR);
    $stmt->bindValue(5, $phone, PDO::PARAM_STR);
    $stmt->bindValue(6, $otp, PDO::PARAM_STR);
    if ($stmt->execute()) {
        try {
            // Recipients
            $mail->addAddress($email); // Add a recipient

            // Content
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = "This is your verification code";
            $mail->Body = "Hey " . $name . ", your OTP is " . $otp . ".";

            $mail->send();
            header('location: verify_page.php');
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "Data not inserted, message not sent";
    }
} else if (isset($_POST['otp'])) {
    $otp = $_POST['otp'];
    $sql = "SELECT * FROM `users` WHERE `otp` = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(1, $otp, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (count($result) > 0) {
        // If the OTP is correct, start the session and redirect to the dashboard, set the database otp to 0
        $sql = "UPDATE `users` SET `otp` = '0' WHERE `otp` = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(1, $otp, PDO::PARAM_STR);
        if ($stmt->execute()) {
            session_start();
            // if otp is 0, the user is verified
            $_SESSION['verified'] = true;
            $_SESSION['username'] = $_POST['name-register'];
            // Redirect to the dashboard
            header('location: studio_page.php');
            exit;
        } else {
            echo "Error";
            exit;
        }
    } else {
        // Alert the user that the OTP is wrong
        echo "<script>alert('Wrong OTP'); window.location.href = 'verify_page.php';</script>";
        exit;
    }
} else if (isset($_POST['email-login'])) {
    $email = $_POST['email-login'];
    $sql = "SELECT * FROM `users` WHERE `email` = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(1, $email, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (count($result) > 0) {
        // If the email is registered, start the session and redirect to the dashboard
        session_start();
        $_SESSION['verified'] = true;
        $_SESSION['username'] = $_POST['name-register'];
        // Redirect to the dashboard
        header('location: studio_page.php');
        exit;
    } else {
        // Alert the user that the email is not registered
        echo "<script>alert('Email not registered')</script>";
    }
} else if (isset($_POST['logout'])) {
    session_start();
    session_destroy();
    header('location: login_reg_page.php');
}
?>