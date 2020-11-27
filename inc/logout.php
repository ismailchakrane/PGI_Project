<?php
require 'bootstrap.php';

Session::getInstance()->delete('id');
Session::getInstance()->delete('auth');
Session::getInstance()->setFlash('success',"vous êtes maintenant déconnecté");
App::redirect('../login.php');
