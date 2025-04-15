<?php

function isInputEmpty($teacherUsername, $teacherEmail, $teacherPhone)
{
    if (
        empty($teacherUsername) || empty($teacherEmail)
        || empty($teacherPhone)
    ) {
        return true;
    } else {
        return false;
    }
}
function isValidEmail($teacherEmail)
{
    // if the email is not valid 
    if (!filter_var($teacherEmail, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

function isUsernameTaken($pdo, $teacherUsername)
{
    if (getTeacherUsers($pdo, $teacherUsername)) { // function from model file
        return true; // return an error
    } else {
        return false;
    }
}

function isEmailTaken($pdo, $teacherEmail)
{
    if (getTeacherEmail($pdo, $teacherEmail)) { // function from mode file
        return true; // return an error
    } else {
        return false;
    }
}
function isPhoneTaken($pdo, $teacherPhone)
{
    if (getTeacherPhone($pdo, $teacherPhone)) { // function from mode file
        return true; // return an error
    } else {
        return false;
    }
}
