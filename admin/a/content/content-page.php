<?php if ($view_content=='dashboard'){?>
    
    <div class="chart-div-notifications">
            <div class="text"><i class="fa fa-line-chart"></i> Showing Matrix for</div> 
            
            <div class="text" onclick="select_search()">
            <span id="srch-text">Last 30 Days</span>&nbsp;<i class="fa fa-sort-down (alias)"></i>
            <div class="srch-select">
            <div id="srch-today" onclick="get_dashboard_report('srch-today', 'dashboard_report', 'view_today_search');">Today</div>
            <div id="srch-week" onclick="get_dashboard_report('srch-week', 'dashboard_report', 'view_thisweek_search');">This Week</div>
            <div id="srch-7" onclick="get_dashboard_report('srch-7', 'dashboard_report', 'view_7days_search');">Last 7 Days</div>
            <div id="srch-month" onclick="get_dashboard_report('srch-month', 'dashboard_report', 'view_thismonth_search');">This Month</div>
            <div id="srch-30" onclick="get_dashboard_report('srch-30', 'dashboard_report', 'view_30days_search');">Last 30 Days</div>
            <div id="srch-90" onclick="get_dashboard_report('srch-90', 'dashboard_report', 'view_90days_search');">Last 90 Days</div>
            <div id="srch-year" onclick="get_dashboard_report('srch-year', 'dashboard_report', 'view_thisyear_search');">This Year</div>
            <div id="srch-1year" onclick="get_dashboard_report('srch-1year', 'dashboard_report', 'view_1year_search');">Last 1 Year</div>
            <div onclick="srch_custom('Custom Search')">Custom Search</div>
            </div>
            </div>
            
            <div class="text">
            <div class="custom-srch-div">
            <input id="datepicker-from" type="text" class="srchtxt" placeholder="From" title="Select Date From" />
            <input id="datepicker-to" type="text" class="srchtxt" placeholder="To" title="Select Date To"/>
            <button type="button" class="btn" onclick=" _fetch_custom_dashboard_report('dashboard_report','custom_search')">Apply</button>
            </div>
            </div>
            <br clear="all" />
      </div>
      
        <div class="chart-div">
            <div id="chart-report-div">
                <div class="ajax-loader"><img src="all-images/images/ajax-loader.gif"/></div>
            </div>
        </div>
      
  
        <script language="javascript">
        $('#datepicker-from').datetimepicker({
            lang:'en',
            timepicker:false,
            format:'Y-m-d',
            formatDate:'Y-M-d',
        });
        
        $('#datepicker-to').datetimepicker({
            lang:'en',
            timepicker:false,
            format:'Y-m-d',
            formatDate:'Y-M-d',
        });

_chart_for_trend();
         </script>
<?php }?>

























<?php if ($view_content=='system_alert'){?>
<div class="search-div" data-aos="fade-in" data-aos-duration="700">
<input id="all_search_txt" onkeyup="_fetch_random_alert_search('system_alert')" type="text" class="text_field full" placeholder="Type here to search..." title="Type here to search" />
</div>


<div class="chart-div-notifications">
<div class="text"><i class="fa fa-line-chart"></i> Showing Notifications for</div> 

<div class="text" onclick="select_search()">
<span id="srch-text">Last 30 Days</span>&nbsp;<i class="fa fa-sort-down (alias)"></i>
<div class="srch-select">
<div id="srch-unreal" onclick="get_alert_report('srch-unreal', 'system_alert', 'unread');">Unread Alerts</div>
<div id="srch-today" onclick="get_alert_report('srch-today', 'system_alert', 'view_today_search');">Today</div>
<div id="srch-week" onclick="get_alert_report('srch-week', 'system_alert', 'view_thisweek_search');">This Week</div>
<div id="srch-7" onclick="get_alert_report('srch-7', 'system_alert', 'view_7days_search');">Last 7 Days</div>
<div id="srch-month" onclick="get_alert_report('srch-month', 'system_alert', 'view_thismonth_search');">This Month</div>
<div id="srch-30" onclick="get_alert_report('srch-30', 'system_alert', 'view_30days_search');">Last 30 Days</div>
<div id="srch-90" onclick="get_alert_report('srch-90', 'system_alert', 'view_90days_search');">Last 90 Days</div>
<div id="srch-year" onclick="get_alert_report('srch-year', 'system_alert', 'view_thisyear_search');">This Year</div>
<div id="srch-1year" onclick="get_alert_report('srch-1year', 'system_alert', 'view_1year_search');">Last 1 Year</div>
<div onclick="srch_custom('Custom Search')">Custom Search</div>
</div>
</div>

<div class="text">
<div class="custom-srch-div">
<input id="datepicker-from" type="text" class="srchtxt" placeholder="From" title="Select Date From" />
<input id="datepicker-to" type="text" class="srchtxt" placeholder="To" title="Select Date To"/>
<button type="button" class="btn" onclick=" _fetch_custom_alert_report('system_alert','custom_search')">Apply</button>
</div>
</div>
<br clear="all" />
</div>

<div class="system-alert-div">
<?php 
/// get presentation values
$day30= date('F d Y', strtotime('today - 30 days'));
$today= date('F d Y');	

/// get chat values
$db_day30= date('Y-m-d', strtotime('today - 30 days'));
$db_today= date('Y-m-d');
$view_report='';
$check_code='alert-list';
include 'sub-codes.php';
?>
</div>


<script language="javascript">
$('#datepicker-from').datetimepicker({
lang:'en',
timepicker:false,
format:'Y-m-d',
formatDate:'Y-M-d',
});

$('#datepicker-to').datetimepicker({
lang:'en',
timepicker:false,
format:'Y-m-d',
formatDate:'Y-M-d',
});
</script>
<?php }?>



<?php if ($view_content=='read_alert'){?>
<div class="fly-title-div  animated fadeInRight">
<div class="in">
<span id="panel-title"><i class="fa fa-bell-o"></i> Notification Details</span>
<div class="close" title="Close" onclick="alert_close();">X</div>
</div>
</div>
<div class="container-back-div overflow animated fadeInRight" >
<div class="inner-div">

<?php
$query=mysqli_query($conn,"SELECT * FROM alert_tab WHERE alert_id='$alert_id'");
$fetch=mysqli_fetch_array($query);
$alert_detail = $fetch['alert_detail'];
$fatch_array=$callclass->_get_alert_detail($conn, $alert_id);
$array = json_decode($fatch_array, true);
$userid= $array[0]['user_id'];
$name= trim(ucwords(strtolower($array[0]['name'])));
$ipaddress= $array[0]['ipaddress'];
$computer= $array[0]['computer'];
$seen_status= $array[0]['seen_status'];
$date= $array[0]['date'];

mysqli_query($conn,"UPDATE `alert_tab` SET seen_status='$user_role_id'+1 WHERE alert_id='$alert_id'");
?>

<div class="alert">
User ID: <span><?php echo $userid;?></span><br />
Action Performed By: <span><?php echo $name;?></span><br />
IP Address Used: <span><?php echo $ipaddress;?></span><br />
Computer Used: <span><?php echo $computer;?></span><br />
</div>

<div class="alert">
Alert ID: <span><?php echo $alert_id;?></span><br />
Date: <span><?php echo $date;?></span><br />
</div>

<div class="title">Alert Details:</div>
<div class="alert alert-success"><?php echo $alert_detail;?></div>

<button class="action-btn" onclick="alert_close();"> <i class="fa fa-check"></i> OK </button>
</div>
</div>

<?php } ?>














<?php if ($view_content=='active_staff'){
$status_id='A';
?>
<div class="search-div" data-aos="fade-in" data-aos-duration="700">
<!--------------------------------all search select------------------------->
<input id="all_search_txt" onkeyup="_fetch_users_list('A')" type="text" class="text_field full" placeholder="Type here to search..." title="Type here to search" />
</div>
 <div class="alert alert-success"> <span><i class="fa fa-users"></i></span> ACTIVE ADMINISTRATOR'S LIST</div>
    <div class="animated fadeIn" id="search-content">
    <?php 
$all_search_txt='';
$check_code='user-list';
require_once 'sub-codes.php';
?>
    <br clear="all" />
    </div>
<?php }?>



<?php if ($view_content=='suspended_staff'){
$status_id='S';
?>
<div class="search-div" data-aos="fade-in" data-aos-duration="700">
<!--------------------------------all search select------------------------->
<input id="all_search_txt" onkeyup="_fetch_users_list('S')" type="text" class="text_field full" placeholder="Type here to search..." title="Type here to search" />
</div>
 <div class="alert alert-success"> <span><i class="fa fa-users"></i></span> SUSPENDED ADMINISTRATOR'S LIST </div>
    <div class="animated fadeIn" id="search-content">
    <?php 
$all_search_txt='';
$check_code='user-list';
require_once 'sub-codes.php';
?>
    <br clear="all" />
    </div>
<?php }?>


<?php if ($view_content=='prospective_staff'){
$status_id='P';
?>
<div class="search-div" data-aos="fade-in" data-aos-duration="700">
<!--------------------------------all search select------------------------->
<input id="all_search_txt" onkeyup="_fetch_users_list('P')" type="text" class="text_field full" placeholder="Type here to search..." title="Type here to search" />
</div>
 <div class="alert alert-success"> <span><i class="fa fa-users"></i></span> PROSPECTIVE ADMINISTRATOR'S LIST </div>
    <div class="animated fadeIn" id="search-content">
    <?php 
$all_search_txt='';
$check_code='user-list';
require_once 'sub-codes.php';
?>
    <br clear="all" />
    </div>
<?php }?>



<?php if($view_content=='user_profile'){
        $users_id=$ids;
?>
<div class="caption-div full-width-caption animated fadeInUp">
<div class="title-div"><i class="fa fa-user"></i> ADMINISTRATOR'S PROFILE <div class="close" onclick="alert_close()"><i class="fa fa-close"></i></div></div>            
    <div class="profile-content-div">
    <?php include 'users-profile.php'?>
    </div>
</div>
<?php }?>







<!-- NEW UPDATE ------------------------------------------------- -->

<?php if($view_content=='customer_transaction_details'){?>

<div class="caption-div full-width-caption cus-transactions-div animated fadeInUp">
  <div class="title-div"> <i class="fa fa-user"></i> CUSTOMER DETAILS <div class="close" onclick="alert_close()"><i class="fa fa-close"></i></div></div>
<!-- <div class="pad-blog-content"> -->
<!-- <div class="profile-content-div"> -->
  <div class="no-overflow sb-container">

        <div class="table-content-div no-margin">
                  <div class="content-div-in">
                      <div class="user-profile-back-div">
                        <div class="profile-pix-div"><img src="<?php echo $website?>//uploaded_files/user_passport/friends.png" alt="Afolabi Taiwo" id="passportimg2" /></div>
                          <div class="profile-content-div">
                            <h2 id="customer_name">Xxxxxx</h2>
                              <span>Last Login Date</span> | <span id="last_login_date">xxxxxx</span>
                          </div>
                         <br clear="all" />
                      </div>
                      <div class="btn-detail-div">
                      <button class="btn-history active-btn" id="next-all" onclick="_get_details('customer_profile_details','<?php echo $ids?>', 'all')"><i class="fa fa-user"></i> PROFILE</button>
                        <button class="btn-history" id="next-order" onclick="_get_details('order_history_details','<?php echo $ids?>', 'order')"><i class="fa fa-clock-o"></i> ORDER HISTORY</button>
                        <button class="btn-history" id="next-wallet" onclick="_get_details('wallet_history_details','<?php echo $ids?>', 'wallet')"><i class="fa fa-credit-card"></i> WALLET HISTORY</button>
                    </div>
                  </div> 
          </div>

              
              <div class="table-content-div cus-info-div">
                    <div class="content-div-in">
                          <div class="title">WALLET BALANCE </div>
                            <div class="wallet-back-div">
                              <div class="wallet-div">
                                <div class="text-div">
                                    <div class="amount">₦ <span id="amount_received">0.00</span> </div>
                                    <div class="txt">TOTAL AMOUNT RECEIVED</div>
                                </div>
                            </div>
                              
                              <div class="wallet-div">
                                <div class="text-div">
                                    <div class="amount">₦ <span id="amount_withdraw">0.00</span></div>
                                    <div class="txt">TOTAL AMOUNT SPENT</div>
                                </div>
                              </div>
                              
                              <div class="wallet-div none-border">
                                <div class="text-div">
                                    <div class="amount">₦ <span id="user_wallet_balance">0.00</span></div>
                                    <div class="txt">AVAILABLE BALANCE</div>
                                </div>
                              </div>
                          <br clear="all" />
                          <br clear="all" />

                       </div>
                  </div>       
                      <div class="search-details" id="get_details"> 
                            <!--START SEARCH  -->
                          <div class="fetch-div" id="view">
                              <div class="title" style="text-align:left; padding-left:20px;font-size:12px;"><i class="fa fa-user"></i> CUSTOMER PROFILE  </div>
                             
                                    
                                <div class="user-profile-div">
                                    <div class="div-in">
                                        <div class="title title-detail">BASIC INFORMATION</div>
                                          
                                        <div class="profile-segment-div col-2">
                                          <div class="segment-title"><i class="fa fa-user"></i> FULL NAME:</div>
                                            <div class="text-field-div">
                                                <input id="fullname" type="text" class="text_field" placeholder="FULL NAME" title="FULL NAME"/>
                                            </div>
                                        </div>

                                        <div class="profile-segment-div col-2">
                                          <div class="segment-title"><i class="fa fa-phone"></i> PHONE NUMBER:</div>
                                            <div class="text-field-div">
                                                <input id="phone" type="text" class="text_field" placeholder="PHONE NUMBER" title="PHONE NUMBER"/>
                                            </div>
                                        </div>

                                        <div class="profile-segment-div col-2">
                                          <div class="segment-title"><i class="fa fa-envelope"></i> EMAIL ADDRESS:</div>
                                            <div class="text-field-div">
                                                <input id="email" type="text" class="text_field" placeholder="EMAIL ADDRESS" title="EMAIL ADDRESS" />
                                            </div>
                                        </div>

                                        <div class="profile-segment-div col-2">
                                          <div class="segment-title">HOME ADDRESS:</div>
                                            <div class="text-field-div">
                                                <input id="address" type="text" class="text_field" placeholder="HOME ADDRESS" title="HOME ADDRESS" />
                                            </div>
                                        </div>

                                        
                                          <br clear="all" />
                                          <div class="btn-div">
                                             <button class="btn" type="button" id="proceed-btn"  title="UPDATE PROFILE" onclick="_update_customer('<?php echo $ids?>')"> UPDATE PROFILE <i class="fa fa-check"></i></button>
                                          </div>
                                      </div>
                                </div>

                          </div>
                        <!-- END SEARCH -->
                      </div> 

            
  </div>
</div>
</div>

<script>
_get_customer_info('<?php echo $ids?>');
_get_customer_order_history_details('<?php echo $ids?>');
_get_customer_wallet_history_details('<?php echo $ids?>');
</script>
<?php }?>




