<?php
require 'bootstrap.php';

$session_id = Session::getInstance()->read('id');
if (empty($session_id))
{
  Session::getInstance()->setFlash('danger','Vous devez etre connecté');
  App::redirect('login.php');
}
$errors = array();
$db = App::getDatabase();
$NOM = $db->query('SELECT nom_fr,prénom_fr FROM users  WHERE id = ?',[$_SESSION['id']])->fetch();
$PHOTO = $db->query('SELECT file_url1 FROM users  WHERE id = ?',[$_SESSION['id']])->fetch();
?>
