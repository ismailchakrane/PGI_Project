<?php  

session_start();



if (!empty($_POST) && !empty($_POST['email']) && !empty($_POST['password'])) {

  //connection avec la base de données: 

  
  $pdo = new PDO('mysql:dbname=first_proj;host=localhost','root','');

  $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

  $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);

 //les conditions:
  $req = $pdo->prepare('SELECT * FROM users WHERE (email = :email) AND confirmed_at IS NOT NULL ' );
  $req->execute(['email' => $_POST['email']]);

  $user = $req->fetch();
  
  if( password_verify($_POST['password'], $user->password)){     

    
    session_start();

    
    $_SESSION['auth'] = $user;
    $_SESSION['id'] = $user->id;
    

    $_SESSION['flash']['success']= 'Bien connecté';
    header('location: profil.php');
    
    

  }else{
   
    $_SESSION['flash']['danger']= 'Email ou mot de passe incorrecte ';
    

  }
  
}

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" href="style/Icon/pgicon.ico">
	<meta charset="utf-8">
	<title>Se connecte - Plateform de Gestion d'inscription</title>
	

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
    <br>


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
     

     <div class="alt alt-<?=$type;?>"><li><?=$message;?></li></div>


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
     <img src="style/Icon/hide.png" width="4%" height="4%" id="view" onclick="show_hide_pwd()">

   </div>
   
   
   <input type="submit" name="ok" value="se connecter">
   
   
   <br><br>
   
   <h6><a href="register.php">Créer un compte</a></h6>     
   
   
 </form>


 <br><br>

 <!--controle des  shamps avec le javascript-->

 <script type="text/javascript">

   /*Script pour regarde le pwd  */

   function show_hide_pwd() {
    var pwd = document.getElementById("password");
    var img = document.getElementById("view");
    if (pwd.type == "password") {
      pwd.type = "text";
      img.src = "style/Icon/show.png";
    } else {
      pwd.type = "password";
      img.src = "style/Icon/hide.png";
    }
  }
</script>



</div>
</body>
<style type="text/css">
  /*select univer aaucun controle*/
  *
  {
    margin: auto;
    padding: auto;
  }

  /*body */

  body
  {
    background:url(style/Img/bg5.jpg);  
    background-size: cover;
    font-family: sans-serif;
    background-repeat: no-repeat;
    
  }


  /*style of header*/



  header 
  {
    background: #44a7e9;
    height: 20px;
    width: 70%;
    margin-left: 14%;
    margin-top: 0.7%;
    letter-spacing: 1px;
    padding: 3.5%;
    padding-left: 2%;
    padding-top: 0.5%;
    padding-bottom: 4%;
    border-radius: 52px;
    cursor: pointer;
    
  } 


  header a
  {
    text-decoration: none;
  }
  /*style of titre*/
  .titre1 
  {
    color: white;
    font-size: 25px;
    text-decoration: 0;
    padding-left: 24%;
    font-family: cursive;
  }


  /*login box*/

  .login
  {
    
    width: 35%;
    height: 72%;
    margin-top: 9%;
    margin-left: 18%;
    border: 1px solid hsla(0, 90%, 75%, 0.3) ;
    background: hsla(200, 50%, 80%, 0.4); 
    border-radius: 20px;
  }

  .login h2
  {
    text-align: center;
    color: black;
    padding: 0 0;
    margin: 0 0 30px;
    padding-top: 12px;

    
  }

  /*input style*/

  .login .inputlogin
  {
    position: relative;
    padding-right: all;
  }

  .login .inputlogin input
  {

    width: 70%;
    border: none;
    outline: none;
    background: transparent;
    top: 0;
    left: 0;
    margin-left: 12%;
    letter-spacing: 1px;
    margin-bottom: 35px;
    padding: 15px 0;
    font-size: 88%;
    font-family: sans-serif;
    color: black;
    border-bottom: 1px solid #0f7cc5 ;
    
  }
  .login .inputlogin label
  {
    position: absolute;
    top: 0;
    left: 0;
    color: black;
    padding: 10px 0 ;
    font-size: 15px;
    pointer-events: none;
    transition: .7s;
    padding-left: 12.5%;
  }
  /*pwd & email style*/

  .login .inputlogin input:focus ~ label,
  .login .inputlogin input:valid ~ label
  {
    top: -18px;
    left: 0;
    color: #008eed;
    font-size: 13px;
  }

  /*submit style*/

  .login  input[type="submit"]
  {
    border: none;
    font-size: 85%;
    margin-left: 12%;
    outline: none;
    color: black;
    background: #44a7e9;
    padding: 8px 17px ;
    cursor: pointer;
    border-radius: 42px;
    font-size: 15px;
    font-family: cursive;

  }
  .login  input[type="submit"]:hover
  {
    
    background: #178edd;
    
  }

  /*style of second titre*/
  .login a
  {
    text-decoration: 0;
    margin-left: 12%;
    color: black;
  }
  .login form h6 a
  {
    font-size: 11.1px;
    text-decoration: none;
    
  }
  .login h6 a:hover
  {
    text-decoration: underline;
    
  }
  /*message flash*/
  .alt
  {

    padding: 0.75rem 1.25rem;
    margin-bottom: 1rem;
    border: 1px solid black;
    border-radius: 20px;
    font-family: cursive;
    font-size: 14px;
    width: 75%;
    margin-left: 6%;

  }

  .alt-danger
  {
    background:  hsla(0, 90%, 75%, 0.2);
    

  }
  .alt-success
  {
    background:  hsla(150, 47%, 75%, 0.5);
    
  }
</style>
</html>
