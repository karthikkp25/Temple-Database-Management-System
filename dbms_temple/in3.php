<?php
include("database.php"); // Assuming you have a database connection file

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $hallID = $_POST["HallID"];
    $hallName = $_POST["HallName"];
    $capacity = $_POST["Capacity"];
    $amenities = $_POST["Amenities"];
    $bookingDate = $_POST["BookingDate"];
    $bookingTime = $_POST["BookingTime"];
    $managerID = $_POST["ManagerID"];

    // SQL to insert a new record
    $insertSQL = "INSERT INTO MarriageHall (HallID, HallName, Capacity, Amenities, BookingDate, BookingTime, ManagerID)
                  VALUES ($hallID, '$hallName', $capacity, '$amenities', '$bookingDate', '$bookingTime', $managerID)";

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
    <title>Insert New Marriage Hall</title>
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
    <h2>Insert New Marriage Hall</h2>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="HallID">Hall ID:</label>
        <input type="text" name="HallID" required>

        <label for="HallName">Hall Name:</label>
        <input type="text" name="HallName" required>

        <label for="Capacity">Capacity:</label>
        <input type="number" name="Capacity" required>

        <label for="Amenities">Amenities:</label>
        <textarea name="Amenities" required></textarea>

        <label for="BookingDate">Booking Date:</label>
        <input type="date" name="BookingDate" required>

        <label for="BookingTime">Booking Time:</label>
        <input type="time" name="BookingTime" required>

        <label for="ManagerID">Manager ID:</label>
        <input type="text" name="ManagerID" required>

        <button type="submit">Insert Record</button>
    </form>

    <div class="redirect-btn">
        <a href="hall.php">Marriage Hall Page</a>
    </div>
</body>
</html>
