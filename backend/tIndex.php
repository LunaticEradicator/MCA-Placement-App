<?php
require_once "./includes/configSession.inc.php";
require_once "./includes/login/teachers/viewLoginTeacher.inc.php";
require_once "./includes/signup/teachers/viewSignupTeacher.inc.php";
require_once "./includes/update/teachers/viewUpdateTeacher.inc.php";
require_once "./includes/delete/teachers/viewDeleteTeacher.inc.php";
require_once "./includes/logout/teachers/viewLogoutTeacher.inc.php";

// require_once "./includes/jobs/providers/viewJobProvider.inc.php";
// require_once "./includes/status/providers/viewStatusProvider.inc.php";

// feature
require_once "./includes/view/teachers/ctrlViewTeacher.inc.php";
require_once "./includes/jobs/teachers/ctrlJobTeachers.inc.php";
require_once "./includes/status/teachers/viewStatusTeacher.inc.php";

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
        teacherLoginHeader();
        teacherLogin();
        loginErrors();
        ?>
    </div>

    <!-- student Signup -->
    <div>
        <?php
        teacherSignup();
        viewSignupErrors();
        ?>
    </div>

    <!-- update Student -->
    <div>
        <?php
        teacherUpdate();
        viewUpdateErrors();
        ?>
    </div>

    <!-- Delete -->
    <div>
        <?php
        teacherDelete();
        ?>
    </div>

    <!-- All Students  -->
    <div>
        <?php
        handleViewAllStudents();
        ?>
    </div>

    <!-- All Job Offers -->
    <div>
        <?php
        handleViewAllJobOffersForTeacher();
        ?>
    </div>

    <!-- All Student Status -->
    <div>
        <?php
        viewAllStudentJobStatusesForTeacher();
        ?>
    </div>

    <!-- Logout -->
    <div>
        <?php
        teacherLogout();
        ?>
    </div>

</body>

</html>
