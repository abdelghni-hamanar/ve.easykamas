<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <style>
        /* Custom Form Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa; /* Light background color */
        }

        /* Container for forms */
        .form-container {
            background-color: #fff;
            padding: 20px 40px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            margin: 50px auto; /* Centering the form vertically and horizontally */
        }

        h2 {
            font-size: 2rem;
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-size: 1rem;
            color: #333;
        }

        input[type="text"], input[type="email"], input[type="password"], textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 1rem;
            color: #333;
        }

        input[type="text"]:focus, input[type="email"]:focus, input[type="password"]:focus {
            border-color: #ffc107;
            outline: none;
        }

        button.btn {
            width: 100%;
            padding: 10px;
            background-color: #ffc107;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button.btn:hover {
            background-color: #e0a800;
        }

        .form-footer {
            text-align: center;
            margin-top: 15px;
        }

        .form-footer a {
            color: #ffc107;
            text-decoration: none;
        }

        .form-footer a:hover {
            text-decoration: underline;
        }

        /* Ensure navbar styles aren't affected */
        .navbar {
            background-color: #ffc107; /* Yellow background */
            padding: 10px 20px;
            position: relative; /* Keep navbar from overlapping */
            z-index: 10;
        }

        /* Specific to the nav links */
        .navbar-brand img {
            height: 40px; /* Set logo height */
        }

        .navbar-brand span {
            font-size: 1.5rem;
            font-weight: bold;
            color: #000; /* Black text for brand name */
        }

        .navbar-nav .nav-link {
            color: #000; /* Black text for links */
            font-weight: 500;
            padding: 10px 15px;
        }

        .navbar-nav .nav-link:hover {
            color: #fff; /* White text on hover */
            background-color: rgba(0, 0, 0, 0.1); /* Light background on hover */
        }

        .navbar-nav .nav-link.active {
            color: #000000; /* White text for active link */
            background-color: #ffffff; /* Black background for active link */
            border-radius: 5px; /* Border-radius for active link */
        }

        .navbar-nav .nav-item i {
            margin-right: 5px; /* Space between icon and text */
        }

    </style>
</head>
<body>
    <!-- Navbar -->
    <?php include_once 'includes/navbar.php' ?>

    <!-- Register Form -->
    <div class="container">
        <div class="form-container">
            <h2>Register</h2>
            <form action="./classes/reg.php" method="POST">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required placeholder="Enter your email">
                </div>
                <div class="form-group">
                    <label for="username">Full name</label>
                    <input type="text" id="full_name" name="full_name" required placeholder="Choose a username">
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" id="phone" name="phone" placeholder="Enter your phone number (optional)">
                </div>
                
                <div class="form-group">
                    <label for="adresse">Address</label>
                    <textarea id="adresse" name="adresse" placeholder="Enter your address (optional)"></textarea>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required placeholder="Create a password">
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" id="confirm_password" name="confirm_password" required placeholder="Confirm your password">
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
                <div class="form-footer">
                    <p>Already have an account? <a href="login.php">Login here</a></p>
                </div>
            </form>
        </div>
    </div>

    <?php include_once 'includes/footer.php' ?>

    </body>
</html>
