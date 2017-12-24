<?php
if (!file_exists(__DIR__.'/vendor/autoload.php')) {
    throw new Exception('Exec composer install');
}
require __DIR__.'/vendor/autoload.php';
$bdd = new PDO('mysql:host=localhost;dbname=test', 'root', '');

if (isset($_POST)) {
  $obj = new Application\Manager($bdd);
  $obj->setUsers($_POST['nom'],$_POST['prenom'],$_POST['reunion']);
/*  header('location: index.php');*/
 }