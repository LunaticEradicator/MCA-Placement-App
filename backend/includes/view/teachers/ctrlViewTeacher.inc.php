<?php

require_once __DIR__ . '/viewTeacher.inc.php';
require_once __DIR__ . '/modelViewTeacher.inc.php';
session_start();

function handleViewAllStudents()
{
    if (!isset($_SESSION["teacherId"])) {
        echo "<p>You must be logged in as a teacher to view student details.</p>";
        return;
    }

    $students =  getAllStudents($GLOBALS["pdo"]); // use global PDO or pass it in
    viewSAllStudents($students);

    // require "./viewTeacher.inc.php";
}

handleViewAllStudents();
