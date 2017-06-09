<?php $this->load->view('admin/header')?>
<script type='text/javascript' src='<?php echo base_url()?>ckeditor/ckeditor.js'></script>
<script type='text/javascript' src='<?php echo base_url()?>themes/default/js/fileuploader.js'></script>
<script type="text/javascript" src='<?php echo CDN_URL();?>themes/default/js/admin/admin_product.js?date=<?php echo CACHE_USETIME()?>'></script>
	
<form method="post">
	<table class="gksel_normal_tabpost">
		<tr>
			<td align="right"><?php echo lang('dz_loyalty_picture')?></td>
			<td>
				<div class="img_gksel_show" id="img1_gksel_show">
					<?php 
						$img1_gksel = '';
						if(file_exists($loyaltyinfo['loyalty_pic']) && $loyaltyinfo['loyalty_pic']!=""){
							$img1_gksel = $loyaltyinfo['loyalty_pic'];
							echo '<img style="float:left;max-width:400px;max-height:400px;" src="'.base_url().$loyaltyinfo['loyalty_pic'].'" />';
						}
					?>
				</div>
				<div class="img_gksel_choose" id="img1_gksel_choose">上传图片</div>
				<div style="float:left;"><input type="hidden" id="img1_gksel" name="img1_gksel" value="<?php echo $img1_gksel;?>"/></div>
				<div style="float:left;margin-left:5px;margin-top:5px;"><font class="fonterror" id="img1_gksel_error"><font style="color:gray;">仅支持 Jpg, Png, Gif 格式</font></div>
			</td>
		</tr>
		<tr>
			<td align="right" width="150"><?php echo lang('dz_product_name')?> (English)</td>
			<td align="left">
				<input type="text" name="loyalty_name_en" value="<?php echo $loyaltyinfo['loyalty_name_en']?>"/>
				<div class="tipsgroupbox"><div class="request">*</div></div>
			</td>
		</tr>
		<tr>
			<td align="right" width="150"><?php echo lang('dz_product_name')?> (中文)</td>
			<td align="left">
				<input type="text" name="loyalty_name_ch" value="<?php echo $loyaltyinfo['loyalty_name_ch']?>"/>
				<div class="tipsgroupbox"><div class="request">*</div></div>
			</td>
		</tr>
		<tr>
			<td align="right" width="150"><?php echo lang('dz_product_category')?></td>
			<td align="left">
				<?php 
					$sql = "SELECT * FROM ".DB_PRE()."loyalty_category WHERE loyalty_id = ".$loyaltyinfo['loyalty_id'];
					$checkres = $this->db->query($sql)->result_array();
					
					$con=array('parent'=>0, 'orderby'=>'a.sort', 'orderby_res'=>'ASC');
					$fenleilist = $this->ProductModel->getproductcategorylist($con);
					if(!empty($fenleilist)){
						for ($aaa = 0; $aaa < count($fenleilist); $aaa++) {
							echo '<div style="float:left;width:100%;margin-top:10px;font-weight:bold;">'.$fenleilist[$aaa]['category_name_en'].' '.$fenleilist[$aaa]['category_name_ch'].'</div>';
							echo '<div style="float:left;width:100%;margin-top:10px;">';
								$con=array('parent'=>$fenleilist[$aaa]['category_id'], 'orderby'=>'a.sort', 'orderby_res'=>'ASC');
								$articlecategorylist=$this->ProductModel->getproductcategorylist($con);
								if(!empty($articlecategorylist)){
									for ($i = 0; $i < count($articlecategorylist); $i++) {
										$ischecked = '';
										if(!empty($checkres)){
											for ($j = 0; $j < count($checkres); $j++) {
												if($checkres[$j]['category_id'] == $articlecategorylist[$i]['category_id']){
													$ischecked = 'checked';
												}
											}
										}
										echo '<div style="float:left;background:#EFEFEF;margin-right:10px;padding:5px 10px;">';
										echo '<input style="float:left;" id="category_id_'.$articlecategorylist[$i]['category_id'].'" name="category_id[]" type="checkbox" value="'.$articlecategorylist[$i]['category_id'].'" '.$ischecked.'/>';
										echo '<label style="float:left;" for="category_id_'.$articlecategorylist[$i]['category_id'].'">'.$articlecategorylist[$i]['category_name_en'].' '.$articlecategorylist[$i]['category_name_ch'].'</label>';
										echo '</div>';
									}
								}
							echo '</div>';
						}
					}
					
				?>
			</td>
		</tr>
		<tr>
			<td align="right" width="150"><?php echo lang('dz_product_tagline')?> (English)</td>
			<td align="left">
				<textarea name="loyalty_tagline_en"><?php echo $loyaltyinfo['loyalty_tagline_en']?></textarea>
			</td>
		</tr>
		<tr>
			<td align="right" width="150"><?php echo lang('dz_product_tagline')?> (中文)</td>
			<td align="left">
				<textarea name="loyalty_tagline_ch"><?php echo $loyaltyinfo['loyalty_tagline_ch']?></textarea>
			</td>
		</tr>
		<tr>
			<td align="right" width="150"><?php echo lang('dz_product_loyalty_points')?></td>
			<td align="left">
				<input type="text" name="loyalty_points" value="<?php echo $loyaltyinfo['loyalty_points']?>"/>
				<div class="tipsgroupbox"></div>
			</td>
		</tr>
		<tr>
			<td align="right" width="150"><?php echo lang('dz_product_description')?> (English)</td>
			<td align="left">
				<textarea name="loyalty_description_en"><?php echo $loyaltyinfo['loyalty_description_en']?></textarea>
				<div class="tipsgroupbox"><div class="request">*</div></div>
			</td>
		</tr>
		<tr>
			<td align="right" width="150"><?php echo lang('dz_product_description')?> (中文)</td>
			<td align="left">
				<textarea name="loyalty_description_ch"><?php echo $loyaltyinfo['loyalty_description_ch']?></textarea>
				<div class="tipsgroupbox"><div class="request">*</div></div>
			</td>
		</tr>
		<tr>
			<td>
				<input name="backurl" type="hidden" value="<?php echo $backurl;?>"/>
			</td>
			<td align="left">
				<div class="gksel_btn_action_on" onclick="tosave_loyaltyinfo(<?php echo $loyaltyinfo['loyalty_id']?>)"><?php echo lang('cy_save')?></div>
			</td>
		</tr>
	</table>
