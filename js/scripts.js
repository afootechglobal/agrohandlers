//////////////////////////////03/02/2022////////////////////////// by Afolabi Oluwagbnega Sunday
var website_url = 'http://localhost/agrohandlers.com'; /// website url
//var website_url = 'https://www.agrohandlers.com'; /// website url
var local_url = website_url + "/config/code"

var api = website_url + "/api/";

$(window).scroll(function () {
	var scrollheight = $(window).scrollTop();
	if (scrollheight >= 100) {
		$("#back2Top").fadeIn(1000);
		$(".header-div").css("box-shadow", "0px 0px 20px 2px rgba(0,0,0,.2)");
		$(".logo-div").css("width", "70px");
		$(".product-nav-div").css("position", "sticky");
		$(".product-nav-div").css("top", "120px");
	} else {
		$('#back2Top').fadeOut(1000);
		$(".header-div").css("box-shadow", "none");
		$(".logo-div").css("width", "150px");
	}
});


function _back_to_top() {
	event.preventDefault();
	$("html, body").animate({ scrollTop: 0 }, "slow");
	return false;
}
function scrolltodiv(divid, margintop) {
	$('html, body').animate({
		scrollTop: $("#" + divid).offset().top - margintop
	}, 500);
}
function _open_menu() {
	$('.sidenavdiv, .sidenavdiv-in').animate({ 'margin-left': '0' }, 200);
	$('#live-chat-div').animate({ 'margin-left': '-100%' }, 400);
	$('#menu-list-div').animate({ 'margin-left': '0' }, 400);
}
function _open_live_chat() {
	$('.sidenavdiv, .sidenavdiv-in').animate({ 'margin-left': '0' }, 200);
	$('#menu-list-div').animate({ 'margin-left': '-100%' }, 400);
	$('#live-chat-div').animate({ 'margin-left': '0' }, 400);
}
function _close_side_nav() {
	$('.sidenavdiv, .sidenavdiv-in').animate({ 'margin-left': '-100%' }, 200);
	$('#menu-list-div,#live-chat-div').animate({ 'margin-left': '-100%' }, 400);
}
function _open_li(ids) {
	$('#' + ids + '-sub-li').toggle('slow');
}
///////////////////////close all panel//////////////////////////////
function alert_close() {
	$('#get-more-div').html('').fadeOut(500);
}
function alert_secondary_close() {
	$('#get-more-div-secondary').html('').fadeOut(200);
}
function _get_form(page) {
	$('#get-more-div').html('<div class="ajax-loader"><img src="all-images/images/ajax-loader.gif"/></div>').fadeIn('fast');
	var action = 'get-form';
	var dataString = 'action=' + action + '&page=' + page;
	$.ajax({
		type: "POST",
		url: local_url,
		data: dataString,
		cache: false,
		success: function (html) { $('#get-more-div').html(html); }
	});
}

function _get_form_with_id(page, ids) {
	var action = 'get-page-with-id';
	$('#get-more-div').html('<div class="ajax-loader"><img src="all-images/images/ajax-loader.gif"/></div>').fadeIn('fast');
	var dataString = 'action=' + action + '&page=' + page + '&ids=' + ids;
	$.ajax({
		type: "POST",
		url: local_url,
		data: dataString,
		cache: false,
		success: function (html) { $('#get-more-div').html(html); }
	});
}

function _view_gallery_img(divid) {
	var view_pix = $('#' + divid).html();
	$('#gallery-big-pix').html(view_pix).fadeIn(3000);
}


function _fetch_products_cat_list_txt(action) {
	var all_search_txt = $('#all_search_txt').val();
	var txt_lenght = $('#all_search_txt').val().length;
	if ((txt_lenght > 2) || (txt_lenght == 0)) {
		_fetch_product_cat_list(action);
	}
}

function _fetch_product_cat_list(action) {
	var product_id = $('#product_id').val();
	var all_search_txt = $('#all_search_txt').val();
	$('#search-content').html('<div class="ajax-loader"><img src="' + website_url + '/all-images/images/ajax-loader.gif"/></div>').fadeIn(500);
	var dataString = 'action=' + action + '&all_search_txt=' + all_search_txt + '&product_id=' + product_id;
	$.ajax({
		type: "POST",
		url: local_url,
		data: dataString,
		cache: false,
		success: function (html) {
			$('#search-content').html(html);
		}
	});
}


function _fetch_publish_list(action) {
	var cat_id = $('#cat_id').val();
	var all_search_txt = $('#all_search_txt').val();
	$('#search-content').html('<div class="ajax-loader"><img src="' + website_url + '/all-images/images/ajax-loader.gif"/></div>').fadeIn(500);
	var dataString = 'action=' + action + '&all_search_txt=' + all_search_txt + '&cat_id=' + cat_id;
	$.ajax({
		type: "POST",
		url: local_url,
		data: dataString,
		cache: false,
		success: function (html) {
			$('#search-content').html(html);
		}
	});
}



function _visitor_login() {
	var username = $('#visitor_username').val();
	var password = $('#visitor_password').val();
	if ((username != '') && (password != '')) {
		user_login(username, password)
	} else {
		$('#warning-div').fadeIn(500).delay(5000).fadeOut(100);
	}
};


///////////////////// user login ///////////////////////////////////////////
function user_login(username, password) {
	var action = 'visitor_login_check';

	//////////////// get btn text ////////////////
	var btn_text = $('#login-btn').html();
	$('#login-btn').html('Authenticating...');
	document.getElementById('login-btn').disabled = true;
	////////////////////////////////////////////////	

	var dataString = 'action=' + action + '&username=' + username + '&password=' + password;
	$('#login-btn').html('Authenticating...');
	$.ajax({
		type: "POST",
		url: local_url,
		data: dataString,
		dataType: 'json',
		cache: false,
		success: function (data) {
			$('#login-btn').html(btn_text);
			document.getElementById('login-btn').disabled = false;
			var scheck = data.check;
			var order_id = data.shopsession;
			if (scheck == 1) {
			alert_close();
			_proceed_to_payment(order_id);
			} else if (scheck == 2) {
				$('#warning-div').html('<div><i class="fa fa-warning (alias)"></i></div> ACCOUNT SUSPENDED<br /><span>Contact the admin for help</span>').fadeIn(500).delay(5000).fadeOut(100);
			} else {
				$('#not-success-div').fadeIn(500).delay(5000).fadeOut(100);
			}
			$('#login-btn').html('<i class="fa fa-sign-in"></i> Log-In');
		}
	});
}




