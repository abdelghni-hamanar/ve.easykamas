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
        <section class="container my-5">
            <h2 class="text-center mb-4">Vente de Kamas</h2>
            <div class="table-responsive">
                <table class="table table-bordered text-center">
                    <thead class="bg-warning text-dark">
                        <tr>
                            <th>Serveur</th>
                            <th>Prix 1M</th>
                            <th>Stock</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Orukam</td>
                            <td>10.00 €</td>
                            <td>Incomplet</td>
                        </tr>
                        <tr>
                            <td>Tylezia</td>
                            <td>9.50 €</td>
                            <td>Stock complet</td>
                        </tr>
                        <tr>
                            <td>Imagiro</td>
                            <td>8.75 €</td>
                            <td>Incomplet</td>
                        </tr>
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