</form>
<script type="text/javascript">
	if(CKEDITOR.instances["loyalty_description_en"]){
		//判断是否绑定
		CKEDITOR.remove(CKEDITOR.instances["loyalty_description_en"]); //解除绑定
	}
	CKEDITOR.replace( 'loyalty_description_en',{
		toolbar :
        [
         [  'Bold',  'Italic', 'Underline',  '-',  'NumberedList',  'BulletedList',  '-','JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock','-','Font', 'FontSize', 'TextColor', 'BGColor','Image', 'Table', 'SpecialChar','-',  'Link',  'Unlink','link_rar','link_xls','link_doc','link_ppt','link_pdf','link_pic' ]]
    });


	if(CKEDITOR.instances["loyalty_description_ch"]){
		//判断是否绑定
		CKEDITOR.remove(CKEDITOR.instances["loyalty_description_ch"]); //解除绑定
	}
	CKEDITOR.replace( 'loyalty_description_ch',{
		toolbar :
        [
         [  'Bold',  'Italic', 'Underline',  '-',  'NumberedList',  'BulletedList',  '-','JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock','-','Font', 'FontSize', 'TextColor', 'BGColor','Image', 'Table', 'SpecialChar','-',  'Link',  'Unlink','link_rar','link_xls','link_doc','link_ppt','link_pdf','link_pic' ]]
    });
</script>
<script type="text/javascript">
$(document).ready(function(){
	var button_gksel1 = $('#img1_gksel_choose'), interval;
	if(button_gksel1.length>0){
		new AjaxUpload(button_gksel1,{
			action: baseurl+'index.php/welcome/uplogo/800/800', 
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