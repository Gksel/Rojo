	var isNull = /^[\s' ']*$/;
	function isEmail(email){
		var isEmail = /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/.test(email);
		if(isEmail!=true){
			return false;
		}else{
			return true;
		}
	}
	//判断是否为手机号码格式
	/** 
    * 检查字符串是否为合法手机号码 
    * @param {String} 字符串 
    * @return {bool} 是否为合法手机号码 
    */  
    function isPhone(aPhone) {
        var bValidate = RegExp(/^(0|86|17951)?(11[0-9]|12[0-9]|13[0-9]|14[0-9]|15[0-9]|16[0-9]|17[0-9]|18[0-9]|19[0-9])[0-9]{8}$/).test(aPhone);  
        if (bValidate) { 
            return true;  
        }else{
        	return false; 
        }
    }

	function toreditecturl(url){
		if(url!=""){
			location.href=url;	
		}
	}
	function toopennewurl(url){
		if(url!=""){
			window.open(url);
		}
	}
	function toshowtest(){
		$('#menu_control_01').hide();
		$('#menu_control_02').show();
		$('#menu_mobile_logo').parent().parent().hide();
		$('#mobile_menu, #mobile_menubg').animate({height:"show"},300,function (data){
			$("body,html").stop().animate({
    			scrollTop:0 //让body的scrollTop等于pos的top，就实现了滚动
    		},1000);
		});
	}
	function tohidetest(){
		$('#menu_control_01').show();
		$('#menu_control_02').hide();
		$('#menu_mobile_logo').parent().parent().show();
		$('#mobile_menu, #mobile_menubg').animate({height:"hide"},300,function (data){

		});
	}
	function autowidth_header(allbody_width,allbody_height){
		if(allbody_width<890){
			 $('.header_list_two').show();
			 $('.header_list_one').hide();

		}else{
			 $('.header_list_two').hide();
			 $('.header_list_one').show();

			 tohidetest();
		}
	}
	function autowidth_commonfooter(allbody_width,allbody_height){
		
	}
	
	var isajaxsaveing = 0;//是否ajax正在保存中
	var actionsubmit_button = '';//具体点击的按钮	
	//ajax 返回必填或格式错误的提示框
	function ajax_returnrequiredorerror_BOX(content){
		return '<div class="requestbox"><div class="sanjiao">&nbsp;</div><div class="content">'+content+'</div></div>';
	}
