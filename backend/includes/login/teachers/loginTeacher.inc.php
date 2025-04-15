<?php
require_once("../../dbh.inc.php"); # connect to db code
require_once("../../teachersConfigSession.inc.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $teacherUsername =  $_POST["teacherUsername"];
    $teacherPassword = $_POST["teacherPassword"];

    require_once("./modelTeachers.inc.php");
    require_once("./viewLoginTeacher.inc.php");
    require_once("./contrLoginTeacher.inc.php");
    try {
        $result = getTeacherUser($pdo, $teacherUsername);

        // Error Handlers          
        $errors = [];
        if (isInputEmpty($teacherUsername, $teacherPassword)) {
            $errors["emptyField"] = "Fill all the fields.";
        }

        if (!isInputEmpty($teacherUsername, $teacherPassword)) {
            // if $result is empty => return error
            if (isTeacherUsernameWrong($result)) {
                $errors["usernameWrong"] = "Username Not Found.";
            }

            if (isTeacherPasswordWrong($teacherPassword, $result)) {
                $errors["userPasswordWrong"] = "Password doesn't match.";
            }
        }


        // session start with better security config
        if ($errors) {
            $_SESSION["loginErrors"] = $errors;
            header("Location: ../../../teacherlogin.php");
            die(); //terminate code if there is an error message
        } else {
            $newSessionId = session_create_id();
            $concatSessionId = $newSessionId . "_" . $result["id"];
            session_id($concatSessionId);

            $_SESSION["teacherId"] = $result["id"];
            $_SESSION["teacherUsername"] = htmlspecialchars($result["username"]);
            $_SESSION["teacherEmail"] = htmlspecialchars($result["email"]);
            $_SESSION["teacherPhone"] = htmlspecialchars($result["phone"]);
            $_SESSION["last_regeneration"] =  time();

            header("Location: ../../../teacher.php?login=success");
            echo $result;


            $pdo = null;
            $stmt = null;
            die();
        }
    } catch (PDOException $e) {
        die("Cannot Fetch the query:" . $e->getMessage());
    }
} else {
    header("Location: ../../../teacherlogin.php");
    die();
}
