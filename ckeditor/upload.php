<?php
/*
	CKEditor_upload.php
	monkee
	2009-11-15	16:47
*/
$config=array();

$config['type']=array("flash","img","file");	//上传允许type值

$config['img']=array("jpg","bmp","gif","png");	//img允许后缀
$config['flash']=array("flv","swf");	//flash允许后缀
$config['file']=array("rar","zip","ppt","doc","xls","pdf","png","jpg","gif");	//flash允许后缀

$config['flash_size']=200;	//上传flash大小上限 单位：KB
$config['img_size']=5000;	//上传img大小上限 单位：KB
$config['file_size']=5000;	//上传img大小上限 单位：KB

$config['message']="上传成功";	//上传成功后显示的消息，若为空则不显示

$config['name']=mktime();	//上传后的文件命名规则 这里以unix时间戳来命名

$uploaddir = "upload/file/".date('Y')."/".date('m');
$uploaddir_fenxi = explode('/',$uploaddir);
$dirstr='';
for($i=0;$i<count($uploaddir_fenxi);$i++){
	$dirstr .=$uploaddir_fenxi[$i].'/';
	if (! is_dir ( $dirstr )) {mkdir ( $dirstr, 0777 );}
}

$parse_url = parse_url($_GET['baseurl']);
if(isset($parse_url['path'])){
	$parse_url['path']=str_replace('/','',$parse_url['path']);
	$config['img_dir']="/".$parse_url['path']."/ckeditor/".$uploaddir;	//上传img文件地址 采用绝对地址 采用绝对地址 方便upload.php文件放在站内的任何位置 后面不加"/"
	$config['file_dir']="/".$parse_url['path']."/ckeditor/".$uploaddir;	//上传img文件地址 采用绝对地址 采用绝对地址 方便upload.php文件放在站内的任何位置 后面不加"/"
}else{
	$config['img_dir']="/ckeditor/".$uploaddir;	//上传img文件地址 采用绝对地址 采用绝对地址 方便upload.php文件放在站内的任何位置 后面不加"/"
	$config['file_dir']="/ckeditor/".$uploaddir;	//上传img文件地址 采用绝对地址 采用绝对地址 方便upload.php文件放在站内的任何位置 后面不加"/"
}

if(isset($parse_url['scheme'])){
	$config['site_url']=$parse_url['scheme']."://".$parse_url['host'];	//网站的网址 这与图片上传后的地址有关 最后不加"/" 可留空
}else{
	$config['site_url']=$parse_url['host'];	//网站的网址 这与图片上传后的地址有关 最后不加"/" 可留空
}

//文件上传
uploadfile();

function uploadfile()
{
	global $config;
	//判断是否是非法调用
	if(empty($_GET['CKEditorFuncNum']))
		mkhtml(1,"","非法调用");
	$fn=$_GET['CKEditorFuncNum'];
	if(!in_array($_GET['type'],$config['type']))
		mkhtml(1,"","非法调用");
	$type=$_GET['type'];
	if(is_uploaded_file($_FILES['upload']['tmp_name']))
	{
		//判断上传文件是否允许
		$filearr=pathinfo($_FILES['upload']['name']);
		echo '<script type="text/javascript">'.$filearr.'</script>';
		$filetype=strtolower($filearr["extension"]);
		if(!in_array($filetype,$config[$type])){
			$str='';
			for($cu=0;$cu<count($config[$type]);$cu++){
				if($cu!=0){
					$str .=',';
				}
				$str .=$config[$type][$cu];
			}
			mkhtml($fn,"","文件格式错误!目前仅支持(".$str.")格式的文件上传");
		}
			
		//判断文件大小是否符合要求
		if($_FILES['upload']['size']>$config[$type."_size"]*1024)
			mkhtml($fn,"","上传的文件不能超过".$config[$type."_size"]."KB！");
		//$filearr=explode(".",$_FILES['upload']['name']);
		//$filetype=$filearr[count($filearr)-1];
		$file_abso=$config[$type."_dir"]."/".$config['name'].".".$filetype;
		$file_host=$_SERVER['DOCUMENT_ROOT'].$file_abso;
		
		if(move_uploaded_file($_FILES['upload']['tmp_name'],$file_host))
		{
			mkhtml($fn,$config['site_url'].$file_abso,$config['message']);
		}
		else
		{
			mkhtml($fn,"",$file_host);
		}
	}
}
//输出js调用
function mkhtml($fn,$fileurl,$message){
	//echo '******upload'.$str;
	$str='<script type="text/javascript">window.parent.CKEDITOR.tools.callFunction('.$fn.', \''.$fileurl.'\', \''.$message.'\');</script>';
	//echo '******upload'.$str;
	exit($str);
}
?>
