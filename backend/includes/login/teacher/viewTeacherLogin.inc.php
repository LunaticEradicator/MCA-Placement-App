<?php

function teacherLogin()
{
    if (isset($_SESSION["teacherId"])) {
        echo "Welcome : " . $_SESSION["teacherUsername"] . " - " . $_SESSION["teacherDept"];
    }
}

function loginErrors()
{
    if (isset($_SESSION["loginErrors"])) {
        $errors = $_SESSION["loginErrors"];

        echo "<br>";
        foreach ($errors as $error) {
            echo "<p>" . $error . "</p>";
        }

        unset($_SESSION["loginErrors"]);
    } else if (isset($_GET["login"]) && $_GET["login"] === "success") {
        echo "<br>";
        echo "<p> Login Successful </p>";
    }
}
?>
