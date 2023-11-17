<?php include 'config/connection.php'?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http: //www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include 'meta.php'?>
<title>Contacts | Office and  Email Address | Phone Number - <?php echo $thename?></title>
<meta name="keywords" content="Contact Bellemata, Online FoodStuff Contact In Nigeria, Best Online FoodStuff Contact" />
<meta name="description" content="Contact Bellemata for your FoodStuffs and get your order at your door step."/>

<meta property="og:title" content="Contacts | Office and  Email Address | Phone Number |  <?php echo $thename?>" />
<meta property="og:image" content="<?php echo $website?>/all-images/plugin-pix/applechoice.jpg"/>
<meta property="og:description" content="Contact Applechoice Limited on Consultancy Services On Legal Immigration Programmes to Canada from Nigeria"/>

<meta name="twitter:title" content="Contacts | Office and  Email Address | Phone Number |  <?php echo $thename?>"/> 
<meta name="twitter:card" content="<?php echo $thename?>"/> 
<meta name="twitter:image"  content="<?php echo $website?>/all-images/plugin-pix/applechoice.jpg"/> 
<meta name="twitter:description" content="Contact Applechoice Limited on Consultancy Services On Legal Immigration Programmes to Canada from Nigeria"/>
</head>
<body>
<?php include 'header.php'?>

<div class="other-pages-title"  data-aos="fade-down" data-aos-duration="1200">
	<div class="title-div">
    <h1>Contacts Us <i class="fa fa-circle"></i></h1>
    </div>
</div>




<div class="body-div">
	<div class="body-div-in contact-body-div">
        
        	<div class="contact-div animated zoomIn">
            	<div class="div-in">
                    <div class="icon"><img src="all-images/body-pix/email.png" alt="<?php echo $thename?> Email Address"/></div>
                    <h2>Email Address</h2> agrohandlers@gmail.com<br />info@agrohandlers.com
                </div>
            </div>
            
        	<div class="contact-div animated zoomIn">
            	<div class="div-in">
                    <div class="icon"><img src="all-images/body-pix/phone.png" alt="<?php echo $thename?> Phone Number"/></div>
                    <h2>Phone Number</h2> +234-(0)902-810-6224
                </div>
            </div>
            
        	<div class="contact-div animated zoomIn">
            	<div class="div-in">
                    <div class="icon"><img src="all-images/body-pix/address.png" alt="<?php echo $thename?> Nigeria Office Address"/></div>
                    <h2>Packaging & Distribution Hub:</h2> 13/33 Folashade Tinubu Complex, IOke-Odo Bulk market, Ilepo Bus-Stop, Lagos - Abeokuta Express-Way, Lagos.
                </div>
            </div>
            
    </div>
</div>





<div class="body-div">
	<div class="body-div-in featured-div">
	
        <div class="product-title-div" data-aos="fade-up" data-aos-duration="1000">
        	<h2>Get In Touch <i class="fa fa-circle"></i></h2>
        </div>
    
        
        <div class="contact-mail-div"  data-aos="fade-in" data-aos-duration="1200">
        	<div class="div-in">
            	<div class="text-segment"><input class="text_field" id="fullname" placeholder="Full Name" /></div>
            	<div class="text-segment"><input class="text_field" id="email" placeholder="Email Address" /></div>
                <input class="text_field" id="subject" placeholder="Subject" />
                <textarea class="text_field" id="message" placeholder="Message" rows="6"></textarea>
                <button class="btn" onclick="_send_contact_email()">Send</button>
            </div>
        </div>
        
        
        
    </div>
</div>










<?php include 'footer.php'?>

</body>
</html>
