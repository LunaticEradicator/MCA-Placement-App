<?php

function getProviderUser($pdo, $providerUsername)
{
    $query = "SELECT * FROM providers WHERE username = :providerUsername;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":providerUsername", $providerUsername);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
