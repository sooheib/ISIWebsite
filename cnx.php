<?php
session_start();

if(isset($_POST['submit']))
{
$username=htmlentities(trim($_POST['login']));
$password=htmlentities(trim($_POST['password']));

if($username&&$password)
{
$password=md5($password);
$connect=mysql_connect('localhost','root','') or die('Error');
mysql_select_db('bd');
$query=mysql_query("SELECT * FROM users WHERE login='$username'&& password='$password'");
$rows=mysql_num_rows($query);
	
	if($rows==0)
	
	{
	      $_SESSION['login']=$username;
		  header('Location:membre.php');
		}
		
		
	 else echo  '<script type="text/javascript">'. 'alert("pseudo ou password incorrect");'. '</script>';
	
		}     	 
	    
	else echo  '<script type="text/javascript">'. 'alert("veuillez saisir tous les champs");'. '</script>'; 

}

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Connexion</title>
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
	<body id="page6">
		<div class="extra">
			<div class="main">
<!--==============================header=================================-->
				<header>
      <div class="indent">
        <div class="row-top">
          <div class="wrapper">
            <p><img src="images/Tunisie.png" width="38" height="25" alt=""/><span style="text-align: left"><strong>République</strong></span><strong> Tunisienne | Ministère de l'Enseignement Supérieur et de Recherche Scientifique | Université <span style="color: #0D0D0D">ElManar</span></strong><A href="Contact.php"> <img src="images/TRESO-ContactezNous-Orange.jpg" width="166" height="36" alt=""/></a></p>
            <p><a href="index.php"><img src="images/isi.jpg" width="162" height="55" alt=""/></a></p>
          </div> 
        </div>
        <nav>
          <ul class="menu">
			<li><a href="index.php">ACCUEIL</a></li>
			<li><a href="université.html">UNIVERSITE</a></li>
			<li><a href="formation.html">FORMATION</a></li>
			<li><a href="Vie.html">VIE ASSOCIATIVE</a></li>
								
			<li class="last"><a href="statt.html">STATS</a></li>
							</ul>
        </nav>
      </div>
	</header>
					
<!--==============================content================================-->
	<section id="content">
    	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	

	  <div class="column-11">
    <div class="box">
          <div class="aligncenter">
            <form id="contact-form1" action="cnx.php" method="post" enctype="multipart/form-data">
                <fieldset>
                <label><span class="text-form">Login:</span>
				          <input type="text" name="login" value="">
	              </label>
                  
				        <label><span class="text-form">password:</span>
				          <input type="password" name="password" value="">
                          
                          
			            </label>
                      
                         
                <input name="submit" type="submit"  class="button"  value="connecter">
                
            
                        
                     
                </fieldset>
            </form>
              
       
            
            <div class="aligncenter">
              <h4>&nbsp;</h4>
            </div>
           
        </div>
       
      </div>
      
	</section>
		<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p><!--==============================footer=================================-->    </p>
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
	</footer>
		<script type="text/javascript"> Cufon.now(); </script>
		<script type="text/javascript">
			$(window).load(function() {
				$('.slider')._TMS({
					duration:800,
					easing:'easeOutQuart',
					preset:'simpleFade',
					slideshow:7000,
					banners:false,
					pauseOnHover:true,
					waitBannerAnimation:false,
					prevBu:'.prev',
					nextBu:'.next'
				});
			});
		</script>
	</body>
</html>