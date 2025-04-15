
<?php
require_once("./modelSearchStudent.inc.php");
require_once("./viewSearchStudent.inc.php");
$searchResults = [];
if (isset($_POST['studentSearch']) && !empty($_POST['studentSearch'])) {
    // If search is performed, use the model to get results
    $searchQuery = htmlspecialchars(trim($_POST['studentSearch']));
    $searchResults = searchItems($pdo, $searchQuery);  // Make sure the model function returns search results
}

studentSearch($searchResults); // Pass results to view
