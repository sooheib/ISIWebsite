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

// si l'id d'un telechargement est pass� en param�tre
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
	// on s�lectionne l'url
	$sql = "SELECT * FROM ".DB_TABLE_DL." 
	WHERE id='".$_GET['id']."'";
	$req = mysql_query($sql);
	$sel = mysql_fetch_array($req);
	$url = $sel['url'];
	
	// on comptabilise un t�l�chargement
	$sql2 = "UPDATE ".DB_TABLE_DL." SET clic=clic+1 
	WHERE id='".$_GET['id']."'";
	$upd = mysql_query($sql2);
	// on lance le t�l�chargement
	header("Content-type: application/force-download");
	header("Location: $url");
	exit();

// si aucun id valable n'est pass� en param�tre
} else {
	echo "Erreur : ce t�l�chargement n'existe pas !";
}
?>