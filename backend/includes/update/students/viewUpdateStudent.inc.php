<?php

function viewUpdateErrors()
{
    // Check if there are any update errors stored in the session
    if (isset($_SESSION["updateErrors"])) {
        $errors = $_SESSION["updateErrors"];
        echo "<br>";

        // Loop through and display each error
        foreach ($errors as $error) {
            echo "<p style='color: red;'>" . $error . "</p>";
        }

        // Clear session errors after displaying
        unset($_SESSION["updateErrors"]);

        // Clear session data after errors are displayed
        if (isset($_SESSION['reUpdateData']['studentName'])) {
            unset($_SESSION["reUpdateData"]['studentName']);
        }
        if (isset($_SESSION['reUpdateData']['studentRollno'])) {
            unset($_SESSION["reUpdateData"]['studentRollno']);
        }
        if (isset($_SESSION['reUpdateData']['studentEmail'])) {
            unset($_SESSION["reUpdateData"]['studentEmail']);
        }
        if (isset($_SESSION['reUpdateData']['studentPhone'])) {
            unset($_SESSION["reUpdateData"]['studentPhone']);
        }
        if (isset($_SESSION['reSignUpData']['studentCgpa'])) {
            unset($_SESSION["reSignUpData"]['studentCgpa']);
        }
        if (isset($_SESSION['reSignUpData']['studentBacklogs'])) {
            unset($_SESSION["reSignUpData"]['studentBacklogs']);
        }
    } else if (isset($_GET["update"]) && $_GET["update"] === "success") {
        // echo "<p style='color: green;' id='update-success'>Profile updated successfully!</p>";
        // echo "<script>
        //             setTimeout(function() {
        //                 document.getElementById('update-success').style.display = 'none';
        //             }, 2000); // Hide after 2 seconds
        //           </script>";
    }
}

// function studentUpdate()
// {
//     if (isset($_SESSION['studentId']) && !empty($_SESSION['studentId'])) {
//         echo "<h2 style='text-align: center; color: #222; margin-top: 40px; font-size: 28px;'>Update Student Profile</h2>";
//         echo '<form action="./includes/update/students/updateStudent.inc.php" method="POST" 
//         style="max-width: 500px; margin: 30px auto; padding: 30px 35px; background: #ffffff; 
//         border-radius: 12px; box-shadow: 0 8px 20px rgba(0,0,0,0.05); display: flex; flex-direction: column;">';

//         $inputStyle = "margin-bottom: 20px; padding: 14px 16px; border: 1px solid #ddd; 
//                    border-radius: 8px; font-size: 15px; background-color: #f9f9f9;";

//         $username = $_SESSION['studentUsername'] ?? '';
//         echo '<input type="text" name="studentName" value="' . htmlspecialchars($username) . '" 
//         placeholder="Update Username" style="' . $inputStyle . '">';

//         $rollno = $_SESSION['studentRollno'] ?? '';
//         echo '<input type="text" name="studentRollno" value="' . htmlspecialchars($rollno) . '" 
//         placeholder="Update Roll No" style="' . $inputStyle . '">';

//         $email = $_SESSION['studentEmail'] ?? '';
//         echo '<input type="email" name="studentEmail" value="' . htmlspecialchars($email) . '" 
//         placeholder="Enter Your Email" style="' . $inputStyle . '">';

//         $phone = $_SESSION['studentPhone'] ?? '';
//         echo '<input type="text" name="studentPhone" value="' . htmlspecialchars($phone) . '" 
//         placeholder="Update Your Phone No" style="' . $inputStyle . '">';

//         $cgpa = $_SESSION['studentCgpa'] ?? '';
//         echo '<input type="number" name="studentCgpa" value="' . htmlspecialchars($cgpa) . '" step="0.01" 
//         placeholder="Enter Current CGPA" style="' . $inputStyle . ' -moz-appearance: textfield; appearance: textfield;" onwheel="this.blur()">';

//         $backlogs = $_SESSION['studentBacklogs'] ?? '';
//         echo '<input type="text" name="studentBacklogs" value="' . htmlspecialchars($backlogs) . '" 
//         placeholder="Backlogs [Yes or No]" style="' . $inputStyle . '">';

//         echo '<input type="password" name="studentPassword" placeholder="Update Password" 
//         style="' . $inputStyle . '">';

//         echo '<button type="submit" 
//         style="padding: 14px; background-color: #007bff; color: white; font-size: 16px; 
//         border: none; border-radius: 8px; cursor: pointer; transition: background 0.3s;">
//         Submit</button>';

//         echo '</form>';
//         echo '<style>
//     input[type=number]::-webkit-inner-spin-button,
//     input[type=number]::-webkit-outer-spin-button {
//         -webkit-appearance: none;
//         margin: 0;
//     }
// </style>';
//         if (isset($_GET['update']) && $_GET['update'] === 'success') {
//             echo '<div id="updateSuccess" style="max-width: 500px; margin: 20px auto; padding: 12px 18px; 
//         background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; 
//         border-radius: 8px; text-align: center; font-size: 16px;">
//         ✅ Profile updated successfully!
//     </div>';

