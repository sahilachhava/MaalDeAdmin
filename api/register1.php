<?php

include("../dbconnect.php");

$name = $_GET['name'];
$fname = $_GET['fname'];
$phone = $_GET['phone'];
$pass = $_GET['pass'];
$add = $_GET['add'];
$type = $_GET['type'];

if($type == "customer"){
    $sql1 = "select * from customer_details where customer_phone=".$_GET['phone'];
    $result = mysqli_query($conn,$sql1);
    if(mysqli_num_rows($result)>0){
          $arr = array("response" => "exists");
        echo json_encode($arr);
    }else{
        $sql = "insert into customer_details(customer_name,customer_firmname,customer_phone,customer_address,customer_pass) values('$name','$fname','$phone','$add','$pass')";
        $res = mysqli_query($conn,$sql);
        $arr = array("response" => "success");
        echo json_encode($arr);
    }
}else if($type == "supplier"){
    $sql1 = "select * from supplier_details where supplier_phone=".$_GET['phone'];
    $result = mysqli_query($conn,$sql1);
    if(mysqli_num_rows($result)>0){
          $arr = array("response" => "exists");
        echo json_encode($arr);
    }else{
        $sql = "insert into supplier_details(supplier_name,supplier_firmname,supplier_phone,supplier_address,supplier_pass) values('$name','$fname','$phone','$add','$pass')";
        $res = mysqli_query($conn,$sql);
        $arr = array("response" => "success");
        echo json_encode($arr);
    }
}
?>