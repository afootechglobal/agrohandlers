<?php  include 'alert.php'?>
<div class="header-div animated fadeInDown animated animated">
	<div class="header-div-in">
        <div class="menu-div" title="Open Menu" onclick="_open_menu()" id="menu-div"><i class="fa fa-navicon (alias)"></i></div>
    	<div class="logo-div"><img src="all-images/images/logo.png" alt="<?php echo $thename; ?> logo" /></div>
        
        <div class="header-nav-div" data-aos="fade-right" data-aos-duration="1500">
        <li class="active-li" id="top-dashboard"  onClick="_get_page('dashboard','dashboard', 'dashboard','')"><i class="fa fa-dashboard"></i> Dashboard</li>
        <li onClick="_get_form_with_id('user_profile','<?php echo $user_id; ?>')"><i class="fa fa-user-circle"></i> My Profile</li>
        <?php if ($user_role_id>1){?>
        <li id="top-prospective_staff" onClick="_get_page('prospective_staff','prospective_staff','prospective_staff','')"><i class="fa fa-users"></i> Propective Staff <div id="total_prospective_staff_count1">0</div></li>
        <?php }?> 
        <li id="top-pending_orders" onClick="_get_page('pending_orders','pending_orders','pending_orders','')"><i class="fa fa-shopping-basket"></i> Pending Order <div id="total_pending_orders1">0</div></li>
        </div>
        
        
            <div class="header-profile-pix-div"
            title="User Account
            <?php echo $user_name; ?> 
            User ID: <?php echo $user_id; ?>" onclick="_toggle_profile_pix_div()">
            <img src="../../uploaded_files/staff_passport/<?php echo $user_passport; ?>" id="passportimg1"/>
            
            <div class="toggle-profile-div">
            <div class="toggle-profile-pix-div">
            <img src="../../uploaded_files/staff_passport/<?php echo $user_passport; ?>" id="passportimg2"/>
            </div>
            
            <div class="toggle-profile-name"><?php echo $user_name; ?> </div>
            <div class="toggle-profile-others">User ID: <?php echo $user_id; ?> <br /><?php echo $user_mobile; ?> </div>
            <form method="post" action="config/code" name="logoutform">
            <input type="hidden" name="action" value="logout"/>
            <button class="logout-btn" type="submit"><i class="fa fa-sign-out"></i> Log-Out</button>
            </form>
            <button class="logout-btn" type="button"  onClick="_get_form_with_id('user_profile','<?php echo $user_id; ?>')"><i class="fa fa-user"></i> Profile</button>
                    <div class="hidden" id="_myprofile"><i class="fa fa-user-circle"></i> User Profile</div>
            <br clear="all" />
            </div>
            </div>
            
            
            
            
            
            <div class="notification" onClick="_get_page('system_alert', 'system_alert', 'system_alert', '')">
            <i class="fa fa-bell-o"></i>
            </div>
            <!------>
            <span id="_system_alert" style="display:none;"><i class="fa fa-bell-o"></i> System Alert</span>
            <!------>  

       </div>
</div>