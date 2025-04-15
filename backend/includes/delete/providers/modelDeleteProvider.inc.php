<?php
function deleteUser($pdo, $providerId)
{
    try {
        // SQL query to delete user by student ID
        $stmt = $pdo->prepare("DELETE FROM providers WHERE id = :providerId");
        $stmt->bindParam(':providerId', $providerId);
        $stmt->execute();
    } catch (PDOException $e) {
        die("Error deleting the user: " . $e->getMessage());
    }
}
