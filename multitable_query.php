<?php
require_once 'login.php';
$conn = new mysqli($hm,$un,$pw,$db);
if ($conn->connect_error) die($conn->connect_error);

$query = "SELECT * FROM customers";
$result = $conn->query($query);
if (!$result) die($conn->error);
$rows = $result->num_rows;
for ($j=0;$j<$rows;++$j) {
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_ASSOC);
    echo "$row[name] purchased $row[isbn]: <br>";
    $subquery = "SELECT * FROM classics WHERE isbn='$row[isbn]'";
    $subresult = $conn->query($subquery);
    if (!$subresult) die($conn->error);
    $subrow = $subresult->fetch_array(MYSQLI_ASSOC);
    echo "     $subrow[title] by $subrow[author]<br>";
}