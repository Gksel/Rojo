<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Journal extends CI_Controller {

	function __construct(){
		parent::__construct();
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

	public function index(){
		$this->session->set_userdata('menu', 'journal');
		$this->load->view('default/journal_list');
	}
	
	
	function articlelist($shorturl){
		$this->session->set_userdata('submenu', 'journal_'.$shorturl);
		$data['categoryinfo'] = $this->CmsModel->getarticle_categoryinfo_BYshorturl($shorturl);
		
		$con = array('orderby'=>'a.article_id','orderby_res'=>'ASC');
		$con['category_id'] = $data['categoryinfo']['category_id'];
		$data['articlelist']=$this->CmsModel->getarticlelist($con);
		
		
		$this->load->view('default/journal_article_list', $data);
	}
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */