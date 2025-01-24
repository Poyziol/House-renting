<?php
$baseUrl = Flight::get('flight.base_url');
?>

<div class="container-fluid vh-100 d-flex justify-content-center align-items-center">
    <div class="row w-75 shadow rounded overflow-hidden">
        <!-- Welcome Section -->
        <div class="col-md-6 bg-primary text-white d-flex flex-column justify-content-center align-items-center p-4">
            <h1 class="fw-bold">Welcome Back</h1>
            <p class="text-center mt-3">
                Nice to see you again. Please log in or create an account to continue.
            </p>
        </div>

        <!-- Login Section -->
        <div class="col-md-6 bg-white d-flex flex-column justify-content-center p-5">
            <h2 class="fw-bold text-dark">Login Account</h2>
            <p class="text-muted">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            </p>
            <form>
                <!-- email registration -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email ID</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required>
                </div>
                <!-- name registration -->
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Enter your name" required>
                </div>
                <!-- tel registration -->
                <div class="mb-3">
                    <label for="tel" class="form-label">Phone number</label>
                    <input type="number" id="tel" name="tel" class="form-control" placeholder="Enter your phnone number" required>
                </div>
                <!-- password registration -->
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password" required>
                </div>
                <!-- other -->
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="remember-me">
                        <label for="remember-me" class="form-check-label">Keep me signed in</label>
                    </div>
                    <a href="<?= $baseUrl; ?>/login/sign-up" class="text-primary text-decoration-none">Don t have an Account?</a>
                </div>
                <!-- button confirmation -->
                <button type="submit" class="btn btn-primary w-100">SIGN IN</button>
            </form>
        </div>
    </div>
</div>