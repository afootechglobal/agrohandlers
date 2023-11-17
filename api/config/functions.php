<?php
class allClass{
/////////////////////////////////////////


function _get_sequence_count($conn, $item){
	$count=mysqli_fetch_array(mysqli_query($conn,"SELECT mast_val FROM setup_masters_tab WHERE mast_id = '$item' FOR UPDATE"));
	 $num=$count[0]+1;
	 mysqli_query($conn,"UPDATE `setup_masters_tab` SET `mast_val` = '$num' WHERE mast_id = '$item'")or die (mysqli_error($conn));
	 if ($num<10){$no='00'.$num;}elseif($num>=10 && $num<100){$no='0'.$num;}else{$no=$num;}
	 return '[{"num":"'.$num.'","no":"'.$no.'"}]';
}

	


/////////////////////////////////////////
function _get_user_detail($conn, $user_id){
	$query=mysqli_query($conn,"SELECT * FROM user_tab WHERE user_id='$user_id'")or die (mysqli_error($conn));
	$fetch=mysqli_fetch_array($query);
			$user_id=$fetch['user_id'];
			$wallet_balance=$fetch['wallet_balance'];
			$wallet_balance=number_format($wallet_balance,2);
			$fullname=$fetch['fullname'];
			$phone=$fetch['phone'];
			$email=$fetch['email'];
			$address=$fetch['address'];
			$passport=$fetch['passport'];
			if ($passport==''){
				$passport='friends.png';
			}
			$otp=$fetch['otp'];
			$status_id=$fetch['status_id'];
			$last_login_date=$fetch['last_login_date'];
	return '[{"user_id":"'.$user_id.'","wallet_balance":"'.$wallet_balance.'","fullname":"'.$fullname.'","phone":"'.$phone.'","email":"'.$email.'","address":"'.$address.'","passport":"'.$passport.'","otp":"'.$otp.'", "status_id":"'.$status_id.'", "last_login_date":"'.$last_login_date.'"}]';
}	




function _get_order_summary_detail($conn, $order_id){
	$query=mysqli_query($conn,"SELECT * FROM order_summary_tab WHERE order_id='$order_id'")or die ('cannot select order_summary_tab');
	$fetch=mysqli_fetch_array($query);
		$user_id=$fetch['user_id'];
		$nums_of_items=$fetch['nums_of_items'];
		$total_amount=$fetch['total_amount'];
		$logistic_id=$fetch['logistic_id'];
		$address=$fetch['address'];
		$delivery_date=$fetch['delivery_date'];
		$delivery_time_id=$fetch['delivery_time_id'];
		$delivery_otp=$fetch['delivery_otp'];
		$status_id=$fetch['status_id'];
		$staff_id=$fetch['staff_id'];
		$delivery_staff_id=$fetch['delivery_staff_id'];
		$date=$fetch['date'];
	return '[{"user_id":"'.$user_id.'","nums_of_items":"'.$nums_of_items.'","total_amount":"'.$total_amount.'","logistic_id":"'.$logistic_id.'",
	"address":"'.$address.'","delivery_date":"'.$delivery_date.'","delivery_time_id":"'.$delivery_time_id.'","delivery_otp":"'.$delivery_otp.'","status_id":"'.$status_id.'",
	"staff_id":"'.$staff_id.'","delivery_staff_id":"'.$delivery_staff_id.'","date":"'.$date.'"}]';
}





function _get_setup_logistics_details($conn, $logistic_id){
	$query=mysqli_query($conn,"SELECT * FROM setup_logistics_tab WHERE logistic_id='$logistic_id'")or die (mysqli_error($conn));
	$fetch=mysqli_fetch_array($query);
		$logistic_name=$fetch['logistic_name'];
	return '[{"logistic_name":"'.$logistic_name.'"}]';
}



function _get_setup_fund_method_detail($conn, $fund_method_id){
	$query=mysqli_query($conn,"SELECT * FROM setup_fund_method_tab WHERE fund_method_id='$fund_method_id'")or die (mysqli_error($conn));
	$fetch=mysqli_fetch_array($query);
		$fund_method_name=$fetch['fund_method_name'];
	return '[{"fund_method_name":"'.$fund_method_name.'"}]';
}


