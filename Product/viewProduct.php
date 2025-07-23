<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="row mt-5">
        <div class="col-md-6">
            <h4>
                <a href="createProduct.php" class="btn btn-primary">Create New Product</a>
            </h4>
        </div>
        <div class="col-md-6">
            <form action="" method="GET" class="row g-2 align-items-center justify-content-end">
                <div class="col-auto">
                    <label for="name" class="form-label mb-0">Product Name</label>
                </div>
                <div class="col-auto">
                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter product name">
                </div>
                <div class="col-auto">
                    <input type="submit" value="Search" name="btnSearch" class="btn btn-outline-primary">
                </div>
            </form>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-12">
            <h1>Product List</h1>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Stock Quantity</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                include 'connectDB.php';
                $conn = connectDB();

                if ($conn->connect_error) {
                    die('Connection failed: ' . $conn->connect_error);
                }

                $sql = "SELECT id, name, price, stock_quantity, image_url FROM products WHERE 1";

                if (isset($_GET['btnSearch'])) {
                    if (!empty($_GET['name'])) {
                        $name = $conn->real_escape_string($_GET['name']);
                        $sql .= " AND name LIKE '%$name%'";
                    }
                }

                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_array(MYSQLI_NUM)) {
                        ?>
                        <tr>
                            <td><?php echo $row[0]; ?></td>
                            <td><?php echo $row[1]; ?></td>
                            <td><?php echo $row[2]; ?></td>
                            <td><?php echo $row[3]; ?></td>
                            <td><img src="<?php echo $row[4]; ?>" alt="Image" width="60"></td>
                            <td>
                                <a href="updateProduct.php?id=<?php echo $row[0]; ?>" class="btn btn-sm btn-primary me-1">Update</a>
                                <a href="deleteProduct.php?id=<?php echo $row[0]; ?>" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                        <?php
                    }
                    $result->free_result();
                } else {
                    ?>
                    <tr>
                        <td colspan="6" class="text-center">No Products Found</td>
                    </tr>
                    <?php
                }
                $conn->close();
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
