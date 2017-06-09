	//删除兑换产品
	function todel_cms(id, name){
		var title = '您确定要删除商品<font style="color:red;">【'+name+'】</font>吗？';
		var subtitle = '';
		del_url = encodeURI(baseurl+"index.php/admins/product/del_cms/"+id);
		todel(title, subtitle);
	}
	$(document).ready(function (){
		$('#form_cms_add').find('input').keydown(function(event){//这个是你在页面按任意按钮的时候会触发该方法
			var aa = event.which;
			if(aa == 13){
				toadd_cmsinfo();
				document.onkeydown=null;        //这里需要将onkeydown置空，不然默认一直是188
			}
		});
	})
	//兑换产品信息---添加
	function toadd_cmsinfo(){
		var lancodelist = getlancodelist();
		if(isajaxsaveing == 0){
			//具体点击的按钮
			actionsubmit_button = $('div[onclick="toadd_cmsinfo()"]');
			//ajax正在保存中
			isajaxsaveing = 1;
			//返回url
			var backurl = $('input[name="backurl"]').val();
			//将提交按钮设置为保存中
			actionsubmit_button.attr('class', 'gksel_btn_action_off');
			actionsubmit_button.html('<img class="icon_loading" src="'+baseurl+'themes/default/images/ajax_loading.gif"/><span>保存中...</span>');
			
			//----定义的字段------START
				var GETOBJ = [];
				var GETOBJ_num = 0;
			//----定义的字段------END
	
			//----定义多语言的字段------START
				var GETLANGOBJ = new Array();
				var GETLANGOBJ_num = 0;
				GETLANGOBJ[GETLANGOBJ_num] = new Array();
				GETLANGOBJ[GETLANGOBJ_num]['field_name'] = 'cms_name';
				GETLANGOBJ[GETLANGOBJ_num]['field_type'] = "input";
				GETLANGOBJ[GETLANGOBJ_num]['field_CMNAME'] = L['cy_name'];
				
				GETLANGOBJ_num = GETLANGOBJ_num + 1;
				GETLANGOBJ[GETLANGOBJ_num] = new Array();
				GETLANGOBJ[GETLANGOBJ_num]['field_name'] = 'cms_description';
				GETLANGOBJ[GETLANGOBJ_num]['field_type'] = "ckeditor";
				GETLANGOBJ[GETLANGOBJ_num]['field_CMNAME'] = L['cy_content'];
			//----定义多语言的字段------END
			var returnOBJ = checkjsformcontent(lancodelist, GETOBJ, GETLANGOBJ);//----定义字段变量, 检查是否为空或格式错误------START
			
			var postOBJ = returnOBJ.postOBJ;
			postOBJ.backurl = backurl;
			postOBJ.GETOBJ = returnOBJ.GETOBJ_arr;
			postOBJ.GETOBJ_type = returnOBJ.GETOBJ_type_arr;
			postOBJ.GETLANGOBJ = returnOBJ.GETLANGOBJ_arr;
			postOBJ.GETLANGOBJ_type = returnOBJ.GETLANGOBJ_type_arr;
				
			if(returnOBJ.ispass == 1){
				$.post(baseurl+'index.php/admins/cms/add_cms', postOBJ,function (data){
					var obj = eval( "(" + data + ")" );
					actionsubmit_button.html('<img class="icon_success" src="'+baseurl+'themes/default/images/global_ok.png"/><span>保存成功</span>');
	//				isajaxsaveing = 0;//ajax正在保存中 --- 释放
					location.href = obj.backurl;
				})
			}else{
				actionsubmit_button.attr('class', 'gksel_btn_action_on');
				actionsubmit_button.html('保存');
				isajaxsaveing = 0;//ajax正在保存中 --- 释放
			}
		}
	}
	$(document).ready(function (){
		$('#form_cms_save').find('input').keydown(function(event){//这个是你在页面按任意按钮的时候会触发该方法
			var aa = event.which;
			if(aa == 13){
				tosave_cmsinfo();
				document.onkeydown=null;        //这里需要将onkeydown置空，不然默认一直是188
			}
		});
	})
	//兑换产品信息---保存
	function tosave_cmsinfo(){
		var lancodelist = getlancodelist();
		if(isajaxsaveing == 0){
			//具体点击的按钮
			actionsubmit_button = $('div[onclick="tosave_cmsinfo()"]');
			//ajax正在保存中
			isajaxsaveing = 1;
			//返回url
			var backurl = $('input[name="backurl"]').val();
			var cms_id = $('input[name="cms_id"]').val();
			//将提交按钮设置为保存中
			actionsubmit_button.attr('class', 'gksel_btn_action_off');
			actionsubmit_button.html('<img class="icon_loading" src="'+baseurl+'themes/default/images/ajax_loading.gif"/><span>保存中...</span>');
			
			//----定义的字段------START
				var GETOBJ = [];
				var GETOBJ_num = 0;
			//----定义的字段------END
	
			//----定义多语言的字段------START
				var GETLANGOBJ = new Array();
				var GETLANGOBJ_num = 0;
				GETLANGOBJ[GETLANGOBJ_num] = new Array();
				GETLANGOBJ[GETLANGOBJ_num]['field_name'] = 'cms_name';
				GETLANGOBJ[GETLANGOBJ_num]['field_type'] = "input";
				GETLANGOBJ[GETLANGOBJ_num]['field_CMNAME'] = L['cy_name'];
				
				GETLANGOBJ_num = GETLANGOBJ_num + 1;
				GETLANGOBJ[GETLANGOBJ_num] = new Array();
				GETLANGOBJ[GETLANGOBJ_num]['field_name'] = 'cms_description';
				GETLANGOBJ[GETLANGOBJ_num]['field_type'] = "ckeditor";
				GETLANGOBJ[GETLANGOBJ_num]['field_CMNAME'] = L['cy_content'];
			//----定义多语言的字段------END
				
			var returnOBJ = checkjsformcontent(lancodelist, GETOBJ, GETLANGOBJ);//----定义字段变量, 检查是否为空或格式错误------START
			
			var postOBJ = returnOBJ.postOBJ;
			postOBJ.backurl = backurl;
			postOBJ.GETOBJ = returnOBJ.GETOBJ_arr;
			postOBJ.GETOBJ_type = returnOBJ.GETOBJ_type_arr;
			postOBJ.GETLANGOBJ = returnOBJ.GETLANGOBJ_arr;
			postOBJ.GETLANGOBJ_type = returnOBJ.GETLANGOBJ_type_arr;
			
			if(returnOBJ.ispass == 1){
				$.post(baseurl+'index.php/admins/cms/edit_cms/'+cms_id, postOBJ,function (data){
					var obj = eval( "(" + data + ")" );
					actionsubmit_button.html('<img class="icon_success" src="'+baseurl+'themes/default/images/global_ok.png"/><span>保存成功</span>');
	//				isajaxsaveing = 0;//ajax正在保存中 --- 释放
					location.href = obj.backurl;
				})
			}else{
				actionsubmit_button.attr('class', 'gksel_btn_action_on');
				actionsubmit_button.html('保存');
				isajaxsaveing = 0;//ajax正在保存中 --- 释放
			}
		}
	}