<?php
// on teste si le formulaire a été soumis
if (isset ($_POST['go']) && $_POST['go']=='Poster') {
	// on teste la déclaration de nos variables
	if (!isset($_POST['auteur']) || !isset($_POST['titre']) || !isset($_POST['message'])) {
	$erreur = '<script type="text/javascript">'
 . 'alert("Les variables nécessaires au script ne sont pas définies.");'
 . '</script>';
	
	}
	else
	 {
	// on teste si les variables ne sont pas vides
	if (empty($_POST['auteur']) || empty($_POST['titre']) || empty($_POST['message'])) {
		$erreur ='<script type="text/javascript">'
 . 'alert("Au moins un des champs est vide.");'
 . '</script>';
		
		
		
		
	}

	// si tout est bon, on peut commencer l'insertion dans la base
	else {
		// on se connecte à notre base
		$base = mysql_connect ('localhost', 'root', '');
		mysql_select_db ('basa', $base) ;

		// on calcule la date actuelle
		$date = date("Y-m-d H:i:s");

		// préparation de la requête d'insertion (pour la table forum_sujets)
		$sql = 'INSERT INTO forum_sujets VALUES("", "'.mysql_escape_string($_POST['auteur']).'", "'.mysql_escape_string($_POST['titre']).'", "'.$date.'")';

		// on lance la requête (mysql_query) et on impose un message d'erreur si la requête ne se passe pas bien (or die)
		mysql_query($sql) or die('Erreur SQL !'.$sql.'<br />'.mysql_error());

		// on recupère l'id qui vient de s'insérer dans la table forum_sujets
		$id_sujet = mysql_insert_id();

		// lancement de la requête d'insertion (pour la table forum_reponses
		$sql = 'INSERT INTO forum_reponses VALUES("", "'.mysql_escape_string($_POST['niveau']).'", "'.mysql_escape_string($_POST['message']).'", "'.$date.'", "'.$id_sujet.'")';

		// on lance la requête (mysql_query) et on impose un message d'erreur si la requête ne se passe pas bien (or die)
		mysql_query($sql) or die('Erreur SQL !'.$sql.'<br />'.mysql_error());

		// on ferme la connexion à la base de données
		mysql_close();

		// on redirige vers la page d'accueil
		header('Location: indexxx.php');

		// on termine le script courant
		exit;
	}
	}
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Insert-Sujet</title>
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
<center>
<!-- on fait pointer le formulaire vers la page traitant les données -->
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
<form action="insert_sujet.php" id="contact-form1" method="post">
<table>
<tr><td>
Auteur
</td><td>
<input type="text" name="auteur" maxlength="30" size="50" value="<?php if (isset($_POST['auteur'])) echo htmlentities(trim($_POST['auteur'])); ?>">
</td></tr><tr><td>
Titre 
</td><td>
<input type="text" name="titre" maxlength="50" size="50" value="<?php if (isset($_POST['titre'])) echo htmlentities(trim($_POST['titre'])); ?>">
</td></tr><tr><td>
Message 
</td><td>
<textarea name="message" cols="50" rows="10"><?php if (isset($_POST['message'])) echo htmlentities(trim($_POST['message'])); ?></textarea>
</td></tr><tr><td><td align="right">
<input type="submit" name="go" value="Poster">
</td></tr></table>
</form>
<center/>
<?php
// on affiche les erreurs éventuelles
if (isset($erreur)) echo '<br /><br />',$erreur;
?>
</td>
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