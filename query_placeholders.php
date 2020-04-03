<form action="query_placeholders.php" method="post">
    <label for="author">Author </label><input type="text" name="author" id="author"><br>
    <label for="title">Title </label><input type="text" name="title" id="title"><br>
    <label for="category">Category </label><input type="text" name="category" id="category"><br>
    <label for="year">Year </label><input type="text" name="year" id="year"><br>
    <label for="isbn">Isbn </label><input type="text" name="isbn" id="isbn"><br>
    <input type="submit" value="ADD RECORD"><br>
</form>
<?php
require_once 'login.php';
$conn = new mysqli($hm,$un,$pw,$db);
if ($conn->connect_error) die($conn->connect_error);

if (isset($_POST['delete']) && isset($_POST['isbn'])) {
    $isbn = get_post($conn, 'isbn');
    $query = "DELETE FROM classics WHERE isbn='$isbn'";
    $result = $conn->query($query);
    if (!$result) echo "Failed to delete data: $query<br>" .
        $conn->error . "<br><br>";
}

if (isset($_POST['author']) && isset($_POST['title']) && isset($_POST['category']) && isset($_POST['year']) && isset($_POST['isbn'])) {
    $author = get_post($conn, 'author');
    $title = get_post($conn, 'title');
    $category = get_post($conn, 'category');
    $year = get_post($conn, 'year');
    $isbn = get_post($conn, 'isbn');


    $stmt = $conn->prepare("INSERT INTO classics VALUES (?,?,?,?,?)");
    $stmt->bind_param('sssss', $author, $title, $category, $year, $isbn);
    $stmt->execute();
    printf("%d Row inserted.\n", $stmt->affected_rows);
    $stmt->close();
    $conn->close();
}
function get_post($conn, $var) {
    return $conn->real_escape_string($_POST[$var]);
}
