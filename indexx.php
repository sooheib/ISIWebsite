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
$from = (isset($_GET['from'])) ? $_GET['from'] : '0';
$orderby='date DESC';

if (isset($_GET['order'])) {
	$type=isset($_GET['type']) ? $_GET['type'] : '';
	if (($type == 'asc') || ($type == 'desc')) {
		switch ($_GET['order']) {
			case 'nom':
				$orderby='nom '.$type;
				break;
			case 'genre':
				$orderby='genre '.$type;
				break;
			case 'image':
				$orderby='image '.$type;
				break;
			case 'date':
				$orderby='date '.$type;
				break;
			case 'clic':
				$orderby='clic '.$type;
				break;
			default:
				$orderby='date DESC';
		}
	}
}

	echo '<?xml version="1.0" encoding="iso-8859-1"?>';
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Partage</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/reset.css" type="text/css" media="screen">
		<link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
		<link rel="stylesheet" href="css/layout.css" type="text/css" media="screen">
		<script src="js/jquery-1.6.3.min.js" type="text/javascript"></script>
		<script src="js/cufon-yui.js" type="text/javascript"></script>
		<script src="js/cufon-replace.js" type="text/javascript"></script>
		<script src="js/NewsGoth_BT_400.font.js" type="text/javascript"></script>
		<script src="js/FF-cash.js" type="text/javascript"></script>
		<script src="js/script.js" type="text/javascript"></script>
		<script src="js/jquery.equalheights.js" type="text/javascript"></script>
		<script src="js/easyTooltip.js" type="text/javascript"></script>

		<!--[if lt IE 7]>
		<div style=' clear: both; text-align:center; position: relative;'>
			<a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
				<img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
			</a>
		</div>
		<![endif]-->
		<!--[if lt IE 9]>
			<script type="text/javascript" src="js/html5.js"></script>
			<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen">
		<![endif]-->
	</head>
	<body id="page2">
		<div class="extra">
			<div class="main">
<!--==============================header=================================-->
					 <header>
      <div class="indent">
        <div class="row-top">
          <div class="wrapper">
            <p><img src="images/Tunisie.png" width="38" height="25" alt=""/><span style="text-align: left"><strong>République</strong></span><strong> Tunisienne | Ministère de l'Enseignement Supérieur et de Recherche Scientifique | Université <span style="color: #0D0D0D">ElManar</span></strong> <A href="Contact.php"> <img src="images/ContactezNous.jpg" width="169" height="31" alt=""/></a></p>
            <p><a href="index.php"><img src="images/isi.jpg" width="162" height="55" alt=""/></a></p>
          </div> 
        </div>
        <nav>
          <ul class="menu">
			<li><a href="index.php">ACCUEIL</a></li>
			<li><a href="univer.html">UNIVERSITE</a></li>
			<li><a href="formation.html">FORMATION</a></li>
			<li><a href="Vie.html">VIE ASSOCIATIVE</a></li>
								
			<li class="last"><a href="statt.html">STATS</a></li>
		  </ul>
        </nav>
        </div>
        </header>
        

<body>

				<section id="content">

<center>
        <?php
				
				
session_start();

// si la variable de session "pseudo" n'existe pas, le visiteur
// n'a rien à faire ici
if(!isset($_SESSION['login']))
{
	header("location: index.php"); // redirection
	exit; // arrêt du script
}

echo '<h3>Vous etes dans la zone Partage, ' . $_SESSION['login'] . '<br></h3>';
echo '<a href="log.php?action=logout">Se deconnecter</a><br><br>';



?>
<h2>COURS,TD,TP,DS,EXAMEN</h2>
            
