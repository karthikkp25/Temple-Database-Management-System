<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Priest Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #FFDAB9; /* PeachPuff */
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        header {
            background-color: #FFA07A; /* Light Salmon Color */
            padding: 10px;
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        h1 {
            color: #333; /* Dark Gray Text Color */
        }

        nav {
            display: flex;
            gap: 15px;
        }

        nav a {
            padding: 8px 16px;
            background-color: #FFA07A; /* Light Salmon Color */
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
        }

        nav a:hover {
            background-color: #FF8C66; /* Darker Salmon Color on Hover */
        }

        table {
            width: 80%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: white;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #FFA07A; /* Light Salmon Color */
            color: white;
        }

        input[type="text"] {
            padding: 8px;
            margin-right: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            padding: 8px 16px;
            background-color: #FFA07A; /* Light Salmon Color */
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #FF8C66; /* Darker Salmon Color on Hover */
        }
    </style>
</head>
<body>
    <header>
        <h1>Priest Management</h1>
        <nav>
            <a href="menu.php">MENU</a>
            <a href="up1.php">UPDATE</a>
            <a href="del1.php">DELETE</a>
            <a href="in1.php">INSERT</a>
        </nav>
    </header>

    <div>
        <input type="text" id="priestSearchInput" placeholder="Search by PriestName">
        <button onclick="searchPriest()">Search</button>
    </div>

    <?php
    include("database.php");

    $sql = "SELECT * FROM Priest";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>
                <tr>
                    <th>Priest ID</th>
                    <th>Priest Name</th>
                    <th>Contact Number</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Pooja Expertise</th>
                    <th>Salary</th>
                </tr>";

        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>".$row["PriestID"]."</td>
                    <td>".$row["PriestName"]."</td>
                    <td>".$row["ContactNumber"]."</td>
                    <td>".$row["Email"]."</td>
                    <td>".$row["Address"]."</td>
                    <td>".$row["PoojaExpertise"]."</td>
                    <td>".$row["Salary"]."</td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }

    $conn->close();
    ?>

    <script>
        function searchPriest() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("priestSearchInput");
            filter = input.value.toUpperCase();
            table = document.querySelector("table");
            tr = table.getElementsByTagName("tr");

            for (i = 1; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
</body>
</html>
