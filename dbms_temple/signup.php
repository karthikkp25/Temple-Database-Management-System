<?php
session_start();
include("database.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $mid = $_POST['ManagerID'];
    $manager_name = $_POST['ManagerName'];
    $username = $_POST['Username'];
    $password = $_POST['Password'];
    $contact_number = $_POST['ContactNumber'];

    if (!empty($username) && !empty($password)) {
        // Fix SQL syntax error and add the missing quote in the VALUES section
        $query = "INSERT INTO Manager (ManagerID, ManagerName, Username, Password, ContactNumber) 
                  VALUES ('$mid', '$manager_name', '$username', '$password', '$contact_number')";
        mysqli_query($conn, $query);

        header("location: login.php");  // Redirect to the home page or any desired page after signup
        die;
    } else {
        echo "<script type='text/javascript'>alert('Please enter valid input')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manager Signup Page</title>
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
            background-color: #4caf50;
            color: #ffffff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        p {
            margin-top: 15px;
            color: #555555;
        }

        a {
            color: #3498db;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <form method="post">
        <h1>Manager Sign Up</h1>
        <label for="ManagerID">Manager ID:</label>
        <input type="text" id="ManagerID" name="ManagerID" required><br>

        <label for="ManagerName">Manager Name:</label>
        <input type="text" id="ManagerName" name="ManagerName" required><br>
        
        <label for="Username">Username:</label>
        <input type="text" id="Username" name="Username" required><br>

        <label for="Password">Password:</label>
        <input type="password" id="Password" name="Password" required><br>
        
        <label for="ContactNumber">Contact Number:</label>
        <input type="tel" id="ContactNumber" name="ContactNumber" required><br>
     
        <input type="submit" value="Submit">

        <p>Already have an account? <a href="login.php">Login here</a></p>
    </form>
</body>
</html>
