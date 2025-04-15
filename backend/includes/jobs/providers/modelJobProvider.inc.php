<?php

require_once __DIR__ . '/../../dbh.inc.php';

function getProviderJobListings()
{
    global $pdo;

    if (!isset($_SESSION['providerId'])) {
        return []; // No listings if not logged in
    }

    $providerId = $_SESSION['providerId'];

    $sql = "SELECT 
                jl.*, 
                p.username AS provider_username, 
                p.company AS provider_company  -- Renaming to provider_company
            FROM job_listings jl
            JOIN providers p ON jl.provider_id = p.id
            WHERE jl.provider_id = :providerId";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':providerId', $providerId, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
