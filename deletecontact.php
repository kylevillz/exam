<?php
include_once 'connectdb.php';

// Check if the contact ID is provided in the URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $contactID = $_GET['id'];

    // Perform the delete operation in your database using prepared statements
    $sql = "DELETE FROM tbl_contact WHERE contactid = :contactID";
    $statement = $pdo->prepare($sql);
    $statement->bindParam(':contactID', $contactID, PDO::PARAM_INT);

    if ($statement->execute()) {
        // Redirect to the contact list page after successful deletion
        header('location: contact.php');
        exit();
    } else {
        // Handle any errors here
        echo "Error deleting contact.";
    }
} else {
    // Handle invalid or missing contact ID here
    echo "Invalid contact ID.";
}
?>
