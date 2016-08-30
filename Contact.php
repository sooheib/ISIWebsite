<?php
 
if(isset($_POST['email'])) {
 
     
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
 
    $email_to = "you@yourdomain.com";
 
    $email_subject = "Your email subject line";
 
     
 
     
 
    function died($error) {
 
        // your error code can go here
 
 '<script type="text/javascript">'
 . 'alert("We are very sorry, but there were error(s) found with the form you submitted.");'
 . '</script>';
	
 
     '<script type="text/javascript">'
 . 'alert("These errors appear below.<br /><br />");'
 . '</script>';
 
        echo $error."<br /><br />";
		
		'<script type="text/javascript">'
 . 'alert("Please go back and fix these errors.<br /><br />");'
 . '</script>'; 
        die();
 
    }
 
     
 
    // validation expected data exists
 
    if(!isset($_POST['first_name']) ||
 
        !isset($_POST['last_name']) ||
 
        !isset($_POST['email']) ||
 
        !isset($_POST['telephone']) ||
 
        !isset($_POST['comments'])) {
 
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
 
    }
 
     
 
    $first_name = $_POST['first_name']; // required
 
    $last_name = $_POST['last_name']; // required
 
    $email_from = $_POST['email']; // required
 
    $telephone = $_POST['telephone']; // not required
 
    $comments = $_POST['comments']; // required
 
     
 
    $error_message = "";
 
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
 
    $error_message .= '<script type="text/javascript">'
 . 'alert("The Email Address you entered does not appear to be valid.<br />");'
 . '</script>';
	

 
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$first_name)) {
 
    $error_message .= '<script type="text/javascript">'
 . 'alert("The First Name you entered does not appear to be valid.<br />");'
 . '</script>';
	
 
  }
 
  if(!preg_match($string_exp,$last_name)) {
 
    $error_message .='<script type="text/javascript">'
 . 'alert("The Last Name you entered does not appear to be valid.<br />");'
 . '</script>';
 
  }
 
  if(strlen($comments) < 2) {
 
    $error_message .= '<script type="text/javascript">'
 . 'alert("The message you entered do not appear to be valid.<br />");'
 . '</script>';
 
  }
 
  if(strlen($error_message) > 0) {
 
    died($error_message);
 
  }
 
    $email_message ='<script type="text/javascript">'
 . 'alert("Form details below.\n\n");'
 . '</script>'; 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
 
     
 
    $email_message .= "First Name: ".clean_string($first_name)."\n";
 
    $email_message .= "Last Name: ".clean_string($last_name)."\n";
 
    $email_message .= "Email: ".clean_string($email_from)."\n";
 
    $email_message .= "Telephone: ".clean_string($telephone)."\n";
 
    $email_message .= "Comments: ".clean_string($comments)."\n";
 
     
 
     
 
// create email headers
 
$headers = 'From: '.$email_from."\r\n".
 
'Reply-To: '.$email_from."\r\n" .
 
'X-Mailer: PHP/' . phpversion();
 
@mail($email_to, $email_subject, $email_message, $headers);  
 
?>
 
 
 
<!-- include your own success html here -->
 
 
 
 
 <script type="text/javascript">
  alert("Thank you for contacting us. We will be in touch with you very soon.");
  </script>; 
 
 
<?php
 
}
 
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Contact</title>
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
    
<!--==============================content================================-->
	<section id="content">
					<div class="wrapper">
						<article class="col-1">
							<div class="indent-left">
								<h3 class="p1">Contact </h3>
                            
          
                                                                                                                                      <form action="Contact.php"     id="contact-form" method="post" enctype="multipart/form-data">
  
  <label for="first_name">Prénom *</label>
 
 
 <input  type="text" name="first_name" maxlength="50" size="30">

  <label for="last_name">Nom *</label>
 
  <input  type="text" name="last_name" maxlength="50" size="30">

 
  <label for="email">Email*</label>
 
  <input  type="text" name="email" maxlength="80" size="30">
 

 
  <label for="telephone">Telephone </label>
 
  <input  type="text" name="telephone" maxlength="30" size="30">
 
  <label for="comments">message *</label>
 
  <textarea  name="comments" maxlength="1000" cols="25" rows="6"></textarea>
 
 
  <input type="submit" value="Submit">
 
					</form>
                                
                                

							</div>
						</article>
						<article class="col-2">
							<h3 class="p1">&nbsp;</h3>
							<p><span class="prev-indent-bot">2 Rue Abou Raihane Bayrouni 2080 l&rsquo;Ariana</span></p>
						<dl class="img-indent-bot">
								<dd><span>Telephone:</span><span class="prev-indent-bot">71 706 164</span></dd>
								<dd><span>Fax:</span><span class="prev-indent-bot">71 706 698</span></dd>
								<dd><span>Email:</span><a href="mailto:isi@isi.rnu.tn">isi@isi.rnu.tn</a></dd>
								<dl>
								  <dd>&nbsp;</dd>
								  <dd>&nbsp;</dd>
								  <dd>&nbsp;</dd>
						  </dl>
					    </dl>
					  </article>
					</div>
					<div class="block"></div>
				</section>
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