<?php
require_once "./includes/configSession.inc.php";
require_once "./includes/signup/students/viewSignup.inc.php";
require_once "./includes/login/students/viewLogin.inc.php";
require_once "./includes/update/students/viewUpdateStudent.inc.php";
require_once "./includes/delete/students/viewDeleteStudent.inc.php";
require_once "./includes/logout/students/viewLogoutStudent.inc.php";

// require_once "./includes/dbh.inc.php";
// require_once "./includes/jobs/students/jobStudent.inc.php"; // Search view
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
        studentLoginHeader();
        studentLogin();
        loginErrors();
        ?>
    </div>

    <!-- student Signup -->
    <div>
        <?php
        studentSignup();
        viewSignupErrors();
        ?>
    </div>

    <!-- update Student -->
    <div>
        <?php
        studentUpdate();
        viewUpdateErrors();
        ?>
    </div>

    <!-- Delete -->
    <div>
        <?php
        studentDelete();
        ?>
    </div>

    <!-- Logout -->

    <div>
        <?php
        studentLogout();
        ?>
    </div>

</body>

</html>