<?php if($view_content=='customer_profile_details'){?>

<div class="search-details" id="get_details"> 
 <!--START SEARCH  -->
<div class="fetch-div" id="view">
    <div class="title" style="text-align:left; padding-left:20px;font-size:12px;"><i class="fa fa-user"></i> CUSTOMER PROFILE  </div>
    
          
      <div class="user-profile-div">
          <div class="div-in">
              <div class="title">BASIC INFORMATION</div>
                
                <div class="profile-segment-div col-2">
                  <div class="segment-title"><i class="fa fa-user"></i> FULL NAME:</div>
                    <div class="text-field-div">
                        <input id="fullname" type="text" class="text_field" placeholder="FULL NAME" title="FULL NAME"/>
                    </div>
                </div>

                <div class="profile-segment-div col-2">
                  <div class="segment-title"><i class="fa fa-phone"></i> PHONE NUMBER:</div>
                    <div class="text-field-div">
                        <input id="phone" type="text" class="text_field" placeholder="PHONE NUMBER" title="PHONE NUMBER"/>
                    </div>
                </div>

                <div class="profile-segment-div col-2">
                  <div class="segment-title"><i class="fa fa-envelope"></i> EMAIL ADDRESS:</div>
                    <div class="text-field-div">
                        <input id="email" type="text" class="text_field" placeholder="EMAIL ADDRESS" title="EMAIL ADDRESS" />
                    </div>
                </div>

                <div class="profile-segment-div col-2">
                  <div class="segment-title">HOME ADDRESS:</div>
                    <div class="text-field-div">
                        <input id="address" type="text" class="text_field" placeholder="HOME ADDRESS" title="HOME ADDRESS" />
                    </div>
                </div>

              
                
                
                
                
                <br clear="all" />
                <div class="btn-div">
                    <button class="btn" type="button" id="proceed-btn" onclick="_update_customer('<?php echo $ids?>');"> UPDATE PROFILE <i class="fa fa-check"></i></button>
                </div>
            </div>
      </div>

</div>
<!-- END SEARCH -->
</div> 

<script>
_get_customer_info('<?php echo $ids?>')
_get_customer_order_history_details('<?php echo $ids?>');
_get_customer_wallet_history_details('<?php echo $ids?>');
</script>
<?php }?>



<?php if($view_content=='order_history_details'){?>

<div class="search-details" id="get_details">  
      <!--START SEARCH  -->
      <div class="fetch-div" id="view">
          <div class="title title-detail" style="float:left">ORDER HISTORY  </div>
          
          <div class="chart-div-notifications chart-div-notifications-right">
                  <div class="text"><i class="fa fa-line-chart"></i> Order History for</div>
                  <div class="text" onclick="select_search()"> <span id="srch-text">Last 30 Days</span>&nbsp;<i class="fa fa-sort-down (alias)"></i>
                  
                    <div class="srch-select">
                      <div id="srch-today" onclick="get_order_report('srch-today', 'order_report', 'view_today_search');">Today</div>
                      <div id="srch-week" onclick="get_order_report('srch-week', 'order_report', 'view_thisweek_search');">This Week</div>
                      <div id="srch-7" onclick="get_order_report('srch-7', 'order_report', 'view_7days_search');">Last 7 Days</div>
                      <div id="srch-month" onclick="get_order_report('srch-month', 'order_report', 'view_thismonth_search');">This Month</div>
                      <div id="srch-30" onclick="get_order_report('srch-30', 'order_report', 'view_30days_search');">Last 30 Days</div>
                      <div id="srch-90" onclick="get_order_report('srch-90', 'order_report', 'view_90days_search');">Last 90 Days</div>
                      <div id="srch-year" onclick="get_order_report('srch-year', 'order_report', 'view_thisyear_search');">This Year</div>
                      <div id="srch-1year" onclick="get_order_report('srch-1year', 'order_report', 'view_1year_search');">Last 1 Year</div>
                      <div onclick="srch_custom('Custom Search')">Custom Search</div>
                    </div>
                  </div>
                  
                  <div class="text">
                    <div class="custom-srch-div">
                      <input id="datepicker-from" type="text" class="srchtxt" placeholder="From" title="Select Date From" />
                      <input id="datepicker-to" type="text" class="srchtxt" placeholder="To" title="Select Date To"/>
                      <button type="button" class="btn" onclick=" _fetch_custom_order_report('order_report','custom_search')">Apply</button>
                    </div>
                  </div>
                  <br clear="all" />
              </div>
          
          
          

              <div class="table-div table-detail animated fadeIn">
                  <table class="table" cellspacing="0" id="fetch_order_detail">
                  
                  </table>
            </div>  

            <button class="view-btn"><i class="fa fa-eye"></i> View More</button>
            <br clear="all"/>

      </div>  

            <br clear="all" />
    
    
  <!-- END SEARCH -->
  </div> 

<script>
_get_customer_order_history_details('<?php echo $ids?>');
</script>
<?php }?>







<?php if($view_content=='each_order_history_details'){?>

<div class="search-details" id="get_details">  
      <!--START SEARCH  -->
      <div class="export-fetch-div" id="export-view">
              <div class="table-div  animated fadeIn">
                <div class="tb-title"><i class="fa fa-shopping-basket"></i> ORDER LIST DETAILS <button class="btn" onclick="exportTableToExcel('<?php echo $ids?>_table','<?php echo $name?> FOR <?php echo $status_name?>')"><i class="fa fa-file-excel-o"></i> EXPORT</button></div>
                  <table class="table" cellspacing="0" id="<?php echo $ids?>_table">
                  
                  </table>
            </div>  
            <br clear="all"/>
      </div>  
            <br clear="all" />
  <!-- END SEARCH -->
  </div> 

<script>
_get_each_order_history_details('<?php echo $ids?>');
</script>
<?php }?>






<?php if($view_content=='wallet_history_details'){?>
<div class="search-details" id="get_details">  
      <!--START SEARCH  -->
<div class="fetch-div" id="view">
      <div class="title title-detail" style="float:left">WALLET HISTORY </div>

            <div class="chart-div-notifications chart-div-notifications-right">
                <div class="text"><i class="fa fa-line-chart"></i> Wallet History for</div>
                <div class="text" onclick="select_search()"> <span id="srch-text">Last 30 Days</span>&nbsp;<i class="fa fa-sort-down (alias)"></i>
                
                  <div class="srch-select">
                    <div id="srch-today" onclick="get_order_report('srch-today', 'order_report', 'view_today_search');">Today</div>
                    <div id="srch-week" onclick="get_order_report('srch-week', 'order_report', 'view_thisweek_search');">This Week</div>
                    <div id="srch-7" onclick="get_order_report('srch-7', 'order_report', 'view_7days_search');">Last 7 Days</div>
                    <div id="srch-month" onclick="get_order_report('srch-month', 'order_report', 'view_thismonth_search');">This Month</div>
                    <div id="srch-30" onclick="get_order_report('srch-30', 'order_report', 'view_30days_search');">Last 30 Days</div>
                    <div id="srch-90" onclick="get_order_report('srch-90', 'order_report', 'view_90days_search');">Last 90 Days</div>
                    <div id="srch-year" onclick="get_order_report('srch-year', 'order_report', 'view_thisyear_search');">This Year</div>
                    <div id="srch-1year" onclick="get_order_report('srch-1year', 'order_report', 'view_1year_search');">Last 1 Year</div>
                    <div onclick="srch_custom('Custom Search')">Custom Search</div>
                  </div>
                </div>
                
                <div class="text">
                  <div class="custom-srch-div">
                    <input id="datepicker-from" type="text" class="srchtxt" placeholder="From" title="Select Date From" />
                    <input id="datepicker-to" type="text" class="srchtxt" placeholder="To" title="Select Date To"/>
                    <button type="button" class="btn" onclick=" _fetch_custom_order_report('order_report','custom_search')">Apply</button>
                  </div>
                </div>
                <br clear="all" />
            </div>


        <div class="table-div table-detail animated fadeIn" >

              <table class="table" cellspacing="0" id="fetch_wallet_detail">
                    
              </table>
        </div>   
        <button class="view-btn"><i class="fa fa-eye"></i> View More</button>
        <br clear="all"/>
    </div>


<!-- END SEARCH -->
</div> 

<script>
_get_customer_wallet_history_details('<?php echo $ids?>');
</script>
<?php }?>


<!-- END NEW UPDATE ------------------------------------------------- -->













<?php if ($view_content=='active_customer'){

?>
<div class="search-div" data-aos="fade-in" data-aos-duration="700">
<!--------------------------------all search select------------------------->
<input id="search_txt" onkeyup=" _get_fetch_all_customer('');" type="text" class="text_field full" placeholder="Type here to search..." title="Type here to search" />
</div>
 <div class="alert alert-success"> <span><i class="fa fa-users"></i></span> ACTIVE ADMINISTRATOR'S LIST</div>
    <div class="animated fadeIn" id="search-content">
     
    <br clear="all" />
</div>

<script> _get_fetch_all_customer('');</script>
<?php }?>



<?php if ($view_content=='change-user-password-form'){?>

        <div class="fly-title-div  animated fadeInRight">
        <div class="in">
        <span id="panel-title"><i class="fa fa-lock"></i> CHANGE PASSWORD</span>
        <div class="close" title="Close" onclick="alert_close();">X</div>
        </div>
        </div>
        <div class="container-back-div sb-container animated fadeInRight" >
                      <div class="inner-div">
                        
                        <div class="alert">Enter the <span>OLD PASSWORD</span> and create your <span>NEW PASSWORD</span></div>
                        
                           <div class="title">OLD PASSWORD</div>
                               <input id="oldpass" type="password" class="text_field" placeholder="ENTER OLD PASSWORD" title="OLD PASSWORD"/>
                           <div class="title">NEW PASSWORD</div>
                              <input id="newpass" type="password" class="text_field" placeholder="CREATE NEW PASSWORD" title="NEW PASSWORD"/>
                           <div class="title">CONFIRM NEW PASSWORD</div>
                              <input id="cnewpass" type="password" class="text_field" placeholder="CONFIRM NEW PASSWORD" title="CONFIRM NEW PASSWORD"/>
                             <button class="action-btn" type="button" title="Submit" id="update-user-password-btn" onclick="_update_user_password();"> <i class="fa fa-refresh"></i> CHANGE PASSWORD </button>
                </div>
        </div>
<?php } ?>
<!-----------------------------------------end of paramount html------------------------------------------------------------------>






















