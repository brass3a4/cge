<?php

	$file = $_POST['file'] ;
	$data  = $_POST['data'] ;
	
	$ffrep = "../xml/".$file ;

	$fp=fopen($ffrep,'w');
	fwrite($fp,$data);
	fclose($fp);
	
	echo "Sauvegarde de ".$file ;
	
	exit();  
?>