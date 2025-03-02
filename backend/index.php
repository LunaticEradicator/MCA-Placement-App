<?php
require_once "./includes/configSession.inc.php";
require_once "./includes/signup/viewSignup.inc.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h2>Search User</h2>
    <form action="search.php" method="POST">
        <input type="text" name="searchUsername" placeholder="Search User">
        <button>Search</button>
    </form>
    <div>
        <h2>Signup Student User</h2>
        <form action="./includes/signup/signup.inc.php" method="POST">
            <?php
            signUpForm()
            ?>
            <!-- <input type="text" name="studentName" placeholder="Enter Your Name">
            <input type="text" name="studentRollno" placeholder="Enter Your Roll No">
            <input type="email" name="studentEmail" placeholder="Enter Your Email">
            <input type="text" name="studentPhone" placeholder="Enter Your Phone No">
            <input type="password" name="studentPassword" placeholder="Enter Your Password"> -->
            <button>Submit</button>
        </form>
        <div>
            <?php
            viewSignupErrors();
            ?>
        </div>
    </div>


    <h2>Update Users</h2>
    <form action="./includes/updateHandler.inc.php" method="POST">
        <input type="text" name="updateUsername" placeholder="Enter New Name">
        <input type="password" name="updatePassword" placeholder="Enter New Password">
        <input type="email" name="updateEmail" placeholder="Enter New Email">
        <button>Update</button>
    </form>

    <h2>Delete Users</h2>
    <form action="./includes/deleteHandler.inc.php" method="POST">
        <input type="text" name="deleteUsername" placeholder="Enter New Name">
        <input type="password" name="deletePwd" placeholder="Enter New Password">
        <button>Delete</button>
    </form>
</body>

</html>
