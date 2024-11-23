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

$error_message = '';
$success_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    if ($password !== $confirm_password) {
        $error_message = "Passwords do not match.";
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO admin_users (username,password) VALUES (?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $username, $hashed_password,);

        if ($stmt->execute()) {
            $success_message = "User added successfully!";
        } else {
            $error_message = "Failed to add user. Please try again.";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <link rel="stylesheet" href="stylelg.css">
</head>
<body>
    <header>
        <h1>Register as ADMIN</h1>
    </header>

    <div class="form-container">
        <?php
        if ($error_message) {
            echo "<p class='error-message'>$error_message</p>";
        }
        if ($success_message) {
            echo "<p class='success-message'>$success_message</p>";
        }
        ?>

        <form action="add_user.php" method="POST">

            <label for="id">id:</label>
            <input type="text" name="id" id="id" required>

            <label for="username">Username:</label>
            <input type="string" name="username" id="username" required>

            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>

            <label for="confirm_password">Confirm Password:</label>
            <input type="password" name="confirm_password" id="confirm_password" required>

            </select>

            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
