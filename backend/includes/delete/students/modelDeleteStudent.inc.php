<?php
function deleteUser($pdo, $studentId)
{
    try {
        // SQL query to delete user by student ID
        $stmt = $pdo->prepare("DELETE FROM students WHERE id = :studentId");
        $stmt->bindParam(':studentId', $studentId);
        $stmt->execute();
    } catch (PDOException $e) {
        die("Error deleting the user: " . $e->getMessage());
    }
}
