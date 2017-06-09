<?php $this->load->view('admin/header')?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>RO/style.css">
<style type="text/css">
	*{padding:0;margin:0;}
	.Frame_Body{left:270px}
</style>
<div class="title">
	<img src="<?php echo base_url()?>RO/RO/header.png">
</div>

		
<script type="text/javascript" src='<?php echo CDN_URL();?>themes/default/js/admin/admin_user.js?date=<?php echo CACHE_USETIME()?>'></script>
		


<table class="gksel_normal_tabpost" border="1" >
	<tr>
		<td colspan="8">
			<table style="width:400px;">
			  <tr style="">
			    <th class="table_merge"><div style="text-align:center"></div></th>
			  </tr>
			  <tr style="margin:20px;display:block;width:1000px;">
			    <th class="table_merge" style="width:100%;display:block;">
			    <div style="width:100%">
			    	Name: 
			    	<input name="form_name" type="text" value="<?php echo $forminfo['form_name']?>" style="outline:medium;width:10%">
			    	
			    	单号:
			    	<input name="form_number" type="text" value="<?php echo $forminfo['form_number']?>" style="outline:medium;width:10%">
			    	取号:
			    	<input name="form_getno" type="text" value="<?php echo $forminfo['form_getno']?>" style="outline:medium;width:10%">
			    	
			    	</div>
			    </th>
			  </tr>
			</table>
		</td>
	</tr>
  <tr>
    <th>Upper bordy<br>上身</th>
    <th>身体</th>
    <th>西服</th>
    <th>衬衫</th>
    <th>马甲</th>
    <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
  </tr>
  <tr>
    <th>Jacket length<br>(Front)<br>夹克长(前边)</th>
    <td>
    	<input name="jacketlength_body" type="text" value="<?php echo $forminfo['jacketlength_body']?>">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
    <td>
    	<input name="jacketlength_suit" type="text" value="<?php echo $forminfo['jacketlength_suit']?>">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
   <td>
    	<input name="jacketlength_shirt" type="text" value="<?php echo $forminfo['jacketlength_shirt']?>">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
    <td>
    	<input name="jacketlength_vest" type="text" value="<?php echo $forminfo['jacketlength_vest']?>">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
    
  </tr>
  
  <tr>
    <th><p>Shoulder width</p>
	    <p> 肩宽 
	        <input type="radio" name="width" style="margin-left:30px">斜
            <input type="radio" name="width" style="margin-left:30px">平
            <input type="radio" name="width" style="margin-left:30px">冲
	    </p>
	</th>
    <td>
    	<input name="shoulderwidth_body" type="text" value="<?php echo $forminfo['shoulderwidth_body']?>">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
    <td>
    	<input name="shoulderwidth_suit" type="text" value="<?php echo $forminfo['shoulderwidth_suit']?>">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
    <td>
    	<input name="shoulderwidth_shirt" type="text" value="<?php echo $forminfo['shoulderwidth_shirt']?>">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
    <td>
    	<input name="shoulderwidth_vest" type="text" value="<?php echo $forminfo['shoulderwidth_vest']?>">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
    
  </tr>
  
  <tr>
    <th>Chest circumference<br>夹克胸围</th>
   <td>
    	<input name="chestcircumference_body" type="text" value="<?php echo $forminfo['chestcircumference_body']?>">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
    <td>
    	<input name="chestcircumference_suit" type="text" value="<?php echo $forminfo['chestcircumference_suit']?>">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
    <td>
    	<input name="chestcircumference_shirt" type="text" value="<?php echo $forminfo['chestcircumference_shirt']?>">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
    <td>
    	<input name="chestcircumference_vest" type="text" value="<?php echo $forminfo['chestcircumference_vest']?>">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
    
  </tr>
  
  <tr>
    <th>Stomach bust<br>夹克腰围</th>
     <td>
    	<input name="stomachbust_body" type="text" value="<?php echo $forminfo['stomachbust_body']?>">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
     <td>
    	<input name="stomachbust_suit" type="text" value="<?php echo $forminfo['stomachbust_suit']?>">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
     <td>
    	<input name="stomachbust_shirt" type="text" value="<?php echo $forminfo['stomachbust_shirt']?>">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
     <td>
    	<input name="stomachbust_vest" type="text" value="<?php echo $forminfo['stomachbust_vest']?>">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
    
  </tr>
  
  <tr>
    <th>Jacket circumference<br>夹克臀围</th>
    <td>
    	<input name="jacketcircumference_body" type="text" value="<?php echo $forminfo['jacketcircumference_body']?>">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
    <td>
    	<input name="jacketcircumference_suit" type="text" value="<?php echo $forminfo['jacketcircumference_suit']?>">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
    <td>
    	<input name="jacketcircumference_shirt" type="text" value="<?php echo $forminfo['jacketcircumference_shirt']?>">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
    <td>
    	<input name="jacketcircumference_vest" type="text" value="<?php echo $forminfo['jacketcircumference_vest']?>">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
    
  </tr>
  
  <tr>
    <th>Sleeve length<br>夹克袖长</th>
   <td>
    	<input name="sleevelength_body" type="text" value="<?php echo $forminfo['sleevelength_body']?>">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
    <td>
    	<input name="sleevelength_suit" type="text" value="<?php echo $forminfo['sleevelength_suit']?>">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
    <td>
    	<input name="sleevelength_shirt" type="text" value="<?php echo $forminfo['sleevelength_shirt']?>">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
    <td>
    	<input name="sleevelength_vest" type="text" value="<?php echo $forminfo['sleevelength_vest']?>">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
    
  </tr>
  
  <tr>
    <th>Arm-Hole Loop<br>臂圈</th>
    <td>
    	<input name="armholeloop_body" type="text" value="<?php echo $forminfo['armholeloop_body']?>">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
    <td>
    	<input name="armholeloop_suit" type="text" value="<?php echo $forminfo['armholeloop_suit']?>">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
    <td>
    	<input name="armholeloop_shirt" type="text" value="<?php echo $forminfo['armholeloop_shirt']?>">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
    <td>
    	<input name="armholeloop_vest" type="text" value="<?php echo $forminfo['armholeloop_vest']?>">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
    
  </tr>
  
  <tr>
    <th>Bicep circumference<br>袖肥</th>
    <td>
    	<input name="bicepcircumference_body" type="text" value="<?php echo $forminfo['bicepcircumference_body']?>">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
    <td>
    	<input name="bicepcircumference_suit" type="text" value="<?php echo $forminfo['bicepcircumference_suit']?>">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
    <td>
    	<input name="bicepcircumference_shirt" type="text" value="<?php echo $forminfo['bicepcircumference_shirt']?>">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
    <td>
    	<input name="bicepcircumference_vest" type="text" value="<?php echo $forminfo['bicepcircumference_vest']?>">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
    
  </tr>
  <tr>
    <th>Wrist circumference<br>袖口</th>
   <td>
    	<input name="wristcircumference_body" type="text" value="<?php echo $forminfo['wristcircumference_body']?>">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
    <td>
    	<input name="wristcircumference_suit" type="text" value="<?php echo $forminfo['wristcircumference_suit']?>">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
    <td>
    	<input name="wristcircumference_shirt" type="text" value="<?php echo $forminfo['wristcircumference_shirt']?>">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
    <td>
    	<input name="wristcircumference_vest" type="text" value="<?php echo $forminfo['wristcircumference_vest']?>">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
    
    
  </tr>
  <tr>
    <th>Neck circumference<br>领围</th>
    <td>
    	<input name="neckcircumference_body" type="text" value="<?php echo $forminfo['neckcircumference_body']?>">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
    <td>
    	<input name="neckcircumference_suit" type="text" value="<?php echo $forminfo['neckcircumference_suit']?>">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
    <td>
    	<input name="neckcircumference_shirt" type="text" value="<?php echo $forminfo['neckcircumference_shirt']?>">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
    <td>
    	<input name="neckcircumference_vest" type="text" value="<?php echo $forminfo['neckcircumference_vest']?>">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
    
    
  </tr>
  <tr>
    <th>Lower bordy<br>下身</th>
    <th>身体 </th>
    <th>西服</th>
  </tr>
  <tr>
    <th>Outside leg <br>length<br>裤子长</th>
    <td>
    	<input name="outsideleglength_body" type="text" value="<?php echo $forminfo['outsideleglength_body']?>">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
    <td>
    	<input name="outsideleglength_suit" type="text" value="<?php echo $forminfo['outsideleglength_suit']?>">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
  </tr>
  <tr>
    <th>Waist measurement<br>裤子腰围</th>
    <td>
    	<input name="waistmeasurement_body" type="text" value="<?php echo $forminfo['waistmeasurement_body']?>">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
    <td>
    	<input name="waistmeasurement_suit" type="text" value="<?php echo $forminfo['waistmeasurement_suit']?>">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
  </tr>
  <tr>
    <th>Arm-Hole Loop<br>臂圈</th>
    <td>
    	<input name="gluteuscircumference_body" type="text" value="<?php echo $forminfo['gluteuscircumference_body']?>">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
    <td>
    	<input name="gluteuscircumference_suit" type="text" value="<?php echo $forminfo['gluteuscircumference_suit']?>">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
  </tr>
  <tr>
     <th>Thigh circumference<br>大腿围</th>
    <td>
    	<input name="thighcircumference_body" type="text" value="<?php echo $forminfo['thighcircumference_body']?>">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
    <td>
    	<input name="thighcircumference_suit" type="text" value="<?php echo $forminfo['thighcircumference_suit']?>">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
  </tr>
  <tr>
     <th>Crotch rise<br>直裆长</th>
    <td>
    	<input name="crotchrise_body" type="text" value="<?php echo $forminfo['crotchrise_body']?>">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
    <td>
    	<input name="crotchrise_suit" type="text" value="<?php echo $forminfo['crotchrise_suit']?>">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
  </tr>
  <tr>
     <th>Hamstring circumference<br>中裆围</th>
    <td>
    	<input name="hamstringcircumference_body" type="text" value="<?php echo $forminfo['hamstringcircumference_body']?>">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
    <td>
    	<input name="hamstringcircumference_suit" type="text" value="<?php echo $forminfo['hamstringcircumference_suit']?>">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
  </tr>
  <tr>
    <th>Calf circumference<br>小腿围</th>
    <td>
    	<input name="calfcircumference_body" type="text" value="<?php echo $forminfo['calfcircumference_body']?>">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
    <td>
    	<input name="calfcircumference_suit" type="text" value="<?php echo $forminfo['calfcircumference_suit']?>">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
  </tr>
  <tr>
     <th>Ankle circumference<br>脚口围</th>
    <td>
    	<input name="anklecircumference_body" type="text" value="<?php echo $forminfo['anklecircumference_body']?>">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
    <td>
    	<input name="anklecircumference_suit" type="text" value="<?php echo $forminfo['anklecircumference_suit']?>">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
  </tr>
  <tr>
     <td colspan="3" class="table_merge">
        <div>&nbsp;&nbsp;西装料号:<input type="text">
        </div>
        <div>&nbsp;&nbsp;裤子料号:<input type="text">
        </div>
    </td>
  </tr>
  <tr>
    <td colspan="3" class="table_merge"><div>&nbsp;&nbsp;衬衫料号:<input type="text"></div></td>
  </tr>
