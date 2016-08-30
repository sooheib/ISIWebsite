<?php
// login
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


// logout
else if($_GET['action'] == 'logout')
{
	session_unset(); // suppression des variables de sessions
	session_destroy(); // destruction de la session
	header("location: index.php"); // redirection
}
?>