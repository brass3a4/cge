<?php
header('Content-Type: text/html; charset=utf-8');
?>
<h2>Liste des fichiers HTML g&eacute;n&eacute;r&eacute;s (preview)</h2>
<ul>
<?php
	$dossier = opendir("../html/" );

	$i=0;
	while ($Fichier = readdir($dossier))
	{
		if ($Fichier != "." && $Fichier != ".."  && $Fichier != "css" && $Fichier != "js" && $Fichier != "img")
		 {
		  echo "<li><a href='./html/" ;
		  echo "$Fichier";
		  echo "' target='_blank'>" ;
		  echo "$Fichier";
		  echo "</a></li>" ;
		 }
		$i++;
	}
	closedir($dossier);
?>
</ul>
