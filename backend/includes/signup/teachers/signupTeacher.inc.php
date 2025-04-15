<?php
require_once("../../dbh.inc.php"); # connect to db code
require_once("../../teachersConfigSession.inc.php");
// session_start();


if ($_SERVER["REQUEST_METHOD"] === "POST" && empty($_SESSION['teacherId'])) {
    $teacherUsername =  $_POST["teacherUsername"];
    $teacherEmail = $_POST["teacherEmail"];
    $teacherPhone = $_POST["teacherPhone"];
    $teacherPassword = $_POST["teacherPassword"];
    $confirmPassword = $_POST['confirmPassword'];


    try {
        require_once("./modelSignupTeacher.inc.php");
        require_once("./viewSignupTeacher.inc.php");
        require_once("./contrSignupTeacher.inc.php");

        // Error Handlers          
        $errors = [];
        if (isInputEmpty($teacherUsername, $teacherEmail, $teacherPassword, $teacherPhone)) {
            $errors["emptyField"] = "Fill all the fields.";
        }
        // if (!isInputEmpty($studentUsername, $studentRollno, $studentEmail, $studentPassword, $studentPhone)) {
        if (isValidEmail($teacherEmail)) {
            $errors["invalidEmail"] = "Enter a valid email.";
        }
        if (isUsernameTaken($pdo, $teacherUsername)) {
            $errors["duplicateUsername"] = "Username already Exist.";
        }
        if (isEmailTaken($pdo, $teacherEmail)) {
            $errors["duplicateEmail"] = "Email already Exist.";
        }
        if (isPhoneTaken($pdo, $teacherPhone)) {
            $errors["duplicatePhone"] = "Phone Number already Exist.";
        }

        // Check if the passwords match
        if ($teacherPassword !== $confirmPassword) {
            $errors["duplicateConfirmPassword"]  = "Passwords do not match.";
            // exit();
        }
        // }
        // session start with better security config
        if ($errors) {
            $_SESSION["signupErrors"] = $errors;
            $_SESSION["reSignUpData"] = [
                'teacherUsername' => $teacherUsername,
                'teacherEmail' => $teacherEmail,
                'teacherPhone' => $teacherPhone,
                'teacherPassword' => $teacherPassword,
                // 'studentBacklogs' => $studentBacklogs,
            ];
            header("Location: ../../../tIndex.php");
            die(); //terminate code if there is an error message
        }

        // create users  
        createUser($pdo, $teacherUsername, $teacherEmail, $teacherPassword, $teacherPhone);

        $pdo = null;
        $stmt = null;
        header("Location: ../../../tIndex.php?signup=success");
        die();
    } catch (PDOException $e) {
        die("Cannot Fetch the query:" . $e->getMessage());
    }
} else {
    if (isset($_SESSION["signupErrors"])) {
        unset($_SESSION["signupErrors"]);
    }
    if (isset($_SESSION["reSignUpData"])) {
        unset($_SESSION["reSignUpData"]);
    }
    header("Location: ../../../tIndex.php");
    die();
}