<?php if ($view_content=='product_cat'){?>
    <div class="search-div" data-aos="fade-in" data-aos-duration="700">
         <select id="status_id"  class="text_field select" onchange="_fetch_products_cat_list()">
         <option value="" selected="selected">All Status</option>
               <?php 
           $status_query= mysqli_query($conn,"SELECT distinct(status_id) FROM product_categories_tab ORDER BY status_id ASC");
          while($status_sel=mysqli_fetch_array($status_query)){
          $status_ids=$status_sel[0];
  if ($status_ids=='A'){$status_name='ACTIVATED';}else{$status_name='SUSPENDED';}
           ?>
             <option value="<?php echo $status_ids;?>"><?php echo $status_name;?></option>
              <?php }?>
        </select>
    <!--------------------------------all search select------------------------->
    <input id="all_search_txt" onkeyup="_fetch_products_cat_list_txt()" type="text" class="text_field utext" placeholder="Type here to search..." title="Type here to search" />
    </div>
 <div class="alert alert-success"> <span><i class="fa fa-product-hunt"></i></span> PRODUCT CATEGORIES <button class="btn" onClick="_get_form('reg_update_product_cat')"><i class="fa fa-plus"></i> ADD NEW PRODUCT CATEGORY</button></div>
    <div class="product-categories-back-div animated fadeIn" id="search-content">
    <?php

$check_code='product-cat-list';
require_once 'sub-codes.php';
?>
    <br clear="all" />
    </div>
<?php } ?>






<?php if ($view_content=='reg_update_product_cat'){?>

        <div class="fly-title-div  animated fadeInRight">
        <div class="in">
        <span id="panel-title"><i class="fa fa-plus"></i> ADD A PRODUCT CATEGORY</span>
        <div class="close" title="Close" onclick="alert_close();">X</div>
        </div>
        </div>
        <div class="container-back-div sb-container animated fadeInRight" >
        <div class="inner-div">
        
        <div class="alert">Kindly fill the form below to <span>ADD A PRODUCT CATEGORY</span></div>
        
        <div class="title">PRODUCT CATEGORY NAME:</div>
        <input id="product_cat_name" type="text" class="text_field" placeholder="e.g TUBERS AND SWALLOW" title="PRODUCT CATEGORY NAME"/>
        <div class="title">UPLOAD PRODUCT CATEGORY PICTURES</div>
                        <div class="alert alert-success">
                            <div class="product-pictures-div">
                            <div id="pix-preview-div" style="float:left;"></div>
                          <label>
                              <div class="product-pictures" id="tap-to-upload">
                                <div class="img"><img src="<?php echo $website; ?>/uploaded_files/product-cat-pix/default.png" alt="Tap to upload"/></div>
                                </div>
                              <input type="file"  id="product_pix" name="product_pix[]" accept=".jpg" multiple  onchange="_preview_product_pix();" style="display:none;"/>
                          </label>
                            </div>
                        </div>                
        <div class="title">PRODUCT CATEGORY STATUS:</div>
        <select id="status_id"  class="text_field selectinput">
        <option value="" selected="selected">Select Status</option>
        <?php 
        $status_query= mysqli_query($conn,"SELECT * FROM setup_status_tab WHERE status_id IN ('A', 'S')");
        while($status_sel=mysqli_fetch_array($status_query)){
        $status_id=$status_sel['status_id'];
        $status_name=$status_sel['status_name'];
        ?>
        <option value="<?php echo $status_id;?>"><?php echo $status_name;?></option>
        <?php }?>
        </select>
        <button class="action-btn" type="button" title="Submit" id="proceed-btn" onclick="_add_product_category();"> <i class="fa fa-plus"></i> ADD PRODUCT CATEGORY </button>
        </div>
        </div>
<?php } ?>








<?php if ($view_content=='edit_update_product_cat'){
        $product_cat_id=$ids;

$array=$callclass->_get_product_cat_detail($conn, $product_cat_id);
$get_array = json_decode($array, true);
$product_cat_name= $get_array[0]['product_cat_name'];
$status_id= $get_array[0]['status_id'];

$fetch_status=$callclass->_get_setup_status_detail($conn, $status_id);
$array = json_decode($fetch_status, true);
$status_name= $array[0]['status_name'];
?>

        <div class="fly-title-div  animated fadeInRight">
        <div class="in">
        <span id="panel-title"><i class="fa fa-check"></i> UPDATE THIS PRODUCT CATEGORY</span>
        <div class="close" title="Close" onclick="alert_close();">X</div>
        </div>
        </div>
        <div class="container-back-div sb-container animated fadeInRight" >
        <div class="inner-div">
        
        <div class="alert">Kindly fill the form below to <span>UPDATE THIS PRODUCT CATEGORY</span></div>
        
        <div class="title">PRODUCT CATEGORY NAME:</div>
        <input id="product_cat_name" type="text" class="text_field" placeholder="e.g TUBERS AND SWALLOW" title="PRODUCT CATEGORY NAME" value="<?php echo $product_cat_name; ?>"/>
        <div class="title">UPLOAD PRODUCT CATEGORY PICTURES</div>
                        <div class="alert alert-success">
                            <div class="product-pictures-div">
                            <div id="pix-preview-div" style="float:left;">
                            <?php
                                $pixquery=mysqli_query($conn,"SELECT * FROM product_categories_pix_tab WHERE  product_cat_id='$product_cat_id'");
                               while( $pixsel=mysqli_fetch_array($pixquery)){
                                $product_pix=$pixsel['product_pix'];
            ?>
                              <div class="product-pictures" id="tap-to-upload">
                                <div class="img"><img src="<?php echo $website; ?>/uploaded_files/product-cat-pix/<?php echo $product_pix; ?>"/></div>
                              </div>
           <?php }?>

                            </div>
                          <label>
                              <div class="product-pictures" id="tap-to-upload">
                                <div class="img"><img src="<?php echo $website; ?>/uploaded_files/product-cat-pix/default.png" alt="Tap to upload"/></div>
                                </div>
                              <input type="file"  id="product_pix" name="product_pix[]" accept=".jpg" multiple  onchange="_preview_product_pix();" style="display:none;"/>
                          </label>
                            </div>
                        </div>                
        <div class="title">PRODUCT CATEGORY STATUS:</div>
        <select id="status_id"  class="text_field selectinput">
        <option value="<?php echo $status_id; ?>" selected="selected"><?php echo $status_name; ?></option>
        <?php 
        $status_query= mysqli_query($conn,"SELECT * FROM setup_status_tab WHERE status_id IN ('A', 'S')");
        while($status_sel=mysqli_fetch_array($status_query)){
        $status_id=$status_sel['status_id'];
        $status_name=$status_sel['status_name'];
        ?>
        <option value="<?php echo $status_id;?>"><?php echo $status_name;?></option>
        <?php }?>
        </select>
        <button class="action-btn" type="button" title="Submit" id="proceed-btn" onclick="_update_product_category('<?php echo $product_cat_id;?>');"> <i class="fa fa-check"></i> UPDATE PRODUCT CATEGORY </button>
        </div>
        </div>
<?php } ?>






<?php if ($view_content=='product_list'){
$product_cat_id=$ids;

$array=$callclass->_get_product_cat_detail($conn, $product_cat_id);
$get_array = json_decode($array, true);
$product_cat_name= $get_array[0]['product_cat_name'];
?>
    <div class="search-div" data-aos="fade-in" data-aos-duration="700">
         <select id="status_id"  class="text_field select" onchange="_fetch_products_list('<?php echo $product_cat_id;?>')">
         <option value="" selected="selected">All Status</option>
               <?php 
           $status_query= mysqli_query($conn,"SELECT distinct(status_id) FROM product_tab WHERE product_cat_id='$product_cat_id' ORDER BY status_id ASC");
          while($status_sel=mysqli_fetch_array($status_query)){
          $status_ids=$status_sel[0];
  if ($status_ids=='A'){$status_name='ACTIVATED';}else{$status_name='SUSPENDED';}
           ?>
             <option value="<?php echo $status_ids;?>"><?php echo $status_name;?></option>
              <?php }?>
        </select>
    <!--------------------------------all search select------------------------->
    <input id="all_search_txt" onkeyup="_fetch_products_list_txt('<?php echo $product_cat_id;?>')" type="text" class="text_field utext" placeholder="Type here to search..." title="Type here to search" />
    </div>
 <div class="alert alert-success"> <span><i class="fa fa-product-hunt"></i></span> PRODUCT LIST UNDER <span><?php echo $product_cat_name;?></span> <button class="btn" onClick="_get_form_with_id('reg_product','<?php echo $product_cat_id;?>')"><i class="fa fa-plus"></i> ADD PRODUCT</button></div>
    <div class="product-back-div animated fadeIn" id="search-content">
    <?php

$check_code='product-list';
require_once 'sub-codes.php';
?>
    <br clear="all" />
    </div>
<?php } ?>












<?php if ($view_content=='reg_product'){
$product_cat_id=$ids;

$array=$callclass->_get_product_cat_detail($conn, $product_cat_id);
$get_array = json_decode($array, true);
$product_cat_name= $get_array[0]['product_cat_name'];
?>

        <div class="fly-title-div  animated fadeInRight">
        <div class="in">
        <span id="panel-title"><i class="fa fa-plus"></i> ADD PRODUCT</span>
        <div class="close" title="Close" onclick="alert_close();">X</div>
        </div>
        </div>
        <div class="container-back-div sb-container animated fadeInRight" >
        <div class="inner-div">
        
        <div class="alert">Kindly fill the form below to add a product under <span><?php echo $product_cat_name;?></span></div>
        
        <div class="title">PRODUCT CATEGORY NAME:</div>
        <input  type="text" class="text_field" readonly="readonly" value="<?php echo $product_cat_name; ?>"/>
        <div class="title">PRODUCT NAME:</div>
        <input id="product_name" type="text" class="text_field" placeholder="e.g FRESH TURKEY 5KG" title="PRODUCT NAME"/>
        <div class="title">PRODUCT DESCRIPTION:</div>
        <textarea id="product_desc" class="text_field" role="3" placeholder="Type here..." title="PRODUCT DESCRIPTION"></textarea>
        <div class="title">UPLOAD PRODUCT PICTURES</div>
                        <div class="alert alert-success">
                            <div class="product-pictures-div">
                            <div id="pix-preview-div" style="float:left;"></div>
                          <label>
                              <div class="product-pictures" id="tap-to-upload">
                                <div class="img"><img src="<?php echo $website; ?>/uploaded_files/product-cat-pix/default.png" alt="Tap to upload"/></div>
                                </div>
                              <input type="file"  id="product_pix" name="product_pix[]" accept=".jpg" multiple  onchange="_preview_product_pix();" style="display:none;"/>
                          </label>
                            </div>
                        </div>                
         <div class="title">PURCHASE PRICE/UNIT (<s>N</s>)</div>
            <input id="purchase_price" type="number" class="text_field" placeholder="PURCHASE PRICE/UNIT" title="PURCHASE PRICE/UNIT" onkeypress="return isNumber(event)" />
         <div class="title">SELLING PRICE/UNIT (<s>N</s>)</div>
            <input id="selling_price" type="number" class="text_field" placeholder="SELLING PRICE/UNIT" title="SELLING PRICE/UNIT"  onkeypress="return isNumber(event)"/>
        <div class="title">PRODUCT STATUS:</div>
        <select id="status_id"  class="text_field selectinput">
        <option value="" selected="selected">Select Status</option>
        <?php 
        $status_query= mysqli_query($conn,"SELECT * FROM setup_status_tab WHERE status_id IN ('A', 'S')");
        while($status_sel=mysqli_fetch_array($status_query)){
        $status_id=$status_sel['status_id'];
        $status_name=$status_sel['status_name'];
        ?>
        <option value="<?php echo $status_id;?>"><?php echo $status_name;?></option>
        <?php }?>
        </select>
        <button class="action-btn" type="button" title="Submit" id="proceed-btn" onclick="_add_product('<?php echo $product_cat_id;?>');"> <i class="fa fa-plus"></i> ADD PRODUCT </button>
        </div>
        </div>
<?php } ?>






