
<?php if ($check_code=='trendbarchart'){?>
<?php	$totalamount=0;
		$last30daysque=mysqli_query($conn,"SELECT  YEAR(date) AS db_year, MONTH(date)-1 AS db_month, DAY(date) AS db_day, SUM(total_amount) AS amount 
		FROM payment_tab WHERE (date(date) BETWEEN '$db_day30' AND '$db_today') AND status_id = 'SUC' GROUP BY DATE(date) ORDER BY date ASC")or die ("error from database table");

while($last30dayssel=mysqli_fetch_array($last30daysque)){
			$dbamount=$last30dayssel['amount'];
			$dbyear=$last30dayssel['db_year'];
			$dbmonth=$last30dayssel['db_month'];if ($dbmonth<10){$dbmonth='0'.$dbmonth;}
			$dbday=$last30dayssel['db_day'];if ($dbday<10){$dbday='0'.$dbday;}
	 $dataset .= '{ x: new Date('.$dbyear.', '.$dbmonth.', '.$dbday.'), y: '.$dbamount.' },';	
		$totalamount=$totalamount+$dbamount;
				  }
	?>
<?php	$wallet_totalamount=0;
		$last30daysque=mysqli_query($conn,"SELECT  YEAR(date) AS db_year, MONTH(date)-1 AS db_month, DAY(date) AS db_day, SUM(amount) AS amount 
		FROM user_wallet_tab WHERE (date(date) BETWEEN '$db_day30' AND '$db_today') AND status_id = 'SUC' AND transaction_type_id='CR' GROUP BY DATE(date) ORDER BY date ASC")or die ("error from database table");

while($last30dayssel=mysqli_fetch_array($last30daysque)){
			$dbamount=$last30dayssel['amount'];
			$dbyear=$last30dayssel['db_year'];
			$dbmonth=$last30dayssel['db_month'];if ($dbmonth<10){$dbmonth='0'.$dbmonth;}
			$dbday=$last30dayssel['db_day'];if ($dbday<10){$dbday='0'.$dbday;}
	 $wallet_dataset .= '{ x: new Date('.$dbyear.', '.$dbmonth.', '.$dbday.'), y: '.$dbamount.' },';	
		$wallet_totalamount=$wallet_totalamount+$dbamount;
				  }
	?>

<div class="chart">
<?php if($action=='all_search'){?>
<div class="rev-report">Revenue for <?php echo $earlymonth.' '.$earlyday.' '.$earlyyear; ?> - <?php echo $latemonth.' '.$lateday.' '.$lateyear; ?><br /><div class="revenue">₦<?php echo number_format($totalamount,2) ?></div></div>
<?php } elseif($action=='today_search'){?>
<div class="rev-report">Revenue for Today - <?php echo $today; ?><br /><div class="revenue">₦<?php echo number_format($totalamount,2) ?></div></div>
<?php } else{?>
<div class="rev-report">Revenue for <?php echo $day30; ?> - <?php echo $today; ?><br /><div class="revenue">₦<?php echo number_format($totalamount,2) ?>(SALES) | ₦<?php echo number_format($wallet_totalamount,2) ?>(WALLET)</div></div>
<?php }?>
<div id="chartContainer" style="height: 300px; max-width: 920px; margin: 0px auto;"></div>
<script>
$(document).ready(function() {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light1",
	title:{
		text: ""
	},
	axisX:{
		valueFormatString: "DD MMM",
		crosshair: {
			enabled: true,
			snapToDataPoint: true
		}
	},
	axisY: {
		title: "",
		includeZero: true,
		crosshair: {
			enabled: true
		}
	},
	toolTip:{
		shared:true
	},  
	legend:{
		cursor:"pointer",
		verticalAlign: "bottom",
		horizontalAlign: "left",
		dockInsidePlotArea: true,
		itemclick: toogleDataSeries
	},
	data: [{
		type: "line",
		showInLegend: true,
		name: "Sales",
		markerType: "square",
		xValueFormatString: "DD MMM, YYYY",
		color: "#29BA00",
		dataPoints: [
			<?php echo $dataset;?>
			//{ x: new Date(2020, 01, 05), y: 1000 },
			//{ x: new Date(2017, 0, 3), y: 650 },
			//{ x: new Date(2017, 0, 4), y: 700 },
			//{ x: new Date(2017, 0, 5), y: 710 },
			//{ x: new Date(2017, 0, 6), y: 658 },
			//{ x: new Date(2017, 0, 7), y: 734 },
			//{ x: new Date(2017, 0, 8), y: 963 },
			//{ x: new Date(2017, 0, 9), y: 847 },
			//{ x: new Date(2017, 0, 10), y: 853 },
			//{ x: new Date(2017, 0, 11), y: 869 },
			//{ x: new Date(2017, 0, 12), y: 943 },
			//{ x: new Date(2017, 0, 13), y: 970 },
			//{ x: new Date(2017, 0, 14), y: 869 },
			//{ x: new Date(2017, 0, 15), y: 890 },
			//{ x: new Date(2017, 0, 16), y: 930 }
		]
	},
	{
		type: "line",
		showInLegend: true,
		name: "Wallet",
		lineDashType: "dash",
		dataPoints: [
			<?php echo $wallet_dataset;?>
			//{ x: new Date(2020, 01, 05), y: 1000 },
			//{ x: new Date(2017, 0, 3), y: 650 },
			//{ x: new Date(2017, 0, 4), y: 700 },
			//{ x: new Date(2017, 0, 5), y: 710 },
			//{ x: new Date(2017, 0, 6), y: 658 },
			//{ x: new Date(2017, 0, 7), y: 734 },
			//{ x: new Date(2017, 0, 8), y: 963 },
			//{ x: new Date(2017, 0, 9), y: 847 },
			//{ x: new Date(2017, 0, 10), y: 853 },
			//{ x: new Date(2017, 0, 11), y: 869 },
			//{ x: new Date(2017, 0, 12), y: 943 },
			//{ x: new Date(2017, 0, 13), y: 970 },
			//{ x: new Date(2017, 0, 14), y: 869 },
			//{ x: new Date(2017, 0, 15), y: 890 },
			//{ x: new Date(2017, 0, 16), y: 930 }
		]
	}]
});
chart.render();

function toogleDataSeries(e){
	if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	} else{
		e.dataSeries.visible = true;
	}
	chart.render();
}
})


