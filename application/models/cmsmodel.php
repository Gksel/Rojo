<?php
class CmsModel extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	//文章分类详细
	function getarticle_categoryinfo_BYshorturl($shorturl){
		$sql="
				SELECT a.*
	
				FROM ".DB_PRE()."system_article_category AS a
	
				WHERE a.shorturl = '".$shorturl."'
		";
		$result = $this->db->query($sql)->row_array();
		if(!empty($result)){
			return $result;
		}else{
			return null;
		}
	}
	//文章分类详细
	function getarticle_categoryinfo($category_id){
		$sql="
				SELECT a.*
				
				FROM ".DB_PRE()."system_article_category AS a 
				
				WHERE a.category_id = ".$category_id."
		";
		$result = $this->db->query($sql)->row_array();
		if(!empty($result)){
			return $result;
		}else{
			return null;
		}
	}
	
	//添加文章分类
	function add_article_category($arr){
		$this->db->insert(DB_PRE().'system_article_category',$arr);
		return $this->db->insert_id();
	}
	
	//修改文章分类
	function edit_article_category($category_id,$arr){
		$this->db->update(DB_PRE().'system_article_category',$arr,array('category_id'=>$category_id));
	}
	//删除文章分类
	function del_article_category($category_id){
		$this->db->delete(DB_PRE().'system_article_category', array('category_id'=>$category_id));
	}
	
	//查询文章分类列表
	function getarticlecategorylist($con=array(),$iscount=0){
		$where="";
		$order_by="";
		$limit="";
		if(isset($con['other_con'])){if($where!=""){$where .=" AND";}else{$where .=" WHERE";} $where .= " ".$con['other_con'];}
		if(isset($con['keyword'])){if($where!=""){$where .=" AND";}else{$where .=" WHERE";} $where .= " ((a.category_name_en LIKE '%".addslashes($con['keyword'])."%')) ";}
		if(isset($con['orderby'])&&isset($con['orderby_res'])){$order_by .=" ORDER BY ".$con['orderby']." ".$con['orderby_res']."";}
		if(isset($con['row'])&&isset($con['page'])){$limit .=" LIMIT ".$con['row'].",".$con['page']."";}
		
		if($iscount==0){
			$sql="SELECT a.* FROM ".DB_PRE()."system_article_category a $where $order_by $limit";
			$result=$this->db->query($sql)->result_array();
			if(!empty($result)){
				return $result;
			}else{
				return null;
			}
		}else{
			$sql="SELECT count(*) as count FROM ".DB_PRE()."system_article_category a $where $order_by";
			$result=$this->db->query($sql)->row_array();
			if(!empty($result)){
				return $result['count'];
			}else{
				return 0;
			}
		}
	}
	
	//查询文章列表
	function getarticlelist($con=array(),$iscount=0){
		$where="";
		$order_by="";
		$limit="";
		$leftjoin="";
		if(isset($con['other_con'])){if($where!=""){$where .=" AND";}else{$where .=" WHERE";} $where .= " ".$con['other_con'];}
		if(isset($con['keyword'])){if($where!=""){$where .=" AND";}else{$where .=" WHERE";} $where .= " ((a.article_name_en LIKE '%".addslashes($con['keyword'])."%') OR (a.article_name_ch LIKE '%".addslashes($con['keyword'])."%')) ";}
		if(isset($con['orderby'])&&isset($con['orderby_res'])){$order_by .=" ORDER BY ".$con['orderby']." ".$con['orderby_res']."";}
		if(isset($con['row'])&&isset($con['page'])){$limit .=" LIMIT ".$con['row'].",".$con['page']."";}
		if(isset($con['category_id'])){
			$leftjoin .= "LEFT JOIN ".DB_PRE()."article_category AS b ON a.article_id = b.article_id AND b.category_id = ".$con['category_id']."";
			if($where!=""){$where .=" AND";}else{$where .=" WHERE";}
			$where .=" b.id IS NOT NULL";
		}
		
		if($iscount==0){
			$sql="
					SELECT a.* 
					
					FROM ".DB_PRE()."article_list a 
					
					$leftjoin
			
					$where $order_by $limit
			";
			$result=$this->db->query($sql)->result_array();
			if(!empty($result)){
				return $result;
			}else{
				return null;
			}
		}else{
			$sql="
					SELECT count(*) as count
					
					FROM ".DB_PRE()."article_list a 
					
					$leftjoin
			
					$where $order_by
			";
			$result=$this->db->query($sql)->row_array();
			if(!empty($result)){
				return $result['count'];
			}else{
				return 0;
			}
		}
	}
	//添加文章
	function add_article($arr){
		$this->db->insert(DB_PRE().'article_list',$arr);
		return $this->db->insert_id();
	}
	//文章详细
	function getarticleinfo($article_id){
		$sql="
				SELECT a.*
	
				FROM ".DB_PRE()."article_list AS a
	
				WHERE a.article_id = ".$article_id."
		";
		$result = $this->db->query($sql)->row_array();
		if(!empty($result)){
			return $result;
		}else{
			return null;
		}
	}
	//修改文章
	function edit_article($article_id,$arr){
		$this->db->update(DB_PRE().'article_list',$arr,array('article_id'=>$article_id));
	}
	//删除文章
	function del_article($article_id){
		$this->db->delete(DB_PRE().'article_category', array('article_id'=>$article_id));
		$this->db->delete(DB_PRE().'article_list', array('article_id'=>$article_id));
	}
	
	
	
	//查询关键字列表
	function getkeywordlist($con=array(),$iscount=0){
		$where="";
		$order_by="";
		$limit="";
		$leftjoin="";
		if(isset($con['other_con'])){if($where!=""){$where .=" AND";}else{$where .=" WHERE";} $where .= " ".$con['other_con'];}
		if(isset($con['keyword'])){if($where!=""){$where .=" AND";}else{$where .=" WHERE";} $where .= " ((a.article_name_en LIKE '%".addslashes($con['keyword'])."%') OR (a.article_name_ch LIKE '%".addslashes($con['keyword'])."%')) ";}
		if(isset($con['orderby'])&&isset($con['orderby_res'])){$order_by .=" ORDER BY ".$con['orderby']." ".$con['orderby_res']."";}
		if(isset($con['row'])&&isset($con['page'])){$limit .=" LIMIT ".$con['row'].",".$con['page']."";}
		if(isset($con['category_id'])){
			$leftjoin .= "LEFT JOIN ".DB_PRE()."article_category AS b ON a.article_id = b.article_id AND b.category_id = ".$con['category_id']."";
			if($where!=""){$where .=" AND";}else{$where .=" WHERE";}
			$where .=" b.id IS NOT NULL";
		}
	
		if($iscount==0){
			$sql="
					SELECT a.*
			
					FROM ".DB_PRE()."system_keyword_list a
							
					$leftjoin
							
					$where $order_by $limit
			";
			$result=$this->db->query($sql)->result_array();
			if(!empty($result)){
			return $result;
			}else{
			return null;
			}
			}else{
			$sql="
				SELECT count(*) as count
			
					FROM ".DB_PRE()."system_keyword_list a
							
						$leftjoin
							
						$where $order_by
						";
						$result=$this->db->query($sql)->row_array();
						if(!empty($result)){
						return $result['count'];
						}else{
						return 0;
						}
			}
	}
	//添加关键字
	function add_keyword($arr){
		$this->db->insert(DB_PRE().'system_keyword_list',$arr);
		return $this->db->insert_id();
	}
	//关键字详细
	function getkeywordinfo($keyword_id){
		$sql="
				SELECT a.*
	
				FROM ".DB_PRE()."system_keyword_list AS a
	
				WHERE a.keyword_id = ".$keyword_id."
		";
		$result = $this->db->query($sql)->row_array();
		if(!empty($result)){
			return $result;
		}else{
			return null;
		}
	}
	//修改关键字
	function edit_keyword($keyword_id,$arr){
		$this->db->update(DB_PRE().'system_keyword_list',$arr,array('keyword_id'=>$keyword_id));
	}
	//删除关键字
	function del_keyword($keyword_id){
		$this->db->delete(DB_PRE().'system_keyword_list', array('keyword_id'=>$keyword_id));
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	//cms详细
	function getcmsinfo($cms_id){
		$sql="select * from ".DB_PRE()."cms_list where cms_id=".$cms_id;
		$query=$this->db->query($sql);
		if($query->num_rows()>0){
			return $query->row_array();
		}else{
			return false;
		}
	}
	function getcmsinfo_BYshorturl($shorturl){
		$sql="select * from ".DB_PRE()."cms_list where shorturl = '".$shorturl."'";
		$query=$this->db->query($sql);
		if($query->num_rows()>0){
			return $query->row_array();
		}else{
			return false;
		}
	}
	//添加cms
	function add_cms($arr){
		$this->db->insert(DB_PRE().'cms_list',$arr);
		return $this->db->insert_id();
	}
	//修改cms
	function edit_cms($cms_id,$arr){
		$this->db->update(DB_PRE().'cms_list',$arr,array('cms_id'=>$cms_id));
	}
	//删除cms
	function del_cms($cms_id){
		$this->db->delete(DB_PRE().'cms_list', array('cms_id'=>$cms_id));
	}
	//查询cms列表
	function getcmslist($con=array(),$iscount=0){
		$where="";
		$order_by="";
		$limit="";
		if(isset($con['other_con'])){if($where!=""){$where .=" AND";}else{$where .=" WHERE";} $where .= " ".$con['other_con'];}
		if(isset($con['parent'])){if($where!=""){$where .=" AND";}else{$where .=" WHERE";} $where .= " a.parent = ".$con['parent'];}
		if(isset($con['keyword'])){if($where!=""){$where .=" AND";}else{$where .=" WHERE";} $where .= " ((a.cms_name_en LIKE '%".addslashes($con['keyword'])."%')) ";}
		if(isset($con['orderby'])&&isset($con['orderby_res'])){$order_by .=" ORDER BY ".$con['orderby']." ".$con['orderby_res']."";}
		if(isset($con['row'])&&isset($con['page'])){$limit .=" LIMIT ".$con['row'].",".$con['page']."";}
	
		if($iscount==0){
			$sql="SELECT a.* FROM ".DB_PRE()."cms_list a $where $order_by $limit";
			$result=$this->db->query($sql)->result_array();
			if(!empty($result)){
				return $result;
			}else{
				return null;
			}
		}else{
			$sql="SELECT count(*) as count FROM ".DB_PRE()."cms_list a $where $order_by";
			$result=$this->db->query($sql)->row_array();
			if(!empty($result)){
				return $result['count'];
			}else{
				return 0;
			}
		}
	}
	
	
	
	
}
