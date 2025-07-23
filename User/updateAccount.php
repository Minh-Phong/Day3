<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Account</title>
</head>
<body>
    <H1>Update Account</H1>
    <?php
        if (isset($_GET['id'])){
            include 'connectDB.php';
            $conn = connectDB();
            $id = $_GET['id'];

            $sql = "SELECT id,email,fullname,phone
                    FROM accounts 
                    WHERE id = $id";
            $result = $conn->query($sql);
            if ($result->num_rows > 0){
                if ($row = $result->fetch_array(MYSQLI_NUM)){
        ?>
    <form action= "processUpdate.php" method="post">
        <div>
            <label for="id">id</label>
            <input type="text" name="id" id="id" value= "<?php echo $row[0]?>"/>
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value= "<?php echo $row[1]?>"/>
        </div>
        <div>
            <label for="fullname">Full name</label>
            <input type="text" name="fullname" id="fullname" value= "<?php echo $row[2]?>">
        </div>
        <div>
            <label for="phone">Phone</label>
            <input type="phone" name="phone" id="phone" value= "<?php echo $row[3]?>">
        </div>
        <div>
            <input type="submit" value="update"/>
        </div>
    </form>
    <?php
        } else header ('Location: ViewAccount.php');
        } else header ('Location: ViewAccount.php');
        } else header ('Location: ViewAccount.php');
        
    ?>

</body>
</html>