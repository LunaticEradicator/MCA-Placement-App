<?php
// TO HANDLE STUDENT DECISION [DIFFERENT TABLE]

require_once("../../dbh.inc.php");
require_once("./modelJobStudent.inc.php");
require_once("./viewJobStudent.inc.php");
require_once("../../configSession.inc.php");

// Check if the request method is POST (for accepting or rejecting a job)
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_SESSION["studentId"])) {
    $studentId = $_SESSION["studentId"];
    $jobId = $_POST["job_id"];
    $decision = $_POST["decision"];

    try {
        if ($decision !== 'Accepted' && $decision !== 'Rejected') {
            echo "<p>Invalid decision.</p>";
            die();
        }

        $sql = "INSERT INTO student_job_decisions (student_id, job_id, decision) 
                VALUES (:student_id, :job_id, :decision) 
                ON DUPLICATE KEY UPDATE decision = :decision, decision_date = CURRENT_TIMESTAMP";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':student_id', $studentId, PDO::PARAM_INT);
        $stmt->bindParam(':job_id', $jobId, PDO::PARAM_INT);
        $stmt->bindParam(':decision', $decision, PDO::PARAM_STR);

        $stmt->execute();

        // Redirect the student back to the job listings page
        header("Location: ../../../student.php?decision=success");
        die();
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
} else {
    header("Location: ../../../studentlogin.php");
    die();
}
