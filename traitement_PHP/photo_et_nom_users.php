<?php


if (empty($_SESSION['id'])) {
    
    $_SESSION['flash']['danger'] = 'Vous  devez être connecté';

    header("Location: ../login.php");    
    
}        
$errors=array();


$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
);

$pdo = new PDO('mysql:dbname=first_proj;host=localhost','root','',$options);

$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);





$requeteNom = $pdo->prepare("SELECT nom_fr,prénom_fr FROM users  WHERE id = ? ");
$requeteNom->bindValue(1, $_SESSION['id']);
$requeteNom->execute();

$NOM = $requeteNom->fetch();




$requetePHOTO = $pdo->prepare("SELECT file_url1 FROM users  WHERE id = ? ");
$requetePHOTO->bindValue(1, $_SESSION['id']);
$requetePHOTO->execute();

$PHOTO = $requetePHOTO->fetch();





?>