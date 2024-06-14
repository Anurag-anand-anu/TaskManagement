<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h4 class="text-center">Edit Task</h4>
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
                        <form action="update_task.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title" value="<?php echo $row['title']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description"><?php echo $row['description']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="due_date">Due Date</label>
                                <input type="date" class="form-control" id="due_date" name="due_date" value="<?php echo $row['due_date']; ?>">
                            </div>
                            <button type="submit" class="btn btn-primary">Update Task</button>
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
                <a href="index.html" class="btn btn-secondary mt-3">Cancel</a>
            </div>
        </div>
    </div>
</body>
</html>