<?php if ($view_content=='edit_update_product'){
$product_id=$ids;


$query=mysqli_query($conn,"SELECT * FROM product_tab WHERE product_id='$product_id'");
$fetch=mysqli_fetch_array($query);
$product_desc=$fetch['product_desc'];


$array=$callclass->_get_product_detail($conn, $product_id);
$get_array = json_decode($array, true);
$product_cat_id= $get_array[0]['product_cat_id'];
$product_name= $get_array[0]['product_name'];
$status_id= $get_array[0]['status_id'];

$cat_array=$callclass->_get_product_cat_detail($conn, $product_cat_id);
$get_cat_array = json_decode($cat_array, true);
$product_cat_name= $get_cat_array[0]['product_cat_name'];

$fetch_status=$callclass->_get_setup_status_detail($conn, $status_id);
$array = json_decode($fetch_status, true);
$status_name= $array[0]['status_name'];

$stock_array=$callclass->_get_stock_detail($conn, $product_id);
$stock_fetch = json_decode($stock_array, true);
$purchase_price= $stock_fetch[0]['purchase_price'];
$selling_price= $stock_fetch[0]['selling_price'];
?>

        <div class="fly-title-div  animated fadeInRight">
        <div class="in">
        <span id="panel-title"><i class="fa fa-edit"></i> UPDATE THIS PRODUCT</span>
        <div class="close" title="Close" onclick="alert_close();">X</div>
        </div>
        </div>
        <div class="container-back-div sb-container animated fadeInRight" >
        <div class="inner-div">
        
        <div class="alert">Kindly fill the form below to update this product under <span><?php echo $product_cat_name;?></span></div>
        
        <div class="title">PRODUCT CATEGORY NAME:</div>
        <input  type="text" class="text_field" readonly="readonly" value="<?php echo $product_cat_name; ?>"/>
        <div class="title">PRODUCT NAME:</div>
        <input id="product_name" type="text" class="text_field" placeholder="e.g FRESH TURKEY 5KG" title="PRODUCT NAME" value="<?php echo $product_name; ?>"/>
        <div class="title">PRODUCT DESCRIPTION:</div>
        <textarea id="product_desc" class="text_field" role="3" placeholder="Type here..." title="PRODUCT DESCRIPTION"><?php echo $product_desc; ?></textarea>
        <div class="title">UPLOAD PRODUCT PICTURES</div>
                        <div class="alert alert-success">
                            <div class="product-pictures-div">
                            <div id="pix-preview-div" style="float:left;">
                            <?php
                                $pixquery=mysqli_query($conn,"SELECT * FROM product_pix_tab WHERE  product_id='$product_id'");
                               while( $pixsel=mysqli_fetch_array($pixquery)){
                                $product_pix=$pixsel['product_pix'];
            ?>
                              <div class="product-pictures" id="tap-to-upload">
                                <div class="img"><img src="<?php echo $website; ?>/uploaded_files/product-pix/<?php echo $product_pix; ?>"/></div>
                              </div>
           <?php }?>
                            </div>
                          <label>
                              <div class="product-pictures" id="tap-to-upload">
                                <div class="img"><img src="<?php echo $website; ?>/uploaded_files/product-cat-pix/default.png" alt="Tap to upload"/></div>
                                </div>
                              <input type="file"  id="product_pix" name="product_pix[]" accept=".jpg" multiple  onchange="_preview_product_pix();" style="display:none;"/>
                          </label>
                            </div>
                        </div>                
         <div class="title">PURCHASE PRICE/UNIT (<s>N</s>)</div>
            <input id="purchase_price" type="number" class="text_field" placeholder="PURCHASE PRICE/UNIT" title="PURCHASE PRICE/UNIT" onkeypress="return isNumber(event)" value="<?php echo $purchase_price;?>" />
         <div class="title">SELLING PRICE/UNIT (<s>N</s>)</div>
            <input id="selling_price" type="number" class="text_field" placeholder="SELLING PRICE/UNIT" title="SELLING PRICE/UNIT"  onkeypress="return isNumber(event)" value="<?php echo $selling_price;?>"/>
        <div class="title">PRODUCT STATUS:</div>
        <select id="status_id"  class="text_field selectinput">
        <option value="<?php echo $status_id; ?>" selected="selected"><?php echo $status_name; ?></option>
        <?php 
        $status_query= mysqli_query($conn,"SELECT * FROM setup_status_tab WHERE status_id IN ('A', 'S')");
        while($status_sel=mysqli_fetch_array($status_query)){
        $status_id=$status_sel['status_id'];
        $status_name=$status_sel['status_name'];
        ?>
        <option value="<?php echo $status_id;?>"><?php echo $status_name;?></option>
        <?php }?>
        </select>
        <button class="action-btn" type="button" title="Submit" id="proceed-btn" onclick="_update_product('<?php echo $product_cat_id;?>','<?php echo $product_id;?>');"> <i class="fa fa-check"></i> UPDATE PRODUCT </button>
        </div>
        </div>
<?php } ?>









<?php if ($view_content=='stock_details'){?>
    <div class="search-div" data-aos="fade-in" data-aos-duration="700">
    <!--------------------------------all search select------------------------->
    <input id="all_search_txt" onkeyup="_fetch_stock_details()" type="text" class="text_field full" placeholder="Type here to search..." title="Type here to search" />
    </div>
    <div class="animated fadeIn" id="search-content">
    <?php
$check_code='stock_details';
require_once 'sub-codes.php';
?>
    <br clear="all" />
    </div>
<?php } ?>



<?php if ($view_content=='load_stock_form'){
$product_id=$ids;

$array=$callclass->_get_product_detail($conn, $product_id);
$get_array = json_decode($array, true);
$product_cat_id= $get_array[0]['product_cat_id'];
$product_name= $get_array[0]['product_name'];
$product_desc= $get_array[0]['product_desc'];
$status_id= $get_array[0]['status_id'];

$cat_array=$callclass->_get_product_cat_detail($conn, $product_cat_id);
$get_cat_array = json_decode($cat_array, true);
$product_cat_name= $get_cat_array[0]['product_cat_name'];

$fetch_status=$callclass->_get_setup_status_detail($conn, $status_id);
$array = json_decode($fetch_status, true);
$status_name= $array[0]['status_name'];

$stock_array=$callclass->_get_stock_detail($conn, $product_id);
$stock_fetch = json_decode($stock_array, true);
$purchase_price= $stock_fetch[0]['purchase_price'];
$selling_price= $stock_fetch[0]['selling_price'];
$available_qty= $stock_fetch[0]['available_qty'];
$outstanding_qty= $stock_fetch[0]['outstanding_qty'];
?>

        <div class="fly-title-div  animated fadeInRight">
        <div class="in">
        <span id="panel-title"><i class="fa fa-cubes"></i> LOAD STOCK</span>
        <div class="close" title="Close" onclick="alert_close();">X</div>
        </div>
        </div>
        <div class="container-back-div sb-container animated fadeInRight" >
        <div class="inner-div">
        
        
        <div class="alert alert-success">
          <div class="cart-bill">PRODUCT CATEGORY <div class="span"><?php echo $product_cat_name; ?></div><br clear="all" /></div>
          <div class="cart-bill">PRODUCT NAME <div class="span"><?php echo $product_name; ?></div><br clear="all" /></div>
          <div class="cart-bill">PRODUCT STATUS <div class="span"><?php echo $status_name; ?></div><br clear="all" /></div>
          <div class="cart-bill">AVAILABLE QUANTITY <div class="span"><?php echo $available_qty; ?></div><br clear="all" /></div>
          <div class="cart-bill">OUTSTANDING QUANTITY <div class="span"><?php echo $outstanding_qty; ?></div><br clear="all" /></div>
        </div>
        <div class="alert">Fill the form below to load stock</div>
         <div class="title">PRODUCT QUANTITY</div>
            <input id="product_qty" type="number" class="text_field" placeholder="PRODUCT QUANTITY" title="PRODUCT QUANTITY" onkeypress="return isNumber(event)" />
         <div class="title">PURCHASE PRICE/UNIT (<s>N</s>)</div>
            <input id="purchase_price" type="number" class="text_field" placeholder="PURCHASE PRICE/UNIT" title="PURCHASE PRICE/UNIT" onkeypress="return isNumber(event)" />
         <div class="title">SELLING PRICE/UNIT (<s>N</s>)</div>
            <input id="selling_price" type="number" class="text_field" placeholder="SELLING PRICE/UNIT" title="SELLING PRICE/UNIT"  onkeypress="return isNumber(event)"/>
        <button class="action-btn" type="button" title="Submit" id="proceed-btn" onclick="_load_stock('<?php echo $product_id;?>');"> <i class="fa fa-check"></i> LOAD STOCK </button>
        </div>
        </div>
<?php } ?>





<?php if($view_content=='load_stock_history'){
$array=$callclass->_get_product_detail($conn, $product_id);
$get_array = json_decode($array, true);
$product_cat_id= $get_array[0]['product_cat_id'];
$product_name= $get_array[0]['product_name'];

$cat_array=$callclass->_get_product_cat_detail($conn, $product_cat_id);
$get_cat_array = json_decode($cat_array, true);
$product_cat_name= $get_cat_array[0]['product_cat_name'];
?>
<div class="caption-div blog-pane animated fadeInUp">
<div class="title-div"><i class="fa fa-history"></i>  LOAD STOCK HISTORY<div class="close" onclick="alert_close()"><i class="fa fa-close"></i></div></div>
<div class="blog-pane-div-in">
<div class="pad-blog-content">
<div class="chart-div-notifications">
    <div class="text"><i class="fa fa-line-chart"></i> Showing Matrix for</div> 
    
    <div class="text" onclick="select_search()">
    <span id="srch-text">Last 30 Days</span>&nbsp;<i class="fa fa-sort-down (alias)"></i>
    <div class="srch-select">
    <div id="srch-today" onclick="get_load_stock_report('srch-today', 'load_stock_report', 'view_today_search');">Today</div>
    <div id="srch-week" onclick="get_load_stock_report('srch-week', 'load_stock_report', 'view_thisweek_search');">This Week</div>
    <div id="srch-7" onclick="get_load_stock_report('srch-7', 'load_stock_report', 'view_7days_search');">Last 7 Days</div>
    <div id="srch-month" onclick="get_load_stock_report('srch-month', 'load_stock_report', 'view_thismonth_search');">This Month</div>
    <div id="srch-30" onclick="get_load_stock_report('srch-30', 'load_stock_report', 'view_30days_search');">Last 30 Days</div>
    <div id="srch-90" onclick="get_load_stock_report('srch-90', 'load_stock_report', 'view_90days_search');">Last 90 Days</div>
    <div id="srch-year" onclick="get_load_stock_report('srch-year', 'load_stock_report', 'view_thisyear_search');">This Year</div>
    <div id="srch-1year" onclick="get_load_stock_report('srch-1year', 'load_stock_report', 'view_1year_search');">Last 1 Year</div>
    <div onclick="srch_custom('Custom Search')">Custom Search</div>
    </div>
    </div>
    
    <div class="text">
        <div class="custom-srch-div">
            <input id="datepicker-from" type="text" class="srchtxt" placeholder="From" title="Select Date From" />
            <input id="datepicker-to" type="text" class="srchtxt" placeholder="To" title="Select Date To"/>
            <button type="button" class="btn" onclick=" _fetch_custom_load_stock_report('load_stock_report','custom_search')">Apply</button>
        </div>
    </div>
    <br clear="all" />
    </div>

<div class="alert alert-success"><span><?php echo $product_cat_name; ?></span> / <span><?php echo $product_name; ?></span></div>

<div id="get-stock-report">
<?php 
            /// get presentation values
    $day30= date('F d Y', strtotime('today - 30 days'));
    $today= date('F d Y');	
    
    /// get chat values
        $db_day30= date('Y-m-d', strtotime('today - 30 days'));
        $db_today= date('Y-m-d');
        $view_report='';
        $check_code='load_stock_history';
        include 'sub-codes.php';
?>
</div>
</div>
</div>
<script language="javascript">
$('#datepicker-from').datetimepicker({
lang:'en',
timepicker:false,
format:'Y-m-d',
formatDate:'Y-M-d',
});

$('#datepicker-to').datetimepicker({
lang:'en',
timepicker:false,
format:'Y-m-d',
formatDate:'Y-M-d',
});
</script>

<?php }?>





















<?php if ($view_content=='outstanding_orders'){
$status_id='P';
?>
<div class="search-div" data-aos="fade-in" data-aos-duration="700">
<!--------------------------------all search select------------------------->
<input id="all_search_txt" onkeyup="_fetch_order_list('<?php echo $status_id;?>')" type="text" class="text_field full" placeholder="Search By ORDER ID..." title="Search By ORDER ID" />
</div>
 <div class="alert alert-success"> <span><i class="fa fa-shopping-basket"></i></span> UNPAID ORDER LIST</div>
    <div class="animated fadeIn" id="search-content">
    <?php 
$all_search_txt='';
$check_code='order-list';
require_once 'sub-codes.php';
?>
    <br clear="all" />
    </div>
<?php }?>

<?php if ($view_content=='pending_orders'){
$status_id='PP';
?>
<div class="search-div" data-aos="fade-in" data-aos-duration="700">
<!--------------------------------all search select------------------------->
<input id="all_search_txt" onkeyup="_fetch_order_list('<?php echo $status_id;?>')" type="text" class="text_field full" placeholder="Search By ORDER ID..." title="Search By ORDER ID" />
</div>
 <div class="alert alert-success"> <span><i class="fa fa-shopping-basket"></i></span>  UNPROCESSED ORDER LIST</div>
    <div class="animated fadeIn" id="search-content">
    <?php 
$all_search_txt='';
$check_code='order-list';
require_once 'sub-codes.php';
?>
    <br clear="all" />
    </div>
<?php }?>


