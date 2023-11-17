
<?php 

	if ($blogsession==''){
		$blogsession=date('Y-m-d-h-i-s');
		$_SESSION['blogsession']=$blogsession;
		mysqli_query($conn,"INSERT INTO `blog_view_tab`
		(`blog_id`, `session`, `system`, `ip_address`, `date`) VALUES 
		('$blog_id','$blogsession','$sysname','$ip_address', NOW())")or die ("cannot insert blog_view_tab");;
			mysqli_query($conn,"UPDATE `blog_tab` SET views=views+1 WHERE blog_id='$blog_id'")or die ("cannot update publish_tab");
	}else{
			$viewcount = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM blog_view_tab WHERE blog_id='$blog_id' AND session='$blogsession'"));
			if ($viewcount>0){
				// do nothing
			}else{
				mysqli_query($conn,"INSERT INTO `blog_view_tab`
				(`blog_id`, `session`, `system`, `ip_address`, `date`) VALUES 
				('$blog_id','$blogsession','$sysname','$ip_address', NOW())")or die ("cannot insert blog_view_tab");;
					mysqli_query($conn,"UPDATE `blog_tab` SET views=views+1 WHERE blog_id='$blog_id'")or die ("cannot update publish_tab");
			}
	}

		$blogquery=mysqli_query($conn,"SELECT * FROM blog_tab  WHERE blog_id='$blog_id'")or die ('cannot select blog_tab');
		$blog_sel=mysqli_fetch_array($blogquery);
		$blog_id=$blog_sel['blog_id'];
		$blog_cat_id=$blog_sel['cat_id'];
		$blog_title = ucwords(strtolower($blog_sel['blog_title']));
		$seo_keywords = $blog_sel['seo_keywords'];
		$seo_describtion = $blog_sel['seo_describtion'];
		$blog_url = $blog_sel['blog_url'];
		$blog_detail = $blog_sel['blog_detail'];
		$blog_status_id=$blog_sel['status_id'];
	
		$user_id=$blog_sel['user_id'];

		$blog_pix=$blog_sel['blog_pix'];
		$blog_views=$blog_sel['views'];
		$blog_reg_date=date('d M Y', strtotime($blog_sel['reg_date']));
		$blog_last_updated=date('d M Y', strtotime($blog_sel['last_updated']));


		$blog_array=$callclass->_get_staff_detail($conn, $user_id);
		$b_array = json_decode($blog_array, true);
		$surname=$b_array[0]['surname'];
		$othernames=$b_array[0]['othernames'];
		$fullname= ucwords(strtolower($surname.' '.$othernames));


?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http: //www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include '../../meta.php'?>
<title> <?php echo $blog_title?> | <?php echo $thename?></title>
<meta name="keywords" content="<?php echo $thename?>, <?php echo $seo_keywords?>" />
<meta name="description" content="<?php echo $seo_describtion?>"/>

<meta property="og:title" content="<?php echo $blog_title?>" />
<meta property="og:image" content="<?php echo $website?>/uploaded_files/blog-pix/<?php echo $blog_pix?>"/>
<meta property="og:description" content="<?php echo $seo_describtion?>"/>

<meta name="twitter:title" content="<?php echo $blog_title?>"/> 
<meta name="twitter:card" content="<?php echo $thename?>"/> 
<meta name="twitter:image"  ontent="<?php echo $website?>/uploaded_files/blog-pix/<?php echo $blog_pix?>"/> 
<meta name="twitter:description" content="<?php echo $seo_describtion?>"/>

</head>
<body>

<?php include '../../header.php'?>



<div class="other-pages-title blog-other-page" data-aos="fade-down" data-aos-duration="1200">
			<div class="title-div">
				<div class="top-text">Home / <span>Blogs</span> / <?php echo $blog_title?></div>
				<div class="title-inner-div">
						<h1><?php echo $blog_title?> <i class="fa fa-circle"></i></h1>
						<div class="title-detail">
							<div class="detail-in">
								<i class="fa fa-user"></i> By: <span> <?php echo $fullname?> </span>
							</div>
							&nbsp; | &nbsp;
							<div class="detail-in">
								<i class="fa fa-calendar3"></i> Date: <span> <?php echo $blog_reg_date?> </span>
							</div>
							&nbsp; | &nbsp;
							<div class="detail-in">
								<i class="fa fa-eye"></i> Views:  <span> <?php echo $blog_views?> </span> </span>
							</div>
							<br/>
						</div>
					<div class="bottom-text">
					<p><?php echo $seo_describtion?></p>
					</div>
				</div>
			</div>

</div> 



    <section class="body-div">
		<div class="body-div-in">
	
			<div class="blog-back-div">
				<div class="left-div">
					<div class="main-blog-image-div">
						<img src="<?php echo $website?>/uploaded_files/blog-pix/<?php echo $blog_pix?>" alt="<?php echo $blog_pix?> <?php echo $thename?>"/>
					</div>

					<div class="text-div">
						<?php echo $blog_detail?>
						
					</div>
					<br clear="all"/>


						<div class="comment-back-div">
							<div id="disqus_thread"></div>
							<script>
								(function() { // DON'T EDIT BELOW THIS LINE
								var d = document, s = d.createElement('script');
								s.src = 'https://valuehandlers-international-limited.disqus.com/embed.js';
								s.setAttribute('data-timestamp', +new Date());
								(d.head || d.body).appendChild(s);
								})();
							</script>
						</div>

					<br clear="all"/>

								
				</div>	

				<div class="right-div">
					<div class="inner-div">
						
						<h4>RELATED BLOG</h4>

						<?php 
							$no=0;
							$blogquery=mysqli_query($conn,"SELECT blog_id, blog_title,`views`,`blog_url`,`blog_pix`, reg_date FROM blog_tab WHERE cat_id='$blog_cat_id' LIMIT 3 ")or die ('cannot select blog_tab');
							while($blog_sel=mysqli_fetch_array($blogquery)){
							$no++;
							$blog_id=$blog_sel['blog_id'];
							$blog_title=ucwords(strtolower($blog_sel['blog_title']));
							$blog_url=$blog_sel['blog_url'];
							$blog_views = $blog_sel['views'];
							$blog_pix=$blog_sel['blog_pix'];
							$blog_reg_date=date('d M Y', strtotime($blog_sel[0]['blog_reg_date']));
						?>

							<div class="content-div" data-aos="fade-in" data-aos-duration="1200">
								<div class="image-div">
									<img src="<?php echo $website?>/uploaded_files/blog-pix/<?php echo $blog_pix?>" alt="blog"/> 
								</div>
								<div class="image-div text-div">
									<a href="<?php echo $website ?>/blog/<?php echo $blog_url?>" title="">
									<h4><?php echo $blog_title?></h4></a>
									<span><?php echo $blog_reg_date?> | Views: <?php echo $blog_views?></span>
								</div>
							</div>
						<?php }?>

							<?php if ($no==0){?>
								<div class="false-notification-div">
									<p>NO RECORD FOUND!</p>
								</div>        
							<?php } ?>

						<br clear="all"/>
						<br clear="all"/>
					</div>				
				</div>			
			</div>
		</div>

			
			
	<br clear="all"/>
	<br clear="all"/>
	<br clear="all"/>
	
	<?php include '../../footer.php'?>
	





</body>
</html>

 
