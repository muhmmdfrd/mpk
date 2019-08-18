<?php
  $dbhost="localhost";
  $dbname="db_mpk";
  $dbuser="root";
  $dbpass="";
try {
  $con = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
  $con ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);  
} catch (Exception $e) {
  echo "Error";
}
?>