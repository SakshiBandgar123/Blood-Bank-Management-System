<?php
session_start();
include 'db.php';

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $res = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' AND password='$password'");

    if(mysqli_num_rows($res) > 0){
        $_SESSION['user'] = $username;
        header("Location: index.php");
        exit();
    } else {
        $error = "Invalid Username or Password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="navbar">Blood Bank Login</div>

<div class="content">
<form method="POST">
    <h3>Login</h3>

    <?php if(isset($error)) echo "<p style='color:red;'>$error</p>"; ?>

    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>

    <button name="login">Login</button>
</form>
</div>

</body>
</html>