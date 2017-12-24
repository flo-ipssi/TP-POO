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

  public function setUsers($nom,$prenom,$organisateur,$meeting)
  {
  	echo $nom;
  	if ($organisateur === '0') {
  		$organisateur = NULL;
  		$q = $this->_bdd->prepare('INSERT INTO users(nom, prenom, organisateur, meeting) VALUES(:nom, :prenom, :organisateur, :meeting)');
	    $q->bindValue(':nom',$nom);
	    $q->bindValue(':prenom',$prenom);
	    $q->bindValue(':organisateur',$organisateur, PDO::PARAM_INT);
	    $q->bindValue(':meeting',$meeting, PDO::PARAM_INT);
	    print_r($q->errorInfo());
	    $q->execute();
	    return;
  	}
  	else{
		$q = $this->_bdd->prepare('INSERT INTO users(nom, prenom, organisateur, meeting) VALUES(:nom, :prenom, :organisateur, :meeting)');
	    $q->bindValue(':nom',$nom);
	    $q->bindValue(':prenom',$prenom);
	    $q->bindValue(':organisateur',$organisateur, PDO::PARAM_INT);
	    $q->bindValue(':meeting',$meeting, PDO::PARAM_INT);
	    print_r($q->errorInfo());
	    $q->execute();
	    return;
  	}
  }
}

?>