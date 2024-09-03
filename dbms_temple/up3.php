<?php
include("database.php");

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get values from the form
    $eventID = $_POST["EventID"];
    $eventName = $_POST["EventName"];
    $description = $_POST["Description"];
    $date = $_POST["Date"];
    $time = $_POST["Time"];
    $venue = $_POST["Venue"];
    $managerID = $_POST["ManagerID"];

    // Update query
    $sql = "UPDATE SpecialEvents SET 
            EventName = '$eventName', 
            Description = '$description', 
            Date = '$date', 
            Time = '$time', 
            Venue = '$venue', 
            ManagerID = $managerID
            WHERE EventID = $eventID";

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
    <title>Update Special Event Record</title>
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

        input, textarea, select {
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
    <a href="special.php" class="redirect-button">Special Events</a>

    <h2>Update Special Event Record</h2>
    
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="EventID">Event ID:</label>
        <input type="text" name="EventID" required>
        <label for="EventName">Event Name:</label>
        <input type="text" name="EventName" required>
        <label for="Description">Description:</label>
        <textarea name="Description" required></textarea>
        <label for="Date">Date:</label>
        <input type="date" name="Date" required>
        <label for="Time">Time:</label>
        <input type="time" name="Time" required>
        <label for="Venue">Venue:</label>
        <input type="text" name="Venue" required>
        <label for="ManagerID">Manager ID:</label>
        <input type="text" name="ManagerID" required>

        <input type="submit" value="Update Record">
    </form>
</body>
</html>
