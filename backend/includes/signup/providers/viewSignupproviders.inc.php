<?php
function signUpForm() {
    echo '
    <input type="text" name="providerUsername" placeholder="Enter Username" required>
    <input type="text" name="providerCompany" placeholder="Enter Company Name" required>
    <input type="email" name="providerEmail" placeholder="Enter Email" required>
    <input type="text" name="providerPhone" placeholder="Enter Phone Number" required>
    <input type="password" name="providerPassword" placeholder="Enter Password" required>
    <input type="password" name="confirmPassword" placeholder="Confirm Password" required>
    ';
}

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