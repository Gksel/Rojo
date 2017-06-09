<?php $this->load->view('default/header');?>
		<script src="<?php echo base_url()?>js/register/veirfy.js?date=<?php echo CACHE_USETIME()?>"></script>
		<div class="gksel_normalactionpic">
			
		</div>
		<div class="gksel_normalactionbg">
			
		</div>
		<div class="gksel_normalactionbgcontent">
			<table cellspacing="0" cellpadding="0" style="float:left;width:100%;height:100%;">
				<tr>
					<td>
						<div style="width:100%;max-width:350px;margin:0 auto;">
							<img style="float:left;width:76%;margin-left:12%;margin-bottom:20px;" src="<?php echo base_url().'themes/default/images/bz1.png'?>"/>
							<div style="float: left;width:100%;background:white;border-radius:20px;">
								<table class="gksel_normal_tabpost">
									<tr>
										<td align="left"><span class="title"><?php echo lang('cy_forgetpassword')?></span></td>
									</tr>
									<tr>
										<td align="left">
											<input type="number" name="forgetpassword_phone" placeholder="请输入注册时使用的手机号码" />
											<div class="tipsgroupbox"></div>
										</td>
									</tr>
									<tr>
										<td align="left">
											<input class="vernote" type="text" name="forgetpassword_code" placeholder="<?php echo lang('cy_enter_smscode')?>" />
											<button class="btnCode btnCode_forgetpassword">获取验证码</button>
											<div class="tipsgroupbox"></div>
										</td>
									</tr>
									<tr>
										<td align="left">
											<div class="gksel_btn_action_on" onclick="tocheckForgetpost()"><?php echo lang('cy_forgetpassword')?></div>
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
