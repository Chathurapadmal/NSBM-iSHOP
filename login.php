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

    $sql = $conn->prepare("SELECT id, password FROM customers WHERE username = ?");
    $sql->bind_param("s", $username);
    $sql->execute();
    $sql->bind_result($id, $hashed_password);
    if ($sql->fetch() && password_verify($password, $hashed_password)) {
        $_SESSION['customer_id'] = $id; 
        header("Location: order_page.php");
    } else {
        echo "Invalid credentials.";
    }
}
?>

<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <form action="" method="POST">
        <center><img style="width:40%;" src="images/logo.png">
        <h2>Login</h2></center>
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>
        <label for="password">Password:</label>
        <input type="password" name="password" required><br>
        <button type="submit">Login</button>
        <a href="register.php">Don't have an account? PLEASE REGISTER</a>
    </form>
</body>
</html>
