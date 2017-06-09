<?php $this->load->view('default/member_header')?>
<div class="gksel_unbindaccount_box_bg"></div>
<div class="gksel_unbindaccount_box">
	<table>
		<tr>
			<td>
				<div class="gksel_unbindaccount_content">
					<div class="close"><img onclick="unbindaccount_close()" src="<?php echo base_url().'themes/default/images/close.png'?>"></div>
					<div class="title">您确定要取消绑定微信账号吗？</div>
					<div class="subtitle">取消绑定微信账号将不再接受到该账号的相关通知信息</div>
					<div class="control">
						<div class="yes" onclick="unbindaccount()">确定</div>
						<div class="no" onclick="unbindaccount_close()">关闭</div>
					</div>
				</div>
			</td>
		</tr>
	</table>
</div>
<div class="gksel_bindaccount_box_bg"></div>
<div class="gksel_bindaccount_box">
	<table>
		<tr>
			<td>
				<div class="gksel_bindaccount_content">
					<div class="close"><img onclick="bindaccount_close()" src="<?php echo base_url().'themes/default/images/close.png'?>"></div>
					<div class="title">您确定要取消绑定微信账号吗？</div>
					<div class="subtitle">取消绑定微信账号将不再接受到该账号的相关通知信息</div>
					<div class="qrcodearea" style="float:left;width:80%;margin:20px 10% 30px 10%;">
					
					</div>
				</div>
			</td>
		</tr>
	</table>
</div>
<table class="gksel_normal_tabaction">
	<tr>
		<td>
			<div class="ma_actions">
				<ul>
					<li>
						<a href="<?php echo base_url().'index.php/member/toview_information'?>">
							<font class="nav_on">
								查看信息
							</font>
						</a>
					</li>
					<li>
						<a href="<?php echo base_url().'index.php/member/toedit_information'?>">
							<font class="nav_off">
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
					<?php echo $userinfo['user_nickname']?>
				</td>
			</tr>
			<tr>
				<td align="right" width="150">姓名</td>
				<td align="left">
					<?php echo $userinfo['user_realname']?>
				</td>
			</tr>
			<tr>
				<td align="right" width="150">性别</td>
				<td align="left">
					<?php 
						if($userinfo['user_sex'] != '' && $userinfo['user_sex'] == 1){echo '男';}
						if($userinfo['user_sex'] != '' && $userinfo['user_sex'] == 2){echo '女';}
					?>
				</td>
			</tr>
			<tr>
				<td align="right" width="150">手机号码</td>
				<td align="left">
					<?php echo $userinfo['user_phone']?>
				</td>
			</tr>
			<tr>
				<td align="right" width="150">邮箱</td>
				<td align="left">
					<?php echo $userinfo['user_email']?>
				</td>
			</tr>
			<tr><td colspan="2"></td></tr>
			<tr class="thead">
				<td align="right" width="150">微信信息</td>
				<td align="left">
				</td>
			</tr>
			<tr><td colspan="2"></td></tr>
			<tr>
				<td align="right" width="150">是否绑定账号</td>
				<td align="left">
					<div style="float:left;margin-top:5px;">
						<?php 
							if($userinfo['wechat_id'] != ''){
								echo '<font class="fontgreen">已绑定</font>';
							}else {
								echo '<font class="fonterror">未绑定</font>';
							}
						?>
					</div>
					<?php if($userinfo['wechat_id'] != ''){?>
						<div onclick="tounbindaccount()" style="cursor:pointer;float:left;margin-left:10px;color: #fff;background: #FF5900;padding: 8px 16px;font-size: 14px;line-height: 14px;font-weight: bold;border-radius: 4px;">
							取消绑定
						</div>
					<?php }else{?>
						<div onclick="tobindaccount()" style="cursor:pointer;float:left;margin-left:10px;color: #fff;background: #FF5900;padding: 8px 16px;font-size: 14px;line-height: 14px;font-weight: bold;border-radius: 4px;">
							绑定微信
						</div>
					<?php }?>
				</td>
			</tr>
			<?php if($userinfo['wechat_id'] != ''){?>
				<tr>
					<td align="right" width="150">是否关注</td>
					<td align="left">
						<?php 
							if($userinfo['wechat_subscribe'] == 1){
								echo '<font class="fontgreen">已关注</font>';
							}else {
								echo '<font class="fonterror">已取消关注</font>';
							}
						?>
					</td>
				</tr>
				<tr>
					<td align="right" width="150">昵称</td>
					<td align="left">
						<?php echo userTextDecode($userinfo['wechat_nickname'])?>
					</td>
				</tr>
				<tr>
					<td align="right" width="150">头像</td>
					<td align="left">
						<img style="float: left;width:80px;height:80px;border-radius: 100%;" src="<?php echo $userinfo['wechat_avatar']?>"/>
					</td>
				</tr>
				<tr>
					<td align="right" width="150">性别</td>
					<td align="left">
						<?php 
							if($userinfo['wechat_sex'] == 1){
								echo '男';
							}else if($userinfo['wechat_sex'] == 2){
								echo '女';
							}else if($userinfo['wechat_sex'] == 3){
								echo '未知';
							}
						?>
					</td>
				</tr>
				<tr>
					<td align="right" width="150">地址</td>
					<td align="left">
						<?php 
							echo $userinfo['wechat_country'].' '.$userinfo['wechat_province'].' '.$userinfo['wechat_city'];
						?>
					</td>
				</tr>
				<tr>
					<td align="right" width="150">语言</td>
					<td align="left">
						<?php 
							echo $userinfo['wechat_language'];
						?>
					</td>
				</tr>
			<?php }?>
			<tr><td colspan="2"></td></tr>
			<tr class="thead">
				<td align="right" width="150"></td>
				<td align="left">
					<div onclick="javascript:location.href='<?php echo base_url().'index.php/account/tologout'?>';" style="cursor:pointer;float:left;margin-left:10px;color: #fff;background: #FF5900;padding: 8px 16px;font-size: 14px;line-height: 14px;font-weight: bold;border-radius: 4px;">
						退出登录
					</div>
				</td>
			</tr>
	</table>
<?php $this->load->view('default/member_footer')?>