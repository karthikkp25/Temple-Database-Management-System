<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Temple Management System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #FFD699; /* light orange background */
        }

        header {
            background-color: #8B4513; /* saddle brown background */
            color: #fff; /* white text color */
            text-align: center;
            padding: 20px 0;
        }

        h1 {
            font-family: 'Arial Black', sans-serif; /* large bold font */
        }

        nav {
            background-color: #FFD699; /* light orange background */
            padding: 10px;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            text-align: center;
        }

        nav ul li {
            display: inline;
            margin-right: 10px;
        }

        nav ul li a {
            color: #8B4513; /* saddle brown text color */
            text-decoration: none;
            font-size: 16px;
            font-family: 'Arial', sans-serif; /* default font */
        }

        section#home {
            background-color: #FFD699; /* light orange background */
            color: #8B4513; /* saddle brown text color */
            text-align: center;
            padding: 100px 20px;
            height: 100vh; /* Full height of the viewport */
            overflow-y: auto; /* Add vertical scroll if content exceeds viewport height */
        }

        footer {
            background-color: #8B4513; /* saddle brown background */
            color: #fff; /* white text color */
            text-align: center;
            padding: 20px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        footer a {
            color: #fff; /* white text color */
            text-decoration: none;
            font-family: 'Arial', sans-serif; /* default font */
        }

        .login-signup-buttons {
            text-align: center;
            margin-top: 20px;
        }

        .login-signup-buttons a {
            display: inline-block;
            padding: 10px 20px;
            margin: 0 10px;
            background-color: #8B4513; /* saddle brown background */
            color: #fff; /* white text color */
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Temple Management System</h1>
    </header>
    <section id="home">
        <h2>Welcome to Our Temple</h2>
        <p>Opening Hours: Monday-Saturday 9:00 AM - 8:00 PM</p>
        <p>Closing Time: Sunday 10:00 AM - 6:00 PM</p>
        <p>About Us: temple@example.com</p>

        <div class="login-signup-buttons">
            <a href="login.php">Login</a>
            <a href="signup.php">Signup</a>
        </div>
    </section>

    <footer>
        <a href="index.html">Home</a>
    </footer>
</body>
</html>
