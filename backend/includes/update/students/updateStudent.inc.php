<?php
require_once("../../dbh.inc.php"); // Connect to db
require_once("../../configSession.inc.php");

if (!isset($_SESSION["studentId"])) {
    header("Location: ../../../studentlogin.php?error=notLoggedIn");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $studentUsername = $_POST["studentName"];
    $studentEmail = $_POST["studentEmail"];
    $studentPhone = $_POST["studentPhone"];
    $studentPassword = $_POST["studentPassword"];
    $studentRollno = $_POST["studentRollno"];
    $studentCgpa = $_POST["studentCgpa"];
    $studentBacklogs = $_POST["studentBacklogs"];

    require_once("./modelUpdateStudent.inc.php");
    require_once("./contrUpdateStudent.inc.php");
    require_once("./viewUpdateStudent.inc.php");

    try {
        // Get the current user data
        $userId = $_SESSION["studentId"];
        $userData = getStudentUsersById($pdo, $userId);

        // Error Handlers
        $errors = [];
        if (isInputEmpty($studentUsername, $studentRollno, $studentEmail, $studentPhone, $studentCgpa, $studentBacklogs)) {
            $errors["emptyField"] = "Fill all the fields.";
        }
        // if (!isInputEmpty($studentUsername, $studentEmail, $studentPhone, $studentPassword, $studentRollno)) {
        if (isUsernameTaken($pdo, $studentUsername) && $studentUsername !== $userData["username"]) {
            $errors["duplicateUsername"] = "Username already exists.";
        }
        if (isEmailTaken($pdo, $studentEmail) && $studentEmail !== $userData["email"]) {
            $errors["duplicateEmail"] = "Email already exists.";
        }

        // Session errors
        if ($errors) {
            $_SESSION["updateErrors"] = $errors;
            header("Location: ../../../student_profile.php");
            exit();
        }


        // Update user information
        // updateUser($pdo, $userId, $studentUsername, $studentRollno, $studentEmail, $studentPassword, $studentPhone, $studentCgpa, $studentBacklogs);
        if (!empty($studentPassword)) {
            updateUser($pdo, $userId, $studentUsername, $studentRollno, $studentEmail, $studentPassword, $studentPhone, $studentCgpa, $studentBacklogs);
        } else {
            updateUserWithoutPassword($pdo, $userId, $studentUsername, $studentRollno, $studentEmail, $studentPhone, $studentCgpa, $studentBacklogs);
        }

        $_SESSION["studentUsername"] = htmlspecialchars($studentUsername);
        $_SESSION["studentRollno"] = htmlspecialchars($studentRollno);
        $_SESSION["studentEmail"] = htmlspecialchars($studentEmail);
        $_SESSION["studentPhone"] = htmlspecialchars($studentPhone);
        $_SESSION["studentCgpa"] = htmlspecialchars($studentCgpa);
        $_SESSION["studentBacklogs"] = htmlspecialchars($studentBacklogs);

        // Redirect to the profile page with success message
        header("Location: ../../../student_profile.php?update=success");
        exit();
    } catch (PDOException $e) {
        die("Cannot update the query: " . $e->getMessage());
    }
} else {
    header("Location: ../../../student_profile.php");
    exit();
}
