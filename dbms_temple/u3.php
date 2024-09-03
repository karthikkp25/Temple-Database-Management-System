<?php
include("database.php");

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get values from the form
    $hallID = $_POST["HallID"];
    $hallName = $_POST["HallName"];
    $capacity = $_POST["Capacity"];
    $amenities = $_POST["Amenities"];
    $bookingDate = $_POST["BookingDate"];
    $bookingTime = $_POST["BookingTime"];
    $managerID = $_POST["ManagerID"];

    // Update query
    $sql = "UPDATE MarriageHall SET 
            HallName = '$hallName', 
            Capacity = $capacity, 
            Amenities = '$amenities', 
            BookingDate = '$bookingDate', 
            BookingTime = '$bookingTime', 
            ManagerID = $managerID
            WHERE HallID = $hallID";

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
    <title>Update Marriage Hall Record</title>
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

        input, textarea {
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
    <a href="hall.php" class="redirect-button">Marriage Hall</a>

    <h2>Update Marriage Hall Record</h2>
    
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

        <input type="submit" value="Update Record">
    </form>
</body>
</html>
