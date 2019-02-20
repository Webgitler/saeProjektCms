<?php
class MysqlConnector {

  public $servername;
  public $username;
  public $password;
  public $connection;


  /* Konstruktor verbindet zur Datenbank */
  public function __construct($servername, $username, $password){
      $this->servername = $servername;
      $this->username = $username;
      $this->password = $password;
      $databasename = 'sae_login_new';
      $this->connection = mysqli_connect($servername, $username, $password, $databasename);  // einzig wichtige Zeile in diesem Constructor
      echo 'COnnect to <br>';

      echo 'Servername : ' . $servername;
      echo 'Username : ' .  $username .'<br>';
      echo 'Databasename : ' . $databasename .'<br>';

      // Check connection
      if (!$this->connection) {
          die("Connection failed: " . mysqli_connect_error());
      }
          echo "Connected successfully";
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

    $ergebnis = false;
    // Select Statement bauen als String um die Daten aus der Datenbank zu der dazugehörigen
    // email zu finden
    $sqlselect = " SELECT email, password from user WHERE email = '" .$email . "'  Order by id";
    $result = $this->connection->query($sqlselect); //suchen in der Datenbank
    if ($result->num_rows > 0) { // überprüfen ob die Anzahl der Resultate > 0 sind
      echo 'User gefunden';
    }else {
      echo 'Zu dumm um Email einzugeben';
      return $ergebnis;
    }
    $zeileAusDatenbank = mysql_fetch_row($result);
    $cryptedpw = sha1($userpassword);  // verschlüsseln des Passworts, das eingeben wurde

    echo '<br> Crypt from Field  : ' .  $cryptedpw .'<br>';
    echo '<br> Crypt from DB  : ' .  $zeileAusDatenbank['password'] .'<br>';

    if($cryptedpw === $zeileAusDatenbank['password']){
          //user eingeloggt, somit starten session
          session_start();
          $_SESSION['email'] = $email;
          $email = $_SESSION['email'];
          echo 'eingeloggt';
          $ergebnis = true;
    }
    return $ergebnis;
  }

  /* Schreiben der Daten in die Datenbank */
  public function insert($email, $password){
      //SQL sollte so aussehen INSERT INTO user ( email, password ) VALUES ('trap@sae.de', SHA('drogenverwalter'));
      //INSERT INTO user ( email, password ) VALUES ('niclas@sae.de', SHA('traprockt'));

      $sqlinsert = "INSERT INTO user ( email, password ) " // bauen das SQL, das wir nutzen, um den
      . " VALUES ('".$email."',SHA('" .$password. "'));";         //Benutzer in die Datenbank zu schreiben als String

      if ($this->connection->query($sqlinsert) === TRUE) { //query führt das SQL auf der Datenbank aus
          echo "New record created successfully";
      } else {
          echo "Error: " . $sqlinsert . "<br>" . $this->connection->error;
      }
  }
}



<?php


    require('./mysqlconnector.php');

    $connector = new MysqlConnector('localhost','sae','drogenverwalter');
    //Lesen der variablen aus den Input Typ mit Namen email
    $email = $_POST["email"];
    //Lesen der variablen aus den Input Typ mit Namen passwort
    $password = $_POST["password"];
    $userexistier = $connector->user_exists($email);

    if($userexistier){
      echo 'User already registered!';
    }else{
      $connector->insert($email, $password);
    }



?>


<?php
    require('./mysqlconnector.php');
    $connector = new MysqlConnector('localhost','sae','drogenverwalter');
    //Lesen der variablen aus den Input Typ mit Namen email
    $email = $_POST["email"];
    //Lesen der variablen aus den Input Typ mit Namen passwort
    $password = $_POST["password"];
    //$password_correct = false;
    $userexistiert = $connector->user_exists($email);
    if($userexistiert){
      $passwordcorrect = $connector->checkpassword($email, $password);
      //passwort is korrekt
      if($passwordcorrect){
        header('Location: '.home.php);
      }else{ //passwort is nich korrekt
        echo "Passwort is quatsch!";
      }
    }
    else{ //User existiert nicht
        echo "Benutzer existiert nicht";
    }



?>
?>



<?php

class MysqlConnector {

  public $servername;
  public $username;
  public $password;
  public $connection;


  /* Konstruktor verbindet zur Datenbank */
  public function __construct($servername, $username, $password){
      $this->servername = $servername;
      $this->username = $username;
      $this->password = $password;
      $databasename = 'sae_login_new';
      $this->connection = mysqli_connect($servername, $username, $password, $databasename);  // einzig wichtige Zeile in diesem Constructor
      echo 'COnnect to <br>';

      echo 'Servername : ' . $servername;
      echo 'Username : ' .  $username .'<br>';
      echo 'Databasename : ' . $databasename .'<br>';

      // Check connection
      if (!$this->connection) {
          die("Connection failed: " . mysqli_connect_error());
      }
          echo "Connected successfully";
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

    $ergebnis = false;
    // Select Statement bauen als String um die Daten aus der Datenbank zu der dazugehörigen
    // email zu finden
    $sqlselect = " SELECT email, password from user WHERE email = '" .$email . "'  Order by id";
    $result = $this->connection->query($sqlselect); //suchen in der Datenbank
    if ($result->num_rows > 0) { // überprüfen ob die Anzahl der Resultate > 0 sind
      echo 'User gefunden';
    }else {
      echo 'Zu dumm um Email einzugeben';
      return $ergebnis;
    }
    $zeileAusDatenbank = mysql_fetch_row($result);
    $cryptedpw = sha1($userpassword);  // verschlüsseln des Passworts, das eingeben wurde

    echo '<br> Crypt from Field  : ' .  $cryptedpw .'<br>';
    echo '<br> Crypt from DB  : ' .  $zeileAusDatenbank['password'] .'<br>';

    if($cryptedpw === $zeileAusDatenbank['password']){
          //user eingeloggt, somit starten session
          session_start();
          $_SESSION['email'] = $email;
          $email = $_SESSION['email'];
          echo 'eingeloggt';
          $ergebnis = true;
    }
    return $ergebnis;
  }

