<!--------------------------for sytem view----------------------------------------->
<div class="side-nav-div animated fadeInLeft animated animated">
	<div class="nav-div active-li" onClick="_get_page('dashboard','dashboard', 'dashboard','')" id="side-dashboard">
    	<div class="icon"><i class="fa fa-dashboard"></i></div> Dashboard
        <div class="hidden" id="_dashboard"><i class="fa fa-dashboard"></i> Admin Dashboard</div>
    </div>
    
    <?php if ($user_role_id>1){?>
	<div class="nav-div" onClick="_get_page('', '', 'staff','staff')" id="side-staff">
    	<div class="icon"><i class="fa fa-users"></i></div> Administrators
    </div>
    <?php }?>

    <div class="nav-div" onClick="_get_page('', '', 'customer','customer')" id="side-customer">
    	<div class="icon"><i class="fa fa-users"></i></div> Customers
    </div>
    
	<div class="nav-div" onClick="_get_page('','', 'products','products')" id="side-products">
    	<div class="icon"><i class="fa fa-product-hunt"></i></div> Products
    </div>

	<div class="nav-div" onClick="_get_page('', '', 'orders','orders')" id="side-orders">
    	<div class="icon"><i class="fa fa-shopping-basket"></i></div> ORDER
    </div>
    
	<div class="nav-div" onClick="_get_page('', '', 'publish','publish')" id="side-publish">
    	<div class="icon"><i class="fa fa-cloud-upload"></i></div> Publish
    </div>


	<!-- <div class="nav-div" onClick="_get_page('newsletter','newsletter', 'newsletter','')" id="side-newsletter">
    	<div class="icon"><i class="fa fa-newspaper-o"></i></div> NewsLetter
        <div class="hidden" id="_newsletter"><i class="fa fa-newspaper-o"></i> NewsLetter Subscribers</div>
    </div> -->

    <?php if ($user_role_id>1){?>
<!--	<div class="nav-div" onClick="_get_page('report','report', 'report','')" id="side-report">
    	<div class="icon"><i class="fa fa-line-chart"></i></div> Report
        <div class="hidden" id="_report"><i class="fa fa-line-chart"></i> System Report</div>
    </div>
-->    <?php }?>
    
      <div class="nav-div"  onClick="_get_page('', '', 'app_settings','app_settings')" id="side-app_settings">
    	<div class="icon"><i class="fa fa-gears (alias"></i></div> Settings
    </div>
<form method="post" action="config/code.php" id="logoutform">
<input type="hidden" name="action" value="logout"/>    
<div class="nav-div" onclick="document.getElementById('logoutform').submit();">
    	<div class="icon"><i class="fa fa-power-off"></i></div> Log-Out
</div>
</form>
</div>

<!--------------------------for mobile view----------------------------------------->-

<div class="side-nav-div animated fadeInLeft animated animated" id="side-nav-div">
	<div class="nav-div active-li" onClick="_get_page('dashboard','dashboard', 'dashboard','')" id="mobile-dashboard">
    	<div class="icon"><i class="fa fa-dashboard"></i></div> Dashboard
        <div class="hidden" id="_dashboard"><i class="fa fa-dashboard"></i> Admin Dashboard</div>
    </div>
    
    <?php if ($user_role_id>1){?>
	<div class="nav-div" onClick="_get_page('', '', 'staff','staff')" id="mobile-staff">
    	<div class="icon"><i class="fa fa-users"></i></div> Administrators
    </div>
    <?php }?>

    <div class="nav-div" onClick="_get_page('', '', 'customer','customer')" id="mobile-customer">
    	<div class="icon"><i class="fa fa-users"></i></div> Customer
    </div>
    
	<div class="nav-div" onClick="_get_page('','', 'products','products')" id="side-products">
    	<div class="icon"><i class="fa fa-product-hunt"></i></div> Products
    </div>

	<div class="nav-div" onClick="_get_page('', '', 'orders','orders')" id="mobile-orders">
    	<div class="icon"><i class="fa fa-shopping-basket"></i></div> Order
    </div>
    
<!--	<div class="nav-div" onClick="_get_page('', '', 'publish','publish')" id="mobile-publish">
    	<div class="icon"><i class="fa fa-cloud-upload"></i></div> Publish
    </div>
    
	<div class="nav-div" onClick="_get_page('newsletter','newsletter', 'newsletter','')" id="mobile-newsletter">
    	<div class="icon"><i class="fa fa-newspaper-o"></i></div> NewsLetter
        <div class="hidden" id="_report"><i class="fa fa-newspaper-o"></i> NewsLetter Subscribers</div>
    </div>
-->
    <?php if ($user_role_id>1){?>
<!--	<div class="nav-div" onClick="_get_page('report','report', 'report','')" id="mobile-report">
    	<div class="icon"><i class="fa fa-line-chart"></i></div> Report
        <div class="hidden" id="_report"><i class="fa fa-line-chart"></i> System Report</div>
    </div>
-->    <?php }?>
    
      <div class="nav-div"  onClick="_get_page('', '', 'app_settings','app_settings')" id="app_settings">
    	<div class="icon"><i class="fa fa-gears (alias"></i></div> Settings
    </div>

