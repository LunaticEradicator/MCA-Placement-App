<?php
require_once "./includes/configSession.inc.php";
require_once "./includes/logout/students/viewLogoutStudent.inc.php";
require_once "./includes/login/students/viewLogin.inc.php";

require_once "./includes/update/students/viewUpdateStudent.inc.php";


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Update Profile - Student</title>
  <link rel="stylesheet" href="./css/first.css" />
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f9;
    }

    header {
      background-color: #c4a35a;
      color: white;
      /* padding-top: 10px; */
      display: flex;
      justify-content: space-between;
      align-items: center;
      /* margin: -8px -7px 10px -7px; */
      /* padding-top: 10px; */
    }

    .logo img {
      height: 100px;
      width: auto;
    }

    .logo-text {
      font-size: 250%;
      font-weight: bold;
      margin-left: 600px;
      margin-bottom: 40px;
    }

    .profile-section {
      text-align: center;
      padding: 20px;
      /* background-image: url("./images/tkmfront.jpg"); */
      background-size: cover;
      background-position: center;
      height: -webkit-fill-available;
    }

    .profile-form {
      background-color: white;
      padding: 30px;
      border-radius: 8px;
      display: inline-block;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      transition: all 0.3s ease;
    }

    .profile-form:hover {
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
      /* transform: scale(1.05); */
      /* border: 2px solid #19582d; */
    }

    .profile-form input {
      padding: 10px;
      margin: 10px;
      width: 250px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    .profile-form button {
      padding: 10px 20px;
      background-color: #19582d;
      color: white;
      border: none;
      cursor: pointer;
      border-radius: 4px;
      transition: background-color 0.3s ease;
    }

    .profile-form button:hover {
      background-color: #c4a35a;
    }

    footer {
      background-color: #c4a35a;
      color: white;
      text-align: center;
      padding: 10px;
      position: fixed;
      bottom: 0;
      width: 100%;
    }

    .password-feedback {
      font-size: 14px;
      color: #333;
      text-align: left;
      padding-left: 20px;
    }

    .password-feedback ul {
      margin-top: 0;
    }
  </style>
</head>

<body>
  <header class="header">
    <div class="logo">
      <a href="student.php" class="nav-item">
        <i class="fas fa-home"></i>
        <span>Home</span>
      </a>
    </div>
    <nav class="nav-icons">
      <a href="student_profile.php" class="nav-item">
        <i class="fas fa-user"></i>
        <span>Profile</span>
      </a>
      <a href="logout.php" class="nav-item">
        <?php
        studentLogout();
        ?>
      </a>
    </nav>
  </header>

  <section class="profile-section">
    <?php
    studentUpdate();
    viewUpdateErrors()
    ?>
  </section>

  <footer>
    <p>&copy; 2025 Placement Cell. All rights reserved.</p>
  </footer>

  <script>
    function validateForm() {
      const password = document.getElementById("password").value;
      const confirmPassword =
        document.getElementById("confirmPassword").value;

      if (password || confirmPassword) {
        const numberCheck = /\d/.test(password);
        const capitalCheck = /^[A-Z]/.test(password);
        const specialCheck = /[!@#$%^&*(),.?":{}|<>]/.test(password);

        if (!numberCheck || !capitalCheck || !specialCheck) {
          alert(
            "Password must contain:\n- At least one number\n- First letter should be capital\n- At least one special symbol"
          );
          return false;
        }

        if (password !== confirmPassword) {
          alert("Passwords do not match.");
          return false;
        }
      }

      return true;
    }
  </script>
</body>

</html>
