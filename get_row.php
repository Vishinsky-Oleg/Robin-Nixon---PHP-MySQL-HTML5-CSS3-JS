<?php
require_once 'login.php';
$conn = new mysqli($hm,$un,$pw,$db);
if ($conn->connect_error) die($conn->connect_error);

$query = "SELECT * FROM cats";
$result = $conn->query($query);
if (!$result) die ("Failed to access DATABASE: " . $conn->error);

$rows = $result->num_rows;

echo "<table><tr><th>Id</th><th>Family</th><th>Name</th><th>Age</th></tr>";
for ($j=0;$j<$rows;++$j) {
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_NUM);
    echo "<tr>";
    for ($k=0;$k<4;++$k) echo "<td>$row[$k]</td>";
    echo "</tr>";
}
echo "</table>";
