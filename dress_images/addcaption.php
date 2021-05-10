<?php
	include("../dbconnect.php");
	if(isset($_GET['image'])){
		$file = $_GET['dcode']."/".$_GET['image'];
		
		$sql = "select * from product_details where design_no=".$_GET['dcode'];
		$res = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($res);
		
		$font = 'Anke.ttf';
		
		$img = imagecreatefromjpeg($file);
		list($width, $height, $type, $attr) = getimagesize($file);
		
		$white = imagecolorallocate($img, 255, 255, 255);
		$black = imagecolorallocatealpha($img, 0, 0, 0, 40);
		
		imagefilledrectangle($img, 0, $height/1.20 , $width, ($height/1.2 + 0.05*$height) , $black);
		imagettftext($img, (0.035*$height/1.20), 0 , 250, ($height/1.2 + 0.04*$height), $white, $font, "DNo: ".$row[1].", Rs: ".$row[8]);
		
		imagepng($img, $file); 
		
		if(isset($_GET['subadmin'])){
			header("Location: ../maalde_sub-admin/allimages.php");
		}else{
			header("Location: ../maalde_admin/allimages.php");
		}
	}
?>