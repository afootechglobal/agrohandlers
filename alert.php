<div class="success-div animated bounceInDown animated animated" id="success-div">
<div><i class="fa fa-check"></i></div> 
Password Reset Successfuly<br /> 
<span>Check your email to confirm.</span>
</div>


<div class="success-div animated bounceInDown animated animated" id="not-success-div">
<div><i class="fa fa-close"></i></div> 
Invalid Login Parameters<br /> 
<span>Please check the login detail.</span>
</div>


<div class="success-div animated bounceInDown animated animated" id="warning-div">
<div><i class="fa fa-warning (alias)"></i></div> 
Fill The Fields To Continue<br /> 
</div>




<div id="get-more-div"></div>
<div id="get-more-div-secondary"></div>







































<div class="sidenavdiv">
<div class="sidenavdiv-in" onclick="_close_side_nav()"></div>

<div class="sidenavdiv-menu" id="menu-list-div"> 

 
<?php if ($s_customer_id!=''){?>
   <div class="div">
   <a href="<?php echo $website?>/user-dashboard" title="<?php echo $thename?> User Dashboard">
      <li <?php if ($page=='user-dashboard.php') {?> id="active-li"<?php }?>><i class="fa fa-dashboard"></i> Dashboard</li></a>
    </div>
 
   <div class="div">
   <a href="<?php echo $website?>/wallet" title="<?php echo $thename?> Wallet History & Balance">
      <li <?php if ($page=='wallet.php') {?> id="active-li"<?php }?>><i class="fa fa-credit-card"></i> Wallet History</li></a>
    </div>
 
   <div class="div">
   <a href="<?php echo $website?>/order-history" title="View Order History">
      <li <?php if ($page=='order-history.php') {?> id="active-li"<?php }?>><i class="fa fa-clock-o"></i> Order History</li></a>
    </div>
 
   <div class="div">
   <a href="<?php echo $website?>/notifications" title="<?php echo $thename?> Notifications">
      <li <?php if ($page=='notifications.php') {?> id="active-li"<?php }?>><i class="fa fa-bell-o"></i> Notifications</li></a>
    </div>
<?php }else{?>
   <div class="div">
    <a href="<?php echo $website;?>" title="Home Page">
      <li <?php if ($page=='index.php') {?> id="active-li"<?php }?>><i class="fa fa-home"></i>Home Page</li></a>
    </div>
<?php }?>
  <a href="<?php echo $website?>/about" title="About Us | <?php echo $thename?>">
   <div class="div">
      <li <?php if ($page=='about.php') {?> id="active-li"<?php }?>><i class="fa fa-phone"></i>About Us</li>
    </div></a>

    <div class="div">
    <li onclick="_open_li('publications')" <?php if ($page=='blogs.php') {?> id="active-li"<?php }?>><i class="fa fa-product-hunt"></i> Product Categories <i class="fa fa-plus" id="side-expand"></i></li>
    <div class="sub-li" id="publications-sub-li">
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
    </div>
    </div>
 
 
    
   <a href="<?php echo $website?>/blog" title="blog | <?php echo $thename?>">
   <div class="div">
      <li <?php if ($page=='blog.php') {?> id="active-li"<?php }?>><i class="fa fa-newspaper-o"></i> Blog & Articles</li>
    </div></a>
   
    <a href="<?php echo $website?>/contacts" title="Contact Us | <?php echo $thename?>">
   <div class="div">
      <li <?php if ($page=='contacts.php') {?> id="active-li"<?php }?>><i class="fa fa-phone"></i>Contact Us</li>
    </div></a>
    
    
<?php if ($s_customer_id!=''){?>
   <div class="div puple">
      <li onClick="_get_form('change-user-password-form')"><i class="fa fa-lock"></i> Change Password</li>
    </div>
    
   <div class="div puple">
      <li  onclick="document.getElementById('logoutform').submit();"><i class="fa fa-sign-out"></i> Log-Out</li>
    </div>
<?php }else{?>
	<a href="<?php echo $website?>/account/" title="SIGNUP/LOGIN">
   <div class="div puple">
      <li><i class="fa fa-user"></i> SignUp/Login</li>
    </div>
    </a>
<?php }?>
<form method="post" action="config/code.php" id="logoutform">
<input type="hidden" name="action" value="logout"/>    
</form>
    <div class="menu-title" style="height:100px;"> &nbsp;</div>
  </div>  
  
  
  
  
  
  
  
 
  
<div id="live-chat-div"> <a href="tel:+2349028106224" title="Call Customer Care">
    <div class="div">
      <div>
        <div class="social-div" style="background:#008040;"><i class="fa fa-phone"></i></div>
        <div class="text">09028106224</div>
      </div>
      <br clear="all" />
    </div>
    </a> <a href="https://api.whatsapp.com/send?text=Hello Agrohandlers&phone=+2349028106224" target="_blank" title="Whatsapp">
    <div class="div">
      <div>
        <div class="social-div" style="background:#25D366;"><i class="fa fa-whatsapp"></i></div>
        <div class="text">09028106224</div>
      </div>
      <br clear="all" />
    </div>
    </a> <a href="https://web.facebook.com/agrohandlers/" target="_blank" title="Facebook">
    <div class="div">
      <div>
        <div class="social-div" style="background:#2980b9;"><i class="fa fa-facebook"></i></div>
        <div class="text">Facebook Page </div>
      </div>
      <br clear="all" />
    </div>
    </a> <a href="https://web.twitter.com/agrohandlers/" target="_blank" title="Twitter">
    <div class="div">
      <div>
        <div class="social-div" style="background:#3498db;"><i class="fa fa-twitter"></i></div>
        <div class="text">Twitter Page</div>
      </div>
      <br clear="all" />
    </div>
    </a> <a href="https://www.instagram.com/agrohandlers/" target="_blank" title="Instagram">
    <div class="div">
      <div>
        <div class="social-div" style="background-image: linear-gradient(to right,#03F, #F0F);"><i class="fa fa-instagram"></i></div>
        <div class="text">Instagram Page</div>
      </div>
      <br clear="all" />
    </div>
    </a> </div>  
  
  
</div>

