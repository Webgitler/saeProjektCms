<?php
require_once __DIR__ . '/lib/bootstrap.php';
assertLoggedinUser();
$connector = newConnector();


if($_GET['mode'] == 'delete'){
  if($connector->deleteCharacter($_GET['id'])){
    echo 'is wech';
  }else {
    echo 'oops';
  }
}


$characters = $connector->getCharactersByUser($_SESSION['user']);

?>
<h2>Character</h2>
<table border=1>
<?php foreach ($characters as $character) { ?>
<tr>
<td><?php echo $character['id']; ?></td>
<td><?php echo $character['user_id']; ?></td>
<td><?php echo $character['name']; ?></td>
<td><?php echo $character['religion']; ?></td>
<td><?php echo $character['age']; ?></td>
<td><?php echo $character['gender']; ?></td>
<td><?php echo $character['profession']; ?></td>
<td><?php echo $character['figure']; ?></td>
<td><?php echo $character['max_load_kg']; ?></td>
<td><?php echo $character['money']; ?></td>
<td><?php echo $character['max_hitpoints']; ?></td>
<td><?php echo $character['hitpoints']; ?></td>
<td><?php echo $character['max_energy']; ?></td>
<td><?php echo $character['energy']; ?></td>
<td><?php echo $character['image_path']; ?></td>
<td><a href="/characterselection.php?mode=delete&id=<?php echo $character['id']; ?>">L&ouml;schen</a></td>
<td><a href="/updateCharacter.php?id=<?php echo $character['id']; ?>">Update</a></td>
</tr>
<?php } ?>
</table>