_arps_matrix('<?php echo $db_day30;?>','<?php echo $db_today;?>');
_payment_matrix('<?php echo $db_day30;?>','<?php echo $db_today;?>');
_get_all_count();
</script>

</div>



<?php }?>











<!--==============================================================================================================================-->

<?php if ($check_code=='arps_matrix'){ 
		//////  total_outstanding_orders 
		$total_outstanding_orders=mysqli_fetch_array(mysqli_query($conn,"SELECT count(payment_id) FROM payment_tab WHERE status_id='P' AND (date(date) BETWEEN '$db_day30' AND '$db_today')"));
		$total_outstanding_orders= $total_outstanding_orders[0];
		//////  total_pending_orders 
		$total_pending_orders=mysqli_fetch_array(mysqli_query($conn,"SELECT count(order_id) FROM order_summary_tab WHERE status_id='PP' AND (date(date) BETWEEN '$db_day30' AND '$db_today')"));
		$total_pending_orders= $total_pending_orders[0];
		//////  total_attending_orders 
		$total_attending_orders=mysqli_fetch_array(mysqli_query($conn,"SELECT count(order_id) FROM order_summary_tab WHERE status_id='PR' AND (date(date) BETWEEN '$db_day30' AND '$db_today')"));
		$total_attending_orders= $total_attending_orders[0];
		//////  total_ready_orders 
		$total_ready_orders=mysqli_fetch_array(mysqli_query($conn,"SELECT count(order_id) FROM order_summary_tab WHERE status_id='RD' AND (date(date) BETWEEN '$db_day30' AND '$db_today')"));
		$total_ready_orders= $total_ready_orders[0];
		//////  total_delivery_orders 
		$total_delivery_orders=mysqli_fetch_array(mysqli_query($conn,"SELECT count(order_id) FROM order_summary_tab WHERE status_id='DL' AND (date(date) BETWEEN '$db_day30' AND '$db_today')"));
		$total_delivery_orders= $total_delivery_orders[0];
?>
            <div id="chartContainer1" style="width:100%; height:200px; margin:auto;"></div>
            
            <script type="text/javascript">
            var options = {
            title: {
            text: "" /*My Performance*/
            },
            data: [{
            type: "pie",
            startAngle: 45,
            showInLegend: "False",
            legendText: "{label}",
            indexLabel: "{label} ({y})",
            yValueFormatString:"#,##0.#"%"",
            dataPoints: [
            { label: "Outstanding", y: <?php echo $total_outstanding_orders;?>},
            { label: "Pending", y: <?php echo $total_pending_orders;?>},
            { label: "Processing", y: <?php echo $total_attending_orders;?>},
            { label: "Ready", y: <?php echo $total_ready_orders;?>},
            { label: "Delivered", y: <?php echo $total_delivery_orders;?>},
            ]
            }]
            };
            $("#chartContainer1").CanvasJSChart(options);
            </script>

<?php }?>

<!--==============================================================================================================================-->
<?php if ($check_code=='payment_matrix'){
		////// total Card payment
		$card_payment=mysqli_fetch_array(mysqli_query($conn,"SELECT count(payment_id) FROM payment_tab WHERE status_id='SUC' AND fund_method_id='FM001' AND (date(date) BETWEEN '$db_day30' AND '$db_today')"));
		$card_payment= $card_payment[0];
		
		////// total wallet payment
		$wallet_payment=mysqli_fetch_array(mysqli_query($conn,"SELECT count(payment_id) FROM payment_tab WHERE status_id='SUC' AND fund_method_id='FM002' AND (date(date) BETWEEN '$db_day30' AND '$db_today')"));
		$wallet_payment= $wallet_payment[0];
		
		////// total BANK TRANSFER
		$transfer_payment=mysqli_fetch_array(mysqli_query($conn,"SELECT count(payment_id) FROM payment_tab WHERE status_id='SUC' AND fund_method_id='FM003' AND (date(date) BETWEEN '$db_day30' AND '$db_today')"));
		$transfer_payment= $transfer_payment[0];
		
		////// total PAY ON DELIVERY
		$pay_on_delivery_payment=mysqli_fetch_array(mysqli_query($conn,"SELECT count(payment_id) FROM payment_tab WHERE status_id='SUC' AND fund_method_id='FM004' AND (date(date) BETWEEN '$db_day30' AND '$db_today')"));
		$pay_on_delivery_payment= $pay_on_delivery_payment[0];
		
		////// total PAY LATER
		$later_payment=mysqli_fetch_array(mysqli_query($conn,"SELECT count(payment_id) FROM payment_tab WHERE status_id='SUC' AND fund_method_id='FM005' AND (date(date) BETWEEN '$db_day30' AND '$db_today')"));
		$later_payment= $later_payment[0];
	?>
            <div id="chartContainer2" style="width:100%; height:200px; margin:auto;"></div>
            
            <script type="text/javascript">
            var options = {
            title: {
            text: "" /*My Performance*/
            },
            data: [{
            type: "pie",
            startAngle: 45,
            showInLegend: "False",
            legendText: "{label}",
            indexLabel: "{label} ({y})",
            yValueFormatString:"#,##0.#"%"",
            dataPoints: [
            { label: "Debit/Credit Card", y: <?php echo $card_payment;?>},
            { label: "Wallet", y: <?php echo $wallet_payment;?>},
            { label: "Bank Transfer", y: <?php echo $transfer_payment;?>},
            { label: "Pay On Delivery", y: <?php echo $pay_on_delivery_payment;?>},
            { label: "Pay Later", y: <?php echo $later_payment;?>},
            ]
            }]
            };
            $("#chartContainer2").CanvasJSChart(options);
            </script>

<?php }?>
























