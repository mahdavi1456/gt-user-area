<?php 
function register_f(){
	if(is_user_logged_in()){
		$url = get_bloginfo('home') . "/profile/";
		?>
		<script type="text/javascript">
			window.location.href = "<?php echo $url; ?>";
		</script>
	<?php
	}else{ ?>
		<div class="container" id="register-box">
			<div class="row center">
				<div class="col-md-4 hidden-sm hidden-xs"></div>
				<div class="col-md-4 col-sm-12 col-xs-12">
					<div class="col-md-12 pdtb0">
						<label>نام کاربری <span class="req">*</label> جهت ورود به سایت
						<label class="red error" id="username-error"></label>
						<input name="username" id="username" type="text" class="form-control">
					</div>
					<div class="col-md-12 pdtb0">
						<label>ایمیل (اختیاری)</label>
						<label class="red error" id="email-error"></label>
						<input name="email" id="email" type="email" class="form-control">
					</div>
					<div class="col-md-12 pdtb0">
						<label>رمز ورود <span class="req">*</span></label> حداقل 8 رقم
						<label class="red error" id="password-error"></label>
						<input name="password" id="password" type="password" onkeypress="return isNumberKey(event);" class="form-control">
					</div>
					<div class="col-md-12 pdtb0">
						<label>تکرار رمز <span class="req">*</span></label>
						<label class="red error" id="cpassword-error"></label>
						<input name="password" id="cpassword" type="password" onkeypress="return isNumberKey(event);" class="form-control">
					</div>
					<div class="col-md-12 pdtb0">
						<label>نحوه آشنایی با سایت</label>
						<select name="ref" class="form-control">
							<option>هیچ کدام</option>
							<option>موتورهای جستجو</option>
							<option>تبلیغات در سایت ها</option>
							<option>دوستان و آشنایان</option>
							<option>روزنامه ها، جراید و مجلات</option>
							<option>تلگرام</option>
							<option>اینستاگرام</option>
						</select>
					</div>
					<div class="col-md-12 pdtb0">
						<div class="g-recaptcha" data-sitekey="6Lc055gUAAAAADnFwVDvpzYs4eOpYCKNeHQHoB4v"></div>
					</div>
					<div class="col-md-12 pdtb0">
						<button id="register" class="btn btn-info">ثبت نام</button>
					</div>
					<div id="register-result" class="col-md-12 pdtb0 red result"></div>
				</div>
				<div class="col-md-4 hidden-sm hidden-xs"></div>
			</div>
		</div>
<?php
	}
}
add_shortcode('register', 'register_f');
?>