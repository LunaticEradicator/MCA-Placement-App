// <!-- query file -->
<?php

function getProviderUsers($pdo, $providerUsername)
{
    $query = "SELECT username from providers WHERE username = :providerUsername; ";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":providerUsername", $providerUsername);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function getProviderEmail($pdo, $companyEmail)
{
    $query = "SELECT email from providers WHERE email = :companyEmail; ";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":companyEmail", $companyEmail);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function getProviderPhone($pdo, $companyPhone)
{
    $query = "SELECT phone from providers WHERE phone = :companyPhone; ";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":companyPhone", $companyPhone);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function getProviderCompany($pdo, $providerCompany)
{
    $query = "SELECT company from providers WHERE company = :providerCompany; ";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":providerCompany", $providerCompany);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function setUsers($pdo, $providerUsername, $providerCompany, $providerEmail, $providerPassword, $providerPhone)
{
    $query = "INSERT INTO providers (username,company,email,phone,passwords) 
    VALUES (:providerUsername, :providerCompany,:providerEmail,:providerPhone,:providerPassword);";
    $stmt = $pdo->prepare($query);


    $stmt->bindParam(":providerUsername", $providerUsername);
    $stmt->bindParam(":providerCompany", $providerCompany);
    $stmt->bindParam(":providerEmail", $providerEmail);
    $stmt->bindParam(":providerPhone", $providerPhone);
    $stmt->bindParam(":providerPassword", $providerPassword);
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
