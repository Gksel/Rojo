<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');class Order extends CI_Controller {	function __construct(){		session_start();		parent::__construct();		$lang = $this->session->userdata('lang');		if($lang=='ch'){			$this->session->set_userdata('lang','ch');			$this->langtype='_ch';			$this->lang->load('gksel','chinese');		}else{			$this->session->set_userdata('lang','en');			$this->langtype='_en';			$this->lang->load('gksel','english');		}	}	public function index(){		$this->session->set_userdata('menu', 'order');		$data['website_title'] = 'Rojo Clothing';		$this->load->view('default/order_list', $data);	}		function details_list($product_id){		$data['productinfo'] = $this->ProductModel->getproductinfo($product_id);		$this->load->view('default/details_list', $data);	}	function shop_info(){		$this->load->view('default/shop_info');	}}/* End of file welcome.php *//* Location: ./application/controllers/welcome.php */