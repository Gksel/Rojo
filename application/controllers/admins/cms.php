<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cms extends CI_Controller{

	function __construct(){
		parent::__construct();
		
		$admin=$this->session->userdata ( 'admin' );
		if(empty($admin)){
		    redirect(base_url().'index.php/admin');
		}else{
			$this->admin_id = $admin ['admin_id'];
			$this->admin_username = $admin ['admin_username'];
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
	//关键字列表
	function keywordlist(){
		$this->session->set_userdata('menu','keyword');
		$con=array('orderby'=>'a.sort','orderby_res'=>'ASC');
		$data['keywordlist']=$this->CmsModel->getkeywordlist($con);
		$this->load->view('admin/cms_keyword_list',$data);
	}
	//关键字列表 -- 排序功能
	function editkeyword_sort(){
		$idarr=$this->input->post('idarr');
		$newsrot=$this->input->post('newsrot');
		if(!empty($idarr)){
			for($i=0;$i<count($idarr);$i++){
				$arr = array('sort'=>$newsrot[$i]);
				$this->CmsModel->edit_keyword($idarr[$i], $arr);
			}
		}
	}
	//添加关键字
	function toadd_keyword(){
		//跳转到列表页面
		$backurl = base64_encode(base_url().'index.php/admins/cms/keywordlist');
		if($backurl!=""){
			$backurl=str_replace('slash_tag','/',$backurl);
			if(base64_decode($backurl)!=""){
				$decodebackurl = base64_decode($backurl);
			}else{
				$decodebackurl = base_url().'index.php/admins/cms/keywordlist';
			}
		}else{
			$decodebackurl = base_url().'index.php/admins/cms/keywordlist';
		}
		$data['decodebackurl'] = $decodebackurl;
		$data['backurl'] = $backurl;
		//导航栏
		$data['url'] = '<a href="'.$decodebackurl.'">'.lang('cy_keyword_manage').'</a> &gt; '.lang('cy_keyword_add');
	
		$this->load->view('admin/cms_keyword_add',$data);
	}
	//添加关键字 ------- 处理方法
	function add_keyword(){
		//关键字信息
		$keyword_name_en = $this->input->post('keyword_name_en');//关键字名称
		$keyword_name_ch = $this->input->post('keyword_name_ch');//关键字名称
	
		$arr = array('edited_author'=>$this->admin_username, 'created'=>mktime(), 'edited'=>mktime());
		//文章分类信息
		$arr['keyword_name_en'] = $keyword_name_en;
		$arr['keyword_name_ch'] = $keyword_name_ch;
		$keyword_id = $this->CmsModel->add_keyword($arr);
	
		//跳转到列表页面
		$backurl = $this->input->post('backurl');
		if($backurl!=""){
			$backurl=str_replace('slash_tag','/',$backurl);
			if(base64_decode($backurl)!=""){
				$decodebackurl = base64_decode($backurl);
			}else{
				$decodebackurl = base_url().'index.php/admins/cms/keywordlist';
			}
		}else{
			$decodebackurl = base_url().'index.php/admins/cms/keywordlist';
		}
		echo json_encode(array('backurl'=>$decodebackurl));
	}
	//添加关键字 ------- 处理方法ajax
	function add_keyword_ajax(){
		//关键字信息
		$keyword_name_en = $this->input->post('keyword_name_en');//关键字名称
		$keyword_name_ch = $this->input->post('keyword_name_ch');//关键字名称
	
		$arr = array('edited_author'=>$this->admin_username, 'created'=>mktime(), 'edited'=>mktime());
		//文章分类信息
		$arr['keyword_name_en'] = $keyword_name_en;
		$arr['keyword_name_ch'] = $keyword_name_ch;
		$keyword_id = $this->CmsModel->add_keyword($arr);
		echo json_encode(array('keyword_id'=>$keyword_id, 'keyword_name_en'=>$keyword_name_en, 'keyword_name_ch'=>$keyword_name_ch));
	}
	//修改关键字
	function toedit_keyword($keyword_id){
		//跳转到列表页面
		$backurl = $this->input->get('backurl');
		if($backurl!=""){
			$backurl=str_replace('slash_tag','/',$backurl);
			if(base64_decode($backurl)!=""){
				$decodebackurl = base64_decode($backurl);
			}else{
				$decodebackurl = base_url().'index.php/admins/cms/keywordlist';
			}
		}else{
			$decodebackurl = base_url().'index.php/admins/cms/keywordlist';
		}
		$data['decodebackurl'] = $decodebackurl;
		$data['backurl'] = $backurl;
		//导航栏
		$data['url'] = '<a href="'.$decodebackurl.'">'.lang('cy_keyword_manage').'</a> &gt; '.lang('cy_keyword_edit');
	
		$data['keywordinfo']=$this->CmsModel->getkeywordinfo($keyword_id);
		$this->load->view('admin/cms_keyword_edit',$data);
	}
	//修改关键字 ------- 处理方法
	function edit_keyword($keyword_id){
		//关键字信息
		$keyword_name_en = $this->input->post('keyword_name_en');//关键字名称
		$keyword_name_ch = $this->input->post('keyword_name_ch');//关键字名称
	
		$arr = array('edited_author'=>$this->admin_username, 'edited'=>mktime());
		//关键字信息
		$arr['keyword_name_en'] = $keyword_name_en;
		$arr['keyword_name_ch'] = $keyword_name_ch;
		$this->CmsModel->edit_keyword($keyword_id, $arr);
	
		//跳转到列表页面
		$backurl = $this->input->post('backurl');
		if($backurl!=""){
			$backurl=str_replace('slash_tag','/',$backurl);
			if(base64_decode($backurl)!=""){
				$decodebackurl = base64_decode($backurl);
			}else{
				$decodebackurl = base_url().'index.php/admins/cms/keywordlist';
			}
		}else{
			$decodebackurl = base_url().'index.php/admins/cms/keywordlist';
		}
		echo json_encode(array('backurl'=>$decodebackurl));
	}
	//删除关键字
	function del_keyword($keyword_id){
		$this->CmsModel->del_keyword($keyword_id);
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	//文章分类列表
	function article_category_list(){
		$this->session->set_userdata('menu','article_category');
		$con=array('orderby'=>'a.sort','orderby_res'=>'ASC');
		$data['articlecategorylist']=$this->CmsModel->getarticlecategorylist($con);
		$this->load->view('admin/article_category_list',$data);
	}
	//文章分类列表 -- 排序功能
	function editarticle_category_sort(){
		$idarr=$this->input->post('idarr');
		$newsrot=$this->input->post('newsrot');
		if(!empty($idarr)){
			for($i=0;$i<count($idarr);$i++){
				$arr = array('sort'=>$newsrot[$i]);
				$this->CmsModel->edit_article_category($idarr[$i], $arr);
			}
		}
	}
	//添加文章分类
	function toadd_article_category(){
		//跳转到列表页面
		$backurl = base64_encode(base_url().'index.php/admins/cms/article_category_list');
		if($backurl!=""){
			$backurl=str_replace('slash_tag','/',$backurl);
			if(base64_decode($backurl)!=""){
				$decodebackurl = base64_decode($backurl);
			}else{
				$decodebackurl = base_url().'index.php/admins/cms/article_category_list';
			}
		}else{
			$decodebackurl = base_url().'index.php/admins/cms/article_category_list';
		}
		$data['decodebackurl'] = $decodebackurl;
		$data['backurl'] = $backurl;
		//导航栏
		$data['url'] = '<a href="'.$decodebackurl.'">'.lang('cy_article_category_manage').'</a> &gt; '.lang('cy_article_category_add');
	
		$this->load->view('admin/article_category_add',$data);
	}
	//添加文章分类 ------- 处理方法
	function add_article_category(){
		//文章分类信息
		$category_name_en = $this->input->post('category_name_en');//文章分类名称
		$category_name_ch = $this->input->post('category_name_ch');//文章分类名称
	
		$arr = array('edited_author'=>$this->admin_username, 'created'=>mktime(), 'edited'=>mktime());
		//文章分类信息
		$arr['category_name_en'] = $category_name_en;
		$arr['category_name_ch'] = $category_name_ch;
		$category_id = $this->CmsModel->add_article_category($arr);
	
		//跳转到列表页面
		$backurl = $this->input->post('backurl');
		if($backurl!=""){
			$backurl=str_replace('slash_tag','/',$backurl);
			if(base64_decode($backurl)!=""){
				$decodebackurl = base64_decode($backurl);
			}else{
				$decodebackurl = base_url().'index.php/admins/cms/article_category_list';
			}
		}else{
			$decodebackurl = base_url().'index.php/admins/cms/article_category_list';
		}
		echo json_encode(array('backurl'=>$decodebackurl));
	}
	//添加文章分类 ------- 处理方法ajax
	function add_article_category_ajax(){
		//文章分类信息
		$category_name_en = $this->input->post('category_name_en');//文章分类名称
		$category_name_ch = $this->input->post('category_name_ch');//文章分类名称
	
		$arr = array('edited_author'=>$this->admin_username, 'created'=>mktime(), 'edited'=>mktime());
		//文章分类信息
		$arr['category_name_en'] = $category_name_en;
		$arr['category_name_ch'] = $category_name_ch;
		$category_id = $this->CmsModel->add_article_category($arr);
	
		echo json_encode(array('category_id'=>$category_id, 'category_name_en'=>$category_name_en, 'category_name_ch'=>$category_name_ch));
	}
	
	//修改文章分类
	function toedit_article_category($category_id){
		//跳转到列表页面
		$backurl = $this->input->get('backurl');
		if($backurl!=""){
			$backurl=str_replace('slash_tag','/',$backurl);
			if(base64_decode($backurl)!=""){
				$decodebackurl = base64_decode($backurl);
			}else{
				$decodebackurl = base_url().'index.php/admins/cms/article_category_list';
			}
		}else{
			$decodebackurl = base_url().'index.php/admins/cms/article_category_list';
		}
		$data['decodebackurl'] = $decodebackurl;
		$data['backurl'] = $backurl;
		//导航栏
		$data['url'] = '<a href="'.$decodebackurl.'">'.lang('cy_article_category_manage').'</a> &gt; '.lang('cy_article_category_edit');
	
		$data['article_categoryinfo']=$this->CmsModel->getarticle_categoryinfo($category_id);
		$this->load->view('admin/article_category_edit',$data);
	}
	//修改文章分类 ------- 处理方法
	function edit_article_category($category_id){
		//文章分类信息
		$category_name_en = $this->input->post('category_name_en');//文章分类名称
		$category_name_ch = $this->input->post('category_name_ch');//文章分类名称
	
		$arr = array('edited_author'=>$this->admin_username, 'edited'=>mktime());
		//文章分类信息
		$arr['category_name_en'] = $category_name_en;
		$arr['category_name_ch'] = $category_name_ch;
		$this->CmsModel->edit_article_category($category_id, $arr);
	
		//跳转到列表页面
		$backurl = $this->input->post('backurl');
		if($backurl!=""){
			$backurl=str_replace('slash_tag','/',$backurl);
			if(base64_decode($backurl)!=""){
				$decodebackurl = base64_decode($backurl);
			}else{
				$decodebackurl = base_url().'index.php/admins/cms/article_category_list';
			}
		}else{
			$decodebackurl = base_url().'index.php/admins/cms/article_category_list';
		}
		echo json_encode(array('backurl'=>$decodebackurl));
	}
	//删除文章分类
	function del_article_category($category_id){
		$this->CmsModel->del_article_category($category_id);
	}
	
	//文章列表
	function article_list(){
		$keyword = $this->input->get('keyword');
		$category_id = $this->input->get('category_id');
		
		$this->session->set_userdata('menu','article');
		$con=array('orderby'=>'a.article_id','orderby_res'=>'ASC');
		if($keyword!=""){
			$con['keyword'] = $keyword;
		}
		if($category_id != ""){
			$con['category_id'] = $category_id;
		}
		$data['articlelist']=$this->CmsModel->getarticlelist($con);
		$this->load->view('admin/article_list',$data);
	}
	//添加文章
	function toadd_article(){
		//跳转到列表页面
		$backurl = base64_encode(base_url().'index.php/admins/cms/article_list');
		if($backurl!=""){
			$backurl=str_replace('slash_tag','/',$backurl);
			if(base64_decode($backurl)!=""){
				$decodebackurl = base64_decode($backurl);
			}else{
				$decodebackurl = base_url().'index.php/admins/cms/article_list';
			}
		}else{
			$decodebackurl = base_url().'index.php/admins/cms/article_list';
		}
		$data['decodebackurl'] = $decodebackurl;
		$data['backurl'] = $backurl;
		//导航栏
		$data['url'] = '<a href="'.$decodebackurl.'">'.lang('cy_article_manage').'</a> &gt; '.lang('cy_article_add');
	
		$this->load->view('admin/article_add',$data);
	}
	//添加文章 ------- 处理方法
	function add_article(){
		//文章分类信息
		$article_name_en = $this->input->post('article_name_en');//文章名称
		$article_name_ch = $this->input->post('article_name_ch');//文章名称
		$article_url = $this->input->post('article_url');//文章链接
		$article_content_en = $this->input->post('article_content_en');//文章内容
		$article_content_ch = $this->input->post('article_content_ch');//文章内容
		$category_id = $this->input->post('category_id');//文章分类
		$keyword_id = $this->input->post('keyword_id');//关键字
	
		$arr = array('edited_author'=>$this->admin_username, 'created'=>mktime(), 'edited'=>mktime());
		//文章信息
		$arr['article_name_en'] = $article_name_en;
		$arr['article_name_ch'] = $article_name_ch;
		$arr['article_url'] = $article_url;
		$arr['article_content_en'] = $article_content_en;
		$arr['article_content_ch'] = $article_content_ch;
		$article_id = $this->CmsModel->add_article($arr);
		
		//----修改图片路径--START-----//
		$arr_pic=array();
		$img1_gksel = $this->input->post('img1_gksel');//商品图片
		$arr_pic[]=array('num'=>1,'item'=>'article_pic','value'=>$img1_gksel);
		$arr_pic=autotofilepath('cms',$arr_pic);
		if(!empty($arr_pic)){
			$this->CmsModel->edit_article($article_id,$arr_pic);
		}
		//----修改图片路径--END-----//
		
		//处理多个分类
		$this->db->delete(DB_PRE().'article_category', array('article_id'=>$article_id));
		if(!empty($category_id)){
			for ($i = 0; $i < count($category_id); $i++) {
				$this->db->insert(DB_PRE().'article_category', array('article_id'=>$article_id, 'category_id'=>$category_id[$i]));
			}
		}
		//处理多个关键字
		$this->db->delete(DB_PRE().'article_keyword', array('article_id'=>$article_id));
		if(!empty($keyword_id)){
			for ($i = 0; $i < count($keyword_id); $i++) {
				$this->db->insert(DB_PRE().'article_keyword', array('article_id'=>$article_id, 'keyword_id'=>$keyword_id[$i]));
			}
		}
	
		//跳转到列表页面
		$backurl = $this->input->post('backurl');
		if($backurl!=""){
			$backurl=str_replace('slash_tag','/',$backurl);
			if(base64_decode($backurl)!=""){
				$decodebackurl = base64_decode($backurl);
			}else{
				$decodebackurl = base_url().'index.php/admins/cms/article_list';
			}
		}else{
			$decodebackurl = base_url().'index.php/admins/cms/article_list';
		}
		echo json_encode(array('backurl'=>$decodebackurl));
	}
	//修改文章
	function toedit_article($article_id){
		//跳转到列表页面
		$backurl = $this->input->get('backurl');
		if($backurl!=""){
			$backurl=str_replace('slash_tag','/',$backurl);
			if(base64_decode($backurl)!=""){
				$decodebackurl = base64_decode($backurl);
			}else{
				$decodebackurl = base_url().'index.php/admins/cms/article_list';
			}
		}else{
			$decodebackurl = base_url().'index.php/admins/cms/article_list';
		}
		$data['decodebackurl'] = $decodebackurl;
		$data['backurl'] = $backurl;
		//导航栏
		$data['url'] = '<a href="'.$decodebackurl.'">'.lang('cy_article_manage').'</a> &gt; '.lang('cy_article_edit');
	
		$data['articleinfo']=$this->CmsModel->getarticleinfo($article_id);
		$this->load->view('admin/article_edit',$data);
	}
	//修改文章 ------- 处理方法
	function edit_article($article_id){
		//文章分类信息
		$article_name_en = $this->input->post('article_name_en');//文章名称
		$article_name_ch = $this->input->post('article_name_ch');//文章名称
		$article_url = $this->input->post('article_url');//文章链接
		$article_content_en = $this->input->post('article_content_en');//文章内容
		$article_content_ch = $this->input->post('article_content_ch');//文章内容
		$category_id = $this->input->post('category_id');//文章分类
		$keyword_id = $this->input->post('keyword_id');//关键字
	
		$arr = array('edited_author'=>$this->admin_username, 'edited'=>mktime());
		//文章分类信息
		$arr['article_name_en'] = $article_name_en;
		$arr['article_name_ch'] = $article_name_ch;
		$arr['article_url'] = $article_url;
		$arr['article_content_en'] = $article_content_en;
		$arr['article_content_ch'] = $article_content_ch;
		$this->CmsModel->edit_article($article_id, $arr);
		
		//----修改图片路径--START-----//
		$arr_pic=array();
		$img1_gksel = $this->input->post('img1_gksel');//商品图片
		$arr_pic[]=array('num'=>1,'item'=>'article_pic','value'=>$img1_gksel);
		$arr_pic=autotofilepath('cms',$arr_pic);
		if(!empty($arr_pic)){
			$this->CmsModel->edit_article($article_id,$arr_pic);
		}
		//----修改图片路径--END-----//
		
		//处理多个分类
		$this->db->delete(DB_PRE().'article_category', array('article_id'=>$article_id));
		if(!empty($category_id)){
			for ($i = 0; $i < count($category_id); $i++) {
				$this->db->insert(DB_PRE().'article_category', array('article_id'=>$article_id, 'category_id'=>$category_id[$i]));
			}
		}
		//处理多个关键字
		$this->db->delete(DB_PRE().'article_keyword', array('article_id'=>$article_id));
		if(!empty($keyword_id)){
			for ($i = 0; $i < count($keyword_id); $i++) {
				$this->db->insert(DB_PRE().'article_keyword', array('article_id'=>$article_id, 'keyword_id'=>$keyword_id[$i]));
			}
		}
	
		//跳转到列表页面
		$backurl = $this->input->post('backurl');
		if($backurl!=""){
			$backurl=str_replace('slash_tag','/',$backurl);
			if(base64_decode($backurl)!=""){
				$decodebackurl = base64_decode($backurl);
			}else{
				$decodebackurl = base_url().'index.php/admins/cms/article_list';
			}
		}else{
			$decodebackurl = base_url().'index.php/admins/cms/article_list';
		}
		echo json_encode(array('backurl'=>$decodebackurl));
	}
	//删除文章
	function del_article($article_id){
		$this->CmsModel->del_article($article_id);
	}
	
	
	
	
	
	
	//cms列表
	function cmslist(){
		$this->session->set_userdata('menu','cms');
		$row=$this->input->get('row');
		if($row==""){$row=0;}
		$page = 50;
		$data['row']=$row;
		$data['page']=$page;
	
		$keyword = $this->input->get('keyword');
		$con=array('orderby'=>'a.cms_id','orderby_res'=>'ASC','row'=>$row,'page'=>$data['page']);
		if($keyword!=""){
			$con['keyword'] = $keyword;
		}
		$data['cmslist']=$this->CmsModel->getcmslist($con);
		$data['count']=$this->CmsModel->getcmslist($con,1);
		$url = base_url().'index.php/admins/cms/cmslist?keyword='.$keyword.'&page='.$page;
		$data['fy'] = fy_backend($data['count'],$row,$url,$data['page'],5,2);
		$this->load->view('admin/cms_list',$data);
	}
	
	//添加cms
	function toadd_cms(){
		//跳转到列表页面
		$backurl = base64_encode(base_url().'index.php/admins/cms/cmslist');
		if($backurl!=""){
			$backurl=str_replace('slash_tag','/',$backurl);
			if(base64_decode($backurl)!=""){
				$decodebackurl = base64_decode($backurl);
			}else{
				$decodebackurl = base_url().'index.php/admins/cms/cmslist';
			}
		}else{
			$decodebackurl = base_url().'index.php/admins/cms/cmslist';
		}
		$data['decodebackurl'] = $decodebackurl;
		$data['backurl'] = $backurl;
		//导航栏
		$data['url'] = '<a href="'.$decodebackurl.'">'.lang('cy_commoncontent_manage').'</a> &gt; '.lang('cy_commoncontent_add');
	
		$this->load->view('admin/cms_add',$data);
	}
	//添加cms ------- 处理方法
	function add_cms(){
		$lancodelist = getlancodelist();//多语言
		$postOBJ = $this->input->post('GETOBJ');
		$postOBJ_type = $this->input->post('GETOBJ_type');
		$postLANGOBJ = $this->input->post('GETLANGOBJ');
		$postLANGOBJ_type = $this->input->post('GETLANGOBJ_type');
		//获取内容
		if (!empty($postOBJ)) {
			for ($p = 0; $p < count($postOBJ); $p++) {
				${$postOBJ[$p]} = $this->input->post($postOBJ[$p]);
				if($postOBJ_type[$p] == 'ckeditor'){
					${$postOBJ[$p]} = str_replace("{sign_douhao}", "'", ${$postOBJ[$p]});
					${$postOBJ[$p]} = str_replace("<br />", "\n", ${$postOBJ[$p]});
					${$postOBJ[$p]} = str_replace(base_url(), "{base_url}", ${$postOBJ[$p]});
					
					${$postOBJ[$p]} = str_replace("/(width:(\s)*(\d){1,3}(%|(px));(\s)height:(\s)*(\d){1,3}(%|(px));)/", "max-width:100%;", ${$postOBJ[$p]});
				}else{
					${$postOBJ[$p]} = replace_content(defaultreparr(), ${$postOBJ[$p]});
				}
			}
		}
		if (!empty($postLANGOBJ)) {
			for ($lc = 0; $lc < count($lancodelist); $lc++) {
				for ($p = 0; $p < count($postLANGOBJ); $p++) {
					${$postLANGOBJ[$p].$lancodelist[$lc]['langtype']} = $this->input->post($postLANGOBJ[$p].$lancodelist[$lc]['langtype']);//产品名称
					if($postLANGOBJ_type[$p] == 'ckeditor'){
						${$postLANGOBJ[$p].$lancodelist[$lc]['langtype']} = str_replace("{sign_douhao}", "'", ${$postLANGOBJ[$p].$lancodelist[$lc]['langtype']});
						${$postLANGOBJ[$p].$lancodelist[$lc]['langtype']} = str_replace("<br />", "\n", ${$postLANGOBJ[$p].$lancodelist[$lc]['langtype']});
						${$postLANGOBJ[$p].$lancodelist[$lc]['langtype']} = str_replace(base_url(), "{base_url}", ${$postLANGOBJ[$p].$lancodelist[$lc]['langtype']});
						
						${$postLANGOBJ[$p].$lancodelist[$lc]['langtype']} = str_replace("/(width:(\s)*(\d){1,3}(%|(px));(\s)height:(\s)*(\d){1,3}(%|(px));)/", "max-width:100%;", ${$postLANGOBJ[$p].$lancodelist[$lc]['langtype']});
					}else{
						${$postLANGOBJ[$p].$lancodelist[$lc]['langtype']} = replace_content(defaultreparr(), ${$postLANGOBJ[$p].$lancodelist[$lc]['langtype']});
					}
				}
			}
		}
		$arr = array('created'=>mktime(), 'edited_author'=>$this->admin_username, 'edited'=>mktime());
		//处理内容到数据库
		if (!empty($postOBJ)) {
			for ($p = 0; $p < count($postOBJ); $p++) {
				$arr[$postOBJ[$p]] = ${$postOBJ[$p]};
			}
		}
		if (!empty($postLANGOBJ)) {
			for ($lc = 0; $lc < count($lancodelist); $lc++) {
				for ($p = 0; $p < count($postLANGOBJ); $p++) {
					$arr[$postLANGOBJ[$p].$lancodelist[$lc]['langtype']] = ${$postLANGOBJ[$p].$lancodelist[$lc]['langtype']};
				}
			}
		}
		$cms_id = $this->CmsModel->add_cms($arr);
	
		//跳转到列表页面
		$backurl = $this->input->post('backurl');
		if($backurl!=""){
			$backurl=str_replace('slash_tag','/',$backurl);
			if(base64_decode($backurl)!=""){
				$decodebackurl = base64_decode($backurl);
			}else{
				$decodebackurl = base_url().'index.php/admins/cms/cmslist';
			}
		}else{
			$decodebackurl = base_url().'index.php/admins/cms/cmslist';
		}
		echo json_encode(array('backurl'=>$decodebackurl));
	}
	
	//修改cms
	function toedit_cms($cms_id){
		//跳转到列表页面
		$backurl = $this->input->get('backurl');
		if($backurl!=""){
			$backurl=str_replace('slash_tag','/',$backurl);
			if(base64_decode($backurl)!=""){
				$decodebackurl = base64_decode($backurl);
			}else{
				$decodebackurl = base_url().'index.php/admins/cms/cmslist';
			}
		}else{
			$decodebackurl = base_url().'index.php/admins/cms/cmslist';
		}
		$data['decodebackurl'] = $decodebackurl;
		$data['backurl'] = $backurl;
		//导航栏
		$data['url'] = '<a href="'.$decodebackurl.'">'.lang('cy_commoncontent_manage').'</a> &gt; '.lang('cy_commoncontent_edit');
	
		$data['cmsinfo']=$this->CmsModel->getcmsinfo($cms_id);
		$this->load->view('admin/cms_edit',$data);
	}
	//修改cms ------- 处理方法
	function edit_cms($cms_id){
		$lancodelist = getlancodelist();//多语言
		$postOBJ = $this->input->post('GETOBJ');
		$postOBJ_type = $this->input->post('GETOBJ_type');
		$postLANGOBJ = $this->input->post('GETLANGOBJ');
		$postLANGOBJ_type = $this->input->post('GETLANGOBJ_type');
		//获取内容
		if (!empty($postOBJ)) {
			for ($p = 0; $p < count($postOBJ); $p++) {
				${$postOBJ[$p]} = $this->input->post($postOBJ[$p]);
				if($postOBJ_type[$p] == 'ckeditor'){
					${$postOBJ[$p]} = str_replace("{sign_douhao}", "'", ${$postOBJ[$p]});
					${$postOBJ[$p]} = str_replace("<br />", "\n", ${$postOBJ[$p]});
					${$postOBJ[$p]} = str_replace(base_url(), "{base_url}", ${$postOBJ[$p]});
					
					${$postOBJ[$p]} = str_replace("/(width:(\s)*(\d){1,3}(%|(px));(\s)height:(\s)*(\d){1,3}(%|(px));)/", "max-width:100%;", ${$postOBJ[$p]});
				}else{
					${$postOBJ[$p]} = replace_content(defaultreparr(), ${$postOBJ[$p]});
				}
			}
		}
		if (!empty($postLANGOBJ)) {
			for ($lc = 0; $lc < count($lancodelist); $lc++) {
				for ($p = 0; $p < count($postLANGOBJ); $p++) {
					${$postLANGOBJ[$p].$lancodelist[$lc]['langtype']} = $this->input->post($postLANGOBJ[$p].$lancodelist[$lc]['langtype']);//产品名称
					if($postLANGOBJ_type[$p] == 'ckeditor'){
						${$postLANGOBJ[$p].$lancodelist[$lc]['langtype']} = str_replace("{sign_douhao}", "'", ${$postLANGOBJ[$p].$lancodelist[$lc]['langtype']});
						${$postLANGOBJ[$p].$lancodelist[$lc]['langtype']} = str_replace("<br />", "\n", ${$postLANGOBJ[$p].$lancodelist[$lc]['langtype']});
						${$postLANGOBJ[$p].$lancodelist[$lc]['langtype']} = str_replace(base_url(), "{base_url}", ${$postLANGOBJ[$p].$lancodelist[$lc]['langtype']});
						
						${$postLANGOBJ[$p].$lancodelist[$lc]['langtype']} = str_replace("/(width:(\s)*(\d){1,3}(%|(px));(\s)height:(\s)*(\d){1,3}(%|(px));)/", "max-width:100%;", ${$postLANGOBJ[$p].$lancodelist[$lc]['langtype']});
					}else{
						${$postLANGOBJ[$p].$lancodelist[$lc]['langtype']} = replace_content(defaultreparr(), ${$postLANGOBJ[$p].$lancodelist[$lc]['langtype']});
					}
				}
			}
		}
		$arr = array('edited_author'=>$this->admin_username, 'edited'=>mktime());
		//处理内容到数据库
		if (!empty($postOBJ)) {
			for ($p = 0; $p < count($postOBJ); $p++) {
				$arr[$postOBJ[$p]] = ${$postOBJ[$p]};
			}
		}
		if (!empty($postLANGOBJ)) {
			for ($lc = 0; $lc < count($lancodelist); $lc++) {
				for ($p = 0; $p < count($postLANGOBJ); $p++) {
					$arr[$postLANGOBJ[$p].$lancodelist[$lc]['langtype']] = ${$postLANGOBJ[$p].$lancodelist[$lc]['langtype']};
				}
			}
		}
	
		$this->CmsModel->edit_cms($cms_id, $arr);
	
		//跳转到列表页面
		$backurl = $this->input->post('backurl');
		if($backurl!=""){
			$backurl=str_replace('slash_tag','/',$backurl);
			if(base64_decode($backurl)!=""){
				$decodebackurl = base64_decode($backurl);
			}else{
				$decodebackurl = base_url().'index.php/admins/cms/cmslist';
			}
		}else{
			$decodebackurl = base_url().'index.php/admins/cms/cmslist';
		}
		echo json_encode(array('backurl'=>$decodebackurl));
	}
	//删除cms
	function del_cms($cms_id){
		$this->CmsModel->del_cms($cms_id);
	}
	
	
	
	
	
}