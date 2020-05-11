<?php 

require_once 'function.php';

session_start();
		    




          

        
   if (!empty($_POST)) {



                       $options = array(
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            );

            $errors=array();
    
            $pdo = new PDO('mysql:dbname=first_proj;host=localhost','root','',$options);

            $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);

        

     
            
			    
    	
   if (!empty($_POST['nom_fr']) && !empty($_POST['nom_ar']) && !empty($_POST['prénom_fr']) && !empty($_POST['prénom_ar']) && !empty($_POST['adresse_fr']) && !empty($_POST['adresse_ar']) && !empty($_POST['CNE']) && !empty($_POST['CIN']) && !empty($_POST['num_télé']) && !empty($_POST['pays']) && !empty($_POST['ville']) && !empty($_POST['date_de_naissance']) && !empty($_POST['sexe']) && !empty($_POST['Code_postal'])&& !empty($_POST['nationalité'])&& !empty($_POST['prénom_pére'])&& !empty($_POST['Nom_pére'])&& !empty($_POST['CIN_pére'])&& !empty($_POST['date_naissance_pére'])&& !empty($_POST['prénom_mére'])&& !empty($_POST['Nom_mére'])&& !empty($_POST['CIN_mére'])&& !empty($_POST['date_naissance_mére'])&& !empty($_POST['Assurance'])){

              $nom_fr = $_POST['nom_fr'];
              $nom_ar = $_POST['nom_ar'];
              $prénom_fr = $_POST['prénom_fr'];
              $prénom_ar = $_POST['prénom_ar'];
              $adresse_fr = $_POST['adresse_fr'];
              $adresse_ar = $_POST['adresse_ar'];
              $CNE = $_POST['CNE'];
              $CIN = $_POST['CIN'];
              $num_télé = $_POST['num_télé'];
              $pays = $_POST['pays'];
              $ville = $_POST['ville'];
              $date_de_naissance = $_POST['date_de_naissance'];
              $sexe = $_POST['sexe'];
              $Code_postal = $_POST['Code_postal'];
              $nationalité = $_POST['nationalité'];
              $prénom_pére = $_POST['prénom_pére'];
              $Nom_pére = $_POST['Nom_pére'];
              $CIN_pére = $_POST['CIN_pére'];
              $date_naissance_pére = $_POST['date_naissance_pére'];
              $pére_décédé = $_POST['pére_décédé'];
              $prénom_mére = $_POST['prénom_mére'];
              $Nom_mére = $_POST['Nom_mére'];
              $CIN_mére = $_POST['CIN_mére'];
              $date_naissance_mére = $_POST['date_naissance_mére'];
              $mére_décédée = $_POST['mére_décédée'];
              $Assurance = $_POST['Assurance'];
              $compte_bancaire = $_POST['compte_bancaire'];
              
     
    
             
 




   $insertion = $pdo->prepare("UPDATE users SET nom_fr = ?,nom_ar = ?,prénom_fr = ?,prénom_ar = ?,adresse_fr = ?,adresse_ar = ?,CNE = ?,CIN = ? ,num_télé = ?,pays = ? ,ville = ? ,date_de_naissance = ? ,sexe = ? ,Code_postal = ?,nationalité = ?,prénom_pére =? ,Nom_pére = ? ,CIN_pére = ? ,date_naissance_pére = ?,pére_décédé = ?,prénom_mére = ?,Nom_mére = ?,CIN_mére = ?,date_naissance_mére =? ,mére_décédée =? ,Assurance = ?,compte_bancaire =? WHERE id =(SELECT MAX(id) FROM users)");
  $insertion->bindValue(1, $nom_fr);
  $insertion->bindValue(2, $nom_ar);
  $insertion->bindValue(3, $prénom_fr);
  $insertion->bindValue(4, $prénom_ar);
  $insertion->bindValue(5, $adresse_fr);
  $insertion->bindValue(6, $adresse_ar);
  $insertion->bindValue(7, $CNE);
  $insertion->bindValue(8, $CIN);
  $insertion->bindValue(9, $num_télé);
  $insertion->bindValue(10, $pays);
  $insertion->bindValue(11, $ville);
  $insertion->bindValue(12, $date_de_naissance);
  $insertion->bindValue(13, $sexe);
  $insertion->bindValue(14, $Code_postal);
  $insertion->bindValue(15, $nationalité);
  $insertion->bindValue(16, $prénom_pére);
  $insertion->bindValue(17, $Nom_pére);
  $insertion->bindValue(18, $CIN_pére);
  $insertion->bindValue(19, $date_naissance_pére);
  $insertion->bindValue(20, $pére_décédé);
  $insertion->bindValue(21, $prénom_mére);
  $insertion->bindValue(22, $Nom_mére);
  $insertion->bindValue(23, $CIN_mére);
  $insertion->bindValue(24, $date_naissance_mére);
  $insertion->bindValue(25, $mére_décédée);
  $insertion->bindValue(26, $Assurance);
  $insertion->bindValue(27, $compte_bancaire);

   $insertion->execute();



  



     

    $_SESSION['flash']['success'] = 'Veuillez continuer les étapes d\'inscription afin d\'uploader les informations demandées';
    header('location: form2.php');
    exit();
  
     
}   

    else{

   	$errors[]="tous les champs doivent être remplis"; 
    
 }
    
}
         
 

  
   
  
 ?>