</table>

	
	
	
	
	
	
	
	
	
	
	
	
	
	
<!-- 1 -->
 <div class="gksel_show">
   	   <div class="gksel_show_title">1. Suit fitting</div>
       <div class="gksel_show_section">
         <p>Slim (合体)</p>
         <div><img src="<?php echo base_url()?>RO/RO/show1.jpg"></div>
          <input type="radio" name="suitfitting_id" value="1" <?php if($forminfo['suitfitting_id'] == 0 || $forminfo['suitfitting_id'] == 1){echo 'checked';}?>>
       </div>

       <div class="gksel_show_section">
         <p>Slim (合体)</p>
         <div><img src="<?php echo base_url()?>RO/RO/show2.jpg"></div>
          <input type="radio" name="suitfitting_id" value="2"  <?php if($forminfo['suitfitting_id'] == 2){echo 'checked';}?>>
       </div>
   </div>
   <!-- 2 -->
  <div class="gksel_show_2">
       <div class="gksel_show_title">2. Lapels (驳头)</div>
       <div class="gksel_show_section" style="width:100%">
         <p><span>Notch (平驳头)</span><span>Notch slim (瘦平驳头)</span><span>Peak (枪驳头)</span><span>Peak Wide (宽枪驳头)</span><span>Shawl Collar (青稞领)</span></p>
         <div>
          <img src="<?php echo base_url()?>RO/RO/show3.jpg"></div>
          <input type="radio" name="lapels_id" style="margin-left:70px" value="1" <?php if($forminfo['lapels_id'] == 0 || $forminfo['lapels_id'] == 1 || $forminfo['lapels_id'] == 2 || $forminfo['lapels_id'] == 3 || $forminfo['lapels_id'] == 4 || $forminfo['lapels_id'] == 5 ){echo 'checked';}?>>
          <input type="radio" name="lapels_id" style="margin-left:170px" value="2" <?php if($forminfo['lapels_id'] == 2){echo 'checked';}?>>
          <input type="radio" name="lapels_id" style="margin-left:190px" value="3" <?php if($forminfo['lapels_id'] == 3){echo 'checked';}?>>
          <input type="radio" name="lapels_id" style="margin-left:190px" value="4"  <?php if($forminfo['lapels_id'] == 4){echo 'checked';}?>>
          <input type="radio" name="lapels_id" style="margin-left:200px" value="5"  <?php if($forminfo['lapels_id'] == 5){echo 'checked';}?>>
       </div>
   </div>

