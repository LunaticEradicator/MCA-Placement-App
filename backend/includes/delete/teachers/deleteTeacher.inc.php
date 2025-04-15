<?php
require_once("../../dbh.inc.php"); // Database connection
require_once("./modelDeleteTeacher.inc.php"); // Model file for database interaction

session_start();  // Start session
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['deleteUser'])) {
    if (isset($_SESSION['teacherId']) && !empty($_SESSION['teacherId'])) {
        try {
            // Get the student ID from the session
            $teacherId = $_SESSION['teacherId'];

            // Call the model function to delete the user
            deleteUser($pdo, $teacherId);

            // Destroy the session after deletion
            session_unset();
            session_destroy();

            echo "<h2>Account Deleted Successfully.</h2>";
            header("refresh:1; url=../../../tIndex.php");

            exit();
        } catch (PDOException $e) {
            // Handle errors
            die("Error deleting the user: " . $e->getMessage());
        }
    } else {
        // Redirect to login if no session is available
        header("Location: ../../../tIndex.php?error=notLoggedIn");
        exit();
    }
}
