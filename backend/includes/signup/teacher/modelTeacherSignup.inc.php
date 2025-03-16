<?php
function getTeacherUsers($pdo, $teacherUsername)
{
    $query = "SELECT username FROM teachers WHERE username = :teacherUsername;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":teacherUsername", $teacherUsername);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getTeacherEmail($pdo, $teacherEmail)
{
    $query = "SELECT email FROM teachers WHERE email = :teacherEmail;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":teacherEmail", $teacherEmail);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getTeacherPhone($pdo, $teacherPhone)
{
    $query = "SELECT phone FROM teachers WHERE phone = :teacherPhone;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":teacherPhone", $teacherPhone);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function setTeacherUsers($pdo, $teacherUsername, $teacherEmail, $teacherPassword, $teacherPhone, $teacherDept)
{
    $query = "INSERT INTO teachers (username, email, phone, passwords, department) VALUES (:teacherName, :teacherEmail, :teacherPhone, :teacherPassword, :teacherDept);";
    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":teacherName", $teacherUsername);
    $stmt->bindParam(":teacherEmail", $teacherEmail);
    $stmt->bindParam(":teacherPhone", $teacherPhone);
    $stmt->bindParam(":teacherPassword", password_hash($teacherPassword, PASSWORD_BCRYPT)); // Hash password
    $stmt->bindParam(":teacherDept", $teacherDept);
    $stmt->execute();
}
?>
