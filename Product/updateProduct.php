<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
</head>
<body>
    <h1>Update Product</h1>

    <?php
    if (isset($_GET['id'])) {
        include 'connectDB.php';
        $conn = connectDB();
        $id = $_GET['id'];

        $sql = "SELECT id, name, price, stock_quantity, image FROM products WHERE id = $id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            if ($row = $result->fetch_array(MYSQLI_NUM)) {
    ?>
    <form action="processUpdateProduct.php" method="post">
        <div>
            <label for="id">ID</label>
            <input type="text" name="id" id="id" value="<?php echo $row[0] ?>" readonly/>
        </div>
        <div>
            <label for="name">Product Name</label>
            <input type="text" name="name" id="name" value="<?php echo $row[1] ?>" required/>
        </div>
        <div>
            <label for="price">Price</label>
            <input type="number" step="0.01" name="price" id="price" value="<?php echo $row[2] ?>" required/>
        </div>
        <div>
            <label for="stock_quantity">Stock Quantity</label>
            <input type="number" name="stock_quantity" id="stock_quantity" value="<?php echo $row[3] ?>" required/>
        </div>
        <div>
            <label for="image">Image URL</label>
            <input type="text" name="image" id="image" value="<?php echo $row[4] ?>"/>
        </div>
        <div>
            <input type="submit" value="Update Product"/>
        </div>
    </form>
    <?php
            } else {
                header('Location: productList.php');
            }
        } else {
            header('Location: productList.php');
        }
        $conn->close();
    } else {
        header('Location: productList.php');
    }
    ?>
</body>
</html>
