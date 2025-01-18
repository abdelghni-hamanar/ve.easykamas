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

        .custom-header {
            background: url('assets/images/cover.jpg') no-repeat center center/cover;
            height: 500px;
            position: relative;
            color: white;
        }

        .custom-header .overlay {
            background: rgba(0, 0, 0, 0.5);
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            }

            .container {
                text-align: center;
            }

            .facebook-box {
                background: rgba(255, 165, 0, 0.9);
                padding: 20px;
                border-radius: 5px;
                display: inline-block;
                margin-bottom: 20px;
            }

            .facebook-box p {
                margin: 0;
                font-size: 14px;
            }

            .facebook-box h2 {
                font-size: 28px;
                margin: 5px 0;
            }

            .facebook-box .likes {
                font-size: 18px;
                font-weight: bold;
            }

            .facebook-box .merci {
                font-size: 16px;
                margin-top: 10px;
            }

            .sell-info {
                margin-top: 20px;
            }

            .sell-info h1 {
                font-size: 36px;
                margin-bottom: 20px;
            }

            .sell-info .btn-warning {
                font-size: 16px;
                padding: 10px 20px;
                text-transform: uppercase;
            }

    </style>
</head>
<body>
    <?php include_once 'includes/navbar.php' ?>

    <?php include_once 'includes/header.php'; ?>


    <?php include_once 'includes/footer.php'; ?>
</body>
<scripts src="assets/js/bootstrap.js"></scripts>
<scripts src="assets/js/scripts.js"></scripts>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</html>