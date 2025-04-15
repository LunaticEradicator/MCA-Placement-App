<?php
require_once("../../dbh.inc.php"); // Connect to db
require_once("../../teachersConfigSession.inc.php");


if (!isset($_SESSION["teacherId"])) {
    header("Location: ../../../tIndex.php?error=notLoggedIn");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $teacherUsername = $_POST["teacherUsername"];
    $teacherEmail = $_POST["teacherEmail"];
    $teacherPhone = $_POST["teacherPhone"];
    $teacherPassword = $_POST["teacherPassword"];

    require_once("./modelUpdateTeacher.inc.php");
    require_once("./contrUpdateTeacher.inc.php");
    require_once("./viewUpdateTeacher.inc.php");


    try {
        // Get the current user data
        $userId = $_SESSION["teacherId"];
        $userData = getTeacherUsersById($pdo, $userId);

        // Error Handlers
        $errors = [];
        if (isInputEmpty($teacherUsername, $teacherEmail, $teacherPhone, $teacherPassword)) {
            $errors["emptyField"] = "Fill all the fields.";
        }
        // if (!isInputEmpty($studentUsername, $studentEmail, $studentPhone, $studentPassword, $studentRollno)) {
        if (isUsernameTaken($pdo, $teacherUsername) && $teacherUsername !== $userData["username"]) {
            $errors["duplicateUsername"] = "Username already exists.";
        }
        if (isEmailTaken($pdo, $teacherEmail) && $teacherEmail !== $userData["email"]) {
            $errors["duplicateEmail"] = "Email already exists.";
        }

        // Session errors
        if ($errors) {
            $_SESSION["updateErrors"] = $errors;
            header("Location: ../../../teacher_profile.php");
            exit();
        }
        // }

        // Update user information
        // updateUser($pdo, $userId, $teacherUsername, $teacherEmail, $teacherPassword, $teacherPhone);
        if (!empty($teacherPassword)) {
            updateUser($pdo, $userId, $teacherUsername, $teacherEmail, $teacherPassword, $teacherPhone);
        } else {
            updateUserWithoutPassword($pdo, $userId, $teacherUsername, $teacherEmail, $teacherPhone);
        }

        // autofill data
        $_SESSION["teacherUsername"] = htmlspecialchars($teacherUsername);
        $_SESSION["teacherEmail"] = htmlspecialchars($teacherEmail);
        $_SESSION["teacherPhone"] = htmlspecialchars($teacherPhone);

        // Redirect to the profile page with success message
        header("Location: ../../../teacher_profile.php?update=success");
        exit();
    } catch (PDOException $e) {
        die("Cannot update the query: " . $e->getMessage());
    }
} else {
    header("Location: ../../../teacher_profile.php");
    exit();
}
