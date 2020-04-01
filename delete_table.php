<?php
require_once 'login.php';
$conn = new mysqli($hm,$un,$pw,$db);
if ($conn->connect_error) die($conn->connect_error);

$query = "DROP TABLE cats";
$result = $conn->query($query);

if (!$result) die ("Failed to access DATABASE: " . $conn->error);
