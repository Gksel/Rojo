<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Feedback extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->session->set_userdata('menu','feedback');
		$admin=$this->session->userdata ( 'admin' );
		if(empty($admin)){
		    redirect(base_url().'index.php/admin');
		}
		$lang = $this->session->userdata('lang');
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
	
	function index(){
		$row=$this->input->get('row');
		if($row==""){$row=0;}
		$page = 50;
		$data['row']=$row;
		$data['page']=$page;
	
		$keyword = $this->input->get('keyword');
		$con=array('orderby'=>'a.feedback_id','orderby_res'=>'DESC','row'=>$row,'page'=>$data['page']);
		if($keyword!=""){
			$con['keyword'] = $keyword;
		}
		$data['feedbacklist']=$this->FeedbackModel->getfeedbacklist($con);
		$data['count']=$this->FeedbackModel->getfeedbacklist($con,1);
		$url = base_url().'index.php/admins/feedback/index?keyword='.$keyword.'&page='.$page;
		$data['fy'] = fy_backend($data['count'],$row,$url,$data['page'],5,2);
		$this->load->view('admin/feedback_list',$data);
	}
	
	//回复意见反馈
	function toreply_feedback($feedback_id){
		//跳转到列表页面
		$backurl = $this->input->get('backurl');
		if($backurl!=""){
			$backurl=str_replace('slash_tag','/',$backurl);
			if(base64_decode($backurl)!=""){
				$decodebackurl = base64_decode($backurl);
			}else{
				$decodebackurl = base_url().'index.php/admins/feedback/index';
			}
		}else{
			$decodebackurl = base_url().'index.php/admins/feedback/index';
		}
		$data['decodebackurl'] = $decodebackurl;
		$data['backurl'] = $backurl;
		//导航栏
		$data['url'] = '<a href="'.$decodebackurl.'">'.lang('dz_product_manage').'</a> &gt; '.lang('dz_product_edit');
		
		$data['feedbackinfo']=$this->FeedbackModel->getfeedbackinfo($feedback_id);
		$this->load->view('admin/feedback_edit',$data);
	}
	//回复意见反馈 ------- 处理方法
	function reply_feedback($feedback_id){
		//商品信息
		$feedback_name = $this->input->post('feedback_name');//昵称
		
		$arr = array('edited'=>mktime());
		//商品信息
		$arr['feedback_name'] = $feedback_name;
		$this->FeedbackModel->edit_feedback($feedback_id, $arr);
		
		//跳转到列表页面
		$backurl = $this->input->post('backurl');
		if($backurl!=""){
			$backurl=str_replace('slash_tag','/',$backurl);
			if(base64_decode($backurl)!=""){
				$decodebackurl = base64_decode($backurl);
			}else{
				$decodebackurl = base_url().'index.php/admins/feedback/index';
			}
		}else{
			$decodebackurl = base_url().'index.php/admins/feedback/index';
		}
		echo json_encode(array('backurl'=>$decodebackurl));
	}
	//删除商品
	function del_feedback($feedback_id){
		$this->FeedbackModel->del_feedback($feedback_id);
	}
	
	
}