<?php
include_once 'includes/header.php';
include_once 'Classes/User.php';

$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "volleyball_site";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbusername, $dbpassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $user = new User($servername, $dbusername, $dbpassword, $dbname);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST['username'])) {
            $_SESSION['error'] = "Username is required";
            header("Location: Login.php");
            exit();
        } else {
            $username = htmlspecialchars($_POST['username']);
        }

        if (empty($_POST['password'])) {
            $_SESSION['error'] = "Password is required";
            header("Location: Login.php");
            exit();
        } else {
            $password = htmlspecialchars($_POST['password']);
        }

        if ($user->login($username, $password)) {
            header("Location: dashboard.php");
            exit();
        } else {
            header("Location: Login.php");
            exit();
        }
    }    
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit();
}
?>

<style>
        .login-form {
            max-width: 400px;
            margin: 300px auto;
            padding: 20px;
            background-color: #f4f4f4;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .login-form label {
            display: block;
            margin-bottom: 5px;
        }

        .login-form input[type="text"],
        .login-form input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .login-form button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .login-form button:hover {
            background-color: #0056b3;
        }
    </style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body style="height: calc(100vh - 150px); display: flex; justify-content: center; align-items: center;">
    <div class="container">
        <h2>Login</h2>
        <?php
        if (isset($_SESSION['error'])) {
            echo "<p style='color:red'>" . $_SESSION['error'] . "</p>";
            unset($_SESSION['error']);
        }
        ?>
        <form method="post" action="Login.php" class="login-form">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">Login</button>
    </form>
    </div>
<?php include_once 'includes/footer.php'; ?>