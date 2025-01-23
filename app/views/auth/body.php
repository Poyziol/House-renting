<!DOCTYPE html>
    <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Real Estate Login</title>
            <link rel="stylesheet" href="<?= $page ?>.css"> <!-- Optimise change of the Css -->
        </head>

        <body>
    
            <!-- header -->
            <?php include "header.html"; ?>
    
            <!-- section -->
            <section class="login-section">
                <?php include($page . '.php'); ?> <!-- Optimise change of the Page -->
            </section>
    
            <!-- footer -->
            <?php include "footer.html"; ?>
    
        </body>

</html>