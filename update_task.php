<?php
// Include your database connection file
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $due_date = $_POST['due_date'];

    // Update query
    $sql = "UPDATE tasks SET title='$title', description='$description', due_date='$due_date' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
         echo "<script>alert('Updated successfully'); window.location.href='index.html';</script>";

    } else {
        echo "Error updating task: " . $conn->error;
    }
}

// Close database connection
$conn->close();
?>
