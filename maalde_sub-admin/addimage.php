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
																																				<h4 class="page-title">Add New Dress Image</h4>
																																				</div>
																																</div>
																									</div>
																										<!-- end page title -->
																												<!-- dashboard content -->
																											<div class="row">
																																<div class="col-12">
																																				<div class="card m-b-30">
																																								<div class="card-body">
																				<h4 class="mt-0 header-title">Fill out the form</h4><br>			
					<form action="<?php $_PHP_SELF ?>" method="post" enctype="multipart/form-data">
				<div class="form-group row">
				<label for="example-text-input" class="col-sm-2 col-form-label">Dress code</label>
<div class="col-sm-10">
			<input class="form-control" type="text" name="dcode" placeholder="Dress code" value="" id="example-text-input" required>
											</div>
								</div>
									<div class="form-group row">
			<label for="example-color-input" class="col-sm-2 col-form-label">Dress Image</label>
															<div class="col-sm-10">
			  <input name="dressimg" type="file" accept="image/x-png,image/png,image/jpeg" required>
																																																</div>
																																												</div>
					<div class="form-group">
						<label for="example-time-input" class="col-sm-2 col-form-label" ></label>
																																																				<div class="col-sm-10">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																																																								<button type="submit" name="save" class="btn btn-primary waves-effect waves-light">Add Image</button>
																																																								<button type="reset" class="btn btn-secondary waves-effect m-l-5">Reset Form</button>
																																																				</div>
																																																</div>
																												</form>
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
<?php
	include("../dbconnect.php");
	if(isset($_POST['save']))
	{
		$sql2 = "select * from product_details where design_no=".$_POST['dcode'];
		$res2 = mysqli_query($conn,$sql2);
		if(mysqli_num_rows($res2)<=0){
			echo "<script>alert('Design Number Not Found');</script>";
		}else{
			$pic = $_FILES['dressimg']['name'];
			$tmppic = $_FILES['dressimg']['tmp_name'];
			$imageFileType = strtolower(pathinfo($pic,PATHINFO_EXTENSION));
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
				echo "<script>alert('Sorry, only JPG, JPEG, PNG files are allowed.');</script>";
			}else{
				if (!file_exists("../dress_images/".$_POST['dcode'])) {
					mkdir("../dress_images/".$_POST['dcode'], 0755, true);
					$pro = "1.".$imageFileType;
					move_uploaded_file($_FILES['dressimg']['tmp_name'],"../dress_images/".$_POST['dcode']."/".$pro);
					$path = "http://maalde.activemedia.in/dress_images/".$_POST['dcode']."/".$pro;
					$dcode = $_POST['dcode'];
					$sql1 = "select admin_name from admin_details where admin_id=".$_SESSION["user_id"];
					$res = mysqli_query($conn,$sql1);
					$row = mysqli_fetch_array($res);
					$admin = $row[0];
					$sql = "insert into image_details(image_path,product_id,admin_id) values('$path','$dcode','$admin')";
					mysqli_query($conn,$sql);
					echo "<script>window.location.href='../dress_images/addcaption.php?image=".$pro."&dcode=".$_POST['dcode']."';</script>";
				}else{
					$i =1;
					$flag = false;
					while($i<=10){
						if(!file_exists("../dress_images/".$_POST['dcode']."/".$i.".".$imageFileType)){
							$pro = $i.".".$imageFileType;
							move_uploaded_file($_FILES['dressimg']['tmp_name'],"../dress_images/".$_POST['dcode']."/".$pro);
							$path = "http://maalde.activemedia.in/dress_images/".$_POST['dcode']."/".$pro;
							$dcode = $_POST['dcode'];
							$sql1 = "select admin_name from admin_details where admin_id=".$_SESSION["user_id"];
							$res = mysqli_query($conn,$sql1);
							$row = mysqli_fetch_array($res);
							$admin = $row[0];
							$sql = "insert into image_details(image_path,product_id,admin_id) values('$path','$dcode','$admin')";
							mysqli_query($conn,$sql);
							$flag = true;
							echo "<script>window.location.href='../dress_images/addcaption.php?image=".$pro."&dcode=".$_POST['dcode']."';</script>";
							break;
						}else{
							$i = $i + 1;
						}
					}
					if($flag==false){
						echo "<script>alert('Only 10 Photos Per Design are allowed');</script>";
					}
				}
			}
		}
	}
?>