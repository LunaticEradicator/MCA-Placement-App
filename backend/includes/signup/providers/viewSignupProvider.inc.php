<?php

// $providerUsername, $providerCompany, $providerEmail, $providerPassword, $providerPhone
function viewSignupErrors()
{
    if (isset($_SESSION["signupErrors"])) {
        $errors = $_SESSION["signupErrors"];
        echo "<br>";

        foreach ($errors as $error) {
            echo "<p style='color: red;'>" . $error . "</p>";
        }
        unset($_SESSION["signupErrors"]);

        // clear session on page reload 
        // clear session after errors submit and reset session when starting server [IMP]
        if (isset($_SESSION['reSignUpData']['providerUsername'])) {
            unset($_SESSION["reSignUpData"]['providerUsername']);
        }
        if (isset($_SESSION['reSignUpData']['providerCompany'])) {
            unset($_SESSION["reSignUpData"]['providerCompany']);
        }
        if (isset($_SESSION['reSignUpData']['providerEmail'])) {
            unset($_SESSION["reSignUpData"]['providerEmail']);
        }
        if (isset($_SESSION['reSignUpData']['providerPhone'])) {
            unset($_SESSION["reSignUpData"]['providerPhone']);
        }
        if (isset($_SESSION['reSignUpData']['providerPhone'])) {
            unset($_SESSION["reSignUpData"]['providerPhone']);
        }
        if (isset($_SESSION['reSignUpData']['providerPassword'])) {
            unset($_SESSION["reSignUpData"]['providerPassword']);
        }
    } else if (isset($_GET["signup"]) &&  $_GET["signup"] === "success") {
        // echo "<br>";
        echo "<p style='color: green;' id='signin-success'>Account Created Successfully.</p>";
        echo "<script>
                setTimeout(function() {
                    document.getElementById('signin-success').style.display = 'none';
                }, 2000); // Hide after 2 seconds
              </script>";
        if (isset($_SESSION["reSignUpData"])) {
            unset($_SESSION["reSignUpData"]);
        }
    }
}

// $providerUsername, $providerCompany, $providerEmail, $providerPassword, $providerPhone
function providerSignup()
{
    echo "<div class='register_form'>";
    echo "<h2>Signup Provider</h2>";
    echo '<form class="register-form" action="./includes/signup/providers/signupProvider.inc.php" method="POST">';

    // Provider Username
    $providerUsername = $_SESSION['reSignUpData']['providerUsername'] ?? '';
    echo '<input type="text" name="providerUsername" id="providerUsername" class="input-field" placeholder="Enter Your Username"
        value="' . htmlspecialchars($providerUsername) . '"
        pattern="[A-Z][a-zA-Z\s]{2,49}"
        title="First letter should be capital. Only letters and spaces allowed. Min 3 characters."><br>';

    // Provider Company
    $providerCompany = $_SESSION["reSignUpData"]["providerCompany"] ?? '';
    echo '<input type="text" name="providerCompany" id="providerCompany" class="input-field" placeholder="Enter Company Name"
        value="' . htmlspecialchars($providerCompany) . '"
        pattern="[A-Za-z0-9\s]{3,100}"
        title="Only letters, numbers, and spaces allowed. Min 3 characters."><br>';

    // Provider Email
    $providerEmail = $_SESSION["reSignUpData"]["providerEmail"] ?? '';
    echo '<input type="email" name="providerEmail" id="providerEmail" class="input-field" placeholder="Enter Your Email"
        value="' . htmlspecialchars($providerEmail) . '"
        pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
        title="Enter a valid email address."><br>';

    // Provider Phone
    $providerPhone = $_SESSION["reSignUpData"]["providerPhone"] ?? '';
    echo '<input type="tel" name="providerPhone" id="providerPhone" class="input-field no-arrows" placeholder="Enter Phone Number"
        value="' . htmlspecialchars($providerPhone) . '"
        pattern="^[0-9]{10}$"
        title="Please enter a valid 10-digit phone number"><br>';

    // Provider Password
    echo '<input type="password" name="providerPassword" id="providerPassword" class="input-field" placeholder="Enter Your Password"><br>';

    // Confirm Password
    echo '<input type="password" name="confirmPassword" id="confirmProviderPassword" class="input-field" placeholder="Confirm Password"><br>';

    echo '<button type="submit" class="submit-button">Submit</button>';
    echo '</form>';
    echo "</div>";
}

?>

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