<?php if ($view_content=='attending_orders'){
$status_id='PR';
?>
<div class="search-div" data-aos="fade-in" data-aos-duration="700">
<!--------------------------------all search select------------------------->
<input id="all_search_txt" onkeyup="_fetch_order_list('<?php echo $status_id;?>')" type="text" class="text_field full" placeholder="Search By ORDER ID..." title="Search By ORDER ID" />
</div>
 <div class="alert alert-success"> <span><i class="fa fa-shopping-basket"></i></span> LIST OF ORDER IN PROGRESS</div>
    <div class="animated fadeIn" id="search-content">
    <?php 
$all_search_txt='';
$check_code='order-list';
require_once 'sub-codes.php';
?>
    <br clear="all" />
    </div>
<?php }?>

<?php if ($view_content=='ready_orders'){
$status_id='RD';
?>
<div class="search-div" data-aos="fade-in" data-aos-duration="700">
<!--------------------------------all search select------------------------->
<input id="all_search_txt" onkeyup="_fetch_order_list('<?php echo $status_id;?>')" type="text" class="text_field full" placeholder="Search By ORDER ID..." title="Search By ORDER ID" />
</div>
 <div class="alert alert-success"> <span><i class="fa fa-shopping-basket"></i></span> LIST OF READY ORDER</div>
    <div class="animated fadeIn" id="search-content">
    <?php 
$all_search_txt='';
$check_code='order-list';
require_once 'sub-codes.php';
?>
    <br clear="all" />
    </div>
<?php }?>


<?php if ($view_content=='delivery_orders'){
$status_id='DL';
?>
<div class="search-div" data-aos="fade-in" data-aos-duration="700">
<!--------------------------------all search select------------------------->
<input id="all_search_txt" onkeyup="_fetch_order_list('<?php echo $status_id;?>')" type="text" class="text_field full" placeholder="Search By ORDER ID..." title="Search By ORDER ID" />
</div>
 <div class="alert alert-success"> <span><i class="fa fa-shopping-basket"></i></span> DELIVERED ORDER</div>
    <div class="animated fadeIn" id="search-content">
    <?php 
$all_search_txt='';
$check_code='order-list';
require_once 'sub-codes.php';
?>
    <br clear="all" />
    </div>
<?php }?>



<?php if($view_content=='get_order_items1'){
  $shopsession=$ids;	
  $array=$callclass->_get_order_summary_detail($conn, $shopsession);
  $fetch = json_decode($array, true);
  $order_status_id=$fetch[0]['status_id'];
  ?>


<div class="cart-back-div">
<div class="search-details" id="get_details">  
      <!--START SEARCH  -->
<div class="export-fetch-div" id="export-view">
  <div class="cart-items-div">
      <div class="inner-in">

<?php
$no=0;		
if($order_status_id=='P'){/// not yet paid;
$order_que= mysqli_query($conn,"SELECT * FROM add_to_cart_tab WHERE shop_session='$shopsession'");
}else{
$order_que= mysqli_query($conn,"SELECT * FROM add_to_cart_backup_tab WHERE order_id='$shopsession'");
}
while ($order_sel= mysqli_fetch_array($order_que)){
  $no++;
  $product_id=$order_sel['product_id'];
  $product_qty=$order_sel['product_qty'];
  $sub_price=$order_sel['sub_price'];
  $status_id=$order_sel['status_id'];

  $array=$callclass->_get_product_detail($conn, $product_id);
  $get_array = json_decode($array, true);
  $product_cat_id= $get_array[0]['product_cat_id'];
  $product_name= $get_array[0]['product_name'];
  
  $cat_array=$callclass->_get_product_cat_detail($conn, $product_cat_id);
  $get_cat_array = json_decode($cat_array, true);
  $product_cat_name= $get_cat_array[0]['product_cat_name'];
  
  $stock_array=$callclass->_get_stock_detail($conn, $product_id);
  $stock_fetch = json_decode($stock_array, true);
    $selling_price= $stock_fetch[0]['selling_price'];

    $pixquery=mysqli_query($conn,"SELECT * FROM product_pix_tab WHERE product_id='$product_id' ORDER BY RAND() LIMIT 1");
    $pixsel=mysqli_fetch_array($pixquery);
$product_pix=$pixsel['product_pix'];
?>
        
            <div class="table-content-div" id="item_<?php echo $product_id;?>">
                <div class="content-div-in">
                    <div class="title">ITEM <?php echo $no?>
                    <?php if($order_status_id!='P'){ ?>
        <?php if($status_id=='PP'){?>
                        <button class="btn" id="cart_<?php echo $product_id; ?>" onclick="_process_order_item('<?php echo $shopsession;?>','<?php echo $product_id;?>')"><i class="fa fa-check"></i> DONE</button>
                        <?php }else{?>
                        <button class="btn check"><i class="fa fa-check"></i></button>
                        <?php }?>
                     <?php }?>
                    </div>
                    
                    <div class="item-div">
                      <div class="item-pix-div"><img src="<?php echo $website;?>/uploaded_files/product-pix/<?php echo $product_pix;?>" alt="<?php echo $product_name;?>" /></div>
                        <div class="item-content-div">
                                <div class="detail-text">
                                    <span>PRODUCT NAME:</span><br />
                                   <?php echo ucwords(strtolower("$product_cat_name ($product_name)"));?>
                                </div>
                                <div class="detail-text">
                                    <span>PRICE PER UNIT:</span><br />
                                     <s>N</s> <?php echo number_format($selling_price,2);?>
                                </div>
                                 <div class="qty-div">
                                    Qty:  <span><?php echo $product_qty?></span> @ <span><s>N</s> <?php echo number_format($sub_price,2);?></span>
                                </div>
                               
                        </div>
                    <br clear="all" />
                    </div>
               
                </div>
            </div>
<?php } ?>
      <?php if($order_status_id=='PP'){?>
                <div class="bottom-container">
                <button class="export-btn" id="export-btn" onclick="_get_details('each_order_history_details','<?php echo $ids?>','export-btn','<?php echo $order_status_name_title?>','<?php echo $fullname?>')" title="Export Order">Export Order <i class="fa fa-file-excel-o"></i></button>
                </div>
        <?php }?>

        </div>
    </div>
    
    <div class="cart-invoice-div">
      <div class="inner-div">
       
      <?php
$array=$callclass->_get_order_summary_detail($conn, $shopsession);
$fetch = json_decode($array, true);
  $customer_id= $fetch[0]['user_id'];
  $nums_of_items= $fetch[0]['nums_of_items'];
  $sub_total=$fetch[0]['total_amount'];
  $logistic_id=$fetch[0]['logistic_id'];
  $address=$fetch[0]['address'];
  $delivery_date=$fetch[0]['delivery_date'];
  $delivery_time_id=$fetch[0]['delivery_time_id'];
  $delivery_otp=$fetch[0]['delivery_otp'];
  $order_status_id=$fetch[0]['status_id'];
  $staff_id=$fetch[0]['staff_id'];
  $delivery_staff_id=$fetch[0]['delivery_staff_id'];
  $date=$fetch[0]['date'];
  
  $status_array=$callclass->_get_setup_status_detail($conn, $order_status_id);
  $status_fetch = json_decode($status_array, true);
  $order_status_name= $status_fetch[0]['status_name'];
  
  $array=$callclass->_get_payment_id_for_order($conn, $shopsession);
  $fetch = json_decode($array, true);
  $pay_id= $fetch[0]['pay_id'];
  
  
  $fetch=$callclass->_get_user_detail($conn, $customer_id);
  $array = json_decode($fetch, true);
  $fullname= $array[0]['fullname'];
  $email= $array[0]['email'];
  $phone= $array[0]['phone'];
  
  $fetch=$callclass->_get_setup_logistics_details($conn, $logistic_id);
  $array = json_decode($fetch, true);
  $logistic_name= $array[0]['logistic_name'];
  
  $array=$callclass->_get_payment_detail($conn, $pay_id);
  $fetch = json_decode($array, true);
  $fund_method_id= $fetch[0]['fund_method_id'];
  $delivery_fee= $fetch[0]['delivery_fee'];
  $da_id= $fetch[0]['da_id'];
  $payment_status_id= $fetch[0]['status_id'];
  $total_amount= $fetch[0]['total_amount'];
  

  $fetch=$callclass->_get_delivery_area_details($conn, $da_id);
  $array = json_decode($fetch, true);
  $da_name= $array[0]['da_name'];
  
  
   $fetch=$callclass->_get_setup_delivery_time_details($conn, $delivery_time_id);
  $array = json_decode($fetch, true);
  $delivery_time_desc= $array[0]['delivery_time_desc'];
  

  $fetch=$callclass->_get_setup_fund_method_detail($conn, $fund_method_id);
  $array = json_decode($fetch, true);
  $fund_method_name= $array[0]['fund_method_name'];
  
  $status_array=$callclass->_get_setup_status_detail($conn, $payment_status_id);
  $status_fetch = json_decode($status_array, true);
  $payment_status_name= $status_fetch[0]['status_name'];
  
  $staff_array=$callclass->_get_staff_detail($conn, $staff_id);
  $staff_fetch = json_decode($staff_array, true);
  $staff_name= $staff_fetch[0]['fullname'];
  $staff_phone= $staff_fetch[0]['mobile'];
  
  $d_staff_array=$callclass->_get_staff_detail($conn, $delivery_staff_id);
  $d_staff_fetch = json_decode($d_staff_array, true);
  $delivery_staff_name= $d_staff_fetch[0]['fullname'];
  $delivery_staff_phone= $d_staff_fetch[0]['mobile'];
    ?>
        
        

          <div class="alert alert-success">
            <span>CUSTOMER DETAILS:</span>
                <div class="cart-statistics">Customer Name: <div class="value"><?php echo $fullname;?></div><br clear="all" /></div>
                <div class="cart-statistics">Email: <div class="value"><?php echo $email;?></div><br clear="all" /></div>
                <div class="cart-statistics">Phone Number: <div class="value"><?php echo $phone;?></div><br clear="all" /></div>
            </div>

          <div class="alert alert-success">
            <span>ORDER DETAILS:</span>
                <div class="cart-statistics">Order ID: <div class="value"><?php echo $shopsession;?></div><br clear="all" /></div>
                <div class="cart-statistics">Selected Items: <div class="value"><?php echo $nums_of_items;?></div><br clear="all" /></div>
                <div class="cart-statistics">Sub Total: <div class="value">NGN <?php echo number_format($sub_total,2);?></div><br clear="all" /></div>
                <div class="cart-statistics">Order Status: <div class="value"><?php echo $order_status_name;?></div><br clear="all" /></div>
            </div>

          <div class="alert alert-success">
            <span>LOGISTIC DETAILS:</span>
                <div class="cart-statistics">Logistic Type: <div class="value"><?php echo $logistic_name;?></div><br clear="all" /></div>
                <div class="cart-statistics">Delivery Fee: <div class="value">NGN <?php echo number_format($delivery_fee,2);?></div><br clear="all" /></div>
                  <div class="cart-statistics">Delivery Area: <div class="value"><?php echo $da_name;?></div><br clear="all" /></div>
                 <div class="cart-statistics">Address: <div class="value"><?php echo $address;?></div><br clear="all" /></div>
                <div class="cart-statistics">Delivery Date: <div class="value"><?php echo $delivery_date;?></div><br clear="all" /></div>
                <div class="cart-statistics">Delivery Time: <div class="value"><?php echo $delivery_time_desc;?></div><br clear="all" /></div>
            </div>
          <div class="alert alert-success">
            <span>PAYMENT DETAILS:</span>
                <div class="cart-statistics">Transaction ID: <div class="value"><?php echo $pay_id;?></div><br clear="all" /></div>
                <div class="cart-statistics">Total Amount: <div class="value">NGN <?php echo number_format($total_amount,2);?></div><br clear="all" /></div>
                <div class="cart-statistics">Payment Method: <div class="value"><?php echo $fund_method_name;?></div><br clear="all" /></div>
                <div class="cart-statistics">Payment Status: <div class="value"><?php echo $payment_status_name;?></div><br clear="all" /></div>
            </div>
             <?php if ($order_status_id=='P'){?>
         <div class="btn-div">
                <button class="btn" onclick="_confirm_order_payment('<?php echo $shopsession;?>')" id="confirm-payment-btn"><i class="fa fa-check"></i> CONFIRM PAYMENT</button>
                <button class="btn download" onclick="_decline_order('<?php echo $shopsession;?>')" id="decline-payment-btn"><i class="fa fa-close"></i> DECLINE PAYMENT</button>
            </div>
            <?php }?>
            <?php if ($staff_id!=''){?>
          <div class="alert alert-success">
            <span>ATTENDANT DETAILS:</span>
                <div class="cart-statistics">Staff ID: <div class="value"><?php echo $staff_id;?></div><br clear="all" /></div>
                <div class="cart-statistics">Staff Name: <div class="value"><?php echo $staff_name;?></div><br clear="all" /></div>
                <div class="cart-statistics">Phone Number: <div class="value"><?php echo $staff_phone;?></div><br clear="all" /></div>
            </div>
  <?php }?>
            <?php if ($order_status_id=='RD'){?>
              <div class="form-title">DELIVERY OTP:</div>
              <input class="text_field" placeholder="DELIVERY OTP" id="delivery_otp"/>
            <div class="btn-div">
                <button class="btn" onclick="_confirm_delivery('<?php echo $shopsession;?>','<?php echo $pay_id;?>')" id="confirm-btn"><i class="fa fa-check"></i> CONFIRM</button>
                <button class="btn download" onclick="_resend_delivery_otp('<?php echo $shopsession;?>','<?php echo $pay_id;?>')" id="resend-otp-btn"><i class="fa fa-send"></i> RE-SEND OTP</button>
            </div>
            <?php }?>
            <?php if ($order_status_id=='DL'){?>
          <div class="alert alert-success">
            <span>DELIVERY AGENT DETAILS:</span>
                <div class="cart-statistics">Agent ID: <div class="value"><?php echo $delivery_staff_id;?></div><br clear="all" /></div>
                <div class="cart-statistics">Agent Name: <div class="value"><?php echo $delivery_staff_name;?></div><br clear="all" /></div>
                <div class="cart-statistics">Phone Number: <div class="value"><?php echo $delivery_staff_phone;?></div><br clear="all" /></div>
            </div>
  <?php }?>
            
        </div>
   </div>
<br clear="all" />
</div>
</div>
</div>

<?php }?>










