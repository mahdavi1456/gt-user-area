<?php
if(isset($_POST['gt_register'])){
	parse_str($_POST['info'], $list);
	$username = eng_number($list['username']);
	$email = eng_number($list['email']);
	$pass = eng_number($list['password']);

	if(username_exists($username)){
		echo "<span style='color:red'>این نام کاربری در سیستم ثبت شده است</span>";
		exit();
	}

	$id = wp_create_user($username, $pass, $email);
	update_user_meta($id, 'user_type', $list['user_type']);
	update_user_meta($id, 'ref', $list['ref']);
	update_user_meta($id, 'level', "starter");
	echo "ok";
	exit();	
}

if(isset($_POST['gt_login'])){
	$user = $_POST['user'];
	if(!username_exists($user)){
		echo "<span style='color:red'>نام کاربری وارد شده صحیح نمی باشد</span>";
		exit();
	}
	$pass = $_POST['pass'];
	$creds = array();
	$creds['user_login'] = $user;
	$creds['user_password'] = $pass;
	$creds['remember'] = true;
	$user = wp_signon($creds, false);
	if (is_wp_error($user)){
		echo $user->get_error_message();
		exit();
	}else{
		echo "ok";
		exit();
	}
}

if(isset($_POST['edit_profile'])){
	$id = $_POST['id'];
	$name = $_POST['name'];
	$family = $_POST['family'];
	$user = $_POST['user'];
	$email = $_POST['email'];
	$mobile = $_POST['mobile'];
	$madrak = $_POST['madrak'];	
	$city = $_POST['city'];
	$town = $_POST['town'];
	
	update_user_meta($id, 'first_name', sanitize_text_field($name));
	update_user_meta($id, 'last_name', sanitize_text_field($family));
	update_user_meta($id, 'user_login', sanitize_text_field($user));
	update_user_meta($id, 'mobile', sanitize_text_field($mobile));
	update_user_meta($id, 'madrak', sanitize_text_field($madrak));
	update_user_meta($id, 'city', sanitize_text_field($city));
	update_user_meta($id, 'town', sanitize_text_field($town));
	$wpdb->update( 'wp_users', array('user_email' => $email), array('ID' => $id), array('%s'), array('%d') );
	
	echo "<span style='color:green'>پروفایل شما با موفقیت بروزرسانی شد</span>";
	exit();
}

if(isset($_POST['gt_change_pass'])){
	$id = get_current_user_id();
	$old_pass = $_POST['old'];
	$pass = $_POST['pass'];
	$user = get_user_by('id', $id);
	if($user && wp_check_password($old_pass, $user->data->user_pass, $user->ID)){
		$email = $user->user_email;
		$username = $user->user_login;
		wp_set_password($pass, $id);
		echo "ok";
	}
	else{
		echo "<span style='color:red'>رمز عبور قبلی اشتباه است</span>";
	}
	exit();
}

function set_html_content_type() {
	return 'text/html';
}
add_filter('wp_mail_content_type', 'set_html_content_type');

function wpb_sender_name($original_email_from) {
	$name = get_bloginfo('name'); return $name;
}
add_filter('wp_mail_from_name', 'wpb_sender_name');
		
if(isset($_POST['gt_forget_pass'])){
	$email = $_POST['gt_forget_pass'];
	$user = get_user_by('email', $email);
	$username = $user->user_login;
	$id = $user->ID;
	if(validate_username($username)){
		$pass = substr(md5(rand(1, 100)), 1, 10);
		wp_set_password($pass, $id);
	
		$subject = "بازیابی رمز عبور برای ایمیل: " . $email;
	
		$message .= "نام کاربری شما: " . $username . " <br>";
		$message .= "رمز جدید شما: " . $pass . "<br>";
		$message .= "<a href='http://karekhub.ir/login/'>لطفا پس از ورود به پروفایل رمز خود را تغییر دهید.</a>";
		
		$body = '<html><head><meta http-equiv="content-type" content="text/html; charset=UTF-8"></head><body><div style="direction: rtl; background: #f9f9f9"><div style="background: #ed1e24; color: #fff;"><h1 style="font-size: 20px; margin: 0; padding: 0; text-align: center; padding: 10px 0;">' . get_bloginfo('name') . '</h1></div>'; 
		$body .= '<div style="background: #414141; color: #fff; text-align: center; font-size: 18px; padding: 5px;">' . $subject . '</div>';
		$body .= '<div style="width: 500px; height: auto; background: #fff; border-right: 1px solid #9baaaa; border-left: 1px solid #9baaaa; margin: auto; padding: 10px; text-align: right; font-family: tahoma; line-height: 2;">' . $message . '</div>';
		$body .= '<div style="background: #ed1e24; padding: 40px 0; text-align: center; font-weight: bold">';
		$body .= '<ul style="margin: 0; padding: 0;">';
		$body .= '<li style="display: inline-block"><a target="_blank" style="color: #fff; font-size: 16px; margin: 10px" href="' . get_bloginfo('home') . '">صفحه اصلی</a></li>';
		$body .= '<li style="display: inline-block"><a target="_blank" style="color: #fff; font-size: 16px; margin: 10px" href="' . get_bloginfo('home') . '/about/">درباره ما</a></li>';
		$body .= '<li style="display: inline-block"><a target="_blank" style="color: #fff; font-size: 16px; margin: 10px" href="' . get_bloginfo('home') . '/contact/">تماس با ما</a></li>';
		$body .= '</ul>';
		$body .= '</div>';
		$body .= '</div></body></html>';
		
		wp_mail($email, $subject, $body);
	
		echo "<span style='color:green'>رمز جدید به ایمیل شما ارسال شد. با سپاس</span>";
	}else{
		echo "<span style='color:red'>این ایمیل در سیستم ثبت نشده است</span>";
	}
	exit();
}
?>