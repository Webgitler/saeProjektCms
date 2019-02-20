<?php
require_once __DIR__ . '/lib/bootstrap.php';
$connector = newConnector();
$ispasswordcorrect = $connector->checkpassword($_POST['username'],$_POST['password']);

if($ispasswordcorrect === false){
  ?>
  <p>Login failed! Passwort not correct</p>
  <a href="/index.php">Zur&uuml;rck</a>
  <?php
  exit;
}else{
  error_log("Writing User to Session");
  $user = $connector->getUserForEmail($_POST['username']);
  $_SESSION['user'] = $user;
  echo 'eingeloggt'; ?>
    <a href="/modeselection.php">Weiter</a>
    <?php
}
?>
