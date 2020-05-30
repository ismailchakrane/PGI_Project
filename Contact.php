<?php
//send to gmail email=projet.pgi@gmail.com pwd=PGI2K19SQL
//pour faire un test online https://pgitest.000webhostapp.com/Contact.php
//send email from localhost to gmail refuse 
//send email from localhost to maildev accept 
?>
<?php

$type="msg";


if(isset($_POST['envoye']))
{
	if(!empty($_POST['nom']) AND !empty($_POST['email']) AND !empty($_POST['objet']) AND !empty($_POST['message']))
	{
		$header="MIME-Version: 1.0\r\n";
		$header.='Content-Type:text/html; charset="uft-8"'."\n";
		$header.='Content-Transfer-Encoding: 8bit';
		$message='
		<html>
			<body>
				<div align="center">
					<div ><img src="https://i.ibb.co/8634GLg/Pgi.png"></div>
					<div style="background: #F9F9F9; width: 48%; font-family: fantasy;">
						<br>
					<p style="padding-right: 30%;">
							Nom : 
						<span style="margin-left: 10%;font-family:initial;">
							'.$_POST['nom'].'
						</span>
					</p>
					<p style="padding-right: 30%;">
							E-mail : 
						<span style="margin-left: 10%;font-family:initial;">
							'.$_POST['email'].'
						</span>
					</p>
					<p style="padding-right: 30%;">
							Objet : 
						<span style="margin-left: 10%;font-family:initial;">
							'.$_POST['objet'].'
						</span>
					</p>
					<p style="padding-right: 50%;">Messge :</p>
 						<span style="font-family:initial;">'.($_POST['message']).'</span>
					<br><br>
				</div>
			</body>
		</html>
		';

		mail("projet.pgi@gmail.com", "CONTACT - PGI", $message, $header);//On peut changer l'email;
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
	<link rel="stylesheet" type="text/css" href="style/index.css">
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
				<div class='<?php echo $type; ?>flash'>
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

</body>
</html>
