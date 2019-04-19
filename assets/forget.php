<?php
function forget_f(){ ?>
	<div class="container">
		<div class="row center">
			<div class="col-md-4 hidden-sm hidden-xs"></div>
			<div class="col-md-4 col-sm-12 col-xs-12">
				<div class="col-md-12 pdtb0">
					<label>ایمیل</label>
					<label class="red error" id="email-error"></label>
					<input class="form-control" type="text" id="email" placeholder="ایمیل خود را وارد کنید...">
				</div>
				<div class="col-md-12 pdtb0">
					<button class="btn btn-warning" id="forget-pass">درخواست رمز جدید</button>
				</div>
				<div class="col-md-12">
					<div id="result" class="result"></div>
				</div>
			</div>
			<div class="col-md-4 hidden-sm hidden-xs"></div>
		</div>
	</div>	
<?php
}
add_shortcode('forget', 'forget_f');