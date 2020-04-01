<?php
require_once 'login.php';
$conn = new mysqli($hm,$un,$pw,$db);
if ($conn->connect_error) die($conn->connect_error);

$query = "INSERT INTO cats VALUES (null, 'Tiger', 'Grrrrrr', 5)";
$result = $conn->query($query);
$insertID = $conn->insert_id; // To create ID variable of just created post
$query = "INSERT INTO owners VALUES ($insertID, 'Ann', 'Marie')";
$result = $conn->query($query); // To create owner with the same ID

if (!$result) die ("Failed to access DATABASE: " . $conn->error);
echo 'ID that just\'ve been saved' . $conn->insert_id; // to show id that just have been auto_incremented!

