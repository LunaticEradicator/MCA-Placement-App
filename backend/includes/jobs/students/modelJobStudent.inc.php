<?php
function getAllJobListings($pdo)
{
    try {
        // SQL query to fetch all job listings along with the company name from the providers table
        $sql = "SELECT jl.*, p.company  
                FROM job_listings jl
                JOIN providers p ON jl.provider_id = p.id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        // Return the results as an associative array
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        // Handle any errors
        die("Error fetching job listings: " . $e->getMessage());
    }
}
