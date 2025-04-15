// <!-- query file -->
<?php

function getJobEmail($pdo, $jobEmail)
{
    $query = "SELECT contact_email from job_listings WHERE contact_email = :jobEmail; ";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":jobEmail", $jobEmail);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function setUsers($pdo, $jobTitle, $jobDesc, $jobEmail, $jobLocation, $jobSkill, $providerId)
{
    $query = "INSERT INTO job_listings (job_title,job_description,location,required_skills,contact_email,provider_id) 
    VALUES (:jobTitle, :jobDesc,:jobLocation,:jobSkill,:jobEmail,:providerId);";
    $stmt = $pdo->prepare($query);


    $stmt->bindParam(":jobTitle", $jobTitle);
    $stmt->bindParam(":jobDesc", $jobDesc);
    $stmt->bindParam(":jobLocation", $jobLocation);
    $stmt->bindParam(":jobSkill", $jobSkill);
    $stmt->bindParam(":jobEmail", $jobEmail);
    $stmt->bindParam(":providerId", $providerId, PDO::PARAM_INT);
    // $stmt->bindParam(":studentPassword", hashedPassword($studentPassword)); // hashed password
    $stmt->execute();
}

// function hashedPassword($studentPassword)
// {
//     $hashOptions = [];
//     $hashOptions['cost'] = 12;
//     $hashedPassword = password_hash($studentPassword, PASSWORD_BCRYPT, $hashOptions);

//     return $hashedPassword;
// }
