<?php

include_once 'dbc.php';
include_once 'api-request.php';

class UserManager
{
    public static function tryLogin($email, $password)
    {
        $connection = DBC::getConnection();
        $statement = $connection->prepare("SELECT id, email, `password`, tag FROM `profile` WHERE email = ?");
        $statement->bind_param("s", $email);
        $statement->execute();
        $result = $statement->get_result();
        if ($result->num_rows > 0 && $statement->num_rows <= 1) {
            $profile = $result->fetch_all()[0];
            if (password_verify($password, $profile[2])) {
                $_SESSION["profile_id"] = $profile[0];
                $_SESSION["profile_player_data"] = ApiRequest::getPlayerData($profile[3]);
                $_SESSION["profile_last_response"] = time();
                header("Location: /");
                return;
            }
        }
        $_SESSION["AUTHENTICATION_STATUS"] = "Invalid login.";
        header("Location: /");
    }

    private static function isEmailDublicate($email): bool
    {
        $connection = DBC::getConnection();
        $statement = $connection->prepare("SELECT COUNT(*) FROM `profile` WHERE email = ?");
        $statement->bind_param("s", $email);
        $statement->execute();
        $result = $statement->get_result();
        $count = $result->fetch_row()[0];

        return $count > 0;
    }

    public static function trySignup($email, $password, $player_tag)
    {
        if (!ApiRequest::isPlayerExisting($player_tag)) {
            $_SESSION["AUTHENTICATION_STATUS"] = "Failed to get the player's data. Check that his tag is written correctly.";
            header("Location: /");
            return;
        }

        $connection = DBC::getConnection();

        if (self::isEmailDublicate($email)) {
            $_SESSION["AUTHENTICATION_STATUS"] = "User with this email already exists.";
            header("Location: /");
            return;
        }

        $hashedPassword =
            password_hash($password, PASSWORD_DEFAULT);

        $statement = $connection->prepare("INSERT INTO `profile` (email, password, tag) VALUES (?, ?, ?)");
        $statement->bind_param("sss", $email, $hashedPassword, strtoupper($player_tag));

        return $statement->execute();
    }

    public static function getUserData($id)
    {
        $connection = DBC::getConnection();
        $statement = $connection->prepare("SELECT * FROM `profile` WHERE id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();

        $result = $statement->get_result();
        return $result->fetch_row();
    }
}
