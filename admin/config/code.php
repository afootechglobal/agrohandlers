<?php require_once '../../config/connection.php';?>
  <?php
  	$action=$_POST['action'];
  switch ($action){
	  
	  
 	case 'login_check': // for user login
				$username=trim($_POST['username']);
				$temp_password=trim(($_POST['password']));
				$password=trim(md5($_POST['password']));
					$query=mysqli_query($conn,"SELECT * FROM staff_tab WHERE email='$username' and password='$password'");
					$usercount = mysqli_num_rows($query);
					if ($usercount>0){
						$usersel=mysqli_fetch_array($query);
						$userid=$usersel['user_id'];
						$status=$usersel['status_id'];
						
							if($temp_password==$userid){
								$check=5; ///// reset password
							}else{
							if ($status=='A'){
								$check=1; ///// account is active
								}else if($status=='S'){
									$check=2; ///// account is suspended
									}else{
										$check=3; //// invalid login details
										}
							}
						}else{$check=0;}
					echo json_encode(array("check" => $check,"user_id" => $userid)); 
	break;


	case 'login': // login from index
		$userquery = mysqli_query ($conn,"SELECT * FROM `staff_tab` WHERE email = '$suser' AND password = '$spass' AND status_id='A'");
				$usersel=mysqli_fetch_array($userquery);
				$userid=$usersel['user_id'];
				$_SESSION['userid'] = $userid;
				$suserid=$_SESSION['userid'];
				mysqli_query($conn,"UPDATE `staff_tab` SET last_login=NOW() WHERE user_id='$suserid'"); //// update last login
				?>
					<script>
					window.parent(location="../a/");
					</script>
				<?php
	break;
	  
	  
	  
 	case 'proceed_reset_password':
	    	$email=$_POST['email'];
			/////////// confirm user exitence//////////////////////////////////
			$query=mysqli_query($conn,"SELECT * FROM staff_tab WHERE email='$email'");
					$checkemail=mysqli_num_rows($query);
					if ($checkemail>0){
					  $fetch=mysqli_fetch_array($query);
						$user_id= $fetch['user_id'];
						$status_id= $fetch['status_id'];
						if ($status_id=='A'){
						$check=1; /// user  Active
						}elseif($status_id=='I'){
						$check=2; /// user inactive
						}elseif($status_id=='S'){
						$check=3; /// user Suspended
						}else{
						$check=4; /// user Pending
						}
					}else{
						$check=0; /// user Not Exist
					}
			  ////////sending json///////////////////////////
					  echo json_encode(array("check" => $check,"user_id" => $user_id)); 
	break;


 	case 'reset_password':
	  $user_id=$_POST['user_id'];
	  	  
	  $user_array=$callclass->_get_staff_detail($conn, $user_id);
	  $u_array = json_decode($user_array, true);
	  $fullname= $u_array[0]['fullname'];
	  $email= $u_array[0]['email'];

		$otp = rand(111111,999999);
		////////////////update user OTP///////////////
		mysqli_query($conn,"UPDATE staff_tab SET otp='$otp' WHERE user_id ='$user_id'") or die("cannot update staff_tab");
		////////////////send OTP true email///////////////
		$mail_to_send='send_reset_password_otp';
		require_once('mail/mail.php');
	require_once('../content/content-page.php');
	break;
	
 	case 'resend_otp':
	  $user_id=$_POST['user_id'];
	  	  
	  $user_array=$callclass->_get_staff_detail($conn, $user_id);
	  $u_array = json_decode($user_array, true);
	  $fullname= $u_array[0]['fullname'];
	  $email= $u_array[0]['email'];
	  
	  $otp = rand(111111,999999);
	  ////////////////update user OTP///////////////
	  mysqli_query($conn,"UPDATE staff_tab SET otp='$otp' WHERE user_id ='$user_id'")or die("cannot update staff_tab");
	  ////////////////send OTP true email///////////////
	  $mail_to_send='send_reset_password_otp';
	  require_once('mail/mail.php');
	break;	
	
 	case 'finish_reset_password':
	  $user_id=trim($_POST['user_id']);
	  $password=md5($_POST['password']);
	  $otp=trim($_POST['otp']); 
	  
	  $fetch=$callclass->_get_staff_detail($conn, $user_id);
	  $array = json_decode($fetch, true);
	  $fullname=$array[0]['fullname'];
	  $db_otp=$array[0]['otp'];
	  $role_id=$array[0]['role_id'];
	  
		if ($otp==$db_otp){ ///// check 1
		mysqli_query($conn,"UPDATE staff_tab SET password='$password' WHERE user_id='$user_id'")or die (mysqli_error($conn));
		$check=1;
		/////////// get alert//////////////////////////////////
		$alert_detail="Success Alert: A Staff whose name is: $fullname with ID: $user_id have just reset his/her password. Ref:--- $email";
	  $callclass->_alert_sequence_and_update($conn,$alert_detail,$user_id,$fullname,$ip_address,$sysname,$role_id);
		}else{						
		$check=0;
		}
		echo json_encode(array("check" => $check)); 
	break;

 	case 'password_reset_completed':
	require_once('../content/content-page.php');
	break;
	




  }
  ?>
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
