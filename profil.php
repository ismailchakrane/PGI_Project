<?php
session_start();
require_once 'photo_et_nom_users.php';




     


      if (empty($_SESSION['id'])) {
        
    $_SESSION['flash']['danger'] = 'Vous  devez être connecté';

    header("Location: login.php");    
          
       } 

  $req = $pdo->prepare('SELECT * FROM users WHERE id = ? ');
  $req->bindValue(1, $_SESSION['id']);

  $req->execute();

  $user = $req->fetch();



        




?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
       <link rel="shortcut icon" href="style/Icon/pgicon.ico">
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
        <li><a href="#">Principale</a></li>
        <li><a href="candidature.php">Mes candidatures</a></li>

        <li><a href="logout.php">Quitter</a></li>
      </ul>
    </nav>
    

 <?php  if (isset($user->id) ) :?>

                      
                 
                         <div class="alert alert-success"><li>Vous êtes maintenant connecté</li></div>

    
<?php endif;?>            

    


 <div class="container"
 style=" display: grid;
         grid-template-columns: repeat(2,auto);
         grid-gap: 4em;
         margin-top:2em;">
      <h3 >Vous pouvez faire la préinscription pour les catégories suivantes:</h3>
      <br>
  <main>

 


<?php  if (empty($user->candidature)):?>


  

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
      <a href="ens.php"><strong>Pour la Pré-inscription</strong></a>
      <p><strong>Du: 2020-06-01 au 2020-06-30</strong></p>
    </div>
  </main>
</div>  


<?php  else: ?>

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
      <p><strong>Etat d'inscription: <span  style="color: green; ">Pré-inscrit</span></strong></p>
      <a href="pdftrait.php"><strong>le Reçu</strong></a>
    </div>
  </main>
</div>  

<?php  endif; ?>



  </body>
</html>
