<!-- clear session here -->
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
        if (isset($_SESSION['reSignUpData']['studentCgpa'])) {
            unset($_SESSION["reSignUpData"]['studentCgpa']);
        }
        if (isset($_SESSION['reSignUpData']['studentBacklogs'])) {
            unset($_SESSION["reSignUpData"]['studentBacklogs']);
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

// function studentSignup()
// {
//     echo "<div class = 'form_div'>";
//     echo "<h2>Signup Student</h2>";
//     echo '<form  class ="form-div" action="./includes/signup/students/signup.inc.php" method="POST">';
//     if (isset($_SESSION['reSignUpData']['studentName']) && !empty($_SESSION['reSignUpData']['studentName'])) {
//         echo '<input type="text" name="studentName" id="studentName" value="' . $_SESSION['reSignUpData']['studentName'] . '">';
//     } else {
//         echo '<input type="text" name="studentName" id="studentName" placeholder="Enter Your Username">';
//     }

//     if (isset($_SESSION["reSignUpData"]["studentRollno"]) && !empty($_SESSION["reSignUpData"]["studentRollno"])) {
//         echo '<input type="text" name="studentRollno" value="' . $_SESSION["reSignUpData"]["studentRollno"] . '">';
//     } else {
//         echo '<input type="text" name="studentRollno" id="studentRollno"  placeholder="Enter Your Roll No">';
//     }

//     if (isset($_SESSION["reSignUpData"]["studentEmail"]) && !empty($_SESSION["reSignUpData"]["studentEmail"])) {
//         echo '<input type="text" name="studentEmail" value="' . $_SESSION["reSignUpData"]["studentEmail"] . '" placeholder="Enter Your Email">';
//     } else {
//         echo '<input type="email" name="studentEmail" placeholder="Enter Your Email">';
//     }

//     if (isset($_SESSION["reSignUpData"]["studentPhone"]) && !empty($_SESSION["reSignUpData"]["studentPhone"])) {
//         echo '<input type="text" name="studentPhone" value="' . $_SESSION["reSignUpData"]["studentPhone"] . '">';
//     } else {
//         echo '<input type="text" name="studentPhone" id="studentPhone" placeholder="Enter Your Phone No">';
//     }

//     if (isset($_SESSION["reSignUpData"]["studentCgpa"]) && !empty($_SESSION["reSignUpData"]["studentCgpa"])) {
//         echo '<input type="number" name="studentCgpa" class="no-arrows" value="' . $_SESSION["reSignUpData"]["studentCgpa"] . '" placeholder="Enter Current CGPA" step="0.01">';
//     } else {
//         echo '<input type="number" name="studentCgpa" class="no-arrows" placeholder="Enter Current CGPA" step="0.01">';
//     }

//     if (isset($_SESSION["reSignUpData"]["studentBacklogs"]) && !empty($_SESSION["reSignUpData"]["studentBacklogs"])) {
//         echo '<input type="text" name="studentBacklogs" value="' . $_SESSION["reSignUpData"]["studentBacklogs"] . '" placeholder="Backlogs [Yes or No]">';
//     } else {
//         echo '<input type="text" name="studentBacklogs" placeholder="Backlogs [Yes or No]">';
//     }



//     echo '<input type="password" name="studentPassword" placeholder="Enter Your Password">';
//     echo '<input type="password" name="confirmPassword" placeholder="Confirm Password">';
//     echo '<button>Submit</button>';
//     echo '</form>';
//     echo "</div>";
// }

function studentSignup()
{
    echo "<div class='register_form'>";
    echo "<h2>Signup Student</h2>";

    echo '<form class="register-form" id="registrationForm" action="./includes/signup/students/signup.inc.php" method="POST" onsubmit="return validateForm()">';

    // Student Name
    $studentName = $_SESSION['reSignUpData']['studentName'] ?? '';
    echo '<input type="text" id="contactPerson" name="studentName" class="input-field" placeholder="Full Name" 
        value="' . htmlspecialchars($studentName) . '" 
        pattern="[A-Z][a-zA-Z\s]{2,49}" 
        title="First letter should be capital. Only letters and spaces allowed. Min 3 characters." 
        ><br>';

    // Email
    $studentEmail = $_SESSION['reSignUpData']['studentEmail'] ?? '';
    echo '<input type="email" id="email" name="studentEmail" class="input-field" placeholder="Email" 
        value="' . htmlspecialchars($studentEmail) . '" 
        pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" 
        title="Enter a valid email address." ><br>';

    // Phone Number
    $studentPhone = $_SESSION['reSignUpData']['studentPhone'] ?? '';
    echo '<input type="tel" id="contactNumber" name="studentPhone" class="input-field" placeholder="Contact Number" 
        value="' . htmlspecialchars($studentPhone) . '" 
        pattern="^[0-9]{10}$" 
        title="Please enter a valid 10-digit phone number" ><br>';

    // Roll No
    $studentRollno = $_SESSION['reSignUpData']['studentRollno'] ?? '';
    echo '<input type="text" id="studentRollno" name="studentRollno" class="input-field" placeholder="Enter Your Roll No" 
        value="' . htmlspecialchars($studentRollno) . '" 
        pattern="[A-Za-z0-9]{1,20}" 
        title="Alphanumeric roll number up to 20 characters." ><br>';

    // CGPA
    $studentCgpa = $_SESSION['reSignUpData']['studentCgpa'] ?? '';
    echo '<input type="number" id="studentCgpa" name="studentCgpa" class="input-field no-arrows" placeholder="Enter Current CGPA" 
        value="' . htmlspecialchars($studentCgpa) . '" 
        min="0" max="10" step="0.01" 
        title="Enter CGPA between 0.00 and 10.00" ><br>';

    // Backlogs
    $studentBacklogs = $_SESSION['reSignUpData']['studentBacklogs'] ?? '';
    echo '<input type="text" id="studentBacklogs" name="studentBacklogs" class="input-field" placeholder="Backlogs [Yes or No]" 
        value="' . htmlspecialchars($studentBacklogs) . '" 
        pattern="^(Yes|No|yes|no)$" 
        title="Only Yes or No allowed." ><br>';

    // Password
    echo '<input type="password" id="password" name="studentPassword" class="input-field" placeholder="Password" ><br>';

    // Confirm Password
    echo '<input type="password" id="confirmPassword" name="confirmPassword" class="input-field" placeholder="Confirm Password" ><br>';

    // Password Feedback UI
    echo '<button type="submit" class="submit-button">Register</button>';
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
