<?php include 'config/connection.php'?>
<?php include 'config/session-validation.php'?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http: //www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include 'meta.php'?>
<script src="https://js.paystack.co/v1/inline.js"></script>
<title>Dashboard - <?php echo $thename?></title>
</head>
<body>
<?php include 'header.php'?>

<div class="other-pages-title"  data-aos="fade-down" data-aos-duration="1200">
	<div class="title-div">
    <h1>Dashboard <i class="fa fa-circle"></i></h1>
    </div>
</div>




<div class="product-details-div">
	<div class="div-in">
    		<div class="each-product-details">
            	<div class="inner-div" id="get-content">
						<script>_get_content('user_dashboard');</script>
            	</div>
            </div>
            
            
            <div class="product-nav-div">
            	<div class="inner-div">
					<?php $callclass->_get_all_user_link($conn,$page);?>
            	</div>
            </div>
            
            <br clear="all" />
    </div>
</div>

<?php include 'footer.php'?>
</body>
</html>

