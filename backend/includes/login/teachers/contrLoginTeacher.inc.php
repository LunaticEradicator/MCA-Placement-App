<?php

function isInputEmpty($teacherEmail, $teacherPassword)
{
    if (empty($teacherEmail) || empty($teacherPassword)) {
        return true;
    } else {
        return false;
    }
}

//  if there is an error return true
function isTeacherUsernameWrong($result)
{
    if (!$result) {
        return true;
    } else {
        return false;
    }
}

//  if there is an error return true
function isTeacherPasswordWrong($teacherPassword, $result)
{
    // If result is empty, no user was found
    if (!$result) {
        return true;  // User not found
    }

    // Check if the entered password matches the hashed password stored in the database
    // if (!password_verify($studentPassword, $result['password'])) {
    //     return true;  // Password doesn't match
    // }
    if ($teacherPassword !== $result['passwords']) {
        return true;  // Password doesn't match
    }
    return false;  // Password is correct
}
