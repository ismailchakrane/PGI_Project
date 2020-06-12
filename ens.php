<?php 
session_start();
require_once 'traitement_PHP/photo_et_nom_users.php';


if (empty($_SESSION['id'])) {
  
  $_SESSION['flash']['danger'] = 'Vous  devez être connecté';

  header("Location: login.php");    
  
} 

if (!empty($_POST)) {
 if (!empty($_POST['SpécialitéBAC']) && $_POST['SpécialitéBAC'] != 'Filière' && !empty($_POST['ProvinceBAC']) && $_POST['ProvinceBAC'] != 'Province de votre Baccalauréat' && !empty($_POST['AcademyBAC']) && $_POST['AcademyBAC'] != 'Academy de votre Baccalauréat'  && !empty($_POST['AnnéeBAC']) && $_POST['AnnéeBAC'] != 'Année' && !empty($_POST['NoteRégional']) && !empty($_POST['NoteNational'])){

   
  


  $SpécialitéBAC = $_POST['SpécialitéBAC'];
  $ProvinceBAC = $_POST['ProvinceBAC'];
  $AcademyBAC = $_POST['AcademyBAC'];
  $AnnéeBAC = $_POST['AnnéeBAC'];
  $NoteRégional = $_POST['NoteRégional'];
  $NoteNational = $_POST['NoteNational'];


  $insertion = $pdo->prepare("UPDATE users SET SpécialitéBAC = ?, ProvinceBAC = ?, AcademyBAC = ?, AnnéeBAC = ?,NoteRégional = ?,NoteNational = ? WHERE  id = ? ");
  $insertion->bindValue(1, $SpécialitéBAC);
  $insertion->bindValue(2, $ProvinceBAC);
  $insertion->bindValue(3, $AcademyBAC);
  $insertion->bindValue(4, $AnnéeBAC);
  $insertion->bindValue(5, $NoteRégional);
  $insertion->bindValue(6, $NoteNational);
  $insertion->bindValue(7, $_SESSION['id']);
  $insertion->execute();
  

  $_SESSION['flash']['success'] = 'Choisissez la filiére préféré';
  header('location: filiére.php');
  exit();
  
}

else{

  $errors[]="tous les champs doivent être remplis"; 
  
}
}



