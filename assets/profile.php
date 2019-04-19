<?php
function profile_f(){
	if(is_user_logged_in()){ ?>
	<div class="container">
		<div class="row"> 
			<div class="col-md-3">
				<div class="avatar-wrap">
					<?php
					global $current_user;
					get_currentuserinfo(); ?>
					<script>
						var loadFile = function(event) {
							var output = document.getElementById('output');
							output.src = URL.createObjectURL(event.target.files[0]);
						};
					</script>
					<div class="av_img">
						<div id="avatar-img">
						<?php
						get_user_avatar($current_user->ID); ?>
							<div class="overly" id="select-avatar-image">
								<h5>تغییر تصویر...</h5>
							</div>
							<form action="" method="post" enctype="multipart/form-data" name="upload_avatar" id="upload-avatar-form">
								<input name="profile-file" type="file" accept="image/*" onchange="loadFile(event)">
								<button name="upload-profile" class="btn btn-success">
									<i class="fa fa-upload"></i> ذخیره تصویر
								</button>
							</form>
							<?php
							if(isset($_POST['upload-profile'])){	
								$st = upload_file("profile-file", 1, $current_user->ID, "avatar");
								if($st=="size error"){ ?>
									<script type="text/javascript">
										alert("حجم تصویر شما باید زیر 500 کیلوبایت باشد");
									</script>
									<?php
								}else if($st=="ext error"){ ?>
									<script type="text/javascript">
										alert("فایل ارسالی توسط شما باید تصویر باشد");
									</script>
								<?php
								}else{
									echo("<meta http-equiv='refresh' content='1'>");
								}
							}
							?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-9">
				<?php include"menu.php"; ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="tab-content">
				<?php
				if(isset($_GET['tab'])){
					$filename = $_GET['tab'];
					include GT_USER_DIR . "include/users/$filename.php";	
				}else{
					include GT_USER_DIR . "include/users/dashboard.php";
				}
				?>
				</div>
			</div>
		</div>
	</div>
<?php
	}else{ ?>
		<script type="text/javascript">
			window.location.href = "/";
		</script>
	<?php
	}
}
add_shortcode('profile', 'profile_f');
?>