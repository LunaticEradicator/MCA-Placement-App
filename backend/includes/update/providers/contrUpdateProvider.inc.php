<?php

function isInputEmpty($providerUsername, $providerCompany, $providerEmail, $providerPhone)
{
    if (
        empty($providerUsername) || empty($providerEmail)
        || empty($providerCompany) || empty($providerPhone)
    ) {
        return true;
    } else {
        return false;
    }
}
function isValidEmail($providerEmail)
{
    // if the email is not valid 
    if (!filter_var($providerEmail, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

function isUsernameTaken($pdo, $providerUsername)
{
    if (getProviderUsers($pdo, $providerUsername)) { // function from model file
        return true; // return an error
    } else {
        return false;
    }
}

function isEmailTaken($pdo, $providerEmail)
{
    if (getProviderEmail($pdo, $providerEmail)) { // function from mode file
        return true; // return an error
    } else {
        return false;
    }
}
function isPhoneTaken($pdo, $providerPhone)
{
    if (getProviderPhone($pdo, $providerPhone)) { // function from mode file
        return true; // return an error
    } else {
        return false;
    }
}
function isCompanyTaken($pdo, $providerCompany)
{
    if (getProviderCompany($pdo, $providerCompany)) { // function from mode file
        return true; // return an error
    } else {
        return false;
    }
}
