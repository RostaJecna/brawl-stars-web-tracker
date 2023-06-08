<?php

if (isset($_SESSION['player_data'])) {
    $player = $_SESSION['player_data'];
    unset($_SESSION['player_data']);
} else if (isset($_SESSION['profile_id'])) {
    if (empty($_SESSION['profile_player_data']["reason"])) {
        $player = $_SESSION['profile_player_data'];
    } else {
        header('Location: /not-found');
    }
} else {
    header('Location: /');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/fonts.css">
    <link rel="shortcut icon" href="/assets/images/logo.svg" type="image/x-icon">
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="/vendor/popper/popper.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="vendor/bootstrap/extensions/my-extension.css">
    <title>Profile | <?php echo $player['name']; ?></title>
</head>

<body class="font-lilita-one text-bg-dark" data-bs-theme="dark">

    <?php include_once 'core/header.php'; ?>

    <main class="bg-light py-5 px-3">
        <section class="d-flex justify-content-center mb-5">
            <div class="bg-dark p-4 rounded-5 shadow-lg text-center" style="width: 350px">
                <img class="rounded-4 user-select-none" src="https://cdn-old.brawlify.com/profile/<?php echo $player['iconId']; ?>.png" height="128px" alt="player_icon.png">
                <div>
                    <h1 class="mt-3 mb-0 text-break" style="color: #<?php echo $player['nameColor']; ?>;"><?php echo $player['name']; ?></h1>
                    <h4 class="text-secondary"><?php echo $player['tag']; ?></h4>
                </div>
            </div>
        </section>
        <section class="d-flex justify-content-center mb-5 user-select-none">
            <div class="d-flex flex-column text-dark p-4 shadow-lg rounded-5" style="width: 500px">
                <h1 class="text-capitalize text-center">General info</h1>
                <hr>
                <div class="d-flex justify-content-between px-2">
                    <div class="d-flex me-2">
                        <img class="me-2" src="https://cdn-old.brawlify.com/icon/trophy.png" height="32px" alt="trophy.png">
                        <h3>Trophies</h3>
                    </div>
                    <h3><?php echo $player['trophies']; ?></h3>
                </div>
                <hr>
                <div class="d-flex justify-content-between px-2">
                    <div class="d-flex me-2">
                        <img class="me-2" src="https://cdn-old.brawlify.com/icon/Ranking.png" height="32px" alt="trophy.png">
                        <h3>Highest Trophies</h3>
                    </div>
                    <h3><?php echo $player['highestTrophies']; ?></h3>
                </div>
                <hr>
                <div class="d-flex justify-content-between px-2">
                    <div class="d-flex me-2">
                        <img class="me-2" src="https://cdn-old.brawlify.com/icon/Info.png" height="32px" alt="trophy.png">
                        <h3>Level</h3>
                    </div>
                    <h3><?php echo $player['expLevel']; ?></h3>
                </div>
                <hr>
                <div class="d-flex justify-content-between px-2">
                    <div class="d-flex me-2">
                        <img class="me-2" src="https://cdn-old.brawlify.com/icon/Club.png" height="32px" alt="trophy.png">
                        <h3>Club</h3>
                    </div>
                    <h3><?php echo $player['club']; ?></h3>
                </div>
            </div>
        </section>
        <section class="d-flex justify-content-center user-select-none">
            <div class="d-flex flex-column text-dark p-4 shadow-lg rounded-5" style="width: 500px">
                <h1 class="text-capitalize text-center">Personal records</h1>
                <hr>

                <?php

                if (!isset($_SESSION['profile_id'])) {
                    echo '<h4 class="text-center">Please <span><a href="#" data-bs-toggle="modal" data-bs-target="#loginModal" class="link-warning link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">login</a></span> to get more info.</h4>';
                } else {
                    $stats = [
                        [
                            'imgSrc' => 'https://cdn-old.brawlify.com/icon/3v3.png',
                            'title' => '3 vs 3 Victories',
                            'value' => $player['3vs3Victories']
                        ],
                        [
                            'imgSrc' => 'https://cdn-old.brawlify.com/gamemode/Showdown.png',
                            'title' => 'Solo Victories',
                            'value' => $player['soloVictories']
                        ],
                        [
                            'imgSrc' => 'https://cdn-old.brawlify.com/gamemode/Duo-Showdown.png',
                            'title' => 'Duo Victories',
                            'value' => $player['duoVictories']
                        ],
                        [
                            'imgSrc' => 'https://cdn-old.brawlify.com/icon/Star-Points.png',
                            'title' => 'Exp Points',
                            'value' => $player['expPoints']
                        ]
                    ];

                    foreach ($stats as $stat) {
                        echo '
                            <div class="d-flex justify-content-between px-2">
                                <div class="d-flex me-2">
                                    <img class="me-2" src="' . $stat['imgSrc'] . '" height="32px" alt="trophy.png">
                                    <h3>' . $stat['title'] . '</h3>
                                </div>
                                <h3>' . $stat['value'] . '</h3>
                            </div>
                            <hr>
                        ';
                    }
                }

                ?>

            </div>
        </section>
    </main>

    <?php include_once 'core/footer.php'; ?>

</body>

</html>