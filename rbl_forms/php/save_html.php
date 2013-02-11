<?php

	$file = $_POST['file'] ;
	$ffrep = "../html/".$file ;

	$data = "<html><head><title>test</title><meta http-equiv='Content-Type' content='text/html; charset=utf-8'>\r\n" ;
	$data = $data."<link rel='stylesheet' type='text/css' href='../css/local.css'>\r\n" ;
	$data = $data."<link rel='stylesheet' type='text/css' href='../css/rbl_forms.css'>\r\n" ;
	$data = $data."<link rel='stylesheet' type='text/css' href='./css/t_calendar.css'>\r\n" ;
	$data = $data."<script type='text/javascript' src='./js/t_calendar.js'></script>\r\n" ;
	$data = $data."<script type='text/javascript' src='./js/t_form.js'></script>\r\n" ;
	$data = $data."<script type='text/javascript' src='./js/t_tools.js'></script>\r\n" ;
	$data = $data."</head><body><div id='main'>\r\n" ;

	$data = $data.str_replace( "'img/", "'../img/", $_POST['data'] ) ;

	$data = $data."<span id='__message__'></span>" ;
	$data = $data."</div><script type='text/javascript'>\r\n" ;
	$data = $data."  initFormsValidation('rbform') ;\r\n" ;
	$data = $data."  __setZoneMessage('__message__');\r\n" ;
	$data = $data."</script></body></html>" ;

	$fp=fopen($ffrep,'w');
	fwrite($fp,$data);
	fclose($fp);
	
	echo "Sauvegarde de ".$file ;
	
	exit();  
?>