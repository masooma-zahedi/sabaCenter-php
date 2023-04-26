<?php
$id = $_GET['id'];
echo $id;
$conn = mysqli_connect("localhost","root","","php_test");
$sql = "DELETE FROM user_tbl WHERE user_id = '$id'";
mysqli_query($conn,$sql);
header("location:listcontact.php?delete='$id'");