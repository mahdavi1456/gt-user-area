<ul class="profile-tabs">
	<li class="<?php if($_GET['tab']=="edit-profile")echo "active"; ?>">
        <a href="<?php get_permalink(); ?>?tab=edit-profile">
            <i class="fa fa-user"></i>&nbspویرایش پروفایل
        </a>
    </li>
	<li class="<?php if($_GET['tab']=="cv")echo "active"; ?>">
        <a href="<?php bloginfo('home'); ?>/edu/">
            <i class="fa fa-book"></i>&nbspتکمیل روزمه
        </a>
    </li>
	<li class="<?php if($_GET['tab']=="cv")echo "active"; ?>">
        <a href="<?php get_permalink(); ?>?tab=cv">
            <i class="fa fa-book"></i>&nbspمشاهده روزمه
        </a>
    </li>
	<li class="<?php if($_GET['tab']=="jobs-cv")echo "active"; ?>">
        <a href="<?php get_permalink(); ?>?tab=jobs-cv">
            <i class="fa fa-book"></i>&nbspمعرفی کار
        </a>
    </li>
	<li class="<?php if($_GET['tab']=="sharj")echo "active"; ?>">
        <a href="<?php get_permalink(); ?>?tab=sharj">
            <i class="fa fa-book"></i>&nbspشارژ حساب
        </a>
    </li>
	<li class="<?php if($_GET['tab']=="report")echo "active"; ?>">
        <a href="<?php get_permalink(); ?>?tab=report">
            <i class="fa fa-book"></i>&nbspگزارشات مالی
        </a>
    </li>
	<li>
		<a href="<?php echo wp_logout_url(home_url()); ?>">
			<i class="fa fa-power-off"></i>&nbspخروج از حساب کاربری
		</a>
	</li>
</ul>