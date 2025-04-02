<?php
require_once 'providersdbh.inc.php';

function deleteProvider($pdo, $username) {
    $query = "DELETE FROM providers WHERE username = :username";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    return $stmt->execute();
}
