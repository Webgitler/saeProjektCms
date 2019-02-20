<?php

$mode = $_GET['mode'] ?? '';

// datenbank verbindung aufbauen
if($mode === 'delete'){
  $id = (int) $_GET['id'];
  echo "DELETE FROM table WHERE id = $id";

  // DELETE FROM table WHERE id = $id
}elseif($mode === 'add'){
  echo "add record name =" . $_POST['name'];
// INSERT INTO table () VALUES ()
}

// lade alle daten aus datenbank
$daten = [
  ['id' => 1, 'name' => 'A'],
  ['id' => 2, 'name' => 'B'],
  ['id' => 4, 'name' => 'C'],
  ['id' => 5, 'name' => 'D'],
    ['id' => 6, 'name' => 'E'],
      ['id' => 7, 'name' => 'F'],
            ['id' => 9, 'name' => 'G'],
              ['id' => 22, 'name' => 'H'],
            ];
?>
<html>
<body>
  <h1>TEST</h1>
  <?php foreach ($daten as $record) { ?>
    <div id="eintrag-<?php echo $record['id']; ?>">
      <span><?php echo $record['id']; ?></span>
      <span><?php echo $record['name']; ?></span>
      <span><a href="index.php?mode=delete&id=<?php echo $record['id'] ?>">Delete</a></span>
    </div>
  <?php } ?>

  <form action="index.php?mode=add" method="POST">
    <input name="name">
    <input type="submit">
  </form>
</body>
</html>
