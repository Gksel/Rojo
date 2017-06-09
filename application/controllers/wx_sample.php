<?php
class Wx_sample extends CI_Controller {
	function __construct() {
		parent::__construct ();
		$this->isdebugmodel = 0;
	}
	
	function index() {
		if ($this->isdebugmodel == 1) {
			$this->load->view ( 'wechat/wx_sample' );
		} else {
			include_once ('weixin.class.php'); // 引用刚定义的微信消息处理类<br>define("TOKEN", "mmhelper");<br>define('DEBUG', true);
			$weixin = new Weixin ( 'gksel', false ); // 实例化
			
			$weixin->getMsg ();
			$type = $weixin->msgtype; // 消息类型
			$FromUserName = $weixin->msg ['FromUserName']; // 哪个用户给你发的消息,这个$FromUserName是微信加密之后的，但是每个用户都是一一对应的
			
			$postStr = $GLOBALS ["HTTP_RAW_POST_DATA"];
			$postObj = simplexml_load_string ( $postStr, 'SimpleXMLElement', LIBXML_NOCDATA );
			
			if ($type == 'event') {
				if ($postObj->EventKey == 'one_parent' || $postObj->EventKey == 'one_first' || $postObj->EventKey == 'one_second' || $postObj->EventKey == 'one_third' || $postObj->EventKey == 'one_four' || $postObj->EventKey == 'one_five' || $postObj->EventKey == 'two_parent' || $postObj->EventKey == 'two_first' || $postObj->EventKey == 'two_second' || $postObj->EventKey == 'two_third' || $postObj->EventKey == 'two_four' || $postObj->EventKey == 'two_five' || $postObj->EventKey == 'three_parent' || $postObj->EventKey == 'three_first' || $postObj->EventKey == 'three_second' || $postObj->EventKey == 'three_third' || $postObj->EventKey == 'three_four' || $postObj->EventKey == 'three_five') {
					if ($postObj->EventKey == 'one_parent') {
						$wechatmenu_id = 1;
					}else if ($postObj->EventKey == 'one_first') {
						$wechatmenu_id = 4;
					}else if ($postObj->EventKey == 'one_second') {
						$wechatmenu_id = 5;
					}else if ($postObj->EventKey == 'one_third') {
						$wechatmenu_id = 6;
					}else if ($postObj->EventKey == 'one_four') {
						$wechatmenu_id = 7;
					}else if ($postObj->EventKey == 'one_five') {
						$wechatmenu_id = 8;
					}else if ($postObj->EventKey == 'two_parent') {
						$wechatmenu_id = 2;
					}else if ($postObj->EventKey == 'two_first') {
						$wechatmenu_id = 9;
					}else if ($postObj->EventKey == 'two_second') {
						$wechatmenu_id = 10;
					}else if ($postObj->EventKey == 'two_third') {
						$wechatmenu_id = 11;
					}else if ($postObj->EventKey == 'two_four') {
						$wechatmenu_id = 12;
					}else if ($postObj->EventKey == 'two_five') {
						$wechatmenu_id = 13;
					}else if ($postObj->EventKey == 'three_parent') {
						$wechatmenu_id = 3;
					}else if ($postObj->EventKey == 'three_first') {
						$wechatmenu_id = 14;
					}else if ($postObj->EventKey == 'three_second') {
						$wechatmenu_id = 15;
					}else if ($postObj->EventKey == 'three_third') {
						$wechatmenu_id = 16;
					}else if ($postObj->EventKey == 'three_four') {
						$wechatmenu_id = 17;
					}else if ($postObj->EventKey == 'three_five') {
						$wechatmenu_id = 18;
					}else{
						$wechatmenu_id = 0;
					}
				
					$wechatmenuinfo = $this->WechatModel->getwechatmenuinfo($wechatmenu_id);
					if($wechatmenuinfo['wechatmenu_type'] == 1){//文字
						$reply = $weixin->makeText ( $wechatmenuinfo['wechatmenu_content'] );
						$weixin->reply ( $reply );
					}else if($wechatmenuinfo['wechatmenu_type'] == 2){//图片
						$reply = $weixin->makepicture ( $wechatmenuinfo['wechatmenu_pic'] );
						$weixin->reply ( $reply );
					}else if($wechatmenuinfo['wechatmenu_type'] == 3){//图文消息
						$results['items']=$this->WechatModel->pushnewslist($wechatmenuinfo['wechatmenu_news']);
						$reply = $weixin->makeNews($results);
						$weixin->reply($reply);
					}else if($wechatmenuinfo['wechatmenu_type'] == 4){//文字 +　图片
						$con = array('touser'=>$FromUserName, 'content'=>$wechatmenuinfo['wechatmenu_content']);
						$this->WechatModel->sendtext($con);
							
						$con = array('touser'=>$FromUserName, 'media_id'=>$wechatmenuinfo['wechatmenu_pic']);
						$this->WechatModel->sendpicture($con);
						//ob_clean ();
						//echo '';
						//exit ();
					}
				}else {
					if ($postObj->Event == 'subscribe') {
						$autoreplyinfo = $this->WechatModel->getautoreplyinfo(1);
						if($autoreplyinfo['autoreply_type'] == 1){//文字
							$reply = $weixin->makeText ( $autoreplyinfo['autoreply_content'] );
							$weixin->reply ( $reply );
						}else if($autoreplyinfo['autoreply_type'] == 2){//图片
							$reply = $weixin->makepicture ( $autoreplyinfo['autoreply_pic'] );
							$weixin->reply ( $reply );
						}else if($autoreplyinfo['autoreply_type'] == 3){//图文消息
							$results['items']=$this->WechatModel->pushnewslist($autoreplyinfo['autoreply_news']);
							$reply = $weixin->makeNews($results);
							$weixin->reply($reply);
						}else if($autoreplyinfo['autoreply_type'] == 4){//文字 +　图片
							$con = array('touser'=>$FromUserName, 'content'=>$autoreplyinfo['autoreply_content']);
							$this->WechatModel->sendtext($con);
							
							$con = array('touser'=>$FromUserName, 'media_id'=>$autoreplyinfo['autoreply_pic']);
							$this->WechatModel->sendpicture($con);
							
// 							ob_clean ();
// 							echo '';
// 							exit ();
						}
						
						$splitEventKey = explode ( '_', $postObj->EventKey );
						if (count ( $splitEventKey ) == 2) { // 绑定办公系统的帐号的。--之前未关注的
							$res = $this->WechatModel->loginwithwechat ( $splitEventKey [1], $FromUserName );
						}
						$this->WechatModel->subscribewithwechat ( $FromUserName );
					} else if ($postObj->Event == 'unsubscribe') { // 微信用户取消关注
						$this->WechatModel->unsubscribewithwechat ( $FromUserName );
						
						ob_clean ();
						echo '';
						exit ();
					} else {
						
						$res = $this->WechatModel->loginwithwechat ( $postObj->EventKey, $FromUserName );
						$this->WechatModel->subscribewithwechat ( $FromUserName );
						
						ob_clean ();
						echo '';
						exit ();
					}
				}
			}
			
			if ($type == 'text') { // 这里就是用户输入了文本信息
				if ($weixin->msg ['Content'] == 'Hello2BizUser') { // 微信用户第一次关注你的账号的时候，你的公众账号就会受到一条内容为'Hello2BizUser'的消息
					$reply = $weixin->makeText ( '你好' );
					$weixin->reply ( $reply );
				} else {
					$keyword = $weixin->msg ['Content']; // 用户的文本消息内容
					
// 					if ($keyword == '我') {
// 						$reply = $weixin->makeText ( 'orange-republic:' . $FromUserName );
// 						$weixin->reply ( $reply );
// 					} else {
						
						$sql = "SELECT * FROM ".DB_PRE()."wechat_auto_reply WHERE autoreply_id NOT IN (1) AND autoreply_name = '".addslashes($keyword)."'";
						$res = $this->db->query($sql)->row_array();
						if(!empty($res)){
							if($res['autoreply_type'] == 1){//文字
								$reply = $weixin->makeText ( $res['autoreply_content'] );
								$weixin->reply ( $reply );
							}else if($res['autoreply_type'] == 2){//图片
								$reply = $weixin->makepicture ( $res['autoreply_pic'] );
								$weixin->reply ( $reply );
							}else if($res['autoreply_type'] == 3){//图文消息
								$results['items']=$this->WechatModel->pushnewslist($res['autoreply_news']);
								$reply = $weixin->makeNews($results);
								$weixin->reply($reply);
							}else if($res['autoreply_type'] == 4){//文字 +　图片
								$con = array('touser'=>$FromUserName, 'content'=>$res['autoreply_content']);
								$this->WechatModel->sendtext($con);
								
								$con = array('touser'=>$FromUserName, 'media_id'=>$res['autoreply_pic']);
								$this->WechatModel->sendpicture($con);
								
								ob_clean ();
								echo '';
								exit ();
							}
						}else{
							ob_clean ();
							echo '';
							exit ();
						}
						
						
// 					}
				}
			} else if ($type == 'location') {
				ob_clean ();
				echo '';
				exit ();
			} else if ($type == 'image') {
				ob_clean ();
				echo '';
				exit ();
			} else if ($type == 'voice') {
				ob_clean ();
				echo '';
				exit ();
			}
		}
	}
	
