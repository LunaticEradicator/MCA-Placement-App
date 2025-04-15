<?php
function getStudentUsersById($pdo, $userId)
{
    $sql = "SELECT * FROM students WHERE id = :userId";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getStudentUsers($pdo, $studentUsername)
{
    $query = "SELECT username from students WHERE username = :studentUsername; ";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":studentUsername", $studentUsername);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function getStudentEmail($pdo, $studentEmail)
{
    $query = "SELECT email from students WHERE email = :studentEmail; ";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":studentEmail", $studentEmail);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function getStudentPhone($pdo, $studentPhone)
{
    $query = "SELECT phone from students WHERE phone = :studentPhone; ";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":studentPhone", $studentPhone);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function getStudentRollNo($pdo, $studentRollno)
{
    $query = "SELECT rollno from students WHERE rollno = :studentRollno; ";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":studentRollno", $studentRollno);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function getStudentCgpa($pdo, $studentCgpa)
{
    $query = "SELECT cgpa from students WHERE cgpa = :studentCgpa; ";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":studentCgpa", $studentCgpa);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
function getStudentBacklogs($pdo, $studentBacklogs)
{
    $query = "SELECT backlogs from students WHERE backlogs = :studentBacklogs; ";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":studentBacklogs", $studentBacklogs);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
function updateUser($pdo, $userId, $username, $rollNo, $email, $passwords, $phone, $cgpa, $backlogs)
{

    $sql = "UPDATE students 
    SET username = :username, rollNo = :rollNo, email = :email, passwords = :passwords, phone = :phone ,cgpa =:cgpa,backlogs=:backlogs
    WHERE id = :userId";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->bindParam(':rollNo', $rollNo, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':passwords', $passwords, PDO::PARAM_STR);
    $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
    $stmt->bindParam(':cgpa', $cgpa, PDO::PARAM_STR);
    $stmt->bindParam(':backlogs', $backlogs, PDO::PARAM_STR);

    if ($stmt->execute()) {
        return true;
    } else {
        throw new Exception("Error updating user information.");
    }
}

function updateUserWithoutPassword($pdo, $userId, $username, $rollNo, $email, $phone, $cgpa, $backlogs)
{
    $sql = "UPDATE students SET username = ?, rollNo = ?, email = ?, phone = ?,cgpa = ?, backlogs = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username, $rollNo, $email, $phone, $cgpa, $backlogs, $userId]);
}
