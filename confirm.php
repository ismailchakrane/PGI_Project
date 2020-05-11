<?php


 $user_id = $_GET['id'];

 $token = $_GET['token'];

		    $pdo = new PDO('mysql:dbname=first_proj;host=localhost','root','');

			$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

			$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);

  $req = $pdo->prepare('SELECT * FROM users WHERE id = ? ');
  $req->execute([$user_id]);

  $user = $req->fetch();


  	session_start();
  

   
  if ($user && $user->confirmation_token == $token) {

     $pdo->prepare('UPDATE users SET confirmation_token = NULL, confirmed_at = NOW() WHERE id = ?')->execute([$user_id]);
     $_SESSION['auth'] = $user;
      header('location: form1.php');
     $_SESSION['flash']['success'] = "votre compte a bien été validé";

    
  
  }else{

    $_SESSION['flash']['danger'] = "Ce token n'est pas valide";
    header('location: login.php');
  }


  



  ?> 
  	

    
   
