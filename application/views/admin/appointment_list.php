<?php $this->load->view('admin/header')?>
<script type="text/javascript" src='<?php echo CDN_URL();?>themes/default/js/admin/admin_appointment.js?date=<?php echo CACHE_USETIME()?>'></script>
<?php 
$get_str='';
if($_GET){
	$arr = geturlparmersGETS();
	for($i=0;$i<count($arr);$i++){
		if(isset($_GET[$arr[$i]])){
			if($get_str!=""){$get_str .='&';}else{$get_str .='?';}
			$get_str .=$arr[$i].'='.$_GET[$arr[$i]];
		}
	}
}
$current_url = current_url();
$current_url_encode=str_replace('/','slash_tag',base64_encode($current_url.$get_str));

$category_id = $this->input->get('category_id');
$brand_id = $this->input->get('brand_id');
$keyword = $this->input->get('keyword');
?>
<table class="gksel_normal_tabaction">
	<tr>
		<td>
			<div class="searcharea">
				<a href="<?php echo base_url().'index.php/admins/appointment/toadd_appointment'?>"><font class="nav_on"><img class="plus" src="<?php echo base_url().'themes/default/images/plus.png'?>"/> <?php echo lang('dz_appointment_add')?></font></a>
			</div>
		</td>
	</tr>
</table>
<table class="gksel_normal_tablist">
	<thead>
		<tr>
			<td width="50" align="center"><?php echo lang('cy_sn')?></td>
			<td><p>&nbsp;&nbsp;&nbsp;Username</p></td>
			<td width="100" align="center"><p>Phone</p></td>
			<td width="130" align="center"><p>Email</p></td>
			<td width="150" align="center"><p>Appointment Date</p></td>
			<td width="150" align="center"><p>Time</p></td>
			<td width="100" align="center"><p>Created</p></td>
		</tr>
	</thead>
	<tbody>
		<?php if(isset($appointmentlist)){for ($i = 0; $i < count($appointmentlist); $i++) {?>
			<tr>
				<td align="center"><?php echo ($i+1)?></td>
				<td>
					<div style="float:left;width: 100%;">
						<?php echo actionsearchdaxiaoxiezimu($keyword, strip_tags($appointmentlist[$i]['user_nickname']));?>
					</div>
				</td>
				<td align="center"><?php echo $appointmentlist[$i]['user_phone']?></td>
				<td align="center"><?php echo $appointmentlist[$i]['user_email']?></td>
				<td align="center"><?php echo $appointmentlist[$i]['shijian_date']?></td>
				<td align="center"><?php 
					if($appointmentlist[$i]['shijianduan_id'] == 1){
						if($appointmentlist[$i]['shijianduan_num'] == 1){
							echo '8 AM';
						}else if($appointmentlist[$i]['shijianduan_num'] == 2){
							echo '9 AM';
						}else if($appointmentlist[$i]['shijianduan_num'] == 3){
							echo '10 AM';
						}else if($appointmentlist[$i]['shijianduan_num'] == 4){
							echo '11 AM';
						}
					}else if($appointmentlist[$i]['shijianduan_id'] == 2){
						if($appointmentlist[$i]['shijianduan_num'] == 1){
							echo '2 PM';
						}else if($appointmentlist[$i]['shijianduan_num'] == 2){
							echo '3 PM';
						}else if($appointmentlist[$i]['shijianduan_num'] == 3){
							echo '4 PM';
						}else if($appointmentlist[$i]['shijianduan_num'] == 4){
							echo '5 PM';
						}
					}else if($appointmentlist[$i]['shijianduan_id'] == 3){
						if($appointmentlist[$i]['shijianduan_num'] == 1){
							echo '7 PM';
						}else if($appointmentlist[$i]['shijianduan_num'] == 2){
							echo '8 PM';
						}else if($appointmentlist[$i]['shijianduan_num'] == 3){
							echo '9 PM';
						}else if($appointmentlist[$i]['shijianduan_num'] == 4){
							echo '10 PM';
						}
					}
				?></td>
				<td align="center"><?php echo date('Y-m-d', $appointmentlist[$i]['created']).'<br />'.date('H:i:s', $appointmentlist[$i]['created'])?></td>
			</tr>
		<?php }}?>
	</tbody>
</table>

<?php $this->load->view('admin/footer')?>