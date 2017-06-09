<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller {
	
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
	}
	
	//注册页面
	function toregister($roles = ''){
		$this->session->set_userdata('menu', 'register');
		$data['website_title'] = lang('cy_register');
		$this->load->view('default/account_register', $data);
	}
	//注册页面----处理方法
	function register(){
		$nickname = $this->input->post('nickname');
		$email = $this->input->post('email');
		$phone = $this->input->post('phone');
		$password = $this->input->post('password');
		$user_type = $this->input->post('user_type');//注册类型
		$con = array('user_type'=>$user_type, 'user_nickname'=>$nickname, 'user_email'=>$email, 'user_phone'=>$phone, 'password'=>md5($password), 'randkey'=>randkey(32), 'status'=>1, 'created'=>mktime(), 'edited'=>mktime());
		$uid = $this->UserModel->add_user($con);
		
		
		if (isset ( $_COOKIE ['loginwechatinfo'] )) {
			$loginwechatinfoArr = unserialize ( $_COOKIE ["loginwechatinfo"] );
			$loginwechat_id = $loginwechatinfoArr ['loginwechat_id'];
				
			$sql = "SELECT * FROM " . DB_PRE () . "user_loginwechat WHERE loginwechat_id = " . $loginwechat_id;
			$loginwechatinfo = $this->db->query ( $sql )->row_array ();
			if(!empty($loginwechatinfo)){
				$con = array ('wechat_id' => $loginwechatinfo['wechat_id'], 'wechat_subscribe' => $loginwechatinfo['wechat_subscribe'], 'wechat_nickname' => $loginwechatinfo['wechat_nickname'], 'wechat_avatar' => $loginwechatinfo['wechat_avatar'], 'wechat_sex' => $loginwechatinfo['wechat_sex'], 'wechat_country' => $loginwechatinfo['wechat_country'], 'wechat_province' => $loginwechatinfo['wechat_province'], 'wechat_city' => $loginwechatinfo['wechat_city'], 'wechat_language' => $loginwechatinfo['wechat_language'] );
				$this->UserModel->edit_user ($uid, $con);
					
				delete_cookie ( 'loginwechatinfo' );
			}
		}
	}
	//登录页面
	function tologin(){
		$this->session->set_userdata('menu', 'login');
		$data['website_title'] = lang('cy_login');
		$this->load->view('default/account_login', $data);
	}
	//登录页面----处理方法
	function login(){
		$phone = $this->input->post('phone');
		$password = $this->input->post('password');
		
		$result = $this->UserModel->checkUser_login($phone, md5($password));
		if(!empty($result)){
			// 正常返回数据(json)
			$arr=array('uid'=>$result['uid'], 'user_type'=>$result['user_type'], 'user_phone'=>$result['user_phone']);
			$arr=serialize($arr);
			set_cookie('rojoclothinginfo',$arr,time()+60*10);//设置登录的session
			
			
			if (isset ( $_COOKIE ['loginwechatinfo'] )) {
				$loginwechatinfoArr = unserialize ( $_COOKIE ["loginwechatinfo"] );
				$loginwechat_id = $loginwechatinfoArr ['loginwechat_id'];
			
				$sql = "SELECT * FROM " . DB_PRE () . "user_loginwechat WHERE loginwechat_id = " . $loginwechat_id;
				$loginwechatinfo = $this->db->query ( $sql )->row_array ();
				if(!empty($loginwechatinfo)){
					$con = array ('wechat_id' => $loginwechatinfo['wechat_id'], 'wechat_subscribe' => $loginwechatinfo['wechat_subscribe'], 'wechat_nickname' => $loginwechatinfo['wechat_nickname'], 'wechat_avatar' => $loginwechatinfo['wechat_avatar'], 'wechat_sex' => $loginwechatinfo['wechat_sex'], 'wechat_country' => $loginwechatinfo['wechat_country'], 'wechat_province' => $loginwechatinfo['wechat_province'], 'wechat_city' => $loginwechatinfo['wechat_city'], 'wechat_language' => $loginwechatinfo['wechat_language'] );
					$this->UserModel->edit_user ($result ['uid'], $con);
			
					delete_cookie ( 'loginwechatinfo' );
				}
			}
			
			echo 'yes';
		}else{
			echo 'no';
		}
	}
	// 登录页面--微信快捷登录
	function tologin_wechat($loginwechat_id = 0) {
		$this->session->set_userdata ( 'menu', 'login' );
		$data ['website_title'] = '微信登录';
		// 生成一个临时二维码
	
		if($loginwechat_id == 0){
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
		}
	
	
		$sql = "SELECT * FROM " . DB_PRE () . "user_loginwechat WHERE loginwechat_id = " . $loginwechat_id;
		$loginwechat_info = $this->db->query ( $sql )->row_array ();
		if (! empty ( $loginwechat_info )) {
			$data ['loginwechat_info'] = $loginwechat_info;
			$this->load->view ( 'default/account_login_wechat', $data );
		}
	}
	function ajax_getwechatscanstatus($loginwechat_id){
		$sql = "SELECT * FROM " . DB_PRE () . "user_loginwechat WHERE loginwechat_id = " . $loginwechat_id;
		$loginwechat_info = $this->db->query ( $sql )->row_array ();
		if (! empty ( $loginwechat_info )) {
			echo $loginwechat_info['wechat_id'];
		}
	}
	function ajax_wechatscanstatus_action($loginwechat_id){
		$sql = "SELECT * FROM " . DB_PRE () . "user_loginwechat WHERE loginwechat_id = " . $loginwechat_id;
		$loginwechat_info = $this->db->query ( $sql )->row_array ();
		if (! empty ( $loginwechat_info )) {
			if($loginwechat_info['wechat_id'] != ''){
				$wechat_id = $loginwechat_info['wechat_id'];
	
				$sql = "SELECT * FROM " . DB_PRE () . "user_list WHERE wechat_id = '" . $wechat_id."'";
				$userinfo = $this->db->query ( $sql )->row_array ();
	
				if(!empty($userinfo)){
					// 正常返回数据(json)
					$arr = array ('uid' => $userinfo ['uid'],'user_type' => $userinfo ['user_type'],'user_phone' => $userinfo ['user_phone'] );
					$arr = serialize ( $arr );
					set_cookie ( 'rojoclothinginfo', $arr, time () + 86400 * 2 ); // 设置登录的session
						
						
					delete_cookie ( 'loginwechatinfo' );
						
					redirect('member/index');
				}else{
					// 正常返回数据(json)
					$arr = array ('loginwechat_id' => $loginwechat_id );
					$arr = serialize ( $arr );
					set_cookie ( 'loginwechatinfo', $arr, time () + 86400 * 1 ); // 设置登录的session
						
					$this->session->set_userdata ( 'menu', 'login' );
					$data ['website_title'] = '微信登录';
					$this->load->view ( 'default/account_login_wechat_xuanze', $data );
				}
			}
		}
	}
	//登出页面  ---- logout
	function tologout(){
		delete_cookie('rojoclothinginfo');
		redirect(base_url());
	}
	//忘记密码页面
	function toforgetpassword(){
		$this->session->set_userdata('menu', 'forgetpassword');
		$data['website_title'] = lang('cy_forgetpassword');
		$this->load->view('default/account_forgetpassword', $data);
	}
	//忘记密码页面--处理方法
	function forgetpassword(){
		$phone = $this->input->post('phone');
		$result = $this->UserModel->getuserinfo_ByPhone($phone);
		if(!empty($result)){
			// 正常返回数据(json)
			$arr=array('uid'=>$result['uid']);
			$arr=serialize($arr);
			set_cookie('forgetpasswordArr',$arr,time()+60*10);//设置登录的session
		}
	}
	//重置密码页面
	function toresetpassword(){
		$this->session->set_userdata('menu', 'resetpassword');
		$data['website_title'] = '重置密码';
		if(isset($_COOKIE['forgetpasswordArr'])){
			$forgetpasswordArr = unserialize($_COOKIE["forgetpasswordArr"]);
			$uid = $forgetpasswordArr['uid'];
			$this->load->view('default/account_resetpassword', $data);
		}
	}
	//重置密码页面 -- 处理方法
	function resetpassword(){
		if(isset($_COOKIE['forgetpasswordArr'])){
			$forgetpasswordArr = unserialize($_COOKIE["forgetpasswordArr"]);
			$uid = $forgetpasswordArr['uid'];
			$password = $this->input->post('password');
			
			$this->UserModel->edit_user($uid, array('password'=>md5($password)));
		}
	}
	//检查手机号码是否已经被注册
	function checkphoneisexists(){
		$phone = $this->input->post('phone');
		echo $this->UserModel->checkphoneisexists($phone);
	}
	//获取注册时的手机号码验证
	function togetphonecode_register(){
		$sms_phone=$this->input->post('phone');
		if(isMobile($sms_phone)==false){
			echo 'phoneerror';
		}else{
			//检查phone是否已经被注册
			$res = $this->UserModel->checkphoneisexists($sms_phone);
			if($res =='yes'){
				//手机号码已经存在!
				echo 'hasexists';
			}else{
				$sms_code = randkey_number ( 6 );
// 				$res = smssend ( $sms_phone, '【Rojo Clothing】欢迎注册Rojo Clothing，您的验证码是：' . $sms_code . '。如非本人操作, 请忽略本短信。' );
// 				if ($res == '操作成功') {
					// 添加到数据库中
					$arr = array ('sms_type' => 'register','sms_code' => $sms_code,'sms_phone' => $sms_phone,'date_year' => date ( 'Y' ),'date_month' => date ( 'm' ),'date_day' => date ( 'd' ),'created' => mktime (),'status' => 1 );
					$this->db->insert ( DB_PRE().'sms_code', $arr );
					// 正常返回数据(json)
					$arr=array('code'=>$sms_code,'phone'=>$sms_phone,'created'=>mktime());
					$arr=serialize($arr);
					set_cookie('registercode',$arr,time()+60*10);//设置登录的session
// 				} else {
// 					// 添加到数据库中
// 					$arr = array ('sms_type' => 'register','sms_code' => $sms_code,'sms_phone' => $sms_phone,'date_year' => date ( 'Y' ),'date_month' => date ( 'm' ),'date_day' => date ( 'd' ),'created' => mktime (),'status' => 0 );
// 					$this->db->insert ( 'a2live_sms_code', $arr );
// 					// 正常返回数据(json)
// 					$arr=array('code'=>$sms_code,'phone'=>$sms_phone,'created'=>mktime());
// 					$arr=serialize($arr);
// 					set_cookie('registercode',$arr,time()+60*10);//设置登录的session
// 				}
				echo $sms_code;
			}
		}
	}
	
	//获取的手机号码验证-------忘记密码时
	function togetphonecode_forgetpassword(){
		$sms_phone=$this->input->post('phone');
		if(isMobile($sms_phone)==false){
			echo 'phoneerror';
		}else{
			//检查phone是否已经被注册
			$res = $this->UserModel->checkphoneisexists($sms_phone);
			if($res =='no'){
				//手机号码已经存在!
				echo 'notexists';
			}else{
				$sms_code = randkey_number ( 6 );
				//$res = smssend ( $sms_phone, '【Rojo Clothing】欢迎注册Rojo Clothing，您的验证码是：' . $sms_code . '。如非本人操作, 请忽略本短信。' );
				//if ($res == '操作成功') {
				// 添加到数据库中
					$arr = array ('sms_type' => 'forgetpassword','sms_code' => $sms_code,'sms_phone' => $sms_phone,'date_year' => date ( 'Y' ),'date_month' => date ( 'm' ),'date_day' => date ( 'd' ),'created' => mktime (),'status' => 1 );
					$this->db->insert ( DB_PRE().'sms_code', $arr );
					// 正常返回数据(json)
					$arr=array('code'=>$sms_code,'phone'=>$sms_phone,'created'=>mktime());
					$arr=serialize($arr);
					set_cookie('forgetpasswordcode',$arr,time()+60*10);//设置登录的session
				//} else {
// 					// 添加到数据库中
// 					$arr = array ('sms_type' => 'forgetpassword','sms_code' => $sms_code,'sms_phone' => $sms_phone,'date_year' => date ( 'Y' ),'date_month' => date ( 'm' ),'date_day' => date ( 'd' ),'created' => mktime (),'status' => 0 );
// 					$this->db->insert ( DB_PRE().'sms_code', $arr );
// 					// 正常返回数据(json)
// 					$arr=array('code'=>$sms_code,'phone'=>$sms_phone,'created'=>mktime());
// 					$arr=serialize($arr);
// 					set_cookie('forgetpasswordcode',$arr,time()+60*10);//设置登录的session
// 					}
					echo $sms_code;
				}
			}
		}
	
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */