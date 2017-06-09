<?php $this->load->view('admin/header')?>
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

$user_type = $this->input->get('user_type');
$keyword = $this->input->get('keyword');
?>

<script type="text/javascript" src='<?php echo CDN_URL();?>themes/default/js/admin/admin_user.js?date=<?php echo CACHE_USETIME()?>'></script>
	
<table class="gksel_normal_tabaction">
	<tr>
		<td>
			<div class="searcharea">
				<form action = "<?php echo base_url().'index.php/admins/user/index'?>" method="get">
					<select name="user_type" class="select_usertype displaynone">
						<option value=""><?php echo lang('cy_all')?></option>
						<option value="1" <?php if($user_type != '' && $user_type == 1){echo 'selected';}?>>客户</option>
						<option value="2" <?php if($user_type != '' && $user_type == 2){echo 'selected';}?>>供应商</option>
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
				<!--  
				<a href="<?php echo base_url().'RO/index.html'?>"><font class="nav_on">FORM </font></a>
				-->
				<a href="<?php echo base_url().'index.php/admins/user/toadd_user/'.$user_type.'?backurl='.$current_url_encode?>"><font class="nav_on"><img class="plus" src="<?php echo base_url().'themes/default/images/plus.png'?>"/> <?php if($user_type == 1){echo lang('dz_user_add');}else if($user_type == 2){echo lang('dz_company_business_add');}else if($user_type == 3){echo lang('dz_user_contentproviders_add');}?></font></a>
				<div onclick="javascript:location.href='<?php echo base_url().'index.php/admins/user/index?user_type='.$user_type.'&keyword='.$keyword.'&is_excel=1'?>';" style="float: left;margin-top:7px;cursor:pointer;">
					<div style="float: left;margin-left:5px;">
						<img src="<?php echo base_url().'themes/default/images/icon_xls.gif'?>"/>
					</div>
					<div style="float: left;margin-left:5px;">
						Export Excel
					</div>
				</div>
			</div>
		</td>
	</tr>