?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Page de profil</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style/css_style/styleprofil.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <title>Inscription a l'ENS Marrakech</title>
  <link rel="shortcut icon" href="style/Icon/pgicon.ico">
  <style>
   td{width:50%;}
   hr{border: 3px solid rgb(113, 197, 223);
    border-radius: 10px;}}
    
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
      <li><img src="<?php echo $PHOTO->file_url1; ?>" style="
      width: 40px;
      height: 40px;
      border-radius: 50% ;"></li>
      <li style="color: white;"><?php echo $NOM->nom_fr.' '.$NOM->prénom_fr;   ?></li>
      <li><a href="profil.php">Principale</a></li>
      <li><a href="candidature.php">Mes candidatures</a></li>
      <li><a href="traitement_PHP/logout.php">Quitter</a></li>
    </ul>
  </nav>





  <?php  if (!empty($errors)):?>

    <div class="alert alert-danger">
      <p>vous n'avez pas rempli le formulaire correctement</p>
      
      <?php foreach ($errors as $error): ?>
        <ul>

          <li><?= $error; ?></li>
          
        <?php endforeach; ?> 

      </ul>

    <?php endif; ?>



    <?php if (!empty($_SESSION['flash'])): ?>
     
     
     <div class="alert alert-success"><li>Pour être inscrit à L'ENS MARRAKECH veuillez remplire le formulaire suivant</li></div>

     <?php unset($_SESSION['flash']); ?>
   <?php endif;?>

   <form action="" method="POST">
     <table align="center" cellpadding="10" cellspacing="10" width="80%" class="mod-form" style="margin:auto; border: 5;">
      <tr >
        <td>
          <hr><h3 >Informations concernant votre Baccalauréat</h3><hr>
        </td>          
        
      </tr>
      
      <tr>
       <td>
        <br><br>
        <label><b>Spécialité de votre Baccalauréat</label>
         <select class="browser-default custom-select" style="width:80%;" name="SpécialitéBAC">
           <option selected>Filière</option>
           <option value="SVT">Sciences de la Vie et de la Terre</option>
           <option value="PC">Sciences Physiques et Chimiques</option>
           <option value="SMA">Sciences Maths A</option>
           <option value="SMB">Sciences Maths B</option>
           <option value="SE">Sciences Economiques</option>
           <option value="STGC">Sciences et Techniques de Gestion et de Comptabilité</option>
           <option value="STE">Sciences et Technologies Electriques</option>
           <option value="STM">Sciences et Technologies Mécaniques</option>
         </select>  
       </td>
       <td>
        <br><br>
        <label><b>Province de votre Baccalauréat</label>
         <select class="browser-default custom-select" style="width:80%;" name="ProvinceBAC">
           <option selected>Province de votre Baccalauréat</option>
           <option value="Rabat">Rabat</option>
           <option value="Salé">Salé</option>
           <option value="Skhirate Témara">Skhirate,Témara</option>
           <option value="Kénitra">Kénitra</option>
           <option value="Khémisset">Khémisset</option>
           <option value="Sidi Kacem">Sidi Kacem</option>
           <option value="Sidi Slimane">Sidi Slimane</option>
           <option value="Casablanca">Casablanca</option>
           <option value="Mohammédia">Mohammédia</option>
           <option value="El Jadida">El Jadida</option>
           <option value="Nouaceur">Nouaceur</option>
           <option value="Médiouna">Médiouna</option>
           <option value="Benslimane">Benslimane</option>
           <option value="Berrechid">Berrechid</option>
           <option value="Settat">Settat</option>
           <option value="Sidi Bennour">Sidi Bennour</option>
           <option value="Fès">Fès</option>
           <option value="Meknès">Meknès</option>
           <option value="El Hajeb">El Hajeb</option>
           <option value="Ifrane">Ifrane</option>
           <option value="Moulay Yaâcoub">Moulay Yaâcoub</option>
           <option value="Séfrou">Séfrou</option>
           <option value="Boulemane">Boulemane</option>
           <option value="Taounate">Taounate</option>
           <option value="Taza">Taza</option>
           <option value="MARRAKECH">Marrakech</option>
           <option value="Chichaoua">Chichaoua</option>
           <option value="Al Haouz">Al Haouz</option>
           <option value="EL Kelaâ">El Kelaâ des Sraghna</option>
           <option value="Essaouira">Essaouira</option>
           <option value="Rehamna">Rehamna</option>
           <option value="Safi">Safi</option>
           <option value="Youssoufia">Youssoufia</option>
           <option value="Tanger Assilah">Tanger, Assilah</option>
           <option value="M'diq Fnideq">M’diq, Fnideq</option>
           <option value="Tetouan">Tétouan</option>
           <option value="Fahs Anjra">Fahs, Anjra</option>
           <option value="Larache">Larache</option>
           <option value="Hoceïma">Al Hoceïma</option>
           <option value="Chefchaouen">Chefchaouen</option>
           <option value="Ouezzane">Ouezzane</option>
           <option value="Oujda Angad">Oujda, Angad</option>
           <option value="Nador">Nador</option>
           <option value="Driouch">Driouch</option>
           <option value="Jerada">Jerada</option>
           <option value="Berkane">Berkane</option>
           <option value="Taourirt">Taourirt</option>
           <option value="Guercif">Guercif</option>
           <option value="Figuig">Figuig</option>
           <option value="Béni Mellal">Béni Mellal</option>
           <option value="Azilal">Azilal</option>
           <option value="Fquih Ben Salah">Fquih Ben Salah</option>
           <option value="Khénifra">Khénifra</option>
           <option value="Khouribga">Khouribga</option>
           <option value="Errachidia">Errachidia</option>
           <option value="Ouarzazate">Ouarzazate</option>
           <option value="Midelt">Midelt</option>
           <option value="Tinghir">Tinghir</option>
           <option value="Zagora">Zagora</option>
           <option value="Agadir">Agadir Ida, Outanane</option>
           <option value="Inezgane Aït Melloul">Inezgane, Aït Melloul</option>
           <option value="Chtouka Aït Baha">Chtouka, Aït Baha</option>
           <option value="Taroudant">Taroudant</option>
           <option value="Tiznit">Tiznit</option>
           <option value="Tata">Tata</option>
           <option value="Guelmim">Guelmim</option>
           <option value="Assa-Zag">Assa-Zag</option>
           <option value="Tan Tan">Tan Tan</option>
           <option value="Sidi Ifni">Sidi Ifni</option>
           <option value="Laâyoune">Laâyoune</option>
           <option value="Boujdour">Boujdour</option>
           <option value="Tarfaya">Tarfaya</option>
           <option value="Es-Semara">Es-Semara</option>
           <option value="Oued Ed Dahab">Oued Ed Dahab</option>
           <option value="Aousserd">Aousserd</option>
         </select> 
       </td>
     </tr>
     <tr>
      <td>
        <label><b>Academy de votre Baccalauréat</label>
         <select class="browser-default custom-select" style="width:80%;" name="AcademyBAC">
           <option selected>Academy de votre Baccalauréat</option>
           <option value="Tanger_Tetouan">Tanger - Tetouan - Alhouceima</option>
           <option value="draa_tafilalt">Drâa Tafilalt</option>
           <option value="Rabat_Salé">Rabat-Salé-Kénitra</option>
           <option value="Meknes_fes">Fès-Meknès</option>
           <option value="Orientale">Orientale</option>
           <option value="Casablanca_settat">Casablanca-Settat</option>
           <option value="Marrakech_safi">Marrakech-Safi</option>
           <option value="bnimellal_khnefra">Béni Mellal-Khénifra</option>
           <option value="Sous_Massa">Souss-Massa</option>
           <option value="laayoun_sakia">Laâyoune-Sakia El Hamra</option>
           <option value="dakhla_dahb">Dakhla-Oued Ed-Dahab</option>
           <option value="guelmim_oued">Guelmim-Oued Noun</option>

         </select>
       </td>
       <td>
        <label><b>Année d'obtention du bac</label>
         <select class="browser-default custom-select" style="width:80%;" name="AnnéeBAC">
           <option selected>Année</option>
           <option value="2019">2019</option>
           <option value="2020">2020</option>
         </select>
       </td>
     </tr>
     
     <tr>
       <tr>
         <td>
           <label><b>Note d'examen Régional:</label>
             <input type="text" class="form-control"  placeholder=" votre note d'examen Régional " style="width:80%;" maxlength="255"  name="NoteRégional" id= "NoteRégional">
             <span id="missNoteRégional"></span>
           </td>
           <td>
            <label><b>Note d'examen National:</label> 
              <input type="text" class="form-control"  placeholder=" votre note d'examen National" style="width:80%;" maxlength="255"  name="NoteNational" id="NoteNational" >
              <span id="missNoteNational"></span>
            </td>
          </tr>

          
          <td>
            <br><br>
            <input class="btn btn-info" type="submit" value="Confirmer" id="submit">
            <input class="btn btn-warning" type="reset" value="Annuler" >
          </td>
          
        </tr>

        
      </table>
    </form>

    <!--controle des  shamps avec le javascript-->
    <script type="text/javascript">
      var formValid = document.getElementById('submit');
      var NoteNational = document.getElementById('NoteNational');
      var NoteRégional = document.getElementById('NoteRégional');
      var missNoteNational = document.getElementById('missNoteNational');
      var missNoteRégional = document.getElementById('missNoteRégional');
      var NoteValid = /^[012][0-9]([.][0-9][0-9])?$/;
      


      formValid.addEventListener('click', validation);

      function validation(event){

        if(NoteNational.value < 10 ){
          event.preventDefault();
          missNoteNational.textContent = 'impossible d\'etre inscrit avec cette note';
          missNoteNational.style.color = 'Red';
        }
        if(NoteRégional.value < 10 ){
          event.preventDefault();
          missNoteRégional.textContent = 'impossible d\'etre inscrit avec cette note';
          missNoteRégional.style.color = 'Red';
        }

        if(NoteNational.value > 20 ){
          event.preventDefault();
          missNoteNational.textContent = 'impossible d\'etre inscrit avec cette note';
          missNoteNational.style.color = 'Red';
        }
        if(NoteRégional.value > 20 ){
          event.preventDefault();
          missNoteRégional.textContent = 'impossible d\'etre inscrit avec cette note';
          missNoteRégional.style.color = 'Red';
        }

        if(NoteValid.test(NoteNational.value) == false ){
          event.preventDefault();
          missNoteNational.textContent = 'Format incorrect, la forme compatible est XX.XX';
          missNoteNational.style.color = 'Red';
        }
        if(NoteValid.test(NoteRégional.value) == false ){
          event.preventDefault();
          missNoteRégional.textContent = 'Format incorrect, la forme compatible est XX.XX';
          missNoteRégional.style.color = 'Red';
        }

        

        
        
      }

    </script>   
  </body>
  </html>
