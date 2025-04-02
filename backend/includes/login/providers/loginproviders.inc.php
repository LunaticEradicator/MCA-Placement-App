<?php
require_once("../providersdbh.inc.php"); 
require_once("../providersconfigSession.inc.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $providerUsername = trim($_POST["providerUsername"]);
    $providerPassword = $_POST["providerPassword"];

    require_once("./modelproviders.inc.php");
    require_once("./viewLoginproviders.inc.php");
    require_once("./contrLoginproviders.inc.php");

    $errors = [];
    $result = getProviderUser($pdo, $providerUsername);

    if (isInputEmpty($providerUsername, $providerPassword)) {
        $errors["emptyField"] = "Fill all the fields.";
    } elseif (isProviderUsernameWrong($result)) {
        $errors["usernameWrong"] = "Username Not Found.";
    } elseif (isProviderPasswordWrong($result, $providerPassword)) {
        $errors["passwordWrong"] = "Incorrect Password.";
    }

    if (!empty($errors)) {
        $_SESSION["loginErrors"] = $errors;
        header("Location: ../../providersindex.php?login=error");
        exit();
    }

    session_regenerate_id(true);
    $_SESSION["providerId"] = $result["id"];
    $_SESSION["providerUsername"] = htmlspecialchars($result["username"]);
    $_SESSION["providerCompany"] = htmlspecialchars($result["company"]);
    $_SESSION["last_regeneration"] = time();

    header("Location: ../../providersindex.php?login=success");
    exit();
}
