<?php include 'config/connection.php'?>
<?php
$product_cat_id=$_GET['prc'];
  $cat_array=$callclass->_get_product_cat_detail($conn, $product_cat_id);
  $get_cat_array = json_decode($cat_array, true);
  $product_cat_name= $get_cat_array[0]['product_cat_name'];
  
	  $query=mysqli_query($conn,"SELECT product_name FROM product_tab WHERE product_cat_id='$product_cat_id' ORDER BY product_name ASC");
	  while($fetch=mysqli_fetch_array($query)){
		    $product_name .= $fetch['product_name'].''.', ';
	  }
  
	  $pixquery=mysqli_query($conn,"SELECT * FROM product_categories_pix_tab WHERE  product_cat_id='$product_cat_id' ORDER BY RAND() LIMIT 1");
	  $pixsel=mysqli_fetch_array($pixquery);
	  $product_pix=$pixsel['product_pix'];
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http: //www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include 'meta.php';?>
<title><?php echo ucwords(strtolower($product_cat_name))?> - <?php echo $thename?></title>
<meta name="keywords" content="<?php echo $thename?>, <?php echo $product_name;?>" />
<meta name="description" content="Buy Online foodstuff like <?php echo ucwords(strtolower($product_name));?> in just few clicks"/>

<meta property="og:title" content="<?php echo ucwords(strtolower($product_cat_name))?> - <?php echo $thename?>" />
<meta property="og:image" content="<?php echo $website?>/uploaded_files/product-cat-pix/<?php echo $product_pix; ?>"/>
<meta property="og:description" content="Buy Online foodstuff like <?php echo ucwords(strtolower($product_name));?> in just few clicks"/>

<meta name="twitter:title" content="<?php echo ucwords(strtolower($product_cat_name))?> - <?php echo $thename?>"/> 
<meta name="twitter:card" content="<?php echo $thename?>"/> 
<meta name="twitter:image"  content="<?php echo $website?>/uploaded_files/product-cat-pix/<?php echo $product_pix; ?>"/> 
<meta name="twitter:description" content="Buy Online foodstuff like <?php echo ucwords(strtolower($product_name));?> in just few clicks"/>
</head>
<body>
<?php include 'header.php'?>

<div class="other-pages-title"  data-aos="fade-down" data-aos-duration="1200">
	<div class="title-div">
    <h1><?php echo ucwords(strtolower($product_cat_name))?> <i class="fa fa-circle"></i></h1>
    </div>
</div>

<div class="search-text-div">

	<div class="search-segment-div">
	<input onkeyup="_fetch_products_list_txt('<?php echo $product_cat_id;?>')"  id="all_search_txt" class="text_field" placeholder="Search" title="Search" />
    </div>
    <br clear="all" />
</div>


<div class="body-div">
<div class="body-div-in">
	
    
        <div class="product-back-div" id="search-content">
			<?php 
			$check_code='product-list';
			include 'content/sub-codes.php';
			?>
        </div>
        
        
        
        
        
        
        
        
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

