<?php
if(isset($_POST['submit']))
{
	$username=htmlentities(trim($_POST['login']));
$password=htmlentities(trim($_POST['password']));
$rpassword=htmlentities(trim($_POST['confirmation']));
$email=htmlentities(trim($_POST['email']));
if($username&&$password&&$rpassword)
{
	if($password==$rpassword)	
{
	
	$password=md5($password);
	$connect=mysql_connect('localhost','root','') or die('Error');
	mysql_select_db('bd');
	$reg=mysql_query("SELECT * FROM users WHERE login='$username'");
	$rows=mysql_num_rows($reg);
	if($rows==0)
{

$query=mysql_query("INSERT INTO `users`(`login`,`password`,`email`) VALUES('$username','$password','$email')");




die("Inscription términéee <a href='cnx.php'>connétez</a>vous");	
}


else echo '<script type="text/javascript">'
 . 'alert("Ce psuedo  est  disponible");'
 . '</script>' ;


 
}else echo'<script type="text/javascript">'
 . 'alert("les deux passwords doient etre identiques");'
 . '</script>';


}else echo '<script type="text/javascript">'
 . 'alert("saisir tous les champs");'
 . '</script>';

}

?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Inscription</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/reset.css" type="text/css" media="screen">
		<link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
		<link rel="stylesheet" href="css/layout.css" type="text/css" media="screen">
		<style type="text/css">
		.footermargins {padding-left:40px;padding-right:40px;}
.pagemargins {padding-left:40px;padding-right:40px;}
.progressbartext {color:#F9FAEB;}
#form {width:700px;}
#formcontent {background-color:#F9FAEB;}
#infoheader {display:none;background-color:#4A331D;}
#p1f1 {width:620px;}
#p1f10 {width:620px;}
#p1f10c {font-family:Times New Roman, Times, serif;font-size:14px;width:92px;max-width:92px;}
#p1f11 {width:620px;}
#p1f12 {width:620px;}
#p1f12c {font-family:Times New Roman, Times, serif;font-size:14px;width:142px;max-width:142px;}
#p1f13 {width:620px;}
#p1f13c {font-family:Times New Roman, Times, serif;font-size:14px;width:143px;max-width:143px;}
#p1f14 {width:620px;}
#p1f14c {font-family:Times New Roman, Times, serif;font-size:14px;width:279px;max-width:279px;}
#p1f15 {width:620px;}
#p1f2 {width:620px;}
#p1f3 {width:620px;}
#p1f3c {font-family:Times New Roman, Times, serif;font-size:14px;width:279px;max-width:279px;}
#p1f4 {width:620px;}
#p1f4c {font-family:Times New Roman, Times, serif;font-size:14px;width:279px;max-width:279px;}
#p1f5 {width:620px;}
#p1f6 {width:620px;}
#p1f6c {font-family:Times New Roman, Times, serif;font-size:14px;width:279px;max-width:279px;}
#p1f7 {width:620px;}
#p1f7c {font-family:Times New Roman, Times, serif;font-size:14px;width:279px;max-width:279px;}
#p1f8 {width:620px;}
#p1f8c {font-family:Times New Roman, Times, serif;font-size:14px;width:279px;max-width:279px;}
#p1f9 {width:620px;}
#p2f1 {width:620px;}
#p2f10 {width:620px;}
#p2f11 {width:620px;}
#p2f2 {width:620px;}
#p2f3 {width:620px;}
#p2f4 {width:620px;}
#p2f5 {width:620px;}
#p2f6 {width:620px;}
#p2f7 {width:620px;}
#p2f8 {width:620px;}
#p2f9 {width:620px;}
#pagecountspan {color:#F9FAEB;}
        </style>
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
 
<!--==============================content================================--><!--==============================aside================================-->
				
                <aside>
                
				  <div class="indent-left">
				    <h3 class="p1">Formulaire d'inscription</h3>
				    <form id="contact-form"  action="inscription.php" method="post" enctype="multipart/form-data">
				      <fieldset>
				        <label><span class="text-form">Login:</span>
				          <input type="text" name="login" value="">
			            </label>
				        <label><span class="text-form">password:</span>
				          <input type="password" name="password" value="">
			            </label>
				        <label><span class="text-form">confirmation:</span>
				          <input type="password" name="confirmation" value="" >
			            </label>
                     <label><span class="text-form">Email:</span>
				          <input type="texr" name="email" value="" >
			            </label>
                        <input type="submit" value="confirmer" name="submit">

                     
			           
               
			          </fieldset>
                      </form>

			        

			      </div>
<p>&nbsp;</p>
				</aside>
                
			</div>
		</div>
        
        <br>
        <br>
        
<!--==============================footer=================================-->
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