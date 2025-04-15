<?php

function isInputEmpty($teacherEmail, $teacherPassword)
{
    return empty($teacherEmail) || empty($teacherPassword);
}

function isTeacherUsernameWrong($result)
{
    return !$result;
}

function isTeacherPasswordWrong($result, $teacherPassword)
{
    return !password_verify($teacherPassword, $result["password"]);
}
?>
