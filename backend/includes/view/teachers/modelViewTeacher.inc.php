<?php
require_once __DIR__ . '/../../dbh.inc.php';


function getAllStudents($pdo)
{
    $sql = "SELECT * FROM students";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
