<?php
function studentDelete()
{
    if (isset($_SESSION['studentId']) && !empty($_SESSION['studentId'])):
?>
        <h2>Delete User</h2>
        <p>Are you sure you want to delete your account?</p>
        <form action="./includes/delete/students/deleteStudent.inc.php" method="POST">
            <button type="submit" name="deleteUser" value="delete">Yes, delete my account</button>
        </form>
<?php
    else:
        echo "<h2>Cannot delete account [You Must be logged in]</h2>";
    endif;
}
?>
