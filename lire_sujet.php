<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Lire-Sujet</title>
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
            <p><img src="images/Tunisie.png" width="38" height="25" alt=""/><span style="text-align: left"><strong>République</strong></span><strong> Tunisienne | Ministère de l'Enseignement Supérieur et de Recherche Scientifique | Université <span style="color: #0D0D0D">ElManar</span></strong> <A href="Contact.php"> <img src="images/TRESO-ContactezNous-Orange.jpg" width="169" height="33" alt=""/></a></p>
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


<?php
if (!isset($_GET['id_sujet_a_lire'])) {
	echo 'Sujet non défini.';
}
else {
?>
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

echo '<h3>Vous etes  dans la zone Forum, ' . $_SESSION['login'] . '<br></h3>';
echo '<a href="log.php?action=logout">Se deconnecter</a><br><br>';



?>
<table width="500" border="1"><tr>
	<td>
	Auteur
	</td><td>
	Messages
	</td></tr>
	<?php
	// on se connecte à notre base de données
	$base = mysql_connect ('localhost', 'root', '');
	mysql_select_db ('basa', $base) ;

	// on prépare notre requête
	$sql = 'SELECT auteur, message, date_reponse FROM forum_reponses WHERE correspondance_sujet="'.$_GET['id_sujet_a_lire'].'" ORDER BY date_reponse ASC';

	// on lance la requête (mysql_query) et on impose un message d'erreur si la requête ne se passe pas bien (or die)
	$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());

	// on va scanner tous les tuples un par un
	while ($data = mysql_fetch_array($req)) {

	// on décompose la date
	sscanf($data['date_reponse'], "%4s-%2s-%2s %2s:%2s:%2s", $annee, $mois, $jour, $heure, $minute, $seconde);

	// on affiche les résultats
	echo '<tr>';
	echo '<td>';

	// on affiche le nom de l'auteur de sujet ainsi que la date de la réponse
	echo htmlentities(trim($data['auteur']));
	echo '<br />';
	echo $jour , '-' , $mois , '-' , $annee , ' ' , $heure , ':' , $minute;

	echo '</td><td>';

	// on affiche le message
	echo nl2br(htmlentities(trim($data['message'])));
	echo '</td></tr>';
	}

	// on libère l'espace mémoire alloué pour cette reqête
	mysql_free_result ($req);
	// on ferme la connection à la base de données.
	mysql_close ();
	?>

	<!-- on ferme notre table html -->
	</table> </center>
	<br /><br />
	<!-- on insère un lien qui nous permettra de rajouter des réponses à ce sujet -->
	<center><a href="insert_reponses.php?numero_du_sujet=<?php echo $_GET['id_sujet_a_lire']; ?>"> Répondre</a></center>
	<?php
}
?>
<br /><br />
<!-- on insère un lien qui nous permettra de retourner à l'accueil du forum -->
<center><a href="indexxx.php">Retour à l'accueil</a></center>
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