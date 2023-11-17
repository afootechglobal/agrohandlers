//////////////////////////////13/8/2019////////////////////////// by Afolabi Oluwagbnega Sunday

var website_url='http://localhost/agrohandlers.com';
//var website_url='https://www.agrohandlers.com';

var api=website_url+'/api/';


var local_url='config/code.php';

jQuery(document).ready(function() {
    $.backstretch(["all-images/images/bg.jpg"],{duration: 4000, fade: 2000});
});


function numberwithcomma(amount){
	return amount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}



////////start navigation///////////////////////////////////////////////////////
function _open_menu(){
var x = document.getElementById("menu-div");
  if (x.innerHTML === '<i class="fa fa-navicon (alias)"></i>') {
    x.innerHTML = '<i class="fa fa-close"></i>';
	   $('#side-nav-div').animate({'left':'0px'},200);
  } else {
    x.innerHTML = '<i class="fa fa-navicon (alias)"></i>';
	_close_all_nav()
  }
}

function _close_all_nav(){
	   _close_nav();
	   _remove_class();
}

function _close_nav(){
	   $('.side-nav-bg-sub-div').animate({'left':'-100%'},400);
	  var x = document.getElementById("menu-div");
	  x.innerHTML = '<i class="fa fa-navicon (alias)"></i>';
	  $('#side-nav-div').animate({'left':'-100px'},200);
}

function _remove_class(){
		 $('#top-dashboard, #top-prospective_staff, #top-pending_orders').removeClass('active-li');
		 $('#side-dashboard, #side-staff, #side-customer, #side-products, #side-orders, #side-publish, #side-newsletter, #side-report, #side-app_settings').removeClass('active-li');
		 $('#mobile-dashboard, #mobile-staff, #mobile-customer, #mobile-products, #mobile-orders, #mobile-publish, #mobile-newsletter, #mobile-report, #mobile-app_settings').removeClass('active-li');
}


function _get_nav(nav){
	if(nav==''){
	  _close_nav();
	}else{
	   	$('#link-staff, #link-customer, #link-products, #link-orders, #link-publish, #link-app_settings').css({'display':'none'});
		$('#link-'+nav).css({'display':'block'});
	   $('.side-nav-bg-sub-div').animate({'left':'100px'},200);
	}
}

function _get_active_link(divid,nav,title_text){
		_remove_class()
		
		 
		 $('#side-'+divid).addClass('active-li');
		 $('#top-'+divid).addClass('active-li');
		 $('#mobile-'+divid).addClass('active-li');
		 $('#page-title').html($('#_'+title_text).html());
		 
		 if(divid=='pending_orders'){
		 $('#top-pending_orders').addClass('active-li');
		 $('#side-orders').addClass('active-li');
		 $('#mobile-orders').addClass('active-li');
		 }
		 if(divid=='prospective_staff'){
		 $('#top-prospective_staff').addClass('active-li');
		 $('#side-staff').addClass('active-li');
		 $('#mobile-staff').addClass('active-li');
		 }
		 _get_nav(nav);
}

////////end navigation///////////////////////////////////////////////////////

















function _get_page(page,title_text,divid,nav){
	 _get_active_link(divid,nav,title_text);
	 if(page==''){
		 //do nothing
	 }else{
	$('#page-content').html('<div class="ajax-loader">Loading...<br><img src="all-images/images/ajax-loader.gif"/></div>').fadeIn(500);
		var action='get-page';
		var dataString ='action='+ action+'&page='+ page;
		$.ajax({
		type: "POST",
		url: local_url,
		data: dataString,
		cache: false,
		success: function(html){
			$('#page-content').html(html);
			}
		});
	 }
}
function _get_page_with_id(page,ids){
	$('#page-content').html('<div class="ajax-loader">Loading...<br><img src="all-images/images/ajax-loader.gif"/></div>').fadeIn(500);
		var action='get-page-with-id';
		var dataString ='action='+ action+'&page='+ page+'&ids='+ ids;
		$.ajax({
		type: "POST",
		url: local_url,
		data: dataString,
		cache: false,
		success: function(html){
			$('#page-content').html(html);
			}
		});
}

function _get_form(page){
			_close_all_nav();	
		$('#get-more-div').html('<div class="ajax-loader">Loading...<br><img src="all-images/images/ajax-loader.gif"/></div>').fadeIn('fast');
			var action='get-form';
			var dataString ='action='+ action+'&page='+ page;
			$.ajax({
			type: "POST",
			url: local_url,
			data: dataString,
			cache: false,
			success: function(html){$('#get-more-div').html(html);}
			});
}
function _get_form_with_id(page,ids,title_text){//NEW UPDATE
		$('#get-more-div').html('<div class="ajax-loader">Loading...<br><img src="all-images/images/ajax-loader.gif"/></div>').fadeIn('fast');
			var action='get-form-with-id';
			var dataString ='action='+ action+'&page='+ page+'&ids='+ ids+'&ids='+ ids;
			$.ajax({
			type: "POST",
			url: local_url,
			data: dataString,
			cache: false,
			success: function(html){
				$('#get-more-div').html(html);
				$('#page-title2').html(title_text);//NEW UPDATE
			}
			});
}


function _get_secondary_form_with_id(action,ids){
		$('#get-more-div-secondary').html('<div class="ajax-loader">Loading...<br><img src="all-images/images/ajax-loader.gif"/></div>').fadeIn('fast');
			var dataString ='action='+ action+'&ids='+ ids;
			$.ajax({
			type: "POST",
			url: local_url,
			data: dataString,
			cache: false,
			success: function(html){$('#get-more-div-secondary').html(html);}
			});
}

function alert_close(){
		$('#get-more-div').html('').fadeOut(200);
}
function alert_secondary_close(){
		$('#get-more-div-secondary').html('').fadeOut(200);
}
function _toggle_profile_pix_div(){
	   $('.toggle-profile-div').toggle('slow');
}
function _get_inner_form(page,ids){
		$('.inner-div').html('<div class="ajax-loader">Loading...<br><img src="all-images/images/ajax-loader.gif"/></div>').fadeIn('fast');
			var action='get-inner-form';
			var dataString ='action='+ action+'&page='+ page+'&ids='+ ids;
			$.ajax({
			type: "POST",
			url: local_url,
			data: dataString,
			cache: false,
			success: function(html){
				$('.inner-div').html(html);
				}
			});
}
	
function isNumber(evt){
	evt=(evt) ? evt: window.event;
	var charcode=(evt.which) ? evt.which : evt.keyCode;
	if(charcode>31 && (charcode<48 || charcode>57)){
		return false;
	}
	return true;
}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

function select_search(){
		$('.srch-select').toggle('fast');
};
function srch_custom(text){
		$('#srch-text').html(text);
		$('.custom-srch-div').fadeIn(500);
};



function _chart_for_trend(){
	var action='trendbarchart';
	var dataString ='action='+ action;
		$.ajax({
		type: "POST",
		url: local_url,
		data: dataString,
		cache: false,
		success: function(html){
			$('#chart-report-div').html(html);
		}
		});
}


function _arps_matrix(datefrom, dateto){
	var action='arps_matrix';
	var dataString ='action='+ action+'&datefrom='+ datefrom+'&dateto='+ dateto;
		$.ajax({
		type: "POST",
		url: local_url,
		data: dataString,
		cache: false,
		success: function(html){
			$('#arps-matrix').html(html);
		}
		});
}


function _payment_matrix(datefrom, dateto){
	var action='payment_matrix';
	var dataString ='action='+ action+'&datefrom='+ datefrom+'&dateto='+ dateto;
		$.ajax({
		type: "POST",
		url: local_url,
		data: dataString,
		cache: false,
		success: function(html){
			$('#payment-matrix').html(html);
		}
		});
}


function _get_all_count(){
			var action ='get_all_count'
			var dataString ='action='+ action;
			$.ajax({
			type: "POST",
			url: local_url,
			data: dataString,
			dataType: 'json',
			cache: false,
			success: function(data){
				//// for staff
			var total_active_staff_count = data.total_active_staff_count;
			$('#total_active_staff_count').html(total_active_staff_count);
			var total_suspended_staff_count = data.total_suspended_staff_count;
			$('#total_suspended_staff_count').html(total_suspended_staff_count);
			var total_prospective_staff_count = data.total_prospective_staff_count;
			$('#total_prospective_staff_count,#total_prospective_staff_count1').html(total_prospective_staff_count);
			
			var total_active_customer_count = data.total_active_customer_count;
			$('#total_active_customer_count').html(total_active_customer_count);

			var total_product_cat_count = data.total_product_cat_count;
			$('#total_product_cat_count').html(total_product_cat_count);
			var total_stock_count = data.total_stock_count;
			$('#total_stock_count').html(total_stock_count);
			
			var total_outstanding_orders = data.total_outstanding_orders;
			$('#total_outstanding_orders').html(total_outstanding_orders);
			var total_pending_orders = data.total_pending_orders;
			$('#total_pending_orders,#total_pending_orders1').html(total_pending_orders);
			var total_attending_orders = data.total_attending_orders;
			$('#total_attending_orders').html(total_attending_orders);
			var total_ready_orders = data.total_ready_orders;
			$('#total_ready_orders').html(total_ready_orders);
			var total_delivery_orders = data.total_delivery_orders;
			$('#total_delivery_orders').html(total_delivery_orders);
			
			
			
			var total_active_blogs_count = data.total_active_blogs_count;
			$('#total_active_blogs_count').html(total_active_blogs_count)
			var total_faq_count = data.total_faq_count;
			$('#total_faq_count').html(total_faq_count)
			}
			});
}




$(document).ready(function() {
		window.setInterval(function(){
			get_notification_number();
		},180000);
});



function get_notification_number(){
		var action='get_notification_number';
		var dataString ='action='+ action;
			$.ajax({
			type: "POST",
			url: local_url,
			data: dataString,
			cache: false,
			dataType: 'json',
			cache: false,
			success: function(data){
 	var scheck = data.check;
	if (scheck>0){
		if (scheck>9){var scheck='9+';}
		$('.notification').html('<i class="fa fa-bell-o"></i><div>'+scheck+'</div>');
	}else{
		$('.notification').html('<i class="fa fa-bell-o"></i><div>0</div>');
	}
				}
		});
}


	
	
