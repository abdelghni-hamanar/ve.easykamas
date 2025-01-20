<?php
session_start();

// Redirect to home page if the session is not active
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

// Include the database configuration file
require_once 'config/database.php';

// Fetch servers with status 'incomplet' for dropdowns
try {
    $stmt = $pdo->query("SELECT id, server_name, price FROM servers WHERE status = 'incomplet'");
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
    <title>Exchange Kamas</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <style>
        .navbar-nav .nav-link.active {
            border-radius: 5px;
        }

        .form-section {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 5px;
            margin-top: 20px;
        }

        .form-group label {
            font-weight: bold;
        }

        .submit-btn {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .submit-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <!-- Include Navbar -->
    <?php include_once 'includes/navbar.php'; ?>

    <main>
        <div class="container">
            <!-- Form Section -->
            <div class="form-section">
                <form id="exchangeForm" action="./classes/EchangeTicket.php" method="POST">
                    <div class="form-group">
                        <label for="mainServer">Vous livrez sur :</label>
                        <select id="mainServer" name="mainServer" class="form-control" required>
                            <option value="" disabled selected>-- Votre Serveur --</option>
                            <?php foreach ($servers as $server): ?>
                                <option value="<?= htmlspecialchars($server['id']) ?>" data-price="<?= htmlspecialchars($server['price']) ?>">
                                    <?= htmlspecialchars($server['server_name']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="quantity">Quantité à donner (MK):</label>
                        <input type="number" id="quantity" name="quantity" class="form-control" min="1" required>
                    </div>

                    <div class="form-group">
                        <label for="charName">Nom du personnage:</label>
                        <input type="text" id="charName" name="charName" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="exchangeServer">Vous voulez recevoir sur :</label>
                        <select id="exchangeServer" name="exchangeServer" class="form-control" required>
                            <option value="" disabled selected>-- Serveur Réception --</option>
                            <?php foreach ($servers as $server): ?>
                                <option value="<?= htmlspecialchars($server['id']) ?>" data-price="<?= htmlspecialchars($server['price']) ?>">
                                    <?= htmlspecialchars($server['server_name']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="receiveAmount">Vous allez recevoir (MK):</label>
                        <input type="text" id="receiveAmount" name="receiveAmount" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="exchangeCharName">Nom du personnage:</label>
                        <input type="text" id="exchangeCharName" name="exchangeCharName" class="form-control" required>
                    </div>

                    <button type="submit" class="submit-btn">Créer un Ticket</button>
                </form>
            </div>
        </div>
    </main>

    <!-- Include Footer -->
    <?php include_once 'includes/footer.php'; ?>

    <!-- Scripts -->
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/scripts.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <script>
        // Calculate receive amount when exchangeServer is changed
        document.getElementById('exchangeServer').addEventListener('change', function () {
            var mainServer = document.getElementById('mainServer');
            var mainServerPrice = parseFloat(mainServer.options[mainServer.selectedIndex].getAttribute('data-price'));
            var quantity = parseFloat(document.getElementById('quantity').value);
            var exchangeServer = document.getElementById('exchangeServer');
            var exchangeServerPrice = parseFloat(exchangeServer.options[exchangeServer.selectedIndex].getAttribute('data-price'));

            if (!isNaN(mainServerPrice) && !isNaN(quantity) && !isNaN(exchangeServerPrice)) {
                var result = (mainServerPrice * quantity) * 0.85;
                var finalResult = result / exchangeServerPrice;

                // Display the result in the receive amount field
                document.getElementById('receiveAmount').value = finalResult.toFixed(2);
            } else {
                alert('Veuillez sélectionner les serveurs et entrer une quantité valide.');
            }
        });
    </script>
</body>
</html>
