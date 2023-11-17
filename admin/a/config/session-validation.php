<?php
	if(empty($suserid)){
		session_destroy();
?>
		<script>
        window.parent(location="<?php echo $website?>/admin/");
        </script>
<?php 
		exit;
}else{
	$userquery=mysqli_query($conn,"SELECT * FROM staff_tab WHERE user_id='$suserid' AND status_id='A'");
	$user_sel=mysqli_fetch_array($userquery);
		$user_id=$user_sel['user_id'];
		$user_array=$callclass->_get_staff_detail($conn, $user_id);
		$u_array = json_decode($user_array, true);
		$user_id=$u_array[0]['user_id'];
		$user_name= $u_array[0]['fullname'];
		$user_mobile= $u_array[0]['mobile'];
		$user_email= $u_array[0]['email'];
		$user_passport= $u_array[0]['passport'];
		$user_otp= $u_array[0]['otp'];
		$user_role_id= $u_array[0]['role_id'];
		$user_status_id= $u_array[0]['status_id'];
		$user_reg_date= $u_array[0]['reg_date'];
		$user_last_login= $u_array[0]['last_login'];
		
			$fetch_role=$callclass->_get_setup_role_detail($conn, $user_role_id);
			$array = json_decode($fetch_role, true);
			$user_role_name= $array[0]['role_name'];
			
			$fetch_status=$callclass->_get_setup_status_detail($conn, $user_status_id);
			$array = json_decode($fetch_status, true);
			$user_status_name= $array[0]['status_name'];
}?>

<?php
	if(empty($user_id)){
		session_destroy();
?>
		<script>
        window.parent(location="<?php echo $website?>/admin/");
        </script>
<?php }?>