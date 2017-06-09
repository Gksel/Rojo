<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="UTF-8">
	<title>Rojo Clothing</title>
	<script type="text/javascript" src='<?php echo CDN_URL();?>themes/default/js/jquery-1.7.2.min.js?date=<?php echo CACHE_USETIME()?>'></script>
	<script type="text/javascript" src='<?php echo CDN_URL();?>themes/default/js/lan<?php echo $this->langtype?>.js?date=<?php echo CACHE_USETIME()?>'></script>
	<script type="text/javascript" src='<?php echo CDN_URL();?>themes/default/js/admin/admin_common.js?date=<?php echo CACHE_USETIME()?>'></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>themes/default/admin.css?date=<?php echo CACHE_USETIME()?>"/>
	<link rel="shortcut icon" href="<?php echo base_url()?>themes/default/images/rojo.ico?date=<?php echo CACHE_USETIME()?>" type="image/x-icon" />
</head>
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
$current_url = current_url().$get_str;
$current_url_encode = str_replace('/','slash_tag',base64_encode(current_url().$get_str));
$menu = $this->session->userdata('menu');
?>
<script type="text/javascript">
	var baseurl='<?php echo base_url()?>';
	var cdnurl='<?php echo CDN_URL()?>';
	var currenturl='<?php echo $current_url?>';
	var current_url_encode='<?php echo $current_url_encode?>';
</script>


<body>
<?php 
$admin = $this->session->userdata ( 'admin' );
if (isset($admin ['admin_id'])){
	$admin_id = $admin ['admin_id'];
}else {
	$admin_id = 0;
}
if (isset($admin ['admin_username'])){
	$admin_username = $admin ['admin_username'];
}else{
	$admin_username = '';
}
?>
<div class="Frame_Header">
	<img class="logo" src="<?php echo CDN_URL().'themes/default/images/newlogo.png'?>"/>
	<div class="infomation">
		<div class="infoarea">
			<div class="inforight">
				<div class="info">Hello!</div>
				<div class="userinfo"><?php echo $admin_username;?></div>
				<div class="logout"><a href="<?php echo base_url().'index.php/admin/logout'?>">【退出】</a></div>
			</div>
		</div>
		<!--  
		<div class="languagearea">
			<div class="language">
				<a href="<?php echo base_url().'index.php/welcome/changelanguage/en/'.$current_url_encode?>"><img src="<?php echo base_url().'themes/default/images/header_lan_en.png'?>"/></a>
				<a href="<?php echo base_url().'index.php/welcome/changelanguage/ch/'.$current_url_encode?>"><img src="<?php echo base_url().'themes/default/images/header_lan_ch.png'?>"/></a>
			</div>
		</div>
		-->
	</div>
