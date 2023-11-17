<?php include '../../config/connection.php'?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http: //www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include 'meta.php'?>
<?php include 'config/session-validation.php'?>
<title>Administrative Portal | <?php echo $thename;?></title>
</head>
<body>
<?php include 'header.php'?>
<?php include 'side-bar.php'?>

<div class="content-div">
<?php $callclass->_admin_title_pane($user_name);?>
    <div id="page-content">
		<?php $view_content='dashboard';?>
        <?php require_once 'content/content-page.php'?>
    </div>

      
      <div class="side-div-right animated fadeInRight animated animated">
            
            <div class="matrix-div animated zoomIn animated animated">
                <div class="matrix-in">
                    <div class="matrix-title">Order Matrix</div> 
                    <div id="arps-matrix">
                        <div class="ajax-loader"><img src="all-images/images/ajax-loader.gif"/></div>
                    </div>
                </div>
            </div>
          
            <div class="matrix-div animated zoomIn animated animated">
                <div class="matrix-in">
                    <div class="matrix-title">Payment Matrix</div> 
                    <div id="payment-matrix">
                        <div class="ajax-loader"><img src="all-images/images/ajax-loader.gif"/></div>
                    </div>
                </div>
            </div>
      </div>
      
            

</div>
</body>
</html>
