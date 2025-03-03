<?php
require_once("../dbh.inc.php"); # connect to db code
require_once("../configSession.inc.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $studentUsername =  $_POST["studentName"];
    $studentPassword = $_POST["studentPassword"];

    require_once("./modelLogin.inc.php");
    require_once("./viewLogin.inc.php");
    require_once("./contrLogin.inc.php");
    try {
        $result = getStudentUsers($pdo, $studentUsername);

        // Error Handlers          
        $errors = [];
        if (isInputEmpty($studentUsername, $studentPassword)) {
            $errors["emptyField"] = "Fill all the fields.";
        }

        // if $result is empty => return error
        if (isStudentUsernameWrong($result)) {
            $errors["usernameWrong"] = "Username Not Found.";
        }

        if (!isStudentUsernameWrong($result) && isStudentPasswordWrong($result)) {
            $errors["userPasswordWrong"] = "Password Not Found.";
        }

        // session start with better security config
        if ($errors) {
            $_SESSION["loginErrors"] = $errors;
            header("Location: ../../index.php");
            die(); //terminate code if there is an error message
        }
        $newSessionId = session_create_id();
        $concatSessionId = $newSessionId . "_" . $result["id"];
        session_id($concatSessionId);

        $_SESSION["studentId"] = $result["id"];
        $_SESSION["studentUsername"] = htmlspecialchars($result["username"]);
        $_SESSION["studentRollno"] = htmlspecialchars($result["rollno"]);
        $_SESSION["last_regeneration"] =  time();

        header("Location: ../../index.php?login=success");
        echo $result;


        $pdo = null;
        $stmt = null;
        die();
    } catch (PDOException $e) {
        die("Cannot Fetch the query:" . $e->getMessage());
    }
} else {
    header("Location: ../../index.php");
    die();
}
