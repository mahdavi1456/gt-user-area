<div class="head"><h3>گزارشات مالی</h3></div>
<div class="row">
	<div class="col-md-12">
		<div class="row">
			<table class="cart-table">
				<tr>
					<th>#</th>
					<th>تاریخ</th>
					<th>مبلغ</th>
					<th>نوع پرداخت</th>
					<th>وضعیت</th>
					<th>رسید دیجیتال</th>
				</tr>
				<?php
				global $wpdb;
				$uid = get_current_user_id();
				$sql = "select * from payments where p_uid = $uid order by p_id desc";
				$res = $wpdb->get_results($sql);
				$i = 1;
				if(count($res)>0){
					foreach($res as $row){
						?>
						<tr>
							<td><?php echo per_number($i); ?></td>
							<td><?php echo $row->p_date; ?></td>
							<td><?php echo per_number(number_format($row->p_price)) . " تومان"; ?></td>
							<td>
								<?php
								if($row->p_type=="cv"){
									echo "<span class='badge badge-info'>ثبت رزومه</span>";
								}else if($row->p_type=="sharj"){
									echo "<span class='badge badge-primary'>شارژ حساب</span>";
								}else if($row->p_type=="hire"){
									echo "<span class='badge badge-secondary'>خرید آگهی</span>";
								}
								?>
							</td>
							<td>
								<?php
								$st = $row->p_status;
								if($st=="OK"){
									echo "<span class='badge badge-success'>پرداخت موفق</span>";
								}else if($st=="NOK"){
									echo "<span class='badge badge-danger'>پرداخت ناموفق</span>";
								}else if($st=="sharj"){
									echo "<span class='badge badge-info'>پرداخت از اعتبار</span>";
								}else{
									echo "<span class='badge badge-warning'>انصراف از پرداخت</span>";
								}
								?>
							</td>
							<td><?php echo $row->p_res; ?></td>
						</tr>
						<?php
						$i++;
					}
				}else{
				?>
				<tr>
					<td colspan="6">هیچ پرداختی تاکنون ثبت نشده است</td>
				</tr>
				<?php
				} ?>
			</table>
		</div>
	</div>
</div>