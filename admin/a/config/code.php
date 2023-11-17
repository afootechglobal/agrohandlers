<?php require_once '../../../config/connection.php';?>
<?php require_once('session-validation.php');?>
<?php
$action=$_POST['action'];
switch ($action){

case 'logout': // reset password
		session_destroy();
		?>
		<script>
		window.parent(location="../../");
		</script>
		<?php
break;	



case 'get-page':
		$view_content=$_POST['page'];
		require_once '../content/content-page.php';
break;
case 'get-page-with-id':
		$ids=$_POST['ids'];
		$view_content=$_POST['page'];
		require_once '../content/content-page.php';
break;
case 'get-form':
		$view_content=$_POST['page'];
		require_once '../content/content-page.php';
break;
case 'get-form-with-id':
		$ids=$_POST['ids'];
		$view_content=$_POST['page'];
		
		if($view_content=='load_stock_history'){
			$product_id=$ids;
			$_SESSION['s_product_id']=$product_id;
		}
		require_once '../content/content-page.php';
break;
case 'get-inner-form':
		$check_code=$_POST['page'];
		$ids=$_POST['ids'];
		require_once('../content/sub-codes.php');
break;



case 'get_details':
	$ids=$_POST['ids'];
	$name=$_POST['name'];
	$status_name=$_POST['status_name'];

	$view_content=$_POST['page'];
	require_once '../content/content-page.php';
break;


case 'trendbarchart':
		/// get presentation values
		$day30= date('F d Y', strtotime('today - 30 days'));
		$today= date('F d Y');	
		
		/// get chat values
		$db_day30= date('Y-m-d', strtotime('today - 30 days'));
		$db_today= date('Y-m-d');
		$check_code='trendbarchart';
		require_once('../content/sub-codes.php');
break;
case 'arps_matrix':	
		$view_report='custom_search';
	  require_once '../content/report-date-schedule.php';
		$check_code='arps_matrix';
		require_once('../content/sub-codes.php');
break;
case 'payment_matrix':	
		$view_report='custom_search';
	  require_once '../content/report-date-schedule.php';
		$check_code='payment_matrix';
		require_once('../content/sub-codes.php');
break;


case 'dashboard_report':
	  $view_report=$_POST['view_report'];
	  require_once '../content/report-date-schedule.php';
			  $check_code='trendbarchart';
	  require_once('../content/sub-codes.php');
break;












case 'get_notification_number':
		$alertcount=mysqli_fetch_array(mysqli_query($conn,"SELECT count(seen_status) FROM alert_tab WHERE seen_status=0 AND user_id='$user_id'"));
		$num=$alertcount[0];
		echo json_encode(array("check" => $num));
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









case 'get_all_count':
		////// total active taff
		$total_active_staff_count=mysqli_fetch_array(mysqli_query($conn,"SELECT count(user_id) FROM staff_tab WHERE status_id='A' AND role_id!=3"));
		$total_active_staff_count= $total_active_staff_count[0];
		////// total suspended taff
		$total_suspended_staff_count=mysqli_fetch_array(mysqli_query($conn,"SELECT count(user_id) FROM staff_tab WHERE status_id='S'"));
		$total_suspended_staff_count= $total_suspended_staff_count[0];
		
		////// total suspended taff
		$total_prospective_staff_count=mysqli_fetch_array(mysqli_query($conn,"SELECT count(user_id) FROM staff_tab WHERE status_id='P'"));
		$total_prospective_staff_count= $total_prospective_staff_count[0];
		


		////// total active customer
		$total_active_customer_count=mysqli_fetch_array(mysqli_query($conn,"SELECT count(user_id) FROM user_tab WHERE status_id='A' "));
		$total_active_customer_count= $total_active_customer_count[0];


		////// total total_product_cat_count
		$total_product_cat_count=mysqli_fetch_array(mysqli_query($conn,"SELECT count(product_cat_id) FROM product_categories_tab WHERE status_id='A'"));
		$total_product_cat_count= $total_product_cat_count[0];

		////// total total_stock_count
		$total_stock_count=mysqli_fetch_array(mysqli_query($conn,"SELECT count(product_id) FROM product_tab WHERE status_id='A'"));
		$total_stock_count= $total_stock_count[0];
		
		
		//////  total_outstanding_orders 
		$total_outstanding_orders=mysqli_fetch_array(mysqli_query($conn,"SELECT count(order_id) FROM order_summary_tab WHERE status_id='P'"));
		$total_outstanding_orders= $total_outstanding_orders[0];
		//////  total_pending_orders 
		$total_pending_orders=mysqli_fetch_array(mysqli_query($conn,"SELECT count(order_id) FROM order_summary_tab WHERE status_id='PP'"));
		$total_pending_orders= $total_pending_orders[0];
		//////  total_attending_orders 
		$total_attending_orders=mysqli_fetch_array(mysqli_query($conn,"SELECT count(order_id) FROM order_summary_tab WHERE status_id='PR'"));
		$total_attending_orders= $total_attending_orders[0];
		//////  total_ready_orders 
		$total_ready_orders=mysqli_fetch_array(mysqli_query($conn,"SELECT count(order_id) FROM order_summary_tab WHERE status_id='RD'"));
		$total_ready_orders= $total_ready_orders[0];
		//////  total_delivery_orders 
		$total_delivery_orders=mysqli_fetch_array(mysqli_query($conn,"SELECT count(order_id) FROM order_summary_tab WHERE status_id='DL'"));
		$total_delivery_orders= $total_delivery_orders[0];

		
		////// total_active_blogs
		$total_active_blogs_count=mysqli_fetch_array(mysqli_query($conn,"SELECT count(blog_id) FROM blog_tab WHERE status_id='PUB'"));
		$total_active_blogs_count= $total_active_blogs_count[0];
		
		////// total_active_blogs
		$total_active_blogs_count=mysqli_fetch_array(mysqli_query($conn,"SELECT count(blog_id) FROM blog_tab WHERE status_id='PUB'"));
		$total_active_blogs_count= $total_active_blogs_count[0];
		
		////// total_faqs
		$total_faq_count=mysqli_fetch_array(mysqli_query($conn,"SELECT count(faq_id) FROM faq_tab"));
		$total_faq_count= $total_faq_count[0];
		
		
		echo json_encode(array(
		"total_active_staff_count" => $total_active_staff_count, "total_suspended_staff_count" => $total_suspended_staff_count, "total_prospective_staff_count" => $total_prospective_staff_count,
		"total_active_customer_count" => $total_active_customer_count,"total_product_cat_count" => $total_product_cat_count,"total_stock_count" => $total_stock_count,
		"total_outstanding_orders" => $total_outstanding_orders,"total_pending_orders" => $total_pending_orders,"total_attending_orders" => $total_attending_orders,"total_ready_orders" => $total_ready_orders,"total_delivery_orders" => $total_delivery_orders,
		"total_active_blogs_count" => $total_active_blogs_count,"total_faq_count" => $total_faq_count,
		"total_test_centres_count" => $total_test_centres_count,"total_test_dates_count" => $total_test_dates_count
		));
break;






















case 'fetch_users_list': 
	  $status_id=$_POST['status_id'];
	  $all_search_txt=$_POST['all_search_txt'];
	  $check_code='user-list';
	  require_once '../content/sub-codes.php';
break;	


case 'delete_user': 
			$usersid=$_POST['user_id'];
				 $user_array=$callclass->_get_staff_detail($conn, $usersid);
					  $u_array = json_decode($user_array, true);
						$fullname= $u_array[0]['fullname'];
						
				mysqli_query($conn,"DELETE FROM staff_tab WHERE user_id='$usersid'");
				$alert_detail="Success Alert: A prospective staff ($fullname) with ID: $usersid was deleted successful by $user_name)";
		$callclass->_alert_sequence_and_update($conn,$alert_detail,$user_id,$user_name,$ip_address,$sysname,$user_role_id);
break;	


case 'activate_user': 
	$usersid=$_POST['user_id'];
	$role_id=$_POST['role_id'];
	$status_id=$_POST['status_id'];
	$email=$_POST['email'];
	
	$user_array=$callclass->_get_staff_detail($conn, $usersid);
	$u_array = json_decode($user_array, true);
	$fullname= $u_array[0]['fullname'];
	
	
	$check_email=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM staff_tab WHERE email='$email' AND user_id!='$usersid' limit 1"));				
	if ($check_email>0){
	$alert_detail="Error Alert: A prospective staff whose name is $fullname  was NOT activated to due to email error. Details-- ID: $usersid";
	$check=0;
	$userid=$usersid;
	}else{
	///////////////////////geting sequence//////////////////////////
	$sequence=$callclass->_get_sequence_count($conn, 'STF');
	$array = json_decode($sequence, true);
	$no= $array[0]['no'];
	//$num= $array[0]['num'];
	$userid='STF'.$no;
	$userpass=md5($userid);
	$otp = rand(111111,999999);
	//// update staff_tab
	mysqli_query($conn,"UPDATE staff_tab SET user_id ='$userid', role_id='$role_id', status_id='$status_id', password='$userpass', otp='$otp', last_login=NOW() WHERE user_id='$usersid'")or die ("cannot update users_tab");
	//// update alert_tab
	mysqli_query($conn,"UPDATE alert_tab SET user_id ='$userid' WHERE user_id='$usersid'");
	//// update send alert
	$alert_detail="Success Alert: A new staff whose name is $fullname with ID: $userid was activated successful by $user_name";
	$check=1;
	}
		$callclass->_alert_sequence_and_update($conn,$alert_detail,$user_id,$user_name,$ip_address,$sysname,$user_role_id);
	
	echo json_encode(array("check" => $check, "newuserid" => $userid));
break;	



	

case 'update_users_profile': 
			  $usersid=trim($_POST['user_id']);
			  $surname=trim(strtoupper($_POST['surname']));
			  $othernames=trim(strtoupper($_POST['othernames']));
			  $fullname= "$surname $othernames";
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
						
			  $status_id=trim(strtoupper($_POST['status_id']));
			  $role_id=trim(strtoupper($_POST['role_id']));
			
		$check_email=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM staff_tab WHERE email='$email' AND user_id!='$usersid' LIMIT 1"));				
				if ($check_email>0){/// check 1
		  $alert_detail="Error Alert: $fullname profile was NOT updated due to email error";
		$callclass->_alert_sequence_and_update($conn,$alert_detail,$user_id,$user_name,$ip_address,$sysname,$user_role_id);
					$check=0;
					}else{/// else check 1
								if ($user_id==$usersid){/// check 2
								  mysqli_query($conn,"UPDATE staff_tab SET surname='$surname',othernames='$othernames',dob='$dob',gender='$gender',religion='$religion',nationality='$nationality',state='$state',lga='$lga',address='$address',mobile='$phone',email='$email' WHERE user_id='$usersid'")or die ("cannot update users_tab");
							  $alert_detail="Success Alert: $fullname  updated his/her profile successful";
										$check=1;
								}else{/// else check 2
											  mysqli_query($conn,"UPDATE staff_tab SET surname='$surname',othernames='$othernames',dob='$dob',
											  gender='$gender',religion='$religion',nationality='$nationality',state='$state',lga='$lga',
											  address='$address',mobile='$phone',email='$email',job_id='$job_id',
											  status_id='$status_id',role_id='$role_id' WHERE user_id='$usersid'")
											  or die ("cannot update users_tab");
										  $alert_detail="Success Alert: $fullname profile was updated by $user_name";
										$check=1;
								}/// end check 2

								$callclass->_alert_sequence_and_update($conn,$alert_detail,$user_id,$user_name,$ip_address,$sysname,$user_role_id);
					}/// end check 1
					echo json_encode(array("check" => $check));
  break;	




case 'update_profile_pix': // Upload Profile Pix for first time login
		$passport=$_FILES['passport']['name'];
		$datetime=date("Ymdhi");
		
		$allowedExts = array("jpg", "jpeg", "JPEG", "JPG", "gif", "png","PNG","GIF");
		$extension = pathinfo($_FILES['passport']['name'], PATHINFO_EXTENSION);
		
		if (in_array($extension, $allowedExts)){
			
			$user_array=$callclass->_get_staff_detail($conn, $suserid);
			$u_array = json_decode($user_array, true);
			$db_passport= $u_array[0]['passport'];
			if($db_passport=='friends.png'){
				//// do nothing;
			}else{
				unlink("../../../uploaded_files/staff_passport/" .$db_passport);
			}
			
		$passport = $datetime.'_'.$passport;
		move_uploaded_file($_FILES["passport"]["tmp_name"],"../../../uploaded_files/staff_passport/" .$passport);
		}
		
		mysqli_query($conn,"UPDATE `staff_tab` SET passport='$passport' WHERE user_id='$suserid'") or die ("cannot update staff_tab");
		/////////// get alert//////////////////////////////////
		$alert_detail="Success Alert: $user_name Updated profile picture";
		$callclass->_alert_sequence_and_update($conn,$alert_detail,$user_id,$user_name,$ip_address,$sysname,$user_role_id);
break;

case 'update_user_password': 
		$oldpass=md5($_POST['oldpass']);
		$newpass=$_POST['newpass'];
		$newpass=md5($newpass);
		$userpass=mysqli_num_rows(mysqli_query($conn,"SELECT password FROM staff_tab WHERE password='$oldpass' AND user_id ='$suserid' "));
			if ($userpass>0){
				mysqli_query($conn,"UPDATE staff_tab SET password='$newpass' WHERE user_id='$suserid'")
				or die ("cannot update staff_tab");
				/////////// get alert//////////////////////////////////
				$alert_detail='Success Alert: User Password changed by '.$user_name;
				$callclass->_alert_sequence_and_update($conn,$alert_detail,$user_id,$user_name,$ip_address,$sysname,$user_role_id);
				$check=1; /// password updated
				session_destroy();
			}else{
				$check=0; //password not updated
			}
		echo json_encode(array("check" => $check)); 
break;	
/*----------------------------------end of paramount code-----------------------------------------------------*/























	
case 'add_product_category': 

	  $product_cat_name=trim(strtoupper($_POST['product_cat_name']));
	  $status_id=$_POST['status_id'];
	 
	///////////////////////geting sequence//////////////////////////
	$sequence=$callclass->_get_sequence_count($conn, 'PRC');
	$array = json_decode($sequence, true);
	$no= $array[0]['no'];
	//$num= $array[0]['num'];
	$product_cat_id='PRC'.$no;

          if(isset($_FILES["product_pix"]["name"])){
          $totalFiles = count($_FILES["product_pix"]["name"]);
          $filesArray = array();

          for ($i = 0; $i < $totalFiles; $i++){
               $imageName = $_FILES["product_pix"]["name"][$i];
               $tmpName = $_FILES["product_pix"]["tmp_name"][$i];
 
               $imageExtension = explode('.', $imageName);

               $name = $imageExtension[0];
               $imageExtension = strtolower(end($imageExtension));

               $newImageName = $product_cat_id."-".$i.uniqid(); /////generate new image name
               $newImageName .= "." . $imageExtension;

               move_uploaded_file($tmpName, '../../../uploaded_files/product-cat-pix/' . $newImageName);
			mysqli_query($conn,"INSERT INTO `product_categories_pix_tab`
			(`product_cat_id`, `product_pix`) VALUES 
			('$product_cat_id', '$newImageName')");
          }
       
     }
			mysqli_query($conn,"INSERT INTO `product_categories_tab`
			(`product_cat_id`, `product_cat_name`, `status_id`, `date`) VALUES 
			('$product_cat_id', '$product_cat_name', '$status_id', NOW())")or die (mysqli_error($conn));
		/////////// get alert//////////////////////////////////
		$alert_detail="Success Alert: A new product category has been registered by $user_name. Details-- ID: $product_cat_id";
		$callclass->_alert_sequence_and_update($conn,$alert_detail,$user_id,$user_name,$ip_address,$sysname,$user_role_id);
break;	


case 'update_product_category': 
	  $product_cat_id=trim(strtoupper($_POST['product_cat_id']));
	  $product_cat_name=trim(strtoupper($_POST['product_cat_name']));
	  $product_pix=trim($_POST['product_pix']);
	  $status_id=$_POST['status_id'];
	  /// update product_categories_tab
	mysqli_query($conn,"UPDATE product_categories_tab SET product_cat_name='$product_cat_name', status_id='$status_id', date=NOW() WHERE product_cat_id='$product_cat_id'")or die ("cannot update staff_tab");
	  
	if ($product_pix!=''){
		//// unlink product pictures
			$pixquery=mysqli_query($conn,"SELECT * FROM product_categories_pix_tab WHERE  product_cat_id='$product_cat_id'");
			while($pixsel=mysqli_fetch_array($pixquery)){
			$db_product_pix=$pixsel['product_pix'];
				unlink("../../../uploaded_files/product-cat-pix/" .$db_product_pix);
			}
			////// delete from product_categories_pix_tab
				mysqli_query($conn,"DELETE FROM product_categories_pix_tab WHERE product_cat_id='$product_cat_id'");

          if(isset($_FILES["product_pix"]["name"])){
          $totalFiles = count($_FILES["product_pix"]["name"]);
          $filesArray = array();

          for ($i = 0; $i < $totalFiles; $i++){
               $imageName = $_FILES["product_pix"]["name"][$i];
               $tmpName = $_FILES["product_pix"]["tmp_name"][$i];
 
               $imageExtension = explode('.', $imageName);

               $name = $imageExtension[0];
               $imageExtension = strtolower(end($imageExtension));

               $newImageName = $product_cat_id."-".$i.uniqid(); /////generate new image name
               $newImageName .= "." . $imageExtension;

               move_uploaded_file($tmpName, '../../../uploaded_files/product-cat-pix/' . $newImageName);
			mysqli_query($conn,"INSERT INTO `product_categories_pix_tab`
			(`product_cat_id`, `product_pix`) VALUES 
			('$product_cat_id', '$newImageName')");
          }
       
     }
	}
		/////////// get alert//////////////////////////////////
		$alert_detail="Success Alert: A product category ($product_cat_name) has been updated by $user_name. Details-- ID: $product_cat_id";
		$callclass->_alert_sequence_and_update($conn,$alert_detail,$user_id,$user_name,$ip_address,$sysname,$user_role_id);
break;	


case 'fetch_products_cat_list': 
$status_id=$_POST['status_id'];
$all_search_txt=$_POST['all_search_txt'];
$check_code='product-cat-list';
require_once '../content/sub-codes.php';
break;








case 'add_product': 
	  $product_cat_id=trim(strtoupper($_POST['product_cat_id']));
	  $product_name =trim(strtoupper(str_replace("'", "\'", $_POST['product_name'])));
	  $product_desc =trim((str_replace("'", "\'", $_POST['product_desc'])));
	  $status_id=$_POST['status_id'];
	  $purchase_price=trim(($_POST['purchase_price']));
	  $selling_price=trim(($_POST['selling_price']));
	 
		$array=$callclass->_get_product_cat_detail($conn, $product_cat_id);
		$get_array = json_decode($array, true);
		$product_cat_name= $get_array[0]['product_cat_name'];
	///////////////////////geting sequence//////////////////////////
	$sequence=$callclass->_get_sequence_count($conn, 'PR');
	$array = json_decode($sequence, true);
	$no= $array[0]['no'];
	//$num= $array[0]['num'];
	$product_id='PR'.$no;

          if(isset($_FILES["product_pix"]["name"])){
          $totalFiles = count($_FILES["product_pix"]["name"]);
          $filesArray = array();

          for ($i = 0; $i < $totalFiles; $i++){
               $imageName = $_FILES["product_pix"]["name"][$i];
               $tmpName = $_FILES["product_pix"]["tmp_name"][$i];
 
               $imageExtension = explode('.', $imageName);

               $name = $imageExtension[0];
               $imageExtension = strtolower(end($imageExtension));

               $newImageName = $product_id."-".$i.uniqid(); /////generate new image name
               $newImageName .= "." . $imageExtension;

               move_uploaded_file($tmpName, '../../../uploaded_files/product-pix/' . $newImageName);
			mysqli_query($conn,"INSERT INTO `product_pix_tab`
			(`product_id`, `product_pix`) VALUES 
			('$product_id', '$newImageName')");
          }
       
     }
	 //// insert into product_tab
			mysqli_query($conn,"INSERT INTO `product_tab`
			(`product_cat_id`,`product_id`, `product_name`, `product_desc`, `status_id`, `date`) VALUES 
			('$product_cat_id', '$product_id', '$product_name', '$product_desc','$status_id', NOW())")or die (mysqli_error($conn));
	
	 //// insert into stock_tab
			mysqli_query($conn,"INSERT INTO `stock_tab`
			(`product_id`, `purchase_price`, `selling_price`, `date`) VALUES 
			('$product_id','$purchase_price','$selling_price', NOW())")or die (mysqli_error($conn));
		/////////// get alert//////////////////////////////////
		$alert_detail="Success Alert: A new product has been registered under $product_cat_name by $user_name. Details-- ID: $product_id | NAME: $product_name ";
		$callclass->_alert_sequence_and_update($conn,$alert_detail,$user_id,$user_name,$ip_address,$sysname,$user_role_id);
break;	



case 'update_product':
	  $product_cat_id=trim(strtoupper($_POST['product_cat_id']));
	  $product_id=trim(strtoupper($_POST['product_id']));
	  $product_name =trim(strtoupper(str_replace("'", "\'", $_POST['product_name'])));
	  $product_desc =trim((str_replace("'", "\'", $_POST['product_desc'])));
	  $status_id=$_POST['status_id'];
	  $product_pix=trim($_POST['product_pix']);
	  $status_id=$_POST['status_id'];
	  $purchase_price=trim(($_POST['purchase_price']));
	  $selling_price=trim(($_POST['selling_price']));
	 
		$array=$callclass->_get_product_cat_detail($conn, $product_cat_id);
		$get_array = json_decode($array, true);
		$product_cat_name= $get_array[0]['product_cat_name'];
		
	/// update product_tab
	mysqli_query($conn,"UPDATE product_tab SET product_name='$product_name', product_desc='$product_desc', status_id='$status_id', date=NOW() WHERE product_id='$product_id'")or die ("cannot update product_tab");
	/// update stock_tab
	mysqli_query($conn,"UPDATE stock_tab SET purchase_price='$purchase_price', selling_price='$selling_price', date=NOW() WHERE product_id='$product_id'")or die ("cannot update stock_tab");
	  
	if ($product_pix!=''){
		//// unlink product pictures
			$pixquery=mysqli_query($conn,"SELECT * FROM product_pix_tab WHERE  product_id='$product_id'");
			while($pixsel=mysqli_fetch_array($pixquery)){
			$db_product_pix=$pixsel['product_pix'];
				unlink("../../../uploaded_files/product-pix/" .$db_product_pix);
			}
			////// delete from product_categories_pix_tab
			mysqli_query($conn,"DELETE FROM product_pix_tab WHERE product_id='$product_id'");

          if(isset($_FILES["product_pix"]["name"])){
          $totalFiles = count($_FILES["product_pix"]["name"]);
          $filesArray = array();

          for ($i = 0; $i < $totalFiles; $i++){
               $imageName = $_FILES["product_pix"]["name"][$i];
               $tmpName = $_FILES["product_pix"]["tmp_name"][$i];
 
               $imageExtension = explode('.', $imageName);

               $name = $imageExtension[0];
               $imageExtension = strtolower(end($imageExtension));

               $newImageName = $product_id."-".$i.uniqid(); /////generate new image name
               $newImageName .= "." . $imageExtension;

               move_uploaded_file($tmpName, '../../../uploaded_files/product-pix/' . $newImageName);
			mysqli_query($conn,"INSERT INTO `product_pix_tab`
			(`product_id`, `product_pix`) VALUES 
			('$product_id', '$newImageName')");
          }
     }
	}
		/////////// get alert//////////////////////////////////
		$alert_detail="Success Alert: A  product has been updated under $product_cat_name by $user_name. Details-- ID: $product_id | NAME: $product_name ";
		$callclass->_alert_sequence_and_update($conn,$alert_detail,$user_id,$user_name,$ip_address,$sysname,$user_role_id);
break;	


case 'fetch_products_list': 
	$product_cat_id=$_POST['product_cat_id'];
	$status_id=$_POST['status_id'];
	$all_search_txt=$_POST['all_search_txt'];
	$check_code='product-list';
	require_once '../content/sub-codes.php';
break;




case 'load_stock':
	  $product_id=trim(strtoupper($_POST['product_id']));
	  $product_qty=trim(($_POST['product_qty']));
	  $purchase_price=trim(($_POST['purchase_price']));
	  $selling_price=trim(($_POST['selling_price']));
	  
	
		$array=$callclass->_get_product_detail($conn, $product_id);
		$get_array = json_decode($array, true);
		$product_cat_id= $get_array[0]['product_cat_id'];
		$product_name= $get_array[0]['product_name'];
				
		$cat_array=$callclass->_get_product_cat_detail($conn, $product_cat_id);
		$get_cat_array = json_decode($cat_array, true);
		$product_cat_name= $get_cat_array[0]['product_cat_name'];


			///////////////////////geting sequence//////////////////////////
			$sequence=$callclass->_get_sequence_count($conn, 'SH_ID');
			$array = json_decode($sequence, true);
			$no= $array[0]['no'];
			//$num= $array[0]['num'];
			$stock_history_id='SH_ID'.$no;
	
			$stock_array=$callclass->_get_stock_detail($conn, $product_id);
			$stock_fetch = json_decode($stock_array, true);
				$available_qty= $stock_fetch[0]['available_qty'];

			$stock_balance=$available_qty+$product_qty;
			$profit=$selling_price-$purchase_price;
			
			mysqli_query($conn,"INSERT INTO `stock_history_tab`
			(`stock_history_id`, `product_id`, `available_qty`, `qty_loaded`, `stock_balance`, `purchase_price`, `selling_price`, `staff_id`, `date`) VALUES 
			('$stock_history_id', '$product_id', '$available_qty', '$product_qty', '$stock_balance', '$purchase_price', '$selling_price', '$user_id', NOW())")or die (mysqli_error($conn));

			/// update stock_tab
			mysqli_query($conn,"UPDATE stock_tab SET purchase_price='$purchase_price', selling_price='$selling_price', profit='$profit', available_qty='$stock_balance',  date=NOW() WHERE product_id='$product_id'")or die (mysqli_error($conn));
		/////////// get alert//////////////////////////////////
		$alert_detail="Success Alert: A new stock loaded for $product_cat_name ($product_name) by $user_name. Details-- ID: $stock_history_id | QTY: $product_qty | PURCHASED PRISE PER UNIT: N$purchase_price | SELLIBG PRICE PER UNIT: N$selling_price";
		$callclass->_alert_sequence_and_update($conn,$alert_detail,$user_id,$user_name,$ip_address,$sysname,$user_role_id);
break;


case 'load_stock_report':
	  $view_report=$_POST['view_report'];
	  require_once '../content/report-date-schedule.php';
	$check_code='load_stock_history';
	  require_once('../content/sub-codes.php');
break;

case 'fetch_stock_details': 
	$all_search_txt=$_POST['all_search_txt'];
	$check_code='stock_details';
	require_once '../content/sub-codes.php';
break;






case 'decline_order': 
	$order_id=$_POST['order_id'];
				/////// delete from add_to_cart_tab
				mysqli_query($conn,"DELETE FROM `add_to_cart_tab` WHERE shop_session='$order_id'");
				/////// delete from order_summary_tab
				mysqli_query($conn,"DELETE FROM `order_summary_tab` WHERE order_id='$order_id'");
				/////// delete from add_to_cart_tab
				mysqli_query($conn,"DELETE FROM `payment_tab` WHERE order_id='$order_id'");
	/////////// get alert//////////////////////////////////
	$alert_detail="Success Alert: An Order With ID:$order_id has been DELETED successfully by $user_name.";
	$callclass->_alert_sequence_and_update($conn,$alert_detail,$user_id,$user_name,$ip_address,$sysname,$user_role_id);
break;

case 'confirm_order_payment': 
	$shopsession=$_POST['order_id'];
	
	$array=$callclass->_get_payment_id_for_order($conn, $shopsession);
	$fetch = json_decode($array, true);
	$pay_id= $fetch[0]['pay_id'];
	$s_customer_id= $fetch[0]['user_id'];

		$user_array=$callclass->_get_user_detail($conn, $s_customer_id);
		$user_array = json_decode($user_array, true);
		$fullname= $user_array[0]['fullname'];
		$email= $user_array[0]['email'];
		$phone= $user_array[0]['phone'];
		
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
	$mail_to_send='auto_order_progressive_invoice';
	require_once('mail/mail.php');
break;








case 'process_order_item': 
	$order_id=$_POST['order_id'];
	$product_id=$_POST['product_id'];
	
	$check_staff_currenty_attending_to_order=mysqli_num_rows(mysqli_query($conn,"SELECT order_id FROM order_summary_tab WHERE order_id!='$order_id' AND status_id='PR' AND staff_id='$user_id'"));
	$check_if_order_is_currently_attended_to=mysqli_num_rows(mysqli_query($conn,"SELECT order_id FROM order_summary_tab WHERE order_id='$order_id' AND staff_id !='$user_id' AND staff_id!=''"));
		if (($check_staff_currenty_attending_to_order>0)||($check_if_order_is_currently_attended_to>0)){
			$check=0;//// Access Denied. (You Cannot Attend to This Order)
		}else{
			//// check the avialable qty in the stock
		  $stock_array=$callclass->_get_stock_detail($conn, $product_id);
		  $stock_fetch = json_decode($stock_array, true);
			$available_qty= $stock_fetch[0]['available_qty'];
			//// check the cart backup
		  $array=$callclass->_get_cart_backup_detail($conn, $order_id, $product_id);
		  $fetch = json_decode($array, true);
			$product_qty= $fetch[0]['product_qty'];
			
			if ($product_qty<=$available_qty){
			$check=2; // proceed to prepare item
				  /// update stock_tab///
				mysqli_query($conn,"UPDATE stock_tab SET  available_qty=available_qty-'$product_qty' WHERE product_id='$product_id'")or die (mysqli_error($conn));
				  /// update add_to_cart_backup_tab///
				mysqli_query($conn,"UPDATE add_to_cart_backup_tab SET available_qty='$product_qty', status_id='RD', staff_id ='$user_id', date=NOW() WHERE order_id='$order_id' AND product_id='$product_id'")or die (mysqli_error($conn));
				  /// update add_to_cart_backup_tab///
				mysqli_query($conn,"UPDATE order_summary_tab SET  status_id='PR', staff_id='$user_id' WHERE order_id='$order_id'")or die (mysqli_error($conn));

				$count_remaining_items_in_this_order=mysqli_num_rows(mysqli_query($conn,"SELECT product_id FROM add_to_cart_backup_tab WHERE order_id='$order_id' AND status_id='PP'"));
					if($count_remaining_items_in_this_order==0){
				  /// update add_to_cart_backup_tab///
				mysqli_query($conn,"UPDATE order_summary_tab SET  status_id='RD', staff_id='$user_id' WHERE order_id='$order_id'")or die (mysqli_error($conn));
					}
			}else{
			$check=1;//// Access Denied. (product qty not enough)
			}
		}
		$array=$callclass->_get_order_summary_detail($conn, $order_id);
		$fetch = json_decode($array, true);
			$order_status_id=$fetch[0]['status_id'];
			
		echo json_encode(array("check" => $check,"order_status_id" => $order_status_id)); 
break;







case 'resend_delivery_otp': 
	$shopsession=$_POST['order_id'];
	$pay_id=$_POST['pay_id'];
	
	$mail_to_send='auto_order_progressive_invoice';
	require_once('mail/mail.php');
break;


case 'confirm_delivery': 
	$shopsession=$_POST['order_id'];
	$pay_id=$_POST['pay_id'];
	$delivery_otp=trim($_POST['delivery_otp']);
	
	$check_delivery_otp=mysqli_num_rows(mysqli_query($conn,"SELECT order_id FROM order_summary_tab WHERE order_id='$shopsession' AND status_id='RD' AND delivery_otp='$delivery_otp'"));
	if($check_delivery_otp>0){
		$check=1;//// otp confirmed
	  /// update add_to_cart_backup_tab///
	mysqli_query($conn,"UPDATE order_summary_tab SET  status_id='DL', delivery_staff_id='$user_id' WHERE order_id='$shopsession'")or die (mysqli_error($conn));
	  /// update add_to_cart_backup_tab///
	mysqli_query($conn,"UPDATE add_to_cart_backup_tab SET status_id='DL', date=NOW() WHERE order_id='$shopsession'")or die (mysqli_error($conn));
	
	/////////// get alert//////////////////////////////////
	$alert_detail="Success Alert: An Order With ID:$shopsession has been delivered to the customer by $user_name.";
	$callclass->_alert_sequence_and_update($conn,$alert_detail,$user_id,$user_name,$ip_address,$sysname,$user_role_id);
		
	$mail_to_send='auto_order_progressive_invoice';
	require_once('mail/mail.php');
	
	}else{
		$check=0;//// Invalid otp
	}
		echo json_encode(array("check" => $check)); 
break;





case 'fetch_order_list': 
	$status_id=$_POST['status_id'];
	$all_search_txt=$_POST['all_search_txt'];
	$check_code='order-list';
	require_once '../content/sub-codes.php';
break;















case 'blog_reg':
	$blog_cat_id = $_POST['blog_cat_id'];
	$blog_title =str_replace("'", "\'", $_POST['blog_title']);
	$blog_url =str_replace("'", "\'", $_POST['blog_url']);
	$seo_keywords =str_replace("'", "\'", $_POST['seo_keywords']);
	$seo_describtion =str_replace("'", "\'", $_POST['seo_describtion']);
	$blog_pix = $_POST['blog_pix'];
	$blog_detail =str_replace("'", "\'", $_POST['blog_detail']);
	$blog_status_id = $_POST['blog_status_id'];


	$query=mysqli_query($conn,"SELECT * FROM blog_tab WHERE blog_url='$blog_url'")or die ('cannot select blog_tab');
	$check_query=mysqli_num_rows($query);
	
	if($check_query>0){
		$check=0;
	}else{
		$check=1;
		///////////////////////geting sequence//////////////////////////
		$sequence=$callclass->_get_sequence_count($conn, 'BLOG');
		$array = json_decode($sequence, true);
		$no= $array[0]['no'];
		//$num= $array[0]['num'];
		$blog_id='BLOG'.$no;
		///////////////////getting blog pix///////////////////////

		if($blog_pix==''){
			$blog_photo='';
		}else{
			$blog_thumb=$_FILES['blog_thumb']['name'];
			$datetime=date("Ymdhi");
			
			$allowedExts = array("jpg", "jpeg", "JPEG", "JPG", "gif", "png","PNG","GIF");
			$extension = pathinfo($_FILES['blog_thumb']['name'], PATHINFO_EXTENSION);
			
			if (in_array($extension, $allowedExts)){				  
				$blog_photo = $datetime.'_'.$blog_thumb;
				move_uploaded_file($_FILES["blog_thumb"]["tmp_name"],"../../../uploaded_files/blog-pix/" .$blog_photo);
			}
		}

		mysqli_query($conn,"INSERT INTO `blog_tab`
		(`blog_id`, `cat_id`, `blog_title`, `blog_url`, `seo_keywords`, `seo_describtion`, `blog_detail`, `status_id`, `blog_pix`, `user_id`, `reg_date`, `last_updated`) VALUES 
		('$blog_id', '$blog_cat_id', '$blog_title','$blog_url','$seo_keywords', '$seo_describtion', '$blog_detail', '$blog_status_id','$blog_photo', '$user_id',NOW(), NOW())")or die (mysqli_error($conn));
		
		mkdir('../../../blog/'.$blog_url);
		$myfile = fopen("../../../blog/".$blog_url."/index.php", "w") or die("Unable to open file!");
		$txt = "<?php include '../../config/connection.php';?>\n";
		$txt .= "<?php ".strval('$blog_id')."='$blog_id';?>\n";
		$txt .= "<?php include "."'../blog_page_details.php';?>";
		fwrite($myfile, $txt);
		fclose($myfile);
		/////////// get alert//////////////////////////////////
		$alert_detail='Success Alert: Blog with ID: '.$blog_id.' was created successfully by '.$user_name;
		$callclass->_alert_sequence_and_update($conn,$alert_detail,$user_id,$user_name,$ip_address,$sysname,$user_role_id);
	
	}
	echo json_encode(array("check" => $check)); 
break;



case 'get_blog_details': 
	$view_content=$action;
	$blog_id=$_POST['blog_id'];
	require_once '../content/content-page.php';
break;

case 'blog_update':
	$blog_id = $_POST['blog_id'];
	$blog_cat_id = $_POST['blog_cat_id'];
	$blog_title =str_replace("'", "\'", $_POST['blog_title']);
	$blog_url =str_replace("'", "\'", $_POST['blog_url']);
	$seo_keywords =str_replace("'", "\'", $_POST['seo_keywords']);
	$seo_describtion =str_replace("'", "\'", $_POST['seo_describtion']);
	$blog_pix = $_POST['blog_pix'];
	$blog_detail =str_replace("'", "\'", $_POST['blog_detail']);
	$blog_status_id = $_POST['blog_status_id'];

	$query=mysqli_query($conn,"SELECT * FROM blog_tab WHERE blog_url='$blog_url' AND blog_id!='$blog_id'")or die ('cannot select blog_tab');
	$check_query=mysqli_num_rows($query);
	
	if($check_query>0){
		$check=0;
	}else{

			$check=1;
			$blog_array=$callclass->_get_blog_detail($conn, $blog_id);
				$b_array = json_decode($blog_array, true);
				$db_blog_pix=$b_array[0]['blog_pix'];
				$db_blog_url=$b_array[0]['blog_url'];
			array_map('unlink', glob("../../../blog/$db_blog_url/*.*"));
			rmdir("../../../blog/$db_blog_url");


			mysqli_query($conn,"UPDATE blog_tab SET cat_id='$blog_cat_id', blog_title='$blog_title', 
			blog_url='$blog_url', seo_keywords='$seo_keywords',seo_describtion='$seo_describtion',
			blog_detail='$blog_detail',status_id='$blog_status_id', user_id='$user_id', reg_date=NOW() WHERE blog_id='$blog_id'")or die ("cannot update users_tab");
			
			
			
			///////////////////getting blog pix///////////////////////
			if($blog_pix!=''){
				
				unlink("../../../uploaded_files/blog-pix/" .$db_blog_pix);
			
			$blog_thumb=$_FILES['blog_thumb']['name'];
			$datetime=date("Ymdhi");
			
			$allowedExts = array("jpg", "jpeg", "JPEG", "JPG", "gif", "png","PNG","GIF");
			$extension = pathinfo($_FILES['blog_thumb']['name'], PATHINFO_EXTENSION);
			
			if (in_array($extension, $allowedExts)){				  
				$blog_photo = $datetime.'_'.$blog_thumb;
				move_uploaded_file($_FILES["blog_thumb"]["tmp_name"],"../../../uploaded_files/blog-pix/" .$blog_photo);
			}
			mysqli_query($conn,"UPDATE blog_tab SET blog_pix='$blog_photo' WHERE blog_id='$blog_id'")
			or die ("cannot update blog_tab");
			}


				

				mkdir('../../../blog/'.$blog_url);
				$myfile = fopen("../../../blog/".$blog_url."/index.php", "w") or die("Unable to open file!");
				$txt = "<?php include '../../config/connection.php';?>\n";
				$txt .= "<?php ".strval('$blog_id')."='$blog_id';?>\n";
				$txt .= "<?php include "."'../blog_page_details.php';?>";
				fwrite($myfile, $txt);
				fclose($myfile);
				
			
			/////////// get alert//////////////////////////////////
			$alert_detail='Success Alert: Blog with ID: '.$blog_id.' was successfully Updated by '.$user_name;
			$callclass->_alert_sequence_and_update($conn,$alert_detail,$user_id,$user_name,$ip_address,$sysname,$user_role_id);
	}
echo json_encode(array("check" => $check)); 
break;




case 'fetch_blog_list': 
$user_id=$_POST['user_id'];
$status_id=$_POST['status_id'];
$cat_id=$_POST['cat_id'];
$all_search_txt=$_POST['all_search_txt'];
$check_code='blog-list';
require_once '../content/sub-codes.php';
break;
	

case 'register_faq': 
		$faq_id=trim(($_POST['faq_id']));
		$question=trim((str_replace("'", "\'", $_POST['question'])));
		$answer=trim((str_replace("'", "\'", $_POST['answer'])));
		
		If($faq_id==''){
			  ///////////////////////geting sequence//////////////////////////
			  $sequence=$callclass->_get_sequence_count($conn, 'FAQ_ID');
			  $array = json_decode($sequence, true);
			  $no= $array[0]['no'];
			  //$num= $array[0]['num'];
			  $faq_id='FAQ_ID'.$no.date("Ymdhis");
				mysqli_query($conn,"INSERT INTO `faq_tab`
				(`faq_id`, `question`, `answer`, `staff_id`, `date`) VALUES
				('$faq_id', '$question', '$answer', '$user_id', NOW())")or die (mysqli_error($conn));
			$alert_detail="Success Alert: A new FAQ WAS REGISTERED  by $user_name. ID:$faq_id | QUESTION: $question";
				$callclass->_alert_sequence_and_update($conn,$alert_detail,$user_id,$user_name,$ip_address,$sysname,$user_role_id);
		}else{
			mysqli_query($conn,"UPDATE `faq_tab` SET question='$question',answer='$answer',staff_id='$user_id', date=NOW()  WHERE faq_id='$faq_id'")or die (mysqli_error($conn));
			$alert_detail="Success Alert: A new FAQ WAS UPDATED  by $user_name. ID:$faq_id | QUESTION: $question";
				$callclass->_alert_sequence_and_update($conn,$alert_detail,$user_id,$user_name,$ip_address,$sysname,$user_role_id);
		}
break;	
case 'fetch_faq_list': 
	  $all_search_txt=$_POST['all_search_txt'];
	  $check_code='faq-list';
	  require_once '../content/sub-codes.php';
break;	

case 'news_letter_list': 
	  $all_search_txt=$_POST['all_search_txt'];
	  $check_code='news_letter_list';
	  require_once '../content/sub-codes.php';
break;	



case 'payment_report':
		$view_report=$_POST['view_report'];
		$all_search_txt=$_POST['all_search_txt'];			  
		require_once '../content/report-date-schedule.php';
		$check_code='report';
		require_once '../content/sub-codes.php';
break;





case 'update_settings':
		$bank_name=$_POST['bank_name'];
		$account_name=$_POST['account_name'];
		$account_number=$_POST['account_number'];
		$promo_code=$_POST['promo_code'];
		$promo_amount_limit=$_POST['promo_amount_limit'];
		$support_email=$_POST['support_email'];
		$sender_name=$_POST['sender_name'];
		$smtp_host=$_POST['smtp_host'];
		$smtp_username=$_POST['smtp_username'];
		$smtp_password=$_POST['smtp_password'];
		$smtp_port=$_POST['smtp_port'];

		mysqli_query($conn,"UPDATE `setup_backend_settings_tab` SET 
		smtp_host='$smtp_host',smtp_username='$smtp_username',smtp_password='$smtp_password',smtp_port='$smtp_port',sender_name='$sender_name',support_email='$support_email',
		promo_code='$promo_code',promo_amount_limit='$promo_amount_limit',bank_name='$bank_name',account_name='$account_name',account_number='$account_number'
		 WHERE backend_setting_id='BK_ID001'")or die (mysqli_error($conn));
break;



}?>
