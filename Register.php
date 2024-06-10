<?php
include_once 'includes/header.php';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "volleyball_site";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $valid = true;

    if (empty($_POST['username'])) {
        $valid = false;
        $_SESSION['error'] = "Username is required";
    } else {
        $user = htmlspecialchars(stripslashes($_POST['username']));
    }

    if (empty($_POST['surname'])) {
        $valid = false;
        $_SESSION['error'] = "Surname is required";
    } else {
        $surname = htmlspecialchars(stripslashes($_POST['surname']));
    }

    if (empty($_POST['lastname'])) {
        $valid = false;
        $_SESSION['error'] = "Lastname is required";
    } else {
        $lastname = htmlspecialchars(stripslashes($_POST['lastname']));
    }

    if (empty($_POST['email'])) {
        $valid = false;
        $_SESSION['error'] = "Email is required";
    } else {
        $email = htmlspecialchars(stripslashes($_POST['email']));
    }

    if (empty($_POST['password'])) {
        $valid = false;
        $_SESSION['error'] = "Password is required";
    } else {
        $pass = htmlspecialchars(stripslashes($_POST['password']));
    }

    if (empty($_POST['confirm_password'])) {
        $valid = false;
        $_SESSION['error'] = "Confirm Password is required";
    } else {
        $confirm_pass = htmlspecialchars(stripslashes($_POST['confirm_password']));
    }

    if (empty($_POST['agree'])) {
        $valid = false;
        $_SESSION['error'] = "You must agree to the terms";
    }

    if ($valid && $pass !== $confirm_pass) {
        $_SESSION['confirmpassword'] = "Passwords do not match";
        $valid = false;
    }

    if ($valid) {
        try {
            $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username");
            $stmt->execute([':username' => $user]);

            if ($stmt->rowCount() > 0) {
                $_SESSION['username'] = "Username already exists";
                die();
            } else {
                $pass = password_hash($pass, PASSWORD_BCRYPT);
                $stmt = $conn->prepare("INSERT INTO users (username, surname, lastname, email, password) VALUES (:username, :surname, :lastname, :email, :password)");
                $stmt->execute([
                    ':username' => $user,
                    ':surname' => $surname,
                    ':lastname' => $lastname,
                    ':email' => $email,
                    ':password' => $pass
                ]);

                $_SESSION['success'] = "Registration successful";
                header("Location: Thankyou.php"); 
                exit();
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
?>

<style>
        .registration-form {
            max-width: 400px;
            margin: 100px auto;
            padding: 20px;
            background-color: #f4f4f4;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .registration-form label {
            display: block;
            margin-bottom: 5px;
        }

        .registration-form input[type="text"],
        .registration-form input[type="email"],
        .registration-form input[type="password"],
        .registration-form input[type="checkbox"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .registration-form .checkbox-label {
            display: block;
            margin-bottom: 15px;
            font-size: 14px;
        }

        .registration-form button {
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

        .registration-form button:hover {
            background-color: #0056b3;
        }
        .register-form .terms {
            display: flex;
            align-items: center;
        }

        .register-form .terms input[type="checkbox"] {
            margin-right: 10px;
        }
    </style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body  style="height: calc(100vh - 150px); display: flex; justify-content: center; align-items: center;">
    <div class="container">
        <h2>Register</h2>
        <?php
        if (isset($_SESSION['error'])) {
            echo "<p style='color:red'>" . $_SESSION['error'] . "</p>";
            unset($_SESSION['error']);
        }
        ?>
    <form method="post" action="Register.php" class="registration-form">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="surname">Surname:</label>
        <input type="text" id="surname" name="surname" required>

        <label for="lastname">Lastname:</label>
        <input type="text" id="lastname" name="lastname" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" required>

        <div class="terms">
            <input type="checkbox" id="agree" name="agree" required>
            <label for="agree">I agree to the terms and conditions</label>
        </div>

        <button type="submit" class="submit-button">Register</button>
    </form>
    </div>
<?php include_once 'includes/footer.php'; ?>