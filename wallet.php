<?php include 'config/connection.php'?>
<?php include 'config/session-validation.php'?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http: //www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include 'meta.php'?>
<script src="https://js.paystack.co/v1/inline.js"></script>
<title>Wallet - <?php echo $thename?></title>
</head>
<body>
<?php include 'header.php'?>

<div class="other-pages-title"  data-aos="fade-down" data-aos-duration="1200">
	<div class="title-div">
    <h1>Wallet History & Balance <i class="fa fa-circle"></i></h1>
    </div>
</div>




<div class="product-details-div">
	<div class="div-in">
    		<div class="each-product-details">
            	<div class="inner-div" id="inner-div">
				


                    <div class="table-content-div">
                        <div class="content-div-in">
                            <div class="title">WALLET BALANCE<button class="btn" onClick="_get_form('load_user_wallet')"><i class="fa fa-credit-card"></i> Load Wallet</button></div>
        
                            <div class="wallet-back-div">
                            <div class="wallet-div">
                              <div class="text-div">
                                  <div class="amount">NGN <?php echo number_format($amount_received,2);?></div>
                                  <div class="txt">TOTAL AMOUNT RECEIVED</div>
                              </div>
                            </div>
                            
                            <div class="wallet-div">
                              <div class="text-div">
                                  <div class="amount">NGN<?php echo number_format($amount_withdraw,2);?></div>
                                  <div class="txt">TOTAL AMOUNT SPENT</div>
                              </div>
                            </div>
                            
                            <div class="wallet-div none-border">
                              <div class="text-div">
                                  <div class="amount">NGN <?php echo number_format($user_wallet_balance,2);?></div>
                                  <div class="txt">AVAILABLE BALANCE</div>
                              </div>
                            </div>
                            
                        <br clear="all" />
                        </div>
                       
                        </div>
                    </div>



                    <div class="table-content-div">
                        <div class="content-div-in">
                            <div class="title">WALLET ACTIVITIES</div>
        
<div class="table-div animated fadeIn" id="search-content">

            	<table class="table" cellspacing="0">
                	<tr class="tb-col">
                    	<td>DATE</td>
                    	<td>TRANS ID</td>
                    	<td>BALANCE BEFORE</td>
                    	<td>AMOUNT LOADED</td>
                    	<td>BALANCE AFTER</td>
                    	<td>TRANS TYPE</td>
                    	<td>STATUS</td>
                    </tr>
                    
			<?php
			$no=0;
                $query=mysqli_query($conn,"SELECT * FROM user_wallet_tab WHERE user_id ='$s_customer_id' ORDER BY date DESC");
                while($fetch=mysqli_fetch_array($query)){
					$no++;
                    $trans_date=$fetch['date'];
                    $pay_id=$fetch['pay_id'];
                    $balance_before=$fetch['balance_before'];
                    $amount=$fetch['amount'];
                    $balance_after=$fetch['balance_after'];
                    $transaction_type_id=$fetch['transaction_type_id'];
                    $status_id=$fetch['status_id'];
					
						$trans_array=$callclass->_get_transaction_type_details($conn, $transaction_type_id);
						$trans_fetch = json_decode($trans_array, true);
						$transaction_type_name= $trans_fetch[0]['transaction_type_name'];
						
						$status_array=$callclass->_get_setup_status_detail($conn, $status_id);
						$status_fetch = json_decode($status_array, true);
						$status_name= $status_fetch[0]['status_name'];
						
						if ($status_id=='SUC'){$class='success';}elseif($status_id=='P'){$class='progress';}else{$class='failed';}
            ?>
                        
                	<tr id="<?php echo $pay_id;?>">
                    	<td><?php echo $trans_date; ?></td>
                    	<td><?php echo $pay_id; ?></td>
                        <td><span>NGN <?php echo number_format($balance_before,2); ?></span></td>
                        <td class="<?php echo $class; ?>">NGN <?php echo number_format($amount,2); ?> <?php if($status_id=='P'){?> | <span onClick="_cancel_transaction('<?php echo $pay_id;?>')">CANCEL</span><?php }?> </td>
                        <td><span>NGN <?php echo number_format($balance_after,2); ?></span></td>
                    	<td><?php echo $transaction_type_name; ?></td>
                   		<td class="<?php echo $class; ?>"><?php echo $status_name; ?></td>
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

