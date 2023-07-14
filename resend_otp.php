<?php
session_start();

// Generate a new OTP
$otp = rand(100000, 999999);
$_SESSION['otp'] = $otp;

// Send the new OTP to the user's email
include 'connection.php';
include 'config.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

$SMTP_user = SMTP_Username;
$SMTP_pass = SMTP_Password;

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = $SMTP_user;
$mail->Password = $SMTP_pass;
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
$mail->Port = 465;
$mail->setFrom($SMTP_user);

// Get the user's email from the session
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];

    try {
        // Recipients
        $mail->addAddress($email);

        // Content
        $mail->isHTML(true);
        $mail->Subject = "New OTP for verification";
        $mail->Body = "Hey, here's your new OTP: " . $otp;

        $mail->send();

        echo "<script>alert('New OTP has been sent'); window.location.href = 'verify_page.php';</script>";
        exit();
    } catch (Exception $e) {
        echo "<script>alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}'); window.location.href = 'verify_page.php';</script>";
        exit();
    }
} else {
    echo "<script>alert('Email not found in the session.'); window.location.href = 'verify_page.php';</script>";
    exit();
}
?>