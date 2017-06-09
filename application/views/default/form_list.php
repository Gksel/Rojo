<?php $this->load->view('default/header');?>
<script type="text/javascript" src='<?php echo CDN_URL();?>themes/default/js/client_form.js?date=<?php echo CACHE_USETIME()?>'></script>
<div class="gksel_form">
	<table border="1" class="gksel_normal_tabpost">
		<tr class="table_title" style="font-weight:bold;">
			<td >Jacket 夹克</td>
			<td>Factory Garment成衣</td>
		</tr>
      <tr class="table_title">
         <td>Length夹克长</td>
         <td>
             <input name="jacket_length" type="text" value="" class="table_title">
    	<div class="tipsgroupbox"><div class="request"></div></div>
         </td>
      </tr>
      <tr class="table_title">
         <td>Shoulder 肩宽</td>
         <td><input type="text" class="table_title"></td>
      </tr>
      <tr class="table_title">
         <td>Chest 胸围</td>
         <td><input type="text" class="table_title"></td>
      </tr>
      <tr class="table_title">
         <td>Bust腰围</td>
         <td><input type="text" class="table_title"></td>
      </tr>
      <tr class="table_title">
         <td>Circumference臀围</td>
         <td><input type="text" class="table_title"></td>
      </tr>
      <tr class="table_title">
         <td>Sleeve袖长</td>
         <td><input type="text" class="table_title"></td>
      </tr>
      <tr class="table_title">
         <td>Bicep袖肥</td>
         <td><input type="text" class="table_title"></td>
      </tr>
      <tr class="table_title">
         <td>Wrist袖口</td>
         <td><input type="text" class="table_title"></td>
      </tr>
      <tr >
         <td colspan="2"></td>
         
      </tr>
      <tr class="table_title2" style="font-weight:bold;">
         <td>Shirt 衬衫</td>
         <td>Factory Garment 成衣</td>
      </tr>
      <tr class="table_title2">
         <td>Length衣长</td>
         <td><input type="text" class="table_title2"></td>
      </tr>
      <tr class="table_title2">
         <td>Shoulder 肩宽</td>
         <td><input type="text" class="table_title2"></td>
      </tr>
      <tr class="table_title2">
         <td>Chest 胸围</td>
         <td><input type="text" class="table_title2"></td>
      </tr>
      
      <tr class="table_title2">
         <td>Circumference臀围</td>
         <td><input type="text" class="table_title2"></td>
      </tr>
      <tr class="table_title2">
         <td>Sleeve袖长</td>
         <td><input type="text" class="table_title2"></td>
      </tr>
      <tr class="table_title2">
         <td>Bicep袖肥</td>
         <td><input type="text" class="table_title2"></td>
      </tr>
      <tr class="table_title2">
         <td>Wrist袖口</td>
         <td><input type="text" class="table_title2"></td>
      </tr>
      <tr class="table_title2">
         <td>Neck领围</td>
         <td><input type="text" class="table_title2"></td>
      </tr>
      <tr >
         <td colspan="2"></td>
        
      </tr>
      <tr class="table_title3" style="font-weight:bold;">
         <td>Trousers裤子</td>
         <td>Factory Garment 成衣</td>
      </tr>
      <tr class="table_title3">
         <td>Length裤长</td>
         <td><input type="text" class="table_title3"></td>
      </tr>
      <tr class="table_title3">
         <td>Waist腰围</td>
         <td><input type="text" class="table_title3"></td>
      </tr>
      <tr class="table_title3">
         <td>Gluteus裤臀围</td>
         <td><input type="text" class="table_title3"></td>
      </tr>
      <tr class="table_title3">
         <td>Thigh大腿</td>
         <td><input type="text" class="table_title3"></td>
      </tr>
      <tr class="table_title3">
         <td>Crotch rise值当</td>
         <td><input type="text" class="table_title3"></td>
      </tr>
      <tr class="table_title3">
         <td>Hamstring中档</td>
         <td><input type="text" class="table_title3"></td>
      </tr>
      <tr class="table_title3">
         <td>Calf小腿</td>
         <td><input type="text" class="table_title3"></td>
      </tr>
      <tr class="table_title3">
         <td>Ankle脚扣</td>
         <td><input type="text" class="table_title3"></td>
      </tr>
      <tr >
         <td colspan="2"></td>
         
      </tr>
      <tr class="table_title4" style="font-weight:bold;">
         <td>Waistcoat马夹</td>
         <td>Factory Garment成衣</td>
      </tr>
      <tr class="table_title4">
         <td>Length裤长</td>
         <td><input type="text" class="table_title4"></td>
      </tr>
      <tr class="table_title4">
         <td>Shoulder 肩宽</td>
         <td><input type="text" class="table_title4"></td>
      </tr>
      <tr class="table_title4">
         <td>Chest 胸围</td>
         <td><input type="text" class="table_title4"></td>
      </tr>
      <tr class="table_title4">
         <td>Bust腰围</td>
         <td><input type="text" class="table_title4"></td>
      </tr>
      <tr class="table_title4">
         <td>Circumference臀围</td>
         <td><input type="text" class="table_title4"></td>
      </tr>
    </table>
</div>
<div style="float:left;width:100%;margin-top:10px;">
	<input name="backurl" type="hidden" value="<?php echo $backurl?>"/>
	<input name="subbackurl" type="hidden" value="<?php echo $subbackurl?>"/>
	<div class="gksel_btn_action_on" onclick="toadd_forminfo(<?php echo $userinfo['uid']?>)"><?php echo lang('cy_save')?></div>
</div>	
<?php $this->load->view('default/footer');?>
