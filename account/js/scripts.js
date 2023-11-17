//////////////////////////////19/05/2022////////////////////////// by Afolabi Oluwagbnega Sunday
var local_url='config/code.php';






function alert_close(){
		$('#get-more-div').html('').fadeOut(200);
}

function _get_active_tab(btn_id){
		 $('#login-tab, #register-tab').removeClass('active-li');
		 $('#'+btn_id).addClass('active-li');
}
function _view_div(ids){
				  $('#login-info, #reset-password-info').css("display", "none");
				  $('#'+ids).fadeIn(300).css("display", "block");
}
function _get_page(page, divid){
	 _get_active_tab(divid);
	$('#page-content').html('<div class="ajax-loader"><img src="all-images/images/ajax-loader.gif"/></div>').fadeIn(500);
		var action='get-page';
		var dataString ='action='+ action+'&page='+ page;
		$.ajax({
		type: "POST",
		url: local_url,
		data: dataString,
		cache: false,
		success: function(html){
			$('#page-content').html(html);
			}
		});
}


function _get_form(page){
		$('#get-more-div').html('<div class="ajax-loader"><img src="all-images/images/ajax-loader.gif"/></div>').fadeIn('fast');
			var action='get-form';
			var dataString ='action='+ action+'&page='+ page;
			$.ajax({
			type: "POST",
			url: local_url,
			data: dataString,
			cache: false,
			success: function(html){$('#get-more-div').html(html);}
			});
}




function _vet_form(){
			var fullname = $('#fullname').val();
			var phone = $('#phone').val();
			var email = $('#email').val();
			var password = $('#password').val();
			var cpassword = $('#cpassword').val();
			
			$('#fullname, #phone, #email,#password, #cpassword').removeClass('issue');
			if (fullname==''){
				 $('#fullname').addClass('issue');
				$('#warning-div').html('<div><i class="fa fa-warning (alias)"></i></div> FULLNAME ERROR!<br><span>Check The FULLNAME And Try Again</span>').fadeIn(500).delay(5000).fadeOut(100);
			}else if(phone==''){
				 $('#phone').addClass('issue');
				$('#warning-div').html('<div><i class="fa fa-warning (alias)"></i></div> PHONE MUNBER ERROR!<br><span>Check PHONE NUMBER And Try Again</span>').fadeIn(500).delay(5000).fadeOut(100);
			}else if((email=='')||($('#email').val().indexOf('@')<=0)){
				 $('#email').addClass('issue');
				$('#warning-div').html('<div><i class="fa fa-warning (alias)"></i></div> EMAIL ERROR!<br><span>Check your EMAIL And Try Again</span>').fadeIn(500).delay(5000).fadeOut(100);
			}else if((password=='')||(cpassword=='')){
				 $('#password,#cpassword').addClass('issue');
				$('#warning-div').html('<div><i class="fa fa-warning (alias)"></i></div> PASSWORD ERROR!<br><span>Check PASSWORD And Try Again</span>').fadeIn(500).delay(5000).fadeOut(100);
			}else if(password!=cpassword){
				 $('#password,#cpassword').addClass('issue');
				$('#warning-div').html('<div><i class="fa fa-warning (alias)"></i></div> PASSWORD NOT MATCH!<br><span>Check PASSWORD And Try Again</span>').fadeIn(500).delay(5000).fadeOut(100);
			}else{
				  _vet_email();
		}
		
}


function _vet_email(){
	//////////////// get btn text ////////////////
	var btn_text=$('#proceed-btn').html();
	$('#proceed-btn').html('VERIFYING...');
	document.getElementById('proceed-btn').disabled=true;
	////////////////////////////////////////////////	
			var email = $('#email').val();
				var action ='vet_email';
				var dataString ='action='+ action+'&email='+ email;
				$.ajax({
				type: "POST",
				url: local_url,
				data: dataString,
				dataType: 'json',
				cache: false,
				success: function(data){
						var scheck = data.check;
						if(scheck==1){
								$('#warning-div').html('<div><i class="fa fa-warning (alias)"></i></div> ACCOUNT ALREADY EXIST! <br /><span>Login/Reset Password To Continue</span>').fadeIn(500).delay(5000).fadeOut(100);
						}else{
								_send_otp(email);
						}
				$('#proceed-btn').html(btn_text);
				document.getElementById('proceed-btn').disabled=false;
				}
				});
}


function _send_otp(email){
			var fullname = $('#fullname').val();
			var action ='send_registration_otp';
		$('#get-more-div').html('<div class="ajax-loader"><img src="all-images/images/ajax-loader.gif"/></div>').fadeIn('fast');
			var dataString ='action='+ action+'&email='+ email+'&fullname='+ fullname;
			$.ajax({
			type: "POST",
			url: local_url,
			data: dataString,
			cache: false,
			success: function(html){$('#get-more-div').html(html);}
			});
}


