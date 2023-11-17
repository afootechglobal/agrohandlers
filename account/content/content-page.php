<?php if($view_content=='login'){?>
            <div id="login-info">
            <form action="config/code" id="loginform" enctype="multipart/form-data" method="post">
                    <div class="alert alert-success">Kindly provide your <span>Email Address</span> and <span>Password</span> sent to your email to complete registration.</div>
                    <div class="title"><i class="fa fa-envelope"></i> EMAIL ADDRESS:</div>
                    <input class="text_field" placeholder="ENTER YOUR EMAIL ADDRESS" id="username"/>
                    <div class="title"><i class="fa fa-eercast"></i> PASSWORD:</div>
                    <input class="text_field" placeholder="ENTER YOUR PASSWORD" id="password" type="password"/>
                     <button class="btn" type="button"  title="Login" id="login-btn" onClick="_sign_in()"> LOG-IN <i class="fa fa-check"></i></button>
                      <input name="action" value="login" type="hidden" />
            </form>
                        <div class="alert" style="margin-bottom:5px;">Forget Password? <span onClick=" _view_div('reset-password-info')"> RESET PASSWORD</span></div>
            </div>


            <div id="reset-password-info">
                    <div class="alert alert-success">Kindly provide your <span>Email Address</span> to reset your password.</div>
                    <div class="title"><i class="fa fa-envelope"></i> EMAIL ADDRESS:</div>
                    <input id="reset_password_email" type="text" class="text_field" placeholder="Enter Your Email Address" title="Enter Your Email Address" />
                    <button class="btn" type="button"  title="Next" id="reset-pwd-btn" onClick="_proceed_reset_password()"> RESET PASSWORD</button>
                    <div class="alert">Existing User? <span onClick=" _view_div('login-info')">LOG-IN HERE</span> </div>
            </div>



  
<script src="js/superplaceholder.js"></script> 
<script>
		superplaceholder({
			el: email,
				sentences: [ 'Enter Email Address', 'e.g sunaf4real@gmail.com', 'info@pec.com.ng', 'king123@hotmail.com', 'afootech2016@yahoo.com' ],
				options: {
				letterDelay: 80,
				loop: true,
				startOnFocus: false
			}
		});
</script>


<?php }?>

<?php if($view_content=='register'){?>
                    <div class="title"><i class="fa fa-user"></i> FULL NAME:</div>
                    <input class="text_field" placeholder="FULLNAME" id="fullname"/>
                    <div class="title"><i class="fa fa-phone"></i> PHONE:</div>
                    <input class="text_field" placeholder="PHONE NUMBER" id="phone"/>
                    <div class="title"><i class="fa fa-envelope"></i> EMAIL ADDRESS:</div>
                    <input class="text_field" placeholder="ENTER YOUR EMAIL ADDRESS" id="email"/>
                    <div class="title"><i class="fa fa-eercast"></i> PASSWORD:</div>
                    <input class="text_field" placeholder="ENTER YOUR PASSWORD" id="password" type="password"/>
                    <div class="title"><i class="fa fa-eercast"></i> CONFIRM PASSWORD:</div>
                    <input class="text_field" placeholder="CONFIRM YOUR PASSWORD" id="cpassword" type="password"/>
                     <button class="btn" type="button"  title="PROCEED" id="proceed-btn" onClick="_vet_form()"> SIGN-UP <i class="fa fa-check"></i></button>

  
<script src="js/superplaceholder.js"></script> 
<script>
		superplaceholder({
			el: email,
				sentences: [ 'Enter Email Address', 'e.g sunaf4real@gmail.com', 'info@pec.com.ng', 'king123@hotmail.com', 'afootech2016@yahoo.com' ],
				options: {
				letterDelay: 80,
				loop: true,
				startOnFocus: false
			}
		});
</script>


<?php }?>



<?php if ($view_content=='send_registration_otp'){?>
	<div class="caption-div animated zoomIn">
    		<div  class="title-div">Registration OTP <div class="close" onclick="alert_close()"><i class="fa fa-close"></i></div></div>
            <div class="div-in animated fadeInRight">
            	<div class="alert alert-success">Hi <strong><?php echo "$fullname"?></strong>, Kindly check your INBOX or SPAM and enter the OTP sent to your email address <span>(<?php echo $email?>)</span> to complete the registration.</div>
            <div class="title">Enter OTP:<span>*</span></div>
            <input type="text" class="text_field" id="otp" placeholder="OTP" title="OTP" />
            	<div class="alert">OTP not recieved? <span id="resend_otp" onclick="_resend_registration_otp('resend_otp','<?php echo $email?>')">RESEND OTP</span></div>
            <button class="btn" type="button"  title="Confirm" id="confirm-btn" onclick="_user_registration_vet('<?php echo $email?>')"> CONFIRM <i class="fa fa-send"></i></button>
        </div>
    </div>
<?php } ?>



<?php if($view_content=='registration_successful'){?>
	<div class="caption-div caption-success-div animated zoomIn">
        <div class="div-in animated fadeInRight">
				<div class="img"><img src="all-images/images/success.gif" /></div>
                <h2>Registration Successful!</h2>
                Hence, you may login to continue shopping.
             <button class="btn" type="button"  title="Okay" onclick="alert_close()"><i class="fa fa-check"></i> Okay, Thanks </button>
        </div>
    </div>
<?php }?>








<?php if ($view_content=='reset_password'){?>
	<div class="caption-div animated zoomIn">
    		<div  class="title-div">Reset Password <div class="close" onclick="alert_close()"><i class="fa fa-close"></i></div></div>
            <div class="div-in animated fadeInRight">
            <div class="alert alert-success" style="margin:0px;">An <span>OTP</span> has been sent to your email address (<span><?php echo $email; ?></span>).</div>
            <div class="title">Enter OTP:<span>*</span></div>
            <input type="text" class="text_field" id="cotp" placeholder="OTP" title="OTP" />
            <div class="alert" style="margin:0px;">OTP not recieved? <span id="resend" onclick="_resend_otp('resend','<?php echo $user_id; ?>')">RESEND OTP</span></div>

          <div class="title">Create Password:<span>*</span></div>
          <input id="r_password" type="password" class="text_field" placeholder="Create Password" title="Create Password"/>
          <div class="title">Confirm Password:<span>*</span></div>
          <input id="r_cpassword" type="password" class="text_field" placeholder="Confirm Password" title="Confirm Password"/>
          <button class="btn" type="button"  title="Reset" id="finish-reset-btn" onclick="_finish_reset_password('<?php echo $user_id; ?>')"><i class="fa fa-check"></i> Reset Password </button>
        </div>
    </div>
<?php } ?>

<?php if ($view_content=='password_reset_completed'){ ?>
	<div class="caption-div caption-success-div animated zoomIn">
        <div class="div-in animated fadeInRight">
				<div class="img"><img src="all-images/images/success.gif" /></div>
                <h2>Password Reset Successful</h2>
             <button class="btn" type="button"  title="Log-In" onclick="alert_close()"><i class="fa fa-check"></i> Log-In </button>
        </div>
    </div>

<?php } ?>
