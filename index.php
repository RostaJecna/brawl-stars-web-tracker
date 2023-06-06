<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="/assets/css/fonts.css">
    <link rel="stylesheet" href="/assets/css/game-event.css">
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="/vendor/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="vendor/bootstrap/extensions/my-extension.css">
    <script src="/vendor/jquery/jquery-3.7.0.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brawl Tracker</title>
</head>

<body class="font-lilita-one text-bg-dark" data-bs-theme="dark">
    <header class="bg-dark user-select-none sticky-top" data-bs-theme="dark">
        <nav class="navbar navbar-expand-lg shadow-lg">
            <div class="container">
                <a href="/" class="d-flex align-items-center link-body-emphasis text-decoration-none">
                    <img class="bi" width="32" height="32" alt="logo.svg" src="/assets/images/logo.svg">
                    <span class="fs-4 p-2 font-nougat">Brawl Tracker</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarColor01">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-link">
                            <a class="link-underline-warning link-offset-2 text-white" aria-current="page" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/pages/brawlers.html">Brawlers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/">About Web</a>
                        </li>
                    </ul>
                    <div class="d-flex">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#loginModal" class="link-body-emphasis link-offset-2 link-underline-opacity-25 link-underline-opacity-75-hover me-3 my-auto">Login
                        </a>
                        <a class="btn btn-outline-warning action-button" role="button" href="#" data-bs-toggle="modal" data-bs-target="#signupModal">Sign Up</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <main class="bg-white">
        <section class="bg-dark py-5 shadow-lg">
            <div class="container">
                <div class="row px-4">
                    <div class="col-md-5">
                        <h1 class="font-nougat">
                            Track. Analyze. Improve.
                        </h1>
                        <p class="fs-5 text-secondary">
                            We give you the ability to track your progress, gain valuable insights and improve your
                            skills.
                        </p>
                        <form class="mb-3 user-select-none">
                            <label for="player-tag-input" class="form-label">Try It Out</label>
                            <div class="input-group">
                                <span class="input-group-text text-bg-warning" id="basic-addon3">#</span>
                                <input type="text" class="form-control focus-ring focus-ring-warning focus-border-warning" id="player-tag-input" placeholder="Player Tag" aria-label="Player Tag" aria-describedby="basic-addon4" required>
                                <button class="btn btn-outline-warning" type="submit" id="button-addon2">Get</button>
                            </div>
                            <div class="form-text" id="basic-addon4">
                                <a href="#" class="link-body-emphasis link-offset-2 link-opacity-75 link-underline-opacity-0 link-underline-opacity-100-hover me-3">Where
                                    can I find my tag?</a>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-7 my-4 my-md-0 d-flex justify-content-center align-items-center user-select-none">
                        <div class="text-center text-uppercase text-body-tertiary">
                            <h1 class="m-0">Your profile</h1>
                            <h5 class="m-0">Will be displayed here</h5>
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
    <footer class="pt-3 user-select-none">
        <div class="container">
            <div class="d-flex flex-wrap justify-content-between align-items-center py-3 border-top">
                <div class="col-md-4 d-flex align-items-center">
                    <a href="/" class="mb-3 me-2 mb-md-0 text-body-secondary text-decoration-none lh-1">
                        <img class="bi" width="32" height="32" alt="logo.svg" src="/assets/images/logo.svg">
                    </a>
                    <span class="mb-3 mb-md-0 text-body-secondary">© 2023 Rostyslav Levder</span>
                </div>

                <div class="col-md-4 justify-content-end d-flex me-2 mb-3 mb-md-0">
                    <a href="https://github.com/RostaJecna"><img class="bi" width="32" height="32" src="/assets/images/icons/github.svg" alt="github.svg"></a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Login Modal -->
    <div class="modal fade user-select-none" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-nougat" id="loginModalLabel">Login</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="loginForm">
                        <div class="mb-3">
                            <label for="login-email" class="form-label">Email</label>
                            <input type="email" class="form-control focus-ring focus-ring-warning focus-border-warning font-nanum-gothic" id="login-email" name="login-email" placeholder="Enter your email" required>
                        </div>
                        <div class="mb-4">
                            <label for="login-password" class="form-label">Password</label>
                            <input type="password" class="form-control focus-ring focus-ring-warning focus-border-warning font-nanum-gothic" id="login-password" name="login-password" placeholder="Enter your password" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-warning">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Signup Modal -->
    <div class="modal fade user-select-none" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-nougat" id="signupModalLabel">Sign Up</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="signupForm">
                        <div class="mb-3">
                            <label for="signup-email" class="form-label">Email</label>
                            <input type="email" class="form-control focus-ring focus-ring-warning focus-border-warning font-nanum-gothic" id="signup-email" name="signup-email" placeholder="Enter your email" required>
                        </div>
                        <div class="mb-3">
                            <label for="signup-password" class="form-label">Password</label>
                            <input type="password" class="form-control focus-ring focus-ring-warning focus-border-warning font-nanum-gothic" id="signup-password" name="signup-password" placeholder="Enter your password" required>
                        </div>
                        <div class="mb-2">
                            <label for="signup-player-tag" class="form-label">Player Tag</label>
                            <div class="input-group">
                                <span class="input-group-text text-bg-warning">#</span>
                                <input type="text" class="form-control focus-ring focus-ring-warning focus-border-warning font-nanum-gothic" id="signup-player-tag" name="signup-player-tag" placeholder="Enter your player tag" required>
                            </div>
                        </div>
                        <div class="form-text mb-2">
                            <a href="#" class="link-body-emphasis link-offset-2 link-opacity-75 link-underline-opacity-0 link-underline-opacity-100-hover me-3">Where
                                can I find my tag?</a>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-warning">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="/assets/js/utils/display-manager.js" type="module"></script>
    <script src="/assets/js/components/index/game-event.js" type="module"></script>
    <script src="/assets/js/components/index/index.js" type="module"></script>
</body>

</html>