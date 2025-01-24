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
    <link rel="stylesheet" href="<?= $baseUrl; ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?= $baseUrl; ?>/assets/css/landing.css">
</head>

<style>
    .landing-section {
        background-image: url("<?= $baseUrl; ?>/assets/img/background.png");
        background-attachment: fixed;
    }

    .about-section {
        background-image: url("<?= $baseUrl; ?>/assets/img/background2.png");
        background-attachment: fixed;
    }
</style>

<body>
    <!-- Language Selection Modal -->
    <div class="modal fade" id="languageModal" tabindex="-1" aria-labelledby="languageModalLabel" aria-hidden="true"
        data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-transparent border-0">
                <div class="modal-body text-center">
                    <h2 class="mb-4 text-white fw-bold" data-translate="choose_language">Choose Your Language</h2>
                    <div class="d-flex justify-content-center gap-4">
                        <button class="btn btn-primary btn-lg" id="selectEnglish" data-lang="en"
                            data-translate="english_btn">English</button>
                        <button class="btn btn-success btn-lg" id="selectFrench" data-lang="fr"
                            data-translate="french_btn">Français</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Header -->
    <?php include "header.php"; ?>

    <!-- Landing Section -->
    <section class="landing-section text-center py-5 bg-light">
        <div class="container">
            <h1 class="display-4">Find Your Dream Home</h1>
            <p class="lead">Explore our listings and discover the perfect property for you.</p>
            <button class="btn btn-primary btn-lg" onclick="location.href='<?= $baseUrl; ?>/login/user'">Start
                Now</button>
        </div>
    </section>

    <!-- Carousel Section -->
    <section class="carousel-section">
        <div class="container-fluid">
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
                <button class="carousel-control-prev" type="button" data-bs-target="#propertyCarousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#propertyCarousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="about-section text-center py-5 bg-light">
        <div class="container">
            <div class="bg-dark bg-opacity-50 p-4 rounded">
                <h2 class="text-white">About Us</h2>
                <p class="text-white">We are committed to helping you find the perfect property. With years of
                    experience in the real estate market, we bring you the best listings and customer service.</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include "footer.php"; ?>

    <!-- Jquery -->
    <script src="<?= $baseUrl; ?>/assets/framework/js/jquery-3.7.1.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?= $baseUrl; ?>/assets/framework/js/bootstrap.bundle.min.js"></script>
    <!-- Custom Scripts -->
    <script src="<?= $baseUrl; ?>/assets/js/main.js"></script>
    <script src="<?= $baseUrl; ?>/assets/js/language.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const languageModal = new bootstrap.Modal(document.getElementById('languageModal'));
            const selectedLanguage = localStorage.getItem('selectedLanguage');

            if (!selectedLanguage) {
                languageModal.show();
            } else {
                document.documentElement.setAttribute('lang', selectedLanguage);
            }

            document.getElementById('selectEnglish').addEventListener('click', () => selectLanguage('en'));
            document.getElementById('selectFrench').addEventListener('click', () => selectLanguage('fr'));
        });

        function selectLanguage(lang) {
            localStorage.setItem('selectedLanguage', lang);
            document.documentElement.setAttribute('lang', lang);
            const languageModal = bootstrap.Modal.getInstance(document.getElementById('languageModal'));
            languageModal.hide();
        }
    </script>
</body>

</html>