function get_dashboard_report(id,action,view_report){
		$('#srch-text').html($('#'+id).html());
		$('.custom-srch-div').fadeOut(500);
		$('#chart-report-div').html('<div class="ajax-loader">Loading Matrix...<br><img src="all-images/images/ajax-loader.gif"/></div>');
			var dataString ='action='+ action+'&view_report='+ view_report;
			$.ajax({
			type: "POST",
			url: "config/code.php",
			data: dataString,
			cache: false,
			success: function(html){
				$('#chart-report-div').html(html);
				}
		});
	}
	
function _fetch_custom_dashboard_report(action,view_report){
		var datefrom=$('#datepicker-from').val();
		var dateto=$('#datepicker-to').val();
			if((datefrom=='')||(dateto=='')){
$('#warning-div').html('<div><i class="fa fa-warning (alias)"></i></div> Search Date Fields Empty<br /><span>Please fill all the feilds</span>').fadeIn(500).delay(5000).fadeOut(100);
			}else{
		$('#chart-report-div').html('<div class="ajax-loader">Loading Matrix...<br><img src="all-images/images/ajax-loader.gif"/>');
			var dataString ='action='+ action+'&datefrom='+datefrom+'&dateto='+dateto+'&view_report='+ view_report;
			$.ajax({
			type: "POST",
			url: "config/code.php",
			data: dataString,
			cache: false,
			success: function(html){
				$('#chart-report-div').html(html);
				}
		});
			}
};

	
	
	
function get_load_stock_report(id,action,view_report){
		$('#srch-text').html($('#'+id).html());
		$('.custom-srch-div').fadeOut(500);
		$('#get-stock-report').html('<div class="ajax-loader">Loading Matrix...<br><img src="all-images/images/ajax-loader.gif"/></div>');
			var dataString ='action='+ action+'&view_report='+ view_report;
			$.ajax({
			type: "POST",
			url: "config/code.php",
			data: dataString,
			cache: false,
			success: function(html){
				$('#get-stock-report').html(html);
				}
		});
	}
	
function _fetch_custom_load_stock_report(action,view_report){
		var datefrom=$('#datepicker-from').val();
		var dateto=$('#datepicker-to').val();
			if((datefrom=='')||(dateto=='')){
$('#warning-div').html('<div><i class="fa fa-warning (alias)"></i></div> Search Date Fields Empty<br /><span>Please fill all the feilds</span>').fadeIn(500).delay(5000).fadeOut(100);
			}else{
		$('#get-stock-report').html('<div class="ajax-loader">Loading Matrix...<br><img src="all-images/images/ajax-loader.gif"/>');
			var dataString ='action='+ action+'&datefrom='+datefrom+'&dateto='+dateto+'&view_report='+ view_report;
			$.ajax({
			type: "POST",
			url: "config/code.php",
			data: dataString,
			cache: false,
			success: function(html){
				$('#get-stock-report').html(html);
				}
		});
			}
};
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	






function _fetch_users_list(status_id){
		var all_search_txt = $('#all_search_txt').val();
	$('#search-content').html('<div class="ajax-loader">loading...<br><img src="all-images/images/ajax-loader.gif"/></div>').fadeIn(500);
		var action='fetch_users_list';
		var dataString ='action='+ action+'&all_search_txt='+ all_search_txt+'&status_id='+ status_id;
		$.ajax({
		type: "POST",
		url: local_url,
		data: dataString,
		cache: false,
		success: function(html){$('#search-content').html(html);}
		});
}





function _get_fetch_all_customer(user_id){
	var action ='fetch_customer_api';
	var search_txt = $('#search_txt').val();
	if ((search_txt.length>=3) || (search_txt=='')){
	$('#search-content').html('<div class="ajax-loader">loading...<br><img src="all-images/images/ajax-loader.gif"/></div>').fadeIn(500);
	var dataString ='action='+action+'&user_id='+user_id+'&search_txt='+search_txt; 
	   $.ajax({
		  type: "POST",
		  url: api,
		  data: dataString,
		  dataType: 'json',
		  cache: false,
		  success: function(info){
			 var fetch= info.data;
			
			 var result=info.result;
			 var message=info.message;

			 var text = '';
			 if (result==true ){
				for (var i = 0; i < fetch.length; i++) {
				   var user_id =fetch[i].user_id;
				   var fullname =fetch[i].fullname;
				   var phone =fetch[i].phone;
				 
				   var status_name =fetch[i].status_name;
				   var passport =fetch[i].passport;
				  
				   if (passport==''){
					 passport='friends.png';
				   }
	
				   text += 
						'<div class="user-div" onClick="_get_form_with_id('+"'customer_transaction_details'"+','+"'"+user_id+"'"+')">'+
						'<div class="pix-div"><img src="'+website_url+'/uploaded_files/user_passport/'+passport+'" /></div>'+
							'<div class="detail">'+
								'<div class="name-div"><div class="name"> '+fullname+'</div><hr /><br/></div>'+
								'<div class="text">ID: '+user_id+'</div>'+
								'<div class="text">'+phone+'</div>'+
								'<div class="active">'+status_name+'</div><br>'+
							'</div>'+
						'</div>';
					 
					  $('#search-content').html(text);
				   }
				   }else{
				   text = 
				   	'<br><div class="false-notification-div">'+
				  	 '<p>'+message+'</p>'+
			   		'</div>'; 
					  $('#search-content').html(text); 
				  }
					  
		  }
	   });    
}
}


function _get_customer_info(user_id){
	var action ='fetch_customer_api';
	var dataString ='action='+action+'&user_id='+user_id; 
	   $.ajax({
		  type: "POST",
		  url: api,
		  data: dataString,
		  dataType: 'json',
		  cache: false,
		  success: function(info){
			 var fetch= info.data;

			 var user_id=fetch.user_id;
			 var last_login_date=fetch.last_login_date;
			 var fullname=fetch.fullname;
			 var phone=fetch.phone;
			 var email=fetch.email;
			 var address=fetch.address;

			 

			 $('#user_id').html(user_id); 
			 $('#last_login_date').html(last_login_date); 
			 $('#fullname').val(fullname); 
			 $('#phone').val(phone); 
			 $('#email').val(email); 
			 $('#address').val(address); 
			 $('#customer_name').html(fullname);
			 $('#last_login_date').html(last_login_date);
			}
		}); 
}



function _update_customer(user_id){
	var fullname = $('#fullname').val();
	var phone = $('#phone').val();
	var email = $('#email').val();
	var address = $('#address').val();
	
	$('#fullname, #phone, #email, #address').removeClass('issue');
	if (fullname==''){
		 $('#fullname').addClass('issue');
		$('#warning-div').html('<div><i class="fa fa-warning (alias)"></i></div> FULLNAME ERROR!<br><span>Check The FULLNAME And Try Again</span>').fadeIn(500).delay(5000).fadeOut(100);
	}else if(phone==''){
		$('#phone').addClass('issue');
	   $('#warning-div').html('<div><i class="fa fa-warning (alias)"></i></div> PHONE MUNBER ERROR!<br><span>Check PHONE NUMBER And Try Again</span>').fadeIn(500).delay(5000).fadeOut(100);
	} else if ((email=='')||($('#email').val().indexOf('@')<=0)){
		$('#email').addClass('issue');
		$('#warning-div').html('<div><i class="fa fa-warning (alias)"></i></div> EMAIL ERROR!<br><span>Check EMAIL ADDRESS And Try Again</span>').fadeIn(500).delay(5000).fadeOut(100);
	}else if ((address=='')){
		$('#address').addClass('issue');
		$('#warning-div').html('<div><i class="fa fa-warning (alias)"></i></div> ADDRESS ERROR!<br><span>Check ADDRESS And Try Again</span>').fadeIn(500).delay(5000).fadeOut(100);
	}else{
if (confirm("Confirm!!\n\n Have you confirm all DATA?")){
		//////////////// get btn text ////////////////
		var btn_text=$('#proceed-btn').html();
		$('#proceed-btn').html('VERIFYING...');
		document.getElementById('proceed-btn').disabled=true;
		////////////////////////////////////////////////	
		var action ='add_or_update_customer_api';
		var dataString ='action='+ action+'&user_id='+ user_id+'&fullname='+ fullname+'&phone='+ phone+'&email='+ email+'&address='+ address;
		$.ajax({
			type: "POST",
			url: api,
			data: dataString,
			cache: false,
			success: function(info){
				var result = info.result;
				var message1 = info.message1;
				var message2 = info.message2;
				if (result==true){
					_get_page('active_customer','active_customer','customer','');
					$('#success-div').html('<div><i class="fa fa-check"></i></div> '+message1+'').fadeIn(500).delay(5000).fadeOut(100);
						alert_close();
				}else{
					$('#email').addClass('issue');
					$('#warning-div').html('<div><i class="fa fa-warning (alias)"></i></div> '+message1+'<br><span>'+message2+'</span>').fadeIn(500).delay(5000).fadeOut(100);
				}
				$('#proceed-btn').html(btn_text);
				document.getElementById('proceed-btn').disabled=false;
			}
			
		});
}else{
	return false;
}
	}
}


function _delete_user(user_id){
			if (confirm("Confirm!!\n\n Are you sure to DELETE THIS PROSPECTIVE STAFF?")){
		$('#delete-user-btn').html('Deleting...');
			document.getElementById('delete-user-btn').disabled=true;
			var action ='delete_user'
			var dataString ='action='+ action+'&user_id='+ user_id;
			$.ajax({
			type: "POST",
			url: local_url,
			data: dataString,
			cache: false,
			success: function(html){
			$('#success-div').html('<div><i class="fa fa-check"></i></div> PROSPECTIVE STAFF DELETED SUCCESSFULLY!').fadeIn(500).delay(5000).fadeOut(100);
			$('#'+user_id).fadeOut(500);
			alert_close();
			_get_all_count();
				}
			});
			}else{
				return false;
			}
}








///////////////// NEW UPDATE ////////////////////////

function _get_active_details(ids,text){
	$('#next-all, #next-order, #next-wallet').removeClass('active-btn');
	$('#next-'+text).addClass('active-btn');
	$('#order-title').html('<span id="prev"><i class="fa fa-arrow-left" onClick="_get_details('+"'get_order_items1'"+','+"'"+ids+"'"+','+"'get_order_items'"+')"></i></span>');	 
}
function _prev_page() {
	$('#prev').html('<i class="fa fa-shopping-basket">');	 
 }

function _get_details(page,ids,text,status_name,name){
	_get_active_details(ids,text);
	var action='get_details';
	$('#get_details').html('<div class="ajax-loader">loading...<br><img src="all-images/images/ajax-loader.gif"/></div>').fadeIn(500);
	var dataString ='action='+ action+'&page='+ page+'&ids='+ ids+'&status_name='+ status_name+'&name='+ name;
	$.ajax({
	type: "POST",
	url: local_url,
	data: dataString,
	cache: false,
	success: function(html){
		$('#get_details').html(html);
	}
	});
}



