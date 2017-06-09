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
							<div style="float: left;width:100%;background:white;border-radius:20px;">
								<table class="gksel_normal_tabpost">
									<tr>
										<td align="left"><span class="title">微信登录</span></td>
									</tr>
									<tr>
										<td align="left">
											<div style="float: left;width:100%;">
												<img style="float: left;width:100%;" src="<?php echo $loginwechat_info['scene_path']?>"/>
											</div>
											<div class="scan_success" style="display:none;float: left;width:100%;">
												<div style="float: left;margin-left:95px;">
													<img src="<?php echo base_url().'themes/default/images/global_ok.png'?>"/>
												</div>
												<div style="float: left;margin-left:5px;margin-top:1px;">
													扫描成功
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td align="left">
											<a class="login_linkfp" href="<?php echo base_url().'index.php/account/tologin'?>">账号登录</a>
										</td>
									</tr>
									<tr>
										<td align="left">
											<div class="loginpagefootersection">
												<div class="hasno">
													<a href="<?php echo base_url().'index.php/account/toregister'?>">Register Now</a>
													&nbsp;&nbsp;
												</div>
												<div class="signupbtn">
													<a href="<?php echo base_url().'index.php/account/toregister'?>"><img src="<?php echo base_url().'themes/default/images/jt.png'?>"/></a>
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
//scan_success
function togetwechatscanstatus(){
	$.post(baseurl+'index.php/account/ajax_getwechatscanstatus/<?php echo $loginwechat_info['loginwechat_id'];?>', function (data){
		if(data != ''){
			$('.scan_success').show();
			setTimeout("ajax_wechatscanstatus_action()", 1000);
		}else{
			setTimeout("togetwechatscanstatus()", 2000);
		}
	})
}
togetwechatscanstatus();

function ajax_wechatscanstatus_action(){
	location.href = baseurl+'index.php/account/ajax_wechatscanstatus_action/<?php echo $loginwechat_info['loginwechat_id'];?>';
}

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

	$('.gksel_frameloadingcontent').show();
}

$(window).resize(function() {
	autotestwidth();
})
autotestwidth();
autotestwidth();
</script>
<?php $this->load->view('default/footer');?>