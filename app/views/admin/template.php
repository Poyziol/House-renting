<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? "Dashboard" ?></title>
    <!-- Framework css -->
    <link rel="stylesheet" href="<?= $_SESSION['public'] ?>/assets/framework/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= $_SESSION['public'] ?>/assets/framework/fontawesome-free-6.7.2-web/css/all.min.css">
    <!-- Custom css -->
    <link rel="stylesheet" href="<?= $_SESSION['public'] ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?= $_SESSION['public'] ?>/assets/css/admin.css">
</head>

<body>
    <header class="fixed-top shadow">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container">
                <!-- Logo -->
                <a class="navbar-brand" href="/dashboard">
                    <?php include "./".$_SESSION['public']."layouts/logo.php"; ?>
                </a>
                <!-- Toggle Button for Mobile View -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Navbar Links -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <!-- Start -->
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/">Dashboard</a>
                        </li>
                        <li class="nav-item ms-3">
                            <button id="addGiftBtn" class="nav-link" data-bs-toggle="modal" data-bs-target="#addGiftModal">Add New gift</button>
                        </li>
                        <li class="nav-item ms-3">
                            <a class="nav-link" href="/admin/gifts">Gifts lists</a>
                        </li>
                    </ul>

                    <!-- End -->
                    <ul class="navbar-nav ms-auto d-flex gap-2 align-items-center">
                        <li class="nav-item d-flex align-items-center me-3">
                            <i class="fas fa-user text-primary me-2"></i>
                            <span class="fw-bold text-primary"> <?= $username ?></span>
                        </li>

                        <!-- Theme Switch Button -->
                        <li class="nav-item me-3">
                            <?php include "./".$_SESSION['public']."layouts/btn-theme.php"; ?>
                        </li>
                        <!-- Offcanvas Button (Always Visible) -->
                        <li class="nav-item me-3">
                            <button class="btn btn-success" type="button" data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                                <i class="fas fa-cog"></i>
                            </button>
                        </li>
                </div>
            </div>
        </nav>

        <!-- Offcanvas Navbar -->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">User Settings</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/auth/user">Login in an user account</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/auth/admin">Login as another admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/auth/logout">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <main class="vh-100 overflow-auto" style="max-height: 90vh;">
        <?php include $page . '.php' ?>
    </main>

    <footer></footer>

    <!-- Framework Scripts -->
    <script src="<?= $_SESSION['public'] ?>/assets/framework/js/jquery-3.7.1.min.js"></script>
    <script src="<?= $_SESSION['public'] ?>/assets/framework/js/bootstrap.bundle.min.js"></script>
    <!-- Custom Scripts -->
    <script src="<?= $_SESSION['public'] ?>/assets/js/main.js"></script>
    <script src="<?= $_SESSION['public'] ?>/assets/js/admin.js"></script>
</body>

</html>
</body>

</html>