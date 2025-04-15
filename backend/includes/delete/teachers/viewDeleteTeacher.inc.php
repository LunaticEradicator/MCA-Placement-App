<?php
function teacherDelete()
{
    if (isset($_SESSION['teacherId']) && !empty($_SESSION['teacherId'])):
?>
        <h2>Delete Teacher</h2>
        <p>Are you sure you want to delete your account?</p>
        <form action="./includes/delete/teachers/deleteTeacher.inc.php" method="POST">
            <button type="submit" name="deleteUser" value="delete">Yes, delete my account</button>
        </form>
<?php
    else:
        echo "<h2>Cannot delete account [You Must be logged in]</h2>";
    endif;
}
?>
