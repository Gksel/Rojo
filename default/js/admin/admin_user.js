	//删除用户
	function todel_user(id, name){
		var title = '您确定要删除用户<font style="color:red;">【'+name+'】</font>吗？';
		var subtitle = '将会删除该用户和该用户相关的内容';
		del_url = encodeURI(baseurl+"index.php/admins/user/del_user/"+id);
		todel(title, subtitle);
	}
	//删除用户---form
	function todel_user_form(id, name){
		var title = 'Are you sure to delete <font style="color:red;">【'+name+'】</font>？';
		var subtitle = '';
		del_url = encodeURI(baseurl+"index.php/admins/user/del_user_form/"+id);
		todel(title, subtitle);
	}
	//删除管理员助手
	function todel_adminassistant(id, name){
		var title = '您确定要删除管理员助手<font style="color:red;">【'+name+'】</font>吗？';
		var subtitle = '';
		del_url = encodeURI(baseurl+"index.php/admins/user/del_adminassistant/"+id);
		todel(title, subtitle);
	}
	//用户信息---添加
	function toadd_userinfo(user_type){
		
		if(isajaxsaveing == 0){
			//具体点击的按钮
			actionsubmit_button = $('div[onclick="toadd_userinfo('+user_type+')"]');
			//ajax正在保存中
			isajaxsaveing = 1;
			//返回url
			var backurl = $('input[name="backurl"]').val();
			//将提交按钮设置为保存中
			actionsubmit_button.attr('class', 'gksel_btn_action_off');
			actionsubmit_button.html('<img class="icon_loading" src="'+baseurl+'themes/default/images/ajax_loading.gif"/><span>'+L['cy_saving']+'...</span>');
			
			var ispass=1;
			
			if(user_type == 1){//用户
				//用户信息
				var user_nickname = $('input[name="user_nickname"]').val();
				var user_number = $('input[name="user_number"]').val();
				var user_realname = $('input[name="user_realname"]').val();
				var user_sex = $('select[name="user_sex"]').val();
				var user_phone = $('input[name="user_phone"]').val();
				var user_email = $('input[name="user_email"]').val();
				var password = $('input[name="password"]').val();
				var user_profile = $('textarea[name="user_profile"]').val();
				//公司信息
				var company_name = $('input[name="company_name"]').val();
				var company_title = $('input[name="company_title"]').val();
				var company_email = $('input[name="company_email"]').val();
				var company_address = $('input[name="company_address"]').val();
				var company_phone = $('input[name="company_phone"]').val();
				var img1_gksel = $('input[name="img1_gksel"]').val();
				
				//验证姓名
//				if(isNull.test(user_realname)){ispass=0;$('input[name="user_realname"]').next().append(ajax_returnrequiredorerror_BOX('姓名不能为空'));}else{$('input[name="user_realname"]').next().find('.requestbox').remove();}
//				//验证手机号码
//				if(isNull.test(user_phone)){ispass=0;$('input[name="user_phone"]').next().append(ajax_returnrequiredorerror_BOX('手机号码不能为空'));}else{if(isPhone(user_phone)){$('input[name="user_phone"]').next().find('.requestbox').remove();}else{ispass=0;$('input[name="user_phone"]').next().append(ajax_returnrequiredorerror_BOX('手机号码格式错误'));}}
				//验证密码
//				if(isNull.test(password)){ispass=0;$('input[name="password"]').next().append(ajax_returnrequiredorerror_BOX('密码不能为空'));}else{$('input[name="password"]').next().find('.requestbox').remove();}
//				if(isNull.test(user_email)){
//					ispass=0;
//					$('input[name="user_email"]').next().append(ajax_returnrequiredorerror_BOX('邮箱不能为空'));
//				}else{
//					if(isEmail(user_email)){
//						$('input[name="user_email"]').next().find('.requestbox').remove();
//					}else{
//						ispass=0;
//						$('input[name="user_email"]').next().append(ajax_returnrequiredorerror_BOX('邮箱格式错误'));
//					}
//				}
				
//				if(isNull.test(company_name)){ispass=0;$('input[name="company_name"]').next().append(ajax_returnrequiredorerror_BOX('公司名称不能为空'));}else{$('input[name="company_name"]').next().find('.requestbox').remove();}
//				if(isNull.test(company_title)){ispass=0;$('input[name="company_title"]').next().append(ajax_returnrequiredorerror_BOX('公司职位不能为空'));}else{$('input[name="company_title"]').next().find('.requestbox').remove();}
//				if(isNull.test(company_email)){
//					ispass=0;
//					$('input[name="company_email"]').next().append(ajax_returnrequiredorerror_BOX('公司邮箱不能为空'));
//				}else{
//					if(isEmail(company_email)){
//						$('input[name="company_email"]').next().find('.requestbox').remove();
//					}else{
//						ispass=0;
//						$('input[name="company_email"]').next().append(ajax_returnrequiredorerror_BOX('公司邮箱格式错误'));
//					}
//				}
//				if(isNull.test(company_address)){ispass=0;$('input[name="company_address"]').next().append(ajax_returnrequiredorerror_BOX('公司地址不能为空'));}else{$('input[name="company_address"]').next().find('.requestbox').remove();}
//				if(isNull.test(company_phone)){ispass=0;$('input[name="company_phone"]').next().append(ajax_returnrequiredorerror_BOX('公司电话不能为空'));}else{$('input[name="company_phone"]').next().find('.requestbox').remove();}
//				
				
				if(ispass == 1){
					$.post(baseurl+'index.php/admins/user/add_user/'+user_type, {
						//返回url
						backurl: backurl,
						//用户信息
						user_nickname: user_nickname,
						user_number: user_number,
						user_realname: user_realname,
						user_sex: user_sex,
						user_phone: user_phone,
						user_email: user_email,
						password: password,
						user_profile: user_profile,
						//公司信息
						company_name: company_name,
						company_title: company_title,
						company_email: company_email,
						company_address: company_address,
						company_phone: company_phone,
						img1_gksel: img1_gksel
					},function (data){
						var obj = eval( "(" + data + ")" );
						actionsubmit_button.html('<img class="icon_success" src="'+baseurl+'themes/default/images/global_ok.png"/><span>'+L['cy_save_success']+'</span>');
						location.href = obj.backurl;
					})
				}else{
					actionsubmit_button.attr('class', 'gksel_btn_action_on');
					actionsubmit_button.html(L['cy_save']);
					isajaxsaveing = 0;//ajax正在保存中 --- 释放
				}
			}else if(user_type == 2){//商户
				//公司信息
				var company_name = $('input[name="company_name"]').val();
				var company_title = $('input[name="company_title"]').val();
				var company_email = $('input[name="company_email"]').val();
				var company_address = $('input[name="company_address"]').val();
				var company_phone = $('input[name="company_phone"]').val();
				var img1_gksel = $('input[name="img1_gksel"]').val();
				//用户信息
				var user_nickname = $('input[name="user_nickname"]').val();
				var user_realname = $('input[name="user_realname"]').val();
				var user_phone = $('input[name="user_phone"]').val();
				var user_email = $('input[name="user_email"]').val();
				var password = $('input[name="password"]').val();
				
				//验证姓名
				if(isNull.test(company_name)){ispass=0;$('input[name="company_name"]').next().append(ajax_returnrequiredorerror_BOX('公司名称不能为空'));}else{$('input[name="company_name"]').next().find('.requestbox').remove();}
				if(isNull.test(company_title)){ispass=0;$('input[name="company_title"]').next().append(ajax_returnrequiredorerror_BOX('公司职位不能为空'));}else{$('input[name="company_title"]').next().find('.requestbox').remove();}
				if(isNull.test(company_email)){
					ispass=0;
					$('input[name="company_email"]').next().append(ajax_returnrequiredorerror_BOX('公司邮箱不能为空'));
				}else{
					if(isEmail(company_email)){
						$('input[name="company_email"]').next().find('.requestbox').remove();
					}else{
						ispass=0;
						$('input[name="company_email"]').next().append(ajax_returnrequiredorerror_BOX('公司邮箱格式错误'));
					}
				}
				if(isNull.test(company_address)){ispass=0;$('input[name="company_address"]').next().append(ajax_returnrequiredorerror_BOX('公司地址不能为空'));}else{$('input[name="company_address"]').next().find('.requestbox').remove();}
				if(isNull.test(company_phone)){ispass=0;$('input[name="company_phone"]').next().append(ajax_returnrequiredorerror_BOX('公司电话不能为空'));}else{$('input[name="company_phone"]').next().find('.requestbox').remove();}
				
				//验证姓名
//				if(isNull.test(user_realname)){ispass=0;$('input[name="user_realname"]').next().append(ajax_returnrequiredorerror_BOX('姓名不能为空'));}else{$('input[name="user_realname"]').next().find('.requestbox').remove();}
//				//验证手机号码
//				if(isNull.test(user_phone)){ispass=0;$('input[name="user_phone"]').next().append(ajax_returnrequiredorerror_BOX('手机号码不能为空'));}else{if(isPhone(user_phone)){$('input[name="user_phone"]').next().find('.requestbox').remove();}else{ispass=0;$('input[name="user_phone"]').next().append(ajax_returnrequiredorerror_BOX('手机号码格式错误'));}}
//				//验证密码
//				if(isNull.test(password)){ispass=0;$('input[name="password"]').next().append(ajax_returnrequiredorerror_BOX('密码不能为空'));}else{$('input[name="password"]').next().find('.requestbox').remove();}
//				if(isNull.test(user_email)){
//					ispass=0;
//					$('input[name="user_email"]').next().append(ajax_returnrequiredorerror_BOX('邮箱不能为空'));
//				}else{
//					if(isEmail(user_email)){
//						$('input[name="user_email"]').next().find('.requestbox').remove();
//					}else{
//						ispass=0;
//						$('input[name="user_email"]').next().append(ajax_returnrequiredorerror_BOX('邮箱格式错误'));
//					}
//				}
				
				if(ispass == 1){
					$.post(baseurl+'index.php/admins/user/add_user/'+user_type, {
						//返回url
						backurl: backurl,
						//用户信息
						user_nickname: user_nickname,
						user_realname: user_realname,
						user_sex: 0,
						user_phone: user_phone,
						user_email: user_email,
						password: password,
						//公司信息
						company_name: company_name,
						company_title: company_title,
						company_email: company_email,
						company_address: company_address,
						company_phone: company_phone,
						img1_gksel: img1_gksel
					},function (data){
						var obj = eval( "(" + data + ")" );
						actionsubmit_button.html('<img class="icon_success" src="'+baseurl+'themes/default/images/global_ok.png"/><span>'+L['cy_save_success']+'</span>');
						location.href = obj.backurl;
					})
				}else{
					actionsubmit_button.attr('class', 'gksel_btn_action_on');
					actionsubmit_button.html(L['cy_save']);
					isajaxsaveing = 0;//ajax正在保存中 --- 释放
				}
			}else if(user_type == 3){//内容提供者
				//用户信息
				var user_nickname = $('input[name="user_nickname"]').val();
				var user_realname = $('input[name="user_realname"]').val();
				var user_phone = $('input[name="user_phone"]').val();
				var user_email = $('input[name="user_email"]').val();
				var password = $('input[name="password"]').val();
				
				//验证姓名
//				if(isNull.test(user_realname)){ispass=0;$('input[name="user_realname"]').next().append(ajax_returnrequiredorerror_BOX('姓名不能为空'));}else{$('input[name="user_realname"]').next().find('.requestbox').remove();}
				//验证手机号码
//				if(isNull.test(user_phone)){ispass=0;$('input[name="user_phone"]').next().append(ajax_returnrequiredorerror_BOX('手机号码不能为空'));}else{if(isPhone(user_phone)){$('input[name="user_phone"]').next().find('.requestbox').remove();}else{ispass=0;$('input[name="user_phone"]').next().append(ajax_returnrequiredorerror_BOX('手机号码格式错误'));}}
//				//验证密码
//				if(isNull.test(password)){ispass=0;$('input[name="password"]').next().append(ajax_returnrequiredorerror_BOX('密码不能为空'));}else{$('input[name="password"]').next().find('.requestbox').remove();}
//				if(isNull.test(user_email)){
//					ispass=0;
//					$('input[name="user_email"]').next().append(ajax_returnrequiredorerror_BOX('邮箱不能为空'));
//				}else{
//					if(isEmail(user_email)){
//						$('input[name="user_email"]').next().find('.requestbox').remove();
//					}else{
//						ispass=0;
//						$('input[name="user_email"]').next().append(ajax_returnrequiredorerror_BOX('邮箱格式错误'));
//					}
//				}
				
				if(ispass == 1){
					$.post(baseurl+'index.php/admins/user/add_user/'+user_type, {
						//返回url
						backurl: backurl,
						//用户信息
						user_nickname: user_nickname,
						user_realname: user_realname,
						user_sex: 0,
						user_phone: user_phone,
						user_email: user_email,
						password: password
					},function (data){
						var obj = eval( "(" + data + ")" );
						actionsubmit_button.html('<img class="icon_success" src="'+baseurl+'themes/default/images/global_ok.png"/><span>'+L['cy_save_success']+'</span>');
						location.href = obj.backurl;
					})
				}else{
					actionsubmit_button.attr('class', 'gksel_btn_action_on');
					actionsubmit_button.html(L['cy_save']);
					isajaxsaveing = 0;//ajax正在保存中 --- 释放
				}
			}
			
			
		}
	}
	//用户信息---保存
	function tosave_userinfo(uid, user_type){
		
		if(isajaxsaveing == 0){
			//具体点击的按钮
			actionsubmit_button = $('div[onclick="tosave_userinfo('+uid+', '+user_type+')"]');
			//ajax正在保存中
			isajaxsaveing = 1;
			//返回url
			var backurl = $('input[name="backurl"]').val();
			//将提交按钮设置为保存中
			actionsubmit_button.attr('class', 'gksel_btn_action_off');
			actionsubmit_button.html('<img class="icon_loading" src="'+baseurl+'themes/default/images/ajax_loading.gif"/><span>'+L['cy_saving']+'...</span>');
			
			var ispass=1;
			if(user_type == 1){//用户
				//用户信息
				var user_nickname = $('input[name="user_nickname"]').val();
				var user_number = $('input[name="user_number"]').val();
				var user_realname = $('input[name="user_realname"]').val();
				var user_sex = $('select[name="user_sex"]').val();
				var user_email = $('input[name="user_email"]').val();
				var password = $('input[name="password"]').val();
				var user_profile = $('textarea[name="user_profile"]').val();
				//公司信息
				var company_name = $('input[name="company_name"]').val();
				var company_title = $('input[name="company_title"]').val();
				var company_email = $('input[name="company_email"]').val();
				var company_address = $('input[name="company_address"]').val();
				var company_phone = $('input[name="company_phone"]').val();
				var img1_gksel = $('input[name="img1_gksel"]').val();
				
				//验证姓名
//				if(isNull.test(user_realname)){ispass=0;$('input[name="user_realname"]').next().append(ajax_returnrequiredorerror_BOX('姓名不能为空'));}else{$('input[name="user_realname"]').next().find('.requestbox').remove();}
//				if(isNull.test(user_email)){
//					ispass=0;
//					$('input[name="user_email"]').next().append(ajax_returnrequiredorerror_BOX('邮箱不能为空'));
//				}else{
//					if(isEmail(user_email)){
//						$('input[name="user_email"]').next().find('.requestbox').remove();
//					}else{
//						ispass=0;
//						$('input[name="user_email"]').next().append(ajax_returnrequiredorerror_BOX('邮箱格式错误'));
//					}
//				}
//				if(isNull.test(company_name)){ispass=0;$('input[name="company_name"]').next().append(ajax_returnrequiredorerror_BOX('公司名称不能为空'));}else{$('input[name="company_name"]').next().find('.requestbox').remove();}
//				if(isNull.test(company_title)){ispass=0;$('input[name="company_title"]').next().append(ajax_returnrequiredorerror_BOX('公司职位不能为空'));}else{$('input[name="company_title"]').next().find('.requestbox').remove();}
//				if(isNull.test(company_email)){
//					ispass=0;
//					$('input[name="company_email"]').next().append(ajax_returnrequiredorerror_BOX('公司邮箱不能为空'));
//				}else{
//					if(isEmail(company_email)){
//						$('input[name="company_email"]').next().find('.requestbox').remove();
//					}else{
//						ispass=0;
//						$('input[name="company_email"]').next().append(ajax_returnrequiredorerror_BOX('公司邮箱格式错误'));
//					}
//				}
//				if(isNull.test(company_address)){ispass=0;$('input[name="company_address"]').next().append(ajax_returnrequiredorerror_BOX('公司地址不能为空'));}else{$('input[name="company_address"]').next().find('.requestbox').remove();}
//				if(isNull.test(company_phone)){ispass=0;$('input[name="company_phone"]').next().append(ajax_returnrequiredorerror_BOX('公司电话不能为空'));}else{$('input[name="company_phone"]').next().find('.requestbox').remove();}
				
				
				if(ispass == 1){
					$.post(baseurl+'index.php/admins/user/edit_user/'+uid, {
						//返回url
						backurl: backurl,
						//用户信息
						user_nickname: user_nickname,
						user_number: user_number,
						user_realname: user_realname,
						user_sex: user_sex,
						user_email: user_email,
						password: password,
						user_profile: user_profile,
						//公司信息
						company_name: company_name,
						company_title: company_title,
						company_email: company_email,
						company_address: company_address,
						company_phone: company_phone,
						img1_gksel: img1_gksel
					},function (data){
						var obj = eval( "(" + data + ")" );
						actionsubmit_button.html('<img class="icon_success" src="'+baseurl+'themes/default/images/global_ok.png"/><span>'+L['cy_save_success']+'</span>');
						location.href = obj.backurl;
					})
				}else{
					actionsubmit_button.attr('class', 'gksel_btn_action_on');
					actionsubmit_button.html(L['cy_save']);
					isajaxsaveing = 0;//ajax正在保存中 --- 释放
				}
			}else if(user_type == 2){//商户
				//公司信息
				var company_name = $('input[name="company_name"]').val();
				var company_title = $('input[name="company_title"]').val();
				var company_email = $('input[name="company_email"]').val();
				var company_address = $('input[name="company_address"]').val();
				var company_phone = $('input[name="company_phone"]').val();
				var img1_gksel = $('input[name="img1_gksel"]').val();
				//用户信息
				var user_nickname = $('input[name="user_nickname"]').val();
				var user_realname = $('input[name="user_realname"]').val();
				var user_email = $('input[name="user_email"]').val();
				var password = $('input[name="password"]').val();
				
				//验证公司名称
//				if(isNull.test(company_name)){ispass=0;$('input[name="company_name"]').next().append(ajax_returnrequiredorerror_BOX('公司名称不能为空'));}else{$('input[name="company_name"]').next().find('.requestbox').remove();}
//				if(isNull.test(company_title)){ispass=0;$('input[name="company_title"]').next().append(ajax_returnrequiredorerror_BOX('公司职位不能为空'));}else{$('input[name="company_title"]').next().find('.requestbox').remove();}
//				if(isNull.test(company_email)){
//					ispass=0;
//					$('input[name="company_email"]').next().append(ajax_returnrequiredorerror_BOX('公司邮箱不能为空'));
//				}else{
//					if(isEmail(company_email)){
//						$('input[name="company_email"]').next().find('.requestbox').remove();
//					}else{
//						ispass=0;
//						$('input[name="company_email"]').next().append(ajax_returnrequiredorerror_BOX('公司邮箱格式错误'));
//					}
//				}
//				if(isNull.test(company_address)){ispass=0;$('input[name="company_address"]').next().append(ajax_returnrequiredorerror_BOX('公司地址不能为空'));}else{$('input[name="company_address"]').next().find('.requestbox').remove();}
//				if(isNull.test(company_phone)){ispass=0;$('input[name="company_phone"]').next().append(ajax_returnrequiredorerror_BOX('公司电话不能为空'));}else{$('input[name="company_phone"]').next().find('.requestbox').remove();}
//				
//				//验证姓名
//				if(isNull.test(user_realname)){ispass=0;$('input[name="user_realname"]').next().append(ajax_returnrequiredorerror_BOX('姓名不能为空'));}else{$('input[name="user_realname"]').next().find('.requestbox').remove();}
//				if(isNull.test(user_email)){
//					ispass=0;
//					$('input[name="user_email"]').next().append(ajax_returnrequiredorerror_BOX('邮箱不能为空'));
//				}else{
//					if(isEmail(user_email)){
//						$('input[name="user_email"]').next().find('.requestbox').remove();
//					}else{
//						ispass=0;
//						$('input[name="user_email"]').next().append(ajax_returnrequiredorerror_BOX('邮箱格式错误'));
//					}
//				}
				
				if(ispass == 1){
					$.post(baseurl+'index.php/admins/user/edit_user/'+uid, {
						//返回url
						backurl: backurl,
						//用户信息
						user_nickname: user_nickname,
						user_realname: user_realname,
						user_sex: 0,
						user_email: user_email,
						password: password,
						//公司信息
						company_name: company_name,
						company_title: company_title,
						company_email: company_email,
						company_address: company_address,
						company_phone: company_phone,
						img1_gksel: img1_gksel
					},function (data){
						var obj = eval( "(" + data + ")" );
						actionsubmit_button.html('<img class="icon_success" src="'+baseurl+'themes/default/images/global_ok.png"/><span>'+L['cy_save_success']+'</span>');
						location.href = obj.backurl;
					})
				}else{
					actionsubmit_button.attr('class', 'gksel_btn_action_on');
					actionsubmit_button.html(L['cy_save']);
					isajaxsaveing = 0;//ajax正在保存中 --- 释放
				}
			}else if(user_type == 3){//内容提供者
				//用户信息
				var user_nickname = $('input[name="user_nickname"]').val();
				var user_realname = $('input[name="user_realname"]').val();
				var user_email = $('input[name="user_email"]').val();
				var password = $('input[name="password"]').val();
				
				//验证姓名
//				if(isNull.test(user_realname)){ispass=0;$('input[name="user_realname"]').next().append(ajax_returnrequiredorerror_BOX('姓名不能为空'));}else{$('input[name="user_realname"]').next().find('.requestbox').remove();}
//				if(isNull.test(user_email)){
//					ispass=0;
//					$('input[name="user_email"]').next().append(ajax_returnrequiredorerror_BOX('邮箱不能为空'));
//				}else{
//					if(isEmail(user_email)){
//						$('input[name="user_email"]').next().find('.requestbox').remove();
//					}else{
//						ispass=0;
//						$('input[name="user_email"]').next().append(ajax_returnrequiredorerror_BOX('邮箱格式错误'));
//					}
//				}
				
				if(ispass == 1){
					$.post(baseurl+'index.php/admins/user/edit_user/'+uid, {
						//返回url
						backurl: backurl,
						//用户信息
						user_nickname: user_nickname,
						user_realname: user_realname,
						user_sex: 0,
						user_email: user_email,
						password: password,
						//公司信息
						company_name: company_name,
						company_title: company_title,
						company_email: company_email,
						company_address: company_address,
						company_phone: company_phone,
						img1_gksel: img1_gksel
					},function (data){
						var obj = eval( "(" + data + ")" );
						actionsubmit_button.html('<img class="icon_success" src="'+baseurl+'themes/default/images/global_ok.png"/><span>'+L['cy_save_success']+'</span>');
						location.href = obj.backurl;
					})
				}else{
					actionsubmit_button.attr('class', 'gksel_btn_action_on');
					actionsubmit_button.html(L['cy_save']);
					isajaxsaveing = 0;//ajax正在保存中 --- 释放
				}
			}
			
			
		}
	}
	//用户地址信息---保存
	function tosave_useraddressinfo(uid, address_id){
		if(isajaxsaveing == 0){
			//具体点击的按钮
			actionsubmit_button = $('div[onclick="tosave_useraddressinfo('+uid+', '+address_id+')"]');
			//ajax正在保存中
			isajaxsaveing = 1;
			//返回url
			var backurl = $('input[name="backurl"]').val();
			//将提交按钮设置为保存中
			actionsubmit_button.attr('class', 'gksel_btn_action_off');
			actionsubmit_button.html('<img class="icon_loading" src="'+baseurl+'themes/default/images/ajax_loading.gif"/><span>'+L['cy_saving']+'...</span>');
			
			//用户信息
			var address_realname = $('input[name="address_realname"]').val();
			var address_phone = $('input[name="address_phone"]').val();
			var address_email = $('input[name="address_email"]').val();
			var provinceID = $('select[name="provinceID"]').val();
			var cityID = $('select[name="cityID"]').val();
			var areaID = $('select[name="areaID"]').val();
			var address_street_address = $('input[name="address_street_address"]').val();
			var address_zip_code = $('input[name="address_zip_code"]').val();
			var ispass=1;
			//验证姓名
			if(isNull.test(address_realname)){ispass=0;$('input[name="address_realname"]').next().append(ajax_returnrequiredorerror_BOX('姓名不能为空'));}else{$('input[name="address_realname"]').next().find('.requestbox').remove();}
			//验证联系人手机号码
			if(isNull.test(address_phone)){ispass = 0;$('input[name="address_phone"]').next().append(ajax_returnrequiredorerror_BOX('手机号码不能为空'));}else{if(isPhone(address_phone)==false){ispass = 0;$('input[name="address_phone"]').next().append(ajax_returnrequiredorerror_BOX('手机号码格式错误'));}else{$('input[name="address_phone"]').next().find('.requestbox').remove();}}
			if(isNull.test(address_email)){ispass = 0;$('input[name="address_email"]').next().append(ajax_returnrequiredorerror_BOX('邮箱不能为空'));}else{if(isEmail(address_email)==false){ispass = 0;$('input[name="address_email"]').next().append(ajax_returnrequiredorerror_BOX('邮箱格式错误'));}else{$('input[name="address_email"]').next().find('.requestbox').remove();}}
			if(isNull.test(provinceID) || provinceID == 0){ispass=0;$('select[name="provinceID"]').next().append(ajax_returnrequiredorerror_BOX('省份不能为空'));}else{$('select[name="provinceID"]').next().find('.requestbox').remove();}
			if(isNull.test(cityID) || cityID == 0){ispass=0;$('select[name="cityID"]').next().append(ajax_returnrequiredorerror_BOX('城市不能为空'));}else{$('select[name="cityID"]').next().find('.requestbox').remove();}
			if(isNull.test(areaID) || areaID == 0){ispass=0;$('select[name="areaID"]').next().append(ajax_returnrequiredorerror_BOX('区域不能为空'));}else{$('select[name="areaID"]').next().find('.requestbox').remove();}
			if(isNull.test(address_street_address)){ispass=0;$('input[name="address_street_address"]').next().append(ajax_returnrequiredorerror_BOX('详细地址不能为空'));}else{$('input[name="address_street_address"]').next().find('.requestbox').remove();}
			if(isNull.test(address_zip_code)){ispass=0;$('input[name="address_zip_code"]').next().append(ajax_returnrequiredorerror_BOX('邮编不能为空'));}else{$('input[name="address_zip_code"]').next().find('.requestbox').remove();}
			
			if(ispass == 1){
				$.post(baseurl+'index.php/admins/user/edit_address/'+uid+'/'+address_id, {
					//返回url
					backurl: backurl,
					//用户信息
					address_realname: address_realname,
					address_phone: address_phone,
					address_email: address_email,
					provinceID: provinceID,
					cityID: cityID,
					areaID: areaID,
					address_street_address: address_street_address,
					address_zip_code: address_zip_code
				},function (data){
					var obj = eval( "(" + data + ")" );
					actionsubmit_button.html('<img class="icon_success" src="'+baseurl+'themes/default/images/global_ok.png"/><span>'+L['cy_save_success']+'</span>');
//					isajaxsaveing = 0;//ajax正在保存中 --- 释放
					location.href = obj.backurl;
				})
			}else{
				actionsubmit_button.attr('class', 'gksel_btn_action_on');
				actionsubmit_button.html(L['cy_save']);
				isajaxsaveing = 0;//ajax正在保存中 --- 释放
			}
		}
	}
	
	
	//管理员助手信息---保存
	function toadd_admininfo(admin_type){
		if(isajaxsaveing == 0){
			//具体点击的按钮
			actionsubmit_button = $('div[onclick="toadd_admininfo('+admin_type+')"]');
			//ajax正在保存中
			isajaxsaveing = 1;
			//返回url
			var backurl = $('input[name="backurl"]').val();
			//将提交按钮设置为保存中
			actionsubmit_button.attr('class', 'gksel_btn_action_off');
			actionsubmit_button.html('<img class="icon_loading" src="'+baseurl+'themes/default/images/ajax_loading.gif"/><span>'+L['cy_saving']+'...</span>');
			
			//用户信息
			var admin_username = $('input[name="admin_username"]').val();
			var admin_phone = $('input[name="admin_phone"]').val();
			var admin_email = $('input[name="admin_email"]').val();
			var admin_sex = $('input[name="admin_sex"]').val();
			var admin_password = $('input[name="admin_password"]').val();
			var admin_roles = [];
			if(admin_roles_arr.length > 0){
				for(var i = 0; i < admin_roles_arr.length; i++){
					if(admin_roles_arr[i].checked == true){
						admin_roles.push(admin_roles_arr[i].value);
					}
				}
			}
			var ispass=1;
			//验证姓名
			if(isNull.test(admin_username)){ispass=0;$('input[name="admin_username"]').next().append(ajax_returnrequiredorerror_BOX('用户名不能为空'));}else{$('input[name="admin_username"]').next().find('.requestbox').remove();}
			if(isNull.test(admin_password)){ispass=0;$('input[name="admin_password"]').next().append(ajax_returnrequiredorerror_BOX('密码不能为空'));}else{$('input[name="admin_password"]').next().find('.requestbox').remove();}
			//验证联系人手机号码
			if(isNull.test(admin_phone)){ispass = 0;$('input[name="admin_phone"]').next().append(ajax_returnrequiredorerror_BOX('手机号码不能为空'));}else{if(isPhone(admin_phone)==false){ispass = 0;$('input[name="admin_phone"]').next().append(ajax_returnrequiredorerror_BOX('手机号码格式错误'));}else{$('input[name="admin_phone"]').next().find('.requestbox').remove();}}
			if(isNull.test(admin_email)){ispass = 0;$('input[name="admin_email"]').next().append(ajax_returnrequiredorerror_BOX('邮箱不能为空'));}else{if(isEmail(admin_email)==false){ispass = 0;$('input[name="admin_email"]').next().append(ajax_returnrequiredorerror_BOX('邮箱格式错误'));}else{$('input[name="admin_email"]').next().find('.requestbox').remove();}}
			
			if(ispass == 1){
				$.post(baseurl+'index.php/admins/user/add_adminassistant/'+admin_type, {
					//返回url
					backurl: backurl,
					//用户信息
					admin_username: admin_username,
					admin_phone: admin_phone,
					admin_email: admin_email,
					admin_sex: admin_sex,
					admin_password: admin_password,
					admin_roles: admin_roles
				},function (data){
					var obj = eval( "(" + data + ")" );
					actionsubmit_button.html('<img class="icon_success" src="'+baseurl+'themes/default/images/global_ok.png"/><span>'+L['cy_save_success']+'</span>');
//					isajaxsaveing = 0;//ajax正在保存中 --- 释放
					location.href = obj.backurl;
				})
			}else{
				actionsubmit_button.attr('class', 'gksel_btn_action_on');
				actionsubmit_button.html(L['cy_save']);
				isajaxsaveing = 0;//ajax正在保存中 --- 释放
			}
		}
	}
	
	
	
	//管理员助手信息---保存
	function tosave_admininfo(admin_type, admin_id){
		if(isajaxsaveing == 0){
			//具体点击的按钮
			actionsubmit_button = $('div[onclick="tosave_admininfo('+admin_type+', '+admin_id+')"]');
			//ajax正在保存中
			isajaxsaveing = 1;
			//返回url
			var backurl = $('input[name="backurl"]').val();
			//将提交按钮设置为保存中
			actionsubmit_button.attr('class', 'gksel_btn_action_off');
			actionsubmit_button.html('<img class="icon_loading" src="'+baseurl+'themes/default/images/ajax_loading.gif"/><span>'+L['cy_saving']+'...</span>');

			//用户信息
			var admin_username = $('input[name="admin_username"]').val();
			var admin_phone = $('input[name="admin_phone"]').val();
			var admin_email = $('input[name="admin_email"]').val();
			var admin_sex = $('input[name="admin_sex"]').val();
			var admin_password = $('input[name="admin_password"]').val();
			var admin_roles_arr = $('input[name="admin_roles[]"]');
			var admin_roles = [];
			if(admin_roles_arr.length > 0){
				for(var i = 0; i < admin_roles_arr.length; i++){
					if(admin_roles_arr[i].checked == true){
						admin_roles.push(admin_roles_arr[i].value);
					}
				}
			}
			
			var ispass=1;
			//验证姓名
			if(isNull.test(admin_username)){ispass=0;$('input[name="admin_username"]').next().append(ajax_returnrequiredorerror_BOX('用户名不能为空'));}else{$('input[name="admin_username"]').next().find('.requestbox').remove();}
			//验证联系人手机号码
			if(isNull.test(admin_phone)){ispass = 0;$('input[name="admin_phone"]').next().append(ajax_returnrequiredorerror_BOX('手机号码不能为空'));}else{if(isPhone(admin_phone)==false){ispass = 0;$('input[name="admin_phone"]').next().append(ajax_returnrequiredorerror_BOX('手机号码格式错误'));}else{$('input[name="admin_phone"]').next().find('.requestbox').remove();}}
			if(isNull.test(admin_email)){ispass = 0;$('input[name="admin_email"]').next().append(ajax_returnrequiredorerror_BOX('邮箱不能为空'));}else{if(isEmail(admin_email)==false){ispass = 0;$('input[name="admin_email"]').next().append(ajax_returnrequiredorerror_BOX('邮箱格式错误'));}else{$('input[name="admin_email"]').next().find('.requestbox').remove();}}
			
			if(ispass == 1){
				$.post(baseurl+'index.php/admins/user/edit_adminassistant/'+admin_type+'/'+admin_id, {
					//返回url
					backurl: backurl,
					//用户信息
					admin_username: admin_username,
					admin_phone: admin_phone,
					admin_email: admin_email,
					admin_sex: admin_sex,
					admin_password: admin_password,
					admin_roles: admin_roles
				},function (data){
					var obj = eval( "(" + data + ")" );
					actionsubmit_button.html('<img class="icon_success" src="'+baseurl+'themes/default/images/global_ok.png"/><span>'+L['cy_save_success']+'</span>');
//					isajaxsaveing = 0;//ajax正在保存中 --- 释放
					location.href = obj.backurl;
				})
			}else{
				actionsubmit_button.attr('class', 'gksel_btn_action_on');
				actionsubmit_button.html(L['cy_save']);
				isajaxsaveing = 0;//ajax正在保存中 --- 释放
			}
		}
	}
	//用户信息---助理---保存
	function toadd_assistantinfo(user_type, parent){
		
		if(isajaxsaveing == 0){
			//具体点击的按钮
			actionsubmit_button = $('div[onclick="toadd_assistantinfo('+user_type+', '+parent+')"]');
			//ajax正在保存中
			isajaxsaveing = 1;
			//返回url
			var backurl = $('input[name="backurl"]').val();
			//将提交按钮设置为保存中
			actionsubmit_button.attr('class', 'gksel_btn_action_off');
			actionsubmit_button.html('<img class="icon_loading" src="'+baseurl+'themes/default/images/ajax_loading.gif"/><span>'+L['cy_saving']+'...</span>');
			
			var ispass=1;
			//用户信息
			var user_nickname = $('input[name="user_nickname"]').val();
			var user_realname = $('input[name="user_realname"]').val();
			var user_sex = $('select[name="user_sex"]').val();
			var user_phone = $('input[name="user_phone"]').val();
			var user_email = $('input[name="user_email"]').val();
			var password = $('input[name="password"]').val();
			var user_profile = $('textarea[name="user_profile"]').val();
			
			//验证姓名
			if(isNull.test(user_realname)){ispass=0;$('input[name="user_realname"]').next().append(ajax_returnrequiredorerror_BOX('姓名不能为空'));}else{$('input[name="user_realname"]').next().find('.requestbox').remove();}
			//验证手机号码
//			if(isNull.test(user_phone)){ispass=0;$('input[name="user_phone"]').next().append(ajax_returnrequiredorerror_BOX('手机号码不能为空'));}else{if(isPhone(user_phone)){$('input[name="user_phone"]').next().find('.requestbox').remove();}else{ispass=0;$('input[name="user_phone"]').next().append(ajax_returnrequiredorerror_BOX('手机号码格式错误'));}}
		
			if(ispass == 1){
				$.post(baseurl+'index.php/admins/user/add_assistant/'+user_type+'/'+parent, {
					//返回url
					backurl: backurl,
					//用户信息
					user_nickname: user_nickname,
					user_realname: user_realname,
					user_sex: user_sex,
					user_phone: user_phone,
					user_email: user_email,
					password: password,
					user_profile: user_profile
				},function (data){
					var obj = eval( "(" + data + ")" );
					actionsubmit_button.html('<img class="icon_success" src="'+baseurl+'themes/default/images/global_ok.png"/><span>'+L['cy_save_success']+'</span>');
					location.href = baseurl+'index.php/admins/user/assistant_list/'+user_type+'/'+parent+'?backurl='+backurl;
				})
			}else{
				actionsubmit_button.attr('class', 'gksel_btn_action_on');
				actionsubmit_button.html(L['cy_save']);
				isajaxsaveing = 0;//ajax正在保存中 --- 释放
			}
			
		}
	}
	//用户信息---助理---保存
	function tosave_assistantinfo(user_type, parent, uid){
		
		if(isajaxsaveing == 0){
			//具体点击的按钮
			actionsubmit_button = $('div[onclick="tosave_assistantinfo('+user_type+', '+parent+', '+uid+')"]');
			//ajax正在保存中
			isajaxsaveing = 1;
			//返回url
			var backurl = $('input[name="backurl"]').val();
			//将提交按钮设置为保存中
			actionsubmit_button.attr('class', 'gksel_btn_action_off');
			actionsubmit_button.html('<img class="icon_loading" src="'+baseurl+'themes/default/images/ajax_loading.gif"/><span>'+L['cy_saving']+'...</span>');
			
			var ispass=1;
			//用户信息
			var user_nickname = $('input[name="user_nickname"]').val();
			var user_realname = $('input[name="user_realname"]').val();
			var user_sex = $('select[name="user_sex"]').val();
			var user_phone = $('input[name="user_phone"]').val();
			var user_email = $('input[name="user_email"]').val();
			var password = $('input[name="password"]').val();
			var user_profile = $('textarea[name="user_profile"]').val();
			
			//验证姓名
			if(isNull.test(user_realname)){ispass=0;$('input[name="user_realname"]').next().append(ajax_returnrequiredorerror_BOX('姓名不能为空'));}else{$('input[name="user_realname"]').next().find('.requestbox').remove();}
			//验证手机号码
//			if(isNull.test(user_phone)){ispass=0;$('input[name="user_phone"]').next().append(ajax_returnrequiredorerror_BOX('手机号码不能为空'));}else{if(isPhone(user_phone)){$('input[name="user_phone"]').next().find('.requestbox').remove();}else{ispass=0;$('input[name="user_phone"]').next().append(ajax_returnrequiredorerror_BOX('手机号码格式错误'));}}
		
			if(ispass == 1){
				$.post(baseurl+'index.php/admins/user/edit_assistant/'+user_type+'/'+parent+'/'+uid, {
					//返回url
					backurl: backurl,
					//用户信息
					user_nickname: user_nickname,
					user_realname: user_realname,
					user_sex: user_sex,
					user_phone: user_phone,
					user_email: user_email,
					password: password,
					user_profile: user_profile
				},function (data){
					var obj = eval( "(" + data + ")" );
					actionsubmit_button.html('<img class="icon_success" src="'+baseurl+'themes/default/images/global_ok.png"/><span>'+L['cy_save_success']+'</span>');
					location.href = baseurl+'index.php/admins/user/assistant_list/'+user_type+'/'+parent+'?backurl='+backurl;
				})
			}else{
				actionsubmit_button.attr('class', 'gksel_btn_action_on');
				actionsubmit_button.html(L['cy_save']);
				isajaxsaveing = 0;//ajax正在保存中 --- 释放
			}
			
		}
	}
	//积分设置---保存
	function tosave_userpointsetting(pointsetting_id){
		
		if(isajaxsaveing == 0){
			//具体点击的按钮
			actionsubmit_button = $('div[onclick="tosave_userpointsetting('+pointsetting_id+')"]');
			//ajax正在保存中
			isajaxsaveing = 1;
			//返回url
			var backurl = $('input[name="backurl"]').val();
			//将提交按钮设置为保存中
			actionsubmit_button.attr('class', 'gksel_btn_action_off');
			actionsubmit_button.html('<img class="icon_loading" src="'+baseurl+'themes/default/images/ajax_loading.gif"/><span>'+L['cy_saving']+'...</span>');
			
			var ispass=1;
			//用户信息
			var pointsetting_value = $('input[name="pointsetting_value"]').val();
			if(isNull.test(pointsetting_value)){
				ispass=0;
				$('input[name="pointsetting_value"]').next().append(ajax_returnrequiredorerror_BOX('积分不能为空'));
			}else{
				if(isIntval(pointsetting_value)){
					$('input[name="pointsetting_value"]').next().find('.requestbox').remove();
				}else{
					ispass=0;
					$('input[name="pointsetting_value"]').next().append(ajax_returnrequiredorerror_BOX('积分格式错误'));
				}
			}
				
				if(ispass == 1){
					$.post(baseurl+'index.php/admins/user/edit_pointsetting/'+pointsetting_id, {
						//返回url
						backurl: backurl,
						//用户信息
						pointsetting_value: pointsetting_value
					},function (data){
						var obj = eval( "(" + data + ")" );
						actionsubmit_button.html('<img class="icon_success" src="'+baseurl+'themes/default/images/global_ok.png"/><span>'+L['cy_save_success']+'</span>');
						location.href = obj.backurl;
					})
				}else{
					actionsubmit_button.attr('class', 'gksel_btn_action_on');
					actionsubmit_button.html(L['cy_save']);
					isajaxsaveing = 0;//ajax正在保存中 --- 释放
				}
			
			
		}
	}
	
	
	
	//用户FORM---添加
	function toadd_forminfo(uid){
		var lancodelist = getlancodelist();
		if(isajaxsaveing == 0){
			//具体点击的按钮
			actionsubmit_button = $('div[onclick="toadd_forminfo('+uid+')"]');
			//ajax正在保存中
			isajaxsaveing = 1;
			//返回url
			var backurl = $('input[name="backurl"]').val();
			var subbackurl = $('input[name="subbackurl"]').val();
			//将提交按钮设置为保存中
			actionsubmit_button.attr('class', 'gksel_btn_action_off');
			actionsubmit_button.html('<img class="icon_loading" src="'+baseurl+'themes/default/images/ajax_loading.gif"/><span>Saving...</span>');
			
			//----定义的字段------START
			var GETOBJ = [];
			var GETOBJ_num = 0;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'form_name';
			GETOBJ[GETOBJ_num]['field_realname'] = 'form_name';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = 'Name';

			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'form_number';
			GETOBJ[GETOBJ_num]['field_realname'] = 'form_number';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = '单号';

			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'form_getno';
			GETOBJ[GETOBJ_num]['field_realname'] = 'form_getno';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = '取号';
			
			
			//头部表格
			
			//Jacket length(Front) 夹克长(前边)
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'jacketlength_body';
			GETOBJ[GETOBJ_num]['field_realname'] = 'jacketlength_body';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = '';
			
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'jacketlength_suit';
			GETOBJ[GETOBJ_num]['field_realname'] = 'jacketlength_suit';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = '';

			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'jacketlength_shirt';
			GETOBJ[GETOBJ_num]['field_realname'] = 'jacketlength_shirt';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = '';

			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'jacketlength_vest';
			GETOBJ[GETOBJ_num]['field_realname'] = 'jacketlength_vest';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = '';

			//Shoulder width
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'shoulderwidth_body';
			GETOBJ[GETOBJ_num]['field_realname'] = 'shoulderwidth_body';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = '';
			
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'shoulderwidth_suit';
			GETOBJ[GETOBJ_num]['field_realname'] = 'shoulderwidth_suit';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = '';

			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'shoulderwidth_shirt';
			GETOBJ[GETOBJ_num]['field_realname'] = 'shoulderwidth_shirt';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = '';

			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'shoulderwidth_vest';
			GETOBJ[GETOBJ_num]['field_realname'] = 'shoulderwidth_vest';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = '';
			
			
			//Chest circumference
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'chestcircumference_body';
			GETOBJ[GETOBJ_num]['field_realname'] = 'chestcircumference_body';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = '';
			
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'chestcircumference_suit';
			GETOBJ[GETOBJ_num]['field_realname'] = 'chestcircumference_suit';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = '';

			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'chestcircumference_shirt';
			GETOBJ[GETOBJ_num]['field_realname'] = 'chestcircumference_shirt';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = '';

			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'chestcircumference_vest';
			GETOBJ[GETOBJ_num]['field_realname'] = 'chestcircumference_vest';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = '';

			//Stomach bust<br>夹克腰围
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'stomachbust_body';
			GETOBJ[GETOBJ_num]['field_realname'] = 'stomachbust_body';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = '';
			
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'stomachbust_suit';
			GETOBJ[GETOBJ_num]['field_realname'] = 'stomachbust_suit';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = '';

			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'stomachbust_shirt';
			GETOBJ[GETOBJ_num]['field_realname'] = 'stomachbust_shirt';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = '';

			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'stomachbust_vest';
			GETOBJ[GETOBJ_num]['field_realname'] = 'stomachbust_vest';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = '';
			
			//Jacket circumference<br>夹克臀围
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'jacketcircumference_body';
			GETOBJ[GETOBJ_num]['field_realname'] = 'jacketcircumference_body';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = '';
			
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'jacketcircumference_suit';
			GETOBJ[GETOBJ_num]['field_realname'] = 'jacketcircumference_suit';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = '';

			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'jacketcircumference_shirt';
			GETOBJ[GETOBJ_num]['field_realname'] = 'jacketcircumference_shirt';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = '';

			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'jacketcircumference_vest';
			GETOBJ[GETOBJ_num]['field_realname'] = 'jacketcircumference_vest';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = '';

			//Sleeve length<br>夹克袖长
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'sleevelength_body';
			GETOBJ[GETOBJ_num]['field_realname'] = 'sleevelength_body';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = '';
			
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'sleevelength_suit';
			GETOBJ[GETOBJ_num]['field_realname'] = 'sleevelength_suit';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = '';

			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'sleevelength_shirt';
			GETOBJ[GETOBJ_num]['field_realname'] = 'sleevelength_shirt';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = '';

			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'sleevelength_vest';
			GETOBJ[GETOBJ_num]['field_realname'] = 'sleevelength_vest';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = '';
			
			
			//Bicep circumference<br>袖肥
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'bicepcircumference_body';
			GETOBJ[GETOBJ_num]['field_realname'] = 'bicepcircumference_body';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = '';
			
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'bicepcircumference_suit';
			GETOBJ[GETOBJ_num]['field_realname'] = 'bicepcircumference_suit';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = '';

			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'bicepcircumference_shirt';
			GETOBJ[GETOBJ_num]['field_realname'] = 'bicepcircumference_shirt';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = '';

			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'bicepcircumference_vest';
			GETOBJ[GETOBJ_num]['field_realname'] = 'bicepcircumference_vest';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = '';


			//Wrist circumference<br>袖口
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'wristcircumference_body';
			GETOBJ[GETOBJ_num]['field_realname'] = 'wristcircumference_body';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = '';
			
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'wristcircumference_suit';
			GETOBJ[GETOBJ_num]['field_realname'] = 'wristcircumference_suit';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = '';

			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'wristcircumference_shirt';
			GETOBJ[GETOBJ_num]['field_realname'] = 'wristcircumference_shirt';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = '';

			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'wristcircumference_vest';
			GETOBJ[GETOBJ_num]['field_realname'] = 'wristcircumference_vest';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = '';
			
			//Neck circumference领围
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'neckcircumference_body';
			GETOBJ[GETOBJ_num]['field_realname'] = 'neckcircumference_body';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = '';
			
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'neckcircumference_suit';
			GETOBJ[GETOBJ_num]['field_realname'] = 'neckcircumference_suit';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = '';

			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'neckcircumference_shirt';
			GETOBJ[GETOBJ_num]['field_realname'] = 'neckcircumference_shirt';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = '';

			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'neckcircumference_vest';
			GETOBJ[GETOBJ_num]['field_realname'] = 'neckcircumference_vest';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = '';
			
			
			//表格右边
			
			//Outside leg <br>length<br>裤子长
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'outsideleglength_body';
			GETOBJ[GETOBJ_num]['field_realname'] = 'outsideleglength_body';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = '';
			
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'outsideleglength_suit';
			GETOBJ[GETOBJ_num]['field_realname'] = 'outsideleglength_suit';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = '';
			
			//Waist measurement<br>裤子腰围
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'waistmeasurement_body';
			GETOBJ[GETOBJ_num]['field_realname'] = 'waistmeasurement_body';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = '';
			
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'waistmeasurement_suit';
			GETOBJ[GETOBJ_num]['field_realname'] = 'waistmeasurement_suit';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = '';
			
			//Arm-Hole Loop<br>臂圈
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'gluteuscircumference_body';
			GETOBJ[GETOBJ_num]['field_realname'] = 'gluteuscircumference_body';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = '';
			
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'gluteuscircumference_suit';
			GETOBJ[GETOBJ_num]['field_realname'] = 'gluteuscircumference_suit';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = '';
			
			
			//Thigh circumference<br>大腿围
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'thighcircumference_body';
			GETOBJ[GETOBJ_num]['field_realname'] = 'thighcircumference_body';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = '';
			
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'thighcircumference_suit';
			GETOBJ[GETOBJ_num]['field_realname'] = 'thighcircumference_suit';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = '';
			
			//Crotch rise<br>直裆长
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'crotchrise_body';
			GETOBJ[GETOBJ_num]['field_realname'] = 'crotchrise_body';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = '';
			
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'crotchrise_suit';
			GETOBJ[GETOBJ_num]['field_realname'] = 'crotchrise_suit';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = '';
			
			
			//Hamstring circumference<br>中裆围
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'hamstringcircumference_body';
			GETOBJ[GETOBJ_num]['field_realname'] = 'hamstringcircumference_body';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = '';
			
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'hamstringcircumference_suit';
			GETOBJ[GETOBJ_num]['field_realname'] = 'hamstringcircumference_suit';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = '';
			
			
			//Calf circumference<br>小腿围
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'calfcircumference_body';
			GETOBJ[GETOBJ_num]['field_realname'] = 'calfcircumference_body';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = '';
			
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'calfcircumference_suit';
			GETOBJ[GETOBJ_num]['field_realname'] = 'calfcircumference_suit';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = '';
			
			//Ankle circumference<br>脚口围
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'anklecircumference_body';
			GETOBJ[GETOBJ_num]['field_realname'] = 'anklecircumference_body';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = '';
			
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'anklecircumference_suit';
			GETOBJ[GETOBJ_num]['field_realname'] = 'anklecircumference_suit';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = '';
			
			
			
			//表格下面
			//西装料号Suit Code:
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'suit_code';
			GETOBJ[GETOBJ_num]['field_realname'] = 'suit_code';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = 'Suit Code:';
			
			//夹克编号Blazer Code:
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'blazer_code';
			GETOBJ[GETOBJ_num]['field_realname'] = 'blazer_code';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = '夹克编号Blazer Code:';
			
			
			//裤子编号Pants Code:
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'pants_code';
			GETOBJ[GETOBJ_num]['field_realname'] = 'pants_code';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = '裤子编号Pants Code';
			//衬衫编号Shirt Code:
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'shirt_code';
			GETOBJ[GETOBJ_num]['field_realname'] = 'shirt_code';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = '衬衫编号Shirt Code:';
			//马甲编号Waistcoat Code:
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'waistcoat_code';
			GETOBJ[GETOBJ_num]['field_realname'] = 'waistcoat_code';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = '马甲编号Waistcoat Code:';
			//无里布No Lining:
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'no_lining';
			GETOBJ[GETOBJ_num]['field_realname'] = 'no_lining';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = '无里布No Lining:';
			//半里布Half Lined
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'half_lined';
			GETOBJ[GETOBJ_num]['field_realname'] = 'half_lined';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = '半里布Half Lined';
			
			//-------------------------------1-5--------------------------------
			
			//Suit fitting
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'suitfitting_id';
			GETOBJ[GETOBJ_num]['field_realname'] = 'suitfitting_id';
			GETOBJ[GETOBJ_num]['field_type'] = "radio";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = 'Suit fitting';
			
			
			//Lapels
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'lapels_id';
			GETOBJ[GETOBJ_num]['field_realname'] = 'lapels_id';
			GETOBJ[GETOBJ_num]['field_type'] = "radio";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = 'Lapels';
			
			//Vents
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'vents_id';
			GETOBJ[GETOBJ_num]['field_realname'] = 'vents_id';
			GETOBJ[GETOBJ_num]['field_type'] = "radio";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = 'Vents';
			
			//Jacket buttons (夹克纽子)
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'jacketbuttons_id';
			GETOBJ[GETOBJ_num]['field_realname'] = 'jacketbuttons_id';
			GETOBJ[GETOBJ_num]['field_type'] = "radio";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = 'Jacket buttons (夹克纽子)';
			
			//Jacket pockets（夹克口袋） 
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'jacketpockets_id';
			GETOBJ[GETOBJ_num]['field_realname'] = 'jacketpockets_id';
			GETOBJ[GETOBJ_num]['field_type'] = "radio";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = 'Vents';
			
			//-------------------------------6--------------------------------
			
			//里布号
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'in_cloth';
			GETOBJ[GETOBJ_num]['field_realname'] = 'in_cloth';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = '里布号';
			//半里布:
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'half_cloth';
			GETOBJ[GETOBJ_num]['field_realname'] = 'half_cloth';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = '半里布';
			//无里布
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'no_cloth';
			GETOBJ[GETOBJ_num]['field_realname'] = 'no_cloth';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = '无里布';
			//扣子号
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'button_size';
			GETOBJ[GETOBJ_num]['field_realname'] = 'button_size';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = '扣子号';
			
			
			//Picked 贡针
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'pickeds_id';
			GETOBJ[GETOBJ_num]['field_realname'] = 'pickeds_id';
			GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = 'Picked 贡针';
			
			//several_id 几个
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'several_id';
			GETOBJ[GETOBJ_num]['field_realname'] = 'several_id';
			GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = 'several_id 几个';
			
			//color_id 颜色
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'color_id';
			GETOBJ[GETOBJ_num]['field_realname'] = 'color_id';
			GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = 'color_id 颜色';
			
			//milanese_id3
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'milanese_id';
			GETOBJ[GETOBJ_num]['field_realname'] = 'milanese_id';
			GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = 'milanese_id3';
			
			//cross_id4
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'cross_id';
			GETOBJ[GETOBJ_num]['field_realname'] = 'cross_id';
			GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = 'cross_id4';
			
			//calling_id1
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'calling_id';
			GETOBJ[GETOBJ_num]['field_realname'] = 'calling_id';
			GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = 'calling_id1';
			
			//pen_id2
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'pen_id';
			GETOBJ[GETOBJ_num]['field_realname'] = 'pen_id';
			GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = 'pen_id2';
			
			//hem_id3
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'hem_id';
			GETOBJ[GETOBJ_num]['field_realname'] = 'hem_id';
			GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = 'hem_id3';
			
			//ticket_id4
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'ticket_id';
			GETOBJ[GETOBJ_num]['field_realname'] = 'ticket_id';
			GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = 'ticket_id4';
			
			//loops_id1
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'loops_id';
			GETOBJ[GETOBJ_num]['field_realname'] = 'loops_id';
			GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = 'loops_id1';
			
			//side_id2
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'side_id';
			GETOBJ[GETOBJ_num]['field_realname'] = 'side_id';
			GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = 'side_id2';
			
			//Design Requirements1
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'keyhole_machine';
			GETOBJ[GETOBJ_num]['field_realname'] = 'keyhole_machine';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = 'Design Requirements1';
			
			//Design Requirements2
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'milanese_handwork';
			GETOBJ[GETOBJ_num]['field_realname'] = 'milanese_handwork';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = 'Design Requirements2';
			
			//Design Requirements3
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'cross_color';
			GETOBJ[GETOBJ_num]['field_realname'] = 'cross_color';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = 'Design Requirements3';
			
			//-------------------------------7-8--------------------------------
			
			//Waistcoats（马夹 款式）
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'waistcoats_id';
			GETOBJ[GETOBJ_num]['field_realname'] = 'waistcoats_id';
			GETOBJ[GETOBJ_num]['field_type'] = "radio";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = 'Waistcoats';
			
			//Collar types（ 领子 款式
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'collartypes_id';
			GETOBJ[GETOBJ_num]['field_realname'] = 'collartypes_id';
			GETOBJ[GETOBJ_num]['field_type'] = "radio";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = 'Waistcoats';
			
			
			//-------------------------------8(追加)--------------------------------
			//#1
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'collar_types1';
			GETOBJ[GETOBJ_num]['field_realname'] = 'collar_types1';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = '#1';
			
			//#2
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'collar_types2';
			GETOBJ[GETOBJ_num]['field_realname'] = 'collar_types2';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = '#2';
			//#3
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'collar_types3';
			GETOBJ[GETOBJ_num]['field_realname'] = 'collar_types3';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = '#3';
			//#4
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'collar_types4';
			GETOBJ[GETOBJ_num]['field_realname'] = 'collar_types4';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = '#4';
			//#5
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'collar_types5';
			GETOBJ[GETOBJ_num]['field_realname'] = 'collar_types5';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = '#5';
			//#6
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'collar_types6';
			GETOBJ[GETOBJ_num]['field_realname'] = 'collar_types6';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = '#6';
			//#7
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'collar_types7';
			GETOBJ[GETOBJ_num]['field_realname'] = 'collar_types7';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = '#7';
			
			
			//collar1
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'collar1';
			GETOBJ[GETOBJ_num]['field_realname'] = 'collar1';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = 'collar1';
			//collar2
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'collar2';
			GETOBJ[GETOBJ_num]['field_realname'] = 'collar2';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = 'collar2';
			//collar3
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'collar3';
			GETOBJ[GETOBJ_num]['field_realname'] = 'collar3';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = 'collar3';
			//collar4
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'collar4';
			GETOBJ[GETOBJ_num]['field_realname'] = 'collar4';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = 'collar4';
			//collar5
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'collar5';
			GETOBJ[GETOBJ_num]['field_realname'] = 'collar5';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = 'collar5';
			//collar6
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'collar6';
			GETOBJ[GETOBJ_num]['field_realname'] = 'collar6';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = 'collar6';
			//collar7
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'collar7';
			GETOBJ[GETOBJ_num]['field_realname'] = 'collar7';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = 'collar7';
			
			
			//left_sleeveInitials1
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'left_sleeveInitials1';
			GETOBJ[GETOBJ_num]['field_realname'] = 'left_sleeveInitials1';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = 'left_sleeveInitials1';
			//left_sleeveInitials2
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'left_sleeveInitials2';
			GETOBJ[GETOBJ_num]['field_realname'] = 'left_sleeveInitials2';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = 'left_sleeveInitials2';
			//cleft_sleeveInitials3
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'left_sleeveInitials3';
			GETOBJ[GETOBJ_num]['field_realname'] = 'left_sleeveInitials3';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = 'left_sleeveInitials3';
			//left_sleeveInitials4
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'left_sleeveInitials4';
			GETOBJ[GETOBJ_num]['field_realname'] = 'left_sleeveInitials4';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = 'left_sleeveInitials4';
			//left_sleeveInitials5
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'left_sleeveInitials5';
			GETOBJ[GETOBJ_num]['field_realname'] = 'left_sleeveInitials5';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = 'left_sleeveInitials5';
			//left_sleeveInitials6
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'left_sleeveInitials6';
			GETOBJ[GETOBJ_num]['field_realname'] = 'left_sleeveInitials6';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = 'left_sleeveInitials6';
			//left_sleeveInitials7
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'left_sleeveInitials7';
			GETOBJ[GETOBJ_num]['field_realname'] = 'left_sleeveInitials7';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = 'left_sleeveInitials7';
			
			//doublecuff_id1
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'doublecuff_id1';
			GETOBJ[GETOBJ_num]['field_realname'] = 'doublecuff_id1';
			GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = 'doublecuff_id1';
			//doublecuff_id2
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'doublecuff_id2';
			GETOBJ[GETOBJ_num]['field_realname'] = 'doublecuff_id2';
			GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = 'doublecuff_id2';
			//cdoublecuff_id3
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'doublecuff_id3';
			GETOBJ[GETOBJ_num]['field_realname'] = 'doublecuff_id3';
			GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = 'doublecuff_id3';
			//doublecuff_id4
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'doublecuff_id4';
			GETOBJ[GETOBJ_num]['field_realname'] = 'doublecuff_id4';
			GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = 'doublecuff_id4';
			//doublecuff_id5
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'doublecuff_id5';
			GETOBJ[GETOBJ_num]['field_realname'] = 'doublecuff_id5';
			GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = 'doublecuff_id5';
			//doublecuff_id6
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'doublecuff_id6';
			GETOBJ[GETOBJ_num]['field_realname'] = 'doublecuff_id6';
			GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = 'doublecuff_id6';
			//doublecuff_id7
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'doublecuff_id7';
			GETOBJ[GETOBJ_num]['field_realname'] = 'doublecuff_id7';
			GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = 'doublecuff_id7';
			
			
			//shortsleeves_id1
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'shortsleeves_id1';
			GETOBJ[GETOBJ_num]['field_realname'] = 'shortsleeves_id1';
			GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = 'shortsleeves_id1';
			//shortsleeves_id2
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'shortsleeves_id2';
			GETOBJ[GETOBJ_num]['field_realname'] = 'shortsleeves_id2';
			GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = 'shortsleeves_id2';
			//cshortsleeves_id3
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'shortsleeves_id3';
			GETOBJ[GETOBJ_num]['field_realname'] = 'shortsleeves_id3';
			GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = 'shortsleeves_id3';
			//shortsleeves_id4
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'shortsleeves_id4';
			GETOBJ[GETOBJ_num]['field_realname'] = 'shortsleeves_id4';
			GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = 'shortsleeves_id4';
			//shortsleeves_id5
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'shortsleeves_id5';
			GETOBJ[GETOBJ_num]['field_realname'] = 'shortsleeves_id5';
			GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = 'shortsleeves_id5';
			//shortsleeves_id6
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'shortsleeves_id6';
			GETOBJ[GETOBJ_num]['field_realname'] = 'shortsleeves_id6';
			GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = 'shortsleeves_id6';
			//shortsleeves_id7
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'shortsleeves_id7';
			GETOBJ[GETOBJ_num]['field_realname'] = 'shortsleeves_id7';
			GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = 'shortsleeves_id7';
			
			//chestpocket_id1
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'chestpocket_id1';
			GETOBJ[GETOBJ_num]['field_realname'] = 'chestpocket_id1';
			GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = 'chestpocket_id1';
			//chestpocket_id2
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'chestpocket_id2';
			GETOBJ[GETOBJ_num]['field_realname'] = 'chestpocket_id2';
			GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = 'chestpocket_id2';
			//cchestpocket_id3
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'chestpocket_id3';
			GETOBJ[GETOBJ_num]['field_realname'] = 'chestpocket_id3';
			GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = 'chestpocket_id3';
			//chestpocket_id4
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'chestpocket_id4';
			GETOBJ[GETOBJ_num]['field_realname'] = 'chestpocket_id4';
			GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = 'chestpocket_id4';
			//chestpocket_id5
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'chestpocket_id5';
			GETOBJ[GETOBJ_num]['field_realname'] = 'chestpocket_id5';
			GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = 'chestpocket_id5';
			//chestpocket_id6
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'chestpocket_id6';
			GETOBJ[GETOBJ_num]['field_realname'] = 'chestpocket_id6';
			GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = 'chestpocket_id6';
			//chestpocket_id7
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'chestpocket_id7';
			GETOBJ[GETOBJ_num]['field_realname'] = 'chestpocket_id7';
			GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = 'chestpocket_id7';
			
			
			//hiddenbuttons_id1
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'hiddenbuttons_id1';
			GETOBJ[GETOBJ_num]['field_realname'] = 'hiddenbuttons_id1';
			GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = 'hiddenbuttons_id1';
			//hiddenbuttons_id2
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'hiddenbuttons_id2';
			GETOBJ[GETOBJ_num]['field_realname'] = 'hiddenbuttons_id2';
			GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = 'hiddenbuttons_id2';
			//chiddenbuttons _id3
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'hiddenbuttons_id3';
			GETOBJ[GETOBJ_num]['field_realname'] = 'hiddenbuttons_id3';
			GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = 'hiddenbuttons_id3';
			//hiddenbuttons_id4
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'hiddenbuttons_id4';
			GETOBJ[GETOBJ_num]['field_realname'] = 'hiddenbuttons_id4';
			GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = 'hiddenbuttons_id4';
			//hiddenbuttons_id5
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'hiddenbuttons_id5';
			GETOBJ[GETOBJ_num]['field_realname'] = 'hiddenbuttons_id5';
			GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = 'hiddenbuttons_id5';
			//hiddenbuttons_id6
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'hiddenbuttons_id6';
			GETOBJ[GETOBJ_num]['field_realname'] = 'hiddenbuttons_id6';
			GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = 'hiddenbuttons_id6';
			//hiddenbuttons_id7
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'hiddenbuttons_id7';
			GETOBJ[GETOBJ_num]['field_realname'] = 'hiddenbuttons_id7';
			GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = 'hiddenbuttons_id7';
			
			
			//collarbuttons_id1
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'collarbuttons_id1';
			GETOBJ[GETOBJ_num]['field_realname'] = 'collarbuttons_id1';
			GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = 'collarbuttons_id1';
			//collarbuttons_id2
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'collarbuttons_id2';
			GETOBJ[GETOBJ_num]['field_realname'] = 'collarbuttons_id2';
			GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = 'collarbuttons_id2';
			//chiddenbuttons _id3
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'collarbuttons_id3';
			GETOBJ[GETOBJ_num]['field_realname'] = 'collarbuttons_id3';
			GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = 'collarbuttons_id3';
			//collarbuttons_id4
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'collarbuttons_id4';
			GETOBJ[GETOBJ_num]['field_realname'] = 'collarbuttons_id4';
			GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = 'collarbuttons_id4';
			//collarbuttons_id5
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'collarbuttons_id5';
			GETOBJ[GETOBJ_num]['field_realname'] = 'collarbuttons_id5';
			GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = 'collarbuttons_id5';
			//collarbuttons_id6
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'collarbuttons_id6';
			GETOBJ[GETOBJ_num]['field_realname'] = 'collarbuttons_id6';
			GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = 'collarbuttons_id6';
			//collarbuttons_id7
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'collarbuttons_id7';
			GETOBJ[GETOBJ_num]['field_realname'] = 'collarbuttons_id7';
			GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = 'collarbuttons_id7';
			
			//whitecuff_id1
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'whitecuff_id1';
			GETOBJ[GETOBJ_num]['field_realname'] = 'whitecuff_id1';
			GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = 'whitecuff_id1';
			//whitecuff_id2
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'whitecuff_id2';
			GETOBJ[GETOBJ_num]['field_realname'] = 'whitecuff_id2';
			GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = 'whitecuff_id2';
			//chiddenbuttons _id3
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'whitecuff_id3';
			GETOBJ[GETOBJ_num]['field_realname'] = 'whitecuff_id3';
			GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = 'whitecuff_id3';
			//whitecuff_id4
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'whitecuff_id4';
			GETOBJ[GETOBJ_num]['field_realname'] = 'whitecuff_id4';
			GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = 'whitecuff_id4';
			//whitecuff_id5
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'whitecuff_id5';
			GETOBJ[GETOBJ_num]['field_realname'] = 'whitecuff_id5';
			GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = 'whitecuff_id5';
			//whitecuff_id6
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'whitecuff_id6';
			GETOBJ[GETOBJ_num]['field_realname'] = 'whitecuff_id6';
			GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = 'whitecuff_id6';
			//whitecuff_id7
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'whitecuff_id7';
			GETOBJ[GETOBJ_num]['field_realname'] = 'whitecuff_id7';
			GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = 'whitecuff_id7';
			
			//---------------------------------最底部footer---------------
			//customer_id
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'customer_id';
			GETOBJ[GETOBJ_num]['field_realname'] = 'customer_id';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = 'customer_id';
			
			//	Item_description
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'Item_description';
			GETOBJ[GETOBJ_num]['field_realname'] = 'Item_description';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = 'Item_description';
			
			//order_date
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'order_date';
			GETOBJ[GETOBJ_num]['field_realname'] = 'order_date';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = 'order_date';
			
			//delivery_date
			GETOBJ_num = GETOBJ_num + 1;
			GETOBJ[GETOBJ_num] = new Array();
			GETOBJ[GETOBJ_num]['field_name'] = 'delivery_date';
			GETOBJ[GETOBJ_num]['field_realname'] = 'delivery_date';
			GETOBJ[GETOBJ_num]['field_type'] = "input";
			GETOBJ[GETOBJ_num]['field_CMNAME'] = 'delivery_date';
			
			//----定义的字段------END
			
			//----定义多语言的字段------START
				var GETLANGOBJ = new Array();
			//----定义多语言的字段------END
				
			var returnOBJ = checkjsformcontent(lancodelist, GETOBJ, GETLANGOBJ);//----定义字段变量, 检查是否为空或格式错误------START
			var postOBJ = returnOBJ.postOBJ;
			postOBJ.backurl = backurl;
			postOBJ.subbackurl = subbackurl;
			postOBJ.GETOBJ = returnOBJ.GETOBJ_arr;
			postOBJ.GETOBJ_type = returnOBJ.GETOBJ_type_arr;
			postOBJ.GETOBJ_realname = returnOBJ.GETOBJ_realname_arr;
			postOBJ.GETLANGOBJ = returnOBJ.GETLANGOBJ_arr;
			if(returnOBJ.ispass == 1){
				$.post(baseurl+'index.php/admins/user/add_form/'+uid, postOBJ, function (data){
					var obj = eval( "(" + data + ")" );
					actionsubmit_button.html('<img class="icon_success" src="'+baseurl+'themes/default/images/global_ok.png"/><span>'+L['cy_save_success']+'</span>');
	//				isajaxsaveing = 0;//ajax正在保存中 --- 释放
					location.href = obj.subbackurl;
				})
			}else{
				actionsubmit_button.attr('class', 'gksel_btn_action_on');
				actionsubmit_button.html(L['cy_save']);
				isajaxsaveing = 0;//ajax正在保存中 --- 释放
			}
		}
	}
	//用户FORM---修改
	function toedit_forminfo(uid, form_id){
		var lancodelist = getlancodelist();
		if(isajaxsaveing == 0){
			//具体点击的按钮
			actionsubmit_button = $('div[onclick="toedit_forminfo('+uid+', '+form_id+')"]');
			//ajax正在保存中
			isajaxsaveing = 1;
			//返回url
			var backurl = $('input[name="backurl"]').val();
			var subbackurl = $('input[name="subbackurl"]').val();
			//将提交按钮设置为保存中
			actionsubmit_button.attr('class', 'gksel_btn_action_off');
			actionsubmit_button.html('<img class="icon_loading" src="'+baseurl+'themes/default/images/ajax_loading.gif"/><span>Saving...</span>');
			
			//----定义的字段------START
				var GETOBJ = [];
				var GETOBJ_num = 0;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'form_name';
				GETOBJ[GETOBJ_num]['field_realname'] = 'form_name';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = 'Name';

				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'form_number';
				GETOBJ[GETOBJ_num]['field_realname'] = 'form_number';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = '单号';

				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'form_getno';
				GETOBJ[GETOBJ_num]['field_realname'] = 'form_getno';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = '取号';
				
				
				
				
				
				
				//Jacket length(Front) 夹克长(前边)
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'jacketlength_body';
				GETOBJ[GETOBJ_num]['field_realname'] = 'jacketlength_body';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = '';
				
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'jacketlength_suit';
				GETOBJ[GETOBJ_num]['field_realname'] = 'jacketlength_suit';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = '';

				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'jacketlength_shirt';
				GETOBJ[GETOBJ_num]['field_realname'] = 'jacketlength_shirt';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = '';

				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'jacketlength_vest';
				GETOBJ[GETOBJ_num]['field_realname'] = 'jacketlength_vest';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = '';

				//Shoulder width
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'shoulderwidth_body';
				GETOBJ[GETOBJ_num]['field_realname'] = 'shoulderwidth_body';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = '';
				
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'shoulderwidth_suit';
				GETOBJ[GETOBJ_num]['field_realname'] = 'shoulderwidth_suit';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = '';

				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'shoulderwidth_shirt';
				GETOBJ[GETOBJ_num]['field_realname'] = 'shoulderwidth_shirt';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = '';

				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'shoulderwidth_vest';
				GETOBJ[GETOBJ_num]['field_realname'] = 'shoulderwidth_vest';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = '';

				//Shoulder width
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'shoulderwidth_body';
				GETOBJ[GETOBJ_num]['field_realname'] = 'shoulderwidth_body';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = '';
				
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'shoulderwidth_suit';
				GETOBJ[GETOBJ_num]['field_realname'] = 'shoulderwidth_suit';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = '';

				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'shoulderwidth_shirt';
				GETOBJ[GETOBJ_num]['field_realname'] = 'shoulderwidth_shirt';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = '';

				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'shoulderwidth_vest';
				GETOBJ[GETOBJ_num]['field_realname'] = 'shoulderwidth_vest';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = '';

				//Chest circumference
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'chestcircumference_body';
				GETOBJ[GETOBJ_num]['field_realname'] = 'chestcircumference_body';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = '';
				
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'chestcircumference_suit';
				GETOBJ[GETOBJ_num]['field_realname'] = 'chestcircumference_suit';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = '';

				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'chestcircumference_shirt';
				GETOBJ[GETOBJ_num]['field_realname'] = 'chestcircumference_shirt';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = '';

				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'chestcircumference_vest';
				GETOBJ[GETOBJ_num]['field_realname'] = 'chestcircumference_vest';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = '';

				//Stomach bust<br>夹克腰围
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'stomachbust_body';
				GETOBJ[GETOBJ_num]['field_realname'] = 'stomachbust_body';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = '';
				
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'stomachbust_suit';
				GETOBJ[GETOBJ_num]['field_realname'] = 'stomachbust_suit';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = '';

				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'stomachbust_shirt';
				GETOBJ[GETOBJ_num]['field_realname'] = 'stomachbust_shirt';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = '';

				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'stomachbust_vest';
				GETOBJ[GETOBJ_num]['field_realname'] = 'stomachbust_vest';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = '';

				//Jacket circumference<br>夹克臀围
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'jacketcircumference_body';
				GETOBJ[GETOBJ_num]['field_realname'] = 'jacketcircumference_body';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = '';
				
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'jacketcircumference_suit';
				GETOBJ[GETOBJ_num]['field_realname'] = 'jacketcircumference_suit';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = '';

				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'jacketcircumference_shirt';
				GETOBJ[GETOBJ_num]['field_realname'] = 'jacketcircumference_shirt';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = '';

				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'jacketcircumference_vest';
				GETOBJ[GETOBJ_num]['field_realname'] = 'jacketcircumference_vest';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = '';

				//Sleeve length<br>夹克袖长
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'sleevelength_body';
				GETOBJ[GETOBJ_num]['field_realname'] = 'sleevelength_body';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = '';
				
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'sleevelength_suit';
				GETOBJ[GETOBJ_num]['field_realname'] = 'sleevelength_suit';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = '';

				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'sleevelength_shirt';
				GETOBJ[GETOBJ_num]['field_realname'] = 'sleevelength_shirt';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = '';

				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'sleevelength_vest';
				GETOBJ[GETOBJ_num]['field_realname'] = 'sleevelength_vest';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = '';

				//Arm-Hole Loop<br>臂圈
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'armholeloop_body';
				GETOBJ[GETOBJ_num]['field_realname'] = 'armholeloop_body';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = '';
				
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'armholeloop_suit';
				GETOBJ[GETOBJ_num]['field_realname'] = 'armholeloop_suit';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = '';

				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'armholeloop_shirt';
				GETOBJ[GETOBJ_num]['field_realname'] = 'armholeloop_shirt';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = '';

				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'armholeloop_vest';
				GETOBJ[GETOBJ_num]['field_realname'] = 'armholeloop_vest';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = '';

				//Bicep circumference<br>袖肥
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'bicepcircumference_body';
				GETOBJ[GETOBJ_num]['field_realname'] = 'bicepcircumference_body';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = '';
				
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'bicepcircumference_suit';
				GETOBJ[GETOBJ_num]['field_realname'] = 'bicepcircumference_suit';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = '';

				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'bicepcircumference_shirt';
				GETOBJ[GETOBJ_num]['field_realname'] = 'bicepcircumference_shirt';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = '';

				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'bicepcircumference_vest';
				GETOBJ[GETOBJ_num]['field_realname'] = 'bicepcircumference_vest';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = '';


				//Wrist circumference<br>袖口
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'wristcircumference_body';
				GETOBJ[GETOBJ_num]['field_realname'] = 'wristcircumference_body';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = '';
				
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'wristcircumference_suit';
				GETOBJ[GETOBJ_num]['field_realname'] = 'wristcircumference_suit';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = '';

				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'wristcircumference_shirt';
				GETOBJ[GETOBJ_num]['field_realname'] = 'wristcircumference_shirt';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = '';

				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'wristcircumference_vest';
				GETOBJ[GETOBJ_num]['field_realname'] = 'wristcircumference_vest';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = '';



				//Wrist circumference<br>袖口
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'neckcircumference_body';
				GETOBJ[GETOBJ_num]['field_realname'] = 'neckcircumference_body';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = '';
				
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'neckcircumference_suit';
				GETOBJ[GETOBJ_num]['field_realname'] = 'neckcircumference_suit';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = '';

				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'neckcircumference_shirt';
				GETOBJ[GETOBJ_num]['field_realname'] = 'neckcircumference_shirt';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = '';

				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'neckcircumference_vest';
				GETOBJ[GETOBJ_num]['field_realname'] = 'neckcircumference_vest';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = '';
				


				//Outside leg <br>length<br>裤子长
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'outsideleglength_body';
				GETOBJ[GETOBJ_num]['field_realname'] = 'outsideleglength_body';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = '';
				
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'outsideleglength_suit';
				GETOBJ[GETOBJ_num]['field_realname'] = 'outsideleglength_suit';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = '';
				
				//Waist measurement<br>裤子腰围
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'waistmeasurement_body';
				GETOBJ[GETOBJ_num]['field_realname'] = 'waistmeasurement_body';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = '';
				
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'waistmeasurement_suit';
				GETOBJ[GETOBJ_num]['field_realname'] = 'waistmeasurement_suit';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = '';
				
				//Arm-Hole Loop<br>臂圈
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'gluteuscircumference_body';
				GETOBJ[GETOBJ_num]['field_realname'] = 'gluteuscircumference_body';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = '';
				
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'gluteuscircumference_suit';
				GETOBJ[GETOBJ_num]['field_realname'] = 'gluteuscircumference_suit';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = '';
				
				
				//Thigh circumference<br>大腿围
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'thighcircumference_body';
				GETOBJ[GETOBJ_num]['field_realname'] = 'thighcircumference_body';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = '';
				
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'thighcircumference_suit';
				GETOBJ[GETOBJ_num]['field_realname'] = 'thighcircumference_suit';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = '';
				
				//Crotch rise<br>直裆长
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'crotchrise_body';
				GETOBJ[GETOBJ_num]['field_realname'] = 'crotchrise_body';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = '';
				
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'crotchrise_suit';
				GETOBJ[GETOBJ_num]['field_realname'] = 'crotchrise_suit';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = '';
				
				
				//Hamstring circumference<br>中裆围
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'hamstringcircumference_body';
				GETOBJ[GETOBJ_num]['field_realname'] = 'hamstringcircumference_body';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = '';
				
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'hamstringcircumference_suit';
				GETOBJ[GETOBJ_num]['field_realname'] = 'hamstringcircumference_suit';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = '';
				
				
				//Calf circumference<br>小腿围
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'calfcircumference_body';
				GETOBJ[GETOBJ_num]['field_realname'] = 'calfcircumference_body';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = '';
				
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'calfcircumference_suit';
				GETOBJ[GETOBJ_num]['field_realname'] = 'calfcircumference_suit';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = '';
				
				//Ankle circumference<br>脚口围
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'anklecircumference_body';
				GETOBJ[GETOBJ_num]['field_realname'] = 'anklecircumference_body';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = '';
				
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'anklecircumference_suit';
				GETOBJ[GETOBJ_num]['field_realname'] = 'anklecircumference_suit';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = '';
				
				//西装料号Suit Code:
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'suit_code';
				GETOBJ[GETOBJ_num]['field_realname'] = 'suit_code';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = 'Suit Code:';
				
				//夹克编号Blazer Code:
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'blazer_code';
				GETOBJ[GETOBJ_num]['field_realname'] = 'blazer_code';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = '夹克编号Blazer Code:';
				
				
				//裤子编号Pants Code:
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'pants_code';
				GETOBJ[GETOBJ_num]['field_realname'] = 'pants_code';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = '裤子编号Pants Code';
				//衬衫编号Shirt Code:
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'shirt_code';
				GETOBJ[GETOBJ_num]['field_realname'] = 'shirt_code';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = '衬衫编号Shirt Code:';
				//马甲编号Waistcoat Code:
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'waistcoat_code';
				GETOBJ[GETOBJ_num]['field_realname'] = 'waistcoat_code';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = '马甲编号Waistcoat Code:';
				//无里布No Lining:
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'no_lining';
				GETOBJ[GETOBJ_num]['field_realname'] = 'no_lining';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = '无里布No Lining:';
				//半里布Half Lined
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'half_lined';
				GETOBJ[GETOBJ_num]['field_realname'] = 'half_lined';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = '半里布Half Lined';
				
				
				//里布号
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'in_cloth';
				GETOBJ[GETOBJ_num]['field_realname'] = 'in_cloth';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = '里布号';
				//半里布:
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'half_cloth';
				GETOBJ[GETOBJ_num]['field_realname'] = 'half_cloth';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = '半里布';
				//无里布
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'no_cloth';
				GETOBJ[GETOBJ_num]['field_realname'] = 'no_cloth';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = '无里布';
				//扣子号
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'button_size';
				GETOBJ[GETOBJ_num]['field_realname'] = 'button_size';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = '扣子号';
				
				
				//Design Requirements1
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'keyhole_machine';
				GETOBJ[GETOBJ_num]['field_realname'] = 'keyhole_machine';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = 'Design Requirements1';
				
				//Design Requirements2
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'milanese_handwork';
				GETOBJ[GETOBJ_num]['field_realname'] = 'milanese_handwork';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = 'Design Requirements2';
				
				//Design Requirements3
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'cross_color';
				GETOBJ[GETOBJ_num]['field_realname'] = 'cross_color';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = 'Design Requirements3';
				
				
				//#1
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'collar_types1';
				GETOBJ[GETOBJ_num]['field_realname'] = 'collar_types1';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = '#1';
				
				//#2
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'collar_types2';
				GETOBJ[GETOBJ_num]['field_realname'] = 'collar_types2';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = '#2';
				//#3
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'collar_types3';
				GETOBJ[GETOBJ_num]['field_realname'] = 'collar_types3';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = '#3';
				//#4
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'collar_types4';
				GETOBJ[GETOBJ_num]['field_realname'] = 'collar_types4';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = '#4';
				//#5
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'collar_types5';
				GETOBJ[GETOBJ_num]['field_realname'] = 'collar_types5';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = '#5';
				//#6
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'collar_types6';
				GETOBJ[GETOBJ_num]['field_realname'] = 'collar_types6';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = '#6';
				//#7
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'collar_types7';
				GETOBJ[GETOBJ_num]['field_realname'] = 'collar_types7';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = '#7';
				
				
				//collar1
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'collar1';
				GETOBJ[GETOBJ_num]['field_realname'] = 'collar1';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = 'collar1';
				//collar2
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'collar2';
				GETOBJ[GETOBJ_num]['field_realname'] = 'collar2';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = 'collar2';
				//collar3
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'collar3';
				GETOBJ[GETOBJ_num]['field_realname'] = 'collar3';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = 'collar3';
				//collar4
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'collar4';
				GETOBJ[GETOBJ_num]['field_realname'] = 'collar4';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = 'collar4';
				//collar5
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'collar5';
				GETOBJ[GETOBJ_num]['field_realname'] = 'collar5';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = 'collar5';
				//collar6
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'collar6';
				GETOBJ[GETOBJ_num]['field_realname'] = 'collar6';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = 'collar6';
				//collar7
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'collar7';
				GETOBJ[GETOBJ_num]['field_realname'] = 'collar7';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = 'collar7';
				
				//left_sleeveInitials1
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'left_sleeveInitials1';
				GETOBJ[GETOBJ_num]['field_realname'] = 'left_sleeveInitials1';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = 'left_sleeveInitials1';
				//left_sleeveInitials2
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'left_sleeveInitials2';
				GETOBJ[GETOBJ_num]['field_realname'] = 'left_sleeveInitials2';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = 'left_sleeveInitials2';
				//cleft_sleeveInitials3
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'left_sleeveInitials3';
				GETOBJ[GETOBJ_num]['field_realname'] = 'left_sleeveInitials3';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = 'left_sleeveInitials3';
				//left_sleeveInitials4
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'left_sleeveInitials4';
				GETOBJ[GETOBJ_num]['field_realname'] = 'left_sleeveInitials4';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = 'left_sleeveInitials4';
				//left_sleeveInitials5
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'left_sleeveInitials5';
				GETOBJ[GETOBJ_num]['field_realname'] = 'left_sleeveInitials5';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = 'left_sleeveInitials5';
				//left_sleeveInitials6
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'left_sleeveInitials6';
				GETOBJ[GETOBJ_num]['field_realname'] = 'left_sleeveInitials6';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = 'left_sleeveInitials6';
				//left_sleeveInitials7
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'left_sleeveInitials7';
				GETOBJ[GETOBJ_num]['field_realname'] = 'left_sleeveInitials7';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = 'left_sleeveInitials7';

				//doublecuff_id1
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'doublecuff_id1';
				GETOBJ[GETOBJ_num]['field_realname'] = 'doublecuff_id1';
				GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = 'doublecuff_id1';
				//doublecuff_id2
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'doublecuff_id2';
				GETOBJ[GETOBJ_num]['field_realname'] = 'doublecuff_id2';
				GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = 'doublecuff_id2';
				//cdoublecuff_id3
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'doublecuff_id3';
				GETOBJ[GETOBJ_num]['field_realname'] = 'doublecuff_id3';
				GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = 'doublecuff_id3';
				//doublecuff_id4
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'doublecuff_id4';
				GETOBJ[GETOBJ_num]['field_realname'] = 'doublecuff_id4';
				GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = 'doublecuff_id4';
				//doublecuff_id5
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'doublecuff_id5';
				GETOBJ[GETOBJ_num]['field_realname'] = 'doublecuff_id5';
				GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = 'doublecuff_id5';
				//doublecuff_id6
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'doublecuff_id6';
				GETOBJ[GETOBJ_num]['field_realname'] = 'doublecuff_id6';
				GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = 'doublecuff_id6';
				//doublecuff_id7
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'doublecuff_id7';
				GETOBJ[GETOBJ_num]['field_realname'] = 'doublecuff_id7';
				GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = 'doublecuff_id7';
				
				
				//shortsleeves_id1
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'shortsleeves_id1';
				GETOBJ[GETOBJ_num]['field_realname'] = 'shortsleeves_id1';
				GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = 'shortsleeves_id1';
				//shortsleeves_id2
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'shortsleeves_id2';
				GETOBJ[GETOBJ_num]['field_realname'] = 'shortsleeves_id2';
				GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = 'shortsleeves_id2';
				//cshortsleeves_id3
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'shortsleeves_id3';
				GETOBJ[GETOBJ_num]['field_realname'] = 'shortsleeves_id3';
				GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = 'shortsleeves_id3';
				//shortsleeves_id4
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'shortsleeves_id4';
				GETOBJ[GETOBJ_num]['field_realname'] = 'shortsleeves_id4';
				GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = 'shortsleeves_id4';
				//shortsleeves_id5
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'shortsleeves_id5';
				GETOBJ[GETOBJ_num]['field_realname'] = 'shortsleeves_id5';
				GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = 'shortsleeves_id5';
				//shortsleeves_id6
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'shortsleeves_id6';
				GETOBJ[GETOBJ_num]['field_realname'] = 'shortsleeves_id6';
				GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = 'shortsleeves_id6';
				//shortsleeves_id7
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'shortsleeves_id7';
				GETOBJ[GETOBJ_num]['field_realname'] = 'shortsleeves_id7';
				GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = 'shortsleeves_id7';
				
				
				//chestpocket_id1
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'chestpocket_id1';
				GETOBJ[GETOBJ_num]['field_realname'] = 'chestpocket_id1';
				GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = 'chestpocket_id1';
				//chestpocket_id2
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'chestpocket_id2';
				GETOBJ[GETOBJ_num]['field_realname'] = 'chestpocket_id2';
				GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = 'chestpocket_id2';
				//cchestpocket_id3
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'chestpocket_id3';
				GETOBJ[GETOBJ_num]['field_realname'] = 'chestpocket_id3';
				GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = 'chestpocket_id3';
				//chestpocket_id4
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'chestpocket_id4';
				GETOBJ[GETOBJ_num]['field_realname'] = 'chestpocket_id4';
				GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = 'chestpocket_id4';
				//chestpocket_id5
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'chestpocket_id5';
				GETOBJ[GETOBJ_num]['field_realname'] = 'chestpocket_id5';
				GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = 'chestpocket_id5';
				//chestpocket_id6
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'chestpocket_id6';
				GETOBJ[GETOBJ_num]['field_realname'] = 'chestpocket_id6';
				GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = 'chestpocket_id6';
				//chestpocket_id7
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'chestpocket_id7';
				GETOBJ[GETOBJ_num]['field_realname'] = 'chestpocket_id7';
				GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = 'chestpocket_id7';
				
				
				//hiddenbuttons_id1
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'hiddenbuttons_id1';
				GETOBJ[GETOBJ_num]['field_realname'] = 'hiddenbuttons_id1';
				GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = 'hiddenbuttons_id1';
				//hiddenbuttons_id2
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'hiddenbuttons_id2';
				GETOBJ[GETOBJ_num]['field_realname'] = 'hiddenbuttons_id2';
				GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = 'hiddenbuttons_id2';
				//chiddenbuttons _id3
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'hiddenbuttons_id3';
				GETOBJ[GETOBJ_num]['field_realname'] = 'hiddenbuttons_id3';
				GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = 'hiddenbuttons_id3';
				//hiddenbuttons_id4
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'hiddenbuttons_id4';
				GETOBJ[GETOBJ_num]['field_realname'] = 'hiddenbuttons_id4';
				GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = 'hiddenbuttons_id4';
				//hiddenbuttons_id5
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'hiddenbuttons_id5';
				GETOBJ[GETOBJ_num]['field_realname'] = 'hiddenbuttons_id5';
				GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = 'hiddenbuttons_id5';
				//hiddenbuttons_id6
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'hiddenbuttons_id6';
				GETOBJ[GETOBJ_num]['field_realname'] = 'hiddenbuttons_id6';
				GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = 'hiddenbuttons_id6';
				//hiddenbuttons_id7
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'hiddenbuttons_id7';
				GETOBJ[GETOBJ_num]['field_realname'] = 'hiddenbuttons_id7';
				GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = 'hiddenbuttons_id7';
				
				//collarbuttons_id1
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'collarbuttons_id1';
				GETOBJ[GETOBJ_num]['field_realname'] = 'collarbuttons_id1';
				GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = 'collarbuttons_id1';
				//collarbuttons_id2
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'collarbuttons_id2';
				GETOBJ[GETOBJ_num]['field_realname'] = 'collarbuttons_id2';
				GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = 'collarbuttons_id2';
				//chiddenbuttons _id3
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'collarbuttons_id3';
				GETOBJ[GETOBJ_num]['field_realname'] = 'collarbuttons_id3';
				GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = 'collarbuttons_id3';
				//collarbuttons_id4
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'collarbuttons_id4';
				GETOBJ[GETOBJ_num]['field_realname'] = 'collarbuttons_id4';
				GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = 'collarbuttons_id4';
				//collarbuttons_id5
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'collarbuttons_id5';
				GETOBJ[GETOBJ_num]['field_realname'] = 'collarbuttons_id5';
				GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = 'collarbuttons_id5';
				//collarbuttons_id6
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'collarbuttons_id6';
				GETOBJ[GETOBJ_num]['field_realname'] = 'collarbuttons_id6';
				GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = 'collarbuttons_id6';
				//collarbuttons_id7
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'collarbuttons_id7';
				GETOBJ[GETOBJ_num]['field_realname'] = 'collarbuttons_id7';
				GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = 'collarbuttons_id7';
				
				
				//whitecuff_id1
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'whitecuff_id1';
				GETOBJ[GETOBJ_num]['field_realname'] = 'whitecuff_id1';
				GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = 'whitecuff_id1';
				//whitecuff_id2
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'whitecuff_id2';
				GETOBJ[GETOBJ_num]['field_realname'] = 'whitecuff_id2';
				GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = 'whitecuff_id2';
				//chiddenbuttons _id3
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'whitecuff_id3';
				GETOBJ[GETOBJ_num]['field_realname'] = 'whitecuff_id3';
				GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = 'whitecuff_id3';
				//whitecuff_id4
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'whitecuff_id4';
				GETOBJ[GETOBJ_num]['field_realname'] = 'whitecuff_id4';
				GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = 'whitecuff_id4';
				//whitecuff_id5
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'whitecuff_id5';
				GETOBJ[GETOBJ_num]['field_realname'] = 'whitecuff_id5';
				GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = 'whitecuff_id5';
				//whitecuff_id6
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'whitecuff_id6';
				GETOBJ[GETOBJ_num]['field_realname'] = 'whitecuff_id6';
				GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = 'whitecuff_id6';
				//whitecuff_id7
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'whitecuff_id7';
				GETOBJ[GETOBJ_num]['field_realname'] = 'whitecuff_id7';
				GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = 'whitecuff_id7';
				
				
				
				
				
				
				
				
				
				//Suit fitting
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'suitfitting_id';
				GETOBJ[GETOBJ_num]['field_realname'] = 'suitfitting_id';
				GETOBJ[GETOBJ_num]['field_type'] = "radio";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = 'Suit fitting';
				
				
				//Lapels
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'lapels_id';
				GETOBJ[GETOBJ_num]['field_realname'] = 'lapels_id';
				GETOBJ[GETOBJ_num]['field_type'] = "radio";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = 'Lapels';
				
				//Vents
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'vents_id';
				GETOBJ[GETOBJ_num]['field_realname'] = 'vents_id';
				GETOBJ[GETOBJ_num]['field_type'] = "radio";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = 'Vents';
				
				//Jacket buttons (夹克纽子)
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'jacketbuttons_id';
				GETOBJ[GETOBJ_num]['field_realname'] = 'jacketbuttons_id';
				GETOBJ[GETOBJ_num]['field_type'] = "radio";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = 'Jacket buttons (夹克纽子)';
				
				//Jacket pockets（夹克口袋） 
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'jacketpockets_id';
				GETOBJ[GETOBJ_num]['field_realname'] = 'jacketpockets_id';
				GETOBJ[GETOBJ_num]['field_type'] = "radio";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = 'Vents';
				
				//Waistcoats（马夹 款式）
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'waistcoats_id';
				GETOBJ[GETOBJ_num]['field_realname'] = 'waistcoats_id';
				GETOBJ[GETOBJ_num]['field_type'] = "radio";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = 'Waistcoats';
				
				//Collar types（ 领子 款式
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'collartypes_id';
				GETOBJ[GETOBJ_num]['field_realname'] = 'collartypes_id';
				GETOBJ[GETOBJ_num]['field_type'] = "radio";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = 'Waistcoats';
				
				//Collar types（ 领子 款式
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'overcoats_lapels_id';
				GETOBJ[GETOBJ_num]['field_realname'] = 'overcoats_lapels_id';
				GETOBJ[GETOBJ_num]['field_type'] = "radio";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = 'overcoats_lapels';
				
				//Collar types（ 领子 款式
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'overcoats_vents_id';
				GETOBJ[GETOBJ_num]['field_realname'] = 'overcoats_vents_id';
				GETOBJ[GETOBJ_num]['field_type'] = "radio";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = 'overcoats_vents_id';
				
				//Collar types（ 领子 款式
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'overcoats_breastbuttons_id';
				GETOBJ[GETOBJ_num]['field_realname'] = 'overcoats_breastbuttons_id';
				GETOBJ[GETOBJ_num]['field_type'] = "radio";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = 'overcoats_breastbuttons_id';
				
				//Collar types（ 领子 款式
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'overcoats_pockets_id';
				GETOBJ[GETOBJ_num]['field_realname'] = 'overcoats_pockets_id';
				GETOBJ[GETOBJ_num]['field_type'] = "radio";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = 'overcoats_pockets_id';
				
				//Picked 贡针
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'pickeds_id';
				GETOBJ[GETOBJ_num]['field_realname'] = 'pickeds_id';
				GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = 'Picked 贡针';
				
				//several_id 几个
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'several_id';
				GETOBJ[GETOBJ_num]['field_realname'] = 'several_id';
				GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = 'several_id 几个';
				
				//color_id 颜色
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'color_id';
				GETOBJ[GETOBJ_num]['field_realname'] = 'color_id';
				GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = 'color_id 颜色';
				
				//milanese_id3
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'milanese_id';
				GETOBJ[GETOBJ_num]['field_realname'] = 'milanese_id';
				GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = 'milanese_id3';
				
				//cross_id4
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'cross_id';
				GETOBJ[GETOBJ_num]['field_realname'] = 'cross_id';
				GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = 'cross_id4';
				
				//calling_id1
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'calling_id';
				GETOBJ[GETOBJ_num]['field_realname'] = 'calling_id';
				GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = 'calling_id1';
				
				//pen_id2
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'pen_id';
				GETOBJ[GETOBJ_num]['field_realname'] = 'pen_id';
				GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = 'pen_id2';
				
				//hem_id3
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'hem_id';
				GETOBJ[GETOBJ_num]['field_realname'] = 'hem_id';
				GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = 'hem_id3';
				
				//ticket_id4
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'ticket_id';
				GETOBJ[GETOBJ_num]['field_realname'] = 'ticket_id';
				GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = 'ticket_id4';
				
				//loops_id1
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'loops_id';
				GETOBJ[GETOBJ_num]['field_realname'] = 'loops_id';
				GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = 'loops_id1';
				
				//side_id2
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'side_id';
				GETOBJ[GETOBJ_num]['field_realname'] = 'side_id';
				GETOBJ[GETOBJ_num]['field_type'] = "checkbox";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = 'side_id2';
				
				
				
				//---------------------------------最底部footer---------------
				//customer_id
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'customer_id';
				GETOBJ[GETOBJ_num]['field_realname'] = 'customer_id';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = 'customer_id';
				
				//	Item_description
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'Item_description';
				GETOBJ[GETOBJ_num]['field_realname'] = 'Item_description';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = 'Item_description';
				
				
				//order_date
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'order_date';
				GETOBJ[GETOBJ_num]['field_realname'] = 'order_date';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = 'order_date';
				
				//delivery_date
				GETOBJ_num = GETOBJ_num + 1;
				GETOBJ[GETOBJ_num] = new Array();
				GETOBJ[GETOBJ_num]['field_name'] = 'delivery_date';
				GETOBJ[GETOBJ_num]['field_realname'] = 'delivery_date';
				GETOBJ[GETOBJ_num]['field_type'] = "input";
				GETOBJ[GETOBJ_num]['field_CMNAME'] = 'delivery_date';
				
			//----定义的字段------END
			
			//----定义多语言的字段------START
				var GETLANGOBJ = new Array();
			//----定义多语言的字段------END
				
			var returnOBJ = checkjsformcontent(lancodelist, GETOBJ, GETLANGOBJ);//----定义字段变量, 检查是否为空或格式错误------START
			var postOBJ = returnOBJ.postOBJ;
			postOBJ.backurl = backurl;
			postOBJ.subbackurl = subbackurl;
			postOBJ.GETOBJ = returnOBJ.GETOBJ_arr;
			postOBJ.GETOBJ_type = returnOBJ.GETOBJ_type_arr;
			postOBJ.GETOBJ_realname = returnOBJ.GETOBJ_realname_arr;
			postOBJ.GETLANGOBJ = returnOBJ.GETLANGOBJ_arr;
			if(returnOBJ.ispass == 1){
				$.post(baseurl+'index.php/admins/user/edit_form/'+uid+'/'+form_id, postOBJ, function (data){
					var obj = eval( "(" + data + ")" );
					actionsubmit_button.html('<img class="icon_success" src="'+baseurl+'themes/default/images/global_ok.png"/><span>'+L['cy_save_success']+'</span>');
	//				isajaxsaveing = 0;//ajax正在保存中 --- 释放
					location.href = obj.subbackurl;
				})
			}else{
				actionsubmit_button.attr('class', 'gksel_btn_action_on');
				actionsubmit_button.html(L['cy_save']);
				isajaxsaveing = 0;//ajax正在保存中 --- 释放
			}
		}
	}
	