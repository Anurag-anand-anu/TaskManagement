<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Task</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h4 class="text-center">Delete Task</h4>
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
                        ?>
                        <p>Are you sure you want to delete the following task?</p>
                        <p><strong>Title:</strong> <?php echo $row['title']; ?></p>
                        <p><strong>Description:</strong> <?php echo $row['description']; ?></p>
                        <p><strong>Due Date:</strong> <?php echo date('Y-m-d', strtotime($row['due_date'])); ?></p>
                        <form action="delete_task_save.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <button type="submit" class="btn btn-danger">Delete Task</button>
                            <a href="index.html" class="btn btn-secondary">Cancel</a>
                        </form>
                        <?php
                    } else {
                        echo "Task not found.";
                    }
                } else {
                    echo "Task ID not provided.";
                }

                // Close database connection
                $conn->close();
                ?>
            </div>
        </div>
    </div>
</body>
</html>
