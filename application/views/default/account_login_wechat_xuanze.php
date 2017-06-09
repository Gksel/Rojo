<?php $this->load->view('default/header');?>
		<div style="width:100%;max-width:1200px;margin:0 auto;">
			<div style="float:left;width:100%;">
				<div class="gksel_registerhome_area">
					<div class="content">
						<div class="subcontent">
							<div style="float:left;width:50%;margin-top:30px;text-align:center;">
								<span onclick="javascript:location.href='<?php echo base_url().'index.php/account/toregister'?>';" style="cursor:pointer;padding:10px 50px;background:#f26225;color:white;border-radius:10px;">注册新账号</span>
							</div>
							<div style="float:left;width:50%;margin-top:30px;text-align:center;">
								<span onclick="javascript:location.href='<?php echo base_url().'index.php/account/tologin'?>';" style="cursor:pointer;padding:10px 50px;background:#f26225;color:white;border-radius:10px;">绑定已有账号</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			
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

	$('.gksel_frameloadingcontent').show();
}

$(window).resize(function() {
	autotestwidth();
})
autotestwidth();
autotestwidth();
</script>
<?php $this->load->view('default/footer');?>
