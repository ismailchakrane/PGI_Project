<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Page de profil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/styleprofil.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Inscription a l'ENS Marrakech</title>

 <link rel="stylesheet" href="bootstrap\css\bootstrap.min.css">
 <script src="bootstrap\js\jquery.min.js"></script>
 <script src="bootstrap\js\bootstrap.min.js"></script>   
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
        <li><a href="#">Principale</a></li>
        <li><a href="#">Mes candidatures</a></li>
        <!--<li><a href="#">Modifier mes information</a></li>-->
        <li><a href="logout.php">Quitter</a></li>
      </ul>
    </nav>
 
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
             <select class="browser-default custom-select" style="width:80%;">
                     <option selected>Filière</option>
                     <option value="1">Sciences de la Vie et de la Terre</option>
                     <option value="2">Sciences Physiques et Chimiques</option>
                     <option value="3">Sciences Maths A</option>
                     <option value="4">Sciences Maths B</option>
                     <option value="5">Sciences Economiques</option>
                     <option value="6">Techniques de Gestion et de Comptabilité</option>
                     <option value="7">Sciences agronomiques</option>
                     <option value="8">Sciences et Technologies Electriques</option>
                     <option value="9">Sciences et Technologies Mécaniques</option>
             </select>  
         </td>
         <td>
          <br><br>
           <label><b>Province de votre Baccalauréat</label>
             <select class="browser-default custom-select" style="width:80%;">
                     <option selected>Province de votre Baccalauréat</option>
                     <option value="1">Rabat</option>
                     <option value="2">Salé</option>
                     <option value="3">Skhirate,Témara</option>
                     <option value="4">Kénitra</option>
                     <option value="5">Khémisset</option>
                     <option value="6">Sidi Kacem</option>
                     <option value="7">Sidi Slimane</option>
                     <option value="8">Casablanca</option>
                     <option value="9">Mohammédia</option>
                     <option value="10">El Jadida</option>
                     <option value="11">Nouaceur</option>
                     <option value="12">Médiouna</option>
                     <option value="13">Benslimane</option>
                     <option value="14">Berrechid</option>
                     <option value="15">Settat</option>
                     <option value="16">Sidi Bennour</option>
                     <option value="17">Fès</option>
                     <option value="18">Meknès</option>
                     <option value="19">El Hajeb</option>
                     <option value="20">Ifrane</option>
                     <option value="21">Moulay Yaâcoub</option>
                     <option value="22">Séfrou</option>
                     <option value="23">Boulemane</option>
                     <option value="24">Taounate</option>
                     <option value="25">Taza</option>
                     <option value="26">Marrakech</option>
                     <option value="27">Chichaoua</option>
                     <option value="28">Al Haouz</option>
                     <option value="29">El Kelaâ des Sraghna</option>
                     <option value="30">Essaouira</option>
                     <option value="31">Rehamna</option>
                     <option value="32">Safi</option>
                     <option value="33">Youssoufia</option>
                     <option value="34">Tanger, Assilah</option>
                     <option value="35">M’diq, Fnideq</option>
                     <option value="36">Tétouan</option>
                     <option value="37">Fahs, Anjra</option>
                     <option value="38">Larache</option>
                     <option value="39">Al Hoceïma</option>
                     <option value="40">Chefchaouen</option>
                     <option value="41">Ouezzane</option>
                     <option value="42">Oujda, Angad</option>
                     <option value="43">Nador</option>
                     <option value="44">Driouch</option>
                     <option value="45">Jerada</option>
                     <option value="46">Berkane</option>
                     <option value="47">Taourirt</option>
                     <option value="48">Guercif</option>
                     <option value="49">Figuig</option>
                     <option value="50">Béni, Mellal</option>
                     <option value="51">Azilal</option>
                     <option value="52">Fquih Ben Salah</option>
                     <option value="53">Khénifra</option>
                     <option value="54">Khouribga</option>
                     <option value="55">Errachidia</option>
                     <option value="56">Ouarzazate</option>
                     <option value="57">Midelt</option>
                     <option value="58">Tinghir</option>
                     <option value="59">Zagora</option>
                     <option value="60">Agadir Ida, Outanane</option>
                     <option value="61">Inezgane, Aït Melloul</option>
                     <option value="62">Chtouka, Aït Baha</option>
                     <option value="63">Taroudant</option>
                     <option value="64">Tiznit</option>
                     <option value="65">Tata</option>
                     <option value="66">Guelmim</option>
                     <option value="67">Assa-Zag</option>
                     <option value="68">Tan Tan</option>
                     <option value="69">Sidi Ifni</option>
                     <option value="70">Laâyoune</option>
                     <option value="71">Boujdour</option>
                     <option value="72">Tarfaya</option>
                     <option value="73">Es-Semara</option>
                     <option value="74">Oued Ed Dahab</option>
                     <option value="75">Aousserd</option>
               </select> 
         </td>
    </tr>
    <tr>
      <td>
        <label><b>Academy de votre Baccalauréat</label>
             <select class="browser-default custom-select" style="width:80%;">
                     <option selected>Academy de votre Baccalauréat</option>
                     <option value="1">Tanger Tetouan</option>
                     <option value="2">Taza Elhouceima Taounate</option>
                     <option value="3">Fes Boulmane</option>
                     <option value="4">Meknes Tafilalt</option>
                     <option value="5">Tadla Azilal</option>
                     <option value="6">Dakhla Abda</option>
                     <option value="7">Rabat Salé Zemour Zair</option>
                     <option value="8">Grand Casablanca</option>
                     <option value="9">Orientale</option>
                     <option value="10">Marrakech Tansift ElHaouz</option>
                     <option value="11">Chaouia Ouerdigha</option>
                     <option value="12">Ghab Chrarda Bni Hsin</option>
                     <option value="13">Sous Massa Daraa</option>
                     <option value="14">Guelmim Essmara</option>
                     <option value="15">Laayoune Boujdour</option>
                     <option value="16">Oued Eddahab Lagouira</option>
                    
              </select>
      </td>
       <td>
        <label><b>Année d'obtention du bac</label>
             <select class="browser-default custom-select" style="width:80%;">
                     <option selected>Année</option>
                     <option value="1">2019</option>
                     <option value="2">2020</option>
              </select>
      </td>
    </tr>
    
    <tr>
    	<tr>
         <td>
             <label><b>Note d'examen Régional:</label>
             <input type="text" class="form-control"  placeholder="Enter votre nom" style="width:80%;" maxlength="255" id="nom" name="nom" >
         </td>
         <td>
            <label><b>Note d'examen National:</label> 
            <input type="text" class="form-control"  placeholder="Enter votre nom en Arabe" style="width:80%;" maxlength="255" id="nom_ar" name="nom_ar" >
         </td>
     </tr>

     <tr>
     	<td><strong>Votre Bac (recto)</strong> <input type="file" name="dichier"></td>
     	<td> <strong>Votre Bax (verso)</strong><input type="file" name="dichier"></td>
     </tr>
        <td>
            <br><br>
            <input class="btn btn-info" type="submit" value="Confirmer" >
            <input class="btn btn-warning" type="reset" value="Annuler" >
        </td>
      
    </tr>

   
</table>
    
  
      
  </body>
</html>
