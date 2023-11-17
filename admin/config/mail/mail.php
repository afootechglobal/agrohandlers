<?php
	  $array=$callclass->_get_setup_backend_settings_detail($conn, 'BK_ID001');
	  $fetch = json_decode($array, true);
	  $smtp_host=$fetch[0]['smtp_host'];
	  $smtp_username=$fetch[0]['smtp_username'];
	  $smtp_password=$fetch[0]['smtp_password'];
	  $smtp_port=$fetch[0]['smtp_port'];
	  $sender_name=$fetch[0]['sender_name'];
	  $support_email=$fetch[0]['support_email'];
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
if ($mail_to_send=='send_reset_password_otp'){
$reciever_name=$fullname;			  
$message='
<div style="width:90%; max-width:500px; margin:auto; height:auto;">
	<img src="cid:logo">
	<div style="padding:15px; font-family:16px;">
	<p>
		Dear <strong >'.$reciever_name.'</strong> ('.$email.'),<br>
		Your One Time Password (OTP) is <span style="color:#F00;">'.$otp.'</span>.<br><br>
	</p>
	
	<p>Please  note that this OTP works for you with 10min from the time you recieve it. Thanks.</p>
	
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
$subject="Reset Password OTP";

$mail->AddAddress($send_to, $reciever_name);
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

