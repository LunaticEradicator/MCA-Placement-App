<?php
require_once("../../dbh.inc.php"); # connect to db code
require_once("../../configSession.inc.php");

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

        if (!isInputEmpty($studentUsername, $studentPassword)) {
            // if $result is empty => return error
            if (isStudentUsernameWrong($result)) {
                $errors["usernameWrong"] = "Username Not Found.";
            }

            if (isStudentPasswordWrong($studentPassword, $result)) {
                $errors["userPasswordWrong"] = "Password doesn't match.";
            }
        }


        // session start with better security config
        if ($errors) {
            $_SESSION["loginErrors"] = $errors;
            header("Location: ../../../studentlogin.php");
            die(); //terminate code if there is an error message
        } else {
            $newSessionId = session_create_id();
            $concatSessionId = $newSessionId . "_" . $result["id"];
            session_id($concatSessionId);

            $_SESSION["studentId"] = $result["id"];
            $_SESSION["studentUsername"] = htmlspecialchars($result["username"]);
            $_SESSION["studentRollno"] = htmlspecialchars($result["rollNo"]);
            $_SESSION["studentEmail"] = htmlspecialchars($result["email"]);
            $_SESSION["studentPhone"] = htmlspecialchars($result["phone"]);
            $_SESSION["studentCgpa"] = htmlspecialchars($result["cgpa"]);
            $_SESSION["studentBacklogs"] = htmlspecialchars($result["backlogs"]);
            $_SESSION["last_regeneration"] =  time();

            header("Location: ../../../student.php?login=success");
            echo $result;

            $pdo = null;
            $stmt = null;
            die();
        }
    } catch (PDOException $e) {
        die("Cannot Fetch the query:" . $e->getMessage());
    }
} else {
    header("Location: ../../../studentlogin.php");
    die();
}
