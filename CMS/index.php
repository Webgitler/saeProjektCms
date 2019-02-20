<?php
require_once __DIR__ . '/lib/bootstrap.php';
?>
<h2>Login</h2>
<form action="login.php" method="post">
  <input type="text" name="username" value="Username"><br>
  <input type="password" name="password" value=""><br>
  <input type="submit">
</form>

<h2>New User</h2>
<form action="newUser.php" method="post">
  <input type="text" name="username" value="Username"><br>
  <input type="password" name="password" value=""><br>
  <input type="text" name="firstname" value="firstname"><br>
  <input type="text" name="lastname" value="lastname"><br>
  <input type="date" name="birthdate"><br>
  <input type="submit">
</form>
