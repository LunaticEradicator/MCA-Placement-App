<?php
require_once "./includes/configSession.inc.php";
require_once "./includes/signup/students/viewSignup.inc.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Student Registration</title>
  <link rel="stylesheet" href="./css/jobregister.css" />
</head>

<body>
  <header class="header">
    <div class="logo">
      <a href="first.html">
        <img src="./images/tkmlogo.png" alt="Placement Cell Logo" />
      </a>
      <span class="logo-text">TKM MCA DEPARTMENT</span>
    </div>
  </header>

  <section class="landing">
    <div class="register_div">
      <?php
      studentSignup();
      viewSignupErrors();

      ?>
      <p>Already have an account? <a href="studentlogin.php">Login</a></p>
    </div>
  </section>

  <footer>
    <p>&copy; 2025 Placement Cell. All rights reserved.</p>
  </footer>

  <!-- <script>
    // Form validation function
    function validateForm() {
      var password = document.getElementById("password").value;
      var confirmPassword = document.getElementById("confirmPassword").value;
      var contactNumber = document.getElementById("contactNumber").value;

      // Password match validation
      if (password !== confirmPassword) {
        alert("Passwords do not match!");
        return false; // Prevent form submission
      }

      // Contact number validation
      var phonePattern = /^[0-9]{10}$/;
      if (!phonePattern.test(contactNumber)) {
        alert("Please enter a valid 10-digit phone number.");
        return false; // Prevent form submission
      }

      // Password Strength Validation
      var passwordValid = validatePassword(password);
      if (!passwordValid) {
        alert("Password does not meet the required criteria!");
        return false; // Prevent form submission
      }

      return true; // Allow form submission if all validations pass
    }

    // Password Validation Function
    function validatePassword(password) {
      var numPattern = /\d/; // Check if password contains a number
      var capitalPattern = /^[A-Z]/; // Check if first letter is capital
      var specialPattern = /[!@#$%^&*(),.?":{}|<>]/; // Check for special symbols

      // Show password feedback
      var numCheck = document.getElementById("numCheck");
      var capitalCheck = document.getElementById("capitalCheck");
      var specialCheck = document.getElementById("specialCheck");

      // Check for numbers
      if (numPattern.test(password)) {
        numCheck.style.color = "green";
      } else {
        numCheck.style.color = "red";
      }

      // Check for capital first letter
      if (capitalPattern.test(password)) {
        capitalCheck.style.color = "green";
      } else {
        capitalCheck.style.color = "red";
      }

      // Check for special symbols
      if (specialPattern.test(password)) {
        specialCheck.style.color = "green";
      } else {
        specialCheck.style.color = "red";
      }

      // Return true if all conditions are met
      return (
        numPattern.test(password) &&
        capitalPattern.test(password) &&
        specialPattern.test(password)
      );
    }
  </script> -->
</body>

</html>
