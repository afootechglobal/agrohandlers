<?php if ($check_code=='product-cat-list'){ ?> 

		<div class="product-back-div">
		  
				<?php
					$search_like="(a.product_id like '%$all_search_txt%' OR
					a.product_name like '%$all_search_txt%' OR 
					a.product_desc like '%$all_search_txt%')";
						$query=mysqli_query($conn,"SELECT * FROM product_tab a, stock_tab b WHERE a.product_id=b.product_id AND a.status_id ='A' AND b.selling_price>0 AND $search_like ");
						$no=0;
						while($fetch=mysqli_fetch_array($query)){
							$no++;
							$product_id=$fetch['product_id'];
							$product_desc=$fetch['product_desc'];
							
							$array=$callclass->_get_product_detail($conn, $product_id);
							$get_array = json_decode($array, true);
							$product_cat_id= $get_array[0]['product_cat_id'];
							$product_name= $get_array[0]['product_name'];
							$product_name = substr($product_name, 0, 30);
							
							$cat_array=$callclass->_get_product_cat_detail($conn, $product_cat_id);
							$get_cat_array = json_decode($cat_array, true);
							$product_cat_name= $get_cat_array[0]['product_cat_name'];
							
							$stock_array=$callclass->_get_stock_detail($conn, $product_id);
							$stock_fetch = json_decode($stock_array, true);
							$selling_price= $stock_fetch[0]['selling_price'];
						
							$pixquery=mysqli_query($conn,"SELECT product_pix FROM product_pix_tab WHERE  product_id='$product_id' ORDER BY RAND() LIMIT 1");
							$pixsel=mysqli_fetch_array($pixquery);
							$product_pix=$pixsel['product_pix'];
				?>
				
					<div class="product-div">
						<a href="product-details?pr=<?php echo $product_id?>" title="<?php echo $product_name;?> DETAILS">
							<div class="img"><img src="uploaded_files/product-pix/<?php echo $product_pix;?>" alt="<?php echo $product_name;?>" /></div>
							<div class="price"><s>N</s> <?php echo number_format($selling_price,2);?></div>
						<div class="text-div">
							<span><?php echo ucwords(strtolower($product_cat_name))?></span>
							<h2><?php echo $product_name?>...</h2>
						</a>
						<button class="btn" onclick="_get_form_with_id('product_details_caption','<?php echo $product_id;?>')"><i class="fa fa-shopping-basket"></i> ADD TO CART</button>
						</div>
					</div>
  <?php } ?>
			  <?php if ($no==0){?>
				  <div class="false-notification-div">
					  <p>NO RECORD FOUND!</p>
				  </div>               
			  <?php } ?>
			  <div style="width:100%; display:inline-block;"></div>
	</div>
<?php } ?>
			  












<?php if ($check_code=='product-list'){ 
	$search_like="(a.product_id like '%$all_search_txt%' OR
	a.product_name like '%$all_search_txt%' OR 
	a.product_desc like '%$all_search_txt%')";
?> 

<?php
	$query=mysqli_query($conn,"SELECT * FROM product_tab a, stock_tab b WHERE a.product_id=b.product_id AND a.status_id ='A' AND b.selling_price>0 AND a.product_cat_id='$product_cat_id' AND $search_like  ORDER BY a.date DESC");
	$no=0;
	while($fetch=mysqli_fetch_array($query)){
		$no++;
		$product_id=$fetch['product_id'];
		$product_desc=$fetch['product_desc'];
		
		$array=$callclass->_get_product_detail($conn, $product_id);
		$get_array = json_decode($array, true);
		$product_cat_id= $get_array[0]['product_cat_id'];
		$product_name= $get_array[0]['product_name'];
		$product_name = substr($product_name, 0, 30);
		
		$cat_array=$callclass->_get_product_cat_detail($conn, $product_cat_id);
		$get_cat_array = json_decode($cat_array, true);
		$product_cat_name= $get_cat_array[0]['product_cat_name'];
		
		$stock_array=$callclass->_get_stock_detail($conn, $product_id);
		$stock_fetch = json_decode($stock_array, true);
			$selling_price= $stock_fetch[0]['selling_price'];
		
            $pixquery=mysqli_query($conn,"SELECT * FROM product_pix_tab WHERE  product_id='$product_id' ORDER BY RAND() LIMIT 1");
            $pixsel=mysqli_fetch_array($pixquery);
			$product_pix=$pixsel['product_pix'];
?>
        
        	<div class="product-div">
        	    <a href="product-details?pr=<?php echo $product_id?>" title="<?php echo $product_name;?> DETAILS">
                <div class="img"><img src="uploaded_files/product-pix/<?php echo $product_pix;?>" alt="<?php echo $product_name;?>" /></div>
                <div class="price"><s>N</s> <?php echo number_format($selling_price,2);?></div>
                <div class="text-div">
                   <span><?php echo ucwords(strtolower($product_cat_name))?></span>
                    <h2><?php echo $product_name?>...</h2>
                
                </a>
                <button class="btn" onclick="_get_form_with_id('product_details_caption','<?php echo $product_id;?>')"><i class="fa fa-shopping-basket"></i> ADD TO CART</button>
                </div>
           </div>
<?php } ?>
<br clear="all" />
<?php if ($no==0){?>
    <div class="false-notification-div">
        <p>NO RECORD FOUND!</p>
    </div>               
<?php } ?>
            <div style="width:100%; display:inline-block;"></div>
