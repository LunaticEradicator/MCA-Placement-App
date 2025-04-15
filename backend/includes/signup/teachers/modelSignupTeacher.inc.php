// <!-- query file -->
<?php

function getTeacherUsers($pdo, $teacherUsername)
{
    $query = "SELECT username from teachers WHERE username = :teacherUsername; ";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":teacherUsername", $teacherUsername);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function getTeacherEmail($pdo, $teacherEmail)
{
    $query = "SELECT email from teachers WHERE email = :teacherEmail; ";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":teacherEmail", $teacherEmail);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function getTeacherPhone($pdo, $teacherPhone)
{
    $query = "SELECT phone from teachers WHERE phone = :teacherPhone; ";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":teacherPhone", $teacherPhone);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}


function setUsers($pdo, $teacherUsername, $teacherEmail, $teacherPassword, $teacherPhone)
{
    $query = "INSERT INTO teachers (username,email,phone,passwords) 
    VALUES (:teacherUsername,:teacherEmail,:teacherPhone,:teacherPassword);";
    $stmt = $pdo->prepare($query);


    $stmt->bindParam(":teacherUsername", $teacherUsername);
    $stmt->bindParam(":teacherEmail", $teacherEmail);
    $stmt->bindParam(":teacherPhone", $teacherPhone);
    $stmt->bindParam(":teacherPassword", $teacherPassword);
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
