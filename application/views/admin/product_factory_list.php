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
			<div class="searcharea">
				<form action = "<?php echo base_url().'index.php/admins/product/factorylist'?>" method="get">
					<input type="text" name="keyword" placeholder="<?php echo lang('cy_enter_keyword')?>" value="<?php echo $keyword?>"/>
					<input type="submit" value="<?php echo lang('cy_search')?>"/>
				</form>
			</div>
		</td>
	</tr>
</table>
<!-- 
<table class="gksel_normal_tabaction">
	<tr>
		<td>
			<div class="searcharea">
				<a href="<?php echo base_url().'index.php/admins/product/toadd_product_factory'?>"><font class="nav_on"><img class="plus" src="<?php echo base_url().'themes/default/images/plus.png'?>"/> <?php echo lang('dz_product_factory_add')?></font></a>
			</div>
		</td>
	</tr>
</table>
 -->
<table class="gksel_normal_tablist">
	<thead>
		<tr>
			<td width="50" align="center"><?php echo lang('cy_sn')?></td>
			<td><p>&nbsp;&nbsp;&nbsp;<?php echo lang('dz_product_factory_name')?></p></td>
			<td width="165" align="center"><p><?php echo lang('cy_time_lastedited')?></p></td>
			<td width="100" align="center"><p>Author</p></td>
			<td width="100" align="center"><p><?php echo lang('cy_status')?></p></td>
			<td width="350" align="center"><p><?php echo lang('cy_actions')?></p></td>
		</tr>
	</thead>
</table>
<ul id="tasks" style="float:left;width:100%;padding:0px;margin:0px 0px 0px 0px;list-style-type:none;">
	<?php if(isset($factorylist)){for ($i = 0; $i < count($factorylist); $i++) {?>
		<li class="articlelist" id="<?php echo $factorylist[$i]['factory_id']?>" iid="<?php echo $i+1?>" style="width:100%;padding:0px;margin:0px;list-style-type: none;">
			<table class="gksel_normal_tablist" style="margin-top: 0px;">
				<tbody>
					<tr style="<?php if($factorylist[$i]['status'] == 0){echo 'opacity:0.2;';}?>">
						<td width="50" align="center" style="padding:0px;"><?php echo ($i+1)?></td>
						<td>
							<div style="float:left;width:100%;">
								<?php echo actionsearchdaxiaoxiezimu($keyword, strip_tags($factorylist[$i]['factory_name'.$this->langtype]));?>
							</div>
							<div style="float:left;width:100%;color:#CCC;">
								<?php //echo base_url().'index.php/wechat/product?factory_id='.$factorylist[$i]['factory_id']?>
							</div>
						</td>
						<td width="165" align="center" style="padding:0px;"><?php echo date('Y-m-d H:i:s', $factorylist[$i]['edited'])?></td>
						<td width="100" align="center" style="padding:0px;"><?php echo $factorylist[$i]['edited_author']?></td>
						<td width="100" align="center" style="padding:0px;">
							<?php 
								if($factorylist[$i]['status'] == 1){
									echo lang('cy_online');
								}else{
									echo lang('cy_offline');
								}
							
							?>
						</td>
						<td width="350" align="center" style="padding:0px;">
							<div style="float:right;">
								<?php 
									echo '<a href="'.base_url().'index.php/admins/product/toedit_productfactory/'.$factorylist[$i]['factory_id'].'?backurl='.$current_url_encode.'" class="gksel_btn_action_on">'.lang('cy_edit').'</a>';
									echo '<a onclick="todel_productfactory('.$factorylist[$i]['factory_id'].', \''.$factorylist[$i]['factory_name_en'].'\')" href="javascript:;" class="gksel_btn_action_on">'.lang('cy_delete').'</a>';
								?>
							</div>
						</td>
					</tr>
				</tbody>
			</table>
		</li>
	<?php }}?>
</ul>
<table class="gksel_normal_tablist" style="margin-top: 0px;margin-bottom: 20px;">
	<thead>
		<tr>
			<td align="left" style="border-top: none;text-indent:15px;line-height:30px;">Drag the list to sort</td>
		</tr>
	</thead>
</table>
<script src="<?php echo base_url()?>themes/default/js/jquery-ui-1.10.3.custom.min.js"></script>
<script type="text/javascript">
	jQuery(function($) {
		$('.articlelist').each(function (){
			var height=$(this).find('table').height();
			$(this).css({'height':height+'px'});
		})
		$('#tasks').sortable({
			opacity:0.8,
			revert:true,
			forceHelperSize:true,
			placeholder: 'draggable-placeholder',
			forcePlaceholderSize:true,
			tolerance:'pointer',
			stop: function( event,ui) {//just for Chrome!!!! so that dropdowns on items don't appear below other items after being moved
				$(ui.item).css('z-index', 'auto');
				var newsrot=[];
				var idarr=[];
				var i=0;
				$('.articlelist').each(function (){
					i++;
					newsrot.push(i);
					idarr.push($(this).attr('id'));
				})
				$.post(baseurl+'index.php/admins/product/editfactory_sort',{idarr:idarr,newsrot:newsrot},function (data){
					
				})
			},
			scroll: true,
		});
		
	})
</script>
<?php $this->load->view('admin/footer')?>