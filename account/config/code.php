<?php include '../../config/connection.php'?>

<?php
$action=$_POST['action'];
switch ($action){


case 'get-page':
	$view_content=$_POST['page'];
	require_once '../content/content-page.php';
break;

case 'get-form':
	$view_content=$_POST['page'];
	require_once '../content/content-page.php';
break;


case 'vet_email':
  $email=trim($_POST['email']);
		/////////// confirm user exitence//////////////////////////////////
		$usercheck=mysqli_query($conn,"SELECT * FROM user_tab WHERE email='$email'");
				$useremail=mysqli_num_rows($usercheck);
				if ($useremail>0){
					$check=1; /// user  Exist
				}else{
					$check=0; /// user Not Exist
				}
		  ////////sending json///////////////////////////
				  echo json_encode(array("check" => $check)); 
break;

case 'send_registration_otp':
	  $email=trim($_POST['email']);
	  $fullname=trim(strtoupper($_POST['fullname']));
	  $otp = rand(111111,999999);
	
		/////////// confirm email exitence//////////////////////////////////
	  $check=mysqli_query($conn,"SELECT * FROM registration_otp_tab WHERE email='$email'");
	  $count=mysqli_num_rows($check);
		if ($count>0){
		  ////////////////////// update user_registration_otp_tab//////////////////////////
			mysqli_query($conn,"UPDATE registration_otp_tab SET otp='$otp' WHERE email ='$email'")or die (mysqli_error($conn));
		}else{
		  ////////////////////// inserting to user_registration_otp_tab//////////////////////////
			  mysqli_query($conn,"INSERT INTO `registration_otp_tab`
			  (`email`, `otp`) VALUES
			  ('$email','$otp')")or die (mysqli_error($conn));
		}
					//// send mail
				 $mail_to_send='send_registration_otp';
				  require_once('mail/mail.php');
			$view_content='send_registration_otp';
			require_once('../content/content-page.php');
break;

case 'resend_registration_otp':
	  $email=trim($_POST['email']);
	  $fullname=trim(strtoupper($_POST['fullname']));
	  $otp = rand(111111,999999);
		mysqli_query($conn,"UPDATE registration_otp_tab SET otp='$otp' WHERE email ='$email'")or die (mysqli_error($conn));
	  
					//// send mail
				 $mail_to_send='send_registration_otp';
				  require_once('mail/mail.php');
break;



case 'user_registration_vet':
	  $email=trim($_POST['email']);
	  $otp=trim(($_POST['otp']));
	  $check=mysqli_query($conn,"SELECT * FROM registration_otp_tab WHERE email='$email' AND otp='$otp'");
	  $count=mysqli_num_rows($check);
					if ($count>0){
						$check=1; /// user  Exist
					}else{
						$check=0; /// user Not Exist
					}
			  ////////sending json///////////////////////////
					  echo json_encode(array("check" => $check)); 
break;



case 'user_registration':
	$fullname=trim(strtoupper($_POST['fullname']));
	$email=trim($_POST['email']);
	$phone=trim(strtoupper($_POST['phone']));
	$password=md5($_POST['password']);	
	
	///////////////////////geting sequence//////////////////////////
	$sequence=$callclass->_get_sequence_count($conn, 'USER');
	$array = json_decode($sequence, true);
	$no= $array[0]['no'];
	//$num= $array[0]['num'];
	$user_id='BM'.date("Ymdhis").$no;
	  
	////////////////////// inserting to users_tab//////////////////////////
	mysqli_query($conn,"INSERT INTO `user_tab`
	(`user_id`, `fullname`, `phone`, `email`, `password`, `status_id`, `reg_date`) VALUES
	('$user_id','$fullname','$phone','$email','$password','A',NOW())")or die (mysqli_error($conn));
	
	mysqli_query($conn,"DELETE FROM registration_otp_tab WHERE email ='$email'")or die (mysqli_error($conn));
				/////////// get alert//////////////////////////////////
	  $alert_detail="Success Alert: User registration successful. Details: $fullname with ID: $user_id";
	$callclass->_alert_sequence_and_update($conn,$alert_detail,$user_id,$fullname,$ip_address,$sysname,0);
break;

















case 'login_check': // for user login
			$username=trim($_POST['username']);
			$password=trim(md5($_POST['password']));
				$query=mysqli_query($conn,"SELECT * FROM user_tab WHERE email='$username' and password='$password'");
				$usercount = mysqli_num_rows($query);
				if ($usercount>0){
					$usersel=mysqli_fetch_array($query);
					$status=$usersel['status_id'];
					if ($status=='A'){
						$check=1; ///// account is active
						}else if($status=='S'){
							$check=2; ///// account is suspended
							}else{
								$check=3; //// invalid login details
								}
					}else{$check=0;}
				echo json_encode(array("check" => $check)); 
break;


case 'login': // login from index
	$userquery = mysqli_query ($conn,"SELECT * FROM `user_tab` WHERE email = '$suser' AND password = '$spass' AND status_id='A'");
			$usersel=mysqli_fetch_array($userquery);
			$userid=$usersel['user_id'];
			$_SESSION['customer_id'] = $userid;
			$s_customer_id=$_SESSION['customer_id'];
			mysqli_query($conn,"UPDATE `user_tab` SET last_login_date=NOW() WHERE user_id='$s_customer_id'"); //// update last login
			?>
				<script>
				window.parent(location="<?php echo $website;?>/user-dashboard");
				</script>
			<?php
break;
	  









case 'proceed_reset_password':
	  $email=$_POST['email'];
	  /////////// confirm user exitence//////////////////////////////////
	  $query=mysqli_query($conn,"SELECT * FROM user_tab WHERE email='$email'");
			  $checkemail=mysqli_num_rows($query);
			  if ($checkemail>0){
				$fetch=mysqli_fetch_array($query);
				  $user_id= $fetch['user_id'];
				  $status_id= $fetch['status_id'];
				  if ($status_id=='A'){
				  $check=1; /// user  Active
				  }else{
				  $check=2; /// user Suspended
				  }
			  }else{
				  $check=0; /// user Not Exist
			  }
		////////sending json///////////////////////////
				echo json_encode(array("check" => $check,"user_id" => $user_id)); 
break;


case 'reset_password':
	  $user_id=$_POST['user_id'];
	  	  
	  $user_array=$callclass->_get_user_detail($conn, $user_id);
	  $u_array = json_decode($user_array, true);
	  $fullname= $u_array[0]['fullname'];
	  $email= $u_array[0]['email'];

		$otp = rand(111111,999999);
		////////////////update user OTP///////////////
		mysqli_query($conn,"UPDATE user_tab SET otp='$otp' WHERE user_id ='$user_id'")or die (mysqli_error($conn));
		////////////////send OTP true email///////////////
		$mail_to_send='send_reset_password_otp';
		require_once('mail/mail.php');
    $view_content=$action;
	require_once('../content/content-page.php');
break;

case 'resend_otp':
	  $user_id=$_POST['user_id'];
	  	  
	  $user_array=$callclass->_get_user_detail($conn, $user_id);
	  $u_array = json_decode($user_array, true);
	  $fullname= $u_array[0]['fullname'];
	  $email= $u_array[0]['email'];
	  
	  $otp = rand(111111,999999);
	  ////////////////update user OTP///////////////
	  mysqli_query($conn,"UPDATE user_tab SET otp='$otp' WHERE user_id ='$user_id'")or die (mysqli_error($conn));
	  ////////////////send OTP true email///////////////
	  $mail_to_send='send_reset_password_otp';
	  require_once('mail/mail.php');
break;	
	
case 'finish_reset_password':
	  $user_id=trim($_POST['user_id']);
	  $password=md5($_POST['password']);
	  $otp=trim($_POST['otp']); 
	  
	  $fetch=$callclass->_get_user_detail($conn, $user_id);
	  $array = json_decode($fetch, true);
	  $fullname=$array[0]['fullname'];
	  $db_otp=$array[0]['otp'];
	  
		if ($otp==$db_otp){ ///// check 1
		mysqli_query($conn,"UPDATE user_tab SET password='$password' WHERE user_id='$user_id'")or die (mysqli_error($conn));
		$check=1;
		/////////// get alert//////////////////////////////////
		$alert_detail="Success Alert: A User whose name is: $fullname with ID: $user_id have just reset his/her password. Ref:--- $email";
		$callclass->_alert_sequence_and_update($conn,$alert_detail,$user_id,$fullname,$ip_address,$sysname,0);
		}else{						
		$check=0;
		}
		echo json_encode(array("check" => $check)); 
break;




}
?>
