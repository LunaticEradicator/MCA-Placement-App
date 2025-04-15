<?php
require_once("../../dbh.inc.php"); # connect to db code
require_once("../../providersConfigSession.inc.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $providerUsername =  $_POST["providerUsername"];
    $providerPassword = $_POST["providerPassword"];

    require_once("./modelProviders.inc.php");
    require_once("./viewLoginProviders.inc.php");
    require_once("./contrLoginProviders.inc.php");
    try {
        $result = getProviderUser($pdo, $providerUsername);

        // Error Handlers          
        $errors = [];
        if (isInputEmpty($providerUsername, $providerPassword)) {
            $errors["emptyField"] = "Fill all the fields.";
        }

        if (!isInputEmpty($providerUsername, $providerPassword)) {
            // if $result is empty => return error
            if (isProviderUsernameWrong($result)) {
                $errors["usernameWrong"] = "Username Not Found.";
            }

            if (isProviderPasswordWrong($providerPassword, $result)) {
                $errors["userPasswordWrong"] = "Password doesn't match.";
            }
        }


        // session start with better security config
        if ($errors) {
            $_SESSION["loginErrors"] = $errors;
            header("Location: ../../../providerlogin.php");
            die(); //terminate code if there is an error message
        } else {
            $newSessionId = session_create_id();
            $concatSessionId = $newSessionId . "_" . $result["id"];
            session_id($concatSessionId);

            $_SESSION["providerId"] = $result["id"];
            $_SESSION["providerUsername"] = htmlspecialchars($result["username"]);
            $_SESSION["providerCompany"] = htmlspecialchars($result["company"]);
            $_SESSION["providerEmail"] = htmlspecialchars($result["email"]);
            $_SESSION["providerPhone"] = htmlspecialchars($result["phone"]);
            $_SESSION["last_regeneration"] =  time();

            header("Location: ../../../provider.php?login=success");
            echo $result;


            $pdo = null;
            $stmt = null;
            die();
        }
    } catch (PDOException $e) {
        die("Cannot Fetch the query:" . $e->getMessage());
    }
} else {
    header("Location: ../../../providerlogin.php");
    die();
}