<!DOCTYPE html>
<html>
<head>
<title>Formulaire d'inscription </title>

 <link rel="stylesheet" href="bootstrap\css\bootstrap.min.css">
 <script src="bootstrap\js\jquery.min.js"></script>
 <script src="bootstrap\js\bootstrap.min.js"></script>   
 <style>
     td{width:50%;}
     hr{border: 3px solid rgb(113, 197, 223);border-radius: 10px;}
 </style>
	 
</head>

<body>


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


<!--Information personelle-->

<table align="right" cellpadding="10" cellspacing="10" width="80%" class="mod-form" style="margin: 10px 0; border: 5;">
    <tr>
        <td>
        <hr><h3>Information Personelle</h3><hr>
        </td> 
  

    </tr>
   
     <tr>
         <td>
             <label><b>Nom :</label>
             <input type="text" class="form-control"  placeholder="Enter votre nom" style="width:80%;" maxlength="255" id="nom" name="nom_fr" >
         </td>
         <td>
            <label><b>Nom en Arabe :</label> 
            <input type="text" class="form-control"  placeholder="Enter votre nom en Arabe" style="width:80%;" maxlength="255" id="nom_ar" name="nom_ar" >
         </td>
     </tr>
     <tr>
         <td>
             <label><b>Prénom :</label>
             <input type="text" class="form-control"  placeholder="Enter votre prénom" style="width:80%;" maxlength="255" id="prénom" name="prénom_fr" >
         </td>
        <td>
             <label><b>Prénom en Arabe :</label> 
             <input type="text" class="form-control"  placeholder="Enter votre prénom en Arabe" style="width:80%;" maxlength="255" id="prénom_ar" name="prénom_ar" >
        </td>
    </tr>
    <tr>
        <td>
            <label><b>Adresse :</label>
            <input type="text" class="form-control"  placeholder="Enter votre adresse" style="width:80%;" maxlength="255" id="adresse" name="adresse_fr" >
        </td>
       <td>
            <label><b> Adresse en Arabe :</label> 
             <input type="text" class="form-control"  placeholder="Enter votre adresse en Arabe" style="width:80%;" maxlength="255" id="adresse_ar" name="adresse_ar" >
       </td>
   </tr>
    <tr>
         <td>
             <label><b>CIN:</label>
             <input type="text" class="form-control"  placeholder="Enter le numéro de votre CIN" style="width:80%;" maxlength="255" id="CIN" name="CIN" >
         </td>
        <td>
             <label><b>CNE:</label> 
             <input type="text" class="form-control"  placeholder="Enter le numéro de votre CNE" style="width:80%;" maxlength="255" id="num_télé" name="CNE" >
        </td>
    </tr>
    <tr>
         <td>
             <label><b>Pays de naissance :</label>
             <select class="browser-default custom-select" style="width:80%;"
             name="pays">
                     <option selected>Veuillez choisir votre pays</option>
                     <option value="Maroc">Maroc</option>
             </select>
         </td>
         <td>
             <label><b>Ville de naissance :</label>
             <select class="browser-default custom-select" style="width:80%;"
             name="ville">
                     <option selected>Veuillez choisir votre Ville</option>
                     <option value="casablanca">casablanca</option>
                     <option value="Fez">Fez</option>
                     <option value="Tangier">Tangier</option>
                     <option value="Marrakech">Marrakech</option>
                     <option value="Salé">Salé</option>
                     <option value="Meknes">Meknes</option>
                     <option value="Rabat">Rabat</option>
                     <option value="Oujda">Oujda</option>
                     <option value="Kenitra">Kenitra</option>
                     <option value="Agadir">Agadir</option>
                     <option value="Tetouan">Tetouan</option>
                     <option value="Temara">Temara</option>
                     <option value="Safi">Safi</option>
                     <option value="Mohammedia">Mohammedia</option>
                     <option value="Khouribga">Khouribga</option>
                     <option value="EL Jadida">El Jadida</option>
                     <option value="Beni Mellal">Beni Mellal</option>
                     <option value="Aït Melloul">Aït Melloul</option>
                     <option value="Nador">Nador</option>
                     <option value="Dar Bouazza">Dar Bouazza</option>
                     <option value="Taza">Taza</option>
                     <option value="Settat">Settat</option>
                     <option value="Berrechid">Berrechid</option>
                     <option value="Khemisset">Khemisset</option>
                     <option value="Inezgane">Inezgane</option>
                     <option value="Ksar El Kebir">Ksar El Kebir</option>
                     <option value="Larache">Larache</option>
                     <option value="Guelmim">Guelmim</option>
                     <option value="Khenifra">Khenifra</option>
                     <option value="Berkane">Berkane</option>
                     <option value="Taourirt">Taourirt</option>
                     <option value="Bouskoura">Bouskoura</option>
                     <option value="Fquih Ben Salah">Fquih Ben Salah</option>
                     <option value="Dcheira El Jihadia">Dcheira El Jihadia</option>
                     <option value="Oued Zem">Oued Zem</option>
                     <option value="El Kelaa">El Kelaa Des Sraghna</option>
                     <option value="Sidi Slimane">Sidi Slimane</option>
                     <option value="Errachidia">Errachidia</option>
                     <option value="Guercif">Guercif</option>
                     <option value="Oulad">Oulad Teima</option>
                     <option value="Ben Guerir">Ben Guerir</option>
                     <option value="Tifelt">Tifelt</option>
                     <option value="Lqliaa">Lqliaa</option>
                     <option value="Taroudant">Taroudant</option>
                     <option value="Sefrou">Sefrou</option>
                     <option value="Essaouira">Essaouira</option>
                     <option value="Fnideq">Fnideq</option>
                     <option value="Sidi Kacem">Sidi Kacem</option>
                     <option value="Tiznit">Tiznit</option>
                     <option value="Tan-Tan">Tan-Tan</option>
                     <option value="Ouarzazate">Ouarzazate</option>
                     <option value="Souk El Arbaa">Souk El Arbaa</option>
                     <option value="Youssoufia">Youssoufia</option>
                     <option value="Lahraouyine">Lahraouyine</option>
                     <option value="Martil">Martil</option>
                     <option value="Ain Harrouda">Ain Harrouda</option>
                     <option value="Suq as-Sabt Awlad an-Nama">Suq as-Sabt Awlad an-Nama</option>
                     <option value="Skhirat">Skhirat</option>
                     <option value="Ouazzane">Ouazzane</option>
                     <option value="Benslimane">Benslimane</option>
                     <option value="Al Hoceima">Al Hoceima</option>
                     <option value="Beni Ansar">Beni Ansar</option>
                     <option value="M'diq">M'diq</option>
                     <option value="Sidi Bennour">Sidi Bennour</option>
                     <option value="Midelt">Midelt</option>
                     <option value="Azrou">Azrou</option>
                     <option value="Drargua">Drargua</option>
             </select>
             </select>
             </select>
         </td>
    </tr>
    <tr>
        <td>
            <label><b>Date de naissance :</label>
                <input type="date" class="form-control"  placeholder="Enter votre date de naissance" style="width:80%;" maxlength="255" id="date_naissance" name="date_de_naissance" >
        </td>
        <td>
            <label><b>Sexe :</label><br>
            <select class="browser-default custom-select" style="width:80%;"
            name="sexe">
                     <option selected>--sexe--</option>
                     <option value="M">Masculin</option>
                     <option value="F">Féminin</option>
            </select>
        </td>
   </tr>
    <tr>
        <td>
            <label><b>Code postal :</label><br>
            <input type="text" class="form-control"  placeholder="Enter votre Code postal" style="width:80%;" maxlength="255" id="Code postal" name="Code_postal" >
        </td>
        <td>
            <label><b>Nationalité :</label><br>
            <input type="text" class="form-control"  placeholder="Enter votre nationalité" style="width:80%;" maxlength="255" id="nationalité" name="nationalité" >
        </td>
   </tr>
   <tr>
    <td>
       <label><b>Numéro de téléphone :</label> 
             <input type="tel" class="form-control"  placeholder="Enter votre numéro de téléphone" style="width:80%;" maxlength="255" id="num_télé" name="num_télé" >
    </td>
   </tr>

