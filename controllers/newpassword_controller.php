<?php



error_reporting(E_ALL);
ini_set('display_errors', 1);
//include("./../db.inc.php");

if (isset($_POST["newPassword"])) {
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
    $passwordRepeat = filter_input(INPUT_POST, "password-repeat", FILTER_SANITIZE_SPECIAL_CHARS);

    $selector = $_POST["selector"];
    $validator = hex2bin($_POST["validator"]);
    $actualDate = date("U");
    if (empty($password) || empty($passwordRepeat)) {
        echo "password is empty";
        exit;
    } else if ($password !== $passwordRepeat) {
        echo "the passwords is not the same";
        exit;
    }

    $sql = "SELECT * FROM passwordRecovery WHERE pwd_reset_selector= ?";
    $stmt = mysqli_stmt_init($db);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "s", $selector);
    mysqli_stmt_execute($stmt);

    $res = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($res)) {
        $hashedValidator = $row["pwd_reset_token"];
        $expiresDate = $row["pwd_reset_expires"];
    } else {
        echo "No matching record found";
    }

    $hashedValidator = $row["pwd_reset_token"];
    $expiresDate = $row["pwd_reset_expires"];
    if (!password_verify($validator, $hashedValidator) && $actualDate <= $expiresDate) {
        header("Location: index.php?page=newpassword");
    } else {
        $user_email = $row["pwd_reset_email"];
        $newHashedPsswd = password_hash($password, PASSWORD_DEFAULT);
        $sql = "UPDATE user SET password=? WHERE email='$user_email'";
        $stmt = mysqli_stmt_init($db);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "There is an error";
        } else {
            mysqli_stmt_bind_param($stmt, "s", $newHashedPsswd);
            mysqli_stmt_execute($stmt);
            $sql = "DELETE FROM passwordRecovery WHERE pwd_reset_email='$user_email'";
            $stmt = mysqli_stmt_init($db);
            mysqli_stmt_prepare($stmt, $sql);
            mysqli_stmt_execute($stmt);
        }
    }
    mysqli_stmt_close($stmt);
    header("Location: index.php?page=authentif");
}