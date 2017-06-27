	//填写客户首付款
	function topaymentone_order(id, name){
		if($('#'+id).find('img').attr('src') == baseurl+'themes/default/images/week_gou.png'){
			var title = '您确定要关闭<font style="color:red;">【'+name+'】</font>吗';
		}else{
			var title = '您确定要开启<font style="color:red;">【'+name+'】</font>吗';
		}
		
		var subtitle = '';
		del_url = id;
		
		$('.gksel_paymentone_content .title').html(title);
		$('.gksel_paymentone_content .subtitle').html(subtitle);
		$('.gksel_paymentone_box_bg, .gksel_paymentone_box').fadeIn(800);
	}
	//填写客户首付款----处理程序
	function paymentone_order(){
		if(isajaxsaveing == 0){
			//具体点击的按钮
			actionsubmit_button = $('div[onclick="paymentone_order()"]');
			
			//ajax正在保存中
			isajaxsaveing = 1;
			//将提交按钮设置为保存中
			actionsubmit_button.html('<img class="icon_loading" src="'+baseurl+'themes/default/images/ajax_loading.gif"/><span>提交中...</span>');
			
			var isclose = 1;
			if($('#'+del_url).find('img').attr('src') == baseurl+'themes/default/images/week_gou.png'){
				//关闭成功
				isclose = 1;
			}else{
				//开启成功
				isclose = 0;
			}
			
			$.post(baseurl+'index.php/admins/appointment/appointmentsetting_isclose/'+del_url, {isclose:isclose},function (data){
				actionsubmit_button.html('<img class="icon_success" src="'+baseurl+'themes/default/images/global_ok.png"/><span>提交成功</span>');
				
				actionsubmit_button.html('提交');
				isajaxsaveing = 0;//ajax正在保存中 --- 释放
				
				if(isclose == 1){
					//关闭成功
					$('#'+del_url).find('img').attr('src', baseurl+'themes/default/images/week_close.png');
				}else{
					//开启成功
					$('#'+del_url).find('img').attr('src', baseurl+'themes/default/images/week_gou.png');
				}
				
				toclose_paymentonebox();
			})
		}
	}
	//填写客户首付款 ---- 关闭
	function toclose_paymentonebox(){
		$('.gksel_paymentone_box_bg, .gksel_paymentone_box').fadeOut(800);
	}
	