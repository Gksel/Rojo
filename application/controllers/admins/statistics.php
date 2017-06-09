<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Statistics extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->session->set_userdata('menu','statistics');
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
		$this->load->view('admin/statistics_list');
	}
	
	
	
}