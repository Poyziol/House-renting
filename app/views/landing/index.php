<?php
$baseUrl = Flight::get('flight.base_url');
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real Estate Landing Page</title>
    <link rel="stylesheet" href="<?= $baseUrl; ?>/assets/framework/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= $baseUrl; ?>/assets/css/landing.css">
</head>
<body>

    <!-- Header -->
    <?php include "header.php"; ?>

    <!-- Landing Section -->
    <section class="landing-section text-center py-5 bg-light">
        <div class="container">
            <h1 class="display-4">Find Your Dream Home</h1>
            <p class="lead">Explore our listings and discover the perfect property for you.</p>
            <button class="btn btn-primary btn-lg" onclick="location.href='<?= $baseUrl; ?>/login/user'">Start Now</button>
        </div>
    </section>

    <!-- Carousel Section -->
    <section class="carousel-section py-5">
        <div class="container">
            <div id="propertyCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="<?= $baseUrl; ?>/assets/img/carousel1.jpg" class="d-block w-100" alt="Property 1">
                    </div>
                    <div class="carousel-item">
                        <img src="<?= $baseUrl; ?>/assets/img/carousel2.jpg" class="d-block w-100" alt="Property 2">
                    </div>
                    <div class="carousel-item">
                        <img src="<?= $baseUrl; ?>/assets/img/carousel3.jpg" class="d-block w-100" alt="Property 3">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#propertyCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#propertyCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="about-section text-center py-5 bg-light">
        <div class="container">
            <h2>About Us</h2>
            <p>We are committed to helping you find the perfect property. With years of experience in the real estate market, we bring you the best listings and customer service.</p>
        </div>
    </section>

    <!-- Property Listings -->
    <section class="property-listings py-5">
        <div class="container">
            <h2 class="text-center mb-4">Featured Properties</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <img src="<?= $baseUrl; ?>/assets/img/modelhouse1.jpg" class="card-img-top" alt="Property 1">
                        <div class="card-body">
                            <h5 class="card-title">Modern Apartment</h5>
                            <p class="card-text">2 Bed, 2 Bath | $300,000</p>
                            <a href="<?= $baseUrl; ?>/login/user" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="<?= $baseUrl; ?>/assets/img/modelhouse3.jpg" class="card-img-top" alt="Property 2">
                        <div class="card-body">
                            <h5 class="card-title">Luxury Villa</h5>
                            <p class="card-text">4 Bed, 3 Bath | $750,000</p>
                            <a href="<?= $baseUrl; ?>/login/user" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="<?= $baseUrl; ?>/assets/img/modelhouse2.jpg" class="card-img-top" alt="Property 3">
                        <div class="card-body">
                            <h5 class="card-title">Cozy Cottage</h5>
                            <p class="card-text">3 Bed, 2 Bath | $500,000</p>
                            <a href="<?= $baseUrl; ?>/login/user" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include "footer.html"; ?>

    <!-- Jquery -->
    <script src="<?= $baseUrl; ?>/assets/framework/js/jquery-3.7.1.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?= $baseUrl; ?>/assets/framework/js/bootstrap.bundle.min.js"></script>
    <!-- Custom Scripts -->
    <script src="<?= $baseUrl ?>/assets/js/main.js"></script>
</body>
</html>