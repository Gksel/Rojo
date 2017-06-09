<?php $this->load->view('admin/header')?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>RO/style.css">
<style type="text/css">
	*{padding:0;margin:0;}
</style>
<div class="title">
	<img src="<?php echo base_url()?>RO/RO/header.png">
</div>

		
<script type="text/javascript" src='<?php echo CDN_URL();?>themes/default/js/admin/admin_user.js?date=<?php echo CACHE_USETIME()?>'></script>
		

<table class="gksel_normal_tabpost" border="1">
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
			    	<input name="form_name" type="text" value="" style="outline:medium;width:10%">
			    	
			    	单号:
			    	<input name="form_number" type="text" value="" style="outline:medium;width:10%">
			    	取号:
			    	<input name="form_getno" type="text" value="" style="outline:medium;width:10%">
			    	
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
    <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
  </tr>
  <tr>
    <th>Jacket length<br>(Front)<br>夹克长(前边)</th>
    <td>
    	<input name="jacketlength_body" type="text" value="">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
    <td>
    	<input name="jacketlength_suit" type="text" value="">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
   <td>
    	<input name="jacketlength_shirt" type="text" value="">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
    <td>
    	<input name="jacketlength_vest" type="text" value="">
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
    	<input name="shoulderwidth_body" type="text" value="">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
    <td>
    	<input name="shoulderwidth_suit" type="text" value="">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
    <td>
    	<input name="shoulderwidth_shirt" type="text" value="">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
    <td>
    	<input name="shoulderwidth_vest" type="text" value="">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
    
  </tr>
  
  <tr>
    <th>Chest circumference<br>夹克胸围</th>
   <td>
    	<input name="chestcircumference_body" type="text" value="">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
    <td>
    	<input name="chestcircumference_suit" type="text" value="">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
    <td>
    	<input name="chestcircumference_shirt" type="text" value="">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
    <td>
    	<input name="chestcircumference_vest" type="text" value="">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
    
  </tr>
  
  <tr>
    <th>Stomach bust<br>夹克腰围</th>
     <td>
    	<input name="stomachbust_body" type="text" value=">">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
     <td>
    	<input name="stomachbust_suit" type="text" value="">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
     <td>
    	<input name="stomachbust_shirt" type="text" value="">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
     <td>
    	<input name="stomachbust_vest" type="text" value="">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
    
  </tr>
  
  <tr>
    <th>Jacket circumference<br>夹克臀围</th>
    <td>
    	<input name="jacketcircumference_body" type="text" value="">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
    <td>
    	<input name="jacketcircumference_suit" type="text" value="">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
    <td>
    	<input name="jacketcircumference_shirt" type="text" value="">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
    <td>
    	<input name="jacketcircumference_vest" type="text" value="">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
    
  </tr>
  
  <tr>
    <th>Sleeve length<br>夹克袖长</th>
   <td>
    	<input name="sleevelength_body" type="text" value="">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
    <td>
    	<input name="sleevelength_suit" type="text" value="">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
    <td>
    	<input name="sleevelength_shirt" type="text" value="">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
    <td>
    	<input name="sleevelength_vest" type="text" value="">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
    
  </tr>
  
  <tr>
    <th>Arm-Hole Loop<br>臂圈</th>
    <td>
    	<input name="armholeloop_body" type="text" value="">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
    <td>
    	<input name="armholeloop_suit" type="text" value="">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
    <td>
    	<input name="armholeloop_shirt" type="text" value="">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
    <td>
    	<input name="armholeloop_vest" type="text" value="">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
    
  </tr>
  
  <tr>
    <th>Bicep circumference<br>袖肥</th>
    <td>
    	<input name="bicepcircumference_body" type="text" value="">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
    <td>
    	<input name="bicepcircumference_suit" type="text" value="">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
    <td>
    	<input name="bicepcircumference_shirt" type="text" value="">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
    <td>
    	<input name="bicepcircumference_vest" type="text" value="">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
    
  </tr>
  <tr>
    <th>Wrist circumference<br>袖口</th>
    <td>
    	<input name="wristcircumference_body" type="text" value="">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
    <td>
    	<input name="wristcircumference_suit" type="text" value="">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
    <td>
    	<input name="wristcircumference_shirt" type="text" value="">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
    <td>
    	<input name="wristcircumference_vest" type="text" value="">
    	<div class="tipsgroupbox"><div class="request"></div></div>
    </td>
    
    
  </tr>
  <tr>
    <th>Neck circumference<br>领围</th>
    <td><input type="text"></td>
    <td><input type="text"></td>
    <td><input type="text"></td>
    <td><input type="text"></td>
    
    
  </tr>
  <tr>
    <th>Lower bordy<br>下身</th>
    <th>身体 </th>
    <th>西服</th>
  </tr>
  <tr>
    <th>Outside leg <br>length<br>裤子长</th>
    <td><input type="text"></td>
    <td><input type="text"></td>
  </tr>
  <tr>
    <th>Waist measurement<br>裤子腰围</th>
    <td><input type="text"></td>
    <td><input type="text"></td>
  </tr>
  <tr>
    <th>Arm-Hole Loop<br>臂圈</th>
    <td><input type="text"></td>
    <td><input type="text"></td>
  </tr>
  <tr>
     <th>Thigh circumference<br>大腿围</th>
    <td><input type="text"></td>
    <td><input type="text"></td>
  </tr>
  <tr>
     <th>Crotch rise<br>直裆长</th>
    <td><input type="text"></td>
    <td><input type="text"></td>
  </tr>
  <tr>
     <th>Hamstring circumference<br>中裆围</th>
    <td><input type="text"></td>
    <td><input type="text"></td>
  </tr>
  <tr>
    <th>Calf circumference<br>小腿围</th>
    <td><input type="text"></td>
    <td><input type="text"></td>
  </tr>
  <tr>
     <th>Ankle circumference<br>脚口围</th>
    <td><input type="text"></td>
    <td><input type="text"></td>
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
          <input type="radio" name="suitfitting_id" value="1" checked>
       </div>

       <div class="gksel_show_section">
         <p>Slim (合体)</p>
         <div><img src="<?php echo base_url()?>RO/RO/show2.jpg"></div>
          <input type="radio" name="suitfitting_id" value="2">
       </div>
   </div>
   <!-- 2 -->
  <div class="gksel_show_2">
       <div class="gksel_show_title">2. Lapels (驳头)</div>
       <div class="gksel_show_section" style="width:100%">
         <p><span>Notch (平驳头)</span><span>Notch slim (瘦平驳头)</span><span>Peak (枪驳头)</span><span>Peak Wide (宽枪驳头)</span><span>Shawl Collar (青稞领)</span></p>
         <div>
          <img src="<?php echo base_url()?>RO/RO/show3.jpg"></div>
          <input type="radio" name="min" style="margin-left:70px">
          <input type="radio" name="min" style="margin-left:170px">
          <input type="radio" name="min" style="margin-left:190px">
          <input type="radio" name="min" style="margin-left:190px">
          <input type="radio" name="min" style="margin-left:200px">
       </div>
   </div>

