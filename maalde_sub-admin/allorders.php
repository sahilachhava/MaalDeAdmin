<?php
session_start();
include("../dbconnect.php");
if(!isset($_SESSION["user_id"]))
{
	header("Location: ../index.php");
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
                $sql2 = "select count(*) from order_details";
                $result2 = mysqli_query($conn,$sql2);
                $row = mysqli_fetch_array($result2);
                $total = $row[0];
            ?>
             <div class="row">
              <div class="col-12">
                 <div class="card m-b-30">
              <div class="card-body">
      <h4 class="mt-0 header-title"><?php echo "Total Orders:"." ".$total; ?></h4> <br>
         <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                 <thead>
                  <tr>
                    <th> ID </th>
                    <th>Customer Name</th>
                    <th>Date Time </th>
                    <th> Order Amount </th>
                    <th> Order Status </th>
                    <th> View Details </th>
                    </tr>
                     </thead>
                     <tbody>
                        <?php
                            include("../dbconnect.php");
                        $sql = "select * from order_details";
                        $result = mysqli_query($conn,$sql);
                        while($row=mysqli_fetch_array($result))
                        {
                            extract($row);
                            $sql1 = "select customer_name from customer_details where customer_id=".$customer_id;
                            $res = mysqli_query($conn,$sql1);
                            $row = mysqli_fetch_array($res);
                            echo "<tr>";
                            echo "<td> $order_id </td>";
                            echo "<td> $row[0] </td>";
                            echo "<td> $order_datetime </td>";
                            echo "<td> $order_price </td>";
                            if($order_status == 0){
                                echo "<td> Pending </td>";
                            }else if($order_status == 1){
                                echo "<td> Approved </td>";
                            }else{
                                 echo "<td> Rejected </td>";
                            }
                            echo "<td><a href='items.php?oid=".$order_id."'><button class='btn btn-primary waves-effect waves-light'>View Details</button></a></td>";
                            echo "</tr>";
                        }
                    ?>
                                                </tbody>
                                            </table>
            
                                        </div>
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