function _get_user_wallet_detail($conn, $user_id){
	/////// credit 
	$query=mysqli_query($conn,"SELECT  COALESCE (SUM(amount),0) AS amount_received  FROM user_wallet_tab WHERE user_id='$user_id' AND transaction_type_id='CR' AND status_id='SUC'")or die (mysqli_error($conn));
	$fetch=mysqli_fetch_array($query);
		$amount_received=$fetch['amount_received'];
		$amount_received=number_format($amount_received,2);
	/////// debit 
	$query=mysqli_query($conn,"SELECT  COALESCE (SUM(amount),0) AS amount_withdraw  FROM user_wallet_tab WHERE user_id='$user_id' AND transaction_type_id='DB'  AND status_id='SUC'")or die (mysqli_error($conn));
	$fetch=mysqli_fetch_array($query);
		$amount_withdraw=$fetch['amount_withdraw'];
		$amount_withdraw=number_format($amount_withdraw,2);

	return '[{"amount_received":"'.$amount_received.'","amount_withdraw":"'.$amount_withdraw.'"}]';
}	


function _get_product_cat_detail($conn, $product_cat_id){
	$query=mysqli_query($conn,"SELECT * FROM product_categories_tab WHERE product_cat_id='$product_cat_id'")or die ('cannot select product_categories_tab');
	$fetch=mysqli_fetch_array($query);
		$product_cat_name=$fetch['product_cat_name'];
		$status_id=$fetch['status_id'];
		$date=$fetch['date'];
	return '[{"product_cat_name":"'.$product_cat_name.'","status_id":"'.$status_id.'","date":"'.$date.'"}]';
}


function _get_product_detail($conn, $product_id){
	$query=mysqli_query($conn,"SELECT * FROM product_tab WHERE product_id='$product_id'")or die ('cannot select product_tab');
	$fetch=mysqli_fetch_array($query);
		$product_cat_id=$fetch['product_cat_id'];
		$product_name=$fetch['product_name'];
		$status_id=$fetch['status_id'];
		$date=$fetch['date'];
	return '[{"product_cat_id":"'.$product_cat_id.'","product_name":"'.$product_name.'","status_id":"'.$status_id.'","date":"'.$date.'"}]';
}



function _get_stock_detail($conn, $product_id){
	$query=mysqli_query($conn,"SELECT * FROM stock_tab WHERE product_id='$product_id'")or die ('cannot select product_tab');
	$fetch=mysqli_fetch_array($query);
		$purchase_price=$fetch['purchase_price'];
		$selling_price=$fetch['selling_price'];
		$profit=$fetch['profit'];
		$available_qty=$fetch['available_qty'];
		$outstanding_qty=$fetch['outstanding_qty'];
	return '[{"purchase_price":"'.$purchase_price.'","selling_price":"'.$selling_price.'","profit":"'.$profit.'","available_qty":"'.$available_qty.'","outstanding_qty":"'.$outstanding_qty.'"}]';
}


/////////////////////////////////////////
function _get_blog_detail($conn, $blog_id){
	$query=mysqli_query($conn,"SELECT * FROM blog_tab WHERE blog_id='$blog_id'")or die (mysqli_error($conn));
	$fetch=mysqli_fetch_array($query);
		$blog_id=$fetch['blog_id'];
		$blog_cat_id=$fetch['cat_id'];
		$blog_status_id=$fetch['status_id'];
		$blog_pix=$fetch['thumbnail'];
		$user_id=$fetch['user_id'];
		$blog_views=$fetch['views'];
		$blog_date_of_reg=$fetch['date_of_reg'];
		$blog_last_updated=$fetch['last_updated'];
		if ($blog_pix==''){
			$blog_pix='blog.jpg';
		}
	return '[{"blog_id":"'.$blog_id.'","blog_cat_id":"'.$blog_cat_id.'","blog_status_id":"'.$blog_status_id.'","blog_pix":"'.$blog_pix.'","user_id":"'.$user_id.'","blog_views":"'.$blog_views.'","blog_date_of_reg":"'.$blog_date_of_reg.'","blog_last_updated":"'.$blog_last_updated.'"}]';
}	



}//end of class
$callclass=new allClass();
?>