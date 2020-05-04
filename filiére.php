<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Page de profil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/styleprofil.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  </head>
  <body>
    <nav>
      <input type="checkbox" id="check">
      <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
      </label>
      <label class="logo">Espace etudiant</label>
      <ul>
        <li><a href="#">PRINCIPALE</a></li>
        <li><a href="#">Mes candidatures</a></li>
        <!--<li><a href="#">Modifier mes information</a></li>-->
        <li><a href="logout.php">Quitter</a></li>
      </ul>
    </nav>
  

 



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
                <select class="browser-default custom-select">
                               <option selected>Les filières</option>
                               <option value="1">CLE-ENSEIGNEMENT SECONDAIRE SCIENCES DE LA VIE ET DE LA TERRE</option>
                               <option value="2">CLE-ENSEIGNEMENT SECONDAIRE INFORMATIQUE</option>
                               <option value="3">CLE-ENSEIGNEMENT SECONDAIRE MATHS</option>
                               <option value="4">CLE-SECONDAIRE SCIENCES PHYSIQUES ET CHIMIQUES</option>
                               <option value="5">CLE-ENSEIGNEMENT PRIMAIRE</option>
                               <option value="6">DUT-INGÉNIERIE INFORMATIQUE</option>
                              
                         </select> 
                <input class="btn btn-info" type="submit" value="Confirmer" >
              </div>
            </main>
          </div>       
  </body>
</html>
