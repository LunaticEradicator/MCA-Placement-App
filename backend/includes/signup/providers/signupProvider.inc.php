<?php
require_once("../../dbh.inc.php"); # connect to db code
require_once("../../providersConfigSession.inc.php");
// session_start();


if ($_SERVER["REQUEST_METHOD"] === "POST" && empty($_SESSION['providerId'])) {
    $providerUsername =  $_POST["providerUsername"];
    $providerCompany = $_POST["providerCompany"];
    $providerEmail = $_POST["providerEmail"];
    $providerPhone = $_POST["providerPhone"];
    $providerPassword = $_POST["providerPassword"];
    $confirmPassword = $_POST['confirmPassword'];


    try {
        require_once("./modelSignupProvider.inc.php");
        require_once("./viewSignupProvider.inc.php");
        require_once("./contrSignupProvider.inc.php");

        // Error Handlers          
        $errors = [];
        if (isInputEmpty($providerUsername, $providerCompany, $providerEmail, $providerPassword, $providerPhone)) {
            $errors["emptyField"] = "Fill all the fields.";
        }
        // if (!isInputEmpty($studentUsername, $studentRollno, $studentEmail, $studentPassword, $studentPhone)) {
        if (isValidEmail($providerEmail)) {
            $errors["invalidEmail"] = "Enter a valid email.";
        }
        if (isUsernameTaken($pdo, $providerUsername)) {
            $errors["duplicateUsername"] = "Username already Exist.";
        }
        if (isEmailTaken($pdo, $providerEmail)) {
            $errors["duplicateEmail"] = "Email already Exist.";
        }
        if (isPhoneTaken($pdo, $providerPhone)) {
            $errors["duplicatePhone"] = "Phone Number already Exist.";
        }
        if (isCompanyTaken($pdo, $providerCompany)) {
            $errors["duplicateRollno"] = "Company already Exist.";
        }

        // Check if the passwords match
        if ($providerPassword !== $confirmPassword) {
            $errors["duplicateConfirmPassword"]  = "Passwords do not match.";
            // exit();
        }
        // }
        // session start with better security config
        if ($errors) {
            $_SESSION["signupErrors"] = $errors;
            $_SESSION["reSignUpData"] = [
                'providerUsername' => $providerUsername,
                'providerCompany' => $providerCompany,
                'providerEmail' => $providerEmail,
                'providerPhone' => $providerPhone,
                'providerPassword' => $providerPassword,
                // 'studentBacklogs' => $studentBacklogs,
            ];
            header("Location: ../../../provider-register.php");
            die(); //terminate code if there is an error message
        }

        // create users  
        createUser($pdo, $providerUsername, $providerCompany, $providerEmail, $providerPassword, $providerPhone);

        $pdo = null;
        $stmt = null;

        header(";Location: ../../../providerlogin.php?signup=success");
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
    header("Location: ../../../provider-register.php");
    die();
}
