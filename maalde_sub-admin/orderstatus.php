<?php
include("../dbconnect.php");

if(isset($_GET['oid']) && isset($_GET['a']))
{
    $sql = "update order_details set order_status=1,admin_id=".$_GET['aid']." where order_id=".$_GET['oid'];
    mysqli_query($conn,$sql);
    echo "<script>window.location.href='allorders.php';</script>";
}

if(isset($_GET['oid']) && isset($_GET['r']))
{
    $sql = "update order_details set order_status=2,admin_id=".$_GET['aid']." where order_id=".$_GET['oid'];
    mysqli_query($conn,$sql);
    echo "<script>window.location.href='allorders.php';</script>";
}

?>