<?php
require_once("../../dbh.inc.php"); # connect to db code
require_once("../../providersConfigSession.inc.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $providerUsername = $_POST["providerUsername"];
    $providerPassword = $_POST["providerPassword"];

    require_once("./modelproviders.inc.php");
    require_once("./viewLoginproviders.inc.php");
    require_once("./contrLoginproviders.inc.php");
    try {
        $result = getProviderUser($pdo, $providerUsername);

        // Error Handling
        $errors = [];
        if (isInputEmpty($providerUsername, $providerPassword)) {
            $errors["emptyField"] = "Fill all the fields.";
        }
        if (isProviderUsernameWrong($result)) {
            $errors["usernameWrong"] = "Username Not Found.";
        } elseif (isProviderPasswordWrong($providerPassword, $result)) {
            $errors["passwordWrong"] = "Incorrect Password.";
        }

        if ($errors) {
            $_SESSION["loginErrors"] = $errors;
            header("Location: ../../../providersIndex.php");
            exit();
        }

        // Secure Session
        $newSessionId = session_create_id();
        $concatSessionId = $newSessionId . "_" . $result["id"];
        session_id($concatSessionId);

        $_SESSION["providerId"] = $result["id"];
        $_SESSION["providerUsername"] = htmlspecialchars($result["username"]);
        $_SESSION["providerCompany"] = htmlspecialchars($result["company"]);
        $_SESSION["last_regeneration"] = time();

        header("Location: ../../../providersIndex.php?login=success");
        echo $result;

        $pdo = null;
        $stmt = null;
        die();
    } catch (PDOException $e) {
        die("Cannot Fetch the query:" . $e->getMessage());
    }
} else {
    header("Location: ../../providersIndex.php");
    die();
}
