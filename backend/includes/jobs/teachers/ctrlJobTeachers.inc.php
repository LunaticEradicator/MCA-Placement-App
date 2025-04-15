<?php

require_once __DIR__ . "/../../dbh.inc.php";
require_once __DIR__ . "./modelJobTeachers.inc.php";
require_once __DIR__ . "./viewTeachers.inc.php";
session_start();

function handleViewAllJobOffersForTeacher()
{
    if (!isset($_SESSION["teacherId"])) {
        echo "<p>You must be logged in as a teacher to view job offers.</p>";
        return;
    }

    $jobOffers = getAllJobOffers($GLOBALS["pdo"]);
    viewAllJobOffers($jobOffers);
}
handleViewAllJobOffersForTeacher();