<!-- 3 -->
   <div class="gksel_show_2">
       <div class="gksel_show_title">3. Vents (叉)</div>
       <div class="gksel_show_section" style="width:100%">
         <p><span>None (无叉)</span><span style="margin-left:280px">One (单叉)</span><span style="margin-left:250px">Two (双叉)</span></p>
         <div>
          <img src="<?php echo base_url()?>RO/RO/show4.jpg"></div>
          <input type="radio" name="height" style="margin-left:80px">
          <input type="radio" name="height" style="margin-left:350px">
          <input type="radio" name="height" style="margin-left:330px">
         </div>
   </div>

<!-- 4 -->
   <div class="gksel_show_2" style="margin-bottom:60px;">
       <div class="gksel_show_title">4. Jacket buttons (夹克纽子)</div>
       <div class="gksel_show_section" style="width:100%">
         <p><span style="margin-left:80px">One</span><span style="margin-left:220px">Two</span><span style="margin-left:240px">Three</span><span style="margin-left:140px">Double breasted (双排扣)</span></p>
         <div>
          <img src="<?php echo base_url()?>RO/RO/show5.jpg"></div>
          <input type="radio" name="width" style="margin-left:80px">
          <input type="radio" name="width" style="margin-left:230px">
          <input type="radio" name="width" style="margin-left:250px">
          <input type="radio" name="width" style="margin-left:230px">
       </div>
   </div>
