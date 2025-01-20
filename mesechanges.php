<?php
// Start session if not already started
session_start();

// Check if the user is logged in
if (empty($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit();
}

// Include the database configuration file
require_once 'config/database.php';

// Get the user ID from the session
$user_id = $_SESSION['user_id'];

try {
    // Fetch the user's exchange tickets with server info, including ticket status
    $stmt = $pdo->prepare("
        SELECT et.id AS ticket_id, 
               s1.server_name AS server1_name, 
               et.char1_name, 
               et.quantity_1, 
               s2.server_name AS server2_name, 
               et.char2_name, 
               et.quantity_2, 
               et.status AS ticket_status
        FROM echangetickets et
        JOIN servers s1 ON et.id_server1 = s1.id
        JOIN servers s2 ON et.id_server_2 = s2.id
        WHERE et.user_id = ?
    ");
    $stmt->execute([$user_id]);
    $echangetickets = $stmt->fetchAll();
} catch (PDOException $e) {
    echo 'Error fetching exchange tickets: ' . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Échanges</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <style>
        .navbar-nav .nav-link.active {
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <?php include_once 'includes/navbar.php'; ?>

    <main>
        <!-- Main Section for Mes Échanges -->
        <section>
        <div class="container">
            <h2 class="text-center">Mes Échanges</h2>
            <br/>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID Ticket</th>
                        <th>Serveur 1</th>
                        <th>Nom du personnage 1</th>
                        <th>Quantité 1</th>
                        <th>Serveur 2</th>
                        <th>Nom du personnage 2</th>
                        <th>Quantité 2</th>
                        <th>Status</th> <!-- Column for ticket status -->
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($echangetickets)): ?>
                        <?php foreach ($echangetickets as $ticket): ?>
                            <tr>
                                <td><?= htmlspecialchars($ticket['ticket_id']); ?></td>
                                <td><?= htmlspecialchars($ticket['server1_name']); ?></td>
                                <td><?= htmlspecialchars($ticket['char1_name']); ?></td>
                                <td><?= htmlspecialchars($ticket['quantity_1']); ?></td>
                                <td><?= htmlspecialchars($ticket['server2_name']); ?></td>
                                <td><?= htmlspecialchars($ticket['char2_name']); ?></td>
                                <td><?= htmlspecialchars($ticket['quantity_2']); ?></td>
                                <td>
                                    <span class="badge 
                                        <?php 
                                        switch ($ticket['ticket_status']) {
                                            case 'en attente de livraison':
                                                echo 'bg-primary';
                                                break;
                                            case 'paiement en cours':
                                                echo 'bg-warning';
                                                break;
                                            case 'payé':
                                                echo 'bg-success';
                                                break;
                                            case 'annulé':
                                                echo 'bg-danger';
                                                break;
                                            default:
                                                echo 'bg-secondary';
                                        }
                                        ?>">
                                        <?= htmlspecialchars($ticket['ticket_status']); ?>
                                    </span>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="8" class="text-center">Aucun échange trouvé.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        </section>
    </main>

    <?php include_once 'includes/footer.php'; ?>
</body>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/scripts.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</html>
