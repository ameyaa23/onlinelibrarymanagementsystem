<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List Table</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: pink; /* Change this to your desired background color */
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: black;
        }

        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tbody tr:hover {
            background-color: #e0e0e0;
        }

        td[colspan="3"] {
            text-align: center;
            font-style: italic;
            color: #777;
        }
    </style>
</head>
<body>

    <h1>User List Table</h1>

    <table>
        <thead>
            <tr>
                <th>User Name</th>
                <th>Email</th>
                <th>Phone Number</th>
            </tr>
        </thead>

        <tbody>
            <?php
            include 'connectionaddbook.php';

            // Query to fetch user data
            $query = "SELECT UserName, Email, PhoneNumber FROM userdata";
            $result = $connect->query($query);

            // Check if there are rows in the result
            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['UserName']}</td>
                            <td>{$row['Email']}</td>
                            <td>{$row['PhoneNumber']}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='3'>No users found</td></tr>";
            }

            // Close the database connection
            $connect->close();
            ?>
        </tbody>
    </table>

</body>
</html>
