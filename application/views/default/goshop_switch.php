<?php $this->load->view('default/header');?>
<div class="gksel_goshop_switch">
 	<div class="gksel_goshop_switch_left">
 	    <img src="<?php echo base_url().'themes/default/images/goshop_switch.jpg'?>" class="Select_img"/>
 	    <img src="<?php echo base_url().'themes/default/images/goshop_switch2.jpg'?>"  class="Pabno_img"/>
 	</div>
 	<div class="gksel_goshop_switch_right">
 	   <div class="title">COAL BLACK ROJO</div>
 	   <div class="price">$600 USD</div>
 	   <div class="description">"A ROJO Clothing suit is not just another suit, it's yourarmour, your skin, something that will make you standout from the other suits - it's you!" - Rónan Kent</div>
 	   <div class="box Select">
<!--  	        Select -->
 	        <div class="btn"><img src="<?php echo base_url().'themes/default/images/goshop_switch_color.png'?>"/></div>
 	   </div>
 	   <div class="box Pabno">
<!--  	        Pabno -->
 	        <div class="btn"><img src="<?php echo base_url().'themes/default/images/goshop_switch_color2.png'?>"/></div>
 	   </div>
 	</div>
</div>
<?php $this->load->view('default/footer');?>
<script type='text/javascript'>

  $(".Select").click(function(){
	  $(".Select_img").css("display","block")
	   $(".Pabno_img").css("display","none")
	 
   })
  $(".Pabno").click(function(){
	  $(".Select_img").css("display","none")
	   $(".Pabno_img").css("display","block")
	 
   }) 
</script>