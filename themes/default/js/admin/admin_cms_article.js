	//删除文章分类
	function todel_article_category(id, name){
		var title = '您确定要删除文章分类<font style="color:red;">【'+name+'】</font>吗？';
		var subtitle = '';
		del_url = encodeURI(baseurl+"index.php/admins/cms/del_article_category/"+id);
		todel(title, subtitle);
	}
	//删除文章
	function todel_article(id, name){
		var title = '您确定要删除文章<font style="color:red;">【'+name+'】</font>吗？';
		var subtitle = '';
		del_url = encodeURI(baseurl+"index.php/admins/cms/del_article/"+id);
		todel(title, subtitle);
	}
	
	//文章分类信息---添加
	function toadd_article_categoryinfo(){
		if(isajaxsaveing == 0){
			//具体点击的按钮
			actionsubmit_button = $('div[onclick="toadd_article_categoryinfo()"]');
			//ajax正在保存中
			isajaxsaveing = 1;
			//返回url
			var backurl = $('input[name="backurl"]').val();
			//将提交按钮设置为保存中
			actionsubmit_button.attr('class', 'gksel_btn_action_off');
			actionsubmit_button.html('<img class="icon_loading" src="'+baseurl+'themes/default/images/ajax_loading.gif"/><span>保存中...</span>');
			
			//文章分类信息
			var category_name_en = $('input[name="category_name_en"]').val();
			var category_name_ch = $('input[name="category_name_ch"]').val();
			
			var ispass=1;
			//验证文章分类名称
			if(isNull.test(category_name_en)){ispass=0;$('input[name="category_name_en"]').next().append(ajax_returnrequiredorerror_BOX('文章分类名称不能为空'));}else{$('input[name="category_name_en"]').next().find('.requestbox').remove();}
			if(isNull.test(category_name_ch)){ispass=0;$('input[name="category_name_ch"]').next().append(ajax_returnrequiredorerror_BOX('文章分类名称不能为空'));}else{$('input[name="category_name_ch"]').next().find('.requestbox').remove();}
			
			if(ispass == 1){
				$.post(baseurl+'index.php/admins/cms/add_article_category', {
					//返回url
					backurl: backurl,
					//文章分类信息
					category_name_en: category_name_en,
					category_name_ch: category_name_ch
					
				},function (data){
					var obj = eval( "(" + data + ")" );
					actionsubmit_button.html('<img class="icon_success" src="'+baseurl+'themes/default/images/global_ok.png"/><span>保存成功</span>');
					location.href = obj.backurl;
				})
			}else{
				actionsubmit_button.attr('class', 'gksel_btn_action_on');
				actionsubmit_button.html('保存');
				isajaxsaveing = 0;//ajax正在保存中 --- 释放
			}
		}
	}
	//文章分类信息---保存
	function tosave_article_categoryinfo(category_id){
		if(isajaxsaveing == 0){
			//具体点击的按钮
			actionsubmit_button = $('div[onclick="tosave_article_categoryinfo('+category_id+')"]');
			//ajax正在保存中
			isajaxsaveing = 1;
			//返回url
			var backurl = $('input[name="backurl"]').val();
			//将提交按钮设置为保存中
			actionsubmit_button.attr('class', 'gksel_btn_action_off');
			actionsubmit_button.html('<img class="icon_loading" src="'+baseurl+'themes/default/images/ajax_loading.gif"/><span>保存中...</span>');
			
			//文章分类信息
			var category_name_en = $('input[name="category_name_en"]').val();
			var category_name_ch = $('input[name="category_name_ch"]').val();
			
			var ispass=1;
			//验证文章分类名称
			if(isNull.test(category_name_en)){ispass=0;$('input[name="category_name_en"]').next().append(ajax_returnrequiredorerror_BOX('文章分类名称不能为空'));}else{$('input[name="category_name_en"]').next().find('.requestbox').remove();}
			if(isNull.test(category_name_ch)){ispass=0;$('input[name="category_name_ch"]').next().append(ajax_returnrequiredorerror_BOX('文章分类名称不能为空'));}else{$('input[name="category_name_ch"]').next().find('.requestbox').remove();}
			
			if(ispass == 1){
				$.post(baseurl+'index.php/admins/cms/edit_article_category/'+category_id, {
					//返回url
					backurl: backurl,
					//文章分类信息
					category_name_en: category_name_en,
					category_name_ch: category_name_ch
					
				},function (data){
					var obj = eval( "(" + data + ")" );
					actionsubmit_button.html('<img class="icon_success" src="'+baseurl+'themes/default/images/global_ok.png"/><span>保存成功</span>');
					location.href = obj.backurl;
				})
			}else{
				actionsubmit_button.attr('class', 'gksel_btn_action_on');
				actionsubmit_button.html('保存');
				isajaxsaveing = 0;//ajax正在保存中 --- 释放
			}
		}
	}
	//文章信息---添加
	function toadd_articleinfo(){
		if(isajaxsaveing == 0){
			//具体点击的按钮
			actionsubmit_button = $('div[onclick="toadd_articleinfo()"]');
			//ajax正在保存中
			isajaxsaveing = 1;
			//返回url
			var backurl = $('input[name="backurl"]').val();
			//将提交按钮设置为保存中
			actionsubmit_button.attr('class', 'gksel_btn_action_off');
			actionsubmit_button.html('<img class="icon_loading" src="'+baseurl+'themes/default/images/ajax_loading.gif"/><span>保存中...</span>');
			
			//文章信息
			var img1_gksel = $('input[name="img1_gksel"]').val();
			var article_name_en = $('input[name="article_name_en"]').val();
			var article_name_ch = $('input[name="article_name_ch"]').val();
			var article_url = $('input[name="article_url"]').val();
			var category_id_arr = $('input[name="category_id[]"]');
			var category_id = [];
			if(category_id_arr.length > 0){
				for(var i = 0; i < category_id_arr.length; i++){
					if(category_id_arr[i].checked == true){
						category_id.push(category_id_arr[i].value);
					}
				}
			}
			var keyword_id_arr = $('input[name="keyword_id[]"]');
			var keyword_id = [];
			if(keyword_id_arr.length > 0){
				for(var i = 0; i < keyword_id_arr.length; i++){
					if(keyword_id_arr[i].checked == true){
						keyword_id.push(keyword_id_arr[i].value);
					}
				}
			}
			var article_content_en = CKEDITOR.instances.article_content_en.getData();
			var article_content_ch = CKEDITOR.instances.article_content_ch.getData();
			
			var ispass=1;
			//验证文章名称
			if(isNull.test(article_name_en)){ispass=0;$('input[name="article_name_en"]').next().append(ajax_returnrequiredorerror_BOX('文章名称不能为空'));}else{$('input[name="article_name_en"]').next().find('.requestbox').remove();}
			if(isNull.test(article_name_ch)){ispass=0;$('input[name="article_name_ch"]').next().append(ajax_returnrequiredorerror_BOX('文章名称不能为空'));}else{$('input[name="article_name_ch"]').next().find('.requestbox').remove();}
			if(isNull.test(article_url)){ispass=0;$('input[name="article_url"]').next().append(ajax_returnrequiredorerror_BOX('文章链接不能为空'));}else{$('input[name="article_url"]').next().find('.requestbox').remove();}
			
			if(ispass == 1){
				$.post(baseurl+'index.php/admins/cms/add_article', {
					//返回url
					backurl: backurl,
					//文章信息
					article_name_en: article_name_en,
					article_name_ch: article_name_ch,
					article_url: article_url,
					article_content_en: article_content_en,
					article_content_ch: article_content_ch,
					category_id: category_id,
					keyword_id: keyword_id,
					img1_gksel: img1_gksel
					
				},function (data){
					var obj = eval( "(" + data + ")" );
					actionsubmit_button.html('<img class="icon_success" src="'+baseurl+'themes/default/images/global_ok.png"/><span>保存成功</span>');
					location.href = obj.backurl;
				})
			}else{
				actionsubmit_button.attr('class', 'gksel_btn_action_on');
				actionsubmit_button.html('保存');
				isajaxsaveing = 0;//ajax正在保存中 --- 释放
			}
		}
	}
	//文章信息---保存
	function tosave_articleinfo(article_id){
		if(isajaxsaveing == 0){
			//具体点击的按钮
			actionsubmit_button = $('div[onclick="tosave_articleinfo('+article_id+')"]');
			//ajax正在保存中
			isajaxsaveing = 1;
			//返回url
			var backurl = $('input[name="backurl"]').val();
			//将提交按钮设置为保存中
			actionsubmit_button.attr('class', 'gksel_btn_action_off');
			actionsubmit_button.html('<img class="icon_loading" src="'+baseurl+'themes/default/images/ajax_loading.gif"/><span>保存中...</span>');
			
			//文章信息
			var img1_gksel = $('input[name="img1_gksel"]').val();
			var article_name_en = $('input[name="article_name_en"]').val();
			var article_name_ch = $('input[name="article_name_ch"]').val();
			var article_url = $('input[name="article_url"]').val();
			var category_id_arr = $('input[name="category_id[]"]');
			
			var category_id = [];
			if(category_id_arr.length > 0){
				for(var i = 0; i < category_id_arr.length; i++){
					if(category_id_arr[i].checked == true){
						category_id.push(category_id_arr[i].value);
					}
				}
			}
			var keyword_id_arr = $('input[name="keyword_id[]"]');
			var keyword_id = [];
			if(keyword_id_arr.length > 0){
				for(var i = 0; i < keyword_id_arr.length; i++){
					if(keyword_id_arr[i].checked == true){
						keyword_id.push(keyword_id_arr[i].value);
					}
				}
			}
			var article_content_en = CKEDITOR.instances.article_content_en.getData();
			var article_content_ch = CKEDITOR.instances.article_content_ch.getData();
			
			var ispass=1;
			//验证文章名称
			if(isNull.test(article_name_en)){ispass=0;$('input[name="article_name_en"]').next().append(ajax_returnrequiredorerror_BOX('文章名称不能为空'));}else{$('input[name="article_name_en"]').next().find('.requestbox').remove();}
			if(isNull.test(article_name_ch)){ispass=0;$('input[name="article_name_ch"]').next().append(ajax_returnrequiredorerror_BOX('文章名称不能为空'));}else{$('input[name="article_name_ch"]').next().find('.requestbox').remove();}
			if(isNull.test(article_url)){ispass=0;$('input[name="article_url"]').next().append(ajax_returnrequiredorerror_BOX('文章链接不能为空'));}else{$('input[name="article_url"]').next().find('.requestbox').remove();}
			
			if(ispass == 1){
				$.post(baseurl+'index.php/admins/cms/edit_article/'+article_id, {
					//返回url
					backurl: backurl,
					//文章信息
					article_name_en: article_name_en,
					article_name_ch: article_name_ch,
					article_url: article_url,
					article_content_en: article_content_en,
					article_content_ch: article_content_ch,
					category_id: category_id,
					keyword_id: keyword_id,
					img1_gksel: img1_gksel
					
				},function (data){
					var obj = eval( "(" + data + ")" );
					actionsubmit_button.html('<img class="icon_success" src="'+baseurl+'themes/default/images/global_ok.png"/><span>保存成功</span>');
					location.href = obj.backurl;
				})
			}else{
				actionsubmit_button.attr('class', 'gksel_btn_action_on');
				actionsubmit_button.html('保存');
				isajaxsaveing = 0;//ajax正在保存中 --- 释放
			}
		}
	}
	
	
	
	//审批定制需求
	function toapprove_ajaxcategory(){
		$('.gksel_ajaxcategory_box_bg, .gksel_ajaxcategory_box').fadeIn(800);
	}
	//审批定制需求----处理程序
	function approve_ajaxcategory(){
		if(isajaxsaveing == 0){
			//具体点击的按钮
			actionsubmit_button = $('div[onclick="approve_ajaxcategory"]');
			
			//ajax正在保存中
			isajaxsaveing = 1;
			//将提交按钮设置为保存中
			actionsubmit_button.html('<img class="icon_loading" src="'+baseurl+'themes/default/images/ajax_loading.gif"/><span>Save...</span>');
			
			var category_name_en = $('input[name="category_name_en"]').val();
			var category_name_ch = $('input[name="category_name_ch"]').val();
			var ispass=1;
			if(isNull.test(category_name_en)){
				ispass = 0;
				$('input[name="category_name_en"]').next().append(ajax_returnrequiredorerror_BOX('分类名称不能为空'));
			}else{
				$('input[name="category_name_en"]').next().find('.requestbox').remove();
			}
			if(isNull.test(category_name_ch)){
				ispass = 0;
				$('input[name="category_name_ch"]').next().append(ajax_returnrequiredorerror_BOX('分类名称不能为空'));
			}else{
				$('input[name="category_name_ch"]').next().find('.requestbox').remove();
			}
			
			if(ispass == 1){
				$.post(baseurl+'index.php/admins/cms/add_article_category_ajax', {
					category_name_en: category_name_en,
					category_name_ch: category_name_ch
				},function (data){
					actionsubmit_button.html('<img class="icon_success" src="'+baseurl+'themes/default/images/global_ok.png"/><span>保存成功</span>');
					//处理
					var obj = eval( "(" + data + ")" );
					$('.choosecategoryarea').append('<div style="float:left;background:#EFEFEF;margin-right:10px;margin-bottom:10px;padding:5px 10px;"><input style="float:left;" id="category_id_'+obj.category_id+'" name="category_id[]" type="checkbox" value="'+obj.category_id+'" /><label style="float:left;" for="category_id_'+obj.category_id+'">'+obj.category_name_en+' '+obj.category_name_ch+'</label></div>');
					toclose_ajaxcategorybox();
					actionsubmit_button.html('Save');
					isajaxsaveing = 0;//ajax正在保存中 --- 释放
				})
			}else{
				actionsubmit_button.html('Save');
				isajaxsaveing = 0;//ajax正在保存中 --- 释放
			}
		}
	}
	//审批定制需求 ---- 关闭
	function toclose_ajaxcategorybox(){
		$('.gksel_ajaxcategory_box_bg, .gksel_ajaxcategory_box').fadeOut(800);
	}
	
	//审批定制需求
	function toapprove_ajaxkeyword(){
		$('.gksel_ajaxkeyword_box_bg, .gksel_ajaxkeyword_box').fadeIn(800);
	}
	//审批定制需求----处理程序
	function approve_ajaxkeyword(){
		if(isajaxsaveing == 0){
			//具体点击的按钮
			actionsubmit_button = $('div[onclick="approve_ajaxkeyword"]');
			
			//ajax正在保存中
			isajaxsaveing = 1;
			//将提交按钮设置为保存中
			actionsubmit_button.html('<img class="icon_loading" src="'+baseurl+'themes/default/images/ajax_loading.gif"/><span>Save...</span>');
			
			var keyword_name_en = $('input[name="keyword_name_en"]').val();
			var keyword_name_ch = $('input[name="keyword_name_ch"]').val();
			var ispass=1;
			if(isNull.test(keyword_name_en)){
				ispass = 0;
				$('input[name="keyword_name_en"]').next().append(ajax_returnrequiredorerror_BOX('分类名称不能为空'));
			}else{
				$('input[name="keyword_name_en"]').next().find('.requestbox').remove();
			}
			if(isNull.test(keyword_name_ch)){
				ispass = 0;
				$('input[name="keyword_name_ch"]').next().append(ajax_returnrequiredorerror_BOX('分类名称不能为空'));
			}else{
				$('input[name="keyword_name_ch"]').next().find('.requestbox').remove();
			}
			
			if(ispass == 1){
				$.post(baseurl+'index.php/admins/cms/add_keyword_ajax', {
					keyword_name_en: keyword_name_en,
					keyword_name_ch: keyword_name_ch
				},function (data){
					actionsubmit_button.html('<img class="icon_success" src="'+baseurl+'themes/default/images/global_ok.png"/><span>保存成功</span>');
					//处理
					var obj = eval( "(" + data + ")" );
					$('.choosekeywordarea').append('<div style="float:left;background:#EFEFEF;margin-right:10px;margin-bottom:10px;padding:5px 10px;"><input style="float:left;" id="keyword_id_'+obj.keyword_id+'" name="keyword_id[]" type="checkbox" value="'+obj.keyword_id+'" /><label style="float:left;" for="keyword_id_'+obj.keyword_id+'">'+obj.keyword_name_en+' '+obj.keyword_name_ch+'</label></div>');
					toclose_ajaxkeywordbox();
					actionsubmit_button.html('Save');
					isajaxsaveing = 0;//ajax正在保存中 --- 释放
				})
			}else{
				actionsubmit_button.html('Save');
				isajaxsaveing = 0;//ajax正在保存中 --- 释放
			}
		}
	}
	//审批定制需求 ---- 关闭
	function toclose_ajaxkeywordbox(){
		$('.gksel_ajaxkeyword_box_bg, .gksel_ajaxkeyword_box').fadeOut(800);
	}