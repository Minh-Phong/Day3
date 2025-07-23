<?php
include 'connectDB.php';
$conn = connectDB();

$email = $_POST['email'];
$psw = $_POST['psw'];
$confpsw = $_POST['confpsw'];
$fullname = $_POST['fullname'];
$phone = $_POST['phone'];

$sql = "INSERT INTO accounts(email,password,fullname,phone) VALUES 
        ('$email','$psw','$fullname','$phone')";
if ($conn->query($sql) === TRUE){
    header('Location: Viewaccount.php');
}else 
    header('Location: Createaccount.php');
?>