<?php

function providerLoginMessage()
{
    if (isset($_SESSION["providerId"])) {
        echo "Welcome: " . $_SESSION["providerUsername"] . " - " . $_SESSION["providerCompany"];
    }
}

function displayLoginErrors()
{
    if (isset($_SESSION["loginErrors"])) {
        echo "<br>";
        foreach ($_SESSION["loginErrors"] as $error) {
            echo "<p style='color: red;'>" . $error . "</p>";
        }
        unset($_SESSION["loginErrors"]);
    } elseif (isset($_GET["login"]) && $_GET["login"] === "success") {
        echo "<br><p style='color: green;'>Login Successful</p>";
    }
}
