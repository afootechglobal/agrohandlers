<?php include 'config/connection.php'?>
<?php
$product_id=$_GET['pr'];
	$query=mysqli_query($conn,"SELECT * FROM product_tab a, stock_tab b WHERE a.product_id=b.product_id AND a.status_id ='A' AND b.selling_price>0 AND a.product_id='$product_id'");
	$fetch=mysqli_fetch_array($query);
		$product_id=$fetch['product_id'];
		$product_desc=$fetch['product_desc'];
		
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
		
            $pixquery=mysqli_query($conn,"SELECT * FROM product_pix_tab WHERE  product_id='$product_id' ORDER BY RAND() LIMIT 1");
            $pixsel=mysqli_fetch_array($pixquery);
			$product_pix=$pixsel['product_pix'];

		  $product_qty=1;
		  $sub_price=$selling_price;

		$order_que= mysqli_query($conn,"SELECT product_qty FROM add_to_cart_tab WHERE shop_session='$shopsession' AND product_id='$product_id'");
		$order_count=mysqli_num_rows($order_que);
		if($order_count>0){
		$order_sel= mysqli_fetch_array($order_que);
			$product_qty=$order_sel['product_qty'];
			$sub_price=$selling_price*$product_qty;
		}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http: //www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include 'meta.php'?>
<title><?php echo ucwords(strtolower($product_name))?>  | <?php echo ucwords(strtolower($product_cat_name))?> - <?php echo $thename?></title>
<meta name="keywords" content="<?php echo $thename?> food store, foodstuff store website, <?php echo ucwords(strtolower($product_name))?>, <?php echo ucwords(strtolower($product_cat_name))?>" />
<meta name="description" content="<?php echo $product_desc?>"/>

<meta property="og:title" content="<?php echo ucwords(strtolower($product_name))?>  | <?php echo ucwords(strtolower($product_cat_name))?> - <?php echo $thename?>" />
<meta property="og:image" content="<?php echo $website?>/uploaded_files/product-pix/<?php echo $product_pix;?>"/>
<meta property="og:description" content="<?php echo $product_desc?>"/>

<meta name="twitter:title" content="<?php echo ucwords(strtolower($product_name))?>  | <?php echo ucwords(strtolower($product_cat_name))?> - <?php echo $thename?>"/> 
<meta name="twitter:card" content="<?php echo $thename?>"/> 
<meta name="twitter:image"  content="<?php echo $website?>/uploaded_files/product-pix/<?php echo $product_pix;?>"/> 
<meta name="twitter:description" content="<?php echo $product_desc?>"/>
</head>
<body>
<?php include 'header.php'?>

<div class="other-pages-title"  data-aos="fade-down" data-aos-duration="1200">
	<div class="title-div">
    <h1><?php echo ucwords(strtolower($product_name))?> <i class="fa fa-circle"></i></h1>
    </div>
</div>




<div class="product-details-div">
	<div class="div-in">
    		<div class="each-product-details">
            	<div class="inner-div">
                    <div class="product-gallery">
                        <div class="product-main-pix" id="gallery-big-pix"><img src="uploaded_files/product-pix/<?php echo $product_pix;?>" alt="<?php echo ucwords(strtolower($product_name))?>" /></div>
                        <div class="product-pix-list">
