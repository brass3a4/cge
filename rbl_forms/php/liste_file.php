	<form>
	<table width="100%">
		<tbody>
		<tr><td><label for="x_file">Liste des fichiers</label></td>
		    <td><select name="x_file" id="x_file" class="fCmb">
<?php
	$dossier = opendir("../xml/" );

	$i=0;
	while ($Fichier = readdir($dossier))
	{
		if ($Fichier != "." && $Fichier != ".." )
		 {
		  echo "<option value='" ;
		  echo "$Fichier";
		  echo "'>" ;
		  echo "$Fichier";
		  echo "</option>" ;
		 }
		$i++;
	}
	closedir($dossier);
?>
  	  	    </select></td> 
		</tr>
	</tbody>
	</table>
	</form>
