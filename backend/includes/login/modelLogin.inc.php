<!-- query file -->
<?php

function getStudentUsers($pdo, $studentUsername)
{
    $query = "SELECT * from students WHERE username = :studentUsername; ";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":studentUsername", $studentUsername);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
