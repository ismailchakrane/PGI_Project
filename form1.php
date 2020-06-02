<?php 


session_start();


if (empty($_SESSION['id'])) {

  $_SESSION['flash']['danger'] = 'Vous  devez être connecté';

  header("Location: login.php");    

} 



if (!empty($_POST)) {



 $options = array(
  PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
);

 $errors=array();

 $pdo = new PDO('mysql:dbname=first_proj;host=localhost','root','',$options);

 $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

 $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);







 if (!empty($_POST['nom_fr']) && !empty($_POST['nom_ar']) && !empty($_POST['prénom_fr']) && !empty($_POST['prénom_ar']) && !empty($_POST['adresse_fr']) && !empty($_POST['adresse_ar']) && !empty($_POST['CNE']) && !empty($_POST['CIN']) && !empty($_POST['num_télé']) && !empty($_POST['pays']) && $_POST['pays'] != 'Veuillez choisir votre pays' && !empty($_POST['ville']) && $_POST['ville'] != 'Veuillez choisir votre Ville' && !empty($_POST['date_de_naissance']) && !empty($_POST['sexe']) && $_POST['sexe'] != '--sexe--' && !empty($_POST['Code_postal'])&& !empty($_POST['nationalité'])&& !empty($_POST['prénom_pére'])&& !empty($_POST['Nom_pére'])&& !empty($_POST['CIN_pére'])&& !empty($_POST['date_naissance_pére'])&& !empty($_POST['prénom_mére'])&& !empty($_POST['Nom_mére'])&& !empty($_POST['CIN_mére'])&& !empty($_POST['date_naissance_mére'])&& !empty($_POST['Assurance']) && $_POST['Assurance'] != 'Avez-vous une Assurance Médicale?' ){


//les variables:

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









  $insertion = $pdo->prepare("UPDATE users SET nom_fr = ?,nom_ar = ?,prénom_fr = ?,prénom_ar = ?,adresse_fr = ?,adresse_ar = ?,CNE = ?,CIN = ? ,num_télé = ?,pays = ? ,ville = ? ,date_de_naissance = ? ,sexe = ? ,Code_postal = ?,nationalité = ?,prénom_pére =? ,Nom_pére = ? ,CIN_pére = ? ,date_naissance_pére = ?,pére_décédé = ?,prénom_mére = ?,Nom_mére = ?,CIN_mére = ?,date_naissance_mére =? ,mére_décédée =? ,Assurance = ?,compte_bancaire =? WHERE id = ?");
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
  $insertion->bindValue(28, $_SESSION['id']);

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
	<link rel="shortcut icon" href="style/Icon/pgicon.ico">
  <title>Formulaire d'inscription </title>

  <link rel="stylesheet" href="style\bootstrap\css\bootstrap.min.css">
  <script src="style\bootstrap\js\jquery.min.js"></script>
  <script src="style\bootstrap\js\bootstrap.min.js"></script>
  <script src="style/JS/form1_valid.js"></script>
  <style>
   td{width:50%;}
   hr{border: 3px solid rgb(113, 197, 223);border-radius: 10px;}
   .msg_error{ color: red; font-size: 14.4px;}
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


<form action="" method="POST" name="valid_form" onclick ="validation()">



  <!--Information personelle-->

  <table align="right" cellpadding="10" cellspacing="10" width="95%" class="mod-form" style="margin: 10px 0; border: 5;">
    <tr>
      <td>
        <hr><h3>Information Personelle</h3><hr>
      </td> 


    </tr>

    <tr>
     <td>
       <label><b>Nom :<br> <span class="msg_error" id="msg_nom_fr"></span></label>
        <input type="text" class="form-control"  placeholder="Enter votre nom" style="width:80%;" 
        minlength="2" maxlength="40" id="nom_fr" name="nom_fr" required>
      </td>
      <td>


        <label><b>Nom en Arabe :<br><span class="msg_error" id="msg_nom_ar"></span></label>
          <input type="text" class="form-control"  placeholder="Enter votre nom en Arabe " style="width:80%;" minlength="2" maxlength="40" id="nom_ar" name="nom_ar" required>
        </td>
      </tr>
      <tr>
       <td>
         <label><b>Prénom :<br><span class="msg_error" id="msg_prenom_fr"></span></label>
           <input type="text" class="form-control"  placeholder="Enter votre prénom" style="width:80%;" minlength="2" maxlength="40" id="prenom_fr" name="prénom_fr" required>
         </td>
         <td>
           <label><b>Prénom en Arabe :<br><span class="msg_error" id="msg_prenom_ar"></span></label> 
             <input type="text" class="form-control"  placeholder="Enter votre prénom en Arabe" style="width:80%;" minlength="2" maxlength="40" id="prenom_ar" name="prénom_ar" required>
           </td>
         </tr>
         <tr>
          <td>
            <label><b>Adresse :<br><span class="msg_error" id="msg_adresse_fr"></span></label>
              <input type="text" class="form-control"  placeholder="Enter votre adresse" style="width:80%;" minlength="10" maxlength="255" id="adress_fr" name="adresse_fr" required>
            </td>
            <td>
              <label><b> Adresse en Arabe :<br><span class="msg_error" id="msg_adresse_ar"></span></label> 
               <input type="text" class="form-control"  placeholder="Enter votre adresse en Arabe" style="width:80%;" minlength="10" maxlength="255" id="adress_ar" name="adresse_ar" required>
             </td>
           </tr>
           <tr>
             <td>
               <label><b><abbr title="CODE NATIONALE D'IDENTITE" style="text-decoration:none;">CNI:<br></abbr>
                <span class="msg_error" id="msg_cni"></span></label>
                <input type="text" class="form-control"  placeholder="Ex : EE 00000 ou E 000000" style="width:80%;"  id="CNI" name="CIN" required>
              </td>
              <td>
                <label><b><abbr title="CODE NATIONAL D'ETUDIENT" style="text-decoration:none;">CNE:<br></abbr>
                  <span class="msg_error" id="msg_cne"></span></label> 
                  <input type="text" class="form-control"  placeholder="Ex : G000000001" style="width:80%;" 
                  id="CNE" name="CNE" required>
                </td>
              </tr>
              <tr>
               <td>
                 <label><b>Pays de naissance :<br><span class="msg_error" id="msg_pays"></span></label>
                   <select class="browser-default custom-select" style="width:80%;" name="pays" required>
                     <option selected value="default">Veuillez choisir votre pays</option>
                     <option value="Maroc">Maroc</option>
                   </select>
                 </td>
                 <td>
                   <label><b>Ville de naissance :<br><span class="msg_error" id="msg_ville"></span></label>
                     <select class="browser-default custom-select" style="width:80%;" name="ville" id="ville" required>
                       <option selected value="default">Veuillez choisir votre Ville</option>
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
                <label><b>Date de naissance :<br><span class="msg_error" id="msg_birthday_eleve"></label>
                  <input type="text" placeholder="jj/mm/aaaa" class="form-control" style="width:80%;" 
                  id="date_naissance_eleve" name="date_de_naissance"  required>
                </td>
                <td>
                  <label><b>Sexe :<br><span class="msg_error" id="msg_sexe"></span></label><br>
                    <select class="browser-default custom-select" style="width:80%;"
                    name="sexe" required>
                    <option selected value="default">--sexe--</option>
                    <option value="M">Masculin</option>
                    <option value="F">Féminin</option>
                  </select>
                </td>
              </tr>
              <tr>
                <td>
                  <label><b>Code postal :<br><span class="msg_error" id="msg_cpostal"></span></label><br>
                    <input type="text" class="form-control"  placeholder="Ex: 10000" style="width:80%;"  id="code_postal" name="Code_postal" required>
                  </td>
                  <td>
                    <label><b>Nationalité :<br><span class="msg_error" id="msg_nationalite"></span></label><br>
                      <input type="text" class="form-control"  placeholder="Enter votre nationalité" style="width:80%;" minlength="2" maxlength="40" id="nationalite" name="nationalité" required>
                    </td>
                  </tr>
                  <tr>
                    <td>
                     <label><b>
                       Numéro de téléphone :<br><span class="msg_error" id="msg_tel"></span></label>
                       <input type="text" class="form-control"  placeholder="Ex : +212 0000 0001" style="width:80%;" id="num_tel" name="num_télé" required>
                     </td>
                   </tr>

                 </table>

                 <!--Information sur le père -->


                 <table align="right" cellpadding="10" cellspacing="10" width="95%" class="mod-form" style="margin: 10px 0; border: 5;">
                  <tr>
                    <td>
                      <hr><h3>Information sur le père</h3><hr>
                    </td>
                  </tr>

                  <tr>
                    <td>
                      <label><b>Prénom du père :<br><span class="msg_error" id="msg_prenom_pere"></span></label>
                        <input type="text" class="form-control"  placeholder="Enter le prénom de votre père" 
                        style="width:80%;" minlength="2" maxlength="40" id="prenom_pere" name="prénom_pére" required>
                      </td>
                      <td>
                        <label><b>Nom du père :<br><span class="msg_error" id="msg_nom_pere"></span></label>
                          <input type="text" class="form-control"  placeholder="Enter le prénom de votre père" 
                          style="width:80%;" minlength="2" maxlength="40" id="Nom_pere" name="Nom_pére" required>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <label><b>CNI du père :<br><span class="msg_error" id="msg_cni_pere"></span></label>
                            <input type="text" class="form-control"  placeholder="Ex : EE 00000 ou E 000000" style="width:80%;" id="CNI_pere" name="CIN_pére" required>
                          </td>
                          <td>
                            <label><b>Date de naissance du père :<br><span class="msg_error" id="msg_birthday_pere"></label>
                              <input type="text" placeholder="jj/mm/aaaa" class="form-control" style="width:80%;" 
                              id="date_naissance_pere" name="date_naissance_pére" required>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <label class="form-check-label"><b>votre père est t-il décédé ?</b></label>

                              OUI: 
                              <input  type="radio" value="OUI"name="pére_décédé" required> 
                              NON: 
                              <input  type="radio" value="NON"name="pére_décédé" required>

                            </td>
                          </tr>

                        </table>

                        <!--Information sur la mère -->

                        <table align="right" cellpadding="10" cellspacing="10" width="95%" class="mod-form" style="margin: 10px 0; border: 5;">
                          <tr>
                            <td>
                              <hr><h3>Information sur la mère</h3><hr>
                            </td>
                          </tr>

                          <tr>
                            <td>
                              <label><b>Prénom du mère :<br><span class="msg_error" id="msg_prenom_mere"></span></label>
                                <input type="text" class="form-control"  placeholder="Enter le prénom de votre mère" 
                                style="width:80%;" minlength="2" maxlength="40" id="prenom_mere" name="prénom_mére" required>
                              </td>
                              <td>
                                <label><b>Nom du mère :<br><span class="msg_error" id="msg_nom_mere"></span></label>
                                  <input type="text" class="form-control"  placeholder="Enter le prénom de votre mère" 
                                  style="width:80%;" minlength="2" maxlength="40" id="Nom_mere" name="Nom_mére" required>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label><b>CNI du mère :<br><span class="msg_error" id="msg_cni_mere"></span></label>
                                    <input type="text" class="form-control"  placeholder="Ex : EE 00000 ou E 000000" 
                                    style="width:80%;" id="CNI_mere" name="CIN_mére" required>
                                  </td>
                                  <td>
                                    <label><b>Date de naissance du mère :<br><span class="msg_error" id="msg_birthday_mere"></label>
                                      <input type="text" placeholder="jj/mm/aaaa" class="form-control" style="width:80%;" 
                                      id="date_naissance_mere" name="date_naissance_mére" required>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <label class="form-check-label"><b>votre mère est t-elle décédée ?</b></label>
                                      OUI: 
                                      <input  type="radio" value="OUI"name="mére_décédée" required> 
                                      NON: 
                                      <input  type="radio" value="NON"name="mére_décédée" required>

                                    </td>
                                  </tr>

                                </table>
                                <!--l'Assurance -->

                                <table align="right" cellpadding="10" cellspacing="10" width="95%" class="mod-form" style="margin: 10px 0; border: 5;">
                                  <tr>
                                    <td>
                                      <hr><h3>Information relatives à l'Assurance des Maladies Obligatoires </h3><hr>
                                    </td>
                                  </tr>

                                  <tr>
                                    <td>
                                      <label><b>Avez-vous une Assurance Médicale?<br>
                                        <span class="msg_error" id="msg_assurance"></span>
                                      </label>
                                      <select class="browser-default custom-select" style="width:80%;"
                                      name="Assurance" required>
                                      <option selected value="default">Avez-vous une Assurance Médicale?</option>
                                      <option value="CNOPS">CNOPS</option>
                                      <option value="SANAD">SANAD</option>
                                      <option value="Autres">Autres</option>
                                    </select>
                                  </td>
                                  <td>
                                    <label><b>Avez-vous un compte bancaire?<br></label>
                                      <input type="text" class="form-control"  placeholder="Entre le numéro de compte bancaire" style="width:80%;" pattern="^[0-9]{14}$"  title="Entre les 14 chiffre de numéro compte bancaire" name="compte_bancaire" >
                                    </td>
                                  </tr>


                                </table>


                                <table align="right" cellpadding="10" cellspacing="10" width="110%" class="mod-form" style="margin: 10px 0; border: 5;">
                                  <tr>
                                    <td align="center">
                                      <input class="btn btn-info" type="submit" value="Continuer">
                                      <input class="btn btn-warning" type="reset" value="Annuler" style="margin-left: 10px;">
                                    </td>

                                  </tr>
                                </table>
                              </body>
                            </head>
                            </html>
