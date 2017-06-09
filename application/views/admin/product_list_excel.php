<?php 
	header('Content-Type: text/html; charset=utf-8');
	header("Pragma: public");
	header("Expires: 0");
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	header("Content-Type: application/force-download");
	header("Content-Type: application/octet-stream");
	header("Content-Type: application/download");
	header("Content-Disposition: attachment;filename=productlist_".date('Y-m-d').".xls ");
	header("Content-Transfer-Encoding: binary ");
	echo '<html xmlns:o="urn:schemas-microsoft-com:office:office"
		xmlns:x="urn:schemas-microsoft-com:office:excel"
		xmlns="http://www.w3.org/TR/REC-html40">
		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html>
		<head>
		<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
		<style id="Classeur1_16681_Styles"></style>
		<style type="text/css">
			.dddadfasfdads img{width:70px;height:70px;}
			.shulist{mso-style-parent:style0;color:windowtext;text-align:left;border:.5pt solid windowtext;mso-protection:unlocked visible;white-space:normal;mso-rotate:90;text-align:center;}
		</style>
		</head>
		<body>
		<div id="Classeur1_16681" align=center x:publishsource="Excel">
			<table x:str border=0 cellpadding=0 cellspacing=0 style="font-family: Calibri, Helvetica, SimSun, sans-serif;border-collapse: collapse;">
				';
				//选择数据--开始
				if(!empty($productlist)){for($i=0;$i<count($productlist);$i++){
					$product_id = $productlist[$i]['product_id'];
					if($product_id<10){
						$noooo = 'ROJOSH000'.$product_id;
					}else if($product_id<100){
						$noooo = 'ROJOSH00'.$product_id;
					}else if($product_id<1000){
						$noooo = 'ROJOSH0'.$product_id;
					}else{
						$noooo = 'ROJOSH'.$product_id;
					}
					echo '<tr>';
					echo '<td style="min-height:30px;border:.5pt solid windowtext;background:#EFEFEF;" align="left" class="xl2216681 nowrap">'.$noooo.'</td>';
					echo '<td style="min-height:30px;border:.5pt solid windowtext;background:#EFEFEF;" align="left" class="xl2216681 nowrap">'.base_url().'index.php/product/info?product_id='.$productlist[$i]['product_id'].'&product_key='.$productlist[$i]['product_key'].'</td>';
					
					echo '</tr>';
				}}
				//选择数据--结束
		echo '</table>
		</div>
		</body>
		</html>';
