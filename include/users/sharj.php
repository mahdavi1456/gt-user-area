<div class="head"><h3>شارژ حساب کاربری</h3></div>
<div class="row">
	<div class="col-md-12">
		<div class="alert alert-success" role="alert">
			توجه: ۲۰٪ همین مبلغی که پرداخت می کنید به عنوان هدیه به اعتبار شما اضافه خواهد شد
			<br>
			توجه: قیمت را حتماً به تومان وارد نمائید
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="alert alert-info" role="alert">
					<?php
					$sharj = get_user_meta($current_user->ID, 'sharj', true);
					if($sharj!=""){ ?>
						<h4>اعتبار فعلی شما: <?php echo per_number(number_format($sharj))." تومان"; ?></h4>
					<?php
					}else{ ?>
						<h4><?php echo "بدون موجودی"; ?></h4>
					<?php
					}
					?>
					<hr>
					<div class="price-cell"><label><?php echo per_number("20.000 تومان"); ?></label><input name="price" type="radio" value="20000"></div>
					<div class="price-cell"><label><?php echo per_number("40.000 تومان"); ?></label><input name="price" type="radio" value="40000"></div>
					<div class="price-cell"><label><?php echo per_number("80.000 تومان"); ?></label><input name="price" type="radio" value="80000"></div>
					<div class="price-cell"><label><?php echo per_number("150.000 تومان"); ?></label><input name="price" type="radio" value="150000"></div>
					<div class="price-cell"><label>مبلغ دلخواه</label><input checked name="price" type="radio" value="مبلغ دلخواه"></div>
					<hr>
					<input id="price" type="text" class="mar0 form-control" placeholder="مبلغ را وارد کنید" onkeypress="return onlyNumbers();">			
				</div>
			</div>
			<div class="col-md-8">
				<table class="cart-table">	
					<tr>					
						<th colspan="2">پرداخت از <span id="pay-from">درگاه پرداخت زرین پال</span></th>
					</tr>
					<tr>
						<td colspan="2">
							<div class="pay-icon-box">
								<input checked value="زرین پال" name="bank" id="zarin-chk" type="radio"> <img id="zarin-icon" class="pay-icon" src="<?php bloginfo('template_directory'); ?>/img/icons/zarinpal.png">
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<label>کد معرف (اختیاری)</label>
							<input id="agent-id" type="text" placeholder="کد معرف" class="form-control">
						</td>
						<td>
							<div class="well center">
								<span style="font-size: 18px;">+ <span id="gift">0</span> تومان شارژ هدیه</span>
								<button id="quick-sharj" class="btn btn-success btn-lg">
									<i class="fa fa-credit-card" aria-hidden="true"></i> پرداخت
								</button>
							</div>
						</td>
					</tr>
				</table><br>
			</div>
			<div class="col-md-12">
				<span id="quick-sharj-result"></span>
			</div>
		</div>
	</div>
</div>