function _get_customer_order_history_details(user_id,view_report,id){
	$('#srch-text').html($('#'+id).html());
	var action ='fetch_order_history_api';
	//var dataString ='action='+action+'&user_id='+user_id; 
	var dataString ='action='+ action+'&user_id='+ user_id+'&view_report='+ view_report;
	   $.ajax({
		  type: "POST",
		  url: api,
		  data: dataString,
		  dataType: 'json',
		  cache: false,
		  success: function(info){
			var fetch =info.data;
			var message1 = info.message1;
			var result = info.result;
			var text='';
			
			
			text = 
			
				'<tr class="tb-col">'+
					'<td>DATE</td>'+
					'<td>ORDER ID</td>'+
					'<td>ITEMS</td>'+
					'<td>(<s>N</s>)AMOUNT</td>'+
					'<td>LOGISTICS</td>'+
					'<td>ORDER STATUS</td>'+
					'<td>PAYMENT METHOD</td>'+
					'<td>PAYMENT STATUS</td>'+
				'</tr>';

			
			if (result==true ){
				
			   for (var i = 0; i < fetch.length; i++) {
					var date= fetch[i].date;
					var order_id= fetch[i].order_id;
					var nums_of_items= fetch[i].nums_of_items;
					var total_amount= fetch[i].total_amount;
					var logistic_name= fetch[i].logistic_name;
					var status_name= fetch[i].status_name;
					var fund_method_name= fetch[i].fund_method_name;
					var payment_status= fetch[i].payment_status;
				text +=
				'<tr>'+
					'<td>'+date+'</td>'+
					'<td><span onClick="_get_form_with_id('+"'get_order_items'"+','+"'"+order_id+"'"+')">'+order_id+'</span></td>'+
					'<td>'+nums_of_items+'</td>'+
					'<td><span>₦ '+numberwithcomma(total_amount)+'</span></td>'+
					'<td>'+logistic_name+'</td>'+
					'<td class="'+status_name+'">'+status_name+'</td>'+
					'<td>'+fund_method_name+'</td>'+
					'<td class="'+payment_status+'">'+payment_status+'</td>'+
				'</tr>';
			   }
			   $('#fetch_order_detail').html(text);

			}else{
				var text1 = 
			
				'<tr class="tb-col">'+
					'<td>DATE</td>'+
					'<td>ORDER ID</td>'+
					'<td>ITEMS</td>'+
					'<td>(<s>N</s>)AMOUNT</td>'+
					'<td>LOGISTICS</td>'+
					'<td>ORDER STATUS</td>'+
					'<td>PAYMENT METHOD</td>'+
					'<td>PAYMENT STATUS</td>'+
				'</tr>';

				text = 
				'<tr>'+
					'<td colspan="20">'+
						'<div class="alert" style="text-align:center"><i class="fa fa-bell-o"></i> '+message1 +'</div>'+
					'</td>'+
                '</tr>';
				$('#fetch_order_detail').html(text1 + text);
		  }   
		  
		
		
	}
			
		}); 
}











function _get_each_order_history_details(order_id){
	var action ='fetch_each_order_history_api';
	var dataString ='action='+ action+'&order_id='+ order_id;
	   $.ajax({
		  type: "POST",
		  url: api,
		  data: dataString,
		  dataType: 'json',
		  cache: false,
		  success: function(info){
			var fetch =info.data;
			var message1 = info.message1;
			var result = info.result;
			var no=0;
			var text='';
			
			
			text = 
				'<tr class="tb-col">'+
					'<td>S/N</td>'+
					'<td>PRODUCT CATEGORY NAME</td>'+
					'<td>PRODUCT NAME</td>'+
					'<td>PRODUCT QTY</td>'+
					'<td>PURCHASE PRICE</td>'+
					'<td>SELLING PRICE</td>'+
					'<td>CUSTOMER NAME</td>'+
					'<td>CUSTOMER NUMBER</td>'+
				'</tr>';

			
			if (result==true ){
				
			   for (var i = 0; i < fetch.length; i++) {
					no++;
					var product_cat_name= fetch[i].product_cat_name;
					var product_name= fetch[i].product_name;
					var product_qty= fetch[i].product_qty;
					var sub_price= fetch[i].sub_price;
					var selling_price= fetch[i].selling_price;
					var fullname= fetch[i].fullname;
					var phone= fetch[i].phone;
					
				text +=
				'<tr>'+
					'<td>'+no+'</td>'+
					'<td>'+product_cat_name+'</td>'+
					'<td><span>'+product_name+'</span></td>'+
					'<td>'+product_qty+'</td>'+
					'<td><span><s>N</s> '+numberwithcomma(sub_price)+'</span></td>'+
					'<td><span><s>N</s> '+numberwithcomma(selling_price)+'</span></td>'+
					'<td>'+fullname+'</td>'+
					'<td>'+phone+'</td>'+
					
				'</tr>';
			   }
			   $('#'+order_id+'_table').html(text);

			}else{
				var text1 = 
			
				'<tr class="tb-col">'+
					'<td>S/N</td>'+
					'<td>PRODUCT CATEGORY NAME</td>'+
					'<td>PRODUCT NAME</td>'+
					'<td>PRODUCT QTY</td>'+
					'<td>PURCHASE PRICE</td>'+
					'<td>SELLING PRICE</td>'+
					'<td>CUSTOMER NAME</td>'+
					'<td>CUSTOMER NUMBER</td>'+
				'</tr>';

				text = 
				'<tr>'+
					'<td colspan="20">'+
						'<div class="alert" style="text-align:center"><i class="fa fa-bell-o"></i> '+message1 +'</div>'+
					'</td>'+
                '</tr>';
				$('#'+order_id+'_table').html(text1 + text);
		  }   
		  
		
		
	}
			
		}); 
}





function get_order_report(id,view_report,user_id){
	$('#srch-text').html($('#'+id).html());
	$('.custom-srch-div').fadeOut(500);
	var action ='fetch_order_history_api';
	//var dataString ='action='+action+'&user_id='+user_id; 
	var dataString ='action='+ action+'&view_report='+ view_report+'&user_id='+ user_id;
		$.ajax({
		type: "POST",
		url: api,
		data: dataString,
		cache: false,
		success: function(html){
			_get_customer_order_history_details(view_report,user_id);
		}
	});
}




function _get_customer_wallet_history_details(user_id){
	var action ='fetch_wallet_history_api';
	var dataString ='action='+action+'&user_id='+user_id; 
	   $.ajax({
		  type: "POST",
		  url: api,
		  data: dataString,
		  dataType: 'json',
		  cache: false,
		  success: function(info){
			var fetch =info.data;
			var message1 = info.message1;
			var result = info.result;
			var user_wallet_balance = info.user_wallet_balance;
			var amount_received = info.amount_received;
			var amount_withdraw = info.amount_withdraw;
			var text='';
			
			
			text = 
				'<tr class="tb-col">'+
					'<td>DATE</td>'+
					'<td>TRANS ID</td>'+
					'<td>BALANCE BEFORE</td>'+
					'<td>AMOUNT LOADED</td>'+
					'<td>BALANCE AFTER</td>'+
					'<td>TRANS TYPE</td>'+
					'<td>STATUS</td>'+
				'</tr>';

			if (result==true ){

			   for (var i = 0; i < fetch.length; i++) {
					var date= fetch[i].date;
					var pay_id= fetch[i].pay_id;
					var balance_before= fetch[i].balance_before;
					var amount= fetch[i].amount;
					var balance_after= fetch[i].balance_after;
					var transaction_type_name= fetch[i].transaction_type_name;
					var status_name= fetch[i].status_name;

				text +=
				'<tr>'+
					'<td>'+date+'</td>'+
					'<td>'+pay_id+'</td>'+
					'<td><span>₦ '+numberwithcomma(balance_before)+'</span></td>'+
					'<td class="'+status_name+'">₦ '+numberwithcomma(amount)+'</td>'+
					'<td><span>₦ '+numberwithcomma(balance_after)+'</span></td>'+
					'<td>'+transaction_type_name+'</td>'+
					'<td class="'+status_name+'">'+status_name+'</td>'+
				'</tr>';
			   }
			   $('#user_wallet_balance').html(numberwithcomma(user_wallet_balance));
			   $('#amount_received').html(numberwithcomma(amount_received));
			   $('#amount_withdraw').html(numberwithcomma(amount_withdraw));
			   $('#fetch_wallet_detail').html(text);

			}else{
			var	text1 = 
				'<tr class="tb-col">'+
					'<td>DATE</td>'+
					'<td>TRANS ID</td>'+
					'<td>BALANCE BEFORE</td>'+
					'<td>AMOUNT LOADED</td>'+
					'<td>BALANCE AFTER</td>'+
					'<td>TRANS TYPE</td>'+
					'<td>STATUS</td>'+
				'</tr>';
				text = 
				'<tr>'+
					'<td colspan="20">'+
						'<div class="alert" style="text-align:center"><i class="fa fa-bell-o"></i> '+message1 +'</div>'+
					'</td>'+
                '</tr>';
				$('#fetch_wallet_detail').html(text1 + text);
		  }   
		
	}
			
		}); 
}





function _fetch_custom_order_report(action,view_report){
	var datefrom=$('#datepicker-from').val();
	var dateto=$('#datepicker-to').val();
		if((datefrom=='')||(dateto=='')){
$('#warning-div').html('<div><i class="fa fa-warning (alias)"></i></div> Search Date Fields Empty<br /><span>Please fill all the feilds</span>').fadeIn(500).delay(5000).fadeOut(100);
		}else{
	$('#search-content').html('<div class="ajax-loader">Loading Matrix...<br><img src="all-images/images/processing.gif"/>');
		var dataString ='action='+ action+'&datefrom='+datefrom+'&dateto='+dateto+'&view_report='+ view_report;
		$.ajax({
		type: "POST",
		url: "config/code.php",
		data: dataString,
		cache: false,
		success: function(html){
			$('#search-content').html(html);
			}
	});
		}
};








///////////////// END NEW UPDATE ////////////////////////






