<?php
$baseUrl = Flight::get('flight.base_url');
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

</html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real Estate Login</title>
    <link rel="stylesheet" href="<?= $baseUrl; ?>/assets/framework/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= $baseUrl; ?>/assets/css/style.css"> 
    <link rel="stylesheet" href="<?= $baseUrl; ?>/assets/css/<?= $page ?>.css"> <!-- Optimise change of the Css -->
</head>

<body>

    <!-- header -->
    <?php include "header.php"; ?>

    <!-- section -->
    <section class="login-section">
        <?php include($page . '.php'); ?> <!-- Optimise change of the Page -->
    </section>

    <!-- footer -->
    <?php include "footer.php"; ?>

    <!-- Jquery -->
    <script src="<?= $baseUrl; ?>/assets/framework/js/jquery-3.7.1.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?= $baseUrl; ?>/assets/framework/js/bootstrap.bundle.min.js"></script>
    <!-- Custom Scripts -->
    <script src="<?= $baseUrl ?>/assets/js/main.js"></script>
    <script src="<?= $baseUrl ?>/assets/js/language.js"></script>

</body>

</html>