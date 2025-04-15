<?php
function teacherLogout()
{
    if (isset($_SESSION['teacherId']) && !empty($_SESSION['teacherId'])) {
        echo '<form action="./includes/logout/teachers/logoutTeachers.inc.php" method="POST">';
        echo '<button type="submit" name="logout" class="nav-item logout-btn">';
        echo '<i class="fas fa-right-from-bracket"></i>';
        echo '<span>Logout</span>';
        echo '</button>';
        echo '</form>';
    } else {
        echo "<h2>Cannot Logout [You are not logged in]</h2>";
    }
}
