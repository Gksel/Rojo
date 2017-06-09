/*
Copyright (c) 2003-2011, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
//	var baseurl=window.location.host;
	//alert(baseurl+'/maggie_new/ckeditor/upload.php?type=img');
	config.filebrowserImageUploadUrl = baseurl+'ckeditor/upload.php?type=img&baseurl='+baseurl;
	config.filebrowserUploadUrl = baseurl+'ckeditor/upload.php?type=file&baseurl='+baseurl;
	
	config.width=800;
	config.height=200;
	config.extraPlugins += (config.extraPlugins ?',lineheight' :'lineheight');
	config.toolbar_Full = [
	           			'/',
	           			[ 'Bold', 'Italic', 'Underline', 'Strike'],
	           			[ 'NumberedList', 'BulletedList'],
	           			[ 'Link', 'Unlink', 'Image'],
	           			[ 'TextColor','FontSize','lineheight'],
	           			['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','Table'],
	           		];

};
