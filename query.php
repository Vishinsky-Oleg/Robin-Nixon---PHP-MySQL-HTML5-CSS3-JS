<?php
require_once 'login.php';
$conn = new mysqli($hm,$un,$pw,$db);
if ($conn->connect_error) die($conn->connect_error);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
$query = "SELECT * FROM classics";
$result = $conn->query($query);
if (!$result) die ($conn->error);
$rows = $result->num_rows;
for ($j=0;$j<$rows;++$j) {
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_ASSOC);
    print_r($result); echo '<br>';
    echo $row['author'] . '<br>';
    echo $row['title'] . '<br>';
    echo $row['category'] . '<br>';
    echo $row['year'] . '<br>';
    echo $row['isbn'] . '<br><br>';

}
$result->close();
$conn->close();
?>
</body>
</html>



