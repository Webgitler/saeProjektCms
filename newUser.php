<?php
require_once __DIR__ . '/lib/bootstrap.php';

$connector = newConnector();

if($connector->insertUser($_POST['username'], $_POST['password'], $_POST['firstname'], $_POST['lastname'], $_POST['birthdate']) === true){
  echo 'geilo!';
}else{
  echo 'oops';
}
?><br>
<a href="/index.php">Zur&uuml;rck</a>
