<?php
include_once 'connectdb.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the search query
    $query = $_POST['query'];

    // Create a SQL query to search for contacts
    $sql = "SELECT * FROM tbl_contact WHERE name LIKE :query OR company LIKE :query OR email LIKE :query OR phone LIKE :query";
    $statement = $pdo->prepare($sql);
    $queryParam = '%' . $query . '%';
    $statement->bindParam(':query', $queryParam, PDO::PARAM_STR);
    $statement->execute();

    // Display search results
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        echo '<p>ID: ' . $row['contactid'] . ', Name: ' . $row['name'] . ', Company: ' . $row['company'] . ', Email: ' . $row['email'] . ', Phone: ' . $row['phone'] . '</p>';
    }
}
?>
