<?php
require_once 'providersdbh.inc.php';

function updateProvider($pdo, $id, $username, $company, $email, $phone) {
    $query = "UPDATE providers SET username=?, company=?, email=?, phone=? WHERE id=?";
    $stmt = $pdo->prepare($query);
    return $stmt->execute([$username, $company, $email, $phone, $id]);
}
