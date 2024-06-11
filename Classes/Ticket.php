<?php
class Ticket
{
    private $conn;
    private $table_name = "tickets";
    private $purchases_table = "purchases";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getAvailableTickets($user_id)
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id NOT IN (SELECT ticket_id FROM " . $this->purchases_table . " WHERE user_id = ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$user_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUserTickets($user_id)
    {
        $query = "SELECT t.* FROM " . $this->table_name . " t JOIN " . $this->purchases_table . " p ON t.id = p.ticket_id WHERE p.user_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$user_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buyTicket($user_id, $ticket_id)
    {
        $query = "INSERT INTO " . $this->purchases_table . " (user_id, ticket_id) VALUES (?, ?)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$user_id, $ticket_id]);
    }

    public function removeTicket($user_id, $ticket_id)
    {
        $query = "DELETE FROM " . $this->purchases_table . " WHERE user_id = ? AND ticket_id = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$user_id, $ticket_id]);
    }
    public function updateTicketPrice($ticket_id, $new_price)
{
    try {
        $query = "UPDATE " . $this->table_name . " SET price = :new_price WHERE id = :ticket_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':new_price', $new_price, PDO::PARAM_INT);
        $stmt->bindParam(':ticket_id', $ticket_id, PDO::PARAM_INT);
        if ($stmt->execute()) {
            return true;
        } else {
            echo "Error executing query.";
            return false;
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}
}
?>