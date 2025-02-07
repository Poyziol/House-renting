<?php
$baseUrl = Flight::get('flight.base_url');
?>

   <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Giga ImmobiliZiol</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="<?= $baseUrl; ?>/login/user">Sign in</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= $baseUrl; ?>/login/sign-up">Sign up</a></li>
                    <!-- Theme Switch Button -->
                    <li class="nav-item">
                        <?php include 'layouts/btn-theme.php'; ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>