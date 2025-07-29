<?php
include 'db.php';
$name = $_POST['name'];
$item = $_POST['item'];
$quantity = $_POST['quantity'];
$sql = "INSERT INTO orders (name, item, quantity) VALUES ('$name', '$item', $quantity)";
if ($conn->query($sql) === TRUE) {
    echo "<h2>Order placed successfully!</h2>";
    echo "<a href='index.html'>Place Another Order</a>";
} else {
    echo "Error: " . $conn->error;
}
$conn->close();
?>
