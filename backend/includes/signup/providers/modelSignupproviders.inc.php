<?php

function createProvider($pdo, $username, $company, $email, $phone, $passwordHash)
{
    $query = "INSERT INTO providers (username, company, email, phone, passwords, createdAt) 
              VALUES (:username, :company, :email, :phone, :passwords, NOW())";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":company", $company);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":phone", $phone);
    $stmt->bindParam(":passwords", $passwordHash);

    return $stmt->execute();
}

function isUsernameTaken($pdo, $username)
{
    $query = "SELECT * FROM providers WHERE username = :username";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}
