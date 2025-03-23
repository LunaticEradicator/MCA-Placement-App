<?php
require_once("../providersdbh.inc.php"); 

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["providerUsername"];
    $company = $_POST["providerCompany"];
    $email = $_POST["providerEmail"];
    $phone = $_POST["providerPhone"];
    $password = $_POST["providerPassword"];
    $confirmPassword = $_POST["providerConfirmPassword"];

    require_once("./modelSignupproviders.inc.php");
    require_once("./viewSignupproviders.inc.php");
    require_once("./contrSignupproviders.inc.php");

    $errors = [];

    if (isSignupInputEmpty($username, $company, $email, $phone, $password, $confirmPassword)) {
        $errors["emptyField"] = "Fill all the fields.";
    }
    if (!isValidEmail($email)) {
        $errors["invalidEmail"] = "Invalid Email Format.";
    }
    if (!isValidPhone($phone)) {
        $errors["invalidPhone"] = "Phone number must be 10 digits.";
    }
    if (isPasswordMismatch($password, $confirmPassword)) {
        $errors["passwordMismatch"] = "Passwords do not match.";
    }
    if (isUsernameTaken($pdo, $username)) {
        $errors["usernameTaken"] = "Username already exists.";
    }

    if ($errors) {
        $_SESSION["signupErrors"] = $errors;
        header("./includes/signup/providers/Signup.inc.php");
        exit();
    }

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    if (createProvider($pdo, $username, $company, $email, $phone, $passwordHash)) {
        header("./includes/signup/providers/Signup.inc.php?signup=success");
        exit();
    } else {
        die("Error: Could not create account.");
    }
} else {
    header("./includes/signup/providers/Signup.inc.php");
    exit();
}
