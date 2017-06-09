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
<?php 
	$date_start = strtotime(date('Y-m-d').' 00:00:00 +1 day');
	
	$date_end = strtotime(date('Y-m-d').' 00:00:00 +3 month');
?>
<table class="gksel_normal_tablist">
	<thead>
		<tr>
			<td width="200" align="center">Date</td>
			<td><p>&nbsp;&nbsp;&nbsp;Time</p></td>
		</tr>
	</thead>
	<tbody>
		<?php for ($i = $date_start; $i <= $date_end; $i = $i + 86400) {?>
			<tr>
				<td align="center"><?php echo date('Y-m-d', $i)?></td>
				<td>
					<?php 
						$shijianduan_id = 1;
					?>
					<div style="float:left;width:100%;">
						<?php 
							$shijianduan_num = 1;
						?>
						<div style="float:left;line-height:30px;width:100px;">
							MORNING
						</div>
						<div onclick="topaymentone_order('<?php echo date('Y-m-d', $i).'_'.$shijianduan_id.'_'.$shijianduan_num?>', '<?php echo date('Y-m-d', $i).' MORNING 8 AM'?>')" style="cursor:pointer;float:left;background:#EFEFEF;padding:5px 10px;">
							<?php 
								$sql = "SELECT * FROM ".DB_PRE()."appointmentsetting_close WHERE shijian_date = '".date('Y-m-d', $i)."' AND shijianduan_id = ".$shijianduan_id." AND shijianduan_num = ".$shijianduan_num;
								$checkres = $this->db->query($sql)->row_array();
								if(!empty($checkres)){
									echo '
										<div style="float:left;" id="'.date('Y-m-d', $i).'_'.$shijianduan_id.'_'.$shijianduan_num.'"><img style="float:left;width:20px;height:20px;" src="'.base_url().'themes/default/images/week_close.png"/></div>
									';
								}else{
									echo '
										<div style="float:left;" id="'.date('Y-m-d', $i).'_'.$shijianduan_id.'_'.$shijianduan_num.'"><img style="float:left;width:20px;height:20px;" src="'.base_url().'themes/default/images/week_gou.png"/></div>
									';
								}
							?>
							<div style="float:left;margin-left:10px;margin-top:2px;">8 AM</div>
						</div>
						<?php 
							$shijianduan_num = 2;
						?>
						<div onclick="topaymentone_order('<?php echo date('Y-m-d', $i).'_'.$shijianduan_id.'_'.$shijianduan_num?>', '<?php echo date('Y-m-d', $i).' MORNING 9 AM'?>')" style="cursor:pointer;float:left;background:#EFEFEF;padding:5px 10px;margin-left:20px;">
							<?php 
								$sql = "SELECT * FROM ".DB_PRE()."appointmentsetting_close WHERE shijian_date = '".date('Y-m-d', $i)."' AND shijianduan_id = ".$shijianduan_id." AND shijianduan_num = ".$shijianduan_num;
								$checkres = $this->db->query($sql)->row_array();
								if(!empty($checkres)){
									echo '
										<div style="float:left;" id="'.date('Y-m-d', $i).'_'.$shijianduan_id.'_'.$shijianduan_num.'"><img style="float:left;width:20px;height:20px;" src="'.base_url().'themes/default/images/week_close.png"/></div>
									';
								}else{
									echo '
										<div style="float:left;" id="'.date('Y-m-d', $i).'_'.$shijianduan_id.'_'.$shijianduan_num.'"><img style="float:left;width:20px;height:20px;" src="'.base_url().'themes/default/images/week_gou.png"/></div>
									';
								}
							?>
							<div style="float:left;margin-left:10px;margin-top:2px;">9 AM</div>
						</div>
						<?php 
							$shijianduan_num = 3;
						?>
						<div onclick="topaymentone_order('<?php echo date('Y-m-d', $i).'_'.$shijianduan_id.'_'.$shijianduan_num?>', '<?php echo date('Y-m-d', $i).' MORNING 10 AM'?>')" style="cursor:pointer;float:left;background:#EFEFEF;padding:5px 10px;margin-left:20px;">
							<?php 
								$sql = "SELECT * FROM ".DB_PRE()."appointmentsetting_close WHERE shijian_date = '".date('Y-m-d', $i)."' AND shijianduan_id = ".$shijianduan_id." AND shijianduan_num = ".$shijianduan_num;
								$checkres = $this->db->query($sql)->row_array();
								if(!empty($checkres)){
									echo '
										<div style="float:left;" id="'.date('Y-m-d', $i).'_'.$shijianduan_id.'_'.$shijianduan_num.'"><img style="float:left;width:20px;height:20px;" src="'.base_url().'themes/default/images/week_close.png"/></div>
									';
								}else{
									echo '
										<div style="float:left;" id="'.date('Y-m-d', $i).'_'.$shijianduan_id.'_'.$shijianduan_num.'"><img style="float:left;width:20px;height:20px;" src="'.base_url().'themes/default/images/week_gou.png"/></div>
									';
								}
							?>
							<div style="float:left;margin-left:10px;margin-top:2px;">10 AM</div>
						</div>
						<?php 
							$shijianduan_num = 4;
						?>
						<div onclick="topaymentone_order('<?php echo date('Y-m-d', $i).'_'.$shijianduan_id.'_'.$shijianduan_num?>', '<?php echo date('Y-m-d', $i).' MORNING 11 AM'?>')" style="cursor:pointer;float:left;background:#EFEFEF;padding:5px 10px;margin-left:20px;">
							<?php 
								$sql = "SELECT * FROM ".DB_PRE()."appointmentsetting_close WHERE shijian_date = '".date('Y-m-d', $i)."' AND shijianduan_id = ".$shijianduan_id." AND shijianduan_num = ".$shijianduan_num;
								$checkres = $this->db->query($sql)->row_array();
								if(!empty($checkres)){
									echo '
										<div style="float:left;" id="'.date('Y-m-d', $i).'_'.$shijianduan_id.'_'.$shijianduan_num.'"><img style="float:left;width:20px;height:20px;" src="'.base_url().'themes/default/images/week_close.png"/></div>
									';
								}else{
									echo '
										<div style="float:left;" id="'.date('Y-m-d', $i).'_'.$shijianduan_id.'_'.$shijianduan_num.'"><img style="float:left;width:20px;height:20px;" src="'.base_url().'themes/default/images/week_gou.png"/></div>
									';
								}
							?>
							<div style="float:left;margin-left:10px;margin-top:2px;">11 AM</div>
						</div>
					</div>
					<?php 
						$shijianduan_id = 2;
					?>
					<div style="float:left;width:100%;margin-top:20px;">
						<?php 
							$shijianduan_num = 1;
						?>
						<div style="float:left;line-height:30px;width:100px;">
							AFTERNOON
						</div>
						<div onclick="topaymentone_order('<?php echo date('Y-m-d', $i).'_'.$shijianduan_id.'_'.$shijianduan_num?>', '<?php echo date('Y-m-d', $i).' AFTERNOON 2 PM'?>')" style="cursor:pointer;float:left;background:#EFEFEF;padding:5px 10px;">
							<?php 
								$sql = "SELECT * FROM ".DB_PRE()."appointmentsetting_close WHERE shijian_date = '".date('Y-m-d', $i)."' AND shijianduan_id = ".$shijianduan_id." AND shijianduan_num = ".$shijianduan_num;
								$checkres = $this->db->query($sql)->row_array();
								if(!empty($checkres)){
									echo '
										<div style="float:left;" id="'.date('Y-m-d', $i).'_'.$shijianduan_id.'_'.$shijianduan_num.'"><img style="float:left;width:20px;height:20px;" src="'.base_url().'themes/default/images/week_close.png"/></div>
									';
								}else{
									echo '
										<div style="float:left;" id="'.date('Y-m-d', $i).'_'.$shijianduan_id.'_'.$shijianduan_num.'"><img style="float:left;width:20px;height:20px;" src="'.base_url().'themes/default/images/week_gou.png"/></div>
									';
								}
							?>
							<div style="float:left;margin-left:10px;margin-top:2px;">2 PM</div>
						</div>
						<?php 
							$shijianduan_num = 2;
						?>
						<div onclick="topaymentone_order('<?php echo date('Y-m-d', $i).'_'.$shijianduan_id.'_'.$shijianduan_num?>', '<?php echo date('Y-m-d', $i).' AFTERNOON 3 PM'?>')" style="cursor:pointer;float:left;background:#EFEFEF;padding:5px 10px;margin-left:20px;">
							<?php 
								$sql = "SELECT * FROM ".DB_PRE()."appointmentsetting_close WHERE shijian_date = '".date('Y-m-d', $i)."' AND shijianduan_id = ".$shijianduan_id." AND shijianduan_num = ".$shijianduan_num;
								$checkres = $this->db->query($sql)->row_array();
								if(!empty($checkres)){
									echo '
										<div style="float:left;" id="'.date('Y-m-d', $i).'_'.$shijianduan_id.'_'.$shijianduan_num.'"><img style="float:left;width:20px;height:20px;" src="'.base_url().'themes/default/images/week_close.png"/></div>
									';
								}else{
									echo '
										<div style="float:left;" id="'.date('Y-m-d', $i).'_'.$shijianduan_id.'_'.$shijianduan_num.'"><img style="float:left;width:20px;height:20px;" src="'.base_url().'themes/default/images/week_gou.png"/></div>
									';
								}
							?>
							<div style="float:left;margin-left:10px;margin-top:2px;">3 PM</div>
						</div>
						<?php 
							$shijianduan_num = 3;
						?>
						<div onclick="topaymentone_order('<?php echo date('Y-m-d', $i).'_'.$shijianduan_id.'_'.$shijianduan_num?>', '<?php echo date('Y-m-d', $i).' AFTERNOON 4 PM'?>')" style="cursor:pointer;float:left;background:#EFEFEF;padding:5px 10px;margin-left:20px;">
							<?php 
								$sql = "SELECT * FROM ".DB_PRE()."appointmentsetting_close WHERE shijian_date = '".date('Y-m-d', $i)."' AND shijianduan_id = ".$shijianduan_id." AND shijianduan_num = ".$shijianduan_num;
								$checkres = $this->db->query($sql)->row_array();
								if(!empty($checkres)){
									echo '
										<div style="float:left;" id="'.date('Y-m-d', $i).'_'.$shijianduan_id.'_'.$shijianduan_num.'"><img style="float:left;width:20px;height:20px;" src="'.base_url().'themes/default/images/week_close.png"/></div>
									';
								}else{
									echo '
										<div style="float:left;" id="'.date('Y-m-d', $i).'_'.$shijianduan_id.'_'.$shijianduan_num.'"><img style="float:left;width:20px;height:20px;" src="'.base_url().'themes/default/images/week_gou.png"/></div>
									';
								}
							?>
							<div style="float:left;margin-left:10px;margin-top:2px;">4 PM</div>
						</div>
						<?php 
							$shijianduan_num = 4;
						?>
						<div onclick="topaymentone_order('<?php echo date('Y-m-d', $i).'_'.$shijianduan_id.'_'.$shijianduan_num?>', '<?php echo date('Y-m-d', $i).' AFTERNOON 5 PM'?>')" style="cursor:pointer;float:left;background:#EFEFEF;padding:5px 10px;margin-left:20px;">
							<?php 
								$sql = "SELECT * FROM ".DB_PRE()."appointmentsetting_close WHERE shijian_date = '".date('Y-m-d', $i)."' AND shijianduan_id = ".$shijianduan_id." AND shijianduan_num = ".$shijianduan_num;
								$checkres = $this->db->query($sql)->row_array();
								if(!empty($checkres)){
									echo '
										<div style="float:left;" id="'.date('Y-m-d', $i).'_'.$shijianduan_id.'_'.$shijianduan_num.'"><img style="float:left;width:20px;height:20px;" src="'.base_url().'themes/default/images/week_close.png"/></div>
									';
								}else{
									echo '
										<div style="float:left;" id="'.date('Y-m-d', $i).'_'.$shijianduan_id.'_'.$shijianduan_num.'"><img style="float:left;width:20px;height:20px;" src="'.base_url().'themes/default/images/week_gou.png"/></div>
									';
								}
							?>
							<div style="float:left;margin-left:10px;margin-top:2px;">5 PM</div>
						</div>
					</div>
					<?php 
						$shijianduan_num = 3;
					?>
					<div style="float:left;width:100%;margin-top:20px;">
						<?php 
							$shijianduan_num = 1;
						?>
						<div style="float:left;line-height:30px;width:100px;">
							EVENING
						</div>
						<div onclick="topaymentone_order('<?php echo date('Y-m-d', $i).'_'.$shijianduan_id.'_'.$shijianduan_num?>', '<?php echo date('Y-m-d', $i).' EVENING 7 PM'?>')" style="cursor:pointer;float:left;background:#EFEFEF;padding:5px 10px;">
							<?php 
								$sql = "SELECT * FROM ".DB_PRE()."appointmentsetting_close WHERE shijian_date = '".date('Y-m-d', $i)."' AND shijianduan_id = ".$shijianduan_id." AND shijianduan_num = ".$shijianduan_num;
								$checkres = $this->db->query($sql)->row_array();
								if(!empty($checkres)){
									echo '
										<div style="float:left;" id="'.date('Y-m-d', $i).'_'.$shijianduan_id.'_'.$shijianduan_num.'"><img style="float:left;width:20px;height:20px;" src="'.base_url().'themes/default/images/week_close.png"/></div>
									';
								}else{
									echo '
										<div style="float:left;" id="'.date('Y-m-d', $i).'_'.$shijianduan_id.'_'.$shijianduan_num.'"><img style="float:left;width:20px;height:20px;" src="'.base_url().'themes/default/images/week_gou.png"/></div>
									';
								}
							?>
							<div style="float:left;margin-left:10px;margin-top:2px;">7 PM</div>
						</div>
						<?php 
							$shijianduan_num = 2;
						?>
						<div onclick="topaymentone_order('<?php echo date('Y-m-d', $i).'_'.$shijianduan_id.'_'.$shijianduan_num?>', '<?php echo date('Y-m-d', $i).' EVENING 8 PM'?>')" style="cursor:pointer;float:left;background:#EFEFEF;padding:5px 10px;margin-left:20px;">
							<?php 
								$sql = "SELECT * FROM ".DB_PRE()."appointmentsetting_close WHERE shijian_date = '".date('Y-m-d', $i)."' AND shijianduan_id = ".$shijianduan_id." AND shijianduan_num = ".$shijianduan_num;
								$checkres = $this->db->query($sql)->row_array();
								if(!empty($checkres)){
									echo '
										<div style="float:left;" id="'.date('Y-m-d', $i).'_'.$shijianduan_id.'_'.$shijianduan_num.'"><img style="float:left;width:20px;height:20px;" src="'.base_url().'themes/default/images/week_close.png"/></div>
									';
								}else{
									echo '
										<div style="float:left;" id="'.date('Y-m-d', $i).'_'.$shijianduan_id.'_'.$shijianduan_num.'"><img style="float:left;width:20px;height:20px;" src="'.base_url().'themes/default/images/week_gou.png"/></div>
									';
								}
							?>
							<div style="float:left;margin-left:10px;margin-top:2px;">8 PM</div>
						</div>
						<?php 
							$shijianduan_num = 3;
						?>
						<div onclick="topaymentone_order('<?php echo date('Y-m-d', $i).'_'.$shijianduan_id.'_'.$shijianduan_num?>', '<?php echo date('Y-m-d', $i).' EVENING 9 PM'?>')" style="cursor:pointer;float:left;background:#EFEFEF;padding:5px 10px;margin-left:20px;">
							<?php 
								$sql = "SELECT * FROM ".DB_PRE()."appointmentsetting_close WHERE shijian_date = '".date('Y-m-d', $i)."' AND shijianduan_id = ".$shijianduan_id." AND shijianduan_num = ".$shijianduan_num;
								$checkres = $this->db->query($sql)->row_array();
								if(!empty($checkres)){
									echo '
										<div style="float:left;" id="'.date('Y-m-d', $i).'_'.$shijianduan_id.'_'.$shijianduan_num.'"><img style="float:left;width:20px;height:20px;" src="'.base_url().'themes/default/images/week_close.png"/></div>
									';
								}else{
									echo '
										<div style="float:left;" id="'.date('Y-m-d', $i).'_'.$shijianduan_id.'_'.$shijianduan_num.'"><img style="float:left;width:20px;height:20px;" src="'.base_url().'themes/default/images/week_gou.png"/></div>
									';
								}
							?>
							<div style="float:left;margin-left:10px;margin-top:2px;">9 PM</div>
						</div>
						<?php 
							$shijianduan_num = 4;
						?>
						<div onclick="topaymentone_order('<?php echo date('Y-m-d', $i).'_'.$shijianduan_id.'_'.$shijianduan_num?>', '<?php echo date('Y-m-d', $i).' EVENING 10 PM'?>')" style="cursor:pointer;float:left;background:#EFEFEF;padding:5px 10px;margin-left:20px;">
							<?php 
								$sql = "SELECT * FROM ".DB_PRE()."appointmentsetting_close WHERE shijian_date = '".date('Y-m-d', $i)."' AND shijianduan_id = ".$shijianduan_id." AND shijianduan_num = ".$shijianduan_num;
								$checkres = $this->db->query($sql)->row_array();
								if(!empty($checkres)){
									echo '
										<div style="float:left;" id="'.date('Y-m-d', $i).'_'.$shijianduan_id.'_'.$shijianduan_num.'"><img style="float:left;width:20px;height:20px;" src="'.base_url().'themes/default/images/week_close.png"/></div>
									';
								}else{
									echo '
										<div style="float:left;" id="'.date('Y-m-d', $i).'_'.$shijianduan_id.'_'.$shijianduan_num.'"><img style="float:left;width:20px;height:20px;" src="'.base_url().'themes/default/images/week_gou.png"/></div>
									';
								}
							?>
							<div style="float:left;margin-left:10px;margin-top:2px;">10 PM</div>
						</div>
					</div>
				</td>
			</tr>
		<?php }?>
	</tbody>
</table>
<div class="gksel_paymentone_box_bg"></div>
<div class="gksel_paymentone_box">
	<table>
		<tr>
			<td>
				<div class="gksel_paymentone_content">
					<div class="close"><img onclick="toclose_paymentonebox()" src="<?php echo base_url().'themes/default/images/close.png'?>"></div>
					<div class="title"></div>
					<div class="subtitle"></div>
					<div style="float:left;width:100%;">&nbsp;</div>
					<div class="control">
						<div class="yes" onclick="paymentone_order()">提交</div>
					</div>
				</div>
			</td>
		</tr>
	</table>
</div>
<?php $this->load->view('admin/footer')?>