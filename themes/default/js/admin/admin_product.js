	//删除商品
	function todel_product(id, name){
		var title = '您确定要删除商品<font style="color:red;">【'+name+'】</font>吗？';
		var subtitle = '';
		del_url = encodeURI(baseurl+"index.php/admins/product/del_product/"+id);
		todel(title, subtitle);
	}
	//删除商品分类
	function todel_productcategory(id, name){
		var title = '您确定要删除商品分类<font style="color:red;">【'+name+'】</font>吗？';
		var subtitle = '';
		del_url = encodeURI(baseurl+"index.php/admins/product/del_productcategory/"+id);
		todel(title, subtitle);
	}
	//删除工厂
	function todel_productfactory(id, name){
		var title = '您确定要删除工厂<font style="color:red;">【'+name+'】</font>吗？';
		var subtitle = '';
		del_url = encodeURI(baseurl+"index.php/admins/product/del_productfactory/"+id);
		todel(title, subtitle);
	}
	//删除商品分类
	function todel_productpicture(id, name){
		var title = '您确定要删除图片<font style="color:red;">【'+name+'】</font>吗？';
		var subtitle = '';
		del_url = encodeURI(baseurl+"index.php/admins/product/del_picture/"+id);
		todel(title, subtitle);
	}
	//删除兑换产品
	function todel_loyalty(id, name){
		var title = '您确定要删除商品<font style="color:red;">【'+name+'】</font>吗？';
		var subtitle = '';
		del_url = encodeURI(baseurl+"index.php/admins/product/del_loyalty/"+id);
		todel(title, subtitle);
	}
	//商品子分类---添加
	function toadd_productsubcategoryinfo(parent){
		if(isajaxsaveing == 0){
			//具体点击的按钮
			actionsubmit_button = $('div[onclick="toadd_productsubcategoryinfo('+parent+')"]');
			//ajax正在保存中
			isajaxsaveing = 1;
			//返回url
			var backurl = $('input[name="backurl"]').val();
			var subbackurl = $('input[name="subbackurl"]').val();
			//将提交按钮设置为保存中
			actionsubmit_button.attr('class', 'gksel_btn_action_off');
			actionsubmit_button.html('<img class="icon_loading" src="'+baseurl+'themes/default/images/ajax_loading.gif"/><span>保存中...</span>');
			
			//商品分类信息
			var category_name_en = $('input[name="category_name_en"]').val();
			var category_name_ch = $('input[name="category_name_ch"]').val();
			
			var ispass=1;
			//验证商品分类名称
			if(isNull.test(category_name_en)){ispass=0;$('input[name="category_name_en"]').next().append(ajax_returnrequiredorerror_BOX('产品分类名称不能为空'));}else{$('input[name="category_name_en"]').next().find('.requestbox').remove();}
			if(isNull.test(category_name_ch)){ispass=0;$('input[name="category_name_ch"]').next().append(ajax_returnrequiredorerror_BOX('产品分类名称不能为空'));}else{$('input[name="category_name_ch"]').next().find('.requestbox').remove();}
			
			if(ispass == 1){
				$.post(baseurl+'index.php/admins/product/add_product_subcategory/'+parent, {
					//返回url
					backurl: backurl,
					subbackurl: subbackurl,
					//商品分类信息
					category_name_en: category_name_en,
					category_name_ch: category_name_ch
					
				},function (data){
					var obj = eval( "(" + data + ")" );
					actionsubmit_button.html('<img class="icon_success" src="'+baseurl+'themes/default/images/global_ok.png"/><span>保存成功</span>');
					location.href = obj.subbackurl;
				})
			}else{
				actionsubmit_button.attr('class', 'gksel_btn_action_on');
				actionsubmit_button.html('保存');
				isajaxsaveing = 0;//ajax正在保存中 --- 释放
			}
		}
	}
	//商品子分类---保存
	function tosave_productsubcategoryinfo(parent, category_id){
		if(isajaxsaveing == 0){
			//具体点击的按钮
			actionsubmit_button = $('div[onclick="tosave_productsubcategoryinfo('+parent+', '+category_id+')"]');
			//ajax正在保存中
			isajaxsaveing = 1;
			//返回url
			var backurl = $('input[name="backurl"]').val();
			var subbackurl = $('input[name="subbackurl"]').val();
			//将提交按钮设置为保存中
			actionsubmit_button.attr('class', 'gksel_btn_action_off');
			actionsubmit_button.html('<img class="icon_loading" src="'+baseurl+'themes/default/images/ajax_loading.gif"/><span>保存中...</span>');
			
			//商品分类信息
			var category_name_en = $('input[name="category_name_en"]').val();
			var category_name_ch = $('input[name="category_name_ch"]').val();
			
			var ispass=1;
			//验证商品分类名称
			if(isNull.test(category_name_en)){ispass=0;$('input[name="category_name_en"]').next().append(ajax_returnrequiredorerror_BOX('产品分类名称不能为空'));}else{$('input[name="category_name_en"]').next().find('.requestbox').remove();}
			if(isNull.test(category_name_ch)){ispass=0;$('input[name="category_name_ch"]').next().append(ajax_returnrequiredorerror_BOX('产品分类名称不能为空'));}else{$('input[name="category_name_ch"]').next().find('.requestbox').remove();}
			
			if(ispass == 1){
				$.post(baseurl+'index.php/admins/product/edit_productsubcategory/'+parent+'/'+category_id, {
					//返回url
					backurl: backurl,
					subbackurl: subbackurl,
					//商品分类信息
					category_name_en: category_name_en,
					category_name_ch: category_name_ch
					
				},function (data){
					var obj = eval( "(" + data + ")" );
					actionsubmit_button.html('<img class="icon_success" src="'+baseurl+'themes/default/images/global_ok.png"/><span>保存成功</span>');
					location.href = obj.subbackurl;
				})
			}else{
				actionsubmit_button.attr('class', 'gksel_btn_action_on');
				actionsubmit_button.html('保存');
				isajaxsaveing = 0;//ajax正在保存中 --- 释放
			}
		}
	}
	
	//商品分类---添加
	function toadd_productcategoryinfo(){
		if(isajaxsaveing == 0){
			//具体点击的按钮
			actionsubmit_button = $('div[onclick="toadd_productcategoryinfo()"]');
			//ajax正在保存中
			isajaxsaveing = 1;
			//返回url
			var backurl = $('input[name="backurl"]').val();
			//将提交按钮设置为保存中
			actionsubmit_button.attr('class', 'gksel_btn_action_off');
			actionsubmit_button.html('<img class="icon_loading" src="'+baseurl+'themes/default/images/ajax_loading.gif"/><span>保存中...</span>');
			
			//商品分类信息
			var category_name_en = $('input[name="category_name_en"]').val();
			var category_name_ch = $('input[name="category_name_ch"]').val();
			
			var ispass=1;
			//验证商品分类名称
			if(isNull.test(category_name_en)){ispass=0;$('input[name="category_name_en"]').next().append(ajax_returnrequiredorerror_BOX('产品分类名称不能为空'));}else{$('input[name="category_name_en"]').next().find('.requestbox').remove();}
			if(isNull.test(category_name_ch)){ispass=0;$('input[name="category_name_ch"]').next().append(ajax_returnrequiredorerror_BOX('产品分类名称不能为空'));}else{$('input[name="category_name_ch"]').next().find('.requestbox').remove();}
			
			if(ispass == 1){
				$.post(baseurl+'index.php/admins/product/add_product_category', {
					//返回url
					backurl: backurl,
					//商品分类信息
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
	//商品分类---保存
	function tosave_productcategoryinfo(category_id){
		if(isajaxsaveing == 0){
			//具体点击的按钮
			actionsubmit_button = $('div[onclick="tosave_productcategoryinfo('+category_id+')"]');
			//ajax正在保存中
			isajaxsaveing = 1;
			//返回url
			var backurl = $('input[name="backurl"]').val();
			//将提交按钮设置为保存中
			actionsubmit_button.attr('class', 'gksel_btn_action_off');
			actionsubmit_button.html('<img class="icon_loading" src="'+baseurl+'themes/default/images/ajax_loading.gif"/><span>保存中...</span>');
			
			//商品分类信息
			var category_name_en = $('input[name="category_name_en"]').val();
			var category_name_ch = $('input[name="category_name_ch"]').val();
			
			var ispass=1;
			//验证商品分类名称
			if(isNull.test(category_name_en)){ispass=0;$('input[name="category_name_en"]').next().append(ajax_returnrequiredorerror_BOX('产品分类名称不能为空'));}else{$('input[name="category_name_en"]').next().find('.requestbox').remove();}
			if(isNull.test(category_name_ch)){ispass=0;$('input[name="category_name_ch"]').next().append(ajax_returnrequiredorerror_BOX('产品分类名称不能为空'));}else{$('input[name="category_name_ch"]').next().find('.requestbox').remove();}
			
			if(ispass == 1){
				$.post(baseurl+'index.php/admins/product/edit_productcategory/'+category_id, {
					//返回url
					backurl: backurl,
					//商品分类信息
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
	//商品信息---添加
	function toadd_productinfo(){
		if(isajaxsaveing == 0){
			//具体点击的按钮
			actionsubmit_button = $('div[onclick="toadd_productinfo()"]');
			//ajax正在保存中
			isajaxsaveing = 1;
			//返回url
			var backurl = $('input[name="backurl"]').val();
			//将提交按钮设置为保存中
			actionsubmit_button.attr('class', 'gksel_btn_action_off');
			actionsubmit_button.html('<img class="icon_loading" src="'+baseurl+'themes/default/images/ajax_loading.gif"/><span>保存中...</span>');
			
			//商品信息
			var img1_gksel = $('input[name="img1_gksel"]').val();
			var product_name_en = $('input[name="product_name_en"]').val();
			var product_name_ch = $('input[name="product_name_ch"]').val();
			var product_SKUno = $('input[name="product_SKUno"]').val();
			var brand_id = $('select[name="brand_id"]').val();
			var uid = $('select[name="uid"]').val();
			
			var product_tagline_en = $('textarea[name="product_tagline_en"]').val();
			var product_tagline_ch = $('textarea[name="product_tagline_ch"]').val();

			var product_country = $('input[name="product_country"]').val();
			var product_price_select = $('input[name="product_price_select"]').val();
			var product_price_regular = $('input[name="product_price_regular"]').val();
			var product_price_promotion = $('input[name="product_price_promotion"]').val();
			
			var product_description_en = CKEDITOR.instances.product_description_en.getData();
			var product_description_ch = CKEDITOR.instances.product_description_ch.getData();
			
			var category_id_arr = $('input[name="category_id[]"]');
			var category_id = [];
			if(category_id_arr.length > 0){
				for(var i = 0; i < category_id_arr.length; i++){
					if(category_id_arr[i].checked == true){
						category_id.push(category_id_arr[i].value);
					}
				}
			}
			
			var ispass=1;
			//验证商品名称
			if(isNull.test(product_name_en)){ispass=0;$('input[name="product_name_en"]').next().append(ajax_returnrequiredorerror_BOX('商品名称不能为空'));}else{$('input[name="product_name_en"]').next().find('.requestbox').remove();}
			if(isNull.test(product_name_ch)){ispass=0;$('input[name="product_name_ch"]').next().append(ajax_returnrequiredorerror_BOX('商品名称不能为空'));}else{$('input[name="product_name_ch"]').next().find('.requestbox').remove();}
//			if(isNull.test(product_SKUno)){ispass=0;$('input[name="product_SKUno"]').next().append(ajax_returnrequiredorerror_BOX('产品编号不能为空'));}else{$('input[name="product_SKUno"]').next().find('.requestbox').remove();}
//			if(isNull.test(product_price_regular)){ispass=0;$('input[name="product_price_regular"]').next().append(ajax_returnrequiredorerror_BOX('日常价格不能为空'));}else{if(!isNaN(product_price_regular)){$('input[name="product_price_regular"]').next().find('.requestbox').remove();}else{ispass=0;$('input[name="product_price_regular"]').next().append(ajax_returnrequiredorerror_BOX('日常价格格式错误'));}}
//			if(isNull.test(product_price_promotion)){}else{if(!isNaN(product_price_promotion)){$('input[name="product_price_promotion"]').next().find('.requestbox').remove();}else{ispass=0;$('input[name="product_price_promotion"]').next().append(ajax_returnrequiredorerror_BOX('促销价格式错误'));}}
			
			if(ispass == 1){
				$.post(baseurl+'index.php/admins/product/add_product', {
					//返回url
					backurl: backurl,
					//商品信息
					product_name_en: product_name_en,
					product_name_ch: product_name_ch,
					product_SKUno: product_SKUno,
					brand_id: brand_id,
					uid: uid,
					
					product_tagline_en: product_tagline_en,
					product_tagline_ch: product_tagline_ch,
					
					product_country: product_country,
					product_price_select: product_price_select,
					product_price_regular: product_price_regular,
					product_price_promotion: product_price_promotion,
					
					product_description_en: product_description_en,
					product_description_ch: product_description_ch,
					
					category_id: category_id,
					
					img1_gksel: img1_gksel
					
				},function (data){
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
	//商品信息---保存
	function tosave_productinfo(product_id){
		if(isajaxsaveing == 0){
			//具体点击的按钮
			actionsubmit_button = $('div[onclick="tosave_productinfo('+product_id+')"]');
			//ajax正在保存中
			isajaxsaveing = 1;
			//返回url
			var backurl = $('input[name="backurl"]').val();
			//将提交按钮设置为保存中
			actionsubmit_button.attr('class', 'gksel_btn_action_off');
			actionsubmit_button.html('<img class="icon_loading" src="'+baseurl+'themes/default/images/ajax_loading.gif"/><span>保存中...</span>');
			
			//商品信息
			var img1_gksel = $('input[name="img1_gksel"]').val();
			var product_name_en = $('input[name="product_name_en"]').val();
			var product_name_ch = $('input[name="product_name_ch"]').val();
			var product_SKUno = $('input[name="product_SKUno"]').val();
			var brand_id = $('select[name="brand_id"]').val();
			var uid = $('select[name="uid"]').val();
			
			var product_tagline_en = $('textarea[name="product_tagline_en"]').val();
			var product_tagline_ch = $('textarea[name="product_tagline_ch"]').val();

			var product_country = $('input[name="product_country"]').val();
			var product_price_select = $('input[name="product_price_select"]').val();
			var product_price_regular = $('input[name="product_price_regular"]').val();
			var product_price_promotion = $('input[name="product_price_promotion"]').val();
			
			var product_description_en = CKEDITOR.instances.product_description_en.getData();
			var product_description_ch = CKEDITOR.instances.product_description_ch.getData();
			
			var category_id_arr = $('input[name="category_id[]"]');
			var category_id = [];
			if(category_id_arr.length > 0){
				for(var i = 0; i < category_id_arr.length; i++){
					if(category_id_arr[i].checked == true){
						category_id.push(category_id_arr[i].value);
					}
				}
			}
			
			var ispass=1;
			//验证商品名称
			if(isNull.test(product_name_en)){ispass=0;$('input[name="product_name_en"]').next().append(ajax_returnrequiredorerror_BOX('商品名称不能为空'));}else{$('input[name="product_name_en"]').next().find('.requestbox').remove();}
			if(isNull.test(product_name_ch)){ispass=0;$('input[name="product_name_ch"]').next().append(ajax_returnrequiredorerror_BOX('商品名称不能为空'));}else{$('input[name="product_name_ch"]').next().find('.requestbox').remove();}
//			if(isNull.test(product_SKUno)){ispass=0;$('input[name="product_SKUno"]').next().append(ajax_returnrequiredorerror_BOX('产品编号不能为空'));}else{$('input[name="product_SKUno"]').next().find('.requestbox').remove();}
//			if(isNull.test(product_price_regular)){ispass=0;$('input[name="product_price_regular"]').next().append(ajax_returnrequiredorerror_BOX('日常价格不能为空'));}else{if(!isNaN(product_price_regular)){$('input[name="product_price_regular"]').next().find('.requestbox').remove();}else{ispass=0;$('input[name="product_price_regular"]').next().append(ajax_returnrequiredorerror_BOX('日常价格格式错误'));}}
//			if(isNull.test(product_price_promotion)){}else{if(!isNaN(product_price_promotion)){$('input[name="product_price_promotion"]').next().find('.requestbox').remove();}else{ispass=0;$('input[name="product_price_promotion"]').next().append(ajax_returnrequiredorerror_BOX('促销价格式错误'));}}
			
			if(ispass == 1){
				$.post(baseurl+'index.php/admins/product/edit_product/'+product_id, {
					//返回url
					backurl: backurl,
					//商品信息
					product_name_en: product_name_en,
					product_name_ch: product_name_ch,
					product_SKUno: product_SKUno,
					brand_id: brand_id,
					uid: uid,
					
					product_tagline_en: product_tagline_en,
					product_tagline_ch: product_tagline_ch,
					
					product_country: product_country,
					product_price_select: product_price_select,
					product_price_regular: product_price_regular,
					product_price_promotion: product_price_promotion,
					
					product_description_en: product_description_en,
					product_description_ch: product_description_ch,
					
					category_id: category_id,
					
					img1_gksel: img1_gksel
					
				},function (data){
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
	
	
	//图片---添加
	function toadd_pictureinfo(product_id){
		if(isajaxsaveing == 0){
			//具体点击的按钮
			actionsubmit_button = $('div[onclick="toadd_pictureinfo('+product_id+')"]');
			//ajax正在保存中
			isajaxsaveing = 1;
			//返回url
			var backurl = $('input[name="backurl"]').val();
			var subbackurl = $('input[name="subbackurl"]').val();
			//将提交按钮设置为保存中
			actionsubmit_button.attr('class', 'gksel_btn_action_off');
			actionsubmit_button.html('<img class="icon_loading" src="'+baseurl+'themes/default/images/ajax_loading.gif"/><span>保存中...</span>');
			
			//商品分类信息
			var img1_gksel = $('input[name="img1_gksel"]').val();
			var picture_name_en = $('input[name="picture_name_en"]').val();
			var picture_name_ch = $('input[name="picture_name_ch"]').val();
			
			var ispass=1;
			//验证商品分类名称
			if(isNull.test(picture_name_en)){ispass=0;$('input[name="picture_name_en"]').next().append(ajax_returnrequiredorerror_BOX('图片名称不能为空'));}else{$('input[name="picture_name_en"]').next().find('.requestbox').remove();}
			if(isNull.test(picture_name_ch)){ispass=0;$('input[name="picture_name_ch"]').next().append(ajax_returnrequiredorerror_BOX('图片名称不能为空'));}else{$('input[name="picture_name_ch"]').next().find('.requestbox').remove();}
			
			if(ispass == 1){
				$.post(baseurl+'index.php/admins/product/add_picture/'+product_id, {
					//返回url
					backurl: backurl,
					subbackurl: subbackurl,
					//商品分类信息
					picture_name_en: picture_name_en,
					picture_name_ch: picture_name_ch,
					img1_gksel: img1_gksel
				},function (data){
					var obj = eval( "(" + data + ")" );
					actionsubmit_button.html('<img class="icon_success" src="'+baseurl+'themes/default/images/global_ok.png"/><span>保存成功</span>');
					location.href = obj.subbackurl;
				})
			}else{
				actionsubmit_button.attr('class', 'gksel_btn_action_on');
				actionsubmit_button.html('保存');
				isajaxsaveing = 0;//ajax正在保存中 --- 释放
			}
		}
	}
	//图片---保存
	function tosave_pictureinfo(product_id, picture_id){
		if(isajaxsaveing == 0){
			//具体点击的按钮
			actionsubmit_button = $('div[onclick="tosave_pictureinfo('+product_id+', '+picture_id+')"]');
			//ajax正在保存中
			isajaxsaveing = 1;
			//返回url
			var backurl = $('input[name="backurl"]').val();
			var subbackurl = $('input[name="subbackurl"]').val();
			//将提交按钮设置为保存中
			actionsubmit_button.attr('class', 'gksel_btn_action_off');
			actionsubmit_button.html('<img class="icon_loading" src="'+baseurl+'themes/default/images/ajax_loading.gif"/><span>保存中...</span>');
			
			//商品分类信息
			var img1_gksel = $('input[name="img1_gksel"]').val();
			var picture_name_en = $('input[name="picture_name_en"]').val();
			var picture_name_ch = $('input[name="picture_name_ch"]').val();
			
			var ispass=1;
			//验证商品分类名称
			if(isNull.test(picture_name_en)){ispass=0;$('input[name="picture_name_en"]').next().append(ajax_returnrequiredorerror_BOX('图片名称不能为空'));}else{$('input[name="picture_name_en"]').next().find('.requestbox').remove();}
			if(isNull.test(picture_name_ch)){ispass=0;$('input[name="picture_name_ch"]').next().append(ajax_returnrequiredorerror_BOX('图片名称不能为空'));}else{$('input[name="picture_name_ch"]').next().find('.requestbox').remove();}
			
			if(ispass == 1){
				$.post(baseurl+'index.php/admins/product/edit_picture/'+product_id+'/'+picture_id, {
					//返回url
					backurl: backurl,
					subbackurl: subbackurl,
					//商品分类信息
					picture_name_en: picture_name_en,
					picture_name_ch: picture_name_ch,
					img1_gksel: img1_gksel
				},function (data){
					var obj = eval( "(" + data + ")" );
					actionsubmit_button.html('<img class="icon_success" src="'+baseurl+'themes/default/images/global_ok.png"/><span>保存成功</span>');
					location.href = obj.subbackurl;
				})
			}else{
				actionsubmit_button.attr('class', 'gksel_btn_action_on');
				actionsubmit_button.html('保存');
				isajaxsaveing = 0;//ajax正在保存中 --- 释放
			}
		}
	}
	
	
	//导入信息---添加
	function toadd_importinfo(){
		if(isajaxsaveing == 0){
			//具体点击的按钮
			actionsubmit_button = $('div[onclick="toadd_importinfo()"]');
			//ajax正在保存中
			isajaxsaveing = 1;
			//返回url
			var backurl = $('input[name="backurl"]').val();
			//将提交按钮设置为保存中
			actionsubmit_button.attr('class', 'gksel_btn_action_off');
			actionsubmit_button.html('<img class="icon_loading" src="'+baseurl+'themes/default/images/ajax_loading.gif"/><span>保存中...</span>');
			
			//商品信息
			var img1_gksel = $('input[name="img1_gksel"]').val();
			var import_memo = $('textarea[name="import_memo"]').val();
			
			var ispass=1;
			if(ispass == 1){
				$.post(baseurl+'index.php/admins/product/import_product', {
					//返回url
					backurl: backurl,
					import_memo: import_memo,
					img1_gksel: img1_gksel
				},function (data){
					var obj = eval( "(" + data + ")" );
					actionsubmit_button.html('<img class="icon_success" src="'+baseurl+'themes/default/images/global_ok.png"/><span>保存成功</span>');
					location.href = baseurl + 'index.php/admins/product/toimport_question_finish/'+obj.import_id;
				})
			}else{
				actionsubmit_button.attr('class', 'gksel_btn_action_on');
				actionsubmit_button.html('保存');
				isajaxsaveing = 0;//ajax正在保存中 --- 释放
			}
		}
	}
	
	//导入信息---添加
	function tofinish_importinfo(import_id){
		if(isajaxsaveing == 0){
			//具体点击的按钮
			actionsubmit_button = $('div[onclick="tofinish_importinfo('+import_id+')"]');
			//ajax正在保存中
			isajaxsaveing = 1;
			//返回url
			var backurl = $('input[name="backurl"]').val();
			//将提交按钮设置为保存中
			actionsubmit_button.attr('class', 'gksel_btn_action_off');
			actionsubmit_button.html('<img class="icon_loading" src="'+baseurl+'themes/default/images/ajax_loading.gif"/><span>保存中...</span>');
			
			$.post(baseurl+'index.php/admins/product/importexcel/'+import_id, {
				//返回url
				backurl: backurl
			},function (data){
				actionsubmit_button.html('<img class="icon_success" src="'+baseurl+'themes/default/images/global_ok.png"/><span>保存成功</span>');
				location.href = baseurl + 'index.php/admins/product/importhistorylist';
			})
		}
	}
	
	
	//兑换产品信息---添加
	function toadd_loyaltyinfo(){
		if(isajaxsaveing == 0){
			//具体点击的按钮
			actionsubmit_button = $('div[onclick="toadd_loyaltyinfo()"]');
			//ajax正在保存中
			isajaxsaveing = 1;
			//返回url
			var backurl = $('input[name="backurl"]').val();
			//将提交按钮设置为保存中
			actionsubmit_button.attr('class', 'gksel_btn_action_off');
			actionsubmit_button.html('<img class="icon_loading" src="'+baseurl+'themes/default/images/ajax_loading.gif"/><span>保存中...</span>');
			
			//兑换产品信息
			var img1_gksel = $('input[name="img1_gksel"]').val();
			var loyalty_name_en = $('input[name="loyalty_name_en"]').val();
			var loyalty_name_ch = $('input[name="loyalty_name_ch"]').val();
			
			var loyalty_tagline_en = $('textarea[name="loyalty_tagline_en"]').val();
			var loyalty_tagline_ch = $('textarea[name="loyalty_tagline_ch"]').val();

			var loyalty_points = $('input[name="loyalty_points"]').val();
			
			var loyalty_description_en = CKEDITOR.instances.loyalty_description_en.getData();
			var loyalty_description_ch = CKEDITOR.instances.loyalty_description_ch.getData();
			
			var category_id_arr = $('input[name="category_id[]"]');
			var category_id = [];
			if(category_id_arr.length > 0){
				for(var i = 0; i < category_id_arr.length; i++){
					if(category_id_arr[i].checked == true){
						category_id.push(category_id_arr[i].value);
					}
				}
			}
			
			var ispass=1;
			if(isNull.test(loyalty_name_en)){ispass=0;$('input[name="loyalty_name_en"]').next().append(ajax_returnrequiredorerror_BOX('商品名称不能为空'));}else{$('input[name="loyalty_name_en"]').next().find('.requestbox').remove();}
			if(isNull.test(loyalty_name_ch)){ispass=0;$('input[name="loyalty_name_ch"]').next().append(ajax_returnrequiredorerror_BOX('商品名称不能为空'));}else{$('input[name="loyalty_name_ch"]').next().find('.requestbox').remove();}
			if(isNull.test(loyalty_points)){ispass=0;$('input[name="loyalty_points"]').next().append(ajax_returnrequiredorerror_BOX('需要积分不能为空'));}else{if(!isNaN(loyalty_points)){$('input[name="loyalty_points"]').next().find('.requestbox').remove();}else{ispass=0;$('input[name="loyalty_points"]').next().append(ajax_returnrequiredorerror_BOX('需要积分格式错误'));}}
			
			if(ispass == 1){
				$.post(baseurl+'index.php/admins/product/add_loyalty', {
					//返回url
					backurl: backurl,
					//商品信息
					loyalty_name_en: loyalty_name_en,
					loyalty_name_ch: loyalty_name_ch,
					
					loyalty_tagline_en: loyalty_tagline_en,
					loyalty_tagline_ch: loyalty_tagline_ch,
					
					loyalty_points: loyalty_points,
					
					loyalty_description_en: loyalty_description_en,
					loyalty_description_ch: loyalty_description_ch,
					
					img1_gksel: img1_gksel,
					category_id:category_id
					
				},function (data){
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
	//兑换产品信息---保存
	function tosave_loyaltyinfo(loyalty_id){
		if(isajaxsaveing == 0){
			//具体点击的按钮
			actionsubmit_button = $('div[onclick="tosave_loyaltyinfo('+loyalty_id+')"]');
			//ajax正在保存中
			isajaxsaveing = 1;
			//返回url
			var backurl = $('input[name="backurl"]').val();
			//将提交按钮设置为保存中
			actionsubmit_button.attr('class', 'gksel_btn_action_off');
			actionsubmit_button.html('<img class="icon_loading" src="'+baseurl+'themes/default/images/ajax_loading.gif"/><span>保存中...</span>');
			
			//兑换产品信息
			var img1_gksel = $('input[name="img1_gksel"]').val();
			var loyalty_name_en = $('input[name="loyalty_name_en"]').val();
			var loyalty_name_ch = $('input[name="loyalty_name_ch"]').val();
			
			var loyalty_tagline_en = $('textarea[name="loyalty_tagline_en"]').val();
			var loyalty_tagline_ch = $('textarea[name="loyalty_tagline_ch"]').val();

			var loyalty_points = $('input[name="loyalty_points"]').val();
			
			var loyalty_description_en = CKEDITOR.instances.loyalty_description_en.getData();
			var loyalty_description_ch = CKEDITOR.instances.loyalty_description_ch.getData();
			
			var category_id_arr = $('input[name="category_id[]"]');
			var category_id = [];
			if(category_id_arr.length > 0){
				for(var i = 0; i < category_id_arr.length; i++){
					if(category_id_arr[i].checked == true){
						category_id.push(category_id_arr[i].value);
					}
				}
			}
			
			var ispass=1;
			if(isNull.test(loyalty_name_en)){ispass=0;$('input[name="loyalty_name_en"]').next().append(ajax_returnrequiredorerror_BOX('商品名称不能为空'));}else{$('input[name="loyalty_name_en"]').next().find('.requestbox').remove();}
			if(isNull.test(loyalty_name_ch)){ispass=0;$('input[name="loyalty_name_ch"]').next().append(ajax_returnrequiredorerror_BOX('商品名称不能为空'));}else{$('input[name="loyalty_name_ch"]').next().find('.requestbox').remove();}
			if(isNull.test(loyalty_points)){ispass=0;$('input[name="loyalty_points"]').next().append(ajax_returnrequiredorerror_BOX('需要积分不能为空'));}else{if(!isNaN(loyalty_points)){$('input[name="loyalty_points"]').next().find('.requestbox').remove();}else{ispass=0;$('input[name="loyalty_points"]').next().append(ajax_returnrequiredorerror_BOX('需要积分格式错误'));}}
			
			if(ispass == 1){
				$.post(baseurl+'index.php/admins/product/edit_loyalty/'+loyalty_id, {
					//返回url
					backurl: backurl,
					//商品信息
					loyalty_name_en: loyalty_name_en,
					loyalty_name_ch: loyalty_name_ch,
					
					loyalty_tagline_en: loyalty_tagline_en,
					loyalty_tagline_ch: loyalty_tagline_ch,
					
					loyalty_points: loyalty_points,
					
					loyalty_description_en: loyalty_description_en,
					loyalty_description_ch: loyalty_description_ch,
					
					img1_gksel: img1_gksel,
					category_id:category_id
					
				},function (data){
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
	
	
	
	//工厂---添加
	function toadd_productfactoryinfo(){
		if(isajaxsaveing == 0){
			//具体点击的按钮
			actionsubmit_button = $('div[onclick="toadd_productfactoryinfo()"]');
			//ajax正在保存中
			isajaxsaveing = 1;
			//返回url
			var backurl = $('input[name="backurl"]').val();
			//将提交按钮设置为保存中
			actionsubmit_button.attr('class', 'gksel_btn_action_off');
			actionsubmit_button.html('<img class="icon_loading" src="'+baseurl+'themes/default/images/ajax_loading.gif"/><span>保存中...</span>');
			
			//工厂信息
			var factory_name_en = $('input[name="factory_name_en"]').val();
			var factory_name_ch = $('input[name="factory_name_ch"]').val();
			
			var ispass=1;
			//验证工厂名称
			if(isNull.test(factory_name_en)){ispass=0;$('input[name="factory_name_en"]').next().append(ajax_returnrequiredorerror_BOX('工厂名称不能为空'));}else{$('input[name="factory_name_en"]').next().find('.requestbox').remove();}
			if(isNull.test(factory_name_ch)){ispass=0;$('input[name="factory_name_ch"]').next().append(ajax_returnrequiredorerror_BOX('工厂名称不能为空'));}else{$('input[name="factory_name_ch"]').next().find('.requestbox').remove();}
			
			if(ispass == 1){
				$.post(baseurl+'index.php/admins/product/add_product_factory', {
					//返回url
					backurl: backurl,
					//工厂信息
					factory_name_en: factory_name_en,
					factory_name_ch: factory_name_ch
					
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
	//工厂---保存
	function tosave_productfactoryinfo(factory_id){
		if(isajaxsaveing == 0){
			//具体点击的按钮
			actionsubmit_button = $('div[onclick="tosave_productfactoryinfo('+factory_id+')"]');
			//ajax正在保存中
			isajaxsaveing = 1;
			//返回url
			var backurl = $('input[name="backurl"]').val();
			//将提交按钮设置为保存中
			actionsubmit_button.attr('class', 'gksel_btn_action_off');
			actionsubmit_button.html('<img class="icon_loading" src="'+baseurl+'themes/default/images/ajax_loading.gif"/><span>保存中...</span>');
			
			//工厂信息
			var factory_name_en = $('input[name="factory_name_en"]').val();
			var factory_name_ch = $('input[name="factory_name_ch"]').val();
			
			var ispass=1;
			//验证工厂名称
			if(isNull.test(factory_name_en)){ispass=0;$('input[name="factory_name_en"]').next().append(ajax_returnrequiredorerror_BOX('工厂名称不能为空'));}else{$('input[name="factory_name_en"]').next().find('.requestbox').remove();}
			if(isNull.test(factory_name_ch)){ispass=0;$('input[name="factory_name_ch"]').next().append(ajax_returnrequiredorerror_BOX('工厂名称不能为空'));}else{$('input[name="factory_name_ch"]').next().find('.requestbox').remove();}
			
			if(ispass == 1){
				$.post(baseurl+'index.php/admins/product/edit_productfactory/'+factory_id, {
					//返回url
					backurl: backurl,
					//工厂信息
					factory_name_en: factory_name_en,
					factory_name_ch: factory_name_ch
					
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
	
	