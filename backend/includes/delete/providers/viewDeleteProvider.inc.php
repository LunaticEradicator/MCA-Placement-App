<?php
function providerDelete()
{
    if (isset($_SESSION['providerId']) && !empty($_SESSION['providerId'])):
?>
        <h2>Delete User</h2>
        <p>Are you sure you want to delete your account?</p>
        <form action="./includes/delete/providers/deleteProvider.inc.php" method="POST">
            <button type="submit" name="deleteUser" value="delete">Yes, delete my account</button>
        </form>
<?php
    else:
        echo "<h2>Cannot delete account [You Must be logged in]</h2>";
    endif;
}
?>
