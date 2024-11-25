<?php
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
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT); 

    $sql = $conn->prepare("INSERT INTO admins (username, email, password) VALUES (?, ?, ?)");
    $sql->bind_param("sss", $username, $email, $hashed_password);

    if ($sql->execute()) {
        echo "Admin registered successfully! <a href='admin_login.php'>Login now</a>";
    } else {
        echo "Error: " . $sql->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Registration</title>
    <link rel="stylesheet" href="admin_register.css">
</head>
<body>
    <form action="" method="POST">
        <label for="username">Username:</label><br>
        <input type="text" name="username" required><br>
        
        <label for="email">Email:</label><br>
        <input type="email" name="email" required><br>
        
        <label for="password">Password:</label><br>
        <input type="password" name="password" required><br>
        
        <button type="submit">Register</button>
    </form>
</body>
</html>
