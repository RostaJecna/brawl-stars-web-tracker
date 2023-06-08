<?php

if (empty($_POST["signup-email"]) || empty($_POST["signup-password"]) || empty($_POST["signup-player-tag"])) {
    header('Location: /');
    exit();
}

include_once __DIR__ . '/../../assets/php/extensions/user-manager.php';

$email = $_POST["signup-email"];
$password = $_POST["signup-password"];
$player_tag = $_POST["signup-player-tag"];

UserManager::trySignup($email, $password, $player_tag);

header('Location: /');
