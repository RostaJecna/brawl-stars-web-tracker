<?php

if (empty($_POST["login-email"]) || empty($_POST["login-password"])) {
    header('Location: /');
    exit();
}

include_once __DIR__ . '/../../assets/php/extensions/user-manager.php';

$email = $_POST["login-email"];
$password = $_POST["login-password"];

UserManager::tryLogin($email, $password);

header('Location: /');