function _activate_user(user_id){
			var role_id = $('#role_id').val();
			var status_id = $('#status_id').val();
			var email = $('#email').val();
			if((role_id=='0')||(status_id=='P')||(email=='')){
		$('#warning-div').html('<div><i class="fa fa-warning (alias)"></i></div> ACTIVATION DENIED<br /><span>Check Administrative Details to Continue</span>').fadeIn(500).delay(5000).fadeOut(100);
			}else{
			if (confirm("Confirm!!\n\n Are you sure to ACTIVATE STAFF?")){
		$('#activate-user-btn').html('Activating...');
			document.getElementById('activate-user-btn').disabled=true;
			var action ='activate_user'
			var dataString ='action='+ action+'&user_id='+ user_id+'&role_id='+ role_id+'&status_id='+ status_id+'&email='+ email;
			$.ajax({
			type: "POST",
			url: local_url,
			data: dataString,
			dataType: 'json',
			cache: false,
			success: function(data){
			var scheck = data.check;
			var newuserid = data.newuserid;
			if(scheck==1){
				$('#'+user_id).fadeOut(500);
				$('#success-div').html('<div><i class="fa fa-check"></i></div> STAFF ACTIVATED SUCCESSFULLY!').fadeIn(500).delay(5000).fadeOut(100);
				_get_form_with_id('user_profile',newuserid);
				_get_all_count();
			}else{
				$('#warning-div').html('<div><i class="fa fa-warning (alias)"></i></div> EMAIL ERROR!<br><span> Email Cannot Be Use</span>').fadeIn(500).delay(5000).fadeOut(100);
				$('#activate-user-btn').html('ACTIVATE <i class="fa fa-check"></i>');
				document.getElementById('activate-user-btn').disabled=false;
			}
				}
			});
			}else{
				return false;
			}
			}
}

function _update_user_profile(user_id){
			var surname = $('#surname').val();
			var othernames = $('#othernames').val();
			var dob = $('#datepicker').val();
			var gender = $('#gender').val();
			var religion = $('#religion').val();
			
			var nationality = $('#nationality').val();
			var state = $('#state').val();
			var lga = $('#lga').val();
			var address = $('#address').val();
			var email = $('#email').val();
			var phone = $('#phoneno').val();
			
			var job_id = $('#job_id').val();
			var role_id = $('#role_id').val();
			var status_id = $('#status_id').val();
			if((surname=='')||(othernames=='')||(dob=='')||(gender=='')||(religion=='')||(nationality=='')||(state=='')||(lga=='')||(address=='')||(email=='')||(phone=='')){
		$('#warning-div').html('<div><i class="fa fa-warning (alias)"></i></div> USER ERROR!<br /><span>Fill the neccessary Fields  to continue</span>').fadeIn(500).delay(5000).fadeOut(100);
			}else{
			if (confirm("Confirm!!\n\n Are you sure to UPDATE USER?")){
		$('#update-user-btn').html('Updating...');
			document.getElementById('update-user-btn').disabled=true;
			var action ='update_users_profile';
			var dataString ='action='+ action+'&user_id='+ user_id+'&surname='+ surname+'&othernames='+ othernames+'&dob='+ dob+'&gender='+ gender+'&religion='+ religion+'&nationality='+ nationality+'&state='+ state+'&lga='+ lga+'&address='+ address+'&email='+ email+'&phone='+ phone+'&job_id='+ job_id+'&role_id='+ role_id+'&status_id='+ status_id;
			$.ajax({
			type: "POST",
			url: local_url,
			data: dataString,
			dataType: 'json',
			cache: false,
			success: function(data){
			var scheck = data.check;
			if(scheck==1){
				_get_all_count();
						if (status_id=='A'){
						_get_page('active_staff','active_staff','staff','')
						}else{
						_get_page('suspended_staff','suspended_staff','staff','')	
						}
				$('#success-div').html('<div><i class="fa fa-check"></i></div> USER PROFILE UPDATED SUCCESSFULLY!').fadeIn(500).delay(5000).fadeOut(100);
				_get_form_with_id('user_profile',user_id);
			}else{
				$('#warning-div').html('<div><i class="fa fa-warning (alias)"></i></div> EMAIL ERROR!<br><span> Email Cannot Be Use</span>').fadeIn(500).delay(5000).fadeOut(100);
			}
				$('#update-user-btn').html('Update <i class="fa fa-check"></i>');
				document.getElementById('update-user-btn').disabled=false;
				
				}
			});
			}else{
				return false;
			}
			}
	
}

$(function(){
    Test = {
        UpdatePreview: function(obj){
          // if IE < 10 doesn't support FileReader
          if(!window.FileReader){
             // don't know how to proceed to assign src to image tag
          } else {
			  _upload_profile_pix();
             var reader = new FileReader();
             var target = null;

             reader.onload = function(e) {
              target =  e.target || e.srcElement;
               $("#passportimg1,#passportimg2,#passportimg3").prop("src", target.result);
             };
              reader.readAsDataURL(obj.files[0]);
          }
        }
    };
});

function _upload_profile_pix(){
		var action = 'update_profile_pix';
        var file_data = $('#passport').prop('files')[0];
		if (file_data==''){}else{ 
        var form_data = new FormData();                  
        form_data.append('passport', file_data);
        form_data.append('action', action);
        $.ajax({
			url: local_url,
            type: "POST",
            data: form_data,
            contentType: false,
            cache: false,
            processData:false,
            success: function(html){
		$('#success-div').html('<div><i class="fa fa-check"></i></div> PROFILE PICTURE UPDATED SUCCESSFULLY').fadeIn(500).delay(5000).fadeOut(100);
            $('#passport').val('');
			}
        });
		}
}

///////////////change user password//////////////
function _update_user_password(userid){
 			$('.success-div').hide()
			var oldpass = $('#oldpass').val();
			var newpass = $('#newpass').val();
			var cnewpass = $('#cnewpass').val();
			if((oldpass=='')||(newpass=='')||(cnewpass=='')){
$('#warning-div').html('<div><i class="fa fa-warning (alias)"></i></div> Please Fill The Passwords<br /><span>Fields cannot be empty</span>').fadeIn(500).delay(5000).fadeOut(100);
			}
			else if(newpass!=cnewpass){
$('#not-success-div').html('<div><i class="fa fa-close"></i></div>New Password Not Match<br /><span>Check the fields again</span>').fadeIn(500).delay(5000).fadeOut(100);
			}else{
			//////////////// get btn text ////////////////
					var btn_text=$('#update-user-password-btn').html();
					$('#update-user-password-btn').html('PROCESSING...');
					document.getElementById('update-user-password-btn').disabled=true;
			////////////////////////////////////////////////	
		var action ='update_user_password';
			var dataString ='action='+ action+'&userid='+ userid+'&oldpass='+ oldpass+'&newpass='+ newpass;
			$.ajax({
			type: "POST",
			url: local_url,
			data: dataString,
			dataType: 'json',
			cache: false,
			success: function(data){
			var scheck = data.check;
				if(scheck==0){
				$('#not-success-div').html('<div><i class="fa fa-close"></i></div>USER ERROR! <br /><span> Incorrect Old Password</span>').fadeIn(500).delay(5000).fadeOut(100);
				}else{
				$('#success-div').html('<div><i class="fa fa-check"></i></div>PASSWORD UPDATED!<br /><span>Please Re-Login To Continue</span>').fadeIn(500).delay(5000).fadeOut(100);
				alert_close()
				}				
					$('#update-user-password-btn').html(btn_text);
					document.getElementById('update-user-password-btn').disabled=false;
				}
			});
			}
}






	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	






function _preview_product_pix(){
	$('#pix-preview-div').html('');
   var totalFiles = $('#product_pix').get(0).files.length;
   for(var i = 0; i < totalFiles; i++){
      $('#pix-preview-div').append("<div class='product-pictures'><div class='img'><img src='"+URL.createObjectURL(event.target.files[i])+"'/></div></div>");
   }
}

function _add_product_category(){
	var product_cat_name = $('#product_cat_name').val();
	var status_id = $('#status_id').val();
	var product_pix = $('#product_pix').val();
	if((product_cat_name=='')||(status_id=='')||(product_pix=='')){
		$('#warning-div').html('<div><i class="fa fa-warning (alias)"></i></div> USER ERROR!<br /><span>Fields cannot be empty</span>').fadeIn(500).delay(5000).fadeOut(100);
	}else{
		
		$('#proceed-btn').html('PROCESSING...');
		document.getElementById('proceed-btn').disabled=true;
		
		  var action = 'add_product_category';
		  var formData = new FormData();
		  var totalFiles = $('#product_pix').get(0).files.length;
			 formData.append('action', action);
			 formData.append('product_cat_name', product_cat_name);
			 formData.append('status_id', status_id);
		  for(var i = 0; i < totalFiles; i++){
			 formData.append("product_pix[]", $("#product_pix").get(0).files[i]);
		  }	
				$.ajax({
				   type: "POST",
				   url: local_url,
				   data: formData,
				   cache: false,
				   contentType: false,
				   processData: false,
				   success: function(){
					   _get_all_count();
					$('#success-div').html('<div><i class="fa fa-check"></i></div> PRODUCT CATEGORY REGISTERED SUCCESSFULLY').fadeIn(500).delay(5000).fadeOut(100);
					   _get_page('product_cat','products', 'products','');
					   alert_close();
					}
				});
	}
}



function _update_product_category(product_cat_id){
	var product_cat_name = $('#product_cat_name').val();
	var status_id = $('#status_id').val();
	var product_pix = $('#product_pix').val();
	if((product_cat_name=='')||(status_id=='')){
		$('#warning-div').html('<div><i class="fa fa-warning (alias)"></i></div> USER ERROR!<br /><span>Fields cannot be empty</span>').fadeIn(500).delay(5000).fadeOut(100);
	}else{

		$('#proceed-btn').html('PROCESSING...');
		document.getElementById('proceed-btn').disabled=true;

		  var action = 'update_product_category';
		  var formData = new FormData();
		  var totalFiles = $('#product_pix').get(0).files.length;
			 formData.append('action', action);
			 formData.append('product_cat_id', product_cat_id);
			 formData.append('product_cat_name', product_cat_name);
			 formData.append('product_pix', product_pix);
			 formData.append('status_id', status_id);
		  for(var i = 0; i < totalFiles; i++){
			 formData.append("product_pix[]", $("#product_pix").get(0).files[i]);
		  }	
				$.ajax({
				   type: "POST",
				   url: local_url,
				   data: formData,
				   cache: false,
				   contentType: false,
				   processData: false,
				   success: function(){
					   _get_all_count();
					$('#success-div').html('<div><i class="fa fa-check"></i></div> PRODUCT CATEGORY UPDATED SUCCESSFULLY').fadeIn(500).delay(5000).fadeOut(100);
					   _get_page('product_cat','products', 'products','');
					   alert_close();
					}
				});
	}
}