<?php if ($check_code=='alert-list'){ ?>                               
<?php if ($view_report=='unread'){?>
    <div class="alert alert-success" style="text-align:left;"> <span><i class="fa fa-bell-o"></i></span> Unread Alerts</div>
<?php }elseif ($view_report=='random_search'){ ?>
    <div class="alert alert-success" style="text-align:left;"><span><i class="fa fa-search"></i></span> Search Result For <span><?php echo $all_search_txt; ?></span></div>
<?php }else{ ?>
    <div class="alert alert-success" style="text-align:left;"> <span><i class="fa fa-bell-o"></i></span> Notifications Between <span><?php echo $day30; ?></span> - <span><?php echo $today; ?></span></div>
<?php } ?>

<?php 
	$search_like="(alert_id like '%$all_search_txt%' OR
	alert_detail like '%$all_search_txt%' OR
	user_id like '%$all_search_txt%' OR
	name like '%$all_search_txt%' OR
	ipaddress like '%$all_search_txt%' OR
	computer like '%$all_search_txt%' OR
	date like '%$all_search_txt%')";
	
	$no=0;
	
	if ($view_report==''){
	$query=mysqli_query($conn,"SELECT * FROM alert_tab WHERE date(date) BETWEEN '$db_day30' AND '$db_today'  AND role_id<='$user_role_id' AND seen_status <='$user_role_id'+1  ORDER BY date DESC LIMIT 200");
	}elseif ($view_report=='unread'){
	$query=mysqli_query($conn,"SELECT * FROM alert_tab WHERE  role_id<='$user_role_id' AND seen_status <='$user_role_id' ORDER BY date DESC");
	}elseif ($view_report=='random_search'){
	$query=mysqli_query($conn,"SELECT * FROM alert_tab WHERE $search_like  AND role_id<='$user_role_id' AND  seen_status <='$user_role_id'+1 ORDER BY date DESC LIMIT 100");
	}else{
	$query=mysqli_query($conn,"SELECT * FROM alert_tab WHERE date(date) BETWEEN '$db_day30' AND '$db_today'  AND role_id<='$user_role_id' AND seen_status <='$user_role_id'+1 ORDER BY date DESC");
	}
	
	while($fetch=mysqli_fetch_array($query)){
		$no++;
		$alert_id=$fetch['alert_id'];	
		$alert_detail = substr($fetch['alert_detail'], 0, 80);
			$fatch_array=$callclass->_get_alert_detail($conn, $alert_id);
			$array = json_decode($fatch_array, true);
			$user_id= $array[0]['user_id'];
			$name= trim(ucwords(strtolower($array[0]['name'])));
			$ipaddress= $array[0]['ipaddress'];
			$computer= $array[0]['computer'];
			$seen_status= $array[0]['seen_status'];
			$date= $array[0]['date'];
?>
	<?php if ($seen_status==0){?>
        <div class="system-alert" id="<?php echo $alert_id; ?>" onclick="_read_alert('<?php echo $alert_id; ?>')">
            <div class="alert-name"><i class="fa fa-user-circle"></i> <?php echo $name; ?> <span id="<?php echo $alert_id; ?>viewed"><i class="fa fa-check"></i></span></div>
            <div class="alert-text"><?php echo $alert_detail; ?>...</div>
            <div class="alert-time"><i class="fa fa-clock-o"></i> <?php echo $date; ?></div>
        </div>
    <?php }else{ ?>
        <div class="system-alert alert-seen" id="<?php echo $alert_id; ?>" onclick="_read_alert('<?php echo $alert_id; ?>')">
            <div class="alert-name"><i class="fa fa-user-circle"></i> <?php echo $name; ?> <span id="<?php echo $alert_id; ?>viewed"><i class="fa fa-check"></i><i class="fa fa-check"></i></span></div>
            <div class="alert-text"><?php echo $alert_detail; ?>...</div>
            <div class="alert-time"><i class="fa fa-clock-o"></i> <?php echo $date; ?></div>
        </div>
    <?php } ?>
    <?php } ?>
    
    <?php if ($no==0){?>
        <div class="alert"><i class="fa fa-bell-o"></i> No record found</div>
    <?php } ?>
<?php }?>















































<!--==============================================================================================================================-->

<?php if ($check_code=='user-list'){ ?> 


<div class="search-content-in">			
<?php
	$search_like="(user_id like '%$all_search_txt%' OR 
	surname like '%$all_search_txt%' OR 
	othernames like '%$all_search_txt%' OR 
	mobile like '%$all_search_txt%' OR 
	email like '%$all_search_txt%' OR 
	reg_date like '%$all_search_txt%' OR 
	last_login like '%$all_search_txt%')";
	$usersquery=mysqli_query($conn,"SELECT * FROM staff_tab WHERE role_id<'$user_role_id' AND status_id='$status_id' AND $search_like  ORDER BY surname ASC")or die ('cannot select staff_tab');
	$no=0;
	while($users_sel=mysqli_fetch_array($usersquery)){
		$no++;
		$users_id=$users_sel['user_id'];
		$user_array=$callclass->_get_staff_detail($conn, $users_id);
		$u_array = json_decode($user_array, true);
		$users_id= $u_array[0]['user_id'];
		$fullname= $u_array[0]['fullname'];
		$mobile= $u_array[0]['mobile'];
		$email= $u_array[0]['email'];
		$passport= $u_array[0]['passport'];
		
		$role_id= $u_array[0]['role_id'];
		$otp= $u_array[0]['otp'];
		$status_id= $u_array[0]['status_id'];
		$reg_date= $u_array[0]['reg_date'];
		$last_login= $u_array[0]['last_login'];
		
		if ($status_id=='A'){
		$status_name= 'ACTIVATED';
		}else if($status_id=='S'){
		$status_name= 'SUSPENDED';
		}else{
		$status_name= 'PENDING';
			}
?>
            
            <div class="user-div" onClick="_get_form_with_id('user_profile','<?php echo $users_id; ?>')" id="<?php echo $users_id; ?>">
            <div class="pix-div"><img src="<?php echo $website; ?>/uploaded_files/staff_passport/<?php echo $passport; ?>"/></div>
            <div class="detail">
          	<div class="name-div"><div class="name"> <?php echo ucwords(strtolower($fullname)); ?></div><hr /><br/></div>
            <div class="text">ID: <?php echo $users_id; ?></div>
            <div class="text"><?php echo $mobile; ?></div>
            <?php if ($status_id=='A'){?>
            <div class="active"><?php echo $status_name; ?></div>
            <?php }elseif ($status_id=='S'){ ?>
            <div class="inactive"><?php echo $status_name; ?></div>
            <?php }else{ ?>
            <div class="pending"><?php echo $status_name; ?></div>
            <?php } ?>
            </div>
            <br clear="all" />
            </div>
            <?php } ?>
            <br clear="all" />
            <?php if ($no==0){?>
                <div class="false-notification-div">
                    <p>NO RECORD FOUND!</p>
                </div>               
            <?php } ?>
            
 </div>


         

<?php }?>









<?php if ($check_code=='product-cat-list'){ ?> 


<?php
	$search_like="(product_cat_id like '%$all_search_txt%' OR 
	product_cat_name like '%$all_search_txt%')";
	$query=mysqli_query($conn,"SELECT * FROM product_categories_tab WHERE status_id like '%$status_id%' AND $search_like  ORDER BY date DESC")or die ('cannot select product_categories_tab');
	$no=0;
	while($fetch=mysqli_fetch_array($query)){
		$no++;
		$product_cat_id=$fetch['product_cat_id'];
		
		$array=$callclass->_get_product_cat_detail($conn, $product_cat_id);
		$get_array = json_decode($array, true);
		$product_cat_name= $get_array[0]['product_cat_name'];
		$status_id= $get_array[0]['status_id'];
		
		  $fetch_status=$callclass->_get_setup_status_detail($conn, $status_id);
		  $array = json_decode($fetch_status, true);
		  $status_name= $array[0]['status_name'];
			if ($status_id=='A'){
			$status_name= 'ACTIVATED';
			}else{
			$status_name= 'SUSPENDED';
			}
		  
            $pixquery=mysqli_query($conn,"SELECT * FROM product_categories_pix_tab WHERE  product_cat_id='$product_cat_id' ORDER BY RAND() LIMIT 1");
            $pixsel=mysqli_fetch_array($pixquery);
			$product_pix=$pixsel['product_pix'];

		////// total suspended taff
		$total_product_registered_count=mysqli_fetch_array(mysqli_query($conn,"SELECT count(product_cat_id) FROM product_tab WHERE product_cat_id='$product_cat_id' AND status_id='A'"));
		$total_product_registered_count= $total_product_registered_count[0];

?>
        	<div class="product-categories">
            <div class="active <?php echo $status_name; ?>"><?php echo $status_name; ?></div>
                <div class="img"><img src="<?php echo $website; ?>/uploaded_files/product-cat-pix/<?php echo $product_pix; ?>" alt="<?php echo $product_cat_name; ?>" /></div>
                <div class="numbs">NUMBER OF PRODUCTS <button class="btn" onclick="_get_page_with_id('product_list','<?php echo $product_cat_id; ?>')"><?php echo number_format($total_product_registered_count); ?></button></div>
                <div class="text-div">
                    <h2 onclick="_get_form_with_id('edit_update_product_cat','<?php echo $product_cat_id; ?>')"><i class="fa fa-edit"></i> <?php echo $product_cat_name; ?></h2>
                </div>
            </div>
			
<?php } ?>
            <br clear="all" />
            <?php if ($no==0){?>
                <div class="false-notification-div">
                    <p>NO RECORD FOUND!</p>
                    <button class="btn" onClick="_get_form('reg_update_product_cat')"><i class="fa fa-plus"></i> ADD NEW PRODUCT CATEGORY</button>
                </div>               
            <?php } ?>
<?php }?>





<?php if ($check_code=='product-list'){ ?> 
<?php
	$search_like="(product_id like '%$all_search_txt%' OR
	product_name like '%$all_search_txt%' OR 
	product_desc like '%$all_search_txt%')";
	$query=mysqli_query($conn,"SELECT * FROM product_tab WHERE status_id like '%$status_id%' AND $search_like  AND product_cat_id='$product_cat_id'  ORDER BY date DESC")or die ('cannot select product_tab');
	$no=0;
	while($fetch=mysqli_fetch_array($query)){
		$no++;
		$product_id=$fetch['product_id'];
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
			if ($status_id=='A'){
			$status_name= 'ACTIVATED';
			}else{
			$status_name= 'SUSPENDED';
			}
		  
            $pixquery=mysqli_query($conn,"SELECT * FROM product_pix_tab WHERE  product_id='$product_id' ORDER BY RAND() LIMIT 1");
            $pixsel=mysqli_fetch_array($pixquery);
			$product_pix=$pixsel['product_pix'];
?>
        	<div class="product-div" title="CLICK TO EDIT PRODUCT" onclick="_get_form_with_id('edit_update_product','<?php echo $product_id; ?>')">
                <div class="img"><img src="<?php echo $website; ?>/uploaded_files/product-pix/<?php echo $product_pix; ?>" alt="Tubers and Swallow" /></div>
                <div class="active <?php echo $status_name; ?>"><?php echo $status_name; ?></div>
                <div class="text-div">
                   <span><?php echo $product_cat_name; ?></span>
                    <h2><i class="fa fa-edit"></i> <?php echo $product_name; ?></h2>
                </div>
            </div>
			
<?php } ?>
            <br clear="all" />
            <?php if ($no==0){?>
                <div class="false-notification-div">
                    <p>NO RECORD FOUND!</p>
                    <button class="btn" onClick="_get_form_with_id('reg_product','<?php echo $product_cat_id;?>')"><i class="fa fa-plus"></i> ADD PRODUCT</button>
                </div>               
            <?php } ?>
<?php }?>











