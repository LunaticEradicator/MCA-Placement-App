<?php
require_once "./includes/configSession.inc.php";
require_once "./includes/signup/providers/viewSignupProvider.inc.php";
require_once "./includes/login/providers/viewLoginProviders.inc.php";
require_once "./includes/update/providers/viewUpdateProvider.inc.php";
require_once "./includes/delete/providers/viewDeleteProvider.inc.php";
require_once "./includes/logout/providers/viewLogoutProvider.inc.php";
require_once "./includes/jobs/providers/viewJobProvider.inc.php";
require_once "./includes/status/providers/viewStatusProvider.inc.php";


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>
    /* Hide the number input arrows in most browsers */
    input[type="number"].no-arrows::-webkit-outer-spin-button,
    input[type="number"].no-arrows::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    input[type="number"].no-arrows {
        -moz-appearance: textfield;
        /* Firefox */
    }
</style>

<body>
    <!-- student Login -->
    <div>
        <?php
        providerLoginHeader();
        providerLogin();
        loginErrors();
        ?>
    </div>

    <!-- student Signup -->
    <div>
        <?php
        providerSignup();
        viewSignupErrors();
        ?>
    </div>

    <!-- update Student -->
    <div>
        <?php
        providerUpdate();
        viewUpdateErrors();
        ?>
    </div>

    <!-- Delete -->
    <div>
        <?php
        providerDelete();
        ?>
    </div>

    <!-- All Job Listed  -->
    <div>
        <?php
        providerJobListingsView();
        ?>
    </div>
    <!-- Student Status -->

    <div>
        <?php
        viewStudentJobStatus();
        ?>
    </div>
    <!-- Logout -->
    <div>
        <?php
        providerLogout();
        ?>
    </div>

</body>

</html>
