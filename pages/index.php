<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="/assets/css/fonts.css">
    <link rel="stylesheet" href="/assets/css/game-event.css">
    <link rel="shortcut icon" href="/assets/images/logo.svg" type="image/x-icon">
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="/vendor/popper/popper.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="vendor/bootstrap/extensions/my-extension.css">
    <script src="/vendor/jquery/jquery-3.7.0.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brawl Tracker</title>
</head>

<body class="font-lilita-one text-bg-dark" data-bs-theme="dark">

    <?php include_once 'core/header.php'; ?>

    <main class="bg-white">
        <section class="bg-dark py-5 shadow-lg">
            <div class="container">
                <div class="row px-4">

                    <?php

                    if (isset($_SESSION['AUTHENTICATION_STATUS'])) {
                        $status = $_SESSION['AUTHENTICATION_STATUS'];
                        unset($_SESSION['AUTHENTICATION_STATUS']);

                        echo <<<HTML
                        <div class="alert alert-warning" role="alert" data-bs-theme="light">
                                $status
                        </div>
                        HTML;
                    }

                    ?>

                    <div class="col-md-5">
                        <h1 class="font-nougat">
                            Track. Analyze. Improve.
                        </h1>
                        <p class="fs-5 text-secondary">
                            We give you the ability to track your progress, gain valuable insights and improve your
                            skills.
                        </p>
                        <form class="mb-3 user-select-none" method="post" action="/api-handler">
                            <label for="player-tag-input" class="form-label">Try It Out</label>
                            <div class="input-group">
                                <span class="input-group-text text-bg-warning" id="basic-addon3">#</span>
                                <input type="text" class="form-control focus-ring focus-ring-warning focus-border-warning" maxlength="9" minlength="9" id="player-tag-input" placeholder="Player Tag" name="player_tag" aria-label="Player Tag" pattern="^[a-zA-Z0-9]+$" required>
                                <button class="btn btn-outline-warning" type="submit">Get</button>
                            </div>
                            <div class="form-text">
                                <a href="#" class="link-body-emphasis link-offset-2 link-opacity-75 link-underline-opacity-0 link-underline-opacity-100-hover me-3">Where
                                    can I find my tag?</a>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-7 d-flex align-items-center user-select-none">
                        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="/assets/images/backgrounds/bg-profile.png" class="d-block rounded-5 w-100" alt="bg-profile.png">
                                </div>
                                <div class="carousel-item">
                                    <img src="/assets/images/backgrounds/bg-events.png" class="d-block rounded-5 w-100" alt="bg-events.png">
                                </div>
                                <div class="carousel-item">
                                    <img src="/assets/images/backgrounds/bg-brawlers.png" class="d-block rounded-5 w-100" alt="bg-brawlers.png">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="container py-5">
            <h1 class="text-center text-dark text-capitalize display-2 font-nougat mb-3">Daily events</h1>
            <div id="game-events-container" class="bg-light mx-2 px-1 pt-3 rounded-3 row">
                <div id="game-events-spinner" class="d-none spinner-border text-warning mx-auto mb-3" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </section>
    </main>

    <?php include_once 'core/footer.php'; ?>

    <script src="/assets/js/utils/display-manager.js" type="module"></script>
    <script src="/assets/js/components/index/game-event.js" type="module"></script>
    <script src="/assets/js/components/index/index.js" type="module"></script>
</body>

</html>