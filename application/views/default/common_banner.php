<?php if(!empty($bannerlist)){?>
	<div class="gksel_normalbanner">
		<?php $num = count($bannerlist);?>
		<div class="gksel_normalbanner_allwidth">
			<?php for ($i = 0; $i < 1; $i++) {?>
				<div class="list">
					<img style="float:left;width:100%;" src="<?php echo base_url().$bannerlist[$i]['banner_pic']?>" />
				</div>
			<?php }?>
			
			<?php for ($i = 0; $i < $num; $i++) {?>
				<div class="list">
					<img style="float:left;width:100%;" src="<?php echo base_url().$bannerlist[$i]['banner_pic']?>" />
				</div>
			<?php }?>
			
			<?php for ($i = ($num - 1); $i < $num; $i++) {?>
				<div class="list">
					<img style="float:left;width:100%;" src="<?php echo base_url().$bannerlist[$i]['banner_pic']?>" />
				</div>
			<?php }?>
		</div>
	</div>
<?php }?>