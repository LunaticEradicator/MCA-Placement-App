<?php
// Error Handler Functions
function isInputEmpty($teacherUsername, $teacherEmail, $teacherPassword, $teacherPhone, $teacherDept)
{
    return empty($teacherUsername) || empty($teacherEmail) || empty($teacherPassword) || empty($teacherPhone) || empty($teacherDept);
}

function isValidEmail($teacherEmail)
{
    return !filter_var($teacherEmail, FILTER_VALIDATE_EMAIL);
}

function isUsernameTaken($pdo, $teacherUsername)
{
    return getTeacherUsers($pdo, $teacherUsername);
}

function isEmailTaken($pdo, $teacherEmail)
{
    return getTeacherEmail($pdo, $teacherEmail);
}

function isPhoneTaken($pdo, $teacherPhone)
{
    return getTeacherPhone($pdo, $teacherPhone);
}

// Signup Helper Function
function createTeacherUser($pdo, $teacherUsername, $teacherEmail, $teacherPassword, $teacherPhone, $teacherDept)
{
    setTeacherUsers($pdo, $teacherUsername, $teacherEmail, $teacherPassword, $teacherPhone, $teacherDept);
}
?>
