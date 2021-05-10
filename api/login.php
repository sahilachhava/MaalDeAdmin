<?php
//order history and cart remaining to return
include("../dbconnect.php");

if(!isset($_GET['token'])){
$user = $_GET['phone'];
$pass = $_GET['pass'];

$sql = "select * from customer_details WHERE `customer_phone`='$user' AND `customer_pass`='$pass'";
		$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
		if(mysqli_num_rows($result)>0)
		{
			while($row=mysqli_fetch_array($result))
			{
				extract($row);
				
				if($user == $customer_phone && $pass == $customer_pass)
				{
				    if($customer_active == 1){
    				    $token = mt_rand(1000000,9999999);
    				    $token = checkToken($token);
    				    $sql2 = "insert into token_details values('$token','$customer_phone')";
    				    $re = mysqli_query($conn,$sql2);
    				    $res = array("response" => "valid","cid" => $customer_id,"username" => $customer_name,"type" => "customer","phone" => $customer_phone,"token" => strval($token));
    				    echo json_encode($res);
				    }else{
				         $res = array("response" => "blocked");
    				     echo json_encode($res);
				    }
				}
			}
		}
		else
			{
				$sql = "select * from supplier_details WHERE `supplier_phone`='$user' AND `supplier_pass`='$pass'";
				$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
				if(mysqli_num_rows($result)>0)
				{
					while($row=mysqli_fetch_array($result))
					{
						extract($row);
						
						if($user == $supplier_phone && $pass == $supplier_pass)
						{
						    if($supplier_active == 1){
    						     $token = mt_rand(1000000,9999999);
    				             $token = checkToken($token);
    				             $sql2 = "insert into token_details values('$token','$supplier_phone')";
    				             $re = mysqli_query($conn,$sql2);
    						     $res = array("response" => "valid","sid" => $supplier_id,"username" => $supplier_name,"type" => "supplier","phone" => $supplier_phone,"token" => strval($token));
    				             echo json_encode($res);
						    }else{
						        $res = array("response" => "blocked");
    				            echo json_encode($res);
						    }
						}
					}
				}
				else{
				    $res = array("response" => "invalid");
    	            echo json_encode($res);
			    }
			}
}else{
    $token = $_GET['token'];
    
    $sql = "select user from token_details where token='".$token."'";
    $res = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($res);
    
    $sql1 = "select * from customer_details WHERE `customer_phone`='$row[0]'";
    $result = mysqli_query($conn,$sql1) or die(mysqli_error($conn));
	if(mysqli_num_rows($result)>0)
	{
	    while($row=mysqli_fetch_array($result))
		{
			extract($row);
			$res = array("response" => "valid","cid" => $customer_id ,"username" => $customer_name,"type" => "customer","phone" => $customer_phone);
			echo json_encode($res);
		}
	}else{
	    $sql = "select * from supplier_details WHERE `supplier_phone`='$row[0]'";
		$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
		if(mysqli_num_rows($result)>0)
		{
		    while($row=mysqli_fetch_array($result))
			{
				extract($row);
			    $res = array("response" => "valid","sid" => $supplier_id,"username" => $supplier_name,"type" => "supplier","phone" => $supplier_phone);
			    echo json_encode($res);
			}
		}
	}   
}

function checkToken($token)
{
    $sql1 = "select token from token_details where token=".$token;
    $result = mysqli_query($conn,$sql1);
	$row = mysqli_fetch_array($result);
	if(mysqli_num_rows($row)>0){
		$token = mt_rand(1000000,9999999);
		$token = checkToken($token);
		return $token;
	}else{
	    return $token;
	}
}

?>