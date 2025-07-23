<?php
include 'connectDB.php';
$conn = connectDB();

// Lấy dữ liệu từ form
$name = $_POST['name'];
$price = $_POST['price'];
$stock_quantity = $_POST['stock_quantity'];
$image = $_POST['image'];

// Câu lệnh SQL thêm sản phẩm
$sql = "INSERT INTO products(name, price, stock_quantity, image) 
        VALUES ('$name', '$price', '$stock_quantity', '$image')";

// Thực thi và điều hướng
if ($conn->query($sql) === TRUE) {
    header('Location: productList.php'); // hoặc viewProduct.php nếu bạn đặt tên khác
} else {
    echo "Error: " . $conn->error;
    // Hoặc: header('Location: createProduct.php');
}

$conn->close();
?>
