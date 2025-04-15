<?php
require_once("../../dbh.inc.php"); // Connect to db
require_once("../../providersConfigSession.inc.php");


if (!isset($_SESSION["providerId"])) {
    header("Location: ../../../pIndex.php?error=notLoggedIn");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $providerUsername = $_POST["providerUsername"];
    $providerEmail = $_POST["providerEmail"];
    $providerPhone = $_POST["providerPhone"];
    $providerPassword = $_POST["providerPassword"];
    $providerCompany = $_POST["providerCompany"];

    require_once("./modelUpdateProvider.inc.php");
    require_once("./contrUpdateProvider.inc.php");
    require_once("./viewUpdateProvider.inc.php");


    try {
        // Get the current user data
        $userId = $_SESSION["providerId"];
        $userData = getProviderUsersById($pdo, $userId);

        // Error Handlers
        $errors = [];
        if (isInputEmpty($providerUsername, $providerEmail, $providerPhone, $providerCompany)) {
            $errors["emptyField"] = "Fill all the fields.";
        }
        // if (!isInputEmpty($studentUsername, $studentEmail, $studentPhone, $studentPassword, $studentRollno)) {
        if (isUsernameTaken($pdo, $providerUsername) && $providerUsername !== $userData["username"]) {
            $errors["duplicateUsername"] = "Username already exists.";
        }
        if (isEmailTaken($pdo, $providerEmail) && $providerEmail !== $userData["email"]) {
            $errors["duplicateEmail"] = "Email already exists.";
        }

        // Session errors
        if ($errors) {
            $_SESSION["updateErrors"] = $errors;
            header("Location: ../../../provider_profile.php");
            exit();
        }
        // }

        // Update user information
        // updateUser($pdo, $userId, $providerUsername, $providerCompany, $providerEmail, $providerPassword, $providerPhone);
        if (!empty($providerPassword)) {
            updateUser($pdo, $userId, $providerUsername, $providerCompany, $providerEmail, $providerPassword, $providerPhone);
        } else {
            updateUserWithoutPassword($pdo, $userId, $providerUsername, $providerCompany, $providerEmail, $providerPhone);
        }

        // autofill data
        $_SESSION["providerUsername"] = htmlspecialchars($providerUsername);
        $_SESSION["providerCompany"] = htmlspecialchars($providerCompany);
        $_SESSION["providerEmail"] = htmlspecialchars($providerEmail);
        $_SESSION["providerPhone"] = htmlspecialchars($providerPhone);

        // Redirect to the profile page with success message
        header("Location: ../../../provider.php?update=success");
        exit();
    } catch (PDOException $e) {
        die("Cannot update the query: " . $e->getMessage());
    }
} else {
    header("Location: ../../../provider_profile.php");
    exit();
}
