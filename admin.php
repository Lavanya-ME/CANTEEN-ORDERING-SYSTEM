<?php
include 'db.php';
$sql = "SELECT * FROM orders";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - View Orders</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Admin - View Orders</h1>
    <!-- Table to display orders -->
    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Name</th>
                <th>Item</th>
                <th>Quantity</th>
                <th>Order Time</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // If there are results, loop through and display each order
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['name']}</td>
                            <td>{$row['item']}</td>
                            <td>{$row['quantity']}</td>
                            <td>{$row['order_time']}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No orders yet</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <br><a href="index.html">Back to Menu</a>
</body>
</html>
<?php
$conn->close();
?>
