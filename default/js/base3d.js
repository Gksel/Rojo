	var isNull = /^[\s' ']*$/;
	function isEmail(email){
		var isEmail = /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/.test(email);
		if(isEmail!=true){
			return false;
		}else{
			return true;
		}
	}	
	// 修复 IE 下 PNG 图片不能透明显示的问题
	function fixPNG(myImage) {
	var arVersion = navigator.appVersion.split("MSIE");
	var version = parseFloat(arVersion[1]);
	if ((version >= 5.5) && (version < 7) && (document.body.filters))
	{
	     var imgID = (myImage.id) ? "id='" + myImage.id + "' " : "";
	     var imgClass = (myImage.className) ? "class='" + myImage.className + "' " : "";
	     var imgTitle = (myImage.title) ? "title='" + myImage.title   + "' " : "title='" + myImage.alt + "' ";
	     var imgStyle = "display:inline-block;" + myImage.style.cssText;
	     var strNewHTML = "<span " + imgID + imgClass + imgTitle
	
	   + " style=\"" + "width:" + myImage.width
	
	   + "px; height:" + myImage.height
	
	   + "px;" + imgStyle + ";"
	
	   + "filter:progid:DXImageTransform.Microsoft.AlphaImageLoader"
	
	   + "(src=\'" + myImage.src + "\', sizingMethod='scale');\"></span>";
	     myImage.outerHTML = strNewHTML;
	}} 
	        
	//输入框输入提示
	$(document).ready(function(){
	    $('input[type="text"],input[type="password"],select').focus(function(){
	    	var target_name=$(this).attr('name');
	    	$('input[type="text"],input[type="password"],select').each(function (){
				if(target_name==$(this).attr('name')){
					$("#"+$(this).attr('name')+"_tips").animate({opacity: "show"},1000)
				}else{
					$("#"+$(this).attr('name')+"_tips").animate({opacity: "hide"},1000)
				}
		    })
		});
	    $('input[type="text"],input[type="password"],select').blur(function(){
//			$("#"+$(this).attr('name')+"_tips").animate({opacity: "hide"},1000);
			$("#"+$(this).attr('name')+"_tips").hide();
		});
	})	
	
	//让IE也支持placeholder
	$(document).ready(function(){
		var doc=document;
		var inputs=doc.getElementsByTagName('input');
		var supportPlaceholder='placeholder'in doc.createElement('input');
		var placeholder=function(input){
			var text=input.getAttribute('placeholder'),defaultValue=input.defaultValue;
			if(defaultValue==''){
				input.value=text;
				$(this).css('color','gray');
			}
			input.onfocus=function(){
				if(input.value===text){
					this.value='';
					$(this).css('color','black');
				}
			};
			input.onblur=function(){
				if(input.value===''){
					this.value=text;
					$(this).css('color','gray');
				}
			}
		};
		if(!supportPlaceholder){
			for(var i=0,len=inputs.length;i<len;i++){
				var input=inputs[i],text=input.getAttribute('placeholder');
				if(input.type==='text'&&text){
					placeholder(input);
					$('input[type="text"][name="'+input.name+'"]').css('color','gray');
				}
			}
		}
	});
	
	/**
	 2  ** 加法函数，用来得到精确的加法结果
	 3  ** 说明：javascript的加法结果会有误差，在两个浮点数相加的时候会比较明显。这个函数返回较为精确的加法结果。
	 4  ** 调用：accAdd(arg1,arg2)
	 5  ** 返回值：arg1加上arg2的精确结果
	 6  **/
	function accAdd(arg1, arg2) {
		var r1, r2, m, c;
		try {
			r1 = arg1.toString().split(".")[1].length;
		}
		catch (e) {
			r1 = 0;
		}
		try {
			r2 = arg2.toString().split(".")[1].length;
		}
		catch (e) {
			r2 = 0;
		}
		c = Math.abs(r1 - r2);
		m = Math.pow(10, Math.max(r1, r2));
		if (c > 0) {
			var cm = Math.pow(10, c);
			if (r1 > r2) {
				arg1 = Number(arg1.toString().replace(".", ""));
				arg2 = Number(arg2.toString().replace(".", "")) * cm;
			} else {
				arg1 = Number(arg1.toString().replace(".", "")) * cm;
				arg2 = Number(arg2.toString().replace(".", ""));
			}
		} else {
			arg1 = Number(arg1.toString().replace(".", ""));
			arg2 = Number(arg2.toString().replace(".", ""));
		}
		return (arg1 + arg2) / m;
	}
	 /**
	 2  ** 减法函数，用来得到精确的减法结果
	 3  ** 说明：javascript的减法结果会有误差，在两个浮点数相减的时候会比较明显。这个函数返回较为精确的减法结果。
	 4  ** 调用：accSub(arg1,arg2)
	 5  ** 返回值：arg1加上arg2的精确结果
	 6  **/
	function accSub(arg1, arg2) {
		var r1, r2, m, n;
		try {
			r1 = arg1.toString().split(".")[1].length;
		}
		catch (e) {
			r1 = 0;
		}
		try {
			r2 = arg2.toString().split(".")[1].length;
		}
		catch (e) {
			r2 = 0;
		}
		m = Math.pow(10, Math.max(r1, r2)); //last modify by deeka //动态控制精度长度
		n = (r1 >= r2) ? r1 : r2;
		return ((arg1 * m - arg2 * m) / m).toFixed(n);
	}
	
	/**
	 2  ** 乘法函数，用来得到精确的乘法结果
	 3  ** 说明：javascript的乘法结果会有误差，在两个浮点数相乘的时候会比较明显。这个函数返回较为精确的乘法结果。
	 4  ** 调用：accMul(arg1,arg2)
	 5  ** 返回值：arg1乘以 arg2的精确结果
	 6  **/
	function accMul(arg1, arg2) {
		var m = 0, s1 = arg1.toString(), s2 = arg2.toString();
		try {
			m += s1.split(".")[1].length;
		}
		catch (e) {
		}
		try {
			m += s2.split(".")[1].length;
		}
		catch (e) {
		}
		return Number(s1.replace(".", "")) * Number(s2.replace(".", "")) / Math.pow(10, m);
	}
	
	/** 
	 2  ** 除法函数，用来得到精确的除法结果
	 3  ** 说明：javascript的除法结果会有误差，在两个浮点数相除的时候会比较明显。这个函数返回较为精确的除法结果。
	 4  ** 调用：accDiv(arg1,arg2)
	 5  ** 返回值：arg1除以arg2的精确结果
	 6  **/
	function accDiv(arg1, arg2) {
		var t1 = 0, t2 = 0, r1, r2;
		try {
			t1 = arg1.toString().split(".")[1].length;
		}
		catch (e) {
		}
		try {
			t2 = arg2.toString().split(".")[1].length;
		}
		catch (e) {
		}
		with (Math) {
			r1 = Number(arg1.toString().replace(".", ""));
			r2 = Number(arg2.toString().replace(".", ""));
			return (r1 / r2) * pow(10, t2 - t1);
		}
	}
	
	//关闭按钮 X 
	function close_msg(){
		$('.box_title').find('#close').show();
		$('.notice_taball').hide();
		$('.message_tab').hide();
		$('.box_title').find("#title").html('');
		$('.box_content').html('<span class="loading_indicator">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>');
		$('.box_control').find("#content").html('');
	}
	
	//注册时获取手机验证码
	var isregisterphoneclick=1;
	function togetphonecode(){
		if(isregisterphoneclick==1){
			isregisterphoneclick=0;//不再点击
			var phone=$('input[name="cellphone"]').val();
			$.post(baseurl+'index.php/welcome/togetphonecode',{phone:phone},function (data){
				if(data=='phoneerror'){
					$('#errorbox6').html('手机号码格式不正确');
					isregisterphoneclick=1;//恢复再点击
				}else if(data=='hasexists'){
					$('#errorbox6').html('该手机号码已被注册');
					isregisterphoneclick=1;//恢复再点击
				}else{
					setphonechongfatext(60);
				}
			})
		}
		
	}
	
	//兑换时绑定获取手机验证码
	function togetbing_phonecode(){
		var phone=$('input[name="cellphone"]').val();
		$.post(baseurl+'index.php/welcome/togetbind_phonecode',{phone:phone},function (data){
			if(data=='phoneerror'){
				$('#errorbox6').html('手机号码格式不正确');
			}else{
				setphonechongfatext(60);
			}
		})
	}
	
	//兑换时获取手机验证码
	function togetgood_phonecode(){
		var phone=$('input[name="cellphone"]').val();
		$.post(baseurl+'index.php/welcome/togetgood_phonecode',{phone:phone},function (data){
			setphonegoodchongfatext(60);
		})
	}
	
	//兑换好礼
	function toduihuanhaoli(id){
		var code=$('input[name="code"]').val();
		$.post(baseurl+'index.php/point/doingduihuanhaoli/'+id,{code:code},function (text){
			$('.notice_taball').show();
			$(".message_tab").show();
			$('.box_title').find("#title").html('&nbsp;');
			$.post(baseurl+"index.php/point/doingduihuanhaoli_result",{text:text},function (data){
				$(".box_content").html(data);
				
				setTimeout('location.href="'+currenturl+'"',1000);
			});
		})
	}
	
	function setphonegoodchongfatext(second){
		$('#phone_process').show();
		$('#phone_start').hide();
		$('#phoneseconds').html(second);
		if(second>0){
			setTimeout('setphonegoodchongfatext('+(second-1)+')',1000);
		}else{
			$('#phone_process').hide();
			$('#phone_start').show();
		}
	}
	
	function setphonechongfatext(second){
		$('input[name="cellphone"]').attr('readOnly',true).css({'background-color':'#EFEFEF'});
		$('#phone_process').show();
		$('#phone_start').hide();
		$('#phoneseconds').html(second);
		if(second>0){
			isregisterphoneclick=0;//不可以再点击
			setTimeout('setphonechongfatext('+(second-1)+')',1000);
		}else{
			$('input[name="cellphone"]').attr('readOnly',false).css({'background-color':'#FFFFFF'});
			$('#phone_process').hide();
			$('#phone_start').show();
			isregisterphoneclick=1;//恢复再点击
		}
	}
	
	
	//ajax关注操作
	function Ajax_Addfriend(friendid){
		$.post(baseurl+"index.php/member/ajax_to_add_friend_list/"+friendid,function(){
			$('#followstatus'+friendid).attr('class','friend_follow_1');
			$('#followstatus'+friendid).text("已关注");
		});	
	}
	
	//
	
	//省市县三级联动
	$(document).ready(function(){
		$('.province').change(function(){
			var pid = $(this).val();
			if(pid!=0){
				$.post(baseurl+'index.php/account/getcity/'+pid,function(data){
					$('.city').html(data);
					$('.area').html('<option value=0>'+L['select_area']+'</option>');
				});
			}
		})
		
		$('.city').change(function(){
			var cid = $(this).val();
			if(cid!=0){
				$.post(baseurl+'index.php/account/getarea/'+cid,function(data){
					$('.area').html(data);
				});
			}
		})
	})
	
	
	