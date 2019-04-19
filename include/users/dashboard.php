<div class="row pdtb0">
	<input type="hidden" id="id" value="<?php echo $current_user->ID; ?>">
	<div class="col-md-6">
		<?php
		$uid = get_current_user_id();
		$pay_cv = get_user_meta($uid, 'pay_sv', true);
		if($pay_sv==""){ ?>
		<div class="alert alert-warning">وضعیت روزمه: معلق<hr>
			<p>جهت قرارگیری رزومه شما در لیست پیشنهاد کار، باید ابتدا هزینه ثبت را پرداخت کنید</p><br>
			<a href="<?php bloginfo('home'); ?>/pay_cv/" class="btn btn-success">پرداخت آنلاین</a>
		</div>
		<?php
		} else{ ?>
		<div class="alert alert-success">وضعیت روزمه: تاییده شده</div>
		<?php } ?>
	</div>
</div>