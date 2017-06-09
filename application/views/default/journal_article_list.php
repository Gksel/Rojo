<?php $this->load->view('default/header');?>

<?php 
$con=array('orderby'=>'a.sort','orderby_res'=>'ASC');
$categorylist = $this->CmsModel->getarticlecategorylist($con);
$submenu = $this->session->userdata('submenu');
?>
<div class="gksel_journal_menuarea">
	<div class="centerarea">
		<?php 
			if (!empty($categorylist)) {
				for ($i = 0; $i < count($categorylist); $i++) {
					if($submenu == 'journal_'.$categorylist[$i]['shorturl']){
						$listclass = 'list_on';
					}else{
						$listclass = 'list_off';
					}
					echo '<div class="list '.$listclass.'"><a href="'.base_url().'index.php/journal/'.$categorylist[$i]['shorturl'].'">'.$categorylist[$i]['category_name'.$this->langtype].'</a></div>';
				}
			}
		?>
	</div>
</div>


<div class="gksel_journalarticlelistbox">
		<?php if(isset($articlelist)){for ($i = 0; $i < count($articlelist); $i++) {?>
			<div class="list" onclick="javascript:location.href='<?php echo $articlelist[$i]['article_url']?>';">
				<div class="innerbox">
					<div class="picarea">
						<img src="<?php echo base_url().$articlelist[$i]['article_pic']?>">
					</div>
					<div class="textarea">
						<div class="innercontent">
							<div class="title">
								<?php echo $articlelist[$i]['article_name'.$this->langtype]?>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php }}?>
	</div>

<?php $this->load->view('default/footer');?>