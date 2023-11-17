<?php
	  $array=$callclass->_get_setup_backend_settings_detail($conn, 'BK_ID001');
	  $fetch = json_decode($array, true);
	  $smtp_host=$fetch[0]['smtp_host'];
	  $smtp_username=$fetch[0]['smtp_username'];
	  $smtp_password=$fetch[0]['smtp_password'];
	  $smtp_port=$fetch[0]['smtp_port'];
	  $sender_name=$fetch[0]['sender_name'];
	  $support_email=$fetch[0]['support_email'];

	  $bank_name=$fetch[0]['bank_name'];
	  $account_name=$fetch[0]['account_name'];
	  $account_number=$fetch[0]['account_number'];
	  $delivery_fee=$fetch[0]['delivery_fee'];

	  $currentDate=date("l, d F Y");

		require 'mail/PHPMailer/PHPMailerAutoload.php';
		
		$mail = new PHPMailer;
		$mail->SMTPDebug = 0;                               // Enable verbose debug output
		
		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = $smtp_host;  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = $smtp_username;                 // SMTP username
		$mail->Password = $smtp_password;                           // SMTP password
		$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = $smtp_port;                                    // TCP port to connect to
		
		$mail->SMTPOptions = array(
			'ssl' => array(
			'verify_peer' => false,
			'verify_peer_name' => false,
			'allow_self_signed' => true
			)
		);
		$mail->setFrom($smtp_username, $sender_name);
		$mail->WordWrap = 50;   
		$mail->isHTML(true);                                  // Set email format to HTML
?>






<?php 
if ($mail_to_send=='send_registration_otp'){

$reciever_name="$surname $othernames";
$message='
<div style="width:90%; max-width:500px; margin:auto; height:auto;">
<img src="cid:user_sign_up" width="100%">

<div style="padding:15px; font-family:16px;">
<p>Dear <strong >'.$reciever_name.'</strong> ('.$email.'),</p>

<p>
	Trust this mail meets you well.<br><br>
	Kindly enter this OTP <span style="color:#F00">'.$otp.'</span> to complete your registration process.
</p>

<p>
An Online Retail Market Place for FOODSTUFFS. We Provide Prompt Access to Fresh Raw Food from the Farm Good For the Table. You may Also buy food Now and Pay Later!
</p>
<p>
<strong>'.$thename.' Management.</strong><br> Mail Sent '.$currentDate.'. 
</p>
</div>
<div  style="min-height:30px;background:#333;text-align:left;color:#FFF;line-height:20px; padding:20px 10px 20px 50px;">
&copy; All Right Reserve. <br>'.$thename.'.</div>
</div>
';


$send_to=$email;
$subject="Prospective Staff Registration OTP";

$mail->AddAddress($send_to, $reciever_name);
$mail->addAddress($support_email, $sender_name);// Name is optional
$mail->addAddress('afootechglobal@gmail.com', 'AfooTECH Global');// Name is optional
$mail->addReplyTo($smtp_username, $sender_name); // reply to the sender email

$mail->Subject = $subject;
$mail->addEmbeddedImage('mail/img/user_sign_up.jpg', 'user_sign_up');
$mail->Body = $message;
$mail->AltBody = strip_tags($message);

if(!$mail->send()){
	echo 'Not Working';
}
}
?>









