<?php
session_start();
include("../dbconnect.php");
if(!isset($_SESSION["user_id"]))
{
	header("Location: ../index.php");
}
if(isset($_GET['nid']))
{
    $sql = "update notification set n_status=1 where n_id=".$_GET['nid'];
    mysqli_query($conn,$sql);
}
?>
<!DOCTYPE html>
<html>
<?php include("../header.php"); ?>

    <body class="fixed-left">
        <!-- Loader -->
        <div id="preloader"><div id="status"><div class="spinner"></div></div></div>

        <!-- Begin page -->
        <div id="wrapper">
            <?php include("sidemenu.php") ?>
            <!-- Start right Content here -->
            <div class="content-page">
                <div class="content">
                   <?php include("topmenu.php") ?>
                    <div class="page-content-wrapper ">
                        <div class="container-fluid">
                            <!-- page title start -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="page-title-box">
                                        <h4 class="page-title">Order Details</h4>
                                    </div>
                                </div>
                            </div>
                            <!-- end page title -->
                            <!-- dashboard content -->
 <?php
                $sql2 = "select count(*) from item_details where order_id=".$_GET['oid'];
                $result2 = mysqli_query($conn,$sql2);
                $row = mysqli_fetch_array($result2);
                $total = $row[0];
            ?>
             <div class="row">
              <div class="col-12">
                 <div class="card m-b-30">
              <div class="card-body">
      <h4 class="mt-0 header-title"><?php echo "Total Items:"." ".$total; ?></h4> <br>
         <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                 <thead>
                  <tr>
                    <th> Item ID </th>
                    <th> Design No </th>
                    <th> Size Qty (L) </th>
                    <th> Size Qty (XL) </th>
                    <th> Size Qty (XXL) </th>
                    <th> Design Total </th>
                    </tr>
                     </thead>
                     <tbody>
                        <?php
                            include("../dbconnect.php");
                        $sql = "select * from item_details where order_id=".$_GET['oid'];
                        $result = mysqli_query($conn,$sql);
                        while($row=mysqli_fetch_array($result))
                        {
                            extract($row);
                            echo "<tr>";
                            echo "<td> $item_id </td>";
                            echo "<td> $design_no </td>";
                            echo "<td> $size_l </td>";
                            echo "<td> $size_xl </td>";
                            echo "<td> $size_xxl </td>";
                            echo "<td> $design_amt </td>";
                            echo "</tr>";
                        }
                    ?>
                                                </tbody>
                                            </table>
                                            <br><center>
                                            <?php
                                                $sql = "select order_status from order_details where order_id=".$_GET['oid'];
                                                $res = mysqli_query($conn,$sql);
                                                $row = mysqli_fetch_array($res);
                                                if($row[0] == 0){
                                                   echo "<a href='orderstatus.php?a=1&aid=".$_SESSION["user_id"]."&oid=".$_GET['oid']."'><button style='width:40%;' class='btn btn-primary waves-effect waves-light'>Approve Order</button></a>"; 
                                                   echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                                                   echo "<a href='orderstatus.php?r=1&aid=".$_SESSION["user_id"]."&oid=".$_GET['oid']."'><button style='width:40%;background-color:red;' class='btn btn-primary waves-effect waves-light'>Reject Order</button></a>";
                                                }else if($row[0] == 1){
                                                    echo "Order is already Approved";
                                                }else{
                                                    echo "Order is already Rejected";
                                                }
                                             ?></center></div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                            
                            <!-- dashboard content end-->
                <?php include("../footer.php") ?>
            </div>
            <!-- End main content here -->
        </div>
        <!-- END wrapper -->
        <?php include("../scripts.php") ?>
    </body>
</html>