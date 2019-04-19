<div class="box tab-box" id="info_tab">
	<?php
	$user = wp_get_current_user();
	$uid = $user->ID;
	?>
	<div class="cv_form">
		<h4 class="table-head"><span class="glyphicon glyphicon-user pl"></span> اطلاعات پایه
			<a href="<?php bloginfo('home'); ?>/profile/?tab=edit-profile"><i class="edit-btn fa fa-edit"></i></a>
		</h4>
		<table class="table">
			<tr>
				<th>نام</th>
				<th>نام خانوادگی</th>
				<th>موبایل</th>
				<th>ایمیل</th>
				<th>استان</th>
				<th>شهر</th>
			</tr>
			<tr>
				<td><?php echo $user->first_name; ?></td>	
				<td><?php echo $user->last_name; ?></td>
				<td><?php echo $user->mobile; ?></td>
				<td><?php echo $user->user_email; ?></td>
				<td><?php echo $user->city; ?></td>
				<td><?php echo $user->town; ?></td>
			</tr>
		</table>

		<h4 class="table-head"><span class="glyphicon glyphicon-education pl"></span> سوابق تحصیلی
			<a href="<?php bloginfo('home'); ?>/edu/"><i class="edit-btn fa fa-edit"></i></a>
		</h4>
		<table class="table">
			<tr>
				<th>مدرک</th>
				<th>رشته</th>
				<th>گرایش</th>
				<th>مرکز اخذ</th>
				<th>تاریخ فارغ التحصیلی</th>
				<th>معدل</th>
				<th>استان</th>
				<th>شهر</th>
			</tr>
			<?php
			global $wpdb;
			$i = 1;
			$edu_sql = "select * from education where uid = $uid";
			$edu_list = $wpdb->get_results($edu_sql);
			if($edu_list){
			foreach($edu_list as $d){ ?>
			<tr>
				<td><?php echo $d->madrak; ?></td>
				<td><?php echo $d->field; ?></td>
				<td><?php echo $d->trend; ?></td>
				<td><?php echo $d->center_name; ?></td>
				<td><?php echo $d->city; ?></td>
				<td><?php echo $d->town; ?></td>
				<td><?php echo per_number($d->grade); ?></td>
				<td><?php echo per_number($d->end_date); ?></td>
			</tr>
			<?php
				$i++;
			} } else{ ?>
			<td colspan="8" class="center">تاکنون تکمیل نشده</td>
			<?php } ?>
		</table>


		<h4 class="table-head"><span class="glyphicon glyphicon-sunglasses pl"></span> سوابق شغلی
			<a href="<?php bloginfo('home'); ?>/exper/"><i class="edit-btn fa fa-edit"></i></a>
		</h4>
		<table class="table">
			<tr>
				<th>شغل</th>
				<th>نام مرکز</th>
				<th>تاریخ ورود</th>
				<th>تاریخ خروج</th>
				<th>دلیل خروج</th>
				<th>استان</th>
				<th>شهرستان</th>
				<th>نوع همکاری</th>
				<th>وضعیت همکاری</th>
				<th>سابقه کار</th>
				<th>ضمانت نامه</th>
				<th>سابقه بیمه</th>
			</tr>
			<?php
				global $wpdb;
				$i = 1;
				$sql = "select * from exper where uid = $uid";
				$result = $wpdb->get_results($sql);
				if($result){
				foreach($result as $row){
					if($row->uid!=0){
					?>
				<tr>
					<td><?php echo per_number($row->co_job); ?></td>
					<td><?php echo per_number($row->co_name); ?></td>
					<td><?php echo per_number($row->indate); ?></td>
					<td><?php echo per_number($row->outdate); ?></td>
					<td><?php echo per_number($row->endreason); ?></td>
					<td><?php echo $row->city; ?></td>
					<td><?php echo $row->town; ?></td>
					<td><?php echo $row->worktype; ?></td>
					<td><?php echo $row->workstatus; ?></td>
					<td><?php echo $row->can_history; ?></td>
					<td><?php echo $row->can_testimontial; ?></td>
					<td><?php echo $row->has_ins; ?></td>
				</tr>
				<?php
					$i++;
					}
				} } else{ ?>
				<tr>
					<td class="center" colspan="12">بدون سابقه</td>
				</tr>
				<?php
				}
			?>
		</table>

		<h4 class="table-head"><span class="glyphicon glyphicon-wrench pl"></span> مهارت ها
			<a href="<?php bloginfo('home'); ?>/skill/"><i class="edit-btn fa fa-edit"></i></a>
		</h4>
		<table class="table">
			<tr>
				<th>دسته مهارت</th>
				<th>عنوان مهارت</th>
				<th>سطح تخصص</th>
				<th>توضیحات</th>
			</tr>
			<?php
				global $wpdb;
				$i = 1;
				$sql = "select * from skill where uid = $uid";
				$result = $wpdb->get_results($sql);
				if($result){
				foreach($result as $row){
					if($row->uid!=0){
					?>
				<tr>
					<td><?php echo per_number($row->cat); ?></td>
					<td><?php echo per_number($row->title); ?></td>
					<td><?php echo per_number($row->level); ?></td>
					<td><?php echo per_number($row->details); ?></td>
				</tr>
			<?php $i++;
					}
				} } else{ ?>
				<tr>
					<td class="center" colspan="4">هیچ مهارتی ثبت نشده است</td>
				</tr>
				<?php
				}
			?>
		</table>
				
		<h4 class="table-head"><span class="glyphicon glyphicon-check pl"></span> مشاغل مورد تقاضا
			<a href="<?php bloginfo('home'); ?>/job/"><i class="edit-btn fa fa-edit"></i></a>
		</h4>
		<table class="table">
			<tr>
				<th>عنوان شغل</th>
				<th>استان</th>
				<th>شهر</th>
			</tr>
			<?php
			global $wpdb;
			$i = 1;
			$job_sql = "select * from job where uid = $uid";
			$job_list = $wpdb->get_results($job_sql);
			if($job_list){
			foreach($job_list as $j){ ?>
			<tr>
				<td><?php
					$t = get_term($j->job, 'hire_tax');
					echo $t->name;
				?></td>
				<td><?php echo $j->city; ?></td>
				<td><?php echo $j->town; ?></td>
			</tr>
			<?php
			} }else{ ?>
			<tr>
				<td colspan="3" class="center">تاکنون تکمیل نشده</td>
			</tr>
			<?php } ?>
		</table>
		
	</div>
</div>