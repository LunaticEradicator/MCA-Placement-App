<?php
function searchItems($pdo, $studentSearch)
{
    $stmt = $pdo->prepare("SELECT * FROM students WHERE username LIKE :studentSearch");
    $stmt->execute(['studentSearch' => "%" . $studentSearch . "%"]);

    // Return the results as an associative array
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
