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

$product_type = $this->input->get('product_type');
$keyword = $this->input->get('keyword');
?>
<table class="gksel_normal_tabaction">
	<tr>
		<td>
			
		</td>
		<td>
			<div class="searcharea">
				<form action = "<?php echo base_url().'index.php/admins/product/index'?>" method="get">
					<input type="text" name="keyword" placeholder="<?php echo lang('cy_enter_keyword')?>" value="<?php echo $keyword?>"/>
					<input type="submit" value="<?php echo lang('cy_search')?>"/>
				</form>
			</div>
		</td>
	</tr>
</table>
<table class="gksel_normal_tablist">
	<thead>
		<tr>
			<td width="50" align="center"><?php echo lang('cy_sn')?></td>
			<td width="150" align="center"><p>Order Number</p></td>
			<td><p>&nbsp;&nbsp;&nbsp;<?php echo lang('dz_user_username')?></p></td>
			<td width="150" align="center"><p>Total Price</p></td>
			<td width="165" align="center"><p>Order Time</p></td>
			<td width="300" align="center"><p><?php echo lang('cy_actions')?></p></td>
		</tr>
	</thead>
	<tbody>
	</tbody>
</table>

<?php $this->load->view('admin/footer')?>