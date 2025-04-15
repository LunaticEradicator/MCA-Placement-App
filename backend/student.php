<?php
require_once "./includes/configSession.inc.php";
require_once "./includes/logout/students/viewLogoutStudent.inc.php";
require_once "./includes/jobs/students/jobStudent.inc.php";
require_once "./includes/configSession.inc.php";
require_once "./includes/login/students/viewLogin.inc.php";
require_once "./includes/update/students/viewUpdateStudent.inc.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="./css/first.css">
    <script src="./scripts/student.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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

    <div>
        <?php
        studentLoginHeader();
        ?>
    </div>

    <section class="available-jobs">
        <?php
        getStudentJob();
        ?>
    </section>

    <footer>
        <p>&copy; 2025 Placement Cell. All rights reserved.</p>
    </footer>

</body>

</html>
