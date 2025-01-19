<?php
// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if the user is logged in by verifying if a session variable (e.g., 'user_id') is set
if (empty($_SESSION['user_id'])) {
    // If not logged in, redirect to login page
    header("Location: login.php");
    exit();
}

// Database connection
require_once 'config/database.php';

// Fetch servers from the database excluding those with "stock complet" status
$servers = [];
try {
    $stmt = $pdo->query("SELECT id, server_name FROM servers WHERE status != 'stock complet'");
    $servers = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error fetching servers: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendre des Kamas</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
    <!-- Include Navbar -->
    <?php include 'includes/navbar.php'; ?>

    <div class="container mt-5">
        <h2 class="text-center text-success">Nouveau Système pour les vendeurs VIP !</h2>
        <p class="text-center text-primary">Vendez vos kamas plus rapidement, sans passer par livechat.</p>

        <div class="card p-4">
            <form action="process-vip.php" method="POST">
                <div class="mb-3">
                    <label for="server" class="form-label">Serveur</label>
                    <select class="form-select" id="server" name="server" required>
                        <option selected disabled>-- Serveurs --</option>
                        <?php foreach ($servers as $server): ?>
                            <option value="<?php echo htmlspecialchars($server['id']); ?>">
                                <?php echo htmlspecialchars($server['server_name']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantité à vendre (Millions)</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Quantité en millions" required>
                </div>

                <div class="mb-3">
                    <label for="character_name" class="form-label">Nom de votre personnage</label>
                    <input type="text" class="form-control" id="character_name" name="character_name" placeholder="Nom de personnage" required>
                </div>


                <button type="submit" class="btn btn-warning w-100">VENDRE</button>
            </form>
        </div>

    </div>

    <!-- Include Footer -->
    <?php include 'includes/footer.php'; ?>

    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
