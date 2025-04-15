<?php

require_once __DIR__ . '/../../dbh.inc.php'; // Ensure this points to your PDO connection file

function getStudentsStatusByCompany()
{
    global $pdo;

    if (!isset($_SESSION['providerId'])) {
        return [];
    }

    $providerId = $_SESSION['providerId'];

    $sql = "SELECT 
                sjd.*, 
                s.username AS student_name, 
                s.rollno,
                jl.job_title,
                p.company AS company_name
            FROM student_job_decisions sjd
            JOIN students s ON sjd.student_id = s.id
            JOIN job_listings jl ON sjd.job_id = jl.job_id
            JOIN providers p ON jl.provider_id = p.id
            WHERE p.id = :providerId  -- Only this provider
            ORDER BY sjd.decision_date DESC";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':providerId', $providerId, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