<!-- 3 -->
   <div class="gksel_show_2">
       <div class="gksel_show_title">3. Vents (叉)</div>
       <div class="gksel_show_section" style="width:100%">
         <p><span>None (无叉)</span><span style="margin-left:280px">One (单叉)</span><span style="margin-left:250px">Two (双叉)</span></p>
         <div>
          <img src="<?php echo base_url()?>RO/RO/show4.jpg"></div>
          <input type="radio" name="vents_id" style="margin-left:80px" value="1" <?php if($forminfo['vents_id'] == 0 || $forminfo['vents_id'] == 1 || $forminfo['vents_id'] == 2 || $forminfo['vents_id'] == 3  ){echo 'checked';}?>>
          <input type="radio" name="vents_id" style="margin-left:350px" value="2" <?php if($forminfo['vents_id'] == 2){echo 'checked';}?>>
          <input type="radio" name="vents_id" style="margin-left:330px" value="3" <?php if($forminfo['vents_id'] == 3){echo 'checked';}?>>
         </div>
   </div>

<!-- 4 -->
   <div class="gksel_show_2" style="margin-bottom:60px;">
       <div class="gksel_show_title">4. Jacket buttons (夹克纽子)</div>
       <div class="gksel_show_section" style="width:100%">
         <p><span style="margin-left:80px">One</span><span style="margin-left:220px">Two</span><span style="margin-left:240px">Three</span><span style="margin-left:140px">Double breasted (双排扣)</span></p>
         <div>
          <img src="<?php echo base_url()?>RO/RO/show5.jpg"></div>
          <input type="radio" name="jacketbuttons_id" style="margin-left:80px" value="1" <?php if($forminfo['jacketbuttons_id'] == 0 || $forminfo['jacketbuttons_id'] == 1 || $forminfo['jacketbuttons_id'] == 2 || $forminfo['jacketbuttons_id'] == 3 || $forminfo['jacketbuttons_id'] == 4 ){echo 'checked';}?>>
          <input type="radio" name="jacketbuttons_id" style="margin-left:230px" value="2" <?php if($forminfo['jacketbuttons_id'] == 2){echo 'checked';}?>>
          <input type="radio" name="jacketbuttons_id" style="margin-left:250px" value="3" <?php if($forminfo['jacketbuttons_id'] == 3){echo 'checked';}?>>
          <input type="radio" name="jacketbuttons_id" style="margin-left:230px" value="4" <?php if($forminfo['jacketbuttons_id'] == 4){echo 'checked';}?>>
       </div>
   </div>
