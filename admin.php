<!-- <?php
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
// connexion à la base de données
require_once 'config.php';
// fichier contenant les fonctions
require_once 'fonctions.php';
// mode ajouter par défaut
$mode = 'ajouter_valid';
// la date d'aujourd'hui au format francais
$datenow = date("d-m-Y",time());

// on ajoute le telechargement en base de données
// si le formulaire d'ajout est validé
if (isset($_POST['ajouter_valid'])) {
	
	$nom = mysql_real_escape_string($_POST['nom']);
	$genre = mysql_real_escape_string($_POST['genre']);
	$image = mysql_real_escape_string($_POST['image']);
	$clic = mysql_real_escape_string($_POST['clic']);
	$url = mysql_real_escape_string($_POST['url']);
	$desc = mysql_real_escape_string($_POST['description']);
	$datefr = mysql_real_escape_string($_POST['datefr']);
	$date = datefrenus($datefr);
	$sql = "INSERT INTO ".DB_TABLE_DL." (nom, genre, image, url, 
	description, clic, date) VALUES ('".$nom."', '".$genre."', '".$image."', '".$url."',
	'".$desc."', '".$clic."', '".$date."')";
	mysql_query($sql);

// on modifie l'enregistrement mysql du telechargement
// si le formulaire de modification est validé
} else if (isset($_POST['modifier_valid']) && 
	is_numeric($_POST['idtelech'])) {
	
	$nom = mysql_real_escape_string($_POST['nom']);
	$genre = mysql_real_escape_string($_POST['genre']);
	$image = mysql_real_escape_string($_POST['image']);
	$clic = mysql_real_escape_string($_POST['clic']);
	$url = mysql_real_escape_string($_POST['url']);
	$desc = mysql_real_escape_string($_POST['description']);
	$datefr = mysql_real_escape_string($_POST['datefr']);
	$date = datefrenus($datefr);
	$sql = "UPDATE ".DB_TABLE_DL." 
	SET nom='".$nom."', genre='".$genre."',image='".$image."',url='".$url."', 
	description='".$desc."',clic='".$clic."',date='".$date."' 
	WHERE id = '".$_POST['idtelech']."'";
	mysql_query($sql);

// on selectionne les infos d'un telechargement
// pour les afficher dans les champs du formulaire
// si une modification est demandée
} else if (is_numeric($_GET['modifier'])) {
	
	$mode = 'modifier_valid';
	$sql = "SELECT id, nom, genre, image, url, description, clic, 
	DATE_FORMAT(date,'%d-%m-%Y') AS datefr 
	FROM ".DB_TABLE_DL." 
	WHERE id = '".$_GET['modifier']."'";
	$req = mysql_query($sql);
	if ($req) $telech = mysql_fetch_array($req);
	$desc = stripslashes($telech['description']);
	$nom = stripslashes($telech['nom']);
	$genre = stripslashes($telech['genre']);
	$image = stripslashes($telech['image']);
	$url = stripslashes($telech['url']);
	$datefr = stripslashes($telech['datefr']);
	$id = $telech['id'];
	$clic = $telech['clic'];

} else if (is_numeric($_GET['supprimer'])) {

// je dirai : 

$sql = "SELECT url FROM ".DB_TABLE_DL." 
WHERE id = '".$_GET['supprimer']."'";

$req = mysql_query($sql);
if ($req) $telech = mysql_fetch_array($req);
$url = $telech['url']; 


	$sql = "DELETE FROM ".DB_TABLE_DL." 
	WHERE id = '".$_GET['supprimer']."'";
	mysql_query($sql); 

// tu décommente ta ligne 
unlink ($url);
	}

?> 
-->
<?php
	if (isset($url))
		echo $url
?>
<?php // myuploader  

if( isset($_POST['ajouter_valid']) ) // si formulaire soumis
{
    $content_dir = 'upload/'; // dossier où sera déplacé le fichier

    $tmp_file = $_FILES['fichier']['tmp_name'];

    if( !is_uploaded_file($tmp_file) )
    {
		 exit("Le fichier est introuvable");
    }

  /*  // on vérifie maintenant l'extension
    $type_file = $_FILES['fichier']['type'];

    if( !strstr($type_file, 'jpg') && !strstr($type_file, 'jpeg') && !strstr($type_file, 'exe') && !strstr($type_file, 'gif') )
    {
        exit("Le fichier n'est pas une image");
    }
  */
    // on copie le fichier dans le dossier de destination
    $name_file = $_FILES['fichier']['name'];

    if( !move_uploaded_file($tmp_file, $content_dir . $name_file) )
    {
		
        exit("Impossible de copier le fichier dans $content_dir");
    }
	
		'<script type="text/javascript">'
 . 'alert("Le fichier a bien été uploadé");'
 . '</script>';

   // echo "Le fichier a bien été uploadé";
}

echo '<?xml version="1.0" encoding="iso-8859-1"?>';
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Upload</title>
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
            <p><img src="images/Tunisie.png" width="38" height="25" alt=""/><span style="text-align: left"><strong>République</strong></span><strong> Tunisienne | Ministère de l'Enseignement Supérieur et de Recherche Scientifique | Université <span style="color: #0D0D0D">ElManar</span></strong><A href="Contact.php"> <img src="images/TRESO-ContactezNous-Orange.jpg" width="169" height="33" alt=""/></a></p>
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
                
                


