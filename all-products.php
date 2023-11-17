<?php include 'config/connection.php'?>
<?php
	  $query=mysqli_query($conn,"SELECT product_cat_name FROM product_categories_tab WHERE status_id='A' ORDER BY product_cat_name ASC");
	  while($fetch=mysqli_fetch_array($query)){
		    $product_cat_name .= $fetch['product_cat_name'].''.', ';
	  }
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http: //www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include 'meta.php'?>
<title>Order FoodStuffs Online  | All products - <?php echo $thename?></title>
<meta name="keywords" content="<?php echo $thename?> food store, foodstuff store website, <?php echo $product_cat_name?>" />
<meta name="description" content="Get foodstuff online like <?php echo $product_cat_name?> in just few clicks"/>

<meta property="og:title" content="Order FoodStuffs Online  | All products - <?php echo $thename?>" />
<meta property="og:image" content="<?php echo $website?>/all-images/plugin-pix/bellemata.jpg"/>
<meta property="og:description" content="Get foodstuff online like <?php echo $product_cat_name?> in just few clicks"/>

<meta name="twitter:title" content="Order FoodStuffs Online  | All products - <?php echo $thename?>"/> 
<meta name="twitter:card" content="<?php echo $thename?>"/> 
<meta name="twitter:image"  content="<?php echo $website?>/all-images/plugin-pix/bellemata.jpg"/> 
<meta name="twitter:description" content="Get foodstuff online like <?php echo $product_cat_name?> in just few clicks"/>
</head>
<body>
<?php include 'header.php'?>

<div class="other-pages-title"  data-aos="fade-down" data-aos-duration="1200">
	<div class="title-div">
    <h1>Order FoodStuffs Online <i class="fa fa-circle"></i></h1>
    </div>
</div>

        <div class="search-text-div blog-search product-search" data-aos="zoom-in" data-aos-duration="800">
            <div class="search-segment-div">
                <input id="all_search_txt" class="text_field" onkeyup="_fetch_products_cat_list_txt('fetch_product_cat_list')" placeholder="Type Here To Search..." title="Type to Search Here">
            </div>
            <br clear="all"/>      
        </div>
<script src="<?php echo $website?>/js/superplaceholder.js"></script> 
<script>
		superplaceholder({
			el: all_search_txt,
				sentences: [ 'Type here to Search for FoodStuffs','eg YAM POWDER (FLOUR)', 'COCA COLA ZERO' ],
				options: {
				letterDelay: 80,
				loop: true,
				startOnFocus: false
			}
		});
</script> 


       

<div class="body-div">
<div class="body-div-in">
<div id="search-content">
    
    <?php 
			$check_code='product-cat-list';
			include 'content/sub-codes.php';
			?>
   
</div>
</div>
</div>
<?php include 'footer.php'?>
</body>
</html>

