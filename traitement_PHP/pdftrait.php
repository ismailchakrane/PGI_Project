<?php
session_start();
require_once 'photo_et_nom_users.php';
require_once '../vendor/autoload.php';
//require_once __DIR__ . '..\vendor\autoload.php';


if (empty($_SESSION['id'])) {
	
	$_SESSION['flash']['danger'] = 'Vous  devez être connecté';

	header("Location: ../login.php");    
	
} 



$requete= $pdo->prepare("SELECT * FROM users WHERE id = ?");
$requete->bindValue(1, $_SESSION['id']);
$requete->execute();
$pdf = $requete->fetch();



//variables:

$nom = $pdf->nom_fr;
$prénom = $pdf->prénom_fr;
$annéeBAC = $pdf->AnnéeBAC;
$CNE = $pdf->CNE;
$CIN = $pdf->CIN;
$dateNaissance = $pdf->date_de_naissance;
$datePréinscription = $pdf->date_candidature;
$Etablissement = 'ENS MARRAKECH';
$filiére = $pdf->filièreENS;
$photo =  $pdf->file_url1;


//génération du PDF:
$mpdf = new \Mpdf\Mpdf();


$data ='';


$data .='<style type="text/css">
.logo_pgi_1
{
	font-family:sans-serif;
	font-size: 29px;
	font-weight: 700;
	color: black;
	text-transform: uppercase;
	letter-spacing: 7px;
}

.logo_pgi_2
{
	font-family:sans-serif;
	font-size: 	15px;
	font-weight: 500;
	color: black;
	margin-left: 1%;
	letter-spacing: 2px;
	font-weight: 700;

}
.titre_pdf
{
	margin-left: 28%;
	font-size: 22px;
	color: #3F88BA;
	margin-top: 2.5%;
	font-weight: 700;
}
h2
{
	color: white;
	background: #93CFDC;
	width: 25%;
	font-family:sans-serif;
	margin-left: 3%;
}

tt
{
	color: #49ACC0;
	margin-left: 10px;
}
ul li
{
	text-decoration: none;
	display: inline-table;
	font-family: cursive;
	margin-top: 10px;
	margin-left: 4%; 

}
p{


	font-family: cursive;
	margin: auto;
	font-size: 13px;
	text-align: center;

}
</style>';

$data .='<header>
<div class="logo_pgi_1">Plateforme</div>
<div class="logo_pgi_2">De Gestion d\'inscription</div>
<div class="titre_pdf">Récu de Pré-inscription</div>


</header>
<div>
<h2>FORMATIONS CHOISIES</h2>
<ul>

<img src="../'.$photo.'" width="100px" height="100px";>
<br>
<li>Nom :<tt>'.$nom.'</tt></li>
<br>
<li>Prenom :<tt>'.$prénom.'</tt></li>
<br>
<li>CNE :<tt>' .$CNE. '</tt></li>
<br>
<li>CIN :<tt>'.$CIN.'</tt></li>
<br>
<li>Date de naissance :<tt>' .$dateNaissance.  '</tt></li>
<br>
<li>Année d\'obtention du BAC :<tt>' .$annéeBAC. '</tt></li>
<br>
<li>Date de pré-inscription :<tt>' .$datePréinscription.  '</tt></li>

</ul>
</div>
<div>
<h2>FORMATION CHOISIE:</h2>
<ul>

<li>Etablissement :<tt>' .$Etablissement.  '</tt></li>
<br>
<li>Filière :<tt>' .$filiére.  '</tt></li>


</ul>



</div><br><br>

<p><i>Le présent reçu vous sera demandé lors de la validation de votre inscription. </i></p>
';



$mpdf->WriteHTML($data);
$test=$mpdf->Output('reçu_ENS_M.pdf','D');

header('location : ../profil.php');







?>