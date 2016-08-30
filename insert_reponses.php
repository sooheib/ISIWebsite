<?php
// on teste si le formulaire a été soumis
if (isset ($_POST['go']) && $_POST['go']=='Poster') {
	// on teste le contenu de la variable $auteur
	if (!isset($_POST['auteur']) || !isset($_POST['message']) || !isset($_GET['numero_du_sujet'])) {
		
	 $erreur = '<script type="text/javascript">'
 . 'alert("Les variables nécessaires au script ne sont pas définies.");'
 . '</script>';
     
	
    }
	else {
	if (empty($_POST['auteur']) || empty($_POST['message']) || empty($_GET['numero_du_sujet'])) {
		$erreur ='<script type="text/javascript">'
 . 'alert("Au moins un des champs est vide.");'
 . '</script>';
	}
	// si tout est bon, on peut commencer l'insertion dans la base
	else {
		// on se connecte à notre base de données
		$base = mysql_connect ('localhost', 'root', '');
		mysql_select_db ('basa', $base) ;

		// on recupere la date de l'instant présent
		$date = date("Y-m-d H:i:s");

		// préparation de la requête d'insertion (table forum_reponses)
		$sql = 'INSERT INTO forum_reponses VALUES("", "'.mysql_real_escape_string($_POST['auteur']).'", "'.mysql_real_escape_string($_POST['message']).'", "'.$date.'", "'.$_GET['numero_du_sujet'].'")';

		// on lance la requête (mysql_query) et on impose un message d'erreur si la requête ne se passe pas bien (or die)
		mysql_query($sql) or die('Erreur SQL !'.$sql.'<br />'.mysql_error());

		// préparation de la requête de modification de la date de la dernière réponse postée (dans la table forum_sujets)
		$sql = 'UPDATE forum_sujets SET date_derniere_reponse="'.$date.'" WHERE id="'.$_GET['numero_du_sujet'].'"';

		// on lance la requête (mysql_query) et on impose un message d'erreur si la requête ne se passe pas bien (or die)
		mysql_query($sql) or die('Erreur SQL !'.$sql.'<br />'.mysql_error());

		// on ferme la connexion à la base de données
		mysql_close();

		// on redirige vers la page de lecture du sujet en cours
		header('Location: lire_sujet.php?id_sujet_a_lire='.$_GET['numero_du_sujet']);

		// on termine le script courant
		exit;
	}
	}
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Insert-Reponses</title>
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
<!-- on fait pointer le formulaire vers la page traitant les données -->
<br>
<br>
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
<form action="insert_reponses.php?numero_du_sujet=<?php echo $_GET['numero_du_sujet']; ?>" method="post" id="contact-form1">
<table>
<tr><td>
Auteur :
</td><td>
<input type="text" name="auteur" maxlength="30" size="50" value="<?php if (isset($_POST['auteur'])) echo htmlentities(trim($_POST['auteur'])); ?>">
</td></tr><tr><td>
Message :
</td><td>
<textarea name="message" cols="50" rows="10"><?php if (isset($_POST['message'])) echo htmlentities(trim($_POST['message'])); ?></textarea>
</td></tr><tr><td><td align="right">
<input type="submit" name="go" value="Poster">
</td></tr></table>
</form>
</center>
<?php
if (isset($erreur)) echo '<br /><br />',$erreur;
?>

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