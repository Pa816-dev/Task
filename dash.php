<?php
require_once('db-connect.php');

// Retrieve tasks from the database
$query = "SELECT id, title, description, start_datetime, end_datetime, status FROM schedule_list";
$result = $conn->query($query);

if (!$result) {
    die("Query failed: " . $conn->error);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Dashboard</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <script src="./js/jquery-3.6.0.min.js"></script>
    <style>
        .btn-info.text-light:hover,
        .btn-info.text-light:focus {
            background: #000;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <h2 class="mb-4">Task Dashboard</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Start Date & Time</th>
                    <th>End Date & Time</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row['title']) ?></td>
                    <td><?= htmlspecialchars($row['description']) ?></td>
                    <td><?= htmlspecialchars($row['start_datetime']) ?></td>
                    <td><?= htmlspecialchars($row['end_datetime']) ?></td>
                    <td><?= htmlspecialchars($row['status']) ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
<?php
$conn->close();
?>
