<?php
require_once("../dbh.inc.php"); // Database connection

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $teacherUsername = $_POST["teacherName"];
    $teacherEmail = $_POST["teacherEmail"];
    $teacherPassword = $_POST["teacherPassword"];
    $teacherPhone = $_POST["teacherPhone"];
    $teacherDept = $_POST["teacherDept"];

    try {
        require_once("../configSession.inc.php");
        require_once("./modelTeacherSignup.inc.php");
        require_once("./viewTeacherSignup.inc.php");
        require_once("./contrTeacherSignup.inc.php");

        // Error Handlers
        $errors = [];
        if (isInputEmpty($teacherUsername, $teacherEmail, $teacherPassword, $teacherPhone, $teacherDept)) {
            $errors["emptyField"] = "Fill all the fields.";
        }
        if (isValidEmail($teacherEmail)) {
            $errors["invalidEmail"] = "Enter a valid email.";
        }
        if (isUsernameTaken($pdo, $teacherUsername)) {
            $errors["duplicateUsername"] = "Username already exists.";
        }
        if (isEmailTaken($pdo, $teacherEmail)) {
            $errors["duplicateEmail"] = "Email already exists.";
        }
        if (isPhoneTaken($pdo, $teacherPhone)) {
            $errors["duplicatePhone"] = "Phone number already exists.";
        }

        // If errors exist, store them in the session and redirect
        if ($errors) {
            $_SESSION["signupErrors"] = $errors;
            $_SESSION["reSignUpData"] = [
                'teacherName' => $teacherUsername,
                'teacherEmail' => $teacherEmail,
                'teacherPassword' => $teacherPassword,
                'teacherPhone' => $teacherPhone,
                'teacherDept' => $teacherDept
            ];
            header("Location: ../../teacherSignup.php");
            die();
        }

        // Create the teacher account
        createTeacherUser($pdo, $teacherUsername, $teacherEmail, $teacherPassword, $teacherPhone, $teacherDept);

        $pdo = null;
        $stmt = null;
        header("Location: ../../teacherSignup.php?signup=success");
        die();
    } catch (PDOException $e) {
        die("Cannot process request: " . $e->getMessage());
    }
} else {
    if (isset($_SESSION["signupErrors"])) {
        unset($_SESSION["signupErrors"]);
    }
    if (isset($_SESSION["reSignUpData"])) {
        unset($_SESSION["reSignUpData"]);
    }
    header("Location: ../../teacherSignup.php");
    die();
}
