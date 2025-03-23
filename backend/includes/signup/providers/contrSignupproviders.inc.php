<?php

function isSignupInputEmpty($username, $company, $email, $phone, $password, $confirmPassword)
{
    return empty($username) || empty($company) || empty($email) || empty($phone) || empty($password) || empty($confirmPassword);
}

function isValidEmail($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function isValidPhone($phone)
{
    return preg_match("/^[0-9]{10}$/", $phone);
}

function isPasswordMismatch($password, $confirmPassword)
{
    return $password !== $confirmPassword;
}