<!-- Le bloc du formulaire d'ajout / modification -->
  <div id="formulaire">
  	<center>        <?php
				
				
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



?></center>
    <h2>
  	  <?php
  	  	if ($mode == 'modifier_valid') echo '<center>Modifier</center> ';
  	  	else echo '<center>Ajouter un fichier</center> ';
  	  ?>
  	</h2>
    <center>

	<form method="post" id="contact-form1" enctype="multipart/form-data" action="">
	<table width="554" border="0" class="encadre">
    <tr><td colspan="2"><input type="file" name="fichier" size="65"></td>
    </tr> 
	  <tr>
		<th width="195">Nom du fichier  : </th>
		<td width="349">
		  <?php
		  	echo '<input type="text" size="50" name="nom" value="';
		  	if ($mode == 'modifier_valid') echo $nom;
		  	echo '" />';
		  ?>
		</td>
	  </tr>
      <tr>
		<th>matière/classe  : </th>
		<td>
		  <?php
		  	echo '<input type="text" size="50" name="genre" value="';
		  	if ($mode == 'modifier_valid') echo $genre;
		  	echo '" />';
		  ?>
		</td>
	  </tr>
      <tr>
		<th>url image  : </th>
		<td>
		  <?php
		  	echo '<input type="text" size="50" name="image" value="';
		  	if ($mode == 'modifier_valid') echo $image;
			else echo "img/ ou http://imageshack.com/..";
		  	echo '" />';
		  ?>
		</td>
	  </tr>
	  <tr>
		<th>URL du Fichier : </th>
		<td>
		  <?php 
		  	echo '<input type="text" size="50" name="url" value="';
		  	if ($mode == 'modifier_valid') echo $url;
			else  '<script type="text/javascript">'
 . 'alert("upload/");'
 . '</script>';
		
		  	echo '" />';
		  ?>
		</td>
	  </tr>
	  <tr>
		<th>Nombre de clics   : </th>
		<td>
		  <?php
		  	echo '<input type="text" size="50" name="clic" value="';
		  	if ($mode == 'modifier_valid') echo $clic;
		  	else echo "0";
		  	echo '" />';
		  ?>
		</td>
	  </tr>
	  <tr>
		<th>Date d'ajout </th>
		<td>
		  <?php
		  	echo '<input type="text" size="50" name="datefr" value="';
		  	if ($mode == 'modifier_valid') echo $datefr;
		  	else echo $datenow;
		  	echo '" />';
		  ?>
		</td>
	  </tr>
	  <tr>
		<th>Description</th>
		<td>
		  <?php
		  	echo '<textarea name="description" cols="50" rows="12"  size="50" >';
			if ($mode == 'modifier_valid') echo $desc;
		  	echo '</textarea>';
		  ?>
		</td>
	  </tr>
	  
	  <tr>
		<td>&nbsp;</td>
		<td>
		  <?php
		  	echo '<input type="hidden" name="idtelech" value="';
		  	if ($mode == 'modifier_valid') echo $id;
		  	echo '" />';
		  	
		  	echo '<input type="submit" name="';
		  	echo $mode;
		  	echo '" value="Valider" />';
		  ?>
		</td>
	  </tr>
	</table>
	</form>
    </center>
  </div>
  
  
<!-- Le bloc de la liste des téléchargements -->
  <div id="listing" align="center" >
  <h2>&nbsp;</h2>
  <h2>Options</h2>
  <hr />
  <p>  <a href="indexx.php"> les fichiers partagés</a>  </p>
  <p>  	<a href="<?php echo $_SERVER['PHP_SELF']; ?>">
  	Ajouter un fichier</a></p>
<hr />
<table class="telechargements">
  <tr>
    <td class="titre" id="nom" align="center"><a href="?order=nom&type=desc">
      <img src="img/fleche-bas.gif" alt="" border="0" class="fleche" /></a>
      <a href="?order=nom&type=asc"><img src="img/fleche-haut.gif" alt="" border="0" class="fleche" />
      </a></td>
</tr><tr><td class="titre" id="nom">
<?php
  /* on affiche la liste des téléchargements avec les options
  	 éditer et supprimer */
$sql = "SELECT id, nom, genre, image, url, description, clic, 
DATE_FORMAT(date,'%d-%m-%Y') AS datefr FROM 
".DB_TABLE_DL." ORDER BY nom ASC";
  	$req = mysql_query($sql);
  	while ($telech = mysql_fetch_array($req)) 
  	{
  		$nom = stripslashes($telech['nom']);
		$genre = stripslashes($telech['genre']);
		$image = stripslashes($telech['image']);
		$url = stripslashes($telech['url']);
		$desc = stripslashes($telech['description']);
		$id = $telech['id'];
		echo '<a href="'.$url.'" ';
		// visite le telechargement dans une nouvelle fenetre
		// target n'est pas utilisable en xhtml strict
		echo 'onclick="window.open(this.href);return false;">';
		echo $nom;
		echo '</a> ';
		echo '<a href="?modifier='.$id.'">[éditer]</a> ';
		echo '<a href="?supprimer='.$id.'&file='.$url.'" onClick="return ';
		echo 'confirm(\'Etes vous sûr de vouloir ';
		echo 'supprimer?\');">[supprimer]</a>';
		echo '<br/>';
  	}
	
  ?></td>
</tr></table>
  </div>
  </section>
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
	
</body>
</html>