<?php }?>




<?php if ($check_code=='blog-list'){?>

<?php
	$search_like="(blog_id like '%$all_search_txt%' OR 
	blog_title like '%$all_search_txt%' OR 
	seo_describtion like '%$all_search_txt%' OR 
	blog_detail like '%$all_search_txt%')";

	$no=0;
    $blogquery=mysqli_query($conn,"SELECT * FROM blog_tab  WHERE $search_like  ORDER BY reg_date DESC")or die ('cannot select blog_tab');
    while($blog_sel=mysqli_fetch_array($blogquery)){
	$no++;
    $blog_id=$blog_sel['blog_id'];
    $blog_title = ucwords(strtolower($blog_sel['blog_title']));
    $blog_url=$blog_sel['blog_url'];
    $seo_describtion = $blog_sel['seo_describtion'];
    $blog_views = $blog_sel['views'];
    $blog_pix=$blog_sel['blog_pix'];
    $blog_date_of_reg=date('d M Y', strtotime($blog_sel['date_of_reg']));
?>

			<div class="recommended-blogs">
                <div class="img"><img src="<?php echo $website?>/uploaded_files/blog-pix/<?php echo $blog_pix?>" alt="Blog" /></div>
                <div class="text-div">
                	<span><?php echo $blog_date_of_reg?></span> | <span><i class="fa fa-eye"></i> <?php echo $blog_views?> Views</span>
                    <a href="<?php echo $website?>/blog/<?php echo $blog_url?>"> <h2><?php echo $blog_title?></h2></a>
                    <p><?php echo $seo_describtion?></p>
                </div>
            </div>

<?php } ?>                
					
	<?php if ($no==0){?>
		<div class="false-notification-div">
			<p>NO RECORD FOUND!</p>
		</div>        
	<?php } ?>
<?php } ?>






<?php if ($check_code=='order-history'){?> 
<div class="alert alert-success" style="text-align:left;"> <span><i class="fa fa-line-chart"></i></span> Order History Between <span><?php echo $day30; ?></span> - <span><?php echo $today; ?></span></div>
<table class="table" cellspacing="0">
            <tr class="tb-col">
                <td>DATE</td>
                <td>ORDER ID</td>
                <td>ITEMS</td>
                <td>(<s>N</s>)AMOUNT</td>
                <td>LOGISTICS</td>
                <td>ORDER STATUS</td>
                <td>PAYMENT METHOD</td>
                <td>PAYMENT STATUS</td>
            </tr>
			<?php
			$no=0;
                $query=mysqli_query($conn,"SELECT * FROM order_summary_tab WHERE user_id ='$s_customer_id' AND status_id IN ('P','PP','PR','RD','DL') AND (date(date) BETWEEN '$db_day30' AND '$db_today') ORDER BY date DESC");
                while($fetch=mysqli_fetch_array($query)){
					$no++;
                    $trans_date=$fetch['date'];
                    $order_id=$fetch['order_id'];
					$nums_of_items=$fetch['nums_of_items'];
                    $order_status_id=$fetch['status_id'];
					
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

						if ($order_status_id=='DL'){$class='success';}elseif($order_status_id=='PP'){$class='pending';}elseif($order_status_id=='PR'){$class='progress';}else{$class='ready';}
						if ($payment_status_id=='SUC'){$class_='success';}elseif($payment_status_id=='P'){$class_='progress';}else{$class_='failed';}
            ?>
                	<tr>
                    	<td><?php echo $trans_date; ?></td>
                        <?php if($order_status_id=='P'){?>
                    	<td><span onClick="_order_cart_list('<?php echo $order_id; ?>')"><?php echo $order_id; ?></span></td>
                        <?php }else{?>
                    	<td><span onClick="_get_form_with_id('get_order_items','<?php echo $order_id; ?>')"><?php echo $order_id; ?></span></td>
                        <?php }?>
                     	<td><?php echo $nums_of_items; ?></td>
                    	<td><span><s>N</s> <?php echo number_format($total_amount,2); ?></span></td>
                    	<td><?php echo $logistic_name; ?></td>
                    	<td class="<?php echo $class; ?>"><?php echo $order_status_name; ?></td>
                    	<td><?php echo $fund_method_name; ?></td>
                   		<td class="<?php echo $class_; ?>"><?php echo $payment_status_name; ?></td>
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
<?php }?>







<?php if ($check_code=='alert-list'){ ?>                               
  <div class="alert alert-success" style="text-align:left;"> <span><i class="fa fa-bell-o"></i></span> Notifications Between <span><?php echo $day30; ?></span> - <span><?php echo $today; ?></span></div>

<?php 
	$no=0;
	$query=mysqli_query($conn,"SELECT * FROM alert_tab WHERE user_id='$s_customer_id' AND date(date) BETWEEN '$db_day30' AND '$db_today' ORDER BY date DESC");
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



