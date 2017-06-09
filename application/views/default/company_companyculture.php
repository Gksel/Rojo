<?php $this->load->view('default/header');?>


<div style="float:left;width:calc(100% - 70px);margin:0px 35px;">
	<?php $this->load->view('default/company_menu');?>
	<div class="rightarea">
		<div style="float:left;width:100%;font-size:18px;margin-top:15px;">
			<?php echo debaseurlcontent($cmsinfo['cms_description'.$this->langtype])?>
		</div>
	</div>
</div>

<?php $this->load->view('default/footer');?>