<?php if ($check_code=='stock_details'){?>
         	<div class="alert alert-success"> <span><i class="fa fa-cubes"></i></span> CURRENT STOCK DETAILS</div>

                <?php 
				$cat_query=mysqli_query($conn,"SELECT product_cat_id FROM product_categories_tab WHERE status_id ='A'  ORDER BY product_cat_name ASC")or die ('cannot select product_categories_tab');
				$cat_no=0;
				while($fetch=mysqli_fetch_array($cat_query)){
					$cat_no++;
					$product_cat_id=$fetch['product_cat_id'];
					$array=$callclass->_get_product_cat_detail($conn, $product_cat_id);
					$get_array = json_decode($array, true);
					$product_cat_name= $get_array[0]['product_cat_name'];
				 ?>
        <div class="table-div animated fadeIn" id="search-content">
			<div class="tb-title"><i class="fa fa-cubes"></i> <?php echo $product_cat_name?> <button class="btn" onclick="exportTableToExcel('<?php echo $product_cat_id?>_table','current stock for <?php echo $product_cat_name?>')"><i class="fa fa-file-excel-o"></i> EXPORT</button></div>
            	<table class="table" cellspacing="0" style="width:100%" id="<?php echo $product_cat_id?>_table">
                	<tr class="tb-col">
                    	<td>SN</td>
                    	<td>PRODUCT NAME</td>
                    	<td>PURCHASE PRICE/UNIT(<s>N</s>)</td>
                    	<td>SELLING PRICE/UNIT(<s>N</s>)</td>
                    	<td>STATUS</td>
                    	<td>AVAILABLE STOCK</td>
                    	<td>OUTSTANDING</td>
                    	<td>LOAD STOCK</td>
                    </tr>
                 
                 <?php
				 	$query=mysqli_query($conn,"SELECT product_id FROM product_tab WHERE product_cat_id='$product_cat_id' AND product_name LIKE '%$all_search_txt%'  ORDER BY product_name ASC")or die ('cannot select product_tab');
					$no=0;
					while($fetch=mysqli_fetch_array($query)){
						$no++;
						$product_id=$fetch['product_id'];
						
						$array=$callclass->_get_product_detail($conn, $product_id);
						$get_array = json_decode($array, true);
						$product_name= $get_array[0]['product_name'];
						$product_desc= $get_array[0]['product_desc'];
						$status_id= $get_array[0]['status_id'];
					
					  $fetch_status=$callclass->_get_setup_status_detail($conn, $status_id);
					  $array = json_decode($fetch_status, true);
					  $status_name= $array[0]['status_name'];

						if ($status_id=='A'){
						$class= 'success';
						}else{
						$class= 'progress';
						}
						
						$stock_array=$callclass->_get_stock_detail($conn, $product_id);
						$stock_fetch = json_decode($stock_array, true);
							$purchase_price= $stock_fetch[0]['purchase_price'];
							$selling_price= $stock_fetch[0]['selling_price'];
							$available_qty= $stock_fetch[0]['available_qty'];
							$outstanding_qty= $stock_fetch[0]['outstanding_qty'];
                 ?>
                	<tr>
                    	<td><?php echo $no?></td>
                    	<td><?php echo $product_name?></td>
                    	<td><s>N</s><?php echo number_format($purchase_price,2)?></td>
                    	<td><s>N</s><?php echo number_format($selling_price,2)?></td>
                    	<td class="<?php echo $class?>"><?php echo $status_name?></td>
                     	<td><button class="btn <?php echo $status_name?>" onclick="_get_form_with_id('load_stock_history','<?php echo $product_id?>')"><?php echo $available_qty?></button></td>
                     	<td><button class="btn <?php echo $status_name?>"><?php echo $outstanding_qty?></button></td>
                     	<td><button class="btn <?php echo $status_name?>" onclick="_get_form_with_id('load_stock_form','<?php echo $product_id?>')">LOAD</button></td>
                    </tr>
                 
					<?php }?>
                    <?php if ($no==0){?>
                	<tr>
                    	<td colspan="20">
                            <div class="alert"><i class="fa fa-bell-o"></i> No record found</div>
                        </td>
                    </tr>
                    <?php } ?>
                </table>

</div>
            <?php } ?>
            <?php if ($cat_no==0){?>
                <div class="false-notification-div">
                    <p>NO RECORD FOUND!</p>
                    <button class="btn" onClick="_get_form_with_id('reg_product','<?php echo $product_cat_id;?>')"><i class="fa fa-plus"></i> ADD PRODUCT</button>
                </div>               
            <?php } ?>
<?php } ?>










<?php if ($check_code=='load_stock_history'){?>
                <div class="alert alert-success"><span><i class="fa fa-history"></i></span> Load Stock History Between <span><?php echo $day30; ?></span> - <span><?php echo $today; ?></span></div>


<?php 
	$stock_history_count=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM stock_history_tab WHERE product_id='$product_id'"));
if ($stock_history_count==0){?>
  <div class="alert"><span><i class="fa fa-warning (alias)"></i> No record found</span></div>
<?php }else{?>

<div class="table-div">

        <table border="0"  cellspacing="0" class="table" style="width:100%">
          <tr class="tb-col">
            <td>SN</td>
            <td>Date</td>
            <td>Product Name</td>
            <td>Available Qty </td>
            <td>Qty Loaded</td>
            <td>Stock Balance</td>
            <td>Purchased Price/Unit</td>
            <td>Total Purchased Price</td>
            <td>Selling Price/Unit</td>
            <td>Staff</td>
          </tr>
          
 			<?php
                    
			$nos=0;
            $load_stock_query=mysqli_query($conn,"SELECT * FROM stock_history_tab WHERE product_id='$product_id' AND (DATE(date) BETWEEN '$db_day30' AND '$db_today') ORDER BY date DESC");
            while($load_stock_fetch=mysqli_fetch_array($load_stock_query)){
			$nos++;
			$available_qty=$load_stock_fetch['available_qty'];
			$qty_loaded=$load_stock_fetch['qty_loaded'];
			$stock_balance=$load_stock_fetch['stock_balance'];
			$staff_id=$load_stock_fetch['staff_id'];
			$purchase_price= $load_stock_fetch['purchase_price'];
			$selling_price= $load_stock_fetch['selling_price'];
			$date=$load_stock_fetch['date'];
			$staff_id=$load_stock_fetch['staff_id'];
			$total_purchase_price=$purchase_price*$qty_loaded;

		$array=$callclass->_get_product_detail($conn, $product_id);
		$get_array = json_decode($array, true);
		$product_name= $get_array[0]['product_name'];
		
			  $user_array=$callclass->_get_staff_detail($conn, $staff_id);
			  $u_array = json_decode($user_array, true);
			  $surname= $u_array[0]['surname'];
			  $othernames= $u_array[0]['othernames'];
			  $staff_name="$surname $othernames";
			  
			$total_stock_loaded=$total_stock_loaded+$qty_loaded;
?>
          <tr>
            <td><?php echo $nos;?></td>
            <td><?php echo $date;?></td>
            <td><?php echo $product_name;?></td>
            <td><?php echo $available_qty;?></td>
            <td><?php echo $qty_loaded;?></td>
            <td><?php echo $stock_balance;?></td>
            <td><s>N</s> <?php echo number_format($purchase_price,2);?></td>
            <td><s>N</s> <?php echo number_format($total_purchase_price,2);?></td>
            <td><s>N</s> <?php echo number_format($selling_price,2);?></td>
            <td><?php echo $staff_name;?></td>
          </tr>
<?php } ?>
     </table>
  <div class="alert">TOTAL STOCK LOADED Between <span><?php echo $day30; ?></span> - <span><?php echo $today; ?></span> ----- <span><?php echo $total_stock_loaded;?></span> Qty</div>
</div>
<?php } ?>


<?php }?>







