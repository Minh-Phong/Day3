<?php
include 'connectDB.php';
$conn = connectDB();

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // ép kiểu an toàn

    $sql = "DELETE FROM products WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header('Location: productList.php');
    } else {
        echo "Error deleting product: " . $conn->error;
    }

    $conn->close();
} else {
    header('Location: productList.php');
}
?>
