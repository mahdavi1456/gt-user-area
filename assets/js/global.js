function Func(Shahrestanha) {
    var _Shahrestan = document.getElementById("Shahrestan");
    _Shahrestan.options.length = 0;
    if(Shahrestanha != "") {
        var arr = Shahrestanha.split(",");
        for(i = 0; i < arr.length; i++) {
            if(arr[i] != "") {
                _Shahrestan.options[_Shahrestan.options.length]=new Option(arr[i],arr[i]);
            }
        }
    }
}

function isValidMelli(input) {
    if (!/^\d{10}$/.test(input))
        return false;

    var check = parseInt(input[9]);
    var sum = 0;
    var i;
    for(i = 0; i < 9; ++i) {
        sum += parseInt(input[i]) * (10 - i);
    }
    sum %= 11;
    return (sum < 2 && check == sum) || (sum >= 2 && check + sum == 11);
}

function check_melli(id){
	var melli = document.getElementById(id).value;
	var el = id + '-error';
	if(isValidMelli(melli)==false){
		document.getElementById(el).innerHTML = "کد ملی وارد شده معتبر نیست";
		location.href = "#"+el;
		exit;
	}else{
		document.getElementById(el).innerHTML = "";
	}
}

function isNumeric(value) {
	return /^\d+jQuery/.test(value);
}

function check_email(id) {
	var el = id + '-error';
	emailText = document.getElementById(id).value;
	var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
	if(pattern.test(emailText)==false){
		document.getElementById(el).innerHTML = "ایمیل وارد شده معتبر نیست";
		location.href = "#"+el;
		exit;
	}else{
		document.getElementById(el).innerHTML = "";
	}
}


function check_empty(id){
	var el = id + '-error';
	var item = document.getElementById(id).value;
	if(item==""){
		document.getElementById(el).innerHTML = "وارد کردن این فیلد ضروری است";
		location.href = "#"+el;
		exit;
	}else{
		document.getElementById(el).innerHTML = "";
	}
}

function check_mobile(id){
	var el = id + '-error';
	var item = document.getElementById(id).value;
	if(item.length<11){
		document.getElementById(el).innerHTML = "موبایل به صورت صحیح وارد نشده است";
		location.href = "#"+el;
		exit;
	}else{
		document.getElementById(el).innerHTML = "";
	}
}

function get_sel_val(id){
	var item = document.getElementById(id).value;
    return item;
}

function check_sel(id){
	var el = id + '-error';
	var e = document.getElementById(id);
	var text = e.options[e.selectedIndex].text;
	if(text=="-" || text=="انتخاب استان" || text=="انتخاب شهر" || text=="انتخاب مقطع"){
		document.getElementById(el).innerHTML = "وارد کردن این فیلد ضروری است";
		location.href = "#"+el;
		exit;
	}else{
		document.getElementById(el).innerHTML = "";
	}
}

jQuery(document).ready(function(){
	jQuery('.no-submit').submit(function(e){
        e.preventDefault();
    });
	jQuery('#send').click(function(){
		var response = grecaptcha.getResponse();
		if(response.length == 0)
			alert("no")
		else
			alert("yes");
	});
	
});