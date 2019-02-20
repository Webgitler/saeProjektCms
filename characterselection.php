<?php
require_once __DIR__ . '/lib/bootstrap.php';
//check Session
assertLoggedinUser();
var_dump($_SESSION);
$connector = newConnector();

if($_GET['mode'] == 'delete'){
  if($connector->deleteCharacter($_GET['id'])){
    echo 'is wech';
  }else {
    echo 'oops';
  }
}


$characters = $connector->getCharactersByUser($_SESSION['user']->id);

?>
<h2>Character</h2>
<table border=1>
<?php foreach ($characters as $character) { ?>
<tr>
<td><?php echo $character['id']; ?></td>
<td><?php echo $character['name']; ?></td>
<td><?php echo $character['religion']; ?></td>
<td><?php echo $character['gender']; ?></td>
<td><?php echo $character['age']; ?></td>
<td><a href="characterselection.php?mode=delete&id=<?php echo $character['id']; ?>">L&ouml;schen</a></td>
<td><a href="updateCharacter.php?id=<?php echo $character['id']; ?>">Update</a></td>
</tr>
<?php } ?>
</table>