<?php if ($check_code=='order-list'){?> 
<div class="table-div">
<table class="table" cellspacing="0"  style="width:100%">
            <tr class="tb-col">
                <td>SN</td>
                <td>DATE</td>
                <td>ORDER ID</td>
                <td>ITEMS</td>
                <td>(<s>N</s>)AMOUNT</td>
                <td>LOGISTICS</td>
                <td>ORDER STATUS</td>
                <?php if($status_id=='P'){?>
                <td>PAYMENT METHOD</td>
                <td>VIEW</td>
               <?php }?>
                <?php if($status_id=='PP'){?>
                <td>PAYMENT METHOD</td>
                <td>ATTEND</td>
               <?php }?>
                <?php if($status_id=='PR'){?>
                <td>ATTENDANT</td>
                <td>VIEW</td>
               <?php }?>
                <?php if($status_id=='RD'){?>
                <td>ATTENDANT</td>
                <td>DELIVER</td>
               <?php }?>
                <?php if($status_id=='DL'){?>
                <td>ATTENDANT</td>
                <td>DELIVERY ATT.</td>
               <?php }?>
            </tr>
			<?php
			$no=0;
                $query=mysqli_query($conn,"SELECT * FROM order_summary_tab WHERE status_id='$status_id' AND order_id LIKE '%$all_search_txt%' ORDER BY date DESC ");
                while($fetch=mysqli_fetch_array($query)){
					$no++;
                    $trans_date=$fetch['date'];
                    $order_id=$fetch['order_id'];
					$nums_of_items=$fetch['nums_of_items'];
                    $order_status_id=$fetch['status_id'];
                    $staff_id=$fetch['staff_id'];
                    $delivery_staff_id=$fetch['delivery_staff_id'];
					
					$query1=mysqli_query($conn,"SELECT * FROM payment_tab WHERE order_id='$order_id'");
					$fetch1=mysqli_fetch_array($query1);
					$pay_id=$fetch1['payment_id'];
					$payment_status_id=$fetch1['status_id'];
				    $fund_method_id= $fetch1['fund_method_id'];
				    $total_amount= $fetch1['total_amount'];
					$logistic_id=$fetch1['logistic_id'];
					
					$status_array=$callclass->_get_setup_status_detail($conn, $order_status_id);
					$status_fetch = json_decode($status_array, true);
					$order_status_name= $status_fetch[0]['status_name'];
					
					$status_array1=$callclass->_get_setup_status_detail($conn, $payment_status_id);
					$status_fetch1 = json_decode($status_array1, true);
					$payment_status_name= $status_fetch1[0]['status_name'];

					  $fm_fetch=$callclass->_get_setup_fund_method_detail($conn, $fund_method_id);
					  $fm_array = json_decode($fm_fetch, true);
					  $fund_method_name= $fm_array[0]['fund_method_name'];
							
					  $fetch2=$callclass->_get_setup_logistics_details($conn, $logistic_id);
					  $array2 = json_decode($fetch2, true);
					  $logistic_name= $array2[0]['logistic_name'];
					  
					$staff_array=$callclass->_get_staff_detail($conn, $staff_id);
					$staff_fetch = json_decode($staff_array, true);
					$staff_name= $staff_fetch[0]['fullname'];
					
					$d_staff_array=$callclass->_get_staff_detail($conn, $delivery_staff_id);
					$d_staff_fetch = json_decode($d_staff_array, true);
					$delivery_staff_name= $d_staff_fetch[0]['fullname'];
					// NEW UPDATE
					if ($order_status_id=='DL'){$order_status_name_title='DELIVERED ORDER';}elseif($order_status_id=='P'){$order_status_name_title='UNPAID ORDER';}elseif($order_status_id=='PP'){$order_status_name_title='UNPROCESSED ORDER';}elseif($order_status_id=='PR'){$order_status_name_title='ORDER IN PROGRESS';}else{$order_status_name_title='READY ORDER';}
					///////
					if ($order_status_id=='DL'){$class='success';}elseif($order_status_id=='PP'){$class='pending';}elseif($order_status_id=='PR'){$class='progress';}else{$class='ready';}
					if ($payment_status_id=='SUC'){$class_='success';}elseif($payment_status_id=='P'){$class_='progress';}else{$class_='failed';}
            ?>
                	<tr>
                    	<td><?php echo $no; ?></td>
                    	<td><?php echo $trans_date; ?></td>
						<!-- NEW UPDATE -->
                    	<td><span onClick="_get_form_with_id('get_order_items','<?php echo $order_id; ?>','<?php echo $order_status_name_title?>')"><?php echo $order_id; ?></span></td>
                     	<!-- ---------------------- -->
						<td><?php echo $nums_of_items; ?></td>
                    	<td><span><s>N</s> <?php echo number_format($total_amount,2); ?></span></td>
                    	<td><?php echo $logistic_name; ?></td>
                    	<td class="<?php echo $class; ?>"><?php echo $order_status_name; ?></td>
                        
                <?php if($status_id=='P'){?>
                    	<td><?php echo $fund_method_name; ?></td>
                   		<td><button class="btn" onClick="_get_form_with_id('get_order_items','<?php echo $order_id; ?>')">VIEW</button></td>
				 <?php } ?>           
                <?php if($status_id=='PP'){?>
                    	<td><?php echo $fund_method_name; ?></td>
                   		<td><button class="btn" onClick="_get_form_with_id('get_order_items','<?php echo $order_id; ?>')">ATTEND</button></td>
				 <?php } ?>           
                <?php if($status_id=='PR'){?>
                    	<td><?php echo $staff_name; ?></td>
                   		<td><button class="btn" onClick="_get_form_with_id('get_order_items','<?php echo $order_id; ?>')">VIEW</button></td>
				 <?php } ?>           
                <?php if($status_id=='RD'){?>
                    	<td><?php echo $staff_name; ?></td>
                   		<td><button class="btn" onClick="_get_form_with_id('get_order_items','<?php echo $order_id; ?>')">DELIVER</button></td>
				 <?php } ?>           
                <?php if($status_id=='DL'){?>
                    	<td><?php echo $staff_name; ?></td>
                   		<td><?php echo $delivery_staff_name; ?></td>
				 <?php } ?>           
                    </tr>
         <?php } ?>           
                 
                    <?php if ($no==0){?>
                	<tr>
                    	<td colspan="20">
                            <div class="alert"><i class="fa fa-bell-o"></i> No record found</div>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
</div>
<?php }?>





















<?php if ($check_code=='blog-list'){?>


			<?php
                        $search_like="(blog_id like '%$all_search_txt%' OR 
                        blog_title like '%$all_search_txt%' OR 
                        seo_describtion like '%$all_search_txt%' OR 
                        blog_detail like '%$all_search_txt%')";
                    
	   $no=0;
	  $blogquery=mysqli_query($conn,"SELECT * FROM blog_tab  WHERE cat_id like '%$cat_id%' AND status_id like '%$status_id%' AND user_id like '%$user_id%' AND $search_like ORDER BY reg_date DESC")or die ('cannot select blog_tab');
	  while($blog_sel=mysqli_fetch_array($blogquery)){
	  $no++;
		  $blog_id=$blog_sel['blog_id'];
			$blog_title = substr($blog_sel['blog_title'], 0, 60);
			$seo_describtion = substr($blog_sel['seo_describtion'], 0, 100);
			$status_id=$blog_sel['status_id'];

		  $blog_array=$callclass->_get_blog_detail($conn, $blog_id);
		  $b_array = json_decode($blog_array, true);
		  $blog_cat_id=$b_array[0]['blog_cat_id'];
		  $blog_pix=$b_array[0]['blog_pix'];
		  $blog_views=$b_array[0]['blog_views'];
		  $blog_date_of_reg=date('d M Y', strtotime($b_array[0]['blog_date_of_reg']));
		  $blog_last_updated=date('d M Y', strtotime($b_array[0]['blog_last_updated']));
		  
		  if($status_id=='PUB'){$blog_status='active';}else{$blog_status='inactive';}
		  $user_id=$b_array[0]['user_id'];
			  $user_array=$callclass->_get_staff_detail($conn, $user_id);
			  $u_array = json_decode($user_array, true);
			  $user_name= $u_array[0]['fullname'];
		
?>
                <div class="blog-div animated fadeIn" onclick="_get_blog_details('<?php echo $blog_id; ?>')">
                <div class="<?php echo $blog_status; ?>"><?php echo strtoupper($blog_status); ?></div>
                <div class="blog-pic-div"><img src="<?php echo $website?>/uploaded_files/blog-pix/<?php echo $blog_pix; ?>" alt="<?php echo $blog_title; ?>"/></div>
                <div class="blog-text">
                Updated By: <span><?php echo $user_name; ?></span><br />
                <i class="fa fa-calendar"></i> <span><?php echo $blog_last_updated; ?></span> | 
                <i class="fa fa-eye"></i> <span><?php echo $blog_views; ?> Views</span>
                </div>
                <div class="blog-title"><?php echo $blog_title; ?>...</div>
                </div>
<?php } ?>                
                                
            <?php if ($no==0){?>
                <div class="false-notification-div">
                	<div class="img"></div>
                    <p>NO RECORD FOUND!</p>
                    <button class="btn" onClick="_get_form('create-article')"><i class="fa fa-plus"></i> CREATE A NEW BLOG</button>
                </div>               
            <?php } ?>
 <?php } ?>
 























