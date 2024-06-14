<?php
// Include database connection
require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $title = $_POST['title'];
    $description = $_POST['description'];
    $due_date = $_POST['due_date'];

    // Prepare and bind SQL statement
    $sql = "INSERT INTO tasks (title, description, due_date) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $title, $description, $due_date);

    // Execute the statement
    if ($stmt->execute()) {
        // Task added successfully
        echo "<script>alert('Task added successfully'); window.location.href='index.html';</script>";
    } else {
        // Error occurred
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close statement and database connection
    $stmt->close();
    $conn->close();
}
?>
