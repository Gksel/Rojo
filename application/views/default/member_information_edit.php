<?php $this->load->view('default/member_header')?>
<script type='text/javascript' src='<?php echo base_url()?>js/fileuploader.js'></script>
<table class="gksel_normal_tabaction">
	<tr>
		<td>
			<div class="ma_actions">
				<ul>
					<li>
						<a href="<?php echo base_url().'index.php/member/toview_information'?>">
							<font class="nav_off">
								查看信息
							</font>
						</a>
					</li>
					<li>
						<a href="<?php echo base_url().'index.php/member/toedit_information'?>">
							<font class="nav_on">
								修改信息
							</font>
						</a>
					</li>
				</ul>
			</div>
		</td>
		<td>
			
		</td>
	</tr>
</table>
<form method="post">
	<table class="gksel_normal_tabpost">
			<tr><td colspan="2"></td></tr>
			<tr class="thead">
				<td align="right" width="150">个人信息</td>
				<td align="left">
				</td>
			</tr>
			<tr><td colspan="2"></td></tr>
			<tr>
				<td align="right" width="150">昵称</td>
				<td align="left">
					<input type="text" name="user_nickname" value="<?php echo $userinfo['user_nickname']?>"/>
				</td>
			</tr>
			<tr>
				<td align="right" width="150">姓名</td>
				<td align="left">
					<input type="text" name="user_realname" value="<?php echo $userinfo['user_realname']?>"/>
					<div class="tipsgroupbox"><div class="request">*</div></div>
				</td>
			</tr>
			<tr>
				<td align="right" width="150">性别</td>
				<td align="left">
					<select name="user_sex" class="select_usersex">
						<option value="1" <?php if($userinfo['user_sex'] != '' && $userinfo['user_sex'] == 1){echo 'selected';}?>>男</option>
						<option value="2" <?php if($userinfo['user_sex'] != '' && $userinfo['user_sex'] == 2){echo 'selected';}?>>女</option>
					</select>
				</td>
			</tr>
			<tr>
				<td align="right" width="150">手机号码</td>
				<td align="left">
					<input type="text" name="user_phone" disabled="disabled" value="<?php echo $userinfo['user_phone']?>"/>
					<div class="tipsgroupbox"><div class="request">*</div></div>
				</td>
			</tr>
			<tr>
				<td align="right" width="150">邮箱</td>
				<td align="left">
					<input type="text" name="user_email" value="<?php echo $userinfo['user_email']?>"/>
				</td>
			</tr>
			<tr><td colspan="2"></td></tr>
		
		
		<tr>
			<td>
				<input name="backurl" type="hidden" value="<?php echo $backurl;?>"/>
			</td>
			<td align="left">
				<div class="gksel_btn_action_on" onclick="tosave_userinfo(<?php echo $userinfo['uid']?>, <?php echo $userinfo['user_type']?>)">
					保存
				</div>
			</td>
		</tr>
	</table>
</form>
<script type="text/javascript">
$(document).ready(function(){
	var button_gksel2 = $('#img2_gksel_choose'), interval;
	if(button_gksel2.length>0){
		new AjaxUpload(button_gksel2,{
			action: baseurl+'index.php/welcome/uplogo_deng/1000/1000', 
			name: 'logo',onSubmit : function(file, ext){
				if (ext && /^(jpg|png|gif|txt|zip|rar|doc|docx|xls|xlsx|ppt|pptx|pdf)$/.test(ext)){
					button_gksel2.text('上传中');
					this.disable();
					interval = window.setInterval(function(){
						var text = button_gksel2.text();
						if (text.length < 13){
							button_gksel2.text(text + '.');
						} else {
							button_gksel2.text('上传中');	
						}
					}, 200);
				} else {
					$('#img2_gksel_error').html('上传失败');
					return false;
				}
			},
			onComplete: function(file, response){
				button_gksel2.text('上传附件');						
				window.clearInterval(interval);
				this.enable();
				if(response=='false'){
					$('#img2_gksel_error').html('上传失败');
				}else{
					var pic = eval("("+response+")");
					$('#img2_gksel_show').html('<img style="float:left;max-width:400px;max-width:400px;" src="'+baseurl+pic.logo+'" />');
					$('#img2_gksel').attr('value',pic.logo);
					$('#img2_gksel_error').html('');
				}	
			}
		});
	}
})
</script>
<?php $this->load->view('default/member_footer')?>