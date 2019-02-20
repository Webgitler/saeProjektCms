<?php
require_once __DIR__ . '/db.php';
require_once __DIR__ . '/character.php';
require_once __DIR__ . '/user.php';

session_start();

function newConnector(){
  return new MysqlConnector('localhost','sae','drogenverwalter', 'penandpapercms');
}

function assertLoggedinUser(){
  if($_SESSION['user'] == ''){
    die('du bist nicht eingeloggt!');
  }
}
