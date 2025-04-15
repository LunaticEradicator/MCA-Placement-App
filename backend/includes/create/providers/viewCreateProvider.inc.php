<?php

// $jobTitle, $jobDesc, $jobEmail, $jobLocation, $jobSkill

function viewCreateErrors()
{
    if (isset($_SESSION["createErrors"])) {
        $errors = $_SESSION["createErrors"];
        echo "<br>";

        foreach ($errors as $error) {
            echo "<p style='color: red;'>" . $error . "</p>";
        }
        unset($_SESSION["createErrors"]);

        // clear session on page reload 
        // clear session after errors submit and reset session when starting server [IMP]
        if (isset($_SESSION['reSignUpData']['jobTitle'])) {
            unset($_SESSION["reSignUpData"]['jobTitle']);
        }
    } else if (isset($_GET["create"]) &&  $_GET["create"] === "success") {
        // echo "<br>";
        echo "<p style='color: green;' id='signin-success'>Job Created Successfully.</p>";
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

// $jobTitle, $jobDesc, $jobEmail, $jobLocation, $jobSkill
function providerJobCreate()
{
    if (isset($_SESSION['providerId']) && !empty($_SESSION['providerId'])) {

        echo "<div class='register_div'>";
        echo "<h2>Create Job</h2>";
        echo '<form class="register-form" action="./includes/create/providers/createProvider.inc.php" method="POST">';

        // Provider Username
        $jobTitle = $_SESSION['reSignUpData']['jobTitle'] ?? '';
        echo '<input type="text" name="jobTitle" id="providerUsername" class="input-field" placeholder="Enter Job Title"
        value="' . htmlspecialchars($jobTitle) . '"
        pattern="^[A-Z][a-zA-Z\s]{2,49}$"
        title="First letter should be capital. Only letters and spaces allowed. Min 3 characters."><br>';

        // Provider Company
        $jobDesc = $_SESSION["reSignUpData"]["jobDesc"] ?? '';
        $escapedJobDesc = htmlspecialchars($jobDesc, ENT_QUOTES, 'UTF-8');
        echo '<textarea 
            id="jobDesc" 
            name="jobDesc" 
            placeholder="Describe your company..." 
            rows="6"
            style="width: 100%; max-width: 600px; min-height: 150px; padding: 14px 18px;
                   font-size: 15px; font-family: \'Segoe UI\', Tahoma, Geneva, Verdana, sans-serif;
                   color: #333; background-color: #fafafa; border: 1px solid #ccc;
                   border-radius: 10px; resize: vertical;
                   transition: border-color 0.3s ease, box-shadow 0.3s ease;
                   box-shadow: inset 0 1px 3px rgba(0,0,0,0.05);"
            onfocus="this.style.borderColor=\'#4CAF50\'; this.style.boxShadow=\'0 0 5px rgba(76, 175, 80, 0.4)\'; this.style.backgroundColor=\'#fff\';"
            onblur="this.style.borderColor=\'#ccc\'; this.style.boxShadow=\'inset 0 1px 3px rgba(0,0,0,0.05)\'; this.style.backgroundColor=\'#fafafa\';"
        >' . $escapedJobDesc . '</textarea>';

        // Provider Email
        $jobEmail = $_SESSION["reSignUpData"]["jobEmail"] ?? '';
        echo '<input type="email" name="jobEmail" id="jobEmail" class="input-field" placeholder="Enter Email"
        value="' . htmlspecialchars($jobEmail) . '"
        pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
        title="Enter a valid email address."><br>';

        //  location
        $jobLocation = $_SESSION["reSignUpData"]["jobLocation"] ?? '';
        echo '<input type="text" name="jobLocation" id="jobLocation" class="input-field no-arrows" placeholder="Enter Location"
        value="' . htmlspecialchars($jobLocation) . '"
        pattern="^[a-zA-Z\s,.-]{2,100}$"
        title="Please enter a valid location (letters, spaces, commas, periods, and hyphens only)"><br>';

        // skills
        $jobSkill = $_SESSION["reSignUpData"]["jobSkill"] ?? '';
        echo '<input type="text" name="jobSkill" id="jobSkill" class="input-field no-arrows" placeholder="Technical Skills (Separated by comma)"
       value="' . htmlspecialchars($jobSkill) . '"
       pattern="^([a-zA-Z\s]{1,30})(,\s*[a-zA-Z\s]{1,30})*$"
       title="Enter skills separated by commas. Only letters and spaces are allowed (e.g., Java, Python, Team Work)"><br>';

        echo '<button type="submit" class="submit-button">Submit</button>';
        echo '</form>';
        echo "</div>";
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
