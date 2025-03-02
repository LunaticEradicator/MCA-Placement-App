<!-- clear session here -->
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

        // clear session on page reload 
        // clear session after errors submit and reset session when starting server [IMP]
        if (isset($_SESSION['reSignUpData']['studentName'])) {
            unset($_SESSION["reSignUpData"]['studentName']);
        }
        if (isset($_SESSION['reSignUpData']['studentRollno'])) {
            unset($_SESSION["reSignUpData"]['studentRollno']);
        }
        if (isset($_SESSION['reSignUpData']['studentEmail'])) {
            unset($_SESSION["reSignUpData"]['studentEmail']);
        }
        if (isset($_SESSION['reSignUpData']['studentPhone'])) {
            unset($_SESSION["reSignUpData"]['studentPhone']);
        }
    } else if (isset($_GET["signup"]) &&  $_GET["signup"] === "success") {
        echo "<br>";
        echo "<p>Signup Successful</p>";
        if (isset($_SESSION["reSignUpData"])) {
            unset($_SESSION["reSignUpData"]);
        }
    }
}


function signUpForm()
{
    // Debugging: Check session values to verify if the session variables are set
    // echo '<pre>';
    // print_r($_SESSION);
    // echo '</pre>';

    // if signupErrors is there it will show empty input
    if (isset($_SESSION['reSignUpData']['studentName']) && !isset($_SESSION["signupErrors"]["duplicateUsername"])) {
        echo '<input type="text" name="studentName" id="studentName" value="' . $_SESSION['reSignUpData']['studentName'] . '">';
    } else {
        echo '<input type="text" name="studentName" id="studentName" placeholder="Enter Your Name">';
    }

    if (isset($_SESSION["reSignUpData"]["studentRollno"]) &&  !isset($_SESSION["signupErrors"]["duplicateRollno"])) {
        echo '<input type="text" name="studentRollno" value=" ' . $_SESSION["reSignUpData"]["studentRollno"] . '" placeholder="Enter Your Roll no">';
    } else {
        echo '<input type="text" name="studentRollno" placeholder="Enter Your Roll No">';
    }

    if (isset($_SESSION["reSignUpData"]["studentEmail"]) &&  !isset($_SESSION["signupErrors"]["invalidEmail"]) &&  !isset($_SESSION["signupErrors"]["duplicateEmail"])) {
        echo '<input type="text" name="studentEmail" value=" ' . $_SESSION["reSignUpData"]["studentEmail"] . '" placeholder="Enter Your Email">';
    } else {
        echo '<input type="email" name="studentEmail" placeholder="Enter Your Email">';
    }

    if (isset($_SESSION["reSignUpData"]["studentPhone"]) && !isset($_SESSION["signupErrors"]["duplicatePhone"])) {
        echo '<input type="text" name="studentPhone" value=" ' . $_SESSION["reSignUpData"]["studentPhone"] . '" placeholder="Enter Your Phone">';
    } else {
        echo '<input type="text" name="studentPhone" placeholder="Enter Your Phone No">';
    }

    echo '<input type="password" name="studentPassword" placeholder="Enter Your Password">';
}
