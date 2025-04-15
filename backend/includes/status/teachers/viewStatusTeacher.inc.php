<?php

require_once __DIR__ . '/../../logout/teachers/viewLogoutTeacher.inc.php';
require_once __DIR__ . '/../../login/teachers/viewLoginTeacher.inc.php';
require_once __DIR__ . './modelStatusTeacher.inc.php';

function viewAllStudentJobStatusesForTeacher()
{
    if (!isset($_SESSION["teacherId"])) {
        echo "<p style='text-align:center; color: red;'>You must be logged in as a teacher to view student job statuses.</p>";
        return;
    }

    $statuses = getStudentJobStatuses($GLOBALS["pdo"]);

    echo '
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Student Job Statuses</title>
        <link rel="stylesheet" href="/MCA-Placement-App/backend/css/first.css">
        <link rel="stylesheet" href="/MCA-Placement-App/backend/css/teacherlanding.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

        <style>
            body {
                font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
                background-color: #f4f7fc;
                color: #333;
                margin: 0;
                padding: 0;
            }

            header {
                background-color: #4B1248;
                color: white;
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            .logo a {
                color: white;
                text-decoration: none;
                // font-size: 22px;
                font-weight: bold;
                display: flex;
                align-items: center;
            }

            .logo a i {
                margin-right: 8px;
            }

            .nav-icons a {
                color: white;
                text-decoration: none;
                // margin-left: 20px;
                // font-size: 18px;
                display: inline-flex;
                align-items: center;
            }

            .nav-icons a i {
                margin-right: 5px;
            }

            .nav-item {
                transition: color 0.3s ease;
            }

            .nav-item:hover {
                color: #ffe600;
            }

            h2 {
                text-align: center;
                margin-top: 30px;
                color: #333;
                font-size: 28px;
                font-weight: 600;
            }

            .table-wrapper {
                margin: 30px auto;
                width: 90%;
                max-width: 1200px;
                border-radius: 12px;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
                background-color: #fff;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                table-layout: fixed;
                border-radius: 12px;
                overflow: hidden;
            }

            th, td {
                padding: 12px 15px;
                text-align: left;
                border: 1px solid #ddd;
                word-wrap: break-word;
                word-break: break-word;
            }

            th {
                background-color: #4B1248;
                color: white;
                text-transform: uppercase;
            }

            tr:nth-child(even) {
                background-color: #f9f9f9;
            }

            tr:hover {
                background-color: #f1f1f1;
                cursor: pointer;
            }

            td {
                color: #555;
            }

            @media (max-width: 768px) {
                table {
                    width: 100%;
                    font-size: 14px;
                }

                .nav-icons a {
                    font-size: 16px;
                }

                h2 {
                    font-size: 24px;
                }
            }
        </style>
    </head>
    <body>

    <header class="header">
        <div class="logo">
            <a href="/MCA-Placement-App/backend/teacher.php" class="nav-item">
                <i class="fas fa-home"></i>
                <span>Home</span>
            </a>
        </div>
        <nav class="nav-icons">
            <a href="/MCA-Placement-App/backend/teacher_profile.php" class="nav-item">
                <i class="fas fa-user"></i>
                <span>Profile</span>
            </a>
            <a href="logout.php" class="nav-item">';
    teacherLogout(); // Display logout
    echo '
            </a>
        </nav>
    </header>
    ';

    teacherLoginHeader(); // Display login header

    echo '<h2>Student Job Application Statuses</h2>';

    if (empty($statuses)) {
        echo "<p style='text-align:center; color: red;'>No job statuses found for students.</p>";
    } else {
        echo '<div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>Student Name</th>
                            <th>Roll No</th>
                            <th>Job Title</th>
                            <th>Company</th>
                            <th>Status</th>
                            <th>Decision Date</th>
                        </tr>
                    </thead>
                    <tbody>';

        foreach ($statuses as $status) {
            $color = match ($status['decision']) {
                'Accepted' => '#4CAF50',
                'Rejected' => '#f44336',
                'Pending'  => '#FFC107',
                default    => '#999',
            };

            echo '<tr>
                    <td>' . htmlspecialchars($status['student_name']) . '</td>
                    <td>' . htmlspecialchars($status['rollno']) . '</td>
                    <td>' . htmlspecialchars($status['job_title']) . '</td>
                    <td>' . htmlspecialchars($status['company']) . '</td>
                    <td style="color: ' . $color . '; font-weight: bold;">' . htmlspecialchars($status['decision']) . '</td>
                    <td>' . date("d M Y", strtotime($status['decision_date'])) . '</td>
                  </tr>';
        }

        echo '</tbody>
            </table>
        </div>';
    }

    echo '
    <footer>
        <p style="text-align:center;">&copy; 2025 Placement Cell. All rights reserved.</p>
    </footer>
    </body>
    </html>';
}

viewAllStudentJobStatusesForTeacher();
