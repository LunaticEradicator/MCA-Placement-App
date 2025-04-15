<?php
require_once("../../dbh.inc.php"); // Database connection
require_once("./modelDeleteProvider.inc.php"); // Model file for database interaction

session_start();  // Start session
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['deleteUser'])) {
    if (isset($_SESSION['providerId']) && !empty($_SESSION['providerId'])) {
        try {
            // Get the student ID from the session
            $providerId = $_SESSION['providerId'];

            // Call the model function to delete the user
            deleteUser($pdo, $providerId);

            // Destroy the session after deletion
            session_unset();
            session_destroy();

            echo "<h2>Account Deleted Successfully.</h2>";
            header("refresh:1; url=../../../pIndex.php");
            exit();
        } catch (PDOException $e) {
            // Handle errors
            die("Error deleting the user: " . $e->getMessage());
        }
    } else {
        // Redirect to login if no session is available
        header("Location: ../../../pIndex.php?error=notLoggedIn");
        exit();
    }
}
