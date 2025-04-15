<?php
require_once "./includes/configSession.inc.php";
require_once
  "./includes/login/students/viewLogin.inc.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Student Login</title>
  <link rel="stylesheet" href="./css/studentlogin.css" />
</head>

<body>
  <header class="header">
    <div class="logo">
      <a href="first.html"><img src="./images/tkmlogo.png" alt="Logo" /></a>
      <span class="logo-text">TKM MCA DEPARTMENT</span>
    </div>
  </header>

  <section class="login-section">
    <!-- <h1>Student Login</h1>
    <form class="login-form">
      <input type="text" placeholder="Enter Username" required /><br />
      <input type="password" placeholder="Enter Password" required /><br />
      <button type="submit">Sign In</button>
    </form> -->
    <?php
    // studentLoginHeader();
    studentLogin();
    loginErrors();
    ?>
    <p>New here? <a href="student-register.php">Register</a></p>
    <?php
    if (isset($_GET['signup']) && $_GET['signup'] === 'success') {
      echo '<div id="signupSuccess" style="max-width: 500px; margin: 20px auto; padding: 12px 18px; 
        background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; 
        border-radius: 8px; text-align: center; font-size: 16px;">
    ✅ Account created successfully! Please log in.
  </div>';
      // Auto-hide after 2 seconds
      echo '<script>
    setTimeout(function() {
      var msg = document.getElementById("signupSuccess");
      if (msg) {
        msg.style.visibility = "hidden";
      }
    }, 2000);
  </script>';
    }
    ?>
  </section>

  <footer>
    <p>&copy; 2025 Placement Cell. All rights reserved.</p>
  </footer>
</body>

</html>