</table>
<?php if($user_type == 1){?>
<table class="gksel_normal_tablist">
	<thead>
		<tr>
			<td width="50" align="center"><?php echo lang('cy_sn')?></td>
			<td width="165"><p>&nbsp;&nbsp;&nbsp;Customer Number</p></td>
			<td><p>&nbsp;&nbsp;&nbsp;<?php echo lang('dz_user_realname')?></p></td>
			<td width="165"><p>&nbsp;&nbsp;&nbsp;<?php echo lang('dz_user_contact')?></p></td>
			<td width="165" align="center"><p><?php echo lang('cy_time_lastedited')?></p></td>
			<td width="100" align="center"><p>Author</p></td>
			<td width="420" align="center"><p><?php echo lang('cy_actions')?></p></td>
		</tr>
	</thead>
	<tbody>
		<?php if(isset($userlist)){for ($i = 0; $i < count($userlist); $i++) {?>
			<tr>
				<td align="center"><?php echo $i+1?></td>
				<td><?php echo $userlist[$i]['user_number']?></td>
				<td>
					<?php 
						if($userlist[$i]['user_type'] == 1){
							if($userlist[$i]['user_sex'] == 1){
								echo '<img style="width:16px;height:16px;" src="'.base_url().'themes/default/images/sex_male.jpg"/>';
							}else if($userlist[$i]['user_sex'] == 2){
								echo '<img style="width:16px;height:16px;" src="'.base_url().'themes/default/images/sex_female.jpg"/>';
							}
						}else{
							echo '-';
						}
					?>
					<?php echo actionsearchdaxiaoxiezimu($keyword, strip_tags($userlist[$i]['user_realname']));?>
				</td>
				<td>
					<?php echo actionsearchdaxiaoxiezimu($keyword, strip_tags($userlist[$i]['user_phone'])).'<br />';?>
					
					<?php echo actionsearchdaxiaoxiezimu($keyword, strip_tags($userlist[$i]['user_email']));?>
				</td>
				<td align="center"><?php echo date('Y-m-d H:i:s', $userlist[$i]['edited'])?></td>
				<td align="center"><?php echo $userlist[$i]['edited_author']?></td>
				<td align="center">
					<div style="float:right;">
						<?php 
							$con=array('uid'=>$userlist[$i]['uid'], 'orderby'=>'form_id', 'orderby_res'=>'DESC');
							$count_form = $this->UserModel->getuser_formlist($con, 1);
							if($count_form > 0){
								$class = 'gksel_btn_action_on';
								$alink = base_url().'index.php/admins/user/form_list/'.$userlist[$i]['uid'].'?backurl='.$current_url_encode;
								$text = 'FORM <font style="color:#000;font-weight:bold;">('.$count_form.')</font>';
							}else{
								$class = 'gksel_btn_action_off';
								$alink = base_url().'index.php/admins/user/form_list/'.$userlist[$i]['uid'].'?backurl='.$current_url_encode;
								$text = 'FORM';
							}
							echo '<a href="'.$alink.'" class="'.$class.'">'.$text.'</a>';
						
						
						
								$con=array('uid'=>$userlist[$i]['uid'], 'orderby'=>'address_id', 'orderby_res'=>'DESC');
								$count_address=$this->UserModel->getuser_addresslist($con, 1);
								if($count_address > 0){
									$class = 'gksel_btn_action_on';
									$alink = base_url().'index.php/admins/user/address_list/'.$userlist[$i]['uid'].'?backurl='.$current_url_encode;
									$text = lang('dz_user_address_manage').' <font style="color:#000;font-weight:bold;">('.$count_address.')</font>';
								}else{
									$class = 'gksel_btn_action_off';
									$alink = 'javascript:;';
									$text = lang('dz_user_address_manage');
								}
								echo '<a href="'.$alink.'" class="'.$class.'">'.$text.'</a>';
								
								echo '<a href="'.base_url().'index.php/admins/user/toedit_user/'.$userlist[$i]['user_type'].'/'.$userlist[$i]['uid'].'?backurl='.$current_url_encode.'" class="gksel_btn_action_on">'.lang('cy_edit').'</a>';
								
								echo '<a onclick="todel_user('.$userlist[$i]['uid'].', \''.$userlist[$i]['user_phone'].'\')" href="javascript:;" class="gksel_btn_action_on">'.lang('cy_delete').'</a>';
						?>
					</div>
				</td>
			</tr>
		<?php }}?>
	</tbody>
</table>
<?php }else if($user_type == 2){?>
<table class="gksel_normal_tablist">
	<thead>
		<tr>
			<td width="50" align="center"><?php echo lang('cy_sn')?></td>
			<td width="180"><p>&nbsp;&nbsp;&nbsp;Customer Number</p></td>
			<td><p>&nbsp;&nbsp;&nbsp;<?php echo lang('dz_company_name')?></p></td>
			<td width="180"><p>&nbsp;&nbsp;&nbsp;<?php echo lang('dz_user_contact')?></p></td>
			<td><p>&nbsp;&nbsp;&nbsp;<?php echo lang('dz_company_contactperson')?></p></td>
			
			<td width="100" align="center"><p><?php echo lang('cy_time_lastedited')?></p></td>
			<td width="100" align="center"><p>Author</p></td>
			<td width="350" align="center"><p><?php echo lang('cy_actions')?></p></td>
		</tr>
	</thead>
	<tbody>
		<?php if(isset($userlist)){for ($i = 0; $i < count($userlist); $i++) {?>
			<tr>
				<td align="center"><?php echo $i+1?></td>
				<td><?php echo $userlist[$i]['user_number']?></td>
				<td>
					<?php echo actionsearchdaxiaoxiezimu($keyword, strip_tags($userlist[$i]['company_name']));?>
				</td>
				<td>
					<?php echo actionsearchdaxiaoxiezimu($keyword, strip_tags($userlist[$i]['user_phone'])).'<br />';?>
					
					<?php echo actionsearchdaxiaoxiezimu($keyword, strip_tags($userlist[$i]['user_email']));?>
				</td>
				<td>
					<?php echo actionsearchdaxiaoxiezimu($keyword, strip_tags($userlist[$i]['user_realname']));?>
				</td>
				
				<td align="center"><?php echo date('Y-m-d', $userlist[$i]['edited']).'<br />'.date('H:i:s', $userlist[$i]['edited'])?></td>
				<td align="center"><?php echo $userlist[$i]['edited_author']?></td>
				<td align="center">
					<div style="float:right;">
						<?php 
							$con=array('parent'=>$userlist[$i]['uid']);
							$count_assistant=$this->UserModel->getuserlist($con, 1);
							if($count_assistant > 0){
								$class = 'gksel_btn_action_on';
								$alink = base_url().'index.php/admins/user/assistant_list/'.$userlist[$i]['user_type'].'/'.$userlist[$i]['uid'].'?backurl='.$current_url_encode;
								$text = lang('dz_company_business_assistant_manage').' <font style="color:#000;font-weight:bold;">('.$count_assistant.')</font>';
							}else{
								$class = 'gksel_btn_action_off';
								$alink = base_url().'index.php/admins/user/assistant_list/'.$userlist[$i]['user_type'].'/'.$userlist[$i]['uid'].'?backurl='.$current_url_encode;
								$text = lang('dz_company_business_assistant_manage').' <font style="color:#000;font-weight:bold;">('.$count_assistant.')</font>';
							}
							echo '<a href="'.$alink.'" class="'.$class.'">'.$text.'</a>';
						
						
							echo '<a href="'.base_url().'index.php/admins/user/toedit_user/'.$userlist[$i]['user_type'].'/'.$userlist[$i]['uid'].'?backurl='.$current_url_encode.'" class="gksel_btn_action_on">'.lang('cy_edit').'</a>';
							
							echo '<a onclick="todel_user('.$userlist[$i]['uid'].', \''.$userlist[$i]['user_phone'].'\')" href="javascript:;" class="gksel_btn_action_on">'.lang('cy_delete').'</a>';
						?>
					</div>
				</td>
			</tr>
		<?php }}?>
	</tbody>
</table>
<?php }else if($user_type == 3){?>
<table class="gksel_normal_tablist">
	<thead>
		<tr>
			<td width="50" align="center"><?php echo lang('cy_sn')?></td>
			<td><p>&nbsp;&nbsp;&nbsp;<?php echo lang('dz_company_contactperson')?></p></td>
			<td width="180"><p>&nbsp;&nbsp;&nbsp;<?php echo lang('dz_user_contact')?></p></td>
			<td width="100" align="center"><p><?php echo lang('cy_time_lastedited')?></p></td>
			<td width="100" align="center"><p>Author</p></td>
			<td width="250" align="center"><p><?php echo lang('cy_actions')?></p></td>
		</tr>
	</thead>
	<tbody>
		<?php if(isset($userlist)){for ($i = 0; $i < count($userlist); $i++) {?>
			<tr>
				<td align="center"><?php echo $i+1?></td>
				<td>
					<?php echo actionsearchdaxiaoxiezimu($keyword, strip_tags($userlist[$i]['user_realname']));?>
				</td>
				<td>
					<?php echo actionsearchdaxiaoxiezimu($keyword, strip_tags($userlist[$i]['user_phone'])).'<br />';?>
					<?php echo actionsearchdaxiaoxiezimu($keyword, strip_tags($userlist[$i]['user_email']));?>
				</td>
				<td align="center"><?php echo date('Y-m-d', $userlist[$i]['edited']).'<br />'.date('H:i:s', $userlist[$i]['edited'])?></td>
				<td align="center"><?php echo $userlist[$i]['edited_author']?></td>
				<td align="center">
					<div style="float:right;">
						<?php 
							echo '<a href="'.base_url().'index.php/admins/user/toedit_user/'.$userlist[$i]['user_type'].'/'.$userlist[$i]['uid'].'?backurl='.$current_url_encode.'" class="gksel_btn_action_on">'.lang('cy_edit').'</a>';
							
							echo '<a onclick="todel_user('.$userlist[$i]['uid'].', \''.$userlist[$i]['user_phone'].'\')" href="javascript:;" class="gksel_btn_action_on">'.lang('cy_delete').'</a>';
						?>
					</div>
				</td>
			</tr>
		<?php }}?>
	</tbody>
</table>
<?php }?>
<?php $this->load->view('admin/footer')?>