//             // Auto-hide the message after 2 seconds
//             echo '<script>
//         setTimeout(function() {
//             var msg = document.getElementById("updateSuccess");
//             if (msg) { msg.style.display = "none"; }
//         }, 2000);
//     </script>';
//         }
//     } else {
//         echo "<h2 style='text-align: center; color: red; margin-top: 40px;'>Cannot Update Profile [You are not logged in]</h2>";
//     }
// }

function studentUpdate()
{
    if (isset($_SESSION['studentId']) && !empty($_SESSION['studentId'])) {
        echo "<h2 style='text-align: center; color: #222; margin-top: 40px; font-size: 28px;'>Update Student Profile</h2>";
        echo '<form action="./includes/update/students/updateStudent.inc.php" method="POST" 
        style="max-width: 500px; margin: 30px auto; padding: 30px 35px; background: #ffffff; 
        border-radius: 12px; box-shadow: 0 8px 20px rgba(0,0,0,0.05); display: flex; flex-direction: column;">';

        $inputStyle = "margin-bottom: 20px; padding: 14px 16px; border: 1px solid #ddd; 
                   border-radius: 8px; font-size: 15px; background-color: #f9f9f9;";

        // Student Name
        $username = $_SESSION['studentUsername'] ?? '';
        echo '<input type="text" name="studentName" value="' . htmlspecialchars($username) . '" 
        placeholder="Update Username" style="' . $inputStyle . '"
        pattern="[A-Z][a-zA-Z\s]{2,49}" 
        title="First letter should be capital. Only letters and spaces allowed. Min 3 characters.">';

        // Roll No
        $rollno = $_SESSION['studentRollno'] ?? '';
        echo '<input type="text" name="studentRollno" value="' . htmlspecialchars($rollno) . '" 
        placeholder="Update Roll No" style="' . $inputStyle . '"
        pattern="[A-Za-z0-9]{1,20}" 
        title="Alphanumeric roll number up to 20 characters.">';

        // Email
        $email = $_SESSION['studentEmail'] ?? '';
        echo '<input type="email" name="studentEmail" value="' . htmlspecialchars($email) . '" 
        placeholder="Enter Your Email" style="' . $inputStyle . '"
        pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
        title="Enter a valid email address.">';

        // Phone
        $phone = $_SESSION['studentPhone'] ?? '';
        echo '<input type="tel" name="studentPhone" value="' . htmlspecialchars($phone) . '" 
        placeholder="Update Your Phone No" style="' . $inputStyle . '"
        pattern="^[0-9]{10}$" 
        title="Please enter a valid 10-digit phone number.">';

        // CGPA
        $cgpa = $_SESSION['studentCgpa'] ?? '';
        echo '<input type="number" name="studentCgpa" value="' . htmlspecialchars($cgpa) . '" 
        placeholder="Enter Current CGPA" step="0.01" min="0" max="10"
        style="' . $inputStyle . ' -moz-appearance: textfield; appearance: textfield;" 
        onwheel="this.blur()"
        title="Enter CGPA between 0.00 and 10.00.">';

        // Backlogs
        $backlogs = $_SESSION['studentBacklogs'] ?? '';
        echo '<input type="text" name="studentBacklogs" value="' . htmlspecialchars($backlogs) . '" 
        placeholder="Backlogs [Yes or No]" style="' . $inputStyle . '"
        pattern="^(Yes|No|yes|no)$" 
        title="Only Yes or No allowed.">';

        // Password (no validation pattern since it depends on your backend validation)
        echo '<input type="password" name="studentPassword" placeholder="Update Password" 
        style="' . $inputStyle . '" title="Enter new password if you want to change it.">';

        echo '<button type="submit" 
        style="padding: 14px; background-color: #007bff; color: white; font-size: 16px; 
        border: none; border-radius: 8px; cursor: pointer; transition: background 0.3s;">
        Submit</button>';

        echo '</form>';

        // Disable spinner arrows for number input
        echo '<style>
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
</style>';

        // Success message
        if (isset($_GET['update']) && $_GET['update'] === 'success') {
            echo '<div id="updateSuccess" style="max-width: 500px; margin: 20px auto; padding: 12px 18px; 
        background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; 
        border-radius: 8px; text-align: center; font-size: 16px;">
        ✅ Profile updated successfully!
    </div>';

            echo '<script>
        setTimeout(function() {
            var msg = document.getElementById("updateSuccess");
            if (msg) { msg.style.display = "none"; }
        }, 2000);
    </script>';
        }
    } else {
        echo "<h2 style='text-align: center; color: red; margin-top: 40px;'>Cannot Update Profile [You are not logged in]</h2>";
    }
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
