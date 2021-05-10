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
    function compress_image($source_file, $target_file, $nwidth, $nheight, $quality) {
  //Return an array consisting of image type, height, widh and mime type.
  $image_info = getimagesize($source_file);
  if(!($nwidth > 0)) $nwidth = $image_info[0];
  if(!($nheight > 0)) $nheight = $image_info[1];
  
  if(!empty($image_info)) {
    switch($image_info['mime']) {
      case 'image/jpeg' :
        if($quality == '' || $quality < 0 || $quality > 100) $quality = 100; //Default quality
        // Create a new image from the file or the url.
        $image = imagecreatefromjpeg($source_file);
        $thumb = imagecreatetruecolor($nwidth, $nheight);
        //Resize the $thumb image
        imagecopyresized($thumb, $image, 0, 0, 0, 0, $nwidth, $nheight, $image_info[0], $image_info[1]);
        //Output image to the browser or file.
        return imagejpeg($thumb, $target_file, $quality); 
        
        break;
      
      case 'image/png' :
        if($quality == '' || $quality < 0 || $quality > 9) $quality = 6; //Default quality
        // Create a new image from the file or the url.
        $image = imagecreatefrompng($source_file);
        $thumb = imagecreatetruecolor($nwidth, $nheight);
        //Resize the $thumb image
        imagecopyresized($thumb, $image, 0, 0, 0, 0, $nwidth, $nheight, $image_info[0], $image_info[1]);
        // Output image to the browser or file.
        return imagepng($thumb, $target_file, $quality);
        break;
        
      case 'image/gif' :
        if($quality == '' || $quality < 0 || $quality > 100) $quality = 75; //Default quality
        // Create a new image from the file or the url.
        $image = imagecreatefromgif($source_file);
        $thumb = imagecreatetruecolor($nwidth, $nheight);
        //Resize the $thumb image
        imagecopyresized($thumb, $image, 0, 0, 0, 0, $nwidth, $nheight, $image_info[0], $image_info[1]);
        // Output image to the browser or file.
        return imagegif($thumb, $target_file, $quality); //$success = true;
        break;
        
      default:
        echo "<h4>File type not supported!</h4>";
        break;
    }
  }
}
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
					compress_image($_FILES['dressimg']['tmp_name'],"../dress_images/".$_POST['dcode']."/".$pro,200,300,100);
					//move_uploaded_file($compressedImage,"../dress_images/".$_POST['dcode']."/".$pro);
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
							compress_image($_FILES['dressimg']['tmp_name'],"../dress_images/".$_POST['dcode']."/".$pro,200,300,100);
					        //move_uploaded_file($compressedImage,"../dress_images/".$_POST['dcode']."/".$pro);
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