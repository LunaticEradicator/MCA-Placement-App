<?php
function getAllJobOffers($pdo)
{
    $sql = "SELECT jl.job_id, jl.job_title, jl.job_description, jl.location, jl.required_skills, 
                   jl.contact_email, p.company 
            FROM job_listings jl
            LEFT JOIN providers p ON jl.provider_id = p.id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
