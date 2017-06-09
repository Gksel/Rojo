<?php $this->load->view('admin/header')?>
<script type='text/javascript' src='<?php echo base_url()?>themes/default/js/fileuploader.js'></script>
<script type="text/javascript" src='<?php echo CDN_URL();?>themes/default/js/admin/admin_user.js?date=<?php echo CACHE_USETIME()?>'></script>
	
<form method="post">
	<table class="gksel_normal_tabpost">
		<?php if($userinfo['user_type'] == 1){//客户?>
			<tr class="thead">
				<td align="right" width="150"><?php echo lang('dz_user_information')?></td>
				<td align="left">
				</td>
			</tr>
			<tr><td colspan="2"></td></tr>
			<tr style="display: none;">
				<td align="right" width="150"><?php echo lang('dz_user_nickname')?></td>
				<td align="left">
					<input type="text" name="user_nickname" value="<?php echo $userinfo['user_nickname']?>"/>
				</td>
			</tr>
			<tr>
				<td align="right" width="150">Customer Number</td>
				<td align="left">
					<input type="text" name="user_number" value="<?php echo $userinfo['user_number']?>"/>
				</td>
			</tr>
			<tr>
				<td align="right" width="150"><?php echo lang('dz_user_realname')?></td>
				<td align="left">
					<input type="text" name="user_realname" value="<?php echo $userinfo['user_realname']?>"/>
					<div class="tipsgroupbox"><div class="request">*</div></div>
				</td>
			</tr>
			<tr>
				<td align="right" width="150"><?php echo lang('dz_user_sex')?></td>
				<td align="left">
					<select name="user_sex" class="select_usersex">
						<option value="0"><?php echo lang('dz_user_sex_unknown')?></option>
						<option value="1" <?php if($userinfo['user_sex'] != '' && $userinfo['user_sex'] == 1){echo 'selected';}?>>男</option>
						<option value="2" <?php if($userinfo['user_sex'] != '' && $userinfo['user_sex'] == 2){echo 'selected';}?>>女</option>
					</select>
				</td>
			</tr>
			<tr>
				<td align="right" width="150"><?php echo lang('dz_user_phone')?></td>
				<td align="left">
					<input type="text" name="user_phone" disabled="disabled" value="<?php echo $userinfo['user_phone']?>"/>
					<div class="tipsgroupbox"><div class="request">*</div></div>
				</td>
			</tr>
			<tr>
				<td align="right"><?php echo lang('dz_user_password')?></td>
				<td align="left">
					<input type="text" onfocus="this.type='password'" name="password" value=""/>
				</td>
			</tr>
			<tr>
				<td align="right" width="150"><?php echo lang('dz_user_email')?></td>
				<td align="left">
					<input type="text" name="user_email" value="<?php echo $userinfo['user_email']?>"/>
					<div class="tipsgroupbox"><div class="request">*</div></div>
				</td>
			</tr>
			
			<tr>
				<td align="right" width="150"><?php echo lang('dz_user_profile')?></td>
				<td align="left">
					<textarea name="user_profile"><?php echo $userinfo['user_profile']?></textarea>
				</td>
			</tr>
			<tr><td colspan="2"></td></tr>
			<tr class="thead" style="display: none;">
				<td align="right" width="150"><?php echo lang('dz_company_information')?></td>
				<td align="left">
				</td>
			</tr>
			<tr style="display: none;"><td colspan="2"></td></tr>
			<tr style="display: none;">
				<td align="right" width="150"><?php echo lang('dz_company_name')?></td>
				<td align="left">
					<input type="text" name="company_name" value="<?php echo $userinfo['company_name']?>"/>
					<div class="tipsgroupbox"></div>
				</td>
			</tr>
			<tr style="display: none;">
				<td align="right" width="150"><?php echo lang('dz_company_title')?></td>
				<td align="left">
					<input type="text" name="company_title" value="<?php echo $userinfo['company_title']?>"/>
					<div class="tipsgroupbox"></div>
				</td>
			</tr>
			<tr style="display: none;">
				<td align="right" width="150"><?php echo lang('dz_company_email')?></td>
				<td align="left">
					<input type="text" name="company_email" value="<?php echo $userinfo['company_email']?>"/>
					<div class="tipsgroupbox"></div>
				</td>
			</tr>
			<tr style="display: none;">
				<td align="right" width="150"><?php echo lang('dz_company_address')?></td>
				<td align="left">
					<input type="text" name="company_address" value="<?php echo $userinfo['company_address']?>"/>
					<div class="tipsgroupbox"></div>
				</td>
			</tr>
			<tr style="display: none;">
				<td align="right" width="150"><?php echo lang('dz_company_tel')?></td>
				<td align="left">
					<input type="text" name="company_phone" value="<?php echo $userinfo['company_phone']?>"/>
					<div class="tipsgroupbox"></div>
				</td>
			</tr>
			<tr>
				<td align="right"><?php echo lang('dz_company_businesslicense')?></td>
				<td>
					<div class="img_gksel_show" id="img1_gksel_show">
						<?php 
							$img1_gksel = '';
							if(file_exists($userinfo['company_businesslicense']) && $userinfo['company_businesslicense']!=""){
								$img1_gksel = $userinfo['company_businesslicense'];
								echo '<a target="_blank" href="'.base_url().$userinfo['company_businesslicense'].'">Download</a>';
							}
						?>
					</div>
					<div class="img_gksel_choose" id="img1_gksel_choose">Upload FDF</div>
					<div style="float:left;"><input type="hidden" id="img1_gksel" name="img1_gksel" value="<?php echo $img1_gksel;?>"/></div>
					<div style="float:left;margin-left:5px;margin-top:5px;"><font class="fonterror" id="img1_gksel_error"><font style="color:gray;">仅支持 Jpg, Png, Gif 格式</font></div>
				</td>
			</tr>
		<?php }else if($userinfo['user_type'] == 2){?>
			
			<tr class="thead">
				<td align="right" width="150"><?php echo lang('dz_company_information')?></td>
				<td align="left">
				</td>
			</tr>
			<tr>
				<td align="right" width="150"><?php echo lang('dz_company_name')?></td>
				<td align="left">
					<input type="text" name="company_name" value="<?php echo $userinfo['company_name']?>"/>
					<div class="tipsgroupbox"><div class="request">*</div></div>
				</td>
			</tr>
			<tr>
				<td align="right" width="150"><?php echo lang('dz_company_title')?></td>
				<td align="left">
					<input type="text" name="company_title" value="<?php echo $userinfo['company_title']?>"/>
					<div class="tipsgroupbox"><div class="request">*</div></div>
				</td>
			</tr>
			<tr>
				<td align="right" width="150"><?php echo lang('dz_company_email')?></td>
				<td align="left">
					<input type="text" name="company_email" value="<?php echo $userinfo['company_email']?>"/>
					<div class="tipsgroupbox"><div class="request">*</div></div>
				</td>
			</tr>
			<tr>
				<td align="right" width="150"><?php echo lang('dz_company_address')?></td>
				<td align="left">
					<input type="text" name="company_address" value="<?php echo $userinfo['company_address']?>"/>
					<div class="tipsgroupbox"><div class="request">*</div></div>
				</td>
			</tr>
			<tr>
				<td align="right" width="150"><?php echo lang('dz_company_tel')?></td>
				<td align="left">
					<input type="text" name="company_phone" value="<?php echo $userinfo['company_phone']?>"/>
					<div class="tipsgroupbox"><div class="request">*</div></div>
				</td>
			</tr>
			<tr><td colspan="2"></td></tr>
			<tr class="thead">
				<td align="right" width="150"><?php echo lang('dz_user_information')?></td>
				<td align="left">
				</td>
			</tr>
			<tr><td colspan="2"></td></tr>
			<tr>
				<td align="right" width="150"><?php echo lang('dz_user_nickname')?></td>
				<td align="left">
					<input type="text" name="user_nickname" value="<?php echo $userinfo['user_nickname']?>"/>
				</td>
			</tr>
			<tr>
				<td align="right" width="150"><?php echo lang('dz_user_realname')?></td>
				<td align="left">
					<input type="text" name="user_realname" value="<?php echo $userinfo['user_realname']?>"/>
					<div class="tipsgroupbox"><div class="request">*</div></div>
				</td>
			</tr>
			<tr>
				<td align="right" width="150"><?php echo lang('dz_user_phone')?></td>
				<td align="left">
					<input type="text" name="user_phone" disabled="disabled" value="<?php echo $userinfo['user_phone']?>"/>
				</td>
			</tr>
			<tr>
				<td align="right" width="150"><?php echo lang('dz_user_email')?></td>
				<td align="left">
					<input type="text" name="user_email" value="<?php echo $userinfo['user_email']?>"/>
					<div class="tipsgroupbox"><div class="request">*</div></div>
				</td>
			</tr>
			<tr>
				<td align="right"><?php echo lang('dz_user_password')?></td>
				<td align="left">
					<input type="text" onfocus="this.type='password'" name="password" value=""/>
				</td>
			</tr>
			<tr><td colspan="2"></td></tr>
		
		<?php }else if($userinfo['user_type'] == 3){?>
			<tr>
				<td align="right" width="150"><?php echo lang('dz_user_nickname')?></td>
				<td align="left">
					<input type="text" name="user_nickname" value="<?php echo $userinfo['user_nickname']?>"/>
				</td>
			</tr>
			<tr>
				<td align="right" width="150"><?php echo lang('dz_user_realname')?></td>
				<td align="left">
					<input type="text" name="user_realname" value="<?php echo $userinfo['user_realname']?>"/>
					<div class="tipsgroupbox"><div class="request">*</div></div>
				</td>
			</tr>
			<tr>
				<td align="right" width="150"><?php echo lang('dz_user_phone')?></td>
				<td align="left">
					<input type="text" name="user_phone" disabled="disabled" value="<?php echo $userinfo['user_phone']?>"/>
				</td>
			</tr>
			<tr>
				<td align="right" width="150"><?php echo lang('dz_user_email')?></td>
				<td align="left">
					<input type="text" name="user_email" value="<?php echo $userinfo['user_email']?>"/>
					<div class="tipsgroupbox"><div class="request">*</div></div>
				</td>
			</tr>
			<tr>
				<td align="right"><?php echo lang('dz_user_password')?></td>
				<td align="left">
					<input type="text" onfocus="this.type='password'" name="password" value=""/>
				</td>
			</tr>
			<tr><td colspan="2"></td></tr>
		
		<?php }?>
		<tr>
			<td>
				<input name="backurl" type="hidden" value="<?php echo $backurl;?>"/>
			</td>
			<td align="left">
				<div class="gksel_btn_action_on" onclick="tosave_userinfo(<?php echo $userinfo['uid']?>, <?php echo $userinfo['user_type']?>)"><?php echo lang('cy_save')?></div>
			</td>
		</tr>
	</table>
