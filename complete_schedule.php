<?php
require_once('db-connect.php');

if (!isset($_GET['id'])) {
    echo "Undefined Schedule ID.";
    $conn->close();
    exit;
}

$id = $conn->real_escape_string($_GET['id']);
$update = $conn->query("UPDATE `schedule_list` SET `status` = 'completed' WHERE id = '$id'");

if ($update) {
    echo "Task has been marked as completed successfully.";
} else {
    echo "An error occurred: " . $conn->error;
}

$conn->close();
header('Location: ./Task.php'); 
exit;
?>
