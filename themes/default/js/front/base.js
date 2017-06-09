	
	//注册用户
	$(document).ready(function(){
		$('#Registerpost_form').find('input').keydown(function(event){//这个是你在页面按任意按钮的时候会触发该方法
			var aa = event.which;
			if(aa == 13){
				tocheckRegisterpost();
				document.onkeydown=null;        //这里需要将onkeydown置空，不然默认一直是188
			}
		});
	});
	//注册用户
	function tocheckRegisterpost(){
		if(isajaxsaveing == 0){
			//具体点击的按钮
			actionsubmit_button = $('div[onclick="tocheckRegisterpost()"]');
			//ajax正在保存中
			isajaxsaveing = 1;
			//将提交按钮设置为保存中
			actionsubmit_button.attr('class', 'gksel_btn_action_off');
			actionsubmit_button.html('<div style="width:80px;margin:0 auto;"><img class="icon_loading" src="'+baseurl+'themes/default/images/ajax_loading.gif"/><span>'+L['cy_registering']+'...</span></div>');

			//用户信息
			var nickname = $('input[name="register_nickname"]').val();//手机号码
			var phone = $('input[name="register_phone"]').val();//手机号码
			var email = $('input[name="register_email"]').val();//手机号码
			var password = $('input[name="register_password"]').val();//密码
			var cpassword = $('input[name="register_cpassword"]').val();//重复密码
			var user_type = 1;//注册类型
			var consent=$('input[type="checkbox"][name="consent"]');
			var isagree = 0;
			for(var i = 0; i < consent.length; i++){
				if(consent[i].checked == true){
					isagree = 1;
				}
			}
			var ispass=1;
			//验证昵称
			if(isNull.test(nickname)){
				ispass=0;
				$('input[name="register_nickname"]').next().find('.requestbox').remove();
				$('input[name="register_nickname"]').next().append(ajax_returnrequiredorerror_BOX('昵称不能为空'));
			}else{
				$('input[name="register_nickname"]').next().find('.requestbox').remove();
			}
			//验证手机号码
			if(isNull.test(phone)){
				ispass=0;
				$('input[name="register_phone"]').next().find('.requestbox').remove();
				$('input[name="register_phone"]').next().append(ajax_returnrequiredorerror_BOX('手机号码不能为空'));
			}else{
				if(isPhone(phone)==false){
					ispass=0;
					$('input[name="register_phone"]').next().find('.requestbox').remove();
					$('input[name="register_phone"]').next().append(ajax_returnrequiredorerror_BOX('手机号码格式错误'));
				}else{
					$('input[name="register_phone"]').next().find('.requestbox').remove();
				}
			}
			//验证邮箱
			if(isNull.test(email)){
				ispass=0;
				$('input[name="register_email"]').next().find('.requestbox').remove();
				$('input[name="register_email"]').next().append(ajax_returnrequiredorerror_BOX('邮箱不能为空'));
			}else{
				if(isEmail(email)==false){
					ispass=0;
					$('input[name="register_email"]').next().find('.requestbox').remove();
					$('input[name="register_email"]').next().append(ajax_returnrequiredorerror_BOX('邮箱格式错误'));
				}else{
					$('input[name="register_email"]').next().find('.requestbox').remove();
				}
			}
			//验证密码
			if(isNull.test(password)){
				ispass=0;
				$('input[name="register_password"]').next().find('.requestbox').remove();
				$('input[name="register_password"]').next().append(ajax_returnrequiredorerror_BOX('密码不能为空'));
			}else{
				$('input[name="register_password"]').next().find('.requestbox').remove();
			}
			//验证密码
			if(isNull.test(cpassword)){
				ispass=0;
				$('input[name="register_cpassword"]').next().find('.requestbox').remove();
				$('input[name="register_cpassword"]').next().append(ajax_returnrequiredorerror_BOX('重复密码不能为空'));
			}else{
				$('input[name="register_cpassword"]').next().find('.requestbox').remove();
			}
			if(password != cpassword){
				ispass=0;
				$('input[name="register_cpassword"]').next().find('.requestbox').remove();
				$('input[name="register_cpassword"]').next().append(ajax_returnrequiredorerror_BOX('两次密码输入不一致'));
			}
			
			if(ispass == 1){
				$.post(baseurl+'index.php/account/checkphoneisexists',{phone:phone},function (data){
					if(data=='no'){
						$('input[name="register_phone"]').next().find('.requestbox').remove();
						$.post(baseurl+'index.php/account/register',{nickname:nickname, email:email, phone:phone, password:password, user_type:user_type},function (data){
							
							actionsubmit_button.html('<div style="width:80px;margin:0 auto;"><img class="icon_success" src="'+baseurl+'themes/default/images/global_ok.png"/><span>'+L['cy_registersuccess']+'</span></div>');
//							isajaxsaveing = 0;//ajax正在保存中 --- 释放
							setTimeout("toreditecturl('"+baseurl+"index.php/account/tologin')",100);//0.1秒后自动跳转到首页
						})
					}else{
						$('input[name="register_phone"]').next().append(ajax_returnrequiredorerror_BOX('此手机号码已存在'));
						
						actionsubmit_button.attr('class', 'gksel_btn_action_on');
						actionsubmit_button.html('注册');
						isajaxsaveing = 0;//ajax正在保存中 --- 释放
					}
				})
			}else{
				actionsubmit_button.attr('class', 'gksel_btn_action_on');
				actionsubmit_button.html('注册');
				isajaxsaveing = 0;//ajax正在保存中 --- 释放
			}
		}
	}
	//登录用户
	$(document).ready(function(){
		$('#Loginpost_form').find('input').keydown(function(event){//这个是你在页面按任意按钮的时候会触发该方法
			var aa = event.which;
			if(aa == 13){
				tocheckLoginpost();
				document.onkeydown=null;        //这里需要将onkeydown置空，不然默认一直是188
			}
		});
	});
	//登录用户
	function tocheckLoginpost(){
		if(isajaxsaveing == 0){
			//具体点击的按钮
			actionsubmit_button = $('div[onclick="tocheckLoginpost()"]');
			//ajax正在保存中
			isajaxsaveing = 1;
			//将提交按钮设置为保存中
			actionsubmit_button.attr('class', 'gksel_btn_action_off');
			actionsubmit_button.html('<div style="width:80px;margin:0 auto;"><img class="icon_loading" src="'+baseurl+'themes/default/images/ajax_loading.gif"/><span>'+L['cy_logining']+'...</span></div>');

			//用户信息
			var phone=$('input[name="login_phone"]').val();//手机号码
			var password=$('input[name="login_password"]').val();//密码
			var ispass=1;
			//验证手机号码
			if(isNull.test(phone)){
				ispass=0;
				$('input[name="login_phone"]').next().find('.requestbox').remove();
				$('input[name="login_phone"]').next().append(ajax_returnrequiredorerror_BOX('手机号码不能为空'));
			}else{
				if(isPhone(phone)==false){
					ispass=0;
					$('input[name="login_phone"]').next().find('.requestbox').remove();
					$('input[name="login_phone"]').next().append(ajax_returnrequiredorerror_BOX('手机号码格式错误'));
				}else{
					$('input[name="login_phone"]').next().find('.requestbox').remove();
				}
			}
			//验证密码
			if(isNull.test(password)){
				ispass=0;
				$('input[name="login_password"]').next().find('.requestbox').remove();
				$('input[name="login_password"]').next().append(ajax_returnrequiredorerror_BOX('密码不能为空'));
			}else{
				$('input[name="login_password"]').next().find('.requestbox').remove();
			}
			
			if(ispass == 1){
				$.post(baseurl+'index.php/account/checkphoneisexists',{phone:phone},function (data){
					if(data=='yes'){
						$('input[name="login_phone"]').next().find('.requestbox').remove();
						$.post(baseurl+'index.php/account/login',{phone:phone, password:password},function (data){
							if(data == 'yes'){
								actionsubmit_button.html('<div style="width:80px;margin:0 auto;"><img class="icon_success" src="'+baseurl+'themes/default/images/global_ok.png"/><span>'+L['cy_loginsuccess']+'</span></div>');
//								isajaxsaveing = 0;//ajax正在保存中 --- 释放
								setTimeout("toreditecturl('"+baseurl+"index.php/member')",100);//0.1秒后自动跳转到首页
							}else{
								$('input[name="login_password"]').next().append(ajax_returnrequiredorerror_BOX('用户名或密码错误'));
								actionsubmit_button.attr('class', 'gksel_btn_action_on');
								actionsubmit_button.html(L['cy_login']);
								isajaxsaveing = 0;//ajax正在保存中 --- 释放
							}
						})
					}else{
						$('input[name="login_phone"]').next().append(ajax_returnrequiredorerror_BOX('手机号码没有注册'));
						actionsubmit_button.attr('class', 'gksel_btn_action_on');
						actionsubmit_button.html(L['cy_login']);
						isajaxsaveing = 0;//ajax正在保存中 --- 释放
					}
				})
			}else{
				actionsubmit_button.attr('class', 'gksel_btn_action_on');
				actionsubmit_button.html(L['cy_login']);
				isajaxsaveing = 0;//ajax正在保存中 --- 释放
			}
		}
	}
	
	
	//忘记密码
	$(document).ready(function(){
		$('#Forgetpost_form').find('input').keydown(function(event){//这个是你在页面按任意按钮的时候会触发该方法
			var aa = event.which;
			if(aa == 13){
				tocheckForgetpost();
				document.onkeydown=null;        //这里需要将onkeydown置空，不然默认一直是188
			}
		});
	});
	//忘记密码
	function tocheckForgetpost(){
		if(isajaxsaveing == 0){
			//具体点击的按钮
			actionsubmit_button = $('div[onclick="tocheckForgetpost()"]');
			//ajax正在保存中
			isajaxsaveing = 1;
			//将提交按钮设置为保存中
			actionsubmit_button.attr('class', 'gksel_btn_action_off');
			actionsubmit_button.html('<div style="width:80px;margin:0 auto;"><img class="icon_loading" src="'+baseurl+'themes/default/images/ajax_loading.gif"/><span>找回中...</span></div>');

			//用户信息
			var phone=$('input[name="forgetpassword_phone"]').val();//手机号码
			var code=$('input[name="forgetpassword_code"]').val();//短信验证码
			var ispass=1;
			//验证手机号码
			if(isNull.test(phone)){
				ispass=0;
				$('input[name="forgetpassword_phone"]').next().find('.requestbox').remove();
				$('input[name="forgetpassword_phone"]').next().append(ajax_returnrequiredorerror_BOX('手机号码不能为空'));
			}else{
				if(isPhone(phone)==false){
					ispass=0;
					$('input[name="forgetpassword_phone"]').next().find('.requestbox').remove();
					$('input[name="forgetpassword_phone"]').next().append(ajax_returnrequiredorerror_BOX('手机号码格式错误'));
				}else{
					$('input[name="forgetpassword_phone"]').next().find('.requestbox').remove();
				}
			}
			
			if(ispass == 1){
				$('input[name="forgetpassword_phone"]').next().find('.requestbox').remove();
				$.post(baseurl+'index.php/account/checkphoneisexists',{phone:phone},function (data){
					if(data=='yes'){
						actionsubmit_button.html('<div style="width:80px;margin:0 auto;"><img class="icon_success" src="'+baseurl+'themes/default/images/global_ok.png"/><span>找回成功</span></div>');
						
						$.post(baseurl+'index.php/account/forgetpassword',{phone:phone},function (data){
							location.href = baseurl+'index.php/account/toresetpassword';
						})
					}else{
						$('input[name="forgetpassword_phone"]').next().append(ajax_returnrequiredorerror_BOX('此手机号码没有注册'));
						
						actionsubmit_button.attr('class', 'gksel_btn_action_on');
						actionsubmit_button.html(L['cy_forgetpassword']);
						isajaxsaveing = 0;//ajax正在保存中 --- 释放
					}
				})
			}else{
				actionsubmit_button.attr('class', 'gksel_btn_action_on');
				actionsubmit_button.html(L['cy_forgetpassword']);
				isajaxsaveing = 0;//ajax正在保存中 --- 释放
			}
		}
	}
	//重置密码
	$(document).ready(function(){
		$('#Resetpost_form').find('input').keydown(function(event){//这个是你在页面按任意按钮的时候会触发该方法
			var aa = event.which;
			if(aa == 13){
				tocheckResetpost();
				document.onkeydown=null;        //这里需要将onkeydown置空，不然默认一直是188
			}
		});
	});
	//重置密码
	function tocheckResetpost(){
		if(isajaxsaveing == 0){
			//具体点击的按钮
			actionsubmit_button = $('div[onclick="tocheckResetpost()"]');
			//ajax正在保存中
			isajaxsaveing = 1;
			//将提交按钮设置为保存中
			actionsubmit_button.attr('class', 'gksel_btn_action_off');
			actionsubmit_button.html('<div style="width:80px;margin:0 auto;"><img class="icon_loading" src="'+baseurl+'themes/default/images/ajax_loading.gif"/><span>重置中...</span></div>');

			//用户信息
			var password=$('input[name="reset_password"]').val();//密码
			var cpassword=$('input[name="reset_cpassword"]').val();
			var ispass=1;
			//验证密码
			if(isNull.test(password)){
				ispass=0;
				$('input[name="reset_password"]').next().find('.requestbox').remove();
				$('input[name="reset_password"]').next().append(ajax_returnrequiredorerror_BOX('密码不能为空'));
			}else{
				$('input[name="reset_password"]').next().find('.requestbox').remove();
			}
			//验证重复密码
			if(isNull.test(cpassword)){
				ispass=0;
				$('input[name="reset_cpassword"]').next().find('.requestbox').remove();
				$('input[name="reset_cpassword"]').next().append(ajax_returnrequiredorerror_BOX('重复密码不能为空'));
			}else{
				//再判断两次密码是否一致
				if(password == cpassword){
					$('input[name="reset_cpassword"]').next().find('.requestbox').remove();
				}else{
					ispass=0;
					$('input[name="reset_cpassword"]').next().find('.requestbox').remove();
					$('input[name="reset_cpassword"]').next().append(ajax_returnrequiredorerror_BOX('两次密码输入不一致'));
				}
			}
			
			if(ispass == 1){
				actionsubmit_button.html('<div style="width:80px;margin:0 auto;"><img class="icon_success" src="'+baseurl+'themes/default/images/global_ok.png"/><span>重置成功</span></div>');
				$.post(baseurl+'index.php/account/resetpassword',{password:password},function (data){
					setTimeout("toreditecturl('"+baseurl+"index.php/account/tologin')",100);//0.1秒后自动跳转到登录页面
				})
			}else{
				actionsubmit_button.attr('class', 'gksel_btn_action_on');
				actionsubmit_button.html('重置密码');
				isajaxsaveing = 0;//ajax正在保存中 --- 释放
			}
		}
	}