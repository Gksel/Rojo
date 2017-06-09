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

$category_id = $this->input->get('category_id');
$brand_id = $this->input->get('brand_id');
$keyword = $this->input->get('keyword');
?>
<table class="gksel_normal_tabaction">
	<tr>
		<td>
			<div class="searcharea">
				<form action = "<?php echo base_url().'index.php/admins/product/index'?>" method="get">
					<select name="category_id" class="displaynone">
						<option value=""><?php echo lang('cy_all')?></option>
						<?php echo $this->WelModel->getproductcategory_select($this->langtype, $category_id)?>
					</select>
					<select name="brand_id" class="displaynone">
						<option value=""><?php echo lang('cy_all')?></option>
						<?php echo $this->WelModel->getbrand_select($this->langtype, $brand_id)?>
					</select>
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
				<!--  
				<a href="<?php echo base_url().'index.php/admins/product/toadd_product'?>"><font class="nav_on"><img class="plus" src="<?php echo base_url().'themes/default/images/plus.png'?>"/> <?php echo lang('dz_product_add')?></font></a>
				-->
				<div onclick="javascript:location.href='<?php echo base_url().'index.php/admins/product/index?category_id='.$category_id.'&brand_id='.$brand_id.'&keyword='.$keyword.'&is_excel=1'?>';" style="float: left;margin-top:7px;cursor:pointer;">
					<div style="float: left;margin-left:5px;">
						<img src="<?php echo base_url().'themes/default/images/icon_xls.gif'?>"/>
					</div>
					<div style="float: left;margin-left:5px;">
						Export Excel
					</div>
				</div>
			</div>
		</td>
	</tr>
