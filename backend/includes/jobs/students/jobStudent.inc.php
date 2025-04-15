<?php

function getStudentJob()
{

    require_once(__DIR__ . "/./modelJobStudent.inc.php");
    require_once(__DIR__ . "/./viewJobStudent.inc.php");
    require_once(__DIR__ . "/../../configSession.inc.php");
    require_once(__DIR__ . "/searchJobStudent.inc.php");
    require_once(__DIR__ . "/../../dbh.inc.php");
    if ($_SERVER["REQUEST_METHOD"] === "GET") {
        if (isset($_SESSION["studentId"])) {
            $studentId = $_SESSION["studentId"];

            try {
                $sql = "SELECT * FROM students WHERE id = :id";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':id', $studentId, PDO::PARAM_INT);
                $stmt->execute();
                $student = $stmt->fetch(PDO::FETCH_ASSOC);

                // Check if the student has no backlogs and CGPA is greater than 7.5
                if ($student['backlogs'] === 'No' && $student['cgpa'] > 7.5) {
                    $jobListings = getAllJobListings($pdo);

                    // Pass the fetched job listings to the view for display
                    displayJobListings($jobListings, $studentId, $pdo);
                } else {
                    echo '
                    <div style="
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        height: 100vh;
                        background-color: #f8f9fa;
                        font-family: \'Segoe UI\', Tahoma, Geneva, Verdana, sans-serif;
                    ">
                        <div style="
                            background-color: #fff3f3;
                            color: #b30000;
                            border: 1px solid #f5c2c7;
                            border-radius: 8px;
                            padding: 30px 40px;
                            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
                            text-align: center;
                            max-width: 500px;
                        ">
                            <h2 style="margin-bottom: 15px;">🚫 Access Denied</h2>
                            <p style="font-size: 16px; line-height: 1.5;">
                                You are not eligible to view job listings.<br>
                                Please ensure you have no backlogs and a CGPA greater than <strong>7.5</strong>.
                            </p>
                        </div>
                    </div>';
                }

                // styling
                if (isset($_GET['decision']) && $_GET['decision'] === 'success') {
                    $type = isset($_GET['type']) ? htmlspecialchars($_GET['type']) : '';
                    $message = 'Your decision has been recorded.';

                    if (strtolower($type) === 'accepted') {
                        $message = '✅ You have successfully accepted the job.';
                    } elseif (strtolower($type) === 'rejected') {
                        $message = '⚠️ You have rejected the job offer.';
                    }

                    echo '<div id="updateSuccess" style="max-width: 500px; margin: 20px auto; padding: 12px 18px; 
                        background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; 
                        border-radius: 8px; text-align: center; font-size: 16px;">
                        ' . $message . '
                    </div>';

                    // Auto-hide the message after 2 seconds
                    echo '<script>
                        setTimeout(function() {
                            var msg = document.getElementById("updateSuccess");
                            if (msg) { msg.style.display = "none"; }
                        }, 2000);
                    </script>';
                }
                // styling
            } catch (PDOException $e) {
                die("Error: " . $e->getMessage());
            }
        } else {
            echo ("Login to access this page");
            header("Location: ../../../studentlogin.php");
            die();
        }
    } else {
        echo ("Login to access this page");
        header("Location: ../../../studentlogin.php");
        die();
    }
}
