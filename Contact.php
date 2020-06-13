<?php

define('_EMAIL_TO', 'contact@pgi.ma'); 
define('_EMAIL_SUBJECT', 'CONTACT  -  PGI'); 
define('_EMAIL_FROM', $_POST['email']);


if(isset($_POST['envoye']))
{
	if(!empty($_POST['nom']) AND !empty($_POST['email']) AND !empty($_POST['objet']) AND !empty($_POST['message']))
	{
		
        //$header="MIME-Version: 1.0\r\n";
		//$header.='Content-Type:text/html; charset="uft-8"'."\n";
		//$header.='Content-Transfer-Encoding: 8bit';
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers = "From: "._EMAIL_FROM."\r\n"; 
		$headers .= "Reply-To: "._EMAIL_FROM."\r\n"; 	
		$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
		$message='
		<html>
		<style type="text/css">
		td{padding-bottom: 10%;}
		.all{border-right: 5px solid black;border-left: 5px solid black;border-top: 5px solid black;border-bottom: 5px solid black;background: rgba(110,110,180,.1);}
		</style>
		
		<body>

		<div align="center">
		<img src="https://i.ibb.co/8634GLg/Pgi.png">
		<div class="all">
		<br>			
		<table>

		<tr>
		<td><strong>Nom :</strong></td>
		<td style="font-family:cursive;">'.$_POST['nom'].'</td>
		</tr>

		<tr>
		<td><strong>E-mail :</strong></td>
		<td style="font-family:cursive;">'.$_POST['email'].'</td>
		</tr>

		<tr>
		<td><strong>Objet :</strong></td>
		<td style="font-family:cursive;">'.$_POST['objet'].'</td>
		</tr>

		<tr>
		<td><strong><u>Messge :</u></strong></td>
		</tr>

		</table>
		<div style="font-family:cursive;max-width: 50%">'.$_POST['message'].'</div>
		<br><br>
		</div></div>


		</body>
		</html>
		';

		

		mail (_EMAIL_TO, _EMAIL_SUBJECT, $message, $headers);
		$msg="Votre message a été Envoyer";
	}
	else
	{
		$msg="Vous n'avez pas rempli le formulaire correctement";
		
	}	    
	
}
?>
<html>
<head>
	<title>Contact - plateforme de gestion d'inscription</title>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="style/Icon/pgicon.ico">
	<link rel="stylesheet" type="text/css" href="style/css_style/index.css">
</head>

<body>

	<!-- Header -->

	<header class="header">
		<div class="header_content">
			<!-- Logo -->
			
			<div class="logo_content">
				<div class="logo">
					<div class="logo_pgi_1">Plateforme<br></div>
					<div class="logo_pgi_2">De Gestion d'inscription</div>
				</div>
			</div>
		</div>


		<!--  Navigation -->
		<nav class="nav_content">
			<ul>
				<li class="nav_item"><a href="index.html">Acceuil</a></li>
				<li class="nav_item"><a href="about.html">A propos</a></li>
				<li class="nav_item"><a href="Contact.php">Contact</a></li>
				<li class="nav_item btn_login"><a href="login.php">Se Connecter</a></li>

			</ul>
		</nav>

	</header>	
	<div class="home_contact">

		<div class="contact_form">
			<div class="contact_title"><tt>CONTACT</tt></div>
			<div class="msgflash">
				<?php
				if(isset($msg))
				{
					echo $msg;
				}
				?>
			</div>
			<div class="contact_form_content">

				<form method="POST" action="">
					<input name="nom" class="input" type="text" placeholder="Nom complet" required>
					<br><br>
					<input name="email" class="input" type="email" placeholder="E-mail" required>
					<br><br>
					<input name="objet" class="input" type="text" placeholder="Sujet" required>
					<br><br>
					<textarea name="message" class="text"  placeholder="Message" required></textarea>
					<br><br>
					<input name="envoye" class="contact_send_btn" type="submit" class="btn-submit" value="Envoyer le message">
				</form>

			</div>
		</div><br>
	</div>
	<style type="text/css">
	/*********************************
 			Contact
 			*********************************/
 			.home_contact
 			{
 				margin-top: 8%;
 				margin-left: 4.5%;
 				background-color: hsla(200, 50%, 80%, 0.4);
 				width: 47%;
 			}

 			.contact
 			{
 				padding-top: 106px;
 				padding-bottom: 117px;
 			}
 			.contact_title
 			{
 				font-size: 36px;
 				font-weight: 500;
 				color: #1a1a1a;
 				background-color: #31769B;
 				text-align: center;
 				letter-spacing: 2px; 
 			}
 			.contact_form_content
 			{
 				margin-top: 67px;
 			}
 			.input
 			{
 				width: 70%;
 				background: hsla(200, 30%, 45%, 0.4);
 				border: solid 2px transparent;
 				margin-bottom: 24px;
 				height: 42px;
 				padding-left: 33px;
 				margin-left: 12%;
 			}
 			.input:focus
 			{
 				outline: none !important;
 				border-color: #75CFC4;
 			}
 			.text
 			{
 				width: 70%;
 				height: 189px;
 				background: hsla(200, 30%, 45%, 0.4);
 				border: solid 2px transparent;
 				padding-left: 33px;
 				margin-bottom: 24px;
 				margin-left: 12%;
 			}
 			.text:focus
 			{

 				border-color: #75CFC4;
 			}
 			.contact_send_btn
 			{
 				width: 70%;
 				height: 48px;
 				background: #31769B;
 				font-size: 14px;
 				font-weight: 700;
 				text-transform: uppercase;
 				color: #FFFFFF;
 				cursor: pointer;
 				border: none;
 				padding-top: 10px;
 				margin-left: 12%;
 			}
 			.contact_send_btn:focus
 			{
 				outline: solid 1px #0D1D26;
 			}

 			.msgflash
 			{
 				background-color: hsla(200, 50%, 80%, 0.8);
 				padding: 5px 10px;
 				color: #3d503d;
 				font-size: 0.9em;
 				font-family: cursive;
 				text-align: center;
 				font-weight: 700;
 			}
 		</style>
 	</body>
 	</html>