	// 创建菜单
	// http://www.gksel.cn/weixin/index.php/wx_sample/createmenu/PvZH2IKBaDuTnZ-EIg7s4cllzeh6DHTxK7Meb2I19XHPshC6uEfIbIXuM9JzHxoQly69NOwMwXM16hsl6fc1hNq9hk_kmlwwNKIHsPVN2jA
	// 查询菜单
	// http://www.gksel.cn/weixin/index.php/wx_sample/getmenu/PvZH2IKBaDuTnZ-EIg7s4cllzeh6DHTxK7Meb2I19XHPshC6uEfIbIXuM9JzHxoQly69NOwMwXM16hsl6fc1hNq9hk_kmlwwNKIHsPVN2jA
	// 删除菜单
	// https://api.weixin.qq.com/cgi-bin/menu/delete?access_token=PvZH2IKBaDuTnZ-EIg7s4cllzeh6DHTxK7Meb2I19XHPshC6uEfIbIXuM9JzHxoQly69NOwMwXM16hsl6fc1hNq9hk_kmlwwNKIHsPVN2jA
	// https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=APPID&secret=APPSECRET
	
	/**
	 * 创建菜单
	 * 
	 * @param $access_token 已获取的ACCESS_TOKEN        	
	 */
	public function createmenu() {
		$access_token = $this->JssdkModel->getAccessToken ();
		
		$con=array('parent'=>0, 'orderby'=>'a.sort', 'orderby_res'=>'ASC');
		$menulist = $this->WechatModel->getwechatmenulist($con);
		$realmenulist = array();
		if(!empty($menulist)){
			for ($i = 0; $i < count($menulist); $i++) {
				if($menulist[$i]['status'] == 1){
					$realmenulist[] = $menulist[$i];
				}
			}
		}
		
		if(!empty($realmenulist)){
			$str = '';
			for ($i = 0; $i < count($menulist); $i++) {
				if($menulist[$i]['status'] == 1){
					$con=array('parent'=>$menulist[$i]['wechatmenu_id'], 'orderby'=>'a.sort', 'orderby_res'=>'ASC');
					$submenulist = $this->WechatModel->getwechatmenulist($con);
					$realsubmenulist = array();
					if(!empty($submenulist)){
						for ($j = 0; $j < count($submenulist); $j++) {
							if($submenulist[$j]['status'] == 1){
								$realsubmenulist[] = $submenulist[$j];
							}
						}
					}
					
					if(!empty($realsubmenulist)){
						$substr = '';
						for ($j = 0; $j < count($submenulist); $j++) {
							$key_name = '';
							if($i == 0){
								if($j == 0){
									$key_name = 'one_first';
								}else if($j == 1){
									$key_name = 'one_second';
								}else if($j == 2){
									$key_name = 'one_third';
								}else if($j == 3){
									$key_name = 'one_four';
								}else if($j == 4){
									$key_name = 'one_five';
								}
							}else if($i == 1){
								if($j == 0){
									$key_name = 'two_first';
								}else if($j == 1){
									$key_name = 'two_second';
								}else if($j == 2){
									$key_name = 'two_third';
								}else if($j == 3){
									$key_name = 'two_four';
								}else if($j == 4){
									$key_name = 'two_five';
								}
							}else if($i == 2){
								if($j == 0){
									$key_name = 'three_first';
								}else if($j == 1){
									$key_name = 'three_second';
								}else if($j == 2){
									$key_name = 'three_third';
								}else if($j == 3){
									$key_name = 'three_four';
								}else if($j == 4){
									$key_name = 'three_five';
								}
							}
							if($submenulist[$j]['status'] == 1){
								if($substr !=''){
									$substr .= ',';
								}
								if($submenulist[$j]['wechatmenu_type'] == 0){
									$substr .= '
										{
											"type":"view",
											"name":"'.$submenulist[$j]['wechatmenu_name'].'",
											"url":"'.$submenulist[$j]['wechatmenu_url'].'"
										}
									';
								}else{
									$substr .= '
										{
											"type":"click",
											"name":"'.$submenulist[$j]['wechatmenu_name'].'",
											"key":"'.$key_name.'"
										}
									';
								}
							}
						}
						if($str != ''){
							$str .= ',';
						}
						$str .= '
							{
					           "name":"'.$menulist[$i]['wechatmenu_name'].'",
				    		   "sub_button":['.$substr.']
						    }
						';
					}else{
						$key_parent = '';
						if($i == 0){
							$key_parent = 'one_parent';
						}else if($i == 1){
							$key_parent = 'two_parent';
						}else if($i == 2){
							$key_parent = 'three_parent';
						}
						if($str != ''){
							$str .= ',';
						}
						if($menulist[$i]['wechatmenu_type'] == 0){
							$str .= '
								{
						           "name":"'.$menulist[$i]['wechatmenu_name'].'",
					    		   "type":"view",
					    		   "url":"'.$menulist[$i]['wechatmenu_url'].'"
							    }
							';
						}else{
							$str .= '
								{
						           "name":"'.$menulist[$i]['wechatmenu_name'].'",
					    		   "type":"click",
					    		   "key":"'.$key_parent.'"
							    }
							';
						}
					}
				}
			}
		}
		
		$data = '{"button":['.$str.']}';
// 		echo $data;exit;
// 		$data = '{
//     	 "button":[
//     		{
// 	           "name":"儒卓服装",
//     		   "sub_button":[
// 		            {
// 		               "type":"view",
// 		               "name":"关于 About",
// 		               "url":""
// 		            },
// 			    	 {
// 		               "type":"view",
// 		               "name":"品牌 Brand",
// 		               "url":""
// 		            },
// 			    	 {
// 		               "type":"view",
// 		               "name":"店铺 Store",
// 		               "url":""
// 		            },
// 			    	 {
// 		               "type":"view",
// 		               "name":"预定 Bookings",
// 		               "url":""
// 		            }
// 		          ]
// 		    },{
// 	           "name":"儒卓生活",
//     		   "sub_button":[
// 		            {
// 		               "type":"view",
// 		               "name":"儒卓期刊 Journal",
// 		               "url":"http://mp.weixin.qq.com/s?__biz=MzUzNDAzMTY4MQ==&mid=100000007&idx=1&sn=c254389288edae83c38cb6a683e6b68f&chksm=7a9bbd294dec343ffec1e585948813f022be565a65119d400e38888d75236b2a1de5b899e259&scene=18#wechat_redirect"
// 		            },
// 			    	 {
// 		               "type":"view",
// 		               "name":"中国绅士 GIC",
// 		               "url":""
// 		            },
// 			    	 {
// 		               "type":"view",
// 		               "name":"时装攻略 Style",
// 		               "url":""
// 		            },
// 			    	 {
// 		               "type":"view",
// 		               "name":"社会责任 CSR",
// 		               "url":""
// 		            }
// 		          ]
// 		    }
// 		  ]
// 		}';
		
		$ch = curl_init ();
		curl_setopt ( $ch, CURLOPT_URL, "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=" . $access_token );
		curl_setopt ( $ch, CURLOPT_CUSTOMREQUEST, "POST" );
		curl_setopt ( $ch, CURLOPT_SSL_VERIFYPEER, FALSE );
		curl_setopt ( $ch, CURLOPT_SSL_VERIFYHOST, FALSE );
		curl_setopt ( $ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)' );
		curl_setopt ( $ch, CURLOPT_FOLLOWLOCATION, 1 );
		curl_setopt ( $ch, CURLOPT_AUTOREFERER, 1 );
		curl_setopt ( $ch, CURLOPT_POSTFIELDS, $data );
		curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
		$tmpInfo = curl_exec ( $ch );
		if (curl_errno ( $ch )) {
			return curl_error ( $ch );
		}
		print_r ( $tmpInfo );
		exit ();
		curl_close ( $ch );
		return $tmpInfo;
	}
	/**
	 * 查询菜单
	 * 
	 * @param $access_token 已获取的ACCESS_TOKEN        	
	 */
	function getmenu() {
		$access_token = $this->JssdkModel->getAccessToken ();
		
		// code...
		$url = "https://api.weixin.qq.com/cgi-bin/menu/get?access_token=" . $access_token;
		$data = file_get_contents ( $url );
		echo $data;
		return $data;
	}
	/**
	 * 删除菜单
	 * 
	 * @param $access_token 已获取的ACCESS_TOKEN        	
	 */
	function delmenu() {
		// 获取 access_token
		$access_token = $this->JssdkModel->getAccessToken ();
		
		// code...
		$url = "https://api.weixin.qq.com/cgi-bin/menu/delete?access_token=" . $access_token;
		$data = json_decode ( file_get_contents ( $url ), true );
		if ($data ['errcode'] == 0) {
			// code...
			return true;
		} else {
			return false;
		}
	}
	function getallonlinewechatusers(){
		$ACC_TOKEN = $this->JssdkModel->getAccessToken ();
	
		$url = "https://api.weixin.qq.com/cgi-bin/user/get?access_token=".$ACC_TOKEN."&next_openid=";
		$post_data = '{}';
			
		$output=do_post_request($url,$post_data);
		//打印获得的数据
		$output=$output=json_decode($output);
		$output=$output->data;
		$output=$output->openid;
		print_r($output);
	}
	
}