<!-- 5 -->
   <div class="gksel_show_2" style="margin-bottom:60px;">
       <div class="gksel_show_title">5. Jacket pockets（夹克口袋） </div>
       <div class="gksel_show_section" style="width:100%">
         <p><span style="margin-left:0px">Pocket flaps</span><span style="margin-left:80px">No pocket flaps</span><span style="margin-left:40px">Pocket flaps slanted</span><span style="margin-left:30px">No pocket flaps slanted</span><span style="margin-left:40px">Patch Pockets</span></p>
         <div>
          <img src="<?php echo base_url()?>RO/RO/show6.png"></div>
          <input type="radio" name="jacketpockets_id" style="margin-left:50px" value="1" <?php if($forminfo['jacketpockets_id'] == 0 || $forminfo['jacketpockets_id'] == 1 || $forminfo['jacketpockets_id'] == 2 || $forminfo['jacketpockets_id'] == 3 || $forminfo['jacketpockets_id'] == 4 || $forminfo['jacketpockets_id'] == 5 ){echo 'checked';}?>>
          <input type="radio" name="jacketpockets_id" style="margin-left:170px" value="2" <?php if($forminfo['jacketpockets_id'] == 2){echo 'checked';}?>>
          <input type="radio" name="jacketpockets_id" style="margin-left:200px" value="3" <?php if($forminfo['jacketpockets_id'] == 3){echo 'checked';}?>>
          <input type="radio" name="jacketpockets_id" style="margin-left:180px" value="4" <?php if($forminfo['jacketpockets_id'] == 4){echo 'checked';}?>>
          <input type="radio" name="jacketpockets_id" style="margin-left:190px" value="5" <?php if($forminfo['jacketpockets_id'] == 5){echo 'checked';}?>>
       </div>
   </div>

   <!-- 7 -->
   <div class="gksel_show_2" style="margin-bottom:60px;">
       <div class="gksel_show_title">7.  Waistcoats（马夹 款式）</div>
       <div class="gksel_show_section" style="width:100%;overflow:hidden;">
         <p>
         	<span style="margin-left:10px;display:block;float:left;">Single breast4buttons<br>单扣排扣4个扣子</span>
         	<span style="margin-left:40px;display:block;float:left;">Single breast5buttons<br>单扣排扣5个扣子</span>
         	<span style="margin-left:30px;display:block;float:left;">Single breast6buttons<br>单扣排扣6个扣子</span>
         	<span style="margin-left:30px;display:block;float:left;">Double breast2buttons<br>双排扣2个扣子</span>
         	<span style="margin-left:30px;display:block;float:left;">Double breast3buttons<br>双排扣3个扣子</span>
         </p>
         <div>
          <img src="<?php echo base_url()?>RO/RO/show7.png"></div>
          <input type="radio" name="waistcoats_id" style="margin-left:85px" value="1" <?php if($forminfo['waistcoats_id'] == 0 || $forminfo['waistcoats_id'] == 1 || $forminfo['waistcoats_id'] == 2 || $forminfo['waistcoats_id'] == 3 || $forminfo['waistcoats_id'] == 4 || $forminfo['waistcoats_id'] == 5 ){echo 'checked';}?>>
          <input type="radio" name="waistcoats_id" style="margin-left:190px" value="2" <?php if($forminfo['waistcoats_id'] == 2){echo 'checked';}?>>
          <input type="radio" name="waistcoats_id" style="margin-left:200px" value="3" <?php if($forminfo['waistcoats_id'] == 3){echo 'checked';}?>>
          <input type="radio" name="waistcoats_id" style="margin-left:190px" value="4" <?php if($forminfo['waistcoats_id'] == 4){echo 'checked';}?>>
          <input type="radio" name="waistcoats_id" style="margin-left:200px" value="5" <?php if($forminfo['waistcoats_id'] == 5){echo 'checked';}?>>
       </div>
   </div>

   <!-- 7 -->
   <div class="gksel_show_2" style="margin-bottom:60px;">
       <div class="gksel_show_section" style="width:100%;overflow:hidden;">
         <p>
         	<span style="margin-left:50px;display:block;float:left;">No lapel<br>无领子</span>
         	<span style="margin-left:100px;display:block;float:left;">No lapel loop<br>无领子低</span>
         	<span style="margin-left:60px;display:block;float:left;">Shawl lapel<br>青稞领</span>
         	<span style="margin-left:90px;display:block;float:left;">Notch lapel <br>平驳领</span>
         	<span style="margin-left:60px;display:block;float:left;">Peak lapel<br>抢驳领</span>
         	<span style="margin-left:80px;display:block;float:left;">Satin lapel<br>色丁领</span>
         </p>
         <div>
          <img src="<?php echo base_url()?>RO/RO/show7_2.png"></div>
          <input type="radio" name="waistcoats_id" style="margin-left:65px" value="6" <?php if($forminfo['waistcoats_id'] == 6){echo 'checked';}?>>
          <input type="radio" name="waistcoats_id" style="margin-left:160px" value="7" <?php if($forminfo['waistcoats_id'] == 7){echo 'checked';}?>>
          <input type="radio" name="waistcoats_id" style="margin-left:160px" value="8" <?php if($forminfo['waistcoats_id'] == 8){echo 'checked';}?>>
          <input type="radio" name="waistcoats_id" style="margin-left:160px" value="9" <?php if($forminfo['waistcoats_id'] == 9){echo 'checked';}?>>
          <input type="radio" name="waistcoats_id" style="margin-left:160px" value="10" <?php if($forminfo['waistcoats_id'] == 10){echo 'checked';}?>>
          <input type="radio" name="waistcoats_id" style="margin-left:140px" value="11" <?php if($forminfo['waistcoats_id'] == 11){echo 'checked';}?>>
       </div>
   </div>


      <!-- 8 -->
   <div class="gksel_show_2" style="margin-bottom:60px;">
       <div class="gksel_show_title">8. Collar types（ 领子 款式）</div>
       <div class="gksel_show_section" style="width:100%;overflow:hidden;">
       
         <div>
          <img src="<?php echo base_url()?>RO/RO/show8.jpg"></div>
          <input type="radio" name="collartypes_id" style="margin-left:120px" value="1" <?php if($forminfo['collartypes_id'] == 0 || $forminfo['collartypes_id'] == 1 || $forminfo['collartypes_id'] == 2 || $forminfo['collartypes_id'] == 3 || $forminfo['collartypes_id'] == 4 || $forminfo['collartypes_id'] == 5 ){echo 'checked';}?>>
          <input type="radio" name="collartypes_id" style="margin-left:230px" value="2" <?php if($forminfo['collartypes_id'] == 2){echo 'checked';}?>>
          <input type="radio" name="collartypes_id" style="margin-left:230px" value="3" <?php if($forminfo['collartypes_id'] == 3){echo 'checked';}?>>
          <input type="radio" name="collartypes_id" style="margin-left:230px" value="4" <?php if($forminfo['collartypes_id'] == 4){echo 'checked';}?>>
       </div>
   </div>

   <!-- 8 -->
   <div class="gksel_show_2" style="margin-bottom:60px;">
       <div class="gksel_show_section" style="width:100%;overflow:hidden;">
         <p>


         </p>
         <div>
          <img src="<?php echo base_url()?>RO/RO/show8_2.jpg"></div>
          <input type="radio" name="collartypes_id" style="margin-left:120px" value="5" <?php if($forminfo['collartypes_id'] == 5){echo 'checked';}?>>
          <input type="radio" name="collartypes_id" style="margin-left:230px" value="6" <?php if($forminfo['collartypes_id'] == 6){echo 'checked';}?>>
          <input type="radio" name="collartypes_id" style="margin-left:230px" value="7" <?php if($forminfo['collartypes_id'] == 7){echo 'checked';}?>>
          <input type="radio" name="collartypes_id" style="margin-left:230px" value="8" <?php if($forminfo['collartypes_id'] == 8){echo 'checked';}?>>
       </div>
   </div>

