<?php
require_once("../../dbh.inc.php"); // Database connection
require_once("./modelDeleteStudent.inc.php"); // Model file for database interaction

session_start();  // Start session
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['deleteUser'])) {
    if (isset($_SESSION['studentId']) && !empty($_SESSION['studentId'])) {
        try {
            // Get the student ID from the session
            $studentId = $_SESSION['studentId'];

            // Call the model function to delete the user
            deleteUser($pdo, $studentId);

            // Destroy the session after deletion
            session_unset();
            session_destroy();

            // Redirect the user to a confirmation page

            echo "<h2>Account Deleted Successfully.</h2>";
            header("refresh:1; url=../../../index.php");
            exit();
        } catch (PDOException $e) {
            // Handle errors
            die("Error deleting the user: " . $e->getMessage());
        }
    } else {
        // Redirect to login if no session is available
        header("Location: ../../../index.php?error=notLoggedIn");
        exit();
    }
}
