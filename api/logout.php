<?php
include("../dbconnect.php");

$token = $_GET['token'];

$sql = "delete from token_details where token=".$token;
$res = mysqli_query($conn,$sql);

$arr = array("response" => "success");
echo json_encode($arr);
?>