<?php

session_start();
session_unset();
session_destroy();

echo "<p>Teacher has been logged out successfully.</p>";
header("refresh:1; url=../../teacherIndex.php");
die();
