<?php

function displaySignupErrors()
{
    if (isset($_SESSION["signupErrors"])) {
        echo "<br>";
        foreach ($_SESSION["signupErrors"] as $error) {
            echo "<p style='color: red;'>" . $error . "</p>";
        }
        unset($_SESSION["signupErrors"]);
    } elseif (isset($_GET["signup"]) && $_GET["signup"] === "success") {
        echo "<br><p style='color: green;'>Signup Successful</p>";
    }
}
