<?php $this->load->view('default/header');?>
		<div class="gksel_normalactionpic">
			
		</div>
		<div class="gksel_normalactionbg">
			
		</div>
		<div class="gksel_normalactionbgcontent">
			<table cellspacing="0" cellpadding="0" style="float:left;width:100%;height:100%;">
				<tr>
					<td>
						<div style="width:100%;max-width:350px;margin:0 auto;">
							<img style="float:left;width:76%;margin-left:12%;margin-bottom:20px;" src="<?php echo base_url().'themes/default/images/bz2.png'?>"/>
							<div style="float: left;width:100%;background:white;border-radius:20px;">
								<table class="gksel_normal_tabpost">
									<tr>
										<td align="left"><span class="title">重置密码</span></td>
									</tr>
									<tr>
										<td align="left">
											<input type="password" name="reset_password" placeholder="请输入新密码" />
											<div class="tipsgroupbox"></div>
										</td>
									</tr>
									<tr>
										<td align="left">
											<input type="password" name="reset_cpassword" placeholder="再次输入新密码" />
											<div class="tipsgroupbox"></div>
										</td>
									</tr>
									<tr>
										<td align="left">
											<div class="gksel_btn_action_on" onclick="tocheckResetpost()">
												重置密码
											</div>
										</td>
									</tr>
								</table>
							</div>
						</div>
					</td>
				</tr>
			</table>
		</div>
<?php $this->load->view('default/footer');?>
