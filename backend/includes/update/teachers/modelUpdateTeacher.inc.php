<?php
function getTeacherUsersById($pdo, $userId)
{
    $sql = "SELECT * FROM teachers WHERE id = :userId";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

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



function updateUser($pdo, $userId, $username, $email, $passwords, $phone)
{
    // Always hash the password before updating it
    // $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "UPDATE teachers 
    SET username = :username, email = :email, passwords = :passwords, phone = :phone
    WHERE id = :userId";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':passwords', $passwords, PDO::PARAM_STR);
    $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);

    if ($stmt->execute()) {
        return true;
    } else {
        throw new Exception("Error updating user information.");
    }
}


function updateUserWithoutPassword($pdo, $userId, $username, $email, $phone)
{
    $sql = "UPDATE teachers SET username = ?, email = ?, phone = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username, $email, $phone, $userId]);
}
