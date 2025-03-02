<?php
require_once("../dbh.inc.php"); # connect to db code

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $studentUsername =  $_POST["studentName"];
    $studentRollno = $_POST["studentRollno"];
    $studentEmail = $_POST["studentEmail"];
    $studentPassword = $_POST["studentPassword"];
    $studentPhone = $_POST["studentPhone"];

    try {
        require_once("../configSession.inc.php");
        require_once("./modelSignup.inc.php");
        require_once("./viewSignup.inc.php");
        require_once("./contrSignup.inc.php");

        // Error Handlers          
        $errors = [];
        if (isInputEmpty($studentUsername, $studentRollno, $studentEmail, $studentPassword, $studentPhone)) {
            $errors["emptyField"] = "Fill all the fields.";
        }
        if (isValidEmail($studentEmail)) {
            $errors["invalidEmail"] = "Enter a valid email.";
        }
        if (isUsernameTaken($pdo, $studentUsername)) {
            $errors["duplicateUsername"] = "Username already Exist.";
        }
        if (isEmailTaken($pdo, $studentEmail)) {
            $errors["duplicateEmail"] = "Email already Exist.";
        }
        if (isPhoneTaken($pdo, $studentPhone)) {
            $errors["duplicatePhone"] = "Phone Number already Exist.";
        }
        if (isRollNoTaken($pdo, $studentRollno)) {
            $errors["duplicateRollno"] = "Roll Number already Exist.";
        }


        // session start with better security config
        if ($errors) {
            $_SESSION["signupErrors"] = $errors;
            $_SESSION["reSignUpData"] = [
                'studentName' => $studentUsername,
                'studentRollno' => $studentRollno,
                'studentEmail' => $studentEmail,
                'studentPassword' => $studentPassword,
                'studentPhone' => $studentPhone,
            ];
            header("Location: ../../index.php");
            die(); //terminate code if there is an error message
        }

        // create users  
        createUser($pdo, $studentUsername, $studentRollno, $studentEmail, $studentPassword, $studentPhone);


        $pdo = null;
        $stmt = null;
        header("Location: ../../index.php?signup=success");
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
    header("Location: ../../index.php");
    die();
}