<!-- 9.1 -->
   <div class="gksel_show_2" style="margin-bottom:-40px;">
   	<div class="gksel_show_title">9.Overcoats （ 大衣 款式）</div>

   </div>
   <div class="gksel_show_2" style="margin-bottom:60px;">
       <div class="gksel_show_title" style="margin-left:50px;margin-top:15px;">1.Lapels 领子</div>
       <div class="gksel_show_section" style="width:100%;overflow:hidden;">
         <p>
         	<span style="margin-left:20px;display:block;float:left;">Notch Wide(宽平驳领)</span>
         	<span style="margin-left:190px;display:block;float:left;"> Peak(抢驳领)</span>
         	<span style="margin-left:170px;display:block;float:left;"> Peak Wide(宽抢驳领)</span>
         </p>
         <div>
          <img src="<?php echo base_url()?>RO/RO/show9.png"></div>
          <input type="radio" name="overcoats_lapels_id" style="margin-left:85px" value="1" <?php if($forminfo['overcoats_lapels_id'] == 0 || $forminfo['overcoats_lapels_id'] == 1 || $forminfo['overcoats_lapels_id'] == 2 || $forminfo['overcoats_lapels_id'] == 3 ){echo 'checked';}?>>
          <input type="radio" name="overcoats_lapels_id" style="margin-left:340px" value="2" <?php if($forminfo['overcoats_lapels_id'] == 2){echo 'checked';}?>>
          <input type="radio" name="overcoats_lapels_id" style="margin-left:305px" value="3" <?php if($forminfo['overcoats_lapels_id'] == 3){echo 'checked';}?>>
       </div>
   </div>

   <!-- 9.2 -->
    <div class="gksel_show_2" style="margin-bottom:60px;">
       <div class="gksel_show_title" style="margin-left:50px">2.Vents 大衣叉</div>
       <div class="gksel_show_section" style="width:100%;overflow:hidden;">
         <p>
         	<span style="margin-left:20px;display:block;float:left;">No Vent 无叉 </span>
         	<span style="margin-left:250px;display:block;float:left;">Single 单叉</span>
         	<span style="margin-left:200px;display:block;float:left;">Peak Wide(宽抢驳领)</span>
         </p>
         <div>
          <img src="<?php echo base_url()?>RO/RO/show9_2.png"></div>
          <input type="radio" name="overcoats_vents_id" style="margin-left:70px" value="1" <?php if($forminfo['overcoats_vents_id'] == 0 || $forminfo['overcoats_vents_id'] == 1 || $forminfo['overcoats_vents_id'] == 2 || $forminfo['overcoats_vents_id'] == 3 ){echo 'checked';}?>>
          <input type="radio" name="overcoats_vents_id" style="margin-left:330px" value="2" <?php if($forminfo['overcoats_vents_id'] == 2){echo 'checked';}?>>
          <input type="radio" name="overcoats_vents_id" style="margin-left:305px" value="3" <?php if($forminfo['overcoats_vents_id'] == 3){echo 'checked';}?>>
       </div>
   </div>
   <!-- 9.3 -->
    <div class="gksel_show_2" style="margin-bottom:60px;">
       <div class="gksel_show_title" style="margin-left:50px">3.Breast & Buttons( 排扣和扣子)</div>
       <div class="gksel_show_section" style="width:100%;overflow:hidden;">
         <p>
         	<span style="margin-left:10px;display:block;float:left;">2 Button(2扣子)</span>
         	<span style="margin-left:170px;display:block;float:left;">2.5Button(2.5扣子)</span>
         	<span style="margin-left:120px;display:block;float:left;">2ButtonDB 2扣子双排扣</span>
         </p>
         <div>
          <img src="<?php echo base_url()?>RO/RO/show9_3.png"></div>
          <input type="radio" name="overcoats_breastbuttons_id" style="margin-left:70px" value="1" <?php if($forminfo['overcoats_breastbuttons_id'] == 0 || $forminfo['overcoats_breastbuttons_id'] == 1 || $forminfo['overcoats_breastbuttons_id'] == 2 || $forminfo['overcoats_breastbuttons_id'] == 3){echo 'checked';}?>>
          <input type="radio" name="overcoats_breastbuttons_id" style="margin-left:280px" value="2" <?php if($forminfo['overcoats_breastbuttons_id'] == 2){echo 'checked';}?>>
          <input type="radio" name="overcoats_breastbuttons_id" style="margin-left:280px" value="3" <?php if($forminfo['overcoats_breastbuttons_id'] == 3){echo 'checked';}?>>
       </div>
   </div>

   <!-- 9.4 -->
    <div class="gksel_show_2" style="margin-bottom:60px;">
       <div class="gksel_show_title" style="margin-left:50px">4.Pockets(口袋)</div>
       <div class="gksel_show_section" style="width:100%;overflow:hidden;">
         <p>
         	<span style="margin-left:10px;display:block;float:left;">No Pockets(没口袋)</span>
         	<span style="margin-left:40px;display:block;float:left;">Normal( 大盖) </span>
         	<span style="margin-left:40px;display:block;float:left;">Normal&Ticket(经常和腰袋)</span>
         	<span style="margin-left:20px;display:block;float:left;">Side 旁边口袋</span>
         	<span style="margin-left:40px;display:block;float:left;">No pocket(无盖和腰袋)</span>
         </p>
         <div>
          <img src="<?php echo base_url()?>RO/RO/show9_4.png"></div>
          <input type="radio" name="overcoats_pockets_id" style="margin-left:70px">
          <input type="radio" name="overcoats_pockets_id" style="margin-left:160px" value="1" <?php if($forminfo['overcoats_pockets_id'] == 0 || $forminfo['overcoats_pockets_id'] == 1 || $forminfo['overcoats_pockets_id'] == 2 || $forminfo['overcoats_pockets_id'] == 3 || $forminfo['overcoats_pockets_id'] == 4 ){echo 'checked';}?>>
          <input type="radio" name="overcoats_pockets_id" style="margin-left:180px" value="2" <?php if($forminfo['overcoats_pockets_id'] == 2){echo 'checked';}?>>
          <input type="radio" name="overcoats_pockets_id" style="margin-left:180px" value="3" <?php if($forminfo['overcoats_pockets_id'] == 3){echo 'checked';}?>>
          <input type="radio" name="overcoats_pockets_id" style="margin-left:180px" value="4" <?php if($forminfo['overcoats_pockets_id'] == 4){echo 'checked';}?>>
       </div>
   </div>
<div style="float:left;width:100%;margin-top:10px;">
	<input name="backurl" type="hidden" value="<?php echo $backurl?>"/>
	<input name="subbackurl" type="hidden" value="<?php echo $subbackurl?>"/>
	<div class="gksel_btn_action_on" onclick="toedit_forminfo(<?php echo $userinfo['uid']?>, <?php echo $forminfo['form_id']?>)"><?php echo lang('cy_save')?></div>
</div>	
<?php $this->load->view('admin/footer')?>