<?php if($view_content=='get_order_items'){
  $shopsession=$ids;	
  $array=$callclass->_get_order_summary_detail($conn, $shopsession);
  $fetch = json_decode($array, true);
  $customer_id= $fetch[0]['user_id'];
  $order_status_id=$fetch[0]['status_id'];

  $fetch=$callclass->_get_user_detail($conn, $customer_id);
  $array = json_decode($fetch, true);
  $fullname= $array[0]['fullname'];
  if ($order_status_id=='DL'){$order_status_name_title='DELIVERED ORDER';}elseif($order_status_id=='P'){$order_status_name_title='UNPAID ORDER';}elseif($order_status_id=='PP'){$order_status_name_title='UNPROCESSED ORDER';}elseif($order_status_id=='PR'){$order_status_name_title='ORDER IN PROGRESS';}else{$order_status_name_title='READY ORDER';}
?>
<div class="caption-div order-details-caption animated fadeIn">
  <!-- NEW UPDATE -->
  <?php if($order_status_id=='PP'){?>
  <div class="title-div"><span id="order-title" onclick="_prev_page();"><i class="fa fa-shopping-basket"></i></span> <span id="page-title2">ORDER DETIALS </span> <div class="close" onclick="alert_close()"><i class="fa fa-close"></i></div> </div>
  <?php } else {?>
    <div class="title-div"><i class="fa fa-shopping-basket"></i> <span id="page-title2">ORDER DETIALS </span> <div class="close" onclick="alert_close()"><i class="fa fa-close"></i></div> </div>
  <?php }?>
<!-- NEW UPDATE -->
<div class="order-details-caption-div">
<div class="div-in">

<div class="cart-back-div">
<div class="search-details" id="get_details">  
      <!--START SEARCH  -->
<div class="export-fetch-div" id="export-view">
  <div class="cart-items-div">
      <div class="inner-in">

<?php
$no=0;		
if($order_status_id=='P'){/// not yet paid;
$order_que= mysqli_query($conn,"SELECT * FROM add_to_cart_tab WHERE shop_session='$shopsession'");
}else{
$order_que= mysqli_query($conn,"SELECT * FROM add_to_cart_backup_tab WHERE order_id='$shopsession'");
}
while ($order_sel= mysqli_fetch_array($order_que)){
  $no++;
  $product_id=$order_sel['product_id'];
  $product_qty=$order_sel['product_qty'];
  $sub_price=$order_sel['sub_price'];
  $status_id=$order_sel['status_id'];

  $array=$callclass->_get_product_detail($conn, $product_id);
  $get_array = json_decode($array, true);
  $product_cat_id= $get_array[0]['product_cat_id'];
  $product_name= $get_array[0]['product_name'];
  
  $cat_array=$callclass->_get_product_cat_detail($conn, $product_cat_id);
  $get_cat_array = json_decode($cat_array, true);
  $product_cat_name= $get_cat_array[0]['product_cat_name'];
  
  $stock_array=$callclass->_get_stock_detail($conn, $product_id);
  $stock_fetch = json_decode($stock_array, true);
    $selling_price= $stock_fetch[0]['selling_price'];

    $pixquery=mysqli_query($conn,"SELECT * FROM product_pix_tab WHERE product_id='$product_id' ORDER BY RAND() LIMIT 1");
    $pixsel=mysqli_fetch_array($pixquery);
    $product_pix=$pixsel['product_pix'];
?>
        
            <div class="table-content-div" id="item_<?php echo $product_id;?>">
                <div class="content-div-in">
                    <div class="title">ITEM <?php echo $no?>
                    <?php if($order_status_id!='P'){ ?>
        <?php if($status_id=='PP'){?>
                        <button class="btn" id="cart_<?php echo $product_id; ?>" onclick="_process_order_item('<?php echo $shopsession;?>','<?php echo $product_id;?>')"><i class="fa fa-check"></i> DONE</button>
                        <?php }else{?>
                        <button class="btn check"><i class="fa fa-check"></i></button>
                        <?php }?>
                     <?php }?>
                    </div>
                    
                    <div class="item-div">
                      <div class="item-pix-div"><img src="<?php echo $website;?>/uploaded_files/product-pix/<?php echo $product_pix;?>" alt="<?php echo $product_name;?>" /></div>
                        <div class="item-content-div">
                                <div class="detail-text">
                                    <span>PRODUCT NAME:</span><br />
                                   <?php echo ucwords(strtolower("$product_cat_name ($product_name)"));?>
                                </div>
                                <div class="detail-text">
                                    <span>PRICE PER UNIT:</span><br />
                                     <s>N</s> <?php echo number_format($selling_price,2);?>
                                </div>
                                 <div class="qty-div">
                                    Qty:  <span><?php echo $product_qty?></span> @ <span><s>N</s> <?php echo number_format($sub_price,2);?></span>
                                </div>
                               
                        </div>
                    <br clear="all" />
                    </div>
               
                </div>
            </div>
<?php } ?>
      <?php if($order_status_id=='PP'){?>
                <div class="bottom-container">
                <button class="export-btn" id="export-btn" onclick="_get_details('each_order_history_details','<?php echo $ids?>','export-btn','<?php echo $order_status_name_title?>','<?php echo $fullname?>')" title="Export Order">Export Order <i class="fa fa-file-excel-o"></i></button>
                </div>
        <?php }?>
        <br/>
        </div>
    </div>
    
    <div class="cart-invoice-div">
      <div class="inner-div">
       
      <?php
$array=$callclass->_get_order_summary_detail($conn, $shopsession);
$fetch = json_decode($array, true);
  $customer_id= $fetch[0]['user_id'];
  $nums_of_items= $fetch[0]['nums_of_items'];
  $sub_total=$fetch[0]['total_amount'];
  $logistic_id=$fetch[0]['logistic_id'];
  $address=$fetch[0]['address'];
  $delivery_date=$fetch[0]['delivery_date'];
  $delivery_time_id=$fetch[0]['delivery_time_id'];
  $delivery_otp=$fetch[0]['delivery_otp'];
  $order_status_id=$fetch[0]['status_id'];
  $staff_id=$fetch[0]['staff_id'];
  $delivery_staff_id=$fetch[0]['delivery_staff_id'];
  $date=$fetch[0]['date'];
  
  $status_array=$callclass->_get_setup_status_detail($conn, $order_status_id);
  $status_fetch = json_decode($status_array, true);
  $order_status_name= $status_fetch[0]['status_name'];
  
  $array=$callclass->_get_payment_id_for_order($conn, $shopsession);
  $fetch = json_decode($array, true);
  $pay_id= $fetch[0]['pay_id'];
  
  
  $fetch=$callclass->_get_user_detail($conn, $customer_id);
  $array = json_decode($fetch, true);
  $fullname= $array[0]['fullname'];
  $email= $array[0]['email'];
  $phone= $array[0]['phone'];
  
  $fetch=$callclass->_get_setup_logistics_details($conn, $logistic_id);
  $array = json_decode($fetch, true);
  $logistic_name= $array[0]['logistic_name'];
  
  $array=$callclass->_get_payment_detail($conn, $pay_id);
  $fetch = json_decode($array, true);
  $fund_method_id= $fetch[0]['fund_method_id'];
  $delivery_fee= $fetch[0]['delivery_fee'];
  $da_id= $fetch[0]['da_id'];
  $payment_status_id= $fetch[0]['status_id'];
  $total_amount= $fetch[0]['total_amount'];
  
  $fetch=$callclass->_get_delivery_area_details($conn, $da_id);
  $array = json_decode($fetch, true);
  $da_name= $array[0]['da_name'];
  
  $fetch=$callclass->_get_setup_delivery_time_details($conn, $delivery_time_id);
  $array = json_decode($fetch, true);
  $delivery_time_desc= $array[0]['delivery_time_desc'];

  $fetch=$callclass->_get_setup_fund_method_detail($conn, $fund_method_id);
  $array = json_decode($fetch, true);
  $fund_method_name= $array[0]['fund_method_name'];
  
  $status_array=$callclass->_get_setup_status_detail($conn, $payment_status_id);
  $status_fetch = json_decode($status_array, true);
  $payment_status_name= $status_fetch[0]['status_name'];
  
  $staff_array=$callclass->_get_staff_detail($conn, $staff_id);
  $staff_fetch = json_decode($staff_array, true);
  $staff_name= $staff_fetch[0]['fullname'];
  $staff_phone= $staff_fetch[0]['mobile'];
  
  $d_staff_array=$callclass->_get_staff_detail($conn, $delivery_staff_id);
  $d_staff_fetch = json_decode($d_staff_array, true);
  $delivery_staff_name= $d_staff_fetch[0]['fullname'];
  $delivery_staff_phone= $d_staff_fetch[0]['mobile'];
?>
        
        

          <div class="alert alert-success">
            <span>CUSTOMER DETAILS:</span>
                <div class="cart-statistics">Customer Name: <div class="value"><?php echo $fullname;?></div><br clear="all" /></div>
                <div class="cart-statistics">Email: <div class="value"><?php echo $email;?></div><br clear="all" /></div>
                <div class="cart-statistics">Phone Number: <div class="value"><?php echo $phone;?></div><br clear="all" /></div>
            </div>

          <div class="alert alert-success">
            <span>ORDER DETAILS:</span>
                <div class="cart-statistics">Order ID: <div class="value"><?php echo $shopsession;?></div><br clear="all" /></div>
                <div class="cart-statistics">Selected Items: <div class="value"><?php echo $nums_of_items;?></div><br clear="all" /></div>
                <div class="cart-statistics">Sub Total: <div class="value">NGN <?php echo number_format($sub_total,2);?></div><br clear="all" /></div>
                <div class="cart-statistics">Order Status: <div class="value"><?php echo $order_status_name;?></div><br clear="all" /></div>
            </div>

          <div class="alert alert-success">
            <span>LOGISTIC DETAILS:</span>
                <div class="cart-statistics">Logistic Type: <div class="value"><?php echo $logistic_name;?></div><br clear="all" /></div>
                <div class="cart-statistics">Delivery Fee: <div class="value">NGN <?php echo number_format($delivery_fee,2);?></div><br clear="all" /></div>
                 <div class="cart-statistics">Delivery Area: <div class="value"><?php echo $da_name;?></div><br clear="all" /></div>
                <div class="cart-statistics">Address: <div class="value"><?php echo $address;?></div><br clear="all" /></div>
                <div class="cart-statistics">Delivery Date: <div class="value"><?php echo $delivery_date;?></div><br clear="all" /></div>
                <div class="cart-statistics">Delivery Time: <div class="value"><?php echo $delivery_time_desc;?></div><br clear="all" /></div>
            </div>
          <div class="alert alert-success">
            <span>PAYMENT DETAILS:</span>
                <div class="cart-statistics">Transaction ID: <div class="value"><?php echo $pay_id;?></div><br clear="all" /></div>
                <div class="cart-statistics">Total Amount: <div class="value">NGN <?php echo number_format($total_amount,2);?></div><br clear="all" /></div>
                <div class="cart-statistics">Payment Method: <div class="value"><?php echo $fund_method_name;?></div><br clear="all" /></div>
                <div class="cart-statistics">Payment Status: <div class="value"><?php echo $payment_status_name;?></div><br clear="all" /></div>
            </div>
             <?php if ($order_status_id=='P'){?>
         <div class="btn-div">
                <button class="btn" onclick="_confirm_order_payment('<?php echo $shopsession;?>')" id="confirm-payment-btn"><i class="fa fa-check"></i> CONFIRM PAYMENT</button>
                <button class="btn download" onclick="_decline_order('<?php echo $shopsession;?>')" id="decline-payment-btn"><i class="fa fa-close"></i> DECLINE PAYMENT</button>
            </div>
            <?php }?>
            <?php if ($staff_id!=''){?>
          <div class="alert alert-success">
            <span>ATTENDANT DETAILS:</span>
                <div class="cart-statistics">Staff ID: <div class="value"><?php echo $staff_id;?></div><br clear="all" /></div>
                <div class="cart-statistics">Staff Name: <div class="value"><?php echo $staff_name;?></div><br clear="all" /></div>
                <div class="cart-statistics">Phone Number: <div class="value"><?php echo $staff_phone;?></div><br clear="all" /></div>
            </div>
  <?php }?>
            <?php if ($order_status_id=='RD'){?>
              <div class="form-title">DELIVERY OTP:</div>
              <input class="text_field" placeholder="DELIVERY OTP" id="delivery_otp"/>
            <div class="btn-div">
                <button class="btn" onclick="_confirm_delivery('<?php echo $shopsession;?>','<?php echo $pay_id;?>')" id="confirm-btn"><i class="fa fa-check"></i> CONFIRM</button>
                <button class="btn download" onclick="_resend_delivery_otp('<?php echo $shopsession;?>','<?php echo $pay_id;?>')" id="resend-otp-btn"><i class="fa fa-send"></i> RE-SEND OTP</button>
            </div>
            <?php }?>
            <?php if ($order_status_id=='DL'){?>
          <div class="alert alert-success">
            <span>DELIVERY AGENT DETAILS:</span>
                <div class="cart-statistics">Agent ID: <div class="value"><?php echo $delivery_staff_id;?></div><br clear="all" /></div>
                <div class="cart-statistics">Agent Name: <div class="value"><?php echo $delivery_staff_name;?></div><br clear="all" /></div>
                <div class="cart-statistics">Phone Number: <div class="value"><?php echo $delivery_staff_phone;?></div><br clear="all" /></div>
            </div>
  <?php }?>
            
        </div>
   </div>
<br clear="all" />
</div>
</div>
</div>
</div>
</div>

</div>

<?php }?>


