<?php
            $pixquery=mysqli_query($conn,"SELECT * FROM product_pix_tab WHERE  product_id='$product_id'");
            while($pixsel=mysqli_fetch_array($pixquery)){
			$sn=$pixsel['sn'];
			$product_pix=$pixsel['product_pix'];
?>
                            <div class="product-pix" id="img_<?php echo $sn?>" onclick="_view_gallery_img('img_<?php echo $sn?>')"><img src="uploaded_files/product-pix/<?php echo $product_pix;?>" alt="<?php echo ucwords(strtolower($product_name))?>" /></div>
<?php }?>
                        </div>
                    </div>
                    
                    <div class="product-details-breakdown-div">
                    <?php if ($s_customer_id==''){?>
                    <div class="alert"><a href="account/" title="SIGNUP/LOGIN"><button class="btn">SIGNUP/LOGIN HERE</button></a> to continue. </div>
                    <?php }?>
                        <div class="detail-text">
                            <span>PRODUCT CATEGORY:</span><br />
                            <?php echo ucwords(strtolower($product_cat_name))?>
                        </div>
                        <div class="detail-text">
                            <span>PRODUCT NAME:</span><br />
                            <?php echo ucwords(strtolower($product_name))?>
                        </div>
                        <div class="detail-text">
                            <span>PRICE PER UNIT:</span><br />
                            <s>N</s> <?php echo number_format($selling_price,2);?>
                        </div>
                        
                        <div class="qty-div">
                            Qty: <input id="product_qty_<?php echo $product_id?>" type="number" onkeypress="return isNumber(event)" onkeyup="_get_price('<?php echo $product_id;?>','<?php echo $selling_price;?>')"  onchange="_get_price('<?php echo $product_id;?>','<?php echo $selling_price;?>')" class="text_field" value="<?php echo $product_qty;?>"/> 
                            <span><s>N</s></span> <span id="price_<?php echo $product_id?>"><?php echo number_format($sub_price,2);?></span>
                        </div>
                        
                        <div class="btn-div">
                            <button class="btn" id="add-to-cart-btn_<?php echo $product_id?>" onclick="_add_to_cart('<?php echo $product_id?>')"><i class="fa fa-cart-arrow-down"></i> ADD TO CART</button>
                            <a href="all-products" title="Order FoodStuffs Online">
                            <button class="btn download"><i class="fa fa-shopping-basket"></i> CONTINUE SHOPPING</button></a>
                       </div>
                        <div class="detail-text">
                            <span>PRODUCT DESCRIPTION:</span><br />
                             <?php echo $product_desc?>
                        </div>
                        
                    </div>
                    <br clear="all" />
            	</div>
            </div>
            
            
            
            <div class="product-nav-div">
            	<div class="inner-div">
                    <div class="title-div">CATEGORIES</div>
			<?php
                $query=mysqli_query($conn,"SELECT * FROM product_categories_tab WHERE status_id ='A' ORDER BY product_cat_name ASC");
                while($fetch=mysqli_fetch_array($query)){
                    $db_product_cat_id=$fetch['product_cat_id'];
                    $array=$callclass->_get_product_cat_detail($conn, $db_product_cat_id);
                    $get_array = json_decode($array, true);
                    $db_product_cat_name= $get_array[0]['product_cat_name'];
            ?>
                        
                        <a href="products?prc=<?php echo ucwords(strtolower($db_product_cat_id)); ?>" title="<?php echo ucwords(strtolower($db_product_cat_name)); ?>">
                        <li><?php echo ucwords(strtolower($db_product_cat_name)); ?></li></a>
            <?php } ?>
            	</div>
            </div>
            
            <br clear="all" />
    </div>
</div>





<div class="body-div">
<div class="body-div-in">
	
        <div class="product-title-div" data-aos="fade-up" data-aos-duration="1000">
        	<h2>Recommended Products <i class="fa fa-circle"></i></h2>
        </div>
    
        <div class="product-back-div">
        
<?php
	$query=mysqli_query($conn,"SELECT * FROM product_tab a, stock_tab b WHERE a.product_id=b.product_id AND a.status_id ='A' AND b.selling_price>0 AND a.product_cat_id='$product_cat_id' AND a.product_id!='$product_id'  ORDER BY RAND() LIMIT 8");
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
        </div>
        
</div>
</div>

<div class="body-div">
<div class="body-div-in">
        <div class="title-div" data-aos="fade-up" data-aos-duration="1000">
        	<h2>Product Categories</h2>
        	<h3>Product Categories</h3>
        </div>

        <div class="product-categories-back-div">
		<?php $callclass->_get_all_product_categories($conn);?>
            <div style="width:100%; display:inline-block;"></div>
        </div>
</div>
</div>


<?php include 'footer.php'?>
</body>
</html>

