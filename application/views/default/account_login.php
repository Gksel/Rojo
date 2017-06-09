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
							<div style="float: left;width:100%;background:rgba(0,0,0,.4);border-radius:20px;">
								<table class="gksel_normal_tabpost">
									<tr>
										<td align="left"><span class="title" style="color:white"><?php echo lang('cy_login')?></span></td>
									</tr>
									<tr>
										<td align="left">
											<input type="text" name="login_phone" placeholder="<?php echo lang('cy_enter_phone_verified')?>" />
											<div class="tipsgroupbox"></div>
										</td>
									</tr>
									<tr>
										<td align="left">
											<input type="text" onfocus="this.type='password'" name="login_password" placeholder="<?php echo lang('cy_enter_password')?>" />
											<div class="tipsgroupbox"></div>
										</td>
									</tr>
									<tr>
										<td align="left">
											<a class="login_linkfp" href="<?php echo base_url().'index.php/account/toforgetpassword'?>"><?php echo lang('cy_forgetpassword')?>?</a>
										</td>
									</tr>
									<tr>
										<td align="left">
											<div class="gksel_btn_action_on" onclick="tocheckLoginpost()"><?php echo lang('cy_login')?></div>
										</td>
									</tr>
									<tr>
										<td align="left">
											&nbsp;
										</td>
									</tr>
									<tr>
										<td align="left">
											<div style="float:left;margin-left:5px;">
												<a style="color:gray;font-size:12px;" href="<?php echo base_url().'index.php/account/tologin_wechat'?>">
													Wechat Login
												</a>
											</div>
											<div style="float:right;">
												<div class="loginpagefootersection">
													<div class="hasno">
														<?php echo lang('cy_hasnoaccount')?>?
													</div>
													<div class="signup">
														<a href="<?php echo base_url().'index.php/account/toregister'?>"><?php echo lang('cy_register_now')?></a>
													</div>
												</div>
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