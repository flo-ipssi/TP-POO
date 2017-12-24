<?php
namespace Application;
use PDO;
class Manager
{
  private $_bdd; // Instance de PDO

  public function __construct($bdd)
  {
    $this->setDb($bdd);
  }
  public function setDb($bdd)
  {
    $this->_bdd = $bdd;
  }

  public function setUsers($nom,$prenom,$organisateur)
  {
  	echo $nom;
  	if ($organisateur == 0) {
  		$q = $this->_bdd->prepare('INSERT INTO users(nom, prenom) VALUES(:nom, :prenom)');
	    $q->bindValue($nom, PDO::PARAM_STR);
	    $q->bindValue($prenom, PDO::PARAM_STR);
	    print_r($q->errorInfo());
	    $q->execute();
	    return;
  	}
  	else{
		$q = $this->_bdd->prepare('INSERT INTO users(nom, prenom, organisateur) VALUES(:nom, :prenom, :organisateur)');
	    $q->bindValue($nom, PDO::PARAM_STR);
	    $q->bindValue($prenom, PDO::PARAM_STR);
	    $q->bindValue($organisateur, PDO::PARAM_INT);
	    print_r($q->errorInfo());
	    $q->execute();
	    return;
  	}
  }
}

?>