</table>
<div style="float:left;width:100%;height:calc(100% - 120px);overflow:auto;">
<table class="gksel_normal_tablist" style="width:2100px;">
	<thead>
		<tr>
			<!-- 
			<td width="50" align="center"><?php echo lang('cy_sn')?></td>
			-->
			<td width="100" align="center"><p><?php echo lang('cy_picture')?></p></td>
			<td><p>&nbsp;&nbsp;&nbsp;<?php echo lang('dz_product_name')?></p></td>
			<td width="320" align="center"><p>Factory Phase 1</p></td>
			<td width="340" align="center"><p>Alteration Center Phase 2</p></td>
			<td width="300" align="center"><p>Store Fitting Phase 3</p></td>
			<td width="300" align="center"><p>Alteration Center Phase 4</p></td>
			<td width="240" align="center"><p>Store Phase 5</p></td>
			<td width="280" align="center"><p>Delivered Phase 6</p></td>
		</tr>
	</thead>
	<tbody>
		<?php if(isset($productlist)){for ($i = 0; $i < count($productlist); $i++) {?>
			<tr style="<?php if($productlist[$i]['status'] == 0){echo 'opacity:0.2;';}?>">
				<!-- 
				<td align="center"><?php //echo ($i+1)?></td>
				 -->
				<td align="center">
					<div style="float:left;width: 100%;">
						<?php if($productlist[$i]['product_pic']!=""){?>
							<img style="max-width:70px;max-height: 70px;" src="<?php echo CDN_URL().$productlist[$i]['product_pic']?>"/>
						<?php }else{?>
							<img style="max-width:70px;max-height: 70px;" src="<?php echo CDN_URL().'themes/default/images/none_product.png'?>"/>
						<?php }?>
						</div>
					<div style="float:left;width: 100%;">
						<?php 
							if($productlist[$i]['product_id'] < 10){
								echo 'ROJOSH000'.$productlist[$i]['product_id'];
							}else if($productlist[$i]['product_id'] < 100){
								echo 'ROJOSH00'.$productlist[$i]['product_id'];
							}else if($productlist[$i]['product_id'] < 1000){
								echo 'ROJOSH0'.$productlist[$i]['product_id'];
							}else if($productlist[$i]['product_id'] < 10000){
								echo 'ROJOSH'.$productlist[$i]['product_id'];
							}
						?>
					</div>
				</td>
				<td>
					<div style="float:left;width: 100%;">
						<?php echo $productlist[$i]['user_realname']?><br /><?php echo $productlist[$i]['user_number']?>
					</div>
					<?php if($productlist[$i]['company_businesslicense'] != ""){?>
						<div style="float:left;width: 100%;">
							<a target="_blank" href="<?php echo base_url().$productlist[$i]['company_businesslicense']?>">Download PDF</a>
						</div>
					<?php }?>
					
					<?php if($productlist[$i]['factory_name'.$this->langtype] != ''){?>
						<div style="float:left;width: 100%;">
							Factory: <?php echo $productlist[$i]['factory_name'.$this->langtype]?>
						</div>
					<?php }?>
				</td>
				<td>
					<?php if($productlist[$i]['step1_approve_status'] != ''){?>
						<div style="float:left;width: 100%;">
							<?php 
								echo 'Date of cloth due: '.$productlist[$i]['step1_date_cloth_due'].'<br />';
								echo 'Date of cloth submitted: '.$productlist[$i]['step1_date_cloth_submitted'];
							?>
						</div>
						<div style="display:none;float: left;width:100%;margin-top:5px;">
							keyword tag
						</div>
						<div style="float: left;width:100%;margin-top:10px;">
							<div style="<?php if($productlist[$i]['step1_status_num'] >= 1){echo 'background:#EFEFEF;';}?>float:left;width:calc(100% - 2px);border:1px solid gray;height:40px;">
								<div style="float:left;width:calc(100% - 160px);text-indent:10px;height:40px;line-height:40px;">
<!-- 									going into production -->
									1.1 Start Production
								</div>
								<div style="float:left;width:120px;margin:10px 0px;height:20px;line-height:20px;">
									<?php if($productlist[$i]['step1_status_num'] >= 1){?>
										<?php echo date('Y-m-d H:i', $productlist[$i]['step1_approve_time_1'])?>
									<?php }else{?>
										&nbsp;
									<?php }?>
								</div>
								<div style="float:left;width:40px;margin:10px 0px;height:20px;line-height:20px;color:green;">
									<?php if($productlist[$i]['step1_status_num'] >= 1){?>
										Done
									<?php }else{?>
										&nbsp;
									<?php }?>
								</div>
							</div>
							<div style="<?php if($productlist[$i]['step1_status_num'] >= 2){echo 'background:#EFEFEF;';}?>float:left;width:calc(100% - 2px);border:1px solid gray;height:40px;margin-top:6px;">
								<div style="float:left;width:calc(100% - 160px);text-indent:10px;height:40px;line-height:40px;">
<!-- 									completed production -->
									1.2 Pickup Suit
								</div>
								<div style="float:left;width:120px;margin:10px 0px;height:20px;line-height:20px;">
									<?php if($productlist[$i]['step1_status_num'] >= 2){?>
										<?php echo date('Y-m-d H:i', $productlist[$i]['step1_approve_time_2'])?>
									<?php }else{?>
										&nbsp;
									<?php }?>
								</div>
								<div style="float:left;width:40px;margin:10px 0px;height:20px;line-height:20px;color:green;">
									<?php if($productlist[$i]['step1_status_num'] >= 2){?>
										Done
									<?php }else{?>
										&nbsp;
									<?php }?>
								</div>
							</div>
							<div style="<?php if($productlist[$i]['step1_status_num'] >= 3){echo 'background:#EFEFEF;';}?>float:left;width:calc(100% - 2px);border:1px solid gray;height:40px;margin-top:6px;">
								<div style="float:left;width:calc(100% - 160px);text-indent:10px;height:40px;line-height:40px;">
<!-- 									going into alteration center -->
									1.3 Quality Work
								</div>
								<div style="float:left;width:120px;margin:10px 0px;height:20px;line-height:20px;">
									<?php if($productlist[$i]['step1_status_num'] >= 3){?>
										<?php echo date('Y-m-d H:i', $productlist[$i]['step1_approve_time_3'])?>
									<?php }else{?>
										&nbsp;
									<?php }?>
								</div>
								<div style="float:left;width:40px;margin:10px 0px;height:20px;line-height:20px;color:green;">
									<?php if($productlist[$i]['step1_status_num'] >= 3){?>
										Done
									<?php }else{?>
										&nbsp;
									<?php }?>
								</div>
							</div>
							<!-- 
							<div style="<?php if($productlist[$i]['step1_status_num'] >= 4){echo 'background:#EFEFEF;';}?>float:left;width:calc(100% - 2px);border:1px solid gray;height:40px;margin-top:6px;">
								<div style="float:left;width:calc(100% - 160px);text-indent:10px;height:40px;line-height:40px;">
									coming out of alteration center
								</div>
								<div style="float:left;width:120px;margin:10px 0px;height:20px;line-height:20px;">
									<?php if($productlist[$i]['step1_status_num'] >= 4){?>
										<?php echo date('Y-m-d H:i', $productlist[$i]['step1_approve_time_4'])?>
									<?php }else{?>
										&nbsp;
									<?php }?>
								</div>
								<div style="float:left;width:40px;margin:10px 0px;height:20px;line-height:20px;color:green;">
									<?php if($productlist[$i]['step1_status_num'] >= 4){?>
										Done
									<?php }else{?>
										&nbsp;
									<?php }?>
								</div>
							</div>
							 -->
						</div>
					<?php }?>
				</td>
				<td>
					<?php if($productlist[$i]['step2_approve_status'] != ''){?>
						<div style="display:none;float: left;width:100%;margin-top:5px;">
							Notes
						</div>
						<div style="display:none;float: left;width:100%;margin-top:10px;">
							<?php echo $productlist[$i]['step2_notes']?>
						</div>
						<div style="float: left;width:100%;margin-top:10px;">
							<div style="background:#EFEFEF;float:left;width:calc(100% - 2px);border:1px solid gray;height:40px;">
								<div style="float:left;width:calc(100% - 160px);text-indent:10px;height:40px;line-height:40px;">
<!-- 									going into production -->
									2.1 Measulement Check
								</div>
								<div style="float:left;width:120px;margin:10px 0px;height:20px;line-height:20px;">
										<?php echo date('Y-m-d H:i', $productlist[$i]['step2_approve_time'])?>
								</div>
								<div style="float:left;width:40px;margin:10px 0px;height:20px;line-height:20px;color:green;">
									Done
								</div>
							</div>
						</div>
					<?php }?>
				</td>
				<td>
					<?php if($productlist[$i]['step3_approve_status'] != ''){?>
						<div style="float: left;width:100%;margin-top:10px;">
							<div style="background:#EFEFEF;float:left;width:calc(100% - 2px);border:1px solid gray;height:40px;">
								<div style="float:left;width:calc(100% - 160px);text-indent:10px;height:40px;line-height:40px;">
<!-- 									going into production -->
									3.1 Store Fitting
								</div>
								<div style="float:left;width:120px;margin:10px 0px;height:20px;line-height:20px;">
										<?php echo date('Y-m-d H:i', $productlist[$i]['step3_approve_time'])?>
								</div>
								<div style="float:left;width:40px;margin:10px 0px;height:20px;line-height:20px;color:green;">
									Done
								</div>
							</div>
						</div>
						<div style="display:none;float:left;width: 100%;margin-top:5px;">
							entering alteration center
						</div>
						<div style="display:none;float: left;width:100%;margin-top:10px;">
							New Due Date: <?php echo $productlist[$i]['step3_date_new_due']?>
						</div>
						<div style="display:none;float: left;width:100%;margin-top:10px;">
							Action Time: <?php echo date('Y-m-d H:i', $productlist[$i]['step3_approve_time'])?>
						</div>
					<?php }?>
				</td>
				
				<td>
					<?php if($productlist[$i]['step4_approve_status'] != ''){?>
						<?php 
							//判断是第几次
							$sql = "SELECT count(*) AS numcount FROM ".DB_PRE()."product_step4 WHERE product_id = ".$productinfo['product_id'].' AND isdel = 1';
							$count_res = $this->db->query($sql)->row_array();
							if(!empty($count_res)){
								$count = $count_res['numcount'];
							}else{
								$count = 0;
							}
							if($count > 0){
								echo '<div style="float:left;width:100%;margin-bottom:10px;">('.($count + 1).' times)</div>';
							}
						?>
						<div style="<?php if($productlist[$i]['step4_status_num'] >= 1){echo 'background:#EFEFEF;';}?>float:left;width:calc(100% - 2px);border:1px solid gray;height:40px;">
							<div style="float:left;width:calc(100% - 160px);text-indent:10px;height:40px;line-height:40px;">
								4.1 Alterations
							</div>
							<div style="float:left;width:120px;margin:10px 0px;height:20px;line-height:20px;">
								<?php if($productlist[$i]['step4_status_num'] >= 1){?>
									<?php echo date('Y-m-d H:i', $productlist[$i]['step1_approve_time_1'])?>
								<?php }else{?>
									&nbsp;
								<?php }?>
							</div>
							<div style="float:left;width:40px;margin:10px 0px;height:20px;line-height:20px;color:green;">
								<?php if($productlist[$i]['step4_status_num'] >= 1){?>
									Done
								<?php }else{?>
									&nbsp;
								<?php }?>
							</div>
						</div>
						<div style="<?php if($productlist[$i]['step4_status_num'] >= 2){echo 'background:#EFEFEF;';}?>float:left;width:calc(100% - 2px);border:1px solid gray;height:40px;margin-top:6px;">
							<div style="float:left;width:calc(100% - 160px);text-indent:10px;height:40px;line-height:40px;">
								4.2 Quality Check
							</div>
							<div style="float:left;width:120px;margin:10px 0px;height:20px;line-height:20px;">
								<?php if($productlist[$i]['step4_status_num'] >= 2){?>
									<?php echo date('Y-m-d H:i', $productlist[$i]['step1_approve_time_2'])?>
								<?php }else{?>
									&nbsp;
								<?php }?>
							</div>
							<div style="float:left;width:40px;margin:10px 0px;height:20px;line-height:20px;color:green;">
								<?php if($productlist[$i]['step4_status_num'] >= 2){?>
									Done
								<?php }else{?>
									&nbsp;
								<?php }?>
							</div>
						</div>
					<?php }?>
				</td>
				<td>
					<?php if($productlist[$i]['step5_approve_status'] != ''){?>
						<div style="float: left;width:100%;margin-top:10px;">
							<div style="background:#EFEFEF;float:left;width:calc(100% - 2px);border:1px solid gray;height:40px;">
								<div style="float:left;width:calc(100% - 160px);text-indent:10px;height:40px;line-height:40px;">
									5.1 OK
								</div>
								<div style="float:left;width:120px;margin:10px 0px;height:20px;line-height:20px;">
										<?php echo date('Y-m-d H:i', $productlist[$i]['step5_approve_time'])?>
								</div>
								<div style="float:left;width:40px;margin:10px 0px;height:20px;line-height:20px;color:green;">
									Done
								</div>
							</div>
						</div>
					<?php }?>
				</td>
				<td>
					<?php if($productlist[$i]['step5_approve_status'] != ''){?>
						<div style="float: left;width:100%;margin-top:10px;">
							<div style="background:#EFEFEF;float:left;width:calc(100% - 2px);border:1px solid gray;height:40px;">
								<div style="float:left;width:calc(100% - 160px);text-indent:10px;height:40px;line-height:40px;">
									6.1 Delivered
								</div>
								<div style="float:left;width:120px;margin:10px 0px;height:20px;line-height:20px;">
										<?php echo date('Y-m-d H:i', $productlist[$i]['step5_approve_time'])?>
								</div>
								<div style="float:left;width:40px;margin:10px 0px;height:20px;line-height:20px;color:green;">
									Done
								</div>
							</div>
						</div>
					<?php }?>
				</td>
			</tr>
		<?php }}?>
	</tbody>
</table>
</div>
<?php $this->load->view('admin/footer')?>