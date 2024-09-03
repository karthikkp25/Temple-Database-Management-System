<?php
include("database.php"); // Assuming you have a database connection file

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $eventID = $_POST["EventID"];
    $eventName = $_POST["EventName"];
    $description = $_POST["Description"];
    $date = $_POST["Date"];
    $time = $_POST["Time"];
    $venue = $_POST["Venue"];
    $managerID = $_POST["ManagerID"];

    // SQL to insert a new record
    $insertSQL = "INSERT INTO SpecialEvents (EventID, EventName, Description, Date, Time, Venue, ManagerID)
                  VALUES ($eventID, '$eventName', '$description', '$date', '$time', '$venue', $managerID)";

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
    <title>Insert New Special Event</title>
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
    <h2>Insert New Special Event</h2>
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

        <button type="submit">Insert Record</button>
    </form>

    <div class="redirect-btn">
        <a href="special.php">Special Events Page</a>
    </div>
</body>
</html>
