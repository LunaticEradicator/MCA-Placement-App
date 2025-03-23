<?php

function isInputEmpty($providerUsername, $providerPassword)
{
    return empty($providerUsername) || empty($providerPassword);
}

function isProviderUsernameWrong($result)
{
    return !$result;
}

function isProviderPasswordWrong($result, $providerPassword)
{
    return !password_verify($providerPassword, $result["passwords"]);
}
