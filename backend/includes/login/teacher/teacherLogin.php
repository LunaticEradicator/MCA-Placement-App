<?php
session_start();
require_once("./viewTeacherLogin.inc.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Login</title>
</head>
<body>

    <h2>Teacher Login</h2>
    <form action="./includes/contrTeacherLogin.inc.php" method="post">
        <input type="text" name="teacherName" placeholder="Enter Username">
        <input type="password" name="teacherPassword" placeholder="Enter Password">
        <button type="submit">Login</button>
    </form>

    <?php loginErrors(); ?>

</body>
</html>
