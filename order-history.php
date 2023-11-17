<?php include 'config/connection.php'?>
<?php include 'config/session-validation.php'?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http: //www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include 'meta.php'?>
<script src="js/jquery.datetimepicker.js"></script>
<link rel="stylesheet" type="text/css" href="style/jquery.datetimepicker.css"/>
<title>Order History |<?php echo $user_fullname?>-<?php echo $thename?></title>
</head>
<body>

<?php include 'header.php'?>

<div class="other-pages-title"  data-aos="fade-down" data-aos-duration="1200">
  <div class="title-div">
    <h1>Order History <i class="fa fa-circle"></i></h1>
  </div>
</div>

<div class="product-details-div">
  <div class="div-in">
  
    <div class="each-product-details">
      <div class="inner-div" id="inner-div">
      
      
        <div class="table-content-div">
          <div class="content-div-in">
          
          
            <div class="chart-div-notifications">
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
        
        
        
        
        <div class="table-content-div">
          <div class="content-div-in">
            <div class="table-div animated fadeIn" id="search-content">
			<?php 
				/// get presentation values
                $day30= date('F d Y', strtotime('today - 30 days'));
                $today= date('F d Y');	
                
                /// get chat values
				$db_day30= date('Y-m-d', strtotime('today - 30 days'));
				$db_today= date('Y-m-d');
				$view_report='';
				$check_code='order-history';
				include 'content/sub-codes.php';
            ?>
            </div>
          </div>
        </div>
        
      </div>
    </div>
    
    <div class="product-nav-div">
      <div class="inner-div">
        <?php $callclass->_get_all_user_link($conn,$page);?>
      </div>
    </div>
    <br clear="all" />
    
    
    
  </div>
</div>
<?php include 'footer.php'?>
</body>
</html>
