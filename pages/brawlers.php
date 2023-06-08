<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="/assets/css/fonts.css">
    <link rel="stylesheet" href="/assets/css/brawler.css">
    <link rel="shortcut icon" href="/assets/images/logo.svg" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="/vendor/popper/popper.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/vendor/bootstrap/extensions/my-extension.css">
    <script src="/vendor/jquery/jquery-3.7.0.min.js"></script>
    <title>Brawl Tracker | Brawlers</title>
</head>

<body class="font-lilita-one text-bg-dark" data-bs-theme="dark">

    <?php include_once 'core/header.php'; ?>

    <main class="bg-white">
        <section class="container py-5">
            <h1 class="text-center text-dark display-2 font-nougat mb-3">List of <span class="text-warning">Brawlers</span></h1>
            <div id="brawlers-container" class="bg-light mx-2 px-1 pt-3 rounded-4 row user-select-none">
                <div id="brawlers-spinner" class="d-none spinner-border text-warning mx-auto mb-3" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </section>
    </main>

    <?php include_once 'core/footer.php'; ?>

    <script src="/assets/js/utils/display-manager.js" type="module"></script>
    <script src="/assets/js/components/brawlers/brawler.js" type="module"></script>
    <script src="/assets/js/components/brawlers/brawlers.js" type="module"></script>
</body>

</html>