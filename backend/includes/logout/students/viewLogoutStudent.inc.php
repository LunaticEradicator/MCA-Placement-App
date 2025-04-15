<?php
function studentLogout()
{
    if (isset($_SESSION['studentId']) && !empty($_SESSION['studentId'])) {
        echo '<form action="./includes/logout/students/logoutStudents.inc.php" method="POST">';
        echo '<button type="submit" name="logout" class="nav-item logout-btn">';
        echo '<i class="fas fa-right-from-bracket"></i>';
        echo '<span>Logout</span>';
        echo '</button>';
        echo '</form>';
    }
}
