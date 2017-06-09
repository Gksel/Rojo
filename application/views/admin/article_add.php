<?php $this->load->view('admin/header')?>
<script type='text/javascript' src='<?php echo base_url()?>ckeditor/ckeditor.js'></script>
<script type='text/javascript' src='<?php echo base_url()?>themes/default/js/fileuploader.js'></script>
<script type="text/javascript" src='<?php echo CDN_URL();?>themes/default/js/admin/admin_cms_article.js?date=<?php echo CACHE_USETIME()?>'></script>
<div class="gksel_ajaxcategory_box_bg"></div>
<div class="gksel_ajaxcategory_box">
	<table>
		<tr>
			<td>
				<div class="gksel_ajaxcategory_content">
					<div class="close"><img onclick="toclose_ajaxcategorybox()" src="<?php echo base_url().'themes/default/images/close.png'?>"></div>
					<div class="title">Add new article category</div>
					<input name="category_name_en" type="text" placeholder="<?php echo lang('cy_article_category_name')?> (English)"></input>
					<div class="tipsgroupbox"><div class="request">*</div></div>
					<input name="category_name_ch" type="text" placeholder="<?php echo lang('cy_article_category_name')?> (中文)"></input>
					<div class="tipsgroupbox"><div class="request">*</div></div>
					<div class="tipsgroupbox"></div>	
					<div class="control">
						<div class="yes" onclick="approve_ajaxcategory()"><?php echo lang('cy_save')?></div>
					</div>
				</div>
			</td>
		</tr>
	</table>
</div>
<div class="gksel_ajaxkeyword_box_bg"></div>
<div class="gksel_ajaxkeyword_box">
	<table>
		<tr>
			<td>
				<div class="gksel_ajaxkeyword_content">
					<div class="close"><img onclick="toclose_ajaxkeywordbox()" src="<?php echo base_url().'themes/default/images/close.png'?>"></div>
					<div class="title">Add new keyword</div>
					<input name="keyword_name_en" type="text" placeholder="<?php echo lang('cy_keyword_name')?> (English)"></input>
					<div class="tipsgroupbox"><div class="request">*</div></div>
					<input name="keyword_name_ch" type="text" placeholder="<?php echo lang('cy_keyword_name')?> (中文)"></input>
					<div class="tipsgroupbox"><div class="request">*</div></div>
					<div class="tipsgroupbox"></div>	
					<div class="control">
						<div class="yes" onclick="approve_ajaxkeyword()"><?php echo lang('cy_save')?></div>
					</div>
				</div>
			</td>
		</tr>
	</table>
</div>
<form method="post">
	<table class="gksel_normal_tabpost">
		<tr>
			<td align="right"><?php echo lang('cy_picture')?></td>
			<td>
				<div class="img_gksel_show" id="img1_gksel_show">
					<?php 
						$img1_gksel = '';
					?>
				</div>
				<div class="img_gksel_choose" id="img1_gksel_choose">上传图片</div>
				<div style="float:left;"><input type="hidden" id="img1_gksel" name="img1_gksel" value="<?php echo $img1_gksel;?>"/></div>
				<div style="float:left;margin-left:5px;margin-top:5px;"><font class="fonterror" id="img1_gksel_error"><font style="color:gray;">仅支持 Jpg, Png, Gif 格式 (550 * 345)</font></div>
			</td>
		</tr>
		<tr>
			<td align="right" width="150"><?php echo lang('cy_article_name')?> (English)</td>
			<td align="left">
				<input type="text" name="article_name_en" style="width:300px;" value=""/>
				<div class="tipsgroupbox"><div class="request">*</div></div>
			</td>
		</tr>
		<tr>
			<td align="right" width="150"><?php echo lang('cy_article_name')?> (中文)</td>
			<td align="left">
				<input type="text" name="article_name_ch" style="width:300px;" value=""/>
				<div class="tipsgroupbox"><div class="request">*</div></div>
			</td>
		</tr>
		<tr>
			<td align="right" width="150"><?php echo lang('cy_article_url')?></td>
			<td align="left">
				<input type="text" name="article_url" style="width:400px;" value=""/>
				<div class="tipsgroupbox"><div class="request">*</div></div>
			</td>
		</tr>
		<tr>
			<td align="right" width="150"><?php echo lang('cy_article_category')?></td>
			<td align="left" style="padding-top:10px;">
				<div class="choosecategoryarea" style="float:left;">
					<?php 
						$con=array('orderby'=>'a.sort','orderby_res'=>'ASC');
						$articlecategorylist=$this->CmsModel->getarticlecategorylist($con);
						if(!empty($articlecategorylist)){
							for ($i = 0; $i < count($articlecategorylist); $i++) {
								$ischecked = '';
								echo '<div style="float:left;background:#EFEFEF;margin-right:10px;margin-bottom:10px;padding:5px 10px;">';
								echo '<input style="float:left;" id="category_id_'.$articlecategorylist[$i]['category_id'].'" name="category_id[]" type="checkbox" value="'.$articlecategorylist[$i]['category_id'].'" '.$ischecked.'/>';
								echo '<label style="float:left;" for="category_id_'.$articlecategorylist[$i]['category_id'].'">'.$articlecategorylist[$i]['category_name_en'].' '.$articlecategorylist[$i]['category_name_ch'].'</label>';
								echo '</div>';
							}
						}
					?>
				</div>
				<div onclick="toapprove_ajaxcategory()" style="cursor:pointer;float:left;margin-right:10px;margin-bottom:10px;padding:5px 10px;">Add new</div>
			</td>
		</tr>
		<tr style="display:none;">
			<td align="right" width="150"><?php echo lang('cy_article_content')?> (English)</td>
		    <td align="left">
		    	<div style="float:left;width:800px;">
		    		<textarea id="article_content_en" name="article_content_en"></textarea>
		    	</div>
		    	<div class="tipsgroupbox"><div class="request">*</div></div>
		    </td>
	    </tr>
	    <tr style="display:none;">
			<td align="right" width="150"><?php echo lang('cy_article_content')?> (中文)</td>
		    <td align="left">
		    	<div style="float:left;width:800px;">
		    		<textarea style="float:left;" id="article_content_ch" name="article_content_ch"></textarea>
		    	</div>
		    	<div class="tipsgroupbox"><div class="request">*</div></div>
		    </td>
	    </tr>
	    <tr style="display:none;">
			<td align="right" width="150"><?php echo lang('cy_keywords')?></td>
			<td align="left" style="padding-top:10px;">
				<div class="choosekeywordarea" style="float:left;">
					<?php 
						$checkres = array();
						
						$con=array('orderby'=>'a.sort','orderby_res'=>'ASC');
						$articlekeywordlist=$this->CmsModel->getkeywordlist($con);
						if(!empty($articlekeywordlist)){
							for ($i = 0; $i < count($articlekeywordlist); $i++) {
								$ischecked = '';
								if(!empty($checkres)){
									for ($j = 0; $j < count($checkres); $j++) {
										if($checkres[$j]['keyword_id'] == $articlekeywordlist[$i]['keyword_id']){
											$ischecked = 'checked';
										}
									}
								}
								echo '<div style="float:left;background:#EFEFEF;margin-right:10px;padding:5px 10px;">';
								echo '<input style="float:left;" id="keyword_id_'.$articlekeywordlist[$i]['keyword_id'].'" name="keyword_id[]" type="checkbox" value="'.$articlekeywordlist[$i]['keyword_id'].'" '.$ischecked.'/>';
								echo '<label style="float:left;" for="keyword_id_'.$articlekeywordlist[$i]['keyword_id'].'">'.$articlekeywordlist[$i]['keyword_name_en'].' '.$articlekeywordlist[$i]['keyword_name_ch'].'</label>';
								echo '</div>';
							}
						}
					?>
				</div>
				<div onclick="toapprove_ajaxkeyword()" style="cursor:pointer;float:left;margin-right:10px;margin-bottom:10px;padding:5px 10px;">Add new</div>
			</td>
		</tr>
		<tr>
			<td>
				<input name="backurl" type="hidden" value="<?php echo $backurl?>"/>
			</td>
			<td align="left">
				<div class="gksel_btn_action_on" onclick="toadd_articleinfo()"><?php echo lang('cy_save')?></div>
			</td>
		</tr>
	</table>
