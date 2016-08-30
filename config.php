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

// Parametres mysql à remplacer par les vôtres
define('DB_SERVER', 'localhost'); // serveur mysql
define('DB_SERVER_USERNAME', 'root'); // nom d'utilisateur
define('DB_SERVER_PASSWORD', ''); // mot de passe
define('DB_DATABASE', 'simba'); // nom de la base
define('DB_TABLE_DL', 'gestionUpload');

define('NB_DL_PAR_PAGE', 10);

// Connexion au serveur mysql
$connect = mysql_connect(DB_SERVER, DB_SERVER_USERNAME, 
	DB_SERVER_PASSWORD) 
    or die('Impossible de se connecter : ' . mysql_error());
// sélection de la base de données
mysql_select_db(DB_DATABASE, $connect);
?>