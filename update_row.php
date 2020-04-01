<?php
require_once 'login.php';
$conn = new mysqli($hm,$un,$pw,$db);
if ($conn->connect_error) die($conn->connect_error);

$query = "UPDATE cats SET name='Charlie' WHERE name='grouler'";
$result = $conn->query($query);

if (!$result) die ("Failed to access DATABASE: " . $conn->error);
