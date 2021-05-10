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
                                    	<?php 
                                    		$sql = "select admin_name from admin_details where admin_id=".$_SESSION["user_id"];
                                    		$res = mysqli_query($conn,$sql);
                                    		$row = mysqli_fetch_array($res);
                                    	?>
                                        <h4 class="page-title"><?php echo $row[0]."'s "; ?>Dashboard</h4>
                                    </div>
                                </div>
                            </div>
                            <!-- end page title -->
                            <!-- dashboard content -->
                            <div class="row">
                                <!-- Column -->
                                <div class="col-md-6 col-lg-6 col-xl-3">
                                    <div class="card m-b-30">
                                        <div class="card-body">
                                            <div class="d-flex flex-row">
                                                <div class="col-3 align-self-center">
                                                    <div class="round">
                                                        <i class="mdi mdi-webcam"></i>
                                                    </div>
                                                </div>
                                                <div class="col-10 align-self-center text-center">
                                                    <div class="m-l-10">
                                                        <h5 class="mt-0 round-inner">
                                                        <?php
                                                            $sql = "select count(*) from product_details";
                                                            $res = mysqli_query($conn,$sql);
                                                            $row = mysqli_fetch_array($res);
                                                            echo $row[0];
                                                        ?></h5>
                                                        <p class="mb-0 text-muted">Products</p>           
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Column -->
                                <!-- Column -->
                                <div class="col-md-6 col-lg-6 col-xl-3">
                                    <div class="card m-b-30">
                                        <div class="card-body">
                                            <div class="d-flex flex-row">
                                                <div class="col-3 align-self-center">
                                                    <div class="round">
                                                        <i class="mdi mdi-account-multiple-plus"></i>
                                                    </div>
                                                </div>
                                                <div class="col-10 text-center align-self-center">
                                                    <div class="m-l-10 ">
                                                        <h5 class="mt-0 round-inner">
                                                            <?php
                                                            $sql = "select count(*) from customer_details";
                                                            $res = mysqli_query($conn,$sql);
                                                            $row = mysqli_fetch_array($res);
                                                            echo $row[0];
                                                        ?>
                                                        </h5>
                                                        <p class="mb-0 text-muted">New Customer</p>
                                                    </div>
                                                </div>                                                       
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Column -->
                                <!-- Column -->
                                <div class="col-md-6 col-lg-6 col-xl-3">
                                    <div class="card m-b-30">
                                        <div class="card-body">
                                            <div class="d-flex flex-row">
                                                <div class="col-3 align-self-center">
                                                    <div class="round ">
                                                        <i class="mdi mdi-basket"></i>
                                                    </div>
                                                </div>
                                                <div class="col-10 align-self-center text-center">
                                                    <div class="m-l-10 ">
                                                        <h5 class="mt-0 round-inner">
                                                            <?php
                                                            $sql = "select count(*) from order_details";
                                                            $res = mysqli_query($conn,$sql);
                                                            $row = mysqli_fetch_array($res);
                                                            echo $row[0];
                                                        ?>
                                                        </h5>
                                                        <p class="mb-0 text-muted">New Orders</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Column -->
                                <!-- Column -->
                                <div class="col-md-6 col-lg-6 col-xl-3">
                                    <div class="card m-b-30">
                                        <div class="card-body">
                                            <div class="d-flex flex-row">
                                                <div class="col-3 align-self-center">
                                                    <div class="round">
                                                        <i class="mdi mdi-rocket"></i>
                                                    </div>
                                                </div>
                                                <div class="col-10 align-self-center text-center">
                                                    <div class="m-l-10">
                                                        <h5 class="mt-0 round-inner">
                                                            <?php
                                                            $sql = "select sum(order_price) from order_details";
                                                            $res = mysqli_query($conn,$sql);
                                                            $row = mysqli_fetch_array($res);
                                                            echo "Rs. ".$row[0];
                                                        ?>
                                                        </h5>
                                                        <p class="mb-0 text-muted">Total Sales</p>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Column -->
                            </div>
                            <!-- 4 bulletins end here -->

                            <div class="row">
                                <div class="col-md-12 col-lg-12 col-xl-8">
                                    <div class="card m-b-30">
                                        <div class="card-body">
                                            <h5 class="header-title pb-3 mt-0">Overview</h5>
                                            <div id="multi-line-chart" style="height:400px;"></div>
                                        </div>
                                    </div>
                                </div>

                        <!-- online user section starts here baby -->
                            <div class="col-md-8 col-lg-12 col-xl-4">
                                <div class="card bg-white m-b-30">
                                    <div class="card-body new-user">
                                        <h5 class="header-title mt-0 mb-4">Online Users</h5>
                                            <ul class="list-unstyled mb-0 pr-3" id="boxscroll2" tabindex="1" style="overflow: hidden; outline: none;">
                                            <?php
                                                $sql = "select * from subadmin_details";
                                                $res = mysqli_query($conn,$sql);
                                                while($row=mysqli_fetch_array($res)){
                                                    extract($row);
                                                    if($subadmin_isonline == 1){
                                                        echo "<li class='p-3'>";
                                                        echo "<div class='media'>";
                                                        echo "<div class='media-body'>";
                                                        echo "<p class='media-heading mb-0'>$subadmin_name <i class='fa fa-circle text-success mr-1 pull-right'></i></p>";
                                                        echo "<small class='text-muted'>Sub Admin</small>";
                                                        echo "</div></div></li>";
                                                    }
                                                }
                                            ?>
                                            <?php
                                                $sql = "select * from customer_details";
                                                $res = mysqli_query($conn,$sql);
                                                while($row=mysqli_fetch_array($res)){
                                                    extract($row);
                                                    if($customer_isonline == 1){
                                                        echo "<li class='p-3'>";
                                                        echo "<div class='media'>";
                                                        echo "<div class='media-body'>";
                                                        echo "<p class='media-heading mb-0'>$customer_name <i class='fa fa-circle text-success mr-1 pull-right'></i></p>";
                                                        echo "<small class='text-muted'>Customer</small>";
                                                        echo "</div></div></li>";
                                                    }
                                                }
                                            ?>  
                                            <?php
                                                $sql = "select * from supplier_details";
                                                $res = mysqli_query($conn,$sql);
                                                while($row=mysqli_fetch_array($res)){
                                                    extract($row);
                                                    if($supplier_isonline == 1){
                                                        echo "<li class='p-3'>";
                                                        echo "<div class='media'>";
                                                        echo "<div class='media-body'>";
                                                        echo "<p class='media-heading mb-0'>$supplier_name <i class='fa fa-circle text-success mr-1 pull-right'></i></p>";
                                                        echo "<small class='text-muted'>Supplier</small>";
                                                        echo "</div></div></li>";
                                                    }
                                                }
                                            ?>  
                                             
                                        </ul>                                    
                                    </div>                                
                                </div>
                            </div>
                        <!-- online user section completed babe -->
                    </div>
                            <!-- dashboard content end-->
                <?php include("../footer.php") ?>
            </div>
            <!-- End main content here -->
        </div>
        <!-- END wrapper -->
        <?php include("../scripts.php") ?>
    </body>
</html>