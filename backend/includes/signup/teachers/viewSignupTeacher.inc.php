<?php

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
        if (isset($_SESSION['reSignUpData']['teacherUsername'])) {
            unset($_SESSION["reSignUpData"]['teacherUsername']);
        }
        if (isset($_SESSION['reSignUpData']['teacherCompany'])) {
            unset($_SESSION["reSignUpData"]['teacherCompany']);
        }
        if (isset($_SESSION['reSignUpData']['teacherEmail'])) {
            unset($_SESSION["reSignUpData"]['teacherEmail']);
        }
        if (isset($_SESSION['reSignUpData']['teacherPhone'])) {
            unset($_SESSION["reSignUpData"]['teacherPhone']);
        }
        if (isset($_SESSION['reSignUpData']['teacherPhone'])) {
            unset($_SESSION["reSignUpData"]['teacherPhone']);
        }
        if (isset($_SESSION['reSignUpData']['teacherPassword'])) {
            unset($_SESSION["reSignUpData"]['teacherPassword']);
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

// $teacherUsername, $teacherEmail, $teacherPassword, $teacherPhone

// function teacherSignup()
// {
//     echo "<div>";
//     echo "<h2>Signup Teacher</h2>";
//     echo '<form action="./includes/signup/teachers/signupTeacher.inc.php" method="POST">';
//     if (isset($_SESSION['reSignUpData']['teacherUsername']) && !empty($_SESSION['reSignUpData']['teacherUsername'])) {
//         echo '<input type="text" name="teacherUsername" id="teacherUsername" value="' . $_SESSION['reSignUpData']['teacherUsername'] . '">';
//     } else {
//         echo '<input type="text" name="teacherUsername" id="teacherUsername" placeholder="Enter Your Username">';
//     }

//     if (isset($_SESSION["reSignUpData"]["teacherEmail"]) && !empty($_SESSION["reSignUpData"]["teacherEmail"])) {
//         echo '<input type="text" name="teacherEmail" value="' . $_SESSION["reSignUpData"]["teacherEmail"] . '" placeholder="Enter Your Email">';
//     } else {
//         echo '<input type="email" name="teacherEmail" placeholder="Enter Your Email">';
//     }

//     if (isset($_SESSION["reSignUpData"]["teacherPhone"]) && !empty($_SESSION["reSignUpData"]["teacherPhone"])) {
//         echo '<input type="number" name="teacherPhone" class="no-arrows" value="' . $_SESSION["reSignUpData"]["teacherPhone"] . '" placeholder="Enter Current CGPA" step="0.01">';
//     } else {
//         echo '<input type="number" name="teacherPhone" class="no-arrows" placeholder="Enter Phone Number" >';
//     }

//     echo '<input type="password" name="teacherPassword" placeholder="Enter Your Password">';
//     echo '<input type="password" name="confirmPassword" placeholder="Confirm Password">';
//     echo '<button>Submit</button>';
//     echo '</form>';
//     echo "</div>";
// }

function teacherSignup()
{
    echo "<div>";
    echo "<h2>Signup Teacher</h2>";
    echo '<form action="./includes/signup/teachers/signupTeacher.inc.php" method="POST">';

    // Teacher Username
    $teacherUsername = $_SESSION['reSignUpData']['teacherUsername'] ?? '';
    echo '<input type="text" name="teacherUsername" id="teacherUsername" class="input-field" placeholder="Enter Your Username"
        value="' . htmlspecialchars($teacherUsername) . '"
        pattern="[A-Z][a-zA-Z\s]{2,49}"
        title="First letter should be capital. Only letters and spaces allowed. Min 3 characters."><br>';

    // Teacher Email
    $teacherEmail = $_SESSION['reSignUpData']['teacherEmail'] ?? '';
    echo '<input type="email" name="teacherEmail" class="input-field" placeholder="Enter Your Email"
        value="' . htmlspecialchars($teacherEmail) . '"
        pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
        title="Enter a valid email address."><br>';

    // Teacher Phone
    $teacherPhone = $_SESSION['reSignUpData']['teacherPhone'] ?? '';
    echo '<input type="tel" name="teacherPhone" class="input-field no-arrows" placeholder="Enter Phone Number"
        value="' . htmlspecialchars($teacherPhone) . '"
        pattern="^[0-9]{10}$"
        title="Please enter a valid 10-digit phone number"><br>';

    // Password
    echo '<input type="password" name="teacherPassword" class="input-field" placeholder="Enter Your Password"><br>';

    // Confirm Password
    echo '<input type="password" name="confirmPassword" class="input-field" placeholder="Confirm Password"><br>';

    echo '<button class="submit-button">Submit</button>';
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
