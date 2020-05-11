<?php 

session_start();
require_once 'photo_et_nom_users.php';



 if (!empty($_POST)) {
   if (!empty($_POST['filièreENS'])){

            $filièreENS = $_POST['filièreENS'];
  
            $candidature = 'inscrit';

           $dure =  date("Y-m-d"); 

             $requete= $pdo->prepare("UPDATE users SET filièreENS = ?,candidature = ?,date_candidature = ? WHERE id = (SELECT MAX(id) FROM users)");
             
              $requete->bindValue(1, $filièreENS);
              $requete->bindValue(2, $candidature);
              $requete->bindValue(3, $dure);

             
             $requete->execute();

             

            

    $_SESSION['flash']['success'] = 'L\'Inscription a l\'ENS MARRAKECH est terminée avec succès vous pouvez maintenant retournez vers la page principale';
    header('location: pdftrait.php');
    exit();

 
    
}

else{

    $errors[]="le champs doit être remplis"; 
    
 }
}




?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Page de profil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/styleprofil.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
     <style type="text/css">
      li img {
        width: 40px;
        height: 40px;
        border-radius: 50% ;
        
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
        
        <li><a href="logout.php">Quitter</a></li>
      </ul>
    </nav>
  

 <?php 
                if (session_status() == PHP_SESSION_NONE ) {

                    session_start();
                }
                ?>
    <?php if (isset($_SESSION['flash'])): ?>
                       <?php foreach ($_SESSION['flash'] as $type => $message): ?>
                 
                         <div class="alert alert-<?=$type; ?>"><li><?=$message;?></li></div>

                      <?php endforeach; ?>
                     <?php unset($_SESSION['flash']); ?>
                 <?php endif;?>






<?php  if (!empty($errors)):?>

<div class="alert alert-danger">
    <p>vous n'avez pas rempli le formulaire correctement</p>
   
  <?php foreach ($errors as $error): ?>
  <ul>

      <li><?= $error; ?></li>
      
      <?php endforeach; ?> 

      </ul>

<?php endif; ?>

   
<form action="" method="POST">
<div class="container"
           style="display: grid;
             grid-template-columns: repeat(2,auto);
             grid-gap: 4em;
             margin-top:2em;">
                <h3>Vous pouvez choisir les filiéres disponibles:</h3>
                <br>
                       
            <main>
              <div class="card" style="
                  border-top-width: 0px;
                  width: 450px;
                  height: 300px;
                  margin-top: 0px;
                  background: white;
                  padding: 1.5em;
                  border-radius: .4em;
                  box-shadow:
                 0 20px 30px 0 rgba(0,0,0,.1),
                 0 4px  4px 0 rgba(0,0,0,.15);">
                <img src="style/img/logoens.jpg">
                <strong>ENS Marrakech</strong>
                <select class="browser-default custom-select" name="filièreENS">
                               <option selected>Les filières</option>
                               <option value="CLE-SVT">CLE-ENSEIGNEMENT SECONDAIRE SCIENCES DE LA VIE ET DE LA TERRE</option>
                               <option value="CLE-INFO">CLE-ENSEIGNEMENT SECONDAIRE INFORMATIQUE</option>
                               <option value="CLE-MATHS">CLE-ENSEIGNEMENT SECONDAIRE MATHS</option>
                               <option value="CLE-PC">CLE-SECONDAIRE SCIENCES PHYSIQUES ET CHIMIQUES</option>
                               <option value="CLE-PRIMAIRE">CLE-ENSEIGNEMENT PRIMAIRE</option>
                               <option value="DUT-INFO">DUT-INGÉNIERIE INFORMATIQUE</option>
                              
                         </select> 
                <input class="btn btn-info" type="submit" value="Confirmer" >
              </div>
            </main>
      

 </div> 
</form> 
  </body>
</html>
