<?php

require_once __DIR__ . '/../../logout/teachers/viewLogoutTeacher.inc.php';
require_once __DIR__ . '/../../login/teachers/viewLoginTeacher.inc.php';

function viewSAllStudents($students)
{
    echo '
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>All Students</title>
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
                // padding: 10px 20px;
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
      min-height: 1200px;
     overflow-y: auto;
    margin: 30px auto;
    width: 90%;
    max-width: 1200px;
    border-radius: 12px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    background-color: #fff;
}

            table {
                width: 90%;
                margin: 30px auto;
                border-collapse: collapse;
                background-color: #fff;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
                border-radius: 12px;
                overflow: hidden;
                table-layout: fixed;

            }

            th, td {
                padding: 12px 15px;
                text-align: left;
                border: 1px solid #ddd;
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

            .logout-btn {
                padding: 8px 15px;
                // background-color: #FF5733;
                color: white;
                border: none;
                border-radius: 5px;
                cursor: pointer;
            }

            .logout-btn:hover {
                // background-color: #D44E2A;
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
            <a href="logout.php" class="nav-item">
                ';
    teacherLogout(); // Call teacherLogout function outside echo
    echo '
            </a>
        </nav>
    </header>

    ';

    teacherLoginHeader(); // Assuming this function outputs the login header

    echo '<h2>All Students</h2>';

    echo '
    <div class="table-wrapper">

    <table>
        <thead>
            <tr>
                <th>Username</th>
                <th>Roll No</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Backlogs</th>
                <th>CGPA</th>
            </tr>
        </thead>
        <tbody>
    ';

    foreach ($students as $student) {
        echo '<tr>
            <td>' . htmlspecialchars($student['username']) . '</td>
            <td>' . htmlspecialchars($student['rollNo']) . '</td>
            <td>' . htmlspecialchars($student['email']) . '</td>
            <td>' . htmlspecialchars($student['phone']) . '</td>
            <td>' . htmlspecialchars($student['backlogs']) . '</td>
            <td>' . htmlspecialchars($student['cgpa']) . '</td>
        </tr>';
    }

    echo '</tbody>
    </table>
    </div>
    <footer>
        <p>&copy; 2025 Placement Cell. All rights reserved.</p>
    </footer>
    ';
    echo '</body></html>';
}
