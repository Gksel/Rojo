<?php $this->load->view('admin/header')?>
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
?>

<script type="text/javascript" src='<?php echo CDN_URL();?>themes/default/js/admin/admin_user.js?date=<?php echo CACHE_USETIME()?>'></script>
	
<table class="gksel_normal_tabaction">
	<tr>
		<td></td>
		<td>
		</td>
	</tr>
</table>
<table class="gksel_normal_tablist">
	<thead>
		<tr>
			<td width="50" align="center"><?php echo lang('cy_sn')?></td>
			<td><p>&nbsp;&nbsp;&nbsp;<?php if($this->langtype == '_ch'){echo '积分';}else {echo 'Points';}?></p></td>
			<td><p>&nbsp;&nbsp;&nbsp;<?php if($this->langtype == '_ch'){echo '积分说明';}else {echo 'Point Description';}?></p></td>
			<td width="150"><p>&nbsp;&nbsp;&nbsp;<?php if($this->langtype == '_ch'){echo '时间';}else {echo 'Time';}?></p></td>
		</tr>
	</thead>
	<tbody>
		<?php if(!empty($historylist)){for ($i = 0; $i < count($historylist); $i++) {?>
			<tr>
				<td align="center"><?php echo $i + 1?></td>
				<td>
					<?php 
						if($historylist[$i]['pointsetting_id'] == 1){
							if($this->langtype == '_ch'){echo '用户购买获取的积分';}else {echo 'One on one exchange';}
						}else if($historylist[$i]['pointsetting_id'] == 2){
							if($this->langtype == '_ch'){echo '被分享的用户加入的用户返回给分享者积分（可重复）';}else {echo 'Share to gain points';}
						}else if($historylist[$i]['pointsetting_id'] == 3){
							if($this->langtype == '_ch'){echo '积分可以抵扣钱的设置';}else {echo 'Score can be deducted from the money settings';}
						}
					?>
				</td>
				<td>
					&yen;100 = <?php echo ($historylist[$i]['pointsetting_value'] * 100).' ';?>
					<?php if($this->langtype == '_ch'){echo '积分';}else {echo 'Points';}?>
				</td>
				<td>
					<?php echo date('Y-m-d H:i:s', $historylist[$i]['created'])?>
				</td>
			</tr>
		<?php }}?>
	</tbody>
</table>

<?php $this->load->view('admin/footer')?>