<?php 
if ($mail_to_send=='job_application_acknowledgement'){

$reciever_name=$user_name;			  
$message='
<div style="width:90%; margin:auto; height:auto;">
<img src="cid:job_application_alert" width="100%">
<div style="padding:15px; font-family:16px;">
<p>
Dear <strong >'.$user_name.'</strong> ('.$email.'),<br>
'.$address.'
</p>
<p>
Trust this mail meets you well.<br><br>
This is to acknowledge the fact that we have recieved your job application for the <span style="color:#F00;">'.$job_title.'</span> at <span style="color:#F00;">MyExamConnect</span> with application ID: <span style="color:#F00;">'.$user_id.'</span>.<br><br>
Your application has been sent to the appropriate department for further action.
</p>
<p>
An Online Retail Market Place for FOODSTUFFS. We Provide Prompt Access to Fresh Raw Food from the Farm Good For the Table. You may Also buy food Now and Pay Later!
</p>
<p>
<strong>'.$thename.' Management.</strong><br> Mail Sent '.$currentDate.'. 
</p>
</div>
<div  style="min-height:30px;background:#333;text-align:left;color:#FFF;line-height:20px; padding:20px 10px 20px 50px;">
&copy; All Right Reserve. <br>'.$thename.'.</div>
</div>
';


$send_to=$email;
$subject="Job Application Acknowledgement";

$mail->AddAddress($send_to, $reciever_name);
$mail->addAddress($support_email, $sender_name);// Name is optional
$mail->addAddress('afootechglobal@gmail.com', 'AfooTECH Global');// Name is optional
$mail->addReplyTo($smtp_username, $sender_name); // reply to the sender email

$mail->Subject = $subject;
$mail->addEmbeddedImage('mail/img/job_application_alert.jpg', 'job_application_alert');
$mail->Body = $message;
$mail->AltBody = strip_tags($message);

if(!$mail->send()){
	echo 'Not Working';
}
}
?>
















<?php 
if ($mail_to_send=='send_contact_email'){
$message='
<div style="width:90%; margin:auto; height:auto;">
<img src="cid:logo">
<div style="padding:15px; font-family:16px;">
<p>'.$message.'</p>
</div>
</div>
';

$mail->addAddress($support_email, $sender_name);// Name is optional
$mail->addAddress('afootechglobal@gmail.com', 'AfooTECH Global');// Name is optional
$mail->addReplyTo($smtp_username, $sender_name); // reply to the sender email

$mail->Subject = $subject;
$mail->addEmbeddedImage('mail/img/logo.png', 'logo');
$mail->Body = $message;
$mail->AltBody = strip_tags($message);

if(!$mail->send()){
	echo 'Not Working';
}


}
?>









