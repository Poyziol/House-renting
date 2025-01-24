<?php
$baseUrl = Flight::get('flight.base_url');
?>

<div class="container-fluid vh-100 d-flex justify-content-center align-items-center">
    <div class="row w-75 shadow rounded overflow-hidden">
        <!-- Welcome Section -->
        <div class="col-md-6 bg-primary text-white d-flex flex-column justify-content-center align-items-center p-4">
            <h1 class="fw-bold" data-translate="welcome_back">Welcome Back</h1>
            <p class="text-center mt-3" data-translate="welcome_back_description">
                Nice to see you again. Please log in or create an account to continue.
            </p>
        </div>

        <!-- Login Section -->
        <div class="col-md-6 d-flex flex-column justify-content-center p-5">
            <h2 class="fw-bold" data-translate="login_account">Login Account</h2>
            <p class="text-muted" data-translate="login_description">
                <!-- Add things here + the json file -->
            </p>
            <!-- Error message display -->
            <?php if (!empty($message)): ?>
                <div class="alert alert-secondary" role="alert">
                    <?= htmlspecialchars($message) ?>
                </div>
            <?php endif; ?>
            <form action="<?= $baseUrl ?>/login/check-user" method="POST">
                <!-- email registration -->
                <div class="mb-3">
                    <label for="email" class="form-label" data-translate="email_label">Email ID</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email"
                        required>
                </div>
                <!-- password registration -->
                <div class="mb-3">
                    <label for="password" class="form-label" data-translate="password_label">Password</label>
                    <input type="password" id="password" name="password" class="form-control"
                        placeholder="Enter your password" required>
                </div>
                <!-- other -->
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="remember-me">
                        <label for="remember-me" class="form-check-label" data-translate="keep_signed_in">Keep me signed in</label>
                    </div>
                    <a href="<?= $baseUrl; ?>/login/sign-up" class="text-primary text-decoration-none" data-translate="dont_have_account">Don't have an Account?</a>
                </div>
                <!-- button confirmation -->
                <button type="submit" class="btn btn-primary w-100" data-translate="login_button">SIGN IN</button>
            </form>
        </div>
    </div>
</div>