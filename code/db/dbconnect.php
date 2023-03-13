<?php
$serverName = "localhost";
$serverUsername = "root";
$serverPassword = "";
$dbname = "impactevidenceplatform";

// Create connection
$conn = mysqli_connect($serverName, $serverUsername, $serverPassword, $dbname);
// Check connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}