<?php if ($view_content=='all_blogs'){
$create='BLOG';

?>
 <div class="alert alert-success" style="margin-bottom:0px;"> <span><i class="fa fa-newspaper-o"></i></span> PUBLICATIONS / ARTICLES <button class="btn" onClick="_get_form('create-article')"><i class="fa fa-plus"></i> CREATE A NEW ARTICLE</button></div>

    
    <div class="search-div" data-aos="fade-in" data-aos-duration="700">
         <select id="user_id"  class="text_field select" onchange="_fetch_publish_list('fetch_blog_list')">
         <option value="" selected="selected">All Users</option>
               <?php 
           $user_query= mysqli_query($conn,"SELECT distinct(user_id) FROM blog_tab");
          while($user_sel=mysqli_fetch_array($user_query)){
          $users_id=$user_sel[0];
    $fatch=$callclass->_get_staff_detail($conn, $users_id);
      $array = json_decode($fatch, true);
      $fullname= $array[0]['fullname'];
           ?>
             <option value="<?php echo $users_id;?>"><?php echo $fullname;?></option>
              <?php }?>
        </select>
        
         <select id="cat_id"  class="text_field select" onchange="_fetch_publish_list('fetch_blog_list')">
         <option value="" selected="selected">All Categories</option>
               <?php 
           $cat_query= mysqli_query($conn,"SELECT distinct(cat_id) FROM blog_tab");
          while($cat_sel=mysqli_fetch_array($cat_query)){
          $cat_ids=$cat_sel[0];
        $fatch=$callclass->_get_setup_category_detail($conn, $cat_ids);
          $array = json_decode($fatch, true);
          $cat_names= $array[0]['cat_name'];
           ?>
             <option value="<?php echo $cat_ids;?>"><?php echo $cat_names;?></option>
              <?php }?>
        </select>
        
         <select id="status_id"  class="text_field select" onchange="_fetch_publish_list('fetch_blog_list')">
         <option value="" selected="selected">All Status</option>
               <?php 
           $status_query= mysqli_query($conn,"SELECT distinct(status_id) FROM blog_tab ORDER BY status_id ASC");
          while($status_sel=mysqli_fetch_array($status_query)){
          $status_id=$status_sel[0];
  if ($status_id=='PUB'){$status_name='ACTIVE';}else{$status_name='INACTIVE';}
           ?>
             <option value="<?php echo $status_id;?>"><?php echo $status_name;?></option>
              <?php }?>
        </select>
        
    <!--------------------------------all search select------------------------->
    <input id="all_search_txt" onkeyup="_fetch_publish_list('fetch_blog_list')" type="text" class="text_field full" placeholder="Type here to search..." title="Type here to search" />
    </div>
    

<div class="blog-back-div animated fadeIn" id="search-content">
  
<?php 
$cat_id='';
$status_id='';
$user_id='';
$all_search_txt='';
$check_code='blog-list';
?>
<?php include 'sub-codes.php'?>
</div>
<?php } ?>



<?php if($view_content=='create-article'){?>

<div class="caption-div blog-pane animated fadeInUp">
<div class="title-div">CREATE A NEW ARTICLE<div class="close" onclick="alert_close()"><i class="fa fa-close"></i></div></div>
<div class="pad-blog-content">
<div class="blog-pane-div-in sb-container">
          <div class="left-div">

                  <div class="alert">Fill this form to create a <span>NEW BLOG</span></div>
                      <div class="title"> SELECT BLOG CATEGORY:</div>
                              <select id="blog_cat_id"  class="text_field selectinput" style="background:#fff;">
                              <option value="" selected="selected">Select Blog Category</option>
                  <?php 
                            $cat_query= mysqli_query($conn,"SELECT * FROM setup_categories_tab WHERE links='BLOG'");
                            while($cat_sel=mysqli_fetch_array($cat_query)){
                            $cat_id=$cat_sel['cat_id'];
                            $cat_desc=$cat_sel['cat_desc'];
                            ?>
                              <option value="<?php echo $cat_id;?>"><?php echo $cat_desc;?></option>
                                <?php }?>
                              </select>     
                                            
                      <div class="title"> BLOG TITLE:</div>
                      <input id="blog_title" type="text" class="text_field" placeholder="Type Blog Title Here..." title="Type Blog Title Here" />
                      
                      <div class="title"> BLOG URL:</div>
                      <input class="text_field"  type="text" id="blog_url"  title="Blog Url" placeholder="Blog Url"/>
                      
                      <div class="title"> SEO KEYWORDS:</div>
                      <textarea class="text_field" rows="2"  id="seo_keywords"  title="Seo Keywords" placeholder="Seo Keywords"></textarea>
                    
                      <div class="title"> SEO DESCRIPTION:</div>
                      <textarea class="text_field" rows="2" maxlength="160"  id="seo_describtion"  title="Seo Description" placeholder="Seo Description"></textarea>
                      
                    
                      <div class="title"> UPLOAD BLOG PICTURE:</div>
                      <div id="thumbnail">
                      <label>
                      <img src="../../uploaded_files/blog-pix/thumbnail.jpg" id="blog-pix"/>
                      <input type="file" name="inputfile" id="blog_pix" accept=".jpg"  onchange="Blogpix.UpdatePreview(this);" style="display:none;"/>
                      </label>
                      </div>
          </div>



          <div class="right-div">
                      <div class="title"> BLOG DETAILS:</div>
                      <script src="js/TextEditor.js" referrerpolicy="origin"></script>
                        <script>tinymce.init({selector:'#blog_detail',  // change this value according to your HTML
                          plugins: "link"
                        });
                      </script>
                      <textarea class="text_field" style="width:100%;" rows="20" id="blog_detail" title="Type Blog Detail Here" placeholder="Type Blog Detail Here"></textarea>

                      <div class="title"> SELECT BLOG STATUS:</div>
                              <select id="blog_status_id"  class="text_field selectinput">
                              <option value="" selected="selected">Select Blog Status</option>
                      <?php 
                                    $status_query= mysqli_query($conn,"SELECT * FROM setup_status_tab WHERE status_id IN ('PUB', 'UNP')");
                                    while($status_sel=mysqli_fetch_array($status_query)){
                                    $status_id=$status_sel['status_id'];
                                    $status_name=$status_sel['status_name'];
                                    ?>
                                      <option value="<?php echo $status_id;?>"><?php echo $status_name;?></option>
                                        <?php }?>
                              </select>
                        <div class="btn-div">     
                      <button class="btn" id="blog-btn" onclick="_blog_reg('blog_reg','');"> <i class="fa fa-check"></i> SUBMIT </button>
                      </div>
     
          </div>
 

</div>
</div>
</div>


<?php }?>




<?php if ($view_content=='get_blog_details'){
    $blogquery=mysqli_query($conn,"SELECT * FROM blog_tab  WHERE blog_id='$blog_id'")or die ('cannot select blog_tab');
    $blog_sel=mysqli_fetch_array($blogquery);
  $blog_id=$blog_sel['blog_id'];
  $blog_cat_id=$blog_sel['cat_id'];
  $blog_detail=$blog_sel['blog_detail'];
  $blog_title = $blog_sel['blog_title'];
  $seo_keywords = $blog_sel['seo_keywords'];
  $seo_describtion = $blog_sel['seo_describtion'];
  $blog_url = $blog_sel['blog_url'];
  $blog_status_id=$blog_sel['status_id'];

  $user_id=$blog_sel['user_id'];
  $user_name=$blog_sel['user_name'];
  $blog_pix=$blog_sel['blog_pix'];
  $blog_views=$blog_sel['views'];
  $blog_date_of_reg=date('d M Y h : i : s', strtotime($blog_sel['blog_date_of_reg']));
  $blog_last_updated=date('d M Y h : i : s', strtotime($blog_sel['blog_last_updated']));
   
  $query=$callclass->_get_setup_status_detail($conn, $blog_status_id);
  $array = json_decode($query, true);
  $blog_status_name= $array[0]['status_name'];
  
    $fetch=$callclass->_get_setup_category_detail($conn, $blog_cat_id);
    $array = json_decode($fetch, true);
    $blog_cat_name= $array[0]['cat_name'];
    
    

?>
<div class="caption-div blog-pane animated fadeInUp">
<div class="title-div">UPDATE THIS ARTICLE<div class="close" onclick="alert_close()"><i class="fa fa-close"></i></div></div>
<div class="blog-pane-div-in sb-container">
<div class="pad-blog-content">
<div class="left-div">
        <div class="alert">Fill this form to create a <span>NEW BLOG</span></div>
            <div class="title"> SELECT BLOG CATEGORY:</div>
                    <select id="blog_cat_id"  class="text_field selectinput">
                     <option value="<?php echo $blog_cat_id;?>" selected="selected"><?php echo $blog_cat_name;?></option>
         <?php 
                   $cat_query= mysqli_query($conn,"SELECT * FROM setup_categories_tab WHERE links='BLOG'");
                  while($cat_sel=mysqli_fetch_array($cat_query)){
                  $cat_id=$cat_sel['cat_id'];
                  $cat_desc=$cat_sel['cat_desc'];
                   ?>
                     <option value="<?php echo $cat_id;?>"><?php echo $cat_desc;?></option>
                      <?php }?>
                    </select>     
        
                                   
            <div class="title"> BLOG TITLE:</div>
            <input id="blog_title" value="<?php echo $blog_title;?>" type="text" class="text_field" placeholder="Type Blog Title Here..." title="Type Blog Title Here" />
            
            <div class="title"> BLOG URL:</div>
            <input class="text_field"  type="text" id="blog_url"  value="<?php echo $blog_url;?>"  title="Blog Url" placeholder="Blog Url"/>
             
            <div class="title"> SEO KEYWORDS:</div>
            <textarea class="text_field" rows="2"  id="seo_keywords"  title="Seo Keywords" placeholder="Seo Keywords"><?php echo $seo_keywords;?></textarea>
                    
            <div class="title"> BLOG DESCRIPTION:</div>
            <textarea class="text_field" rows="2"  id="seo_describtion" title="Blog Description" placeholder="Blog Description"><?php echo $seo_describtion;?></textarea>
             
          

            <div class="title"> UPLOAD SOCIAL MEDIA THUMBNAIL:</div>
            <div id="thumbnail">
            <label>
            <img src="<?php echo $website?>/uploaded_files/blog-pix/<?php echo $blog_pix; ?>" id="blog-pix"/>
            <input type="file" name="inputfile" id="blog_pix" accept=".jpg"  onchange="Blogpix.UpdatePreview(this);" style="display:none;"/>
            </label>
            </div>
</div>



<div class="right-div">
            <div class="title"> BLOG DETAILS:</div>
  <script src="js/TextEditor.js" referrerpolicy="origin"></script>
              <script>tinymce.init({selector:'#blog_detail',  // change this value according to your HTML
                plugins: "link"
              });</script>
            <textarea class="text_field" style="width:100%;" rows="20" id="blog_detail" title="Type Blog Detail Here" placeholder="Type Blog Detail Here"><?php echo $blog_detail; ?></textarea>

            <div class="title"> SELECT BLOG STATUS:</div>
                    <select id="blog_status_id"  class="text_field selectinput">
                     <option value="<?php echo $blog_status_id;?>" selected="selected"><?php echo $blog_status_name;?></option>
             <?php 
                           $status_query= mysqli_query($conn,"SELECT * FROM setup_status_tab WHERE status_id IN ('PUB', 'UNP') ");
                          while($status_sel=mysqli_fetch_array($status_query)){
                          $status_id=$status_sel['status_id'];
                          $status_name=$status_sel['status_name'];
                           ?>
                             <option value="<?php echo $status_id;?>"><?php echo $status_name;?></option>
                              <?php }?>
                    </select>
              <div class="btn-div">     
             <button class="btn" id="blog-btn" onclick="_blog_reg('blog_update','<?php echo $blog_id;?>');"> <i class="fa fa-check"></i> UPDATE </button>
             </div>
 
</div>


</div>
</div>
</div>

<?php }?>



















