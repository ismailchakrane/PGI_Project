<?php

class Auth
{

  public function register($db,$email,$password)
  {
    $password = password_hash($password,PASSWORD_BCRYPT);
    $token = Str::random(60);

    $db->query("INSERT INTO users SET email=?, password=?,confirmation_token=?",[$email,$password,$token]);
    $user_id = $db->lastInsertId();

    $lien =  "http://localhost/PGI_Project/confirm.php?id=$user_id&token=$token";
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

    <table width="600">
    <tr>
    <td style="margin:0;padding:10px 40px;background:#43AFBC;">
    <strong style="text-transform:uppercase; letter-spacing: 3px">
    PGI: plateforme de Gestion d’Inscriptions
    </strong>
    </td>
    </tr>
    </table>
    </div>
    <br>

    <div style="background-color: white;border:3px solid #43AFBC;width: 80.5%;">

    <div style="font-family:Verdana;font-size:100%;line-height:150%;text-align:left;">
    <br>
    <p style="margin-left: 15px; margin-top: 12px;">
    Bonjour
    <strong> Mr/Mme</strong>,
    </p>
    <br><br>

    <center>
    <a href="'.$lien.'" style="background-color:#81C0E4;color:#ffffff;font-family:cursive;
    font-size:13px;font-weight:bold;text-decoration:none;padding: 17px 17px 17px 17px">
    Confirmez votre compte
    </a>
    </center>
    <br><br><br>

    <div style="margin-left: 40px; font-family: all">
    <strong>— Envoyé par PGI: Plateforme de Gestion d’Inscriptions</strong>
    </div>
    <br><br>
    </div>
    </div>
    <br>
    </div>
    </body>
    </html>
    ';

    mail($email,'Confirmation de compte',$message,$header);

  }

  public function confirm($db,$user_id,$token,$session)
  {

    $user = $db->query('SELECT * FROM users WHERE id = ?',[$user_id])->fetch();
    if ($user && $user->confirmation_token == $token)
    {
       $db->query('UPDATE users SET confirmation_token = NULL, confirmed_at = NOW() WHERE id = ?',[$user_id]);
       $session->write('id',$user_id);
       $session->write('auth',$user);
       return true;
    }
    else
    {
      $db->query('UPDATE users SET confirmation_token = NULL, confirmed_at = NOW() WHERE id = ?',[$user_id]);
      $session->write('id',$user_id);
      $session->write('auth',$user);
      return false;
    }
  }
}
