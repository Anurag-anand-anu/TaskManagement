<?php
// Include your database connection file
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get task ID from form data
    $id = $_POST['id'];

    // Delete query
    $sql = "DELETE FROM tasks WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Task deleted successfully'); window.location.href='index.html';</script>";
    } else {
        echo "Error deleting task: " . $conn->error;
    }
}

// Close database connection
$conn->close();
?>
