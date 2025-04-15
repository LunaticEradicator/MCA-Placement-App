<?php
function providerLogout()
{
    if (isset($_SESSION['providerId']) && !empty($_SESSION['providerId'])) {
        echo '<form action="./includes/logout/providers/logoutProvider.inc.php" method="POST">';
        echo '<button type="submit" name="logout" class="nav-item logout-btn">';
        echo '<i class="fas fa-right-from-bracket"></i>';
        echo '<span>Logout</span>';
        echo '</button>';
        echo '</form>';
    } else {
        echo "<h2>Cannot Logout [You are not logged in]</h2>";
    }
}
