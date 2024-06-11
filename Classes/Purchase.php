<?php
include_once 'Database.php';

class Purchase extends Database {
    private $table_name = "purchases";

    public function __construct($servername, $dbusername, $dbpassword, $dbname) {
        parent::__construct($servername, $dbusername, $dbpassword, $dbname);
    }

    public function addPurchase($userId, $ticketId) {
        $query = "INSERT INTO $this->table_name (user_id, ticket_id) VALUES (:user_id, :ticket_id)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':user_id', $userId);
        $stmt->bindParam(':ticket_id', $ticketId);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getUserPurchases($userId) {
        $query = "SELECT * FROM $this->table_name WHERE user_id = :user_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':user_id', $userId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>