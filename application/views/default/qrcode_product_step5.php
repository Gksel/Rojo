<?php $this->load->view('default/qrcode_header');?><style>html, body{background:#9966FF;}</style><script type="text/javascript">
//关闭微信页面function xiangmu_pagereloading(){	WeixinJSBridge.call('closeWindow');}
</script><div style="margin: 0 auto;width:100%;max-width:640px;">	<div style="float: left;width:90%;margin:10px 5%;">			<div style="float: left;width:100%;margin-top:10px;font-size:18px;font-weight:bold;">				Store Phase 5			</div>						<div style="float: left;width:100%;margin-top:10px;">				<div style="float: left;width:48%;">					<div class="btn_product_submit" id="btn_product_submit_1" onclick="tosubmitproduct_step5()" style="float: left;width:100%;color: #fff;text-align:center;background: #111d35;height:45px;line-height:45px;font-size: 14px;border-radius: 4px;">						OK					</div>					<div class="btn_product_loading" id="btn_product_loading_1" style="display:none;float: left;width:100%;color: #fff;background: #111d35;height:45px;line-height:45px;font-size: 14px;border-radius: 4px;">						<div style="float:left;width:48%;"><img style="float:right;margin-right:5px;margin-top:13px;width:18px;height:18px;" src="<?php echo base_url().'themes/default/images/ajax_loading.gif'?>"/></div>						<div style="float:left;width:52%;text-align:left;">Loading...</div>					</div>					<div class="btn_product_success" id="btn_product_success_1" onclick="xiangmu_pagereloading()" style="display:none;float: left;width:100%;color: #fff;background: #111d35;height:45px;line-height:45px;font-size: 14px;border-radius: 4px;">						<div style="float:left;width:48%;"><img style="float:right;margin-right:5px;margin-top:13px;width:18px;height:18px;" src="<?php echo base_url().'themes/default/images/global_ok.png'?>"/></div>						<div style="float:left;width:52%;text-align:left;">Logout</div>					</div>					<div class="btn_product_gray" id="btn_product_gray_1" style="display:none;text-align:center;float: left;width:100%;color: #000000;background: #CCCCCC;height:45px;line-height:45px;font-size: 14px;border-radius: 4px;">						OK					</div>				</div>				<div style="float: left;width:48%;margin-left:4%;">					<div class="btn_product_submit" id="btn_product_submit_2" onclick="tosubmitproduct_step5_2()" style="float: left;width:100%;color: #fff;text-align:center;background: #111d35;height:45px;line-height:45px;font-size: 14px;border-radius: 4px;">						Further Alteration					</div>					<div class="btn_product_loading" id="btn_product_loading_2" style="display:none;float: left;width:100%;color: #fff;background: #111d35;height:45px;line-height:45px;font-size: 14px;border-radius: 4px;">						<div style="float:left;width:48%;"><img style="float:right;margin-right:5px;margin-top:13px;width:18px;height:18px;" src="<?php echo base_url().'themes/default/images/ajax_loading.gif'?>"/></div>						<div style="float:left;width:52%;text-align:left;">Loading...</div>					</div>					<div class="btn_product_success" id="btn_product_success_2" onclick="xiangmu_pagereloading()" style="display:none;float: left;width:100%;color: #fff;background: #111d35;height:45px;line-height:45px;font-size: 14px;border-radius: 4px;">						<div style="float:left;width:48%;"><img style="float:right;margin-right:5px;margin-top:13px;width:18px;height:18px;" src="<?php echo base_url().'themes/default/images/global_ok.png'?>"/></div>						<div style="float:left;width:52%;text-align:left;">Logout</div>					</div>					<div class="btn_product_gray" id="btn_product_gray_2" style="display:none;text-align:center;float: left;width:100%;color: #000000;background: #CCCCCC;height:45px;line-height:45px;font-size: 14px;border-radius: 4px;">						Further Alteration					</div>				</div>			</div>			<div style="float: left;width:100%;margin-top:10px;font-size:18px;font-weight:bold;">				Alteration Center Phase 4				<?php 					//判断是第几次					$sql = "SELECT count(*) AS numcount FROM ".DB_PRE()."product_step4 WHERE product_id = ".$productinfo['product_id'].' AND isdel = 1';					$count_res = $this->db->query($sql)->row_array();					if(!empty($count_res)){						$count = $count_res['numcount'];					}else{						$count = 0;					}					if($count > 0){						echo ' ('.($count + 1).' times)';					}				?>			</div>			<div style="float: left;width:100%;margin-top:10px;">				<div style="float: left;width:100%;margin-top:10px;">					<div style="background:#EFEFEF;float:left;width:calc(100% - 2px);border:1px solid gray;height:40px;">						<div style="float:left;width:calc(100% - 40px);text-indent:10px;height:40px;line-height:40px;">							4.1 Alterations						</div>						<div style="float:left;width:40px;margin:10px 0px;height:20px;line-height:20px;color:green;">							Done						</div>					</div>					<div style="background:#EFEFEF;float:left;width:calc(100% - 2px);border:1px solid gray;height:40px;margin-top:6px;">						<div style="float:left;width:calc(100% - 40px);text-indent:10px;height:40px;line-height:40px;">							4.2 Quality Check						</div>						<div style="float:left;width:40px;margin:10px 0px;height:20px;line-height:20px;color:green;">							Done						</div>					</div>				</div>			</div>						<div style="float: left;width:100%;margin-top:10px;font-size:18px;font-weight:bold;">				Store Fitting Phase 3			</div>			<div style="float: left;width:100%;margin-top:10px;">				<div style="background:#EFEFEF;float:left;width:calc(100% - 2px);border:1px solid gray;height:40px;">					<div style="float:left;width:calc(100% - 40px);text-indent:10px;height:40px;line-height:40px;">	<!-- 						going into production -->						3.1 Store Fitting					</div>					<div style="float:left;width:40px;margin:10px 0px;height:20px;line-height:20px;color:green;">						Done					</div>				</div>			</div>											<div style="float: left;width:100%;margin-top:10px;font-size:18px;font-weight:bold;">			Alteration Center Phase 2		</div>		<div style="float: left;width:100%;margin-top:10px;">			<div style="background:#EFEFEF;float:left;width:calc(100% - 2px);border:1px solid gray;height:40px;">				<div style="float:left;width:calc(100% - 40px);text-indent:10px;height:40px;line-height:40px;"><!-- 						going into production -->					2.1 Measulement Check				</div>				<div style="float:left;width:40px;margin:10px 0px;height:20px;line-height:20px;color:green;">					Done				</div>			</div>		</div>		<div style="float: left;width:100%;margin-top:10px;font-size:18px;font-weight:bold;">				Factory Phase 1			</div>			<div style="float: left;width:100%;margin-top:10px;">				Customer Number: <?php echo $productinfo['step1_user_number']?>			</div>			<div style="float: left;width:100%;margin-top:10px;">				Date of cloth due: <?php echo $productinfo['step1_date_cloth_due']?>			</div>			<div style="float: left;width:100%;margin-top:10px;">				Date of cloth submitted: <?php echo $productinfo['step1_date_cloth_submitted']?>			</div>			<div style="float: left;width:100%;margin-top:10px;">				keyword tag			</div>			<div style="float: left;width:100%;margin-top:10px;">				<div style="background:#EFEFEF;float:left;width:calc(100% - 2px);border:1px solid gray;height:40px;">					<div style="float:left;width:calc(100% - 40px);text-indent:10px;height:40px;line-height:40px;"><!-- 						going into production -->						1.1 Start Production					</div>					<div style="float:left;width:40px;margin:10px 0px;height:20px;line-height:20px;color:green;">						Done					</div>				</div>				<div style="background:#EFEFEF;float:left;width:calc(100% - 2px);border:1px solid gray;height:40px;margin-top:6px;">					<div style="float:left;width:calc(100% - 40px);text-indent:10px;height:40px;line-height:40px;"><!-- 						completed production -->					1.2 Pickup Suit					</div>					<div style="float:left;width:40px;margin:10px 0px;height:20px;line-height:20px;color:green;">						Done					</div>				</div>				<div style="background:#EFEFEF;float:left;width:calc(100% - 2px);border:1px solid gray;height:40px;margin-top:6px;">					<div style="float:left;width:calc(100% - 40px);text-indent:10px;height:40px;line-height:40px;"><!-- 						going into alteration center -->					1.3 Quality Work					</div>					<div style="float:left;width:40px;margin:10px 0px;height:20px;line-height:20px;color:green;">						Done					</div>				</div>				<!-- 				<div style="background:#EFEFEF;float:left;width:calc(100% - 2px);border:1px solid gray;height:40px;margin-top:6px;">					<div style="float:left;width:calc(100% - 40px);text-indent:10px;height:40px;line-height:40px;">						coming out of alteration center					</div>					<div style="float:left;width:40px;margin:10px 0px;height:20px;line-height:20px;color:green;">						Done					</div>				</div>				 -->			</div>				</div></div><script type="text/javascript">function tosubmitproduct_step5(){	$('#btn_product_submit_1').hide();	$('#btn_product_loading_1').show();	$('#btn_product_success_1').hide();	//验证	var ispass = 1;	if(ispass == 1){		$.post(baseurl+'index.php/product/tosubmitproduct_step5/<?php echo $productinfo['product_id']?>', function (data){			$('#btn_product_submit_1').hide();			$('#btn_product_loading_1').hide();			$('#btn_product_success_1').show();			$('#btn_product_submit_2').hide();			$('#btn_product_gray_2').show();			//location.href = baseurl+"index.php/product/toactionstatus?product_id=<?php //echo $productinfo['product_id']?>&product_key=<?php //echo $productinfo['product_key']?>";		})	}else{		$('#btn_product_submit_1').show();		$('#btn_product_loading_1').hide();		$('#btn_product_success_1').hide();	}}function tosubmitproduct_step5_2(){	$('#btn_product_submit_2').hide();	$('#btn_product_loading_2').show();	$('#btn_product_success_2').hide();	//验证	var ispass = 1;	if(ispass == 1){		$.post(baseurl+'index.php/product/tosubmitproduct_step5_2/<?php echo $productinfo['product_id']?>', function (data){			$('#btn_product_submit_2').hide();			$('#btn_product_loading_2').hide();			$('#btn_product_success_2').show();			$('#btn_product_submit_1').hide();			$('#btn_product_gray_1').show();			//location.href = baseurl+"index.php/product/toactionstatus?product_id=<?php //echo $productinfo['product_id']?>&product_key=<?php //echo $productinfo['product_key']?>";		})	}else{		$('#btn_product_submit_1').show();		$('#btn_product_loading_1').hide();		$('#btn_product_success_1').hide();	}}</script><?php $this->load->view('default/qrcode_footer');?>