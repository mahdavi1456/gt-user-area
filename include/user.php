<?php
function get_age($bdate){
	$date = parsidate('Y/m/d');
	$age = eng_number($date)-$bdate;
	return $age;
}

function save_avatar(){
	get_currentuserinfo();
	if($_FILES['avatar']['name']!=""){
		if(!function_exists('wp_handle_upload')){
			require_once(ABSPATH . 'wp-admin/includes/file.php');
		}
		$uploadedfile = $_FILES['avatar'];
		$upload_overrides = array('test_form' => false);
		$movefile = wp_handle_upload($uploadedfile, $upload_overrides);
		update_user_meta(get_current_user_id(), 'avatar', $movefile['url']);
	}
	echo("<meta http-equiv='refresh' content='1'>");
}

function get_user_avatar($uid){
	$av_url = get_user_meta($uid, 'avatar', true);
	if($av_url==""){
		$av_url = get_template_directory_uri()."/img/avatar.png";
	}
	$src = wp_get_attachment_url($av_url);
	if($src==""){
		$src = get_bloginfo('template_directory') . "/img/avatar.png";
	}
	?>
	<div class="avatar-img">
		<img src="<?php echo $src; ?>" id="output">
	</div>
<?php
}

function get_user_avatar_src($uid){
	$av_url = get_user_meta($uid, 'avatar', true);
	if($av_url==""){
		$av_url = get_template_directory_uri()."/img/avatar.png";
	}
	$src = wp_get_attachment_url($av_url);
	if($src==""){
		$src = get_bloginfo('template_directory') . "/img/avatar.png";
	}
	return $src;
}