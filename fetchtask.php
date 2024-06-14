<?php
// Include database connection
require_once 'db.php';

// SQL query to fetch tasks
$sql = "SELECT * FROM tasks";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Array to hold fetched tasks
    $tasks = array();

    // Fetch tasks and push into $tasks array
    while ($row = $result->fetch_assoc()) {
        $tasks[] = $row;
    }

    // Encode tasks array to JSON and output
    echo json_encode($tasks);
} else {
    // No tasks found
    echo json_encode(array());
}

// Close database connection
$conn->close();
?>
