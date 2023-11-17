<?php include '../config/connection.php'?>
<?php if($s_customer_id!=''){ ?>
		<script>
		javascript:history.go(1)
		</script>
<?php }?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http: //www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include 'meta.php'?>
<title>Login - <?php echo $thename?></title>
</head>
<body>
<?php include 'alert.php'?>

<div class="login-div animated fadeIn">

	<div class="info-div signup-login"><div class="cover"></div></div>
    <div class="form-div">
    	<div class="div-in">
            <div class="inner-form-div">
              <div class="top-div">
                  <div class="logo-div"><a href="<?php echo $website?>" title="<?php echo $thename?>"><img src="all-images/images/login-logo.png" alt="<?php echo $thename; ?> Logo" /></a></div>
                  <a href="https://api.whatsapp.com/send?phone=+2348131252996" target="_blank" title="Whatsapp">
                  <button class="getStartedBtn log"><i class="fa fa-whatsapp"></i></button></a>
                  <a href="tel:+2348131252996" title="Call Customer Care">
                  <button class="getStartedBtn reg"><i class="fa fa-phone"></i></button></a><br clear="all" />
              </div>
                
            	<div class="menu-div">
                	<li class="active-li" id="login-tab" onClick="_get_page('login','login-tab')">LOG-IN</li>
                	<li id="register-tab" onClick="_get_page('register','register-tab')">SIGN-UP</li>
                    <br clear="all" />
                </div>
                
                
                 <div id="page-content" class="animated fadeInRight">
					<?php $view_content='login'?>
                    <?php include 'content/content-page.php'?>
                 </div>
                <div class="footer-div">Do you Need Help? Call: <a href="tel:+2348131252996" title="Call Customer Care">08131252996</a></div>
                 
            </div>
        </div>
    </div>
</div>




</body>
</html>
