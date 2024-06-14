<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Task</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h4 class="text-center">View Task</h4>
        <div class="card mt-3">
            <div class="card-body">
                <?php
                // Include your database connection file
                include 'db.php';

                // Check if task ID is provided in the URL
                if(isset($_GET['id'])) {
                    // Get the task ID from the URL
                    $id = $_GET['id'];

                    // Query to fetch task details based on ID
                    $sql = "SELECT * FROM tasks WHERE id = $id";

                    // Execute query
                    $result = $conn->query($sql);

                    // Check if query executed successfully and task exists
                    if ($result->num_rows > 0) {
                        // Fetch task details
                        $row = $result->fetch_assoc();
                        echo "<h5 class='card-title'>Title: " . $row['title'] . "</h5>";
                        echo "<p class='card-text'>Description: " . $row['description'] . "</p>";
                        echo "<p class='card-text'>Due Date: " . date('Y-m-d', strtotime($row['due_date'])) . "</p>";
                    } else {
                        echo "Task not found.";
                    }
                } else {
                    echo "Task ID not provided.";
                }

                // Close database connection
                $conn->close();
                ?>
                <a href="index.html" class="btn btn-primary">Back to Task List</a>
            </div>
        </div>
    </div>
</body>
</html>
