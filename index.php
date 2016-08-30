


<!DOCTYPE html>
<html lang="en"> 
<!--musique--><embed src="01.mp3" autostart="true"   loop="-1" hidden="true"></embed>
<head>
<title>Institut Supérieur d'Informatique</title>
<meta charset="utf-8">
<link rel="stylesheet" href="css/reset.css" type="text/css" media="screen">
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
<link rel="stylesheet" href="css/layout.css" type="text/css" media="screen">
<script src="js/jquery-1.6.3.min.js"></script>
<script src="js/cufon-yui.js"></script>
<script src="js/cufon-replace.js"></script>
<script src="js/NewsGoth_BT_400.font.js"></script>
<script src="js/FF-cash.js"></script>
<script src="js/script.js"></script>
<script src="js/jquery.equalheights.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/tms-0.3.js"></script>
<script src="js/tms_presets.js"></script>
<script src="js/easyTooltip.js"></script>
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
        <div class="wrapper">
        <div class="slider">
          <ul class="items">
            <li><img src="images/img1.jpg" alt=""></li>
            <li><img src="images/img7.jpg" alt=""></li>
            <li><img src="images/img4.jpg" alt=""></li>
          </ul>
        </div>
        <a class="next">next</a>
        <div class="banner1-bg"></div>
        <div class="banner-1"></div>
      </div>
    </header>
    <!--==============================aside================================-->
   <aside>
      <div class="wrapper">
        <div class="column-1">
          <div class="box">
            <div class="aligncenter">
              <h4>Espace Etudiant </h4>
              

              
              
<?php
session_start(); // démarrage de la session
// si la variable de session "pseudo" existe
if(isset($_SESSION['login']))
{
echo 'Vous êtes connecté en tant que <span style="color: 0000FF;">' .
$_SESSION['login'] . '</span><br><br>';
echo '<a href="membre.php">Accéder à la zone membre</a><br><br>';
echo '<a href="log.php?action=logout">Se deconnecter</a><br><br>';
}
else
{
// si la variable erreur est dans l'url
if(isset($_GET['erreur']))
{
// le compte n'existe pas
if($_GET['erreur'] == 1)
echo '<span style="color: FF0000;">Le compte n\'existe pas</span>';
// mot de passe invalide
else if($_GET['erreur'] == 2)
echo '<span style="color: FF0000;">Le mot-de-passe que vous avec entré est
faux</span>';
}
              ?>
             
            <form id="contact-form" action="log.php" method="post" enctype="multipart/form-data">
                <fieldset>
                
              
                  <p>
                    <label><span class="text-form">Login:</span>
                      
                      <input type="text" name="login" value="">
                    </label>
                    
                    <label><span class="text-form">password:</span>
                      <input type="password" name="password" value="">
                      <br>
                      <br>
                      <br>
                    </label>
                  </p>
                        
                  <p></p>
                  <div class="box-bg maxheight">
                    <div class="padding"></div>
                    <div class="aligncenter">
  <center>
  
    <p>
      <input name="submit" type="submit"  class="button"  value="connecter"></p></center></div></div>
      
           <p style="color: #595959"><a href="inscription.php">S'inscrire</a> </p>
            </div>
                </fieldset>
                
                
            </form>
 
 <?php
}
?>
              
            
            <div class="aligncenter">
              <h4>Liens utiles</h4>
              <p><a href="http://www.utm.rnu.tn/">http://www.utm.rnu.tn/</a></p>
              <p><a href="http:/www.mes.tn/">http://www.mes.tn/</a></p>
              <p><a href="https://www2.inscription.tn/">https://www2.inscription.tn/</a>            </p>
            </div>  
            
          <p>&nbsp;</p>
          <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            
          </div>
        </div>
        <h2>ACTUALITÉ</h2>
        
              
            
        <ul>
          <li>
            
                          <h3>Planning des devoirs surveillés</h3>
                       
                            <ul>
                              <li><a href="ISI\ds.pdf">PLANNING DES DEVOIRS SURVEILLES (DS)  DU DEUXIEME SEMESTE 2013/2014</a></li>
                              <li><a href="ISI\ssice.pdf">Calendrier des DS du semestre 2 et de l'examen BDE, M1-SSICE</a></li>
                              <li><a href="ISI\recherche.pdf">Planning des devoirs surveillés – Mastère de recherche 1ère Année</a></li>
                </ul>
                            
                      
                             <h3> Calendrier des semaines</h3>
                            
                                  <ul>
        <li><a href="ISI\rap.pdf">Calendrier de dépôt des Rapports S.F.E, P.F.E et des Soutenance</a>s</li>
        <li><a href="ISI\sem.pdf">Calendrier des Semaines  </a></li>
                </ul>
                             
          </li>
          <li>
          
                                <h3>Affectation des stages de fin d&rsquo;études</h3>
                                <h4>Cycle de formation Licence</h4>
                                    <ul>
                                      <li><a href="ISI\ars.pdf">ARS</a> <a href="ISI\a.pdf">Annuaire département ARS</a></li>
                                      <li></li>
                                      <li><a href="ISI\sil.pdf">SIL </a></li>
                                    </ul>
                                    <h4>Cycle de formation Ingénieur<br>
                                    </h4>
                                    <ul>
                                      <li><a href="ISI\pfgl.pdf">PFE GLSI</a></li>
                                      <li><a href="ISI\gtr.pdf">PFE GTR</a></li>
                                    </ul>
            <h4>Mastère</h4>
            <a href="ISI\ssice.pdf">PFE SSICE</a>                                      
          </li>
          <li>
           
            <h3>Emploi du Temps 2 éme semestre 2013-2014</h3>
                
                <a href="ISI\emps2.pdf"></a>
          
          <a href="ISI\emps2.pdf">Emploi du Temps 2 éme semestre 2013-2014</a>          
       </ul>   </div>
    </aside>
  </div>
</div>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
    <!--==============================content================================-->
  </div>
    <p>&nbsp;</p>
</div>
<!--==============================footer=================================-->
<footer>
			<div class="main">
				<div class="footer-bg">
					<p class="prev-indent-bot"><img src="images/Sans titre1.png" width="27" height="37" alt=""/> 2 Rue Abou Raihane Bayrouni 2080 l&rsquo;Ariana</p>
					<p class="prev-indent-bot"><img src="images/Sans titre2.png" width="27" height="35" alt=""/>Tél : 71 706 164 | Fax : 71 706 698</p>
					<p class="prev-indent-bot"><img src="images/Sans titre4.png" width="45" height="24" alt=""/>Email : <a href="mailto:isi@isi.rnu.tn">isi@isi.rnu.tn</a>					</p>
					<ul class="list-services">
					  <li></li>
						<li class="item-1"></li>
						<li class="item-2"></li>
					</ul>
				</div>
			</div>
		</footer>
<script>Cufon.now();</script>
<script>
$(window).load(function () {
    $('.slider')._TMS({
        duration: 800,
        easing: 'easeOutQuart',
        preset: 'simpleFade',
        slideshow: 7000,
        banners: false,
        pauseOnHover: true,
        waitBannerAnimation: false,
        prevBu: '.prev',
        nextBu: '.next'
    });
    
});
</script>
</body>
</html>

