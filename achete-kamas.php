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
    <style>
        .navbar-nav .nav-link.active {
            border-radius: 5px;
        }

        /* Custom Chat Button Style */
        #openChatSpan {
            cursor: pointer;
            color: #ffffff;
            background-color: #17a2b8;
            padding: 5px 10px;
            border-radius: 5px;
            text-decoration: none;
        }

        #openChatSpan:hover {
            background-color: #138496;
        }
    </style>
</head>
<body>
    <?php include_once 'includes/navbar.php' ?>

    <main>
        <!-- Main Section for Vente Kama -->
        <section>
        <div class="container">
            <h2 class="text-center">Liste des serveurs</h2>
            <br/>
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
                                    <!-- Replace badge with Open Live Chat link -->
                                    <center>
                                        <a href="javascript:void(0);" id="openChatLink" onclick="openLiveChat()">Cliquez ici pour Vendre</a>
                                    </center>
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

    <!-- Live Chat Script (CDN) -->
    <script id="chatway" async="true" src="https://cdn.chatway.app/widget.js?id=qnTohqUaQooG"></script>

    <script>
        // Function to open live chat window
        function openLiveChat() {
            // Check if LC_API is available
            if (typeof LC_API !== 'undefined' && LC_API.open_chat_window) {
                console.log("Opening live chat...");
                LC_API.open_chat_window();
            } else {
                console.error("LC_API is not available. Please check the chatway script.");
            }
        }

        // Ensure LC_API is loaded before attempting to use it
        window.addEventListener('load', function() {
            // Checking if LC_API is available
            if (typeof LC_API === 'undefined') {
                console.error("Live Chat API is not available. The script may not have loaded properly.");
            } else {
                console.log("Live Chat API is loaded and ready.");
            }
        });
    </script>

</body>
<scripts src="assets/js/bootstrap.js"></scripts>
<scripts src="assets/js/scripts.js"></scripts>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</html>
