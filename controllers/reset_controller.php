<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;




if (isset($_POST["resetPassword"])) {
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);

    $selector = bin2hex(random_bytes(8));
    // Random 32 binary bytes
    $token = random_bytes(32);
    $expiresDate = date("U") + 1800;
    $url = "http://localhost/Kholod_Sanak_Alpha/index.php?page=newpassword&selector=" . $selector . "&validator=" . bin2hex($token);

    if (empty($email)) {
        echo "Email is empty";
    } else {
        $sql = "SELECT * FROM user WHERE email=?";
        $stmt = mysqli_stmt_init($db);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "There is an error 1 " . mysqli_error($stmt);
            exit;
        } else {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            $res = mysqli_stmt_get_result($stmt);

            if ($row = mysqli_fetch_row($res)) {
                $sql = "DELETE FROM passwordrecovery WHERE pwd_reset_email=?";
                $stmt = mysqli_stmt_init($db);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    echo "There is an error 2 ";
                    exit;
                } else {
                    mysqli_stmt_bind_param($stmt, "s", $email);
                    mysqli_stmt_execute($stmt);
                }

                // Hashing the binary token and storing it in the database
                $hashedToken = password_hash($token, PASSWORD_DEFAULT);
                $sql = "INSERT INTO passwordrecovery (pwd_reset_email, pwd_reset_selector, pwd_reset_token, pwd_reset_expires) VALUES (?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($db);
                mysqli_stmt_prepare($stmt, $sql);
                mysqli_stmt_bind_param($stmt, "ssss", $email, $selector, $hashedToken, $expiresDate);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);

                $to = $email;
                $subject = "Reset Your Password!";
                $message = "<p>Click on the link below if you are the one trying to change your password,<br>if not, please ignore this email and do not share the link below.</p>
                <p>Here is your Password reset link: <br>";
                $message .= "<a href='$url'>$url</a></p>";

                $mail = new PHPMailer(true);

                $mail->isSMTP();
                $mail->Host = "smtp.gmail.com";
                $mail->SMTPAuth = true;
                $mail->Username = "kholoud.sanak@gmail.com";
                $mail->Password = "sxyf wnyn ecko jini";
                $mail->SMTPSecure = "ssl";
                $mail->Port = 465;

                $mail->setFrom("kholoud.sanak@gmail.com");
                $mail->addAddress($to);
                $mail->isHTML(true);
                $mail->Subject = $subject;
                $mail->Body = $message;

                try {
                    $mail->send();
                    header("Location: index.php?page=newpassword");
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
            } else {
                echo "The user isn't found";
                exit;
            }
        }
    }
}
?>
