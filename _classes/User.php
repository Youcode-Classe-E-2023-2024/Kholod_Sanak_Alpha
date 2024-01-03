<?php

class User
{
    public $id;
    public $email;
    public $username;
    private $password;

    public function __construct($id)
    {
        global $db;

        $result = $db->query("SELECT * FROM user WHERE users_id = '$id'");
        $user = $result->fetch_assoc();

        $this->id = $user['users_id'];
        $this->email = $user['users_email'];
        $this->username = $user['users_username'];
        $this->password = $user['users_password'];
    }

    static function getAll()
    {
        global $db;
        $result = $db->query("SELECT * FROM user");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    function edit()
    {
        global $db;
        return $db->query("UPDATE user SET users_email = '$this->email', users_username = '$this->username' WHERE users_id = '$this->id'");
    }

    public function setPassword($pwd)
    {
        $this->password = password_hash($pwd, PASSWORD_DEFAULT);
    }

    static function CheckUser($email, $db)
    {
        $sql = "SELECT * FROM user WHERE email = ?";

        $stmt = $db->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result) {
            return $result->fetch_assoc();
        }

        return false;
    }

    static function AddUser($email, $password,$username,  $picture, $db)
    {
        $sql = "INSERT INTO user (email, password, username, picture) VALUES (?, ?, ?, ?)";
        $stmt = $db->prepare($sql);
        $stmt->bind_param( "ssss",  $email, $password, $username, $picture);
        $stmt->execute();
        $stmt->close();

    }
    static function login ($user_id) {
        $_SESSION["user_id"] = $user_id;
        $_SESSION["login"] = true;
        header('Location: ../index.php?page=dashboard');
    }
}