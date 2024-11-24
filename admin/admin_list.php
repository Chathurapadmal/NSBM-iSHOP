<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}

$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'ishop';

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, username, email FROM admins";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin List</title>
    <link rel="stylesheet" href="ad_list.css"> 
</head>
<body>
    <h1>Registered Admins</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['id']); ?></td>
                        <td><?php echo htmlspecialchars($row['username']); ?></td>
                        <td><?php echo htmlspecialchars($row['email']); ?></td>
                        <td>
                            <a href="admin_edit.php?id=<?php echo $row['id']; ?>">Edit</a> | 
                            <a href="admin_delete.php?id=<?php echo $row['id']; ?>">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">No admins found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <a href="admin_dashboard.php">Back to Dashboard</a>
</body>
</html>