<!-- 5 -->
   <div class="gksel_show_2" style="margin-bottom:60px;">
       <div class="gksel_show_title">5. Jacket pockets（夹克口袋） </div>
       <div class="gksel_show_section" style="width:100%">
         <p><span style="margin-left:0px">Pocket flaps</span><span style="margin-left:80px">No pocket flaps</span><span style="margin-left:40px">Pocket flaps slanted</span><span style="margin-left:30px">No pocket flaps slanted</span><span style="margin-left:40px">Patch Pockets</span></p>
         <div>
          <img src="<?php echo base_url()?>RO/RO/show6.png"></div>
          <input type="radio" name="pockets" style="margin-left:50px">
          <input type="radio" name="pockets" style="margin-left:170px">
          <input type="radio" name="pockets" style="margin-left:200px">
          <input type="radio" name="pockets" style="margin-left:180px">
          <input type="radio" name="pockets" style="margin-left:190px">
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
          <input type="radio" name="Waistcoats" style="margin-left:85px">
          <input type="radio" name="Waistcoats" style="margin-left:190px">
          <input type="radio" name="Waistcoats" style="margin-left:200px">
          <input type="radio" name="Waistcoats" style="margin-left:190px">
          <input type="radio" name="Waistcoats" style="margin-left:200px">
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
          <input type="radio" name="Waistcoats_2" style="margin-left:65px">
          <input type="radio" name="Waistcoats_2" style="margin-left:160px">
          <input type="radio" name="Waistcoats_2" style="margin-left:160px">
          <input type="radio" name="Waistcoats_2" style="margin-left:160px">
          <input type="radio" name="Waistcoats_2" style="margin-left:160px">
          <input type="radio" name="Waistcoats_2" style="margin-left:140px">
       </div>
   </div>


      <!-- 8 -->
   <div class="gksel_show_2" style="margin-bottom:60px;">
       <div class="gksel_show_title">8. Collar types（ 领子 款式）</div>
       <div class="gksel_show_section" style="width:100%;overflow:hidden;">
       
         <div>
          <img src="<?php echo base_url()?>RO/RO/show8.jpg"></div>
          <input type="radio" name="type" style="margin-left:120px">
          <input type="radio" name="type" style="margin-left:230px">
          <input type="radio" name="type" style="margin-left:230px">
          <input type="radio" name="type" style="margin-left:230px">
       </div>
   </div>

   <!-- 8 -->
   <div class="gksel_show_2" style="margin-bottom:60px;">
       <div class="gksel_show_section" style="width:100%;overflow:hidden;">
         <p>


         </p>
         <div>
          <img src="<?php echo base_url()?>RO/RO/show8_2.jpg"></div>
          <input type="radio" name="type_2" style="margin-left:120px">
          <input type="radio" name="type_2" style="margin-left:230px">
          <input type="radio" name="type_2" style="margin-left:230px">
          <input type="radio" name="type_2" style="margin-left:230px">
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
          <input type="radio" name="Lapels" style="margin-left:85px">
          <input type="radio" name="Lapels" style="margin-left:340px">
          <input type="radio" name="Lapels" style="margin-left:305px">
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
          <input type="radio" name="Vents" style="margin-left:70px">
          <input type="radio" name="Vents" style="margin-left:330px">
          <input type="radio" name="Vents" style="margin-left:305px">
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
          <input type="radio" name="Breast" style="margin-left:70px">
          <input type="radio" name="Breast" style="margin-left:280px">
          <input type="radio" name="Breast" style="margin-left:280px">
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
          <input type="radio" name="Pocket" style="margin-left:70px">
          <input type="radio" name="Pocket" style="margin-left:160px">
          <input type="radio" name="Pocket" style="margin-left:180px">
          <input type="radio" name="Pocket" style="margin-left:180px">
          <input type="radio" name="Pocket" style="margin-left:180px">
       </div>
   </div>
<div style="float:left;width:100%;margin-top:10px;">
	<input name="backurl" type="hidden" value="<?php echo $backurl?>"/>
	<input name="subbackurl" type="hidden" value="<?php echo $subbackurl?>"/>
	<div class="gksel_btn_action_on" onclick="toadd_forminfo(<?php echo $userinfo['uid']?>)"><?php echo lang('cy_save')?></div>
</div>	
<?php $this->load->view('admin/footer')?>