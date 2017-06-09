<?php 
/**
 * 只保留字符串首尾字符，隐藏中间用*代替（两个字符时只显示第一个）
 * @param string $user_name 姓名
 * @return string 格式化后的姓名
 */
function substr_cut($user_name){
	$strlen     = mb_strlen($user_name, 'utf-8');
	if($strlen == 0){
		return $user_name;
	}else if($strlen == 1){
		// 		return $user_name;
		return '*';
	}else{
		$firstStr     = mb_substr($user_name, 0, 3, 'utf-8');
		$lastStr     = mb_substr($user_name, -4, 4, 'utf-8');
		return $firstStr.'*****'.$lastStr;
	}
}
$menu = $this->session->userdata('menu');
$lang = $this->session->userdata('lang');

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
$current_url_encode = str_replace('/','slash_tag',base64_encode(current_url().$get_str));
?>
<div class="header_list_one" style="">
	<div class="subsection">
		<div class="logoarea">
			<a href="<?php echo base_url()?>"><img class="logo" src="<?php echo base_url().'themes/default/images/logo.png'?>"/></a>
		</div>
		<script>
			function tocontinueonline(){
				$('.header_list_one .subsection .menuarea .listparent .sublist .leftarea').show();
				$('.header_list_one .subsection .menuarea .listparent .sublist .leftarea-category').hide();
			}
		</script>
		<div class="menusectionarea">
			<div class="menuarea">
				<div class="listparent">
					<div class="list <?php if($menu == 'shop'){echo 'menu_on';}else{echo 'menu_off';}?>">
						<a href="<?php echo base_url()?>index.php/shop/index"><?php echo lang('dz_shop')?></a>
						<div class="sublist">
							<div class="leftarea-category">
								<div style="float:left;width:200px;font-size:18px;line-height:20px;color:black;border:2px solid black;">
									<table onclick="javascript:location.href='<?php echo base_url().'index.php/service/thefleet'?>';" cellspacing="0" cellpadding="0" style="cursor:pointer;float:left;width:90%;margin:5px 5%;height:58px;">
										<tr>
											<td align="center">
												The Rojo <br />
												Tailor Fleet
											</td>
										</tr>
									</table>
								</div>
								<div style="float:left;width:200px;font-size:18px;line-height:20px;color:black;border:2px solid black;margin-left:30px;">
									<table onclick="tocontinueonline()" cellspacing="0" cellpadding="0" style="cursor:pointer;float:left;width:90%;margin:5px 5%;height:58px;">
										<tr>
											<td align="center">
												CONTINUE ONLINE
											</td>
										</tr>
									</table>
								</div>
							</div>
							<div class="leftarea">
								<div class="llist">
									<div class="title">
										<a href="<?php echo base_url().'index.php/shop/index'?>"><span>Category</span></a>
									</div>
									<?php 
										$con=array('parent'=>3, 'orderby'=>'a.sort', 'orderby_res'=>'ASC');
										$subcategorylist=$this->ProductModel->getproductcategorylist($con);
									?>
									<?php 
										if (!empty($subcategorylist)) {
											for ($i = 0; $i < count($subcategorylist); $i++) {
												echo '<div class="lslist"><a href="'.base_url().'index.php/shop/category/'.$subcategorylist[$i]['shorturl'].'">'.$subcategorylist[$i]['category_name'.$this->langtype].'</a></div>';
											}
										}
									?>
								</div>
								<div class="llist">
									<div class="title">
										<a href="<?php echo base_url().'index.php/shop/accessories_list'?>"><span>Accessories</span></a>
									</div>
									<?php 
										$con=array('parent'=>20, 'orderby'=>'a.sort', 'orderby_res'=>'ASC');
										$subcategorylist=$this->ProductModel->getproductcategorylist($con);
									?>
									<?php 
										if (!empty($subcategorylist)) {
											for ($i = 0; $i < 5; $i++) {
												echo '<div class="lslist"><a href="'.base_url().'index.php/shop/accessories/'.$subcategorylist[$i]['shorturl'].'">'.$subcategorylist[$i]['category_name'.$this->langtype].'</a></div>';
											}
										}
									?>
								</div>
								<div class="llist">
									<div class="title">
										<span></span>
									</div>
									<?php 
										if (!empty($subcategorylist)) {
											for ($i = 5; $i < count($subcategorylist); $i++) {
												echo '<div class="lslist"><a href="'.base_url().'index.php/shop/accessories/'.$subcategorylist[$i]['shorturl'].'">'.$subcategorylist[$i]['category_name'.$this->langtype].'</a></div>';
											}
										}
									?>
								</div>
							</div>
							<div class="rightarea">
								<img src="<?php echo base_url().'themes/default/images/header_feature_02.jpg'?>"/>
								<img src="<?php echo base_url().'themes/default/images/header_feature_01.jpg'?>"/>
							</div>
						</div>
					</div>
				</div>
				<div class="listparent">
					<div class="list <?php if($menu == 'journal'){echo 'menu_on';}else{echo 'menu_off';}?>"><a href="<?php echo base_url()?>index.php/journal/index">The Rojo Journal</a></div>
				</div>
				<div class="listparent">
					<div class="list <?php if($menu == 'service'){echo 'menu_on';}else{echo 'menu_off';}?>"><a href="<?php echo base_url().'index.php/service/index'?>"><?php echo lang('dz_services')?></a></div>
				</div>
				<div class="listparent">
					<div class="list <?php if($menu == 'company'){echo 'menu_on';}else{echo 'menu_off';}?>"><a href="<?php echo base_url()?>index.php/company/index"><?php echo lang('dz_company')?></a></div>
				</div>
				<div class="listparent">
					<div class="list <?php if($menu == 'architect'){echo 'menu_on';}else{echo 'menu_off';}?>"><a href="<?php echo base_url()?>index.php/welcome/architect" class="">The Architect</a></div>
				</div>
			</div>
		</div>
		<div class="toppercentarea">
			<div class="toparea">
			     <div class="languagearea" style="float:left;margin-top:3px;">
						<?php if($lang == 'en'){?>
							<a href="<?php echo base_url().'index.php/welcome/changelanguage/ch/'.$current_url_encode?>" class="op12" style="font-family:黑体;margin-top:5px;">CN</a>
						<?php }else{?>
							<a href="<?php echo base_url().'index.php/welcome/changelanguage/en/'.$current_url_encode?>" class="op13" style="font-family:黑体;">EN</a>
						<?php }?>
	            </div>
				<div class="loginicon"><a href="<?php echo base_url().'index.php/goshop/order_list'?>"><img src="<?php echo base_url().'themes/default/images/header_icon_shoppingcart.jpg'?>"/></a></div>
				<?php 
					if(isset($_COOKIE['rojoclothinginfo'])){
						$rojoclothinginfoArr = unserialize($_COOKIE["rojoclothinginfo"]);
						$uid = $rojoclothinginfoArr['uid'];
					}else{
						$uid = 0;
					}
				?>
				<?php if($uid > 0){?>
					<a href="<?php echo base_url().'index.php/member'?>" class="global"><img src="<?php echo base_url().'themes/default/images/header_icon_profile.jpg'?>"/></a>
				<?php }else{?>
					<a href="<?php echo base_url().'index.php/account/tologin'?>" class="global"><img src="<?php echo base_url().'themes/default/images/header_icon_profile.jpg'?>"/></a>
				<?php }?>
				<div class="search"><img src="<?php echo base_url().'themes/default/images/header_icon_search.jpg'?>"/></div>
			</div>
		</div>
	</div>
</div>