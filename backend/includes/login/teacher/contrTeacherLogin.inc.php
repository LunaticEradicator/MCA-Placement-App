<?php
require_once("../dbh.inc.php"); // Database connection
require_once("../configSession.inc.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $teacherUsername = $_POST["teacherName"];
    $teacherPassword = $_POST["teacherPassword"];

    require_once("./modelTeacher.inc.php");
    require_once("./teacherQuery.inc.php");

    try {
        $result = getTeacherUsers($pdo, $teacherUsername);

        // Error Handlers          
        $errors = [];
        if (isInputEmpty($teacherUsername, $teacherPassword)) {
            $errors["emptyField"] = "Fill all the fields.";
        }

        if (isTeacherUsernameWrong($result)) {
            $errors["usernameWrong"] = "Username Not Found.";
        }

        if (!isTeacherUsernameWrong($result) && isTeacherPasswordWrong($result, $teacherPassword)) {
            $errors["userPasswordWrong"] = "Incorrect Password.";
        }

        // Redirect if there are errors
        if ($errors) {
            $_SESSION["loginErrors"] = $errors;
            header("Location: ../../teacherLogin.php");
            die();
        }

        // Session Handling
        $newSessionId = session_create_id();
        $concatSessionId = $newSessionId . "_" . $result["id"];
        session_id($concatSessionId);

        $_SESSION["teacherId"] = $result["id"];
        $_SESSION["teacherUsername"] = htmlspecialchars($result["username"]);
        $_SESSION["teacherDept"] = htmlspecialchars($result["department"]);
        $_SESSION["last_regeneration"] = time();

        header("Location: ../../dashboard.php?login=success");
        $pdo = null;
        $stmt = null;
        die();
    } catch (PDOException $e) {
        die("Cannot Fetch the query: " . $e->getMessage());
    }
} else {
    header("Location: ../../teacherLogin.php");
    die();
}
?>
