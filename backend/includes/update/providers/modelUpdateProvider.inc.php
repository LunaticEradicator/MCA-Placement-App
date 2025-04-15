<?php
function getProviderUsersById($pdo, $userId)
{
    $sql = "SELECT * FROM providers WHERE id = :userId";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getProviderUsers($pdo, $providerUsername)
{
    $query = "SELECT username from providers WHERE username = :providerUsername; ";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":providerUsername", $providerUsername);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function getProviderEmail($pdo, $providerEmail)
{
    $query = "SELECT email from providers WHERE email = :providerEmail; ";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":providerEmail", $providerEmail);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function getProviderPhone($pdo, $providerPhone)
{
    $query = "SELECT phone from providers WHERE phone = :providerPhone; ";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":providerPhone", $providerPhone);
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

function updateUser($pdo, $userId, $username, $company, $email, $passwords, $phone)
{
    // Always hash the password before updating it
    // $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "UPDATE providers 
    SET username = :username, company = :company, email = :email, passwords = :passwords, phone = :phone
    WHERE id = :userId";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->bindParam(':company', $company, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':passwords', $passwords, PDO::PARAM_STR);
    $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);

    if ($stmt->execute()) {
        return true;
    } else {
        throw new Exception("Error updating user information.");
    }
}

function updateUserWithoutPassword($pdo, $userId, $username, $company, $email, $phone)
{
    $sql = "UPDATE providers SET username = ?, company = ?, email = ?, phone = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username, $company, $email, $phone, $userId]);
}
