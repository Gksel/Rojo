<?php $this->load->view('admin/header')?>

<script type="text/javascript" src='<?php echo CDN_URL();?>themes/default/js/admin/admin_cms_article.js?date=<?php echo CACHE_USETIME()?>'></script>
	
<?php 
$get_str='';
if($_GET){
	$arr = geturlparmersGETS();
	for($i=0;$i<count($arr);$i++){
		if(isset($_GET[$arr[$i]])){
			if($get_str!=""){$get_str .='&';}else{$get_str .='?';}
			$get_str .=$arr[$i].'='.$_GET[$arr[$i]];
		}
	}
}
$current_url = current_url();
$current_url_encode=str_replace('/','slash_tag',base64_encode($current_url.$get_str));

$category_id = $this->input->get('category_id');
$keyword_id = $this->input->get('keyword_id');
$keyword = $this->input->get('keyword');
?>
<table class="gksel_normal_tabaction">
	<tr>
		<td>
			<div class="searcharea">
				<form action = "<?php echo base_url().'index.php/admins/cms/article_list'?>" method="get">
					<?php 
						$con=array('orderby'=>'a.sort','orderby_res'=>'ASC');
						$articlecategorylist=$this->CmsModel->getarticlecategorylist($con);
					?>
					<select name="category_id" class="category_id">
						<option value=""><?php echo lang('cy_all')?></option>
						<?php if(!empty($articlecategorylist)){for ($i = 0; $i < count($articlecategorylist); $i++) {?>
							<option value="<?php echo $articlecategorylist[$i]['category_id']?>" <?php if($category_id != '' && $category_id == $articlecategorylist[$i]['category_id']){echo 'selected';}?>><?php echo $articlecategorylist[$i]['category_name_en'].' '.$articlecategorylist[$i]['category_name_ch']?></option>
						<?php }}?>
					</select>
					<input type="text" name="keyword" placeholder="<?php echo lang('cy_enter_keyword')?>" value="<?php echo $keyword?>"/>
					<input type="submit" value="<?php echo lang('cy_search')?>"/>
				</form>
			</div>
		</td>
	</tr>
</table>
<table class="gksel_normal_tabaction">
	<tr>
		<td>
			<div class="searcharea">
				<a href="<?php echo base_url().'index.php/admins/cms/toadd_article'?>"><font class="nav_on"><img class="plus" src="<?php echo base_url().'themes/default/images/plus.png'?>"/> <?php echo lang('cy_article_add')?></font></a>
			</div>
		</td>
	</tr>
</table>
<table class="gksel_normal_tablist">
	<thead>
		<tr>
			<td width="50" align="center"><?php echo lang('cy_sn')?></td>
			<td width="100" align="center"><p><?php echo lang('cy_picture')?></p></td>
			<td><p>&nbsp;&nbsp;&nbsp;<?php echo lang('cy_article_name')?></p></td>
			<td><p>&nbsp;&nbsp;&nbsp;<?php echo lang('cy_article_category')?></p></td>
			<!--  
			<td><p>&nbsp;&nbsp;&nbsp;<?php echo lang('cy_keywords')?></p></td>
			-->
			<td width="100" align="center"><p><?php echo lang('cy_time_created')?></p></td>
			<td width="100" align="center"><p>Author</p></td>
			<td width="200" align="center"><p><?php echo lang('cy_actions')?></p></td>
		</tr>
	</thead>
	<tbody>
		<?php if(isset($articlelist)){for ($i = 0; $i < count($articlelist); $i++) {?>
			<tr>
				<td align="center"><?php echo $i+1?></td>
				<td align="center">
					<?php if($articlelist[$i]['article_pic']!=""){?>
						<img style="max-width:70px;max-height: 70px;" src="<?php echo CDN_URL().$articlelist[$i]['article_pic']?>"/>
					<?php }else{?>
						<img style="max-width:70px;max-height: 70px;" src="<?php echo CDN_URL().'themes/default/images/none_article.png'?>"/>
					<?php }?>
				</td>
				<td>
					<div style="float:left;width:100%;">
						<?php echo actionsearchdaxiaoxiezimu($keyword, strip_tags($articlelist[$i]['article_name'.$this->langtype]));?>
					</div>
					<div style="float:left;width:100%;color:#CCC;margin-top:4px;">
						<?php echo $articlelist[$i]['article_url'];?>
					</div>
				</td>
				<td>
					<?php 
					
					$sql = "SELECT b.* FROM ".DB_PRE()."article_category AS a
							LEFT JOIN ".DB_PRE()."system_article_category AS b ON a.category_id = b.category_id
					WHERE a.article_id = ".$articlelist[$i]['article_id'];
					$checkres = $this->db->query($sql)->result_array();
					if(!empty($checkres)){
						for ($j = 0; $j < count($checkres); $j++) {
							echo '<div style="float:left;background:#EFEFEF;padding:3px 5px;margin-bottom:5px;margin-right:5px;">';
								echo $checkres[$j]['category_name_en'].' '.$checkres[$j]['category_name_ch'];
							echo '</div>';
						}
					}
					?>
				</td>
				<!--  
				<td>
					<?php 
					
// 					$sql = "SELECT b.* FROM ".DB_PRE()."article_keyword AS a
// 							LEFT JOIN ".DB_PRE()."system_keyword_list AS b ON a.keyword_id = b.keyword_id
// 					WHERE a.article_id = ".$articlelist[$i]['article_id'];
// 					$checkres = $this->db->query($sql)->result_array();
// 					if(!empty($checkres)){
// 						for ($j = 0; $j < count($checkres); $j++) {
// 							echo '<div style="float:left;background:#EFEFEF;padding:3px 5px;margin-bottom:5px;margin-right:5px;">';
// 								echo $checkres[$j]['keyword_name_en'].' '.$checkres[$j]['keyword_name_ch'];
// 							echo '</div>';
// 						}
// 					}
					?>
				</td>
				-->
				<td align="center"><?php echo date('Y-m-d', $articlelist[$i]['created']).'<br />'.date('H:i:s', $articlelist[$i]['edited'])?></td>
				<td align="center"><?php echo $articlelist[$i]['edited_author']?></td>
				<td align="center">
					<div style="float:right;">
						<?php 
							echo '<a href="'.base_url().'index.php/admins/cms/toedit_article/'.$articlelist[$i]['article_id'].'?backurl='.$current_url_encode.'" class="gksel_btn_action_on">'.lang('cy_edit').'</a>';
								
							echo '<a onclick="todel_article('.$articlelist[$i]['article_id'].', \''.$articlelist[$i]['article_name_en'].'\')" href="javascript:;" class="gksel_btn_action_on">'.lang('cy_delete').'</a>';
						?>
					</div>
				</td>
			</tr>
		<?php }}?>
	</tbody>
</table>

<?php $this->load->view('admin/footer')?>