<?php if ($view_content=='all_faqs'){?>
<div class="search-div" data-aos="fade-in" data-aos-duration="700">
<!--------------------------------all search select------------------------->
<input id="all_search_txt" onkeyup="_fetch_faq_list()" type="text" class="text_field full" placeholder="Type here to search..." title="Type here to search" />
</div>
<div class="blog-back-div animated fadeIn" id="search-content" style="padding-top:0px;">
    <?php 
$all_search_txt='';
$check_code='faq-list';
require_once 'sub-codes.php';
?>
    <br clear="all" />
</div>
<?php }?>




<?php if($view_content=='get_faq_form'){?>
<div class="caption-div faq-caption animated fadeInUp">
<div class="title-div"><i class="fa fa-question"></i> <?php echo $exam_id; ?> FAQ <div class="close" onclick="alert_close()"><i class="fa fa-close"></i></div></div>            
    <div class="faq-content-div">
    <div class="div-in">
    
<div class="alert">Fill the form below to <span>ADD NEW FAQ</span> </div>
<div class="title">QUESTION:<span>*</span></div>
<div class="text-field-div">
<input class="text_field" type="text" placeholder="Type Question Here" title="Question" id="question"/>
</div>
<div class="title"> ANSWER:<span>*</span></div>
<script src="js/TextEditor.js" referrerpolicy="origin"></script>
  <script>tinymce.init({selector:'#answer',  // change this value according to your HTML
    plugins: "link"
  });</script>
<textarea class="text_field" style="width:100%;" rows="20" id="answer" title="Type Answer Here" placeholder="Type Answer Here"></textarea>
        <div class="btn-div">
                <button class="btn" type="button" id="add-faq-btn" onclick="_register_faqq('');"> SUBMIT <i class="fa fa-check"></i></button>
          </div>

    </div>
    </div>
</div>
<?php }?>

<?php if($view_content=='get_update_faq_form'){
        $faq_id=$ids;

$query=mysqli_query($conn,"SELECT * FROM faq_tab WHERE faq_id='$faq_id'");
$fetch=mysqli_fetch_array($query);
   $no++;
   $faq_id=$fetch['faq_id'];
  $answer=$fetch['answer'];
    $fetch=$callclass->_get_faq_detail($conn, $faq_id);
      $array = json_decode($fetch, true);
      $question= $array[0]['question'];
      $staff_id= $array[0]['staff_id'];
      $date= $array[0]['date'];
$fetch=$callclass->_get_user_detail($conn, $staff_id);
$array = json_decode($user_array, true);
$staff_name= $array[0]['fullname'];

?>
<div class="caption-div faq-caption animated fadeInUp">
<div class="title-div"><i class="fa fa-question"></i> UPDATE FAQ <div class="close" onclick="alert_close()"><i class="fa fa-close"></i></div></div>            
    <div class="faq-content-div">
    <div class="div-in">
    
<div class="alert">Fill the form below to <span>ADD NEW FAQ</span> </div>
<div class="title">QUESTION:<span>*</span></div>
<div class="text-field-div">
<input class="text_field" type="text" placeholder="Type Question Here" title="Question" id="question" value="<?php echo $question; ?>"/>
</div>
<div class="title"> ANSWER:<span>*</span></div>
<script src="js/TextEditor.js" referrerpolicy="origin"></script>
  <script>tinymce.init({selector:'#answer',  // change this value according to your HTML
    plugins: "link"
  });</script>
<textarea class="text_field" style="width:100%;" rows="20" id="answer" title="Type Answer Here" placeholder="Type Answer Here"><?php echo $answer; ?></textarea>
<div class="alert alert-success">This FAQ was updated by <span><?php echo $staff_name;?></span> on <span><?php echo $date;?></span></div>
        <div class="btn-div">
                <button class="btn" type="button" id="add-faq-btn" onclick="_register_faq('<?php echo $faq_id; ?>');"> SUBMIT <i class="fa fa-check"></i></button>
          </div>

    </div>
    </div>
</div>
<?php }?>



























<?php if ($view_content=='newsletter'){?>
    <div class="search-div" data-aos="fade-in" data-aos-duration="700">
    <!--------------------------------all search select------------------------->
    <input id="all_search_txt" onkeyup="_fetch_news_letter_list()" type="text" class="text_field full" placeholder="Type here to search..." title="Type here to search" />
    </div>
 <div class="alert alert-success"> <span><i class="fa fa-envelope"></i></span> NEWSLETTER SUBSCRIBERS <button class="btn" onclick="exportTableToExcel('transaction-table','latestNewsletterSubscribers')"><i class="fa fa-file-excel-o"></i> EXPORT</button></div>
    <div class="animated fadeIn" id="search-content">
    <?php
$check_code='news_letter_list';
require_once 'sub-codes.php';
?>
    <br clear="all" />
    </div>
<?php } ?>













<?php if ($view_content=='report'){?>
    <div class="chart-div-notifications">
            <div class="text"><i class="fa fa-line-chart"></i> Showing Matrix for</div> 
            
            <div class="text" onclick="select_search()">
            <span id="srch-text">Last 30 Days</span>&nbsp;<i class="fa fa-sort-down (alias)"></i>
            <div class="srch-select">
            <div id="srch-today" onclick="get_payment_report('srch-today', 'payment_report', 'view_today_search');">Today</div>
            <div id="srch-week" onclick="get_payment_report('srch-week', 'payment_report', 'view_thisweek_search');">This Week</div>
            <div id="srch-7" onclick="get_payment_report('srch-7', 'payment_report', 'view_7days_search');">Last 7 Days</div>
            <div id="srch-month" onclick="get_payment_report('srch-month', 'payment_report', 'view_thismonth_search');">This Month</div>
            <div id="srch-30" onclick="get_payment_report('srch-30', 'payment_report', 'view_30days_search');">Last 30 Days</div>
            <div id="srch-90" onclick="get_payment_report('srch-90', 'payment_report', 'view_90days_search');">Last 90 Days</div>
            <div id="srch-year" onclick="get_payment_report('srch-year', 'payment_report', 'view_thisyear_search');">This Year</div>
            <div id="srch-1year" onclick="get_payment_report('srch-1year', 'payment_report', 'view_1year_search');">Last 1 Year</div>
            <div onclick="srch_custom('Custom Search')">Custom Search</div>
            </div>
            </div>
            
            <div class="text">
            <div class="custom-srch-div">
            <input id="datepicker-from" type="text" class="srchtxt" placeholder="From" title="Select Date From" />
            <input id="datepicker-to" type="text" class="srchtxt" placeholder="To" title="Select Date To"/>
            <button type="button" class="btn" onclick=" _fetch_custom_payment_report('payment_report','custom_search')">Apply</button>
            </div>
            </div>
            <br clear="all" />
      </div>


    <div class="animated fadeIn" id="search-content">
<?php 
/// get presentation values
$day30= date('F d Y', strtotime('today - 30 days'));
$today= date('F d Y');	

/// get chat values
$db_day30= date('Y-m-d', strtotime('today - 30 days'));
$db_today= date('Y-m-d');
$check_code='report';
include 'sub-codes.php';
?>
 </div>


<script language="javascript">
$('#datepicker-from').datetimepicker({
lang:'en',
timepicker:false,
format:'Y-m-d',
formatDate:'Y-M-d',
});

$('#datepicker-to').datetimepicker({
lang:'en',
timepicker:false,
format:'Y-m-d',
formatDate:'Y-M-d',
});
</script>

<?php }?>








<?php if ($view_content=='app_settings'){
$array=$callclass->_get_setup_backend_settings_detail($conn, 'BK_ID001');
$fetch = json_decode($array, true);
$smtp_host=$fetch[0]['smtp_host'];
$smtp_username=$fetch[0]['smtp_username'];
$smtp_password=$fetch[0]['smtp_password'];
$smtp_port=$fetch[0]['smtp_port'];
$sender_name=$fetch[0]['sender_name'];
$support_email=$fetch[0]['support_email'];
$promo_code=$fetch[0]['promo_code'];
$promo_amount_limit=$fetch[0]['promo_amount_limit'];

$bank_name=$fetch[0]['bank_name'];
$account_name=$fetch[0]['account_name'];
$account_number=$fetch[0]['account_number'];
$delivery_fee=$fetch[0]['delivery_fee'];
?>

<div class="fly-title-div  animated fadeInRight">
<div class="in">
<span id="panel-title"><i class="fa fa-gears"></i> SETTINGS</span>
<div class="close" title="Close" onclick="alert_close();">X</div>
</div>
</div>
<div class="container-back-div overflow animated fadeInRight" >
      <div class="inner-div">
        
        <div class="alert alert-success"><span>BANK ACCOUNT DETAILS</span>
            <div class="title"> BANK NAME:</div>
            <input id="bank_name" type="text" class="text_field" placeholder="BANK NAME" title="BANK NAME" value="<?php echo $bank_name; ?>" />
            <div class="title"> ACCOUNT NAME:</div>
            <input id="account_name" type="text" class="text_field" placeholder="ACCOUNT NAME" title="ACCOUNT NAME" value="<?php echo $account_name; ?>" />
            <div class="title"> ACCOUNT NUMBER:</div>
            <input id="account_number" type="text" class="text_field" placeholder="ACCOUNT NUMBER" title=" ACCOUNT NUMBER" value="<?php echo $account_number; ?>" />
            <div class="title"> PROMO CODE:</div>
            <input id="promo_code" type="text" class="text_field" placeholder="PROMO CODE" onkeypress="return isNumber(event)" title="PROMO CODE" value="<?php echo $promo_code; ?>" />
            <div class="title"> PROMO AMOUNT LIMIT:</div>
            <input id="promo_amount_limit" type="text" class="text_field" placeholder="PROMO AMOUNT LIMIT" onkeypress="return isNumber(event)" title="PROMO AMOUNT LIMIT" value="<?php echo $promo_amount_limit; ?>" />
          </div>
        
        <div class="alert alert-success"><span>SMTP DETAILS</span>
            <div class="title"> SENDER NAME:</div>
            <input id="sender_name" type="text" class="text_field" placeholder="SENDER NAME" title="SENDER NAME" value="<?php echo $sender_name; ?>" />
            <div class="title"> SMTP HOST:</div>
            <input id="smtp_host" type="text" class="text_field" placeholder="SMTP HOST" title="SMTP HOST" value="<?php echo $smtp_host; ?>" />
            <div class="title"> SMTP USERNAME:</div>
            <input id="smtp_username" type="text" class="text_field" placeholder="SMTP USERNAME" title="SMTP USERNAME" value="<?php echo $smtp_username; ?>" />
            <div class="title"> SMTP PASSWORD:</div>
            <input id="smtp_password" type="text" class="text_field" placeholder=" SMTP PASSWORD" title=" SMTP PASSWORD" value="<?php echo $smtp_password; ?>" />
            <div class="title"> SMTP PORT:</div>
            <input id="smtp_port" type="text" class="text_field" placeholder="SMTP PORT" title="SMTP PORT" value="<?php echo $smtp_port; ?>" />
            <div class="title"> SUPPORT EMAIL:</div>
            <input id="support_email" type="text" class="text_field" placeholder="SUPPORT EMAIL" title="SUPPORT EMAIL" value="<?php echo $support_email; ?>" />
        </div>
                        
            <button class="action-btn"  type="button" title="UPDATE SETTINGS" onclick="_update_settings()"> <i class="fa fa-check"></i> UPDATE SETTINGS</button>

</div>
</div>
<?php } ?>


<script type="text/javascript" src="js/scrollBar.js"></script>
<script type="text/javascript">$(".sb-container").scrollBox();</script>
<script src="js/aos.js"></script>
<script>
AOS.init({
easing: 'ease-in-out-sine'
});
</script>



