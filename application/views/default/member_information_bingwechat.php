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
<div class="scan_fail_otheruser" style="display:none;float: left;width:100%;">
	<div style="float: left;margin-left:85px;">
		<img src="<?php echo base_url().'themes/default/images/global_no.png'?>"/>
	</div>
	<div style="float: left;margin-left:5px;margin-top:1px;">
		您的微信账号已绑定其他用户
	</div>
</div>
<script type="text/javascript">
//scan_success
function togetwechatscanstatus(){
	$.post(baseurl+'index.php/member/ajax_getwechatbindscanstatus/<?php echo $loginwechat_info['loginwechat_id'];?>', function (data){
		var obj = eval( "(" + data + ")" );
		if(obj.status == 1){//绑定成功
			$('.scan_success').show();
			$('.scan_fail_otheruser').hide();
			setTimeout("ajax_wechatscanstatus_action()", 1000);
		}else if(obj.status == 2){//您的微信账号已经绑定其他用户
			$('.scan_success').hide();
			$('.scan_fail_otheruser').show();
		}else{
			setTimeout("togetwechatscanstatus()", 2000);
		}
	})
}
togetwechatscanstatus();

function ajax_wechatscanstatus_action(){
	location.href = baseurl+'index.php/member/bindaccount/<?php echo $loginwechat_info['loginwechat_id'];?>';
}
</script>
