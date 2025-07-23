<?php
include 'connectDB.php';
$conn = connectDB();

// Lấy dữ liệu từ form POST
$id = $_POST['id'];
$name = $_POST['name'];
$price = $_POST['price'];
$stock_quantity = $_POST['stock_quantity'];
$image = $_POST['image'];

// Câu lệnh cập nhật sản phẩm
$sql = "UPDATE products 
        SET name = '$name',
            price = '$price',
            stock_quantity = '$stock_quantity',
            image = '$image'
        WHERE id = $id";

// Thực thi và điều hướng
if ($conn->query($sql) === TRUE) {
    header('Location: productList.php');
} else {
    header("Location: updateProduct.php?id=$id");
}

$conn->close();
?>
