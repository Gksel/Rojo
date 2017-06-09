<?php $this->load->view('default/header');?>
<?php 
	$bannerlist = array();
	$bannerlist[] = array('banner_pic'=>'themes/default/images/banner_journal.png');
	$bannerlist[] = array('banner_pic'=>'themes/default/images/banner_journal.png');
	$bannerlist[] = array('banner_pic'=>'themes/default/images/banner_journal.png');
	$data['bannerlist'] =  $bannerlist;
	$this->load->view('default/common_banner', $data);
?>

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
					echo '<div class="list list_off"><a href="'.base_url().'index.php/journal/'.$categorylist[$i]['shorturl'].'">'.$categorylist[$i]['category_name'.$this->langtype].'</a></div>';
				}
			}
		?>
	</div>
</div>


<div style="float:left;width:100%;text-align:center;font-size:16px;line-height:22px;">
	<div style="width:96%;max-width:850px;margin:0 auto;">
		<div style="float:left;width:100%;margin-top:20px;">
			Welcome to The ROJO Journal, a one-stop platform for all Men’s related essentials.
	The Journal was created by the team at ROJO Clothing.
		</div>
		<div style="float:left;width:100%;margin-top:20px;">
			The ROJO Journal – Strictly for Gentlemen!
		</div>
		<div style="float:left;width:100%;margin-top:20px;">
			The Journal will cover a separate topic each week, covering new innovative tech on the market
to suit trends and advice for discerning gents who wish to further their knowledge.
		</div>
		<div style="float:left;width:100%;margin-top:20px;">
			Each new article will be posted every Monday morning through our WeChat Official Account:
ROJOCLOTHING
		</div>
		<div style="float:left;width:100%;margin-top:20px;">
			Thanks for reading!
		</div>
	</div>
</div>

<?php $this->load->view('default/footer');?>