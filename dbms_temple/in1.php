<?php
include("database.php"); // Assuming you have a database connection file

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $priestID = $_POST["PriestID"];
    $priestName = $_POST["PriestName"];
    $contactNumber = $_POST["ContactNumber"];
    $email = $_POST["Email"];
    $address = $_POST["Address"];
    $poojaExpertise = $_POST["PoojaExpertise"];
    $salary = $_POST["Salary"];

    // SQL to insert a new record
    $insertSQL = "INSERT INTO Priest (PriestID, PriestName, ContactNumber, Email, Address, PoojaExpertise, Salary)
                  VALUES ($priestID, '$priestName', '$contactNumber', '$email', '$address', '$poojaExpertise', $salary)";

    // Execute the query
    if ($conn->query($insertSQL) === TRUE) {
        echo "New record has been inserted successfully.";
    } else {
        echo "Error inserting record: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert New Priest</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffe4b5; /* Light orange */
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        h2 {
            color: #333; /* Dark gray text color */
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff; /* White */
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            margin-bottom: 10px;
            color: #333; /* Dark gray text color */
        }

        input, select, textarea {
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 100%;
        }

        button {
            padding: 10px 20px;
            background-color: #ff7f50; /* Dark orange */
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #ff6347; /* Darker orange on hover */
        }

        .redirect-btn {
            margin-top: 15px;
        }

        .redirect-btn a {
            text-decoration: none;
            padding: 10px 20px;
            background-color: #ff6347; /* Dark orange color */
            color: white;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .redirect-btn a:hover {
            background-color: #ff4500; /* Darker orange on hover */
        }
    </style>
</head>
<body>
    <h2>Insert New Priest</h2>
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
        <textarea name="Address" required></textarea>

        <label for="PoojaExpertise">Pooja Expertise:</label>
        <input type="text" name="PoojaExpertise" required>

        <label for="Salary">Salary:</label>
        <input type="text" name="Salary" required>

        <button type="submit">Insert Record</button>
    </form>

    <div class="redirect-btn">
        <a href="priest.php">Priests Page</a>
    </div>
</body>
</html>