function _fetch_products_cat_list_txt(){
	var all_search_txt = $('#all_search_txt').val();
	var txt_lenght = $('#all_search_txt').val().length;
	if ((txt_lenght>2)||(txt_lenght==0)){
		_fetch_products_cat_list();
	}
}

function _fetch_products_cat_list(){
	var status_id = $('#status_id').val();
	var all_search_txt = $('#all_search_txt').val();
	var action = 'fetch_products_cat_list';
	$('#search-content').html('<div class="ajax-loader">loading...<br><img src="all-images/images/ajax-loader.gif"/></div>').fadeIn(500);
		var dataString ='action='+ action+'&all_search_txt='+ all_search_txt+'&status_id='+ status_id;
		$.ajax({
		type: "POST",
		url: local_url,
		data: dataString,
		cache: false,
		success: function(html){
			$('#search-content').html(html);
			}
		});
}












function _add_product(product_cat_id){
	var product_name = $('#product_name').val();
	var product_desc =$('#product_desc').val();
	var status_id = $('#status_id').val();
	var product_pix = $('#product_pix').val();
	var purchase_price = $('#purchase_price').val();
	var selling_price = $('#selling_price').val();
	if((product_name=='')||(product_desc=='')||(status_id=='')||(product_pix=='')||(purchase_price=='')||(selling_price=='')){
		$('#warning-div').html('<div><i class="fa fa-warning (alias)"></i></div> USER ERROR!<br /><span>Fields cannot be empty</span>').fadeIn(500).delay(5000).fadeOut(100);
	}else{
		$('#proceed-btn').html('PROCESSING...');
		document.getElementById('proceed-btn').disabled=true;

		  var action = 'add_product';
		  var formData = new FormData();
		  var totalFiles = $('#product_pix').get(0).files.length;
			 formData.append('action', action);
			 formData.append('product_cat_id', product_cat_id);
			 formData.append('product_name', product_name);
			 formData.append('product_desc', product_desc);
			 formData.append('status_id', status_id);
			 formData.append('purchase_price', purchase_price);
			 formData.append('selling_price', selling_price);
		  for(var i = 0; i < totalFiles; i++){
			 formData.append("product_pix[]", $("#product_pix").get(0).files[i]);
		  }	
				$.ajax({
				   type: "POST",
				   url: local_url,
				   data: formData,
				   cache: false,
				   contentType: false,
				   processData: false,
				   success: function(){
					   _get_all_count();
					$('#success-div').html('<div><i class="fa fa-check"></i></div> PRODUCT REGISTERED SUCCESSFULLY').fadeIn(500).delay(5000).fadeOut(100);
					   _get_page_with_id('product_list',product_cat_id);
					   alert_close();
					}
				});
	}
}




function _update_product(product_cat_id,product_id){
	var product_name = $('#product_name').val();
	var product_desc =$('#product_desc').val();
	var status_id = $('#status_id').val();
	var product_pix = $('#product_pix').val();
	var purchase_price = $('#purchase_price').val();
	var selling_price = $('#selling_price').val();
	if((product_name=='')||(product_desc=='')||(status_id=='')||(purchase_price=='')||(selling_price=='')){
		$('#warning-div').html('<div><i class="fa fa-warning (alias)"></i></div> USER ERROR!<br /><span>Fields cannot be empty</span>').fadeIn(500).delay(5000).fadeOut(100);
	}else{
		$('#proceed-btn').html('PROCESSING...');
		document.getElementById('proceed-btn').disabled=true;
		  var action = 'update_product';
		  var formData = new FormData();
		  var totalFiles = $('#product_pix').get(0).files.length;
			 formData.append('action', action);
			 formData.append('product_cat_id', product_cat_id);
			 formData.append('product_id', product_id);
			 formData.append('product_name', product_name);
			 formData.append('product_desc', product_desc);
			 formData.append('product_pix', product_pix);
			 formData.append('purchase_price', purchase_price);
			 formData.append('selling_price', selling_price);
			 formData.append('status_id', status_id);
		  for(var i = 0; i < totalFiles; i++){
			 formData.append("product_pix[]", $("#product_pix").get(0).files[i]);
		  }	
				$.ajax({
				   type: "POST",
				   url: local_url,
				   data: formData,
				   cache: false,
				   contentType: false,
				   processData: false,
				   success: function(){
					   _get_all_count();
					$('#success-div').html('<div><i class="fa fa-check"></i></div> PRODUCT UPDATED SUCCESSFULLY').fadeIn(500).delay(5000).fadeOut(100);
					   _get_page_with_id('product_list',product_cat_id);
					   alert_close();
					}
				});
	}
}

function _fetch_products_list_txt(product_cat_id){
	var all_search_txt = $('#all_search_txt').val();
	var txt_lenght = $('#all_search_txt').val().length;
	if ((txt_lenght>2)||(txt_lenght==0)){
		_fetch_products_list(product_cat_id);
	}
}

function _fetch_products_list(product_cat_id){
	var status_id = $('#status_id').val();
	var all_search_txt = $('#all_search_txt').val();
	var action = 'fetch_products_list';
	$('#search-content').html('<div class="ajax-loader">loading...<br><img src="all-images/images/ajax-loader.gif"/></div>').fadeIn(500);
		var dataString ='action='+ action+'&product_cat_id='+ product_cat_id+'&all_search_txt='+ all_search_txt+'&status_id='+ status_id;
		$.ajax({
		type: "POST",
		url: local_url,
		data: dataString,
		cache: false,
		success: function(html){
			$('#search-content').html(html);
			}
		});
}







function _load_stock(product_id){
	var product_qty = $('#product_qty').val();
	var purchase_price = $('#purchase_price').val();
	var selling_price = $('#selling_price').val();
	if((product_qty=='')||(purchase_price=='')||(selling_price=='')){
		$('#warning-div').html('<div><i class="fa fa-warning (alias)"></i></div> USER ERROR!<br /><span>Fields cannot be empty</span>').fadeIn(500).delay(5000).fadeOut(100);
	}else{
		if (confirm("Confirm!!\n\n Have you confirmed ths PRODUCT QUANTITY?")){
			var action = 'load_stock';
			$('#proceed-btn').html('PROCESSING...');
			document.getElementById('proceed-btn').disabled=true;
			var dataString ='action='+ action+'&product_id='+ product_id+'&product_qty='+ product_qty+'&purchase_price='+ purchase_price+'&selling_price='+ selling_price;
			$.ajax({
			type: "POST",
			url: local_url,
			data: dataString,
			cache: false,
			success: function(html){
						$('#success-div').html('<div><i class="fa fa-check"></i></div> STOCK LOADED SUCCESSFULLY').fadeIn(500).delay(5000).fadeOut(100);
						   _get_page('stock_details','stock_details', 'products','');
						   alert_close();
				}
			});
		}else{
			return false;
		}
	}
}




function _fetch_stock_details(){
	var all_search_txt = $('#all_search_txt').val();
	var txt_lenght = $('#all_search_txt').val().length;
	if ((txt_lenght>2)||(txt_lenght==0)){
	var all_search_txt = $('#all_search_txt').val();
	var action = 'fetch_stock_details';
	$('#search-content').html('<div class="ajax-loader">loading...<br><img src="all-images/images/ajax-loader.gif"/></div>').fadeIn(500);
		var dataString ='action='+ action+'&all_search_txt='+ all_search_txt;
		$.ajax({
		type: "POST",
		url: local_url,
		data: dataString,
		cache: false,
		success: function(html){
			$('#search-content').html(html);
			}
		});
	}
}














$(document).ready(function() {
		window.setInterval(function(){
			_pending_order_count();
		},300000);
});

	function _pending_order_count(){
		var action='get_all_count';
		var dataString ='action='+ action;
			$.ajax({
			type: "POST",
			url: local_url,
			data: dataString,
			cache: false,
			dataType: 'json',
			cache: false,
			success: function(data){
			var total_pending_orders = data.total_pending_orders;
			$('#total_pending_orders,#total_pending_orders1').html(total_pending_orders);
			if(total_pending_orders>0){
			var a=new Audio()
			a.src="content/sound/sound.mp3"
			a.play()
			}
			}
		});

	}




function _decline_order(order_id){
	if (confirm("Confirm!!\n\n Are you sure to DECLINE ORDER?")){
		$('#decline-payment-btn').html('...');
		document.getElementById('decline-payment-btn').disabled=true;
		var action = 'decline_order';
			var dataString ='action='+ action+'&order_id='+ order_id;
			$.ajax({
			type: "POST",
			url: local_url,
			data: dataString,
			cache: false,
			success: function(html){
				$('#success-div').html('<div><i class="fa fa-check"></i></div> ORDER DECLINED AND DELETED SUCCESSFULLY!').fadeIn(500).delay(5000).fadeOut(100);
				alert_close();
				_get_page('outstanding_orders','outstanding_orders','orders','');
				}
			});
		}else{
			return false;
		}
}



function _confirm_order_payment(order_id){
	if (confirm("Confirm!!\n\n Are you sure to CONFIRM PAYMENT?")){
		$('#get-more-div').html('<div class="ajax-loader">Loading...<br><img src="all-images/images/ajax-loader.gif"/></div>').fadeIn('fast');
		var action = 'confirm_order_payment';
			var dataString ='action='+ action+'&order_id='+ order_id;
			$.ajax({
			type: "POST",
			url: local_url,
			data: dataString,
			cache: false,
			success: function(html){
				$('#success-div').html('<div><i class="fa fa-check"></i></div> ORDER PAYMENT CONFIRMED SUCCESSFULLY!').fadeIn(500).delay(5000).fadeOut(100);
				_get_page('pending_orders','pending_orders','orders','');
				_get_form_with_id('get_order_items',order_id);
				}
			});
		}else{
			return false;
		}
}