<!--==============================================================================================================================-->

<?php if ($check_code=='faq-list'){
						$search_like="(question like '%$all_search_txt%' OR 
                        answer like '%$all_search_txt%')";
?>
		<?php if ($all_search_txt==''){
				$query=mysqli_query($conn,"SELECT * FROM faq_tab WHERE $search_like ORDER BY date DESC");
			?>
         <div class="alert alert-success"> <span><i class="fa fa-question"></i></span> FAQs LIST <button class="btn" onclick="_get_form('get_faq_form')"><i class="fa fa-plus"></i> ADD NEW FAQ</button></div>
		<?php }else{
				$query=mysqli_query($conn,"SELECT * FROM faq_tab WHERE $search_like ORDER BY date DESC LIMIT 5");
			?>
         <div class="alert alert-success"> <span><i class="fa fa-question"></i></span> SEARCH RESULT FOR <span><?php echo $all_search_txt; ?></span> <button class="btn" onclick="_get_form('get_faq_form')"><i class="fa fa-plus"></i> ADD NEW FAQ</button><br clear="all" /></div>
		<?php }?>
        
                <?php 
				$no=0;
				 while($fetch=mysqli_fetch_array($query)){
					 $no++;
					 $faq_id=$fetch['faq_id'];
					$answer=$fetch['answer'];
						$fetch=$callclass->_get_faq_detail($conn, $faq_id);
						  $array = json_decode($fetch, true);
							$question= $array[0]['question'];
							$staff_id= $array[0]['staff_id'];
							$date= $array[0]['date'];
				$fetch=$callclass->_get_staff_detail($conn, $staff_id);
				$array = json_decode($user_array, true);
				$staff_name= $array[0]['fullname'];
	 ?>
                 
                         <div class="faq-question" id="<?php echo $faq_id; ?>" onclick="_get_form_with_id('get_update_faq_form', '<?php echo $faq_id; ?>')">
                                    <h4 onclick="_collapse('<?php echo $faq_id; ?>')">
                                        <div class="number" id="<?php echo $faq_id; ?>num">&nbsp;<i class="fa fa-plus"></i>&nbsp;</div>
                                       <?php echo $question; ?>
                                        <br clear="all" />
                                    </h4>
                                <div class="answer" id="<?php echo $faq_id; ?>answer">
                                      <?php echo $answer; ?>
                                      <div class="update">Update On: <?php echo $date; ?> By: <?php echo $staff_name; ?></div>
                                 </div>
                         </div>
                 
					<?php }?>
                    <?php if ($no==0){?>
                <div class="false-notification-div">
                	<div class="img"></div>
                    <p>NO RECORD FOUND!</p>
                    <button class="btn" onclick="_get_form('get_faq_form')"><i class="fa fa-plus"></i> ADD NEW FAQ</button>
                </div>               
                    <?php } ?>

