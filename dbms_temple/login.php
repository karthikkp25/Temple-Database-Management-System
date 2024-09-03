<?php
session_start();
include("database.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $manager_username = $_POST['manager_username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM Manager WHERE Username = '$manager_username' AND Password = '$password'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $_SESSION['manager_username'] = $manager_username;
        header("Location: menu.php");
        exit;
    } else {
        echo "<script>alert('Invalid username or password');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            background-color: #FFD699; /* Use the same background color as in index.php */
            font-family: Arial, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        form {
            max-width: 400px;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333333;
            text-align: center;
        }

        label {
            display: block;
            margin: 10px 0;
            color: #555555;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #cccccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #3498db;
            color: #ffffff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #2980b9;
        }

        p {
            margin-top: 15px;
            color: #555555;
        }

        a {
            color: #e74c3c;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <form method="post">
        <h1>Login</h1>
        <label for="manager_username">Username:</label>
        <input type="text" id="manager_username" name="manager_username" required><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Login">
        <p>Don't have an account? <a href="signup.php">SignUp here</a></p>
    </form>
</body>
</html>
