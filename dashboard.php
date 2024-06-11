<?php
include_once 'includes/header.php';
require_once 'Classes/Database.php';
require_once 'Classes/User.php';
require_once 'Classes/Ticket.php';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "volleyball_site";

$database = new Database();
$db = $database->getConnection();

$user = new User($servername, $username, $password, $dbname);
$ticket = new Ticket($db);

if (!$user->isLoggedIn()) {
    header("Location: login.php");
    exit();
}

$user_id = $user->getUserId();
$available_tickets = $ticket->getAvailableTickets($user_id);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['update_price'])) {
        $ticket_id = $_POST['ticket_id'];
        $new_price = $_POST['new_price'];
        $ticket->updateTicketPrice($ticket_id, $new_price);
        header("Location: dashboard.php");
        exit();
    }

    if (isset($_POST['remove_ticket'])) {
        $ticket_id = $_POST['ticket_id'];
        $ticket->removeTicket($user_id, $ticket_id);
        header("Location: dashboard.php");
        exit();
    }
}    

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['buy_ticket'])) {
    $ticket_id = $_POST['ticket_id'];
    $ticket->buyTicket($user_id, $ticket_id);
    header("Location: dashboard.php");
    exit();
}
?>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;

        }
        .container {
            max-width: 800px;
            margin: 200px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f9f9f9;
        }
        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>

<div class="container">
    <h1>Welcome, <?php echo $_SESSION['username']; ?></h1>
    <h2>Available Tickets</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Event Name</th>
                <th>Event Date</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($available_tickets as $ticket): ?>
                <tr>
                    <td><?php echo htmlspecialchars($ticket['id']); ?></td>
                    <td><?php echo htmlspecialchars($ticket['event_name']); ?></td>
                    <td><?php echo htmlspecialchars($ticket['event_date']); ?></td>
                    <td><?php echo htmlspecialchars($ticket['price']); ?></td>
                    <td>
                        <form action="dashboard.php" method="post" style="display:inline;">
                            <input type="hidden" name="ticket_id" value="<?php echo htmlspecialchars($ticket['id']); ?>">
                            <input type="number" name="new_price" value="<?php echo htmlspecialchars($ticket['price']); ?>" step="0.01" required>
                            <button type="submit" name="update_price">Update</button>
                            <button type="submit" name="buy_ticket">Buy</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php include 'includes/footer.php'; ?>