<?php } ?>









<?php if ($check_code=='news_letter_list'){
	$search_like="(email like '%$all_search_txt%' OR 
	name like '%$all_search_txt%')";
	?>

<div class="table-div animated fadeIn">
            	<table class="table" cellspacing="0" style="width:100%" id="transaction-table">
                	<tr class="tb-title">
                    	<td>SN</td>
                    	<td>EMAIL</td>
                    	<td>NAME</td>
                    </tr>
          <?php
		  	$query=mysqli_query($conn,"SELECT * FROM news_letter_tab WHERE $search_like  ORDER BY date DESC");
			while($fetch=mysqli_fetch_array($query)){
				$no++;
				$email=$fetch['email'];
				$name=$fetch['name'];
		 ?>  
                 
                	<tr>
                    	<td><?php echo $no?></td>
                    	<td><?php echo $email?></td>
                    	<td><?php echo $name?></td>
                    </tr>
            <?php } ?>
                </table>
            <?php if ($no==0){?>
                <div class="false-notification-div">
                	<div class="img"></div>
                    <p>NO RECORD FOUND!</p>
                </div>               
            <?php } ?>
                
</div>

<?php } ?>




















<?php if ($check_code=='report'){?>
<div class="alert alert-success" style="text-align:left;"> <span><i class="fa fa-line-chart"></i></span> Payment Transactions Between <span><?php echo $day30; ?></span> - <span><?php echo $today; ?></span></div>


	<div class="system-report-back-div">
<div class="table-div animated fadeIn" id="search-content">

            	<table class="table" cellspacing="0">
                	<tr class="tb-col">
                    	<td>SN</td>
                    	<td>DATE</td>
                    	<td>TRANSACTION ID</td>
                    	<td>CANDIDATE NAME</td>
                    	<td>AMOUNT</td>
                    	<td>PAYMENT PURPOSE</td>
                    	<td>PAYMENT STATUS</td>
                    </tr>
                <?php 
				$no=0;
				$query=mysqli_query($conn,"SELECT * FROM payment_tab WHERE (date(date) BETWEEN '$db_day30' AND '$db_today') AND status_id ='SUC' ORDER BY date ASC");
				 while($fetch=mysqli_fetch_array($query)){
					 $no++;
					 $pay_id=$fetch['payment_id'];
					 
					$fetch=$callclass->_get_payment_detail($conn, $pay_id);
					$array = json_decode($fetch, true);
					$payment_gateway_id= $array[0]['payment_gateway_id'];
					$user_id= $array[0]['user_id'];
					$amount= $array[0]['amount'];
					$payment_purpose_id= $array[0]['payment_purpose_id'];
					$fund_method_id= $array[0]['fund_method_id'];
					$status_id= $array[0]['status_id'];
					$staff_id= $array[0]['staff_id'];
					$date= $array[0]['date'];
			
			  $array=$callclass->_get_user_detail($conn, $user_id);
			  $fetch = json_decode($array, true);
				$first_name=$fetch[0]['first_name'];
				$middle_name=$fetch[0]['middle_name'];
				$last_name=$fetch[0]['last_name'];
				$user_name="$first_name $middle_name $last_name";
				
					$fetch_payment_purpose=$callclass->_get_setup_payment_purpose_detail($conn, $payment_purpose_id);
					$payment_purpose_array = json_decode($fetch_payment_purpose, true);
					$payment_purpose_name=$payment_purpose_array[0]['payment_purpose_name'];
					
					$fetch_status_name=$callclass->_get_setup_status_detail($conn, $status_id);
					$array_status_name = json_decode($fetch_status_name, true);
					$status_name= $array_status_name[0]['status_name'];
					
					$total_amount=$total_amount+$amount;
				 ?>
                 
                	<tr>
                    	<td><?php echo $no?></td>
                    	<td><?php echo $date?></td>
                    	<td><?php echo $pay_id?></td>
                    	<td><span onClick="_get_form_with_id('arp_profile','<?php echo $user_id; ?>')"><?php echo $user_name?></span></td>
                    	<td>NGN<?php echo number_format($amount)?></td>
                     	<td><?php echo $payment_purpose_name?></td>
                   		<td class="success"><?php echo $status_name?></td>
                    </tr>
                 
					<?php }?>
                    <?php if ($no==0){?>
                	<tr>
                    	<td colspan="20">
                            <div class="alert"><i class="fa fa-bell-o"></i> No record found</div>
                        </td>
                    </tr>
                    <?php } ?>
                </table>

</div>    </div>
<div class="alert alert-success">TOTAL AMOUNT  <span>NGN <?php echo number_format($total_amount,2)?></span></div>
<?php } ?>






