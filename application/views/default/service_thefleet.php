<?php $this->load->view('default/header');?>


<div class="gksel_service_structure">
	<?php $this->load->view('default/service_menu');?>
	<div class="rightarea">
		<div style="float:left;width:100%;font-size:18px;margin-top:15px;">
			<?php echo debaseurlcontent($cmsinfo['cms_description'.$this->langtype])?>
		</div>
	</div>
</div>

<?php $this->load->view('default/footer');?>