<?php
	  $user_array=$callclass->_get_user_detail($conn, $s_customer_id);
	  $user_array = json_decode($user_array, true);
	  $customer_id= $user_array[0]['user_id'];
	  $user_wallet_balance= $user_array[0]['wallet_balance'];
	  $user_fullname= $user_array[0]['fullname'];
	  $user_phone= $user_array[0]['phone'];
	  $user_email= $user_array[0]['email'];
	  $user_address= $user_array[0]['address'];
	  $user_passport= $user_array[0]['passport'];
	  $user_status_id= $user_array[0]['status_id'];
		$fetch_status=$callclass->_get_setup_status_detail($conn, $user_status_id);
		$array = json_decode($fetch_status, true);
		$user_status_name= $array[0]['status_name'];
	  $user_last_login_date= $user_array[0]['last_login_date'];

				  $wallet_array=$callclass->_get_user_wallet_detail($conn, $s_customer_id);
				  $wallet_fetch = json_decode($wallet_array, true);
				  $amount_received= $wallet_fetch[0]['amount_received'];
				  $amount_withdraw= $wallet_fetch[0]['amount_withdraw'];
?>
<?php if ($page!='cart.php'){?>
<?php if ($customer_id==''){?>
		<script>
		window.parent(location="<?php echo $website;?>/account/");
		</script>
<?php }?>
<?php }?>