function _resend_registration_otp(ids,email){
			var fullname = $('#fullname').val();
		  var btn_text=$('#'+ids).html();
		  $('#'+ids).html('SENDING...');
	  var action='resend_registration_otp';
	  var dataString ='action='+ action+'&email='+ email+'&fullname='+ fullname;
	  $.ajax({
	  type: "POST",
	  url: local_url,
	  data: dataString,
	  cache: false,
	  success: function(html){
			  $('#success-div').html('<div><i class="fa fa-check"></i></div> OTP SENT<br /><span>Check your email inbox or spam</span>').fadeIn(500).delay(5000).fadeOut(100);
			  $('#'+ids).html(btn_text);
		  }
	  });
}


function _user_registration_vet(email){
			var otp = $('#otp').val();
			var action ='user_registration_vet';
			if(otp==''){
				$('#warning-div').html('<div><i class="fa fa-warning (alias)"></i></div> USER ERROR! <br /><span>Please Fill OTP To Continue</span>').fadeIn(500).delay(5000).fadeOut(100);
			}else{
			//////////////// get btn text ////////////////
			var btn_text=$('#confirm-btn').html();
			$('#confirm-btn').html('VERIFYING...');
			document.getElementById('confirm-btn').disabled=true;
			////////////////////////////////////////////////	
				var dataString ='action='+ action+'&email='+ email+'&otp='+ otp;
				$.ajax({
				type: "POST",
				url: local_url,
				data: dataString,
				dataType: 'json',
				cache: false,
				success: function(data){
						var scheck = data.check;
						if(scheck==0){
								$('#warning-div').html('<div><i class="fa fa-warning (alias)"></i></div> INVALID OTP! <br /><span>Kindly Check The OTP And Try Again.</span>').fadeIn(500).delay(5000).fadeOut(100);
						}else{
								_user_registration();
						}
				$('#confirm-btn').html(btn_text);
				document.getElementById('confirm-btn').disabled=false;
				}
				});
			}
}

function _user_registration(){
			var fullname = $('#fullname').val();
			var phone = $('#phone').val();
			var email = $('#email').val();
			var password = $('#password').val();
			  var action='user_registration';
			  var dataString ='action='+ action+'&fullname='+ fullname+'&phone='+ phone+'&email='+ email+'&password='+ password;
			  $.ajax({
			  type: "POST",
			  url: local_url,
			  data: dataString,
			  cache: false,
			  success: function(html){
				  _get_page('login','login-tab');
					_get_form('registration_successful');
				  }
			  });
}


























$(document).ready(function() {
	function trim(s) {
            return s.replace( /^\s*/, "" ).replace( /\s*$/, "" );
        }
	$("#login-info").keydown(function(e){
		if(e.keyCode==13){
			_sign_in();
		}
	});
});



function _sign_in(){ 
			var username = $('#username').val();
			var password = $('#password').val();
			if((username!='')&&(password!='')){
				user_login(username,password)
			}else{
				$('#warning-div').fadeIn(500).delay(5000).fadeOut(100);
			}
};


///////////////////// user login ///////////////////////////////////////////
function user_login(username,password){
	 var action='login_check';
	 
	//////////////// get btn text ////////////////
	var btn_text=$('#login-btn').html();
	$('#login-btn').html('Authenticating...');
	document.getElementById('login-btn').disabled=true;
	////////////////////////////////////////////////	
	 
var dataString ='action='+ action+'&username='+ username + '&password='+ password;
	$('#login-btn').html('Authenticating...');
	$.ajax({
	type: "POST",
	url: local_url,
	data: dataString,
	dataType: 'json',
	cache: false,
	success: function(data){
		$('#login-btn').html(btn_text);
		document.getElementById('login-btn').disabled=false;

 	var scheck = data.check;
	if(scheck==1){
			$('#loginform').submit();
	}else if(scheck==2){
			$('#warning-div').html('<div><i class="fa fa-warning (alias)"></i></div> ACCOUNT SUSPENDED<br /><span>Contact the admin for help</span>').fadeIn(500).delay(5000).fadeOut(100);
	}else{
		$('#not-success-div').fadeIn(500).delay(5000).fadeOut(100);}
		$('#login-btn').html('<i class="fa fa-sign-in"></i> Log-In');
	}
	});
}
















