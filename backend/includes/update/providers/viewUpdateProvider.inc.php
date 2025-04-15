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
        if (isset($_SESSION['reUpdateData']['providerUsername'])) {
            unset($_SESSION["reUpdateData"]['providerUsername']);
        }
        if (isset($_SESSION['reUpdateData']['providerCompany'])) {
            unset($_SESSION["reUpdateData"]['providerCompany']);
        }
        if (isset($_SESSION['reUpdateData']['providerEmail'])) {
            unset($_SESSION["reUpdateData"]['providerEmail']);
        }
        if (isset($_SESSION['reUpdateData']['providerPhone'])) {
            unset($_SESSION["reUpdateData"]['providerPhone']);
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

// $providerUsername, $providerCompany, $providerEmail, $providerPassword, $providerPhone

// function providerUpdate()
// {
//     if (isset($_SESSION['providerId']) && !empty($_SESSION['providerId'])) {
//         echo '<form action="./includes/update/providers/updateProvider.inc.php" method="POST">';
//         echo "<h2>Update Provider</h2>";

//         if (isset($_SESSION['providerUsername']) && !empty($_SESSION['providerUsername'])) {
//             echo '<input type="text" name="providerUsername"  value="' . $_SESSION['providerUsername'] . '">';
//         } else {
//             echo '<input type="text" name="providerUsername"  placeholder="Update Username">';
//         }

//         if (isset($_SESSION["providerCompany"]) && !empty($_SESSION["providerCompany"])) {
//             echo '<input type="text" name="providerCompany" value="' . $_SESSION["providerCompany"] . '">';
//         } else {
//             echo '<input type="text" name="providerCompany"  placeholder="Update Company">';
//         }

//         if (isset($_SESSION["providerEmail"]) && !empty($_SESSION["providerEmail"])) {
//             echo '<input type="text" name="providerEmail" value="' . $_SESSION["providerEmail"] . '" placeholder="Enter Email Id">';
//         } else {
//             echo '<input type="email" name="providerEmail" placeholder="Update Your Email">';
//         }

//         if (isset($_SESSION["providerPhone"]) && !empty($_SESSION["providerPhone"])) {
//             echo '<input type="text" name="providerPhone" value="' . $_SESSION["providerPhone"] . '">';
//         } else {
//             echo '<input type="text" name="providerPhone" placeholder="Update Phone No">';
//         }

//         // Password field
//         echo '<input type="password" name="providerPassword" placeholder="Update Password">';
//         echo "<button>Submit</button>";
//         echo '</form>';
//         echo '<style>
//         input[type=number]::-webkit-inner-spin-button,
//         input[type=number]::-webkit-outer-spin-button {
//             -webkit-appearance: none;
//             margin: 0;
//         }
//     </style>';
//         if (isset($_GET['update']) && $_GET['update'] === 'success') {
//             echo '<div id="updateSuccess" style="max-width: 500px; margin: 20px auto; padding: 12px 18px; 
//     background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; 
//     border-radius: 8px; text-align: center; font-size: 16px;">
//     ✅ Profile updated successfully!
// </div>';

//             // Auto-hide the message after 2 seconds
//             echo '<script>
//     setTimeout(function() {
//         var msg = document.getElementById("updateSuccess");
//         if (msg) { msg.style.display = "none"; }
//     }, 2000);
// </script>';
//         }
//     } else {
//         echo "<h2>Cannot Update Profile [You are not logged in]</h2>";
//     }
// }
function providerUpdate()
{
    if (isset($_SESSION['providerId']) && !empty($_SESSION['providerId'])) {
        // Form container styling
        echo '<form class="profile-form" action="./includes/update/providers/updateProvider.inc.php" method="POST" 
            style="max-width: 450px; margin: 20px auto; padding: 30px; background-color: #fff; border-radius: 8px; box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1); transition: all 0.3s ease;">';

        echo "<h2 style='text-align: center; color: #333; margin-bottom: 20px;'>Update Your Profile</h2>";

        // Username input
        $providerUsername = $_SESSION['providerUsername'] ?? '';
        echo '<input type="text" name="providerUsername" class="input-field" placeholder="Update Username"
            value="' . htmlspecialchars($providerUsername) . '"
            pattern="[A-Z][a-zA-Z\s]{2,49}"
            title="First letter should be capital. Only letters and spaces allowed. Min 3 characters."
            style="width: 100%; padding: 15px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 8px; font-size: 1rem; transition: all 0.3s ease;">';

        // Company input
        $providerCompany = $_SESSION['providerCompany'] ?? '';
        echo '<input type="text" name="providerCompany" class="input-field" placeholder="Update Company"
            value="' . htmlspecialchars($providerCompany) . '"
            pattern="[A-Za-z0-9\s]{3,100}"
            title="Only letters, numbers, and spaces allowed. Min 3 characters."
            style="width: 100%; padding: 15px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 8px; font-size: 1rem; transition: all 0.3s ease;">';

        // Email input
        $providerEmail = $_SESSION['providerEmail'] ?? '';
        echo '<input type="email" name="providerEmail" class="input-field" placeholder="Update Your Email"
            value="' . htmlspecialchars($providerEmail) . '"
            pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
            title="Enter a valid email address."
            style="width: 100%; padding: 15px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 8px; font-size: 1rem; transition: all 0.3s ease;">';

        // Phone number input
        $providerPhone = $_SESSION['providerPhone'] ?? '';
        echo '<input type="tel" name="providerPhone" class="input-field no-arrows" placeholder="Update Phone No"
            value="' . htmlspecialchars($providerPhone) . '"
            pattern="^[0-9]{10}$"
            title="Please enter a valid 10-digit phone number"
            style="width: 100%; padding: 15px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 8px; font-size: 1rem; transition: all 0.3s ease;">';

        // Password input
        echo '<input type="password" name="providerPassword" id="providerPassword" class="input-field" placeholder="Update Password"
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
                }, 3000); // Hide after 3 seconds
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