function _process_order_item(order_id, product_id){
	var action ='process_order_item';
			$('#cart_'+product_id).html('...');
			document.getElementById('cart_'+product_id).disabled=true;
			
		var dataString ='action='+ action+'&order_id='+ order_id+'&product_id='+ product_id;
			$.ajax({
			type: "POST",
			url: local_url,
			data: dataString,
			cache: false,
			dataType: 'json',
			cache: false,
			success: function(data){
					$('#cart_'+product_id).html('<i class="fa fa-check"></i> DONE');
					document.getElementById('cart_'+product_id).disabled=false;
			var scheck = data.check;
			var order_status_id = data.order_status_id;
				if(scheck==0){
				$('#warning-div').html('<div><i class="fa fa-warning (alias)"></i></div> ACCESS DENIED!<br><span> You Cannot Attend to This Order.</span>').fadeIn(500).delay(5000).fadeOut(100);
				}else if(scheck==1){
				$('#not-success-div').html('<div><i class="fa fa-close"></i></div>STOCK SHORTAGE! <br /><span>  Product Request Not Enough.</span>').fadeIn(500).delay(5000).fadeOut(100);
				}else{
					_get_form_with_id('get_order_items',order_id);
					if(order_status_id=='PR'){
					_get_page('attending_orders','attending_orders','orders','');
					}else if(order_status_id=='RD'){
					_get_page('ready_orders','ready_orders','orders','');
					}
					_get_all_count();
				}				
			}
		});
}







function _resend_delivery_otp(order_id, pay_id){
	$('#resend-otp-btn').html('...');
	document.getElementById('resend-otp-btn').disabled=true;
	var action = 'resend_delivery_otp';
		var dataString ='action='+ action+'&order_id='+ order_id+'&pay_id='+ pay_id;
		$.ajax({
		type: "POST",
		url: local_url,
		data: dataString,
		cache: false,
		success: function(html){
			$('#success-div').html('<div><i class="fa fa-check"></i></div> DELIVERY OTP SENT!<br><span>Check customer email to confirm.</span>').fadeIn(500).delay(5000).fadeOut(100);
			$('#resend-otp-btn').html('<i class="fa fa-send"></i> RE-SEND OTP');
			document.getElementById('resend-otp-btn').disabled=false;
			}
		});
}


function _confirm_delivery(order_id, pay_id){
	var delivery_otp = $('#delivery_otp').val();
	if(delivery_otp==''){
		$('#warning-div').html('<div><i class="fa fa-warning (alias)"></i></div> DELIVERY OTP ERROR!<br /><span>Fields cannot be empty</span>').fadeIn(500).delay(5000).fadeOut(100);
	}else{
	$('#confirm-btn').html('...');
	document.getElementById('confirm-btn').disabled=true;
	var action = 'confirm_delivery';
		var dataString ='action='+ action+'&order_id='+ order_id+'&pay_id='+ pay_id+'&delivery_otp='+ delivery_otp;
		$.ajax({
			type: "POST",
			url: local_url,
			data: dataString,
			cache: false,
			dataType: 'json',
			cache: false,
		success: function(data){
			var scheck = data.check;
			 if(scheck==1){
			$('#success-div').html('<div><i class="fa fa-check"></i></div> DELIVERY OTP SENT!<br><span>Check customer email to confirm.</span>').fadeIn(500).delay(5000).fadeOut(100);
			_get_page('delivery_orders','delivery_orders','orders','');
			_get_form_with_id('get_order_items',order_id);
			_get_all_count();
			 }else{
				$('#not-success-div').html('<div><i class="fa fa-close"></i></div>INVALID OTP! <br /><span>  Check your Delivery OTP and try again.</span>').fadeIn(500).delay(5000).fadeOut(100);
				$('#confirm-btn').html('<i class="fa fa-check"></i> CONFIRM');
				document.getElementById('confirm-btn').disabled=false;
			 }
			}
		});
	}
}











function _fetch_order_list(status_id){
	var all_search_txt = $('#all_search_txt').val();
	var txt_lenght = $('#all_search_txt').val().length;
	if ((txt_lenght>6)||(txt_lenght==0)){
	var action = 'fetch_order_list';
	$('#search-content').html('<div class="ajax-loader">loading...<br><img src="all-images/images/ajax-loader.gif"/></div>').fadeIn(500);
		var dataString ='action='+ action+'&all_search_txt='+ all_search_txt+'&status_id='+ status_id;
		$.ajax({
		type: "POST",
		url: local_url,
		data: dataString,
		cache: false,
		success: function(html){
			$('#search-content').html(html);
			}
		});
	}
}




















































$(function(){
    Blogpix = {
        UpdatePreview: function(obj){
          // if IE < 10 doesn't support FileReader
          if(!window.FileReader){
             // don't know how to proceed to assign src to image tag
          } else {
             var reader = new FileReader();
             var target = null;

             reader.onload = function(e) {
              target =  e.target || e.srcElement;
               $("#blog-pix").prop("src", target.result);
             };
              reader.readAsDataURL(obj.files[0]);
          }
        }
    };
});



function _blog_reg(action, blog_id){
	tinyMCE.triggerSave();
		var blog_cat_id = $('#blog_cat_id').val();
		var blog_title = $('#blog_title').val();
		var blog_url = $('#blog_url').val();
		var seo_keywords = $('#seo_keywords').val();
		var seo_describtion = $('#seo_describtion').val();
        var blog_pix = $('#blog_pix').val();
	    var blog_thumb = $('#blog_pix').prop('files')[0];
		var blog_detail = $('#blog_detail').val();
		var blog_status_id = $('#blog_status_id').val();
		
	
		if ((blog_cat_id=='')||(blog_title=='')||(blog_url=='')||(seo_keywords=='')||(seo_describtion=='')||(blog_status_id=='')){
		//	if ((blog_cat_id=='')||(blog_title=='')||(blog_url=='')||(seo_keywords=='')||(seo_describtion=='')||(blog_detail=='')||(blog_status_id=='')){
			$('#warning-div').html('<div><i class="fa fa-warning (alias)"></i></div> Fields cannot be empty<br /><span>Fill all necessary fields to continue</span>').fadeIn(500).delay(5000).fadeOut(100);
		}else{
			var form_data = new FormData();                  
			form_data.append('action', action);
			form_data.append('blog_id', blog_id);
			form_data.append('blog_cat_id', blog_cat_id);
			form_data.append('blog_title', blog_title);
			form_data.append('blog_url', blog_url);
			form_data.append('seo_keywords', seo_keywords);
			form_data.append('seo_describtion', seo_describtion);
			form_data.append('blog_pix', blog_pix);
			form_data.append('blog_thumb', blog_thumb);
			form_data.append('blog_detail', blog_detail);
			form_data.append('blog_status_id', blog_status_id);

				$('#blog-btn').html('PROCESSING...');
				document.getElementById('blog-btn').disabled=true;
			$.ajax({

				url: local_url,
				type: "POST",
				data: form_data,
				dataType: 'json',
				contentType: false,
				cache: false,
				processData:false,
				success: function(data){
					var scheck = data.check;
					if(scheck==1){
						if(blog_status_id=='PUB'){
							$('#success-div').html('<div><i class="fa fa-check"></i></div> ARTICLE SAVED AND PUBLISHED SUCCESSFULLY!').fadeIn(500).delay(5000).fadeOut(100);
						}else{
							$('#success-div').html('<div><i class="fa fa-check"></i></div> ARTICLE SAVED SUCCESSFULLY!').fadeIn(500).delay(5000).fadeOut(100);
						}
						_get_page('all_blogs','all_blogs','publish','');
						alert_close();
						_get_all_count();
					}else{
						$('#warning-div').html('<div><i class="fa fa-warning (alias)"></i></div> Blog Url Error!<br /><span>Blog Url already exist</span>').fadeIn(500).delay(5000).fadeOut(100);
						$('#blog-btn').html('SUBMIT');
						document.getElementById('blog-btn').disabled=false;
					}
				}
			});
		}
}


function _get_blog_details(blog_id){
	var action ='get_blog_details';
	$('#get-more-div').html('<div class="ajax-loader">Loading...<br><img src="all-images/images/ajax-loader.gif"/></div>').fadeIn('fast');
		var dataString ='action='+ action+'&blog_id='+ blog_id;
		$.ajax({
		type: "POST",
		url: local_url,
		data: dataString,
		cache: false,
		success: function(html){$('#get-more-div').html(html);}
		});
}


function _fetch_publish_list(action){
	var user_id = $('#user_id').val();
	var status_id = $('#status_id').val();
	var cat_id = $('#cat_id').val();
	var all_search_txt = $('#all_search_txt').val();
	$('#search-content').html('<div class="ajax-loader">loading...<br><img src="all-images/images/ajax-loader.gif"/></div>').fadeIn(500);
		var dataString ='action='+ action+'&all_search_txt='+ all_search_txt+'&user_id='+ user_id+'&status_id='+ status_id+'&cat_id='+ cat_id;
		$.ajax({
		type: "POST",
		url: local_url,
		data: dataString,
		cache: false,
		success: function(html){
			$('#search-content').html(html);
			}
		});
}



























function _register_faq(faq_id){
	tinyMCE.triggerSave();
		var question = $('#question').val();
		var answer = $('#answer').val();
		var action='register_faq';
		if ((question=='')||(answer=='')){
			$('#warning-div').html('<div><i class="fa fa-warning (alias)"></i></div> USER ERROR!<br /><span>Fill all necessary fields to continue</span>').fadeIn(500).delay(5000).fadeOut(100);
			}else{
        var form_data = new FormData();                  
        form_data.append('action', action);
        form_data.append('faq_id', faq_id);
        form_data.append('question', question);
        form_data.append('answer', answer);
		$(".btn-div").html('<div style="text-align:center;"><div class="alert success"><img src="all-images/images/wait.gif" width="15" height="15" /> <span>FAQ DML IN PROGRESS...</span><br/> Please DO NOT close this panel as the process takes some time.</div></div><div class="ajax-progress"></div>');		
        $.ajax({
 			//////////// loading progress bar............
			 xhr: function() {
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function(evt) {
                    if (evt.lengthComputable) {
                        var percentComplete = ((evt.loaded / evt.total) * 100).toFixed();
                        $(".ajax-progress").width(percentComplete + '%');
                        $(".ajax-progress").html(percentComplete+'%');
                    }
                }, false);
                return xhr;
            },
			////////////////////////////////////////////////
           url: local_url,
            type: "POST",
            data: form_data,
            contentType: false,
            cache: false,
            processData:false,
            success: function(html){
		$('#success-div').html('<div><i class="fa fa-check"></i></div> FAQ SAVED SUCCESSFULLY!').fadeIn(500).delay(5000).fadeOut(100);
			_get_page('all_faqs','all_faqs','publish','');
			 alert_close();
			_get_all_count();
			}
        });
		}
}
	
function _fetch_faq_list(){
		var all_search_txt = $('#all_search_txt').val();
		$('#search-content').html('<div class="ajax-loader">loading...<br><img src="all-images/images/ajax-loader.gif"/></div>').fadeIn(500);
		var action='fetch_faq_list';
		var dataString ='action='+ action+'&all_search_txt='+ all_search_txt;
		$.ajax({
		type: "POST",
		url: local_url,
		data: dataString,
		cache: false,
		success: function(html){$('#search-content').html(html);}
		});
}
	