function _proceed_reset_password(){
			var email = $('#reset_password_email').val();			
			$('#reset_password_email').removeClass('issue');
			if((email=='')||(email.indexOf('@')<=0)){
				 $('#reset_password_email').addClass('issue');
				$('#warning-div').html('<div><i class="fa fa-warning (alias)"></i></div> EMAIL ERROR!<br><span>Check The EMAIL And Try Again</span>').fadeIn(500).delay(5000).fadeOut(100);
			}else{
			//////////////// get btn text ////////////////
			var btn_text=$('#reset-pwd-btn').html();
			$('#reset-pwd-btn').html('PROCESSING...');
			document.getElementById('reset-pwd-btn').disabled=true;
			////////////////////////////////////////////////	
			
			var action='proceed_reset_password';
			var dataString ='action='+ action+'&email='+ email;
			$.ajax({
			type: "POST",
			url: local_url,
			data: dataString,
			cache: false,
			dataType: 'json',
			cache: false,
			success: function(data){
					var scheck = data.check;
					var user_id = data.user_id;
					if(scheck==0){/// invalid email
						$('#not-success-div').html('<div><i class="fa fa-close"></i></div> INVALID  EMAIL ADDRESS!<br /><span>Check the email and try again</span>').fadeIn(500).delay(5000).fadeOut(100);
				 		$('#reset_password_email').addClass('issue');
					}else if(scheck==1){ /// user Active
						_reset_password(user_id);
					}else{ /// user suspended
					$('#warning-div').html('<div><i class="fa fa-warning (alias)"></i></div> ACCOUNT SUSPENDED!<br /><span>Contact the admin for help</span>').fadeIn(500).delay(5000).fadeOut(100);
					}
						$('#reset-pwd-btn').html(btn_text);
						document.getElementById('reset-pwd-btn').disabled=false;

			}
		});
			}
}


function _reset_password(user_id){
			var action='reset_password';
		$('#get-more-div').html('<div class="ajax-loader"><img src="all-images/images/ajax-loader.gif"/></div>').fadeIn('fast');
			var dataString ='action='+ action+'&user_id='+ user_id;
			$.ajax({
			type: "POST",
			url: local_url,
			data: dataString,
			cache: false,
			success: function(html){$('#get-more-div').html(html);}
			});
}

function _resend_otp(ids,user_id){
		var btn_text=$('#'+ids).html();
		$('#'+ids).html('SENDING...');
		var action='resend_otp';
		var dataString ='action='+ action+'&user_id='+ user_id;
		$.ajax({
		type: "POST",
		url: local_url,
		data: dataString,
		cache: false,
		success: function(html){
			$('#success-div').html('<div><i class="fa fa-check"></i></div> OTP SENT<br /><span>Check your email inbox or spam</span>').fadeIn(500).delay(5000).fadeOut(100);
			$('#'+ids).html(btn_text);
		}
		});
}


function _finish_reset_password(user_id){
			var otp = $('#cotp').val();
			var password = $('#r_password').val();
			var cpassword = $('#r_cpassword').val();
			
			$('#cotp,#r_password,#r_cpassword').removeClass('issue');
			if(otp==''){
				$('#cotp').addClass('issue');
				$('#warning-div').html('<div><i class="fa fa-warning (alias)"></i></div> OTP ERROR! <br /><span>Kindly Check The OTP And Try Again.</span>').fadeIn(500).delay(5000).fadeOut(100);
			}else if((password=='')||(cpassword=='')||(password!=cpassword)){
				$('#r_password,#r_cpassword').addClass('issue');
				$('#warning-div').html('<div><i class="fa fa-warning (alias)"></i></div> PASSWORD ERROR! <br /><span>Kindly Check The PASSWORD And Try Again.</span>').fadeIn(500).delay(5000).fadeOut(100);
			}else{
			//////////////// get btn text ////////////////
					var btn_text=$('#finish-reset-btn').html();
					$('#finish-reset-btn').html('PROCESSING...');
					document.getElementById('finish-reset-btn').disabled=true;
			////////////////////////////////////////////////	
				var action='finish_reset_password';
				var dataString ='action='+ action+'&user_id='+ user_id+'&otp='+ otp+'&password='+ password;
					$.ajax({
					type: "POST",
					url: local_url,
					data: dataString,
					cache: false,
					dataType: 'json',
					cache: false,
					success: function(data){
					var scheck = data.check;
					if(scheck==1){
						_get_page('login','login-tab');
						_get_form('password_reset_completed');
					}else{
					$('#cotp').addClass('issue');
					$('#not-success-div').html('<div><i class="fa fa-close"></i></div> INVALID OTP<br /><span>Check the OTP and try again</span>').fadeIn(500).delay(5000).fadeOut(100);
					$('#finish-reset-btn').html(btn_text);
					document.getElementById('finish-reset-btn').disabled=false;
					}
					}
				});
				
					}

}

