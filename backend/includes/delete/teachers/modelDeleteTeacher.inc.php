<?php
function deleteUser($pdo, $teacherId)
{
    try {
        // SQL query to delete user by student ID
        $stmt = $pdo->prepare("DELETE FROM teachers WHERE id = :teacherId");
        $stmt->bindParam(':teacherId', $teacherId);
        $stmt->execute();
    } catch (PDOException $e) {
        die("Error deleting the user: " . $e->getMessage());
    }
}
