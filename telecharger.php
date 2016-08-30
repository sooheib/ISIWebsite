<?php
/*///////////////////////////////////////////////////////////////////////
////  _____________________________________________________________  ////
////  |                                                           |  ////
////  |      _/_/_/    _/    _/_/    _/_/_/     _/         _/_/   |  ////
////  |     _/    _/      _/    _/  _/    _/   _/       _/    _/  |  ////
////  |    _/    _/  _/  _/_/_/_/  _/_/_/     _/       _/    _/   |  ////
////  |   _/    _/  _/  _/    _/  _/     _/  _/       _/    _/    |  ////
////  |  _/_/_/    _/  _/    _/  _/_/_/_/   _/_/_/_/   _/_/       |  ////
////  |                                                           |  ////
////  |           _/_/_/     _/_/_/      _/_/      _/_/_/         |  ////
////  |          _/    _/   _/   _/   _/    _/  _/                |  ////
////  |         _/_/_/     _/_/_/    _/    _/    _/_/             |  ////
////  |        _/     _/  _/    _/  _/    _/        _/            |  ////
////  |       _/_/_/_/   _/    _/    _/_/    _/_/_/  . lab's      |  ////
////  |                                                           |  ////  
////  |   By fearil - Diablobros Lab's & Net service Aquitaine    |  ////  
////  ____________________________________________________________   ////  
////                                                                 ////
///////////////////////////////////////////////////////////////////////*/
require 'config.php';

// si l'id d'un telechargement est passé en paramètre
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
	// on sélectionne l'url
	$sql = "SELECT * FROM ".DB_TABLE_DL." 
	WHERE id='".$_GET['id']."'";
	$req = mysql_query($sql);
	$sel = mysql_fetch_array($req);
	$url = $sel['url'];
	
	// on comptabilise un téléchargement
	$sql2 = "UPDATE ".DB_TABLE_DL." SET clic=clic+1 
	WHERE id='".$_GET['id']."'";
	$upd = mysql_query($sql2);
	// on lance le téléchargement
	header("Content-type: application/force-download");
	header("Location: $url");
	exit();

// si aucun id valable n'est passé en paramètre
} else {
	echo "Erreur : ce téléchargement n'existe pas !";
}
?>