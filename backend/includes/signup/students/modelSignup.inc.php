// <!-- query file -->
<?php

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

function setUsers($pdo, $studentUsername, $studentRollno, $studentEmail, $studentPassword, $studentPhone, $studentCgpa, $studentBacklogs)
{
    $query = "INSERT INTO students (username,rollno,email,phone,passwords,cgpa,backlogs) 
    VALUES (:studentName, :studentRollno, :studentEmail,:studentPhone,:studentPassword,:studentBacklogs,:studentCgpa);";
    $stmt = $pdo->prepare($query);


    $stmt->bindParam(":studentName", $studentUsername);
    $stmt->bindParam(":studentRollno", $studentRollno);
    $stmt->bindParam(":studentEmail", $studentEmail);
    $stmt->bindParam(":studentPhone", $studentPhone);
    $stmt->bindParam(":studentBacklogs", $studentBacklogs);
    $stmt->bindParam(":studentCgpa", $studentCgpa);
    $stmt->bindParam(":studentPassword", $studentPassword);
    // $stmt->bindParam(":studentPassword", hashedPassword($studentPassword)); // hashed password
    $stmt->execute();
}

// function hashedPassword($studentPassword)
// {
//     $hashOptions = [];
//     $hashOptions['cost'] = 12;
//     $hashedPassword = password_hash($studentPassword, PASSWORD_BCRYPT, $hashOptions);

//     return $hashedPassword;
// }