</table>

<!--Information sur le pére -->


<table align="right" cellpadding="10" cellspacing="10" width="80%" class="mod-form" style="margin: 10px 0; border: 5;">
    <tr>
        <td>
        <hr><h3>Information sur le pére</h3><hr>
        </td>
    </tr>
    
   <tr>
        <td>
            <label><b>Prénom du pére :</label>
            <input type="text" class="form-control"  placeholder="Enter le prénom de votre pére" style="width:80%;" maxlength="255" id="prénom_mére" name="prénom_pére" >
        </td>
        <td>
            <label><b>Nom du pére :</label>
            <input type="text" class="form-control"  placeholder="Enter le prénom de votre pére" style="width:80%;" maxlength="255" id="Nom_pére" name="Nom_pére" >
        </td>
    </tr>
    <tr>
        <td>
            <label><b>CIN du pére :</label>
            <input type="text" class="form-control"  placeholder="Enter le CIN de votre pére" style="width:80%;" maxlength="255" id="CIN_pére" name="CIN_pére" >
        </td>
        <td>
            <label><b>Date de naissance du pére :</label>
            <input type="date" class="form-control"  placeholder="Enter la date de naissance de votre pére" style="width:80%;" maxlength="255" id="date_naissance_pére" name="date_naissance_pére" >
        </td>
    </tr>
    <tr>
        <td>
          <label class="form-check-label"><b>votre pére est t-il décédé ?</b></label>
          &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          	OUI: 
          	<input  type="radio" value="OUI"name="pére_décédé"> 
          	NON: 
          	<input  type="radio" value="NON"name="pére_décédé">
         
        </td>
    </tr>
       
