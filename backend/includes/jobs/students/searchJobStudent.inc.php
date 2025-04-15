<?php

function searchJobListings($searchTerm, $pdo)
{
    $searchTerm = "%" . $searchTerm . "%"; // Wildcards for LIKE

    $sql = "SELECT * FROM job_listings 
            JOIN providers ON job_listings.provider_id = providers.id
            WHERE job_title LIKE :searchTerm 
               OR company LIKE :searchTerm 
               OR location LIKE :searchTerm 
               OR required_skills LIKE :searchTerm";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':searchTerm', $searchTerm, PDO::PARAM_STR);
    $stmt->execute();
    $jobListings = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // DEBUGGING
    if (empty($jobListings)) {
        echo "No results found for the search term: " . htmlspecialchars($searchTerm) . "<br>";
    } else {
        echo "Found " . count($jobListings) . " results.<br>";
    }

    return $jobListings;
}
