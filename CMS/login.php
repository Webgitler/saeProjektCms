<?php
require_once __DIR__ . '/lib/bootstrap.php';
$connector = newConnector();
$user = $connector->checkpassword($_POST['username'],$_POST['password']);

if($user === null){
  ?>
  <p>Login failed!</p>
  <a href="/index.php">Zur&uuml;rck</a>
  <?php
  exit;
}else{
  $_SESSION['user'] = $user['id'];
  echo 'eingeloggt'; ?>
    <a href="/modeselection.php">Weiter</a>
    <?php
}
?>
