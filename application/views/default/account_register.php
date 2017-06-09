<?php $this->load->view('default/header');?>
		
		<script src="<?php echo base_url()?>js/register/veirfy.js?date=<?php echo CACHE_USETIME()?>"></script>
		<div class="gksel_registeractionpic">
			
		</div>
		<div class="gksel_registeractionbg">
			
		</div>
		<div class="gksel_registeractionbgcontent">
			<table cellspacing="0" cellpadding="0" style="float:left;width:100%;height:100%;">
				<tr>
					<td>
						<div style="width:100%;max-width:350px;margin:0 auto;">
							<div style="float: left;width:100%;background:rgba(0,0,0,.4);border-radius:20px;">
								<table class="gksel_normal_tabpost">
									<tr>
										<td align="left">
											<input type="text" name="register_nickname" placeholder="please enter your nickname" />
											<div class="tipsgroupbox"></div>
										</td>
									</tr>
									<tr>
										<td align="left">
											<input type="text" name="register_email" placeholder="please enter your email" />
											<div class="tipsgroupbox"></div>
										</td>
									</tr>
									<tr>
										<td align="left">
											<input type="text" name="register_phone" placeholder="please enter your phone" />
											<div class="tipsgroupbox"></div>
										</td>
									</tr>
									<tr>
										<td align="left">
											<input type="text" onfocus="this.type='password'" name="register_password" placeholder="<?php echo lang('cy_enter_password')?>" />
											<div class="tipsgroupbox"></div>
										</td>
									</tr>
									<tr>
										<td align="left">
											<input type="text" onfocus="this.type='password'" name="register_cpassword" placeholder="Please enter your password again" />
											<div class="tipsgroupbox"></div>
										</td>
									</tr>
									<tr>
										<td align="left">
											<input class="consent" type="checkbox" name="consent" checked/>
											<span style="color:white">I have read and agree to the</span>
											<a href="javascript:;" style="color:white">《User Agreement》</a>
										</td>
									</tr>
									
									<tr>
										<td align="left">
											<div class="gksel_btn_action_on" onclick="tocheckRegisterpost()"><?php echo lang('cy_register')?></div>
										</td>
									</tr>
									<tr>
										<td align="left">
											&nbsp;
										</td>
									</tr>
									<tr>
										<td align="left">
											<div class="registerpagefooter_left">
												<a style="color:gray;" href="<?php echo base_url().'index.php/account/tologin_wechat'?>">
													Wechat Login
												</a>
											</div>
											<div class="registerpagefooter_right">
												<div class="hasaccount">
													
												</div>
												<div class="lijielogin">
													<a href="<?php echo base_url().'index.php/account/tologin'?>"><?php echo lang('cy_login_now')?></a>
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
<script type="text/javascript">
var allbody_width=0;
var allbody_height=0;
var allbody_visiblewidth=0;

function autotestwidth(){
	allbody_width=document.body.clientWidth;
	allbody_height=document.body.clientHeight;
	if(allbody_width>1200){
		allbody_visiblewidth=1200;
	}else{
		allbody_visiblewidth=allbody_width;
	}

	autowidth_header(allbody_width, allbody_height);

	autowidth_commonfooter(allbody_width, allbody_height);

}

$(window).resize(function() {
	autotestwidth();
})
autotestwidth();
autotestwidth();
</script>
<?php $this->load->view('default/footer');?>
