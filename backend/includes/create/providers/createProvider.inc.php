<?php
// session_start();
require_once("../../dbh.inc.php"); # connect to db code
require_once("../../providersConfigSession.inc.php");

// echo ("Wroking");
// $jobTitle, $jobDesc, $jobEmail, $jobLocation, $jobSkill
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // echo ("Wroking sinside post");

    $jobTitle =  $_POST["jobTitle"];
    $jobDesc = $_POST["jobDesc"];
    $jobEmail = $_POST["jobEmail"];
    $jobLocation = $_POST["jobLocation"];
    $jobSkill = $_POST["jobSkill"];


    try {
        require_once("./modelCreateProvider.inc.php");
        require_once("./viewCreateProvider.inc.php");
        require_once("./contrCreateProvider.inc.php");

        // Error Handlers          
        $errors = [];
        if (isInputEmpty($jobTitle, $jobDesc, $jobEmail, $jobSkill, $jobLocation)) {
            $errors["emptyField"] = "Fill all the fields.";
        }
        if (isValidEmail($jobEmail)) {
            $errors["invalidEmail"] = "Enter a valid email.";
        }

        // session start with better security config
        if ($errors) {
            $_SESSION["createErrors"] = $errors;
            $_SESSION["reSignUpData"] = [
                'jobTitle' => $jobTitle,
                'jobDesc' => $jobDesc,
                'jobEmail' => $jobEmail,
                'jobLocation' => $jobLocation,
                'jobSkill' => $jobSkill,
            ];
            echo ("Error");
            header("Location: ../../../provider_post.php");
            die(); //terminate code if there is an error message
        }

        // create users  
        createUser($pdo, $jobTitle, $jobDesc, $jobEmail, $jobLocation, $jobSkill, $providerId);
        $pdo = null;
        $stmt = null;

        header("Location: ../../../provider.php?create=success");
        die();
    } catch (PDOException $e) {
        die("Cannot Fetch the query:" . $e->getMessage());
    }
} else {
    if (isset($_SESSION["createErrors"])) {
        unset($_SESSION["createErrors"]);
    }
    if (isset($_SESSION["reSignUpData"])) {
        unset($_SESSION["reSignUpData"]);
    }
    header("Location: ../../../provider_post.php");
    die();
}
