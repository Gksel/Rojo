<?php $this->load->view('admin/header')?>

<script type="text/javascript" src='<?php echo CDN_URL();?>themes/default/js/admin/admin_product.js?date=<?php echo CACHE_USETIME()?>'></script>
	
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

$keyword = $this->input->get('keyword');
?>
<table class="gksel_normal_tabaction">
	<tr>
		<td>
			<div class="searcharea">
				<form action = "<?php echo base_url().'index.php/admins/product/loyaltylist'?>" method="get">
					<input type="text" name="keyword" placeholder="<?php echo lang('cy_enter_keyword')?>" value="<?php echo $keyword?>"/>
					<input type="submit" value="<?php echo lang('cy_search')?>"/>
				</form>
			</div>
		</td>
	</tr>
</table>
<table class="gksel_normal_tabaction">
	<tr>
		<td>
			<div class="searcharea">
				<a href="<?php echo base_url().'index.php/admins/product/toadd_loyalty'?>"><font class="nav_on"><img class="plus" src="<?php echo base_url().'themes/default/images/plus.png'?>"/> <?php echo lang('dz_product_loyalty_add')?></font></a>
			</div>
		</td>
	</tr>
</table>
<table class="gksel_normal_tablist">
	<thead>
		<tr>
			<td width="50" align="center"><?php echo lang('cy_sn')?></td>
			<td width="100" align="center"><p><?php echo lang('cy_picture')?></p></td>
			<td><p>&nbsp;&nbsp;&nbsp;<?php echo lang('dz_product_name')?></p></td>
			<td width="150" align="center"><p><?php echo lang('dz_product_loyalty_points')?></p></td>
			<td width="165" align="center"><p><?php echo lang('cy_time_lastedited')?></p></td>
			<td width="100" align="center"><p>Author</p></td>
			<td width="300" align="center"><p><?php echo lang('cy_actions')?></p></td>
		</tr>
	</thead>
	<tbody>
		<?php if(isset($loyaltylist)){for ($i = 0; $i < count($loyaltylist); $i++) {?>
			<tr>
				<td align="center"><?php echo $i+1?></td>
				<td align="center">
				
					<?php if($loyaltylist[$i]['loyalty_pic']!=""){?>
						<img style="max-width:70px;max-height: 70px;" src="<?php echo CDN_URL().$loyaltylist[$i]['loyalty_pic']?>"/>
					<?php }else{?>
						<img style="max-width:70px;max-height: 70px;" src="<?php echo CDN_URL().'themes/default/images/none_product.png'?>"/>
					<?php }?>
				</td>
				<td>
					<div style="float:left;width: 100%;">
						<?php echo actionsearchdaxiaoxiezimu($keyword, strip_tags($loyaltylist[$i]['loyalty_name_en']));?>
					</div>
					<div style="float:left;width: 100%;">
						<?php echo actionsearchdaxiaoxiezimu($keyword, strip_tags($loyaltylist[$i]['loyalty_name_ch']));?>
					</div>
					
					<div style="float:left;width: 100%;margin-top:10px;">
					<?php 
						$sql = "
			
							SELECT b.category_name_en, b.category_name_ch
			
							FROM ".DB_PRE()."loyalty_category AS a 
			
							LEFT JOIN ".DB_PRE()."system_product_category AS b ON a.category_id = b.category_id
			
							WHERE a.loyalty_id = ".$loyaltylist[$i]['loyalty_id']
						;
						$checkres = $this->db->query($sql)->result_array();
						
							if(!empty($checkres)){
								for ($aa = 0; $aa < count($checkres); $aa++) {
									echo '<div style="float:left;background:#EFEFEF;margin-right:10px;margin-bottom:10px;padding:5px 10px;">';
									echo ''.$checkres[$aa]['category_name_en'].' '.$checkres[$aa]['category_name_ch'].'';
									echo '</div>';
								}
							}
						?>
					</div>
				</td>
				<td align="center"><?php echo $loyaltylist[$i]['loyalty_points']?></td>
				<td align="center"><?php echo date('Y-m-d H:i:s', $loyaltylist[$i]['edited'])?></td>
				<td align="center"><?php echo $loyaltylist[$i]['edited_author']?></td>
				<td align="center">
					<div style="float:right;">
						<?php 
							echo '<a href="'.base_url().'index.php/admins/product/toedit_loyalty/'.$loyaltylist[$i]['loyalty_id'].'?backurl='.$current_url_encode.'" class="gksel_btn_action_on">'.lang('cy_edit').'</a>';
								
							echo '<a onclick="todel_loyalty('.$loyaltylist[$i]['loyalty_id'].', \''.$loyaltylist[$i]['loyalty_name_en'].'\')" href="javascript:;" class="gksel_btn_action_on">'.lang('cy_delete').'</a>';
						?>
					</div>
				</td>
			</tr>
		<?php }}?>
	</tbody>
</table>

<?php $this->load->view('admin/footer')?>