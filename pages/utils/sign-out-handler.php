<?php

if (isset($_SESSION['profile_id'])) {
    session_unset();
    session_destroy();
}

header('Location: /');
