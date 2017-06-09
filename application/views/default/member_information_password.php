<?php $this->load->view('default/member_header')?>
<form method="post">
	<table class="gksel_normal_tabpost">
		<tr>
			<td align="right" width="150">原始密码</td>
			<td align="left">
				<input type="text" onfocus="this.type='password'"  name="user_oldpassword" value=""/>
				<div class="tipsgroupbox"><div class="request">*</div></div>
			</td>
		</tr>
		<tr>
			<td align="right" width="150">新密码</td>
			<td align="left">
				<input type="text" onfocus="this.type='password'"  name="user_newpassword" value=""/>
				<div class="tipsgroupbox"><div class="request">*</div></div>
			</td>
		</tr>
		<tr>
			<td align="right" width="150">确认密码</td>
			<td align="left">
				<input type="text" onfocus="this.type='password'"  name="user_cpassword" value=""/>
				<div class="tipsgroupbox"><div class="request">*</div></div>
			</td>
		</tr>
		<tr>
			<td>
				<input name="backurl" type="hidden" value="<?php echo $backurl;?>"/>
			</td>
			<td align="left">
				<div class="gksel_btn_action_on" onclick="tochange_password(<?php echo $userinfo['uid']?>)">
					保存
				</div>
			</td>
		</tr>
	</table>
</form>


<?php $this->load->view('default/member_footer')?>