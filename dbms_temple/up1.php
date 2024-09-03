<?php
include("database.php");

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get values from the form
    $priestID = $_POST["PriestID"];
    $priestName = $_POST["PriestName"];
    $contactNumber = $_POST["ContactNumber"];
    $email = $_POST["Email"];
    $address = $_POST["Address"];
    $poojaExpertise = $_POST["PoojaExpertise"];
    $salary = $_POST["Salary"];

    // Update query
    $sql = "UPDATE Priest SET 
            PriestName = '$priestName', 
            ContactNumber = '$contactNumber', 
            Email = '$email', 
            Address = '$address', 
            PoojaExpertise = '$poojaExpertise', 
            Salary = $salary
            WHERE PriestID = $priestID";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Priest Record</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffe0b2; /* Light Orange Background */
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        h2 {
            color: #333; /* Dark Gray Text Color */
        }

        form {
            max-width: 400px;
            width: 100%;
            padding: 20px;
            background-color: #fff; /* White */
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333; /* Dark Gray Text Color */
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            border: 1px solid #ccc; /* Light Gray Border */
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #ff9800; /* Orange Color */
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #f57c00; /* Darker Orange Color on Hover */
        }

        .redirect-button {
            position: absolute;
            top: 20px;
            right: 20px;
            background-color: #333; /* Dark Gray Button Background */
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
        }

        .redirect-button:hover {
            background-color: #555; /* Darker Gray Button Background on Hover */
        }
    </style>
</head>
<body>
    <a href="priest.php" class="redirect-button">Priests</a>

    <h2>Update Priest Record</h2>
    
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="PriestID">Priest ID:</label>
        <input type="text" name="PriestID" required>
        <label for="PriestName">Priest Name:</label>
        <input type="text" name="PriestName" required>
        <label for="ContactNumber">Contact Number:</label>
        <input type="text" name="ContactNumber" required>
        <label for="Email">Email:</label>
        <input type="email" name="Email" required>
        <label for="Address">Address:</label>
        <input type="text" name="Address" required>
        <label for="PoojaExpertise">Pooja Expertise:</label>
        <input type="text" name="PoojaExpertise" required>
        <label for="Salary">Salary:</label>
        <input type="text" name="Salary" required>

        <input type="submit" value="Update Record">
    </form>
</body>
</html>
