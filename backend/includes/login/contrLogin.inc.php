<?php

function isInputEmpty($studentEmail, $studentPassword)
{
    if (empty($studentEmail) || empty($studentPassword)) {
        return true;
    } else {
        return false;
    }
}

//  if there is an error return true
function isStudentUsernameWrong($result)
{
    if (!$result) {
        return true;
    } else {
        return false;
    }
}

//  if there is an error return true
function isStudentPasswordWrong($result)
{
    if (!$result) {
        return true;
    } else {
        return false;
    }
}