  /* Schreiben der Daten in die Datenbank */
  public function insert($email, $password){
      //SQL sollte so aussehen INSERT INTO user ( email, password ) VALUES ('janos@sae.de', SHA('drogenverwalter'));
      //INSERT INTO user ( email, password ) VALUES ('niclas@sae.de', SHA('janosrockt'));

      $sqlinsert = "INSERT INTO user ( email, password ) " // bauen das SQL, das wir nutzen, um den
      . " VALUES ('".$email."',SHA('" .$password. "'));";         //Benutzer in die Datenbank zu schreiben als String

      if ($this->connection->query($sqlinsert) === TRUE) { //query führt das SQL auf der Datenbank aus$charactersfromdb
          echo "New record created successfully";
      } else {
          echo "Error: " . $sqlinsert . "<br>" . $this->connection->error;
      }
  }




  /* Alle Character holen, goibt uns einen Liste mit Objekten von Charactern */
  public function get_characters(){
      //SQL sollte so aussehen INSERT INTO user ( email, password ) VALUES ('janos@sae.de', SHA('drogenverwalter'));
      //INSERT INTO user ( email, password ) VALUES ('niclas@sae.de', SHA('janosstinkt'));
      $characters = array();
      $sqlselect = "SELECT * FROM character"; // bauen das SQL, das wir nutzen, um den

      $charactersfromdb = $this->connection->query($sqlselect) //query führt das SQL auf der Datenbank aus
      //TODO pro datansatz erzeuge ich ein Object von Typ character
      //iterate durch alle Sätze
      for(int i = 0; i < count($charactersfromdb); i++){
        //['name'],['id'], ['user_id']
        $character = new Character($charactersfromdb[i]['id'], $charactersfromdb[i]['name'], $charactersfromdb[i]['user_id']);
        array_push($characters, $character);
      }

      return $characters;

  }


  /* Holt alle Waffen die dem character zugeordnet sind */
  public function get_weapons_for_character($caracterid){

      $weapons = array();
      $sqlselectweapons = "SELECT * FROM weapons WHERE character_id = " .$caracterid; // bauen das SQL, das wir nutzen, um den

      $weaponsfromdb = $this->connection->query($sqlselectweapons); //query führt das SQL auf der Datenbank aus
      //TODO pro datansatz erzeuge ich ein Object von Typ character
      //iterate durch alle Sätze
      for(int i = 0; i < count($weaponsfromdb); i++){
        //['name'],['id'], ['user_id']
        //
        $waepon = new Weapon($weaponsfromdb[i]['id'], $weaponsfromdb[i]['name'], $weaponsfromdb[i]['damage'], $weaponsfromdb[i]['character_id'] );
        array_push($waepons, $weapon);
      }

      return $weapons;

  }



}
?>





  /* Alle Character holen, goibt uns einen Liste mit Objekten von Charactern */
  public function get_characters(){
      //SQL sollte so aussehen INSERT INTO user ( email, password ) VALUES ('janos@sae.de', SHA('drogenverwalter'));
      //INSERT INTO user ( email, password ) VALUES ('niclas@sae.de', SHA('janosstinkt'));
      $characters = array();
      $sqlselect = "SELECT * FROM character"; // bauen das SQL, das wir nutzen, um den

      $charactersfromdb = $this->connection->query($sqlselect) //query führt das SQL auf der Datenbank aus
      //TODO pro datansatz erzeuge ich ein Object von Typ character
      //iterate durch alle Sätze
      for(int i = 0; i < count($charactersfromdb); i++){
        //['name'],['id'], ['user_id']
        $character = new Character($charactersfromdb[i]['id'], $charactersfromdb[i]['name'], $charactersfromdb[i]['user_id']);
        array_push($characters, $character);
      }

      return $characters;

  }


  /* Holt alle Waffen die dem character zugeordnet sind */
  public function get_profiel_for_character($caracterid){

      $profiel = array();
      $sqlselectprofiel = "SELECT * FROM profiel WHERE character_id = " .$caracterid; // bauen das SQL, das wir nutzen, um den

      $profielfromdb = $this->connection->query($sqlselectprofiel); //query führt das SQL auf der Datenbank aus
      //TODO pro datansatz erzeuge ich ein Object von Typ character
      //iterate durch alle Sätze
      for(int i = 0; i < count($profielsfromdb); i++){
        //['name'],['id'], ['user_id']
        //
        $profiel = new Weapon($profielfromdb[i]['id'], $profielfromdb[i]['name'], $profielfromdb[i]['damage'], $profielfromdb[i]['character_id'] );
        array_push($waepons, $profiel);
      }

      return $profiel;

  }



}
?>
