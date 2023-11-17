
 <?php if (($page!='user-dashboard.php')) {?>
<div class="body-div body-hash" data-aos="fade-up" data-aos-duration="700">
	<div class="newsletter-div">
    	<h2>SUBSCRIBE TO OUR NEWSLETTER</h2>
        <div class="text-div">
            <p>Subscribe to our news letter and get loads of interesting news and updates on what we’re up to sent to you regularly</p><br clear="all" />
            <input class="text_field" placeholder="Enter your email address" />
            <button class="btn">SUBSCRIBE</button>
        </div>
    </div>
</div>
<?php }?>
<div class="footer-div">
	<div class="div-in">
        <div class="footer-links">
        	<ul>
            	<h4>Quick Links</h4>
		<?php if ($s_customer_id!=''){?>
				<a href="<?php echo $website?>/user-dashboard" title="<?php echo $thename?> User Dashboard">
                <li>Dashboard</li></a>
		<?php }else{?>
				<a href="<?php echo $website?>/account" title="SIGNUP/LOGIN">
                <li>SignUp / Login</li></a>
		<?php }?>
                <a href="<?php echo $website?>/blog" title="<?php echo $thename?> blog">
                    <li>Blog & Articles</li>
                </a>
                <a href="<?php echo $website?>/jobs" title="<?php echo $thename?> Jobs">
                    <li>Vacancies</li>
                </a>
                <li>Frequently Asked Questions</li>
            </ul>
        	<ul>
            	<h4>Product Categories</h4>
			<?php
                $query=mysqli_query($conn,"SELECT * FROM product_categories_tab WHERE status_id ='A' ORDER BY product_cat_name ASC");
                while($fetch=mysqli_fetch_array($query)){
                    $db_product_cat_id=$fetch['product_cat_id'];
                    $array=$callclass->_get_product_cat_detail($conn, $db_product_cat_id);
                    $get_array = json_decode($array, true);
                    $db_product_cat_name= $get_array[0]['product_cat_name'];
            ?>
                        
                        <a href="<?php echo $website?>/products?prc=<?php echo ucwords(strtolower($db_product_cat_id)); ?>" title="<?php echo ucwords(strtolower($db_product_cat_name)); ?>">
                        <li><?php echo ucwords(strtolower($db_product_cat_name)); ?></li></a>
            <?php } ?>
            </ul>
        	<ul>
            	<h4>Information</h4>
                <a href="<?php echo $website?>/about" title="About <?php echo $thename?>">
                <li>About Us</li></a>
                <a href="<?php echo $website?>/contacts" title="Contact Us | <?php echo $thename?>">
                <li>Contact Us</li></a>
                <li>Terms & Conditions</li>
                <li>Return & Refund Policy</li>
                <li>Privacy Policy</li>
            </ul>
        	<ul>
            	<h4>About Us</h4>
                <a href="<?php echo $website?>" title="<?php echo $thename?>">
                    <img src="<?php echo $website?>/all-images/images/footer-logo.png" alt="<?php echo $thename?> Logo"  class="animated zoomIn"/>
                </a>
                <p>AgroHandlers is an Online Retail Market Place for FOODSTUFFS. We Provide Prompt Access to Fresh Raw Food from the Farm Good For the Table.</p>
            </ul>
            <br clear="all" />
        </div>
        &copy; 2022 - <?php echo date("Y") ?> <?php echo $thename?>. All Rights Reserved.
        
	</div>
</div>



<div class="live-chat-link-div" title="Chat With Us Now" onclick="_open_live_chat()">
<div class="live-chat-pix"><img src="<?php echo $website?>/all-images/images/cutomercare.jpg" alt="Customer Care"/></div>
<i class="fa fa-question"></i> Live Help
</div>

<div id="back2Top" title="Back to top"  onclick="_back_to_top();"><i class="fa fa-long-arrow-up"></i></div>


    <script src="<?php echo $website?>/js/aos.js"></script>
    <script>
      AOS.init({
        easing: 'ease-in-out-sine'
      });
    </script>


<!-- 
Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5930550f7bd6701f"></script>




<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/6487fa1594cf5d49dc5d52a8/1h2pihp9m';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->


<?php include 'social-media.php'?>







