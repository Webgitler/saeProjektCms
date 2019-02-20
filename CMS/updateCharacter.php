<?php
require_once __DIR__ . '/lib/bootstrap.php';

assertLoggedinUser();

$connector = newConnector();

if(isset($_POST['id'])){
  $characterId = $_POST['id'];
}else{
  $characterId = $_GET['id'];
}

// ternary expression
//$characterId = isset($_POST['id']) ? $_POST['id'] : $_GET['id'];

// null coalesce operator ab php 7.0
//$characterId = $_POST['id'] ?? $_GET['id'];

if($_GET['mode'] == 'update'){
  if($connector->updateCharacter($_POST['id'], $_POST['name'], $_POST['age'])){
    echo 'okay';
  }else {
    echo 'oops';
  }
}

$character = $connector->getCharacterById($characterId);

?>
<form action="updateCharacter.php?mode=update" method="POST">
  <input type="text" name="name" value="<?php echo $character['name']; ?>">
  <input type="text" name="age" value="<?php echo $character['age']; ?>">
  <input type="hidden" name="id" value="<?php echo $character['id']; ?>">
  <input type="submit">
</form>

<a href='/characterselection.php'>Zur&uuml;rck</a>
