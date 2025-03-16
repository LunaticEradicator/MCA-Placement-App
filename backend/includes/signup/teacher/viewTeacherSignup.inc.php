<?php
function viewSignupErrors()
{
    if (isset($_SESSION["signupErrors"])) {
        $errors = $_SESSION["signupErrors"];
        echo "<br>";

        foreach ($errors as $error) {
            echo "<p>" . $error . "</p>";
        }
        unset($_SESSION["signupErrors"]);

        // Clear session data on page reload
        if (isset($_SESSION['reSignUpData']['teacherName'])) {
            unset($_SESSION["reSignUpData"]['teacherName']);
        }
        if (isset($_SESSION['reSignUpData']['teacherEmail'])) {
            unset($_SESSION["reSignUpData"]['teacherEmail']);
        }
        if (isset($_SESSION['reSignUpData']['teacherPhone'])) {
            unset($_SESSION["reSignUpData"]['teacherPhone']);
        }
        if (isset($_SESSION['reSignUpData']['teacherDept'])) {
            unset($_SESSION["reSignUpData"]['teacherDept']);
        }
    } else if (isset($_GET["signup"]) && $_GET["signup"] === "success") {
        echo "<br>";
        echo "<p>Signup Successful</p>";
        if (isset($_SESSION["reSignUpData"])) {
            unset($_SESSION["reSignUpData"]);
        }
    }
}

function signUpForm()
{
    if (isset($_SESSION['reSignUpData']['teacherName']) && !isset($_SESSION["signupErrors"]["duplicateUsername"])) {
        echo '<input type="text" name="teacherName" value="' . $_SESSION['reSignUpData']['teacherName'] . '">';
    } else {
        echo '<input type="text" name="teacherName" placeholder="Enter Your Name">';
    }

    if (isset($_SESSION["reSignUpData"]["teacherEmail"]) && !isset($_SESSION["signupErrors"]["invalidEmail"]) && !isset($_SESSION["signupErrors"]["duplicateEmail"])) {
        echo '<input type="email" name="teacherEmail" value="' . $_SESSION["reSignUpData"]["teacherEmail"] . '">';
    } else {
        echo '<input type="email" name="teacherEmail" placeholder="Enter Your Email">';
    }

    if (isset($_SESSION["reSignUpData"]["teacherPhone"]) && !isset($_SESSION["signupErrors"]["duplicatePhone"])) {
        echo '<input type="text" name="teacherPhone" value="' . $_SESSION["reSignUpData"]["teacherPhone"] . '">';
    } else {
        echo '<input type="text" name="teacherPhone" placeholder="Enter Your Phone">';
    }

    echo '<input type="text" name="teacherDept" placeholder="Enter Your Department">';
    echo '<input type="password" name="teacherPassword" placeholder="Enter Your Password">';
}
?>