function _fetch_news_letter_list(){
		var all_search_txt = $('#all_search_txt').val();
		$('#search-content').html('<div class="ajax-loader">loading...<br><img src="all-images/images/ajax-loader.gif"/></div>').fadeIn(500);
		var action='news_letter_list';
		var dataString ='action='+ action+'&all_search_txt='+ all_search_txt;
		$.ajax({
		type: "POST",
		url: local_url,
		data: dataString,
		cache: false,
		success: function(html){$('#search-content').html(html);}
		});
}
	







function get_payment_report(id,action,view_report){
		$('#srch-text').html($('#'+id).html());
		$('.custom-srch-div').fadeOut(500);
		$('#search-content').html('<div class="ajax-loader"><img src="all-images/images/ajax-loader.gif"/></div>');
			var dataString ='action='+ action+'&view_report='+ view_report;
			$.ajax({
			type: "POST",
			url: local_url,
			data: dataString,
			cache: false,
			success: function(html){
				$('#search-content').html(html);
				}
		});
	}
	
function _fetch_custom_payment_report(action,view_report){
		var datefrom=$('#datepicker-from').val();
		var dateto=$('#datepicker-to').val();
			if((datefrom=='')||(dateto=='')){
$('#warning-div').html('<div><i class="fa fa-warning (alias)"></i></div> Search Date Fields Empty<br /><span>Please fill all the feilds</span>').fadeIn(500).delay(5000).fadeOut(100);
			}else{
		$('#search-content').html('<div class="ajax-loader"><img src="all-images/images/ajax-loader.gif"/></div>');
			var dataString ='action='+ action+'&datefrom='+datefrom+'&dateto='+dateto+'&view_report='+ view_report;
			$.ajax({
			type: "POST",
			url: local_url,
			data: dataString,
			cache: false,
			success: function(html){
				$('#search-content').html(html);
				}
		});
			}
};







function get_alert_report(id,action,view_report){
		$('#srch-text').html($('#'+id).html());
		$('.custom-srch-div').fadeOut(500);
		$('.system-alert-div').html('<div class="ajax-loader"><img src="all-images/images/ajax-loader.gif"/></div>');
			var dataString ='action='+ action+'&view_report='+ view_report;
			$.ajax({
			type: "POST",
			url: local_url,
			data: dataString,
			cache: false,
			success: function(html){
				$('.system-alert-div').html(html);
				}
		});
	}
	
function _fetch_custom_alert_report(action,view_report){
		var datefrom=$('#datepicker-from').val();
		var dateto=$('#datepicker-to').val();
			if((datefrom=='')||(dateto=='')){
$('#warning-div').html('<div><i class="fa fa-warning (alias)"></i></div> Search Date Fields Empty<br /><span>Please fill all the feilds</span>').fadeIn(500).delay(5000).fadeOut(100);
			}else{
		$('.system-alert-div').html('<div class="ajax-loader"><img src="all-images/images/ajax-loader.gif"/></div>');
			var dataString ='action='+ action+'&datefrom='+datefrom+'&dateto='+dateto+'&view_report='+ view_report;
			$.ajax({
			type: "POST",
			url: local_url,
			data: dataString,
			cache: false,
			success: function(html){
				$('.system-alert-div').html(html);
				}
		});
			}
};


	function _fetch_random_alert_search(action){
		var view_report='random_search';
			var all_search_txt = $('#all_search_txt').val();
		$('.system-alert-div').html('<div class="ajax-loader">loading...<br><img src="all-images/images/ajax-loader.gif"/></div>').fadeIn(500);
			var dataString ='action='+ action+'&view_report='+ view_report+'&all_search_txt='+ all_search_txt;
			$.ajax({
			type: "POST",
			url: local_url,
			data: dataString,
			cache: false,
			success: function(html){$('.system-alert-div').html(html);}
			});
	}

	function _read_alert(alert_id){	
		 $('#'+alert_id+'viewed').html('<i class="fa fa-check"></i><i class="fa fa-check"></i>');
		 $('#'+alert_id).addClass('system-alert alert-seen');

		$('#get-more-div').html('<div class="ajax-loader">Loading...<br><img src="all-images/images/ajax-loader.gif"/></div>').fadeIn('fast');
			var action='read_alert';
			var dataString ='action='+ action+'&alert_id='+ alert_id;
			$.ajax({
			type: "POST",
			url: local_url,
			data: dataString,
			cache: false,
			success: function(html){$('#get-more-div').html(html);}
			});
	}





function _update_settings(){
		var bank_name=$('#bank_name').val();
		var account_name=$('#account_name').val();
		var account_number=$('#account_number').val();
		var promo_code=$('#promo_code').val();
		var support_email=$('#support_email').val();
		var sender_name=$('#sender_name').val();
		var smtp_host=$('#smtp_host').val();
		var smtp_username=$('#smtp_username').val();
		var smtp_password=$('#smtp_password').val();
		var smtp_port=$('#smtp_port').val();
	
		if((bank_name=='')||(account_name=='')||(account_number=='')||(promo_code=='')|(promo_amount_limit=='')||(support_email=='')||(sender_name=='')||(smtp_host=='')||(smtp_username=='')||(smtp_password=='')||(smtp_port=='')){
			$('#warning-div').html('<div><i class="fa fa-warning (alias)"></i></div> USER ERROR!<br /><span>Please fill all the feilds</span>').fadeIn(500).delay(5000).fadeOut(100);
		}else{
			$('#get-more-div').html('<div class="ajax-loader">Loading...<br><img src="all-images/images/ajax-loader.gif"/></div>').fadeIn('fast');
				var action='update_settings';
				var dataString ='action='+ action+'&bank_name='+ bank_name+'&account_name='+ account_name+'&account_number='+ account_number+'&promo_code='+ promo_code+'&promo_amount_limit='+ promo_amount_limit+'&support_email='+ support_email+'&sender_name='+ sender_name+'&smtp_host='+ smtp_host+'&smtp_username='+ smtp_username+'&smtp_password='+ smtp_password+'&smtp_port='+ smtp_port;
				$.ajax({
				type: "POST",
				url: local_url,
				data: dataString,
				cache: false,
				success: function(html){
					 alert_close();
					$('#success-div').html('<div><i class="fa fa-check"></i></div>SYSTEM SETTINGS UPDATED SUCCESSFULLY!').fadeIn(500).delay(5000).fadeOut(100);
					}
				});
			}
}



function isNumber(evt){
	evt=(evt) ? evt: window.event;
	var charcode=(evt.which) ? evt.which : evt.keyCode;
	if(charcode>31 && (charcode<46 || charcode>57)){
		return false;
	}
	return true;
}





function exportTableToExcel(tableID,filename){
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20').replace(/#/g, '%23');
    
    // Specify file name
    filename = filename?filename+'.xls':'excel_data.xls';
   
    // Create download link element
    downloadLink = document.createElement("a");
   
    document.body.appendChild(downloadLink);
    
    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        // Create a link to the file
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
    
        // Setting the file name
        downloadLink.download = filename;
        //triggering the function
        downloadLink.click();
    }
}































