<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    <div class="row mt-5">
        <div class="col-md-6">
            <h4>
                <a href="createAccount.php" class="btn btn-primary">Create New</a>
            </h4>
        </div>
        <div class="col-md-6">
            <form action="" method="GET" class="row g-2 align-items-center justify-content-end">
                <div class="col-auto">
                    <label for="email" class="form-label mb-0">Email</label>
                </div>
                <div class="col-auto">
                    <input type="text" name="email" id="email" class="form-control" placeholder="Enter email">
                </div>
                <div class="col-auto">
                    <input type="submit" value="Search" name="btnSearch" class="btn btn-outline-primary">
                </div>
            </form>
        </div>
        <div class="col-md-6">
            <form action="" method="GET" class="row g-2 align-items-center justify-content-end">
                <div class="col-auto">
                    <label for="email" class="form-label mb-0">Email</label>
                </div>
                <div class="col-auto">
                    <input type="text" name="email" id="email" class="form-control" placeholder="Enter email">
                </div>
                <div class="col-auto">
                    <input type="submit" value="Search" name="btnSearch" class="btn btn-outline-primary">
                </div>
            </form>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-12">
            <h1>Account List</h1>
            <table class="table table-bordered table-striped">
                <thead >
                    <tr>
                        <th>Id</th>
                        <th>Email</th>
                        <th>Full Name</th>
                        <th>Phone</th>
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
                    
                    $sql = "SELECT id, email, fullname, phone FROM accounts";
                    
                    if ( isset($_GET['btnSearch']){
                        if (isset($_GET['email'])){
                            $email = $_GET['email'];
                            $sql .= " AND email LIKE '%$email%'";
                        }
                        if (isset($_GET['phone'])){
                            $phone = $_GET['phone'];
                            $sql .= " AND phone LIKE '%$phone%'";
                        }
                    })

                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_array(MYSQLI_NUM)) {
                    ?>
                            <tr>
                                <td><?php echo $row[0]; ?></td>
                                <td><?php echo $row[1]; ?></td>
                                <td><?php echo $row[2]; ?></td>
                                <td><?php echo $row[3]; ?></td>
                                <td>
                                    <a href="updateAccount.php?id=<?php echo $row[0]; ?>" class="btn btn-sm btn-primary me-1">Update</a>
                                    <a href="deleteAccount.php?id=<?php echo $row[0]; ?>" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                    <?php
                        }
                        $result->free_result();
                    } else {
                    ?>
                        <tr>
                            <td colspan="5" class="text-center">No Account</td>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>