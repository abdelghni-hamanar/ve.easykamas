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
    // Fetch the user's vente tickets with server info, including ticket status
    $stmt = $pdo->prepare("
        SELECT vt.id AS ticket_id, s.server_name, vt.char_name, s.price, vt.quantity, vt.total, vt.status AS ticket_status
        FROM ventetickets vt
        JOIN servers s ON vt.id_server = s.id
        WHERE vt.id_user = ?
    ");
    $stmt->execute([$user_id]);
    $ventetickets = $stmt->fetchAll();
} catch (PDOException $e) {
    echo 'Error fetching vente tickets: ' . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Ventes</title>
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
        <!-- Main Section for Mes Ventes -->
        <section>
        <div class="container">
            <h2 class="text-center">Mes Ventes</h2>
            <br/>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID Ticket</th>
                        <th>Serveur</th>
                        <th>Nom du personnage</th>
                        <th>Prix par serveur</th>
                        <th>Quantité</th>
                        <th>Total</th>
                        <th>Status</th> <!-- New column for ticket status -->
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($ventetickets)): ?>
                        <?php foreach ($ventetickets as $ticket): ?>
                            <tr>
                                <td><?= htmlspecialchars($ticket['ticket_id']); ?></td>
                                <td><?= htmlspecialchars($ticket['server_name']); ?></td>
                                <td><?= htmlspecialchars($ticket['char_name']); ?></td>
                                <td><?= htmlspecialchars($ticket['price']); ?>€/M</td>
                                <td><?= htmlspecialchars($ticket['quantity']); ?></td>
                                <td><?= htmlspecialchars($ticket['total']); ?>€</td>
                                <td>
                                    <span class="badge 
                                        <?php 
                                        switch ($ticket['ticket_status']) {
                                            case 'En attente de livraison':
                                                echo 'bg-primary';
                                                break;
                                            case 'Paiement en cours':
                                                echo 'bg-warning';
                                                break;
                                            case 'Payé':
                                                echo 'bg-success';
                                                break;
                                            case 'Annulé':
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
                            <td colspan="7" class="text-center">Aucune vente trouvée.</td>
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
