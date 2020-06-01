<?php 



session_start();



      if (empty($_SESSION['id'])) {
        
    $_SESSION['flash']['danger'] = 'Vous  devez être connecté';

    header("Location: login.php");    
          
       } 
    $errors=array();


  if (!empty($_FILES)) {


           
            $errors=array();
    
            $pdo = new PDO('mysql:dbname=first_proj;host=localhost','root','');

            $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);

        


 if (!empty($_FILES['file1']) && !empty($_FILES['file2']) && !empty($_FILES['file3'])){



// la photo de profil:    

    $name_file1 = $_FILES['file1']['name'];

    $name_extension1 = strrchr($name_file1, ".");

    $extensions_autorisation1 = array('.png','.PNG','.jpg','.JPG' );

    $file_tmp_name1 = $_FILES['file1']['tmp_name'];

    $file_dest1 = 'files_upload/'.$name_file1;

// le fichier PDF:
    $name_file2 = $_FILES['file2']['name'];

    $name_extension2 = strrchr($name_file2, ".");

    $extensions_autorisation2 = array('.pdf','.PDF');

    $file_tmp_name2 = $_FILES['file2']['tmp_name'];

    $file_dest2 = 'files_upload/'.$name_file2;

//le BAC :

    $name_file3 = $_FILES['file3']['name'];

    $name_extension3 = strrchr($name_file3, ".");

    $extensions_autorisation3 = array('.pdf','.PDF');

    $file_tmp_name3 = $_FILES['file3']['tmp_name'];

    $file_dest3 = 'files_upload/'.$name_file3;



          if (in_array($name_extension1, $extensions_autorisation1) && in_array($name_extension2, $extensions_autorisation2) && in_array($name_extension3, $extensions_autorisation3)) {
            
            if (move_uploaded_file( $file_tmp_name1,$file_dest1) && move_uploaded_file( $file_tmp_name2,$file_dest2) && move_uploaded_file( $file_tmp_name3,$file_dest3)) {

             $insertionFile = $pdo->prepare("UPDATE users SET name_file1 = ?,file_url1 = ?,name_file2 = ?,file_url2 = ?,name_file3 = ?,file_url3 = ? WHERE  id =? ");

               $insertionFile->bindValue(1, $name_file1);
               $insertionFile->bindValue(2, $file_dest1);
               $insertionFile->bindValue(3, $name_file2);
               $insertionFile->bindValue(4, $file_dest2);
               $insertionFile->bindValue(5, $name_file3);
               $insertionFile->bindValue(6, $file_dest3);
               $insertionFile->bindValue(7, $_SESSION['id']);

               $insertionFile->execute();

              $_SESSION['flash']['success'] = ' Compte bien créé';
              header('location: profil.php');

                    }

       }    
          else{
           
            $errors['file1']= "Pour l'images seuls les extenetions PNG ou JBG sont autorisées";
            $errors['file2']= "Pour le fichier de la Carte d'identité seul l'extenetion PDF est autorisée";
            $errors['file3']= "Pour le fichier du BAC  seul l'extenetion PDF est autorisée";

       }     
  
}
else{
   $errors['error']= "Tout les fichiers doivent être uploadés ";
    }
}




?>
<!DOCTYPE html>
 <html>
<head>
      <link rel="shortcut icon" href="style/Icon/pgicon.ico">
  <meta charset="utf-8">
    <title>Page de profil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/css_style/styleprofil.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<style>
  td{width:50%;}
  hr{border: 3px solid rgb(113, 197, 223);border-radius: 10px;}
</style>
</head>
<body>
 
<?php  if (!empty($errors)):?>
  <div class="alert alert-danger">
  <p>Vous n'avez pas uploader les fichiers  correctement</p>
   
  <?php foreach ($errors as $error): ?>
  <ul>

    <li><?= $error; ?></li>
    
    <?php endforeach; ?> 

    </ul>

</div>
<?php endif; ?>



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
       



<form class="md-form" method="POST" enctype="multipart/form-data" >
        <div class="container"
       style="display: grid;
         grid-template-columns: repeat(1,auto);
         grid-gap: 4em;
         margin-top:2em;">

          <table align="right" cellpadding="10" cellspacing="10" width="80%" class="mod-form" style="margin: 10px 0; border: 5;">
    <tr>
        <td>
        <hr><h3>Priére de compléter les information ci-dessous</h3><hr>
        </td> 
        <td></td>
    </tr>
  </table>
            
    
  <main>
    <div class="card" style="
        background: white;
        padding: 1em;
        border-radius: .4em;
        box-shadow:
        0 20px 30px 0 rgba(0,0,0,.1),
        0 4px  4px 0 rgba(0,0,0,.15)">
     
      <strong>Photo de profil:</strong>
      <input type="file" name="file1">
      <strong>Exemple</strong>
      <img src="style/img/profil.jpg" width="250px" height="100px">
      <br>
  

      <strong>Carte d'identité en format PDF:</strong>
      <input type="file" name="file2">
      <strong>Exemple</strong>
      <img src="style/img/carte.jpg"width="250px" height="350px">
      <br><br>

      
      <strong>Votre Bac au format PDF:</strong> 
      <input type="file" name="file3"></td>
      <strong>Exemple</strong>
      <img src="style/img/BACfile.jpg" width="300px" height="200px">
      <br><br>
     

      <input class="btn btn-info" type="submit" value="Confirmer" style="margin-left: 35%;width: 15%" >
    </div>
  </main>
</div>
</form>
</body>
</html>
