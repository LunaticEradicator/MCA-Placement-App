<?php
// Error Handler Helper function
function isInputEmpty($jobTitle, $Desc, $jobEmail, $jobLocation, $jobSkill)
{
    if (
        empty($jobTitle) || empty($jobEmail) || empty($jobLocation)
        || empty($Desc) || empty($jobSkill)
    ) {
        return true;
    } else {
        return false;
    }
}

function isValidEmail($jobEmail)
{
    // if the email is not valid 
    if (!filter_var($jobEmail, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}




//Signin Helper function
function createUser($pdo, $jobTitle, $jobDesc, $jobEmail, $jobLocation, $jobSkill, $providerId)
{
    $providerId = $_SESSION['providerId'] ?? null;
    if (!$providerId) {
        throw new Exception("Unauthorized: Provider not logged in.");
    }
    setUsers($pdo, $jobTitle, $jobDesc, $jobEmail, $jobLocation, $jobSkill, $providerId);
};