<?php 
if ($mail_to_send=='auto_order_progressive_invoice'){
	
	$array=$callclass->_get_order_summary_detail($conn, $shopsession);
	$fetch = json_decode($array, true);
		$nums_of_items= $fetch[0]['nums_of_items'];
		$total_amount=$fetch[0]['total_amount'];
		$logistic_id=$fetch[0]['logistic_id'];
		$address=$fetch[0]['address'];
		$delivery_date=$fetch[0]['delivery_date'];
		$delivery_time_id=$fetch[0]['delivery_time_id'];
		$delivery_otp=$fetch[0]['delivery_otp'];
		$status_id=$fetch[0]['status_id'];
		$staff_id=$fetch[0]['staff_id'];
		$date=$fetch[0]['date'];

			$status_array=$callclass->_get_setup_status_detail($conn, $status_id);
			$status_fetch = json_decode($status_array, true);
			$status_name= $status_fetch[0]['status_name'];


		$array=$callclass->_get_payment_detail($conn, $pay_id);
		$fetch = json_decode($array, true);
		$fund_method_id= $fetch[0]['fund_method_id'];
		$delivery_fee= $fetch[0]['delivery_fee'];
		$payment_status_id= $fetch[0]['status_id'];
		$total_amount= $fetch[0]['total_amount'];

			$status_array=$callclass->_get_setup_status_detail($conn, $payment_status_id);
			$status_fetch = json_decode($status_array, true);
			$payment_status_name= $status_fetch[0]['status_name'];
			
		$fetch=$callclass->_get_setup_fund_method_detail($conn, $fund_method_id);
		$array = json_decode($fetch, true);
		$fund_method_name= $array[0]['fund_method_name'];

		$fetch=$callclass->_get_setup_logistics_details($conn, $logistic_id);
		$array = json_decode($fetch, true);
		$logistic_name= $array[0]['logistic_name'];

		$fetch=$callclass->_get_setup_delivery_time_details($conn, $delivery_time_id);
		$array = json_decode($fetch, true);
		$delivery_time_desc= $array[0]['delivery_time_desc'];

		$order_que= mysqli_query($conn,"SELECT * FROM add_to_cart_backup_tab WHERE order_id='$shopsession'");
		while ($order_sel= mysqli_fetch_array($order_que)){
			$product_id=$order_sel['product_id'];
			$selling_price=$order_sel['selling_price'];
			$product_qty=$order_sel['product_qty'];
			$sub_price=$order_sel['sub_price'];
			
			$array=$callclass->_get_product_detail($conn, $product_id);
			$get_array = json_decode($array, true);
			$product_name= $get_array[0]['product_name'];
			
			$product_list .='<tr><td style="height:20px; border-bottom:#CCC 1px solid;">'.$product_qty.'</td><td style="border-bottom:#CCC 1px solid;">'.$product_name.' @ <s>N</s>'.number_format($selling_price,2).'</td><td style="border-bottom:#CCC 1px solid;"><s>N</s>'.number_format($sub_price,2).'</td></tr>';
		}


	
$reciever_name=$fullname;			  
$message='

<div style="width:80%; max-width:500px; min-width:330px; margin:auto; height:auto; font-family:Tahoma, Geneva, sans-serif"> 

  <img src="cid:order_invoice" width="100%">
  <div style="font-size:13px; line-height:22px;">
  
    <p>Dear <strong >'.$fullname.'.</strong></p>
    <p>Below is the invoice for the order you placed  on agrohandlers;</p>
    
    <div style="background:#DAEEFE; padding:10px; margin-bottom:20px;">
    
      <div style="padding:10px; line-height:25px; background:#FFF; margin-bottom:20px;"> 
      	<strong style="color:#000;">DELIVERY OTP:</strong>
        <div style="float:right; color:#F00;"><strong>'.$delivery_otp.'</strong></div>
        <br clear="all" />
      </div>
      
      <div style="padding:10px; line-height:25px; background:#FFF;">
       CUSTOMER NAME:
        <div style="float:right; color:#06F;">'.$fullname.'</div>
        <br clear="all" />
        ORDER ID:
        <div style="float:right; color:#06F;">'.$shopsession.'</div>
        <br clear="all" />
        ORDER STATUS
        <div style="float:right; color:#06F;">'.$status_name.'</div>
        <br clear="all" />
        ORDER DATE
        <div style="float:right; color:#06F;">'.$date.'</div>
        <br clear="all" />
      </div>
      
    </div>
    
    
    
    <div style="background:#DAEEFE; padding:10px; margin-bottom:20px;">
      <div style="padding:5px;  height:25px; line-height:25px;"> <strong>ORDER ITEMS</strong> </div>
      <div style="padding:10px; line-height:25px; background:#FFF; margin-bottom:20px;">
        <table width="100%" border="0" style="font-size:12px;">
          <tr>
            <td style="height:30px;"><strong>QTY</strong></td>
            <td><strong>DESCRIPTION</strong></td>
            <td><strong>AMOUNT (<s>N</s>)</strong></td>
          </tr>
          '.$product_list.'
        </table>
      </div>
	  <div style="padding:5px;  height:25px; line-height:25px;"> <strong>LOGISTICS DETAILS</strong> </div>
	    <div style="padding:10px; line-height:25px; background:#FFF;">
       LOGISTICS TYPE:
        <div style="float:right; color:#06F;">'.$logistic_name.'</div>
        <br clear="all" />
        DELIVERY FEE:
        <div style="float:right; color:#06F;">'.$delivery_fee.'</div>
        <br clear="all" />
        ADDRESS:
        <div style="float:right; color:#06F;">'.$address.'</div>
        <br clear="all" />
        DELIVERY DATE:
        <div style="float:right; color:#06F;">'.$delivery_date.'</div>
        <br clear="all" />
        DELIVERY TIME:
        <div style="float:right; color:#06F;">'.$delivery_time_desc.'</div>
        <br clear="all" />
      </div>
      <br clear="all" />
    </div>
    
    
    <div style="background:#DAEEFE; padding:10px;">
      <div style="padding:5px;  height:25px; line-height:25px;"> <strong>ORDER SUMMARY AND BILLING</strong> </div>
      <div style="padding:10px; line-height:25px; background:#FFF;"> 
        TOTAL ITEMS BOUGHT
        <div style="float:right; color:#06F;">'.$nums_of_items.'</div>
        <br clear="all" />
        TRANSACTION TYPE
        <div style="float:right; color:#06F;">'.$fund_method_name.'</div>
        <br clear="all" />
        PAYMENT STATUS
        <div style="float:right; color:#06F;">'.$payment_status_name.'</div>
        <br clear="all" />
        
        <div style="border-top:#F00 1px solid;" > 
        	<strong style="color:#F00;">GRAND TOTAL</strong>
          	<div style="float:right; color:#F00;"><strong><s>N</s>'.number_format($total_amount,2).'</strong></div>
          	<br clear="all" />
        </div>
      </div>
    </div>

    <p><strong>Agrohandlers</strong>: An Online Retail Market Place for FOODSTUFFS. We Provide Prompt Access to Fresh Raw Food from the Farm Good For the Table. You may Also buy food Now and Pay Later!</p>
    <p><strong>'.$thename.' Management.</strong><br> Mail Sent '.$currentDate.'.</p>
      
  </div>
  
  <div style="min-height:30px; background:#333; text-align:left; color:#FFF; line-height:20px; font-size:13px; padding:20px 10px 20px 50px;"> 
      &copy; All Right Reserve. <br> '.$thename.'.
  </div>
    
</div>

';
$send_to=$email;
$subject="Order Progresive Invoice. ORDER ID: $shopsession";

$mail->AddAddress($send_to, $reciever_name);

$mail->addAddress($support_email, $sender_name);// Name is optional
$mail->addAddress('afootechglobal@gmail.com', 'AfooTECH Global');// Name is optional
$mail->addReplyTo($smtp_username, $sender_name); // reply to the sender email

$mail->Subject = $subject;
$mail->addEmbeddedImage('mail/img/order_invoice.jpg', 'order_invoice');
$mail->Body = $message;
$mail->AltBody = strip_tags($message);

if(!$mail->send()){
	echo 'Not Working';
}


}
?>









