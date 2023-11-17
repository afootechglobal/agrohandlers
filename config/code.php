<?php include 'connection.php'?>

<?php
$action=$_POST['action'];
switch ($action){

	  
case 'get-form':
	$page=$_POST['page'];
	require_once '../content/content-page.php';
break;
case 'get-page-with-id':
		$ids=$_POST['ids'];
		$view_content=$_POST['page'];
		require_once '../content/content-page.php';
break;




case 'visitor_login_check': // for user login
	$username=trim($_POST['username']);
	$password=trim(md5($_POST['password']));
		$query=mysqli_query($conn,"SELECT * FROM user_tab WHERE email='$username' and password='$password'");
		$usercount = mysqli_num_rows($query);
		if ($usercount>0){
			$usersel=mysqli_fetch_array($query);
			$status=$usersel['status_id'];
			$userid=$usersel['user_id'];

			if ($status=='A'){
				$check=1; ///// account is active
				$_SESSION['customer_id'] = $userid;
				$s_customer_id=$_SESSION['customer_id'];

				mysqli_query($conn,"UPDATE `user_tab` SET last_login_date=NOW() WHERE user_id='$s_customer_id'"); //// update last login
			
			}else if($status=='S'){
				$check=2; ///// account is suspended
			}else{
				$check=3; //// invalid login details
			}
			}else{$check=0;}
		echo json_encode(array("check" => $check,"shopsession" => $shopsession)); 
break;



case 'vet_email':
  $email=trim($_POST['email']);
		/////////// confirm user exitence//////////////////////////////////
		$usercheck=mysqli_query($conn,"SELECT * FROM staff_tab WHERE email='$email'");
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
	  $surname=trim(strtoupper($_POST['surname']));
	  $othernames=trim(strtoupper($_POST['othernames']));
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
	  $surname=trim(strtoupper($_POST['surname']));
	  $othernames=trim(strtoupper($_POST['othernames']));
	  $otp = rand(111111,999999);
		mysqli_query($conn,"UPDATE registration_otp_tab SET otp='$otp' WHERE email ='$email'")or die (mysqli_error($conn));
	  
					//// send mail
				 $mail_to_send='send_registration_otp';
				  require_once('mail/mail.php');
break;


case 'staff_registration_vet':
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



	case 'job_application':
	  $surname=trim(strtoupper($_POST['surname']));
	  $othernames=trim(strtoupper($_POST['othernames']));
	  $user_name=$surname.' '.$othernames;
	  $dob=trim(strtoupper($_POST['dob']));
	  $gender=trim(strtoupper($_POST['gender']));
	  $religion=trim(strtoupper($_POST['religion']));
	  
	  $nationality=trim(strtoupper($_POST['nationality']));
	  $state=trim(strtoupper($_POST['state']));
	  $lga=trim(strtoupper($_POST['lga']));
	  $address=trim(strtoupper(str_replace("'", "\'", $_POST['address'])));
	  $email=trim($_POST['email']);
	  $phone=trim(strtoupper($_POST['phone']));
	  
	  $job_id=trim(strtoupper($_POST['job_id']));
		  $fetch=$callclass->_get_job_detail($conn, $job_id);
			$array = json_decode($fetch, true);
			  $job_title= $array[0]['job_title'];
		  
		$datetime=date("Ymdhis");	
	  $allowedExts = array("jpg", "jpeg", "JPEG", "JPG", "gif", "png");
	  $passport=$_FILES['passport']['name'];
	  $extension = pathinfo($_FILES['passport']['name'], PATHINFO_EXTENSION);
		  if (in_array($extension, $allowedExts)){				  
		$passport = $datetime.'_'.$passport;
		move_uploaded_file($_FILES["passport"]["tmp_name"],"../uploaded_files/staff_passport/" .$passport);
		  }

	  $allowedExts = array("pdf", "doc");
	  //$cv_file=$_FILES['cv_file']['name'];
	 $cv_file=str_replace("'", "\'", $_FILES['cv_file']['name']);
	  $extension = pathinfo($_FILES['cv_file']['name'], PATHINFO_EXTENSION);
		  if (in_array($extension, $allowedExts)){				  
		$cv_file = $datetime.'_'.$cv_file;
		move_uploaded_file($_FILES["cv_file"]["tmp_name"],"../uploaded_files/staff_cv/" .$cv_file);
		  }
			///////// JV means JOB VACANCY///////
			$user_id='JV-'.$datetime;
			
          ////////////////////// inserting to users_tab//////////////////////////
              mysqli_query($conn,"INSERT INTO `staff_tab`
			  (`user_id`, `job_id`, `role_id`, `status_id`, `surname`, `othernames`, `dob`, `gender`, `religion`, `nationality`, `state`, `lga`, `address`, `mobile`, `email`, `passport`, `cv_file`, `reg_date`, `last_login`) VALUES
              ('$user_id','$job_id','0', 'P','$surname','$othernames','$dob','$gender','$religion', '$nationality','$state','$lga','$address','$phone','$email','$passport','$cv_file',NOW(),NOW())")or die (mysqli_error($conn));

	 mysqli_query($conn,"DELETE FROM registration_otp_tab WHERE email ='$email'")or die (mysqli_error($conn));
				  /////////// get alert//////////////////////////////////
	$alert_detail="Success Alert: Job application submited by : $surname $othernames with ID: $user_id";
	$callclass->_alert_sequence_and_update($conn,$alert_detail,$user_id,$user_name,$ip_address,$sysname,0);
					//// send mail
				  $mail_to_send='job_application_acknowledgement';
				  require_once('mail/mail.php');
				  
	  $page=$action;
		require_once('../content/content-page.php');
	break;







 	case 'add_to_cart':
	  	$product_id=trim($_POST['product_id']);
		$product_qty=trim($_POST['product_qty']);
		
	
		
		$stock_array=$callclass->_get_stock_detail($conn, $product_id);
		$stock_fetch = json_decode($stock_array, true);
		$selling_price= $stock_fetch[0]['selling_price'];
				$sub_price=$product_qty*$selling_price;

			if (($product_qty=='') || ($product_qty<1)){
				$check=2; /// error in product qty
			}else{
				$order_count_sel= mysqli_fetch_array(mysqli_query($conn,"SELECT count(product_id) FROM add_to_cart_tab WHERE 
				shop_session='$shopsession' AND product_id='$product_id'"));
				$order_count=$order_count_sel[0];
				
				if($order_count>0){
          ////////////////////// update to add_to_cart_tab//////////////////////////
						  mysqli_query($conn,"UPDATE add_to_cart_tab SET product_qty='$product_qty', sub_price='$sub_price' WHERE 
						  shop_session='$shopsession' AND product_id='$product_id'")or die (mysqli_error($conn));
				}else{
          ////////////////////// insert to add_to_cart_tab//////////////////////////
              mysqli_query($conn,"INSERT INTO `add_to_cart_tab`
			  (`shop_session`, `product_id`, `product_qty`, `sub_price`, `date`) VALUES
              ('$shopsession','$product_id','$product_qty','$sub_price',NOW())")or die (mysqli_error($conn));
				}
				$check=1;
			}
		
					  echo json_encode(array("check" => $check)); 
	break;






case 'count_my_cart_items':
	  $qtycountque=mysqli_fetch_array(mysqli_query($conn,"SELECT sum(product_qty) AS product_qty FROM add_to_cart_tab WHERE shop_session='$shopsession'"))or die (mysqli_error($conn));
	  $qtycount= $qtycountque['product_qty'];
	  if($qtycount==NULL){$qtycount=0;}
			echo json_encode(array("qtycount" => $qtycount)); 
break;


case 'get_content':
	  $page=trim($_POST['content']);
		require_once('../content/content-page.php');
break;


case 'delete_item':
	  $product_id=trim($_POST['product_id']);
	  mysqli_query($conn,"DELETE FROM add_to_cart_tab WHERE  shop_session='$shopsession' AND product_id='$product_id'")or die (mysqli_error($conn));
break;


case 'fetch_products_list': 
	$product_cat_id=$_POST['product_cat_id'];
	$all_search_txt=$_POST['all_search_txt'];
	$check_code='product-list';
	require_once '../content/sub-codes.php';
break;


case 'fetch_blog_list': 
$cat_id=$_POST['cat_id'];
$all_search_txt=$_POST['all_search_txt'];
$check_code='blog-list';
require_once '../content/sub-codes.php';
break;

case 'fetch_product_cat_list': 
	$product_id=$_POST['product_id'];
	$all_search_txt=$_POST['all_search_txt'];
	$check_code='product-cat-list';
	require_once '../content/sub-codes.php';
break;

case 'logout': // reset password
	$_SESSION['customer_id'] = '';
		?>
		<script>
		window.parent(location="<?php echo $website;?>/account/");
		</script>
		<?php
break;	



case 'update_user': 
	$fullname=trim(strtoupper($_POST['fullname']));
	$phone=trim(strtoupper($_POST['phone']));
	$address=trim(strtoupper($_POST['address']));
	////////////////////// update to user_tab//////////////////////////
	mysqli_query($conn,"UPDATE user_tab SET fullname='$fullname', phone='$phone', address='$address' WHERE  user_id='$s_customer_id'")or die (mysqli_error($conn));
	/////////// get alert//////////////////////////////////
	$alert_detail="Success Alert: A user whose name is $fullname has just updated his/her profile. ID: $s_customer_id";
	$callclass->_alert_sequence_and_update($conn,$alert_detail,$s_customer_id,$fullname,$ip_address,$sysname,0);
break;


case 'update_profile_pix': // Upload Profile Pix for first time login
		$passport=$_FILES['passport']['name'];
		$datetime=date("Ymdhi");
		
		$allowedExts = array("jpg", "jpeg", "JPEG", "JPG", "gif", "png","PNG","GIF");
		$extension = pathinfo($_FILES['passport']['name'], PATHINFO_EXTENSION);
		
		if (in_array($extension, $allowedExts)){
			
		  $user_array=$callclass->_get_user_detail($conn, $s_customer_id);
		  $user_array = json_decode($user_array, true);
		  $fullname= $user_array[0]['fullname'];
		  $db_passport= $user_array[0]['passport'];
			if($db_passport=='friends.png'){
				//// do nothing;
			}else{
				unlink("../uploaded_files/user_passport/" .$db_passport);
			}
			
		$passport = $datetime.'_'.$passport;
		move_uploaded_file($_FILES["passport"]["tmp_name"],"../uploaded_files/user_passport/" .$passport);
		}
		
		mysqli_query($conn,"UPDATE `user_tab` SET passport='$passport' WHERE user_id='$s_customer_id'") or die ("cannot update user_tab");
		/////////// get alert//////////////////////////////////
		$alert_detail="Success Alert: $fullname Updated profile picture. ID: $s_customer_id";
	$callclass->_alert_sequence_and_update($conn,$alert_detail,$s_customer_id,$fullname,$ip_address,$sysname,0);
break;

case 'update_user_password': 
		$oldpass=md5($_POST['oldpass']);
		$newpass=$_POST['newpass'];
		$newpass=md5($newpass);

		  $user_array=$callclass->_get_user_detail($conn, $s_customer_id);
		  $user_array = json_decode($user_array, true);
		  $fullname= $user_array[0]['fullname'];

		$userpass=mysqli_num_rows(mysqli_query($conn,"SELECT password FROM user_tab WHERE password='$oldpass' AND user_id ='$s_customer_id' "));
			if ($userpass>0){
				mysqli_query($conn,"UPDATE user_tab SET password='$newpass' WHERE user_id='$s_customer_id'") or die ("cannot update user_tab");
				/////////// get alert//////////////////////////////////
				$alert_detail="Success Alert: User Password changed by $fullname";
				$callclass->_alert_sequence_and_update($conn,$alert_detail,$s_customer_id,$fullname,$ip_address,$sysname,0);
				$check=1; /// password updated
				session_destroy();
			}else{
				$check=0; //password not updated
			}
		echo json_encode(array("check" => $check)); 
break;	
/*----------------------------------end of paramount code-----------------------------------------------------*/














case 'load_user_wallet':
		$amount=trim($_POST['amount']);
		if ($amount>0){
		  $user_array=$callclass->_get_user_detail($conn, $s_customer_id);
		  $user_array = json_decode($user_array, true);
		  $fullname= $user_array[0]['fullname'];
		  $email= $user_array[0]['email'];
		  $phone= $user_array[0]['phone'];
		  $wallet_balance= $user_array[0]['wallet_balance'];
		
			///////////////////////geting sequence//////////////////////////
			$sequence=$callclass->_get_sequence_count($conn, 'TRC');
			$array = json_decode($sequence, true);
			$no= $array[0]['no'];
			//$num= $array[0]['num'];
			$pay_id='TRC'.$no.date("Ymd");
			
	  $array=$callclass->_get_setup_backend_settings_detail($conn, 'BK_ID001');
	  $fetch = json_decode($array, true);
	  $gateway_key=$fetch[0]['payment_key'];

		mysqli_query($conn,"INSERT INTO `user_wallet_tab`
		(`user_id`, `pay_id`,  `balance_before`,  `amount`, `balance_after`, `transaction_type_id`, `status_id`, `date`) VALUES
		('$s_customer_id', '$pay_id', '$wallet_balance', '$amount', '$wallet_balance', 'CR', 'P', NOW())")or die (mysqli_error($conn));

		$alert_detail="Success Alert: A customer with whose name is $fullname attempt to fund his/her wallet with the sum of NGN$amount. TRANS ID: $pay_id --- MOBILE: $phone";
		$callclass->_alert_sequence_and_update($conn,$alert_detail,$s_customer_id,$fullname,$ip_address,$sysname,0);
			$check=1;
		}else{
			$check=0;
		}
		echo json_encode(array("check" => $check,"fullname" => $fullname,"pay_id" => $pay_id,"gateway_key" => $gateway_key,"email" => $email,"phone" => $phone,"amount" => $amount)); 
break;




case 'load_user_wallet_success':
		$pay_id=trim($_POST['pay_id']);
		$stack_pay_ref=trim(($_POST['stack_pay_ref']));
		$amount=trim($_POST['amount']);
		
		  $user_array=$callclass->_get_user_detail($conn, $s_customer_id);
		  $user_array = json_decode($user_array, true);
		  $fullname= $user_array[0]['fullname'];
		  $email= $user_array[0]['email'];
		  $phone= $user_array[0]['phone'];
		  $wallet_balance= $user_array[0]['wallet_balance'];
		
		$new_wallet_balance=$amount+$wallet_balance;
				
				mysqli_query($conn,"UPDATE `user_wallet_tab` SET payment_gateway_id='$stack_pay_ref', balance_after='$new_wallet_balance',
				status_id='SUC' WHERE user_id='$s_customer_id' AND pay_id='$pay_id'"); //// update 
				
				mysqli_query($conn,"UPDATE `user_tab` SET wallet_balance='$new_wallet_balance' WHERE user_id='$s_customer_id'"); //// update 
			/////////// get alert//////////////////////////////////
			$alert_detail="Success Alert:  A customer with whose name is $fullname have successfully fund his/her slice wallet with the sum of NGN$amount. STRANS ID: $pay_id --- REF: $phone";
		$callclass->_alert_sequence_and_update($conn,$alert_detail,$s_customer_id,$fullname,$ip_address,$sysname,0);

		$view_content=$action;
		require_once '../content/content-page.php';
break;



case 'load_user_wallet_cancelled':
		$pay_id=trim($_POST['pay_id']);
		$amount=trim($_POST['amount']);
	
		  $user_array=$callclass->_get_user_detail($conn, $s_customer_id);
		  $user_array = json_decode($user_array, true);
		  $fullname= $user_array[0]['fullname'];
		  $email= $user_array[0]['email'];
		  $phone= $user_array[0]['mobile'];
				
				mysqli_query($conn,"UPDATE `user_wallet_tab` SET status_id='CCL' WHERE user_id='$s_customer_id' AND pay_id='$pay_id'"); //// update last login
			/////////// get alert//////////////////////////////////
			$alert_detail="Success Alert:  A customer with whose name is $fullname have cancelled a transaction to fund his/her wallet with the sum of NGN$amount. TRANS ID: $pay_id --- REF: $phone";
		$callclass->_alert_sequence_and_update($conn,$alert_detail,$s_customer_id,$fullname,$ip_address,$sysname,0);
break;


case 'cancel_transaction':
		$pay_id=trim($_POST['pay_id']);
		mysqli_query($conn,"UPDATE `user_wallet_tab` SET status_id='CCL' WHERE user_id='$s_customer_id' AND pay_id='$pay_id'"); //// update last login
		
		  $user_array=$callclass->_get_user_detail($conn, $s_customer_id);
		  $user_array = json_decode($user_array, true);
		  $fullname= $user_array[0]['fullname'];
				
			/////////// get alert//////////////////////////////////
			$alert_detail="Success Alert:  A transaction was CANCELLED by $fullname. TRANS ID: $pay_id --- USER ID: $suserid";
			$callclass->_alert_sequence_and_update($conn,$alert_detail,$s_customer_id,$fullname,$ip_address,$sysname,0);

		$view_content=$action;
		require_once '../content/content-page.php';
break;





case 'proceed_to_payment':
		$order_id=$_POST['order_id'];
		$logistic_id=$_POST['logistic_id'];
		$delivery_area_id=$_POST['delivery_area_id'];
		$fund_method_id=$_POST['fund_method_id'];
		$promo_code=$_POST['promo_code'];
		$address =trim(strtoupper(str_replace("'", "\'", $_POST['address'])));
		if($s_customer_id==''){
			$check=0; /// Login to continue
	}else{
		$check=1;	
		//// cart sub_price
		$total_amount_que=mysqli_fetch_array(mysqli_query($conn,"SELECT SUM(sub_price) AS sub_price FROM add_to_cart_tab WHERE shop_session='$order_id'"));
		$total_amount= $total_amount_que['sub_price'];
		//// cart qty
		$qtycountque=mysqli_fetch_array(mysqli_query($conn,"SELECT SUM(product_qty) AS product_qty FROM add_to_cart_tab WHERE shop_session='$order_id'"))or die (mysqli_error($conn));
		$nums_of_items= $qtycountque['product_qty'];

		$check_summary_que=mysqli_query($conn,"SELECT * FROM order_summary_tab WHERE user_id='$s_customer_id' AND order_id='$order_id'");
		$check_summary_count = mysqli_num_rows($check_summary_que);
		
		if ($check_summary_count>0){ ///// check 1
			mysqli_query($conn,"UPDATE order_summary_tab SET  nums_of_items='$nums_of_items', total_amount='$total_amount', logistic_id='$logistic_id', address='$address', status_id='P', date=NOW() WHERE user_id='$s_customer_id' AND order_id='$order_id'")or die (mysqli_error($conn));
		}else{
			mysqli_query($conn,"INSERT INTO `order_summary_tab`
			(`user_id`, `order_id`, `nums_of_items`, `total_amount`, `logistic_id`, `address`, `status_id`, `date`) VALUES 
			('$s_customer_id','$order_id','$nums_of_items','$total_amount','$logistic_id','$address','P',NOW())")or die (mysqli_error($conn));
		}
		
		
		
		///////////////////////geting sequence//////////////////////////
		$sequence=$callclass->_get_sequence_count($conn, 'TRC');
		$array = json_decode($sequence, true);
		$no= $array[0]['no'];
		//$num= $array[0]['num'];
		$pay_id='TRC'.$no.date("Ymd");
		
		
		$sub_amount=$total_amount;
		if ($logistic_id=='D'){

			$get_promo=$callclass->_get_setup_backend_settings_detail($conn, 'BK_ID001');
			$promo_array = json_decode($get_promo, true);
			$db_promo_code= $promo_array[0]['promo_code'];
			$db_promo_amount_limit= $promo_array[0]['promo_amount_limit'];

				$fetch=$callclass->_get_delivery_area_details($conn, $delivery_area_id);
				$array = json_decode($fetch, true);
				$da_cost= $array[0]['da_cost'];

			if(($db_promo_code!=$promo_code)){
				$total_amount=$total_amount+$da_cost;
			}else{

				if(($total_amount<$db_promo_amount_limit)){
					$total_amount=$total_amount+$da_cost;
				}else{
					$total_amount=$total_amount;
					$da_cost=0;
				}

			}

		}else{
			// do nothing
		}
			// $array=$callclass->_get_setup_backend_settings_detail($conn, 'BK_ID001');
			// $fetch = json_decode($array, true);
			// $delivery_fee=$fetch[0]['delivery_fee'];
			// $total_amount=$total_amount+$delivery_fee;
		

		$check_payment_que=mysqli_query($conn,"SELECT * FROM payment_tab WHERE order_id='$order_id'");
		$check_payment_count = mysqli_num_rows($check_payment_que);

		if ($check_payment_count>0){ ///// check 2
			mysqli_query($conn,"UPDATE payment_tab SET  payment_id='$pay_id', fund_method_id='$fund_method_id', sub_amount='$sub_amount', logistic_id='$logistic_id', delivery_fee='$delivery_fee', total_amount='$total_amount',promo_code='$promo_code', status_id='P', date=NOW() WHERE user_id='$s_customer_id' AND order_id='$order_id'")or die (mysqli_error($conn));
		}else{
			mysqli_query($conn,"INSERT INTO `payment_tab`
			(`user_id`, `payment_id`, `order_id`, `fund_method_id`, `sub_amount`, `logistic_id`,`da_id`, `delivery_fee`, `total_amount`, `promo_code`, `status_id`, `date`) VALUES 
			('$s_customer_id','$pay_id','$order_id','$fund_method_id','$sub_amount','$logistic_id','$delivery_area_id','$da_cost','$total_amount','$promo_code','P',NOW())")or die (mysqli_error($conn));
		}
		
		  $user_array=$callclass->_get_user_detail($conn, $s_customer_id);
		  $user_array = json_decode($user_array, true);
		  $fullname= $user_array[0]['fullname'];
		  $email= $user_array[0]['email'];
		  $phone= $user_array[0]['phone'];
		  
		  $fetch=$callclass->_get_setup_fund_method_detail($conn, $fund_method_id);
		  $array = json_decode($fetch, true);
		  $fund_method_name= $array[0]['fund_method_name'];

		  $array=$callclass->_get_setup_backend_settings_detail($conn, 'BK_ID001');
		  $fetch = json_decode($array, true);
		  $gateway_key=$fetch[0]['payment_key'];
		
		$alert_detail="Success Alert: A customer with whose name is $fullname attempt to pay the sum of NGN$total_amount for an order through $fund_method_name. TRANS ID: $pay_id --- MOBILE: $phone";
		$callclass->_alert_sequence_and_update($conn,$alert_detail,$s_customer_id,$fullname,$ip_address,$sysname,0);
	}
		echo json_encode(array("check" => $check,"order_id" => $order_id,"delivery_area_id" => $delivery_area_id,"promo_code" => $promo_code,"fullname" => $fullname,"pay_id" => $pay_id,"gateway_key" => $gateway_key,"email" => $email,"phone" => $phone,"amount" => $total_amount)); 
break;



case 'order_payment_success':
		$pay_id=trim($_POST['pay_id']);
		$stack_pay_ref=trim(($_POST['stack_pay_ref']));
		$amount=trim($_POST['amount']);
		
		$user_array=$callclass->_get_user_detail($conn, $s_customer_id);
		$user_array = json_decode($user_array, true);
		$fullname= $user_array[0]['fullname'];
		$email= $user_array[0]['email'];
		$phone= $user_array[0]['phone'];
		
		mysqli_query($conn,"UPDATE payment_tab SET  payment_gateway_id='$stack_pay_ref',  status_id='SUC', date=NOW() WHERE user_id='$s_customer_id' AND payment_id='$pay_id'")or die (mysqli_error($conn));
		
		$delivery_otp=rand(111111,999999);
		mysqli_query($conn,"UPDATE order_summary_tab SET delivery_otp='$delivery_otp', status_id='PP', date=NOW() WHERE user_id='$s_customer_id' AND order_id='$shopsession'")or die (mysqli_error($conn));
		
		
	  $order_que= mysqli_query($conn,"SELECT * FROM add_to_cart_tab WHERE shop_session='$shopsession'");
	  while ($order_sel= mysqli_fetch_array($order_que)){
		  $no++;
		  $product_id=$order_sel['product_id'];
		  $product_qty=$order_sel['product_qty'];
		  $sub_price=$order_sel['sub_price'];
		  
		$array=$callclass->_get_product_detail($conn, $product_id);
		$get_array = json_decode($array, true);
		$product_cat_id= $get_array[0]['product_cat_id'];
						  
		  $stock_array=$callclass->_get_stock_detail($conn, $product_id);
		  $stock_fetch = json_decode($stock_array, true);
			  $purchase_price= $stock_fetch[0]['purchase_price'];
			  $selling_price= $stock_fetch[0]['selling_price'];
			  $db_available_qty= $stock_fetch[0]['available_qty'];
			  $profit= $stock_fetch[0]['profit'];
			  
			  /*$available_qty=$product_qty;
			  $outstanding_qty=0;
			  if ($product_qty>$db_available_qty){
				 	$available_qty=$db_available_qty;
			  		$outstanding_qty=$product_qty-$db_available_qty;
			  }*/
			  $gross_price=$purchase_price*$product_qty;
			  $sub_profit=$profit*$product_qty;
			  
		
		  mysqli_query($conn,"INSERT INTO `add_to_cart_backup_tab`
		  (`order_id`, `product_cat_id`, `product_id`, `puchase_price`, `selling_price`, `product_qty`, `gross_price`, `sub_price`, `sub_profit`, `status_id`, `date`) VALUES
		  ('$shopsession','$product_cat_id','$product_id','$purchase_price','$selling_price','$product_qty','$gross_price','$sub_price','$sub_profit','PP',NOW())")or die (mysqli_error($conn));

		  /// update stock_tab///
			//mysqli_query($conn,"UPDATE stock_tab SET  available_qty=available_qty-'$available_qty', outstanding_qty=outstanding_qty+'$outstanding_qty' WHERE product_id='$product_id'")or die (mysqli_error($conn));
	  }
				/////// delete from add_to_cart_tab
				mysqli_query($conn,"DELETE FROM `add_to_cart_tab` WHERE shop_session='$shopsession'");
				
		/////////// get alert//////////////////////////////////
		$alert_detail="Success Alert:  A customer with whose name is $fullname have successfully paid the sum of NGN$amount for and order. STRANS ID: $pay_id --- REF: $phone";
		$callclass->_alert_sequence_and_update($conn,$alert_detail,$s_customer_id,$fullname,$ip_address,$sysname,0);

		///// renew the order id
		$_SESSION['shopsession']='';


 		$mail_to_send='auto_order_progressive_invoice';
		require_once('mail/mail.php');


		$view_content=$action;
		require_once '../content/content-page.php';
break;

case 'order_payment_cancelled':
		$pay_id=trim($_POST['pay_id']);
		$amount=trim($_POST['amount']);
	
		  $user_array=$callclass->_get_user_detail($conn, $s_customer_id);
		  $user_array = json_decode($user_array, true);
		  $fullname= $user_array[0]['fullname'];
		  $email= $user_array[0]['email'];
		  $phone= $user_array[0]['phone'];

			mysqli_query($conn,"UPDATE payment_tab SET  status_id='CCL' WHERE user_id='$s_customer_id' AND payment_id='$pay_id'")or die (mysqli_error($conn));
			/////////// get alert//////////////////////////////////
			$alert_detail="Success Alert:  A customer with whose name is $fullname have cancelled an order transaction of the sum of NGN$amount. TRANS ID: $pay_id --- REF: $phone";
		$callclass->_alert_sequence_and_update($conn,$alert_detail,$s_customer_id,$fullname,$ip_address,$sysname,0);
break;



case 'pay_with_wallet':
		$pay_id=trim($_POST['pay_id']);
		$order_id=trim($_POST['order_id']);

		$get_pay_details=$callclass->_get_payment_detail($conn, $pay_id);
		$fetch_array = json_decode($get_pay_details, true);
		$total_amount= $fetch_array[0]['total_amount'];
		
		
	  
		$user_array=$callclass->_get_user_detail($conn, $s_customer_id);
		$user_array = json_decode($user_array, true);
		$fullname= $user_array[0]['fullname'];
		$email= $user_array[0]['email'];
		$phone= $user_array[0]['phone'];
		$wallet_balance= $user_array[0]['wallet_balance'];

		
	
	  

	  if($wallet_balance>=$total_amount){
		  $check=1;

		
		  $balance_after=$wallet_balance-$total_amount;
		  ////// debit user wallet
			mysqli_query($conn,"UPDATE user_tab SET  wallet_balance='$balance_after' WHERE user_id='$s_customer_id'")or die (mysqli_error($conn));
		
		
		mysqli_query($conn,"INSERT INTO `user_wallet_tab`
		(`user_id`, `pay_id`,  `balance_before`,  `amount`, `balance_after`, `transaction_type_id`, `status_id`, `date`) VALUES
		('$s_customer_id', '$pay_id', '$wallet_balance', '$total_amount', '$balance_after', 'DB', 'SUC', NOW())")or die (mysqli_error($conn));
		
				mysqli_query($conn,"UPDATE payment_tab SET  payment_gateway_id='$pay_id',  status_id='SUC', date=NOW() WHERE user_id='$s_customer_id' AND payment_id='$pay_id'")or die (mysqli_error($conn));
				
				$delivery_otp=rand(111111,999999);
				mysqli_query($conn,"UPDATE order_summary_tab SET delivery_otp='$delivery_otp', status_id='PP', date=NOW() WHERE user_id='$s_customer_id' AND order_id='$shopsession'")or die (mysqli_error($conn));
				
				
			  $order_que= mysqli_query($conn,"SELECT * FROM add_to_cart_tab WHERE shop_session='$shopsession'");
			  while ($order_sel= mysqli_fetch_array($order_que)){
				  $no++;
				  $product_id=$order_sel['product_id'];
				  $product_qty=$order_sel['product_qty'];
				  $sub_price=$order_sel['sub_price'];
				  
				$array=$callclass->_get_product_detail($conn, $product_id);
				$get_array = json_decode($array, true);
				$product_cat_id= $get_array[0]['product_cat_id'];
								  
				  $stock_array=$callclass->_get_stock_detail($conn, $product_id);
				  $stock_fetch = json_decode($stock_array, true);
					  $purchase_price= $stock_fetch[0]['purchase_price'];
					  $selling_price= $stock_fetch[0]['selling_price'];
					  $db_available_qty= $stock_fetch[0]['available_qty'];
					  $profit= $stock_fetch[0]['profit'];
					  
					 /* $available_qty=$product_qty;
					  $outstanding_qty=0;
					  if ($product_qty>$db_available_qty){
							$available_qty=$db_available_qty;
							$outstanding_qty=$product_qty-$db_available_qty;
					  }*/
					  $gross_price=$purchase_price*$product_qty;
					  $sub_profit=$profit*$product_qty;
					  
				
				  mysqli_query($conn,"INSERT INTO `add_to_cart_backup_tab`
				  (`order_id`, `product_cat_id`, `product_id`, `puchase_price`, `selling_price`, `product_qty`, `gross_price`, `sub_price`, `sub_profit`, `status_id`, `date`) VALUES
				  ('$shopsession','$product_cat_id','$product_id','$purchase_price','$selling_price','$product_qty','$gross_price','$sub_price','$sub_profit','PP',NOW())")or die (mysqli_error($conn));
				
		
				  /// update stock_tab///
					//mysqli_query($conn,"UPDATE stock_tab SET  available_qty=available_qty-'$available_qty', outstanding_qty=outstanding_qty+'$outstanding_qty' WHERE product_id='$product_id'")or die (mysqli_error($conn));
			 
			  }
				
				/////// delete from add_to_cart_tab
				mysqli_query($conn,"DELETE FROM `add_to_cart_tab` WHERE shop_session='$shopsession'");
						
				/////////// get alert//////////////////////////////////
				$alert_detail="Success Alert:  A customer with whose name is $fullname have successfully paid the sum of NGN$amount for and order. STRANS ID: $pay_id --- REF: $phone";
				$callclass->_alert_sequence_and_update($conn,$alert_detail,$s_customer_id,$fullname,$ip_address,$sysname,0);
		
				///// renew the order id
				$_SESSION['shopsession']='';
		
				$mail_to_send='auto_order_progressive_invoice';
				require_once('mail/mail.php');
	  }else{
		$check=0;  
	  }
		echo json_encode(array("check" => $check)); 
break;




case 'generate_post_paid_invoice':
		$pay_id=trim($_POST['pay_id']);
		
		$array=$callclass->_get_payment_detail($conn, $pay_id);
		$fetch = json_decode($array, true);
		$total_amount= $fetch[0]['total_amount'];
	  
		$user_array=$callclass->_get_user_detail($conn, $s_customer_id);
		$user_array = json_decode($user_array, true);
		$fullname= $user_array[0]['fullname'];
		$email= $user_array[0]['email'];
		$phone= $user_array[0]['phone'];
		$wallet_balance= $user_array[0]['wallet_balance'];
	  
		/////////// get alert//////////////////////////////////
		$alert_detail="Success Alert:  A customer with whose name is $fullname have successfully paid the sum of NGN$total_amount for and order. STRANS ID: $pay_id --- REF: $phone";
		$callclass->_alert_sequence_and_update($conn,$alert_detail,$s_customer_id,$fullname,$ip_address,$sysname,0);
		
		///// renew the order id
		$_SESSION['shopsession']='';
		
		$mail_to_send='manual_order_progressive_invoice';
		require_once('mail/mail.php');
break;




case 'order_cart_list':
	  $order_id=$_POST['order_id'];
	  $_SESSION['shopsession']=$order_id;
break;



case 'order_report':
	  $view_report=$_POST['view_report'];
	  require_once '../content/report-date-schedule.php';
			  $check_code='order-history';
	  require_once('../content/sub-codes.php');
break;

case 'system_alert':
		$view_report=$_POST['view_report'];
		$all_search_txt=$_POST['all_search_txt'];			  
		require_once '../content/report-date-schedule.php';
		$check_code='alert-list';
		require_once '../content/sub-codes.php';
break;
case 'read_alert': 
		$alert_id = $_POST['alert_id'];
		$view_content=$action;
		require_once '../content/content-page.php';
break;












case 'add_news_letter':
	  $new_letter_email=trim($_POST['new_letter_email']);
	  
	  $query=mysqli_query($conn,"SELECT * FROM news_letter_tab WHERE email='$new_letter_email'");
	  $count = mysqli_num_rows($query);
	  if ($count>0){
		  /// do nothing
	  }else{
		  
	  	mysqli_query($conn,"INSERT INTO `news_letter_tab`
		(`email`, `date`) VALUES
		('$new_letter_email',NOW())")or die (mysqli_error($conn));
	  }

  	$view_content=$action;
	require_once('../content/content-page.php');
break;


case 'send_contact_email':
	  $fullname=trim(strtoupper($_POST['fullname']));
	  $email=trim($_POST['email']);
	  $subject=trim($_POST['subject']);
	  $message=trim(strtoupper(str_replace("'", "\'", $_POST['message'])));
	  
	  $query=mysqli_query($conn,"SELECT * FROM news_letter_tab WHERE email='$email'");
	  $count = mysqli_num_rows($query);
	  if ($count>0){
		mysqli_query($conn,"UPDATE news_letter_tab SET name='$fullname' WHERE email='$email'")or die (mysqli_error($conn));
	  }else{
	  	mysqli_query($conn,"INSERT INTO `news_letter_tab`
		(`email`,`name`, `date`) VALUES
		('$email','$fullname',NOW())")or die (mysqli_error($conn));
	  }

 		$mail_to_send=$action;
		require_once('mail/mail.php');
  	$view_content=$action;
	require_once('../content/content-page.php');
break;

  
 
}
?>
