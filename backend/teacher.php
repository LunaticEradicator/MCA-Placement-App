<?php
require_once "./includes/teachersConfigSession.inc.php";
require_once "./includes/logout/teachers/viewLogoutTeacher.inc.php";
// require_once "./includes/jobs/students/jobStudent.inc.php";
require_once "./includes/login/teachers/viewLoginTeacher.inc.php"; //header

// feature
// require_once "./includes/view/teachers/ctrlViewTeacher.inc.php";
// require_once "./includes/jobs/teachers/ctrlJobTeachers.inc.php";
// require_once "./includes/status/teachers/viewStatusTeacher.inc.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Provider Dashboard</title>
    <link rel="stylesheet" href="./css/first.css">
    <link rel="stylesheet" href="./css/teacherlanding.css">
    <script src="./scripts/student.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>


    <header class="header">
        <div class="logo">
            <a href="teacher.php" class="nav-item">
                <i class="fas fa-home"></i>
                <span>Home</span>
            </a>

        </div>
        <nav class="nav-icons">
            <a href="teacher_profile.php" class="nav-item">
                <i class="fas fa-user"></i>
                <span>Profile</span>
            </a>
            <a href="logout.php" class="nav-item">
                <?php
                teacherLogout();
                ?>
            </a>
        </nav>
    </header>

    <?php
    teacherLoginHeader();
    ?>

    <section class="teacher-landing">
        <div class="card-container">
            <div class="card">
                <h2>All Interview Offers</h2>
                <p>View and manage all company interview offers received by students.</p>
                <a href="./includes/jobs/teachers/ctrlJobTeachers.inc.php">View Offers</a>
            </div>
            <div class="card">
                <h2>All Students Details</h2>
                <p>Access complete student information relevant to placement activities.</p>
                <a href="./includes/view/teachers/ctrlViewTeacher.inc.php">View Students</a>
            </div>
            <div class="card">
                <h2>Invitation Status</h2>
                <p>Track who has accepted or rejected placement invitations.</p>
                <a href="./includes/status/teachers/viewStatusTeacher.inc.php">Check Status</a>
            </div>
        </div>
    </section>

    <footer>
        <p>&copy; 2025 Placement Cell. All rights reserved.</p>
    </footer>

</body>

</html>
