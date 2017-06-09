<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
		<title><?php if(isset($website_title)){echo $website_title;}?></title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>themes/default/base.css?date=<?php echo CACHE_USETIME()?>" />

		<script src="<?php echo base_url()?>themes/default/js/jquery-1.7.2.min.js?date=<?php echo CACHE_USETIME()?>"></script>
		<script src="<?php echo base_url()?>themes/default/js/front/base_common.js?date=<?php echo CACHE_USETIME()?>"></script>
		<script src="<?php echo base_url()?>themes/default/js/lan<?php echo $this->langtype;?>.js?date=<?php echo CACHE_USETIME()?>"></script>
		<script src="<?php echo base_url()?>themes/default/js/front/base.js?date=<?php echo CACHE_USETIME()?>"></script>
		<script type='text/javascript' src='<?php echo base_url()?>themes/default/js/main.js'></script>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>themes/default/base3d.css?date=<?php echo CACHE_USETIME()?>" />
		<script src="<?php echo base_url()?>themes/default/js/fileuploader3d.js?date=<?php echo CACHE_USETIME()?>"></script>
		<script src="<?php echo base_url()?>themes/default/js/base3d.js?date=<?php echo CACHE_USETIME()?>"></script>
		<script src="<?php echo base_url()?>themes/default/js/spritespin3d.js?date=<?php echo CACHE_USETIME()?>"></script>
		
		<script src="<?php echo base_url()?>themes/default/js/jquery.imagezoom.min.js?date=<?php echo CACHE_USETIME()?>"></script>
		<script type="text/javascript">
			var baseurl='<?php echo base_url()?>';
		</script>
		<link rel="shortcut icon" href="<?php echo base_url()?>themes/default/images/rojo.ico?date=<?php echo CACHE_USETIME()?>" type="image/x-icon" />
</head>
<body>
<?php 
	$this->load->view('default/header_menu_mo');
	$this->load->view('default/header_menu_pc');
?>


