<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Updatelanguage extends CI_Controller {
	
	function __construct(){
		parent::__construct();
	}
	
	public function index(){
		
		
		//搜集资料 --English
		$str_tmp="<?php\r\n"; //得到php的起始符。$str_tmp将累加 
		$str_end="?>"; //php结束符 
		
		
		$sql="SELECT * FROM ".DB_PRE()."lang_common WHERE lang_code IS NOT NULL AND lang_code != '' ORDER BY id ASC";
		$commonlist=$this->db->query($sql)->result_array();
		$sql="SELECT * FROM ".DB_PRE()."lang_other WHERE lang_code IS NOT NULL AND lang_code != '' ORDER BY id ASC";
		$otherlist=$this->db->query($sql)->result_array();
		$str_tmp.="/*常用的语言*/\r\n";
		for($i=0;$i<count($commonlist);$i++){
			$str_tmp.="$"."lang['".$commonlist[$i]['lang_code']."']=\"".$commonlist[$i]['lang_name_en']."\";\r\n";
		}
		
		for($i=0;$i<count($otherlist);$i++){
			if($otherlist[$i]['parent'] == 0){
				$str_tmp.="/*".$otherlist[$i]['lang_name_ch']."*/\r\n";
			}
			$str_tmp.="$"."lang['".$otherlist[$i]['lang_code']."']=\"".$otherlist[$i]['lang_name_en']."\";\r\n";
		}
		
		//保存文件 
		$sf="application/language/english/gksel_lang.php"; //文件名 
		$fp=fopen($sf,"w"); //写方式打开文件 
		fwrite($fp,$str_tmp); //存入内容 
		fclose($fp); //关闭文件 
		
		
		
		
		
		
		//搜集资料  --中文
		$str_tmp="<?php\r\n"; //得到php的起始符。$str_tmp将累加 
		$str_end="?>"; //php结束符 
		
		$str_tmp.="/*常用的语言*/\r\n";
		for($i=0;$i<count($commonlist);$i++){
			$str_tmp.="$"."lang['".$commonlist[$i]['lang_code']."']=\"".$commonlist[$i]['lang_name_ch']."\";\r\n";
		}
		for($i=0;$i<count($otherlist);$i++){
			if($otherlist[$i]['parent'] == 0){
				$str_tmp.="/*".$otherlist[$i]['lang_name_ch']."*/\r\n";
			}
			$str_tmp.="$"."lang['".$otherlist[$i]['lang_code']."']=\"".$otherlist[$i]['lang_name_ch']."\";\r\n";
		}
		//保存文件 
		$sf="application/language/chinese/gksel_lang.php"; //文件名 
		$fp=fopen($sf,"w"); //写方式打开文件 
		fwrite($fp,$str_tmp); //存入内容 
		fclose($fp); //关闭文件 
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		//搜集资料 --English
		$str_tmp="var L = new Array();\r\n"; //得到php的起始符。$str_tmp将累加
		$str_end=""; //php结束符
		
		$str_tmp.="/*常用的语言*/\r\n";
		for($i=0;$i<count($commonlist);$i++){
			$str_tmp.="L['".$commonlist[$i]['lang_code']."']=\"".$commonlist[$i]['lang_name_en']."\";\r\n";
		}
		
		for($i=0;$i<count($otherlist);$i++){
			if($otherlist[$i]['parent'] == 0){
				$str_tmp.="/*".$otherlist[$i]['lang_name_ch']."*/\r\n";
			}
			$str_tmp.="L['".$otherlist[$i]['lang_code']."']=\"".$otherlist[$i]['lang_name_en']."\";\r\n";
		}
		
		//保存文件
		$sf="themes/default/js/lan_en.js"; //文件名
		$fp=fopen($sf,"w"); //写方式打开文件
		fwrite($fp,$str_tmp); //存入内容
		fclose($fp); //关闭文件
		
		
		
		
		
		
		//搜集资料  --中文
		$str_tmp="var L = new Array();\r\n"; //得到php的起始符。$str_tmp将累加
		$str_end=""; //php结束符
		
		$str_tmp.="/*常用的语言*/\r\n";
		for($i=0;$i<count($commonlist);$i++){
			$str_tmp.="L['".$commonlist[$i]['lang_code']."']=\"".$commonlist[$i]['lang_name_ch']."\";\r\n";
		}
		for($i=0;$i<count($otherlist);$i++){
			if($otherlist[$i]['parent'] == 0){
				$str_tmp.="/*".$otherlist[$i]['lang_name_ch']."*/\r\n";
			}
			$str_tmp.="L['".$otherlist[$i]['lang_code']."']=\"".$otherlist[$i]['lang_name_ch']."\";\r\n";
		}
		//保存文件
		$sf="themes/default/js/lan_ch.js"; //文件名
		$fp=fopen($sf,"w"); //写方式打开文件
		fwrite($fp,$str_tmp); //存入内容
		fclose($fp); //关闭文件
	}
	
	
	
	
	

}