<form method="post" action="config/code.php" id="logoutform">
<input type="hidden" name="action" value="logout"/>    
<div class="nav-div" onclick="document.getElementById('logoutform').submit();">
    	<div class="icon"><i class="fa fa-power-off"></i></div> Log-Out
</div>
</form>

</div>











<!--------------------------for nav sub div view----------------------------------------->

<div class="side-nav-bg-sub-div">
	<div class="nav-div animated fadeInLeft" id="link-staff">
        <div class="link" onClick="_get_page('active_staff','active_staff','staff','')">- Active Staff <div class="num" id="total_active_staff_count">0</div></div>
            <div class="hidden" id="_active_staff"><i class="fa fa-users"></i> Active Staff</div>
        <div class="link" onClick="_get_page('suspended_staff','suspended_staff','staff','')">- Supended Staff <div class="num" id="total_suspended_staff_count">0</div></div>
            <div class="hidden" id="_suspended_staff"><i class="fa fa-users"></i> Supended Staff</div>
        <div class="link" onClick="_get_page('prospective_staff','prospective_staff','prospective_staff','')">- Prospective Staff <div class="num" id="total_prospective_staff_count">0</div></div>
            <div class="hidden" id="_prospective_staff"><i class="fa fa-users"></i> Prospective Staff</div>
    </div>

    <div class="nav-div animated fadeInLeft" id="link-customer">
        <div class="link" onClick="_get_page('active_customer','active_customer','customer','')">- Active Customers <div class="num" id="total_active_customer_count">0</div></div>
            <div class="hidden" id="_active_customer"><i class="fa fa-users"></i> Active Customers</div>
    </div>
    
    
	<div class="nav-div animated fadeInLeft" id="link-products">
    	<div class="link" onClick="_get_page('product_cat','products', 'products','')">- Product Categories <div class="num" id="total_product_cat_count">0</div></div>
            <div class="hidden" id="_products"><i class="fa fa-product-hunt"></i> Product Categories</div>
    	<div class="link" onClick="_get_page('stock_details','stock_details', 'products','')">- Stock Details <div class="num" id="total_stock_count">0</div></div>
            <div class="hidden" id="_stock_details"><i class="fa fa-cubes"></i> Stock Details</div>
    </div>
    
    
    
    
	<div class="nav-div animated fadeInLeft" id="link-orders">
    	<div class="link" onClick="_get_page('outstanding_orders','outstanding_orders','orders','')">- Unpaid Order <div class="num" id="total_outstanding_orders">0</div></div>
            <div class="hidden" id="_outstanding_orders"><i class="fa fa-shopping-basket"></i>  Unpaid Order</div>
    	<div class="link" onClick="_get_page('pending_orders','pending_orders','orders','')">- Unprocessed Order <div class="num" id="total_pending_orders">0</div></div>
            <div class="hidden" id="_pending_orders"><i class="fa fa-shopping-basket"></i>  Unprocessed Order</div>
    	<div class="link" onClick="_get_page('attending_orders','attending_orders','orders','')">- Order In Progress <div class="num" id="total_attending_orders">0</div></div>
            <div class="hidden" id="_attending_orders"><i class="fa fa-shopping-basket"></i> Order In Progress</div>
    	<div class="link" onClick="_get_page('ready_orders','ready_orders','orders','')">- Ready Order <div class="num" id="total_ready_orders">0</div></div>
            <div class="hidden" id="_ready_orders"><i class="fa fa-shopping-basket"></i> Ready Order</div>
    	<div class="link" onClick="_get_page('delivery_orders','delivery_orders','orders','')">- Delivered Order <div class="num" id="total_delivery_orders">0</div></div>
            <div class="hidden" id="_delivery_orders"><i class="fa fa-shopping-basket"></i> Delivered Order</div>
    </div>
    
    
	<div class="nav-div animated fadeInLeft" id="link-publish">
    	<div class="link" onClick="_get_page('all_blogs','all_blogs','publish','')">- News & Blogs <div class="num" id="total_active_blogs_count">0</div></div>
            <div class="hidden" id="_all_blogs"><i class="fa fa-newspaper-o"></i>  News & Blogs</div>
    	<div class="link" onClick="_get_page('all_faqs','all_faqs','publish','')">- FAQs <div class="num" id="total_faq_count_">0</div></div>
            <div class="hidden" id="_all_faqs"><i class="fa fa-question-circle"></i>  Frequently Asked Questions</div>
    	<!-- <div class="link" onClick="_get_page('all_faqs','all_faqs','publish','')">- Jobs <div class="num" id="total_faq_count_">0</div></div>
            <div class="hidden" id="_all_faqs"><i class="fa fa-question-circle"></i>  Job Vacancies</div> -->
    </div>
        
    
	<div class="nav-div animated fadeInLeft" id="link-app_settings">
    <?php if ($user_role_id>1){?>
    	<div class="link" onclick="_get_form('app_settings')">- System Settings</div>
    <?php }?>
    	<div class="link" onclick="_get_form('change-user-password-form')">- Change Password</div>
    </div>
    
    
    <div class="nav-back-div" onclick="_close_all_nav()"></div>
</div>
