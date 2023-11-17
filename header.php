<?php  include 'alert.php'?>

<div class="header-div animated fadeInDown animated animated">

  <div class="header-top-div">
    <div class="div-in">
      <div class="contact"><i class="fa fa-envelope"></i> info@agrohandlers.com</div>
      <a href="tel:+2349028106224" title="Call Customer Care">
          <div class="contact phone"><i class="fa fa-phone"></i> +234-(0)902-810-6224</div></a>
      
      <li class="li"><i class="fa fa-linkedin"></i></li>
      <li class="li"><i class="fa fa-instagram"></i></li>
      <li class="li"><i class="fa fa-facebook"></i></li>
      <a href="https://api.whatsapp.com/send?text=Hello Agrohandlers&phone=+2349028106224" target="_blank" title="Whatsapp">
      <li><i class="fa fa-whatsapp"></i></li></a>
      <a href="tel:+2349028106224" title="Call Customer Care">
      <li><i class="fa fa-phone"></i></li></a>
    </div>
  </div>


<?php if ($s_customer_id==''){?>

  <div class="header-div-in"> 
      <a href="<?php echo $website?>" title="<?php echo $thename?>">
        <div class="logo-div"><img src="<?php echo $website?>/all-images/images/logo.JPG" alt="<?php echo $thename?> Logo"  class="animated zoomIn"/></div>
        <div class="mobile-logo-div"><img src="<?php echo $website?>/all-images/images/logo.JPG" alt="<?php echo $thename?> Logo"  class="animated zoomIn"/></div>
      </a>
        
        
        <div class="nav-div">
          <ul>
            <a href="<?php echo $website?>" title="<?php echo $thename?>">
                <li <?php if (($page=='index.php')) {?> class="active-li"<?php }?>>HOME</li>
            </a>

            <a href="<?php echo $website?>/about" title="<?php echo $thename?>">
                <li <?php if (($page=='about-us.php')) {?> class="active-li"<?php }?>>ABOUT US</li>
            </a>

            <a href="<?php echo $website?>/all-products" title="Order FoodStuffs Online">
             <li  <?php if (($page=='all-products.php')||($page=='products.php')||($page=='product-details.php')) {?> class="active-li"<?php }?>> START SHOPPING </li>
             </a>
                
                <a href="<?php echo $website?>/blog/" title="<?php echo $thename?>">
                   <li>BLOG</li>
               </a>
              
                
            <a href="<?php echo $website?>/jobs" title="<?php echo $thename?> Jobs">
                <li <?php if (($page=='jobs.php')) {?> class="active-li"<?php }?>>WORK WITH US</li>
            </a>

            <a href="<?php echo $website?>/contacts" title="Contact Us | <?php echo $thename?>">
                <li <?php if (($page=='contacts.php')) {?> class="active-li"<?php }?>>CONTACT US</li>
            </a>
            
          </ul>   
        </div>     
        <div class="header-profile-div">
            <button class="link mobile-btn" onclick="_open_menu()"><i class="fa fa-navicon (alias)"></i></button>
            <a href="<?php echo $website?>/account" title="SIGNUP/LOGIN">
        	<button class="link system-btn" title="SIGNUP OR LOGIN">SIGNUP/LOGIN</button></a>
            <a href="<?php echo $website?>/cart" title="Cart Items">
        	    <button class="link mobile cart"><i class="fa fa-cart-arrow-down"></i> <div class="cart-num animated bounceInDown animated animated"><?php echo number_format($qtycount);?></div></button>
           </a>
           <a href="<?php echo $website?>/all-products" title="Search Product">
        	    <button class="link mobile"><i class="fa fa-search"></i> </button>
           </a>
            <br clear="all" />
       </div>        
        
  </div>
<?php }else{?>
    
    


  <div class="header-div-in"> 
      <a href="<?php echo $website?>" title="<?php echo $thename?>">
        <div class="logo-div"><img src="<?php echo $website?>/all-images/images/logo.JPG" alt="<?php echo $thename?> Logo"  class="animated zoomIn"/></div>
        <div class="mobile-logo-div"><img src="<?php echo $website?>/all-images/images/logo.JPG" alt="<?php echo $thename?> Logo"  class="animated zoomIn"/></div>
      </a>
        
        
        <div class="nav-div">
          <ul>
            <a href="<?php echo $website?>/user-dashboard" title="<?php echo $thename?> User Dashboard">
                <li <?php if (($page=='user-dashboard.php')) {?> class="active-li"<?php }?>>DASHBOARD</li>
            </a>
          
            <a href="<?php echo $website?>/all-products" title="Order FoodStuffs Online">
             <li  <?php if (($page=='all-products.php')||($page=='products.php')||($page=='product-details.php')) {?> class="active-li"<?php }?>> START SHOPPING </li>
             </a>

                <a href="<?php echo $website?>/blog/" title="<?php echo $thename?>">
                   <li>BLOG</li>
               </a>
              
            <a href="<?php echo $website?>/jobs" title="<?php echo $thename?> Jobs">
                <li <?php if (($page=='jobs.php')) {?> class="active-li"<?php }?>>WORK WITH US</li>
            </a>

            <a href="<?php echo $website?>/contacts" title="Contact Us | <?php echo $thename?>">
                <li <?php if (($page=='contacts.php')) {?> class="active-li"<?php }?>>CONTACT US</li>
            </a>
            
          </ul>   
        </div>     
        <div class="header-profile-div">
            <button class="link mobile-btn" onclick="_open_menu()"><i class="fa fa-navicon (alias)"></i></button>
            <button class="link  mobile" id="expand">
            	<i class="fa fa-user"></i>
                	<div class="sub-nav-div animated fadeIn animated animated">
                    	<div class="li" id="li"><strong>USER LINKS</strong></div>
                        <a href="<?php echo $website?>/user-dashboard" title="<?php echo $thename?> User Dashboard">
                    	<div class="li"><i class="fa fa-dashboard"></i> Dashboard</div></a>
                        <a href="<?php echo $website?>/order-history" title="View Order History">
                    	<div class="li"><i class="fa fa-clock-o"></i> Order History</div></a>
                        <a href="<?php echo $website?>/wallet" title="<?php echo $thename?> Wallet History & Balance">
                    	<div class="li"><i class="fa fa-credit-card"></i> Wallet History</div></a>
                        <a href="<?php echo $website?>/notifications" title="<?php echo $thename?> Notifications">
                    	<div class="li"><i class="fa fa-bell-o"></i> Notifications</div></a>
                    	<div class="li" onClick="_get_form('change-user-password-form')"><i class="fa fa-lock"></i> Change Password</div>
                    	<div class="li" onclick="document.getElementById('logoutform').submit();"><i class="fa fa-sign-out"></i> LogOut</div>
                    </div>
            </button>
            <a href="<?php echo $website?>/cart" title="Cart Items">
        	    <button class="link mobile cart"><i class="fa fa-cart-arrow-down"></i> <div class="cart-num animated bounceInDown animated animated"><?php echo number_format($qtycount);?></div></button>
            </a>
            <a href="<?php echo $website?>/all-products" title="Search Product">
        	    <button class="link mobile"><i class="fa fa-search"></i> </button>
           </a>
            <br clear="all" />
       </div>        
        
  </div>
<?php }?>

</div>
 