</form>
<script type="text/javascript">
$(document).ready(function(){
	var button_gksel1 = $('#img1_gksel_choose'), interval;
	if(button_gksel1.length>0){
		new AjaxUpload(button_gksel1,{
			action: baseurl+'index.php/welcome/upfile', 
			name: 'logo',onSubmit : function(file, ext){
				if (ext && /^(pdf)$/.test(ext)){
					button_gksel1.text('Uploading');
					this.disable();
					interval = window.setInterval(function(){
						var text = button_gksel1.text();
						if (text.length < 13){
							button_gksel1.text(text + '.');					
						} else {
							button_gksel1.text('Uploading');				
						}
					}, 200);
				} else {
					$('#img1_gksel_error').html('Upload Fail');
					return false;
				}
			},
			onComplete: function(file, response){
				button_gksel1.text('Upload FDF');						
				window.clearInterval(interval);
				this.enable();
				if(response=='false'){
					$('#img1_gksel_error').html('Upload Fail');
				}else{
					var pic = eval("("+response+")");
					$('#img1_gksel_show').html('<a target="_blank" href="'+baseurl+pic.logo+'">Download</a>');
					$('#img1_gksel').attr('value',pic.logo);
					$('#img1_gksel_error').html('');
				}	
			}
		});
	}
})
</script>
<?php $this->load->view('admin/footer')?>