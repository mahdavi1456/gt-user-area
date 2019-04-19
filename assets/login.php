<?php 
function login_f(){
	if(is_user_logged_in()){
		$url = get_bloginfo('home') . "/profile/";
		?>
		<script type="text/javascript">
			window.location.href = "<?php echo $url; ?>";
		</script>
	<?php
	}else{ ?>
		<div class="container">
			<div class="row center">
				<div class="col-md-4 hidden-sm hidden-xs"></div>
				<div class="col-md-4 col-sm-12 col-xs-12">
					<div class="col-md-12 pdtb0">
						<label>نام کاربری</label>
						<label class="red error" id="username-error"></label>
						<input type="text" id="username" class="form-control entersub" placeholder="نام کاربری شما...">
					</div>
					<div class="col-md-12 pdtb0">
						<label>رمز ورود</label>
						<label class="red error" id="password-error"></label>
						<input type="password" id="password" class="form-control entersub" placeholder="رمز ورود شما...">
					</div>
					<div class="col-md-12 pdtb0">
						<div class="g-recaptcha" data-sitekey="6Lc055gUAAAAADnFwVDvpzYs4eOpYCKNeHQHoB4v"></div>
					</div>
					<div class="col-md-12 pdtb0">
						<button class="btn btn-success" id="login">ورود به حساب کاربری</button>
						<br><br>
						رمز خود را فراموش کرده اید؟
						<a href="<?php bloginfo('home'); ?>/forget/" id="remember">بازیابی رمز عبور</a>
					</div>
					<div class="col-md-12 red center" id="result"></div>
				</div>
				<div class="col-md-4 hidden-sm hidden-xs"></div>
			</div>
		</div>
<?php
	}
}
add_shortcode('login', 'login_f');
?>