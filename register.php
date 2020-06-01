<?php require_once'traitement_PHP/function.php'; 

session_start();

if (!empty($_POST)) {
	
    $errors=array();

	$pdo = new PDO('mysql:dbname=first_proj;host=localhost','root','');

	$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

	$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);

    if (empty($_POST['email']) || !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
    	$errors['email']="Votre email n'est valide";
    } else{
      
      $req = $pdo->prepare('SELECT id FROM users WHERE email = ?');

      $req->execute([$_POST['email']]);

      $user = $req->fetch();
      
        if ($user){
        	$errors['email'] = 'Cet email est déja utilisé pour un autre compte';
        }
    }

    if (empty($_POST['password']) || $_POST['password'] != $_POST['password2']){
    	$errors['password']="Vous devez entrer un mot de passe valide ";
    }

    if (empty($errors)){
        
    $req = $pdo->prepare("INSERT INTO users SET email=?, password=?,confirmation_token=?");
    $password = password_hash($_POST['password'],PASSWORD_BCRYPT);
    $token = str_random(60); 

    $req->execute([$_POST['email'],$password,$token]);
    $user_id = $pdo->lastInsertId();
    
    $lien =  "http://localhost/Projet/traitement_PHP/confirm.php?id=$user_id&token=$token";
  	$header="MIME-Version: 1.0\r\n";
    $header.='Content-Type:text/html; charset="UTF-8"'."\n";
    $header.='Content-Transfer-Encoding: 8bit';
    $message='
    <html>
      <body>
        <div align="center" style="margin:0;padding:0;width:100%;background-color:#B2E0E6">

<div align="center" >
<br>
  <div border="0" style="margin:0;padding:0" >
      
    <table border="0" cellpadding="0" cellspacing="0" width="600" style="border:1px ;background-color:#ffffff;max-width:600px">
          <tr>
            <td style="margin:0;padding:10px 40px;background:#43AFBC;">
              <strong style="color:black;text-transform:uppercase; letter-spacing: 3px">
            PGI: plateforme de Gestion d’Inscriptions</strong>
            </td>
          </tr>
        </table>
          </div><br>


          <div style="background-color: white;width: 80.5%;">
    <table border="0" cellpadding="0" cellspacing="0" width="600" style="border:1px;background-color:#white;max-width:600px">
                  
<div style="color:#222222;font-family:Verdana,Geneva,sans-serif;font-size:100%;line-height:150%;text-align:left;word-wrap:break-word">
                            
<br>
<p style="margin-left: 15px; margin-top: 12px;">Bonjour<strong> Mr/Mme</strong>,</p>
<div>

  <br>
  <center>
   <a href="'.$lien.'" style="background-color:#81C0E4;border:1px;color:#ffffff;font-family:cursive;font-size:13px;font-weight:bold;line-height:50px;text-align:center;text-decoration:none;width:250px;
    padding: 17px 17px 17px 17px">
       Confirmez votre compte
     </a>
  </center>
   <br>
</div>
  
      <div style="margin-left: 40px; font-family: all">                  
  <span><b>
      <br><br>
  — Envoyé par PGI: Plateforme de Gestion d’Inscriptions</b><br><br>
      </span>
    </table><br></div></div>


      <br>
  </div>
      </body>
    </html>
    ';
    
    mail($_POST['email'],'Confirmation de votre compte',$message,$header);

    $_SESSION['flash']['success'] = 'Un email de confirmation vous a été envoyé pour valider votre compte';
    header('location: register.php');
    exit();
    
    }
    }

 ?>
 
<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" href="style/Icon/pgicon.ico">
	<meta charset="utf-8">
	<title>Créer un compte</title>
	
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

<!--target="_blank"--> 

<div class="login">
    <tt><h2>Nouveau Compte</h2></tt>

<!--controle des messages d'erreurs-->


<?php  if (!empty($errors)):?>
  <div class="alt alt-danger">
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
                 
                         <div class="alt alt-<?=$type; ?>"><li><?=$message; ?> </li></div>

                      <?php endforeach; ?>
                     <?php unset($_SESSION['flash']); ?>
                 <?php endif;?>




<form action="" method="POST">
              
    
	<div class="inputlogin">
          
    <input type="email" name="email" placeholder="Adressd e-mail" required="">

    <input type="password"  name="password" id="password" placeholder="Mot de passe" required="">
      <img src="style/Icon/hide.png" width="4%" height="4%" id="view_I" onclick="show_hide_pwd()">

    <input type="password" name="password2" id="confirm_pwd"  placeholder="Confirme Mot de passe" required=""  >
      <img src="style/Icon/hide.png" width="4%" height="4%" id="view_II" onclick="show_hide_confirm_pwd()">
                                
  </div>
    
    <input type="submit" id="submit" name="submit" value="S'inscrire" >
    <br><br><br>

	  
</form>

</div>

   <!--script js-->

<script type="text/javascript">

 /*Script pour regarde le pwd 1 */

function show_hide_pwd() {
  var pwd = document.getElementById("password");
  var img = document.getElementById("view_I");
  if (pwd.type == "password") {
    pwd.type = "text";
    img.src = "style/Icon/show.png";
  } else {
    pwd.type = "password";
    img.src = "style/Icon/hide.png";
  }
}
</script>

<script type="text/javascript">

 /*Script pour regarde le confirmed pwd  */

function show_hide_confirm_pwd() {
  var pwd = document.getElementById("confirm_pwd");
  var img = document.getElementById("view_II");
  if (pwd.type == "password") {
    pwd.type = "text";
    img.src = "style/Icon/show.png";
  } else {
    pwd.type = "password";
    img.src = "style/Icon/hide.png";
  }
}
</script>

<script type="text/javascript">

  /*Script pour valide est ce que le mot de passe est le meme dans la confirmation */
  var password = document.getElementById("password"), confirm_pwd = document.getElementById("confirm_pwd");

function validatePassword(){
  if(password.value != confirm_pwd.value) {
    confirm_pwd.setCustomValidity("Verfie Mot de pass");
  } else {
    confirm_pwd.setCustomValidity('');
  }
}
password.onchange = validatePassword;
confirm_pwd.onkeyup = validatePassword;
</script>

</body>
<style type="text/css">
  /*select univer aaucun controle*/
*
{
  margin: auto;
  padding: auto;
}

/*body style*/

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
  height: 15px;
  width: 70%;
  margin-left: 14%;
  margin-top: 0.7%;
  letter-spacing: 1px;
  padding: 0.8%;
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


/*login
   bo x*/

.login
{
  
  width: 35%;
  height: 72%;
  margin-top: 5.5%;
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


.login .inputlogin input
{
  width: 70%;
  border: none;
  background: transparent;
  margin-left: 12%;
  letter-spacing: 1px;
  margin-bottom: 35px;
  padding: 15px 0;
  font-size: 88%;
  font-family: sans-serif;
  color: black;
  border-bottom: 1px solid #44a7e9;
  
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
/*message flash*/
.alt
{

  padding: 0.75rem 1.25rem;
  margin-bottom: 1rem;
  border: 1px solid black;
  border-radius: 20px;
    font-family: cursive;
  font-size: 14px;

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
