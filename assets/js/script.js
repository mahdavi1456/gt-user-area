jQuery(document).ready(function(){

	jQuery('#edit-user').click(function(){
		jQuery("#edit-user-result").html("<i class='fa fa fa-spinner fa-spin' style='font-size:20px; padding: 5px 0;'></i>");
		var id = jQuery('#id').val();
		var name = jQuery('#name').val();
		var family = jQuery('#family').val();
		var email = jQuery('#email').val();
		var mobile = jQuery('#mobile').val();
		var madrak = jQuery('#madrak').find('option:selected').html();
		var city = jQuery('#Ostan').find('option:selected').html();
		var town = jQuery('#Shahrestan').find('option:selected').html();
		jQuery.post("", {edit_profile:1, id:id, name:name, family:family,
			email:email, mobile:mobile, madrak:madrak, city:city, town:town
			},function(data){
				jQuery("#edit-user-result").html(data);
				location.reload();
			}
		);
	});
	
	jQuery('#change-password').click(function(){
		var old = jQuery('#old-password').val();
		var pass = jQuery('#password').val();
		var cpass = jQuery('#cpassword').val();
		if(pass==cpass){
			jQuery('#change-password-result').html("<i class='fa fa fa-spinner fa-spin' style='font-size:20px; padding: 5px 0;'></i>");
			jQuery.post("", {gt_change_pass:1, old:old, pass:pass}, function(data){
				if(data=="ok"){
					jQuery('#change-password-result').html("<span style='color: green'>رمز ورود شما با موفقیت تغییر کرد. لطفا مجددا با رمز جدید وارد حساب کاربری خود شوید</span>");
					setTimeout(function(){ location.reload(); }, 3000);
				}else{
					jQuery('#change-password-result').html(data);
				}
			});
		}else{
			jQuery('#change-password-result').html("<span style='color: red'>تکرار رمز مطابقت ندارد</span>");
		}
	});
	
	
	jQuery('#login').click(function(){
		jQuery('#result').html("");
		check_empty('username');
		check_empty('password');
		var user = jQuery('#username').val();
		var pass = jQuery('#password').val();
		var response = grecaptcha.getResponse();
		if(response!=""){
			jQuery('#result').html("<i class='fa fa fa-spinner fa-spin' style='font-size:20px; padding: 5px 0;'></i>");
			jQuery.post("",{gt_login:1, user:user, pass:pass},function(data){
				if(data=="ok"){
					jQuery('#result').html("<span style='color:green'>اطلاعات ورود شما تاييد شد</span>");
					setTimeout(function(){
						location.reload();
					}, 1000);
				}else{
					jQuery('#result').html(data);
				}
			});
		}else{
			jQuery('#result').html("<span style='color: red'>کد امنیتی را تایید کنید</span>");
		}
	});
	
	
    jQuery('#register').click(function(){
		jQuery('#register-result').html("");
		check_empty('username');
		check_empty('password');
		check_empty('cpassword');
		var user = jQuery('#username').val();
		var pass = jQuery('#password').val();
		var cpass = jQuery('#cpassword').val();
		if(pass==cpass){
			var response = grecaptcha.getResponse();
			if(response!=""){
				jQuery('#register-result').html("<i class='fa fa fa-spinner fa-spin' style='font-size:20px; padding: 15px;'></i>");
				var info = jQuery('#register-box *').serialize();
				jQuery.post("", {gt_register:1, info:info}, function(data){
					if(data=="ok"){
						jQuery('#register-result').html("در حال ورود به سایت...");
						jQuery.post("", {gt_login:1, user:user, pass:pass}, function(data2){
							if(data2=="ok")
								location.href = 'http://karekhub.ir/profile/';
						});
					}else{
						jQuery('#register-result').html(data);
					}
				});
			}else{
				jQuery('#register-result').html("<span style='color: red'>کد امنیتی را تایید کنید</span>");
			}
		}else{
			jQuery('#register-result').html("تکرار رمز وارد شده مطابقت ندارد");
		}
	});
	
	jQuery('#forget-pass').click(function(){
		check_empty('email');
		check_email('email');
		var email = jQuery('#email').val();
		jQuery('#result').html("<i class='fa fa fa-spinner fa-spin' style='font-size:20px; padding: 15px;'></i>");
		jQuery.post("", {gt_forget_pass:email}, function(data){
			jQuery('#result').html(data);
		});
	});

	
	jQuery('#select-avatar-image').click(function(){
        jQuery('input[name=avatar]').click();
    });
	
	jQuery('#select-avatar-image').click(function(){
		jQuery('input[name="profile-file"]').click();
	});
	
	jQuery('.other-owner').hide();
		
});