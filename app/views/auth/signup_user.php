<?php
$baseUrl = Flight::get('flight.base_url');
?>

<div class="container-fluid vh-100 d-flex justify-content-center align-items-center">
    <div class="row w-75 shadow rounded overflow-hidden">
        <!-- Sign Up Section -->
        <div class="col-md-6 d-flex flex-column justify-content-center p-5">
            <h2 class="fw-bold">Create Account</h2>
            <p class="text-muted">
                Join us and experience amazing features!
            </p>
            <!-- Error message display -->
            <?php if (!empty($message)): ?>
                <div class="alert alert-secondary" role="alert">
                    <?= htmlspecialchars($message) ?>
                </div>
            <?php endif; ?>
            <form action="<?= $baseUrl ?>/login/create-user" method="POST">
                <div class="row g-3">
                    <!-- create email -->
                    <div class="col-md-12 col-12">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" id="email" name="email" class="form-control"
                                placeholder="Enter your email" required>
                        </div>
                    </div>

                    <!-- create name -->
                    <div class="col-md-6 col-12">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" id="username" name="username" class="form-control"
                                placeholder="Enter your username" required>
                        </div>
                    </div>
                    <!-- create tel -->
                    <div class="col-md-6 col-12">
                        <div class="mb-3">
                            <label for="tel" class="form-label">Phone Number</label>
                            <input type="tel" id="tel" name="tel" class="form-control"
                                placeholder="Enter your phone number" required>
                        </div>
                    </div>
                    <!-- create password -->
                    <div class="col-md-12 col-12">
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" name="password" class="form-control"
                                placeholder="Create a password" required>
                        </div>
                    </div>
                </div>
                <!-- other -->
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="agree">
                        <label for="agree" class="form-check-label">I agree to the terms</label>
                    </div>
                    <a href="<?= $baseUrl; ?>/login/user" class="text-primary text-decoration-none">Already have an
                        account?</a>
                </div>
                <!-- button confirmation -->
                <button type="submit" class="btn btn-primary w-100">SIGN UP</button>
            </form>
        </div>

        <!-- Welcome Section -->
        <div class="col-md-6 bg-primary text-white d-flex flex-column justify-content-center align-items-center p-4">
            <h1 class="fw-bold">Welcome!</h1>
            <p class="text-center mt-3">
                Start your journey with us. Create an account and enjoy exclusive benefits.
            </p>
        </div>
    </div>
</div>