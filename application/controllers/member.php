<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member extends CI_Controller {
	
	function __construct(){
		session_start();
		parent::__construct();
		$lang=$this->session->userdata('lang');
		if($lang=='ch'){
			$this->session->set_userdata('lang','ch');
			$this->langtype='_ch';
			$this->lang->load('gksel','chinese');
		}else{
			$this->session->set_userdata('lang','en');
			$this->langtype='_en';
			$this->lang->load('gksel','english');
		}
		
		if (isset ( $_COOKIE ['rojoclothinginfo'] )) {
			$rojoclothinginfoArr = unserialize ( $_COOKIE ["rojoclothinginfo"] );
			$this->uid = $rojoclothinginfoArr ['uid'];
			$this->user_type = $rojoclothinginfoArr ['user_type'];
		} else {
			redirect ( base_url () . 'index.php/account/tologin' );
		}
	}

	public function index(){
		if(isset($_COOKIE['rojoclothinginfo'])){
			$rojoclothinginfoArr = unserialize($_COOKIE["rojoclothinginfo"]);
			$uid = $rojoclothinginfoArr['uid'];
			
			redirect(base_url().'index.php/member/toview_information');
		}else{
			redirect(base_url().'index.php/account/tologin');
		}
	}
	
	//查看个人信息
	function toview_information(){
		$this->session->set_userdata('menu', 'information');
		$this->session->set_userdata('submenu', 'information');
		if(isset($_COOKIE['rojoclothinginfo'])){
			$rojoclothinginfoArr = unserialize($_COOKIE["rojoclothinginfo"]);
			$uid = $rojoclothinginfoArr['uid'];
		}else{
			redirect(base_url().'index.php/account/tologin');
		}
	
		$data['userinfo']=$this->UserModel->getuserinfo($uid);
		$this->load->view('default/member_information_view',$data);
	}

	//修改个人信息
	function toedit_information(){
		if(isset($_COOKIE['rojoclothinginfo'])){
			$rojoclothinginfoArr = unserialize($_COOKIE["rojoclothinginfo"]);
			$uid = $rojoclothinginfoArr['uid'];
		}else{
			redirect(base_url().'index.php/account/tologin');
		}
		
		//跳转到列表页面
		$backurl = $this->input->get('backurl');
		if($backurl!=""){
			$backurl=str_replace('slash_tag','/',$backurl);
			if(base64_decode($backurl)!=""){
				$decodebackurl = base64_decode($backurl);
			}else{
				$decodebackurl = base_url().'index.php/member/toview_information';
			}
		}else{
			$decodebackurl = base_url().'index.php/member/toview_information';
		}
		$data['decodebackurl'] = $decodebackurl;
		$data['backurl'] = $backurl;
	
		$data['userinfo']=$this->UserModel->getuserinfo($uid);
		$this->load->view('default/member_information_edit',$data);
	}
	//修改个人信息 ------- 处理方法----ajax
	function edit_information($uid){
		//用户信息
		$user_nickname = $this->input->post('user_nickname');//昵称
		$user_realname = $this->input->post('user_realname');//姓名
		$user_sex = $this->input->post('user_sex');//性别
		$user_email = $this->input->post('user_email');//性别
		$user_profile = $this->input->post('user_profile');//个人简介
		
		$arr = array('edited'=>mktime());
		//用户信息
		$arr['user_nickname'] = $user_nickname;
		$arr['user_realname'] = $user_realname;
		$arr['user_sex'] = $user_sex;
		$arr['user_email'] = $user_email;
		$arr['user_profile'] = $user_profile;
		$this->UserModel->edit_user($uid, $arr);
		
		//跳转到列表页面
		$backurl = $this->input->post('backurl');
		if($backurl!=""){
			$backurl=str_replace('slash_tag','/',$backurl);
			if(base64_decode($backurl)!=""){
				$decodebackurl = base64_decode($backurl);
			}else{
				$decodebackurl = base_url().'index.php/member/toview_information';
			}
		}else{
			$decodebackurl = base_url().'index.php/member/toview_information';
		}
		echo json_encode(array('backurl'=>$decodebackurl));
	}
	
	
	
	/**********************************(未完成)************************************************/
	//修改密码
	function tochange_password(){
		$this->session->set_userdata('menu', 'information');
		$this->session->set_userdata('submenu', 'changepassword');
		if(isset($_COOKIE['rojoclothinginfo'])){
			$rojoclothinginfoArr = unserialize($_COOKIE["rojoclothinginfo"]);
			$uid = $rojoclothinginfoArr['uid'];
		}else{
			redirect(base_url().'index.php/account/tologin');
		}
		
		//跳转到列表页面
		$backurl = $this->input->get('backurl');
		if($backurl!=""){
			$backurl=str_replace('slash_tag','/',$backurl);
			if(base64_decode($backurl)!=""){
				$decodebackurl = base64_decode($backurl);
			}else{
				$decodebackurl = base_url().'index.php/member/tochange_password';
			}
		}else{
			$decodebackurl = base_url().'index.php/member/tochange_password';
		}
				
				
		$data['decodebackurl'] = $decodebackurl;
		$data['backurl'] = $backurl;
		$data['url'] = '修改密码';
		
		$data['userinfo']=$this->UserModel->getuserinfo($uid);
		$this->load->view('default/member_information_password',$data);
	}
	//绑定微信账号--去
	function tobindaccount(){
		$this->db->insert ( DB_PRE () . 'user_loginwechat', array ('created' => mktime () ) );
		$loginwechat_id = $this->db->insert_id ();
		$scene_id = $loginwechat_id;
		$scene_id = intval ( $scene_id );
			
		$ACC_TOKEN = $this->JssdkModel->getAccessToken ();
		$url = "https://api.weixin.qq.com/cgi-bin/qrcode/create?access_token=" . $ACC_TOKEN;
		$post_data = '{"expire_seconds": 86400, "action_name": "QR_SCENE", "action_info": {"scene": {"scene_id": ' . $scene_id . '}}}';
		$output = do_post_request ( $url, $post_data );
		$output = json_decode ( $output );
		// print_r($output);exit;//打印获得的数据
		$getticketres = $output->ticket;
		$scene_path = 'https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket=' . $getticketres . ''; // 初始 路径
		$this->db->update ( DB_PRE () . 'user_loginwechat', array ('scene_path' => $scene_path ), array ('loginwechat_id' => $loginwechat_id ) );
	
		$sql = "SELECT * FROM " . DB_PRE () . "user_loginwechat WHERE loginwechat_id = " . $loginwechat_id;
		$loginwechat_info = $this->db->query ( $sql )->row_array ();
		if (! empty ( $loginwechat_info )) {
			$data ['loginwechat_info'] = $loginwechat_info;
			$this->load->view ( 'default/member_information_bingwechat', $data );
		}
	}
	function bindaccount($loginwechat_id){
		$sql = "SELECT * FROM " . DB_PRE () . "user_loginwechat WHERE loginwechat_id = " . $loginwechat_id;
		$loginwechatinfo = $this->db->query ( $sql )->row_array ();
		if(!empty($loginwechatinfo)){
			$con = array ('wechat_id' => $loginwechatinfo['wechat_id'], 'wechat_subscribe' => $loginwechatinfo['wechat_subscribe'], 'wechat_nickname' => $loginwechatinfo['wechat_nickname'], 'wechat_avatar' => $loginwechatinfo['wechat_avatar'], 'wechat_sex' => $loginwechatinfo['wechat_sex'], 'wechat_country' => $loginwechatinfo['wechat_country'], 'wechat_province' => $loginwechatinfo['wechat_province'], 'wechat_city' => $loginwechatinfo['wechat_city'], 'wechat_language' => $loginwechatinfo['wechat_language'] );
			$this->UserModel->edit_user ($this->uid, $con);
		}
		redirect('member/toview_information');
	}
	function ajax_getwechatbindscanstatus($loginwechat_id){
		$sql = "SELECT * FROM " . DB_PRE () . "user_loginwechat WHERE loginwechat_id = " . $loginwechat_id;
		$loginwechat_info = $this->db->query ( $sql )->row_array ();
		if (! empty ( $loginwechat_info )) {
			$wechat_id = $loginwechat_info['wechat_id'];
			if($wechat_id != ''){
				//判断该微信是否已经绑定了其他账号
				$sql = "SELECT * FROM " . DB_PRE () . "user_list WHERE wechat_id = '" . $wechat_id."'";
				$userinfo = $this->db->query ( $sql )->row_array ();
				if(!empty($userinfo)){
					echo json_encode(array('status'=>2, 'wechat_id'=>$wechat_id));
				}else{
					echo json_encode(array('status'=>1, 'wechat_id'=>$wechat_id));
				}
			}else{
				echo json_encode(array('status'=>0, 'wechat_id'=>$wechat_id));
			}
		}else{
			echo json_encode(array('status'=>0, 'wechat_id'=>$wechat_id));
		}
	}
	
	//取消绑定微信账号
	function unbindaccount(){
		$arr = array ('wechat_id' => NULL, 'wechat_subscribe' => 0, 'wechat_nickname' => NULL, 'wechat_avatar' => NULL, 'wechat_sex' => NULL, 'wechat_country' => NULL, 'wechat_province' => NULL, 'wechat_city' => NULL, 'wechat_language' => NULL );
		$this->UserModel->edit_user ($this->uid, $arr);
	}
	
	//修改密码 ------- 处理方法----ajax
	function change_password($uid){
		//原密码
		$user_oldpassword = $this->input->post('user_oldpassword');
		//新密码
		$user_newpassword = $this->input->post('user_newpassword');
		//二次确认的密码
		$user_cpassword = $this->input->post('user_cpassword');
		$arr = array('edited'=>mktime());

		
		//用户密码信息
		$passinfo = $this->UserModel->getuserinfo($uid);
		if( (md5($user_oldpassword)==$passinfo['password']) ){
			if(($user_newpassword==$user_cpassword) ){
				$status = 1;
				$arr['password'] = md5($user_cpassword);
				$this->UserModel->edit_user($uid, $arr);
			}else{
				$status = 3;
			}
		}else{
			$status = 2;
		}
		
		
		
		//跳转到列表页面
		$backurl = $this->input->post('backurl');
		if($backurl!=""){
			$backurl=str_replace('slash_tag','/',$backurl);
			if(base64_decode($backurl)!=""){
				$decodebackurl = base64_decode($backurl);
			}else{
				$decodebackurl = base_url().'index.php/member/tochange_password';
			}
		}else{
			$decodebackurl = base_url().'index.php/member/tochange_password';
		}
		echo json_encode(array('status'=>$status, 'backurl'=>$decodebackurl));
	}
	
	
	
	//用户地址列表
	function address_list(){
		if(isset($_COOKIE['rojoclothinginfo'])){
			$rojoclothinginfoArr = unserialize($_COOKIE["rojoclothinginfo"]);
			$uid = $rojoclothinginfoArr['uid'];
		}else{
			redirect(base_url().'index.php/account/tologin');
		}
		$this->session->set_userdata('menu', 'information');
		$this->session->set_userdata('submenu', 'address');
		$con=array('uid'=>$uid, 'orderby'=>'address_id', 'orderby_res'=>'DESC');
		$data['addresslist']=$this->UserModel->getuser_addresslist($con);
		$this->load->view('default/member_address_list', $data);
	}
	//添加用户地址
	function toadd_address(){
		if(isset($_COOKIE['rojoclothinginfo'])){
			$rojoclothinginfoArr = unserialize($_COOKIE["rojoclothinginfo"]);
			$uid = $rojoclothinginfoArr['uid'];
		}else{
			redirect(base_url().'index.php/account/tologin');
		}
		//导航栏
		$data['url'] = '<a href="'.base_url().'index.php/member/address_list">'.lang('dz_user_address_manage').'</a> &gt; 添加地址';
	
		$this->load->view('default/member_address_add',$data);
	}
	//添加用户地址 ------- 处理方法
	function add_address(){
		if(isset($_COOKIE['rojoclothinginfo'])){
			$rojoclothinginfoArr = unserialize($_COOKIE["rojoclothinginfo"]);
			$uid = $rojoclothinginfoArr['uid'];
		}else{
			redirect(base_url().'index.php/account/tologin');
		}
		//用户信息
		$address_realname = $this->input->post('address_realname');//姓名
		$address_phone = $this->input->post('address_phone');//手机号码
		$address_email = $this->input->post('address_email');//邮箱
		$provinceID = $this->input->post('provinceID');//省份
		$cityID = $this->input->post('cityID');//城市
		$areaID = $this->input->post('areaID');//区域
		$address_street_address = $this->input->post('address_street_address');//详细地址
		$address_zip_code = $this->input->post('address_zip_code');//邮编
	
		$arr = array('uid'=>$uid, 'created'=>mktime(), 'edited'=>mktime());
		//用户信息
		$arr['address_realname'] = $address_realname;
		$arr['address_phone'] = $address_phone;
		$arr['address_email'] = $address_email;
		$arr['address_province_id'] = $provinceID;
		$arr['address_city_id'] = $cityID;
		$arr['address_area_id'] = $areaID;
		$arr['address_province_name'] = $this->UserModel->getprovince_name($provinceID);
		$arr['address_city_name'] = $this->UserModel->getcity_name($cityID);
		$arr['address_area_name'] = $this->UserModel->getarea_name($areaID);
		$arr['address_street_address'] = $address_street_address;
		$arr['address_zip_code'] = $address_zip_code;
		$address_id = $this->UserModel->add_useraddress($arr);
	
		//跳转到列表页面
		echo json_encode(array('backurl'=>base_url().'index.php/member/address_list'));
	}
	//修改用户地址
	function toedit_address($address_id){
		if(isset($_COOKIE['rojoclothinginfo'])){
			$rojoclothinginfoArr = unserialize($_COOKIE["rojoclothinginfo"]);
			$uid = $rojoclothinginfoArr['uid'];
		}else{
			redirect(base_url().'index.php/account/tologin');
		}
		//导航栏
		$data['url'] = '<a href="'.base_url().'index.php/member/address_list">'.lang('dz_user_address_manage').'</a> &gt; '.lang('dz_user_address_edit');
	
		$data['userinfo'] = $this->UserModel->getuserinfo($uid);
		$data['addressinfo'] = $this->UserModel->getuser_addressinfo($address_id);
		$this->load->view('default/member_address_edit',$data);
	}
	//修改用户地址 ------- 处理方法
	function edit_address($address_id){
		//用户信息
		$address_realname = $this->input->post('address_realname');//姓名
		$address_phone = $this->input->post('address_phone');//手机号码
		$address_email = $this->input->post('address_email');//邮箱
		$provinceID = $this->input->post('provinceID');//省份
		$cityID = $this->input->post('cityID');//城市
		$areaID = $this->input->post('areaID');//区域
		$address_street_address = $this->input->post('address_street_address');//详细地址
		$address_zip_code = $this->input->post('address_zip_code');//邮编
	
		$arr = array('edited'=>mktime());
		//用户信息
		$arr['address_realname'] = $address_realname;
		$arr['address_phone'] = $address_phone;
		$arr['address_email'] = $address_email;
		$arr['address_province_id'] = $provinceID;
		$arr['address_city_id'] = $cityID;
		$arr['address_area_id'] = $areaID;
		$arr['address_province_name'] = $this->UserModel->getprovince_name($provinceID);
		$arr['address_city_name'] = $this->UserModel->getcity_name($cityID);
		$arr['address_area_name'] = $this->UserModel->getarea_name($areaID);
		$arr['address_street_address'] = $address_street_address;
		$arr['address_zip_code'] = $address_zip_code;
		$this->UserModel->edit_useraddress($address_id, $arr);
	
		//跳转到列表页面
		echo json_encode(array('backurl'=>base_url().'index.php/member/address_list'));
	}
	//删除用户地址
	function del_address($uid, $address_id){
		$this->UserModel->del_useraddress($uid, $address_id);
	}
	
	
	
	/***************************FeedBack****************************/
	//反馈列表	
	function feedback(){		$this->session->set_userdata('menu', 'feedback');		$this->session->set_userdata('submenu', 'feedback');		if(isset($_COOKIE['rojoclothinginfo'])){			$rojoclothinginfoArr = unserialize($_COOKIE["rojoclothinginfo"]);			$uid = $rojoclothinginfoArr['uid'];				
			$row = $this->input->get('row');			if($row == ''){				$row = 0;			}			$data['page'] = 20;			$con=array('uid'=>$uid,'orderby'=>'a.feedback_id','orderby_res'=>'DESC','row'=>$row,'page'=>$data['page']);
			$data['feedbacklist']=$this->FeedbackModel->getfeedbacklist($con);			$data['count']=$this->FeedbackModel->getfeedbacklist($con,1);
			$this->load->view('default/member_feedback_list',$data);		}else{			redirect(base_url().'index.php/account/tologin');		}	}
	
	
	//意见反馈	function toadd_feedback(){		if(isset($_COOKIE['rojoclothinginfo'])){			$rojoclothinginfoArr = unserialize($_COOKIE["rojoclothinginfo"]);			$uid = $rojoclothinginfoArr['uid'];		}else{			redirect(base_url().'index.php/account/tologin');		}				//跳转到列表页面		$backurl = $this->input->get('backurl');		if($backurl!=""){			$backurl=str_replace('slash_tag','/',$backurl);			if(base64_decode($backurl)!=""){				$decodebackurl = base64_decode($backurl);			}else{				$decodebackurl = base_url().'index.php/member/feedback';			}		}else{			$decodebackurl = base_url().'index.php/member/feedback';		}		$data['decodebackurl'] = $decodebackurl;		$data['backurl'] = $backurl;		//导航栏		$data['url'] = '<a href="'.$decodebackurl.'">意见反馈</a> &gt; 添加意见反馈';			$this->load->view('default/member_feedback',$data);	}
	
	
	
	//添加意见反馈 ------- 处理方法----ajax	function add_feedback(){		if(isset($_COOKIE['rojoclothinginfo'])){			$rojoclothinginfoArr = unserialize($_COOKIE["rojoclothinginfo"]);			$uid = $rojoclothinginfoArr['uid'];		}else{			redirect(base_url().'index.php/account/tologin');		}			//反馈内容		$feedback_content = $this->input->post('feedback_content');		$arr = array('uid'=>$uid, 'created'=>mktime(), 'edited'=>mktime());		
		//反馈内容		$arr['feedback_content'] = $feedback_content;				$feedback_id = $this->FeedbackModel->add_feedback($arr);		
				//跳转到列表页面		$backurl = $this->input->post('backurl');		if($backurl!=""){			$backurl=str_replace('slash_tag','/',$backurl);			if(base64_decode($backurl)!=""){				$decodebackurl = base64_decode($backurl);			}else{				$decodebackurl = base_url().'index.php/member/feedback';			}		}else{			$decodebackurl = base_url().'index.php/member/feedback';		}		echo json_encode(array('backurl'=>$decodebackurl));	}
	
	
	
	//查看意见反馈	function tocheck_feedback($feedback_id){		//跳转到列表页面		$backurl = $this->input->get('backurl');		if($backurl!=""){			$backurl=str_replace('slash_tag','/',$backurl);			if(base64_decode($backurl)!=""){				$decodebackurl = base64_decode($backurl);			}else{				$decodebackurl = base_url().'index.php/member/feedback';			}		}else{			$decodebackurl = base_url().'index.php/member/feedback';		}		$data['decodebackurl'] = $decodebackurl;		$data['backurl'] = $backurl;		//导航栏		$data['url'] = '<a href="'.$decodebackurl.'">查看意见反馈</a>';			$data['feedbackinfo']=$this->FeedbackModel->getfeedbackinfo($feedback_id);		$this->load->view('default/member_feedback_check',$data);	}
	
	
	//修改意见反馈	function toedit_feedback($feedback_id){		//跳转到列表页面		$backurl = $this->input->get('backurl');		if($backurl!=""){			$backurl=str_replace('slash_tag','/',$backurl);			if(base64_decode($backurl)!=""){				$decodebackurl = base64_decode($backurl);			}else{				$decodebackurl = base_url().'index.php/member/feedback';			}		}else{			$decodebackurl = base_url().'index.php/member/feedback';		}		$data['decodebackurl'] = $decodebackurl;		$data['backurl'] = $backurl;		//导航栏		$data['url'] = '<a href="'.$decodebackurl.'">意见反馈</a> &gt; 修改意见反馈';			$data['feedbackinfo']=$this->FeedbackModel->getfeedbackinfo($feedback_id);		$this->load->view('default/member_feedback_edit',$data);	}	
	
	
	
	//修改需求 ------- 处理方法----ajax	function edit_feedback($feedback_id){		//意见反馈信息		$feedback_content = $this->input->post('feedback_content');
				$arr = array('edited'=>mktime());
				$arr['feedback_content'] = $feedback_content;
				$this->FeedbackModel->edit_feedback($feedback_id, $arr);		
		//跳转到列表页面		$backurl = $this->input->post('backurl');		if($backurl!=""){			$backurl=str_replace('slash_tag','/',$backurl);			if(base64_decode($backurl)!=""){				$decodebackurl = base64_decode($backurl);			}else{				$decodebackurl = base_url().'index.php/member/feedback';			}		}else{			$decodebackurl = base_url().'index.php/member/feedback';		}		echo json_encode(array('backurl'=>$decodebackurl));	}
	
	//删除意见反馈	function del_feedback($feedback_id){		$this->FeedbackModel->del_feedback($feedback_id);	}
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */