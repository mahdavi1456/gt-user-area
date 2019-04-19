<div class="head"><h3>معرفی کار</h3></div>
<div class="row pdtb0">
	
	<div class="row pdtb0">
		<input type="hidden" id="id" value="<?php echo $current_user->ID; ?>">
		<div class="col-md-12">
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
				<?php
				global $wpdb;
				$uid = get_current_user_id();
				$sql = "select * from job where uid = $uid";
				$res = $wpdb->get_results($sql);
				if($res){
					foreach($res as $row){
						$term = get_term_by('term_id', $row->job, 'hire_tax');
						$tid = $term->term_id;
						$args = array(
							'post_type' => 'hire',
							'tax_query' => array(
								array(
									'taxonomy' => 'hire_tax',
									'field'    => 'term_id',
									'terms'    => $tid,
								)
							)
						);
						$query = new WP_Query($args);
						if($query->have_posts()): while($query->have_posts()): $query->the_post(); ?>
							<p><?php echo the_title(); ?></p>
						<?php
						endwhile; endif; wp_reset_postdata();
					}
				}
			} ?>
		</div>
	</div>
</div>