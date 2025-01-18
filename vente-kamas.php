<?php
// Include the database configuration file
require_once 'config/database.php';

// Fetch servers from the database
try {
    $stmt = $pdo->query("SELECT server_name, price, status FROM servers");
    $servers = $stmt->fetchAll();
} catch (PDOException $e) {
    echo 'Error fetching servers: ' . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Website</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <?php include_once 'includes/navbar.php' ?>

    <main>
        <!-- Main Section for Vente Kama -->
        <section>
        <div class="container">
            <h2 class="text-center">Liste des serveurs</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Serveur</th>
                        <th>Prix (Kama)</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($servers)): ?>
                        <?php foreach ($servers as $server): ?>
                            <tr>
                                <td><?= htmlspecialchars($server['server_name']); ?></td>
                                <td><?= htmlspecialchars($server['price']); ?>€/M</td>
                                <td>
                                    <span class="badge 
                                        <?= $server['status'] == 'Incomplet' ? 'bg-success' : 'bg-danger'; ?>">
                                        <?= htmlspecialchars($server['status']); ?>
                                    </span>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="3" class="text-center">Aucun serveur disponible.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </section>

    </main>

    <?php include_once 'includes/footer.php'; ?>
</body>
<scripts src="assets/js/bootstrap.js"></scripts>
<scripts src="assets/js/scripts.js"></scripts>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</html>