<?php

// Post/Redirect/Get (PRG) pattern
// Processes the API and redirects the user to the ready data web

if (empty($_POST["player_tag"])) {
    header('Location: /');
    exit();
}

// Include custom php extension to get player data from API
include_once __DIR__ . '/../../assets/php/extensions/api-request.php';

$player = ApiRequest::getPlayerData(strtoupper($_POST["player_tag"]));

// If array has `reason` data, that player not found.
if (!empty($player["reason"])) {
    header('Location: /not-found');
    exit();
}

// Store the player data in session
$_SESSION['player_data'] = $player;

// Redirect to the result page
header('Location: /profile');
