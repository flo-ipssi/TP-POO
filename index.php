<?php
if (!file_exists(__DIR__.'/vendor/autoload.php')) {
    throw new Exception('Exec composer install');
}
require __DIR__.'/vendor/autoload.php';

$bdd = new PDO('mysql:host=localhost;dbname=test', 'root', '');
$obj = new Application\ServicesManager($bdd);
$tab = $obj->getList();
$array = $obj->getUsers();
$tbl = $obj->getParticipation();


?>

<!DOCTYPE html>
<html>
<head>
  <title>Liste</title>
</head>
<body>
  <h1>Liste des Meetings</h1>
  <ul>
    <?php
      foreach ($tab as $key => $value) {
        echo '<li>'.$value.'</li>';
      }
      ?>
  </ul>
  <h1>Liste des Utilisateurs</h1>
  <ul>
    <?php
      foreach ($array as $key => $value) {
        echo '<li>'.$value.'</li>';
      }
      ?>
  </ul>
  <h1>Liste des Participations</h1>
  <ul>
    <?php
      foreach ($tbl as $key => $value) {
        echo '<li>'.$value.'</li>';
      }
      ?>
  </ul>
</body>
</html>