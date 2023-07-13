<!-- <?php
include 'connection.php';
include 'generate_otp.php';
include 'config.php';
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing 'true' enables exceptions
$mail = new PHPMailer(true);


// user the SMTP Username and Password from config.php
$SMTP_user = SMTP_Username;
$SMTP_pass = SMTP_Password;



// Get Test info from index.php
if (isset($_POST['name-register'])) {
    $nameInfo = $_POST['name-register'];

    echo "<script>alert('$nameInfo')</script>";
} else {
    echo "<script>alert('No login info')</script>";
}

//Server settings
$mail->isSMTP(); //Send using SMTP
$mail->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
$mail->SMTPAuth = true; //Enable SMTP authentication
$mail->Username = $SMTP_user; //SMTP username
$mail->Password = $SMTP_pass; //SMTP password
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
$mail->Port = 465; //TCP port to connect to; use 587 if you have set 'SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS'
$mail->setFrom($SMTP_user); //Set the sender


// Send name, Email and OTP to the database
if (isset($_POST['name-register']) && isset($_POST['email-register']) && isset($_POST['password-register']) && isset($_POST['confirm-password-register']) && isset($_POST['address-register']) && isset($_POST['phone-register'])) {
    $name = $_POST['name-register'];
    $email = $_POST['email-register'];
    $password = $_POST['password-register'];
    $confirm_password = $_POST['confirm-password-register'];
    $address = $_POST['address-register'];
    $phone = $_POST['phone-register'];
    $otp = $_SESSION['otp'];

    // set session verified to false
    $_SESSION['verified'] = false;
    echo "<script>alert('Session set')</script>";
    $sql = "INSERT INTO users (name, email, password, address, phone, otp) VALUES ('$name', '$email', '$password', '$address', '$phone', '$otp')";
    $result = mysqli_query($conn, $sql);
    // Check if the password and confirm password are same
    // if ($password == $confirm_password) {
    //     // Check if the email is already registered
    //     $sql = "SELECT * FROM 'users' WHERE 'email' = '$email'";
    // $result = mysqli_query($conn, $sql);
    // if ($result) {
    //     if (mysqli_num_rows($result) > 0) {
    //         // Alert the user that the email is already registered
    //         echo "<script>alert('Email already registered')</script>";
    //     } else {
    //         // Insert the data into the database
    //         $sql = "INSERT INTO users (name, email, password, address, phone, otp) VALUES ('$name', '$email', '$password', '$address', '$phone', '$otp')";

    //         $result = mysqli_query($conn, $sql);
    //         echo "<script>alert('Data inserted')</script>";
    //         if ($result) {
    //             // If the data is inserted, send the OTP to the user
    //             try {
    //                 //Recipients
    //                 $mail->addAddress($email); //Add a recipient
    //                 //Content
    //                 $mail->isHTML(true); //Set email format to HTML
    //                 $mail->Subject = 'OTP';
    //                 $mail->Body = 'Your OTP is ' . $otp;
    //                 $mail->send();
    //                 // Alert the user that the OTP is sent
    //                 echo "<script>alert('OTP sent')</script>";
    //                 header('location: verify.php');
    //                 echo 'Message has been sent';
    //             } catch (Exception $e) {
    //                 // Alert the user that the OTP is not sent
    //                 echo "<script>alert('OTP not sent')</script>";
    //             }
    //         } else {
    //             echo "Error";
    //         }
    //     }
    // } else {
    //     echo "Error";
    // }
    if ($result) {
        try {
            //Recipients
            $mail->addAddress($_POST['email-register']); //Add a recipient

            //Content
            $mail->isHTML(true); //Set email format to HTML
            $mail->Subject = "This is your verification code";
            $mail->Body = "Hey " . $_POST['name-register'] . ", your OTP is " . $_SESSION['otp'] . ".";

            $mail->send();
            header('location: verify_page.php');
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "Data not inserted, message not sent";
    }
} else {
    // Alert the user that the password and confirm password are not same
    echo "<script>alert('Password and Confirm Password are not same')</script>";
    echo "<script>alert('OTP not sent')</script>";
}


// user click on verify button
// if (isset($_POST['otp'])) {
//     $otp = $_POST['otp'];
//     $sql = "SELECT * FROM 'users' WHERE 'otp' = '$otp'";
//     $result = mysqli_query($conn, $sql);
//     if ($result) {
//         if (mysqli_num_rows($result) > 0) {
//             // If the OTP is correct, start the session and redirect to the dashboard, set the database otp to 0
//             $sql = "UPDATE 'users' SET 'otp' = '0' WHERE 'otp' = '$otp'";
//             $result = mysqli_query($conn, $sql);
//             if ($result) {
//                 session_start();
//                 // if otp is 0, the user is verified
//                 $_SESSION['verified'] = true;
//                 $_SESSION['username'] = $_POST['name-register'];
//                 // Redirect to the dashboard
//                 header('location: studio_page.php');
//             } else {
//                 echo "Error";
//             }
//         } else {
//             // Alert the user that the OTP is wrong
//             echo "<script>alert('Wrong OTP')</script>";
//         }
//         // } else {
//         //     echo "Error";
//         // }
//         echo "<script>alert('OTP verified')</script>";
//     }
//     echo "<script>alert('OTP sent')</script>";
// } else {
//     echo "<script>alert('OTP not sent')</script>";
//     echo "<script>alert('Session not set')</script>";
// }

if (isset($_POST['otp'])) {
    $otp = $_POST['otp'];
    $sql = "SELECT * FROM `users` WHERE `otp` = '$otp'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            // If the OTP is correct, start the session and redirect to the dashboard, set the database otp to 0
            $sql = "UPDATE `users` SET `otp` = '0' WHERE `otp` = '$otp'";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                session_start();
                // if otp is 0, the user is verified
                $_SESSION['verified'] = true;
                $_SESSION['username'] = $_POST['name-register'];
                // Redirect to the dashboard
                header('location: studio_page.php');
            } else {
                echo "Error";
            }
        } else {
            // Alert the user that the OTP is wrong
            echo "<script>alert('Wrong OTP')</script>";
        }
    } else {
        echo "Error";
    }
}

// if user email is registered in the database, redirect to dashboard
if (isset($_POST['email-login'])) {
    $email = $_POST['email-login'];
    $sql = "SELECT * FROM `users` WHERE `email` = '$email'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            // If the email is registered, start the session and redirect to the dashboard
            session_start();
            $_SESSION['verified'] = true;
            $_SESSION['username'] = $_POST['name-register'];
            // Redirect to the dashboard
            header('location: studio_page.php');
        } else {
            // Alert the user that the email is not registered
            echo "<script>alert('Email not registered')</script>";
        }
    } else {
        echo "Error";
    }
}


// user click on logout button
if (isset($_POST['logout'])) {
    session_start();
    session_destroy();
    header('location: login_reg_page.php');
}
?> -->