<?php

function providerLoginMessage()
{
    if (isset($_SESSION["providerId"])) {
        echo "Welcome: " . $_SESSION["providerUsername"] . " - " . $_SESSION["providerCompany"];
    }
}

function loginErrors()
{
    if (isset($_SESSION["loginErrors"])) {
        echo "<br>";
        foreach ($_SESSION["loginErrors"] as $error) {
            echo "<p style='color: red;'>" . $error . "</p>";
        }
        unset($_SESSION["loginErrors"]);
    } elseif (isset($_GET["login"]) && $_GET["login"] === "success") {
        echo "<br><p id='login-success' style='color: green;'>Login Successful</p>";
        echo "<script>
                setTimeout(function() {
                    document.getElementById('login-success').style.display = 'none';
                }, 2000); 
              </script>";
    }
}
