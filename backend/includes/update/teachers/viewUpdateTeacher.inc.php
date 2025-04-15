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
        if (isset($_SESSION['reUpdateData']['teacherUsername'])) {
            unset($_SESSION["reUpdateData"]['teacherUsername']);
        }
        if (isset($_SESSION['reUpdateData']['teacherEmail'])) {
            unset($_SESSION["reUpdateData"]['teacherEmail']);
        }
        if (isset($_SESSION['reUpdateData']['teacherPhone'])) {
            unset($_SESSION["reUpdateData"]['teacherPhone']);
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


// function teacherUpdate()
// {
//     if (isset($_SESSION['teacherId']) && !empty($_SESSION['teacherId'])) {
//         echo '<form  class="register-form" action="./includes/update/teachers/updateTeacher.inc.php" method="POST">';
//         echo "<h2>Update Teacher</h2>";

//         $teacherUsername = $_SESSION['teacherUsername'] ?? '';
//         echo '<input type="text" name="teacherUsername" class="input-field" placeholder="Update Username"
//             value="' . htmlspecialchars($teacherUsername) . '"
//             pattern="[A-Z][a-zA-Z\s]{2,49}"
//             title="First letter should be capital. Only letters and spaces allowed. Min 3 characters."><br>';

//         $teacherEmail = $_SESSION['teacherEmail'] ?? '';
//         echo '<input type="email" name="teacherEmail" class="input-field" placeholder="Update Your Email"
//             value="' . htmlspecialchars($teacherEmail) . '"
//             pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
//             title="Enter a valid email address."><br>';

//         $teacherPhone = $_SESSION['teacherPhone'] ?? '';
//         echo '<input type="tel" name="teacherPhone" class="input-field no-arrows" placeholder="Update Phone No"
//             value="' . htmlspecialchars($teacherPhone) . '"
//             pattern="^[0-9]{10}$"
//             title="Please enter a valid 10-digit phone number"><br>';

//         // Password field (optional update)
//         echo '<input type="password" name="teacherPassword" class="input-field" placeholder="Update Password"><br>';

//         echo "<button type='submit' class='submit-button'>Submit</button>";
//         echo '</form>';

//         echo '<style>
//         input[type=number]::-webkit-inner-spin-button,
//         input[type=number]::-webkit-outer-spin-button {
//             -webkit-appearance: none;
//             margin: 0;
//         }
//         </style>';

//         if (isset($_GET['update']) && $_GET['update'] === 'success') {
//             echo '<div id="updateSuccess" style="max-width: 500px; margin: 20px auto; padding: 12px 18px; 
//                 background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; 
//                 border-radius: 8px; text-align: center; font-size: 16px;">
//                 ✅ Profile updated successfully!
//             </div>';

//             echo '<script>
//                 setTimeout(function() {
//                     var msg = document.getElementById("updateSuccess");
//                     if (msg) { msg.style.display = "none"; }
//                 }, 2000);
//             </script>';
//         }
//     } else {
//         echo "<h2>Cannot Update Profile [You are not logged in]</h2>";
//     }
// }

// 

function teacherUpdate()
{
    if (isset($_SESSION['teacherId']) && !empty($_SESSION['teacherId'])) {
        // Form container styling
        echo '<form class="profile-form" action="./includes/update/teachers/updateTeacher.inc.php" method="POST" 
            style="max-width: 450px; margin: 20px auto; padding: 30px; background-color: #fff; border-radius: 8px; box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1); transition: all 0.3s ease;">';

        echo "<h2 style='text-align: center; color: #333; margin-bottom: 20px;'>Update Teacher Profile</h2>";

        // Username input
        $teacherUsername = $_SESSION['teacherUsername'] ?? '';
        echo '<input type="text" name="teacherUsername" class="input-field" placeholder="Update Username"
            value="' . htmlspecialchars($teacherUsername) . '"
            pattern="[A-Z][a-zA-Z\s]{2,49}"
            title="First letter should be capital. Only letters and spaces allowed. Min 3 characters."
            style="width: 100%; padding: 15px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 8px; font-size: 1rem; transition: all 0.3s ease;">';

        // Email input
        $teacherEmail = $_SESSION['teacherEmail'] ?? '';
        echo '<input type="email" name="teacherEmail" class="input-field" placeholder="Update Your Email"
            value="' . htmlspecialchars($teacherEmail) . '"
            pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
            title="Enter a valid email address."
            style="width: 100%; padding: 15px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 8px; font-size: 1rem; transition: all 0.3s ease;">';

        // Phone number input
        $teacherPhone = $_SESSION['teacherPhone'] ?? '';
        echo '<input type="tel" name="teacherPhone" class="input-field no-arrows" placeholder="Update Phone No"
            value="' . htmlspecialchars($teacherPhone) . '"
            pattern="^[0-9]{10}$"
            title="Please enter a valid 10-digit phone number"
            style="width: 100%; padding: 15px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 8px; font-size: 1rem; transition: all 0.3s ease;">';

        // Password input
        echo '<input type="password" name="teacherPassword" id="teacherPassword" class="input-field" placeholder="Update Password"
            style="width: 100%; padding: 15px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 8px; font-size: 1rem; transition: all 0.3s ease;">';

        // Submit button
        echo "<button type='submit' class='submit-button' 
            style='width: 100%; padding: 15px; background-color: #4CAF50; color: white; border: none; border-radius: 8px; font-size: 1.1rem; cursor: pointer; transition: background-color 0.3s ease;'>
            Update Profile
        </button>";

        echo '</form>';

        // Styling for error messages
        echo '<style>
            input[type=number]::-webkit-inner-spin-button,
            input[type=number]::-webkit-outer-spin-button {
                -webkit-appearance: none;
                margin: 0;
            }

            input:focus {
                border-color: #4CAF50;
                box-shadow: 0 0 5px rgba(76, 175, 80, 0.5);
            }

            .submit-button:hover {
                background-color: #45a049;
            }
        </style>';

        // Success message with inline styling
        if (isset($_GET['update']) && $_GET['update'] === 'success') {
            echo '<div id="updateSuccess" style="max-width: 500px; margin: 20px auto; padding: 20px; background-color: #d4edda; 
                color: #155724; border: 1px solid #c3e6cb; border-radius: 8px; text-align: center; font-size: 16px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                ✅ Profile updated successfully!
            </div>';

            echo '<script>
                setTimeout(function() {
                    var msg = document.getElementById("updateSuccess");
                    if (msg) { msg.style.display = "none"; }
                }, 2000); // Hide after 3 seconds
            </script>';
        }
    } else {
        echo "<h2 style='color: red; text-align: center;'>Cannot Update Profile [You are not logged in]</h2>";
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
