<?php
    // Check if session has already started
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
?>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #ffc107;">
    <div class="container">
        <!-- Logo and brand name -->
        <a class="navbar-brand" href="#">
            <!--
            <img src="logo.png" alt="Logo" style="height: 40px;">
            -->
            <span class="ms-2">EasyKamas</span>
        </a>
        
        <!-- Toggler for mobile view -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <!-- Links that are visible to all users -->
                <li class="nav-item">
                    <a class="nav-link active" href="index.php">ACCUEIL</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="exchange-kama.php">ECHANGER DES KAMAS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="vente-kamas.php">VENDRE KAMAS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="achete-kamas.php">ACHETER KAMAS</a>
                </li>

                <!-- Links that are only visible if the user is logged in -->
                <?php if (isset($_SESSION['user_id'])): // Check if the user is logged in ?>
                    <li class="nav-item">
                        <a class="nav-link" href="mesventes.php"><i class="fas fa-euro-sign"></i> Mes ventes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="mesechanges.php"><i class="fas fa-euro-sign"></i> Mes Echanges</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php"><i class="fas fa-user"></i> Mon compte</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i> Déconnexion</a>
                    </li>
                <?php else: // If the user is not logged in ?>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php"><i class="fas fa-sign-in-alt"></i> Log in</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
