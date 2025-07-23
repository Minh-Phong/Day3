<?php
include 'connectDB.php';
$conn = connectDB();

$id = $_GET['id'];

$sql = "DELETE FROM account WHERE id = $id";

if ($conn->query($sql) === TRUE){
    header('Location: Viewaccount.php');
}
?>