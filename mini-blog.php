<!--<div class="insight-back-div">
   
    <div class="insight-latest">
    	<div class="latest-left" data-aos="fade-up" data-aos-duration="700">
        <div class="insight-date">06 Jan.</div>
               <div class="insight-div">
                <div class="insight-pix"><img src="uploaded_files/blog-pix/blog-sample.png" alt="Blog" /></div>
                <div class="insight-details">
                    <div class="div-in">
                         <a href="blog-details" title="Why investing in Real Estate matters more than ever today">
                        <h2>Partnering with Salesforce Essentials: Launching a New Integration for Salesforce to Align sales and Marketing</h2></a>
                        <p>How can you make sure the right information gets shared across teams?</p>
                        <p>As you grow your business, it starts to become more work to keep track of the details – while still giving each customer a unique experience. Sometimes you want more ways to keep your sales and marketing teams on the same page. With ActiveCampaign and Salesforce combined, you’ll be able to connect your sales and marketing tools to send the right message at the right time – to qualify your leads, create personalized messages, and keep sales and marketing aligned.</p>
                    </div>
                </div>
               
               </div>  
        </div>
        <div class="latest-right" data-aos="fade-up" data-aos-duration="1200">
        
            <div class="category">LATEST</div>
        	<div class="latest-div-in">
                 <div class="latest-blogs">
                     <a href="blog-details" title="Why investing in Real Estate matters more than ever today">
                     <h2>How Much Does it Cost to Move to Canada in 2022</h2></a>
                     <span>April 28, 2021</span>
                 </div>
                 <div class="latest-blogs">
                     <h2>How to Immigrate to Canada Without a Job Offer in 2022</h2>
                     <span>April 28, 2021</span>
                 </div>
                 <div class="latest-blogs">
                     <h2>What Is The Highest Paying Skilled Worker Jobs in Canada</h2>
                     <span>April 28, 2021</span>
                 </div>
                 <div class="latest-blogs">
                     <h2>FAQs: 5 Things You Need to Know About Canadian Residency Requirements</h2>
                     <span>April 28, 2021</span>
                 </div>
                 <div class="latest-blogs">
                     <h2>What Is The Highest Paying Skilled Worker Jobs in Canada</h2>
                     <span>April 28, 2021</span>
                 </div>
                 <div class="latest-blogs">
                     <h2>FAQs: 5 Things You Need to Know About Canadian Residency Requirements</h2>
                     <span>April 28, 2021</span>
                 </div>
            </div>
            
        </div>
        <br clear="all" />
    </div>
</div>
-->


<div class="insight-recommended-div">
   <?php 
   $no=0;
    $blogquery=mysqli_query($conn,"SELECT * FROM blog_tab WHERE status_id='PUB' ORDER BY last_updated DESC LIMIT 3")or die ('cannot select blog_tab');
    while($blog_sel=mysqli_fetch_array($blogquery)){
    $no++;
    $blog_id=$blog_sel['blog_id'];
    $blog_title=ucwords(strtolower($blog_sel['blog_title']));
    $blog_url=$blog_sel['blog_url'];
    $seo_describtion = $blog_sel['seo_describtion'];
    $blog_views = $blog_sel['views'];
    $blog_pix=$blog_sel['blog_pix'];
    $blog_reg_date=date('d M Y', strtotime($blog_sel['reg_date']));
?>
        	<div class="recommended-blogs">
                <div class="img"><img src="<?php echo $website?>/uploaded_files/blog-pix/<?php echo $blog_pix?>" alt="Blog" /></div>
                <div class="text-div">
                	<span><?php echo $blog_reg_date?></span> | <span><i class="fa fa-eye"></i> <?php echo $blog_views?> Views</span>
                    <a href="<?php echo $website?>/blog/<?php echo $blog_url?>/"> <h2><?php echo $blog_title?></h2></a>
                    <p><?php echo $seo_describtion?></p>
                </div>
            </div>

    <?php }?>
    <?php if ($no==0){?>
	<div class="false-notification-div">
        <p>NO RECORD FOUND!</p>
    </div>        
    <?php } ?>
            <div style="width:100%; display:inline-block;"></div>
        </div>


