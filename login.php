<?php  

require_once 'function.php';
 session_start();

   if (!empty($_POST) && !empty($_POST['email']) && !empty($_POST['password'])) {
   	
  //connection avec la base de données: 
		  $pdo = new PDO('mysql:dbname=first_proj;host=localhost','root','');

			$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

			$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);

 //les conditions:
    $req = $pdo->prepare('SELECT * FROM users WHERE (email = :email) AND confirmed_at IS NOT NULL' );
    $req->execute(['email' => $_POST['email']]);

    $user = $req->fetch();
    
		    if( password_verify($_POST['password'], $user->password)){
          
             
                 $_SESSION['auth'] = $user;
              
                 $_SESSION['flash']['success']= 'Vous êtes maintenant connecté ';
                 header('location: profil.php');
                 
      

		    }else{
                   
                $_SESSION['flash']['danger']= 'Email ou mot de passe incorrecte ';
                

		    }


   


  
   }
   



  ?>







<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<title>Plateform de Gestion d'inscription</title>
	<link rel="stylesheet" href="style/stylelogreg.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>

<body>

<header>

<div>
            <a href="index.html">
         	      <h2>
         		         
         		         <span class="titre1">Plate-forme de Gestion d'inscription</span>
         		   </h2>      
            </a>
     	</div>





</header>



 <div class="login">

       <tt><h2>Identfiez-vous</h2></tt>

<!--controle des messages flash -->


 <?php 
                if (session_status() == PHP_SESSION_NONE ) {

                    session_start();
                }
                ?>
    <?php if (!empty($_SESSION['flash'])): ?>
                       <?php foreach ($_SESSION['flash'] as $type => $message): ?>
                 
                         <div class="alert alert-<?=$type; ?>"><li><?=$message; ?> </li></div>

                      <?php endforeach; ?>
                     <?php unset($_SESSION['flash']); ?>
                 <?php endif;?>



            <form action="" method="POST">
               
                               <div class="inputlogin">
                                                  
            	                        <input type="email" id="email" name="email" required="">
            	                        <label>Adress e-mail</label>

            	                 </div>

            	                 <div class="inputlogin">

            	                        <input type="password" id="password" name="password" required="" >
            	                        <label>Mot de Passe</label>
                                        <img src="style\Icon\View.png" width="4%" height="4%" onclick="Viewpwd()">

                              </div>
                                 
            	     
            	                        <input type="submit" name="ok" value="se connecter">
            	
            	
            	                                      <br><br>
            	
            	                        <h6><a href="register.php">Créer un compte</a></h6>     
            	
            	
             </form>



<!--controle des  shamps avec le javascript-->
 <script type="text/javascript">
function Viewpwd() {
  var VIEW = document.getElementById("password");
  if (VIEW.type === "password") {
    VIEW.type = "text";
  } else {
    VIEW.type = "password";
  }
}
 </script>

 </div>
</body>
</html>
