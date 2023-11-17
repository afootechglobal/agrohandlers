<?php require_once '../config/connection.php'?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http: //www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php require_once '../meta.php'?>
<title>Blog & Article - <?php echo $thename;?></title>
<meta name="keywords" content="Work with bellemata, Job vacances at ecommerce store" />
<meta name="description" content="We are Looking for a competent personnel to maintain, develop, implement, track and optimize our day-to-day operations."/>

<meta property="og:title" content="Blog & Article - <?php echo $thename;?>" />
<meta property="og:image" content="<?php echo $website?>/all-images/plugin-pix/bellemata.jpg"/>
<meta property="og:description" content="We are Looking for a competent personnel to maintain, develop, implement, track and optimize our day-to-day operations."/>

<meta name="twitter:title" content="Blog & Article - <?php echo $thename;?>"/> 
<meta name="twitter:card" content="<?php echo $thename?>"/> 
<meta name="twitter:image"  content="<?php echo $website?>/all-images/plugin-pix/bellemata.jpg"/> 
<meta name="twitter:description" content="We are Looking for a competent personnel to maintain, develop, implement, track and optimize our day-to-day operations."/>
</head>
<body>
<?php require_once '../header.php'?>

<div class="other-pages-title"  data-aos="fade-down" data-aos-duration="1200">
	<div class="title-div">
    <div class="top-text">Home / <span>Blogs</span></div>
    <h1>Blog & Article <i class="fa fa-circle"></i></h1>
   
    </div>
</div>

            <div class="search-text-div blog-search" data-aos="zoom-in" data-aos-duration="800">
            
                <div class="search-segment-div">
                    <input id="all_search_txt" class="text_field" onkeyup="_fetch_publish_list('fetch_blog_list')" placeholder="Type Here To Search..." title="Type to Search Here">
                </div>
				<br clear="all"/>      
            </div>

<script src="<?php echo $website?>/js/superplaceholder.js"></script> 
<script>
		superplaceholder({
			el: all_search_txt,
				sentences: [ 'Type here to Search for Blog' ],
				options: {
				letterDelay: 80,
				loop: true,
				startOnFocus: false
			}
		});
</script>  

<div class="body-div">
	<div class="body-div-in">
    	
    
<div class="insight-recommended-div">
<div id="search-content">
<?php 
$no=0;
    $blogquery=mysqli_query($conn,"SELECT * FROM blog_tab WHERE status_id='PUB' ORDER BY reg_date DESC")or die ('cannot select blog_tab');
    while($blog_sel=mysqli_fetch_array($blogquery)){
    $no++;
    $blog_id=$blog_sel['blog_id'];
    $blog_title = $blog_sel['blog_title'];
    $blog_url=$blog_sel['blog_url'];
    $seo_describtion = $blog_sel['seo_describtion'];
    $blog_views = $blog_sel['views'];
    $blog_pix=$blog_sel['blog_pix'];
    $blog_reg_date=date('d M Y', strtotime($blog_sel['reg_date']));
?>  

        	<div class="recommended-blogs">
                <div class="img"><img src="<?php echo $website?>/uploaded_files/blog-pix/<?php echo $blog_pix?>" alt="Blog" /></div>
                <div class="text-div">
                	<span><?php echo $blog_reg_date?></span> | <span><i class="fa fa-eye"></i> <?php echo $blog_views?> Views</span>
                    <a href="<?php echo $website?>/blog/<?php echo $blog_url?>/"> <h2><?php echo $blog_title?></h2></a>
                    <p><?php echo $seo_describtion?></p>
                </div>
            </div>

        
 <?php }?>

 <?php if ($no==0){?>
	<div class="false-notification-div">
        <p>NO RECORD FOUND!</p>
    </div>        
    <?php } ?>
            
            </div> 
            <div style="width:100%; display:inline-block;"></div>
        </div>
        
     
        
        
        <br clear="all" />
    </div>
</div>








<?php include '../footer.php'?>

</body>
</html>
