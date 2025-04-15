<?php

function isInputEmpty($studentUsername, $studentRollno, $studentEmail, $studentPhone, $studentCgpa, $studentBacklogs)
{
    if (
        empty($studentUsername) || empty($studentEmail)
        || empty($studentRollno) || empty($studentPhone) || empty($studentCgpa) || empty($studentBacklogs)
    ) {
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
    if (getStudentUsersById($pdo, $studentUsername)) { // function from model file
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
