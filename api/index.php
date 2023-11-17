<?php require_once 'config/connection.php';?>
<?php require_once 'config/functions.php';?>
<?php
header('Content-Type: application/json; charset=UTF-8');
$action=$_POST['action'];

switch ($action){




	case 'delivery_area_api':
		$delivery_area_id =trim($_POST['delivery_area_id']);
	
			$response['response']=90;
			$response['result']=true;
			$query=mysqli_query($conn,"SELECT * FROM setup_delivery_area_tab ORDER BY da_name ASC")or die (mysqli_error($conn));
			while($fetch_query=mysqli_fetch_all($query, MYSQLI_ASSOC)){
				$response['data']=$fetch_query;	
			}
		echo json_encode($response); 
	break;


	case 'get_delivery_area_details_api':
		$da_id =trim($_POST['da_id']);
			$response['response']=92;
			$response['result']=true;
			$query=mysqli_query($conn,"SELECT * FROM setup_delivery_area_tab WHERE da_id='$da_id'")or die (mysqli_error($conn));
			while($fetch_query=mysqli_fetch_assoc($query)){
				$response['data']=$fetch_query;	
			}
		echo json_encode($response); 
	break;




// 	case 'blog_view_api':
// 		$blog_id =trim($_POST['blog_id']);
// 		$session=trim($_POST['session']);
// 		$system=trim($_POST['system']);
// 		$ip_address=trim($_POST['ip_address']);
		
// 		 $query=mysqli_query($conn,"SELECT  ip_address FROM blog_view_tab WHERE blog_id='$blog_id' AND ip_address='$ip_address'")or die ('cannot select blog_tab');
// 		 $check=mysqli_num_rows($query);
// 		 if($check>0){
// 			mysqli_query($conn,"UPDATE blog_view_tab SET `session`='$session', `system`='$system', `ip_address`='$ip_address' WHERE ip_address = '$ip_address' AND blog_id='$blog_id'")or die (mysqli_error($conn));
	
// 		}else{
// 			$callclass->_get_sequence_count($conn, 'BLOG_VIEW');

// 			$count=mysqli_fetch_array(mysqli_query($conn,"SELECT views FROM blog_tab WHERE blog_id = '$blog_id' FOR UPDATE"));
// 			$num=$count[0]+1;
// 			mysqli_query($conn,"UPDATE blog_tab SET `views`='$num' WHERE blog_id='$blog_id'")or die (mysqli_error($conn));
// 			$response['num']=$num;
			
// 			mysqli_query($conn,"INSERT INTO `blog_view_tab`
// 			(`blog_id`, `session`, `system`, `ip_address`, `date`) VALUES
// 			('$blog_id', '$session', '$system', '$ip_address', NOW())")or die (mysqli_error($conn));
		
// 	}
		
		
// 		echo json_encode($response); 
// 	break;
	










	case 'fetch_customer_api':

			$user_id=trim(strtoupper($_POST['user_id']));
			$status_id=($_POST['status_id']);
			$search_txt=($_POST['search_txt']);
			
			$search_like="(user_id like '%$search_txt%' OR 
            fullname like '%$search_txt%' OR 
            phone like '%$search_txt%' OR 
            email like '%$search_txt%')";
			
			$query=mysqli_query($conn,"SELECT * FROM user_tab WHERE status_id LIKE '%$status_id%' AND $search_like ")or die (mysqli_error($conn));
			$count=mysqli_num_rows($query);
				if ($count==0){///start if 1
					$response['response']=101;
					$response['result']=false;
					$response['message']="NO RECORD FOUND!!!"; 
				} else {///else 1
				/// write sql statement and function that will return all staff here
                    if ($user_id=='') {///start if 	
						$query=mysqli_query($conn,"SELECT a.user_id, a.fullname, a.phone, a.passport, b.status_name FROM user_tab a, setup_status_tab b WHERE a.status_id=b.status_id AND b.status_id LIKE '%$status_id%' AND $search_like  ")or die (mysqli_error($conn));
						$check_query=mysqli_num_rows($query);
						if ($check_query>0) {
							$response['response']=102;
							$response['result']=true;
							
							while($fetch_query=mysqli_fetch_all($query, MYSQLI_ASSOC)){
								$response['data']=$fetch_query;	
							}
							
						}else{
							$response['response']=103;
							$response['result']=false;
							$response['message']="NO RECORD FOUND!!!"; 
						}
						
						
                    } else {///else 2
						$query=mysqli_query($conn,"SELECT * FROM user_tab WHERE user_id LIKE '%$user_id%' AND status_id LIKE '%$status_id%' AND $search_like ")or die (mysqli_error($conn));
							$response['response']=104;
							$response['result']=true;
							while($fetch_query=mysqli_fetch_assoc($query)){
							$response['data']=$fetch_query;
						} 
						
                    } //enf if 2
				}///end if 1
			
			
		echo json_encode($response); 
	break;









	
	case 'add_or_update_customer_api':
			$user_id=trim(strtoupper($_POST['user_id']));
			$fullname=trim(strtoupper($_POST['fullname']));
			$phone=trim($_POST['phone']);
			$email=trim($_POST['email']);
			$address=trim(strtoupper($_POST['address']));	
			// staff passport value
			// $passport_value = $_POST['passport'];
			// $passport=$_FILES['passport']['name'];
			$passport='friends.png';
			
			
			if(($fullname=='')||($phone=='')||($email=='')||($address=='')){ ///start if 1
				$response['response']=105; 
				$response['result']=False;
				$response['message1']="ERROR!"; 
				$response['message2']="Fill all fields to continue."; 
			}else{ ///else 1
				
				if (filter_var($email, FILTER_VALIDATE_EMAIL)){ ///start if 2
					
					if($user_id==''){ ///start if 3
						$usercheck=mysqli_query($conn,"SELECT email FROM user_tab WHERE email='$email'");
						$useremail=mysqli_num_rows($usercheck);
						if ($useremail>0){ ///start if 4
							$response['response']=106; 
							$response['result']=False;
							$response['message1']="EMAIL ERROR!"; 
							$response['message2']="Email already been used.";
						}else{ ///else 4
							///////////////////////geting sequence//////////////////////////
							$mast_id='USER';
							$sequence=$callclass->_get_sequence_count($conn, $mast_id);
							$array = json_decode($sequence, true);
							$no= $array[0]['no'];
							
							/// generate staff_id and password 
							$user_id='USER'.$no.date("Ymdhis");
							$password=md5($user_id);	
							/// register user
							mysqli_query($conn,"INSERT INTO `user_tab`
							(`user_id`, `fullname`, `phone`,  `email`,`address`, `password`, status_id, `passport`, `reg_date`) VALUES
							('$user_id', '$fullname', '$phone', '$email','$address','$password', 'A', NOW())")or die (mysqli_error($conn));
							
							$response['response']=107; 
							$response['result']=true;
							$response['message1']="CUSTOMER REGISTER SUCCESSFUL!"; 
							
						} ///end if 4
					}else{ ///else 3
						$usercheck=mysqli_query($conn,"SELECT * FROM user_tab WHERE email='$email' AND user_id!='$user_id' LIMIT 1");
						$useremail=mysqli_num_rows($usercheck);
						if ($useremail>0){ ///start if 5
							$response['response']=108; 
							$response['result']=false;
							$response['message1']="EMAIL ERROR!"; 
							$response['message2']="Email already been used.";
						
						}else{ ///else 5
							mysqli_query($conn,"UPDATE user_tab SET fullname='$fullname',phone='$phone',email='$email',`address`='$address',`passport`='$passport', status_id='A' WHERE user_id='$user_id'")or die ("cannot update user_tab");
							$response['response']=109; 
							$response['result']=true; 
							$response['message1']="PROFILE UPDATED SUCCESSFUL!"; 
							$response['user_id']=$user_id; 
						} ///end if 5
						
					} ///end if 3
						
				}else{ ///else 2
					$response['response']=110; 
					$response['result']=false;
				//	$response['message']="ERROR: $email is NOT an email address"; 
					$response['message1']="EMAIL ERROR!"; 
					$response['message2']="Check EMAIL ADDRESS And Try Again";
				} ///end if 2
			
			} ///end if 1
	
	
			echo json_encode($response); 
		break;
		
	


		case 'fetch_order_history_api':
			$user_id=trim(($_POST['user_id']));
		
			if($user_id==''){ ///start if 1
				$response['response']=111; 
				$response['result']=false;
				$response['message1']="Fetch Error!"; 
				$response['message2']="Invalid User ID"; 
			}else{ ///else 1	
				/////////////////////////////////////////////////////////////////////////
				// $select_query= "SELECT a.date, a.order_id, a.nums_of_items,  
				// b.total_amount, c.logistic_name, d.status_name, e.fund_method_name, g.status_name as payment_status
				// FROM order_summary_tab a, payment_tab b, setup_logistics_tab c, setup_status_tab d, setup_status_tab g, setup_fund_method_tab e
				// WHERE b.fund_method_id=e.fund_method_id AND b.logistic_id=c.logistic_id 
				// AND a.order_id=b.order_id AND a.status_id=d.status_id AND b.status_id=g.status_id AND b.status_id IN('P','SUC','CCL') AND
				// a.user_id ='$user_id' AND a.status_id IN ('P','PP','PR','RD','DL')ORDER BY a.date DESC LIMIT 5;";
				

				$view_report=trim($_POST['view_report']);
				$response['view_report']=$view_report; 
					
					if ($view_report=='view_today_search'){//////////////////////////
			
						/// get presentation values
						$day30= date('F d Y', strtotime('today - 30 days'));
						$today= date('F d Y');	
							 	
						/// get chat values
						$db_day30= date('Y-m-d', strtotime('today - 30 days'));
						$db_today= date('Y-m-d');
					
					}elseif ($view_report=='view_thisweek_search'){/////////////////////
						/// get presentation values
						$day30= date('F d Y', strtotime('sunday - 1 week'));
						$today= date('F d Y');	

						/// get chat values
						$db_day30= date('Y-m-d', strtotime('sunday - 1 week'));
						$db_today= date('Y-m-d');
					
					}elseif ($view_report=='view_7days_search'){///////////////////////////////
						/// get presentation values
						$day30= date('F d Y', strtotime('today - 7 days'));
						$today= date('F d Y');	

						/// get chat values
						$db_day30= date('Y-m-d', strtotime('today - 7 days'));
						$db_today= date('Y-m-d');
					
					}elseif ($view_report=='view_thismonth_search'){/////////////////////////////
						/// get presentation values
						$day30= date('F 01 Y', strtotime('this month'));
						$today= date('F d Y');	

						/// get chat values
						$db_day30= date('Y-m-01', strtotime('this month'));
						$db_today= date('Y-m-d');
					
					}elseif ($view_report=='view_30days_search'){/////////////////////////////
						/// get presentation values
						$day30= date('F d Y', strtotime('today - 30 days'));
						$today= date('F d Y');	

						/// get chat values
						$db_day30= date('Y-m-d', strtotime('today - 30 days'));
						$db_today= date('Y-m-d');
					
					}elseif ($view_report=='view_90days_search'){////////////////////////
						/// get presentation values
						$day30= date('F d Y', strtotime('today - 90 days'));
						$today= date('F d Y');	

						/// get chat values
						$db_day30= date('Y-m-d', strtotime('today - 90 days'));
						$db_today= date('Y-m-d');
					
					}elseif ($view_report=='view_thisyear_search'){/////////////////////////////////
						/// get presentation values
						$day30= date('F d Y', strtotime('first day of january this year'));
						$today= date('F d Y');	

						/// get chat values
						$db_day30= date('Y-m-d', strtotime('first day of january this year'));
						$db_today= date('Y-m-d');
					
					}elseif ($view_report=='view_1year_search'){/////////////////////////////
						/// get presentation values
						$day30= date('F d Y', strtotime('today - 365 days'));
						$today= date('F d Y');	

						/// get chat values
						$db_day30= date('Y-m-d', strtotime('today - 365 days'));
						$db_today= date('Y-m-d');
					
					}elseif ($view_report=='custom_search'){/////////////////////////////
					
						$datefrom=$_POST['datefrom'];
						$dateto=$_POST['dateto'];
						
						$day30= date('F d Y', strtotime($datefrom));
						$today= date('F d Y', strtotime($dateto));	

						/// get chat values
						$db_day30= date('Y-m-d', strtotime($datefrom));
						$db_today= date('Y-m-d', strtotime($dateto));
					
					}else{

					}
				$select_query="SELECT a.date, a.order_id, a.nums_of_items,  
				b.total_amount, c.logistic_name, d.status_name, e.fund_method_name, g.status_name as payment_status
				FROM order_summary_tab a, payment_tab b, setup_logistics_tab c, setup_status_tab d, setup_status_tab g, setup_fund_method_tab e
				WHERE b.fund_method_id=e.fund_method_id AND b.logistic_id=c.logistic_id 
				AND a.order_id=b.order_id AND a.status_id=d.status_id AND b.status_id=g.status_id AND b.status_id IN('P','SUC','CCL') AND
				a.user_id ='$user_id' AND a.status_id IN ('P','PP','PR','RD','DL') ORDER BY date DESC";
				
				//AND (date('2023-09-02')) AND (date('2023-08-26')) 
				
				/////////////////////////////////////////////////////////////////////////
				
				$query=mysqli_query($conn, $select_query);
				$check_row=mysqli_num_rows($query);

				if ($check_row>0){ ///start if 2
					$response['response']=112; 
					$response['result']=true;
						while($fetch_query=mysqli_fetch_all($query, MYSQLI_ASSOC)){
						$response['data']=$fetch_query;
						}
				}else{ ///else 2
					$response['response']=113;
					$response['result']=false;
					$response['message1']="No Record Found!"; 
				}// End if 2

						
				} ///end if 1
			
			echo json_encode($response); 
		break;
		






		
		case 'fetch_wallet_history_api':
			$user_id=trim(($_POST['user_id']));
		
			if($user_id==''){ ///start if 1
				$response['response']=114; 
				$response['result']=false;
				$response['message1']="Fetch Error!"; 
				$response['message2']="Invalid User ID"; 
			}else{ ///else 1	
				/////////////////////////////////////////////////////////////////////////
				$select_query= "SELECT a.*, b.transaction_type_name, c.status_name FROM
				 user_wallet_tab a, setup_transaction_type_tab b, setup_status_tab c
				WHERE a.transaction_type_id=b.transaction_type_id AND a.status_id=c.status_id AND 
				a.status_id IN('P','SUC','CCL') AND a.user_id='$user_id'
				ORDER BY a.date DESC LIMIT 10";
				/////////////////////////////////////////////////////////////////////////
				
				$query=mysqli_query($conn, $select_query);
				$check_row=mysqli_num_rows($query);

				if ($check_row>0){ ///start if 2
					$response['response']=115; 
					$response['result']=true;
						while($fetch_query=mysqli_fetch_all($query, MYSQLI_ASSOC)){
						$response['data']=$fetch_query;
						}

						$user_array=$callclass->_get_user_detail($conn, $user_id);
						$user_array = json_decode($user_array, true);
						$user_wallet_balance= $user_array[0]['wallet_balance'];
						$response['user_wallet_balance']=$user_wallet_balance;
				
		
						$wallet_array=$callclass->_get_user_wallet_detail($conn, $user_id);
						$wallet_fetch = json_decode($wallet_array, true);
						$amount_received= $wallet_fetch[0]['amount_received'];
						$amount_withdraw= $wallet_fetch[0]['amount_withdraw'];
		
						$response['amount_received']=$amount_received;
						$response['amount_withdraw']=$amount_withdraw;
				}else{ ///else 2
					$response['response']=116;
					$response['result']=false;
					$response['message1']="No Record Found!"; 
				}// End if 2
	

				} ///end if 1
			
			echo json_encode($response); 
		break;
		






		case 'fetch_each_order_history_api':
			$order_id=trim(($_POST['order_id']));
		
			if($order_id==''){ ///start if 1
				$response['response']=117; 
				$response['result']=false;
				$response['message1']="Fetch Error!"; 
				$response['message2']="Invalid Order ID"; 
			}else{ ///else 1	
				/////////////////////////////////////////////////////////////////////////
				$select_query= "SELECT a.product_id, a.product_qty, a.sub_price, b.product_name, c.product_cat_name, d.selling_price, e.fullname, e.phone
				FROM add_to_cart_backup_tab a, product_tab b, product_categories_tab c, stock_tab d, user_tab e, order_summary_tab f WHERE
				a.product_id=b.product_id AND b.product_cat_id=c.product_cat_id AND a.product_id=d.product_id 
				AND a.order_id=f.order_id AND f.user_id=e.user_id
				 AND a.order_id='$order_id'";
				/////////////////////////////////////////////////////////////////////////
				
				$query=mysqli_query($conn, $select_query);
				$check_row=mysqli_num_rows($query);

				if ($check_row>0){ ///start if 2
					$response['response']=118; 
					$response['result']=true;
						while($fetch_query=mysqli_fetch_all($query, MYSQLI_ASSOC)){
						$response['data']=$fetch_query;
						}
				}else{ ///else 2
					$response['response']=119;
					$response['result']=false;
					$response['message1']="No Record Found!"; 
				}// End if 2

						
				} ///end if 1
			
			echo json_encode($response); 
		break;
		










		case 'order_report_api':
			
				$user_id=trim(($_POST['user_id']));
				$view_report=trim($_POST['view_report']);
				$response['view_report']=$view_report; 
					
					if ($view_report=='view_today_search'){//////////////////////////
			
						/// get presentation values
						$day30= date('F d Y', strtotime('today - 30 days'));
						$today= date('F d Y');	
							 	
						/// get chat values
						$db_day30= date('Y-m-d', strtotime('today - 30 days'));
						$db_today= date('Y-m-d');
					
					}elseif ($view_report=='view_thisweek_search'){/////////////////////
						/// get presentation values
						$day30= date('F d Y', strtotime('sunday - 1 week'));
						$today= date('F d Y');	

						/// get chat values
						$db_day30= date('Y-m-d', strtotime('sunday - 1 week'));
						$db_today= date('Y-m-d');
					
					}elseif ($view_report=='view_7days_search'){///////////////////////////////
						/// get presentation values
						$day30= date('F d Y', strtotime('today - 7 days'));
						$today= date('F d Y');	

						/// get chat values
						$db_day30= date('Y-m-d', strtotime('today - 7 days'));
						$db_today= date('Y-m-d');
					
					}elseif ($view_report=='view_thismonth_search'){/////////////////////////////
						/// get presentation values
						$day30= date('F 01 Y', strtotime('this month'));
						$today= date('F d Y');	

						/// get chat values
						$db_day30= date('Y-m-01', strtotime('this month'));
						$db_today= date('Y-m-d');
					
					}elseif ($view_report=='view_30days_search'){/////////////////////////////
						/// get presentation values
						$day30= date('F d Y', strtotime('today - 30 days'));
						$today= date('F d Y');	

						/// get chat values
						$db_day30= date('Y-m-d', strtotime('today - 30 days'));
						$db_today= date('Y-m-d');
					
					}elseif ($view_report=='view_90days_search'){////////////////////////
						/// get presentation values
						$day30= date('F d Y', strtotime('today - 90 days'));
						$today= date('F d Y');	

						/// get chat values
						$db_day30= date('Y-m-d', strtotime('today - 90 days'));
						$db_today= date('Y-m-d');
					
					}elseif ($view_report=='view_thisyear_search'){/////////////////////////////////
						/// get presentation values
						$day30= date('F d Y', strtotime('first day of january this year'));
						$today= date('F d Y');	

						/// get chat values
						$db_day30= date('Y-m-d', strtotime('first day of january this year'));
						$db_today= date('Y-m-d');
					
					}elseif ($view_report=='view_1year_search'){/////////////////////////////
						/// get presentation values
						$day30= date('F d Y', strtotime('today - 365 days'));
						$today= date('F d Y');	

						/// get chat values
						$db_day30= date('Y-m-d', strtotime('today - 365 days'));
						$db_today= date('Y-m-d');
					
					}elseif ($view_report=='custom_search'){/////////////////////////////
					
						$datefrom=$_POST['datefrom'];
						$dateto=$_POST['dateto'];
						
						$day30= date('F d Y', strtotime($datefrom));
						$today= date('F d Y', strtotime($dateto));	

						/// get chat values
						$db_day30= date('Y-m-d', strtotime($datefrom));
						$db_today= date('Y-m-d', strtotime($dateto));
					
					}else{

					}

				
					/// get presentation values
					// $day30= date('F d Y', strtotime('today - 30 days'));
					// $today= date('F d Y');			
					// /// get chat values
					// $db_day30= date('Y-m-d', strtotime('today - 30 days'));
					// $db_today= date('Y-m-d');
				/////////////////////////////////////////////////////////////////////////
				// $select_query= "SELECT a.date, a.order_id, a.nums_of_items,  
				// b.total_amount, c.logistic_name, d.status_name, e.fund_method_name, g.status_name as payment_status
				// FROM order_summary_tab a, payment_tab b, setup_logistics_tab c, setup_status_tab d, setup_status_tab g, setup_fund_method_tab e
				// WHERE b.fund_method_id=e.fund_method_id AND b.logistic_id=c.logistic_id 
				// AND a.order_id=b.order_id AND a.status_id=d.status_id AND b.status_id=g.status_id AND b.status_id IN('P','SUC','CCL') AND
				// a.user_id ='$user_id' AND a.status_id IN ('P','PP','PR','RD','DL')ORDER BY a.date DESC LIMIT 5;";
				/////////////////////////////////////////////////////////////////////////
			
				$select_query="SELECT a.date, a.order_id, a.nums_of_items,  
				b.total_amount, c.logistic_name, d.status_name, e.fund_method_name, g.status_name as payment_status
				FROM order_summary_tab a, payment_tab b, setup_logistics_tab c, setup_status_tab d, setup_status_tab g, setup_fund_method_tab e
				WHERE b.fund_method_id=e.fund_method_id AND b.logistic_id=c.logistic_id 
				AND a.order_id=b.order_id AND a.status_id=d.status_id AND b.status_id=g.status_id AND b.status_id IN('P','SUC','CCL') AND
				a.user_id ='BM20220605070858001' AND a.status_id IN ('P','PP','PR','RD','DL') AND (date('2023-09-02')) AND (date('2023-08-26')) ORDER BY date DESC LIMIT 5;";
				




				$query=mysqli_query($conn, $select_query);
				$check_row=mysqli_num_rows($query);

				if ($check_row>0){ ///start if 2
					$response['response']=120; 
					$response['result']=true;
						while($fetch_query=mysqli_fetch_all($query, MYSQLI_ASSOC)){
							$response['data']=$fetch_query;
						}
				}else{ ///else 2
					$response['response']=121;
					$response['result']=false;
					$response['message1']="No Record Found!"; 
				}// End if 2

		

			
	
		
			echo json_encode($response);  
		break;












		case 'add_or_update_blog_api':

			$staff_id=trim(strtoupper($_POST['staff_id']));
			$fullname=trim(strtoupper($_POST['fullname']));
			$mobile=trim($_POST['mobile']);
			$country_id=trim($_POST['country_id']);
			$email=trim($_POST['email']);
			$address=trim(strtoupper($_POST['address']));	
			$position_id=trim($_POST['position_id']);
			// staff passport value
			// $passport_value = $_POST['passport'];
			// $passport=$_FILES['passport']['name'];
			$passport='friends.png';
			$role_id=trim($_POST['role_id']);
			$status_id=trim($_POST['status_id']);
			
			if(($fullname=='')||($mobile=='')||($country_id=='')||($email=='')||($address=='')||($position_id=='')||($role_id=='')||($status_id=='')){ ///start if 1
				$response['response']=502; 
				$response['result']=False;
				$response['message1']="ERROR!"; 
				$response['message2']="Fill all fields to continue."; 
			}else{ ///else 1
				if(filter_var($email, FILTER_VALIDATE_EMAIL)){ ///start if 2
					
					if($staff_id==''){ ///start if 3
						$usercheck=mysqli_query($conn,"SELECT * FROM staff_tab WHERE email='$email'");
						$useremail=mysqli_num_rows($usercheck);
						if ($useremail>0){ ///start if 4
							$response['response']=503; 
							$response['result']=False;
							$response['message1']="EMAIL ERROR!"; 
							$response['message2']="Email already been used.";
						}else{ ///else 4
							///////////////////////geting sequence//////////////////////////
							$counter_id=1;
							$sequence=$callclass->_get_sequence_count($conn, $counter_id);
							$array = json_decode($sequence, true);
							$no= $array[0]['no'];
							
							/// generate staff_id and password 
							$staff_id='STF'.$no.date("Ymdhis");
							$password=md5($staff_id);	
							/// register staff
							mysqli_query($conn,"INSERT INTO `staff_tab`
							(`staff_id`, `fullname`, `mobile`, `country_id`, `email`,`address`,`position_id`, `role_id`, `status_id`, `password`, `passport`, `create_time`) VALUES
							('$staff_id', '$fullname', '$mobile','$country_id', '$email','$address','$position_id', '$role_id', '$status_id', '$password','$passport', NOW())")or die (mysqli_error($conn));
							
							$response['response']=504; 
							$response['result']=true;
							$response['message1']="SUCCESS!"; 
							$response['message2']="Staff Registration Successful.";
							//$response['staff_id']=$staff_id; 
						} ///end if 4
					}else{ ///else 3
						$usercheck=mysqli_query($conn,"SELECT * FROM staff_tab WHERE email='$email' AND staff_id!='$staff_id' LIMIT 1");
						$useremail=mysqli_num_rows($usercheck);
						if ($useremail>0){ ///start if 5
							$response['response']=505; 
							$response['result']=false;
							$response['message1']="EMAIL ERROR!"; 
							$response['message2']="Email already been used.";
						}else{ ///else 5
							mysqli_query($conn,"UPDATE staff_tab SET fullname='$fullname',mobile='$mobile',country_id='$country_id', `address`='$address',position_id='$position_id',email='$email', status_id='$status_id', role_id='$role_id' WHERE staff_id='$staff_id'")or die ("cannot update staff_tab");
							$response['response']=506; 
							$response['result']=true;
							$response['message1']="SUCCESS!"; 
							$response['message2']="Staff Updated Successful.";
							$response['staff_id']=$staff_id; 
						} ///end if 5
						
					} ///end if 3
						
				}else{ ///else 2
					$response['response']=507; 
					$response['result']=false;
				//	$response['message']="ERROR: $email is NOT an email address"; 
					$response['message1']="EMAIL ERROR!"; 
					$response['message2']="Not an email address";
				} ///end if 2
			
			} ///end if 1
	
	
			echo json_encode($response); 
		break;
		

}
?>









