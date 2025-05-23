<?php

function isInputEmpty($providerEmail, $providerPassword)
{
    if (empty($providerEmail) || empty($providerPassword)) {
        return true;
    } else {
        return false;
    }
}

//  if there is an error return true
function isProviderUsernameWrong($result)
{
    if (!$result) {
        return true;
    } else {
        return false;
    }
}

//  if there is an error return true
function isProviderPasswordWrong($providerPassword, $result)
{
    // If result is empty, no user was found
    if (!$result) {
        return true;  // User not found
    }

    // Check if the entered password matches the hashed password stored in the database
    // if (!password_verify($studentPassword, $result['password'])) {
    //     return true;  // Password doesn't match
    // }
    if ($providerPassword !== $result['passwords']) {
        return true;  // Password doesn't match
    }
    return false;  // Password is correct
}
