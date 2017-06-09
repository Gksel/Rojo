<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order extends CI_Controller{

	function __construct(){
		parent::__construct();
		
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
	//产品列表
	function index(){
		
		$row=$this->input->get('row');
		if($row==""){$row=0;}
		$page = 50;
		$data['row']=$row;
		$data['page']=$page;
	
		$keyword = $this->input->get('keyword');
		$status = $this->input->get('status');
		
		if($status == 0){
			$this->session->set_userdata('menu','pendingorders');
		}else if($status == 1){
			$this->session->set_userdata('menu','deliveryorders');
		}else if($status == 2){
			$this->session->set_userdata('menu','printorders');
		}else if($status == 3){
			$this->session->set_userdata('menu','finishorders');
		}else if($status == 'all'){
			$this->session->set_userdata('menu','order');
		}else{
			$this->session->set_userdata('menu','order');
		}
		$con=array('orderby'=>'a.product_id','orderby_res'=>'DESC','row'=>$row,'page'=>$data['page']);
		if($keyword!=""){
			$con['keyword'] = $keyword;
		}
		$url = base_url().'index.php/admins/order/index?keyword='.$keyword.'&page='.$page;
		$this->load->view('admin/order_list',$data);
	}
	
	
	
}