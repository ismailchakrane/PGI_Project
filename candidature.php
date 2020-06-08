<?php 

session_start();
require_once 'traitement_PHP/photo_et_nom_users.php';


if (empty($_SESSION['id'])) {
  
  $_SESSION['flash']['danger'] = 'Vous  devez être connecté';

  header("Location: login.php");    
  
} 



$candidature = $pdo->prepare("SELECT * FROM users  WHERE id = ?");
$candidature->bindValue(1, $_SESSION['id']);
$candidature->execute();

$affichage = $candidature->fetch();



?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <link rel="shortcut icon" href="style/Icon/pgicon.ico">
  <meta charset="utf-8">
  <title>Page de profil</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style/css_style/styleprofil.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <style type="text/css">
    li img {
      width: 40px;
      height: 40px;
      border-radius: 50% ;
      
    }
    th {
      font-family: montserrat;
      border-radius:  5px;
      background:  #8c8c8c;
    }
    .ligne{
      
      border-right:3px white solid; 
    }
    table {
      text-align: center;
    }
    #case1{
      width: 25%;
    }
    #case2{
      width: 25%;
    }
    #case3{
      width: 25%;
    }
    #case4{
      width: 25%;
    }
    .form_card{
      border-top-width: 0px;
      width: 140%;
      height: 100%;
      margin-top: 0px;
      background: white;
      padding: 1.5em;
      border-radius: .4em;
      box-shadow:
      0 20px 30px 0 rgba(0,0,0,.1),
      0 4px  4px 0 rgba(0,0,0,.15);
    }
    
  </style>
</head>
<body>
  <nav>
    <input type="checkbox" id="check">
    <label for="check" class="checkbtn">
      <i class="fas fa-bars"></i>
    </label>
    <label class="logo">Espace etudiant</label>
    <ul>
      <li><img src="<?php echo $PHOTO->file_url1; ?>"></li>
      <li style="color: white;"><?php echo $NOM->nom_fr.' '.$NOM->prénom_fr;   ?></li>
      <li><a href="profil.php">PRINCIPALE</a></li>
      <li><a href="candidature.php">Mes candidatures</a></li>
      
      <li><a href="traitement_PHP/logout.php">Quitter</a></li>
    </ul>
  </nav>
  

  <div class="container"
  style="display: grid;
  grid-template-columns: repeat(2,auto);
  grid-gap: 4em;
  margin-top:2em;">
  <h1>Mes candidatures</h1>
  <br>
  <main>

    <?php  if (!empty($affichage->candidature)):?>
      <div class="card form_card">
        <table  >
          <tr  >
            <th class="ligne" id='case1' > Nom d'établissement</th>
            <th class="ligne" id='case2' > Date d'inscription </th>
            <th class="ligne"id='case3'> filière choisie</th>
            <th id='case4'> Statut d'admission</th>
            
          </tr>
          <tr>
            <td class="ligne">ENS MARRAKECH</td>
            <td class="ligne"><?php echo $affichage->date_candidature; ?></td>
            <td class="ligne"><?php echo $affichage->filièreENS;  ?></td>
            <td><?php echo $affichage->candidature;  ?></td>
          </tr>

        </table>
        
      </div>

      <?php  else: ?>   


       <div class="card form_card">
        <table  >
          <tr  >
            <th class="ligne" id='case1' > Nom d'établissement</th>
            <th class="ligne" id='case2' > Date d'inscription </th>
            <th class="ligne"id='case3'> filière choisie</th>
            <th id='case4'> Statut d'admission</th>
            
          </tr>
          <tr>
            <td class="ligne">---</td>
            <td class="ligne">---</td>
            <td class="ligne">---</td>
            <td>---</td>
          </tr>

        </table>
        
      </div>

    <?php  endif; ?>


  </main> 
</div> 

</body>
</html>
