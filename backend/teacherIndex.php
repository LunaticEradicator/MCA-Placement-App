<?php
require_once "./includes/configSession.inc.php";
require_once "./includes/signup/teacher/viewTeacherSignup.inc.php";
require_once "./includes/login/teacher/viewTeacherLogin.inc.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard</title>
</head>

<body>

    <h1>Teacher Details</h1>
    <?php
    teacherLogin();
    ?>

    <h2>Search Teacher</h2>
    <form action="searchTeacher.php" method="POST">
        <input type="text" name="searchTeacherUsername" placeholder="Search Teacher">
        <button>Search</button>
    </form>

    <h2>Login Teacher</h2>
    <form action="./includes/login/teacherLogin.inc.php" method="POST">
        <input type="text" name="teacherName" placeholder="Enter Teacher Name">
        <input type="password" name="teacherPassword" placeholder="Enter Teacher Password">
        <button>Login</button>
        <?php
        loginErrors();
        ?>
    </form>

    <div>
        <h2>Signup Teacher User</h2>
        <form action="./includes/signup/teacherSignup.inc.php" method="POST">
            <?php
            signUpForm();
            ?>
            <button>Submit</button>
        </form>
        <div>
            <?php
            viewSignupErrors();
            ?>
        </div>
    </div>

    <h2>Update Teacher</h2>
    <form action="./includes/updateTeacher.inc.php" method="POST">
        <input type="text" name="updateTeacherUsername" placeholder="Enter New Name">
        <input type="password" name="updateTeacherPassword" placeholder="Enter New Password">
        <input type="email" name="updateTeacherEmail" placeholder="Enter New Email">
        <button>Update</button>
    </form>

    <h2>Delete Teacher</h2>
    <form action="./includes/deleteTeacher.inc.php" method="POST">
        <input type="text" name="deleteTeacherUsername" placeholder="Enter Teacher Name">
        <input type="password" name="deleteTeacherPassword" placeholder="Enter Password">
        <button>Delete</button>
    </form>

    <h2>Logout Teacher</h2>
    <form action="./includes/logout/teacherLogout.inc.php" method="POST">
        <button>Logout</button>
    </form>

</body>

</html>
