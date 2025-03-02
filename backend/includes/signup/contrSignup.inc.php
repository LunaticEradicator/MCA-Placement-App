<?php
// Error Handler Helper function
function isInputEmpty($studentUsername, $studentRollno, $studentEmail, $studentPassword, $studentPhone)
{
    if (empty($studentUsername) || empty($studentEmail) || empty($studentPassword) || empty($studentRollno) || empty($studentPhone)) {
        return true;
    } else {
        return false;
    }
}

function isValidEmail($studentEmail)
{
    // if the email is not valid 
    if (!filter_var($studentEmail, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

function isUsernameTaken($pdo, $studentUsername)
{
    if (getStudentUsers($pdo, $studentUsername)) { // function from mode file
        return true; // return an error
    } else {
        return false;
    }
}

function isEmailTaken($pdo, $studentEmail)
{
    if (getStudentEmail($pdo, $studentEmail)) { // function from mode file
        return true; // return an error
    } else {
        return false;
    }
}
function isPhoneTaken($pdo, $studentPhone)
{
    if (getStudentPhone($pdo, $studentPhone)) { // function from mode file
        return true; // return an error
    } else {
        return false;
    }
}
function isRollNoTaken($pdo, $studentRollno)
{
    if (getStudentRollNo($pdo, $studentRollno)) { // function from mode file
        return true; // return an error
    } else {
        return false;
    }
}

//Signin Helper function
function createUser($pdo, $studentUsername, $studentRollno, $studentEmail, $studentPassword, $studentPhone)
{
    setUsers($pdo, $studentUsername, $studentRollno, $studentEmail, $studentPassword, $studentPhone);
};
