<div class="head"><h3>ویرایش پروفایل</h3></div>
	<div class="edit-user-box">
		<div class="row pdtb0">
			<input type="hidden" id="id" value="<?php echo $current_user->ID; ?>">
			<div class="col-md-4">
				<label>نام کاربری</label>
				<input placeholder="نام کاربری" class="form-control" id="user" value="<?php echo $current_user->user_login; ?>">
			</div>
			<div class="col-md-4">
				<label>نام</label>
				<input placeholder="نام" class="form-control" id="name" value="<?php echo $current_user->first_name; ?>">
			</div>
			<div class="col-md-4">
				<label>نام خانوادگی</label>
				<input placeholder="نام خانوادگی" class="form-control" id="family" value="<?php echo $current_user->last_name; ?>">
			</div>
		</div>
		<div class="row pdtb0">
			<div class="col-md-4">
				<label>ایمیل</label>
				<input placeholder="ایمیل" class="form-control" id="email" value="<?php echo $current_user->user_email; ?>">
			</div>
			<div class="col-md-4">
				<label>موبایل</label>
				<input placeholder="موبایل" class="form-control" id="mobile" value="<?php echo $current_user->mobile; ?>">
			</div>
			<div class="col-md-4">
				<label>مدرک تحصیلی</label>
				<select class="form-control" id="madrak">	
					<?php $madrak = $current_user->madrak; ?>
					<option>مدرک تحصیلی</option>
					<option <?php if($madrak=="دیپلم")echo "selected"; ?>>دیپلم</option>
					<option <?php if($madrak=="فوق دیپلم")echo "selected"; ?>>فوق دیپلم</option>
					<option <?php if($madrak=="لیسانس")echo "selected"; ?>>لیسانس</option>
					<option <?php if($madrak=="فوق لیسانس")echo "selected"; ?>>فوق لیسانس</option>
					<option <?php if($madrak=="دکتری")echo "selected"; ?>>دکتری</option>
				</select>
			</div>
		</div>
		<div class="row pdtb0">
			<div class="col-md-4">
				<label>استان</label>
				<select id="Ostan" runat="server" onchange="Func(this.value)" class="form-control">
					<option value=""><?php echo $current_user->city; ?></option>
					<option value="  ,آذرشهر ,اسکو ,اهر ,بستان‌آباد ,بناب ,تبریز ,جلفا ,چاراویماق ,سراب ,شبستر ,عجب‌شیر ,کلیبر ,مراغه ,مرند ,ملکان ,میانه ,ورزقان ,هریس ,هشترود">آذربایجان شرقی</option>
					<option value="  ,ارومیه ,اشنویه ,بوکان ,پیرانشهر ,تکاب ,چالدران ,خوی ,سردشت ,سلماس ,شاهین‌دژ ,ماکو ,مهاباد ,میاندوآب ,نقده">آذربایجان غربی</option>
					<option value="  ,اردبیل ,بیله‌سوار ,پارس‌آباد ,خلخال ,کوثر ,گِرمی ,مِشگین‌شهر ,نَمین ,نیر">اردبیل</option>
					<option value="  ,آران و بیدگل ,اردستان ,اصفهان ,برخوار و میمه ,تیران و کرون ,چادگان ,خمینی‌شهر ,خوانسار ,سمیرم ,شهرضا ,سمیرم سفلی ,فریدن ,فریدون‌شهر ,فلاورجان ,کاشان ,گلپایگان ,لنجان ,مبارکه ,نائین ,نجف‌آباد ,نطنز">اصفهان</option>
					<option value="  ,آبدانان ,ایلام ,ایوان ,دره‌شهر ,دهلران ,شیروان و چرداول ,مهران">ایلام</option>
					<option value="  ,بوشهر ,تنگستان ,جم ,دشتستان ,دشتی,دیر ,دیلم ,کنگان ,گناوه">بوشهر</option>
					<option value="  ,اسلام‌شهر ,پاکدشت ,تهران ,دماوند ,رباط‌کریم ,ری ,ساوجبلاغ ,شمیرانات ,شهریار ,فیروزکوه ,کرج ,نظرآباد ,ورامین">تهران</option>
					<option value="  ,اردل ,بروجن ,شهرکرد ,فارسان ,کوهرنگ ,لردگان">چهارمحال و بختیاری</option>
					<option value="  ,بیرجند ,درمیان ,سرایان ,سربیشه ,فردوس ,قائنات,نهبندان">خراسان جنوبی</option>

					<option value="  ,بردسکن ,تایباد ,تربت جام ,تربت حیدریه ,چناران ,خلیل‌آباد ,خواف ,درگز ,رشتخوار ,سبزوار ,سرخس ,فریمان ,قوچان ,کاشمر ,کلات ,گناباد ,مشهد ,مه ولات ,نیشابور">خراسان رضوی</option>
					<option value="  ,اسفراین ,بجنورد ,جاجرم ,شیروان ,فاروج ,مانه و سملقان">خراسان شمالی</option>
					<option value="  ,آبادان ,امیدیه ,اندیمشک ,اهواز ,ایذه ,باغ‌ملک ,بندر ماهشهر ,بهبهان ,خرمشهر ,دزفول ,دشت آزادگان ,رامشیر ,رامهرمز ,شادگان ,شوش ,شوشتر ,گتوند ,لالی ,مسجد سلیمان,هندیجان ">خوزستان</option>
					<option value="  ,ابهر ,ایجرود ,خدابنده ,خرمدره ,زنجان ,طارم ,ماه‌نشان">زنجان</option>
					<option value="  ,دامغان ,سمنان ,شاهرود ,گرمسار ,مهدی‌شهر">سمنان</option>
					<option value="  ,ایرانشهر ,چابهار ,خاش ,دلگان ,زابل ,زاهدان ,زهک ,سراوان ,سرباز ,کنارک ,نیک‌شهر">سیستان و بلوچستان</option>
					
					<option value="  ,آباده ,ارسنجان ,استهبان ,اقلید ,بوانات ,پاسارگاد ,جهرم ,خرم‌بید ,خنج ,داراب ,زرین‌دشت ,سپیدان ,شیراز ,فراشبند ,فسا ,فیروزآباد ,قیر و کارزین ,کازرون ,لارستان ,لامِرد ,مرودشت ,ممسنی ,مهر ,نی‌ریز">فارس</option>
					<option value="  ,آبیک ,البرز ,بوئین‌زهرا ,تاکستان ,قزوین">قزوین</option>
					<option value="  ,قم">قم</option>
					<option value="  ,بانه ,بیجار ,دیواندره ,سروآباد ,سقز ,سنندج ,قروه ,کامیاران ,مریوان">کردستان</option>
					<option value="  ,بافت ,بردسیر ,بم ,جیرفت ,راور ,رفسنجان ,رودبار جنوب ,زرند ,سیرجان ,شهر بابک ,عنبرآباد ,قلعه گنج ,کرمان ,کوهبنان ,کهنوج ,منوجان">کرمان</option>
					<option value="  ,اسلام‌آباد غرب ,پاوه ,ثلاث باباجانی ,جوانرود ,دالاهو ,روانسر ,سرپل ذهاب ,سنقر ,صحنه ,قصر شیرین ,کرمانشاه ,کنگاور ,گیلان غرب ,هرسین">کرمانشاه</option>

					<option value="  ,بویراحمد ,بهمئی ,دنا ,کهگیلویه ,گچساران">کهگیلویه و بویراحمد</option>
					<option value="  ,آزادشهر ,آق‌قلا ,بندر گز ,ترکمن ,رامیان ,علی‌آباد ,کردکوی ,کلاله ,گرگان ,گنبد کاووس ,مراوه‌تپه ,مینودشت">گلستان</option>
					<option value="  ,آستارا ,آستانه اشرفیه ,اَملَش ,بندر انزلی ,رشت ,رضوانشهر ,رودبار ,رودسر ,سیاهکل ,شَفت ,صومعه‌سرا ,طوالش ,فومَن ,لاهیجان ,لنگرود ,ماسال">گیلان</option>
					<option value="  ,ازنا ,الیگودرز ,بروجرد ,پل‌دختر ,خرم‌آباد ,دورود ,دلفان ,سلسله ,کوهدشت">لرستان</option>
					<option value="  ,آمل ,بابل ,بابلسر ,بهشهر ,تنکابن ,جویبار ,چالوس ,رامسر ,ساری ,سوادکوه ,قائم‌شهر ,گلوگاه ,محمودآباد ,نکا ,نور ,نوشهر">مازندران</option>
					<option value="  ,آشتیان ,اراک ,تفرش ,خمین ,دلیجان ,زرندیه ,ساوه ,شازند ,کمیجان ,محلات">مرکزی</option>

					<option value="  ,ابوموسی ,بستک ,بندر عباس ,بندر لنگه ,جاسک ,حاجی‌آباد ,شهرستان خمیر ,رودان  ,قشم ,گاوبندی ,میناب">هرمزگان</option>
					<option value="  ,اسدآباد ,بهار ,تویسرکان ,رزن ,کبودرآهنگ ,ملایر ,نهاوند ,همدان">همدان</option>
					<option value="  ,ابرکوه ,اردکان ,بافق ,تفت ,خاتم ,صدوق ,طبس ,مهریز ,مِیبُد ,یزد">یزد</option>
				</select>
			</div>
			<div class="col-md-4">
				<label>شهر</label>
				<select name="town" id="Shahrestan" runat="server" class="form-control">
					<option><?php echo $current_user->town; ?></option>
				</select>
			</div>
		</div>
		<div class="row pdtb0">
			<div class="col-md-12">
				<button id="edit-user" class="form-control btn btn-success fit">ویرایش اطلاعات</button>
			</div>
		</div>
		<div class="row pdtb0">
			<div id="edit-user-result" class="col-md-12 loading"></div>
		</div>
	</div>
	<hr>
	<div class="head"><h3>تغییر رمز ورود</h3></div>
	<div class="row pdtb0">
		<div class="col-md-3">
			<label>رمز قدیم</label>
			<input id="old-password" type="password" class="form-control" placeholder="رمز قدیم">
		</div>
		<div class="col-md-3">
			<label>رمز جدید</label>
			<input id="password" type="password" class="form-control" placeholder="رمز جدید">
		</div>
		<div class="col-md-3">
			<label>تکرار رمز</label>
			<input id="cpassword" type="password" class="form-control" placeholder="تکرار رمز">
		</div>
		<div class="col-md-3">
			<br>
			<button id="change-password" class="btn btn-success">تغییر رمز</button>
		</div>
	</div>
	<div class="row pdtb0">
		<div id="change-password-result" class="col-md-12 loading"></div>
	</div>