<a href="admin.php">Ajouter</a>
<table border="3" class="telechargements">
  <tr>
    <td class="titre" id="nom">
      Nom&nbsp;
      <a href="?order=nom&type=desc">
      <img src="img/fleche-bas.gif" alt="" class="fleche" />
      </a>
      <a href="?order=nom&type=asc">
      <img src="img/fleche-haut.gif" alt="" class="fleche" />
      </a>
    </td>
    <td class="titre" id="genre">
      Genre&nbsp;
      <a href="?order=genre&type=desc">
      <img src="img/fleche-bas.gif" alt="" class="fleche" />
      </a>
      <a href="?order=genre&type=asc">
      <img src="img/fleche-haut.gif" alt="" class="fleche" />
      </a>
    </td>
    <td class="titre" id="image">Image&nbsp;</td>
    <td class="titre" id="description">Description</td>
    <td class="titre" id="date">
      Ajouté le&nbsp;
      <a href="?order=date&type=desc">
      <img src="img/fleche-bas.gif" alt="" class="fleche" />
      </a>
      <a href="?order=date&type=asc">
      <img src="img/fleche-haut.gif" alt="" class="fleche" />
      </a>
    </td>
    <td class="titre" id="clic">Téléchargé&nbsp;
      <a href="?order=clic&type=desc">
      <img src="img/fleche-bas.gif" alt="" class="fleche" />
      </a>
      <a href="?order=clic&type=asc">
      <img src="img/fleche-haut.gif" alt="" class="fleche" />
      </a>
    </td>
  </tr>
  
<?php
// *******************************************************
// Cette partie affiche une ligne de tableau
// pour chaque téléchargement, NB_DL_PAR_PAGE au total
// *******************************************************

// fichier de config et connexion mysql
require_once 'config.php';

$sql  = "SELECT id, nom, genre, image, description, clic, ";
$sql .= "DATE_FORMAT(date,'%d-%m-%Y') AS datefr ";
$sql .= "FROM ".DB_TABLE_DL." ORDER BY $orderby ";
$sql .= "LIMIT $from, ".NB_DL_PAR_PAGE;
$req = mysql_query($sql);
while($telech = mysql_fetch_array($req))
{
	$nom = stripslashes($telech['nom']);
	$genre = stripslashes($telech['genre']);
	$image = stripslashes($telech['image']);
	$description = stripslashes($telech['description']);	
?>
  <tr>
	<td>
	  <?php 
	  	echo '<a href="telecharger.php?id='.$telech['id'].'" ';
	  	echo 'onclick="window.open(this.href);return false;">';
	  	echo $nom.'</a>'; 
	  ?>
	</td>
    <td>
	  <?php echo $genre; ?>
	</td>
    <td>
	  <?php echo '<img src="'.$image.'" width="100" height="100" />'; ?>
	</td>
	<td>
	  <?php echo $description; ?>
	</td>
	<td>
	  <?php echo $telech['datefr']; ?>
	</td>
	<td>
	  <?php echo $telech['clic'] . ' fois'; ?>
	</td>
  </tr>
<?php
}
?>

</table>
</center>

<?php
// *******************************************************
// Affichage de page précédente - page suivante
// *******************************************************
$fromprec = $from - NB_DL_PAR_PAGE;
$fromsuiv = $from + NB_DL_PAR_PAGE;
$sql = "SELECT COUNT(id) AS nb_telech FROM ".DB_TABLE_DL;
$telech = mysql_fetch_array(mysql_query($sql));
$nb_telech = $telech['nb_telech'];

$url = (isset($_GET['order'])) ? '&order='.$_GET['order'] : '';
$url .= (isset($_GET['type'])) ? '&type='.$_GET['type'] : '';

echo '<p id="pages">';
if ($fromprec >= 0) {
	echo '<a href="?from='.$fromprec.$url.'">';
	echo 'Page précédente</a>';
}
if (($fromprec >= 0) && ($fromsuiv < $nb_telech)) {
	echo ' - ';
}
if ($fromsuiv < $nb_telech) {
	echo '<a href="?from='.$fromsuiv.$url.'">';
	echo 'Page Suivante</a>';
}
echo '</p>';
?>

	<footer>
	<div class="main">
				<div class="footer-bg">
					<p class="prev-indent-bot"><img src="images/Sans titre1.png" width="27" height="37" alt=""/> 2 Rue Abou Raihane Bayrouni 2080 l&rsquo;Ariana</p>
					<p class="prev-indent-bot"><img src="images/Sans titre2.png" width="27" height="35" alt=""/>Tél : 71 706 164 | Fax : 71 706 698</p>
					<p class="prev-indent-bot"><img src="images/Sans titre4.png" width="45" height="24" alt=""/>Email : <a href="mailto:isi@isi.rnu.tn">isi@isi.rnu.tn</a></p>
					<ul class="list-services">
						<li></li>
						<li class="item-1"></li>
						<li class="item-2"></li>
					</ul>
				</div>
			</div>




</section>

			<footer>
</body>

</html>