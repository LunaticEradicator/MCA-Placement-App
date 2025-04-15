<?php

function displayJobListings($jobListings, $studentId, $pdo)
{
    // Inline CSS for better styling
    echo '<style>
    body {
        font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f4f6f8;
        color: #333;
    }

    h1 {
        text-align: center;
        color: #007bff;
        // margin: 40px 0 20px;
    }

    form {
        text-align: center;
        // margin-bottom: 20px;
    }

    input[type="text"] {
        padding: 10px 14px;
        width: 280px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 16px;
    }

    button {
        padding: 10px 16px;
        margin-left: 8px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 6px;
        font-size: 15px;
        cursor: pointer;
        transition: background-color 0.2s ease;
    }

    button:hover {
        background-color: #0056b3;
    }

    table {
        width: 95%;
            margin: 20px 40px;
        border-collapse: collapse;
        background-color: white;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
        border-radius: 10px;
        overflow: hidden;
    }

    th, td {
        padding: 16px 20px;
        text-align: left;
        border-bottom: 1px solid #e1e4e8;
    }

    th {
        background-color: #343a40;
        color: white;
        text-transform: uppercase;
        font-size: 14px;
        letter-spacing: 0.5px;
    }

    tr:hover {
        background-color: #f0f4f8;
    }

    tr:nth-child(even) {
        background-color: #fafbfc;
    }

    .status-open {
        color: #007bff;
        font-weight: bold;
    }

    .status-accepted {
        color: #28a745;
        font-weight: bold;
    }

    .status-rejected {
        color: #dc3545;
        font-weight: bold;
    }

    .action-buttons {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        align-items: center;
    }

    .action-buttons form {
        display: flex;
        gap: 8px;
        margin: 0;
    }

    .action-buttons .accept-btn {
        background-color: #28a745;
    }

    .action-buttons .reject-btn {
        background-color: #dc3545;
    }

    .action-buttons button {
        padding: 8px 14px;
        font-size: 14px;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background 0.2s ease-in-out;
    }

    .action-buttons button:hover:not(:disabled) {
        filter: brightness(1.1);
    }

    .action-buttons button:disabled {
        background-color: #6c757d;
        cursor: not-allowed;
    }

    .available-jobs {
        height: 100vh;
        margin: 20px 0px;
    }

    @media (max-width: 768px) {
        table, th, td {
            font-size: 14px;
        }

        .action-buttons {
            flex-direction: column;
            align-items: flex-start;
        }

        .action-buttons button {
            width: 100%;
        }

        input[type="text"] {
            width: 90%;
            margin-bottom: 10px;
        }
    }
</style>';


    echo "<h1>Available Job Listings</h1>";

    // Display the search form
    echo '<form method="GET" action=""> 
            <input type="text" name="search" placeholder="Search by job title, company, or location">
            <button type="submit">Search</button>
          </form>';

    // If there's a search term, fetch filtered job listings
    if (isset($_GET['search'])) {
        $searchTerm = $_GET['search'];
        $jobListings = searchJobListings($searchTerm, $pdo);
    }

    // Check if job listings are available
    if (empty($jobListings)) {
        echo "<p style='text-align: center;'>No job listings available at the moment.</p>";
    } else {
        echo "<table>
                <thead>
                    <tr>
                        <th>Job Title</th>
                        <th>Company</th>
                        <th>Location</th>
                        <th>Required Skills</th>
                        <th>Contact Email</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>";

        foreach ($jobListings as $job) {
            $sql = "SELECT decision FROM student_job_decisions WHERE student_id = :studentId AND job_id = :jobId";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':studentId', $studentId, PDO::PARAM_INT);
            $stmt->bindParam(':jobId', $job['job_id'], PDO::PARAM_INT);
            $stmt->execute();
            $studentDecision = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($studentDecision) {
                $status = $studentDecision['decision'];
                $buttonsDisabled = true;
                $statusClass = $status === 'Accepted' ? 'status-accepted' : 'status-rejected';
            } else {
                $status = "Open";
                $buttonsDisabled = false;
                $statusClass = 'status-open';
            }

            echo "<tr>
                    <td>" . htmlspecialchars($job['job_title']) . "</td>
                    <td>" . htmlspecialchars($job['company']) . "</td>
                    <td>" . htmlspecialchars($job['location']) . "</td>
                    <td>" . htmlspecialchars($job['required_skills']) . "</td>
                    <td>" . htmlspecialchars($job['contact_email']) . "</td>
                    <td class='" . $statusClass . "'>" . htmlspecialchars($status) . "</td>";

            echo "<td class='action-buttons'>";
            if ($buttonsDisabled) {
                echo "<button disabled>Applied</button>";
            } else {
                echo "<form method='POST' action='./includes/jobs/students/decisionJobStudent.inc.php'>
                        <input type='hidden' name='job_id' value='" . $job['job_id'] . "' />
                        <button type='submit' name='decision' value='Accepted' class='accept-btn'>Accept</button>
                        <button type='submit' name='decision' value='Rejected' class='reject-btn'>Reject</button>
                      </form>";
            }
            echo "</td></tr>";
        }

        echo "</tbody></table>";
    }
}
