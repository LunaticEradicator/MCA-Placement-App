<?php

require_once __DIR__ . '/modelStatusProvider.inc.php'; // Include the model to access the data

function viewStudentJobStatus()
{
    $statuses = getStudentsStatusByCompany();

    echo "<h2 style='text-align:center; margin: 40px 0 20px; font-family: \"Segoe UI\", Tahoma, Geneva, Verdana, sans-serif; color: #2c3e50;'>Student Job Applications for Your Company</h2>";

    if (empty($statuses)) {
        echo "<p style='text-align:center; color: #e74c3c; font-size: 18px;'>No student job applications found for your company.</p>";
        return;
    }

    // Table wrapper for responsiveness
    echo "<div style='overflow-x: auto; width: 95%; margin: auto;'>";

    echo "<table style='width: 100%; border-collapse: collapse; font-family: \"Segoe UI\", Tahoma, Geneva, Verdana, sans-serif; box-shadow: 0 2px 10px rgba(0,0,0,0.1); border-radius: 6px; overflow: hidden;'>";
    echo "<thead>
            <tr style='background-color: #34495e; color: white; text-transform: uppercase; font-size: 14px;'>
                <th style='padding: 12px 10px;'>Student Name</th>
                <th>Roll No</th>
                <th>Job Title</th>
                <th>Company</th>
                <th>Status</th>
                <th>Decision Date</th>
            </tr>
          </thead>
          <tbody>";

    foreach ($statuses as $status) {
        $color = match ($status['decision']) {
            'Accepted' => '#2ecc71',
            'Rejected' => '#e74c3c',
            'Pending'  => '#f1c40f',
            default    => '#7f8c8d',
        };

        echo "<tr style='text-align: center; font-size: 15px; background-color: white; border-bottom: 1px solid #ecf0f1; transition: background 0.3s ease;' 
                  onmouseover='this.style.backgroundColor=\"#f9f9f9\"' 
                  onmouseout='this.style.backgroundColor=\"white\"'>";

        echo "<td style='padding: 12px 10px;'>{$status['student_name']}</td>";
        echo "<td>{$status['rollno']}</td>";
        echo "<td>{$status['job_title']}</td>";
        echo "<td>{$status['company_name']}</td>";
        echo "<td style='color: $color; font-weight: bold;'>{$status['decision']}</td>";
        echo "<td>" . date("d M Y", strtotime($status['decision_date'])) . "</td>";
        echo "</tr>";
    }

    echo "</tbody></table>";
    echo "</div>";
}
