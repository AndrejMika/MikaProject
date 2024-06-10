<?php
require_once 'BaseModel.php';

class User extends BaseModel
{
    public function __construct($servername, $username, $password, $dbname)
    {
        parent::__construct($servername, $username, $password, $dbname);
    }

    public function isLoggedIn() {
        return isset($_SESSION['username']);
    }

    public function getUserId() {
        if ($this->isLoggedIn()) {
            $username = $_SESSION['username'];
            $stmt = $this->conn->prepare("SELECT id FROM users WHERE username = :username");
            $stmt->bindParam(':username', $username);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                return $result['id'];
            } else {
                return null;
            }
        } else {
            return null;
        }
    }

    public function login($username, $password)
    {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM users WHERE username = :username");
            $stmt->bindParam(':username', $username);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                if (password_verify($password, $row['password'])) {
                    $_SESSION['username'] = $username;
                    $_SESSION['loggedin'] = true;
                    return true;
                } else {
                    $_SESSION['error'] = "Invalid password";
                    return false;
                }
            } else {
                $_SESSION['error'] = "Invalid username";
                return false;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function register($username, $password, $surname, $lastname, $email)
    {
        try {
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            $stmt = $this->conn->prepare("INSERT INTO users (username, password, surname, lastname, email) VALUES (:username, :password, :surname, :lastname, :email)");
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $hashedPassword);
            $stmt->bindParam(':surname', $surname);
            $stmt->bindParam(':lastname', $lastname);
            $stmt->bindParam(':email', $email);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
}
?>


