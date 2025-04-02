<?php
function providerLoginMessage() {
    if (isset($_SESSION["providerId"])) {
        echo "Welcome: " . htmlspecialchars($_SESSION["providerUsername"]) . " - " . htmlspecialchars($_SESSION["providerCompany"]);
    }
}

function displayLoginErrors() {
    if (isset($_SESSION["loginErrors"])) {
        foreach ($_SESSION["loginErrors"] as $error) {
            echo "<p style='color: red;'>" . htmlspecialchars($error) . "</p>";
        }
        unset($_SESSION["loginErrors"]);
    } elseif (isset($_GET["login"]) && $_GET["login"] === "success") {
        echo "<p style='color: green;'>Login Successful</p>";
    }
}
