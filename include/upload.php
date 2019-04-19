<?php
function upload_file($name, $id, $uid, $meta){
	//$allowed = array('png', 'jpg', 'gif','zip');
	if(isset($_FILES[$name]) && $_FILES[$name]['error'] == 0){
		
		if ($_FILES[$name]["size"] < 500000) {

			if ( ! function_exists( 'wp_handle_upload' ) ) {
				require_once( ABSPATH . 'wp-admin/includes/file.php' );
			}
			$filename = $_FILES[$name]['name'];
			$ext = end(explode(".", $filename));
			$filename = rand().".".$ext;
			$_FILES[$name]['name'] = $filename;
								
			$uploadedfile = $_FILES[$name];
			$upload_overrides = array('test_form' => false);
			$movefile = wp_handle_upload( $uploadedfile, $upload_overrides );
			$wp_upload_dir = wp_upload_dir();
			$parent_post_id = $id;
			$filetype = wp_check_filetype( basename( $filename ), null );	
			$attachment = array(
				'guid'           => $wp_upload_dir['url'] . '/' . basename($filename), 
				'post_mime_type' => $filetype['type'],
				'post_title'     => preg_replace( '/\.[^.]+$/', '', basename($filename) ),
				'post_content'   => '',
				'post_status'    => 'inherit',
				'post_author'    => $uid
			);
			$my_file = $wp_upload_dir['url'] . '/' . basename($filename);
			$my_file1 = $wp_upload_dir['url'] . '/' . $filename;
			$list2 = explode("/", $my_file1);
			$mf2 = $list2[3]."/".$list2[4]."/".$list2[5]."/".$list2[6]."/".$list2[7];
			
			require_once(ABSPATH . 'wp-admin/includes/image.php');
			$attach_id = wp_insert_attachment($attachment, $my_file, $parent_post_id);
			$attach_data = wp_generate_attachment_metadata($attach_id, $mf2);
			wp_update_attachment_metadata($attach_id, $attach_data);
			set_post_thumbnail($parent_post_id, $attach_id);
			$last_img = get_user_meta($uid, $meta, true);
			if($last_img!=""){
				$delurl = wp_get_attachment_url($last_img);
				
				$list = explode("/", $delurl);
				$for_del = $list[3]."/".$list[4]."/".$list[5]."/".$list[6]."/".$list[7];
				unlink(trim($for_del));
				wp_delete_attachment($last_img, true);
				update_user_meta($uid, $meta, $attach_id);
			}else{
				update_user_meta($uid, $meta, $attach_id);
			}
		}else{
			return "size error";
		}
		
	}
}