function _next_reg_pane(detail) {

	if (detail == 'location-details') {
		var surname = $('#surname').val();
		var othernames = $('#othernames').val();
		var dob = $('#datepicker').val();
		var gender = $('#gender').val();
		var religion = $('#religion').val();

		$('#surname, #othernames, #datepicker,#gender, #religion').removeClass('issue');
		if (surname == '') {
			$('#surname').addClass('issue');
			$('#warning-div').html('<div><i class="fa fa-warning (alias)"></i></div> SURNAME ERROR!<br><span>Check The SURNAME And Try Again</span>').fadeIn(500).delay(5000).fadeOut(100);
		} else if (othernames == '') {
			$('#othernames').addClass('issue');
			$('#warning-div').html('<div><i class="fa fa-warning (alias)"></i></div> OTHER NAMES ERROR!<br><span>Check OTHER NAMES And Try Again</span>').fadeIn(500).delay(5000).fadeOut(100);
		} else if (dob == '') {
			$('#datepicker').addClass('issue');
			$('#warning-div').html('<div><i class="fa fa-warning (alias)"></i></div> DATE OF BIRTH ERROR!<br><span>Check DATE OF BIRTH And Try Again</span>').fadeIn(500).delay(5000).fadeOut(100);
		} else if (gender == '') {
			$('#gender').addClass('issue');
			$('#warning-div').html('<div><i class="fa fa-warning (alias)"></i></div> GENDER ERROR!<br><span>Select Your GENDER To Continue</span>').fadeIn(500).delay(5000).fadeOut(100);
		} else if (religion == '') {
			$('#religion').addClass('issue');
			$('#warning-div').html('<div><i class="fa fa-warning (alias)"></i></div> RELIGION ERROR!<br><span>Select Your RELIGION To Continue</span>').fadeIn(500).delay(5000).fadeOut(100);
		} else {
			$('#basic-info, #location-details, #upload-passport, #application-details').css("display", "none");
			$('#' + detail).fadeIn(300).css("display", "block");
		}


	} else if (detail == 'upload-passport') {
		var nationality = $('#nationality').val();
		var state = $('#state').val();
		var lga = $('#lga').val();
		var address = $('#address').val();
		var email = $('#email').val();
		var phoneno = $('#phoneno').val();

		$('#nationality, #state, #lga, #address, #email, #phoneno').removeClass('issue');
		if (nationality == '') {
			$('#nationality').addClass('issue');
			$('#warning-div').html('<div><i class="fa fa-warning (alias)"></i></div> NATIONALITY ERROR!<br><span>Check your NATIONALITY And Try Again</span>').fadeIn(500).delay(5000).fadeOut(100);
		} else if (state == '') {
			$('#state').addClass('issue');
			$('#warning-div').html('<div><i class="fa fa-warning (alias)"></i></div> STATE ERROR!<br><span>Select your STATE And Try Again</span>').fadeIn(500).delay(5000).fadeOut(100);
		} else if (lga == '') {
			$('#lga').addClass('issue');
			$('#warning-div').html('<div><i class="fa fa-warning (alias)"></i></div> LOCAL GOVT. ERROR!<br><span>Check LOCAL GOVT. And Try Again</span>').fadeIn(500).delay(5000).fadeOut(100);
		} else if (address == '') {
			$('#address').addClass('issue');
			$('#warning-div').html('<div><i class="fa fa-warning (alias)"></i></div> ADDRESS ERROR!<br><span>Check your ADDRESS And Try Again</span>').fadeIn(500).delay(5000).fadeOut(100);
		} else if ((email == '') || ($('#email').val().indexOf('@') <= 0)) {
			$('#email').addClass('issue');
			$('#warning-div').html('<div><i class="fa fa-warning (alias)"></i></div> EMAIL ERROR!<br><span>Check your EMAIL And Try Again</span>').fadeIn(500).delay(5000).fadeOut(100);
		} else if (phoneno == '') {
			$('#phoneno').addClass('issue');
			$('#warning-div').html('<div><i class="fa fa-warning (alias)"></i></div> PHONE NUMBER ERROR!<br><span>Check your PHONE NUMBER And Try Again</span>').fadeIn(500).delay(5000).fadeOut(100);
		} else {
			$('#basic-info, #location-details, #upload-passport, #application-details').css("display", "none");
			$('#' + detail).fadeIn(300).css("display", "block");
		}


	} else if (detail == 'application-details') {
		var passport = $('#passport').val();
		var file_data = $('#passport').prop('files')[0];

		if (passport == '') {
			$('#warning-div').html('<div><i class="fa fa-warning (alias)"></i></div> PASSPORT ERROR! <br /><span>Upload Your Passport To Continue</span>').fadeIn(500).delay(5000).fadeOut(100);
		} else {
			$('#basic-info, #location-details, #upload-passport, #application-details').css("display", "none");
			$('#' + detail).fadeIn(300).css("display", "block");
		}
	}

}



function _back_reg_pane(detail) {
	$('#basic-info, #location-details, #upload-passport, #application-details').css("display", "none");
	$('#' + detail).fadeIn(300).css("display", "block");
}


$(function () {
	Test = {
		UpdatePreview: function (obj) {
			// if IE < 10 doesn't support FileReader
			if (!window.FileReader) {
				// don't know how to proceed to assign src to image tag
			} else {
				var reader = new FileReader();
				var target = null;

				reader.onload = function (e) {
					target = e.target || e.srcElement;
					$("#passportimg").prop("src", target.result);
				};
				reader.readAsDataURL(obj.files[0]);
			}
		}
	};
});








function _vet_email() {
	var job_id = $('#job_id').val();
	var up_note = $('#up_note').val();
	var email = $('#email').val();
	var action = 'vet_email';
	if ((job_id == '') || (up_note == '')) {
		$('#warning-div').html('<div><i class="fa fa-warning (alias)"></i></div> USER ERROR! <br /><span>Please Fill Neccessary Fields To Continue</span>').fadeIn(500).delay(5000).fadeOut(100);
	} else {
		var dataString = 'action=' + action + '&email=' + email;
		$.ajax({
			type: "POST",
			url: local_url,
			data: dataString,
			dataType: 'json',
			cache: false,
			success: function (data) {
				var scheck = data.check;
				if (scheck == 1) {
					$('#warning-div').html('<div><i class="fa fa-warning (alias)"></i></div> APPLICANT ALREADY EXIST! <br /><span>Contact Admin For Help</span>').fadeIn(500).delay(5000).fadeOut(100);
				} else {
					_send_otp(email);
				}
			}
		});
	}
}
function _send_otp(email) {
	var surname = $('#surname').val();
	var othernames = $('#othernames').val();
	var action = 'send_registration_otp';
	$('#get-more-div-secondary').html('<div class="ajax-loader"><img src="all-images/images/ajax-loader.gif"/></div>').fadeIn('fast');
	var dataString = 'action=' + action + '&email=' + email + '&surname=' + surname + '&othernames=' + othernames;
	$.ajax({
		type: "POST",
		url: local_url,
		data: dataString,
		cache: false,
		success: function (html) { $('#get-more-div-secondary').html(html); }
	});
}

function _resend_registration_otp(ids, email) {
	var surname = $('#surname').val();
	var othernames = $('#othernames').val();
	var btn_text = $('#' + ids).html();
	$('#' + ids).html('SENDING...');
	var action = 'resend_registration_otp';
	var dataString = 'action=' + action + '&email=' + email + '&surname=' + surname + '&othernames=' + othernames;
	$.ajax({
		type: "POST",
		url: local_url,
		data: dataString,
		cache: false,
		success: function (html) {
			$('#success-div').html('<div><i class="fa fa-check"></i></div> OTP SENT<br /><span>Check your email inbox or spam</span>').fadeIn(500).delay(5000).fadeOut(100);
			$('#' + ids).html(btn_text);
		}
	});
}


function _staff_registration_vet(email) {
	var otp = $('#otp').val();
	var action = 'staff_registration_vet';
	if (otp == '') {
		$('#warning-div').html('<div><i class="fa fa-warning (alias)"></i></div> USER ERROR! <br /><span>Please Fill In Your OTP Continue</span>').fadeIn(500).delay(5000).fadeOut(100);
	} else {
		var dataString = 'action=' + action + '&email=' + email + '&otp=' + otp;
		$.ajax({
			type: "POST",
			url: local_url,
			data: dataString,
			dataType: 'json',
			cache: false,
			success: function (data) {
				var scheck = data.check;
				if (scheck == 0) {
					$('#warning-div').html('<div><i class="fa fa-warning (alias)"></i></div> INVALID OTP! <br /><span>Kindly Check The OTP And Try Again.</span>').fadeIn(500).delay(5000).fadeOut(100);
				} else {
					alert_secondary_close();
					_job_application();
				}
			}
		});
	}
}

