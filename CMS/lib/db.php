<?php

class MysqlConnector {

  public $servername;
  public $username;
  public $password;
  public $connection;


  /* Konstruktor verbindet zur Datenbank */
  public function __construct($servername, $username, $password, $databasename){
      $this->servername = $servername;
      $this->username = $username;
      $this->password = $password;
      $this->connection = mysqli_connect($servername, $username, $password, $databasename);  // einzig wichtige Zeile in diesem Constructor
      //echo 'COnnect to <br>';

      //echo 'Servername : ' . $servername;
      //echo 'Username : ' .  $username .'<br>';
      //echo 'Databasename : ' . $databasename .'<br>';

      // Check connection
      if (!$this->connection) {
          die("Connection failed: " . mysqli_connect_error());
      }
          //echo "Connected successfully";
  }

  //Methode gibt boolean zurück, ob der Benutzer im System ist
  public function user_exists($email){
      $userexists = false;
      echo "Überprüfen ob Benutzer existiert : " . $email;

      // als allererstes checke ich, ob ich das richtige SQL dafür verstanden habe (PHPMyAdmin)
      //select * from user where email = 'ivan@ivan.de';
      $sqlquery = "Select * from user where email = '" . $email . "';";
      echo '<br> SQL : ' .  $sqlquery;


      $result = $this->connection->query($sqlquery); //suchen in der Datenbank
      echo var_dump($result);
      if ($result->num_rows > 0) { // überprüfen ob die Anzahl der Resultate > 0 sind, also die Zeilen in der Datenbank
        echo 'User gefunden';
        $userexists = true;
      }else {
        echo 'User nicht gefunden!';
      }
      return $userexists;
}


  public function checkpassword($email,$userpassword){
    $sql = "SELECT id FROM user WHERE email_address = '$email' AND password_hash = SHA('$userpassword');";
    $result = $this->connection->query($sql);
    return $result->num_rows > 0 ? $result->fetch_assoc() : null;
  }

  /* Schreiben der Daten in die Datenbank */
  public function insertUser($email, $password, $firstname, $lastname, $birthdate){
      //SQL sollte so aussehen INSERT INTO user ( email, password ) VALUES ('trap@sae.de', SHA('drogenverwalter'));
      //INSERT INTO user ( email, password ) VALUES ('niclas@sae.de', SHA('traprockt'));

      $sqlinsert = "INSERT INTO user ( email_address, password_hash, first_name, last_name, birth_date) " // bauen das SQL, das wir nutzen, um den
      . " VALUES ('".$email."', SHA('" .$password. "'), '$firstname', '$lastname', '$birthdate');";         //Benutzer in die Datenbank zu schreiben als String

      if ($this->connection->query($sqlinsert) === TRUE) { //query führt das SQL auf der Datenbank aus
          echo "New record created successfully";
          return true;
      } else {
          echo "Error: " . $sqlinsert . "<br>" . $this->connection->error;
          return false;
      }
  }

  /* Alle Character holen, goibt uns einen Liste mit Objekten von Charactern */
  public function get_characters(){
      //SQL sollte so aussehen INSERT INTO user ( email, password ) VALUES ('janos@sae.de', SHA('drogenverwalter'));
      //INSERT INTO user ( email, password ) VALUES ('niclas@sae.de', SHA('janosstinkt'));
      $characters = array();
      $sqlselect = "SELECT * FROM `character`;"; // bauen das SQL, das wir nutzen, um den
      $dbResult = $this->connection->query($sqlselect); //query führt das SQL auf der Datenbank aus
      if($dbResult === false){
        die('ERROR: ' . $this->connection->error);
      }

      while ($row = $dbResult->fetch_assoc()) {
        //$character = new Character($row['id'], $row['name'], $row['user_id']);
        //array_push($characters, $character);
        $characters[]=$row;
      }

      return $characters;
  }

  /* Alle Character holen, goibt uns einen Liste mit Objekten von Charactern */
  public function getCharactersByUser($userId){
      $characters = array();
      $sqlselect = "SELECT * FROM `character` WHERE user_id = $userId;"; // bauen das SQL, das wir nutzen, um den
      $dbResult = $this->connection->query($sqlselect); //query führt das SQL auf der Datenbank aus
      if($dbResult === false){
        die('ERROR: ' . $this->connection->error);
      }

      while ($row = $dbResult->fetch_assoc()) {
        $characters[]=$row;
      }

      return $characters;
  }

  /* Alle Character holen, goibt uns einen Liste mit Objekten von Charactern */
  public function deleteCharacter($characterId){
      $sql = "DELETE FROM `character` WHERE id = $characterId;"; // bauen das SQL, das wir nutzen, um den
      return $this->connection->query($sql) === TRUE;
  }

  /* Alle Character holen, goibt uns einen Liste mit Objekten von Charactern */
  public function getCharacterById($id){
      $characters = array();
      $sqlselect = "SELECT * FROM `character` WHERE id = $id;"; // bauen das SQL, das wir nutzen, um den
      $dbResult = $this->connection->query($sqlselect); //query führt das SQL auf der Datenbank aus
      if($dbResult === false){
        die('ERROR: ' . $this->connection->error);
      }
      return $dbResult->fetch_assoc();
  }

  /* Alle Character holen, goibt uns einen Liste mit Objekten von Charactern */
  public function updateCharacter($id, $name, $age){
      $characters = array();
      $sql = "UPDATE `character` SET name = '$name', age = '$age' WHERE id = $id;"; // bauen das SQL, das wir nutzen, um den
      return $this->connection->query($sql) === TRUE;
  }
}
