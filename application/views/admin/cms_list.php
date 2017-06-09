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
<table class="gksel_normal_tablist">
	<thead>
		<tr>
			<td width="50" align="center"><?php echo lang('cy_sn')?></td>
			<td><p>&nbsp;&nbsp;&nbsp;<?php echo lang('cy_name')?></p></td>
			<td width="165" align="center"><p><?php echo lang('cy_time_lastedited')?></p></td>
			<td width="100" align="center"><p>Author</p></td>
			<td width="100" align="center"><p><?php echo lang('cy_actions')?></p></td>
		</tr>
	</thead>
	<tbody>
		<?php if(isset($cmslist)){for ($i = 0; $i < count($cmslist); $i++) {?>
			<?php if($cmslist[$i]['parent'] == 0){?>
				<tr style="background: #EFEFEF;">
					<td align="center"><?php echo $i+1?></td>
					<td>
						<?php echo actionsearchdaxiaoxiezimu($keyword, strip_tags($cmslist[$i]['cms_name_en']));?><br />
						<?php echo actionsearchdaxiaoxiezimu($keyword, strip_tags($cmslist[$i]['cms_name_ch']));?>
					</td>
					<td align="center"></td>
					<td align="center"></td>
					<td align="center">
						
					</td>
				</tr>
			<?php }else{?>
				<tr>
					<td align="center"><?php echo $i+1?></td>
					<td>
						<?php echo actionsearchdaxiaoxiezimu($keyword, strip_tags($cmslist[$i]['cms_name_en']));?><br />
						<?php echo actionsearchdaxiaoxiezimu($keyword, strip_tags($cmslist[$i]['cms_name_ch']));?>
					</td>
					<td align="center"><?php echo date('Y-m-d H:i:s', $cmslist[$i]['edited'])?></td>
					<td align="center"><?php echo $cmslist[$i]['edited_author']?></td>
					<td align="center">
						<div style="float:right;">
							<?php 
								echo '<a href="'.base_url().'index.php/admins/cms/toedit_cms/'.$cmslist[$i]['cms_id'].'?backurl='.$current_url_encode.'" class="gksel_btn_action_on">'.lang('cy_edit').'</a>';
									
// 								echo '<a onclick="todel_cms('.$cmslist[$i]['cms_id'].', \''.$cmslist[$i]['cms_name_en'].'\')" href="javascript:;" class="gksel_btn_action_on">'.lang('cy_delete').'</a>';
							?>
						</div>
					</td>
				</tr>
			<?php }?>
		<?php }}?>
	</tbody>
</table>

<?php $this->load->view('admin/footer')?>