<?php

session_start();
session_unset();
session_destroy();

echo "<p>You have been logged out successfully.</p>";
header("refresh:1; url=../../index.php");
die();
