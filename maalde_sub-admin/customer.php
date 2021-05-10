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
                                        <h4 class="page-title">Customer Details</h4>
                                    </div>
                                </div>
                            </div>
                            <!-- end page title -->
                            <!-- dashboard content -->
 <?php
                $sql2 = "select count(*) from customer_details";
                $result2 = mysqli_query($conn,$sql2);
                $row = mysqli_fetch_array($result2);
                $total = $row[0];
            ?>
             <div class="row">
              <div class="col-12">
                 <div class="card m-b-30">
              <div class="card-body">
      <h4 class="mt-0 header-title"><?php echo "Total Customer:"." ".$total; ?></h4> <br>
         <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                 <thead>
                  <tr>
                    <th> ID </th>
                    <th>Name</th>
                    <th> Firm Name</th>
                     <th>Email</th>
                    <th>Phone</th>
                    <th> Item in Cart </th>
                    <th>Active Status</th>
                    <th> Block / Unblock </th>
                    </tr>
                     </thead>
                     <tbody>
                        <?php
                            include("../dbconnect.php");
                        $sql = "select * from customer_details";
                        $result = mysqli_query($conn,$sql);
                        while($row=mysqli_fetch_array($result))
                        {
                            extract($row);
                            echo "<tr>";
                            echo "<td> C-".$customer_id."</td>";
                            echo "<td> $customer_name </td>";
                            echo "<td> $customer_firmname </td>";
                            echo "<td> $customer_email </td>";
                            echo "<td> $customer_phone </td>";
                            echo "<td> $customer_cart </td>";
                            if($customer_active == 1){
                                echo "<td> Active </td>";
                                echo "<td><a href='../block.php?cusid=".$customer_id."'><button class='btn btn-primary waves-effect waves-light'>Block Now</button></a></td>";
                            }else{
                                echo "<td> Not Active </td>";
                                echo "<td><a href='../block.php?cusid=".$customer_id."'><button class='btn btn-primary waves-effect waves-light'>Unblock / Active</button></a></td>";
                            }
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