function _get_lga(){
	switch($('#state').val()){
		case"Abia":var a=["Select LGA","Aba North","Aba South","Arochukwu","Bende","Ikwuano","Isiala Ngwa North","Isiala Ngwa South","Isuikwuato","Obi Ngwa","Ohafia","Osisioma","Ugwunagbo","Ukwa East","Ukwa West","Umuahia North","Umuahia South","Umu Nneochi"];break;
		case"Adamawa":a=["Select LGA","Demsa","Fufure","Ganye","Gayuk","Gombi","Grie","Hong","Jada","Larmurde","Madagali","Maiha","Mayo Belwa","Michika","Mubi North","Mubi South","Numan","Shelleng","Song","Toungo","Yola North","Yola South"];break;
		case"AkwaIbom":a=["Select LGA","Abak","Eastern Obolo","Eket","Esit Eket","Essien Udim","Etim Ekpo","Etinan","Ibeno","Ibesikpo Asutan","Ibiono-Ibom","Ika","Ikono","Ikot Abasi","Ikot Ekpene","Ini","Itu","Mbo","Mkpat-Enin","Nsit-Atai","Nsit-Ibom","Nsit-Ubium","Obot Akara","Okobo","Onna","Oron","Oruk Anam","Udung-Uko","Ukanafun","Uruan","Urue-Offong Oruko","Uyo"];break;
		case"Anambra":a=["Select LGA","Aguata","Anambra East","Anambra West","Anaocha","Awka North","Awka South","Ayamelum","Dunukofia","Ekwusigo","Idemili North","Idemili South","Ihiala","Njikoka","Nnewi North","Nnewi South","Ogbaru","Onitsha North","Onitsha South","Orumba North","Orumba South","Oyi"];break;
		case"Bauchi":a=["Select LGA","Alkaleri","Bauchi","Bogoro","Damban","Darazo","Dass","Gamawa","Ganjuwa","Giade","Itas-Gadau","Jama are","Katagum","Kirfi","Misau","Ningi","Shira","Tafawa Balewa"," Toro"," Warji"," Zaki"];break;
		case"Bayelsa":a=["Select LGA","Brass","Ekeremor","Kolokuma Opokuma","Nembe","Ogbia","Sagbama","Southern Ijaw","Yenagoa"];break;
		case"Benue":a=["Select LGA","Agatu","Apa","Ado","Buruku","Gboko","Guma","Gwer East","Gwer West","Katsina-Ala","Konshisha","Kwande","Logo","Makurdi","Obi","Ogbadibo","Ohimini","Oju","Okpokwu","Oturkpo","Tarka","Ukum","Ushongo","Vandeikya"];break;
		case"Borno":a=["Select LGA","Abadam","Askira-Uba","Bama","Bayo","Biu","Chibok","Damboa","Dikwa","Gubio","Guzamala","Gwoza","Hawul","Jere","Kaga","Kala-Balge","Konduga","Kukawa","Kwaya Kusar","Mafa","Magumeri","Maiduguri","Marte","Mobbar","Monguno","Ngala","Nganzai","Shani"];break;
		case"Cross River":a=["Select LGA","Abi","Akamkpa","Akpabuyo","Bakassi","Bekwarra","Biase","Boki","Calabar Municipal","Calabar South","Etung","Ikom","Obanliku","Obubra","Obudu","Odukpani","Ogoja","Yakuur","Yala"];break;
		case"Delta":a=["Select LGA","Aniocha North","Aniocha South","Bomadi","Burutu","Ethiope East","Ethiope West","Ika North East","Ika South","Isoko North","Isoko South","Ndokwa East","Ndokwa West","Okpe","Oshimili North","Oshimili South","Patani","Sapele","Udu","Ughelli North","Ughelli South","Ukwuani","Uvwie","Warri North","Warri South","Warri South West"];break;
		case"Ebonyi":a=["Select LGA","Abakaliki","Afikpo North","Afikpo South","Ebonyi","Ezza North","Ezza South","Ikwo","Ishielu","Ivo","Izzi","Ohaozara","Ohaukwu","Onicha"];break;
		case"Edo":a=["Select LGA","Akoko-Edo","Egor","Esan Central","Esan North-East","Esan South-East","Esan West","Etsako Central","Etsako East","Etsako West","Igueben","Ikpoba Okha","Orhionmwon","Oredo","Ovia North-East","Ovia South-West","Owan East","Owan West","Uhunmwonde"];break;
		case"Ekiti":a=["Select LGA","Ado Ekiti","Efon","Ekiti East","Ekiti South-West","Ekiti West","Emure","Gbonyin","Ido Osi","Ijero","Ikere","Ikole","Ilejemeje","Irepodun-Ifelodun","Ise-Orun","Moba","Oye"];break;
		case"Enugu":a=["Select LGA","Aninri","Awgu","Enugu East","Enugu North","Enugu South","Ezeagu","Igbo Etiti","Igbo Eze North","Igbo Eze South","Isi Uzo","Nkanu East","Nkanu West","Nsukka","Oji River","Udenu","Udi","Uzo Uwani"];break;
		case"FCT":a=["Select LGA","Abaji","Bwari","Gwagwalada","Kuje","Kwali","Municipal Area Council"];break;
		case"Gombe":a=["Select LGA","Akko","Balanga","Billiri","Dukku","Funakaye","Gombe","Kaltungo","Kwami","Nafada","Shongom","Yamaltu-Deba"];break;
		case"Imo":a=["Select LGA","Aboh Mbaise","Ahiazu Mbaise","Ehime Mbano","Ezinihitte","Ideato North","Ideato South","Ihitte-Uboma","Ikeduru","Isiala Mbano","Isu","Mbaitoli","Ngor Okpala","Njaba","Nkwerre","Nwangele","Obowo","Oguta","Ohaji-Egbema","Okigwe","Orlu","Orsu","Oru East","Oru West","Owerri Municipal","Owerri North","Owerri West","Unuimo"];break;
		case"Jigawa":a=["Select LGA","Auyo","Babura","Biriniwa","Birnin Kudu","Buji","Dutse","Gagarawa","Garki","Gumel","Guri","Gwaram","Gwiwa","Hadejia","Jahun","Kafin Hausa","Kazaure","Kiri Kasama","Kiyawa","Kaugama","Maigatari","Malam Madori","Miga","Ringim","Roni","Sule Tankarkar","Taura","Yankwashi"];break;
		case"Kaduna":a=["Select LGA","Birnin Gwari","Chikun","Giwa","Igabi","Ikara","Jaba","Jema a","Kachia","Kaduna North","Kaduna South","Kagarko","Kajuru","Kaura","Kauru","Kubau","Kudan","Lere","Makarfi","Sabon Gari","Sanga","Soba","Zangon Kataf","Zaria"];break;
		case"Kano":a=["Select LGA","Ajingi","Albasu","Bagwai","Bebeji","Bichi","Bunkure","Dala","Dambatta","Dawakin Kudu","Dawakin Tofa","Doguwa","Fagge","Gabasawa","Garko","Garun Mallam","Gaya","Gezawa","Gwale","Gwarzo","Kabo","Kano Municipal","Karaye","Kibiya","Kiru","Kumbotso","Kunchi","Kura","Madobi","Makoda","Minjibir","Nasarawa","Rano","Rimin Gado","Rogo","Shanono","Sumaila","Takai","Tarauni","Tofa","Tsanyawa","Tudun Wada","Ungogo","Warawa","Wudil"];break;
		case"Katsina":a=["Select LGA","Bakori","Batagarawa","Batsari","Baure","Bindawa","Charanchi","Dandume","Danja","Dan Musa","Daura","Dutsi","Dutsin Ma","Faskari","Funtua","Ingawa","Jibia","Kafur","Kaita","Kankara","Kankia","Katsina","Kurfi","Kusada","Mai Adua","Malumfashi","Mani","Mashi","Matazu","Musawa","Rimi","Sabuwa","Safana","Sandamu","Zango"];break;
		case"Kebbi":a=["Select LGA","Aleiro","Arewa Dandi","Argungu","Augie","Bagudo","Birnin Kebbi","Bunza","Dandi","Fakai","Gwandu","Jega","Kalgo","Koko Besse","Maiyama","Ngaski","Sakaba","Shanga","Suru","Wasagu Danko","Yauri","Zuru"];break;
		case"Kogi":a=["Select LGA","Adavi","Ajaokuta","Ankpa","Bassa","Dekina","Ibaji","Idah","Igalamela Odolu","Ijumu","Kabba Bunu","Kogi","Lokoja","Mopa Muro","Ofu","Ogori Magongo","Okehi","Okene","Olamaboro","Omala","Yagba East","Yagba West"];break;
		case"Kwara":a=["Select LGA","Asa","Baruten","Edu","Ekiti","Ifelodun","Ilorin East","Ilorin South","Ilorin West","Irepodun","Isin","Kaiama","Moro","Offa","Oke Ero","Oyun","Pategi"];break;
		case"Lagos":a=["Select LGA","Agege","Ajeromi-Ifelodun","Alimosho","Amuwo-Odofin","Apapa","Badagry","Epe","Eti Osa","Ibeju-Lekki","Ifako-Ijaiye","Ikeja","Ikorodu","Kosofe","Lagos Island","Lagos Mainland","Mushin","Ojo","Oshodi-Isolo","Shomolu","Surulere"];break;
		case"Nasarawa":a=["Select LGA","Akwanga","Awe","Doma","Karu","Keana","Keffi","Kokona","Lafia","Nasarawa","Nasarawa Egon","Obi","Toto","Wamba"];break;
		case"Niger":a=["Select LGA","Agaie","Agwara","Bida","Borgu","Bosso","Chanchaga","Edati","Gbako","Gurara","Katcha","Kontagora","Lapai","Lavun","Magama","Mariga","Mashegu","Mokwa","Moya","Paikoro","Rafi","Rijau","Shiroro","Suleja","Tafa","Wushishi"];break;
		case"Ogun":a=["Select LGA","Abeokuta North","Abeokuta South","Ado-Odo Ota","Egbado North","Egbado South","Ewekoro","Ifo","Ijebu East","Ijebu North","Ijebu North East","Ijebu Ode","Ikenne","Imeko Afon","Ipokia","Obafemi Owode","Odeda","Odogbolu","Ogun Waterside","Remo North","Shagamu"];break;
		case"Ondo":a=["Select LGA","Akoko North-East","Akoko North-West","Akoko South-West","Akoko South-East","Akure North","Akure South","Ese Odo","Idanre","Ifedore","Ilaje","Ile Oluji-Okeigbo","Irele","Odigbo","Okitipupa","Ondo East","Ondo West","Ose","Owo"];break;
		case"Osun":a=["Select LGA","Atakunmosa East","Atakunmosa West","Aiyedaade","Aiyedire","Boluwaduro","Boripe","Ede North","Ede South","Ife Central","Ife East","Ife North","Ife South","Egbedore","Ejigbo","Ifedayo","Ifelodun","Ila","Ilesa East","Ilesa West","Irepodun","Irewole","Isokan","Iwo","Obokun","Odo Otin","Ola Oluwa","Olorunda","Oriade","Orolu","Osogbo"];break;
		case"Oyo":a=["Select LGA","Afijio","Akinyele","Atiba","Atisbo","Egbeda","Ibadan North","Ibadan North-East","Ibadan North-West","Ibadan South-East","Ibadan South-West","Ibarapa Central","Ibarapa East","Ibarapa North","Ido","Irepo","Iseyin","Itesiwaju","Iwajowa","Kajola","Lagelu","Ogbomosho North","Ogbomosho South","Ogo Oluwa","Olorunsogo","Oluyole","Ona Ara","Orelope","Ori Ire","Oyo","Oyo East","Saki East","Saki West","Surulere"];break;
		case"Plateau":a=["Select LGA","Bokkos","Barkin Ladi","Bassa","Jos East","Jos North","Jos South","Kanam","Kanke","Langtang South","Langtang North","Mangu","Mikang","Pankshin","Qua an Pan","Riyom","Shendam","Wase"];break;
		case"Rivers":a=["Select LGA","Port Harcourt","Obio-Akpor","Okrika","Ogu–Bolo","Eleme","Tai","Gokana","Khana","Oyigbo","Opobo–Nkoro","Andoni","Bonny","Degema","Asari-Toru","Akuku-Toru","Abua–Odual","Ahoada West","Ahoada East","Ogba–Egbema–Ndoni","Emohua","Ikwerre","Etche","Omuma"];break;
		case"Sokoto":a=["Select LGA","Binji","Bodinga","Dange Shuni","Gada","Goronyo","Gudu","Gwadabawa","Illela","Isa","Kebbe","Kware","Rabah","Sabon Birni","Shagari","Silame","Sokoto North","Sokoto South","Tambuwal","Tangaza","Tureta","Wamako","Wurno","Yabo"];break;
		case"Taraba":a=["Select LGA","Ardo Kola","Bali","Donga","Gashaka","Gassol","Ibi","Jalingo","Karim Lamido","Kumi","Lau","Sardauna","Takum","Ussa","Wukari","Yorro","Zing"];break;
		case"Yobe":a=["Select LGA","Bade","Bursari","Damaturu","Fika","Fune","Geidam","Gujba","Gulani","Jakusko","Karasuwa","Machina","Nangere","Nguru","Potiskum","Tarmuwa","Yunusari","Yusufari"];break;
		case"Zamfara":a=["Select LGA","Anka","Bakura","Birnin Magaji Kiyaw","Bukkuyum","Bungudu","Gummi","Gusau","Kaura Namoda","Maradun","Maru","Shinkafi","Talata Mafara","Chafe","Zurmi"];break;
		case"":a=["Select LGA"]
		}for(var e=[],o=0;o<a.length;o++)e.push("<option>"+a[o]+"</option>");document.getElementById("lga").innerHTML=e.join("");
		
}



