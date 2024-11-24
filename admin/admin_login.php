<?php
session_start();

$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'ishop';

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Retrieve admin from the database
    $sql = $conn->prepare("SELECT id, username, password FROM admins WHERE username = ?");
    $sql->bind_param("s", $username);
    $sql->execute();
    $sql->store_result();
    $sql->bind_result($id, $db_username, $db_password);
    $sql->fetch();

    if ($sql->num_rows == 1 && password_verify($password, $db_password)) {
        // Login successful
        $_SESSION['admin_id'] = $id;
        $_SESSION['admin_username'] = $db_username;
        header("Location: admin_dashboard.php"); // Redirect to the admin dashboard
        exit();
    } else {
        echo "Invalid username or password!";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <link rel="stylesheet" href="admin_login.css">
</head>
<body>
    <form action="" method="POST">
        <label for="username">Username:</label><br>
        <input type="text" name="username" required><br>
        
        <label for="password">Password:</label><br>
        <input type="password" name="password" required><br>
        
        <button type="submit">Login</button>
    </form>
</body>
</html>
