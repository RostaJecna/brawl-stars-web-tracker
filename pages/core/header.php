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

                    <?php
                    $hrefs = [
                        '/' => 'Home',
                        '/brawlers' => 'Brawlers'
                    ];

                    $current_page = $_SESSION['CURRENT_PAGE'];

                    foreach ($hrefs as $key => $value) {
                        $class_li = ($key === $current_page) ? 'nav-link' : 'nav-item';
                        $class_a = ($key === $current_page) ? 'link-underline-warning link-offset-2 text-white' : 'nav-link';
                        $aria_current = ($key === $current_page) ? 'aria-current="page"' : '';

                        echo <<<HTML
                            <li class="$class_li">
                                <a class="$class_a" $aria_current href="$key">$value</a>
                            </li>
                        HTML;
                    } ?>

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