<?php $this->load->view('admin/header')?>

<script type="text/javascript" src='<?php echo CDN_URL();?>themes/default/js/admin/admin_cms_article.js?date=<?php echo CACHE_USETIME()?>'></script>
	
<form method="post">
	<table class="gksel_normal_tabpost">
		<tr>
			<td align="right" width="150"><?php echo lang('cy_article_category_name')?> (English)</td>
			<td align="left">
				<input type="text" name="category_name_en" value="<?php echo $article_categoryinfo['category_name_en']?>"/>
				<div class="tipsgroupbox"><div class="request">*</div></div>
			</td>
		</tr>
		<tr>
			<td align="right" width="150"><?php echo lang('cy_article_category_name')?> (中文)</td>
			<td align="left">
				<input type="text" name="category_name_ch" value="<?php echo $article_categoryinfo['category_name_ch']?>"/>
				<div class="tipsgroupbox"><div class="request">*</div></div>
			</td>
		</tr>
		<tr>
			<td>
				<input name="backurl" type="hidden" value="<?php echo $backurl;?>"/>
			</td>
			<td align="left">
				<div class="gksel_btn_action_on" onclick="tosave_article_categoryinfo(<?php echo $article_categoryinfo['category_id']?>)"><?php echo lang('cy_save')?></div>
			</td>
		</tr>
	</table>
</form>
<?php $this->load->view('admin/footer')?>