</div>
<div class="Frame_Leftmenu">
	<div class="title"><?php echo lang('cy_backend_center_manage')?></div>
	<div class="list">
		<?php 
			$group_id = 1;
			$isonthissection = 0;
			if($menu == 'article_category' || $menu == 'article' || $menu == 'keyword' || $menu == 'cms'){
				$isonthissection = 1;
			}
		?>
		<ul group_id = "<?php echo $group_id?>" class="menugroup">
			<li>
				<a class="active">
					<?php echo lang('cy_cms_manage')?>
					<img class="arr_up <?php if($isonthissection != 1){echo 'displaynone';}?>" src="<?php echo base_url().'themes/default/images/arrow_up.png'?>"/>
					<img class="arr_do <?php if($isonthissection == 1){echo 'displaynone';}?>" src="<?php echo base_url().'themes/default/images/arrow_do.png'?>"/>
				</a>
			</li>
		</ul>
		<ul id = "groupsublist_<?php echo $group_id?>" class="<?php if($isonthissection != 1){echo 'displaynone';}?>">
			<li><span><img src="<?php if($menu == 'article_category'){echo base_url().'themes/default/images/icon_id-card_on.png';}else{echo base_url().'themes/default/images/icon_id-card_off.png';}?>"/></span><font><a <?php if($menu == 'article_category'){echo 'class="subactive" ';}?>href="<?php echo base_url().'index.php/admins/cms/article_category_list'?>"><?php echo lang('cy_article_category_manage')?></a></font></li>
			<li><span><img src="<?php if($menu == 'article'){echo base_url().'themes/default/images/icon_id-card_on.png';}else{echo base_url().'themes/default/images/icon_id-card_off.png';}?>"/></span><font><a <?php if($menu == 'article'){echo 'class="subactive" ';}?>href="<?php echo base_url().'index.php/admins/cms/article_list'?>"><?php echo lang('cy_article_manage')?></a></font></li>
			<li><span><img src="<?php if($menu == 'keyword'){echo base_url().'themes/default/images/icon_id-card_on.png';}else{echo base_url().'themes/default/images/icon_id-card_off.png';}?>"/></span><font><a <?php if($menu == 'keyword'){echo 'class="subactive" ';}?>href="<?php echo base_url().'index.php/admins/cms/keywordlist'?>"><?php echo lang('cy_keyword_manage')?></a></font></li>
			<li><span><img src="<?php if($menu == 'cms'){echo base_url().'themes/default/images/icon_id-card_on.png';}else{echo base_url().'themes/default/images/icon_id-card_off.png';}?>"/></span><font><a <?php if($menu == 'cms'){echo 'class="subactive" ';}?>href="<?php echo base_url().'index.php/admins/cms/cmslist'?>"><?php echo lang('cy_commoncontent_manage')?></a></font></li>
		</ul>
		<?php 
			$group_id = 2;
			$isonthissection = 0;
			if($menu == 'user' || $menu == 'client' || $menu == 'pointsetting' || $menu == 'providers' || $menu == 'superadmin' || $menu == 'adminassistant' || $menu == 'wechatautoreply' || $menu == 'wechatmenu'){
				$isonthissection = 1;
			}
		?>
		<ul group_id = "<?php echo $group_id?>" class="menugroup">
			<li>
				<a class="active">
					<?php echo lang('dz_users')?>
					<img class="arr_up <?php if($isonthissection != 1){echo 'displaynone';}?>" src="<?php echo base_url().'themes/default/images/arrow_up.png'?>"/>
					<img class="arr_do <?php if($isonthissection == 1){echo 'displaynone';}?>" src="<?php echo base_url().'themes/default/images/arrow_do.png'?>"/>
				</a>
			</li>
		</ul>
		<ul id = "groupsublist_<?php echo $group_id?>" class="<?php if($isonthissection != 1){echo 'displaynone';}?>">
			<li><span><img src="<?php if($menu == 'user'){echo base_url().'themes/default/images/icon_id-card_on.png';}else{echo base_url().'themes/default/images/icon_id-card_off.png';}?>"/></span><font><a <?php if($menu == 'user'){echo 'class="subactive" ';}?>href="<?php echo base_url().'index.php/admins/user/index?user_type=1'?>"><?php echo lang('dz_user_manage')?></a></font></li>
			<!--  
			<li><span><img src="<?php if($menu == 'client'){echo base_url().'themes/default/images/icon_id-card_on.png';}else{echo base_url().'themes/default/images/icon_id-card_off.png';}?>"/></span><font><a <?php if($menu == 'client'){echo 'class="subactive" ';}?>href="<?php echo base_url().'index.php/admins/user/index?user_type=2'?>"><?php echo lang('dz_company_business_manage')?></a></font></li>
			<li><span><img src="<?php if($menu == 'providers'){echo base_url().'themes/default/images/icon_id-card_on.png';}else{echo base_url().'themes/default/images/icon_id-card_off.png';}?>"/></span><font><a <?php if($menu == 'providers'){echo 'class="subactive" ';}?>href="<?php echo base_url().'index.php/admins/user/index?user_type=3'?>"><?php echo lang('dz_user_contentproviders_manage')?></a></font></li>
			-->
			<li><span><img src="<?php if($menu == 'superadmin'){echo base_url().'themes/default/images/icon_id-card_on.png';}else{echo base_url().'themes/default/images/icon_id-card_off.png';}?>"/></span><font><a <?php if($menu == 'superadmin'){echo 'class="subactive" ';}?>href="<?php echo base_url().'index.php/admins/user/adminassistantlist?admin_type=1'?>"><?php echo lang('cy_admin_super')?></a></font></li>
			<li><span><img src="<?php if($menu == 'adminassistant'){echo base_url().'themes/default/images/icon_id-card_on.png';}else{echo base_url().'themes/default/images/icon_id-card_off.png';}?>"/></span><font><a <?php if($menu == 'adminassistant'){echo 'class="subactive" ';}?>href="<?php echo base_url().'index.php/admins/user/adminassistantlist?admin_type=2'?>"><?php echo lang('cy_admin_assistant')?></a></font></li>
			<li><span><img src="<?php if($menu == 'wechatmenu'){echo base_url().'themes/default/images/icon_id-card_on.png';}else{echo base_url().'themes/default/images/icon_id-card_off.png';}?>"/></span><font><a <?php if($menu == 'wechatmenu'){echo 'class="subactive" ';}?>href="<?php echo base_url().'index.php/admins/wechat/menulist'?>"><?php if($this->langtype == '_ch'){echo '微信菜单';}else{echo 'Wechat Menu';}?></a></font></li>
			<li><span><img src="<?php if($menu == 'wechatautoreply'){echo base_url().'themes/default/images/icon_id-card_on.png';}else{echo base_url().'themes/default/images/icon_id-card_off.png';}?>"/></span><font><a <?php if($menu == 'wechatautoreply'){echo 'class="subactive" ';}?>href="<?php echo base_url().'index.php/admins/wechat/autoreplylist'?>"><?php if($this->langtype == '_ch'){echo '微信自动回复';}else{echo 'Wechat auto reply';}?></a></font></li>
			<li><span><img src="<?php if($menu == 'pointsetting'){echo base_url().'themes/default/images/icon_id-card_on.png';}else{echo base_url().'themes/default/images/icon_id-card_off.png';}?>"/></span><font><a <?php if($menu == 'pointsetting'){echo 'class="subactive" ';}?>href="<?php echo base_url().'index.php/admins/user/pointsetting'?>"><?php if($this->langtype == '_ch'){echo '积分设置';}else {echo 'Points Setting';}?></a></font></li>
		</ul>
		<?php 
			$group_id = 3;
			$isonthissection = 0;
			if($menu == 'product' || $menu == 'productimport' || $menu == 'productfactory' || $menu == 'productcategory' || $menu == 'productcategory' || $menu == 'productrecommended'){
				$isonthissection = 1;
			}
		?>
		<ul group_id = "<?php echo $group_id?>" class="menugroup">
			<li>
				<a class="active">
					QR Orders
					<img class="arr_up <?php if($isonthissection != 1){echo 'displaynone';}?>" src="<?php echo base_url().'themes/default/images/arrow_up.png'?>"/>
					<img class="arr_do <?php if($isonthissection == 1){echo 'displaynone';}?>" src="<?php echo base_url().'themes/default/images/arrow_do.png'?>"/>
				</a>
			</li>
		</ul>
		<ul id = "groupsublist_<?php echo $group_id?>" class="<?php if($isonthissection != 1){echo 'displaynone';}?>">
			<li><span><img src="<?php if($menu == 'productfactory'){echo base_url().'themes/default/images/icon_wallet_on.png';}else{echo base_url().'themes/default/images/icon_wallet_off.png';}?>"/></span><font><a <?php if($menu == 'productfactory'){echo 'class="subactive" ';}?>href="<?php echo base_url().'index.php/admins/product/factorylist'?>"><?php echo lang('dz_product_factory_manage')?></a></font></li>
			<!--
			<li><span><img src="<?php if($menu == 'productcategory'){echo base_url().'themes/default/images/icon_wallet_on.png';}else{echo base_url().'themes/default/images/icon_wallet_off.png';}?>"/></span><font><a <?php if($menu == 'productcategory'){echo 'class="subactive" ';}?>href="<?php echo base_url().'index.php/admins/product/categorylist'?>"><?php echo lang('dz_product_category_manage')?></a></font></li>
			-->
			<li><span><img src="<?php if($menu == 'product'){echo base_url().'themes/default/images/icon_wallet_on.png';}else{echo base_url().'themes/default/images/icon_wallet_off.png';}?>"/></span><font><a <?php if($menu == 'product'){echo 'class="subactive" ';}?>href="<?php echo base_url().'index.php/admins/product/index'?>">QR Orders</a></font></li>
			<!--
			<li><span><img src="<?php if($menu == 'productimport'){echo base_url().'themes/default/images/icon_wallet_on.png';}else{echo base_url().'themes/default/images/icon_wallet_off.png';}?>"/></span><font><a <?php if($menu == 'productimport'){echo 'class="subactive" ';}?>href="<?php echo base_url().'index.php/admins/product/importhistorylist'?>"><?php echo lang('dz_product_import')?></a></font></li>
			<li><span><img src="<?php if($menu == 'productloyalty'){echo base_url().'themes/default/images/icon_wallet_on.png';}else{echo base_url().'themes/default/images/icon_wallet_off.png';}?>"/></span><font><a <?php if($menu == 'productloyalty'){echo 'class="subactive" ';}?>href="<?php echo base_url().'index.php/admins/product/loyaltylist'?>"><?php echo lang('dz_product_loyalty_manage')?></a></font></li>
			<li><span><img src="<?php if($menu == 'productrecommended'){echo base_url().'themes/default/images/icon_wallet_on.png';}else{echo base_url().'themes/default/images/icon_wallet_off.png';}?>"/></span><font><a <?php if($menu == 'productrecommended'){echo 'class="subactive" ';}?>href="<?php echo base_url().'index.php/admins/product/index'?>"><?php echo lang('dz_product_recommended_manage')?></a></font></li>
			-->
		</ul>
		<?php 
			$group_id = 33;
			$isonthissection = 0;
			if($menu == 'appointment' || $menu == 'appointmentsetting'){
				$isonthissection = 1;
			}
		?>
		<ul group_id = "<?php echo $group_id?>" class="menugroup">
			<li>
				<a class="active">
					Appointment
					<img class="arr_up <?php if($isonthissection != 1){echo 'displaynone';}?>" src="<?php echo base_url().'themes/default/images/arrow_up.png'?>"/>
					<img class="arr_do <?php if($isonthissection == 1){echo 'displaynone';}?>" src="<?php echo base_url().'themes/default/images/arrow_do.png'?>"/>
				</a>
			</li>
		</ul>
		<ul id = "groupsublist_<?php echo $group_id?>" class="<?php if($isonthissection != 1){echo 'displaynone';}?>">
			<li><span><img src="<?php if($menu == 'appointment'){echo base_url().'themes/default/images/icon_wallet_on.png';}else{echo base_url().'themes/default/images/icon_wallet_off.png';}?>"/></span><font><a <?php if($menu == 'appointment'){echo 'class="subactive" ';}?>href="<?php echo base_url().'index.php/admins/appointment/index'?>">Appointment List</a></font></li>
			<li><span><img src="<?php if($menu == 'appointmentsetting'){echo base_url().'themes/default/images/icon_wallet_on.png';}else{echo base_url().'themes/default/images/icon_wallet_off.png';}?>"/></span><font><a <?php if($menu == 'appointmentsetting'){echo 'class="subactive" ';}?>href="<?php echo base_url().'index.php/admins/appointment/appointmentsettinglist'?>">Appointment Setting</a></font></li>
		</ul>
		<?php 
			$group_id = 4;
			$isonthissection = 0;
			if($menu == 'order' || $menu == 'pendingorders' || $menu == 'deliveryorders' || $menu == 'printorders' || $menu == 'finishorders'){
				$isonthissection = 1;
			}
		?>
		<!--
		<ul group_id = "<?php echo $group_id?>" class="menugroup">
			<li>
				<a class="active">
					<?php echo lang('dz_orders')?>
					<img class="arr_up <?php if($isonthissection != 1){echo 'displaynone';}?>" src="<?php echo base_url().'themes/default/images/arrow_up.png'?>"/>
					<img class="arr_do <?php if($isonthissection == 1){echo 'displaynone';}?>" src="<?php echo base_url().'themes/default/images/arrow_do.png'?>"/>
				</a>
			</li>
		</ul>
		<ul id = "groupsublist_<?php echo $group_id?>" class="<?php if($isonthissection != 1){echo 'displaynone';}?>">
			<li><span><img src="<?php if($menu == 'order'){echo base_url().'themes/default/images/icon_wallet_on.png';}else{echo base_url().'themes/default/images/icon_wallet_off.png';}?>"/></span><font><a <?php if($menu == 'order'){echo 'class="subactive" ';}?>href="<?php echo base_url().'index.php/admins/order/index?status=all'?>"><?php echo lang('dz_order_all')?></a></font></li>
			<li><span><img src="<?php if($menu == 'pendingorders'){echo base_url().'themes/default/images/icon_wallet_on.png';}else{echo base_url().'themes/default/images/icon_wallet_off.png';}?>"/></span><font><a <?php if($menu == 'pendingorders'){echo 'class="subactive" ';}?>href="<?php echo base_url().'index.php/admins/order/index?status=0'?>"><?php echo lang('dz_order_pending')?></a></font></li>
			<li><span><img src="<?php if($menu == 'deliveryorders'){echo base_url().'themes/default/images/icon_truck_on.png';}else{echo base_url().'themes/default/images/icon_truck_off.png';}?>"/></span><font><a <?php if($menu == 'deliveryorders'){echo 'class="subactive" ';}?>href="<?php echo base_url().'index.php/admins/order/index?status=1'?>"><?php echo lang('dz_order_delivery')?></a></font></li>
			<li><span><img src="<?php if($menu == 'printorders'){echo base_url().'themes/default/images/icon_truck_on.png';}else{echo base_url().'themes/default/images/icon_truck_off.png';}?>"/></span><font><a <?php if($menu == 'printorders'){echo 'class="subactive" ';}?>href="<?php echo base_url().'index.php/admins/order/index?status=2'?>"><?php echo lang('dz_order_print')?></a></font></li>
			<li><span><img src="<?php if($menu == 'finishorders'){echo base_url().'themes/default/images/icon_checked_on.png';}else{echo base_url().'themes/default/images/icon_checked_off.png';}?>"/></span><font><a <?php if($menu == 'finishorders'){echo 'class="subactive" ';}?>href="<?php echo base_url().'index.php/admins/order/index?status=3'?>"><?php echo lang('dz_order_finish')?></a></font></li>
		</ul>
		-->
		<?php 
			$group_id = 5;
			$isonthissection = 0;
			if($menu == 'feedback'){
				$isonthissection = 1;
			}
		?>
		<!--
		<ul group_id = "<?php echo $group_id?>" class="menugroup">
			<li>
				<a class="active">
					<?php echo lang('cy_feedback')?>
					<img class="arr_up <?php if($isonthissection != 1){echo 'displaynone';}?>" src="<?php echo base_url().'themes/default/images/arrow_up.png'?>"/>
					<img class="arr_do <?php if($isonthissection == 1){echo 'displaynone';}?>" src="<?php echo base_url().'themes/default/images/arrow_do.png'?>"/>
				</a>
			</li>
		</ul>
		<ul id = "groupsublist_<?php echo $group_id?>" class="<?php if($isonthissection != 1){echo 'displaynone';}?>">
			<li><span><img src="<?php if($menu == 'feedback'){echo base_url().'themes/default/images/icon_feedback_on.png';}else{echo base_url().'themes/default/images/icon_feedback_off.png';}?>"/></span><font><a <?php if($menu == 'feedback'){echo 'class="subactive" ';}?>href="<?php echo base_url().'index.php/admins/feedback/index'?>"><?php echo lang('cy_feedback_manage')?></a></font></li>
		</ul>
		-->
		<?php 
			$group_id = 6;
			$isonthissection = 0;
			if($menu == 'emaillist'){
				$isonthissection = 1;
			}
		?>
		<ul group_id = "<?php echo $group_id?>" class="menugroup">
			<li>
				<a class="active">
					<?php echo lang('cy_settings')?>
					<img class="arr_up <?php if($isonthissection != 1){echo 'displaynone';}?>" src="<?php echo base_url().'themes/default/images/arrow_up.png'?>"/>
					<img class="arr_do <?php if($isonthissection == 1){echo 'displaynone';}?>" src="<?php echo base_url().'themes/default/images/arrow_do.png'?>"/>
				</a>
			</li>
		</ul>
		<ul id = "groupsublist_<?php echo $group_id?>" class="<?php if($isonthissection != 1){echo 'displaynone';}?>">
			<li><span><img src="<?php if($menu == 'emaillist'){echo base_url().'themes/default/images/icon_feedback_on.png';}else{echo base_url().'themes/default/images/icon_feedback_off.png';}?>"/></span><font><a <?php if($menu == 'emaillist'){echo 'class="subactive" ';}?>href="<?php echo base_url().'index.php/admins/email/index'?>">Manage Auto Response</a></font></li>
		</ul>
		<?php 
			$group_id = 7;
			$isonthissection = 0;
			if($menu == 'statistics'){
				$isonthissection = 1;
			}
		?>
		<!--
		<ul group_id = "<?php echo $group_id?>" class="menugroup">
			<li>
				<a class="active">
					<?php echo lang('cy_statistics')?>
					<img class="arr_up <?php if($isonthissection != 1){echo 'displaynone';}?>" src="<?php echo base_url().'themes/default/images/arrow_up.png'?>"/>
					<img class="arr_do <?php if($isonthissection == 1){echo 'displaynone';}?>" src="<?php echo base_url().'themes/default/images/arrow_do.png'?>"/>
				</a>
			</li>
		</ul>
		<ul id = "groupsublist_<?php echo $group_id?>" class="<?php if($isonthissection != 1){echo 'displaynone';}?>">
			<li><span><img src="<?php if($menu == 'statistics'){echo base_url().'themes/default/images/icon_feedback_on.png';}else{echo base_url().'themes/default/images/icon_feedback_off.png';}?>"/></span><font><a <?php if($menu == 'statistics'){echo 'class="subactive" ';}?>href="<?php echo base_url().'index.php/admins/statistics/index'?>"><?php echo lang('cy_statistics')?></a></font></li>
		</ul>
		-->
	</div>
</div>



<div class="Frame_Body">

<?php if(isset($url)){?><div class="gksel_navigation"><?php echo $url;?></div><?php }?>
	
<div class="gksel_delete_box_bg"></div>
<div class="gksel_delete_box">
	<table>
		<tr>
			<td>
				<div class="gksel_delete_content">
					<div class="close"><img onclick="toclose_deletebox()" src="<?php echo base_url().'themes/default/images/close.png'?>"></div>
					<div class="title"></div>
					<div class="subtitle"></div>
					<div class="control">
						<div class="yes" onclick="del()">确定</div>
						<div class="no" onclick="toclose_deletebox()">关闭</div>
					</div>
				</div>
			</td>
		</tr>
	</table>
</div>

