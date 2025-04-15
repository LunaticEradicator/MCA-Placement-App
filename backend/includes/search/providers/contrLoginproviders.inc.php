<?php

function isInputEmpty($providerUsername, $providerPassword)
{
    if (empty($providerUsername) || empty($providerPassword)) {
        return true;
    } else {
        return false;
    }
}

function isProviderUsernameWrong($result)
{
    if (!$result) {
        return true;
    } else {
        return false;
    }
}

function isProviderPasswordWrong($providersPassword, $result)
{
    // If result is empty, no user was found
    if (!$result) {
        return true;  // User not found
    }

    if ($providersPassword !== $result['passwords']) {
        return true;  // Password doesn't match
    }

    return false;  // Password is correct
}
