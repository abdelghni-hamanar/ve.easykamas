<?php
// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if user is logged in
if (empty($_SESSION['user_id'])) {
    // If not logged in, redirect to login page
    header("Location: login.php");
    exit();
}

// Initialize session data (use default values if session data is not set)
$full_name = $_SESSION['full_name'] ?? '';
$address = $_SESSION['address'] ?? '';
$phone = $_SESSION['phone'] ?? '';

// Handle form submission to update profile
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['full_name'])) {
        $_SESSION['full_name'] = $_POST['full_name'];
        $full_name = $_POST['full_name'];
    }
    if (!empty($_POST['address'])) {
        $_SESSION['address'] = $_POST['address'];
        $address = $_POST['address'];
    }
    if (!empty($_POST['phone'])) {
        $_SESSION['phone'] = $_POST['phone'];
        $phone = $_POST['phone'];
    }
    if (!empty($_POST['password'])) {
        $password = $_POST['password'];
        // Update password (hash it before storing it securely)
        $_SESSION['password'] = password_hash($password, PASSWORD_DEFAULT);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon compte</title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
</head>
<body>
    <!-- Include Navbar -->
    <?php include 'includes/navbar.php'; ?>

    <div class="container">
        <h1>Mon compte</h1>

        <!-- Profile Form -->
        <form action="profile.php" method="POST">
            <div class="mb-3">
                <label for="full_name" class="form-label">Nom complet</label>
                <input type="text" class="form-control" id="full_name" name="full_name" value="<?php echo htmlspecialchars($full_name); ?>" required>
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Adresse</label>
                <input type="text" class="form-control" id="address" name="address" value="<?php echo htmlspecialchars($address); ?>" required>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Numéro de téléphone</label>
                <input type="text" class="form-control" id="phone" name="phone" value="<?php echo htmlspecialchars($phone); ?>" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Laissez vide si vous ne voulez pas changer">
            </div>

            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </form>
    </div>

    <!-- Include Footer -->
    <?php include 'includes/footer.php'; ?>
</body>
</html>
