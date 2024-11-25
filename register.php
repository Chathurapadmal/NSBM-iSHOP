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
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Encrypt password

    $sql = $conn->prepare("INSERT INTO customers (name, phone, address, email, username, password) VALUES (?, ?, ?, ?, ?, ?)");
    $sql->bind_param("ssssss", $name, $phone, $address, $email, $username, $password);

    if ($sql->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql->error;
    }
}
?>

<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="register.css">
</head>
<body>
    <form action="" method="POST">
         <center><img style="width:40%;" src="images/logo.png">
        <h2>Register</h2></center>
        <label for="name">Name:</label>
        <input type="text" name="name" required><br>
        <label for="phone">Phone:</label>
        <input type="text" name="phone" required><br>
        <label for="address">Address:</label>
        <textarea name="address" required></textarea><br>
        <label for="email">Email:</label>
        <input type="email" name="email" required><br>
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>
        <label for="password">Password:</label>
        <input type="password" name="password" required><br>
        <button type="submit">Register</button>
        <a href="login.php">Already have an account?</a>
    </form>
</body>
</html>
