<?php
require_once "./includes/providersConfigSession.inc.php";
require_once "./includes/logout/providers/viewLogoutProvider.inc.php";
require_once "./includes/jobs/students/jobStudent.inc.php";
require_once "./includes/login/providers/viewLoginProviders.inc.php"; //header
// require_once "./includes/update/students/viewUpdateStudent.inc.php";

// display home components
require_once "./includes/jobs/providers/viewJobProvider.inc.php";
require_once "./includes/status/providers/viewStatusProvider.inc.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Provider Dashboard</title>
    <link rel="stylesheet" href="./css/first.css">
    <script src="./scripts/student.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>


    <header class="header">
        <div class="logo">
            <a href="provider.php" class="nav-item">
                <i class="fas fa-home"></i>
                <span>Home</span>
            </a>

        </div>
        <nav class="nav-icons">
            <a href="provider_profile.php" class="nav-item">
                <i class="fas fa-user"></i>
                <span>Profile</span>
            </a>
            <a href="provider_post.php" class="nav-item">
                <i class="fas fa-briefcase"></i>
                <span>Job</span>
            </a>
            <a href="logout.php" class="nav-item">
                <?php
                providerLogout();
                ?>
            </a>
        </nav>
    </header>

    <?php
    providerLoginHeader();
    ?>

    <section class="available-jobs">
        <div>
            <?php
            providerJobListingsView();
            ?>
        </div>
        <div>
            <?php
            viewStudentJobStatus();
            ?>
        </div>
        <?php
        // getStudentJob();
        ?>
    </section>

    <footer>
        <p>&copy; 2025 Placement Cell. All rights reserved.</p>
    </footer>

</body>

</html>