function _job_application() {
	var action = 'job_application';
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


	var passport = $('#passport').val();
	var can_passport = $('#passport').prop('files')[0];

	var job_id = $('#job_id').val();
	var up_note = $('#up_note').val();
	var cv_file = $('#up_note').prop('files')[0];


	if ((surname == '') || (othernames == '') || (dob == '') || (gender == '') || (religion == '') || (nationality == '') || (state == '') || (lga == '') || (address == '') || (email == '') || (phone == '') || (passport == '') || (job_id == '') || (up_note == '')) {
		$('#warning-div').html('<div><i class="fa fa-warning (alias)"></i></div> USER ERROR! <br /><span>Please Fill Neccessary Fields To Continue</span>').fadeIn(500).delay(5000).fadeOut(100);
	} else {
		var form_data = new FormData();
		form_data.append('action', action);
		form_data.append('surname', surname);
		form_data.append('othernames', othernames);
		form_data.append('dob', dob);
		form_data.append('gender', gender);
		form_data.append('religion', religion);
		form_data.append('nationality', nationality);
		form_data.append('state', state);
		form_data.append('lga', lga);
		form_data.append('address', address);
		form_data.append('email', email);
		form_data.append('phone', phone);
		form_data.append('passport', can_passport);
		form_data.append('job_id', job_id);
		form_data.append('cv_file', cv_file);

		$(".inner-div").html('<div style="padding-top:90px;"><div class="alert success"><img src="all-images/images/wait.gif" width="15" height="15" /> <span>Registration In Progress...</span><br/> Please DO NOT close this panel as the process takes some time.</div></div><div class="ajax-progress"></div>');
		$.ajax({
			//////////// loading progress bar............
			xhr: function () {
				var xhr = new window.XMLHttpRequest();
				xhr.upload.addEventListener("progress", function (evt) {
					if (evt.lengthComputable) {
						var percentComplete = ((evt.loaded / evt.total) * 100).toFixed();
						$(".ajax-progress").width(percentComplete + '%');
						$(".ajax-progress").html(percentComplete + '%');
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
			processData: false,
			success: function (html) { $('.inner-div').html(html); }
		});

	}
}




function isNumber(evt) {
	evt = (evt) ? evt : window.event;
	var charcode = (evt.which) ? evt.which : evt.keyCode;
	if (charcode > 31 && (charcode < 46 || charcode > 57)) {
		return false;
	}
	return true;
}



function _load_products_page() {
	var product_cat_id = $('#product_cat_id').val();
	window.parent(location = "products?prc=" + product_cat_id);
}



function _get_price(product_id, product_price) {
	var product_qty = parseInt($('#product_qty_' + product_id).val());
	var qty = $('#product_qty_' + product_id).val();
	if (qty == '') {
		$('#price_' + product_id).html(product_price);
	} else {
		if (product_qty < 1) { product_qty = 1 }
		$('#product_qty_' + product_id).val(product_qty);
		$('#price_' + product_id).html(product_qty * product_price);
	}
}


function _add_to_cart(product_id) {
	var product_qty = parseInt($('#product_qty_' + product_id).val());
	var qty = $('#product_qty_' + product_id).val();
	if (qty == '' || product_qty < 1) {
		$('#warning-div').html('<div><i class="fa fa-warning (alias)"></i></div> INVALID PRODUCT QUANTITY').fadeIn(500).delay(5000).fadeOut(100);
	} else {
		$('#decline-cart-btn').hide();
		$('#add-to-cart-btn_' + product_id).html('ADDING...');
		document.getElementById('add-to-cart-btn_' + product_id).disabled = true;
		var action = 'add_to_cart';
		var dataString = 'action=' + action + '&product_id=' + product_id + '&product_qty=' + product_qty;
		$.ajax({
			type: "POST",
			url: local_url,
			data: dataString,
			dataType: 'json',
			cache: false,
			success: function (data) {
				var scheck = data.check;
				if (scheck == 0) {
					$('#warning-div').html('<div><i class="fa fa-warning (alias)"></i></div>SIGNUP/LOGIN TO CONTINUE!<br><span> You may login to perform this function</span>').fadeIn(500).delay(5000).fadeOut(100);
				} else if (scheck == 1) {
					_count_my_cart_items();
					_get_content('get_cart_items');
					alert_close();
				} else {
					$('#warning-div').html('<div><i class="fa fa-warning (alias)"></i></div>Error!<br><span> Something went wrong</span>').fadeIn(500).delay(5000).fadeOut(100);
				}
				$('#decline-cart-btn').show();
				$('#add-to-cart-btn_' + product_id).html('<i class="fa fa-cart-arrow-down"></i> ADD TO CART ');
				document.getElementById('add-to-cart-btn_' + product_id).disabled = false;
			}
		});
	}
}

function _count_my_cart_items() {
	var action = 'count_my_cart_items';
	var dataString = 'action=' + action;
	$.ajax({
		type: "POST",
		url: local_url,
		data: dataString,
		dataType: 'json',
		cache: false,
		success: function (data) {
			var qtycount = data.qtycount;
			if (qtycount > 9) { qtycount = '9+'; }
			$('.cart').html('<i class="fa fa-cart-arrow-down"></i> <div class="cart-num animated bounceInDown animated animated">' + qtycount + '</div>');
		}
	});
}




function _get_content(content) {
	var action = 'get_content';
	$('#get-content').html('<div class="ajax-loader">FETCHING CONTENTS...<br><img src="all-images/images/processing.gif"/></div>').fadeIn('fast');
	var dataString = 'action=' + action + '&content=' + content;
	$.ajax({
		type: "POST",
		url: local_url,
		data: dataString,
		cache: false,
		success: function (html) {
			$('#get-content').html(html);
		}
	});
}

function _delete_cart(product_id) {
	if (confirm("Confirm!!\n\n You are about to DELETE this ITEM")) {
		var action = 'delete_item';
		$('#delete_' + product_id).html('...');
		document.getElementById('delete_' + product_id).disabled = true;
		var dataString = 'action=' + action + '&product_id=' + product_id;
		$.ajax({
			type: "POST",
			url: local_url,
			data: dataString,
			cache: false,
			success: function (html) {
				_get_content('get_cart_items');
				_count_my_cart_items();
			}
		});
	} else {
		return false;
	}
}




function _fetch_products_list_txt(product_cat_id) {
	var all_search_txt = $('#all_search_txt').val();
	var txt_lenght = $('#all_search_txt').val().length;
	if ((txt_lenght > 2) || (txt_lenght == 0)) {
		_fetch_products_list(product_cat_id);
	}
}

function _fetch_products_list(product_cat_id) {
	var all_search_txt = $('#all_search_txt').val();
	var action = 'fetch_products_list';
	$('#search-content').html('<div class="ajax-loader">FETCHING PRODUCTS...<br><img src="all-images/images/processing.gif"/></div>').fadeIn(500);
	var dataString = 'action=' + action + '&product_cat_id=' + product_cat_id + '&all_search_txt=' + all_search_txt;
	$.ajax({
		type: "POST",
		url: local_url,
		data: dataString,
		cache: false,
		success: function (html) {
			$('#search-content').html(html);
		}
	});
}






function _update_user() {
	var fullname = $('#fullname').val();
	var phone = $('#phone').val();
	var address = $('#address').val();

	$('#fullname, #phone, #email,#address').removeClass('issue');
	if (fullname == '') {
		$('#fullname').addClass('issue');
		$('#warning-div').html('<div><i class="fa fa-warning (alias)"></i></div> FULLNAME ERROR!<br><span>Check The FULLNAME And Try Again</span>').fadeIn(500).delay(5000).fadeOut(100);
	} else if (phone == '') {
		$('#phone').addClass('issue');
		$('#warning-div').html('<div><i class="fa fa-warning (alias)"></i></div> PHONE MUNBER ERROR!<br><span>Check PHONE NUMBER And Try Again</span>').fadeIn(500).delay(5000).fadeOut(100);
	} else if (address == '') {
		$('#address').addClass('issue');
		$('#warning-div').html('<div><i class="fa fa-warning (alias)"></i></div> HOME ADDRESS ERROR!<br><span>Check HOME ADDRESS And Try Again</span>').fadeIn(500).delay(5000).fadeOut(100);
	} else {
		if (confirm("Confirm!!\n\n Have you confirm all DATA?")) {
			//////////////// get btn text ////////////////
			var btn_text = $('#proceed-btn').html();
			$('#proceed-btn').html('VERIFYING...');
			document.getElementById('proceed-btn').disabled = true;
			////////////////////////////////////////////////	
			var action = 'update_user';
			var dataString = 'action=' + action + '&fullname=' + fullname + '&phone=' + phone + '&address=' + address;
			$.ajax({
				type: "POST",
				url: local_url,
				data: dataString,
				cache: false,
				success: function (html) {
					_get_content('user_dashboard');
					$('#success-div').html('<div><i class="fa fa-check"></i></div> PROFILE UPDATED SUCCESSFULLY!').fadeIn(500).delay(5000).fadeOut(100);
					alert_close()
				}
			});
		} else {
			return false;
		}
	}
}




$(function () {
	User = {
		UpdatePreview: function (obj) {
			// if IE < 10 doesn't support FileReader
			if (!window.FileReader) {
				// don't know how to proceed to assign src to image tag
			} else {
				_upload_profile_pix();
				var reader = new FileReader();
				var target = null;

				reader.onload = function (e) {
					target = e.target || e.srcElement;
					$("#passportimg1,#passportimg2").prop("src", target.result);
				};
				reader.readAsDataURL(obj.files[0]);
			}
		}
	};
});

function _upload_profile_pix() {
	var action = 'update_profile_pix';
	var file_data = $('#passport').prop('files')[0];
	if (file_data == '') { } else {
		var form_data = new FormData();
		form_data.append('passport', file_data);
		form_data.append('action', action);
		$.ajax({
			url: local_url,
			type: "POST",
			data: form_data,
			contentType: false,
			cache: false,
			processData: false,
			success: function (html) {
				$('#success-div').html('<div><i class="fa fa-check"></i></div> PROFILE PICTURE UPDATED SUCCESSFULLY').fadeIn(500).delay(5000).fadeOut(100);
				$('#passport').val('');
				alert_close()
			}
		});
	}
}

///////////////change user password//////////////
function _update_user_password(userid) {
	$('.success-div').hide()
	var oldpass = $('#oldpass').val();
	var newpass = $('#newpass').val();
	var cnewpass = $('#cnewpass').val();
	if ((oldpass == '') || (newpass == '') || (cnewpass == '')) {
		$('#warning-div').html('<div><i class="fa fa-warning (alias)"></i></div> Please Fill The Passwords<br /><span>Fields cannot be empty</span>').fadeIn(500).delay(5000).fadeOut(100);
	} else if (newpass != cnewpass) {
		$('#not-success-div').html('<div><i class="fa fa-close"></i></div>New Password Not Match<br /><span>Check the fields again</span>').fadeIn(500).delay(5000).fadeOut(100);
	} else {
		//////////////// get btn text ////////////////
		var btn_text = $('#update-user-password-btn').html();
		$('#update-user-password-btn').html('PROCESSING...');
		document.getElementById('update-user-password-btn').disabled = true;
		////////////////////////////////////////////////	
		var action = 'update_user_password';
		var dataString = 'action=' + action + '&userid=' + userid + '&oldpass=' + oldpass + '&newpass=' + newpass;
		$.ajax({
			type: "POST",
			url: local_url,
			data: dataString,
			dataType: 'json',
			cache: false,
			success: function (data) {
				var scheck = data.check;
				if (scheck == 0) {
					$('#not-success-div').html('<div><i class="fa fa-close"></i></div>USER ERROR! <br /><span> Incorrect Old Password</span>').fadeIn(500).delay(5000).fadeOut(100);
				} else {
					$('#success-div').html('<div><i class="fa fa-check"></i></div>PASSWORD UPDATED!<br /><span>Please Re-Login To Continue</span>').fadeIn(500).delay(5000).fadeOut(100);
					alert_close()
				}
				$('#update-user-password-btn').html(btn_text);
				document.getElementById('update-user-password-btn').disabled = false;
			}
		});
	}
}







function _load_user_wallet() {
	var amount = $('#amount').val();
	if ((amount == '') || (amount <= 0)) {
		$('#warning-div').html('<div><i class="fa fa-warning (alias)"></i></div> INVALID AMOUNT!<br /><span>Check the amount and try again</span>').fadeIn(500).delay(5000).fadeOut(100);
	} else {
		$('#load_wallet_btn').html('<img src="all-images/images/wait.gif" width="20px"/>');
		document.getElementById('load_wallet_btn').disabled = true;
		var action = 'load_user_wallet';
		var dataString = 'action=' + action + '&amount=' + amount;
		$.ajax({
			type: "POST",
			url: local_url,
			data: dataString,
			dataType: 'json',
			cache: false,
			success: function (data) {
				var scheck = data.check;
				var fullname = data.fullname;
				var pay_id = data.pay_id;
				var gateway_key = data.gateway_key;
				var email = data.email;
				var phone = data.phone;
				var amount = data.amount;
				if (scheck == 1) {
					PayWithPaystack(fullname, pay_id, gateway_key, email, phone, amount);
				} else {
					$('#warning-div').html('<div><i class="fa fa-warning (alias)"></i></div> INVALID AMOUNT!<br /><span>Check the amount and try again</span>').fadeIn(500).delay(5000).fadeOut(100);
					$('#load_wallet_btn').html('Load Wallet ');
					document.getElementById('load_wallet_btn').disabled = false;
				}
			}
		});
	}
}

function PayWithPaystack(fullname, pay_id, gateway_key, email, phone, amount) {
	var handler = PaystackPop.setup({
		key: gateway_key,
		email: email,
		amount: amount * 100, //amt in kobo
		ref: pay_id,
		metadata: {
			custom_fields: [
				{
					display_name: fullname,
					variable_name: "mobile_number",
					value: phone
				}
			]
		},
		callback: function (response) { //success
			var stack_pay_ref = $.trim(response.reference);
			_call_load_user_wallet_success(pay_id, stack_pay_ref, amount);
		},
		onClose: function () { //update to cancelled.
			_call_load_user_wallet_cancelled(pay_id, amount);
			return false;
		}
	});
	handler.openIframe();
}

function _call_load_user_wallet_success(pay_id, stack_pay_ref, amount) {
	var action = 'load_user_wallet_success';
	$('#get-more-div').html('<div class="ajax-loader"><img src="all-images/images/ajax-loader.gif"/></div>').fadeIn('fast');
	var dataString = 'action=' + action + '&pay_id=' + pay_id + '&stack_pay_ref=' + stack_pay_ref + '&amount=' + amount;
	$.ajax({
		type: "POST",
		url: local_url,
		data: dataString,
		cache: false,
		success: function (html) {
			$('#get-more-div').html(html);
		}
	});
}

function _call_load_user_wallet_cancelled(pay_id, amount) {
	var action = 'load_user_wallet_cancelled';
	var dataString = 'action=' + action + '&pay_id=' + pay_id + '&amount=' + amount;
	$.ajax({
		type: "POST",
		url: local_url,
		data: dataString,
		cache: false,
		success: function (html) {
			/// do nothing
			$('#load_wallet_btn').html('LOAD WALLET');
			document.getElementById('load_wallet_btn').disabled = false;
		}
	});
}


function _cancel_transaction(pay_id) {
	var action = 'cancel_transaction';
	var dataString = 'action=' + action + '&pay_id=' + pay_id;
	$.ajax({
		type: "POST",
		url: local_url,
		data: dataString,
		cache: false,
		success: function (html) {
			$('#' + pay_id).html(html).fadeOut(200).fadeIn(500);
		}
	});
}





function _get_logistics(div_id) {
	$('#pickup-div, #delivery-div').hide();
	$('#' + div_id).toggle('slow');
}


function _get_location() {
	$('#delivery-area, #delivery-payment').hide();
	var location = $('#location').val();
	if ((location == 'LAGOS') || (location == '')) {
		$('#delivery-area, #delivery-payment').fadeIn(1000);
		$('#btn-proceed-show').show();
		$('#btn-quote').hide();
	} else {
		$('#delivery-area, #delivery-payment').hide();
		$('#delivery-details').hide();
		$('#btn-quote').show();
		$('#btn-proceed-show').hide();
	}
}



function _get_delivery_area() {
	var action = 'delivery_area_api';
	var delivery_area_id = $('#delivery_area_id').val();

	$('#delivery_area_id').html('LOADING...').fadeIn(500);
	var dataString = 'action=' + action + '&delivery_area_id=' + delivery_area_id;
	$.ajax({
		type: "POST",
		url: api,
		data: dataString,
		dataType: 'json',
		cache: false,
		success: function (info) {
			var fetch = info.data;
			var result = info.result;
			var message = info.message;

			var text = '';
			text = '<option value="" >SELECT DELIVERY AREA</option>';
			if (result == true) {
				for (var i = 0; i < fetch.length; i++) {
					var da_id = fetch[i].da_id;
					var da_name = fetch[i].da_name;
					text += '<option value="' + da_id + '">' + da_name + '</option>';
				}
				$('#delivery_area_id').html(text);
			}


		}
	});
}



function _get_delivery_area_details() {
	var location = $('#location').val();
	var da_id = $('#delivery_area_id').val();
	if (location == '') {
		$('#warning-div').html('<div><i class="fa fa-warning (alias)"></i></div> SELECT LOCATION!').fadeIn(500).delay(5000).fadeOut(100);
	} else {
		if (da_id == '') {
			// do nothing
		} else {
			$('#delivery-details').html('CALCULATING DELIVERY COST <i class="fa fa-spinner fa-spin"></i>').fadeIn(1000);
			var action = 'get_delivery_area_details_api';
			var dataString = 'action=' + action + '&da_id=' + da_id;
			$.ajax({
				type: "POST",
				url: api,
				data: dataString,
				dataType: 'json',
				cache: false,
				success: function (info) {
					var fetch = info.data;
					var da_cost = fetch.da_cost
					var da_name = fetch.da_name
					$('#delivery-details').html('<span>NOTE:</span> The delivery cost to <span>' + da_name + '</span> is <span><s>N</s></s>' + da_cost + '<span>');
				}
			});
		}
	}
}



function _proceed_to_payment(order_id) {
	var logistic_id = $("input[name='logistic_id']:checked").val();
	var fund_method_id = $('#fund_method_id').val();
	var action = 'proceed_to_payment';
	if (logistic_id == 'P') {
		$('#fund_method_id').removeClass('issue');
		if (fund_method_id == '') {
			$('#fund_method_id').addClass('issue');
			$('#warning-div').html('<div><i class="fa fa-warning (alias)"></i></div> PAYMENT METHOD ERROR!<br><span>Select PAYMENT METHOD To Continue').fadeIn(500).delay(5000).fadeOut(100);
		} else {
			var address = ''
			var dataString = 'action=' + action + '&order_id=' + order_id + '&logistic_id=' + logistic_id + '&fund_method_id=' + fund_method_id + '&address=' + address;
			_payment_for_order(dataString);
		}

	} else if (logistic_id == 'D') {

		var house_numb_and_street = $('#house_numb_and_street').val();
		var landmark = $('#landmark').val();
		var city = $('#city').val();
		var delivery_area_id = $('#delivery_area_id').val();
		var location = $('#location').val();
		var promo_code = $('#promo_code').val();


		$('#house_numb_and_street, #landmark, #city,#location,#delivery_area_id,#fund_method_id').removeClass('issue');


		if (location == '') {
			$('#location').addClass('issue');
			$('#warning-div').html('<div><i class="fa fa-warning (alias)"></i></div> LOCATION ERROR!<br><span>Check Your LOCATION And Try Again</span>').fadeIn(500).delay(5000).fadeOut(100);

		} else if (delivery_area_id == '') {
			$('#delivery_area_id').addClass('issue');
			$('#warning-div').html('<div><i class="fa fa-warning (alias)"></i></div> DELIVERY AREA ERROR!<br><span>Select AREA And Try Again</span>').fadeIn(500).delay(5000).fadeOut(100);

		} else if (house_numb_and_street == '') {
			$('#house_numb_and_street').addClass('issue');
			$('#warning-div').html('<div><i class="fa fa-warning (alias)"></i></div> HOUSE NUMBER AND STREET ERROR!').fadeIn(500).delay(5000).fadeOut(100);
		} else if (landmark == '') {
			$('#landmark').addClass('issue');
			$('#warning-div').html('<div><i class="fa fa-warning (alias)"></i></div> LANDMARK ERROR!<br><span>Check The LANDMARK And Try Again</span>').fadeIn(500).delay(5000).fadeOut(100);
		} else if (city == '') {
			$('#city').addClass('issue');
			$('#warning-div').html('<div><i class="fa fa-warning (alias)"></i></div> CITY ERROR!<br><span>Check Your CITY And Try Again</span>').fadeIn(500).delay(5000).fadeOut(100);
		} else if (fund_method_id == '') {
			$('#fund_method_id').addClass('issue');
			$('#warning-div').html('<div><i class="fa fa-warning (alias)"></i></div> PAYMENT METHOD ERROR!<br><span>Select PAYMENT METHOD To Continue').fadeIn(500).delay(5000).fadeOut(100);
		} else {
			var address = house_numb_and_street + ', ' + landmark + ', ' + city + ',' + location;
			var dataString = 'action=' + action + '&order_id=' + order_id + '&delivery_area_id=' + delivery_area_id + '&logistic_id=' + logistic_id + '&fund_method_id=' + fund_method_id + '&address=' + address + '&promo_code=' + promo_code;

			_payment_for_order(dataString);
		}
	} else {
		$('#warning-div').html('<div><i class="fa fa-warning (alias)"></i></div> USER ERROR!<br /><span>Select your logistics and try again.</span>').fadeIn(500).delay(5000).fadeOut(100);
	}
}






function _payment_for_order(dataString) {
	var fund_method_id = $('#fund_method_id').val();
	if (confirm("Confirm!!\n\n Have you confirmed all DATA?")) {
		$('#payment-btn').html('PROCESSING...');
		document.getElementById('payment-btn').disabled = true;
		$.ajax({
			type: "POST",
			url: local_url,
			data: dataString,
			dataType: 'json',
			cache: false,
			success: function (data) {
				var scheck = data.check;
				var order_id = data.order_id;
				var fullname = data.fullname;
				var pay_id = data.pay_id;
				var gateway_key = data.gateway_key;
				var email = data.email;
				var phone = data.phone;
				var amount = data.amount;
				if (scheck == 0) {
					$('#payment-btn').html('<i class="fa fa-long-arrow-right"></i> MAKE PAYMENT');
					document.getElementById('payment-btn').disabled = false;
					_get_form('visitors_login');
				} else {
					if (fund_method_id == 'FM001') {// pay with DEBIT/CREDIT CARD
						PayWithPaystack_for_order(fullname, pay_id, gateway_key, email, phone, amount);
					} else if (fund_method_id == 'FM002') {// pay with PAY WITH WALLET
						_pay_with_wallet(pay_id,order_id);
					} else if (fund_method_id == 'FM003') {// pay with BANK TRANSFER
						_generate_post_paid_invoice(pay_id);
					} else if (fund_method_id == 'FM004') {// pay with PAY ON DELIVERY
						_generate_post_paid_invoice(pay_id);
					} else if (fund_method_id == 'FM005') {// pay with PAY LATER
						_generate_post_paid_invoice(pay_id);
					}
				}

			}
		});
	} else {
		return false;
	}
}




function PayWithPaystack_for_order(fullname, pay_id, gateway_key, email, phone, amount) {
	var handler = PaystackPop.setup({
		key: gateway_key,
		email: email,
		amount: amount * 100, //amt in kobo
		ref: pay_id,
		metadata: {
			custom_fields: [
				{
					display_name: fullname,
					variable_name: "mobile_number",
					value: phone
				}
			]
		},
		callback: function (response) { //success
			var stack_pay_ref = $.trim(response.reference);
			_call_order_payment_success(pay_id, stack_pay_ref, amount);
		},
		onClose: function () { //update to cancelled.
			_call_order_payment_cancelled(pay_id, amount);
			return false;
		}
	});
	handler.openIframe();
}

function _call_order_payment_success(pay_id, stack_pay_ref, amount) {
	var action = 'order_payment_success';
	$('#get-more-div').html('<div class="ajax-loader"><img src="all-images/images/ajax-loader.gif"/></div>').fadeIn('fast');
	var dataString = 'action=' + action + '&pay_id=' + pay_id + '&stack_pay_ref=' + stack_pay_ref + '&amount=' + amount;
	$.ajax({
		type: "POST",
		url: local_url,
		data: dataString,
		cache: false,
		success: function (html) {
			$('#get-more-div').html(html);
		}
	});
}

function _call_order_payment_cancelled(pay_id, amount) {
	var action = 'order_payment_cancelled';
	var dataString = 'action=' + action + '&pay_id=' + pay_id + '&amount=' + amount;
	$.ajax({
		type: "POST",
		url: local_url,
		data: dataString,
		cache: false,
		success: function (html) {
			/// do nothing
			$('#payment-btn').html('<i class="fa fa-long-arrow-right"></i> MAKE PAYMENT');
			document.getElementById('payment-btn').disabled = false;
		}
	});
}

function _pay_with_wallet(pay_id, order_id) {
	var action = 'pay_with_wallet';
	$('#get-more-div').html('<div class="ajax-loader"><img src="all-images/images/ajax-loader.gif"/></div>').fadeIn('fast');
	var dataString = 'action=' + action + '&pay_id=' + pay_id+ '&order_id=' + order_id;
	$.ajax({
		type: "POST",
		url: local_url,
		data: dataString,
		dataType: 'json',
		cache: false,
		success: function (data) {
			var scheck = data.check;
			if (scheck == 1) {
				_get_form('order_payment_success');
			} else {
				_get_form('load_user_wallet');
				$('#warning-div').html('<div><i class="fa fa-warning (alias)"></i></div> INSUFFICIENT FUND!<br /><span>Kindly load your wallet to continue.</span>').fadeIn(500).delay(5000).fadeOut(100);
				$('#payment-btn').html('<i class="fa fa-long-arrow-right"></i> MAKE PAYMENT');
				document.getElementById('payment-btn').disabled = false;
			}
		}
	});
}

function _generate_post_paid_invoice(pay_id) {
	var action = 'generate_post_paid_invoice';
	$('#get-more-div').html('<div class="ajax-loader"><img src="all-images/images/ajax-loader.gif"/></div>').fadeIn('fast');
	var dataString = 'action=' + action + '&pay_id=' + pay_id;
	$.ajax({
		type: "POST",
		url: local_url,
		data: dataString,
		cache: false,
		success: function (html) {
			_get_form_with_id('order_post_paid_invoice_success', pay_id);
		}
	});
}

function _order_cart_list(order_id) {
	var action = 'order_cart_list';
	var dataString = 'action=' + action + '&order_id=' + order_id;
	$.ajax({
		type: "POST",
		url: local_url,
		data: dataString,
		cache: false,
		success: function (html) {
			window.parent(location = "cart");
		}
	});
}
















function select_search() {
	$('.srch-select').toggle('fast');
};
function srch_custom(text) {
	$('#srch-text').html(text);
	$('.custom-srch-div').fadeIn(500);
};

function get_order_report(id, action, view_report) {
	$('#srch-text').html($('#' + id).html());
	$('.custom-srch-div').fadeOut(500);
	$('#search-content').html('<div class="ajax-loader">Loading Matrix...<br><img src="all-images/images/processing.gif"/></div>');
	var dataString = 'action=' + action + '&view_report=' + view_report;
	$.ajax({
		type: "POST",
		url: local_url,
		data: dataString,
		cache: false,
		success: function (html) {
			$('#search-content').html(html);
		}
	});
}

function _fetch_custom_order_report(action, view_report) {
	var datefrom = $('#datepicker-from').val();
	var dateto = $('#datepicker-to').val();
	if ((datefrom == '') || (dateto == '')) {
		$('#warning-div').html('<div><i class="fa fa-warning (alias)"></i></div> Search Date Fields Empty<br /><span>Please fill all the feilds</span>').fadeIn(500).delay(5000).fadeOut(100);
	} else {
		$('#search-content').html('<div class="ajax-loader">Loading Matrix...<br><img src="all-images/images/processing.gif"/>');
		var dataString = 'action=' + action + '&datefrom=' + datefrom + '&dateto=' + dateto + '&view_report=' + view_report;
		$.ajax({
			type: "POST",
			url: local_url,
			data: dataString,
			cache: false,
			success: function (html) {
				$('#search-content').html(html);
			}
		});
	}
};


function get_alert_report(id, action, view_report) {
	$('#srch-text').html($('#' + id).html());
	$('.custom-srch-div').fadeOut(500);
	$('.system-alert-div').html('<div class="ajax-loader"><img src="all-images/images/ajax-loader.gif"/></div>');
	var dataString = 'action=' + action + '&view_report=' + view_report;
	$.ajax({
		type: "POST",
		url: local_url,
		data: dataString,
		cache: false,
		success: function (html) {
			$('.system-alert-div').html(html);
		}
	});
}

function _fetch_custom_alert_report(action, view_report) {
	var datefrom = $('#datepicker-from').val();
	var dateto = $('#datepicker-to').val();
	if ((datefrom == '') || (dateto == '')) {
		$('#warning-div').html('<div><i class="fa fa-warning (alias)"></i></div> Search Date Fields Empty<br /><span>Please fill all the feilds</span>').fadeIn(500).delay(5000).fadeOut(100);
	} else {
		$('.system-alert-div').html('<div class="ajax-loader"><img src="all-images/images/ajax-loader.gif"/></div>');
		var dataString = 'action=' + action + '&datefrom=' + datefrom + '&dateto=' + dateto + '&view_report=' + view_report;
		$.ajax({
			type: "POST",
			url: local_url,
			data: dataString,
			cache: false,
			success: function (html) {
				$('.system-alert-div').html(html);
			}
		});
	}
};



function _read_alert(alert_id) {
	$('#' + alert_id + 'viewed').html('<i class="fa fa-check"></i><i class="fa fa-check"></i>');
	$('#' + alert_id).addClass('system-alert alert-seen');

	$('#get-more-div').html('<div class="ajax-loader"><img src="all-images/images/ajax-loader.gif"/></div>').fadeIn('fast');
	var action = 'read_alert';
	var dataString = 'action=' + action + '&alert_id=' + alert_id;
	$.ajax({
		type: "POST",
		url: local_url,
		data: dataString,
		cache: false,
		success: function (html) { $('#get-more-div').html(html); }
	});
}



















function _add_news_letter() {
	var new_letter_email = $('#new_letter_email').val();
	var action = 'add_news_letter';
	if ((new_letter_email == '') || (new_letter_email.indexOf('@') <= 0)) {
		$('#warning-div').html('<div><i class="fa fa-warning (alias)"></i></div> USER ERROR! <br /><span>Kindly fill in your email to subscribe.</span>').fadeIn(500).delay(5000).fadeOut(100);
	} else {

		$('#get-more-div').html('<div class="ajax-loader"><img src="all-images/images/ajax-loader.gif"/></div>').fadeIn('fast');
		var dataString = 'action=' + action + '&new_letter_email=' + new_letter_email;
		$.ajax({
			type: "POST",
			url: local_url,
			data: dataString,
			cache: false,
			success: function (html) {
				$('#get-more-div').html(html);
				$('#new_letter_email').val('');
			}
		});
	}
}

function _send_contact_email() {
	var fullname = $('#fullname').val();
	var email = $('#email').val();
	var subject = $('#subject').val();
	var message = $('#message').val();
	var action = 'send_contact_email';
	if ((fullname == '') || (email == '') || (subject == '') || (message == '') || (email.indexOf('@') <= 0)) {
		$('#warning-div').html('<div><i class="fa fa-warning (alias)"></i></div> USER ERROR! <br /><span>Kindly fill all fields to continue.</span>').fadeIn(500).delay(5000).fadeOut(100);
	} else {
		$('#get-more-div').html('<div class="ajax-loader"><img src="all-images/images/ajax-loader.gif"/></div>').fadeIn('fast');
		var dataString = 'action=' + action + '&fullname=' + fullname + '&email=' + email + '&subject=' + subject + '&message=' + message;
		$.ajax({
			type: "POST",
			url: local_url,
			data: dataString,
			cache: false,
			success: function (html) {
				$('#get-more-div').html(html);
				$('#fullname,#email,#subject,#message').val('');
			}
		});
	}
}










function _get_lga() {
	switch ($('#state').val()) {
		case "Abia": var a = ["Select LGA", "Aba North", "Aba South", "Arochukwu", "Bende", "Ikwuano", "Isiala Ngwa North", "Isiala Ngwa South", "Isuikwuato", "Obi Ngwa", "Ohafia", "Osisioma", "Ugwunagbo", "Ukwa East", "Ukwa West", "Umuahia North", "Umuahia South", "Umu Nneochi"]; break;
		case "Adamawa": a = ["Select LGA", "Demsa", "Fufure", "Ganye", "Gayuk", "Gombi", "Grie", "Hong", "Jada", "Larmurde", "Madagali", "Maiha", "Mayo Belwa", "Michika", "Mubi North", "Mubi South", "Numan", "Shelleng", "Song", "Toungo", "Yola North", "Yola South"]; break;
		case "AkwaIbom": a = ["Select LGA", "Abak", "Eastern Obolo", "Eket", "Esit Eket", "Essien Udim", "Etim Ekpo", "Etinan", "Ibeno", "Ibesikpo Asutan", "Ibiono-Ibom", "Ika", "Ikono", "Ikot Abasi", "Ikot Ekpene", "Ini", "Itu", "Mbo", "Mkpat-Enin", "Nsit-Atai", "Nsit-Ibom", "Nsit-Ubium", "Obot Akara", "Okobo", "Onna", "Oron", "Oruk Anam", "Udung-Uko", "Ukanafun", "Uruan", "Urue-Offong Oruko", "Uyo"]; break;
		case "Anambra": a = ["Select LGA", "Aguata", "Anambra East", "Anambra West", "Anaocha", "Awka North", "Awka South", "Ayamelum", "Dunukofia", "Ekwusigo", "Idemili North", "Idemili South", "Ihiala", "Njikoka", "Nnewi North", "Nnewi South", "Ogbaru", "Onitsha North", "Onitsha South", "Orumba North", "Orumba South", "Oyi"]; break;
		case "Bauchi": a = ["Select LGA", "Alkaleri", "Bauchi", "Bogoro", "Damban", "Darazo", "Dass", "Gamawa", "Ganjuwa", "Giade", "Itas-Gadau", "Jama are", "Katagum", "Kirfi", "Misau", "Ningi", "Shira", "Tafawa Balewa", " Toro", " Warji", " Zaki"]; break;
		case "Bayelsa": a = ["Select LGA", "Brass", "Ekeremor", "Kolokuma Opokuma", "Nembe", "Ogbia", "Sagbama", "Southern Ijaw", "Yenagoa"]; break;
		case "Benue": a = ["Select LGA", "Agatu", "Apa", "Ado", "Buruku", "Gboko", "Guma", "Gwer East", "Gwer West", "Katsina-Ala", "Konshisha", "Kwande", "Logo", "Makurdi", "Obi", "Ogbadibo", "Ohimini", "Oju", "Okpokwu", "Oturkpo", "Tarka", "Ukum", "Ushongo", "Vandeikya"]; break;
		case "Borno": a = ["Select LGA", "Abadam", "Askira-Uba", "Bama", "Bayo", "Biu", "Chibok", "Damboa", "Dikwa", "Gubio", "Guzamala", "Gwoza", "Hawul", "Jere", "Kaga", "Kala-Balge", "Konduga", "Kukawa", "Kwaya Kusar", "Mafa", "Magumeri", "Maiduguri", "Marte", "Mobbar", "Monguno", "Ngala", "Nganzai", "Shani"]; break;
		case "Cross River": a = ["Select LGA", "Abi", "Akamkpa", "Akpabuyo", "Bakassi", "Bekwarra", "Biase", "Boki", "Calabar Municipal", "Calabar South", "Etung", "Ikom", "Obanliku", "Obubra", "Obudu", "Odukpani", "Ogoja", "Yakuur", "Yala"]; break;
		case "Delta": a = ["Select LGA", "Aniocha North", "Aniocha South", "Bomadi", "Burutu", "Ethiope East", "Ethiope West", "Ika North East", "Ika South", "Isoko North", "Isoko South", "Ndokwa East", "Ndokwa West", "Okpe", "Oshimili North", "Oshimili South", "Patani", "Sapele", "Udu", "Ughelli North", "Ughelli South", "Ukwuani", "Uvwie", "Warri North", "Warri South", "Warri South West"]; break;
		case "Ebonyi": a = ["Select LGA", "Abakaliki", "Afikpo North", "Afikpo South", "Ebonyi", "Ezza North", "Ezza South", "Ikwo", "Ishielu", "Ivo", "Izzi", "Ohaozara", "Ohaukwu", "Onicha"]; break;
		case "Edo": a = ["Select LGA", "Akoko-Edo", "Egor", "Esan Central", "Esan North-East", "Esan South-East", "Esan West", "Etsako Central", "Etsako East", "Etsako West", "Igueben", "Ikpoba Okha", "Orhionmwon", "Oredo", "Ovia North-East", "Ovia South-West", "Owan East", "Owan West", "Uhunmwonde"]; break;
		case "Ekiti": a = ["Select LGA", "Ado Ekiti", "Efon", "Ekiti East", "Ekiti South-West", "Ekiti West", "Emure", "Gbonyin", "Ido Osi", "Ijero", "Ikere", "Ikole", "Ilejemeje", "Irepodun-Ifelodun", "Ise-Orun", "Moba", "Oye"]; break;
		case "Enugu": a = ["Select LGA", "Aninri", "Awgu", "Enugu East", "Enugu North", "Enugu South", "Ezeagu", "Igbo Etiti", "Igbo Eze North", "Igbo Eze South", "Isi Uzo", "Nkanu East", "Nkanu West", "Nsukka", "Oji River", "Udenu", "Udi", "Uzo Uwani"]; break;
		case "FCT": a = ["Select LGA", "Abaji", "Bwari", "Gwagwalada", "Kuje", "Kwali", "Municipal Area Council"]; break;
		case "Gombe": a = ["Select LGA", "Akko", "Balanga", "Billiri", "Dukku", "Funakaye", "Gombe", "Kaltungo", "Kwami", "Nafada", "Shongom", "Yamaltu-Deba"]; break;
		case "Imo": a = ["Select LGA", "Aboh Mbaise", "Ahiazu Mbaise", "Ehime Mbano", "Ezinihitte", "Ideato North", "Ideato South", "Ihitte-Uboma", "Ikeduru", "Isiala Mbano", "Isu", "Mbaitoli", "Ngor Okpala", "Njaba", "Nkwerre", "Nwangele", "Obowo", "Oguta", "Ohaji-Egbema", "Okigwe", "Orlu", "Orsu", "Oru East", "Oru West", "Owerri Municipal", "Owerri North", "Owerri West", "Unuimo"]; break;
		case "Jigawa": a = ["Select LGA", "Auyo", "Babura", "Biriniwa", "Birnin Kudu", "Buji", "Dutse", "Gagarawa", "Garki", "Gumel", "Guri", "Gwaram", "Gwiwa", "Hadejia", "Jahun", "Kafin Hausa", "Kazaure", "Kiri Kasama", "Kiyawa", "Kaugama", "Maigatari", "Malam Madori", "Miga", "Ringim", "Roni", "Sule Tankarkar", "Taura", "Yankwashi"]; break;
		case "Kaduna": a = ["Select LGA", "Birnin Gwari", "Chikun", "Giwa", "Igabi", "Ikara", "Jaba", "Jema a", "Kachia", "Kaduna North", "Kaduna South", "Kagarko", "Kajuru", "Kaura", "Kauru", "Kubau", "Kudan", "Lere", "Makarfi", "Sabon Gari", "Sanga", "Soba", "Zangon Kataf", "Zaria"]; break;
		case "Kano": a = ["Select LGA", "Ajingi", "Albasu", "Bagwai", "Bebeji", "Bichi", "Bunkure", "Dala", "Dambatta", "Dawakin Kudu", "Dawakin Tofa", "Doguwa", "Fagge", "Gabasawa", "Garko", "Garun Mallam", "Gaya", "Gezawa", "Gwale", "Gwarzo", "Kabo", "Kano Municipal", "Karaye", "Kibiya", "Kiru", "Kumbotso", "Kunchi", "Kura", "Madobi", "Makoda", "Minjibir", "Nasarawa", "Rano", "Rimin Gado", "Rogo", "Shanono", "Sumaila", "Takai", "Tarauni", "Tofa", "Tsanyawa", "Tudun Wada", "Ungogo", "Warawa", "Wudil"]; break;
		case "Katsina": a = ["Select LGA", "Bakori", "Batagarawa", "Batsari", "Baure", "Bindawa", "Charanchi", "Dandume", "Danja", "Dan Musa", "Daura", "Dutsi", "Dutsin Ma", "Faskari", "Funtua", "Ingawa", "Jibia", "Kafur", "Kaita", "Kankara", "Kankia", "Katsina", "Kurfi", "Kusada", "Mai Adua", "Malumfashi", "Mani", "Mashi", "Matazu", "Musawa", "Rimi", "Sabuwa", "Safana", "Sandamu", "Zango"]; break;
		case "Kebbi": a = ["Select LGA", "Aleiro", "Arewa Dandi", "Argungu", "Augie", "Bagudo", "Birnin Kebbi", "Bunza", "Dandi", "Fakai", "Gwandu", "Jega", "Kalgo", "Koko Besse", "Maiyama", "Ngaski", "Sakaba", "Shanga", "Suru", "Wasagu Danko", "Yauri", "Zuru"]; break;
		case "Kogi": a = ["Select LGA", "Adavi", "Ajaokuta", "Ankpa", "Bassa", "Dekina", "Ibaji", "Idah", "Igalamela Odolu", "Ijumu", "Kabba Bunu", "Kogi", "Lokoja", "Mopa Muro", "Ofu", "Ogori Magongo", "Okehi", "Okene", "Olamaboro", "Omala", "Yagba East", "Yagba West"]; break;
		case "Kwara": a = ["Select LGA", "Asa", "Baruten", "Edu", "Ekiti", "Ifelodun", "Ilorin East", "Ilorin South", "Ilorin West", "Irepodun", "Isin", "Kaiama", "Moro", "Offa", "Oke Ero", "Oyun", "Pategi"]; break;
		case "Lagos": a = ["Select LGA", "Agege", "Ajeromi-Ifelodun", "Alimosho", "Amuwo-Odofin", "Apapa", "Badagry", "Epe", "Eti Osa", "Ibeju-Lekki", "Ifako-Ijaiye", "Ikeja", "Ikorodu", "Kosofe", "Lagos Island", "Lagos Mainland", "Mushin", "Ojo", "Oshodi-Isolo", "Shomolu", "Surulere"]; break;
		case "Nasarawa": a = ["Select LGA", "Akwanga", "Awe", "Doma", "Karu", "Keana", "Keffi", "Kokona", "Lafia", "Nasarawa", "Nasarawa Egon", "Obi", "Toto", "Wamba"]; break;
		case "Niger": a = ["Select LGA", "Agaie", "Agwara", "Bida", "Borgu", "Bosso", "Chanchaga", "Edati", "Gbako", "Gurara", "Katcha", "Kontagora", "Lapai", "Lavun", "Magama", "Mariga", "Mashegu", "Mokwa", "Moya", "Paikoro", "Rafi", "Rijau", "Shiroro", "Suleja", "Tafa", "Wushishi"]; break;
		case "Ogun": a = ["Select LGA", "Abeokuta North", "Abeokuta South", "Ado-Odo Ota", "Egbado North", "Egbado South", "Ewekoro", "Ifo", "Ijebu East", "Ijebu North", "Ijebu North East", "Ijebu Ode", "Ikenne", "Imeko Afon", "Ipokia", "Obafemi Owode", "Odeda", "Odogbolu", "Ogun Waterside", "Remo North", "Shagamu"]; break;
		case "Ondo": a = ["Select LGA", "Akoko North-East", "Akoko North-West", "Akoko South-West", "Akoko South-East", "Akure North", "Akure South", "Ese Odo", "Idanre", "Ifedore", "Ilaje", "Ile Oluji-Okeigbo", "Irele", "Odigbo", "Okitipupa", "Ondo East", "Ondo West", "Ose", "Owo"]; break;
		case "Osun": a = ["Select LGA", "Atakunmosa East", "Atakunmosa West", "Aiyedaade", "Aiyedire", "Boluwaduro", "Boripe", "Ede North", "Ede South", "Ife Central", "Ife East", "Ife North", "Ife South", "Egbedore", "Ejigbo", "Ifedayo", "Ifelodun", "Ila", "Ilesa East", "Ilesa West", "Irepodun", "Irewole", "Isokan", "Iwo", "Obokun", "Odo Otin", "Ola Oluwa", "Olorunda", "Oriade", "Orolu", "Osogbo"]; break;
		case "Oyo": a = ["Select LGA", "Afijio", "Akinyele", "Atiba", "Atisbo", "Egbeda", "Ibadan North", "Ibadan North-East", "Ibadan North-West", "Ibadan South-East", "Ibadan South-West", "Ibarapa Central", "Ibarapa East", "Ibarapa North", "Ido", "Irepo", "Iseyin", "Itesiwaju", "Iwajowa", "Kajola", "Lagelu", "Ogbomosho North", "Ogbomosho South", "Ogo Oluwa", "Olorunsogo", "Oluyole", "Ona Ara", "Orelope", "Ori Ire", "Oyo", "Oyo East", "Saki East", "Saki West", "Surulere"]; break;
		case "Plateau": a = ["Select LGA", "Bokkos", "Barkin Ladi", "Bassa", "Jos East", "Jos North", "Jos South", "Kanam", "Kanke", "Langtang South", "Langtang North", "Mangu", "Mikang", "Pankshin", "Qua an Pan", "Riyom", "Shendam", "Wase"]; break;
		case "Rivers": a = ["Select LGA", "Port Harcourt", "Obio-Akpor", "Okrika", "Ogu–Bolo", "Eleme", "Tai", "Gokana", "Khana", "Oyigbo", "Opobo–Nkoro", "Andoni", "Bonny", "Degema", "Asari-Toru", "Akuku-Toru", "Abua–Odual", "Ahoada West", "Ahoada East", "Ogba–Egbema–Ndoni", "Emohua", "Ikwerre", "Etche", "Omuma"]; break;
		case "Sokoto": a = ["Select LGA", "Binji", "Bodinga", "Dange Shuni", "Gada", "Goronyo", "Gudu", "Gwadabawa", "Illela", "Isa", "Kebbe", "Kware", "Rabah", "Sabon Birni", "Shagari", "Silame", "Sokoto North", "Sokoto South", "Tambuwal", "Tangaza", "Tureta", "Wamako", "Wurno", "Yabo"]; break;
		case "Taraba": a = ["Select LGA", "Ardo Kola", "Bali", "Donga", "Gashaka", "Gassol", "Ibi", "Jalingo", "Karim Lamido", "Kumi", "Lau", "Sardauna", "Takum", "Ussa", "Wukari", "Yorro", "Zing"]; break;
		case "Yobe": a = ["Select LGA", "Bade", "Bursari", "Damaturu", "Fika", "Fune", "Geidam", "Gujba", "Gulani", "Jakusko", "Karasuwa", "Machina", "Nangere", "Nguru", "Potiskum", "Tarmuwa", "Yunusari", "Yusufari"]; break;
		case "Zamfara": a = ["Select LGA", "Anka", "Bakura", "Birnin Magaji Kiyaw", "Bukkuyum", "Bungudu", "Gummi", "Gusau", "Kaura Namoda", "Maradun", "Maru", "Shinkafi", "Talata Mafara", "Chafe", "Zurmi"]; break;
		case "": a = ["Select LGA"]
	}for (var e = [], o = 0; o < a.length; o++)e.push("<option>" + a[o] + "</option>"); document.getElementById("lga").innerHTML = e.join("");

}
