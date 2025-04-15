<?php
require_once __DIR__ . '/../../dbh.inc.php'; // Ensure this points to your PDO connection file
session_start();
function getStudentJobStatuses($pdo)
{
    $sql = "
        SELECT sjd.decision, sjd.decision_date, sjd.student_id, sjd.job_id, s.username AS student_name, s.rollno,
               j.job_title, p.company
        FROM student_job_decisions sjd
        JOIN students s ON sjd.student_id = s.id
        JOIN job_listings j ON sjd.job_id = j.job_id
        JOIN providers p ON j.provider_id = p.id
    ";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
