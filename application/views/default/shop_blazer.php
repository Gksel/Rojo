<?php $this->load->view('default/header');?>
<?php 
	$bannerlist = array();
	$bannerlist[] = array('banner_pic'=>'themes/default/images/banner_shop.png');
	$bannerlist[] = array('banner_pic'=>'themes/default/images/banner_shop.png');
	$bannerlist[] = array('banner_pic'=>'themes/default/images/banner_shop.png');
	$data['bannerlist'] =  $bannerlist;
	$this->load->view('default/common_banner', $data);
?>




<div class="gksel_shop">
      <div class="gksel_shop_left">
         <div class="color">
              <div class="title">Color</div>
              <div class="section">
                  <p>Black</p>
                  <p>Grey</p>
                  <p>Navy</p>
                  <p>Navy</p>
              </div>
         </div>
         <div class="composition">Composition</div>
         <div class="weight">Weight</div>
      </div>
      <div class="gksel_shop_right">
          <?php $this->load->view('default/shop_header');?>
          <div class="gksel_shop_right_image">
             <a href="<?php echo base_url()?>index.php/shop/goshop"><img src="<?php echo base_url().'themes/default/images/shop_suit1.jpg'?>"/></a>
             <a href="<?php echo base_url()?>index.php/shop/goshop"><img src="<?php echo base_url().'themes/default/images/shop_suit3.jpg'?>"/></a>
             <a href="<?php echo base_url()?>index.php/shop/goshop"><img src="<?php echo base_url().'themes/default/images/shop_suit2.jpg'?>"/></a>
          </div>
      </div>
</div>
<?php $this->load->view('default/footer');?>
<script>
$(function(){
	  $(".gksel_shop_left>.color>.title").click(function(){
   if($(".gksel_shop_left>.color>.section").css("display")=="none"){
	 
	    	 $(".gksel_shop_left>.color>.section").slideDown(500);
      
	   }else{
		 
		    	 $(".gksel_shop_left>.color>.section").slideUp(500);
  
		}
	  })
    
})
</script>