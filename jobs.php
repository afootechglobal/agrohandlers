<?php include 'config/connection.php'?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http: //www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include 'meta.php'?>
<title>Job Vacancies - <?php echo $thename;?></title>
<meta name="keywords" content="Work with bellemata, Job vacances at ecommerce store" />
<meta name="description" content="We are Looking for a competent personnel to maintain, develop, implement, track and optimize our day-to-day operations."/>

<meta property="og:title" content="Job Vacancies - <?php echo $thename;?>" />
<meta property="og:image" content="<?php echo $website?>/all-images/plugin-pix/bellemata.jpg"/>
<meta property="og:description" content="We are Looking for a competent personnel to maintain, develop, implement, track and optimize our day-to-day operations."/>

<meta name="twitter:title" content="Job Vacancies - <?php echo $thename;?>"/> 
<meta name="twitter:card" content="<?php echo $thename?>"/> 
<meta name="twitter:image"  content="<?php echo $website?>/all-images/plugin-pix/bellemata.jpg"/> 
<meta name="twitter:description" content="We are Looking for a competent personnel to maintain, develop, implement, track and optimize our day-to-day operations."/>
</head>
<body>
<?php include 'header.php'?>

<div class="other-pages-title"  data-aos="fade-down" data-aos-duration="1200">
	<div class="title-div">
    <h1>Job Vacancies <i class="fa fa-circle"></i><button class="btn" title="Apply for a job"  onclick="_get_form('apply-for-a-job')"> Apply For A Job</button>
      <br clear="all" /></h1>
    </div>
</div>



<div class="body-div">
	<div class="page-info">
    	<div class="info-left">

        </div>
        
        
        
        <div class="info-right">
			<div class="div-in">
				<?php //$callclass->_side_blogs($conn,$website);?>
            </div>
        </div>
        
        
        <br clear="all" />
    </div>
</div>








<?php include 'footer.php'?>

</body>
</html>
