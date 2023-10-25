<?php
// session_start();
// $ip_add = getenv("REMOTE_ADDR");
// include "../db/connect.php";
// if(isset($_POST["GetEvent"])){
// 	$event_query = "SELECT * FROM event_type";
// 	$run_query1 = mysqli_query($con,$event_query);
	
// 	if(mysqli_num_rows($run_query1) > 0){
// 	  while($row = mysqli_fetch_array($run_query1)){
			  
// 		$type_id = $row["type_id"];
// 		$type_title= $row["type_title"];
// 		echo " 
// 		<div class='card'>
// 		<div class='card-header' id='$type_id'>
// 				   <a class='card-link' data-toggle='collapse'  href='#menu$type_id' aria-expanded='false' aria-controls='menu$type_id'>$type_title<span class='collapsed'><i class='icon-plus-circle'></i></span><span class='expanded'><i class='icon-minus-circle'></i></span></a>
// 				   </div> 
// 				   <div id='menu$type_id' class='collapse'>
// 				   <div class='card-body'>
// 					   <div class='row'>";
// 					   $type_query = "SELECT * FROM events,event_type WHERE events.type_id=event_type.type_id";
// 					   $run_query2 = mysqli_query($con,$type_query);
// 					   if(mysqli_num_rows($run_query2) > 0){
   
// 						 while($row = mysqli_fetch_array($run_query2)){
// 							 $newtype_id    = $row['type_id'];
// 							 $event_id   = $row['event_id'];
// 							 $event_title = $row['event_title'];
// 							 $type_title = $row['type_title'];
// 							 $event_price = $row['event_price'];
// 							 $img_link = $row['img_link'];
							
// 						   if($newtype_id==$type_id){

// 							 echo "
				   
						   
								   
// 						   <div class='col-md-6 col-lg-3 ftco-animate'>
// 						   <div class='destination'>
// 							   <a href='#' class='img img-2 d-flex justify-content-center align-items-center' style='background-image: url(./images/$img_link);'>
// 								   <div class='d-flex justify-content-center align-items-center'>
									   
// 								   </div>
// 							   </a>
// 							   <div class='text p-3'>
// 								   <h3><a href='#'>$event_title</a></h3>
// 								   <p class='price' style='font-weight: 400;font-size: 18px;color: #2f89fc;'>
// 									   $event_price
// 									   <span>RS</span>
// 								   </p>
// 								   <p>Far far away, behind the word mountains, far from the countries</p>
// 								   <hr>
// 								   <p class='bottom-area d-flex'>
// 									   <span><i class='icon-map-o'></i> Puneeth</span> 
// 									   <span class='ml-auto'><a href='register.php?event_id='$event_id>Book</a></span>
// 								   </p>
// 							   </div>
// 						   </div>
// 					   </div>";
// 						   }

// 						 }
// 					   }
					   
// 					echo"  
// 					</div>
// 				   </div>
// 				 </div>
// 			   </div>
// 				 ";


// 	  }
	  
	  
// 	}
            
// }

                                            
                                        


?>

<?php
session_start();
include "../db/connect.php";
if (isset($_POST["full_name"])) {

	
	$full_name = $_POST["full_name"];
	$email = $_POST['email'];
	$event_id = $_POST['event_id'];
	$mobile = $_POST['mobile'];
	$college = $_POST['college'];
	$branch = $_POST['branch'];
	$name = "/^[a-zA-Z ]+$/";
	$emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
	$number = "/^[0-9]+$/";

if(empty($full_name)  || empty($email)  ||
	empty($mobile) ) {
		
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>PLease Fill all fields..!</b>
			</div>
		";
		exit();
	} else {
		if(!preg_match($name,$full_name)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>this $full_name is not valid..!</b>
			</div>
		";
		exit();
	}
	
	if(!preg_match($emailValidation,$email)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>this $email is not valid..!</b>
			</div>
		";
		exit();
	}
	if(!preg_match($number,$mobile)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Mobile number $mobile is not valid</b>
			</div>
		";
		exit();
	}
	if(!(strlen($mobile) == 10)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Mobile number must be 10 digit</b>
			</div>
		";
		exit();
	}
	//existing email address in our database
	
		$sql = "INSERT INTO `participants` 
		(`p_id`,`event_id`, `fullname`, `email`, 
		 `mobile`,  `college`, `branch`) 
		VALUES (NULL,'$event_id', '$full_name',  '$email', 
		 '$mobile', '$college', '$branch')";
		
		if(mysqli_query($con,$sql)){
			echo "register_success";
			echo "<script> location.href='index.php'; </script>";
            exit;

			//existing email address in our database
	
		$sql = "INSERT INTO `participants` 
		(`p_id`,`event_id`, `fullname`, `email`, 
		 `mobile`,  `college`, `branch`) 
		VALUES (NULL,'$event_id', '$full_name',  '$email', 
		 '$mobile', '$college', '$branch')";
		
		if(mysqli_query($con,$sql)){
			echo "register_success";
			echo "<script> location.href='index.php'; </script>";
            exit;
		}
	}
	
}



?>






















