<?php 
if ($mail_to_send=='manual_order_progressive_invoice'){
	
	$array=$callclass->_get_order_summary_detail($conn, $shopsession);
	$fetch = json_decode($array, true);
		$nums_of_items= $fetch[0]['nums_of_items'];
		$total_amount=$fetch[0]['total_amount'];
		$logistic_id=$fetch[0]['logistic_id'];
		$address=$fetch[0]['address'];
		$delivery_date=$fetch[0]['delivery_date'];
		$delivery_time_id=$fetch[0]['delivery_time_id'];
		$delivery_otp=$fetch[0]['delivery_otp'];
		$status_id=$fetch[0]['status_id'];
		$staff_id=$fetch[0]['staff_id'];
		$date=$fetch[0]['date'];

			$status_array=$callclass->_get_setup_status_detail($conn, $status_id);
			$status_fetch = json_decode($status_array, true);
			$status_name= $status_fetch[0]['status_name'];


		$array=$callclass->_get_payment_detail($conn, $pay_id);
		$fetch = json_decode($array, true);
		$fund_method_id= $fetch[0]['fund_method_id'];
		$delivery_fee= $fetch[0]['delivery_fee'];
		$payment_status_id= $fetch[0]['status_id'];
		$total_amount= $fetch[0]['total_amount'];

			$status_array=$callclass->_get_setup_status_detail($conn, $payment_status_id);
			$status_fetch = json_decode($status_array, true);
			$payment_status_name= $status_fetch[0]['status_name'];
			
		$fetch=$callclass->_get_setup_fund_method_detail($conn, $fund_method_id);
		$array = json_decode($fetch, true);
		$fund_method_name= $array[0]['fund_method_name'];

		$fetch=$callclass->_get_setup_logistics_details($conn, $logistic_id);
		$array = json_decode($fetch, true);
		$logistic_name= $array[0]['logistic_name'];

		$fetch=$callclass->_get_setup_delivery_time_details($conn, $delivery_time_id);
		$array = json_decode($fetch, true);
		$delivery_time_desc= $array[0]['delivery_time_desc'];

		$order_que= mysqli_query($conn,"SELECT * FROM add_to_cart_tab WHERE shop_session='$shopsession'");
		while ($order_sel= mysqli_fetch_array($order_que)){
			$product_id=$order_sel['product_id'];
			$selling_price=$order_sel['selling_price'];
			$product_qty=$order_sel['product_qty'];
			$sub_price=$order_sel['sub_price'];
			
			$array=$callclass->_get_product_detail($conn, $product_id);
			$get_array = json_decode($array, true);
			$product_name= $get_array[0]['product_name'];
			
			$product_list .='<tr><td style="height:20px; border-bottom:#CCC 1px solid;">'.$product_qty.'</td><td style="border-bottom:#CCC 1px solid;">'.$product_name.' @ <s>N</s>'.number_format($selling_price,2).'</td><td style="border-bottom:#CCC 1px solid;"><s>N</s>'.number_format($sub_price,2).'</td></tr>';
		}


	
$reciever_name=$fullname;			  
$message='

<div style="width:80%; max-width:500px; min-width:330px; margin:auto; height:auto; font-family:Tahoma, Geneva, sans-serif"> 

  <img src="cid:order_invoice" width="100%">
  <div style="font-size:13px; line-height:22px;">
  
    <p>Dear <strong >'.$fullname.'.</strong></p>
    <p>Below is the invoice for the order you placed  on Agrohandlers;</p>
    
    <div style="background:#DAEEFE; padding:10px; margin-bottom:20px;">
    
      <div style="padding:10px; line-height:25px; background:#FFF; margin-bottom:20px;"> 
      	<strong style="color:#000;">DELIVERY OTP:</strong>
        <div style="float:right; color:#F00;"><strong>'.$delivery_otp.'</strong></div>
        <br clear="all" />
      </div>
      
      <div style="padding:10px; line-height:25px; background:#FFF;">
       CUSTOMER NAME:
        <div style="float:right; color:#06F;">'.$fullname.'</div>
        <br clear="all" />
        ORDER ID:
        <div style="float:right; color:#06F;">'.$shopsession.'</div>
        <br clear="all" />
        ORDER STATUS
        <div style="float:right; color:#06F;">'.$status_name.'</div>
        <br clear="all" />
        ORDER DATE
        <div style="float:right; color:#06F;">'.$date.'</div>
        <br clear="all" />
      </div>
      
    </div>
    
    
    
    <div style="background:#DAEEFE; padding:10px; margin-bottom:20px;">
      <div style="padding:5px;  height:25px; line-height:25px;"> <strong>ORDER ITEMS</strong> </div>
      <div style="padding:10px; line-height:25px; background:#FFF; margin-bottom:20px;">
        <table width="100%" border="0" style="font-size:12px;">
          <tr>
            <td style="height:30px;"><strong>QTY</strong></td>
            <td><strong>DESCRIPTION</strong></td>
            <td><strong>AMOUNT (<s>N</s>)</strong></td>
          </tr>
          '.$product_list.'
        </table>
      </div>
	  <div style="padding:5px;  height:25px; line-height:25px;"> <strong>LOGISTICS DETAILS</strong> </div>
	    <div style="padding:10px; line-height:25px; background:#FFF;">
       LOGISTICS TYPE:
        <div style="float:right; color:#06F;">'.$logistic_name.'</div>
        <br clear="all" />
        DELIVERY FEE:
        <div style="float:right; color:#06F;">'.$delivery_fee.'</div>
        <br clear="all" />
        ADDRESS:
        <div style="float:right; color:#06F;">'.$address.'</div>
        <br clear="all" />
        DELIVERY DATE:
        <div style="float:right; color:#06F;">'.$delivery_date.'</div>
        <br clear="all" />
        DELIVERY TIME:
        <div style="float:right; color:#06F;">'.$delivery_time_desc.'</div>
        <br clear="all" />
      </div>
      <br clear="all" />
    </div>
    
    
    <div style="background:#DAEEFE; padding:10px;">
      <div style="padding:5px;  height:25px; line-height:25px;"> <strong>ORDER SUMMARY AND BILLING</strong> </div>
      <div style="padding:10px; line-height:25px; background:#FFF;"> 
        TOTAL ITEMS BOUGHT
        <div style="float:right; color:#06F;">'.$nums_of_items.'</div>
        <br clear="all" />
        TRANSACTION TYPE
        <div style="float:right; color:#06F;">'.$fund_method_name.'</div>
        <br clear="all" />
        PAYMENT STATUS
        <div style="float:right; color:#06F;">'.$payment_status_name.'</div>
        <br clear="all" />
        
        <div style="border-top:#F00 1px solid;" > 
        	<strong style="color:#F00;">GRAND TOTAL</strong>
          	<div style="float:right; color:#F00;"><strong><s>N</s>'.number_format($total_amount,2).'</strong></div>
          	<br clear="all" />
        </div>
      </div>
    </div>
 

    <p>Kindly validate the order items and proceed with the payment to <strong>'.$account_name.'</strong> account details.</p>
    <div style="background:#DAEEFE; padding:10px;">
      <div style="padding:5px;  height:25px; line-height:25px;"> <strong>METHODS OF PAYMENT</strong> </div>
      <div style="padding:10px; line-height:25px; background:#FFF;">
        <div style="color:#06F; border-bottom:#CCC 1px solid;" >'.$fund_method_name.':</div>
        ACCOUNT NAME:
        <div style="float:right; color:#06F;">'.$account_name.'</div>
        <br clear="all" />
        ACCOUNT NUMBER:
        <div style="float:right; color:#06F;">'.$account_number.'</div>
        <br clear="all" />
        BANK NAME:
        <div style="float:right; color:#06F;">'.$bank_name.'</div>
        <br clear="all" />
      </div>
    </div>
    <p>Contact the admin for order activation after payment.</p>
    
    
    <p><strong>Agrohandlers</strong>: An Online Retail Market Place for FOODSTUFFS. We Provide Prompt Access to Fresh Raw Food from the Farm Good For the Table. You may Also buy food Now and Pay Later!</p>
    <p><strong>'.$thename.' Management.</strong><br> Mail Sent '.$currentDate.'.</p>
      
  </div>
  
  <div style="min-height:30px; background:#333; text-align:left; color:#FFF; line-height:20px; font-size:13px; padding:20px 10px 20px 50px;"> 
      &copy; All Right Reserve. <br> '.$thename.'.
  </div>
    
</div>

';
$send_to=$email;
$subject="Order Progresive Invoice. ORDER ID: $shopsession";

$mail->AddAddress($send_to, $reciever_name);

$mail->addAddress($support_email, $sender_name);// Name is optional
$mail->addAddress('afootechglobal@gmail.com', 'AfooTECH Global');// Name is optional
$mail->addReplyTo($smtp_username, $sender_name); // reply to the sender email

$mail->Subject = $subject;
$mail->addEmbeddedImage('mail/img/order_invoice.jpg', 'order_invoice');
$mail->Body = $message;
$mail->AltBody = strip_tags($message);

if(!$mail->send()){
	echo 'Not Working';
}


}
?>