</form>
<script type="text/javascript">
	if(CKEDITOR.instances["article_content_en"]){
		//判断是否绑定
		CKEDITOR.remove(CKEDITOR.instances["article_content_en"]); //解除绑定
	}
	CKEDITOR.replace( 'article_content_en',{
		toolbar :
        [
[  'Bold',  'Italic', 'Underline',  '-',  'NumberedList',  'BulletedList',  '-','JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock','-','Font', 'FontSize', 'lineheight', 'TextColor', 'BGColor','Image', 'Table', 'SpecialChar','-',  'Link',  'Unlink','link_rar','link_xls','link_doc','link_ppt','link_pdf','link_pic', 'Source' ]]
    });


	if(CKEDITOR.instances["article_content_ch"]){
		//判断是否绑定
		CKEDITOR.remove(CKEDITOR.instances["article_content_ch"]); //解除绑定
	}
	CKEDITOR.replace( 'article_content_ch',{
		toolbar :
        [
[  'Bold',  'Italic', 'Underline',  '-',  'NumberedList',  'BulletedList',  '-','JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock','-','Font', 'FontSize', 'lineheight', 'TextColor', 'BGColor','Image', 'Table', 'SpecialChar','-',  'Link',  'Unlink','link_rar','link_xls','link_doc','link_ppt','link_pdf','link_pic', 'Source' ]]
    });
</script>
<script type="text/javascript">
$(document).ready(function(){
	var button_gksel1 = $('#img1_gksel_choose'), interval;
	if(button_gksel1.length>0){
		new AjaxUpload(button_gksel1,{
			action: baseurl+'index.php/welcome/uplogo/1100/690', 
			name: 'logo',onSubmit : function(file, ext){
				if (ext && /^(jpg|png|gif)$/.test(ext)){
					button_gksel1.text('上传中');
					this.disable();
					interval = window.setInterval(function(){
						var text = button_gksel1.text();
						if (text.length < 13){
							button_gksel1.text(text + '.');					
						} else {
							button_gksel1.text('上传中');				
						}
					}, 200);
				} else {
					$('#img1_gksel_error').html('上传失败');
					return false;
				}
			},
			onComplete: function(file, response){
				button_gksel1.text('上传图片');						
				window.clearInterval(interval);
				this.enable();
				if(response=='false'){
					$('#img1_gksel_error').html('上传失败');
				}else{
					var pic = eval("("+response+")");
					$('#img1_gksel_show').html('<img style="float:left;max-width:400px;max-height:400px;" src="'+baseurl+pic.logo+'" />');
					$('#img1_gksel').attr('value',pic.logo);
					$('#img1_gksel_error').html('');
				}	
			}
		});
	}
})
</script>
<?php $this->load->view('admin/footer')?>