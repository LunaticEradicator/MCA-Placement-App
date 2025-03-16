<?php

function getTeacherUsers($pdo, $teacherUsername)
{
    $query = "SELECT * FROM teachers WHERE username = :teacherUsername;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":teacherUsername", $teacherUsername);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
?>
