<?php
require_once("../providersdbh.inc.php"); 
require_once("../providersconfigSession.inc.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $providerUsername = $_POST["providerUsername"];
    $providerPassword = $_POST["providerPassword"];

    require_once("./modelLoginproviders.inc.php");
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
        } elseif (isProviderPasswordWrong($result, $providerPassword)) {
            $errors["passwordWrong"] = "Incorrect Password.";
        }

        if ($errors) {
            $_SESSION["loginErrors"] = $errors;
            header("./backend/providersindex.php?login=success");
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

        header("./backend/providersindex.php?login=success");
        exit();
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
} else {
    header("./backend/providersindex.php?login=success");
    exit();
}