</table>

<!--Information sur la mére -->

<table align="right" cellpadding="10" cellspacing="10" width="80%" class="mod-form" style="margin: 10px 0; border: 5;">
    <tr>
        <td>
            <hr><h3>Information sur la mére</h3><hr>
        </td>
    </tr>
    
   <tr>
        <td>
            <label><b>Prénom du mére :</label>
            <input type="text" class="form-control"  placeholder="Enter le prénom de votre mére" style="width:80%;" maxlength="255" id="prénom_mére" name="prénom_mére" >
        </td>
        <td>
            <label><b>Nom du mére :</label>
            <input type="text" class="form-control"  placeholder="Enter le prénom de votre mére" style="width:80%;" maxlength="255" id="Nom_mére" name="Nom_mére" >
        </td>
    </tr>
    <tr>
        <td>
            <label><b>CIN du mére :</label>
            <input type="text" class="form-control"  placeholder="Enter le CIN de votre mére" style="width:80%;" maxlength="255" id="CIN_mére" name="CIN_mére" >
        </td>
        <td>
            <label><b>Date de naissance du mére :</label>
            <input type="date" class="form-control"  placeholder="Enter la date de naissance de votre mére" style="width:80%;" maxlength="255" id="date_naissance_mére" name="date_naissance_mére" >
        </td>
    </tr>
    <tr>
        <td>
          <label class="form-check-label"><b>votre mére est t-elle décédée ?</b></label>
          &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            OUI: 
          	<input  type="radio" value="OUI"name="mére_décédée"> 
          	NON: 
          	<input  type="radio" value="NON"name="mére_décédée">
         
        </td>
    </tr>
       
</table>
<!--l'Assurance -->

<table align="right" cellpadding="10" cellspacing="10" width="80%" class="mod-form" style="margin: 10px 0; border: 5;">
    <tr>
        <td>
            <hr><h3>Information relatives à l'Assurance Maladie Obligatoire</h3><hr>
        </td>
    </tr>
    
   <tr>
        <td>
            <label><b>Avez-vous une Assurance Médicale?</label>
           <select class="browser-default custom-select" style="width:80%;"
           name="Assurance">
                     <option selected>Avez-vous une Assurance Médicale?</option>
                     <option value="CNOPS">CNOPS</option>
                     <option value="SANAD">SANAD</option>
                     <option value="Autres">Autres</option>
            </select>
        </td>
        <td>
            <label><b>Avez-vous un compte bancaire?</label>
            <input type="text" class="form-control"  placeholder="Si vous avez un numéro de compte(RIB) afin de l'utiliser pour l'Assurance" style="width:80%;" maxlength="255" name="compte_bancaire" >
        </td>
    </tr>
    
       
</table>


<table align="right" cellpadding="10" cellspacing="10" width="80%" class="mod-form" style="margin: 10px 0; border: 5;">
    <tr>
        <td align="center">
            <input class="btn btn-info" type="submit" value="Continuer"  >
            <input class="btn btn-warning" type="reset" value="Annuler" >
        </td>
      
    </tr>
</table>



</form>
</body>
</html>